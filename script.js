const ticketValue = 200;
let total = 0;

const cantidad = document.getElementById('cantidad');
cantidad.addEventListener("change", () => {
    console.log("La cantidad elegida es: " + cantidad.value);
})

const categoria = document.getElementById('categoria');
categoria.addEventListener("change", () => {
    console.log("Descuento elegido: " + categoria.value)
})

const totalValue = () => {
    if(cantidad.value == 0){
        alert("Complete los campos requeridos por favor");
    }else{
        let total = (ticketValue - (ticketValue * categoria.value)) * parseInt(cantidad.value);
        console.log("Cantidad: " + cantidad.value);
        console.log("Categoría: " + categoria.value);
        console.log("El total es: " + total.toFixed(2));
        const divTotal = document.getElementById('total');
        divTotal.innerHTML = `&nbsp${total.toFixed(0)}`;
    }
}

const cero = () =>{
    let total = "";
    const divTotal = document.getElementById('total');
    divTotal.innerHTML = `&nbsp${total}`;
}

const btnResumen = document.getElementById('resumen');
btnResumen.addEventListener("click", totalValue);

const btnReset = document.getElementById('reset');
btnReset.addEventListener("click", cero);