$('#senha, #rsenha').on('keyup', function () {

  if ($('#senha').val() == $('#rsenha').val()) {
    $('#senha').css('border-color', 'lime');
    $('#rsenha').css('border-color', 'lime');
  }

  if($('#senha').val() != $('#rsenha').val()){
    $('#senha').css('border-color', 'red');
    $('#rsenha').css('border-color', 'red');
  }

  if($('#senha').value() == "" && $('#rsenha').value() == ""){
    $('#senha').css('border-color', 'white');
    $('#rsenha').css('border-color', 'white');
  }

});