(function($, window, document) {

    // Content
    function content() {
        // Make Full Height
        function fullheight() {
            var windowHeight = $(window).innerHeight(),
                headerHeight = $('#header-container').height();
            $('main').css('min-height', windowHeight);
            $('#content').css('min-height', windowHeight - headerHeight);
            $('#carousel-section').css('min-height', windowHeight - headerHeight);
            $('#carousel-section .carousel-item').css('min-height', windowHeight - headerHeight);
        }
        fullheight();
    }
    content();

    // Home
    function home() {
        if($('main').hasClass('home')) {
            // Make Full Height
            function fullheight() {
                var windowHeight = $(window).innerHeight();
                $('main').css('max-height', windowHeight);
            }
            fullheight();

            // Window Resize
            $(window).resize(function() {
                fullheight();
            });
            
            // Init Carousel
            $('#carousel-section').carousel({
                pause: false,
                ride: 'carousel',
                keyboard: true,
                wrap: true,
                interval: 7500,
            });
            $('#carousel-section').bind('mousewheel', function(e) {
                if(e.originalEvent.wheelDelta /120 < 0) {
                    $(this).carousel('next');
                } else {
                    $(this).carousel('prev');
                }
            });
        }
    }
    home();

})(jQuery, window, document);