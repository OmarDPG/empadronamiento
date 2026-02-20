<?php
namespace App\Models;

use CodeIgniter\Model;
class CertificadosModel extends Model
{
   protected $table      = 'certificados';
   protected $primaryKey = 'id_certificado';

   protected $useAutoIncrement = true;

   protected $returnType     = 'array';
   protected $useSoftDeletes = false;

   protected $allowedFields = ['id_certificado', 'id_usuario', 'id_mascota', 'folio', 'fecha_alta', 'fecha_inicio', 'fecha_fin', 'activo', 'solicitud', 'curp_mascota'];

   protected $useTimestamps = true;
   protected $dateFormat    = 'datetime';
   protected $createdField  = 'fecha_alta';
   protected $updatedField  = 'fecha_edit';
   //protected $deletedField  = 'deleted_at';

   protected $validationRules    = [];
   protected $validationMessages = [];
   protected $skipValidation     = false;
}

?>