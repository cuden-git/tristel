<section class="page-section text-img-blocks">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-6 text-img-blocks__text">
        <?php if($img_text_blocks['title']): ?>
        <h2 class="section-title section-title--left"><?php echo e($img_text_blocks['title']); ?></h2>
        <?php endif; ?>
        <?php if($img_text_blocks['hero_title']): ?>
        <h3 class="page-title page-title--left"><?php echo e($img_text_blocks['hero_title']); ?></h3>
        <?php endif; ?>
          <?php if($img_text_blocks['text']): ?>
          <div class="text-img-blocks__copy">
          <?php echo e($img_text_blocks['text']); ?>

          </div>
          <?php endif; ?>
          <?php if($img_text_blocks['btn']): ?>
          <a href="<?php echo e($img_text_blocks['btn']['url']); ?>" class="btn text-img-blocks__cta" title="<?php echo e($img_text_blocks['btn']['title']); ?>"><?php echo e($img_text_blocks['btn']['title']); ?></a>
          <?php endif; ?>
      </div>
      <div class="col-12 col-md-6 text-img-blocks__img">
        <?php echo wp_get_attachment_image( $img_text_blocks['img'], 'full' ); ?>

      </div>
    </div>
  </div>
</section>
