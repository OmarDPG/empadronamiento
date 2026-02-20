<div id="layoutSidenav_content" class="layout flex-grow-1">
    <main class="flex-grow-1">
        <div class="container-fluid">
            <h4 class="mt-4 text-verde fw-bold text-uppercase">Certificados pendientes</h4>
            <div>
                <p class="legend">EN CUANTO SUS SOLICITUDES SEAN PROCESADAS Y APROBADAS APARECERÁN EN LA SECCIÓN DE "INICIO" DEL PERFIL DEL USUARIO</p>
            </div>
            <div class="table-responsive mt-4">
                <table class="table table-hover table-bordered align-middle text-center shadow-sm rounded bg-white" id="tablaPendientes">
                    <thead class="table-success text-dark text-uppercase">
                        <tr class="align-middle">
                            <th><i class="fas fa-dog me-1"></i>Nombre</th>
                            <th><i class="fas fa-paw me-1"></i>Especie</th>
                            <th><i class="fas fa-venus-mars me-1"></i>Sexo</th>
                            <th><i class="fas fa-hourglass-half me-1"></i>Edad</th>
                            <th><i class="fas fa-dna me-1"></i>Raza</th>
                            <th><i class="fas fa-cut me-1"></i>Esterilizado</th>
                            <th><i class="fas fa-cut me-1"></i>Color</th>
                            <th><i class="fas fa-syringe me-1"></i>Vacunado</th>
                            <th><i class="fas fa-syringe me-1"></i>Carateristicas</th>
                            <th><i class="fas fa-info-circle me-1"></i>Estado</th>
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
                                <td><?= esc($row->color) ?></td>
                                <td><?= esc($row->vacunado) ?></td>
                                <td><?= esc($row->caracteristicas) ?></td>
                                <td>
                                    <span class="badge bg-warning text-dark"><?= esc($row->estado) ?></span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </main>
</div>