<section>
  <div class="container">
    <?php if($page_headers['small']): ?>
    <h1 class="page-title-small page-title-small--left"><?php echo e($page_headers['small']); ?></h1>
    <?php endif; ?>
    <?php if($page_headers['large']): ?>
    <h2 class="page-title page-title--left page-title--<?php echo e($page_headers['width']); ?>"><?php echo e($page_headers['large']); ?></h2>
    <?php endif; ?>
    <?php if(is_search()): ?>
      <h1 class="page-title page-title--left"><?php echo App::title(); ?></h1>
    <?php endif; ?>
  </div>
</section>
