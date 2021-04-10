export class ProductCatSidebar {
  constructor(selector) {
    this.selector = selector;
    this.sidebar = document.querySelector(this.selector);

    if(this.sidebar === null) {
      return;
    }

    this.selectEle;
    this.sidebarOpts;
    this.sidebarOpts = [...this.sidebar.querySelectorAll('[data-cat-link]')];
    this.createSelect();
    this.setEvents();
  }

  createSelect() {
    this.selectEle = document.createElement('select');

    this.sidebarOpts.forEach((item) => {
      let option = document.createElement('option');
      option.value = item.getAttribute('data-cat-link');
      option.text = item.innerHTML;

      if(item.getAttribute('data-active') !== null) {
        option.setAttribute('selected','selected');
      }

      this.selectEle.appendChild(option);
    });

    let className = this.selector.replace('.','') + '__mobile';
    this.selectEle.classList.add(className);
    this.sidebar.appendChild(this.selectEle);
  }

  setEvents() {
    this.selectEle.addEventListener('change', () => {
      let url = this.selectEle.options[this.selectEle.selectedIndex].value;
      window.location.href = url;
    });
  }
}