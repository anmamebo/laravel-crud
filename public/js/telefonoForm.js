const addTelefonoBtn = document.getElementById('addTelefono');
const telefonosDiv = document.getElementById('telefonos');

addTelefonoBtn.addEventListener('click', () => {
    const telefonoDiv = document.createElement('div');
    telefonoDiv.classList.add('mb-2')
    const telefonoInput = document.createElement('input');
    telefonoInput.classList.add('form-control', 'bg-dark', 'text-white')
    telefonoInput.type = 'tel';
    telefonoInput.name = 'telefonos[]';
    telefonoInput.required = true;

    telefonoDiv.appendChild(telefonoInput);
    telefonosDiv.appendChild(telefonoDiv);
});