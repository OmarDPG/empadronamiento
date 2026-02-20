<main class="py-5">
    <div class="container">
        <div class="bg-withe rounded-4 shadow p-5 mx-auto" style="max-width: 900px;">
            <h3 class="text-center text-verde fw-bold mb-4">Registro</h3>

            <?php if (isset($validation)) : ?>
                <div class="alert alert-danger"><?= $validation->listErrors(); ?></div>
            <?php endif; ?>

            <?php if (isset($mensaje)) : ?>
                <div class="alert alert-success"><?= $mensaje; ?></div>
            <?php endif; ?>

            <form method="post" id="form-editUs" name="form-editUs" action="<?= base_url(); ?>registro/insertar" autocomplete="off" enctype="multipart/form-data">

                <!-- 🔒 DATOS OCULTOS (RESPECTADOS) -->
                <div style="display: none;">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="nombre">Nombre</label>
                            <input readonly type="text" class="form-control" id="nombre" name="nombre" value="<?= set_value('nombre') ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="correo">Correo</label>
                            <input readonly type="text" class="form-control" id="correo" name="correo" value="<?= set_value('correo') ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="telefono">Teléfono</label>
                            <input readonly type="text" class="form-control" id="telefono" name="telefono" value="<?= set_value('telefono') ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="password">Contraseña</label>
                            <input readonly type="password" class="form-control" id="password" name="password" value="<?= set_value('password') ?>" minlength="4" maxlength="20" required>
                        </div>
                        <div class="col-md-6">
                            <label for="confpassword">Confirmar Contraseña</label>
                            <input readonly type="password" class="form-control" id="confpassword" name="confpassword" value="<?= set_value('confpassword') ?>" minlength="4" maxlength="20" required>
                        </div>
                    </div>
                    <h5 class="text-secondary fw-bold mt-4 mb-3">Datos del domicilio</h5>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label for="nombre_entidad" class="form-label">Entidad</label>
                            <select class="form-select" name="nombre_entidad" id="nombre_entidad" required>
                                <option selected disabled value="">Seleccione una entidad</option>
                                <?php foreach ($entidades as $entidad) : ?>
                                    <option value="<?= $entidad['nombre_entidad']; ?>"
                                        <?= isset($_POST['nombre_entidad']) && $_POST['nombre_entidad'] == $entidad['nombre_entidad'] ? 'selected' : '' ?>>
                                        <?= $entidad['nombre_entidad']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="calle" class="form-label">Calle</label>
                            <input readonly type="text" class="form-control" id="calle" name="calle" placeholder="Ej. AVENIDA JUÁREZ" value="<?= set_value('calle') ?>" minlength="4" maxlength="50" oninput="this.value = this.value.toUpperCase()" required>
                        </div>

                        <div class="col-md-6">
                            <label for="colonia" class="form-label">Colonia</label>
                            <input readonly type="text" class="form-control" id="colonia" name="colonia" placeholder="Ej. CENTRO" value="<?= set_value('colonia') ?>" minlength="4" maxlength="50" oninput="this.value = this.value.toUpperCase()" required>
                        </div>

                        <div class="col-md-6">
                            <label for="numero" class="form-label">Número</label>
                            <input readonly type="text" class="form-control" id="numero" name="numero" placeholder="Ej. 123 o S/N" value="<?= set_value('numero') ?>" maxlength="5" required>
                        </div>

                        <div class="col-md-6">
                            <label for="cp" class="form-label">C.P.</label>
                            <input readonly type="text" class="form-control" id="cp" name="cp" placeholder="Ej. 72000" value="<?= set_value('cp') ?>" maxlength="5" pattern="\d{5}" required>
                        </div>
                    </div>
                </div>

                <!-- 📎 DOCUMENTOS -->
                <h5 class="text-secondary fw-bold mt-5 mb-3">Documentación</h5>
                <div class="row g-4">
                    <div class="col-md-6">
                        <label for="doc_identificacion" class="form-label">INE</label>
                        <input type="file" class="form-control" id="doc_identificacion" name="doc_identificacion" accept=".pdf, image/png, image/jpeg" required>
                    </div>
                    <div class="col-md-6">
                        <label for="doc_curp" class="form-label">CURP</label>
                        <input type="file" class="form-control" id="doc_curp" name="doc_curp" accept=".pdf, image/png, image/jpeg" required>
                    </div>
                    <div class="col-md-6">
                        <label for="doc_domicilio" class="form-label">Comprobante de domicilio</label>
                        <input type="file" class="form-control" id="doc_domicilio" name="doc_domicilio" accept=".pdf, image/png, image/jpeg" required>
                    </div>
                </div>

                <!-- 🔘 BOTÓN -->
                <div class="text-center mt-5">
                    <button type="submit" class="btn btn-verde btn-lg px-5">Enviar</button>
                </div>

            </form>
        </div>
    </div>
</main>