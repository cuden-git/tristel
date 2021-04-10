<div class="social">
  <h6>Follow</h6>
  <ul>
    <?php $__currentLoopData = $social_links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li><a href="<?php echo e($link['url']); ?>" title="<?php echo e($link['type']['label']); ?>"><i class="<?php echo e($link['type']['value']); ?>"></i></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </ul>
</div>
