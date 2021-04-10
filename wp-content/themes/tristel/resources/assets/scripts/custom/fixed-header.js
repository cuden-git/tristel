export class FixedHeader {
  constructor(opts) {
    this.opts = opts;
    this.fixedEle = document.querySelector(this.opts.fixedEleSelector);
    this.iObserver;
    this.setTopTrigger();
  }

  setTopTrigger() {
    let iOOptions = {
      root: null,
      rootMargin: '0px 0px -' + (window.innerHeight).toString() + 'px 0px',
    }

    this.iObserver = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          this.fixedEle.classList.add(this.opts.fixedClass);
          console.log('is intersecting', entry.boundingClientRect.top);
        } else {
          this.fixedEle.classList.remove(this.opts.fixedClass);
          console.log('not intersecting', entry);
        }
      });
    }, iOOptions);

    this.iObserver.observe(this.fixedEle);

    let iOOptions2 = {
      root: null,
      rootMargin: '0px 0px -' + (window.innerHeight).toString() + 'px 0px',
    }

    let iObserver2 = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          this.fixedEle.classList.remove(this.opts.fixedClass);
        } else {
          // this.fixedEle.classList.remove(this.opts.fixedClass);
          // console.log('not intersecting',entry);
        }
      });
    }, iOOptions2);

    iObserver2.observe(document.querySelector('.site-header--top'));
  }
}
