//contador de caracteres do textarea 
function limite_textarea(valor) {
    quant = 2;
    total = valor.length;
    let aviso = document.querySelector(".aviso")
    if (total <= quant) {
        resto = quant - total;
        document.getElementById('cont').innerHTML = resto;
    } else {
        document.getElementById('texto').value = valor.substr(0, quant);
        aviso.classList += ' avisei'  
        // window.alert("Faça um comentário mais breve para que possamos te ajudar ter uma melhor experiência 😉😉")
    }
}

//animações do site
let cabecalho = document.querySelector(".actions")
let contato = document.querySelector(".contato")
let tecnologias = document.querySelector(".tec")