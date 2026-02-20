<?php

namespace App\Controllers;

class Mascotas extends BaseController
{
    public function index()
    {
        echo view('usuario/header');
        echo view('usuario/mascotas');
        echo view('footer');
    }
}