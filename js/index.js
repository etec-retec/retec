
//contador de caracteres do textarea 
function limite_textarea(valor) {
    let quant = 500;
    let total = valor.length;
    let aviso = document.querySelector(".aviso");
    let avisado = document.querySelector("#texto");

    if (total <= quant) {
        resto = quant - total;
        document.getElementById('cont').innerHTML = resto;

    } else {
        avisado.value = valor.substr(0, quant);
        aviso.classList += ' avisei'  

    }
}

