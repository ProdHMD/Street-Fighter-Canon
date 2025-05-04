import Isotope from 'isotope-layout';

export const characters = async (err) => {
  if (err) {
    console.error(err);
  }

  /** Sort orders */
  const canonOrder = [
    "Saturday Night Slam Masters",
    "Slam Masters II",
    "Street Fighter",
    "Final Fight",
    "Street Fighter Alpha 2",
    "Final Fight 2",
    "Street Fighter Alpha 3",
    "Final Fight 3",
    "Street Fighter II",
    "Street Fighter IV",
    "Super Street Fighter IV",
    "Street Fighter V",
    "Street Fighter III: 2nd Impact",
    "Street Fighter III: 3rd Strike",
    "Street Fighter 6",
    "Captain Commando",
  ];

  const gameOrder = [
    "Street Fighter",
    "Final Fight",
    "Street Fighter II",
    "Captain Commando",
    "Super Street Fighter II",
    "Final Fight 2",
    "Saturday Night Slam Masters",
    "Final Fight 3",
    "Slam Masters II",
    "Street Fighter Alpha",
    "Street Fighter Alpha 2",
    "Street Fighter III",
    "Street Fighter III: 2nd Impact",
    "Street Fighter Alpha 3",
    "Street Fighter III: 3rd Strike",
    "Street Fighter IV",
    "Super Street Fighter IV",
    "Street Fighter V",
    "Street Fighter 6",
  ];

  /** Enhance all .chara elements with sort data and clip-paths */
  document.querySelectorAll('.chara').forEach(chara => {
    const canon = chara.dataset.canonDebut;
    const game = chara.dataset.gameDebut;

    const canonIndex = canonOrder.indexOf(canon);
    const gameIndex = gameOrder.indexOf(game);

    chara.dataset.sortCanon = canonIndex > -1 ? canonIndex : 999;
    chara.dataset.sortGame = gameIndex > -1 ? gameIndex : 999;

    const path = chara.querySelector('svg path');
    if (!path) return;

    const pathLength = Math.floor(path.getTotalLength());
    const steps = 10;
    const scaled = Math.floor(pathLength / steps);
    const bbox = path.getBBox();

    const points = Array.from({ length: scaled }, (_, i) => {
      const point = path.getPointAtLength(i * steps);
      const x = ((point.x - bbox.x) / bbox.width * 100).toFixed(2);
      const y = ((point.y - bbox.y) / bbox.height * 100).toFixed(2);
      return `${x}% ${y}%`;
    }).join(', ');

    chara.style.clipPath = `polygon(${points})`;
  });

  /** Initialize Isotope AFTER .chara elements are processed */
  const grid = document.querySelector('#character-group');
  const iso = new Isotope(grid, {
    itemSelector: '.chara',
    layoutMode: 'fitRows',
    getSortData: {
      name: '[data-name]',
      canon: '[data-sort-canon] parseInt',
      game: '[data-sort-game] parseInt',
    },
    sortBy: 'name',
  });

  iso.layout();

  /** Sort button handling */
  document.querySelectorAll('[data-sort-by]').forEach(button => {
    button.addEventListener('click', (e) => {
      const sortBy = e.currentTarget.dataset.sortBy;
      //console.log('Sorting by:', sortBy);
      iso.arrange({ sortBy });
    });
  });
};

import.meta.webpackHot?.accept(characters);