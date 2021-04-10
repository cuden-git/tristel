<section class="newsletter-signup">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-6 newsletter-signup__label">
        <h2 class="newsletter-signup__title"><?php echo e($signup_cta['newsletter_cta_title']); ?></h2>
        <?php if($signup_cta['newsletter_tick_list']): ?>
        <ul class="newsletter-signup__list">
          <?php $__currentLoopData = $signup_cta['newsletter_tick_list']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li><i class="fas fa-check"></i><?php echo e($list_item['list_item']); ?></li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <?php endif; ?>
      </div>
      <div class="col-12 col-md-6">
        <span class="btn" data-modal-target="#signup-modal"><?php echo e($signup_cta['newsletter_button_label']); ?></span>
      </div>
    </div>
  </div>
</section>
