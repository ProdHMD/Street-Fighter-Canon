// Import external dependencies
import domReady from '@roots/sage/client/dom-ready';
import 'jquery';
import 'bootstrap';

// Import custom modules
import { lenisinit } from './modules/common/lenis.js';
import { bg } from './modules/common/bg.js';
//import { barbainit } from './modules/common/barba.js';

/**
 * Application entrypoint
 */
domReady(async () => {
  // Init bgJS
  bg();

  // Init lenisJS
  lenisinit();

  // Init barbaInitJS
  //barbainit();
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);
