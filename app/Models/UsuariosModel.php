<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuariosModel extends Model
{
    protected $table = "usuarios";
    protected $primaryKey = "id";
    protected $returnType = "array";
    protected $useSoftDeleted = false;
    protected $allowedFields = ['usuario','password','nombre','id_caja','id_rol', 'activo'];
    protected $useTimestamps= true;
    protected $createdField = 'fecha_alta'; 
    protected $updatedField = 'fecha_modifica';
    protected $deletedField = 'delete_at';
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

}

?>