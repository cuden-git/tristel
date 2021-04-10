// import external dependencies
import 'jquery';

// Import everything from autoload
import './autoload/**/*'

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import aboutUs from './routes/about';
import Glide from '@glidejs/glide';
import { FixedHeader } from './custom/fixed-header';
import { SharethisCustom } from './custom/sharethis-custom';

/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // Home page
  home,
  // About Us page, note the change from about-us to aboutUs.
  aboutUs,
});

// Load Events

window.addEventListener('DOMContentLoaded', () => {

  /* sliders */
  const sliders = [...document.querySelectorAll('.glide')];

  sliders.forEach(item => {
    let dataVal = item.getAttribute('data-perview');
    let perView = ( dataVal !== null )? parseInt(dataVal) : 1 ;
    let peekVal = ( perView === 1 )? 0 : 40 ;

    new Glide(item, {
      perView: perView,
      type: 'carousel',
      gap: 0,
      breakpoints: {
        767: {
          perView: 1,
          gap: 10,
          peek: {
            before: peekVal,
            after: peekVal,
          },
        },
      },
    }).mount()
  })

  document.body.classList.add('dom-loaded');
  routes.loadEvents();
});

window.addEventListener('load', () => {
  const sharethisCustom = new SharethisCustom();

  /* Fixed header */
  const fixedHeader = new FixedHeader({
    fixedEleSelector: '.site-header--bottom',
    fixedClass: 'site-header--bottom--fixed',
  })
});
