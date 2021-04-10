<?php $__env->startComponent('components.modal',['id' => 'cart-modal', 'classes' => ['cart-modal', 'modal--loading']]); ?>
  <h2 class="modal__content-title modal__content-title--left"><?php echo e(__('Cart contents', 'tristel')); ?></h2>
  <form>
    <ul class="cart-modal__list"></ul>
    <template>
      <li class="cart-modal__item">
        <i class="fas fa-times cart-modal__item-remove"></i>
        <input type="number" min="1" class="cart-modal__item-qty" value="">
        <input type="hidden" name="cart_modal_product_id" value="">
        <input type="hidden" name="cart_modal_item_key" value="">
        <a href="" class="cart-modal__item-product"></a>
        <p class="cart-modal__item-price"></p>
      </li>
    </template>
    <button type="button" name="update_cart" class="btn btn--kl cart-modal__btn">Update cart</button>
    <a href="" class="btn">Proceed to checkout</a>
  </form>
<?php echo $__env->renderComponent(); ?>
