import barba from '@barba/core';
import { bg } from './bg.js';
import { isotope } from './isotope.js';
import { lenisinit } from './lenis.js';
import { home } from '../pages/home.js';
import { timeline } from '../pages/timeline.js';
//import gsap from 'gsap';

export const barbainit = async (err) => {
  if (err) {
    console.error(err);
  }

  // All hooks
  barba.hooks.after(() => {
    // Start at top of page
    window.scrollTo(0, 0);
    
    // Init bgJS
    if (!document.body.classList.contains('single-character')) {
      bg();
    }
    
    // Init lenisJS
    if (!document.body.classList.contains('timeline')) {
      lenisinit();
    }

    // Init timelineJS
    if (document.body.classList.contains('timeline')) {
      timeline();
    }

    // Init homeJS
    if (document.body.classList.contains('home')) {
      home();
    }

    // Init isotopeJS
    if (document.body.classList.contains('characters')) {
      isotope();
    }
  });

  /** Initialize barbaJS scripts */
  barba.init({
    // Make sure the sync is true
    sync: false,

    // Turn on and off debug mode
    debug: false,

    // All transitions
    transitions: [{
      name: 'default',
      enter() {},
      beforeEnter: ({ next }) => {
        const matches = next.html.match(/<body.+?class="([^""]*)"/i);
        document.body.setAttribute('class', (matches && matches.at(1)) ?? '');
      },
    }],

    // All views
    views: [{
      namespace: 'home',
      afterEnter() {},
    }, {
      namespace: 'timeline',
      afterEnter() {},
    }, {
      namespace: 'characters',
      afterEnter() {},
    }, {
      namespace: 'about',
      afterEnter() {},
    }, {
      namespace: 'bio',
      afterEnter() {},
    }],
  });
};

import.meta.webpackHot?.accept(barbainit);