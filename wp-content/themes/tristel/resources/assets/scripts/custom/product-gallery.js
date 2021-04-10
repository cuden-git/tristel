import Glide from '@glidejs/glide';

export class ProductGallery {
  constructor() {
    this.isLoaded = false;
    this.gallery = document.querySelector('.woocommerce-product-gallery__wrapper');

    if(this.gallery === null) {
      return;
    }

    this.modal = document.getElementById('product-img-carousel');
    this.headerEle = this.modal.querySelector('.modal__content-title');
    this.template = this.modal.querySelector('template');
    this.clone = this.template.content.cloneNode(true);
    this.sitePath = localizedData.siteURL;
    this.endpoint = '/wp-json/product-gallery/v1/product';
    this.productTitle;
    this.imgs;
    this.setEvents();
  }

  setEvents() {
    this.gallery.addEventListener('click', (e) => {
      e.preventDefault();

      if(this.isLoaded) {
        return;
      }

      this.modal.classList.add('modal--loading');
      let productId = this.gallery.getAttribute('data-product-id');
      this.fetchData(productId);
    });
  }

  fetchData(id) {
    window.fetch(this.sitePath + this.endpoint + '/' + id)
    .then((resp) => resp.json())
    .then((data) => {
        console.log('data = ', data);
       // this.imgs = [...data];
        this.productTitle = data['product_title']
        this.imgs = data['imgs'];
        this.createCarousel();
        this.isLoaded = true;
        this.modal.classList.remove('modal--loading');
    });
  }

  createCarousel() {
    let ulEle = document.createElement('ul');
    ulEle.classList.add('glide__slides');
    this.headerEle.innerHTML = this.productTitle;
    // this.imgs.forEach((item) => {
    //   let liEle = document.createElement('li');
    //   liEle.innerHTML = item;
    //   ulEle.appendChild(liEle);
    // });

    for(let i = 0; i < this.imgs.length; ++i) {
      let liEle = document.createElement('li');
      liEle.innerHTML = this.imgs[i];
      ulEle.appendChild(liEle);
    }

    let stage = this.clone.querySelector('.glide__track');
    stage.appendChild(ulEle);
    this.template.parentNode.appendChild(this.clone);
    this.applyGlide();
  }

  applyGlide() {
    let carousel = this.modal.querySelector('.glide');
    let glide = new Glide(carousel, {
      perView: 1,
      type: 'carousel',
      gap: 0,
      breakpoints: {
        767: {
          perView: 1,
          gap: 10,
          peek: {
            before: 40,
            after: 40,
          },
        },
      },
    }).mount();
  }
}
