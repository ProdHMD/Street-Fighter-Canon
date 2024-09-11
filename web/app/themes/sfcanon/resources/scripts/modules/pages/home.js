export const home = async (err) => {
  if (err) {
    console.error(err);
  }

  // Set canvas and video constants
  const canvas = document.getElementById('video-canvas');
  const ctx = canvas.getContext('2d');
  const videos = [
    document.getElementById('home-video'),
    document.getElementById('timeline-video'),
    document.getElementById('characters-video'),
    document.getElementById('about-video'),
  ];

  // Video indices
  const initialVideoIndex = 0;
  const hoverVideoIndices = [1, 2, 3];
  
  // Set initial video and fade parameters
  let currentVideoIndex = initialVideoIndex;
  let nextVideoIndex = initialVideoIndex;
  let fadeDuration = 500; // Duration in milliseconds
  let fadeStartTime = null;
  let hoverTimeout = null;
  
  // Function to set video and start fade
  function startFade(newVideoIndex) {
    if (newVideoIndex !== currentVideoIndex) {
      nextVideoIndex = newVideoIndex;
      fadeStartTime = Date.now();
      videos[currentVideoIndex].pause();
      videos[nextVideoIndex].play();
    }
  }
  
  // Drawing and fading logic
  function draw() {
    const now = Date.now();
    const elapsedTime = fadeStartTime ? now - fadeStartTime : 0;
    const fadeProgress = Math.min(elapsedTime / fadeDuration, 1);

    // Clear canvas
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    // Draw current video with fading effect
    ctx.globalAlpha = 1 - fadeProgress;
    ctx.drawImage(videos[currentVideoIndex], 0, 0, canvas.width, canvas.height);

    // Draw next video with fading effect
    ctx.globalAlpha = fadeProgress;
    ctx.drawImage(videos[nextVideoIndex], 0, 0, canvas.width, canvas.height);

    if (fadeProgress >= 1 && currentVideoIndex !== nextVideoIndex) {
      currentVideoIndex = nextVideoIndex;
    }

    requestAnimationFrame(draw);
  }

  function handleHover(videoIndex) {
    startFade(videoIndex);
    if (hoverTimeout) clearTimeout(hoverTimeout);
  }

  function handleMouseOut() {
    hoverTimeout = setTimeout(() => startFade(initialVideoIndex), 100); // Delay to avoid rapid switching
  }

  // Link hover event handlers
  document.getElementById('timeline').addEventListener('mouseover', () => handleHover(hoverVideoIndices[0]));
  document.getElementById('characters').addEventListener('mouseover', () => handleHover(hoverVideoIndices[1]));
  document.getElementById('about').addEventListener('mouseover', () => handleHover(hoverVideoIndices[2]));

  document.querySelectorAll('#home.main h2 a').forEach(link => {
    link.addEventListener('mouseout', handleMouseOut);
  });

  // Start with the first video
  videos[initialVideoIndex].play();
  requestAnimationFrame(draw);
};

import.meta.webpackHot?.accept(home);