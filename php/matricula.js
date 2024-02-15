document.addEventListener('DOMContentLoaded', function () {
  const gradoInteresSelect = document.getElementById('gradoInteres');
  const seccionGroup = document.getElementById('seccionGroup');
  const seccionSelect = document.getElementById('seccion');

  gradoInteresSelect.addEventListener('change', () => {
      if (gradoInteresSelect.value === 'inicial') {
          seccionGroup.style.display = 'block';
          seccionSelect.innerHTML = `
              <option value="3 años">3 años</option>
              <option value="4 años">4 años</option>
              <option value="5 años">5 años</option>
          `;
      } else if (gradoInteresSelect.value === 'primaria') {
          seccionGroup.style.display = 'block';
          seccionSelect.innerHTML = `
              <option value="1er grado">1er grado</option>
              <option value="2do grado">2do grado</option>
              <option value="3er grado">3er grado</option>
              <option value="4to grado">4to grado</option>
              <option value="5to grado">5to grado</option>
              <option value="6to grado">6to grado</option>
          `;
      } else if (gradoInteresSelect.value === 'secundaria') {
          seccionGroup.style.display = 'block';
          seccionSelect.innerHTML = `
              <option value="1er grado">1er grado</option>
              <option value="2do grado">2do grado</option>
              <option value="3er grado">3er grado</option>
              <option value="4to grado">4to grado</option>
              <option value="5to grado">5to grado</option>
          `;
      }else {
          seccionGroup.style.display = 'none';
          seccionSelect.innerHTML = '';
      }
  });

  const matriculaForm = document.getElementById('matriculaForm');
  matriculaForm.addEventListener('submit', (e) => {
      e.preventDefault();
      const nombres = document.getElementById('nombres').value;
      const apellidoPaterno = document.getElementById('apellidoPaterno').value;
      const apellidoMaterno = document.getElementById('apellidoMaterno').value;
      const dni = document.getElementById('dni').value;
      const correoApoderado = document.getElementById('correoApoderado').value;
      const telefonoApoderado = document.getElementById('telefonoApoderado').value;
      const gradoInteres = gradoInteresSelect.value;
      const seccion = seccionSelect.value;

      alert(`Matrícula enviada:\n
          Nombres: ${nombres}\n
          Apellido Paterno: ${apellidoPaterno}\n
          Apellido Materno: ${apellidoMaterno}\n
          DNI: ${dni}\n
          Correo Apoderado: ${correoApoderado}\n
          Teléfono Apoderado: ${telefonoApoderado}\n
          Grado de Interés: ${gradoInteres}\n
          Sección: ${seccion}`);
  });
});
