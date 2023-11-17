<?php

namespace App\Models;

use CodeIgniter\Model;

class CajasModel extends Model
{
    protected $table = "cajas";
    protected $primaryKey = "id";
    protected $returnType = "array";
    protected $useSoftDeleted = false;
    protected $allowedFields = ['numero_caja', 'nombre', 'folio', 'activo'];
    protected $useTimestamps= true;
    protected $createdField = 'fecha_alta';
    protected $updatedField = 'fecha_modifica';
    protected $deletedField = 'delete_at';
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

}

?>