<main class="py-5">
    <div class="container">
        <div class="bg-white shadow rounded-4 p-4 p-md-5 mx-auto" style="max-width: 900px;">
            <h3 class="text-center text-verde fw-bold mb-4">Actualiza tus documentos</h3>

            <?php if (isset($validation)) : ?>
                <div class="alert alert-danger">
                    <?= $validation->listErrors(); ?>
                </div>
            <?php endif; ?>

            <?php if (isset($mensaje)) : ?>
                <div class="alert alert-success">
                    <?= $mensaje; ?>
                </div>
            <?php endif; ?>

            <?php if (session()->has('message')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session('message'); ?>
                </div>
            <?php endif; ?>

            <?php if (session()->has('error')) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= session('error'); ?>
                </div>
            <?php endif; ?>

            <form method="post" action="<?= base_url('usuario/actualizarDocumentos') ?>" enctype="multipart/form-data" autocomplete="off" novalidate>
                <input type="hidden" name="uuid" value="<?= esc($uuid) ?>">

                <div class="row g-4">
                    <div class="col-12 col-md-6">
                        <label for="doc_identificacion" class="form-label">INE (Identificación Oficial)</label>
                        <input type="file" class="form-control" id="doc_identificacion" name="doc_identificacion" accept=".pdf,image/png,image/jpeg" required>
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="doc_curp" class="form-label">CURP</label>
                        <input type="file" class="form-control" id="doc_curp" name="doc_curp" accept=".pdf,image/png,image/jpeg" required>
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="doc_domicilio" class="form-label">Comprobante de Domicilio</label>
                        <input type="file" class="form-control" id="doc_domicilio" name="doc_domicilio" accept=".pdf,image/png,image/jpeg" required>
                    </div>
                </div>

                <div class="text-center mt-5">
                    <button type="submit" class="btn btn-verde btn-lg px-5">
                        Enviar Documentos
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const maxSize = 3 * 1024 * 1024;
        const archivos = ['doc_identificacion', 'doc_curp', 'doc_domicilio'];

        archivos.forEach(id => {
            const input = document.getElementById(id);
            input.addEventListener('change', function() {
                const file = this.files[0];
                if (file && file.size > maxSize) {
                    this.classList.add('is-invalid');
                    this.value = '';
                } else {
                    this.classList.remove('is-invalid');
                }
            });
        });
    });
</script>