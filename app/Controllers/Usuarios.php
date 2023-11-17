<?php

namespace app\Controllers;

use App\Controllers\BaseController;
use App\Models\CajasModel;
use App\Models\RolesModel;
use App\Models\UsuariosModel;

class Usuarios extends BaseController
{
    protected $usuarios, $cajas, $roles,$session;
    protected $reglasLogin;
    public function __construct()
    {
        $this->usuarios = new UsuariosModel();
        $this->cajas = new CajasModel();
        $this->roles = new RolesModel();
        $this->session = session();
        

        $this->reglasLogin=[
            'usuario'=>[
                'rules'=> 'required',
                'errors'=> [
                    'required'=> 'El campo{field} es obligatorio'
                ]
                ],
            'password'=>[
                'rules'=> 'required',
                'errors'=> [
                    'required'=> 'El campo{field} es obligatorio'
                ]
            ]
         ];
    }

    public function index($activo = 1)
    {

        if(!isset($this->session->id_usuario)){
			return redirect()->to(base_url());
		}

        $usuarios = $this->usuarios->where('activo', $activo)->findAll();
        $data = ['titulo' => 'Usuarios', 'datos' => $usuarios];

        echo view('header');
        echo view('usuarios/usuarios', $data);
        echo view('footer');

    }

    public function eliminados($activo = 0)
    {
        $usuarios = $this->usuarios->where('activo', $activo)->findAll();
        $data = ['titulo' => 'Usuarios eliminados', 'datos' => $usuarios];

        echo view('header');
        echo view('usuarios/eliminados', $data);
        echo view('footer');

    }

    public function nuevo()
    {
        $cajas = $this->cajas->where('activo', 1)->findAll();
        $roles = $this->roles->where('activo', 1)->findAll();
        $data = ['titulo' => 'Agregar Usuario', 'cajas'=>$cajas,'roles'=> $roles];

        echo view('header');
        echo view('usuarios/nuevo', $data);
        echo view('footer');

    }
    public function insertar()
    {

        $hash = password_hash($this->request->getPost('password'),PASSWORD_DEFAULT);

        $this->usuarios->save([
            'usuario'=>$this->request->getPost('usuario'),
            'password'=>$hash,
            'nombre'=>$this->request->getPost('nombre'),
            'id_caja'=>$this->request->getPost('id_caja'),
            'id_rol'=>$this->request->getPost('id_rol'),
            'activo'=>1
         ]);

        return redirect()->to(base_url() . '/usuarios');



    }

    public function editar()
    {
        $id = $this->request->getGet('idEdit');
        $unidad = $this->usuarios->where('id', $id)->first();
        $data = ['titulo' => 'Editar unidad', 'datos' => $unidad];

        echo view('header');
        echo view('usuarios/editar', $data);
        echo view('footer');

    }
    public function actualizar()
    {

        $this->usuarios->update(
            $this->request->getPost('id'),
            [
                'nombre' => $this->request->getPost('nombre'),
                'nombre_corto' => $this->request->getPost('nombre_corto')
            ]
        );
        return redirect()->to(base_url() . '/usuarios');
    }
    public function eliminar()
    {
        $id = $this->request->getGet('idEliminar');
        $this->usuarios->update($id, ['activo' => 0]);
        return redirect()->to(base_url() . '/usuarios');
    }

    public function reingresar()
    {
        $id = $this->request->getGet('idReingresar');
        $this->usuarios->update($id, ['activo' => 1]);
        return redirect()->to(base_url() . '/usuarios');
    }

    public function login(){
        echo view('login');
    }

    public function valida(){

            $usuario = $this->request->getPost('usuario');
            $password = $this->request->getPost('password');
            $datosUsuario = $this->usuarios->where('usuario',$usuario)->first();

            if($datosUsuario != null){
                if(password_verify($password, $datosUsuario['password'])){
                    $datosSesion=[
                        'id_usuario'=> $datosUsuario['id'],
                        'nombre'=> $datosUsuario['nombre'],
                        'id_caja'=> $datosUsuario['id_caja'],
                        'id_rol'=> $datosUsuario['id_rol'],

                    ];
                    $session =session();
                    $session->set($datosSesion);
                    return redirect()->to(base_url() . '/inicio');
                }else{
                    $data['error']="Las contraseñas no coinciden";
                    echo view('login', $data);

                }

        }else{
            $data['error']="El usuario no existe";
            echo view('login', $data);
        }


    
    }

    public function logout(){
        $session = session();
        $session->destroy();
        return redirect()->to(base_url());
    }
}
