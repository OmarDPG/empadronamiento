<?php
$session = session();
?>
<?php
foreach ($resultados as $dato) { ?>

<?php } ?>
<main class="main">
    <div class="main__registro">
        <div class="registro__contenedor bg-light">
            <h3 class="main__h3 titulo">Registrar Mascota</h3>
            <div class="registro__contenedor--formulario">
                <?php if (isset($validation)) { ?>
                    <div class="alert alert-danger">
                        <?php echo $validation->listErrors(); ?>
                    </div>
                <?php } ?>
                <?php if (isset($mensaje)) { ?>
                    <div class="alert alert-success">
                        <?php echo $mensaje; ?>
                    </div>
                <?php } ?>
                <form class="bt__form" method="post" id="form-editUs" name="form-editUs" action="<?php echo base_url(); ?>usuario/enviarDocumentosMascota" autocomplete="off" enctype="multipart/form-data">
                    <div class="form-group">
                        <h4 class="mt-4">Adjunta tus documentos:</h4>
                        <input type="hidden" value="<?= $dato->nombre; ?>" name="nombre" id="nombre" />
                        <input type="hidden" value="<?= $dato->id_mascota; ?>" name="id_mascota" id="id_mascota" />
                        <!-- <input type="hidden" value="<?//= $session->curp; ?>" name="curp" id="curp" /> -->
                        <!-- <input type="hidden" value="<? //php echo $usuario['curp']; 
                                                            ?>" name="id_usuario" /> -->
                        <!-- <input type="hidden" name="id_usuario" /> -->
                    </div>
                    <div class="form-group">
                        <div class="row center">
                            <div class="col-12 col-sm-6">
                                <label for="doc_propiedadd" class="form-label">Documento de propiedad</label>
                                <input type="file" class="form-control" id="doc_propiedadd" name="doc_propiedadd" accept=".pdf, image/png, image/jpeg, image/jpg" placeholder="">
                                <p class="mt-2"><b>¿Cuales son considerados documentos de propiedad?</b></p>
                                <ul>
                                    <li style="list-style-type: disc;">Cartilla de vacunacion</li>
                                    <li style="list-style-type: disc;">Certificado de Adopcion</li>
                                    <li style="list-style-type: disc;">Comprobande de vacunas (Antirrabica)</li>
                                    <!-- <li style="list-style-type: disc;"><a href="#">Carta protesta - <b class="color-guinda">Puedes descargarla dando click aqui</b></a></li> -->
                                </ul>

                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="d-flex flex-column justify-content-left align-items-center">
                                    <button class="d-flex flex-column w-100" type="button" class="" data-bs-toggle="tooltip" data-bs-placement="right" title="La fotografia de la mascota debe ser de su cara en formato ">
                                        <label for="img_mascota" class="form-label">Imagen de la Mascota</label>
                                        <input type="file" class="form-control" id="img_mascota" name="img_mascota" accept="image/jpg, image/png, image/jpeg" placeholder="">
                                    </button>
                                    <div class="w-100">
                                        <ul>
                                            <li style="list-style-type: disc;">Fotografia de frente o rostro</li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- <div class="row center">
                            <div class="col-12 col-sm-6">
                                <label for="img_mascota" class="form-label">Imagen de la Mascota</label>
                                <input type="file" class="form-control" id="img_mascota" name="img_mascota" placeholder="" accept=".png, .jpg, jpeg">
                            </div>
                        </div> -->
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                        </div>
                        <button type="submit" id="editarMas" class="btn btn-primary text-center">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>