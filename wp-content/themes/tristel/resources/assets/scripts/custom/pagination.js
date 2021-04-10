export class Pagination {
  constructor(opts) {
    this.opts = opts;
    this.pagination = document.querySelector('[data-pagination]');

    if(this.pagination === null) {
      return false;
    }

    this.paginationItems = this.pagination.querySelectorAll('[data-pagination-page]');
    this.prev = this.pagination.querySelector('[data-pagination-prev]');
    this.next = this.pagination.querySelector('[data-pagination-next]');
    this.currentPage = 0;
    this.pageCollection = [...document.querySelectorAll('[data-pages]')];
    this.pageChangeEV = new CustomEvent('pageChanged');
    this.setEvents();
  }

  setEvents() {
    this.paginationItems.forEach((item) => {
      item.addEventListener('click', (e) => {
        this.currentPage = parseInt(item.getAttribute('data-pagination-page'));
        this.showPage(this.currentPage);
        this.showIndex(item);
       this.pageChangeEv();
      });
    });

    this.prev.addEventListener('click', (e) => {
      if(this.currentPage > 0) {
        this.currentPage -= 1;
      }

      this.showPage(this.currentPage);
      this.showIndex(this.currentPage);
      this.pageChangeEv();
    });

    this.next.addEventListener('click', (e) => {
      if(this.currentPage < this.pageCollection.length) {
        this.currentPage += 1;
      }

      this.showPage(this.currentPage);
      this.showIndex(this.currentPage);
      this.pageChangeEv();
    });

    this.prev.addEventListener('pageChanged', (e) => {
      if(this.currentPage <= 0) {
        this.prev.style.display = 'none';
      }else {
        this.prev.style.display = 'flex';
      }
    });
  
    this.next.addEventListener('pageChanged', (e) => {
      if(this.currentPage === this.pageCollection.length - 1) {
        this.next.style.display = 'none';
      }else {
        this.next.style.display = 'flex';
      }
    });
  }

  showPage(pageIndex) {
    this.pageCollection.forEach((page, index) => {
      if(pageIndex === index) {
        page.classList.add(this.opts.pageSelector + '--active');
      }else {
        page.classList.remove(this.opts.pageSelector + '--active');
      }
    });
  }

  showIndex(activeIndex) {
    this.paginationItems.forEach((item, index) => {
      if(item === activeIndex || index === activeIndex ) {
        item.classList.add(this.opts.paginationSelector + '-active');
      }else {
        item.classList.remove(this.opts.paginationSelector + '-active');
      }
    });
  }

  pageChangeEv() {
    this.prev.dispatchEvent(this.pageChangeEV);
    this.next.dispatchEvent(this.pageChangeEV);
  }
}
