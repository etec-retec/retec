
var position = document.getElementById('blocos').scrollTop(); 

// should start at 0

    $(window).scroll(function() {

    var scroll = position.scrollTop();

    if(scroll == 200) {
        position.style.position = 'fixed';
        // console.log('scrollDown');
        // $('.a').addClass('mostra');
    } else {
        //  console.log('scrollUp');
        //  $('.a').removeClass('mostra');
    }
    position = scroll;
});