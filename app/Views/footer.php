<footer class="bg-light py-4">
    <div class="container">
        <div class="row text-center text-md-start align-items-center">
            <!-- Imagen izquierda -->
            <div class="col-12 col-md-3 order-2 order-md-1 d-flex justify-content-center justify-content-md-start mb-3 mb-md-0">
                <img src="<?php echo base_url(); ?>img/amor.png" alt="Amor" class="img-fluid" style="max-height: 3em; object-fit: contain;">
            </div>

            <!-- Texto central -->
            <div class="col-12 col-md-6 order-1 order-md-2 mb-3 mb-md-0 text-center">
                <p class="mb-2 fs-6 text-black">
                    Lateral de la Recta a Cholula Km 5.5 número 2401, San Andrés Cholula, Puebla.
                </p>
                <a href="mailto:padrones.iba@puebla.gob.mx" target="_blank"
                    class="fw-bold text-decoration-none d-block"
                    style="color: var(--guinda); font-size: 1rem;">
                    padrones.iba@puebla.gob.mx
                </a>
            </div>

            <!-- Imagen derecha -->
            <div class="col-12 col-md-3 order-3 order-md-3 d-flex justify-content-center justify-content-md-end">
                <img src="<?php echo base_url(); ?>img/pensar.png" alt="Pensar" class="img-fluid" style="max-height: 3em; object-fit: contain;">
            </div>
        </div>
    </div>
</footer>

<script src="<?php echo base_url(); ?>/js/code.jquery.com_jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>

<!-- Wizard -->
<link href="https://cdn.jsdelivr.net/npm/smartwizard@6/dist/css/smart_wizard_all.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/smartwizard@6/dist/js/jquery.smartWizard.min.js"></script>
<script src="<?php echo base_url(); ?>/js/scripts.js"></script>
<script src="<?php echo base_url(); ?>/js/cdn.datatables.net_1.10.20_js_jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="<?php echo base_url(); ?>/js/cdn.datatables.net_1.10.20_js_dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="<?php echo base_url(); ?>/assets/demo/datatables-demo.js"></script>
<script>
    $('#modal-confirma').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var enlaces = document.querySelectorAll('.nav-link');
        enlaces.forEach(function(enlace) {
            if (window.location.href === enlace.href) {
                enlace.classList.add('nav-active');
            }
        });
    });
</script>
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>
<script>
    $('#dataTable').DataTable({
        "language": {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const checkbox = document.getElementById('mostrarFormulario');
        const formulario = document.getElementById('formulario');

        if (checkbox && formulario) {
            checkbox.addEventListener('change', function() {
                formulario.classList.toggle('d-none', !this.checked);
            });
        }
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

<script>
    const telefonoInput = document.getElementById('telefono');
    if (telefonoInput) {
        telefonoInput.addEventListener('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
    }
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const cpInput = document.getElementById('cp');
        const form = document.getElementById('wizardForm');

        if (cpInput && form) {
            form.addEventListener('submit', function(e) {
                const valor = cpInput.value.trim();

                const esValidoCP = /^[0-9]{5}$/.test(valor);

                if (!esValidoCP) {
                    e.preventDefault();
                    cpInput.classList.add('is-invalid');
                } else {
                    cpInput.classList.remove('is-invalid');
                }
            });

            cpInput.addEventListener('input', function() {
                this.value = this.value.replace(/[^0-9]/g, '');
                this.classList.remove('is-invalid');
            });
        }
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const numeroInput = document.getElementById('numero');
        const form = document.getElementById('wizardForm');

        form.addEventListener('submit', function(e) {
            const valor = numeroInput.value.trim().toUpperCase();

            const esValido = /^[0-9]{1,5}$/.test(valor) || valor === 'S/N';

            if (!esValido) {
                e.preventDefault();
                numeroInput.classList.add('is-invalid');
            } else {
                numeroInput.classList.remove('is-invalid');
            }
        });

        numeroInput.addEventListener('input', function() {
            this.value = this.value.toUpperCase();
            this.classList.remove('is-invalid');
        });
    });
</script>


<!-- DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#tablaMascotas').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
            },
            responsive: true,
            autoWidth: false,
            pageLength: 5,
            lengthMenu: [5, 10, 25, 50],
        });

        // Tooltips Bootstrap
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    });
</script>
<script>
    $(document).ready(function() {
        $('#tablaPendientes').DataTable({
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
            },
            responsive: true,
            autoWidth: false,
            pageLength: 10,
            lengthMenu: [5, 10, 25, 50],
        });
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
        [...tooltipTriggerList].map(el => new bootstrap.Tooltip(el));
    });
</script>
<script>
    document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(el => {
        new bootstrap.Tooltip(el)
    });
</script>


<!-- EVITA MULTIPLES CLICK's AL ENVIAR EL FORMULARIO DE MASCOTAS -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('wizardForm');
        if (!form) return;

        const submitBtn = form.querySelector('button[type="submit"]');

        form.addEventListener('submit', function(e) {
            if (!form.checkValidity()) {
                return;
            }
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i> Enviando...';
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/smartwizard@6/dist/js/jquery.smartWizard.min.js"></script>
</body>

</html>