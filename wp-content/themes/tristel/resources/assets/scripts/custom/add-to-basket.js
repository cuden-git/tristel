export class AddToBasket {
  constructor() {
    this.modal = document.getElementById('cart-modal');

    if (this.modal === null) {
      return;
    }

    this.contentArea = this.modal.querySelector('.modal__content');
    this.btns = [...document.querySelectorAll('.single_add_to_cart_button')];
    this.endPoint = wc_add_to_cart_params.ajax_url;
    this.form;
    this.id;
    this.qty;
    this.productId;
    this.variationId;
    this.setEvents();
    this.template = this.modal.querySelector('template');
    this.templateContent = this.template.content.cloneNode(true);
    this.itemsList = this.modal.querySelector('.cart-modal__list');
    this.clone;
    this.cartData;
    this.timingFnc;
    this.preventChange = false;
    this.endpoint = {
      URL: localizedData.siteURL + '/wp-json/manage-cart/v1',
      add: '/add-to-cart',
      update: '/update-cart',
    }
  }

  setEvents() {
    this.btns.forEach((item) => {
      item.addEventListener('click', (e) => {
        e.preventDefault();
        this.form = item.closest('.cart');
        this.modal.classList.add('modal--loading');
        this.qty = this.form.querySelector('[name="quantity"]').value || 1;
        this.id = item.value;
        this.productId = (this.form.querySelector('[name="product_id"]')) ? this.form.querySelector('[name="product_id"]').value : this.id;
        this.variationId = (this.form.querySelector('[name="variation_id"]')) ? this.form.querySelector('[name="variation_id"]').value : 0;
        item.classList.add('loading');
        this.singleProduct();
      })
    });

    // this.updateCartBtn.addEventListener('click', (e) => {

    //   //$("[name='update_cart']").trigger("click");
    //   this.multiProducts();
    // });
  }

  /*updateCart(productData, action) {
    
    window.fetch(localizedData.siteURL + '/wp-admin/admin-ajax.php', {
      method: 'POST',
      body: new URLSearchParams({
        'action': action,
        'product_data': [{ 'index 1': 'val 1' }, { 'index 1': 'val 2' }, { 'index 1': 'val 3' }],
      }),
    }).then((response) => {
      return response.json();
    }).then((data) => {
      this.cartData = data;
      let refreshFragments = new CustomEvent('wc_fragment_refresh');
      document.body.dispatchEvent(refreshFragments);
      this.modal.classList.remove('modal--loading');
      console.log('cart data', this.cartData);
      for (const property in this.cartData) {
        console.log(`${property}: ${this.cartData[property]}`);
      }
      this.buildCart();
    });
  }*/

  getEndpoint(action) {
    let endpoint = this.endpoint.URL;
    endpoint += (action === 'add') ? this.endpoint.add : this.endpoint.update;

    return endpoint;
  }

  buildCart() {
    this.clearCartData()

    this.cartData.forEach((item) => {
      this.clone = this.template.content.cloneNode(true);
      let itemWrap = this.clone.querySelector('.cart-modal__item');
      let removeBtn = this.clone.querySelector('.cart-modal__item-remove');
      let itemProduct = this.clone.querySelector('.cart-modal__item-product');
      let itemQty = this.clone.querySelector('.cart-modal__item-qty');
      let itemPrice = this.clone.querySelector('.cart-modal__item-price');
      let productIdInput = this.clone.querySelector('[name=cart_modal_product_id');
      let itemKeyInput = this.clone.querySelector('[name=cart_modal_item_key]');
      let itemPlus = this.clone.querySelector('.cart-modal__item-plus');
      let itemMinus = this.clone.querySelector('.cart-modal__item-minus');

      itemProduct.setAttribute('href', item.link);
      itemProduct.innerHTML = item.name;
      itemQty.value = item.quantity;
      itemPrice.innerHTML = item.subtotal;
      productIdInput.value = item.product_id;
      itemKeyInput.value = item.item_key;
      // itemWrap.appendChild(removeBtn);
      // itemWrap.appendChild(itemProduct);
      // itemWrap.appendChild(itemQty);
      // itemWrap.appendChild(itemPrice);
      this.itemsList.appendChild(this.clone);

      itemMinus.addEventListener('click', (e) => {
        itemQty.stepDown(1);

        let data = [{
          'item_key': itemKeyInput.value,
          'item_qty': itemQty.value,
        }];
        // data.item_qty = itemQty.value;

        this.updateChange(data);
      });

      itemPlus.addEventListener('click', (e) => {
        itemQty.stepUp(1);

        let data = [{
          'item_key': itemKeyInput.value,
          'item_qty': itemQty.value,
        }];
        // itemQty.value;
        this.updateChange(data);
      });

      itemQty.addEventListener('change', () => {
        if (this.preventChange) {
          return;
        }

        let data = [{
          'item_key': itemKeyInput.value,
          'item_qty': itemQty.value,
        }];

        this.updateChange(data);
      });

      itemQty.addEventListener('input', () => {
        if (!itemQty.checkValidity()) {
          return;
        }
      
        let data = [{
          'item_key': itemKeyInput.value,
          'item_qty': itemQty.value,
        }];
      
        this.updateChange(data);
      });

      removeBtn.addEventListener('click', () => {
        let data = [{
          'item_key': itemKeyInput.value,
          'item_qty': 0,
        }];

        this.contentArea.classList.add('cart-modal__updating');
        this.updateCart(data, 'update');
      });
    });
  }

  singleProduct() {
    let products = [];
    products.push({
      'id': (this.form.querySelector('[name="product_id"]')) ? this.form.querySelector('[name="product_id"]').value : this.id,
      'sku': '',
      'qty': this.form.querySelector('[name="quantity"]').value || 1,
      'variation_id': (this.form.querySelector('[name="variation_id"]')) ? this.form.querySelector('[name="variation_id"]').value : 0,
    });

    this.updateCart(products, 'add');

    return products;
  }

  multiProducts() {
    let cartItems = [...this.modal.querySelectorAll('.cart-modal__item')];
    let products = [];

    cartItems.forEach((item, index) => {

      products.push({
        'id': item.querySelector('[name="cart_modal_product_id"]').value,
        'sku': '',
        'qty': item.querySelector('.cart-modal__item-qty').value,
        'variation_id': 0,
        'item_key': item.querySelector('[name=cart_modal_item_key').value,
      });
    });

    this.updateCart(products, 'update');
  }

  updateCart(productData, action) {
    window.fetch(this.getEndpoint(action), {
      method: 'POST',
      body: JSON.stringify({
        'data': productData,
      }),
      // headers: {
      //   'Content-Type': 'application/json',
      //   'X-WC-Store-API-Nonce': localizedData.storeNonce,
      // },
    }).then((response) => {
      return response.json();
    }).then((data) => {
      this.cartData = data;
      let refreshFragments = new CustomEvent('wc_fragment_refresh');
      document.body.dispatchEvent(refreshFragments);
      this.modal.classList.remove('modal--loading');
      console.log('testFnc', data);
      this.contentArea.classList.remove('cart-modal__updating');
      this.preventChange = false;
      this.buildCart();
    });
  }

  clearCartData() {
    // let range = document.createRange();
    // range.selectNodeContents(this.itemsList);
    // range.deleteContents();
    while (this.itemsList.firstChild) {
      this.itemsList.firstChild.remove();
    }
  }

  updateChange(data) {
    if (this.timingFnc !== undefined) {
      clearTimeout(this.timingFnc);
    }
    console.log('data = ', data);
    this.timingFnc = setTimeout(() => {
      this.contentArea.classList.add('cart-modal__updating');
      this.updateCart(data, 'update');
    }, 1000);
  }
}
