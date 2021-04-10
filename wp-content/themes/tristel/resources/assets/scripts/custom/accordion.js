export class Accordion {
  constructor() {
    this.accordion = [...document.querySelectorAll('.accordion')];
    this.init();
  }

  init() {
    this.accordion.forEach((accordionItem) => {
      let groups = [...accordionItem.querySelectorAll('.accordion__group')];

      groups.forEach((group) => {
        this.setTriggers(group,groups);
      });
    });
  }

  setTriggers(group,groups) {
    let trigger = group.querySelector('.accordion__group-trigger');

    trigger.addEventListener('click', () => {
      this.toggleClasses(group,groups);
    });
  }

  toggleClasses(activeGroup, siblingGroups) {
    let content = activeGroup.querySelector('.accordion__group-content');

    siblingGroups.forEach((item) => {
      if(item !== activeGroup) {
        item.classList.remove('accordion__group--open');
        content.style.height = '';
      }else {
        activeGroup.classList.add('accordion__group--open');
        content.style.height = content.scrollHeight + 'px';
      }
    });
  }
}
