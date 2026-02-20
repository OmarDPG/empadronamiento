<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4"><br>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><h3>Edición de usuarios, alta, baja, recuperación de cuentas o reinicio de contraseña:</h3></li><br>
      </ol>
      <div class="mb-3">
        <a href="<?php echo base_url(); ?>admin/altaUsuario" class="btn btn-secondary"><i class="fa-solid fa-address-card"></i>Alta de usuarios</a>
        <a href="<?php echo base_url(); ?>admin/usuariosEliminados" class="btn btn-light"><i class="fa-solid fa-user-minus"></i>Usuarios dados de baja</a>
      </div>
      <div class="row">
        <div class="table-responsive">
          <table id="datatablesSimple" class="display" style="width:100%">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Telefono</th>
                <th>Editar</th>
                <!-- <th>Documentos</th> -->
                <th>Eliminar</th>
              </tr>
            </thead>
            <tbody>
            <?php 
                foreach( $datos as $dato){ ?>
                    <tr>
                        <td><?php echo $dato['id_usuario']; ?> </td>
                        <td><?php echo $dato['nombre']; ?> </td>
                        <td><?php echo $dato['correo']; ?> </td>
                        <td><?php echo $dato['telefono']; ?> </td>
                        <td><a href="<?php echo base_url(). 'admin/editarUsuario/'. $dato['id_usuario']; ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a></td>
                        <td><a href="#exampleModalToggle" data-href="<?php echo base_url() . "/admin/desactivarUsuario/".$dato['id_usuario']; ?>" data-bs-toggle="modal" data-target="#exampleModalToggle" data-placement="top" title="Eliminar registro"><i class="fa-solid fa-xmark btn btn-danger"></i></a></td>
                    </tr>
            <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel">Eliminar Certificado</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>¿Desea dar de baja a este certificado?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">No</button>
                    <a class="btn btn-danger btn-ok" id="btn-ok">Sí</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        if (myModal = document.getElementById('exampleModalToggle')) {
            myModal.addEventListener('shown.bs.modal', function(e) {
                var button = e.relatedTarget
                var recipient = button.getAttribute('data-href')
                a = document.getElementById('btn-ok')
                a.setAttribute("href", recipient);
            })
        }
    </script>