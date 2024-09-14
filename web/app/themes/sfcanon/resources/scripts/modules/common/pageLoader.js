import gsap from 'gsap';

export const pageLoader = async (err) => {
  if (err) {
    console.error(err);
  }

  // Declare progress variables
  let percentage = 0;
  const progressText = document.querySelector('.loader .num .translate');
  const preloader = document.querySelector('.loader');

  // Function to update progress
  function updateProgress() {
    percentage += 1; // Increase progress

    // Update progress bar width and text
    progressText.textContent = `${percentage}`;

    if (percentage >= 100) {
      // When progress reaches 100%, start fading out the preloader
      $('.loader').addClass('hide');

      // Optionally hide the preloader after fade-out completes
      setTimeout(() => {
        preloader.style.display = 'none';
      }, 1000); // Match this timeout with the CSS transition duration

      // Initate currrent content animations
      setTimeout(() => {
        initCurrentContent();
      }, 1000);
    }
  }

  // Simulate loading progress
  const interval = setInterval(() => {
    if (percentage < 100) {
      updateProgress();
    } else {
      clearInterval(interval);
    }
  }, 5); // Adjust interval for progress speed

  // Declare timeline variable for functions
  let tl = gsap.timeline();

  // Function to load page header items
  function initCurrentContent() {
    // Home page content
    if ($('body').hasClass('home')) {
      tl.to('#header .brand', {
        duration: 0.25,
        translateY: 0,
        opacity: 1,
        delay: 0,
      });

      tl.to('#content p', {
        duration: 0.25,
        translateY: 0,
        opacity: 1,
        delay: 0,
      });

      tl.to('#content h2 a', {
        duration: 0.25,
        translateY: 0,
        opacity: 1,
        stagger: 0.25,
        delay: 0,
      });
    }

    // All page header content
    if ($('body').is('.timeline, .characters, .about')) {
      tl.to('#header .brand', {
        duration: 0.25,
        translateY: 0,
        opacity: 1,
        delay: 0,
      });

      tl.to('.nav-primary .menu-item', {
        duration: 0.25,
        translateY: 0,
        opacity: 1,
        stagger: 0.125,
        delay: 0.25,
      });

      tl.to('.page-header h1', {
        duration: 0.25,
        translateY: 0,
        opacity: 1,
        delay: 0,
      });

      tl.to('.page-header p', {
        duration: 0.25,
        translateY: 0,
        opacity: 1,
        delay: 0,
      });

      tl.to('.page-header .scroll-down-btn', {
        duration: 0.25,
        translateY: 0,
        opacity: 1,
        delay: 0,
      });
    }
  }
};

import.meta.webpackHot?.accept(pageLoader);