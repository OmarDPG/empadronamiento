<?php
    $session = session();
?>

<main class="main">
    <div class="main__registro">
        <div class="registro__contenedor bg-light">
            <h3 class="main__h3 titulo">Registro</h3>
            <div class="registro__contenedor--formulario">
            <?php if (isset($validation)) { ?>
                    <div class="alert alert-danger">
                        <?php echo $validation->listErrors(); ?>
                    </div>
                <?php } ?>
                <form class="form" action=" <?php echo base_url();?>usuario/actualizarMascota" method="POST" autocomplete="off">
                    <input  type="hidden" value="<?php  echo $mascota ['id_mascota']; ?>" name="id_mascota" /> 
                    <div class="contenido__form">
                        <div class="form__input">
                            <label class="label" for="">Nombre</label>
                            <input class="inputR"  type="text" id="nombre" name="nombre" value="<?php echo $mascota[('nombre')] ?>">
                        </div>
                        <div class="form__input">
                            <label class="label" for="">Edad (Años)</label>
                            <input class="inputR" type="number" id="edad" name="edad" value="<?php echo $mascota[('edad')]  ?>">
                        </div>
                        <div class="form__input">
                            <label class="label" for="">Caracteristicas</label>
                            <input class="inputR" type="textarea" id="caracteristicas" name="caracteristicas" value="<?php echo $mascota[('caracteristicas')]  ?>">
                        </div>
                        <div class="form__input">
                            <label class="label" for="">Raza</label>
                            <input class="inputR" type="text" id="raza" name="raza" value="<?php echo $mascota[('raza')]   ?>">
                        </div>
                        <div class="form__input">
                            <label class="label" for="">Especie</label>
                            <select name="especie" id="especie" class="inputR">
                                <option value="">Seleccione una opcion</option>
                                <option value="Gato">Gato</option>
                                <option value="Perro">Perro</option>
                            </select>
                        </div>
                        <div class="form__input">
                            <label class="label" for="">Sexo</label>
                            <select name="sexo" id="sexo" class="inputR">
                                <option value="">Seleccione una opcion</option>
                                <option value="Macho">Macho</option>
                                <option value="Hembra">Hembra</option>
                            </select>
                        </div>
                        <div class="form__input">
                            <label class="label" for="">Vacunado</label>
                            <select name="vacunado" id="vacunado" class="inputR">
                                <option value="">Seleccione una opcion</option>
                                <option value="Si">Sí</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                        <div class="form__input">
                            <label class="label" for="">Esterilizado</label>
                            <select name="esterilizado" id="esterilizado" class="inputR">
                                <option value="">Seleccione una opcion</option>
                                <option value="Si">Sí</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="botones">
                    <a href="<?php echo base_url(); ?>usuario" class="submit regresar">Regresar</a>
                    <input class="submit" type="submit" value="Actualizar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>