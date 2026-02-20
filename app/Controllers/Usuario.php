<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\UsuarioModel;
use App\Models\MascotasModel;
use App\Controllers\BaseController;
use App\Models\CertificadosModel;
use App\Models\NotificacionesModel;
use App\Models\TemporalModel;
use CodeIgniter\I18n\Time;
use CodeIgniter\Controller;
use FPDF;
use CodeIgniter\Files\File;

setlocale(LC_TIME, 'es_ES.utf8', 'es_ES', 'esp');
class Usuario extends BaseController
{
    protected $usuario, $usuarios, $mascotas, $session, $mascota, $idUsuario, $certificado, $certificados, $rutaDomicilio, $temporal, $rutaPropiedad, $rutaFotografia, $notificaciones;
    protected $reglas, $reglasLogin, $reglasUpdatePassword, $reglasMascota, $reglasArchivos, $rulesUpdatePassword;

    public function __construct()
    {
        $this->usuario = new UsuarioModel();
        $this->mascota = new MascotasModel();
        $this->certificado = new CertificadosModel();
        $this->temporal = new TemporalModel();
        $this->notificaciones = new NotificacionesModel();
        $this->session = session();

        helper(['form', 'upload']);
        $this->reglas = [
            'nombre' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio',
                    'alpha_space' => 'Campo: {field} - Solo ingrese caracteres validos'
                ]
            ],
            'correo' => [
                'rules' => 'required|valid_email|is_unique[usuarios.correo]',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio',
                    'is_unique' => 'El correo ingresado ya ha sido registrado'
                ]
            ],
            'telefono' => [
                'rules' => 'required|is_unique[usuarios.telefono]|numeric|exact_length[10]',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio',
                    'is_unique' => 'El numero ingresado ya ha sido reguistrado',
                    'numeric' => 'Ingrese un numero valido',
                    'exact_length' => 'Ingrese un numero valido'
                ]
            ],

            'password' => [
                'rules' => 'required|min_length[8]|alpha_dash',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio',
                    'min_length' => 'La contraseña debe de tener al menos 8 caracteres',
                    'alpha_dash' => 'La contraseña debe de contener mayusculas, numeros y un caracter especial'
                ]
            ],
            'confpassword' => [
                'rules' => 'required|min_length[8]|alpha_dash|matches[password]',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio',
                    'min_length' => 'La contraseña debe de tener al menos 8 caracteres',
                    'alpha_dash' => 'La contraseña debe de contener mayusculas, numeros y un caracter especial',
                    'matches' => 'Las contraseñas no coinciden'
                ]
            ],
            'doc_identificacion' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio'
                ]
            ],
            'doc_domicilio' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio'
                ]
            ]
        ];
        $this->reglasLogin = [
            'correo' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio'
                ]
            ]
        ];
        $this->reglasUpdatePassword = [
            'password' => [
                'rules' => 'required|min_length[8]|alpha_dash',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio',
                    'min_length' => 'La contraseña debe de tener al menos 8 caracteres',
                    'alpha_dash' => 'La contraseña debe de contener mayusculas, numeros y un caracter especial'
                ]
            ],
            'confpassword' => [
                'rules' => 'required|min_length[8]|alpha_dash|matches[password]',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio',
                    'min_length' => 'La contraseña debe de tener al menos 8 caracteres',
                    'alpha_dash' => 'La contraseña debe de contener mayusculas, numeros y un caracter especial',
                    'matches' => 'Las contraseñas no coinciden'
                ]
            ]
        ];
        $this->rulesUpdatePassword = [
            'password' => [
                'rules' => 'required|min_length[8]|alpha_dash',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio',
                    'min_length' => 'La contraseña debe de tener al menos 8 caracteres',
                    'alpha_dash' => 'La contraseña debe de contener mayusculas, numeros y un caracter especial'
                ]
            ],
            'confpassword' => [
                'rules' => 'required|min_length[8]|alpha_dash|matches[password]',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio',
                    'min_length' => 'La contraseña debe de tener al menos 8 caracteres',
                    'alpha_dash' => 'La contraseña debe de contener mayusculas, numeros y un caracter especial',
                    'matches' => 'Las contraseñas no coinciden'
                ]
            ]
        ];
        $this->reglasMascota = [
            'nombre' => [
                'rules' => 'required|regex_match[/^[a-záéíóúñ\s]+$/iu]',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio',
                    'alpha' => 'Campo: {field} - Solo ingrese caracteres validos'
                ]
            ],
            'edad' => [
                'rules' => 'required|numeric|',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio',
                    'numeric' => 'Ingrese una edad valida'
                ]
            ],
            'raza' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio',
                    'alpha_space' => 'Ingrese una raza valida'
                ]
            ],

            'especie' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio'
                ]
            ],
            'vacunado' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio',
                ]
            ],
            'esterilizado' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio'
                ]
            ],
            'caracteristicas' => [
                'rules' => 'required|min_length[10]|regex_match[/^[a-záéíóúñ\s]+$/iu]',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio',

                ]
            ],
            'sexo' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio'
                ]
            ]
        ];
        $this->reglasArchivos = [
            'doc_identificacion' => [
                'rules' => 'required',
                'uploaded[doc_identificacion]',
                'mime_in[doc_identificacion,application/pdf]',
                //'max_size[doc_identificacion, 4096]' ,
                'errors' => [
                    'required' => 'El campo {field} es obligatorio',
                    'mime_in' => 'El archivo debe de ser PDF',
                    //'max_size' => 'El archivo no debe ser mayor a 4MB'
                ]
            ],
            'doc_curp' => [
                'rules' => 'required',
                'uploaded[doc_curp]',
                'mime_in[doc_curp,application/pdf]',
                //'max_size[doc_curp, 4096]' ,
                'errors' => [
                    'required' => 'El campo {field} es obligatorio',
                    'mime_in' => 'El archivo debe de ser PDF',
                    //'max_size' => 'El archivo no debe ser mayor a 4MB'
                ]
            ],
            'doc_domicilio' => [
                'rules' => 'required',
                'uploaded[doc_domicilio]',
                'mime_in[doc_domicilio,application/pdf]',
                //'max_size[doc_domicilio, 4096]' ,
                'errors' => [
                    'required' => 'El campo {field} es obligatorio',
                    'mime_in' => 'El archivo debe de ser PDF',
                    //'max_size' => 'El archivo no debe ser mayor a 4MB'
                ]
            ]
        ];
    }

    public function index($activo = 1)
    {
        if (!isset($this->session->id_usuario)) {
            return redirect()->to(base_url() . 'login');
        }
        $db = \Config\Database::connect();
        $builder = $db->table('mascotas', 'certificados');
        $session = \Config\Services::session();
        $sessionId = $session->get('id_usuario');
        $builder->join('usuarios', 'mascotas.id_usuario = usuarios.id_usuario', 'inner');
        $builder->join('certificados', 'certificados.id_mascota = mascotas.id_mascota', 'inner');
        $builder->distinct()->select('mascotas.id_mascota, mascotas.nombre, mascotas.especie, mascotas.sexo, mascotas.edad, mascotas.raza ,mascotas.esterilizado,mascotas.vacunado, usuarios.id_usuario, certificados.id_certificado');
        $builder->where('usuarios.id_usuario', $sessionId);
        $builder->where('mascotas.activo', $activo);
        $builder->where('certificados.activo', $activo);
        $query = $builder->get();
        $result = $query->getResult();
        //print_r($result);
        $data['result'] = $result;
        $this->header();
        echo view('usuario/usuario', $data);
        echo view('footer');
    }
    // LOGOUT
    public function salir()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url());
    }
    public function mascotas()
    {
        if (!isset($this->session->id_usuario)) {
            return redirect()->to(base_url() . 'login');
        }
        $session = session();
        $idUsuario = $session->id_usuario;
        $mascotas = $this->mascota->where('id_usuario', $idUsuario)->findAll();
        $data = ['datos' => $mascotas];
        $this->header();
        echo view('usuario/mascotas', $data);
        echo view('footer');
    }
    public function registrarMascota()
    {
        helper(['form']);

        if ($this->request->getMethod() === 'post') {
            $db = \Config\Database::connect();
            $db->transStart(); // 🔁 Inicia la transacción

            // Validación de campos del formulario
            $reglas = array_merge(
                $this->reglasMascota,
                [
                    'doc_propiedadd' => [
                        'label' => 'Documento de propiedad',
                        'rules' => 'uploaded[doc_propiedadd]|mime_in[doc_propiedadd,application/pdf,image/png,image/jpg,image/jpeg]'
                    ],
                    'img_mascota' => [
                        'label' => 'Imagen de la mascota',
                        'rules' => 'uploaded[img_mascota]|mime_in[img_mascota,image/jpg,image/jpeg,image/png]'
                    ]
                ]
            );

            if (!$this->validate($reglas)) {
                $data = ['validation' => $this->validator];
                $this->header();
                echo view('usuario/mascotas', $data);
                echo view('footer');
                return;
            }

            try {
                $session = session();
                $idUsuario = $session->id_usuario;
                $nombreMascota = strtoupper($this->request->getPost('nombre'));


                // 📦 Guardar mascota
                $this->mascota->save([
                    'id_usuario'      => $idUsuario,
                    'nombre'          => $nombreMascota,
                    'edad'            => $this->request->getPost('edad'),
                    'raza'            => $this->request->getPost('raza'),
                    'especie'         => $this->request->getPost('especie'),
                    'vacunado'        => $this->request->getPost('vacunado'),
                    'esterilizado'    => $this->request->getPost('esterilizado'),
                    'caracteristicas' => $this->request->getPost('caracteristicas'),
                    'sexo'            => $this->request->getPost('sexo'),
                    'color'            => $this->request->getPost('color'),
                ]);

                $idMascota = $this->mascota->getInsertID();
                // 🔐 Generar CURP personalizado
                $nombrePropietario = strtoupper($session->get('nombre')); // del campo de sesión
                $mascotaData = [
                    'nombre' => $nombreMascota,
                    'especie' => $this->request->getPost('especie'),
                    'sexo' => $this->request->getPost('sexo'),
                    'esterilizado' => $this->request->getPost('esterilizado')
                ];

                $curpMascota = $this->generarCurpMascotaDesdeNombreCompleto($nombrePropietario, $mascotaData, $idMascota);

                // ✅ Actualizar mascota con CURP generado
                // $this->mascota->update($idMascota, ['curp_mascota' => $curp]);

                // 📁 Preparar carpeta
                $rutaBase = FCPATH . "uploads/{$idUsuario}/{$nombreMascota}";
                if (!is_dir($rutaBase) && !mkdir($rutaBase, 0755, true)) {
                    throw new \Exception('No se pudo crear la carpeta de destino.');
                }

                // Archivos
                $docPropiedad = $this->request->getFile('doc_propiedadd');
                $imgMascota = $this->request->getFile('img_mascota');

                if (!$docPropiedad->isValid() || !$imgMascota->isValid()) {
                    throw new \Exception('Error en los archivos subidos.');
                }

                // Obtener extensiones
                $extDoc = $docPropiedad->getExtension();
                $extImg = $imgMascota->getExtension();

                $nombreDoc = "Propiedad.{$extDoc}";
                $nombreImg = "Fotografia.{$extImg}";

                $rutaDocCompleta = $rutaBase . '/' . $nombreDoc;
                $rutaImgCompleta = $rutaBase . '/' . $nombreImg;

                // Si existen, los elimina
                if (file_exists($rutaDocCompleta)) unlink($rutaDocCompleta);
                if (file_exists($rutaImgCompleta)) unlink($rutaImgCompleta);

                // Mover archivos
                if (!$docPropiedad->move($rutaBase, $nombreDoc)) {
                    throw new \Exception('Error al guardar el documento de propiedad.');
                }

                if (!$imgMascota->move($rutaBase, $nombreImg)) {
                    throw new \Exception('Error al guardar la imagen de la mascota.');
                }

                // URLs accesibles desde navegador
                $urlDoc = base_url("uploads/{$idUsuario}/{$nombreMascota}/{$nombreDoc}");
                $urlImg = base_url("uploads/{$idUsuario}/{$nombreMascota}/{$nombreImg}");

                // 📝 Actualizar mascota con rutas de documentos
                $this->mascota->update($idMascota, [
                    'doc_propiedad' => $urlDoc,
                    'fotografia'    => $urlImg,
                ]);

                // 🔢 Generar folio y solicitud
                $numeroConsecutivo = str_pad($idMascota, 5, "0", STR_PAD_LEFT);
                $anio = date('Y');
                $fecha = date('Ymd');

                // $folio = "SMADSOT/IBA/EMP-$numeroConsecutivo/$anio";
                $solicitud = "SOL-$fecha-$numeroConsecutivo";

                // 🗃️ Guardar en tabla temporal
                $this->temporal->save([
                    'id_usuario' => $idUsuario,
                    'id_mascota' => $idMascota,
                    'curp_mascota' => $curpMascota,
                    'numero_solicitud' => $solicitud
                ]);

                // 📧 Enviar correo de confirmación
                $correo = $session->get('correo');
                $email = \Config\Services::email();
                $email->setTo($correo);
                $email->setSubject('Pre Registro de Mascota');
                $email->setMessage("
                Estimado usuario:<br><br>
                Le informamos que ha concluido exitosamente el pre-registro para la solicitud de certificado.<br>
                <strong>ID de Mascota:</strong> $curpMascota<br>
                <strong>Solicitud:</strong> $solicitud<br><br>
                Favor de mantenerse al pendiente de su correo electrónico, ya que ahí recibirá actualizaciones respecto al estado de sus certificados.<br><br>
                Atentamente,<br>
                Instituto del Bienestar Animal");

                if (!$email->send()) {
                    log_message('error', 'Error al enviar correo: ' . $email->printDebugger(['headers']));
                }

                $db->transComplete(); // ✅ Confirmar transacción

                // ✅ Guardar mensaje y rutas en flashdata para mostrar en la redirección
                $session->setFlashdata('mensaje', 'Mascota registrada y documentos cargados correctamente.');
                $session->setFlashdata('rutaMascota', $urlDoc);
                $session->setFlashdata('rutaImagen', $urlImg);
                $session->setFlashdata('curp_mascota', $curpMascota);
                $session->setFlashdata('solicitud', $solicitud);

                // ✅ Redirigir (PRG)
                return redirect()->to(base_url("usuario/muestraDatos/{$idMascota}"));
            } catch (\Exception $e) {
                $db->transRollback(); // ❌ Revertir cambios en caso de error
                log_message('error', '[REGISTRO MASCOTA] ' . $e->getMessage());
                $data = ['error' => 'Ocurrió un error al registrar la mascota: ' . $e->getMessage()];
                $this->header();
                echo view('usuario/mascotas', $data);
                echo view('footer');
                return;
            }
        }
    }

    public function muestraDatos($id_mascota)
    {
        if (!isset($this->session->id_usuario)) {
            return redirect()->to(base_url('login'));
        }

        $session = session();
        $usuario = $this->usuario->find($session->id_usuario);
        $mascota = $this->mascota->find($id_mascota);

        $data = [
            'usuario' => $usuario,
            'mascota' => $mascota,
            'mensaje' => $session->getFlashdata('mensaje'),
            'rutaMascota' => $session->getFlashdata('rutaMascota'),
            'rutaImagen' => $session->getFlashdata('rutaImagen'),
            'curp_mascota' => $session->getFlashdata('curp_mascota'),
            'solicitud' => $session->getFlashdata('solicitud')
        ];

        $this->header();
        echo view('usuario/muestraDatos', $data);
        echo view('footer');
    }

    public function editarPassword()
    {
        if (!isset($this->session->id_usuario)) {
            return redirect()->to(base_url() . 'login');
        }
        $session = session();
        $usuarios = $this->usuario->where('id_usuario', $session->id_usuario)->first();
        $data = ['usuario' => $usuarios];

        $this->header();
        echo view('usuario/editarPassword', $data);
        echo view('footer');
    }
    public function updatePassword()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglasUpdatePassword)) {
            $session = session();
            $idUsuario = $session->id_usuario;
            $hash = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);

            $this->usuario->update($idUsuario, ['password' => $hash]);

            $usuarios = $this->usuario->where('id_usuario', $session->id_usuario)->first();
            $data = ['usuario' => $usuarios, 'mensaje' => 'Contraseña actualizada'];

            $this->header();
            echo view('usuario/editarPassword', $data);
            echo view('footer');
        } else {
            $session = session();
            $usuarios = $this->usuario->where('id_usuario', $session->id_usuario)->first();
            $data = ['usuario' => $usuarios, 'validation' => $this->validator];

            $this->header();
            echo view('usuario/editarPassword', $data);
            echo view('footer');
        }
    }
    public function documentos()
    {
        if (!isset($this->session->id_usuario)) {
            return redirect()->to(base_url() . 'login');
        }
        $session = session();
        $idUsuario = $session->id_usuario;
        $curpUsuario = $session->curp;
        $usuarios = $this->usuario->where('id_usuario', $session->id_usuario)->first();
        $data = ['usuario' => $usuarios];
        $this->header();
        echo view('usuario/documentos', $data);
        echo view('footer');
    }
    public function editarMascota($id_mascota)
    {
        if (!isset($this->session->id_usuario)) {
            return redirect()->to(base_url() . 'login');
        }
        $session = session();
        $mascotas = $this->mascota->where('id_mascota', $id_mascota)->first();
        $data = ['mascota' => $mascotas];

        $this->header();
        echo view('usuario/editarMascota', $data);
        echo view('footer');
    }
    public function actualizarMascota()
    {
        if (!isset($this->session->id_usuario)) {
            return redirect()->to(base_url() . 'login');
        }
        if ($this->request->getMethod() == "post" && $this->validate($this->reglasMascota)) {
            $this->mascota->update($this->request->getPost('id_mascota'), [
                'nombre' => $this->request->getPost('nombre'),
                'edad' => $this->request->getPost('edad'),
                'raza' => $this->request->getPost('raza'),
                'especie' => $this->request->getPost('especie'),
                'vacunado' => $this->request->getPost('vacunado'),
                'esterilizado' => $this->request->getPost('esterilizado'),
                'caracteristicas' => $this->request->getPost('caracteristicas'),
                'sexo' => $this->request->getPost('sexo'),
            ]);
            return redirect()->to(base_url() . 'usuario');
        } else {
            $data = ['validation' => $this->validator];
            $this->header();
            echo view('usuario/mascotas', $data);
            echo view('footer');
        }
    }

    public function eliminarMascota($id_mascota)
    {
        $this->mascota->update($id_mascota, ['activo' => 0]);
        return redirect()->to(base_url() . 'usuario');
    }

    public function muestraAcuse($id_mascota)
    {
        if (!isset($this->session->id_usuario)) {
            return redirect()->to(base_url() . 'login');
        }
        $data['id_mascota'] = $id_mascota;
        $this->header();
        echo view('usuario/certificado', $data);
        echo view('footer');
    }

    public function verAcuse($id_certificado)
    {
        $id_notificacion = $this->request->uri->getSegment(4);
        $this->notificaciones->update(['id_notificacion' => $id_notificacion], ['activo' => 0]);
        /*if (!isset($this->session->id_usuario)) {
            return redirect()->to(base_url() . 'login');
        }*/
        $data['id_certificado'] = $id_certificado;
        $this->header();
        echo view('usuario/verAcuse', $data);
        echo view('footer');
    }

    public function servicios()
    {
        if (!isset($this->session->id_usuario)) {
            return redirect()->to(base_url() . 'login');
        }
        $this->header();
        echo view('usuario/servicios');
        echo view('footer');
    }
    public function preguntas()
    {
        if (!isset($this->session->id_usuario)) {
            return redirect()->to(base_url() . 'login');
        }
        $this->header();
        echo view('usuario/preguntas');
        echo view('footer');
    }

    public function verDocumentos()
    {
        if (!isset($this->session->id_usuario)) {
            return redirect()->to(base_url() . 'login');
        }
        $session = session();
        $usuarios = $this->usuario->where('id_usuario', $session->id_usuario)->first();
        $data = ['usuario' => $usuarios];

        // Pasar los archivos a la vista
        $this->header();
        echo view('usuario/verDocumentos', $data);
        echo view('footer');
    }

    public function estados($activo = 1)
    {
        if (!isset($this->session->id_usuario)) {
            return redirect()->to(base_url() . 'login');
        }
        $db = \Config\Database::connect();
        $builder = $db->table('mascotas', 'temporal');
        $session = \Config\Services::session();
        $sessionId = $session->get('id_usuario');
        $builder->join('usuarios', 'mascotas.id_usuario = usuarios.id_usuario', 'inner');
        $builder->join('temporal', 'temporal.id_mascota = mascotas.id_mascota', 'inner');
        $builder->distinct()->select('mascotas.id_mascota, mascotas.nombre, mascotas.especie, mascotas.sexo, mascotas.edad, mascotas.raza ,mascotas.esterilizado,mascotas.vacunado, mascotas.color, mascotas.caracteristicas, usuarios.id_usuario, temporal.id_temp, temporal.estado');
        $builder->where('usuarios.id_usuario', $sessionId);
        $builder->where('mascotas.activo', $activo);
        $builder->where('temporal.activo', $activo);
        $query = $builder->get();
        $result = $query->getResult();
        //print_r($result);
        $data['result'] = $result;
        $this->header();
        echo view('usuario/estados', $data);
        echo view('footer');
    }
    public function recoveryPassword()
    {
        echo view('header');
        echo view('usuario/recoveryPassword');
        echo view('footer');
    }
    public function newPassword()
    {
        $correo = $this->request->getPost('correo');
        $correo = $this->usuario->where('correo', $correo)->first();
        if (!$correo) {
            $data = ['mensaje' => 'No se encontro el correo ingresado'];
            echo view('header');
            echo view('usuario/recoveryPassword', $data);
            echo view('footer');
        }
        echo view('header');
        echo view('usuario/newPassword');
        echo view('footer');
    }
    public function updateRecoveryPassword()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglasUpdatePassword)) {
            $correo = $this->request->getPost('correo');
            $hash = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
            $correo = $this->usuario->where('correo', $correo)->first();
            $this->usuario->update($correo, ['password' => $hash]);
            $data = ['mensaje' => 'Contraseña actualizada'];
            echo view('header');
            echo view('login', $data);
            echo view('footer');
        } else {
            $data = ['validation' => $this->validator, 'mensaje' => 'Las contraseñas con coinciden, favor de verificar'];
            echo view('header');
            echo view('usuario/newPassword', $data);
            echo view('footer');
        }
    }
    public function header($activo = 1)
    {
        // if (!isset($this->session->id_usuario)) {
        //     return redirect()->to(base_url() . 'login');
        // }
        $session = session();
        $id_usuario = $session->id_usuario;
        $notificaciones = $this->notificaciones
            ->where('id_usuario', $session->id_usuario)
            ->where('activo', $activo)
            ->findAll();
        $contador = $this->notificaciones
            ->where('id_usuario', $session->id_usuario)
            ->where('activo', $activo)
            ->countAllResults();
        $data = ['notificaciones' => $notificaciones, 'contador' => $contador];
        echo view('usuario/header', $data);
    }

    public function updateFiles()
    {
        $uuid = $this->request->uri->getSegment(3);
        $notificacion = $this->notificaciones
            ->where('uuid', $uuid)
            ->where('activo', 1)
            ->first();
        if (!$notificacion) {
            return redirect()->to(base_url())->with('error', 'El enlace ya no es válido o ha expirado.');
        }
        $id_usuario = $notificacion['id_usuario'];
        $id_notificacion = $notificacion['id_notificacion'];

        $data = [
            'id_usuario' => $id_usuario,
            'id_notificacion' => $id_notificacion,
            'uuid' => $uuid,
        ];
        $this->header();
        echo view('usuario/updateFiles', $data);
        echo view('footer');
    }

    public function actualizarDocumentos()
    {
        // 1. Recuperar el UUID desde la URL
        $uuid = $this->request->getPost('uuid');

        // 2. Buscar la notificación activa por UUID
        $notificacion = $this->notificaciones
            ->where('uuid', $uuid)
            ->where('activo', 1)
            ->first();

        if (!$notificacion) {
            return redirect()->to(base_url())->with('error', 'Este enlace ya no es válido o ha expirado.');
        }

        $idUsuario = $notificacion['id_usuario'];
        $id_notificacion = $notificacion['id_notificacion'];

        // 3. Validar archivos
        $validacion = $this->validate([
            'doc_identificacion' => [
                'uploaded[doc_identificacion]',
                'mime_in[doc_identificacion,application/pdf,image/png,image/jpg,image/jpeg]',
            ],
            'doc_domicilio' => [
                'uploaded[doc_domicilio]',
                'mime_in[doc_domicilio,application/pdf,image/png,image/jpg,image/jpeg]',
            ],
            'doc_curp' => [
                'uploaded[doc_curp]',
                'mime_in[doc_curp,application/pdf,image/png,image/jpg,image/jpeg]',
            ]
        ]);

        if ($validacion) {
            // 4. Preparar rutas
            $rutaBase = './uploads/' . $idUsuario . '/';
            if (!is_dir($rutaBase)) {
                mkdir($rutaBase, 0755, true);
            }

            $extIdent = pathinfo($_FILES['doc_identificacion']['name'], PATHINFO_EXTENSION);
            $extDomicilio = pathinfo($_FILES['doc_domicilio']['name'], PATHINFO_EXTENSION);
            $extCurp = pathinfo($_FILES['doc_curp']['name'], PATHINFO_EXTENSION);

            // 5. Borrar anteriores si existen
            @unlink($rutaBase . 'INE.' . $extIdent);
            @unlink($rutaBase . 'CURP.' . $extCurp);
            @unlink($rutaBase . 'Domicilio.' . $extDomicilio);

            // 6. Mover nuevos archivos
            $this->request->getFile('doc_identificacion')->move($rutaBase, 'INE.' . $extIdent);
            $this->request->getFile('doc_curp')->move($rutaBase, 'CURP.' . $extCurp);
            $this->request->getFile('doc_domicilio')->move($rutaBase, 'Domicilio.' . $extDomicilio);

            // 7. Rutas públicas si deseas mostrarlas
            $rutaDomicilio = base_url($rutaBase . 'Domicilio.' . $extDomicilio);
            $rutaCurp = base_url($rutaBase . 'CURP.' . $extCurp);
            $rutaIdentificacion = base_url($rutaBase . 'INE.' . $extIdent);

            // 8. Desactivar notificación
            $this->notificaciones->update($id_notificacion, ['activo' => 0]);

            // 9. Mensaje de éxito
            $data = [
                'mensaje' => 'Documentos enviados correctamente',
                'rutaDomicilio' => $rutaDomicilio,
                'rutaCurp' => $rutaCurp,
                'rutaIdentificacion' => $rutaIdentificacion,
            ];

            echo view('header');
            echo view('login', $data); // puedes cambiar esto por una vista más adecuada si no hay login aún
            echo view('footer');
        } else {
            // Mostrar errores
            $data = ['validation' => $this->validator];
            echo view('header');
            echo view('usuario/updateFiles', $data);
            echo view('footer');
        }
    }


    public function updateFilesCertificado($uuid = null)
    {
        if (!isset($this->session->id_usuario)) {
            return redirect()->to(base_url() . 'login');
        }
        if (!$uuid) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Enlace inválido.");
        }
        $notificacion = $this->notificaciones->where('uuid', $uuid)->first();
        if (!$notificacion) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Notificación no encontrada.");
        }
        // Obtén los datos desde la notificación
        $id_usuario = $notificacion['id_usuario'];
        $id_mascota = $notificacion['id_mascota'];
        $id_notificacion = $notificacion['id_notificacion']; // el ID autoincremental
        // Obtener datos de la mascota
        $mascota = $this->mascota->find($id_mascota);

        if (!$mascota) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Mascota no encontrada.");
        }
        $data = [
            'id_usuario'      => $id_usuario,
            'id_mascota'      => $id_mascota,
            'id_notificacion' => $id_notificacion,
            'nombre'          => $mascota['nombre'],
            'resultados'      => [$mascota]
        ];

        $this->header();
        echo view('usuario/updateFilesCertificado', $data);
        echo view('footer');
    }


    public function updateDocumentosMascota()
    {
        $session = session();

        if (!isset($session->id_usuario)) {
            return redirect()->to(base_url() . 'login');
        }

        if ($this->request->getMethod() == "post") {
            $idMascota      = $this->request->getPost('id_mascota');
            $nombreMascota  = $this->request->getPost('nombre');
            $id_notificacion = $this->request->getPost('id_notificacion');
            $idUsuario      = $session->id_usuario;
            $curpUsuario    = $session->curp;

            // Verificar que la notificación le pertenece al usuario actual
            $notificacion = $this->notificaciones
                ->where('id_notificacion', $id_notificacion)
                ->where('id_usuario', $idUsuario)
                ->first();

            if (!$notificacion) {
                return redirect()->to(base_url() . 'usuario')->with('error', 'Notificación no válida.');
            }

            // Validar archivos
            $validacion = $this->validate([
                'doc_propiedadd' => [
                    'uploaded[doc_propiedadd]',
                    'mime_in[doc_propiedadd,application/pdf,image/png,image/jpg,image/jpeg]',
                ],
                'img_mascota' => [
                    'uploaded[img_mascota]',
                    'mime_in[img_mascota,image/jpg,image/jpeg,image/png]',
                ]
            ]);

            if (!$validacion) {
                return redirect()->back()->withInput()->with('validation', $this->validator);
            }

            // Procesar archivos
            $doc_propiedadd = $this->request->getFile('doc_propiedadd');
            $img_mascota    = $this->request->getFile('img_mascota');

            $extensionPropiedad = $doc_propiedadd->getExtension();
            $extensionImagen    = $img_mascota->getExtension();

            $rutaDirectorio = FCPATH . 'uploads/' . $idUsuario . '/' . $nombreMascota;
            if (!is_dir($rutaDirectorio)) {
                mkdir($rutaDirectorio, 0777, true);
            }

            $rutaPropiedad = $rutaDirectorio . '/Propiedad.' . $extensionPropiedad;
            $rutaImagen    = $rutaDirectorio . '/Fotografia.' . $extensionImagen;

            // Eliminar archivos anteriores si existen
            if (file_exists($rutaPropiedad)) unlink($rutaPropiedad);
            if (file_exists($rutaImagen)) unlink($rutaImagen);

            // Mover archivos
            $doc_propiedadd->move($rutaDirectorio, 'Propiedad.' . $extensionPropiedad);
            $img_mascota->move($rutaDirectorio, 'Fotografia.' . $extensionImagen);

            // Guardar rutas accesibles
            $urlPropiedad = base_url('uploads/' . $idUsuario . '/' . $nombreMascota . '/Propiedad.' . $extensionPropiedad);
            $urlImagen    = base_url('uploads/' . $idUsuario . '/' . $nombreMascota . '/Fotografia.' . $extensionImagen);

            // Actualizar datos de la mascota
            $this->mascota->update($idMascota, [
                'doc_propiedad' => $urlPropiedad,
                'fotografia'    => $urlImagen
            ]);

            // Desactivar notificación
            $this->notificaciones->update($id_notificacion, ['activo' => 0]);

            // Obtener datos actualizados para mostrar mensaje
            $mascota  = $this->mascota->find($idMascota);
            $usuario  = $this->usuario->find($idUsuario);

            $data = [
                'mascota' => $mascota,
                'usuario' => $usuario,
                'mensaje' => 'Documentos enviados correctamente',
                'rutaMascota' => $urlPropiedad,
                'rutaImagen'  => $urlImagen
            ];

            $this->estados();
        }

        // Si no es POST
        return redirect()->to(base_url('usuario'))->with('error', 'Método no permitido');
    }


    public function generarAcuse($id_certificado, $activo = 1)
    {
        $db = \Config\Database::connect();

        $builder = $db->table('certificados');
        $builder->select('certificados.folio, certificados.fecha_alta, certificados.id_certificado, certificados.solicitud, certificados.curp_mascota');
        $builder->select('usuarios.nombre AS usuario_nombre, usuarios.nombre_entidad, usuarios.calle, usuarios.colonia, usuarios.numero, usuarios.cp, usuarios.cve_entidad, usuarios.telefono, usuarios.correo', 'usuarios.id_usuario');
        $builder->select('mascotas.nombre, mascotas.especie, mascotas.edad, mascotas.vacunado, mascotas.esterilizado, mascotas.sexo, mascotas.raza, mascotas.caracteristicas, mascotas.fotografia');
        $builder->join('usuarios', 'certificados.id_usuario = usuarios.id_usuario', 'inner');
        $builder->join('mascotas', 'certificados.id_mascota = mascotas.id_mascota', 'inner');
        $builder->where('certificados.id_certificado', $id_certificado);
        $builder->where('certificados.activo', $activo);
        $query = $builder->get();

        $result = $query->getResult();

        // Crear PDF
        $pdf = new \FPDF('P', 'mm', 'letter');
        $pdf->AddPage();
        $pdf->Image(base_url('img/ACUSE.png'), 0, 0, 215.9, 279.4); // Imagen de fondo

        $pdf->SetMargins(20, 30, 20);
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->SetTextColor(0);
        $pdf->SetXY(20, 35); // 25 mm de margen izquierdo, y posición vertical en 55 mm
        $pdf->SetFont('Arial', 'B', 13);
        $pdf->MultiCell(165, 7, utf8_decode('ACUSE RECIBO DE ADMISIÓN DE DOCUMENTACIÓN PARA EMPADRONAMIENTO DE PERRO O GATO'), 0, 'L');

        // $pdf->Cell(0, -30, utf8_decode('DE PERRO O GATO'), 0, 1, 'C');
        $pdf->Ln(10);

        foreach ($result as $row) {
            $fechaSolicitud = Time::parse($row->fecha_alta)->toLocalizedString('d MMMM yyyy');
            // $fechaAcuse = Time::now()->toLocalizedString('d MMMM yyyy');
            // $horaAcuse = Time::now()->toLocalizedString('HH:mm');

            $propietario = $row->usuario_nombre;
            $especie = $row->especie;
            $nombreMascota = $row->nombre;
            // $folio = $row->folio;
            $curp_mascota = $row->curp_mascota;
            $solicitud = $row->solicitud;
            $fechaEmision = $row->fecha_alta;

            $fechaEmision = Time::parse($fechaEmision);

            // Separar y formatear por partes
            $soloFecha = $fechaEmision->toLocalizedString('d MMMM yyyy');
            $soloHora  = $fechaEmision->toLocalizedString('HH:mm');
            $pdf->SetFont('Arial', '', 12);
            // Texto con formato HTML simulado
            $texto = "A fecha $fechaSolicitud, se admite la notificación que tiene como destinatario a $propietario teniente del $especie, $nombreMascota con identificación oficial $curp_mascota, de la solicitud número $solicitud, referente al asunto Empadronamiento en el Padrón Estatal de Perros y Gatos.

Se expide la presente comunicación (que realiza el sistema de forma automatizada), para acreditar la fecha y hora de materialización de la notificación, que deberá ser presentada en un plazo de 10 días desde la creación del mismo, para recibir los documentos correspondientes al registro de su animal de compañía.

En Puebla a $soloFecha a las $soloHora.";
            $pdf->MultiCell(170, 6, utf8_decode($texto), 0, 'J');
            $pdf->SetFont('Arial', '', 12);
            $pdf->Ln(10);
        }

        $this->response->setHeader('Content-Type', 'application/pdf');
        $pdf->Output("Acuse_Recibo_Empadronamiento.pdf", "I");
    }

    private function WriteHTML($pdf, $html)
    {
        $html = str_replace("\n", '', $html);
        $a = preg_split('/<(.*)>/U', $html, -1, PREG_SPLIT_DELIM_CAPTURE);
        foreach ($a as $i => $e) {
            if ($i % 2 == 0) {
                $pdf->Write(6, utf8_decode($e));
            } else {
                if ($e == 'b') {
                    $pdf->SetFont('', 'B');
                } elseif ($e == '/b') {
                    $pdf->SetFont('', '');
                } elseif ($e == 'br') {
                    $pdf->Ln(6);
                }
            }
        }
    }


    private function generarCurpMascotaDesdeNombreCompleto($nombreCompleto, $mascota, $idMascota)
    {
        $partes = explode(' ', strtoupper(trim($nombreCompleto)));

        $total = count($partes);

        // Al menos deben ser 3 palabras (nombre + dos apellidos)
        if ($total < 3) {
            throw new \Exception('Nombre del propietario no es válido para generar CURP.');
        }

        // Apellidos al final
        $apellidoPaterno = $partes[$total - 2]; // penúltimo
        $apellidoMaterno = $partes[$total - 1]; // último

        // Todo lo anterior se considera el nombre
        $nombrePersona = implode(' ', array_slice($partes, 0, $total - 2));

        // Iniciales
        $inicialPaterno = substr($apellidoPaterno, 0, 2);
        $inicialMaterno = substr($apellidoMaterno, 0, 1);
        $inicialNombre = substr($nombrePersona, 0, 1);

        // Mascota
        $nombreMascota = strtoupper($mascota['nombre']);
        $especie = strtoupper($mascota['especie']);
        $sexo = strtoupper($mascota['sexo']);
        $esterilizado = strtoupper($mascota['esterilizado']);

        $claveNombreMascota = $nombreMascota;
        $letraEspecie = $especie === 'PERRO' ? 'P' : 'G';
        $letraSexo = $sexo === 'MACHO' ? 'M' : 'H';
        $letraEsterilizado = $esterilizado === 'SI' ? 'S' : 'N';

        $consecutivo = str_pad($idMascota, 2, '0', STR_PAD_LEFT);
        $fecha = date('my'); // mmYY

        // CURP personalizado
        $curp = "{$inicialPaterno}{$inicialMaterno}{$inicialNombre}-{$claveNombreMascota}{$letraEspecie}{$letraSexo}{$letraEsterilizado}{$consecutivo}{$fecha}";
        return $curp;
    }
}
