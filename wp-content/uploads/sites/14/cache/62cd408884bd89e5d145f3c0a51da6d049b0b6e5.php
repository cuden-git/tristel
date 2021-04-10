<section class="page-section product-carousel page-section--<?php echo e($standard_carousel['section_bg']); ?>">
    <div class="container">
        <h2 class="product-carousel__slide-title section-title"><?php echo $standard_carousel['title']; ?></h2>
        <h3 class="product-carousel__slide-hero-title page-title"><?php echo $standard_carousel['hero_title']; ?></h3>
    </div>
    <div class="container">
        <div class="product-carousel__wrap">
            <div class="glide" data-perview="3">        
                <div class="glide__track" data-glide-el="track">
                    <ul class="glide__slides product-carousel__slides">
                    <?php $__currentLoopData = $standard_carousel['slides']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="glide__slide product-carousel__slide">
                            <a href="<?php echo $slide['slide_link']['url']; ?>" class="product-carousel__slide-inner" title="<?php echo e($slide['slide_link']['title']); ?>" target="<?php echo e($slide['slide_link']['target']); ?>">
                                <div class="product-carousel__slide-img" style="background-image: url(<?php echo $slide['image']['url']; ?>)"></div>
                                <h6><?php echo $slide['slide_link']['title']; ?></h6>
                            </a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <div class="container product-carousel__controls glide__arrows" data-glide-el="controls">
                    <span class="glide__arrow glide__arrow--left" data-glide-dir="<"><i class="fas fa-long-arrow-alt-left"></i></span>
                    <span class="glide__arrow glide__arrow--right" data-glide-dir=">"><i class="fas fa-long-arrow-alt-right"></i></span>
                </div>
            </div>
        </div>
    </div>
</section>
