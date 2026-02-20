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
                <form class="form" action=" <?php echo base_url(); ?>admin/insertar" method="POST" autocomplete="off">
                    <div class="contenido__form">
                        <div class="form__input">
                            <label class="label" for="">Nombre</label>
                            <input class="inputR" type="text" name="nombre" id="nombre" placeholder="Ingrese su nombre" value="<?php echo set_value('nombre') ?>" oninput="this.value = this.value.toUpperCase()">
                        </div>
                        <div class="form__input">
                            <label class="label" for="">Apellido PATERNO</label>
                            <input class="inputR" type="text" name="apellidoP" id="apellidoP" placeholder="Ingrese su apellidoP" value="<?php echo set_value('apellidoP') ?>" oninput="this.value = this.value.toUpperCase()">
                        </div>
                        <div class="form__input">
                            <label class="label" for="">apellido materno</label>
                            <input class="inputR" type="text" name="apellidoM" id="apellidoM" placeholder="Ingrese su apellidoM" value="<?php echo set_value('apellidoM') ?>" oninput="this.value = this.value.toUpperCase()">
                        </div>
                        <div class="form__input">
                            <label class="label" for="">numero de expediente</label>
                            <input class="inputR" type="number" id="expediente" name="expediente" placeholder="Ingrese su expediente" value="<?php echo set_value('expediente') ?>">
                        </div>
                        <div class="form__input">
                            <label class="label" for="">Contraseña</label>
                            <input class="inputR" type="password" name="password" id="password" placeholder="Ingrese su contraseña">
                        </div>
                        <div class="form__input">
                            <label class="label" for="">Confirmar contraseña</label>
                            <input class="inputR" type="password" name="confpassword" id="confpassword" placeholder="Confirme su contraseña">
                        </div>
                    </div>
                    <input class="submit" type="submit" value="Registrarse">
                </form>
            </div>
        </div>
    </div>
</main>