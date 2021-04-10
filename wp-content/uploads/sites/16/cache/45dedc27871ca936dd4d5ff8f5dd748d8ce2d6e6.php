<div<?php echo (isset($id)? ' id='.$id : null ); ?> class="modal<?php echo (isset($classes)? ' '.implode( ' ', $classes ) : null); ?>">
  <div class="modal__content">
    <img src="<?= App\asset_path('images/tristel-logo-white.svg'); ?>" class="modal__logo" alt="<?php echo e(get_bloginfo('name', 'display')); ?>">
    <?php if(!isset($hide_close)): ?>
    <i class="fas fa-times modal__close"></i>
    <?php endif; ?>
    <?php echo e($slot); ?>

  </div>
</div>
