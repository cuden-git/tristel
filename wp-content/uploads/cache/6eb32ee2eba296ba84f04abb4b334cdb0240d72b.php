<?php $__env->startComponent('components.modal',['id' => 'cart-modal', 'classes' => ['cart-modal', 'modal--loading']]); ?>
  <h2 class="modal__content-title modal__content-title--left"><?php echo e(__('Cart contents', 'tristel')); ?></h2>
  <form>
    <ul class="cart-modal__list"></ul>
    <template>
      <li class="cart-modal__item">
        <i class="fas fa-times cart-modal__item-remove"></i>
        <a href="" class="cart-modal__item-product"></a>
        <span class="cart-modal__item-input">
          <i class="fas fa-chevron-left cart-modal__item-minus" data-input-number-up=""></i>
          <input type="number" min="1" class="cart-modal__item-qty" value="" required>
          <i class="fas fa-chevron-right cart-modal__item-plus" data-input-number-up=""></i>
        </span>
        <input type="hidden" name="cart_modal_product_id" value="">
        <input type="hidden" name="cart_modal_item_key" value="">
        <span class="cart-modal__item-price"></span>
      </li>
    </template>
    <a href="<?php echo wc_get_cart_url(); ?>" class="btn"><?php echo e(__('Checkout', 'tristel')); ?></a>
  </form>
<?php echo $__env->renderComponent(); ?>
