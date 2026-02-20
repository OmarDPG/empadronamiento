<!-- <?php
        $user_session = session();
        ?> -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="Omar Cárcamo Hernández, omar.ch0896@gmail.com, " />
    <!--<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />-->
    <link rel="icon" type="image/x-icon" href="<?php echo base_url(); ?>/img/icon.png" />
    <title>Empadronamiento Admin</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.2.0/css/dataTables.dateTime.min.css">
    <link href="<?php echo base_url(); ?>/css/stylesAdm.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>/plugins/summernote/summernote-bs4.min.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <style>
        .noSelect {
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
        }
    </style>
</head>

<body class="sb-nav-fixed" style="filter: -grayscale(100%);">
    <nav class="sb-topnav noSelect navbar navbar-expand navbar-dark bg-dark" style="background-color:#43695b !important;">
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars" style="color: #ffffff !important;"></i></button>
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="<?php echo base_url(); ?>admin/inicio">Administrador Empadronamiento de Mascotas del Estado de Puebla <i class="fa-solid fa-paw" style="color: #ffffff;"></i></a>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto md-0 me-3 me-lg-4 me-md-3 my-2 my-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw" style="color: #ffffff !important;"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="<?php echo base_url(); ?>/admin/modificarPassw">Modificar tu contraseña</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="<?php echo base_url(); ?>admin/logout">Salir</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-light" style="background-color:#f1f1f1 !important;" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav noSelect">
                        <div class="sb-sidenav-menu-heading">Control</div>
                        <a class="nav-link" href="<?php echo base_url(); ?>admin/usuarios">
                            <div class="sb-nav-link-icon"><i class="fas fa-user fa-fw"></i></div>
                            Control de Usuarios
                        </a>
                        <a class="nav-link" href="<?php echo base_url(); ?>admin/certificados">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-certificate"></i></div>
                            Control de Certificados
                        </a>
                        <a class="nav-link" href="<?php echo base_url(); ?>admin/certificadosPendientes">
                            <div class="sb-nav-link-icon"><i class="fa-regular fa-clock"></i></div>
                            Certificados Pendientes
                        </a>
                        <a class="nav-link" href="<?php echo base_url(); ?>admin/usuariosPendientes">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-user-xmark"></i></div>
                            Usuarios Pendientes
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer noSelect" style="background-color:#6b6b6b !important; color: #fff;">
                    <div class="small">Accedió como:</div>
                    <?php echo $user_session->usuario; ?>
                </div>
            </nav>
        </div>
