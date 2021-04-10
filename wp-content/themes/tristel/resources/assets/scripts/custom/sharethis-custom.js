export class SharethisCustom {
  constructor() {
    this.btnsWrap = document.querySelector('.sharethis-inline-share-buttons');

    if(!this.btnsWrap) {
      return;
    }

    this.stBtns = [...this.btnsWrap.querySelectorAll('.sharethis .st-btn')];
    this.stClean();
  }

  stClean() {
    this.btnsWrap.removeAttribute('id');

    this.stBtns.forEach((item) => {
      let stLabel = item.getAttribute('data-network');
      let labelEle = document.createElement('span');
      let defaultImg = item.querySelector('img');

      defaultImg.parentNode.removeChild(defaultImg);
      labelEle.innerHTML = stLabel;
      item.removeAttribute('style');
      let classHook = 'sharethis-' + stLabel;
      item.classList.add(classHook);
      item.appendChild(labelEle);
    });
  }
}
