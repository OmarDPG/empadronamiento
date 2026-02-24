<?php

namespace App\Controllers;

use App\Libraries\DataTale;
use CodeIgniter\API\ResponseTrait;
use App\Models\UsuarioModel;
use App\Models\MascotasModel;
use App\Controllers\BaseController;
use App\Models\CertificadosModel;
use App\Models\AdminModel;
use App\Models\EntidadesModel;
use App\Models\NotificacionesModel;
use Config\Services;
use App\Models\TemporalModel;
use CodeIgniter\Controller;
use Faker\Provider\Base;
use CodeIgniter\I18n\Time;
use FPDF;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class PDF_Rotate extends \FPDF
{
    protected $angle = 0;

    function Rotate($angle, $x = -1, $y = -1)
    {
        if ($x == -1) {
            $x = $this->x;
        }
        if ($y == -1) {
            $y = $this->y;
        }

        if ($this->angle != 0) {
            $this->_out('Q');
        }

        $this->angle = $angle;

        if ($angle != 0) {
            $angle *= M_PI / 180;
            $c = cos($angle);
            $s = sin($angle);
            $cx = $x * $this->k;
            $cy = ($this->h - $y) * $this->k;

            $this->_out(sprintf(
                'q %.5F %.5F %.5F %.5F %.5F %.5F cm',
                $c,
                $s,
                -$s,
                $c,
                $cx - $c * $cx + $s * $cy,
                $cy - $s * $cx - $c * $cy
            ));
        }
    }

    function _endpage()
    {
        if ($this->angle != 0) {
            $this->angle = 0;
            $this->_out('Q');
        }
        parent::_endpage();
    }
}


setlocale(LC_TIME, 'es_ES.utf8', 'es_ES', 'esp');
class Admin extends BaseController
{
    protected $usuario, $usuarios, $mascotas, $session, $mascota, $idUsuario, $certificado, $certificados, $administadores, $administrador, $temporal, $entidades, $notificaciones;
    protected $reglas, $reglasLogin, $reglasUpdatePassword, $reglasMascota, $reglasArchivos, $reglasAdministrador, $reglasActualizar, $reglasActualizarCertificado;

