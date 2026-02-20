<?php

namespace App\Models;

use CodeIgniter\Model;

class MascotasModel extends Model
{
   protected $table      = 'mascotas';
   protected $primaryKey = 'id_mascota';

   protected $useAutoIncrement = true;

   protected $returnType     = 'array';
   protected $useSoftDeletes = false;

   protected $allowedFields = ['id_mascota','id_usuario','nombre', 'edad', 'raza', 'especie', 'vacunado', 'esterilizado', 'fecha_alta', 'fecha_fin', 'activo', 'caracteristicas', 'sexo', 'doc_propiedad', 'fotografia', 'color'];

   protected $useTimestamps = false;
   protected $validationRules    = [];
   protected $validationMessages = [];
   protected $skipValidation     = false;


   public function insertarDatos($insert)
   {
      $this->insert($insert);

       // Obtener el ID del último registro insertado
      //$lastID = $this->insertID();

      return $this->insertID();
   }
   // public function user()
   // {
   //    return $this->belongsTo(UsuarioModel::class, 'id_usuario');
   // }
}
