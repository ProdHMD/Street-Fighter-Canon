// Import external dependencies
import domReady from '@roots/sage/client/dom-ready';
import 'jquery';
import 'bootstrap';

// Import custom modules
import { lenisinit } from './modules/common/lenis.js';
import { isotope } from './modules/common/isotope.js';
import { bg } from './modules/common/bg.js';
import { home } from './modules/pages/home.js';
import { timeline } from './modules/pages/timeline.js';
import { barbainit } from './modules/common/barba.js';
import { pageLoader } from './modules/common/pageLoader.js';

/**
 * Application entrypoint
 */
domReady(async () => {
  // Init bgJS
  if (!document.body.classList.contains('single-character')) {
    bg();
  }

  // Init lenisJS
  if (!document.body.classList.contains('timeline')) {
    lenisinit();
  }

  // Init homeJS
  if (document.body.classList.contains('home')) {
    home();
  }

  // Init timelineJS
  if (document.body.classList.contains('timeline')) {
    timeline();
  }

  // Init isotopeJS
  if (document.body.classList.contains('characters')) {
    isotope();
  }

  // Init barbaInitJS
  barbainit();
});

window.addEventListener('load', () => {
  // Init pageLoaderJS
  pageLoader();
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);
