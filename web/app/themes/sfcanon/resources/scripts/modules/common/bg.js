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
    $('#canvas').children().not('#'+pageId).removeClass('show');
    $('#canvas').children('#'+pageId).addClass('show');
    setCanvas();

    // Add resize listener
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
    $('.canvas-color').height(videoHeight).width(videoWidth);
  }
};

import.meta.webpackHot?.accept(bg);