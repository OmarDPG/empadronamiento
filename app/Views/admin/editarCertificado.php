<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4"><br>
            <h1 class="mt-1">Editar Certificado</h1>
            <div class="row">
                <form method="post" id="form-editUs" name="form-editUs" action="<?php echo base_url('admin/actualizarCertificado') ?>" autocomplete="off">
                    <div class="form-group">
                        <h4 class="mt-4">Datos del usuario:</h4>
                        <input type="hidden" value="<?php echo $datos['id_mascota']; ?>" name="id_mascota" id="id_mascota" />
                        <!-- <input type="hidden" name="id_usuario" /> -->
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-12 col-sm-5">
                                <label for="usuario">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa el nombre de usuario" value=" <?php echo $datos['nombre'] ?> " minlength="4" maxlength="20" oninput="this.value = this.value.toUpperCase()">
                            </div>
                            <div class="col-12 col-sm-5">
                                <label for="edad">Edad (Años)</label>
                                <input type="number" class="form-control" id="edad" value="<?php echo $datos['edad'] ?>" name="edad" placeholder="" minlength="6" maxlength="20">
                            </div>
                            <div class="col-12 col-sm-5">
                                <label for="caracteristicas">Caracteristicas</label>
                                <input type="textarea" class="form-control" id="caracteristicas" value="<?php echo $datos['caracteristicas'] ?>" name="caracteristicas" placeholder="" minlength="6" maxlength="20" oninput="this.value = this.value.toUpperCase()">
                            </div>
                            <div class="col-12 col-sm-5">
                                <label for="direccion">Raza</label>
                                <input type="text" class="form-control" id="raza" name="raza" placeholder="Ingresa raza" value="<?php echo $datos['raza'] ?>" oninput="this.value = this.value.toUpperCase()">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-12 col-sm-5">
                                <label class="label" for="">Especie</label>
                                <select name="especie" id="especie" class="form-control">
                                    <option value="">Seleccione una opcion</option>
                                    <option value="Gato">Gato</option>
                                    <option value="Perro">Perro</option>
                                </select>
                            </div>
                            <div class="col-12 col-sm-5">
                                <label class="label" for="">Sexo</label>
                                <select name="sexo" id="sexo" class="form-control">
                                    <option value="">Seleccione una opcion</option>
                                    <option value="Macho">Macho</option>
                                    <option value="Hembra">Hembra</option>
                                </select>
                            </div>
                            <div class="col-12 col-sm-5">
                                <label class="label" for="">Vacunado</label>
                                <select name="vacunado" id="vacunado" class="form-control">
                                    <option value="">Seleccione una opcion</option>
                                    <option value="Si">Sí</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="col-12 col-sm-5">
                                <label class="label" for="">Esterilizado</label>
                                <select name="esterilizado" id="esterilizado" class="form-control">
                                    <option value="">Seleccione una opcion</option>
                                    <option value="Si">Sí</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                        </div>
                        <a href="<?php echo base_url(); ?>admin/certificados" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" id="editarMas" class="btn btn-primary text-center">Editar</button>
                    </div>
                </form>
            </div>
        </div>
    </main>