export const bg = async (err) => {
  if (err) {
    console.error(err);
  }

  /** Run onPage function */
  $('#canvas #home.canvas').removeClass('show');
  $('#canvas #timeline.canvas').removeClass('show');
  $('#canvas #characters.canvas').removeClass('show');
  $('#canvas #about.canvas').removeClass('show');
  onPage();

  /** Turn on background if on certain pages */
  function onPage() {
    // Get id of main element
    var pageId = $('main').attr('id');

    // Pass thru the show class to the correpsonding canvas element
    $('#canvas').children().not('#'+pageId+'-video-container').removeClass('show');
    $('#canvas').children('#'+pageId+'-video-container').addClass('show');

    // Play video if show class is active
    $('.canvas').each(function() {
      if ($(this).hasClass('show')) {
        $(this).siblings().children()[0].pause();
        $(this).children()[0].play();
      }
    });

    // Run set canvas
    setCanvas();
    $(window).on('resize', function() {
      setCanvas();
    });
  }

  /** Set height and width of canvas */
  function setCanvas() {
    // Set viewport variables
    var viewportHeight = $(window).innerHeight();
    var viewportWidth = $(window).innerWidth();

    // Set videoHeight variables
    var videoHeight = Math.round(viewportWidth / 16 * 9);
    var videoWidth = viewportWidth;

    // Set videoHeight and videoWidth if videoHeight <> viewportHeight
    if (videoHeight < viewportHeight) {
      videoHeight = viewportHeight;
      videoWidth = Math.round(videoHeight / 9 * 16);
    } else {
      videoHeight = Math.round(viewportWidth / 16 * 9);
      videoWidth = viewportWidth;
    }

    // Run the scripts on the canvas
    $('.canvas').height(viewportHeight).width(viewportWidth);
    $('.canvas').children('.background-media').height(videoHeight).width(videoWidth);
    $('.canvas-color').height(viewportHeight).width(viewportWidth);
    $('canvas').height(videoHeight).width(videoWidth);

    // Run the drawCanvas function
    drawCanvas();
  }

  /** Draw video on canvas */
  function drawCanvas() {
    const canvas = document.querySelector('#canvas canvas');
    const video = document.querySelector('#canvas .canvas.show .background-media');
    
    function drawImage() {
      canvas.getContext('2d', { alpha: false }).drawImage(video, 0, 0, 1280, 720);
    }

    var canvasInterval = window.setInterval(() => {
      drawImage(video);
    }, 1000 / 60);

    video.onpause = function() {
      clearInterval(canvasInterval);
    }

    video.onended = function() {
      clearInterval(canvasInterval);
    }

    video.onplay = function() {
      clearInterval(canvasInterval);
      canvasInterval = window.setInterval(() => {
        drawImage(video);
      }, 1000 / 60);
    }
  }
};

import.meta.webpackHot?.accept(bg);