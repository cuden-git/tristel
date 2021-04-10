<section class="grid-panels">
  <div class="container">
    <div class="row">
      <?php $__currentLoopData = $grid_panels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $panel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-12 col-md-4 grid-panels__cell">
          <a href="<?php echo $panel['link']['url']; ?>" title="<?php echo e($panel['link']['title']); ?>">
            <div class="grid-panels__cell-img">
              <div>
                <?php echo wp_get_attachment_image( $panel['image']['ID'], 'full' ); ?>

              </div>
            </div>
            <h6 class="grid-panels__cell-title"><?php echo e($panel['link']['title']); ?></h6>
          </a>
        </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
</section>
