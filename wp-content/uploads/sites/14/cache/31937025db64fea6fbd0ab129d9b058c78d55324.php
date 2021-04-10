<section class="page-section article-carousel">
  <div class="container">
    <h2 class="section-title"><?php echo $article_slides['title']; ?></h2>
    <h3 class="page-title"><?php echo $article_slides['hero_title']; ?></h3>
  </div>
  <div class="article-carousel__wrap container">
    <div class="glide" data-perview="3">
        <div class="glide__track" data-glide-el="track">
            <ul class="glide__slides article-carousel__slides">
            <?php $__currentLoopData = $article_slides['slides']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="glide__slide article-carousel__slide">
                  <div class="article-carousel__slide-inner">
                    <a href="<?php echo get_permalink($slide->ID); ?>" class="article-carousel__slide-img" title="<?php echo e($slide->post_title); ?>" style="background-image: url(<?php echo get_the_post_thumbnail_url($slide->ID); ?>)"></a>
                    <div class="article-carousel__slide-text">
                      <span class="article-carousel__slide-date"><?php echo e(date('d F Y', strtotime($slide->post_date))); ?></span>
                      <h4 class="article-carousel__slide-title"><?php echo e($slide->post_title); ?></h4>
                      <a href="<?php echo get_permalink($slide->ID); ?>" title="<?php echo e($slide->post_title); ?>">Read more</a>
                    </div>
                  </div>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>        
        </div>
      <div class="container article-carousel__controls glide__arrows" data-glide-el="controls">
          <span class="glide__arrow glide__arrow--left" data-glide-dir="<"><i class="fas fa-long-arrow-alt-left"></i></span>
          <span class="glide__arrow glide__arrow--right" data-glide-dir=">"><i class="fas fa-long-arrow-alt-right"></i></span>
      </div>
    </div>
  </div>
  <div class="container">
    <?php if($article_slides['btn']): ?>
        <a href="<?php echo e($article_slides['btn']['url']); ?>" class="btn article-carousel__cta" title="<?php echo e($article_slides['btn']['title']); ?>"><?php echo e($article_slides['btn']['title']); ?></a>
    <?php endif; ?>
  </div>
</section>
