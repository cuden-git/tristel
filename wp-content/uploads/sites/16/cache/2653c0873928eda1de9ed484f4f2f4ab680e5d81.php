<section class="page-section product-carousel">
    <div class="container">
        <h2 class="product-carousel__slide-title section-title"><?php echo $product_slides['title']; ?></h2>
        <h3 class="product-carousel__slide-hero-title page-title"><?php echo $product_slides['hero_title']; ?></h3>
    </div>
    <div class="product-carousel__wrap container">
        <div class="glide" data-perview="3">
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides product-carousel__slides">
                <?php $__currentLoopData = $product_slides['slides']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="glide__slide product-carousel__slide">
                        <a href="<?php echo get_permalink($slide->ID); ?>" class="product-carousel__slide-inner" title="<?php echo e($slide['name']); ?>">
                            <div class="product-carousel__slide-img" style="background-image: url(<?php echo $slide['url']; ?>)"></div>
                            <h6><?php echo $slide['name']; ?></h6>
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
    <div class="container">
        <?php if($product_slides['btn']): ?>
            <a href="<?php echo e($product_slides['btn']['url']); ?>" class="btn product-carousel__cta" title="<?php echo e($product_slides['btn']['title']); ?>"><?php echo e($product_slides['btn']['title']); ?></a>
        <?php endif; ?>
    </div>
</section>
