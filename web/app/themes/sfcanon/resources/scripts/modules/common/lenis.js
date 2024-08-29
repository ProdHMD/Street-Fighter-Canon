import Lenis from '@studio-freight/lenis';
import gsap from 'gsap';
import ScrollTrigger from 'gsap/ScrollTrigger';
//import { ResizeObserver } from '@juggle/resize-observer';

export const lenisinit = async (err) => {
  if (err) {
    console.error(err);
  }

  gsap.registerPlugin(ScrollTrigger)

  const lenis = new Lenis({
    duration: 1.2,
    easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
  })

  lenis.on('scroll', (e) => {
    console.log(e)
  })

  lenis.on('scroll', ScrollTrigger.update)

  gsap.ticker.add((time)=>{
    lenis.raf(time * 1000)
  })

  gsap.ticker.lagSmoothing(0)
  
  function raf(time) {
    lenis.raf(time)
    ScrollTrigger.update()
    requestAnimationFrame(raf)
  }
  
  requestAnimationFrame(raf)

  const timeline = document.getElementById('main-content')
  let entry_items = gsap.utils.toArray('.entry-item')

  function timelineJS() {
    gsap.to(entry_items, {
      xPercent: -117.25 * (entry_items.length - 1),
      ease: 'sine.inOut',
      scrollTrigger: {
        trigger: timeline,
        pin: true,
        scrub: 3,
        snap: 1 / (entry_items.length - 1),
        end: '+=' + timeline.offsetWidth,
      },
    })
  }
  if ($('main').is('#timeline')) {
    timelineJS()
  }

  function viewMore() {
    if ($('#header-content').length) {
      $('#header-content .scroll-down-btn').on('click', function(e) {
        e.preventDefault()
        lenis.scrollTo('#main-content')
      })
    }
  }
  viewMore()
};

import.meta.webpackHot?.accept(lenisinit);