(function($, window, document) {

    // Header
    function header() {
        // Sticky Header
        var menu = $('#header-container'),
            origOffsetY = menu.offset().top;
        function stickyHeader() {
            function scroll() {
                if ($(window).scrollTop() <= origOffsetY) {
                    $('#header-container').removeClass('sticky');
                    $('#content').removeClass('menu-padding');
                } else {
                    $('#header-container').addClass('sticky');
                    $('#content').addClass('menu-padding');
                }
            }
            document.onscroll = scroll;
        }
        stickyHeader();

        // Remove Hide Logo Class If Not Home
        if(!$('main').hasClass('home')) {
            $('#navbar-brand').removeClass('hide-logo');
        }
    }
    header();

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

            // Calculate Video Width & Height
            function videoHeight() {
                var windowHeight = $(window).innerHeight(),
                    aspectRatio = 16/9;
                    videoWidth = Math.round(windowHeight * aspectRatio);
                $('.video-container #video-background').each(function() {
                    $(this).css({
                        'height' : windowHeight,
                        'width' : videoWidth
                    });
                });
                $('.video-overlay').each(function() {
                    $(this).css({
                        'height' : windowHeight,
                        'width' : videoWidth
                    });
                });
            }
            videoHeight();
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

            // Set Active The First Slide
            $('#entry-carousel .carousel-item:first-child').addClass('active');
            $('#entry-carousel .carousel-indicators .indicator:first-child').addClass('active');

            // Detect Fully Visible Element & Change Scroll Direction
            $(window).on("scroll", function() {
                $('#entry-carousel').on('slide.bs.carousel', function (e) {
                    var index = $(e.target).find(".active").index();
                    if(index === 0) {
                        $('body').css('overflow','hidden');
                        $('main.timeline').css('overflow','auto');
                        $('body').scrollTop($('main').height());
                    } else {
                        $('body').css('overflow','auto');
                        $('main.timeline').css('overflow','auto');
                    }
                });
            });
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

    // BarbaJS
    // Transition
    var PageTransition = Barba.BaseTransition.extend({
        start: function() {
            Promise
                .all([this.newContainerLoading, this.fadeOut()])
                .then(this.fadeIn.bind(this));
        },
        fadeOut: function() {
            return $(this.oldContainer).removeClass('slide-in').addClass('slide-out').animate({ opacity: 0, visibility: 'hidden' }, 500).promise();
        },
        fadeIn: function() {
            var _this = this;
            var $el = $(this.newContainer);

            $(this.oldContainer).hide();

            $el.css({
                visibility: 'visible',
                opacity: 0,
            });

            $(window).scrollTop(0);
            $('body').css('overflow','auto');

            $el.addClass(function() {
                return 'slide-in';
            }).animate({ opacity: 1 }, 500, function() {
                _this.done();
            });
        },
    });
    Barba.Pjax.getTransition = function() {
        return PageTransition;
    };
    // Home
    var HomeContainer = Barba.BaseView.extend({
        namespace: 'home-container',
        onLeave: function() {
            // A new Transition toward a new page has just started.
        },
        onLeaveCompleted: function() {
            // The Container has just been removed from the DOM.
        },
        onEnter: function() {
            // The new Container is ready and attached to the DOM.
            home();
        },
        onEnterCompleted: function() {
            // The Transition has just finished.
            header();
            content();
        },
    });
    HomeContainer.init();
    // Timeline
    var TimelineContainer = Barba.BaseView.extend({
        namespace: 'timeline-container',
        onLeave: function() {
            // A new Transition toward a new page has just started.
        },
        onLeaveCompleted: function() {
            // The Container has just been removed from the DOM.
        },
        onEnter: function() {
            // The new Container is ready and attached to the DOM.
            timeline();
        },
        onEnterCompleted: function() {
            // The Transition has just finished.
            header();
            content();
        },
    });
    TimelineContainer.init();
    // Characters
    var CharactersContainer = Barba.BaseView.extend({
        namespace: 'characters-container',
        onLeave: function() {
            // A new Transition toward a new page has just started.
        },
        onLeaveCompleted: function() {
            // The Container has just been removed from the DOM.
        },
        onEnter: function() {
            // The new Container is ready and attached to the DOM.
            characters();
        },
        onEnterCompleted: function() {
            // The Transition has just finished.
            header();
            content();
        },
    });
    CharactersContainer.init();
    // About
    var AboutContainer = Barba.BaseView.extend({
        namespace: 'characters-container',
        onLeave: function() {
            // A new Transition toward a new page has just started.
        },
        onLeaveCompleted: function() {
            // The Container has just been removed from the DOM.
        },
        onEnter: function() {
            // The new Container is ready and attached to the DOM.
            about();
        },
        onEnterCompleted: function() {
            // The Transition has just finished.
            header();
            content();
        },
    });
    AboutContainer.init();

})(jQuery, window, document);