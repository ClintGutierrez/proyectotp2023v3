<?php

namespace App\Models;

use CodeIgniter\Model;

class UnidadesModel extends Model
{
    protected $table = "unidades";
    protected $primaryKey = "id";
    protected $returnType = "array";
    protected $useSoftDeleted = false;
    protected $allowedFields = ['nombre', 'nombre_corto', 'activo'];
    protected $useTimestamps= true;
    protected $createdField = 'fecha_alta';
    protected $updatedField = 'fecha_edit';
    protected $deletedField = 'delete_at';
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

}

?>