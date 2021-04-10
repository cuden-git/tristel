export class InputNumber {
  constructor() {
    this.inputs = [...document.querySelectorAll('[data-input-number]')];

    if (this.inputs.length > 0) {
      this.setEvents();
    }
  }

  setEvents() {
    this.inputs.forEach((item) => {

      let input = item.querySelector('input[type="number"]');

      let controlUp = item.querySelector('[data-input-number-up]');

      let controlDown = item.querySelector('[data-input-number-down]');

      if (controlDown && controlUp) {

        controlUp.addEventListener('click', () => {
          input.stepUp();
        });

        controlDown.addEventListener('click', () => {
          input.stepDown();
        });
      }
    });
  }
}
