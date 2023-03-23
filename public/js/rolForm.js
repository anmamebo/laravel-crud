const EMPLEADO = 1;
const GERENTE = 2;

const selectRolInput = document.getElementById('rolSelect');
const variableInputsContainer = document.getElementById('variableInputsContainer');

selectRolInput.addEventListener('change', (event) => {
    loadContainer();
});

function loadContainer() {
    const selectValue = selectRolInput.value;

    // Elimina todos los nodos hijos del contenedor
    while (variableInputsContainer.firstChild) {
        variableInputsContainer.removeChild(variableInputsContainer.firstChild);
    }

    if (selectValue == EMPLEADO) {

        const horasTrabajadasDiv = document.createElement('div');
        horasTrabajadasDiv.classList.add('mb-3', 'col-md-6');
        const horasTrabajadasLabel = document.createElement('label');
        horasTrabajadasLabel.classList.add('form-label');
        horasTrabajadasLabel.setAttribute('for', 'horasTrabajadas');
        horasTrabajadasLabel.textContent = 'Horas trabajadas';
        const horasTrabajadasInput = document.createElement('input');
        horasTrabajadasInput.setAttribute('type', 'text');
        horasTrabajadasInput.setAttribute('step', 'any');
        horasTrabajadasInput.classList.add('form-control', 'bg-dark', 'text-white');
        horasTrabajadasInput.setAttribute('name', 'horas_trabajadas');
        horasTrabajadasInput.setAttribute('id', 'horasTrabajadas');
        horasTrabajadasInput.required = true;

        horasTrabajadasDiv.appendChild(horasTrabajadasLabel);
        horasTrabajadasDiv.appendChild(horasTrabajadasInput);

        const precioPorHoraDiv = document.createElement('div');
        precioPorHoraDiv.classList.add('mb-3', 'col-md-6');
        const precioPorHoraLabel = document.createElement('label');
        precioPorHoraLabel.setAttribute('for', 'precioPorHora');
        precioPorHoraLabel.classList.add('form-label');
        precioPorHoraLabel.textContent = 'Precio por hora';
        const precioPorHoraInput = document.createElement('input');
        precioPorHoraInput.setAttribute('type', 'text');
        precioPorHoraInput.setAttribute('step', 'any');
        precioPorHoraInput.classList.add('form-control', 'bg-dark', 'text-white');
        precioPorHoraInput.setAttribute('name', 'precio_por_hora');
        precioPorHoraInput.setAttribute('id', 'precioPorHora');
        precioPorHoraInput.required = true;

        precioPorHoraDiv.appendChild(precioPorHoraLabel);
        precioPorHoraDiv.appendChild(precioPorHoraInput);

        variableInputsContainer.appendChild(horasTrabajadasDiv);
        variableInputsContainer.appendChild(precioPorHoraDiv);

    } else if (selectValue == GERENTE) {

        const salarioDiv = document.createElement('div');
        salarioDiv.classList.add('mb-3', 'col-md-12');
        const salarioLabel = document.createElement('label');
        salarioLabel.setAttribute('for', 'salario');
        salarioLabel.classList.add('form-label');
        salarioLabel.textContent = 'Salario';
        const salarioInput = document.createElement('input');
        salarioInput.setAttribute('type', 'text');
        salarioInput.setAttribute('step', 'any');
        salarioInput.classList.add('form-control', 'bg-dark', 'text-white');
        salarioInput.setAttribute('name', 'salario');
        salarioInput.setAttribute('id', 'salario');
        salarioInput.required = true;

        salarioDiv.appendChild(salarioLabel);
        salarioDiv.appendChild(salarioInput);

        variableInputsContainer.appendChild(salarioDiv);

    }
}