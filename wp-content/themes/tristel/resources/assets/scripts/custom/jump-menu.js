export class JumpMenu {
  constructor() {
    this.menus = [...document.querySelectorAll('[data-jump-menu]')];
    this.setEvents();

  }

  setEvents() {
    this.menus.forEach((item) => {
      item.addEventListener('change', () => {
        let paramKey = item.getAttribute('data-jump-menu');
        let paramVal = item.options[item.selectedIndex].value;
        let urlQueryString = window.location.search;
        
        ////let menuParam = paramKey + '=' + paramVal;
       // menuParam += (urlQueryString === '')? '?' + (menuParam) : '&' + menuParam;
      //  menuParam = '?' + (menuParam);

       // window.location.href = window.location.href + menuParam
        let queryParams = new URLSearchParams(window.location.search);
        queryParams.set(paramKey, paramVal);
        history.replaceState(null, null, '?' + queryParams.toString());
      //  alert(window.location.href);
        //window.location.href = window.location.href + '?' + queryParams.toString();
        window.location.reload();
      });
    });
  }
}
