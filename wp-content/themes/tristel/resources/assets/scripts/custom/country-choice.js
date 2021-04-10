export class CountryChoice {
  constructor(selector) {
    this.selector = selector;
    //this.opts = opts;
    // this.opts.chooserSelector
    // this.opts.
    this.countryOpts = [...document.querySelectorAll(selector)];
    this.links = [...document.querySelectorAll(selector + ' a')];
    this.setEvents();
  }

  setEvents() {
    this.links.forEach((item) => {
      item.addEventListener('click', (e) => {
        let date = new Date();
        let days = 30;
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        let expires = date.toUTCString();
        let cookieVal = item.getAttribute('data-country-path');
        let countryCode = item.getAttribute('data-country-code');
        let countryBlogId = item.getAttribute('data-country-blog-id');

        if(cookieVal && countryCode && countryBlogId) {
          document.cookie = 'countryPath=' + cookieVal + ';expires=' + expires + ';' + 'path=/;';
          document.cookie = 'countryCode=' + countryCode + ';expires=' + expires + ';' + 'path=/;';
          document.cookie = 'countryBlogId=' + countryBlogId + ';expires=' + expires + ';' + 'path=/;';
        }
      });
    });

    this.countryOpts.forEach((item) => {
      let timeout;
      let dropDown = item.querySelector('ul');
      
      item.addEventListener('click', (e) => {
        item.closest(this.selector).classList.toggle('open');
      });

      item.addEventListener('mouseleave', (e) => {
        clearTimeout(timeout);

        timeout = setTimeout(() => {
          item.closest(this.selector).classList.remove('open');
        }, 1000);
      });

      dropDown.addEventListener('mouseleave', (e) => {
        clearTimeout(timeout);

        timeout = setTimeout(() => {
          item.closest(this.selector).classList.remove('open');
        }, 1000);
      });
    });
  }
}
