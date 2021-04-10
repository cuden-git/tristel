export class Modal {
  constructor() {
    this.triggers = [...document.querySelectorAll('[data-modal-target]')];
    this.setEvents();
    this.docBody = document.getElementsByTagName('body')[0];
  }

  setEvents() {
    this.triggers.forEach((item) => {
      let targetModal = document.querySelector(item.getAttribute('data-modal-target'));

      if (targetModal !== null) {
        let modalClose = targetModal.querySelector('.modal__close');

        modalClose.addEventListener('click', () => {
          targetModal.classList.remove('modal--active');
          this.docBody.style.overflow = null;
        });

      } else {
        return;
      }
     // item.style.border = '1px solid red';

      item.addEventListener('click', (e) => {
        e.preventDefault();
        let modalContent = targetModal.querySelector('.modal__content');
        targetModal.classList.add('modal--active');
        this.docBody.style.overflow = 'hidden';
      });
    });
  }
}
