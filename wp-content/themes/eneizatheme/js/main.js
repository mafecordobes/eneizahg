(function($) {
    
    $('#back_to_top').on('click', function() {
        $('body,html').animate({
        scrollTop: 0
        }, 500);
        return false;
    });

    var altura = $('.menu').offset().top;


    $(window).scroll(function(){
		if ( $(window).scrollTop() > altura ){
			$('.menu-top').addClass('menu-fixed');
		} else {
            $('.menu-top.menu-fixed').removeClass('menu-clicked');
            $('.menu-top').removeClass('menu-fixed');
            $('.burger-menu').removeClass('menu-clicked-burguer');
		}
    });

    $('.burger-menu').on('click', function(e) {
        e.preventDefault();
  
        $(this).addClass('menu-clicked-burguer');
        $('.menu-top.menu-fixed').addClass('menu-clicked');
    });

    $('.menu-responsive').on('click', function() {
        $('#responsive-menu').css('right', '0');
        $('#body_overlay').css('display', 'block');
    });

    $('.close-menu').on('click', function() {
        $('#responsive-menu').css('right', '-250px');
        $('#body_overlay').css('display', 'none');
    });
    
})(jQuery);