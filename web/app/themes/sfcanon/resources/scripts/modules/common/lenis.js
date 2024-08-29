import Lenis from '@studio-freight/lenis';
import gsap from 'gsap';
import ScrollTrigger from 'gsap/ScrollTrigger';
import Draggable from 'gsap/Draggable';
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
  
  const thumb = document.querySelector('.scroll-thumb')
  let scrollTween = gsap.to(thumb, {
    x: 64,
    ease: 'none',
    scrollTrigger: {
      start: 0,
      end: 'max',
      scrub: true,
    },
  })

  function timelineJS() {
    gsap.to(entry_items, {
      xPercent: -117.1 * (entry_items.length - 1),
      ease: 'sine.inOut',
      scrollTrigger: {
        trigger: timeline,
        pin: true,
        scrub: 3,
        snap: 1 / (entry_items.length - 1),
        end: '+=' + timeline.offsetWidth,
      },
    })

    Draggable.create('.scroll-thumb', {
      type: 'x',
      bounds: '#scroll-bar',
      inertia: true,
      onPress() {
        scrollTween.scrollTrigger.disable(false)
      },
      onDrag() {
        let progress = gsap.utils.normalize(this.minX, this.maxX, this.x)
        let to = lenis.scrollTrigger.end * progress
        lenis.scrollTo(to, true)
      },
      onRelease() {
        let progress = gsap.utils.normalize(this.minX, this.maxX, this.x)
        scrollTween.scrollTrigger.enable()
        scrollTween.progress(progress)
      },
    })[0]
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