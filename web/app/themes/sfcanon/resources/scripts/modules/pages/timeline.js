import Lenis from '@studio-freight/lenis';
import gsap from 'gsap';
import ScrollTrigger from 'gsap/ScrollTrigger';
import Draggable from 'gsap/Draggable';
import { Carousel } from 'bootstrap';

export const timeline = async (err) => {
  if (err) {
    console.error(err);
  }

  // Register GSAP plugins
  gsap.registerPlugin(ScrollTrigger, Draggable);

  // Set up lenis
  const lenis = new Lenis({
    duration: 1.2,
    easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
  });

  // Set up progress bar
  const progressBar = document.querySelector('.progress-bar');

  // Update the lenis scroll
  lenis.on('scroll', () => {
    // Set the progress based on lenis scroll
    let progress = lenis.progress * 100;

    // Update the progress bar
    progressBar.style.height = `${progress}%`;
    progressBar.querySelector('.inner-pb').style.height = `${progress}%`;
  });

  // Reset scroll progress
  let progress = 0;
  progressBar.style.height = `${progress}%`;
  progressBar.querySelector('.inner-pb').style.height = `${progress}%`;

  // Update the lenis ScrollTrigger
  lenis.on('scroll', ScrollTrigger.update);

  // Add time to the lenis ticker
  gsap.ticker.add((time)=>{
    lenis.raf(time * 1000);
  });

  // Remove lagSmoothing
  gsap.ticker.lagSmoothing(0);
  
  // Update RAF timing
  function raf(time) {
    lenis.raf(time);
    ScrollTrigger.update();
    requestAnimationFrame(raf);
  }
  
  // Request the animation frame
  requestAnimationFrame(raf);

  // Scroll down button
  function viewMore() {
    if ($('#header-content').length) {
      $('#header-content .scroll-down-btn').on('click', function(e) {
        e.preventDefault()
        lenis.scrollTo('#main-content')
      });
    }
  }
  viewMore();

  // Set the variables for the initial slide and selector
  const entry = document.querySelector('.carousel-item:first-child');
  const thumb = document.querySelector('.scroll-thumb:first-child');

  // Add active classes to initial slide and selector
  entry.classList.add('active');
  thumb.classList.add('active');

  // Initialize Bootstrap Carousel
  const carouselElement = document.querySelector('#timeline-carousel'); // Replace with your carousel ID
  const carousel = new Carousel(carouselElement, {
    interval: 2000,
    wrap: false,
  });

  let firstSlide = carouselElement.querySelector('.carousel-item:first-child');
  let isFirstSlide = true; // To keep track of whether we are on the first slide or not

  // Function to handle stopping and starting Lenis scroll
  function manageLenisScroll() {
    if (isFirstSlide) {
      lenis.stop(); // Stop Lenis scroll if on the first slide
      setTimeout(() => {
        lenis.start(); // Restart Lenis scroll after 3 seconds
        document.body.removeAttribute('data-lenis-prevent');
      }, 1000);
    } else {
      lenis.stop(); // Stop Lenis scroll if not on the first slide
      document.body.setAttribute('data-lenis-prevent', '');
    }
  }

  // Function to check if the current slide is the first slide
  function checkIfFirstSlide() {
    const activeSlide = carouselElement.querySelector('.carousel-item.active');
    isFirstSlide = activeSlide === firstSlide;
    manageLenisScroll();
  }

  // Check if window scroll is at top of page, if not, run slide check
  if (!window.scrollY === 0) {
    checkIfFirstSlide();
  }

  // Set up carousel cover variable
  const carouselCover = document.querySelector('.carousel-scroll-cover');
  
  // Listen for slide events
  carouselElement.addEventListener('slid.bs.carousel', checkIfFirstSlide);

  // Allow mousewheel to change slides
  carouselElement.addEventListener('wheel', (event) => {
    if (event.deltaY < 0) {
      carousel.prev(); // Scroll up
    } else {
      carousel.next(); // Scroll down
    }
    event.preventDefault(); // Prevent the default scroll behavior
    checkIfFirstSlide(); // Run check first slide function
  });

  // Allow toggle carousel cover
  window.addEventListener('wheel', (event) => {
    if (event.deltaY > 0) {
      if (window.scrollY >= window.innerHeight) {
        carouselCover.classList.remove('active');
      }
    } else {
      carouselCover.classList.add('active');
    }
  });
};

import.meta.webpackHot?.accept(timeline);