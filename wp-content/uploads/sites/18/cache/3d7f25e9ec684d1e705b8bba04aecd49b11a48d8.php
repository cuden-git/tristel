
<section class="hero-section" style="background-image: url(<?php echo e($hero_section['image']['url']); ?>)">
  <div class="container">
    <h2 class="hero-section__title"><?php echo e($hero_section['title']); ?></h2>
    <h3 class="hero-section__subtitle"><?php echo e($hero_section['subtitle']); ?></h3>
    <a href="<?php echo e($hero_section['button']['url']); ?>" class="btn btn--black" title="<?php echo e($hero_section['button']['title']); ?>"><?php echo e($hero_section['button']['title']); ?></a>
  </div>
</section>
