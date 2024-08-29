export const isotope = async (err) => {
  if (err) {
    console.error(err);

    $('#character-group').isotope({
      getSortData: {
        name: '[data-name]',
        canon: '[data-canon-debut]',
        game: '[data-game-debut]',
      },
      sortBy: [ 'name' ],
    });
  }
};

import.meta.webpackHot?.accept(isotope); 