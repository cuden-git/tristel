export class Navigation {
    constructor(opts) {
        this.opts = opts;
        this.navBtn = [...document.querySelectorAll(this.opts.btnSelector)];
        this.nav = document.querySelector(this.opts.navSelector);
        this.subMenuTriggers = [...this.nav.querySelectorAll(this.opts.subMenuTrigger)];
        this.navItems = [...document.querySelectorAll(this.opts.navListItemsClass)];
        this.docBody = document.getElementsByTagName('body')[0];
        this.offsetEle = document.querySelector(this.opts.topOffsetEleSelector);
        this.isMobile();
        this.setEvents();
        this.winResize();
    }

    setEvents() {

        this.navBtn.forEach((item, index) => {
            item.addEventListener('click', () => {
                this.docBody.classList.toggle('nav-open');
                this.nav.classList.toggle(this.opts.navOpenClass);
                item.classList.toggle(this.opts.navBtnActiveClass);
                this.navItemsActive();
                this.adjustNavTop();
            });
        });

        this.subMenu();
    }

    subMenu() {
        this.subMenuTriggers.forEach((item) => {
            let subMenuParent = item.closest(this.opts.subMenuParentClass);

            item.addEventListener('click', (e) => {
                if (!this.isMobile()) {
                    return;
                }

                let subMenu = subMenuParent.querySelector(this.opts.subMenuClass);
                //item.classList.toggle(this.opts.subMenuTriggerClass);
                
                subMenuParent.classList.toggle(this.opts.subMenuTriggerClass)
                this.navOpen != this.navOpen;

                if (subMenuParent.classList.contains(this.opts.subMenuTriggerClass)) {
                    subMenu.style.height = subMenu.scrollHeight + 'px';
                } else {
                    subMenu.style.height = '';
                }

            })

            // let childAnchor = subMenuParent.querySelector('a');
            // childAnchor.addEventListener('click', (ev) => {
            //     // ev.preventDefault();
            // })

        });
    }

    winResize() {
        //let timeout;
        let delay = 3000;
        let startTime = new Date();
        let timingFnc = (timestamp) => {
            var now = new Date();
            if (now - startTime < delay) {
                return
            }

            startTime = now;

            this.adjustNavTop();
        }


        window.addEventListener('resize', () => {

            window.requestAnimationFrame(timingFnc);
        });
    }

    navItemsActive() {
        let iteration = 0;
        let startTime = new Date();
        let delay = 100;

        let itemClass = () => {
            var now = new Date();
            if (now - startTime < delay) {
                return
            }

            startTime = now;
            this.navItems[iteration].classList.toggle('item-active');
            ++iteration;
        }

        let timingFnc = (timestamp) => {
            if (iteration < this.navItems.length) {
                itemClass();
                window.requestAnimationFrame(timingFnc);
            }
        }

        window.requestAnimationFrame(timingFnc);
    }

    isMobile() {
        return (window.innerWidth < this.opts.bpTrigger) ? true : false;
    }

    adjustNavTop() {
        if (this.isMobile()) {
            let eleHeight = this.offsetEle.offsetHeight;
            let eleBounding = this.offsetEle.getBoundingClientRect();

            if(Math.abs(parseInt(eleBounding.top)) < eleHeight) {
                this.nav.style.top = Math.abs((eleHeight + parseInt(eleBounding.top))) + 'px';
                this.nav.style.height = (window.innerHeight - eleHeight) + 'px';
            }else {
                this.nav.style.top = null;
                this.nav.style.height = null;
            }
        } else {
            this.nav.style.height = null;
            console.log('adjustNavTop not mobile');
        }
    }
}
