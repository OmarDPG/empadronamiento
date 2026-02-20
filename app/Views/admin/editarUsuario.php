<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4"><br>
            <h1 class="mt-1">Editar Usuario</h1>

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
                        <input type="hidden" value="<?php  echo $datos ['id_usuario']; ?>" name="id_usuario" id="id_usuario" />  
                        <!-- <input type="hidden" name="id_usuario" /> -->
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-12 col-sm-5">
                                <label for="usuario">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa el nombre de usuario" value="<?php echo $datos ['nombre']?>" minlength="4" maxlength="50" required oninput="this.value = this.value.toUpperCase()">
                            </div>
                            <div class="col-12 col-sm-5">
                                <label for="correo">Correo</label>
                                <input type="email" class="form-control" id="correo" value="<?php echo $datos ['correo'] ?>" name="correo" placeholder="Ingresa correo" minlength="6" maxlength="20">
                            </div>
                            <div class="col-12 col-sm-5">
                                <label for="telefono">Telefono</label>
                                <input type="tel" class="form-control" id="telefono" value="<?php echo $datos ['telefono'] ?>" name="telefono" placeholder="Ingresa telefono" minlength="6" maxlength="20">
                            </div>
                            <div class="col-12 col-sm-5">
                                <label for="nombre_entidad">Entidad</label>
                                <select class="form-control" name="nombre_entidad" id="nombre_entidad" required>
                                    <?php foreach ($entidades as $entidad) { ?>
                                        <option value="<?php echo $entidad['nombre_entidad']; ?>"><?php echo $entidad['nombre_entidad'] ?>
                                        <?php } ?>
                                </select>
                            </div>
                            <div class="col-12 col-sm-5">
                                <label for="calle">Calle</label>
                                <input type="text" class="form-control" id="calle" name="calle" placeholder="Ingresa calle" value="<?php echo $datos ['calle'] ?>" oninput="this.value = this.value.toUpperCase()" required>
                            </div>
                            <div class="col-12 col-sm-5">
                                <label for="colonia">Colonia</label>
                                <input type="text" class="form-control" id="colonia" name="colonia" placeholder="Ingresa colonia" value="<?php echo $datos ['colonia'] ?>" oninput="this.value = this.value.toUpperCase()" required>
                            </div>
                            <div class="col-12 col-sm-5">
                                <label for="numero">Numero</label>
                                <input type="text" class="form-control" id="numero" name="numero" placeholder="Ingresa numero" value="<?php echo $datos ['numero'] ?>" required>
                            </div>
                            <div class="col-12 col-sm-5">
                                <label for="cp">CP</label>
                                <input type="text" class="form-control" id="cp" name="cp" placeholder="Ingresa cp" value="<?php echo $datos ['cp'] ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                        </div>
                        <a href="<?php echo base_url(); ?>admin/usuarios" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" id="editarUs" class="btn btn-primary text-center">Editar</button>
                    </div>
                </form>
            </div>


            <div class="row">
                <form method="post" id="form-editUs" name="form-editUs" action="<?php echo base_url('admin/actualizarPassword') ?>" autocomplete="off">
                    <div class="form-group">
                        <h4 class="mt-4">Editar contraseña de usuario:</h4>
                        <input type="hidden" value="<?php  echo $datos ['id_usuario']; ?>" name="id_usuario" id="id_usuario" />  
                        <!-- <input type="hidden" name="id_usuario" /> -->
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-12 col-sm-5">
                                <label for="password">Contraseña</label>
                                <input type="password" class="form-control" id="password" value="" name="password" placeholder="Ingresa contraseña" minlength="6" maxlength="20">
                            </div>
                            <div class="col-12 col-sm-5">
                                <label for="confpassword">Contraseña</label>
                                <input type="password" class="form-control" id="confpassword" value="" name="confpassword" placeholder="Ingresa contraseña" minlength="6" maxlength="20">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                        </div>
                        <a href="<?php echo base_url(); ?>admin/usuarios" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" id="editarUs" class="btn btn-primary text-center">Editar</button>
                    </div>
                </form>
            </div>
            <div class="row mt-5 d-none">
                <div class="row">
                    <h4>Enviar notificacion</h4>
                    <form method="post" action="<?php echo base_url();?>admin/notificaciones">
                        <input type="number" value="<?= $datos['id_usuario']; ?>" name="id_usuario" style="display: none;" >
                        <div class="form-group">
                            <div class="col-12 col-sm-5">
                                <label for="asunto">Asunto</label>
                                <select class="form-control" name="asunto" id="asunto">
                                    <option value="" selected>Seleccione una opcion</option>
                                    <option value="Solicitar correccion de datos">Solicitar correccion de datos.</option>
                                </select>
                            </div>
                            <div class="col-12 col-sm-5">
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
    </main>