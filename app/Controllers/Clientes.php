<?php

namespace app\Controllers;

use App\Controllers\BaseController;
use App\Models\ClientesModel;

class Clientes extends BaseController
{
    protected $clientes,$session;
    
    public function __construct()
    {
        $this->clientes = new ClientesModel();
        $this->session = session();
       

    }

    public function index($activo = 1)
    {
        if(!isset($this->session->id_usuario)){
			return redirect()->to(base_url());
		}
        $clientes = $this->clientes->where('activo', $activo)->findAll();
        $data = ['titulo' => 'Clientes', 'datos' => $clientes];

        echo view('header');
        echo view('clientes/clientes', $data);
        echo view('footer');

    }

    public function eliminados($activo = 0)
    {
        $clientes = $this->clientes->where('activo', $activo)->findAll();
        $data = ['titulo' => 'Clientes eliminados', 'datos' => $clientes];

        echo view('header');
        echo view('clientes/eliminados', $data);
        echo view('footer');

    }

    public function nuevo()
    {
        
        $data = [
            'titulo' => 'Agregar cliente',
             ];

        echo view('header');
        echo view('clientes/nuevo', $data);
        echo view('footer');

    }
    public function insertar()
    {
        if ($this->request->getMethod() == 'post') {
            $this->clientes->save([
                
                'nombre' => $this->request->getPost('nombre'),
                'direccion' => $this->request->getPost('direccion'),
                'telefono' => $this->request->getPost('telefono'),
                'correo' => $this->request->getPost('correo'),
                
            ]);

            return redirect()->to(base_url() . '/clientes');
        } else {
            $data = ['titulo' => 'Agregar cliente', 'validation' => $this->validator];

            echo view('header');
            echo view('clientes/nuevo', $data);
            echo view('footer');
        }
    }

    public function editar($id)
    {
        #$id = $this->request->getGet('idEdit');
       
        $cliente = $this->clientes->where('id', $id)->first();
        $data = [
            'titulo' => 'Editar cliente',
            'cliente' => $cliente
        ];

        echo view('header');
        echo view('clientes/editar', $data);
        echo view('footer');

    }
    public function actualizar()
    {
        $this->clientes->update(
            $this->request->getPost('id'),
            [
                'nombre' => $this->request->getPost('nombre'),
                'direccion' => $this->request->getPost('direccion'),
                'telefono' => $this->request->getPost('telefono'),
                'correo' => $this->request->getPost('correo'),
            ]
        );

        return redirect()->to(base_url() . '/clientes');
    }
    public function eliminar($id)
    {
        #$id = $this->request->getGet('idEliminar');
        $this->clientes->update($id, ['activo' => 0]);
        return redirect()->to(base_url() . '/clientes');
    }

    public function reingresar()
    {
        $id = $this->request->getGet('idReingresar');
        $this->clientes->update($id, ['activo' => 1]);
        return redirect()->to(base_url() . '/clientes');
    }

    public function autocompleteData(){
        $returnData = array() ;

        $valor = $this->request->getGet('term');
        $clientes = $this->clientes->like('nombre', $valor)->where('activo',1)->findAll();
        if(!empty($clientes)){
            foreach($clientes as $row){
                $data['id']=$row['id'];
                $data['value']=$row['nombre'];
                array_push($returnData, $data);
            }
        }
         echo json_encode($returnData);
    }



}