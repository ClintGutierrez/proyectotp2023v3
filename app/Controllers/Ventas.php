<?php

namespace app\Controllers;

use App\Controllers\BaseController;
use App\Models\VentasModel;
use App\Models\TemporalCompraModel;
use App\Models\DetalleVentaModel;
use App\Models\ProductosModel;
use App\Models\ConfiguracionModel;


class Ventas extends BaseController
{
    protected $ventas,$temporal_compra, $detalle_venta, $productos,$configuracion,$session;
    public function __construct()
    {
        $this->ventas = new VentasModel();
        $this->detalle_venta = new DetalleVentaModel();
        $this->configuracion = new ConfiguracionModel();
        $this->session = session();
        helper(['form']);
    }

    // public function index($activo = 1)
    // {
    //     $unidades = $this->compras->where('activo', $activo)->findAll();
    //     $data = ['titulo' => 'Unidades', 'datos' => $unidades];

    //     echo view('header');
    //     echo view('unidades/unidades', $data);
    //     echo view('footer');

    // }

    

    public function venta()
    {

        if(!isset($this->session->id_usuario)){
			return redirect()->to(base_url());
		}

        echo view('header');
        echo view('ventas/caja');
        echo view('footer');
    }
    public function guarda()
    {

        $id_venta=$this->request->getPost('id_venta');
        $total= preg_replace('/[\$,]/','',$this->request->getPost('total'));

        $forma_pago=$this->request->getPost('forma_pago');
        $id_cliente=$this->request->getPost('id_cliente');

        $session=session();
       

       $resultadoId = $this->ventas->insertaVenta($id_venta, $total, $session->id_usuario,
        $session->id_caja, $id_cliente, $forma_pago);

       $this->temporal_compra = new TemporalCompraModel();

       if($resultadoId){
        
        $resultadoCompra =  $this->temporal_compra->porCompra($id_venta);
        
        foreach($resultadoCompra as $row){
            $this->detalle_venta->save([
                'id_venta'=> $resultadoId,
                'id_producto'=> $row['id_producto'],
                'nombre'=> $row['nombre'],
                'cantidad'=> $row['cantidad'],
                'precio'=> $row['precio']
            ]);
            $this ->productos=new ProductosModel();
            $this ->productos->actualizaStock($row['id_producto'],$row['cantidad'],'-');
        }
        //$this->temporal_compra->eliminarCompra($id_venta);
       }
        return redirect()->to(base_url()."/ventas/muestraTicket/".$resultadoId);
    }
    function muestraTicket($id_venta){

        $data['id_venta']=$id_venta;
        echo view('header');
        echo view('ventas/ver_ticket',$data);
        echo view('footer');
    
    }

    function generaTicket($id_venta){

        $datosVenta = $this->ventas->where('id',$id_venta)->first();
        $detalleVenta =  $this->detalle_venta->select('*')->where('id_venta',$id_venta)->findAll();
        $nombreTienda =  $this->configuracion->select('valor')->where('nombre','tienda_nombre')->get()->getRow()->valor;
        $DireccionTienda =  $this->configuracion->select('valor')->where('nombre','tienda_direccion')->get()->getRow()->valor;

        
        $pdf = new \FPDF('P','mm',array(80,200));
        
        $pdf->AddPage();
        $pdf->SetMargins(10,10,10);
        $pdf->SetTitle("Venta");
        $pdf->SetFont('Arial','B',10);

        $pdf->Cell(70,5,'Venta de productos',0,1,'C');
        $pdf->SetFont('Arial','B',9);

        $pdf->image(base_url().'/img/logo.png',10,10,20,20,'PNG');
        $pdf->Cell(50,5,$nombreTienda,0,1,'L');
        $pdf->Cell(50,5,utf8_decode('Dirección: ').$DireccionTienda,0,1,'L');

        $pdf->Cell(50,5,'Fecha y hora: '.$datosVenta['fecha_alta'],0,1,'L');

        $pdf->Ln();

        $pdf->SetFont('Arial','B',8);
        $pdf->SetFillColor(0,0,0);
        $pdf->SetTextColor(255,255,255);
        $pdf->Cell(195,5,'Detalle de productos',1,1,'C',1);
        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(14,5,'No',1,0,'L');
        $pdf->Cell(25,5,'Codigo',1,0,'L');
        $pdf->Cell(77,5,'Nombre',1,0,'L');
        $pdf->Cell(25,5,'Precio',1,0,'L');
        $pdf->Cell(25,5,'Cantidad',1,0,'L');
        $pdf->Cell(30,5,'importe',1,1,'L');

        $pdf->SetFont('Arial','',8);

        $contador=1;

        foreach($detalleVenta as $row){
        $pdf->Cell(14,5,$contador,1,0,'L');
        $pdf->Cell(25,5,$row['id_producto'],1,0,'L');
        $pdf->Cell(77,5,$row['nombre'],1,0,'L');
        $pdf->Cell(25,5,$row['precio'],1,0,'L');
        $pdf->Cell(25,5,$row['cantidad'],1,0,'L');
        $importe = number_format($row['precio']*$row['cantidad'],2,'.',',');
        $pdf->Cell(30,5,'S/.'.$importe,1,1,'R');
        $contador++;
        }

        $pdf->Ln();

        $pdf->SetFont('Arial','B',8);

        $pdf->Cell(195,5,'Total S/.'.number_format($datosVenta['total'],0,1,'R'),2,'.',',');


        $this->response->setHeader('Content-type','application/pdf');

        $pdf->Output("ticket.pdf","I");
    }

}


