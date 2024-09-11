export const bg = async (err) => {
  if (err) {
    console.error(err);
  }

  // Function to update video canvas depending on page ID
  const canvas = document.getElementById('video-canvas');
  const ctx = canvas.getContext('2d');
  let currentVideo = null;

  // Function that gets the page ID and passes it along to add 'show' class
  function onPage() {
    // Get id of main element
    var pageId = $('main').attr('id');

    // Pass thru the 'show' class to the correpsonding canvas element
    $('#canvas').children().not('#'+pageId+'-video-container').children().removeClass('show');
    $('#canvas').children('#'+pageId+'-video-container').children().addClass('show');

    // Run setCanvas function
    setCanvas();

    // Run setCanvas function on resize
    $(window).on('resize', function() {
      setCanvas();
    });
  }
  
  // Function that sets the height and width of the canvas
  function setCanvas() {
    // Set viewport variables
    let viewportHeight = window.innerHeight;
    let viewportWidth = window.innerWidth;
  
    // Set videoHeight variables
    let videoHeight = Math.round(viewportWidth / 16 * 9);
    let videoWidth = viewportWidth;
  
    // Set videoHeight and videoWidth if videoHeight <> viewportHeight
    if (videoHeight < viewportHeight) {
      videoHeight = viewportHeight;
      videoWidth = Math.round(videoHeight / 9 * 16);
    } else {
      videoHeight = Math.round(viewportWidth / 16 * 9);
      videoWidth = viewportWidth;
    }
  
    // Set canvas elements width and height
    $('.canvas').height(viewportHeight).width(viewportWidth);
    $('.canvas').children('.background-media').height(videoHeight).width(videoWidth);
    $('.canvas-color').height(viewportHeight).width(viewportWidth);
    $('canvas').height(videoHeight).width(videoWidth);
  }

  // Remove 'show' class from all video elements
  $('#canvas #home.canvas').children().removeClass('show');
  $('#canvas #timeline.canvas').children().removeClass('show');
  $('#canvas #characters.canvas').children().removeClass('show');
  $('#canvas #about.canvas').children().removeClass('show');

  // Run the onPage function
  onPage();

  function playVideoInCanvas(videoElement) {
    const video = videoElement;
  
    if (currentVideo !== video) {
      if (currentVideo) {
        currentVideo.pause();
      }
  
      video.play();
      currentVideo = video;
    }
  
    function drawFrame() {
      if (!video.paused && !video.ended) {
        ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
        requestAnimationFrame(drawFrame);
      }
    }
  
    drawFrame();
  }
  
  function updateVideo() {
    const videos = document.querySelectorAll('.background-media');
    let videoToShow = null;
  
    videos.forEach(video => {
      if (video.classList.contains('show')) {
        videoToShow = video;
      }
    });
  
    if (videoToShow) {
      playVideoInCanvas(videoToShow);
    } else {
      // Optionally, clear the canvas or handle the case when no video is to be shown
      ctx.clearRect(0, 0, canvas.width, canvas.height);
    }
  }

  // Initial video update
  updateVideo();
};

import.meta.webpackHot?.accept(bg);