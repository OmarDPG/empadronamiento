<?php $session = session(); ?>

<main class="d-flex justify-content-center align-items-center bg-withe flex-grow-1 px-3">
    <div class="card shadow-lg border-0 rounded-4 p-4" style="max-width: 400px; width: 100%;">
        <div class="text-center mb-4">
            <!-- <img src="<?= base_url(); ?>/img/iba.jpg" alt="Logo IBA" class="img-fluid" style="max-height: 80px;"> -->
            <h4 class="fw-bold mt-3 text-verde"><i class="fas fa-user-lock me-2"></i>Iniciar Sesión</h4>
        </div>

        <!-- Alertas de validación o sesión -->
        <?php if (isset($validation)) : ?>
            <div class="alert alert-danger">
                <?= $validation->listErrors(); ?>
            </div>
        <?php endif; ?>
        <?php if (isset($error)) : ?>
            <div class="alert alert-danger">
                <?= $error; ?>
            </div>
        <?php endif; ?>
        <?php if (isset($mensaje)) : ?>
            <div class="alert alert-success">
                <?= $mensaje; ?>
            </div>
        <?php endif; ?>

        <!-- Formulario -->
        <form action="<?= base_url(); ?>login/validar" method="post" autocomplete="off">
            <div class="mb-3">
                <label for="correo" class="form-label fw-semibold text-verde"><i class="fas fa-envelope me-1"></i>Correo electrónico</label>
                <input type="email" class="form-control" id="correo" name="correo" placeholder="Ingresa tu correo" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label fw-semibold text-verde"><i class="fas fa-lock me-1"></i>Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Ingresa tu contraseña" required>
            </div>

            <div class="d-grid mb-3">
                <button class="btn btn-verde fw-bold" type="submit">
                    <i class="fas fa-sign-in-alt me-1"></i> Iniciar Sesión
                </button>
            </div>
        </form>

        <div class="text-center mt-3">
            <a href="<?= base_url(); ?>usuario/recoveryPassword" class="text-decoration-none text-secondary">
                <i class="fas fa-unlock-alt me-1"></i> ¿Olvidaste tu contraseña?
            </a>
        </div>
    </div>
</main>
