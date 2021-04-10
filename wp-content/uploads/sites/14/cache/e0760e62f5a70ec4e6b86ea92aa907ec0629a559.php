<header class="article__header">
  <time class="page-section-title article__date" datetime="<?php echo e(get_post_time('c', true)); ?>"><?php echo e(get_the_date('j F Y')); ?></time>
  <h1 class="page-title page-title--left"><?php echo get_the_title(); ?></h1>
  <?php echo $__env->make('components.article-buttons', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</header>
