<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\UsuarioModel;
use App\Models\MascotasModel;
use App\Controllers\BaseController;
use App\Models\CertificadosModel;
use CodeIgniter\Email\Email;
use App\Models\TemporalModel;
use CodeIgniter\I18n\Time;
use CodeIgniter\Controller;
use FPDF;
use CodeIgniter\Files\File;
setlocale(LC_TIME, 'es_ES.utf8', 'es_ES', 'esp');
class Correo extends BaseController
{
    protected $usuario, $usuarios, $mascotas, $session, $mascota, $idUsuario, $certificado, $certificados, $rutaDomicilio, $temporal;
    protected $reglas, $reglasLogin, $reglasUpdatePassword, $reglasMascota, $reglasArchivos;

    public function __construct()
    {
        $this->usuario = new UsuarioModel();
        $this->mascota = new MascotasModel();
        $this ->certificado = new CertificadosModel();
        $this ->temporal = new TemporalModel();
        $this->session = session();
    }
    public function correoRegistro(){
        // Load the email library
        $email = \Config\Services::email();
        $email->setFrom('omar.ch0896@gmail.com', 'Instituto del Bienestar Animal');
        // Set the email parameters
        $email->setTo('cobu0810@gmail.com');
        $email->setSubject('Finalizacion de Registro');
        $email->setMessage('Estimado usuario ha concluido su registro al Sistema de Empadronamiento de Perros y Gatos del Estado de Puebla 
                            <br> 
                            Favor de mantenerse al pendiente de su correo electronico pues en el recibira actualizaciones con respecto al tramite solicitado.
                            <br><br> Instituto del Bienestar Animal');

        // Send the email
        if ($email->send()) {
            return redirect() -> to(base_url().'registro/finalizacion');
        } else {
            echo 'Error sending email: ' . $email->printDebugger(['headers']);
        }
    }
    public function certificadoAprobado(){
        // Load the email library
        $email = \Config\Services::email();
        $email->setFrom('omar.ch0896@gmail.com', 'Instituto del Bienestar Animal');
        // Set the email parameters
        $email->setTo('$correo');
        $email->setSubject('Certificado Aprobado');
        $email->setMessage('Estimado usuario nos satisface indicarle que su certificado ha sido aprobado y ya se encuentra disponible para su descarga. 
                            <br> 
                            Favor de mantenerse al pendiente de su correo electronico pues en el recibira actualizaciones con respecto al tramite solicitado.
                            <br><br> Instituto del Bienestar Animal');
        if ($email->send()) {
            echo 'Email sent successfully';
        } else {
            echo 'Error sending email: ' . $email->printDebugger(['headers']);
        }
    }
    public function certificadoCancelado(){
        // Load the email library
        $email = \Config\Services::email();
        $email->setFrom('omar.ch0896@gmail.com', 'Instituto del Bienestar Animal');
        // Set the email parameters
        $email->setTo('cobu0810@gmail.com');
        $email->setSubject('Certificado Rechazado');
        $email->setMessage('Estimado usuario ha concluido su registro al Sistema de Empadronamiento de Perros y Gatos del Estado de Puebla 
                            <br> 
                            Favor de mantenerse al pendiente de su correo electronico pues en el recibira actualizaciones con respecto al tramite solicitado.
                            <br><br> Instituto del Bienestar Animal');
        if ($email->send()) {
            echo 'Email sent successfully';
        } else {
            echo 'Error sending email: ' . $email->printDebugger(['headers']);
        }
    }
    public function usuarioRechazado(){
        // Load the email library
        $email = \Config\Services::email();
        $email->setFrom('omar.ch0896@gmail.com', 'Instituto del Bienestar Animal');
        // Set the email parameters
        $email->setTo('cobu0810@gmail.com');
        $email->setSubject('Certificado Rechazado');
        $email->setMessage('Estimado usuario ha concluido su registro al Sistema de Empadronamiento de Perros y Gatos del Estado de Puebla 
                            <br> 
                            Favor de mantenerse al pendiente de su correo electronico pues en el recibira actualizaciones con respecto al tramite solicitado.
                            <br><br> Instituto del Bienestar Animal');
        if ($email->send()) {
            echo 'Email sent successfully';
        } else {
            echo 'Error sending email: ' . $email->printDebugger(['headers']);
        }
    }
    public function usuarioAprobado(){
        // Load the email library
        $email = \Config\Services::email();
        $email->setFrom('omar.ch0896@gmail.com', 'Instituto del Bienestar Animal');
        // Set the email parameters
        $email->setTo('$correo');
        $email->setSubject('Usuario Aprobado');
        $email->setMessage('Estimado usuario le informamos que ya concluido la revicion de sus datos y hemos avtivado su cuenta, favor de ingresar con el correo y contraseña 
                            que registro  previamente en su registro
                            <br> 
                            Favor de mantenerse al pendiente de su correo electronico pues en el recibira actualizaciones con respecto al estado de sus certificados.
                            <br><br> Instituto del Bienestar Animal');
        if ($email->send()) {
            echo 'Email sent successfully';
        } else {
            echo 'Error sending email: ' . $email->printDebugger(['headers']);
        }
    }
    public function correoPreMascota(){
        // Load the email library
        $email = \Config\Services::email();
        $email->setFrom('omar.ch0896@gmail.com', 'Instituto del Bienestar Animal');
        // Set the email parameters
        $email->setTo('$correo');
        $email->setSubject('Usuario Aprobado');
        $email->setMessage('Estimado usuario le informamos que ya concluido la revicion de sus datos y hemos avtivado su cuenta, favor de ingresar con el correo y contraseña 
                            que registro  previamente en su registro
                            <br> 
                            Favor de mantenerse al pendiente de su correo electronico pues en el recibira actualizaciones con respecto al estado de sus certificados.
                            <br><br> Instituto del Bienestar Animal');
        if ($email->send()) {
            echo 'Email sent successfully';
        } else {
            echo 'Error sending email: ' . $email->printDebugger(['headers']);
        }
    }
    
    public function registrar()
    {
        echo view('header');
        echo view('admin/registrar');
        echo view('footer');
    }
}