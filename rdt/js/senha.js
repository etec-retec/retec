function verifica(){
    if(document.getElementById('senha').value == document.getElementById('rsenha')){
        null;
    }else{
        alert("Errou a senha, trouxa!");
        document.getElementById("form").disabled = true;
    }
}