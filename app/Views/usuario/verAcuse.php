<?php $user_session = session(); ?>
<section class="py-5">
    <div class="container px-3 px-md-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">

                <!-- Botones -->
                <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
                    <a href="<?= base_url(); ?>usuario" class="btn btn-outline-secondary">
                        <i class="fa-solid fa-arrow-left"></i> Regresar
                    </a>
                    <a href="<?= base_url()."/usuario/generarAcuse/".$id_certificado ?>" download target="_blank" class="btn btn-success">
                        <i class="fa-solid fa-file-arrow-down"></i> Descargar
                    </a>
                </div>

                <!-- Validaciones -->
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

                <!-- Panel con PDF -->
                <div class="card shadow-sm">
                    <div class="card-body p-3 bg-light">
                        <div class="ratio ratio-4x3">
                            <iframe class="rounded border" src="<?= base_url() . "/usuario/generarAcuse/" . $id_certificado; ?>" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
