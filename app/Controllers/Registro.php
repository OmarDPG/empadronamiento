<?php

namespace App\Controllers;

use App\Models\UsuarioModel;
use App\Controllers\BaseController;
use App\Models\EntidadesModel;
use CodeIgniter\Files\File;

class Registro extends BaseController
{
    protected $usuario;
    protected $reglas;
    protected $session;
    protected $entidades;
    public function __construct()
    {
        $this->usuario = new UsuarioModel();
        $this->entidades = new EntidadesModel();
        $this->session = session();
        helper(['form']);
        $this->reglas = [
            'nombre' => [
                'rules' => 'required|regex_match[/^[a-záéíóúñ\s]+$/iu]',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio',
                    'regex_match' => 'El campo {field} solo puede contener letras, espacios y acentos'
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
                    'is_unique' => 'El numero ingresado ya ha sido registrado',
                    'numeric' => 'Ingrese un numero valido',
                    'exact_length' => 'Ingrese un numero valido'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[8]|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()\-_=+{};:,<.>]).*$/]',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio',
                    'min_length' => 'La contraseña debe de tener al menos 8 caracteres',
                    'regex_match' => 'La contraseña debe de contener mayusculas, numeros y un caracter especial'
                ]
            ],
            'confpassword' => [
                'rules' => 'required|min_length[8]|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()\-_=+{};:,<.>]).*$/]|matches[password]',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio',
                    'min_length' => 'La contraseña debe de tener al menos 8 caracteres',
                    'regex_match' => 'La contraseña debe de contener mayusculas, numeros y un caracter especial',
                    'matches' => 'Las contraseñas no coinciden'
                ]
            ]
        ];
    }

    public function index()
    {
        if (isset($this->session->id_usuario)) {
            return redirect()->to(base_url() . 'usuario');
        }
        $entidades = $this->entidades->findAll();
        $data = ['entidades' => $entidades];
        echo view('header');
        echo view('registro1', $data);
        echo view('footer');
    }
    public function insertar()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $correo = $this->request->getPost('correo');

            $hash = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);

            $nombreEntidad = $this->request->getPost('nombre_entidad');
            $entidad = $this->entidades->where('nombre_entidad', $nombreEntidad)->first();

            if (!$entidad) {
                $data = ['validation' => $this->validator, 'entidades' => $this->entidades->findAll(), 'error' => 'Entidad no válida'];
                echo view('header');
                echo view('registro1', $data);
                echo view('footer');
                return;
            }

            $validacion = $this->validate([
                'doc_identificacion' => [
                    'rules' => 'uploaded[doc_identificacion]|mime_in[doc_identificacion,application/pdf,image/png,image/jpg,image/jpeg]',
                    'errors' => [
                        'uploaded' => 'Debe subir el documento de identificación',
                        'mime_in' => 'El archivo debe ser PDF, PNG, JPG o JPEG'
                    ]
                ],
                'doc_domicilio' => [
                    'rules' => 'uploaded[doc_domicilio]|mime_in[doc_domicilio,application/pdf,image/png,image/jpg,image/jpeg]',
                    'errors' => [
                        'uploaded' => 'Debe subir el comprobante de domicilio',
                        'mime_in' => 'El archivo debe ser PDF, PNG, JPG o JPEG'
                    ]
                ],
                'doc_curp' => [
                    'rules' => 'uploaded[doc_curp]|mime_in[doc_curp,application/pdf,image/png,image/jpg,image/jpeg]',
                    'errors' => [
                        'uploaded' => 'Debe subir el documento CURP',
                        'mime_in' => 'El archivo debe ser PDF, PNG, JPG o JPEG'
                    ]
                ]
            ]);

            if (!$validacion) {
                $data = ['validation' => $this->validator, 'entidades' => $this->entidades->findAll()];
                echo view('header');
                echo view('registro1', $data);
                echo view('footer');
                return;
            }

            // Obtener archivos usando API de CodeIgniter
            $docIdentificacion = $this->request->getFile('doc_identificacion');
            $docDomicilio = $this->request->getFile('doc_domicilio');
            $docCurp = $this->request->getFile('doc_curp');

            // Verificar que los archivos son válidos
            if (!$docIdentificacion->isValid() || !$docDomicilio->isValid() || !$docCurp->isValid()) {
                $data = ['error' => 'Error en los archivos subidos', 'entidades' => $this->entidades->findAll()];
                echo view('header');
                echo view('registro1', $data);
                echo view('footer');
                return;
            }

            $idEntidad = $entidad['id_entidad'];
            $cve_entidad = $entidad['cve_entidad'];

            // Obtener extensiones de forma segura
            $extensionIdentificacion = $docIdentificacion->getExtension();
            $extensionDomicilio = $docDomicilio->getExtension();
            $extensionCurp = $docCurp->getExtension();

            // Validar que las extensiones no estén vacías
            if (empty($extensionIdentificacion) || empty($extensionDomicilio) || empty($extensionCurp)) {
                $data = ['error' => 'Error: archivos sin extensión válida', 'entidades' => $this->entidades->findAll()];
                echo view('header');
                echo view('registro1', $data);
                echo view('footer');
                return;
            }

            $db = \Config\Database::connect();
            $db->transStart();

            try {
                // Guardar usuario
                $this->usuario->save([
                    'nombre' => $this->request->getPost('nombre'),
                    'correo' => $this->request->getPost('correo'),
                    'telefono' => $this->request->getPost('telefono'),
                    'nombre_entidad' => $this->request->getPost('nombre_entidad'),
                    'id_entidad' => $idEntidad,
                    'cve_entidad' => $cve_entidad,
                    'calle' => $this->request->getPost('calle'),
                    'colonia' => $this->request->getPost('colonia'),
                    'numero' => $this->request->getPost('numero'),
                    'cp' => $this->request->getPost('cp'),
                    'password' => $hash
                ]);
                $lastID = $this->usuario->getInsertID();

                if (!$lastID) {
                    throw new \Exception('Error al crear el usuario');
                }

                // Crear directorio si no existe
                $directorioBase = FCPATH . 'uploads/' . $lastID;
                if (!is_dir($directorioBase)) {
                    if (!mkdir($directorioBase, 0755, true)) {
                        throw new \Exception('No se pudo crear el directorio de archivos');
                    }
                }

                // Rutas completas para verificar existencia
                $rutaIdentificacion1 = $directorioBase . '/INE.' . $extensionIdentificacion;
                $rutaCurp1 = $directorioBase . '/CURP.' . $extensionCurp;
                $rutaDomicilio1 = $directorioBase . '/Domicilio.' . $extensionDomicilio;

                // Eliminar archivos existentes
                if (file_exists($rutaIdentificacion1)) {
                    unlink($rutaIdentificacion1);
                }
                if (file_exists($rutaCurp1)) {
                    unlink($rutaCurp1);
                }
                if (file_exists($rutaDomicilio1)) {
                    unlink($rutaDomicilio1);
                }

                // Mover archivos con verificación
                if (!$docDomicilio->move($directorioBase, 'Domicilio.' . $extensionDomicilio)) {
                    throw new \Exception('Error al mover el comprobante de domicilio');
                }

                if (!$docIdentificacion->move($directorioBase, 'INE.' . $extensionIdentificacion)) {
                    throw new \Exception('Error al mover el documento de identificación');
                }

                if (!$docCurp->move($directorioBase, 'CURP.' . $extensionCurp)) {
                    throw new \Exception('Error al mover el documento CURP');
                }

                // Verificar que los archivos se movieron correctamente
                if (!file_exists($rutaDomicilio1) || !file_exists($rutaIdentificacion1) || !file_exists($rutaCurp1)) {
                    throw new \Exception('Error: archivos no se guardaron correctamente');
                }

                // Generar URLs públicas (sin ./)
                $rutaDomicilio = base_url('uploads/' . $lastID . '/Domicilio.' . $extensionDomicilio);
                $rutaCurp = base_url('uploads/' . $lastID . '/CURP.' . $extensionCurp);
                $rutaIdentificacion = base_url('uploads/' . $lastID . '/INE.' . $extensionIdentificacion);

                // Actualizar rutas en base de datos
                $updateResult = $this->usuario->update($lastID, [
                    'ruta_domicilio' => $rutaDomicilio,
                    'ruta_identificacion' => $rutaIdentificacion,
                    'ruta_curp' => $rutaCurp
                ]);

                if (!$updateResult) {
                    throw new \Exception('Error al actualizar las rutas de los documentos');
                }

                $db->transComplete();

                if ($db->transStatus() === false) {
                    throw new \Exception('Error en la transacción de base de datos');
                }
            } catch (\Exception $e) {
                $db->transRollback();
                
                // Eliminar directorio y archivos si se crearon
                if (isset($lastID) && is_dir(FCPATH . 'uploads/' . $lastID)) {
                    $this->eliminarDirectorio(FCPATH . 'uploads/' . $lastID);
                }

                log_message('error', 'Error en registro: ' . $e->getMessage());
                
                $data = [
                    'error' => 'Error al procesar el registro: ' . $e->getMessage(),
                    'entidades' => $this->entidades->findAll()
                ];
                echo view('header');
                echo view('registro1', $data);
                echo view('footer');
                return;
            }

            $data = ['mensaje' => 'Documentos enviados correctamente', 'rutaDomicilio' => $rutaDomicilio, 'rutaCurp' => $rutaCurp, 'rutaIdentificacion' => $rutaIdentificacion];

            // Enviar correo de confirmación
            try {
                $email = \Config\Services::email();
                $email->setTo($correo);
                $email->setSubject('Finalización de Registro');
                $email->setMessage('Estimado usuario, ha concluido su registro al Sistema de Empadronamiento de Perros y Gatos del Estado de Puebla.
                            <br><br>
                            Favor de mantenerse al pendiente de su correo electrónico, pues en él recibirá actualizaciones con respecto al trámite solicitado.
                            <br><br>
                            Atentamente,<br>
                            Instituto del Bienestar Animal');

                if (!$email->send()) {
                    log_message('error', 'Error al enviar correo de registro a ' . $correo . ': ' . $email->printDebugger(['headers']));
                }
            } catch (\Exception $e) {
                log_message('error', 'Excepción al enviar correo de registro: ' . $e->getMessage());
            }

            return redirect()->to(base_url('registro/finalizacion'));
        } else {
            $data = ['validation' => $this->validator, 'entidades' => $this->entidades->findAll()];
            echo view('header');
            echo view('registro1', $data);
            echo view('footer');
        }
    }

    /**
     * Elimina recursivamente un directorio y su contenido
     */
    private function eliminarDirectorio($directorio)
    {
        if (!is_dir($directorio)) {
            return false;
        }

        $archivos = array_diff(scandir($directorio), ['.', '..']);
        foreach ($archivos as $archivo) {
            $ruta = $directorio . '/' . $archivo;
            is_dir($ruta) ? $this->eliminarDirectorio($ruta) : unlink($ruta);
        }
        
        return rmdir($directorio);
    }

    public function finalizacion()
    {
        echo view('header');
        echo view('finalizacion');
        echo view('footer');
    }

    public function testCorreo()
    {
        $email = \Config\Services::email();

        $email->setFrom(
            'padrones.iba@puebla.gob.mx',
            'Instituto del Bienestar Animal'
        );
        $email->setTo('omar.ch0896@mail.com');
        $email->setSubject('Prueba final CI4');
        $email->setMessage('Correo de prueba');

        if (! $email->send(false)) { // ← importante: false
            echo $email->printDebugger(['headers', 'subject', 'body']);
        } else {
            echo 'ENVIADO';
        }
    }
}