    public function __construct()
    {
        $this->usuario = new UsuarioModel();
        $this->mascota = new MascotasModel();
        $this->certificado = new CertificadosModel();
        $this->administrador = new AdminModel();
        $this->temporal = new TemporalModel();
        $this->entidades = new EntidadesModel();
        $this->notificaciones = new NotificacionesModel();
        $this->session = session();

        helper(['form']);
        $this->reglasAdministrador  = [
            'usuario' => [
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
        $this->reglas = [
            'nombre' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio',
                    'alpha_space' => 'Campo: {field} - Solo ingrese caracteres validos'
                ]
            ],
            'apellidoP' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio',
                    'alpha_space' => 'Campo: {field} - Solo ingrese caracteres validos'
                ]
            ],
            'apellidoM' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio',
                    'alpha_space' => 'Campo: {field} - Solo ingrese caracteres validos'
                ]
            ],
            'expediente' => [
                'rules' => 'required|is_unique[usuarios.identificacion]|numeric|exact_length[6]',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio',
                    'is_unique' => 'Este numero de identificacion ya ha sido reguistrado',
                    'numeric' => 'Ingrese un formato valido',
                    'exact_length' => 'El numero de identificacion consta de 13 digitos'
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
            ]
        ];
        $this->reglasActualizar = [
            'nombre' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio',
                    'alpha_space' => 'Campo: {field} - Solo ingrese caracteres validos'
                ]
            ],
            'correo' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio',
                ]
            ],
            'telefono' => [
                'rules' => 'required|numeric|exact_length[10]',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio',
                    'is_unique' => 'El numero ingresado ya ha sido reguistrado',
                    'numeric' => 'Ingrese un numero valido',
                    'exact_length' => 'Ingrese un numero valido'
                ]
            ],
            'nombre_entidad' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio',
                ]
            ],
            'calle' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio',
                ]
            ],
            'colonia' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio',
                ]
            ],
            'numero' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio',
                ]
            ],
            'cp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio',
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
        /*$this -> reglasActualizarCertificado = [
                'nombre' => [
                    'rules' => 'alpha',
                    'errors' => [

                        'alpha' => 'Campo: {field} - Solo ingrese caracteres validos'
                    ]
                ],
                'edad' => [
                    'rules' => 'numeric',
                    'errors' => [

                        'numeric' => 'Ingrese una edad valida'
                    ]
                ],
                'raza' => [
                    'rules' => 'alpha',
                    'errors' => [

                        'alpha' => 'Ingrese una raza valida'
                    ]
                ],

                'especie' => [
                    'rules' => '',
                    'errors' => [

                        ]
                ],
                'vacunado' => [
                    'rules' => '',
                    'errors' => [

                    ]
                ],
                'esterilizado' => [
                    'rules' => '',
                    'errors' => [

                    ]
                ],
                'caracteristicas' => [
                    'rules' => 'min_length[10]',
                    'errors' => [


                    ]
                ],
                'sexo' => [
                    'rules' => '',
                    'errors' => [

                    ]
                ]
            ],*/
    }

    // REGISSTRAR NUEVO ADMINISTRADOR
    public function registrar()
    {
        echo view('header');
        echo view('admin/registrar');
        echo view('footer');
    }
    public function insertar()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $hash = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
            $this->administrador->save([
                'nombre' => $this->request->getPost('nombre'),
                'apellidoP' => $this->request->getPost('apellidoP'),
                'apellidoM' => $this->request->getPost('apellidoM'),
                'expediente' => $this->request->getPost('expediente'),
                'password' => $hash
            ]);
            return redirect()->to(base_url() . 'admin');
        } else {
            $data = ['validation' => $this->validator];
            echo view('header');
            echo view('admin/registrar', $data);
            echo view('footer');
        }
    }
    public function index()
    {
        if (isset($this->session->id_adm)) {
            return redirect()->to(base_url() . 'admin/inicio');
        }
        echo view('admin/login');
    }
    public function validar()
    {

        function test_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        if ($this->request->getMethod() == "post" && $this->validate($this->reglasAdministrador)) {
            $usuarioAdm = test_input($this->request->getPost('usuario'));
            $password = test_input($this->request->getPost('password'));

            $datoAdministrador = $this->administrador->where('usuario', $usuarioAdm)->first();

            if ($datoAdministrador != null) {
                if (password_verify($password, $datoAdministrador['password'])) {
                    $datosAdministrador = [
                        'id_adm' => $datoAdministrador['id_adm'],
                        'usuario' => $datoAdministrador['usuario'],
                        'nombre' => $datoAdministrador['nombre'],
                        'apellidoP' => $datoAdministrador['apellidoP'],
                        'apellidoM' => $datoAdministrador['apellidoM'],
                        'expediente' => $datoAdministrador['expediente'],
                        'activo' => $datoAdministrador['activo'],
                        'adm' => $datoAdministrador['adm'],
                        'fecha_ultima' => $datoAdministrador['fecha_ultima'],
                        'c_acceso' => date('Y-m-d H:i:s')
                    ];
                    $session = session();
                    $session->set($datosAdministrador);
                    $this->administrador->update($session->id_adm, ['fecha_ultima' => $session->c_acceso]);
                    return redirect()->to(base_url() . 'admin/inicio');
                } else {
                    $data['error'] = "Contraseña errónea.";
                    echo view('admin/login', $data);
                }
            } else {
                $data['error'] = "El usuario no existe.";
                echo view('admin/login', $data);
            }
        } else {
            $data = ['validation' => $this->validator];
            echo view('admin/login', $data);
        }
    }
    public function inicio()
    {
        if (!isset($this->session->id_adm)) {
            return redirect()->to(base_url() . 'admin');
        }
        function obtieneSemes()
        {
            $certificado = new CertificadosModel();
            $array = array();
            $diaH = date('Y-m-d');
            $current_year_ft = date('Y');
            $dia = array();
            $psi = $current_year_ft . "-01-01 00:00:00"; //primer semestre inicio
            $psf = $current_year_ft . "-07-01 00:00:00"; //segundo semestre inicio
            $ssf = $current_year_ft . "-12-31 23:59:59"; //segundo semestre fin

            if ($diaH >= $psi && $diaH <= $psf) {
                $whered = 'fecha_alta>= ' . '"' . $current_year_ft . '-01-01 00:00:00" AND fecha_alta<=' . '"' . ($current_year_ft) . '-06-30 23:59:59" ';
                $cuentad = $certificado->where($whered)->countAllResults();
            } else {
                $whered = 'fecha_alta>= ' . '"' . $current_year_ft . '-07-01 00:00:00" AND fecha_alta<=' . '"' . ($current_year_ft) . '-12-31 23:59:59" ';
                $cuentad = $certificado->where($whered)->countAllResults();
            }
            return $cuentad;
        }
        function obtieneTA()
        { //cuenta de certificados anaual
            $certificado = new CertificadosModel();
            $current_year_ft = date('Y');
            $whered = 'fecha_alta>= ' . '"' . $current_year_ft . '-01-01 00:00:00" AND fecha_alta<=' . '"' . ($current_year_ft) . '-12-31 23:59:59" ';
            $cuentad = $certificado->where($whered)->countAllResults();
            return $cuentad;
        }
        $certificado = $this->certificado->findAll();
        $diaH = date('Y-m-d');
        $ulti7 = date('Y-m-d', strtotime($diaH . '- 7 days'));
        $cuentaulti7 = $this->certificado->where('fecha_alta>= ' . '"' . $ulti7 . '" AND fecha_alta<=' . '"' . $diaH . '"')->countAllResults();

        $dataSemestre = obtieneSemes();
        $dataAn = obtieneTA();
        $query = $this->certificado->db->table('certificados')
            //->distinct()
            ->select('certificados.folio, certificados.fecha_alta, certificados.id_certificado')
            ->select('usuarios.id_usuario, usuarios.nombre AS usuario_nombre, usuarios.nombre_entidad')
            ->select('mascotas.nombre, mascotas.edad, mascotas.raza, mascotas.id_mascota, mascotas.especie, mascotas.esterilizado, mascotas.sexo, mascotas.vacunado')
            ->join('usuarios', 'certificados.id_usuario = usuarios.id_usuario', 'left')
            ->join('mascotas', 'certificados.id_mascota = mascotas.id_mascota', 'left')
            ->distinct()
            ->get();
        $resultados = $query->getResult();
        $data = ['cuenta' => $cuentaulti7, 'cuentaS' => $dataSemestre, 'cuentaA' => $dataAn, 'resultados' => $resultados];
        echo view('admin/header');
        echo view('admin/inicio', $data);
        echo view('admin/footer');
    }

    public function usuarios($activo = 1)
    {
        if (!isset($this->session->id_adm)) {
            return redirect()->to(base_url() . 'admin');
        }
        $usuario = $this->usuario->where('activo', $activo)->findAll();
        $data = ['titulo' => 'usuario', 'datos' => $usuario];
        echo view('admin/header');
        echo view('admin/usuarios', $data);
        echo view('admin/footer');
    }
    public function editarUsuario($id_usuario, $valid = null)
    {
        if (!isset($this->session->id_adm)) {
            return redirect()->to(base_url() . 'admin');
        }
        $entidades = $this->entidades->findAll();
        $usuarios = $this->usuario->where('id_usuario', $id_usuario)->first();
        if ($valid != null) {
            $data = ['titulo' => 'Editar unidades', 'datos' => $usuarios, 'validation' => $valid, 'entidades' => $entidades];
        } else {
            $data = ['titulo' => 'Editar unidades', 'datos' => $usuarios, 'entidades' => $entidades];
        }
        echo view('admin/header');
        echo view('admin/editarUsuario', $data);
        echo view('admin/footer');
    }



    public function actualizar()
    {
        if (! isset($this->session->id_adm)) {
            return redirect()->to(base_url('admin'));
        }

        if ($this->request->getMethod() === 'post') {

            $validation = Services::validation();
            $validation->setRules($this->reglasActualizar);

            if ($validation->withRequest($this->request)->run()) {
                // Aquí va tu lógica de actualización de datos:
                $nombreEntidad = $this->request->getPost('nombre_entidad');
                $entidad = $this->entidades->where('nombre_entidad', $nombreEntidad)->first();
                $idEntidad = $entidad['id_entidad'];
                $cve_entidad = $entidad['cve_entidad'];

                $this->usuario->update(
                    $this->request->getPost('id_usuario'),
                    [
                        'nombre'         => $this->request->getPost('nombre'),
                        'correo'         => $this->request->getPost('correo'),
                        'telefono'       => $this->request->getPost('telefono'),
                        'nombre_entidad' => $this->request->getPost('nombre_entidad'),
                        'id_entidad'     => $idEntidad,
                        'cve_entidad'    => $cve_entidad,
                        'calle'          => $this->request->getPost('calle'),
                        'colonia'        => $this->request->getPost('colonia'),
                        'numero'         => $this->request->getPost('numero'),
                        'cp'             => $this->request->getPost('cp'),
                    ]
                );

                return redirect()->to(base_url('admin'));
            }

            return $this->editarUsuario(
                $this->request->getPost('id_usuario'),
                $validation // ← Se pasa el objeto validator con errores
            );
        }

        return redirect()->back();
    }

    public function certificados($activo = 1)
    {
        if (!isset($this->session->id_adm)) {
            return redirect()->to(base_url() . 'admin');
        }
        $query = $this->certificado->db->table('certificados')
            ->select('certificados.folio, certificados.fecha_alta, certificados.id_certificado, certificados.solicitud, certificados.curp_mascota')
            ->select('usuarios.id_usuario, usuarios.nombre AS usuario_nombre, usuarios.nombre_entidad')
            ->select('mascotas.nombre, mascotas.edad, mascotas.raza, mascotas.id_mascota, mascotas.especie, mascotas.esterilizado, mascotas.sexo, mascotas.vacunado')
            ->join('usuarios', 'certificados.id_usuario = usuarios.id_usuario', 'left')
            ->join('mascotas', 'certificados.id_mascota = mascotas.id_mascota', 'left')
            ->where('certificados.activo', $activo)
            ->get();
        $resultados = $query->getResult();
        $data = ['resultados' => $resultados];

        echo view('admin/header');
        echo view('admin/certificados', $data);
        echo view('admin/footer');
    }

    public function editarCertificado($id_mascota, $valid = null)
    {
        if (!isset($this->session->id_adm)) {
            return redirect()->to(base_url() . 'admin');
        }
        $mascotas = $this->mascota->where('id_mascota', $id_mascota)->first();
        if ($valid != null) {
            $data = ['titulo' => 'Editar unidades', 'datos' => $mascotas, 'validation' => $valid];
        } else {
            $data = ['titulo' => 'Editar unidades', 'datos' => $mascotas];
        }
        echo view('admin/header');
        echo view('admin/editarCertificado', $data);
        echo view('admin/footer');
    }
    public function actualizarCertificado()
    {
        if (!isset($this->session->id_adm)) {
            return redirect()->to(base_url() . 'admin');
        }
        if ($this->request->getMethod() == "post") {
            $this->mascota->update(
                $this->request->getPost('id_mascota'),
                [
                    'nombre' => $this->request->getPost('nombre'),
                    'edad' => $this->request->getPost('edad'),
                    'raza' => $this->request->getPost('raza'),
                    'especie' => $this->request->getPost('especie'),
                    'vacunado' => $this->request->getPost('vacunado'),
                    'esterilizado' => $this->request->getPost('esterilizado'),
                    'caracteristicas' => $this->request->getPost('caracteristicas'),
                    'sexo' => $this->request->getPost('sexo'),
                ]
            );
            return redirect()->to(base_url() . 'admin/certificados');
        } else {
            return $this->editarCertificado($this->request->getPost('id_mascota'), $this->validator);
        }
    }
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url());
    }
    public function actualizarPassword()
    {
        if (!isset($this->session->id_adm)) {
            return redirect()->to(base_url() . 'admin');
        }
        if ($this->request->getMethod() == "post" && $this->validate($this->reglasUpdatePassword)) {
            $hash = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
            $this->usuario->update(
                $this->request->getPost('id_usuario'),
                [
                    'password' => $hash
                ]
            );
            $data = ['mensaje' => 'Contraseña actualizada'];
            return redirect()->to(base_url() . 'admin');
        } else {
            return $this->editarUsuario($this->request->getPost('id_usuario'), $this->validator);
            $data = ['validation' => $this->validator];
            echo view('admin/header');
            echo view('admin/editarUsuario', $data);
            echo view('admin/footer');
        }
    }
    public function certificadosPendientes($activo = 1)
    {
        if (!isset($this->session->id_adm)) {
            return redirect()->to(base_url() . 'admin');
        }
        $query = $this->temporal->db->table('temporal')
            ->select('temporal.id_mascota, temporal.id_usuario, temporal.id_temp, temporal.numero_solicitud, temporal.curp_mascota')
            ->select('usuarios.id_usuario, usuarios.nombre AS usuario_nombre, id_temp, usuarios.cve_entidad, usuarios.correo')
            ->select('mascotas.nombre, mascotas.edad, mascotas.raza, mascotas.id_mascota')
            ->join('usuarios', 'temporal.id_usuario = usuarios.id_usuario', 'left')
            ->join('mascotas', 'temporal.id_mascota = mascotas.id_mascota', 'left')
            ->where('temporal.activo', $activo)
            ->get();
        $resultados = $query->getResult();
        $data = ['resultados' => $resultados];

        echo view('admin/header');
        echo view('admin/certificadosPendientes', $data);
        echo view('admin/footer');
    }

    public function verDatos($id_mascota, $id_usuario)
    {
        if (!isset($this->session->id_adm)) {
            return redirect()->to(base_url() . 'admin');
        }
        $query = $this->certificado->db->table('temporal')
            ->select('temporal.id_mascota, temporal.id_usuario, temporal.id_temp, temporal.activo')
            ->select('usuarios.telefono, usuarios.correo, usuarios.id_usuario, usuarios.nombre AS usuario_nombre, usuarios.ruta_domicilio, usuarios.ruta_identificacion, usuarios.ruta_curp, usuarios.nombre_entidad, usuarios.colonia, usuarios.cp')
            ->select('mascotas.nombre, mascotas.edad, mascotas.raza, mascotas.id_mascota, mascotas.especie, mascotas.esterilizado, mascotas.caracteristicas, mascotas.sexo, mascotas.fotografia, mascotas.doc_propiedad')
            ->join('usuarios', 'usuarios.id_usuario = temporal.id_usuario')
            ->join('mascotas', 'mascotas.id_mascota = temporal.id_mascota')
            ->where('temporal.id_usuario', $id_usuario)
            ->where('temporal.id_mascota', $id_mascota)
            ->get();
        $resultados = $query->getResult();

        foreach ($resultados as $dato) {
            // $curpUsuario = $dato->curp;
            $nombreMascota = $dato->nombre;
            $idUsuario = $dato->id_usuario;
        }
        $rutaMascota = base_url('./uploads/' . $id_usuario . '/' . $nombreMascota . '/Mascota.pdf');
        $rutaImagen = base_url('./uploads/' . $id_usuario . '/' . $nombreMascota . '/Mascota.jpg');
        $rutaDomicilio = base_url('./uploads/' . $id_usuario . '/Domicilio.pdf');
        $rutaCurp = base_url('./uploads/' . $id_usuario . '/CURP.pdf');
        $rutaIdentificacion = base_url('./uploads/' . $id_usuario . '/INE.pdf');

        $data = ['resultados' => $resultados, 'rutaDomicilio' => $rutaDomicilio, 'rutaCurp' => $rutaCurp, 'rutaIdentificacion' => $rutaIdentificacion, 'rutaMascota' => $rutaMascota, 'rutaImagen' => $rutaImagen];
        echo view('admin/header');
        echo view('admin/verDatos', $data);
        echo view('admin/footer');
    }
    public function aprobarCertificado($id_mascota, $id_usuario, $id_temp, $cve_entidad, $correo, $numeroSolicitud, $curpMascota)
    {
        if (!isset($this->session->id_adm)) {
            return redirect()->to(base_url() . 'admin');
        }

        // Desactiva el registro temporal
        $this->temporal->update($id_temp, ['activo' => 0]);

        // Inserta primero el certificado sin folio
        $this->certificado->db->table('certificados')->insert([
            'id_mascota' => $id_mascota,
            'id_usuario' => $id_usuario,
            'solicitud' => $numeroSolicitud,
            'curp_mascota' => $curpMascota,
            'folio' => '' // vacío por ahora
        ]);

        // Obtén el ID generado (el consecutivo real)
        $lastIDC = $this->certificado->db->insertID();

        // Ahora genera el folio con el ID del certificado
        $numeroEntidad = str_pad($cve_entidad % 100000, 5, "0", STR_PAD_LEFT);
        $numeroCertificado = str_pad($lastIDC % 100000, 5, "0", STR_PAD_LEFT); // 🔁 Este será el nuevo consecutivo
        $anoActual = date('Y');
        $folio = "SMADSOT/IBA/EMP-$numeroEntidad/$numeroCertificado/$anoActual";

        // Actualiza el folio del certificado insertado
        $this->certificado->db->table('certificados')
            ->where('id_certificado', $lastIDC)
            ->update(['folio' => $folio]);

        // Notificación
        $urlUpdate = base_url() . "/usuario/verAcuse/" . $lastIDC;
        $asunto = "Certificado aprobado";

        $this->notificaciones->save([
            'id_usuario' => $id_usuario,
            'asunto' => $asunto,
            'descripcion' => '',
            'enlace' => $urlUpdate
        ]);

        $lastID = $this->notificaciones->getInsertID();
        $urlUpdate1 = base_url() . "/usuario/verAcuse/" . $lastIDC . "/" . $lastID;

        // Enviar correo
        $email = \Config\Services::email();
        $email->setTo($correo);
        $email->setSubject('Certificado Aprobado');
        $email->setMessage('Estimado usuario,
                        Nos complace informarle que su certificado ha sido aprobado y ya se encuentra disponible para su recolección presencial.
                        Para recogerlo, deberá acudir a la siguiente dirección:
                        <br><br>
                        📍 Lateral de la Recta a Cholula Km 5.5 número 2401, San Andrés Cholula, Puebla.
                        <br><br>
                        Es indispensable que presente el siguiente acuse al momento de la recolección:
                        <br><br>
                        👉 <a href="' . $urlUpdate1 . '">Descargar acuse</a>
                        <br><br>
                        Le recomendamos mantenerse al pendiente de su correo electrónico para futuras actualizaciones.
                        <br><br>
                        Atentamente,
                        Instituto del Bienestar Animal');

        if (!$email->send()) {
            echo 'Error sending email: ' . $email->printDebugger(['headers']);
        }

        return redirect()->to(base_url('admin/certificadosPendientes'));
    }

    public function usuariosPendientes($activo = 0)
    {
        if (!isset($this->session->id_adm)) {
            return redirect()->to(base_url() . 'admin');
        }
        $query = $this->usuario->db->table('usuarios')
            ->select('usuarios.id_usuario, usuarios.nombre, usuarios.correo, usuarios.telefono, usuarios.nombre_entidad, usuarios.calle, usuarios.colonia, usuarios.numero, usuarios.cp, usuarios.activo')
            ->where('usuarios.activo', $activo)
            ->get();
        $resultados = $query->getResult();
        $data = ['resultados' => $resultados];

        echo view('admin/header');
        echo view('admin/usuariosPendientes', $data);
        echo view('admin/footer');
    }
    public function verDatosUsuario($id_usuario)
    {
        if (!isset($this->session->id_adm)) {
            return redirect()->to(base_url() . 'admin');
        }
        $query = $this->usuario->db->table('usuarios')
            ->select('usuarios.id_usuario, usuarios.nombre, usuarios.correo, usuarios.telefono, usuarios.nombre_entidad, usuarios.calle, usuarios.colonia, usuarios.numero, usuarios.cp, usuarios.activo, usuarios.id_entidad, usuarios.ruta_identificacion, usuarios.ruta_curp, usuarios.ruta_domicilio')
            ->where('usuarios.id_usuario', $id_usuario)
            ->get();
        $resultados = $query->getResult();
        foreach ($resultados as $dato) {
            $id_usuario = $dato->id_usuario;
        }
        $rutaDomicilio = base_url('./uploads/' . $id_usuario . '/Domicilio.pdf');
        $rutaCurp = base_url('./uploads/' . $id_usuario . '/CURP.pdf');
        $rutaIdentificacion = base_url('./uploads/' . $id_usuario . '/INE.pdf');
        $data = ['resultados' => $resultados, 'rutaDomicilio' => $rutaDomicilio, 'rutaCurp' => $rutaCurp, 'rutaIdentificacion' => $rutaIdentificacion];
        echo view('admin/header');
        echo view('admin/verDatosUsuario', $data);
        echo view('admin/footer');
    }
    public function aprobarUsuario($id_usuario)
    {
        if (!isset($this->session->id_adm)) {
            return redirect()->to(base_url() . 'admin');
        }
        $urlUpdate = base_url("login/");
        $this->usuario->update($id_usuario, ['activo' => 1]);
        $query = $this->usuario->db->table('usuarios')
            ->select('usuarios.id_usuario, usuarios.nombre, usuarios.correo, usuarios.telefono, usuarios.nombre_entidad, usuarios.calle, usuarios.colonia, usuarios.numero, usuarios.cp, usuarios.activo, usuarios.id_entidad')
            ->where('usuarios.id_usuario', $id_usuario)
            ->get();
        $resultados = $query->getResult();
        foreach ($resultados as $dato) {
            $correo = $dato->correo;
        }
        $email = \Config\Services::email();
        // Set the email parameters
        $email->setTo($correo);
        $email->setSubject('Usuario Aprobado');
        $email->setMessage('Estimado usuario,
                            Le informamos que hemos concluido la revisión de sus datos y su cuenta ha sido activada correctamente.
                            Puede ingresar al sistema utilizando el correo y la contraseña que registró previamente.
                            <br><br>
                            👉 <a href="' . $urlUpdate . '">Ingresar para corregir</a>
                            Le recomendamos mantenerse al pendiente de su correo electrónico, ya que por este medio recibirá actualizaciones sobre el estado de sus certificados.
                            <br><br>
                            Atentamente,
                            Instituto del Bienestar Animal');
        if ($email->send()) {
            echo 'Email sent successfully';
        } else {
            echo 'Error sending email: ' . $email->printDebugger(['headers']);
        }
        return redirect()->to(base_url('admin/usuariosPendientes'));
    }
    public function desactivarUsuario($id_usuario)
    {
        if (!isset($this->session->id_adm)) {
            return redirect()->to(base_url() . 'admin');
        }
        $this->usuario->update($id_usuario, ['activo' => 3]);
        return redirect()->to(base_url('admin/usuarios'));
    }

    public function usuariosEliminados($activo = 3)
    {
        $query = $this->usuario->db->table('usuarios')
            ->select('usuarios.id_usuario, usuarios.nombre, usuarios.correo, usuarios.telefono, usuarios.nombre_entidad, usuarios.calle, usuarios.colonia, usuarios.numero, usuarios.cp, usuarios.activo')
            ->where('usuarios.activo', $activo)
            ->get();
        $resultados = $query->getResult();
        $data = ['resultados' => $resultados];

        echo view('admin/header');
        echo view('admin/usuariosEliminados', $data);
        echo view('admin/footer');
    }


    public function eliminarCertificado($id_certificado)
    {
        if (!isset($this->session->id_adm)) {
            return redirect()->to(base_url() . 'admin');
        }
        $this->certificado->update($id_certificado, ['activo' => 0]);
        return redirect()->to(base_url('admin/certificadosPendientes'));
    }
    public function verPDF($id_certificado)
    {
        if (!isset($this->session->id_adm)) {
            return redirect()->to(base_url() . 'admin');
        }
        $data['id_certificado'] = $id_certificado;
        echo view('admin/header');
        echo view('admin/verPDF', $data);
        echo view('admin/footer');
    }
    public function verCredencial($id_certificado)
    {
        if (!isset($this->session->id_adm)) {
            return redirect()->to(base_url() . 'admin');
        }
        $data['id_certificado'] = $id_certificado;
        echo view('admin/header');
        echo view('admin/verCredencial', $data);
        echo view('admin/footer');
    }
    public function getAll($activo = 1, $nombreEntidad = NULL)
    {
        if (!isset($this->session->id_adm)) {
            return redirect()->to(base_url() . 'admin');
        }
        $query = $this->certificado->db->table('certificados')
            ->select('certificados.folio, certificados.fecha_alta, certificados.id_certificado')
            ->select('usuarios.id_usuario, usuarios.nombre AS usuario_nombre, usuarios.nombre_entidad')
            ->select('mascotas.nombre, mascotas.edad, mascotas.raza, mascotas.id_mascota, mascotas.especie, mascotas.esterilizado, mascotas.sexo, mascotas.vacunado')
            ->join('usuarios', 'certificados.id_usuario = usuarios.id_usuario', 'left')
            ->join('mascotas', 'certificados.id_mascota = mascotas.id_mascota', 'left')
            ->where('certificados.activo', $activo)
            ->get();
        $resultados = $query->getResult();
        $data = ['resultados' => $resultados];
    }
    public function subsanacionDocumentos()
    {
        if ($this->request->getMethod() == "post") {
            helper('text'); // para usar random_string()

            $id_usuario = $this->request->getPost('id_usuario');
            $correo = $this->request->getPost('correo');
            $uuid = bin2hex(random_bytes(16)); // UUID seguro

            $urlUpdate = base_url("usuario/updateFiles/" . $uuid); // Enlace sin IDs visibles

            $this->notificaciones->save([
                'id_usuario' => $id_usuario,
                'asunto' => $this->request->getPost('asunto'),
                'descripcion' => $this->request->getPost('descripcion'),
                'uuid' => $uuid,
                'enlace' => $urlUpdate,
            ]);
            $email = \Config\Services::email();
            $email->setTo($correo);
            $email->setSubject('Solicitud de corrección de datos del usuario');
            $email->setMessage('Estimado usuario,
                            <br><br>
                            Después de revisar la documentación proporcionada para su trámite, se ha detectado que uno o más documentos presentan inconsistencias o requieren corrección.
                            <br><br>
                            👉 <a href="' . $urlUpdate . '">Ingresar para corregir</a>
                            <br><br>
                            Una vez actualizada la información, su trámite continuará con el proceso de revisión.
                            <br><br>
                            Atentamente,<br>
                            Instituto del Bienestar Animal');

            if ($email->send()) {
                $this->session->setFlashdata('message', 'Notificación enviada correctamente');
            } else {
                $this->session->setFlashdata('error', 'Error enviando el correo: ' . $email->printDebugger(['headers']));
            }

            return redirect()->back();
        }
    }
    public function actualizarDocumentos() {}
    public function notificacionesCertificado()
    {
        if ($this->request->getMethod() == "post") {
            helper('text'); // por si quieres usar UUID de CodeIgniter

            $id_usuario = $this->request->getPost('id_usuario');
            $id_mascota = $this->request->getPost('id_mascota');
            $correo = $this->request->getPost('correo');

            $uuid = bin2hex(random_bytes(16));
            $urlUpdate = base_url() . "/usuario/updateFilesCertificado/" . $uuid;
            // Guardar notificación con UUID como enlace
            $this->notificaciones->save([
                'id_usuario' => $id_usuario,
                'id_mascota' => $id_mascota,
                'asunto' => $this->request->getPost('asunto'),
                'descripcion' => $this->request->getPost('descripcion'),
                'uuid' => $uuid, // Aquí guardas solo el token
                'enlace' => $urlUpdate // Aquí guardas solo el token
            ]);
            $email = \Config\Services::email();
            $email->setTo($correo);
            $email->setSubject('Solicitud de subsanacion de información');
            $email->setMessage('Estimado usuario:<br><br>
                                Hemos revisado la información proporcionada sobre su mascota y detectamos que es necesario realizar una subsanación para poder continuar con el trámite de su certificado.<br><br>
                                Por favor, ingrese al siguiente enlace para consultar los detalles y cargar la información requerida:<br><br>
                                <a href="' . $urlUpdate . '">Ingresar</a><br><br>
                                Le recomendamos mantenerse al pendiente de su correo electrónico, ya que por este medio se le notificará cualquier novedad relacionada con su solicitud.<br><br>
                                Atentamente,<br>
                                Instituto del Bienestar Animal');

            if ($email->send()) {
                echo 'Email sent successfully';
            } else {
                echo 'Error sending email: ' . $email->printDebugger(['headers']);
            }

            return redirect()->to(base_url() . 'admin/certificadosPendientes');
        }
    }

    public function modificarPassw($valid = null)
    {
        if (!isset($this->session->id_adm)) {
            return redirect()->to(base_url() . 'admin');
        }
        $usuario = $this->administrador->where('id_adm', $this->session->id_adm)->first();
        if ($valid != null) {
            $data = ['titulo' => 'Editar contraseña', 'usuario' => $usuario, 'validation' => $valid];
        } else {
            $data = ['titulo' => 'Editar contraseña', 'usuario' => $usuario];
        }
        echo view('admin/header');
        echo view('admin/modificarPassw', $data);
        echo view('admin/footer');
    }
    public function actualizarPassw()
    {
        if ((!isset($this->session->adm))) {
            return redirect()->to(base_url() . '/admin');
        }

        if ($this->request->getMethod() == "post" && $this->validate($this->reglasUpdatePassword)) {
            $hash = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
            $this->administrador->update($this->session->id_adm, ['password' => $hash]);
            $usuario = $this->administrador->where('id_adm', $this->session->id_adm)->first();
            $data = ['titulo' => 'Editar contraseña', 'usuario' => $usuario, 'mensaje' => 'Contraseña actualizada'];
            echo view('admin/header');
            echo view('admin/modificarPassw', $data);
            echo view('admin/footer');
        } else {
            return $this->modificarPassw($this->validator);
        }
    }

    function textUppercase($texto)
    {
        return utf8_decode(mb_strtoupper($texto, 'UTF-8'));
    }

    public function generarCertificado($id_certificado, $activo = 1)
    {
        if (!isset($this->session->id_adm)) {
            return redirect()->to(base_url() . 'login');
        }
        $db = \Config\Database::connect();

        $builder = $db->table('certificados');
        $builder->select('certificados.folio, certificados.fecha_alta, certificados.id_certificado');
        $builder->select('usuarios.nombre AS usuario_nombre, usuarios.nombre_entidad, usuarios.calle, usuarios.colonia, usuarios.numero, usuarios.cp, usuarios.cve_entidad, usuarios.telefono, usuarios.correo', 'usuarios.id_usuario');
        $builder->select('mascotas.nombre, mascotas.especie, mascotas.edad, mascotas.vacunado, mascotas.esterilizado, mascotas.sexo, mascotas.raza, mascotas.caracteristicas, mascotas.fotografia, mascotas.color');
        $builder->join('usuarios', 'certificados.id_usuario = usuarios.id_usuario', 'inner');
        $builder->join('mascotas', 'certificados.id_mascota = mascotas.id_mascota', 'inner');
        $builder->where('certificados.id_certificado', $id_certificado);
        $builder->where('certificados.activo', $activo);
        $query = $builder->get();

        $result = $query->getResult();

        $pdf = new PDF_Rotate('P', 'mm', 'letter');
        $pdf->AddPage();
        $pdf->Image(base_url() . 'img/CertificadoFrontFirma.png', 0, 0, 215.9);
        $pdf->SetMargins(5, 10, 10);
        $pdf->SetTitle("Empadronamiento para Perros y Gatos del Estado de Puebla");
        $pdf->SetFont('Arial', '', 12);
        $pdf->setTextColor(0, 0, 0);

        foreach ($result as $row) {
            $folio = $row->folio;
            $correo = $row->correo;
            $nombreUsuario = $row->usuario_nombre;
            $nombreEntidad = $row->nombre_entidad;
            $calle = $row->calle;
            $colonia = $row->colonia;
            $numero = $row->numero;
            $cp = $row->cp;
            $raza = $row->raza;
            $nombreMascota = $row->nombre;
            $caracteristicas = $row->caracteristicas;
            $sexo = $row->sexo;
            $especie = $row->especie;
            $vacunado = $row->vacunado;
            $esterilizado = $row->esterilizado;
            $edad = $row->edad;
            $telefono = $row->telefono;
            $fecha_alta = $row->fecha_alta;
            $fotografia = $row->fotografia;
            $color = $row->color;

            $fecha_alta = $row->fecha_alta;
            $fecha = Time::parse($fecha_alta);

            // Obtener por separado:
            $dia = $fecha->getDay();         // 1 a 31
            $mes = $fecha->getMonth();       // 1 a 12
            $anio = $fecha->getYear();       // Ej. 2025

            // Si quieres el mes en texto (en español):
            setlocale(LC_TIME, 'es_ES.UTF-8'); // En Linux
            // En Windows puedes probar con: setlocale(LC_TIME, 'Spanish');
            $mesNombre = strftime('%B', $fecha->getTimestamp()); // Ej: julio

            // Imagen mascota
            // $pdf->Image($fotografia, 26, 85, 30, 30);

            $relativePath = str_replace(base_url(), '', $fotografia);
            $localPath = FCPATH . $relativePath;

            if (file_exists($localPath)) {
                $pdf->Image($localPath, 26, 85, 30, 30);
            } else {
                // Si no existe, mostrar un mensaje en el PDF o dejar espacio vacío
                $pdf->SetXY(26, 85);
                $pdf->Cell(30, 30, 'Sin imagen', 1, 0, 'C');
            }
            // Nombre Mascota
            $pdf->SetFont('Arial', 'B', 14);
            $pdf->SetXY(88, 81);
            $pdf->Cell(105, 6, utf8_decode($nombreMascota), 0, 0, 'L');

            // Folio
            $pdf->SetFont('Arial', '', 15);
            $pdf->SetXY(83, 97);
            $pdf->Cell(175, 6, utf8_decode($folio), 0, 0, 'L');

            // Edad, especie, sexo
            $pdf->SetFont('Arial', '', 12);
            // $edadNum = (int) $edad; // convierte el varchar a número entero
            // $unidad = ($edadNum === 1) ? 'Año' : 'Años';
            $pdf->SetXY(83, 113.2);
            $pdf->Cell(60, 6, utf8_decode($edad), 0, 0, 'L');
            $pdf->SetXY(141, 113.2);
            $pdf->Cell(60, 6, utf8_decode($especie), 0, 0, 'L');
            $pdf->SetXY(190, 113.2);
            $pdf->Cell(60, 6, utf8_decode($sexo), 0, 0, 'L');

            //Raza, vacunado, esterilizado
            $lineasRaza = $this->dividirTextoCaracteristicas($raza, 15);

            for ($i = 0; $i < min(count($lineasRaza), 2); $i++) {
                $yPos = 138 + ($i * 5); // puedes ajustar el 3 para más o menos espacio vertical
                $pdf->SetXY(32.5, $yPos);
                $pdf->Cell(60, 3, utf8_decode($lineasRaza[$i]), 0, 0, 'L');
            }

            $pdf->SetXY(95, 136.5);
            $pdf->Cell(40, 6, utf8_decode($color), 0, 0, 'L');
            $pdf->SetXY(172, 136.5);
            $pdf->Cell(55, 6, utf8_decode($esterilizado), 0, 0, 'L');

            //Características
            $pdf->SetXY(67, 162.6);
            $pdf->MultiCell(100, 5, utf8_decode($caracteristicas), 0, 'L');
            // // Nombre Usuario
            $pdf->SetXY(49, 184.5);
            $pdf->Cell(130, 6, utf8_decode($nombreUsuario), 0, 0, 'L');
            // // Dirección
            $direccion = $calle . ' # ' . $numero . ' ' . $colonia . ' CP ' . $cp . ' ' . $nombreEntidad . ' Puebla';
            $pdf->SetXY(43, 196.5);
            $pdf->MultiCell(140, 5, utf8_decode($this->textUppercase($direccion)), 0, 'L');

            // Teléfono y correo
            $pdf->SetXY(40, 208.5);
            $pdf->Cell(65, 6, utf8_decode($telefono), 0, 0, 'L');
            $pdf->SetXY(60, 220.3);
            $pdf->Cell(100, 6, utf8_decode($correo), 0, 0, 'L');

            $pdf->SetFont('Arial', '', 9);
            $pdf->SetXY(111, 235.5);
            $pdf->Cell(100, 6, utf8_decode($dia), 0, 0, 'L');
            $pdf->SetXY(120.5, 235.5);
            $pdf->Cell(100, 6, utf8_decode($mesNombre), 0, 0, 'L');
            $pdf->SetXY(141, 235.5);
            $pdf->Cell(100, 6, utf8_decode($anio), 0, 0, 'L');

            $pdf->AddPage();
            // $pdf->Rotate(180, 107.95, 139.7); // ¡Gira el reverso!
            $pdf->Image(base_url('img/CertificadoBack.png'), 0, 0, 215.9);
        }

        $this->response->setHeader('Content-Type', 'application/pdf');
        $pdf->Output("Empadronamiento de Perros y Gatos Puebla.pdf", "I");
    }
    public function muestraCertificado($id_mascota)
    {
        if (!isset($this->session->id_adm)) {
            return redirect()->to(base_url() . 'login');
        }
        $data['id_mascota'] = $id_mascota;

        echo view('admin/header');
        echo view('admin/verCertificado', $data);
        echo view('admin/footer');
    }
    public function verAcuse($id_mascota)
    {
        $id_notificacion = $this->request->uri->getSegment(4);
        $this->notificaciones->update(['id_notificacion' => $id_notificacion], ['activo' => 0]);
        if (!isset($this->session->id_adm)) {
            return redirect()->to(base_url() . 'login');
        }
        $data['id_mascota'] = $id_mascota;
        echo view('admin/header');
        echo view('admin/verAcuse', $data);
        echo view('admin/footer');
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
        $pdf->MultiCell(165, 7, utf8_decode('ACUSE RECIBO DE ADMISIÓN DE DOCUMENTACIÓN PARA EMPADRONAMIENTO DE PERRO O GATOS'), 0, 'L');

        // $pdf->Cell(0, -30, utf8_decode('DE PERRO O GATO'), 0, 1, 'C');
        $pdf->Ln(10);

        foreach ($result as $row) {
            $fechaSolicitud = Time::parse($row->fecha_alta)->toLocalizedString('d MMMM yyyy');
            $fechaAcuse = Time::now()->toLocalizedString('d MMMM yyyy');
            $horaAcuse = Time::now()->toLocalizedString('HH:mm');

            $propietario = $row->usuario_nombre;
            $especie = $row->especie;
            $nombreMascota = $row->nombre;
            $folio = $row->folio;
            $solicitud = $row->solicitud;
            $curpMascota = $row->curp_mascota;
            $fechaEmision = $row->fecha_alta;

            $fechaEmision = Time::parse($fechaEmision);

            // Separar y formatear por partes
            $soloFecha = $fechaEmision->toLocalizedString('d MMMM yyyy');
            $soloHora  = $fechaEmision->toLocalizedString('HH:mm');
            $pdf->SetFont('Arial', '', 12);
            // Texto con formato HTML simulado
            $texto = "A fecha $fechaSolicitud, se admite la notificación que tiene como destinatario a $propietario teniente del $especie, $nombreMascota con identificación oficial $curpMascota, de la solicitud número $solicitud, referente al asunto Empadronamiento en el Padrón Estatal de Perros y Gatos.

Se expide la presente comunicación (que realiza el sistema de forma automatizada), para acreditar la fecha y hora de materialización de la notificación, que deberá ser presentada en un plazo de 10 días desde la creación del mismo, para recibir los documentos correspondientes al registro de su animal de compañía.

En Puebla a $soloFecha a las $soloHora.";
            $pdf->MultiCell(170, 6, utf8_decode($texto), 0, 'J');
            $pdf->SetFont('Arial', '', 12);
            $pdf->Ln(10);
        }

        $this->response->setHeader('Content-Type', 'application/pdf');
        $pdf->Output("Acuse_Recibo_Empadronamiento.pdf", "I");
    }

    public function generarCredencial($id_certificado, $activo = 1)
    {
        if (!isset($this->session->id_adm)) {
            return redirect()->to(base_url() . 'admin');
        }

        $db = \Config\Database::connect();
        $builder = $db->table('certificados');
        $builder->select('certificados.folio, certificados.fecha_alta, certificados.id_certificado, certificados.curp_mascota, certificados.solicitud');
        $builder->select('usuarios.nombre AS usuario_nombre, usuarios.nombre_entidad, usuarios.calle, usuarios.colonia, usuarios.numero, usuarios.cp, usuarios.telefono, usuarios.correo');
        $builder->select('mascotas.nombre, mascotas.especie, mascotas.edad, mascotas.vacunado, mascotas.esterilizado, mascotas.sexo, mascotas.raza, mascotas.caracteristicas, mascotas.fotografia, mascotas.color');
        $builder->join('usuarios', 'certificados.id_usuario = usuarios.id_usuario', 'inner');
        $builder->join('mascotas', 'certificados.id_mascota = mascotas.id_mascota', 'inner');
        $builder->where('certificados.id_certificado', $id_certificado);
        $builder->where('certificados.activo', $activo);
        $query = $builder->get();
        $result = $query->getResult();

        $pdf = new PDF_Rotate('L', 'mm', [85, 55]);
        $pdf->SetAutoPageBreak(false);
        $pdf->SetCompression(true);

        foreach ($result as $row) {
            $nombreMascota = $row->nombre;
            $folio = $row->folio;
            $edad = $row->edad;
            $raza = $row->raza;
            $sexo = $row->sexo;
            $vacunado = $row->vacunado;
            $especie = $row->especie;
            $caracteristicas = $row->caracteristicas;
            $fotografia = $row->fotografia;
            $color = $row->color;

            $nombreUsuario = $row->usuario_nombre;
            $calle = $row->calle;
            $numero = $row->numero;
            $colonia = $row->colonia;
            $cp = $row->cp;
            $nombreEntidad = $row->nombre_entidad;
            $telefono = $row->telefono;
            $correo = $row->correo;
            $curp_mascota = $row->curp_mascota;
            $solicitud = $row->solicitud;

            $fechaFormateada = strftime('%e de %B de %Y', Time::parse($row->fecha_alta)->getTimestamp());

            // ---------- FRENTE ----------
            $pdf->AddPage();
            $pdf->Image(base_url('img/CredencialEmpadronamiento-Front.png'), 0, 0, 85, 55);

            $pdf->SetFont('Arial', '', 5);
            $pdf->SetTextColor(0, 0, 0);
            //$pdf->Image($fotografia, 11, 7, 15, 15);

            $relativePath = str_replace(base_url(), '', $fotografia);
            $localPath = FCPATH . $relativePath;

            if (file_exists($localPath)) {
                // Cargar imagen desde disco
                $pdf->Image($localPath, 11, 7, 15, 15);
            } else {
                // Si no existe, mostrar un mensaje en el PDF o dejar espacio vacío
                $pdf->SetXY(11, 7);
                $pdf->Cell(15, 15, 'Sin imagen', 1, 0, 'C');
            }

            $pdf->SetXY(38, 17);
            $pdf->SetFont('Arial', 'B', 7);
            $pdf->Cell(0, 4, utf8_decode($nombreMascota), 0);

            $pdf->SetFont('Arial', '', 5);
            $pdf->SetXY(35, 20.5);
            $pdf->Cell(0, 4, utf8_decode($folio), 0);

            $textoEdad = $edad;
            $pdf->SetXY(13, 27);
            $pdf->Cell(0, 4, utf8_decode($textoEdad), 0);


            $pdf->SetXY(36, 27);
            $pdf->Cell(0, 4, utf8_decode($raza), 0);

            $pdf->SetXY(13.5, 31.7);
            $pdf->Cell(0, 4, utf8_decode($color), 0);

            $pdf->SetXY(36, 31.7);
            $pdf->Cell(0, 4, utf8_decode($sexo), 0);

            $pdf->SetXY(16, 36.5);
            $pdf->Cell(0, 4, utf8_decode($especie), 0);

            $maxAnchos = [28, 50];
            $lineasCaracteristicas = $this->dividirTextoCaracteristicasPorAncho($pdf, $caracteristicas, $maxAnchos);

            $pdf->SetFont('Arial', '', 5);
            $pdf->SetTextColor(0, 0, 0);

            // Primera línea desde X=51.5
            $pdf->SetXY(51.5, 37);
            $pdf->Cell(0, 2.5, utf8_decode($lineasCaracteristicas[0]), 0, 1);

            if (count($lineasCaracteristicas) > 1) {
                $pdf->SetX(30);
                for ($i = 1; $i < count($lineasCaracteristicas); $i++) {
                    $pdf->Cell(0, 2.5, utf8_decode($lineasCaracteristicas[$i]), 0, 1);
                    $pdf->SetX(30);
                }
            }

            // ---------- REVERSO ----------
            $pdf->AddPage();
            $pdf->Rotate(180, 42.5, 27.5); // ¡Gira el reverso!
            $pdf->SetFont('Arial', '', 5);
            // $pdf->Image(base_url('img/CredencialEmpadronamiento-Back.png'), 0, 0, 85, 55);
            $pdf->Image(base_url('img/CredencialBackFirma.png'), 0, 0, 85, 55);
            $pdf->SetTextColor(85, 0, 0);

            // $posiciones = [
            //     'responsable' => 18.6,
            //     'direccion' => 23.6,
            //     'telefono' => 27.5,
            //     'correo' => 31.9,
            //     'curp_mascota' => 36.3
            // ];
            $posiciones = [
                'responsable' => 12.6,
                'direccion' => 20.2,
                'telefono' => 26.7,
                'correo' => 33.7,
                'curp_mascota' => 40.7
            ];

            $pdf->SetXY(18, $posiciones['responsable']);
            $pdf->Cell(0, 4, utf8_decode($nombreUsuario), 0);

            $direccion = $this->textUppercase("$calle $numero, $colonia, CP $cp, $nombreEntidad");
            $direccionLineas = $this->dividirTextoCaracteristicas($direccion, 45);

            for ($i = 0; $i < min(count($direccionLineas), 2); $i++) {
                $yPos = $posiciones['direccion'] + ($i * 2);
                if ($yPos <= 48) {
                    $pdf->SetXY(14, $yPos);
                    $pdf->Cell(35, 3, utf8_decode($direccionLineas[$i]), 0);
                }
            }

            if ($posiciones['telefono'] <= 48) {
                $pdf->SetXY(14, $posiciones['telefono']);
                $pdf->Cell(0, 4, utf8_decode($telefono), 0);
            }

            if ($posiciones['correo'] <= 48) {
                $pdf->SetXY(23, $posiciones['correo']);
                $pdf->Cell(0, 4, utf8_decode($correo), 0);
            }

            if ($posiciones['curp_mascota'] <= 48) {
                $pdf->SetXY(20, $posiciones['curp_mascota']);
                $pdf->Cell(0, 4, utf8_decode($curp_mascota), 0);
            }

            $pdf->Rotate(0); // restablece rotación
        }

        $this->response->setHeader('Content-Type', 'application/pdf');
        $pdf->Output("Credencial_Peluda.pdf", "I");
    }

    private function dividirTextoCaracteristicas($texto, $maxCaracteres)
    {
        $lineas = [];
        $palabras = explode(' ', $texto);
        $lineaActual = '';

        foreach ($palabras as $palabra) {
            $nuevaLinea = $lineaActual . ($lineaActual ? ' ' : '') . $palabra;

            if (strlen($nuevaLinea) <= $maxCaracteres) {
                $lineaActual = $nuevaLinea;
            } else {
                if ($lineaActual) {
                    $lineas[] = $lineaActual;
                    $lineaActual = $palabra;
                } else {
                    $lineas[] = substr($palabra, 0, $maxCaracteres);
                    $lineaActual = '';
                }
            }
        }

        if ($lineaActual) {
            $lineas[] = $lineaActual;
        }

        return $lineas;
    }
    private function dividirTextoCaracteristicasVariable($texto, $limites)
    {
        $lineas = [];
        $palabras = explode(' ', $texto);
        $lineaActual = '';
        $lineaIndex = 0;

        foreach ($palabras as $palabra) {
            $limite = $limites[min($lineaIndex, count($limites) - 1)];
            $nuevaLinea = $lineaActual . ($lineaActual ? ' ' : '') . $palabra;

            if (strlen($nuevaLinea) <= $limite) {
                $lineaActual = $nuevaLinea;
            } else {
                $lineas[] = $lineaActual;
                $lineaActual = $palabra;
                $lineaIndex++;
            }
        }

        if ($lineaActual) {
            $lineas[] = $lineaActual;
        }

        return $lineas;
    }
    private function dividirTextoCaracteristicasPorAncho($pdf, $texto, $maxAnchos)
    {
        $lineas = [];
        $palabras = explode(' ', $texto);
        $lineaActual = '';
        $lineaIndex = 0; // Para identificar si es primera línea o siguiente

        foreach ($palabras as $palabra) {
            $nuevaLinea = ($lineaActual ? $lineaActual . ' ' : '') . $palabra;

            // Determinar el ancho máximo dependiendo si es la primera línea o subsecuentes
            $maxAncho = ($lineaIndex == 0) ? $maxAnchos[0] : $maxAnchos[1];

            // Medir el ancho del texto en mm usando GetStringWidth
            $anchoTexto = $pdf->GetStringWidth($nuevaLinea);

            if ($anchoTexto <= $maxAncho) {
                $lineaActual = $nuevaLinea;
            } else {
                if ($lineaActual) {
                    $lineas[] = $lineaActual;
                    $lineaActual = $palabra;
                    $lineaIndex++; // Ya pasamos a la siguiente línea
                } else {
                    // Por si alguna palabra es demasiado larga
                    $lineas[] = $palabra;
                    $lineaActual = '';
                    $lineaIndex++;
                }
            }
        }

        if ($lineaActual) {
            $lineas[] = $lineaActual;
        }

        return $lineas;
    }


    public function exportarExcelCertificados($activo = 1)
    {
        if (!isset($this->session->id_adm)) {
            return redirect()->to(base_url() . 'admin');
        }

        $query = $this->certificado->db->table('certificados')
            ->select('certificados.folio, certificados.fecha_alta, certificados.id_certificado, certificados.solicitud, certificados.curp_mascota')
            ->select('usuarios.id_usuario, usuarios.nombre AS usuario_nombre, usuarios.nombre_entidad, usuarios.calle, usuarios.colonia, usuarios.numero, usuarios.cp, usuarios.cve_entidad, usuarios.telefono, usuarios.correo')
            ->select('mascotas.nombre, mascotas.edad, mascotas.raza, mascotas.id_mascota, mascotas.especie, mascotas.esterilizado, mascotas.sexo, mascotas.vacunado')
            ->select("CONCAT(usuarios.calle, ' ', usuarios.numero, ', Col. ', usuarios.colonia, ', C.P. ', usuarios.cp, ', ', usuarios.nombre_entidad) AS direccion", false)
            ->join('usuarios', 'certificados.id_usuario = usuarios.id_usuario', 'left')
            ->join('mascotas', 'certificados.id_mascota = mascotas.id_mascota', 'left')
            ->where('certificados.activo', $activo)
            ->get();


        $resultados = $query->getResultArray();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Encabezados
        $encabezados = [
            'Nombre del Propietario',
            'Dirección',
            'Número telefónico',
            'Folio',
            'Fecha Alta',
            'Solicitud',
            'CURP Mascota',
            'Entidad',
            'Nombre Mascota',
            'Edad',
            'Raza',
            'Especie',
            'Esterilizado',
            'Sexo',
            'Vacunado'
        ];

        // Escribir encabezados
        $sheet->fromArray($encabezados, NULL, 'A1');

        // Aplicar estilo a los encabezados
        $encabezadoStyle = [
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => '28A745'], // verde
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                ],
            ],
        ];
        $columnCount = count($encabezados);
        $endColumn = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($columnCount);
        $sheet->getStyle("A1:{$endColumn}1")->applyFromArray($encabezadoStyle);

        // Escribir datos
        $fila = 2;
        foreach ($resultados as $row) {
            
            $sheet->setCellValue("A$fila", $row['usuario_nombre']);
            $sheet->setCellValue("B$fila", $row['direccion']);
            $sheet->setCellValue("C$fila", $row['telefono']);
            $sheet->setCellValue("D$fila", $row['folio']);
            $sheet->setCellValue("E$fila", $row['fecha_alta']);
            $sheet->setCellValue("F$fila", $row['solicitud']);
            $sheet->setCellValue("G$fila", $row['curp_mascota']);
            $sheet->setCellValue("H$fila", $row['nombre_entidad']);
            $sheet->setCellValue("I$fila", $row['nombre']);
            $sheet->setCellValue("J$fila", $row['edad']);
            $sheet->setCellValue("K$fila", $row['raza']);
            $sheet->setCellValue("L$fila", $row['especie']);
            $sheet->setCellValue("M$fila", $row['esterilizado'] ? 'Sí' : 'No');
            $sheet->setCellValue("N$fila", $row['sexo']);
            $sheet->setCellValue("O$fila", $row['vacunado'] ? 'Sí' : 'No');
            $fila++;
        }

        // Autoajustar ancho de columnas
        for ($col = 'A'; $col <= $endColumn; $col++) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        // Bordes para toda la tabla
        $sheet->getStyle("A1:{$endColumn}" . ($fila - 1))->applyFromArray([
            'borders' => [
                'allBorders' => ['borderStyle' => Border::BORDER_THIN],
            ]
        ]);

        // Agregar filtro en la fila 1
        $sheet->setAutoFilter("A1:{$endColumn}1");

        // Descargar el archivo
        $writer = new Xlsx($spreadsheet);
        $filename = 'certificados_' . date('Ymd_His') . '.xlsx';

        return $this->response
            ->setHeader('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet')
            ->setHeader('Content-Disposition', "attachment;filename=\"$filename\"")
            ->setHeader('Cache-Control', 'max-age=0')
            ->setBody($this->streamExcel($writer));
    }

    private function streamExcel($writer)
    {
        ob_start();
        $writer->save('php://output');
        return ob_get_clean();
    }

    public function eliminarSolicitud($id_temp)
    {
        if (!isset($this->session->id_adm)) {
            return redirect()->to(base_url() . 'admin');
        }
        $temporal = $this->temporal->find($id_temp);
        if ($temporal) {
            $this->temporal->delete($id_temp);
            $this->notificaciones->where('id_mascota', $temporal['id_mascota'])->delete();
        }

        return redirect()->to(base_url() . 'admin/certificadosPendientes');
    }
    public function eliminarSolicitudUsuario($id_usuario)
    {
        if (!isset($this->session->id_adm)) {
            return redirect()->to(base_url() . 'admin');
        }
        $usuario = $this->usuario->find($id_usuario);
        if ($usuario) {
            $this->usuario->delete($id_usuario);
            $this->notificaciones->where('id_usuario', $id_usuario)->delete();
        }

        return redirect()->to(base_url() . 'admin/usuariosPendientes');
    }
}
