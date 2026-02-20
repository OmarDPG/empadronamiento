<?php
foreach ($resultados as $dato) { ?>
    <p>ID: <?= $dato->id_usuario ?></p>
<?php } ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4"><br>
            <h1 class="mt-1">Datos Generales</h1>

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

                <?php if (session()->has('message')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo session('message'); ?>
                    </div>
                <?php endif; ?>

                <?php if (session()->has('error')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo session('error'); ?>
                    </div>
                <?php endif; ?>
                <form method="post" id="form-editUs" name="form-editUs" action="<?php echo base_url('admin/aprobarUsuario/' . $dato->id_usuario) ?>" autocomplete="off">
                    <div class="form-group">
                        <h4 class="mt-4">Datos del usuario:</h4>
                        <input type="hidden" value="<?= $dato->id_usuario; ?>" name="id_usuario" id="id_usuario" />
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-12 col-sm-5">
                                <label for="usuario">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa el nombre de usuario" value="<?= $dato->nombre; ?>" minlength="4" maxlength="20" readonly>
                            </div>
                            <div class="col-12 col-sm-5">
                                <label for="correo">Correo</label>
                                <input readonly type="email" class="form-control" id="correo" value="<?= $dato->correo; ?>" name="correo" placeholder="Ingresa correo" minlength="6" maxlength="20">
                            </div>
                            <div class="col-12 col-sm-5">
                                <label for="telefono">Telefono</label>
                                <input readonly type="tel" class="form-control" id="telefono" value="<?= $dato->telefono; ?>" name="telefono" placeholder="Ingresa telefono" minlength="6" maxlength="20">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-12 col-sm-5">
                                <label for="identificacion">Entidad</label>
                                <input readonly type="text" class="form-control" id="identificacion" name="identificacion" placeholder="Ingresa numero de identificacion" value="<?= $dato->nombre_entidad; ?>" required>
                            </div>
                            <div class="col-12 col-sm-5">
                                <label for="curp">Calle</label>
                                <input readonly type="text" class="form-control" id="curp" name="curp" placeholder="Ingresa CURP" value="<?= $dato->calle; ?>" required>
                            </div>
                            <div class="col-12 col-sm-5">
                                <label for="curp">Colonia</label>
                                <input readonly type="text" class="form-control" id="curp" name="curp" placeholder="Ingresa CURP" value="<?= $dato->colonia; ?>" required>
                            </div>
                            <div class="col-12 col-sm-5">
                                <label for="curp">Numero</label>
                                <input readonly type="text" class="form-control" id="curp" name="curp" placeholder="Ingresa CURP" value="<?= $dato->numero; ?>" required>
                            </div>
                            <div class="col-12 col-sm-5">
                                <label for="curp">CP</label>
                                <input readonly type="text" class="form-control" id="curp" name="curp" placeholder="Ingresa CURP" value="<?= $dato->cp; ?>" required>
                            </div>
                            <div class="col-12 col-sm-5">
                                <label for="id_entidad">Clave</label>
                                <input readonly type="text" class="form-control" id="id_entidad" name="id_entidad" placeholder="Ingresa id_entidad" value="<?= $dato->id_entidad; ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                        </div>
                    </div>
                    <div class="form-group">
                        <h4 class="mt-4">Documentacion</h4>
                        <input readonly type="hidden" value="<?= $dato->id_usuario; ?>" name="id_usuario" id="id_usuario" />
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-12 col-sm-5">
                                <div class="documento">
                                    <embed src="<?= $dato->ruta_domicilio; ?>" width="100%" height="600px" />
                                </div>
                            </div>
                            <div class="col-12 col-sm-5">
                                <div class="documento">
                                    <embed src="<?= $dato->ruta_curp; ?>" width="100%" height="600px" />
                                </div>
                            </div>
                            <div class="col-12 col-sm-5">
                                <div class="documento">
                                    <embed src="<?= $dato->ruta_identificacion; ?>" width="100%" height="600px" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                        </div>
                        <a href="<?php echo base_url(); ?>admin/usuariosPendientes" class="btn btn-secondary">Regresar</a>
                        <button type="submit" id="editarUs" class="btn btn-primary text-center">Aprobar</button>
                    </div>
                </form>
            </div>
            <div class="row mt-5">
                <div class="row">
                    <h4>Enviar notificacion</h4>
                    <form method="post" action="<?php echo base_url(); ?>admin/subsanacionDocumentos">
                        <input type="number" value="<?= $dato->id_usuario; ?>" name="id_usuario" style="display: none;">
                        <input type="email" value="<?= $dato->correo; ?>" name="correo" style="display: none;">
                        <div class="form-group">
                            <div class="col-12 col-sm-5">
                                <label for="asunto">Asunto</label>
                                <select class="form-control" name="asunto" id="asunto">
                                    <option value="" selected>Seleccione una opcion</option>
                                    <option value="Solicitar correccion de datos">Solicitar correccion de datos de usuario.</option>
                                </select>
                            </div>
                            <div class="col-12 col-sm-5 d-none">
                                <label for="descripcion">Mas informacion</label>
                                <textarea type="text" class="form-control" name="descripcion" id="descripcion" cols="30" rows="10"></textarea>
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
    </main>