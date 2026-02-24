<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistema de empadronamiento del estado de Puebla">
    <meta name="author" content="Omar Cárcamo Hernández">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>img/icon.png" type="image/x-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
    <!-- FontAwesome -->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

    <title>Empadronamiento</title>

    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }

        .banner-img {
            width: 100%;
            height: auto;
            object-fit: cover;
            max-height: 22vh;
        }

        .nav-link {
            color: rgb(67, 105, 91);
        }

        .nav-link.nav-active,
        .nav-link:hover {
            color: #009900 !important;
            border-bottom: 2px solid #009900;
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba%280, 0, 0, 0.5%29' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
        }
    </style>
</head>

<body class="bg-white d-flex flex-column min-vh-100">

    <!-- Header con banner ancho completo -->
    <header class="w-100">
        <img src="<?php echo base_url(); ?>/img/SEMP_1.png" alt="Banner IBA" class="banner-img img-fluid">
    </header>

    <!-- Navbar Bootstrap 5 -->
    <nav class="navbar navbar-expand-lg bg-light border-bottom shadow-sm" style="width: 100%;">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain"
                aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse justify-content-between align-items-center" id="navbarMain">
                <ul class="navbar-nav mb-2 mb-lg-0 d-flex gap-3">
                    <li class="nav-item">
                        <a class="nav-link text-uppercase fw-semibold" href="<?php echo base_url(); ?>inicio">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-uppercase fw-semibold" href="<?php echo base_url(); ?>servicios">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-uppercase fw-semibold" href="<?php echo base_url(); ?>adopcion">Mascotas para adopción</a>
                    </li>
                </ul>
                <div class="d-flex gap-2">
                    <a href="<?php echo base_url(); ?>registro" class="btn btn-outline-success text-uppercase">Registro</a>
                    <a href="<?php echo base_url(); ?>login" class="btn btn-verde text-uppercase">Iniciar sesión</a>
                </div>
            </div>
        </div>
    </nav>