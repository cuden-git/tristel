<div class="container page-content">
  <div class="row">
    <aside class="products-sidebar accordion col-md-3">
      <?php $__currentLoopData = $sidebar_options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $options): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="products-sidebar__group accordion__group">
          <h6 class="products-sidebar__title accordion__group-trigger"><?php echo e($options['title']); ?> Products</h6>
          <ul class="products-sidebar__options accordion__group-content">
            <?php $__currentLoopData = $options['terms']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>     
              <li><a href="<?php echo get_term_link($term->slug, 'product_cat' ); ?>?product_cat=<?php echo e($term->term_id); ?>" title="<?php echo e($term->name); ?>"><?php echo e($term->name); ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </aside>
    <div class="col-12 col-md-9">
      <?php the_content() ?>
      <div class="row brands-cat-grid">
        <?php $__currentLoopData = $brand_cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="col-12 col-md-6 brands-cat-grid__cell">
            <a href="<?php echo get_term_link($cat['slug'], 'product_cat' ); ?>" title="<?php echo e($cat['title']); ?>">
              <div class="brands-cat-grid__img">
                <img src="<?php echo $cat['img_url']; ?>">
              </div>
              <h6 class="brands-cat-grid__title"><?php echo e($cat['title']); ?></h6>
            </a>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>
  </div>
</div>
