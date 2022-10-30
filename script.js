const ticketValue = 200;

discounts = [
    {
        id: 1,
        name: "Estudiante",
        discount: "80%",
        value: 0.8,
    },
    {
        id: 2,
        name: "Trainee",
        discount: "50%",
        value: 0.5,
    },
    {
        id: 3,
        name: "Junior",
        discount: "15%",
        value: 0.15,
    }
]

const loadDiscounts = () => {
    const container = document.querySelector('#container');
    for (const element of discounts){
        let div = document.createElement('div');
        div.innerHTML = `<button class="tickets" id="btn.${element.id}">  
                            <div class="card tickets--btn m-1" style="width: 18rem; border-radius: 0%;">
                                <div class="card-body" id=>
                                    <h5 class="card-title p-2">${element.name}</h5>
                                    <h6 class="card-subtitle mb-2 p-2">Tienen un discount</h6>
                                    <h6 class="card-subtitle mb-2 p-2">${element.discount}</h6>
                                    <p class="card-text text-muted p-2">* presentar documentación</p>
                                </div>
                            </div>
                        </button>`;
        container.appendChild(div); 
    }
}

loadDiscounts();


const loadForm = () => {
    const container = document.querySelector('#form');
    let form = document.createElement('form');
    form.setAttribute('class', 'form');
    form.innerHTML = `  <div class="row">
                            <div class="col p-2">
                                <input type="text" class="form-control" placeholder="Nombre" aria-label="First name">
                            </div>
                            <div class="col p-2">
                                <input type="text" class="form-control" placeholder="Apellido" aria-label="Last name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col p-2">
                                <input type="email" class="form-control" placeholder="Correo" aria-label="Email">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col p-2">
                                <label class="form-label">Cantidad</label>
                                <input type="number" class="form-control" placeholder="Cantidad" aria-label="Last name">
                            </div>
                            <div class="col p-2">
                                <label class="form-label">Categoría</label>
                                <select class="form-select" id="select" aria-label="Select">
                                    <option value="1">Estudiante</option>
                                    <option value="2">Trainee</option>
                                    <option value="3">Junior</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col p-2">
                                <input type="text" id="disabledTextInput" class="form-control bg-primary p-2 text-dark bg-opacity-25" placeholder="Total a pagar: $">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col p-2">
                                <button style="width: 27.6rem;" class="btn btn-green " type="reset">Borrar</button>
                                <button style="width: 27.6rem;" class="btn btn-green " type="button">Resumen</button>
                            </div>
                        </div>`;
    container.appendChild(form); 
}

//loadForm();

const finalValue = () => {

}