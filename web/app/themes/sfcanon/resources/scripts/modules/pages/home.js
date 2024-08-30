export const home = async (err) => {
  if (err) {
    console.error(err);
  }

  // Get references to elements
  const videoCanvas = document.getElementById('video-canvas');
  const context = videoCanvas.getContext('2d');
  const videos = {
    video1: document.getElementById('home-video'),
    video2: document.getElementById('timeline-video'),
    video3: document.getElementById('characters-video'),
    video4: document.getElementById('about-video'),
  };

  // Default video source
  let currentVideoId = 'video1';
  let currentVideoElement = videos[currentVideoId];

  // Draw video frame on canvas
  function drawVideoFrame() {
    if (currentVideoElement && !currentVideoElement.paused) {
      context.drawImage(currentVideoElement, 0, 0, videoCanvas.width, videoCanvas.height);
    }
    requestAnimationFrame(drawVideoFrame);
  }

  // Start drawing the initial video
  drawVideoFrame();

  // Function to change video source
  function fadeToVideo(newVideoId) {
    if (currentVideoId === newVideoId) return;

    // Get current and new video elements
    const oldVideo = videos[currentVideoId];
    const newVideo = videos[newVideoId];

    // Begin fade out of the current video
    oldVideo.classList.remove('opIn');
    setTimeout(() => {
      oldVideo.pause();
      //oldVideo.currentTime = 0;
      oldVideo.classList.add('opFade');
    }, 1000 / 60); // Match fade duration

    // Begin fade in of the new video
    newVideo.classList.remove('opFade');
    newVideo.classList.add('opIn');
    newVideo.play();

    // Update current video reference
    currentVideoId = newVideoId;
    currentVideoElement = newVideo;
  }

  // Attach hover events to links
  document.getElementById('timeline').addEventListener('mouseover', () => fadeToVideo('video2'));
  document.getElementById('characters').addEventListener('mouseover', () => fadeToVideo('video3'));
  document.getElementById('about').addEventListener('mouseover', () => fadeToVideo('video4'));

  // Change video back to default if no link is hovered
  document.querySelectorAll('#home h2 a').forEach(link => {
    link.addEventListener('mouseout', () => fadeToVideo('video1'));
  });
};

import.meta.webpackHot?.accept(home);