import Lenis from '@studio-freight/lenis';
import gsap from 'gsap';
import ScrollTrigger from 'gsap/ScrollTrigger';
import Draggable from 'gsap/Draggable';
import { ResizeObserver } from '@juggle/resize-observer';

export const lenisinit = async (err) => {
  if (err) {
    console.error(err);
  }

  // Register GSAP plugins
  gsap.registerPlugin(ScrollTrigger, Draggable);

  // Set main scroll ele
  const app = document.getElementById('app');

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
        e.preventDefault();
        lenis.scrollTo('#main-content');
      });
    }
  }

  // Initialize the scroll down button
  viewMore();

  // Stagger animate bottom content on trigger
  let contentLines = gsap.utils.toArray(['.main #main-content h2', '.main #main-content p', '.main #main-content li', 'main #main-content .chara']);

  contentLines.forEach(contentLine => {
    gsap.fromTo(contentLine, {
      opacity: 0,
      ease: 'sine.inOut',
      scrollTrigger: {
        trigger: contentLine,
        start: 'top top-=75vh',
        scrub: true,
      },
    }, {
      opacity: 1,
      duration: 0.25,
      stagger: 0.25,
      delay: 0.5,
      ease: 'sine.inOut',
      scrollTrigger: {
        trigger: contentLine,
        end: 'bottom bottom-=75vh',
        scrub: true,
      },
    });
  });

  // Add resize observer
  new ResizeObserver(() => lenis.on('scroll', ScrollTrigger.update)).observe(app);
};

import.meta.webpackHot?.accept(lenisinit);