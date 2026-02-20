<?php $session = session(); ?>
<main class="main py-4">
    <div class="container">
        <div class="registro__contenedor bg-light p-4 shadow rounded">
            <h3 class="main__h3 titulo text-center mb-4">Registrar Mascota</h3>

            <?php if (isset($validation)) : ?>
                <div class="alert alert-danger"><?= $validation->listErrors(); ?></div>
            <?php endif; ?>

            <?php if (isset($mensaje)) : ?>
                <div class="alert alert-success"><?= $mensaje; ?></div>
            <?php endif; ?>

            <form class="bt__form" method="post" enctype="multipart/form-data"
                action="<?= base_url('usuario/updateDocumentosMascota') ?>"
                autocomplete="off">

                <!-- Ocultos -->
                <input type="hidden" name="nombre" value="<?= esc($nombre) ?>">
                <input type="hidden" name="id_mascota" value="<?= esc($id_mascota) ?>">
                <input type="hidden" name="curp" value="<?= esc($session->curp) ?>">
                <input type="hidden" name="id_notificacion" value="<?= esc($id_notificacion) ?>">

                <div class="row g-4">
                    <!-- Documento de propiedad -->
                    <div class="col-12 col-md-6">
                        <label for="doc_propiedadd" class="form-label fw-bold">Documento de propiedad</label>
                        <input type="file" class="form-control" id="doc_propiedadd" name="doc_propiedadd"
                            accept=".pdf, .png, .jpg, .jpeg">

                        <div class="mt-3 small">
                            <strong>¿Cuáles son considerados documentos de propiedad?</strong>
                            <ul class="ps-3">
                                <li>Cartilla de vacunación</li>
                                <li>Certificado de adopción</li>
                                <li>Comprobante de vacunas (Antirrábica)</li>
                                <li><a href="#">Carta protesta – <span class="text-danger fw-bold">Descargar aquí</span></a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Fotografía de la mascota -->
                    <div class="col-12 col-md-6">
                        <label for="img_mascota" class="form-label fw-bold">Fotografía de la mascota</label>
                        <input type="file" class="form-control" id="img_mascota" name="img_mascota"
                            accept=".jpg, .jpeg, .png">
                        <div class="mt-2 small">
                            <ul class="ps-3">
                                <li>Fotografía de rostro (frontal)</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Botón -->
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-verde px-4">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</main>