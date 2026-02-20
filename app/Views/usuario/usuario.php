<!-- Contenedor del contenido principal -->
<div id="layoutSidenav_content" class="layout flex-grow-1">
    <main class="flex-grow-1 py-4">
        <div class="container-fluid">
            <h4 class="mb-4 fw-bold text-verde text-uppercase">
                <i class="fas fa-dog me-2"></i>Mis Mascotas Registradas
            </h4>

            <div class="table-responsive">
                <table id="tablaMascotas" class="table table-hover table-bordered table-striped align-middle text-center shadow-sm bg-white rounded">
                    <thead class="table-success text-dark text-uppercase">
                        <tr>
                            <th><i class="fas fa-dog me-1"></i>Nombre</th>
                            <th><i class="fas fa-paw me-1"></i>Especie</th>
                            <th><i class="fas fa-venus-mars me-1"></i>Sexo</th>
                            <th><i class="fas fa-hourglass-half me-1"></i>Edad</th>
                            <th><i class="fas fa-dna me-1"></i>Raza</th>
                            <th><i class="fas fa-cut me-1"></i>Esterilizado</th>
                            <th><i class="fas fa-syringe me-1"></i>Vacunado</th>
                            <th><i class="fas fa-trash-alt me-1"></i>Eliminar</th>
                            <th><i class="fas fa-file-download me-1"></i>Acuse</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($result as $row): ?>
                            <tr>
                                <td><?= esc($row->nombre) ?></td>
                                <td><?= esc($row->especie) ?></td>
                                <td><?= esc($row->sexo) ?></td>
                                <td><?= esc($row->edad) ?></td>
                                <td><?= esc($row->raza) ?></td>
                                <td><?= esc($row->esterilizado) ?></td>
                                <td><?= esc($row->vacunado) ?></td>
                                <td>
                                    <a href="<?= base_url('usuario/eliminarMascota/' . $row->id_mascota) ?>"
                                       class="text-danger fs-5" data-bs-toggle="tooltip" title="Eliminar">
                                        <i class="fas fa-ban"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="<?= base_url('usuario/verAcuse/' . $row->id_certificado) ?>"
                                       class="text-success fs-5" data-bs-toggle="tooltip" title="Descargar acuse">
                                        <i class="fas fa-download"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>
