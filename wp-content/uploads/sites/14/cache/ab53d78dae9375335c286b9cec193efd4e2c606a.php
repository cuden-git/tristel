<?php echo $__env->make('modules.newsletter-signup', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<footer class="site-footer">
  <div class="site-footer__top">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-3">
          <a class="site-footer__brand" href="<?php echo e(home_url('/')); ?>" title="<?php echo e(get_bloginfo('name', 'display')); ?>"><img src="<?= App\asset_path('images/tristel-logo.svg'); ?>" alt="<?php echo e(get_bloginfo('name', 'display')); ?>"></a>
          <?php echo $__env->make('components.social', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <div class="site-footer__links col-12 col-md-9">
        <?php $__currentLoopData = $footer_links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $col): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div>
          <h6><?php echo e($col['links_column_title']); ?></h6>
            <ul>
            <?php $__currentLoopData = $col['links_column']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li><a href="<?php echo e($link['link']['url']); ?>" title="<?php echo e($link['link']['title']); ?>"><?php echo e($link['link']['title']); ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
      <div class="row">
        <div class="col-12 site-footer__logos">
        <?php $__currentLoopData = $footer_logos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $logo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($logo['img_link']): ?>
            <a href="<?php echo e($logo['img_link']['url']); ?>" title="<?php echo e($logo['img_link']['title']); ?>"><?php echo e($logo['img_link']['title']); ?>

          <?php endif; ?>
            <img src="<?php echo e($logo['img']['url']); ?>" alt="<?php echo e($logo['img']['alt']); ?>">
          <?php if($logo['img_link']): ?>
            </a>
          <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <span class="site-footer__to-top" data-back-to-top><?php echo __('Back to Top', 'tristel'); ?></span>
      </div>
    </div>
  </div>
  <div class="site-footer__bottom">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-6">
          <?php echo wp_nav_menu(['theme_location' => 'footer_navigation', 'menu_class' => 'site-footer__items', 'container' => false]); ?>

        </div>
        <div class="col-12 col-md-6">
          <ul>
          <?php $__currentLoopData = $footer_credits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $credit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <li><?php echo e($credit['credit']); ?></li> 
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</footer>
<?php echo $__env->make('components.gdpr-alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('partials.content-signup-modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
