<div id="<?php echo e($id); ?>" class="modal<?php echo (isset($classes)? implode( ' ', $classes ) : null); ?>">
  <div class="modal__content">
    <i class="fas fa-times modal__close"></i>
    <?php echo e($slot); ?>

  </div>
</div>
