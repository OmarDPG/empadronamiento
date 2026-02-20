<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4"><br>
            <h1 class="mt-1"><?php echo $titulo; ?></h1>
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
                <form method="post" id="form-editUs" name="form-editUs" action="<?php echo base_url('admin/actualizarPassw') ?>" autocomplete="off">
                    <div class="form-group">
                        <h4 class="mt-4">Datos del usuario:</h4>
                        <input type="hidden" value="<?php echo $usuario['id_adm']; ?>" name="id_adm" />
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-12 col-sm-5">
                                <label for="usuario">Usuario</label>
                                <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Ingresa el nombre de usuario" value="<?php echo $usuario['usuario']; ?>" minlength="4" maxlength="20" readonly required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-12 col-sm-5">
                                <label for="password">Contraseña nueva</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Ingresa contraseña" minlength="6" maxlength="20" required>
                            </div>
                            <div class="col-12 col-sm-5">
                                <label for="repassword">Repite contraseña nueva</label>
                                <input type="password" class="form-control" id="confpassword" name="confpassword" placeholder="Ingresa contraseña" minlength="6" maxlength="20" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                        </div>
                        <a href="<?php echo base_url(); ?>/admin/" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" id="editarUs" class="btn btn-primary text-center">Editar</button>
                    </div>
                </form>
            </div>
        </div>
    </main>