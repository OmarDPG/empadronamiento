<main class="py-5">
    <div class="container">
        <div class="bg-white rounded-4 shadow p-5 mx-auto" style="max-width: 900px;">
            <h3 class="text-center mb-4 fw-bold">Registro</h3>

            <?php if (isset($validation)) : ?>
                <div class="alert alert-danger">
                    <?= $validation->listErrors(); ?>
                </div>
            <?php endif; ?>

            <form class="needs-validation" method="post" id="form-editUs" name="form-editUs" action="<?= base_url(); ?>registro/pasotres" autocomplete="off" novalidate>

                <!-- Datos de identificación -->
                <h5 class="mb-3 text-secondary">Datos del domicilio</h5>
                <div class="form-group" style="display: none;">
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
                                value="<?= set_value('correo'); ?>" minlength="6" maxlength="30" required>
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
                </div>
                <div class="row g-4">
                    <div class="col-md-6">
                        <label for="nombre_entidad" class="form-label">Entidad</label>
                        <select class="form-select" name="nombre_entidad" id="nombre_entidad" required>
                            <option selected disabled value="">Seleccione una entidad</option>
                            <?php foreach ($entidades as $entidad): ?>
                                <option value="<?= $entidad['nombre_entidad']; ?>"><?= $entidad['nombre_entidad']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="calle" class="form-label">Calle</label>
                        <input type="text" class="form-control" id="calle" name="calle" placeholder="Ej. AVENIDA JUÁREZ" value="<?= set_value('calle'); ?>" minlength="4" maxlength="25" oninput="this.value = this.value.toUpperCase()" required>
                    </div>

                    <div class="col-md-6">
                        <label for="colonia" class="form-label">Colonia</label>
                        <input type="text" class="form-control" id="colonia" name="colonia" placeholder="Ej. CENTRO" value="<?= set_value('colonia'); ?>" minlength="4" maxlength="25" oninput="this.value = this.value.toUpperCase()" required>
                    </div>

                    <div class="col-md-6">
                        <label for="numero" class="form-label">Número</label>
                        <input type="text" class="form-control" id="numero" name="numero"
                            value="<?= set_value('numero'); ?>"
                            placeholder="Ej. 123 o S/N" maxlength="5" required>
                        <div class="invalid-feedback">
                            Solo se permite un número (máx. 5 dígitos) o "S/N".
                        </div>
                    </div>


                    <div class="col-md-6">
                        <label for="cp" class="form-label">Código Postal</label>
                        <input type="text" class="form-control" id="cp" name="cp"
                            value="<?= set_value('cp'); ?>" placeholder="Ej. 72000"
                            maxlength="5" pattern="[0-9]{5}" required>
                        <div class="invalid-feedback">
                            El código postal debe tener exactamente 5 dígitos numéricos.
                        </div>
                    </div>
                </div>

                <!-- Botones -->
                <div class="d-flex justify-content-between mt-5">
                    <a href="<?= base_url(); ?>registro" class="btn btn-secondary btn-lg">Regresar</a>
                    <button type="submit" id="editarMas" class="btn btn-verde btn-lg">Siguiente paso</button>
                </div>
            </form>
        </div>
    </div>
</main>