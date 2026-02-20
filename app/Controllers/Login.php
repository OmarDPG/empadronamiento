<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\UsuarioModel;
use App\Models\MascotasModel;

class Login extends BaseController
{
    use ResponseTrait;
    protected $reglasLogin;
    protected $usuarios, $mascotas, $session;


    public function __construct()
    {
        helper(['form']);
        $this->usuarios = new UsuarioModel();
        $this->mascotas = new MascotasModel();
        $this->session = session();

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
    }
    public function index($activo = 1)
    {
        if (isset($this->session->id_usuario)) {
            return redirect()->to(base_url() . 'usuario');
        }
        echo view('header');
        echo view('login');
        echo view('footer');
    }
    public function validar()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglasLogin)) {
            $correo = $this->request->getPost('correo');
            $password = $this->request->getPost('password');

            $datosusuario = $this->usuarios->where('correo', $correo)->first();

            if ($datosusuario != null) {
                // Verifica si el usuario está activo
                if ($datosusuario['activo'] == 1) {
                    if (password_verify($password, $datosusuario['password'])) {
                        $datosSesion = [
                            'id_usuario' => $datosusuario['id_usuario'],
                            'nombre' => $datosusuario['nombre'],
                            'activo' => $datosusuario['activo'],
                            'telefono' => $datosusuario['telefono'],
                            'correo' => $datosusuario['correo'],
                            'fecha_ultima' => $datosusuario['fecha_ultima'],
                            'c_acceso' => date('Y-m-d H:i:s')
                        ];
                        $session = session();
                        $session->set($datosSesion);
                        $this->usuarios->update($session->id_usuario, ['fecha_ultima' => $session->c_acceso]);
                        return redirect()->to(base_url() . 'usuario');
                    } else {
                        $data['error'] = "Contraseña errónea.";

                        echo view('header');
                        echo view('login', $data);
                        echo view('footer');
                    }
                } else {
                    $data['error'] = "Esta cuenta aun no se ha activado.";
                    echo view('header');
                    echo view('login', $data);
                    echo view('footer');
                }
            } else {
                $data['error'] = "El correo no esta registrado.";
                echo view('header');
                echo view('login', $data);
                echo view('footer');
            }
        } else {
            $data = ['validation' => $this->validator];
            echo view('header');
            echo view('login', $data);
            echo view('footer');
        }
    }
}
