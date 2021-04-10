<?php
/**
 * Product Loop Start
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-start.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $woocommerce_loop;
?>
<div class="container">
	<div class="row">
		<?php do_action( 'gd_wc_brand_cat_sidebar' ) ?>
		<div class="products products-grid<?= ($woocommerce_loop['name'] == 'related')? '-related' : null ?> col-md<?= ($woocommerce_loop['name'] == 'related')? '-12' : '-9' ?>">
			<div class="results-bar">
				<?= do_action('wc_result_count') ?>
				<?= do_action( 'wc_archive_ordering' ) ?>
			</div>
			<div class="row">
