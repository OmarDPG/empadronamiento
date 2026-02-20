<main class="py-5 flex-grow-1">
    <div class="container">
        <div class="bg-white shadow-sm rounded-4 p-5 mx-auto" style="max-width: 600px;">
            <h3 class="text-center text-verde fw-bold mb-4">
                <i class="bi bi-shield-lock"></i> Recuperación de contraseña
            </h3>

            <!-- Mensajes de validación -->
            <?php if (isset($validation)) : ?>
                <div class="alert alert-danger"><?= $validation->listErrors(); ?></div>
            <?php endif; ?>

            <?php if (isset($mensaje)) : ?>
                <div class="alert alert-danger"><?= $mensaje; ?></div>
            <?php endif; ?>

            <!-- Formulario -->
            <form method="post" id="form-editUs" name="form-editUs" action="<?= base_url(); ?>usuario/newPassword" autocomplete="off">
                <input type="hidden" name="id_usuario" value="<?= set_value('id_usuario') ?>">

                <div class="mb-4">
                    <label for="correo" class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control" id="correo" name="correo"
                        value="<?= set_value('correo') ?>"
                        placeholder="Ingresa tu correo registrado"
                        minlength="6" maxlength="40"
                        required autocomplete="email">
                </div>

                <div class="d-flex justify-content-between gap-2">
                    <a href="<?= base_url(); ?>inicio" class="btn btn-outline-secondary w-50">
                        <i class="bi bi-arrow-left-circle"></i> Cancelar
                    </a>
                    <button type="submit" class="btn btn-verde w-50">
                        <i class="bi bi-arrow-right-circle"></i> Siguiente paso
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>
