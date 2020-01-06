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

            // Hide Header Logo If Slide 1 Active
            $('#navbar-brand').addClass('hide-logo');
            $('#carousel-section').on('slide.bs.carousel', function onSlide(ev) {
                var id = ev.relatedTarget.id;
                switch (id) {
                    case "home-section":
                        $('#navbar-brand').addClass('hide-logo');
                        break;
                    default:
                        $('#navbar-brand').removeClass('hide-logo');
                }
            });
        }
    }
    home();

    // Timeline
    function timeline() {
        if($('main').hasClass('timeline')) {
            // Init Carousel
            $('#entry-carousel').carousel({
                pause: false,
                ride: false,
                keyboard: true,
                wrap: false,
                interval: false,
            });
            $('#entry-carousel').bind('mousewheel', function(e) {
                if(e.originalEvent.wheelDelta /120 < 0) {
                    $(this).carousel('next');
                } else {
                    $(this).carousel('prev');
                }
            });

            // Set active the first slide
            $('#entry-carousel .carousel-item:first-child').addClass('active');
            $('#entry-carousel .carousel-indicators .indicator:first-child').addClass('active');
        }
    }
    timeline();

    // Characters
    function characters() {
        if($('main').hasClass('characters')) {
            // Init Isotope
            var $grid = $('.character-grid').isotope({
                itemSelector: '.character-item',
                layoutMode: 'fitRows',
                getSortData: {
                    name: '[data-name]',
                    canonDebut: '[data-canon-debut]',
                    realtimeDebut: '[data-realtime-debut]',
                }
            });

            // Bind Button Click
            $('#sort-inner').on('click','button',function() {
                var sortFilter = $(this).attr('data-filter');
                $grid.isotope({
                    sortBy: sortFilter,
                });
            });

            // Change 'is-checked' Button Class
            $('#sort-inner').each(function(i,buttonGroup) {
                var $buttonGroup = $(buttonGroup);
                $buttonGroup.on('click','button',function() {
                    $buttonGroup.find('.is-checked').removeClass('is-checked');
                    $(this).addClass('is-checked');
                });
            });
        }
    }
    characters();

    // About Us
    function about() {
        if($('main').hasClass('about-us')) {

        }
    }
    about();

})(jQuery, window, document);