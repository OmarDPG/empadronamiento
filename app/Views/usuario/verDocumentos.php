<?php $session = session(); ?>
<main class="main py-4">
    <div class="container">
        <div class="bg-white shadow-sm rounded p-4">
            <h3 class="text-center mb-4 text-verde fw-bold">Documentos del Usuario</h3>

            <div class="row g-4">
                <!-- Documento de Identificación -->
                <div class="col-12 col-md-4">
                    <div class="border rounded shadow-sm p-2 h-100 text-center documento-item" data-bs-toggle="modal" data-bs-target="#modalDocumento" data-src="<?= $usuario['ruta_identificacion'] ?>">
                        <h5 class="text-center mb-2">Identificación</h5>
                        <div class="ratio ratio-4x3">
                            <embed src="<?= $usuario['ruta_identificacion'] ?>" type="application/pdf" class="w-100 h-100 rounded" />
                        </div>
                        <small class="text-muted d-block mt-2">Haz clic para ampliar</small>
                    </div>
                </div>

                <!-- CURP -->
                <div class="col-12 col-md-4">
                    <div class="border rounded shadow-sm p-2 h-100 text-center documento-item" data-bs-toggle="modal" data-bs-target="#modalDocumento" data-src="<?= $usuario['ruta_curp'] ?>">
                        <h5 class="text-center mb-2">CURP</h5>
                        <div class="ratio ratio-4x3">
                            <embed src="<?= $usuario['ruta_curp'] ?>" type="application/pdf" class="w-100 h-100 rounded" />
                        </div>
                        <small class="text-muted d-block mt-2">Haz clic para ampliar</small>
                    </div>
                </div>

                <!-- Domicilio -->
                <div class="col-12 col-md-4">
                    <div class="border rounded shadow-sm p-2 h-100 text-center documento-item" data-bs-toggle="modal" data-bs-target="#modalDocumento" data-src="<?= $usuario['ruta_domicilio'] ?>">
                        <h5 class="text-center mb-2">Comprobante de domicilio</h5>
                        <div class="ratio ratio-4x3">
                            <embed src="<?= $usuario['ruta_domicilio'] ?>" type="application/pdf" class="w-100 h-100 rounded" />
                        </div>
                        <small class="text-muted d-block mt-2">Haz clic para ampliar</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Modal para visualizar documentos -->
<div class="modal fade" id="modalDocumento" tabindex="-1" aria-labelledby="modalDocumentoLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Visualización del Documento</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <div class="ratio ratio-16x9">
                    <iframe id="iframeDocumento" src="" frameborder="0" class="w-100 h-100" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript para cambiar el src del iframe -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const modal = document.getElementById('modalDocumento');
        const iframe = document.getElementById('iframeDocumento');
        const items = document.querySelectorAll('.documento-item');

        items.forEach(item => {
            item.addEventListener('click', function () {
                const src = this.getAttribute('data-src');
                iframe.setAttribute('src', src);
            });
        });

        modal.addEventListener('hidden.bs.modal', function () {
            iframe.setAttribute('src', '');
        });
    });
</script>
