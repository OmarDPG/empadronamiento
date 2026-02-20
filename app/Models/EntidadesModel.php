<?php

namespace App\Models;

use CodeIgniter\Model;

class EntidadesModel extends Model
{
    protected $table      = 'entidades';
    protected $primaryKey = 'id_entidad';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_entidad', 'nombre_entidad', 'cve_entidad'];

    protected $useTimestamps = false;
    //protected $dateFormat    = 'datetime';
    //protected $createdField  = 'fecha_alta';
    //protected $updatedField  = 'fecha_edit';
    //protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}