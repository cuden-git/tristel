<div class="container">
  <div class="row resources">
    <div class="col-12 col-md-8 page-maincol">
      <?php echo $__env->make('partials.page-header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <?php echo get_the_content(); ?>

      <?php if($resource_cats): ?>
        <ul class="resources__list">
          <?php $__currentLoopData = $resource_cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
              <a href="<?php echo get_permalink($post->ID); ?>" title="<?php echo e($post->post_title); ?>"><?php echo e($post->post_title); ?><i class="fas fa-chevron-right"></i></a>
            </li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      <?php endif; ?>
    </div>
    <div class="col-12 col-md-4 page-sidebar">
    <?php if($sidebar_ad): ?>
      <?php echo $__env->make('partials.content-sidebar-ad', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>
    </div>
  </div>
</div>