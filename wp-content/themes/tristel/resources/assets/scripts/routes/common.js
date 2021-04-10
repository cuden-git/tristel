import { LocationMap } from '../custom/location-map2';
import { Accordion } from '../custom/accordion';
import { TextExpander } from '../custom/text-expander';
import { Pagination } from '../custom/pagination';
import { ListSearch } from '../custom/list-search';
import { InputNumber } from '../custom/input-number';
import { JumpMenu } from '../custom/jump-menu';
import { CountryChoice } from '../custom/country-choice';
import { AddToBasket } from '../custom/add-to-basket';
import { Modal } from '../custom/modal';
import { Navigation } from '../custom/navigation';
import { ProductCatSidebar } from '../custom/product-cat-sidebar';
import { ProductGallery } from '../custom/product-gallery';
import { BackToTop } from '../custom/back-to-top';
import { CookieAlert } from '../custom/cookie-alert';

export default {
  init() {
    // JavaScript to be fired on all pages
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired

    [...document.querySelectorAll('.location-map__map')].forEach((item) => {
      let map = new LocationMap(item);
    });

    const accordions = new Accordion();

    const textExpander = new TextExpander('page-intro'); 

    const listSearch = new ListSearch({
      formSelector: '.resources__search',
      stage: 'resources-stage',
      listsSelector: '.resources__list.resources__list--files li',
      hideElesSelectors: ['.resources__pagination','.resources__list--files'],
      noResultsMsg: 'No results found',
      resultsListHook: 'resources__list-results',
    });

    const pagination = new Pagination({
      pageSelector: 'resources__list',
      paginationSelector: 'resources__pagination',
    });

    const nav = new Navigation({
      btnSelector: '.site-header .nav-btn',
      navBtnActiveClass: 'nav-btn--active',
      navSelector: '.main-nav',
      navOpenClass: 'main-nav--open',
      subMenuTrigger: '.menu-item-has-children i',
      topOffsetEleSelector: '.site-header--top',
      subMenuParentClass: '.menu-item-has-children',
      subMenuClass: '.main-nav__sub-menu',
      subMenuTriggerClass: 'main-nav__item--open',
      navListItemsClass: '.main-nav__items > li',
      bpTrigger: 768,
    });

    const inputNumber = new InputNumber();

    const jumpMenu = new JumpMenu();

    const countryChoice = new CountryChoice('[data-country-choice]');

    const addToBasket = new AddToBasket();

    const modal = new Modal();

    const sidebar = new ProductCatSidebar('.products-sidebar');

    const productGallery = new ProductGallery();

    const backToTop = new BackToTop();

    const gdprAlert = new CookieAlert();
  },
};
