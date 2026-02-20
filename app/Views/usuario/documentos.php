<?php
$session = session();
?>
<main class="main">
    <div class="main__registro">
        <div class="registro__contenedor bg-light">
            <h3 class="main__h3 titulo">Documentos</h3>
            <div class="registro__contenedor--formulario documentos">
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
                    
                <form class="form form__documentos" action=" <?php echo base_url(); ?>usuario/enviarDocumentos" method="POST" autocomplete="off" enctype="multipart/form-data">
                    <input type="hidden" value="<?php echo $usuario['id_usuario']; ?>" name="id_usuario" />
                    <input type="hidden" value="<?php echo $usuario['curp']; ?>" name="id_usuario" />
                    <div class="contenido__form">
                        <div class="form__input">
                            <label class="label" for="">Documento de Identificacion</label>
                            <input class="inputR" type="file" id="doc_identificacion" name="doc_identificacion" accept=".pdf">
                        </div>
                        <div class="form__input">
                            <label class="label" for="">Comprobante Domiciliario</label>
                            <input class="inputR" type="file" id="doc_domicilio" name="doc_domicilio" accept=".pdf">
                        </div>
                        <div class="form__input">
                            <label class="label" for="">CURP</label>
                            <input class="inputR" type="file" id="doc_curp" name="doc_curp" accept=".pdf">
                        </div>
                    </div>
                    <div class="botones">
                        <a href="<?php echo base_url(); ?>usuario" class="submit regresar">Regresar</a>
                        <input class="submit" type="submit" value="Enviar">
                    </div>
                </form>

            </div>
        </div>
    </div>
</main>