var currentLocation = window.location;

if(currentLocation.search.slice(0,9) == "?denied=2"){
    document.getElementById("lbl_inc").style.display = "block";
}else if(currentLocation.search.slice(0,7) == "?alert2"){
    document.getElementById("lbl_alert1").style.display = "block";
}else if(currentLocation.search.slice(0,7) == "?alert1"){
    document.getElementById("lbl_alert1").style.display = "block";
}else if(currentLocation.search.slice(0,8) == "?enviado"){
    document.getElementById("enviadoMsg").style.display = "block";
}else if(currentLocation.search.slice(0,13) == "?solicitacoes"){
    document.getElementById("solicitacaoMsg").style.display = "block";
}else if(currentLocation.search.slice(0,13) == "?notFound"){
    document.getElementById("encontradoMsg").style.display = "block";
}