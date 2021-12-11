
$(document).ready(function(){
    $(window).scroll(function(){
        if ($(this).scrollTop() > 150) {
            $('div[class="topo"]').fadeIn();
        } else {
            $('div[class="topo"]').fadeOut();
        }
    });

    // $('a[href="#top"]').click(function(){
    //     $('html, body').animate({scrollTop : 0},800);
    //     return false;
    // });
})