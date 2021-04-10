<?php if($gdpr_content != null): ?>
<div class="gdpr-alert gdpr-alert--active">
  <div class="container">
    <div class="gdpr-alert__content">
      <?php echo e($gdpr_content); ?>

    </div>
    <i class="gdpr-alert__close fas fa-times"></i>
  </div>
</div>
<?php endif; ?>
