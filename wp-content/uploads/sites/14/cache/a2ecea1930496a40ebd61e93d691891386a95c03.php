<?php $__env->startSection('content'); ?>
  <div class="container">
  <?php echo $__env->make('partials.page-header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <?php if(!have_posts()): ?>
    <div class="alert alert-warning">
      <?php echo e(__('Sorry, no results were found.', 'sage')); ?>

    </div>
    <?php echo get_search_form(false); ?>

  <?php endif; ?>
  <div class="search__results-list">
  <?php while(have_posts()): ?> <?php the_post() ?>
    <?php echo $__env->make('partials.content-search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php endwhile; ?>
  </div>
    <ul class="page__pagination">
      <?php $__currentLoopData = $pagination; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li <?php echo ($loop->index == get_query_var('paged'))? 'class="page__pagination-active"' : null; ?>><?php echo $page; ?></li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>