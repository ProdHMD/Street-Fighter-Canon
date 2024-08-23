import barba from '@barba/core';
//import gsap from 'gsap';

export const barbainit = async (err) => {
  if (err) {
    console.error(err);
  }

  barba.init({
    //
  });
};

import.meta.webpackHot?.accept(barbainit);