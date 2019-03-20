function VerificaInputs(input) {
    var valorInput = document.querySelectorAll("input")

    console.log(valorInput);

    valorInput.forEach(el => {
        if(typeof el.value !== "number"){
            console.log("É numero");
        }else{
            console.log("Não é numero");
        }
    })
}