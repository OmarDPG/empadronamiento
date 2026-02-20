<main class="container my-5 flex-grow-1">
  <div class="bg-light p-4 rounded shadow">
    <h3 class="text-center mb-4 fw-bold">Registro</h3>
    <!-- Formulario oculto -->
    <form id="wizardForm" class="d-none p-4 bg-white border rounded shadow-sm" method="post" action="<?= base_url('registro/insertar') ?>" enctype="multipart/form-data" autocomplete="off">

      <!-- PASO 1 -->
      <div id="step-1" class="wizard-step">
        <h5 class="mb-4 fw-bold verde">Datos del usuario</h5>
        <div class="row g-4">
          <div class="col-md-6">
            <label for="nombre" class="form-label">Nombre completo (nombre y apellidos)</label>
            <input type="text" id="nombre" name="nombre" class="form-control form-control-lg" placeholder="JUAN PÉREZ LÓPEZ"
              value="<?= set_value('nombre'); ?>" minlength="4" maxlength="50" oninput="this.value = this.value.toUpperCase()" required>
          </div>

          <div class="col-md-6">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="tel" id="telefono" name="telefono" class="form-control form-control-lg" placeholder="2221234567"
              value="<?= set_value('telefono'); ?>" minlength="10" maxlength="10" inputmode="numeric" pattern="[0-9]{10}" required>
          </div>

          <div class="col-md-6">
            <label for="correo" class="form-label">Correo electrónico</label>
            <input type="email" id="correo" name="correo" class="form-control form-control-lg" placeholder="usuario@correo.com"
              value="<?= set_value('correo'); ?>" minlength="6" maxlength="50" required>
          </div>

          <div class="col-md-6"></div>

          <div class="col-md-6">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" id="password" name="password" class="form-control form-control-lg"
              placeholder="Mínimo 8 caracteres" minlength="8" maxlength="20" required>
            <div id="passwordRules" class="mt-2 small"></div>
          </div>

          <div class="col-md-6">
            <label for="confpassword" class="form-label">Confirmar contraseña</label>
            <input type="password" id="confpassword" name="confpassword" class="form-control form-control-lg"
              placeholder="Confirma tu contraseña" minlength="8" maxlength="20" required>
            <div id="passwordMessage" class="mt-2 small"></div>
          </div>

        </div>

        <div class="d-flex justify-content-end mt-5">
          <button type="button" class="btn btn-verde btn-lg" onclick="nextStep(2)">Siguiente paso</button>
        </div>
      </div>

      <!-- PASO 2 -->
      <div id="step-2" class="wizard-step d-none">
        <h5 class="mb-4 fw-bold verde">Datos del domicilio</h5>
        <div class="row g-4">
          <div class="col-md-6">
            <label for="nombre_entidad" class="form-label">Entidad</label>
            <select class="form-select" name="nombre_entidad" id="nombre_entidad" required>
              <option selected disabled value="">Seleccione una entidad</option>
              <?php foreach ($entidades as $entidad): ?>
                <option value="<?= $entidad['nombre_entidad']; ?>"><?= $entidad['nombre_entidad']; ?></option>
              <?php endforeach; ?>
            </select>
            <div class="invalid-feedback">Selecciona una entidad válida.</div>
          </div>

          <div class="col-md-6">
            <label for="calle" class="form-label">Calle</label>
            <input type="text" class="form-control form-control-lg" id="calle" name="calle"
              placeholder="Ej. AVENIDA JUÁREZ" value="<?= set_value('calle'); ?>" minlength="4" maxlength="25"
              oninput="this.value = this.value.toUpperCase()" required>
          </div>

          <div class="col-md-6">
            <label for="colonia" class="form-label">Colonia</label>
            <input type="text" class="form-control form-control-lg" id="colonia" name="colonia"
              placeholder="Ej. CENTRO" value="<?= set_value('colonia'); ?>" minlength="4" maxlength="25"
              oninput="this.value = this.value.toUpperCase()" required>
          </div>

          <div class="col-md-6">
            <label for="numero" class="form-label">Número</label>
            <input type="text" class="form-control form-control-lg" id="numero" name="numero"
              placeholder="Ej. 123 o S/N" maxlength="5" value="<?= set_value('numero'); ?>" required>
          </div>

          <div class="col-md-6">
            <label for="cp" class="form-label">Código Postal</label>
            <input type="text" class="form-control form-control-lg" id="cp" name="cp"
              placeholder="Ej. 72000" maxlength="5" pattern="[0-9]{5}" value="<?= set_value('cp'); ?>" required>
            <div class="invalid-feedback">Debe contener 5 dígitos numéricos.</div>
          </div>
        </div>

        <div class="d-flex justify-content-between mt-5">
          <button type="button" class="btn btn-secondary btn-lg" onclick="prevStep(1)">Regresar</button>
          <button type="button" class="btn btn-verde btn-lg" onclick="nextStep(3)">Siguiente paso</button>
        </div>
      </div>

      <!-- PASO 3 -->
      <div id="step-3" class="wizard-step d-none">
        <h5 class="mb-4 fw-bold verde">Documentación</h5>
        <div class="row g-4">
          <div class="col-md-6">
            <label for="doc_identificacion" class="form-label">INE</label>
            <input type="file" class="form-control form-control-lg" id="doc_identificacion" name="doc_identificacion"
              accept=".pdf, image/png, image/jpeg" required>
            <div class="invalid-feedback">El archivo no debe superar los 3MB.</div>
          </div>
          <div class="col-md-6">
            <label for="doc_curp" class="form-label">CURP</label>
            <input type="file" class="form-control form-control-lg" id="doc_curp" name="doc_curp"
              accept=".pdf, image/png, image/jpeg" required>
            <div class="invalid-feedback">El archivo no debe superar los 3MB.</div>
          </div>
          <div class="col-md-6">
            <label for="doc_domicilio" class="form-label">Comprobante de domicilio</label>
            <input type="file" class="form-control form-control-lg" id="doc_domicilio" name="doc_domicilio"
              accept=".pdf, image/png, image/jpeg" required>
            <div class="invalid-feedback">El archivo no debe superar los 3MB.</div>
          </div>
        </div>

        <div class="d-flex justify-content-between mt-5">
          <button type="button" class="btn btn-secondary btn-lg" onclick="prevStep(2)">Regresar</button>
          <button type="submit" class="btn btn-verde btn-lg">Enviar</button>
        </div>
      </div>
    </form>
    <!-- Checkbox de aviso de privacidad -->
    <div class="form-check mb-4 text-center d-flex justify-content-center gap-1">
      <input class="form-check-input" type="checkbox" id="mostrarFormulario">
      <label class="form-check-label" for="mostrarFormulario">
        Acepto el aviso de privacidad
      </label>
    </div>

    <div class="mt-4 text-center">
      <p>Consulta nuestro aviso de privacidad en el apartado Padrón Estatal de Perros y Gatos</p>
      <a href="https://iba.puebla.gob.mx/avisos-de-privacidad" target="_blank" class="d-block">
        https://iba.puebla.gob.mx/avisos-de-privacidad
      </a>
    </div>
  </div>
