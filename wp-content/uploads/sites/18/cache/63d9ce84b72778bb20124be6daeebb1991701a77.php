<section class="page-section team-grid">
  <div class="container">
    <div class="row">
  <?php $__currentLoopData = $team_grid; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="col-12 col-md-3 team-grid__cell">
        <a href=<?php echo e($member['link']); ?> class="team-grid__cell-inner">
          <div class="team-grid__img">
            <div>
            <?php echo get_the_post_thumbnail($member['id'], 'full'); ?>

            </div>
          </div>
          <h5 class="team-grid__title"><?php echo e($member['title']); ?></h5>
          <h6 class="team-grid__position"><?php echo e($member['position']); ?></h6>
        </a>
      </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
</section>
