<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
   protected $table      = 'usuarios';
   protected $primaryKey = 'id_usuario';

   protected $useAutoIncrement = true;

   protected $returnType     = 'array';
   protected $useSoftDeletes = false;

   protected $allowedFields = ['id_usuario','id_entidad', 'cve_entidad', 'nombre', 'password', 'correo', 'telefono', 'fecha_alta', 'fecha_ultima', 'activo', 'doc_identificacion', 'doc_domicilio', 'nombre_entidad', 'calle', 'colonia', 'numero', 'cp', 'doc_curp', 'ruta_identificacion', 'ruta_curp', 'ruta_domicilio'];

   protected $useTimestamps = false;

   protected $validationRules    = [];
   protected $validationMessages = [];
   protected $skipValidation     = false;



   //  public function user()
   //  {
   //    return $this -> hasMany('App\Models\MascotasModel', 'id');
   //  }
}
