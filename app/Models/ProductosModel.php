<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductosModel extends Model
{
    protected $table = "productos";
    protected $primaryKey = "id";
    protected $returnType = "array";
    protected $useSoftDeleted = false;
    protected $allowedFields = ['codigo', 'nombre','precio_venta','precio_compra','existencias','stock_minimo', 
    'inventariable','id_unidad','id_categoria','activo'];
    protected $useTimestamps= true;
    protected $createdField = 'fecha_alta';
    protected $updatedField = '';
    protected $deletedField = 'delete_at';
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function actualizaStock($id_producto, $cantidad, $operador='+'){
        $this->set('existencias',"existencias $operador $cantidad",FALSE);
        $this->where('id',$id_producto);
        $this->update() ;
    }

    public function totalProductos(){
        return $this->where('activo',1)->countAllResults;//num_rows

    }

}

?>