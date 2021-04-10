<div class="container">
  <?php echo $__env->make('partials.page-header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <div class="row brands-grid">
    <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-12 brands-grid__cell <?php if($loop->index > 0): ?><?php echo e('col-md-4'); ?><?php else: ?><?php echo e('brands-grid__cell--hero'); ?><?php endif; ?>">
      <div class="brands-grid__img">
        <div><?php echo $brand['img_tag']; ?></div>
      </div>
      <div class="brands-grid__content">
        <img src="<?php echo $brand['logo']['url']; ?>" class="brands-grid__logo">
        <h6 class="brands-grid__title"><?php echo e($brand['excerpt']['excerpt_title']); ?></h6>
        <p><?php echo e($brand['excerpt']['excerpt']); ?></p>
        <a href="<?php echo e($brand['button']['url']); ?>?brand_id=<?php echo e($brand['cat_id']); ?>" class="btn btn--<?php echo e($brand['button']['colour']); ?>" title="<?php echo e($brand['button']['label']); ?>"><?php echo e($brand['button']['label']); ?></a>
      </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
</div>
