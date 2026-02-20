<?php

namespace App\Controllers;

class Servicios extends BaseController
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
        echo view('servicios');
        echo view('footer');
    }
}