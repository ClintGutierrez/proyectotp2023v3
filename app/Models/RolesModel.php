<?php

namespace App\Models;

use CodeIgniter\Model;

class RolesModel extends Model
{
    protected $table = "roles";
    protected $primaryKey = "id";
    protected $returnType = "array";
    protected $useSoftDeleted = false;
    protected $allowedFields = ['nombre', 'activo'];
    protected $useTimestamps= true;
    protected $createdField = 'fecha_alta';
    protected $updatedField = 'fecha_modifica';
    protected $deletedField = 'delete_at';
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

}

?>