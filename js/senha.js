$('#senha, #rsenha').on('keyup', function () {
    if ($('#senha').val() == $('#rsenha').val()) {
      $('#msg').html('As senhas são iguais!').css('color', 'green');

    } else 
      $('#msg').html('As senhas são diferentes').css('color', 'red');

  });