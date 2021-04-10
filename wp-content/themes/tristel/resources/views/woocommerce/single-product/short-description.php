<?php
/**
 * Single product short description
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/short-description.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $post;

$short_description = apply_filters( 'woocommerce_short_description', $post->post_excerpt );

if ( ! $short_description ) {
	return;
}

?>
<div class="woocommerce-product-details__short-description page-intro" data-content-expand>
	<div class="page-intro__excerpt" data-content-expand-excerpt>
	<?php echo wp_trim_words( $short_description, 55 ) ?>
	<span class="page-intro__trigger" data-content-expand-trigger><?= __('Read more', 'tristel') ?></span>
	</div>
	<div class="page-intro__full" data-content-expand-full>
	<?php echo $short_description ?>
	<span class="page-intro__trigger" data-content-expand-trigger><?= __('Read less', 'tristel') ?></span>
	</div>
</div>
