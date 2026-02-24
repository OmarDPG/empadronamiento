<main class="main py-4">
    <div class="container bg-light rounded shadow p-4">
        <h3 class="mb-4 text-center fw-bold">Datos Generales</h3>

        <?php if (isset($validation)): ?>
            <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
        <?php endif; ?>

        <?php if (isset($mensaje)): ?>
            <!-- <div class="alert alert-success"><?= $mensaje ?></div> -->
        <?php endif; ?>

        <?php if (isset($curp_mascota) && isset($solicitud)): ?>
            <div class="alert alert-success">
                <p><strong>Folio generado:</strong> <?= esc($curp_mascota) ?></p>
                <p><strong>Número de solicitud:</strong> <?= esc($solicitud) ?></p>
            </div>
        <?php endif; ?>

        <!-- Datos del Usuario -->
        <h4 class="mt-4 fw-semibold">Datos del Usuario</h4>
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Nombre</label>
                <input readonly type="text" class="form-control" value="<?= $usuario['nombre'] ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label">Correo</label>
                <input readonly type="email" class="form-control" value="<?= $usuario['correo'] ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label">Teléfono</label>
                <input readonly type="tel" class="form-control" value="<?= $usuario['telefono'] ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label">Entidad</label>
                <input readonly type="text" class="form-control text-uppercase" value="<?= $usuario['nombre_entidad'] ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label">Calle</label>
                <input readonly type="text" class="form-control" value="<?= $usuario['calle'] ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label">Colonia</label>
                <input readonly type="text" class="form-control" value="<?= $usuario['colonia'] ?>">
            </div>
            <div class="col-md-4">
                <label class="form-label">Número</label>
                <input readonly type="text" class="form-control" value="<?= $usuario['numero'] ?>">
            </div>
            <div class="col-md-4">
                <label class="form-label">CP</label>
                <input readonly type="text" class="form-control" value="<?= $usuario['cp'] ?>">
            </div>
            <div class="col-md-4">
                <label class="form-label">Clave Entidad</label>
                <input readonly type="text" class="form-control" value="<?= $usuario['cve_entidad'] ?>">
            </div>
        </div>

        <!-- Datos de la Mascota -->
        <h4 class="mt-5 fw-semibold">Datos de la Mascota</h4>
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Nombre</label>
                <input readonly type="text" class="form-control" value="<?= $mascota['nombre'] ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label">Edad</label>
                <input readonly type="text" class="form-control" value="<?= $mascota['edad'] ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label">Raza</label>
                <input readonly type="text" class="form-control" value="<?= $mascota['raza'] ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label">Especie</label>
                <input readonly type="text" class="form-control" value="<?= $mascota['especie'] ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label">Vacunado</label>
                <input readonly type="text" class="form-control" value="<?= $mascota['vacunado'] ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label">Esterilizado</label>
                <input readonly type="text" class="form-control" value="<?= $mascota['esterilizado'] ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label">Sexo</label>
                <input readonly type="text" class="form-control" value="<?= $mascota['sexo'] ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label">Características</label>
                <input readonly type="text" class="form-control" value="<?= $mascota['caracteristicas'] ?>">
            </div>
        </div>

        <!-- Documentos -->
        <h4 class="mt-5 fw-semibold">Documentos Cargados</h4>
        <div class="row g-4">
            <!-- PDF -->
            <div class="col-md-6">
                <label class="form-label d-block">Documento de propiedad</label>
                <div class="position-relative border rounded" style="height: 400px; overflow: hidden;">
                    <embed src="<?= $rutaMascota ?>" type="application/pdf" width="100%" height="100%" style="pointer-events: none;" />
                    <button type="button" class="position-absolute top-0 start-0 w-100 h-100 btn btn-link p-0" data-bs-toggle="modal" data-bs-target="#modalPDF" style="z-index: 10; background: transparent;"></button>
                </div>
            </div>

            <!-- Imagen -->
            <div class="col-md-6">
                <label class="form-label d-block">Fotografía de la mascota</label>
                <div class="border rounded" style="height: 400px; overflow: auto; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#modalImagen">
                    <img src="<?= $rutaImagen ?>" alt="Fotografía" class="img-fluid w-100 h-100 object-fit-contain" />
                </div>
            </div>
        </div>
        <div class="mt-5 text-center">
            <a href="<?= base_url('usuario/estados') ?>" class="btn btn-verde">
                <i class="fas fa-home me-2"></i> Volver al inicio
            </a>
        </div>

        <!-- Modal PDF -->
        <div class="modal fade" id="modalPDF" tabindex="-1" aria-labelledby="modalPDFLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Documento de propiedad</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        <embed src="<?= $rutaMascota ?>" type="application/pdf" width="100%" height="600px" />
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Imagen -->
        <div class="modal fade" id="modalImagen" tabindex="-1" aria-labelledby="modalImagenLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Fotografía de la mascota</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img src="<?= $rutaImagen ?>" alt="Fotografía Ampliada" class="img-fluid rounded" style="max-height: 90vh;" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>