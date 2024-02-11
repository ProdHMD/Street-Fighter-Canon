import { Lenis } from '@studio-freight/lenis';
import { ResizeObserver } from '@juggle/resize-observer';
import gsap from 'gsap';

export const lenisinit = async (err) => {
  if (err) {
    console.error(err);
  }


};

import.meta.webpackHot?.accept(lenisinit);