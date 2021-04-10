export class TextExpander {
  constructor(rootSelector) {

    if(!document.querySelectorAll('[data-content-expand]')) {
      return;
    }
  
    this.containers = [...document.querySelectorAll('[data-content-expand]')];
    this.rootSelector = rootSelector;
    this.setEvent();
  }

  setEvent() {
    this.containers.forEach((item) => {
      let excerptEle = item.querySelector('[data-content-expand-excerpt]');
      let fullTextEle = item.querySelector('[data-content-expand-full]');
      let triggers = [...item.querySelectorAll('[data-content-expand-trigger]')];

      triggers.forEach((trigger) => {
        trigger.addEventListener('click', () => {
          item.classList.toggle(this.rootSelector + '--active');
        });
      });
    });
  }
}
