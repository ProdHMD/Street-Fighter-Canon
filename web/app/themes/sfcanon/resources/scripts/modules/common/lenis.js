import Lenis from '@studio-freight/lenis';
//import { ResizeObserver } from '@juggle/resize-observer';
//import gsap from 'gsap';

export const lenisinit = async (err) => {
  if (err) {
    console.error(err);
  }

  const lenis = new Lenis()

  lenis.on('scroll', (e) => {
    console.log(e)
  })
  
  function raf(time) {
    lenis.raf(time)
    requestAnimationFrame(raf)
  }
  
  requestAnimationFrame(raf)

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