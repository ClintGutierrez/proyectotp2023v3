<?php

namespace app\Controllers;

use App\Controllers\BaseController;
use App\Models\ConfiguracionModel;

class Configuracion extends BaseController
{
    protected $configuracion,$session;
    public function __construct()
    {
        $this->configuracion = new ConfiguracionModel();
        $this->session = session();
    }

    public function index($activo = 1)
    {
        if(!isset($this->session->id_usuario)){
			return redirect()->to(base_url());
		}
        $nombre = $this->configuracion->where('nombre', 'tienda_nombre')->first();
        $rfc = $this->configuracion->where('nombre', 'tienda_rfc')->first();
        $telefono = $this->configuracion->where('nombre', 'tienda_telefono')->first();
        $email = $this->configuracion->where('nombre', 'tienda_email')->first();
        $direccion = $this->configuracion->where('nombre', 'tienda_direccion')->first();
        $leyenda = $this->configuracion->where('nombre', 'ticket_leyenda')->first();


        $data = [
            'titulo' => 'Configuracion',
            'nombre'=>$nombre,
            'rfc'=> $rfc,
            'telefono'=>$telefono,
            'email'=>$email,
            'direccion'=>$direccion,
            'leyenda'=>$leyenda
           
        ];

        echo view('header');
        echo view('configuracion/configuracion',$data);
        echo view('footer');

    }

    public function actualizar()
    {

        $this->configuracion->whereIn('nombre',['tienda_nombre'])->set(['valor'=>
        $this->request->getPost('tienda_nombre')])->update();

        $this->configuracion->whereIn('nombre',['tienda_rfc'])->set(['valor'=>
        $this->request->getPost('tienda_rfc')])->update();

        $this->configuracion->whereIn('nombre',['tienda_telefono'])->set(['valor'=>
        $this->request->getPost('tienda_telefono')])->update();

        $this->configuracion->whereIn('nombre',['tienda_email'])->set(['valor'=>
        $this->request->getPost('tienda_email')])->update();

        $this->configuracion->whereIn('nombre',['tienda_direccion'])->set(['valor'=>
        $this->request->getPost('tienda_direccion')])->update();

        $this->configuracion->whereIn('nombre',['ticket_leyenda'])->set(['valor'=>
        $this->request->getPost('ticket_leyenda')])->update();

        return redirect()->to(base_url() . '/configuracion');

    }
    

}