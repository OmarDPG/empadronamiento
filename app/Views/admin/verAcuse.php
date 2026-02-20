<?php $user_session = session();
?>


<div id="layoutSidenav_content">
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-0">
            <div class="row gx-1 gx-lg-5 row-cols-1 row-cols-md-1 row-cols-xl-1 justify-content-center">

                <div class="col mb-5">
                    <div class="card-header">
                        <p>
                            <a href="<?php echo base_url(); ?>admin/certificados" class="btn btn-secondary regresar"><i class="fa-solid fa-arrow-left"></i> Regresar</a>
                            <a href="<?php echo base_url() . "/admin/generarAcuse/" . $id_mascota ?>" download target="_blank" class="btn btn-primary verde"><i class="fa-solid fa-file-arrow-down"></i> Descargar</a>
                        </p>
                    </div>
                    <div class="card-header">
                    </div>
                    <?php if (isset($validation)) { ?>
                        <div class="alert alert-danger">
                            <?php echo $validation->listErrors(); ?>
                        </div>
                    <?php } ?>
                    <?php if (isset($error)) { ?>
                        <div class="alert alert-danger">
                            <?php echo $error; ?>
                        </div>
                    <?php } ?>
                    <div class="card-body bg-light">
                        <div class="panel">
                            <div class="embed-responsive embed-responsive-4by3 ratio ratio-16x9" style="margin-top: 30px; ">
                                <iframe class="embed-responsive-item" src="<?php echo base_url() . "/admin/generarAcuse/" . $id_mascota; ?>"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>