<?php $__env->startComponent('components.modal',['id' => 'signup-modal']); ?>
  <h2 class="modal__content-title modal__content-title--left"><?php echo e($signup_modal['title']); ?></h2>
  <div class="signup-modal__intro"><?php echo e($signup_modal['intro']); ?></div>
  <div class="signup-modal__form"><?php echo do_shortcode($signup_modal['form_shortcode']); ?></div>
<?php echo $__env->renderComponent(); ?>
