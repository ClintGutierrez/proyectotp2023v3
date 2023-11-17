<?php

namespace App\Models;

use CodeIgniter\Model;

class ConfiguracionModel extends Model
{
    protected $table = "configuracion";
    protected $primaryKey = "id";
    protected $returnType = "array";
    protected $useSoftDeleted = false;
    protected $useSoftUpdates = false;
    protected $useSoftCreates = false;
    protected $allowedFields = ['nombre', 'valor'];
    protected $useTimestamps= true;
    protected $createdField = null;
    protected $updatedField = null;
    protected $deletedField = 'delete_at';
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

}

?>