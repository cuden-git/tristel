<section class="page-section team-carousel">
  <div class="container">
    <h2 class="section-title"><?php echo $team_carousel['sub_title']; ?></h2>
    <h3 class="page-title"><?php echo $team_carousel['hero_title']; ?></h3>
  </div>
  <div class="container team-carousel__wrap">
    <div class="glide" data-perview="4">
      <div class="glide__track" data-glide-el="track">
          <ul class="glide__slides team-carousel__slides">
          <?php $__currentLoopData = $team_carousel['slides']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li class="glide__slide team-carousel__slide">
                <div class="team-carousel__slide-inner">
                  <a href="<?php echo e($slide['url']); ?>" title="<?php echo e($slide->post_title); ?>">
                  <div class="team-carousel__slide-img">
                    <div>
                      <?php echo get_the_post_thumbnail($slide['id']); ?>

                    </div>
                  </div>
                  <div class="team-carousel__slide-text">
                    <h4 class="team-carousel__slide-title"><?php echo e($slide['title']); ?></h4>
                    <h6 class="team-carousel__slide-subtitle"><?php echo e($slide['position']); ?></h6>
                  </div>
                  </a>
                </div>
              </li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
      </div>
      <div class="container team-carousel__controls glide__arrows" data-glide-el="controls">
          <span class="glide__arrow glide__arrow--left" data-glide-dir="<"><i class="fas fa-long-arrow-alt-left"></i></span>
          <span class="glide__arrow glide__arrow--right" data-glide-dir=">"><i class="fas fa-long-arrow-alt-right"></i></span>
      </div>
    </div>
  </div>
  <div class="container">
    <a href="<?php echo e($team_carousel['btn']['url']); ?>" class="btn team-carousel__cta" title="<?php echo e($team_carousel['btn']['title']); ?>"><?php echo e($team_carousel['btn']['title']); ?></a>
  </div>
</section>
