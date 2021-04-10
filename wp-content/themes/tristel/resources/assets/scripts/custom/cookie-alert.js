export class CookieAlert {
  constructor() {
    this.alerts = [...document.querySelectorAll('.gdpr-alert')];
    this.setEvents();
    this.alertClosed = false;
  }

  setEvents() {
    this.alerts.forEach((item) => {
      let closeBtn = item.querySelector('.gdpr-alert__close');

      if(closeBtn === null) {
        return;
      }

      closeBtn.addEventListener('click', () => {
        item.classList.remove('gdpr-alert--active');
        this.alertClosed = true;
        this.setCookie();
      })

      item.addEventListener('transitionend', () => {
        if(this.alertClosed) {
          item.parentNode.removeChild(item);
        }
      });
    });
  }

  setCookie() {
    let date = new Date();
    let days = 30;
    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
    let expires = date.toUTCString();
    document.cookie = 'acceptGDPR=' + true + ';expires=' + expires + ';' + 'path=/;';
  }
}