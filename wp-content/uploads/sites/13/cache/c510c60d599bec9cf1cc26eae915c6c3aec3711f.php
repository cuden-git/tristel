<section class="glide hero-carousel">
    <div class="glide__track" data-glide-el="track">
        <ul class="glide__slides hero-carousel__slides">
        <?php $__currentLoopData = $hero_slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="glide__slide hero-carousel__slide">
                <div class="hero-carousel__slide-img">
                    <picture>
                        <source media="(max-width:767px)" srcset="<?php echo e($slide['slide_mobile_img']['url']); ?>">
                        <source media="(min-width:768px)" srcset="<?php echo e($slide['slide_img']['url']); ?>">
                        <img src="<?php echo e($slide['slide_img']['url']); ?>" alt="<?php echo e($slide['slide_img']['alt']); ?>">
                    </picture>
                </div>
                <div class="container hero-carousel__slide-inner">
                    <h2 class="hero-carousel__slide-title"><?php echo $slide['title']; ?></h2>
                    <p class="hero-carousel__slide-text"><?php echo e($slide['text']); ?></p>
                    <?php if($slide['cta_btns']): ?>
                    <div class="hero-carousel__btns">
                        <?php $__currentLoopData = $slide['cta_btns']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $btn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a 
                            href="<?php echo e($btn['link']['url']); ?>" 
                            class="btn<?php echo e(($btn['btn_type'] == 'keyline')? ' btn--kl' : null); ?>"
                            <?php echo ($btn['btn_type'] == 'custom')? ' style="background-color: '.$btn['btn_colours']['bg_colour'].'; color: '.$btn['btn_colours']['label_colour'].'"' : null; ?> 
                            title="<?php echo e($btn['link']['title']); ?>">
                            <?php echo e($btn['link']['title']); ?></a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php endif; ?>
                </div>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <div class="container hero-carousel__controls glide__arrows" data-glide-el="controls">
        <span class="glide__arrow glide__arrow--left" data-glide-dir="<"><i class="fas fa-long-arrow-alt-left"></i></span>
        <span class="glide__arrow glide__arrow--right" data-glide-dir=">"><i class="fas fa-long-arrow-alt-right"></i></span>
    </div>
</section>
