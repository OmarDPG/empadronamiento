<main class="py-5 flex-grow-1">
    <div class="container">
        <div class="bg-white shadow-sm rounded-4 p-5 mx-auto" style="max-width: 600px;">
            <h3 class="text-center text-verde fw-bold mb-4">
                <i class="bi bi-lock-fill"></i> Restablecer contraseña
            </h3>

            <!-- Mensajes de validación -->
            <?php if (isset($validation)) : ?>
                <div class="alert alert-danger"><?= $validation->listErrors(); ?></div>
            <?php endif; ?>

            <?php if (isset($mensaje)) : ?>
                <div class="alert alert-danger"><?= $mensaje; ?></div>
            <?php endif; ?>

            <!-- Formulario -->
            <form method="post" id="form-editUs" name="form-editUs" action="<?= base_url(); ?>usuario/updateRecoveryPassword" autocomplete="off">
                <!-- Campo oculto con el correo -->
                <input type="hidden" name="correo" id="correo" value="<?= set_value('correo') ?>">

                <!-- Campo contraseña -->
                <div class="mb-4">
                    <label for="password" class="form-label">Nueva contraseña</label>
                    <input type="password" class="form-control" id="password" name="password"
                        placeholder="Ingresa tu nueva contraseña"
                        minlength="6" maxlength="30" required autocomplete="new-password">
                </div>

                <!-- Campo confirmar contraseña -->
                <div class="mb-4">
                    <label for="confpassword" class="form-label">Confirmar contraseña</label>
                    <input type="password" class="form-control" id="confpassword" name="confpassword"
                        placeholder="Confirma tu contraseña"
                        minlength="6" maxlength="30" required autocomplete="new-password">
                </div>

                <!-- Botones -->
                <div class="d-flex justify-content-between gap-2">
                    <a href="<?= base_url(); ?>inicio" class="btn btn-outline-danger w-50">
                        <i class="bi bi-x-circle"></i> Cancelar
                    </a>
                    <button type="submit" class="btn btn-verde w-50">
                        <i class="bi bi-check-circle"></i> Restablecer
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>
