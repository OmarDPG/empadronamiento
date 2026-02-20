<?php

namespace App\Models;

use CodeIgniter\Model;

class NotificacionesModel extends Model
{
    protected $table      = 'notificaciones';
    protected $primaryKey = 'id_notificacion';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_notificacion', 'id_usuario', 'id_mascota', 'asunto', 'descripcion', 'uuid', 'enlace', 'activo'];

    protected $useTimestamps = false;
    //protected $dateFormat    = 'datetime';
    //protected $createdField  = 'fecha_alta';
    //protected $updatedField  = 'fecha_edit';
    //protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}