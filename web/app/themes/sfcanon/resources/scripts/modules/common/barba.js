import barba from '@barba/core';
import Lenis from '@studio-freight/lenis';
import { bg } from './bg.js';
import { isotope } from './isotope.js';
import { lenisinit } from './lenis.js';
import { home } from '../pages/home.js';
import { timeline } from '../pages/timeline.js';
import gsap from 'gsap';

export const barbainit = async (err) => {
  if (err) {
    console.error(err);
  }

  // Set up lenis
  const lenis = new Lenis({
    duration: 1.2,
    easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
  });

  // Declare timeline variable for functions
  let tl = gsap.timeline();

  // Basic page transitions
  function fromCurrentPage() {
    tl.to('.page-transition', {
      pointerEvents: 'all',
    });

    tl.to('.page-transition .list-unstyled .left-block', {
      duration: 0.5,
      translateX: 0,
    });

    tl.to('.page-transition .list-unstyled .right-block', {
      duration: 0.5,
      translateX: 0,
    }, '<');

    tl.to('.page-transition', {
      backgroundColor: '#17171a',
    });
  }

  function toCurrentPage() {
    tl.to('.page-transition .list-unstyled', {
      duration: 0.5,
      rotate: 0,
      ease: 'sine.inOut',
    });

    tl.to('.page-transition', {
      backgroundColor: 'transparent',
    });

    tl.to('.page-transition .list-unstyled .left-block', {
      duration: 0.5,
      translateX: '-100%',
      delay: 2,
    });

    tl.to('.page-transition .list-unstyled .right-block', {
      duration: 0.5,
      translateX: '100%',
    }, '<');

    tl.to('.page-transition', {
      pointerEvents: 'none',
    });

    tl.to('.page-transition .list-unstyled', {
      duration: 0,
      rotate: 90,
    });
  }

  function fromCurrentContent() {
    // Home page content
    if ($('body').hasClass('home')) {
      tl.to('#content p', {
        duration: 0.25,
        translateY: -50,
        opacity: 0,
        delay: 0,
      });

      tl.to('#content h2 a', {
        duration: 0.25,
        translateY: -50,
        opacity: 0,
        stagger: 0.25,
        delay: 0,
      });
    }

    // All page header content
    if ($('body').is('.timeline, .characters, .about')) {
      tl.to('.page-header h1', {
        duration: 0.25,
        translateY: -50,
        opacity: 0,
        delay: 0,
      });

      tl.to('.page-header p', {
        duration: 0.25,
        translateY: -50,
        opacity: 0,
        delay: 0,
      });

      tl.to('.page-header .scroll-down-btn', {
        duration: 0.25,
        translateY: -50,
        opacity: 0,
        delay: 0,
      });
    }
  }

  function toCurrentContent() {
      // Home page content
    if ($('body').hasClass('home')) {
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

  // Header per page transitions
  function fromHome() {
    tl.to('#header .brand', {
      duration: 0.25,
      translateY: -50,
      opacity: 0,
      delay: 0,
    });
  }

  function toHome() {
    tl.to('#header .brand', {
      duration: 0.25,
      translateY: 0,
      opacity: 1,
      delay: 0,
    });
  }

  function fromOther() {
    tl.to('.nav-primary .menu-item', {
      duration: 0.25,
      translateY: -50,
      opacity: 0,
      stagger: 0.125,
      delay: 0.25,
    });
  }

  function toOther() {
    tl.to('.nav-primary .menu-item', {
      duration: 0.25,
      translateY: 0,
      opacity: 1,
      stagger: 0.125,
      delay: 0.25,
    });
  }

  function fromBio() {
    tl.to('.nav-secondary .menu-item', {
      duration: 0.25,
      translateY: -50,
      opacity: 0,
      delay: 0.25,
    });
  }

  function toBio() {
    tl.to('.nav-secondary .menu-item', {
      duration: 0.25,
      translateY: 0,
      opacity: 1,
      delay: 0.25,
    });
  }

  // Delay function for animations
  function delay(n) {
    n = n || 2000;
    return new Promise((done) => {
      setTimeout(() => {
        done();
      }, n);
    });
  }

  // Function to update menu item classes based on the current URL
  function updateMenuClasses(currentPath) {
    const menuItems = document.querySelectorAll('.menu-item a');
    menuItems.forEach(item => {
      const href = item.getAttribute('href');
      if (href === currentPath) {
        item.parentElement.classList.add('current-menu-item');
        item.parentElement.classList.add('current_page_item');
        item.parentElement.classList.add('active');
      } else {
        item.parentElement.classList.remove('current-menu-item');
        item.parentElement.classList.remove('current_page_item');
        item.parentElement.classList.remove('active');
      }
    });
  }

  // Initial update on page load
  updateMenuClasses(window.location.pathname);

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

  barba.hooks.beforeEnter(({next}) => {
    const matches = next.html.match(/<body.+?class="([^""]*)"/i);
    document.body.setAttribute('class', (matches && matches.at(1)) ?? '');
    //console.log(next.url.path);
    updateMenuClasses(next.url.href);
  });

  /** Initialize barbaJS scripts */
  barba.init({
    // Make sure the sync is true
    sync: true,

    // Turn on and off debug mode
    debug: true,

    // All transitions
    transitions: [{
      // Default transition
      name: 'default',
      async leave() {
        const done = this.async();
        lenis.stop();
        fromCurrentContent();
        await delay(250);
        done();
      },
      async after() {
        const done = this.async();
        await delay(250);
        toCurrentContent();
        lenis.start();
        done();
      },
    }, {
      // Home to other pages transition
      name: 'home-to-other',
      from: {
        namespace: [
          'home',
        ],
      },
      to: {
        namespace: [
          'timeline',
          'characters',
          'about',
        ],
      },
      async leave() {
        const done = this.async();
        lenis.stop();
        fromHome();
        fromCurrentContent();
        await delay(250);
        done();
      },
      async after() {
        const done = this.async();
        toHome();
        toOther();
        await delay(250);
        toCurrentContent();
        lenis.start();
        done();
      },
    }, {
      // Other pages to home transition
      name: 'other-to-home',
      from: {
        namespace: [
          'timeline',
          'characters',
          'about',
        ],
      },
      to: {
        namespace: [
          'home',
        ],
      },
      async before() {
        const done = this.async();
        lenis.stop();
        fromCurrentPage();
        await delay(1000);
        done();
      },
      async leave() {
        const done = this.async();
        fromCurrentContent();
        await delay(250);
        fromHome();
        fromOther();
        done();
      },
      async after() {
        const done = this.async();
        toCurrentPage();
        await delay(100);
        toHome();
        toCurrentContent();
        lenis.start();
        done();
      },
    }, {
      // Between other pages transition
      name: 'other-to-other',
      from: {
        namespace: [
          'timeline',
          'characters',
          'about',
        ],
      },
      to: {
        namespace: [
          'timeline',
          'characters',
          'about',
        ],
      },
      async before() {
        const done = this.async();
        lenis.stop();
        fromCurrentPage();
        await delay(1000);
        done();
      },
      async leave() {
        const done = this.async();
        await delay(250);
        fromCurrentContent();
        done();
      },
      async after() {
        const done = this.async();
        toCurrentPage();
        await delay(100);
        toCurrentContent();
        lenis.start();
        done();
      },
    }, {
      // Characters page to single character page transition
      name: 'characters-to-bio',
      from: {
        namespace: [
          'characters',
        ],
      },
      to: {
        namespace: [
          'bio',
        ],
      },
      async before() {
        const done = this.async();
        lenis.stop();
        fromCurrentPage();
        await delay(1000);
        done();
      },
      async leave() {
        const done = this.async();
        await delay(250);
        fromOther();
        fromCurrentContent();
        done();
      },
      async after() {
        const done = this.async();
        toCurrentPage();
        await delay(100);
        toHome();
        toBio();
        toCurrentContent();
        lenis.start();
        done();
      },
    }, {
      // Single character page to home or characters page transition
      name: 'bio-to-all-other',
      from: {
        namespace: [
          'bio',
        ],
      },
      to: {
        namespace: [
          'characters',
          'home',
        ],
      },
      async before() {
        const done = this.async();
        lenis.stop();
        fromCurrentPage();
        await delay(1000);
        done();
      },
      async leave() {
        const done = this.async();
        fromCurrentContent();
        await delay(250);
        fromBio();
        done();
      },
      async after() {
        const done = this.async();
        toCurrentPage();
        await delay(100);
        toHome();
        toOther();
        await delay(250);
        toCurrentContent();
        lenis.start();
        done();
      },
    }],
  });
};

import.meta.webpackHot?.accept(barbainit);