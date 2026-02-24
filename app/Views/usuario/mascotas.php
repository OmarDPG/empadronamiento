<?php
$session = session();
?>
<main class="main py-5">
    <div class="container">
        <div class="card shadow rounded-4 p-4">
            <h3 class="mb-4 text-center text-uppercase fw-bold text-verde">Registro de Mascota</h3>

            <?php if (isset($validation)) : ?>
                <div class="alert alert-danger"><?= $validation->listErrors(); ?></div>
            <?php endif; ?>

            <form method="post" id="form-editUs" name="form-editUs" action="<?= base_url('usuario/registrarMascota') ?>" autocomplete="off" enctype="multipart/form-data">
                <input type="hidden" value="<?= $session->id_usuario ?>" name="id_usuario" id="id_usuario" />

                <div class="mb-4">
                    <h5 class="fw-semibold text-secondary">Datos generales:</h5>
                </div>

                <div class="row g-4">
                    <div class="col-md-6">
                        <label for="nombre" class="form-label">Nombre de la mascota</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ej. FIRULAIS" value="<?= set_value('nombre') ?>" minlength="4" maxlength="10" required pattern="[A-ZÑa-zñ]+" title="Solo se permite una palabra sin espacios" oninput="this.value = this.value.toUpperCase().replace(/\s/g, '')">
                    </div>

                    <div class="col-md-6">
                        <label for="edad" class="form-label">Edad (Meses / Años)</label>
                        <input type="text" class="form-control" id="edad" name="edad" placeholder="Ej. 5 MESES, 1 AÑO, " value="<?= set_value('edad') ?>" minlength="0" maxlength="16" oninput="this.value = this.value.toUpperCase()">
                    </div>

                    <div class="col-md-6">
                        <label for="color" class="form-label">Color</label>
                        <input type="text" class="form-control" id="color" name="color" placeholder="Ej. CAFE" value="<?= set_value('color') ?>" maxlength="20" oninput="this.value = this.value.toUpperCase()">
                    </div>
                    <div class="col-md-6">
                        <label for="caracteristicas" class="form-label">Características</label>
                        <input type="text" class="form-control" id="caracteristicas" name="caracteristicas" placeholder="Tamaño, seña particular..." value="<?= set_value('caracteristicas') ?>" maxlength="60" oninput="this.value = this.value.toUpperCase()">
                    </div>

                    <div class="col-md-6">
                        <label for="raza" class="form-label">Raza</label>
                        <input type="text" class="form-control" id="raza" name="raza" placeholder="Ej. Labrador" value="<?= set_value('raza') ?>" maxlength="25" oninput="this.value = this.value.toUpperCase()">
                    </div>

                    <div class="col-md-6">
                        <label for="especie" class="form-label">Especie</label>
                        <select name="especie" id="especie" class="form-select" required>
                            <option value="">Selecciona una opción</option>
                            <option value="CANINO">CANINO</option>
                            <option value="FELINO">FELINO</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="vacunado" class="form-label">¿Vacunado?</label>
                        <select name="vacunado" id="vacunado" class="form-select" required>
                            <option value="">Selecciona una opción</option>
                            <option value="SÍ">SÍ</option>
                            <option value="NO">NO</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="esterilizado" class="form-label">¿Esterilizado?</label>
                        <select name="esterilizado" id="esterilizado" class="form-select" required>
                            <option value="">Selecciona una opción</option>
                            <option value="SÍ">SÍ</option>
                            <option value="NO">NO</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="sexo" class="form-label">Sexo</label>
                        <select name="sexo" id="sexo" class="form-select" required>
                            <option value="">Selecciona una opción</option>
                            <option value="MACHO">MACHO</option>
                            <option value="HEMBRA">HEMBRA</option>
                        </select>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center mt-4">
                    <a href="<?= base_url(); ?>usuario/" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-1"></i> Cancelar
                    </a>
                    <button type="button" class="btn btn-verde mt-4" data-bs-toggle="modal" data-bs-target="#modalArchivos">
                        <i class="fas fa-file-upload me-1"></i> Registrar y subir documentos
                    </button>
                </div>
                <!-- Modal de subida de archivos -->
                <div class="modal fade" id="modalArchivos" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-centered">
                        <div class="modal-content rounded-4 shadow">
                            <div class="modal-header bg-c-green text-white">
                                <h5 class="modal-title fw-bold" id="modalLabel">Subir documentos de la mascota</h5>
                                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row g-4">
                                    <!-- Documento de propiedad -->
                                    <div class="col-12 col-md-6">
                                        <label for="doc_propiedadd" class="form-label fw-semibold">Documento de propiedad</label>
                                        <input type="file" class="form-control" id="doc_propiedadd" name="doc_propiedadd"
                                            accept=".pdf, image/png, image/jpeg, image/jpg" required>

                                        <div class="mt-3">
                                            <p class="mb-1 fw-semibold">¿Cuáles son considerados documentos de propiedad?</p>
                                            <ul class="ps-3">
                                                <li>Cartilla de vacunación</li>
                                                <li>Certificado de adopción</li>
                                                <li>Comprobante de vacunas (Antirrábica)</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <!-- Imagen de la mascota -->
                                    <div class="col-12 col-md-6">
                                        <label for="img_mascota" class="form-label fw-semibold">Fotografía de la mascota</label>
                                        <input type="file" class="form-control" id="img_mascota" name="img_mascota"
                                            accept="image/jpg, image/png, image/jpeg" required>
                                        <div class="mt-3">
                                            <p class="mb-1 fw-semibold">Recomendaciones:</p>
                                            <ul class="ps-3">
                                                <li>Fotografía de frente o rostro</li>
                                                <li>Buena iluminación, fondo claro</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer d-flex justify-content-between">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                    <i class="fas fa-times me-1"></i> Cancelar
                                </button>
                                <button type="submit" class="btn btn-verde">
                                    <i class="fas fa-paw me-1"></i> Enviar formulario completo
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>