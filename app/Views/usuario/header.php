<?php $session = session(); ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistema de empadronamiento del estado de Puebla">
    <meta name="author" content="Omar Cárcamo Hernández">
    <title>Empadronamiento</title>
    <link rel="shortcut icon" href="<?= base_url(); ?>/img/icon.png" type="image/x-icon">
    <!-- Bootstrap 5 CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <!-- Fuentes y estilo adicional -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body class="bg-withe d-flex flex-column min-vh-100">
    <style>
    /* Colores personalizados */
    .text-verde {
        color: #155724 !important;
    }

    .bg-verde {
        background-color: #d4edda !important;
    }

    /* Hover en menú principal */
    .navbar-nav .nav-link:hover,
    .navbar-nav .nav-link.active {
        color: #0c4128 !important;
        transition: color 0.3s ease;
        text-decoration: underline;
    }

    /* Estilos de dropdown */
    .dropdown-menu {
        animation: fadeIn 0.3s ease-in-out;
        border-radius: 0.5rem;
    }

    /* Animación suave */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .dropdown-item:hover {
        background-color: #e2f0e9;
        color: #0c4128;
        transition: background-color 0.2s ease;
    }

    /* Notificaciones: más espacio */
    .navbar .badge {
        font-size: 0.75rem;
        padding: 0.4em 0.6em;
    }

    .navbar-brand {
        font-weight: 700;
        letter-spacing: 1px;
        font-size: 1.2rem;
    }
    /* Estilo al botón del toggler (mobile menu) */
    .navbar-toggler {
        border: none;
        box-shadow: none;
    }

    .navbar-toggler:focus {
        outline: none;
        box-shadow: none;
    }
</style>

    <!-- Encabezado -->
    <header class="w-100">
        <img src="<?php echo base_url(); ?>/img/IBA.png" alt="Banner IBA" class="banner-img img-fluid">
    </header>

    <!-- Navegación principal -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm w-100">
    <div class="container-fluid px-4"> <!-- Usamos container-fluid para que ocupe 100% -->
        <!-- Logo o Marca -->
        <a class="navbar-brand fw-bold text-uppercase text-verde" href="<?= base_url(); ?>usuario">
            <i class="fas fa-paw me-1"></i>Empadronamiento
        </a>

        <!-- Botón de colapso para pantallas pequeñas -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Contenido del menú -->
        <div class="collapse navbar-collapse" id="menuNavbar">
            <!-- Menú principal (izquierda) -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 gap-lg-3">
                <li class="nav-item">
                    <a class="nav-link text-verde text-decoration-none" href="<?= base_url(); ?>usuario/servicios">
                        <i class="fas fa-hand-holding-heart me-1"></i>Servicios
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-verde text-decoration-none" href="<?= base_url(); ?>usuario/estados">
                        <i class="fas fa-file-alt me-1"></i>Solicitudes
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-verde text-decoration-none" href="<?= base_url(); ?>usuario/mascotas">
                        <i class="fas fa-dog me-1"></i>Registrar Mascota
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-verde text-decoration-none" href="<?= base_url(); ?>usuario/verDocumentos">
                        <i class="fas fa-folder-open me-1"></i>Mis Documentos
                    </a>
                </li>
            </ul>

            <!-- Menú derecho (usuario y notificaciones) -->
            <ul class="navbar-nav mb-2 mb-lg-0 d-flex align-items-center gap-3">
                <!-- Notificaciones -->
                <li class="nav-item dropdown">
                    <a class="nav-link position-relative" href="#" role="button" data-bs-toggle="dropdown">
                        <i class="fas fa-bell text-verde fs-5"></i>
                        <?php if ($contador > 0): ?>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                <?= $contador ?>
                            </span>
                        <?php endif; ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <?php foreach ($notificaciones as $notificacion): ?>
                            <li>
                                <a class="dropdown-item small" href="<?= $notificacion['enlace'] . '/' . $notificacion['id_notificacion']; ?>">
                                    <?= $notificacion['asunto']; ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                        <?php if (empty($notificaciones)): ?>
                            <li><span class="dropdown-item text-muted small">Sin notificaciones</span></li>
                        <?php endif; ?>
                    </ul>
                </li>

                <!-- Usuario -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-verde" href="#" role="button" data-bs-toggle="dropdown">
                        <i class="fas fa-user me-1"></i><?= $session->nombre ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item text-verde" href="<?= base_url(); ?>usuario/editarPassword">
                                <i class="fas fa-key me-2"></i>Editar contraseña
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item text-verde" href="<?= base_url(); ?>usuario/notificaciones">
                                <i class="fas fa-bell me-2"></i>Notificaciones
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item text-verde" href="<?= base_url(); ?>usuario/salir">
                                <i class="fas fa-sign-out-alt me-2"></i>Salir
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>


