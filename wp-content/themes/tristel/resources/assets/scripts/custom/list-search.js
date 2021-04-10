export class ListSearch {
  constructor(opts) {
    this.opts = opts;
    this.form = document.querySelector(this.opts.formSelector);

    if(this.form === null) {
      return false;
    }

    this.formInput = this.form.querySelector('[type=text]');
    this.searchTerm;
    this.listItems = [...document.querySelectorAll(this.opts.listsSelector)];
    this.stage = document.getElementById(this.opts.stage);
    this.resultsListEle;
    this.resultsItems = [];
    this.isReset = true;
    this.setEvents();
    
  }

  setEvents() {
    this.form.addEventListener('submit', (e) => {
      e.preventDefault();
      this.createResultsList();
      this.searchTerm = this.formInput.value.trim();
      this.findTerm();

      return false;
    });

    this.formInput.addEventListener('input', () => {
      if (this.formInput.value.trim() === '') {
        this.resetStage();
      }
    });
  }

  toggleLists(hide) {
    this.forEach((item) => {
      if (hide) {
        item.style.display = 'none';
      } else {
        item.style.display = '';
      }
    });
  }

  createResultsList() {
    if (this.resultsListEle === undefined) {
      this.resultsListEle = document.createElement('ul');
      this.resultsListEle.setAttribute('class',this.opts.resultsListHook);
    }else {
      this.resetResults();
    }
  }

  appendResults() {
    
    this.resultsItems.forEach((item) => {
      this.resultsListEle.appendChild(item);
    });
    this.toggleStageEles(true);
    this.stage.appendChild(this.resultsListEle);
  }

  findTerm() {
    this.listItems.forEach((item) => {
      let itemTitle = item.getAttribute('data-search-text').toLowerCase();
      if (itemTitle.indexOf(this.searchTerm) !== -1) {
        this.resultsItems.push(item.cloneNode(true));
      }
    });

    this.appendResults();
  }

  toggleStageEles(hide) {
    this.opts.hideElesSelectors.map((selector) => {
      let eles = [...document.querySelectorAll(selector)];

      eles.map((ele) => {
        if(hide) {
          ele.style.display = 'none';
        }else {
          ele.style.display = '';
        }
      });
    });
  }

  resetResults() {
    this.resultsItems.length = 0;

    while (this.resultsListEle.firstChild) {
      this.resultsListEle.removeChild(this.resultsListEle.lastChild);
    }
  }

  resetStage() {
    this.toggleStageEles(false);
    this.resetResults();
  }
}
