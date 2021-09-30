
//contador de caracteres do textarea 
function limite_textarea(valor) {
    quant = 250;
    total = valor.length;
    let aviso = document.querySelector(".aviso")
    if (total <= quant) {
        resto = quant - total;
        document.getElementById('cont').innerHTML = resto;

    } else {
        document.getElementById('texto').value = valor.substr(0, quant);
        aviso.classList += ' avisei'  

    }
}

//evento de pular de campo ao clicar na tecla Enter
// $("input, select", "form") // busca input e select no form
// .keypress(function(e){ // evento ao presionar uma tecla válida keypress
   
//    var k = e.which || e.keyCode; // pega o código do evento
   
//    if(k == 40){ // se for ENTER
//       e.preventDefault(); // cancela o submit
//       $(this)
//       .closest('tr') // seleciona a linha atual
//       .next() // seleciona a próxima linha
//       .find('input, select') // busca input ou select
//       .first() // seleciona o primeiro que encontrar
//       .focus(); // foca no elemento
//    }

// });