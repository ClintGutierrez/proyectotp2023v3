<?php

namespace app\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoriasModel;

class Categorias extends BaseController
{
    protected $categorias,$session;
    public function __construct()
    {
        $this->categorias = new CategoriasModel();
        $this->session = session();
    }

    public function index($activo = 1)
    {
        if(!isset($this->session->id_usuario)){
			return redirect()->to(base_url());
		}
        $categorias = $this->categorias->where('activo', $activo)->findAll();
        $data = ['titulo'=>'Categorias','datos'=>$categorias];

        echo view('header');
        echo view('categorias/categorias',$data);
        echo view('footer');

    }

    public function eliminados($activo = 0)
    {
        $categorias = $this->categorias->where('activo', $activo)->findAll();
        $data = ['titulo'=>'Categorias eliminados','datos'=>$categorias];

        echo view('header');
        echo view('categorias/eliminados',$data);
        echo view('footer');

    }

    public function nuevo()
    {
        $data = ['titulo'=>'Agregar Categoria'];
        
        echo view('header');
        echo view('categorias/nuevo',$data);
        echo view('footer');

    }
    public function insertar()
    {
        $this->categorias->save(['nombre'=> $this->request->getPost('nombre')]);
        return redirect()->to(base_url().'/categorias');
    }

    public function editar()
    {
        $id = $this->request->getGet('idEdit');
        $unidad = $this->categorias->where('id', $id)->first();
        $data = ['titulo'=>'Editar categoria','datos'=>$unidad];
        
        echo view('header');
        echo view('categorias/editar',$data);
        echo view('footer');

    }
    public function actualizar()
    {
        
        $this->categorias->update(
            $this->request->getPost('id'),[
                'nombre'=>$this->request->getPost('nombre')
            ]
        );
        return redirect()->to(base_url().'/categorias');
    }
    public function eliminar()
    {
        $id = $this->request->getGet('idEliminar');
        $this->categorias->update($id,['activo'=>0]);
        return redirect()->to(base_url().'/categorias');
    }

    public function reingresar()
    {
        $id = $this->request->getGet('idReingresar');
        $this->categorias->update($id,['activo'=>1]);
        return redirect()->to(base_url().'/categorias');
    }

}   