<?php

namespace App\Models;

use CodeIgniter\Model;

class TemporalModel extends Model
{
    protected $table      = 'temporal';
    protected $primaryKey = 'id_temp';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_temp', 'id_usuario', 'id_mascota', 'estado', 'activo', 'folio', 'numero_solicitud', 'curp_mascota'];

    protected $useTimestamps = false;
    //protected $dateFormat    = 'datetime';
    //protected $createdField  = 'fecha_alta';
    //protected $updatedField  = 'fecha_edit';
    //protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}