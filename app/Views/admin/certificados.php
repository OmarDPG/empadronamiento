<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4"><br>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><h3>Registro de los certificados emitidos.</h3></li><br>
            </ol>
            <div class="mb-3">
                <a href="<?php echo base_url(); ?>admin/exportarExcelCertificados" target="_blank" class="btn btn-success"><i class="fa-solid fa-file-excel"></i> Exportar registro completo de certificados</a>
                <!-- <a href="<?php echo base_url(); ?>admin/filtrarCertificados" class="btn btn-light"><i class="fa-solid fa-filter"></i> Filtrar antes de exportar</a>
                <a href="<?php echo base_url(); ?>admin/certificados" class="btn btn-warning"><i class="fa-solid fa-magnifying-glass"></i> Buscar certificado</a> -->
            </div>
            <div class="row">
                <div class="table-responsive">
                    <table id="datatablesSimple" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>FOLIO</th>
                                <th>Solicitud</th>
                                <th>CURP</th>
                                <th>Nombre de la mascota</th>
                                <th>Propietario</th>
                                <th>Fecha de Alta</th>
                                <th>Acuse</th>
                                <th>Certificado</th>
                                <th>Credencial</th>
                                <!-- <th>Baja</th> -->
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        foreach( $resultados as $dato){ ?>
                            <tr>
                                <td><?php echo $dato->id_certificado ?>  </td>
                                <td><?php echo $dato->folio ?>  </td>
                                <td><?php echo $dato->solicitud ?></td>
                                <td><?php echo $dato->curp_mascota ?></td>
                                <td><?php echo $dato->nombre ?></td>
                                <td><?php echo $dato->usuario_nombre ?></td>
                                <td><?php echo $dato->fecha_alta?></td>
                                <td><a href="<?php echo base_url()."admin/verAcuse/".$dato->id_certificado; ?>" class="btn btn-primary"><i class="fa-solid fa-receipt"></i></a></td>
                                <td><a href="<?php echo base_url()."admin/verPDF/".$dato->id_certificado; ?>" class="btn btn-primary"><i class="fa-solid fa-award"></i></a></td>
                                <td><a href="<?php echo base_url()."admin/verCredencial/".$dato->id_certificado; ?>" class="btn btn-primary"><i class="fa-solid fa-id-card"></i></a></td>
                                <!-- <td><a href="<?php echo base_url() . "admin/editarCertificado/".$dato->id_mascota?>" class="btn btn-warning"><i class="fa-solid fa-pencil"></i></a></td> -->
                                <!-- <td><a href="#exampleModalToggle" data-href="<?php echo base_url() . "/admin/eliminarCertificado/".$dato->id_certificado; ?>" data-bs-toggle="modal" data-target="#exampleModalToggle" data-placement="top" title="Eliminar registro"><i class="fa-solid fa-xmark btn btn-danger"></i></a></td> -->
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