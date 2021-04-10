<?php
  $product_block_title = get_field('product_block_title');
  $product_post = get_field('product_post');
?>
<div class="product-block row">
  <div class="col-12 col-md-6">
    <h3><?php echo $product_block_title; ?></h3>
    <div>
      <?php echo $product_post->post_content; ?>
      <a href="<?php echo get_permalink($product_post->ID) ?>" title="<?php  ?>">View Product</a>
    </div>
  </div>
  <div class="col-12 col-md-6">
    <?php echo get_the_post_thumbnail($product_post->ID) ?>
  </div>
</div>
