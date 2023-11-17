<?php

namespace app\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoriasModel;
use App\Models\ProductosModel;
use App\Models\UnidadesModel;

class Productos extends BaseController
{
    protected $productos,$session;
    protected $unidades;
    protected $categorias;
    public function __construct()
    {
        $this->productos = new ProductosModel();
        $this->unidades = new UnidadesModel();
        $this->categorias = new CategoriasModel();
        $this->session = session();

    }

    public function index($activo = 1)
    {
        if(!isset($this->session->id_usuario)){
			return redirect()->to(base_url());
		}
        $productos = $this->productos->where('activo', $activo)->findAll();
        $data = ['titulo' => 'Productos', 'datos' => $productos];

        echo view('header');
        echo view('productos/productos', $data);
        echo view('footer');

    }

    public function eliminados($activo = 0)
    {
        $productos = $this->productos->where('activo', $activo)->findAll();
        $data = ['titulo' => 'Productos eliminadoas', 'datos' => $productos];

        echo view('header');
        echo view('productos/eliminados', $data);
        echo view('footer');

    }

    public function nuevo()
    {
        $unidades = $this->unidades->where('activo', 1)->findAll();
        $categorias = $this->categorias->where('activo', 1)->findAll();
        $data = [
            'titulo' => 'Agregar producto',
            'unidades' => $unidades,
            'categorias' => $categorias
        ];

        echo view('header');
        echo view('productos/nuevo', $data);
        echo view('footer');

    }
    public function insertar()
    {
        if ($this->request->getMethod() == 'post') {
            $this->productos->save([
                'codigo' => $this->request->getPost('codigo'),
                'nombre' => $this->request->getPost('nombre'),
                'precio_venta' => $this->request->getPost('precio_venta'),
                'precio_compra' => $this->request->getPost('precio_compra'),
                'stock_minimo' => $this->request->getPost('stock_minimo'),
                'inventariable' => $this->request->getPost('inventariable'),
                'id_unidad' => $this->request->getPost('id_unidad'),
                'id_categoria' => $this->request->getPost('id_categoria')
            ]);

            return redirect()->to(base_url() . '/productos');
        } else {
            $data = ['titulo' => 'Agregar Unidad', 'validation' => $this->validator];

            echo view('header');
            echo view('productos/nuevo', $data);
            echo view('footer');
        }
    }

    public function editar($id)
    {
        #$id = $this->request->getGet('idEdit');
        $unidades = $this->unidades->where('activo', 1)->findAll();
        $categorias = $this->categorias->where('activo', 1)->findAll();
        $producto = $this->productos->where('id', $id)->first();
        $data = [
            'titulo' => 'Editar producto',
            'unidades' => $unidades,
            'categorias' => $categorias,
            'producto' => $producto
        ];

        echo view('header');
        echo view('productos/editar', $data);
        echo view('footer');

    }
    public function actualizar()
    {
        $this->productos->update(
            $this->request->getPost('id'),
            [
                'codigo' => $this->request->getPost('codigo'),
                'nombre' => $this->request->getPost('nombre'),
                'precio_venta' => $this->request->getPost('precio_venta'),
                'precio_compra' => $this->request->getPost('precio_compra'),
                'stock_minimo' => $this->request->getPost('stock_minimo'),
                'inventariable' => $this->request->getPost('inventariable'),
                'id_unidad' => $this->request->getPost('id_unidad'),
                'id_categoria' => $this->request->getPost('id_categoria')
            ]
        );

        return redirect()->to(base_url() . '/productos');
    }
    public function eliminar($id)
    {
        #$id = $this->request->getGet('idEliminar');
        $this->productos->update($id, ['activo' => 0]);
        return redirect()->to(base_url() . '/productos');
    }

    public function reingresar()
    {
        $id = $this->request->getGet('idReingresar');
        $this->productos->update($id, ['activo' => 1]);
        return redirect()->to(base_url() . '/productos');
    }

    public function buscarPorCodigo($codigo){
        #$codigo = $this->request->getGet('buscarcodigo');
        $this->productos->select('*');
        $this->productos->where('codigo', $codigo);
        $this->productos->where('activo',1);
        $datos= $this->productos->get()->getRow();

        $res['existe'] = false;
        $res['datos']='';
        $res['error']='';

        if($datos){
            $res['datos'] = $datos;
            $res['existe'] = true;

        }else{
            $res['error']= 'No existe el producto';
            $res['existe'] = false;
        }

        echo json_encode($res);
        
    }
    public function autocompleteData(){
        $returnData = array() ;

        $valor = $this->request->getGet('term');
        $productos = $this->productos->like('codigo', $valor)->where('activo',1)->findAll();
        if(!empty($productos)){
            foreach($productos as $row){
                $data['id']=$row['id'];
                $data['value']=$row['codigo'];
                $data['label']=$row['codigo'].'-'.$row['nombre'];

                array_push($returnData, $data);
            }
        }
         echo json_encode($returnData);
    }


}