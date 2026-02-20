<?php
namespace App\Models;

use CodeIgniter\Model;
 class RegistroModel extends Model{
    protected $table      = 'usuarios';
    protected $primaryKey = 'id_usuario';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nombre', 'password', 'correo', 'telefono', 'direccion', 'identificacion', 'curp', 'fecha_alta', 'fecha_ultima', 'activo', 'doc_domicilio', 'doc_curp', 'doc_identificacion'];

    protected $useTimestamps = false;

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
 }

?>