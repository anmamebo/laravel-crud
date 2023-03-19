const addTelefonoBtn = document.getElementById('addTelefono');
const removeTelefonoBtn = document.getElementById('removeTelefono');
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

removeTelefonoBtn.addEventListener('click', () => {
    if (telefonosDiv.childElementCount > 1) {
        telefonosDiv.removeChild(telefonosDiv.lastChild);
    }
});