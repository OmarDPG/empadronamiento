<?php

namespace App\Controllers;

class Preguntas extends BaseController
{
    protected $session;
    public function __construct()
    {
        $this->session = session();
    }
    public function index()
    {
        if (isset($this->session->id_usuario)) {
            return redirect()->to(base_url() . 'usuario');
        }
        echo view('header');
        echo view('preguntas');
        echo view('footer');
    }
}