</main>

<script>
  const checkbox = document.getElementById('mostrarFormulario');
  const form = document.getElementById('wizardForm');

  checkbox.addEventListener('change', function() {
    form.classList.toggle('d-none', !this.checked);
  });

  function nextStep(step) {
    const currentStep = document.querySelector('.wizard-step:not(.d-none)');
    const inputs = currentStep.querySelectorAll('input, select');

    let valid = true;
    inputs.forEach(input => {
      if (input.tagName === 'SELECT' && input.value === '') {
        input.classList.add('is-invalid');
        valid = false;
      } else if (!input.checkValidity()) {
        input.reportValidity();
        valid = false;
      } else {
        input.classList.remove('is-invalid');
      }
    });

    if (valid) {
      document.querySelectorAll('.wizard-step').forEach(e => e.classList.add('d-none'));
      document.getElementById('step-' + step).classList.remove('d-none');
      window.scrollTo(0, 0);
    }
  }

  function prevStep(step) {
    document.querySelectorAll('.wizard-step').forEach(e => e.classList.add('d-none'));
    document.getElementById('step-' + step).classList.remove('d-none');
    window.scrollTo(0, 0);
  }
</script>
<!-- VALIDAR QUE LAS CONTRASEÑAS SEAN IGUALES -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const password = document.getElementById('password');
    const confpassword = document.getElementById('confpassword');
    const passwordMessage = document.getElementById('passwordMessage');

    function validarPassword() {
      const pass = password.value.trim();
      const confirm = confpassword.value.trim();

      if (!confirm) {
        passwordMessage.textContent = '';
        return;
      }

      if (pass === confirm) {
        passwordMessage.textContent = '✅ Las contraseñas coinciden';
        passwordMessage.classList.remove('text-danger');
        passwordMessage.classList.add('text-success');
      } else {
        passwordMessage.textContent = '❌ Las contraseñas no coinciden';
        passwordMessage.classList.remove('text-success');
        passwordMessage.classList.add('text-danger');
      }
    }

    password.addEventListener('input', validarPassword);
    confpassword.addEventListener('input', validarPassword);
  });
</script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const maxSize = 3 * 1024 * 1024; // 3MB
    const archivos = ['doc_identificacion', 'doc_curp', 'doc_domicilio'];

    archivos.forEach(id => {
      const input = document.getElementById(id);
      input.addEventListener('change', function() {
        const file = this.files[0];
        if (file && file.size > maxSize) {
          this.classList.add('is-invalid');
          this.value = ''; // Limpia el archivo seleccionado
        } else {
          this.classList.remove('is-invalid');
        }
      });
    });
  });
</script>

<script>
  document.getElementById('nombre').addEventListener('input', function() {
    const valor = this.value.trim();
    const palabras = valor.split(/\s+/);
    if (palabras.length < 3) {
      this.setCustomValidity('Escribe al menos nombre y dos apellidos');
    } else {
      this.setCustomValidity('');
    }
  });
</script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const password = document.getElementById('password');
    const passwordRules = document.getElementById('passwordRules');

    function validarReglas() {
      const pass = password.value;

      const reglas = [{
          ok: pass.length >= 8,
          texto: "Mínimo 8 caracteres"
        },
        {
          ok: /[a-z]/.test(pass),
          texto: "Una letra minúscula"
        },
        {
          ok: /[A-Z]/.test(pass),
          texto: "Una letra mayúscula"
        },
        {
          ok: /\d/.test(pass),
          texto: "Un número"
        },
        {
          ok: /[!@#$%^&*()\-_=+{};:,<.>]/.test(pass),
          texto: "Carácter especial (obligatorio)"
        }
      ];

      let html = "";

      reglas.forEach(regla => {
        if (regla.ok) {
          html += `<div class="text-success">✔ ${regla.texto}</div>`;
        } else {
          html += `<div class="text-danger">✖ ${regla.texto}</div>`;
        }
      });

      passwordRules.innerHTML = html;
    }

    password.addEventListener('input', validarReglas);
  });
</script>