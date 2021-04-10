export class BackToTop {
  constructor() {
    this.triggers = [...document.querySelectorAll('[data-back-to-top]')];
    this.setEvents();
  }

  setEvents() {
    this.triggers.forEach((item) => {
      item.addEventListener('click', () => {
        window.scrollTo({
          top: 0,
          behavior: 'smooth',
        });
      })
    });
  }
}
