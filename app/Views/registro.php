<main class="container my-5 flex-grow-1">
    <div class="bg-light p-4 rounded shadow">
        <h3 class="text-center mb-4 fw-bold">Registro</h3>

        <!-- Checkbox de aviso de privacidad -->
        <div class="form-check mb-4 text-center d-flex justify-content-center gap-1">
            <input class="form-check-input" type="checkbox" id="mostrarFormulario">
            <label class="form-check-label" for="mostrarFormulario">
                Acepto el aviso de privacidad
            </label>
        </div>

        <!-- Validación de errores -->
        <?php if (isset($validation)) : ?>
            <div class="alert alert-danger">
                <?= $validation->listErrors(); ?>
            </div>
        <?php endif; ?>

        <!-- Formulario oculto hasta aceptar -->
        <form id="formulario" class="d-none p-4 bg-white border rounded shadow-sm" method="post" action="<?= base_url(); ?>registro/pasodos" autocomplete="off">
            <!-- <input type="hidden" name="id_mascota" value="<?= set_value('id_ususario'); ?>"> -->

            <h5 class="mb-4 fw-bold verde">Datos del usuario</h5>
            <div class="row g-4">
                <!-- Nombre -->
                <div class="col-md-6">
                    <label for="nombre" class="form-label">Nombre completo</label>
                    <input type="text" id="nombre" name="nombre" class="form-control form-control-lg" placeholder="JUAN PÉREZ LÓPEZ"
                        value="<?= set_value('nombre'); ?>" minlength="4" maxlength="50" oninput="this.value = this.value.toUpperCase()" required>
                </div>

                <!-- Teléfono -->
                <div class="col-md-6">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="tel" id="telefono" name="telefono" class="form-control form-control-lg" placeholder="2221234567"
                        value="<?= set_value('telefono'); ?>" minlength="7" maxlength="10" inputmode="numeric" pattern="[0-9]{7,10}" required>
                </div>

                <!-- Correo -->
                <div class="col-md-6">
                    <label for="correo" class="form-label">Correo electrónico</label>
                    <input type="email" id="correo" name="correo" class="form-control form-control-lg" placeholder="usuario@correo.com"
                        value="<?= set_value('correo'); ?>" minlength="6" maxlength="50" required>
                </div>
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" id="password" name="password" class="form-control form-control-lg"
                        value="<?= set_value('password'); ?>" placeholder="Mínimo 8 caracteres" minlength="8" maxlength="20" required>
                </div>
                <div class="col-md-6">
                    <label for="confpassword" class="form-label">Confirmar contraseña</label>
                    <input type="password" id="confpassword" name="confpassword" class="form-control form-control-lg"
                        value="<?= set_value('confpassword'); ?>" placeholder="Confirma tu contraseña" minlength="8" maxlength="20" required>
                </div>
            </div>
            <div class="mt-5 d-flex justify-content-between">
                <a href="<?= base_url(); ?>inicio" class="btn btn-secondary btn-lg">Cancelar</a>
                <button type="submit" class="btn btn-verde btn-lg">Siguiente paso</button>
            </div>
        </form>


        <!-- Aviso de privacidad -->
        <div class="mt-4 text-center">
            <p>Consulta nuestro aviso de privacidad en el apartado Padrón Estatal de Perros y Gatos</p>
            <a href="https://iba.puebla.gob.mx/avisos-de-privacidad" class="d-block" target="_blank">
                https://iba.puebla.gob.mx/avisos-de-privacidad
            </a>
        </div>
    </div>
</main>
