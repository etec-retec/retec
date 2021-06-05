$('#senha, #rsenha').on('keyup', function () {
    if ($('#senha').val() == $('#rsenha').val() && $('#senha').val() != '' && $('#rsenha').val() != '') {
      // $('#msg').html('').css('color', 'white');
      $('#senha').css('border-color', 'lime');
      $('#rsenha').css('border-color', 'lime');
    }else if($('#senha').val() != $('#rsenha').val() || $('#senha').val() == '' || $('#rsenha').val() == ''){
      $('#senha').css('border-color', 'white');
      $('#rsenha').css('border-color', 'white');
  }
});