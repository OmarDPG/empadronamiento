<main class="main py-5">
    <div class="container">
        <div class="bg-white shadow rounded-4 p-5">
            <h3 class="text-center text-verde fw-bold mb-4">Actualizar Contraseña</h3>

            <!-- Alertas -->
            <?php if (isset($validation)) : ?>
                <div class="alert alert-danger"><?= $validation->listErrors(); ?></div>
            <?php endif; ?>
            <?php if (isset($mensaje)) : ?>
                <div class="alert alert-success"><?= $mensaje; ?></div>
            <?php endif; ?>

            <!-- Formulario -->
            <form method="post" action="<?= base_url('usuario/updatePassword') ?>" autocomplete="off" novalidate>
                <!-- Datos del usuario -->
                <div class="mb-5">
                    <h5 class="mb-3 text-secondary">Datos del usuario:</h5>
                    <div class="row g-4">
                        <?php
                        $campos = [
                            'nombre' => 'Nombre',
                            'correo' => 'Correo',
                            'telefono' => 'Teléfono',
                            'nombre_entidad' => 'Entidad',
                            'calle' => 'Calle',
                            'colonia' => 'Colonia',
                            'numero' => 'Número',
                            'cp' => 'Código Postal'
                        ];
                        foreach ($campos as $campo => $etiqueta) :
                        ?>
                            <div class="col-12 col-md-6 col-lg-4">
                                <label class="form-label"><?= $etiqueta ?></label>
                                <input type="text" class="form-control" value="<?= esc($usuario[$campo]) ?>" readonly>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Sección de nueva contraseña -->
                <div class="mb-4">
                    <h5 class="mb-3 text-secondary">Nueva contraseña:</h5>
                    <div class="row g-4">
                        <div class="col-12 col-md-6">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Nueva contraseña" minlength="4" maxlength="20" required>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="confpassword" class="form-label">Confirmar contraseña</label>
                            <input type="password" class="form-control" id="confpassword" name="confpassword" placeholder="Repetir contraseña" minlength="4" maxlength="20" required>
                        </div>
                    </div>
                </div>

                <!-- Botones -->
                <div class="text-end pt-4 border-top mt-5">
                    <a href="<?= base_url('usuario') ?>" class="btn btn-secondary me-2">Cancelar</a>
                    <button type="submit" class="btn btn-verde">Cambiar contraseña</button>
                </div>
            </form>
        </div>
    </div>
</main>
