<?php namespace App\Controllers;

use App\Models\ProductosModel;

class Inicio extends BaseController
{
	protected $productoModel, $session;
	public function __construct(){

		$this->productoModel = new ProductosModel();
		$this->session = session();
	}
	public function index()
	{
		if(!isset($this->session->id_usuario)){
			return redirect()->to(base_url());
		}
		$total = $this->productoModel->totalProductos();
		$datos = ['total'=>$total];

		echo view('header');
        echo view('inicio',$datos);
        echo view('footer');
	}

	//--------------------------------------------------------------------

}
