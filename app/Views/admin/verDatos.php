<?php
foreach ($resultados as $dato) { ?>
    <p>ID: <?= $dato->id_usuario ?></p>
<?php } ?>


<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4"><br>
            <h1 class="mt-1">Aprobar certificados</h1>

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
            <div class="row">
                <form method="post" id="form-editUs" name="form-editUs" action="<?php echo base_url('admin/actualizar') ?>" autocomplete="off">
                    <div class="form-group">
                        <h4 class="mt-4">Datos del usuario:</h4>
                        <input type="hidden" value="<?= $dato->id_usuario; ?>" name="id_usuario" id="id_usuario" />
                        <!-- <input type="hidden" name="id_usuario" /> -->
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-12 col-sm-5">
                                <label for="usuario">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa el nombre de usuario" value="<?= $dato->usuario_nombre; ?>" minlength="4" maxlength="20" readonly>
                            </div>
                            <div class="col-12 col-sm-5">
                                <label for="correo">Correo</label>
                                <input readonly type="email" class="form-control" id="correo" value="<?= $dato->correo; ?>" name="correo" placeholder="Ingresa correo" minlength="6" maxlength="20">
                            </div>
                            <div class="col-12 col-sm-5">
                                <label for="telefono">Telefono</label>
                                <input readonly type="tel" class="form-control" id="telefono" value="<?= $dato->telefono; ?>" name="telefono" placeholder="Ingresa telefono" minlength="6" maxlength="20">
                            </div>
                            <div class="col-12 col-sm-5">
                                <label for="nombre_entidad">Entidad</label>
                                <input readonly type="text" class="form-control text-uppercase" id="nombre_entidad" name="nombre_entidad" placeholder="Ingresa direccion" value="<?= $dato->nombre_entidad; ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-12 col-sm-5">
                                <label for="colonia">Colonia</label>
                                <input readonly type="text" class="form-control" id="colonia" name="colonia" placeholder="Ingresa numero de identificacion" value="<?= $dato->colonia; ?>" required>
                            </div>
                            <div class="col-12 col-sm-5">
                                <label for="cp">CP</label>
                                <input readonly type="text" class="form-control" id="cp" name="cp" placeholder="Ingresa CURP" value="<?= $dato->cp; ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                        </div>
                    </div>
                </form>
            </div>


            <div class="row">
                <form method="post" id="form-editUs" name="form-editUs" action="<?php echo base_url('admin/actualizarPassword') ?>" autocomplete="off">
                    <div class="form-group">
                        <h4 class="mt-4">Datos de la mascota</h4>
                        <input readonly type="hidden" value="<?= $dato->id_usuario; ?>" name="id_usuario" id="id_usuario" />
                        <!-- <input readonly type="hidden" name="id_usuario" /> -->
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-12 col-sm-5">
                                <label for="curp">Nombre</label>
                                <input readonly type="text" class="form-control" id="curp" name="curp" placeholder="Ingresa CURP" value="<?= $dato->nombre; ?>" required>
                            </div>
                            <div class="col-12 col-sm-5">
                                <label for="curp">Raza</label>
                                <input readonly type="text" class="form-control" id="curp" name="curp" placeholder="Ingresa CURP" value="<?= $dato->raza; ?>" required>
                            </div>
                            <div class="col-12 col-sm-5">
                                <label for="curp">Caracteristicas</label>
                                <input readonly type="text" class="form-control" id="curp" name="curp" placeholder="Ingresa CURP" value="<?= $dato->caracteristicas; ?>" required>
                            </div>
                            <div class="col-12 col-sm-5">
                                <label for="curp">Especie</label>
                                <input readonly type="text" class="form-control" id="curp" name="curp" placeholder="Ingresa CURP" value="<?= $dato->especie; ?>" required>
                            </div>
                            <div class="col-12 col-sm-5">
                                <label for="curp">Sexo</label>
                                <input readonly type="text" class="form-control" id="curp" name="curp" placeholder="Ingresa CURP" value="<?= $dato->sexo; ?>" required>
                            </div>
                            <div class="col-12 col-sm-5">
                                <label for="curp">Esterilizado</label>
                                <input readonly type="text" class="form-control" id="curp" name="curp" placeholder="Ingresa CURP" value="<?= $dato->esterilizado; ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                        </div>
                    </div>
                </form>
            </div>

            <div class="row">
                <form method="post" id="form-editUs" name="form-editUs" action="<?php echo base_url('admin/actualizarPassword') ?>" autocomplete="off">
                    <div class="form-group">
                        <h4 class="mt-4 mb-5 ">Documentacion</h4>
                        <input readonly type="hidden" value="<?= $dato->id_usuario; ?>" name="id_usuario" id="id_usuario" />
                        <!-- <input readonly type="hidden" name="id_usuario" /> -->
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-12 col-sm-5">
                                <div class="documento">
                                    <h5 class="color-black-50">Documento de propiedad</h5>
                                    <embed src=" <?= $dato->doc_propiedad ?>" width="100%" height="600px" />
                                </div>
                            </div>
                            <div class="col-12 col-sm-5">
                                <div class="documento">
                                    <h5 class="color-black-50">Fotografia</h5>
                                    <embed src=" <?= $dato->fotografia ?>" width="100%" height="600px" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                        </div>
                    </div>
                </form>
                <div class="row mt-5">
                <div class="row">
                    <h4>Enviar notificacion</h4>
                    <form method="post" action="<?php echo base_url();?>admin/notificacionesCertificado">
                        <input type="hidden" value="<?= $dato->id_usuario; ?>" name="id_usuario" style="display: ;" >
                        <input type="hidden" value="<?= $dato->id_mascota; ?>" name="id_mascota" style="display: ;" >
                        <input type="hidden" value="<?= $dato->correo; ?>" name="correo" style="display: ;" >
                        <div class="form-group">
                            <div class="col-12 col-sm-5">
                                <label for="asunto">Asunto</label>
                                <select class="form-control" name="asunto" id="asunto">
                                    <option value="" selected>Seleccione una opcion</option>
                                    <option value="Solicitar correccion de datos">Solicitar correccion de datos de certificado.</option>
                                </select>
                            </div>
                            <div class="col-12 col-sm-5 d-none">
                                <label for="descripcion">Mas informacion</label>
                                <textarea type="text" class="form-control" name="descripcion"  id="descripcion" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                            </div>
                            <a href="<?php echo base_url(); ?>admin/usuariosPendientes" class="btn btn-secondary">Regresar</a>
                            <button type="submit" id="editarUs" class="btn btn-primary text-center">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </main>