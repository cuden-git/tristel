<?php
/*
* Woocommerce.
* ref: wc-template-hooks.php - wc-template-functions.php
*/

/**
 * Override loop template and show quantities next to add to cart buttons
 */
add_filter( 'woocommerce_loop_add_to_cart_link', 'quantity_inputs_for_woocommerce_loop_add_to_cart_link', 10, 2 );
function quantity_inputs_for_woocommerce_loop_add_to_cart_link( $html, $product ) {
	if ( $product && $product->is_type( 'simple' ) && $product->is_purchasable() && $product->is_in_stock() && ! $product->is_sold_individually() ) {
		$html = '<form action="' . esc_url( $product->add_to_cart_url() ) . '" class="cart" method="post" enctype="multipart/form-data">';
		$html .= woocommerce_quantity_input( array(), $product, false );
		$html .= '<button type="submit" class="button alt">' . esc_html( $product->add_to_cart_text() ) . '</button>';
		$html .= '</form>';
	}
	return $html;
}

add_action( 'gd_wc_brand_cat_sidebar', function() {
	global $product, $woocommerce_loop, $wp_query;

		if ( is_product() && $woocommerce_loop['name'] == 'related' ) {
			return false;
		}

		$sidebar_options = [];
   // $brands = get_posts(['post_type' => 'tristel-brands']);
    $brands = get_field('sidebar_brands_order','option');
    $count = 0;

    foreach($brands as $brand) {
      $sidebar_options[$count] = [];
			$sidebar_options[$count]['title'] = $brand->post_title;
			$brand_product_category_id = get_field('product_categories', $brand->ID);
			$sidebar_options[$count]['active'] = (($wp_query->get_queried_object()->parent == $brand_product_category_id) || (isset($_GET['brand_id']) && $_GET['brand_id'] == $brand_product_category_id))? true : false ;
			$sidebar_options[$count]['active_parent_id'] = $wp_query->get_queried_object()->parent;
			$sidebar_options[$count]['cat_link'] = get_term_link( $brand_product_category_id, 'product_cat' );
			$sidebar_options[$count]['brand_product_category_id'] = $brand_product_category_id;

			$args = [
				  'taxonomy' =>  'product_cat',
				  'hide_empty' =>  false,
					'hierarchical' =>  false,
					'parent' => $brand_product_category_id,
				];
      // $args = [
      //   'taxonomy' =>  'product_cat',
      //   'hide_empty' =>  false,
      //   'hierarchical' =>  false,
      //   'meta_query' => array(
      //     array(
      //       'key' => 'brand_category',
      //       'value' => $brand->ID
      //     )
      //   )
      // ];

			$sidebar_options[$count]['terms'] = get_terms( $args );
      ++$count;
    }

	require_once(STYLESHEETPATH.'/views/partials/wc-cats-sidebar.php');
} );

/**
 * Remove Woocommerce breadcrumbs 
 */
add_action( 'init', 'wc_remove_wc_breadcrumbs' );
function wc_remove_wc_breadcrumbs() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}

/**
 * Archives: wrap the category/subcategory image/thumbnail in a div.
 * 
 * The category image itself is hooked in at priority 10 using woocommerce_subcategory_thumbnail(),
 * so priority 9 and 11 are used to open and close the div.
 */
add_action( 'woocommerce_before_subcategory_title', function(){
	echo '<div class="woocommerce-img-wrap">';
}, 9 );
add_action( 'woocommerce_before_subcategory_title', function(){
	echo '</div>';
}, 11 );

/**
 * Shop/archives: wrap the product image/thumbnail in a div.
 * 
 * The product image itself is hooked in at priority 10 using woocommerce_template_loop_product_thumbnail(),
 * so priority 9 and 11 are used to open and close the div.
 */
add_action( 'woocommerce_before_shop_loop_item_title', function(){
	echo '<div class="woocommerce-img-wrap">';
}, 9 );
add_action( 'woocommerce_before_shop_loop_item_title', function(){
	echo '</div>';
}, 11 );

/**
 *  Remove add to cart button on category archive product listing
 */
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );

/**
 *  Remove meta from single product and add it to appear under price
 */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
add_action('wc_product_meta', function() {
	wc_get_template( 'single-product/meta.php' );
});

/**
 * Add global banner add for single product
 */
add_action('wc_product_banner_ad', function() {
	$banner_post = get_field('single_product', 'option')['global_product_banner_ad'];
	$banner = [];

	if($banner_post) {
		$banner['title'] = $banner_post->post_title;
		$banner['content'] = get_field('ad_content',$banner_post->ID);
		$banner['btn'] = get_field('ad_cta',$banner_post->ID);
		
		require(STYLESHEETPATH.'/views/partials/wc-banner-ad.php');	
	}
});

/**
 * Login for price instruction single product
 */
add_action('wc_login_for_price', function() {
	$message = get_field('single_product', 'option')['login_for_price'];
	
	if( !is_user_logged_in() && $message ) {
		$pattern = '/(\{([\w|\s]*)\})/i';
		$replacement = '<a href="'.get_permalink( get_option('woocommerce_myaccount_page_id') ).'" title="$2">$2</a>';
		$message = preg_replace($pattern, $replacement, $message);
		echo '<p>'.$message.'</p>';
	}
});

/**
 * Add custom product data tabs
 */
add_filter( 'woocommerce_product_tabs', 'wc_new_product_tabs' );
function wc_new_product_tabs( $tabs ) {
	global $post;

	$new_tabs = get_field('product_tab_data', $post->ID);

	if(!$new_tabs) {
		return $tabs;
	}

	$count = 0;
	foreach($new_tabs as $key=>$val) {

		$tabs[$key] = array(
			'title' 	=> __( $val['label'], 'woocommerce' ),
			'priority' 	=> 50,
			'callback' 	=> function($key) {
				global $post;

				$tabs = get_field('product_tab_data',$post->ID);
				echo '<h2>'.$tabs[$key]['label'].'</h2>';
				echo $tabs[$key]['content'];
				if($tabs[$key]['downloads']) {
					$downloads = $tabs[$key]['downloads'];
					require_once(STYLESHEETPATH.'/views/partials/wc-product-downloads.php');
				}	
			}
		);
		++$count;
	}

	return $tabs;

}

// Hide prices
add_action('after_setup_theme',function() {
	add_filter('woocommerce_get_price_html', function($price) {
		if(is_user_logged_in() )
		{
				return $price;
		}
		else
		{
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
			remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
			return get_woocommerce_currency_symbol().'N/A';
		}
	}); 
});

/*
* Add description to related product
*/
add_action( 'woocommerce_after_shop_loop_item_title', function($is_related = false) {
	global $product;
	if( $is_related ) {
		echo '<div class="product-description">'.$product->get_data()['description'].'</div>';
	}
}, 10 );

/**
 *  Change order of single product short description
 */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 9 );

/**
 *  Set add to cart button text
 */
add_filter( 'woocommerce_product_add_to_cart_text', 'wc_custom_add_to_cart_text');
add_filter('woocommerce_product_single_add_to_cart_text', 'wc_custom_add_to_cart_text');
 
function wc_custom_add_to_cart_text() {
	$btn_text = get_field('single_product', 'option')['add_to_cart_button_text'];

	if($btn_text) {
		return __( $btn_text, 'woocommerce' );
	}

}
/*
* removed so as to re-add within results column. See loop-start.php
*/
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
add_action( 'wc_archive_ordering', 'woocommerce_catalog_ordering', 30 );
add_action( 'wc_result_count', 'woocommerce_result_count', 20 );

/*
* Related products section headers
*/
add_action( 'wc_related_products_headers', function(){
	$headers = get_field('related_products_headers', 'option');

	$output = '<h3 class="section-title">'.__( $headers['sub_header'], 'woocommerce' ).'</h3>';__( 'Related products', 'woocommerce' );
	$output .= '<h2 class="page-title">'.__( $headers['hero_header'], 'woocommerce' ).'</h2>';
	echo $output;
}, 9 );

/*
* Related products template
*/
add_filter( 'wc_get_template_part', function ( $template, $slug, $name ) {

	$custom_template_name = 'content-related.php'; 

	if( $slug == 'content' && $name == 'related' ){
			$template = STYLESHEETPATH.'/views/woocommerce/' . $custom_template_name;
	}
	return $template;
}, 10, 3 );

/*
* Related products banner ad
*/
add_action( 'wc_related_banner_ad', function () {

	$banner_post = get_field('related_products_banner', 'option');
	$banner = [];

	if($banner_post) {
		$banner['title'] = $banner_post->post_title;
		$banner['content'] = get_field('ad_content',$banner_post->ID);
		$banner['btn'] = get_field('ad_cta',$banner_post->ID);

		require(STYLESHEETPATH.'/views/partials/wc-banner-ad.php');
	}
});

/*
* Add to basket AJAX for single product page
*/
add_action('wp_ajax_wc_add_to_cart', 'wc_add_to_cart'); 
add_action('wp_ajax_nopriv_wc_add_to_cart', 'wc_add_to_cart');          

function wc_add_to_cart() {

    $product_id = absint($_POST['product_id']);

    $quantity = empty($_POST['quantity']) ? 1 : wc_stock_amount($_POST['quantity']);

    $variation_id = absint($_POST['variation_id']);

    $product_status = get_post_status($product_id); 

    if (WC()->cart->add_to_cart($product_id, $quantity, $variation_id) && 'publish' === $product_status) {

        do_action('ql_woocommerce_ajax_added_to_cart', $product_id);

					if ('yes' === get_option('ql_woocommerce_cart_redirect_after_add')) { 

							wc_add_to_cart_message(array($product_id => $quantity), true); 

					} 

				//	WC_AJAX :: get_refreshed_fragments();
				// echo wp_send_json(wc_get_cart_items());/**/
					$data = wc_get_cart_items();
			} else {
					$data = array( 'error' => true );
			}

			echo wp_send_json($data);

      wp_die();

}

/*
* Get array of cart items
*/
function wc_get_cart_items() {

	$cart_data = [];
	$count = 0;
	foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
		$cart_data[$count]= [];
		$cart_data[$count]['product'] = $cart_item['data'];
		$cart_data[$count]['product_id'] = $cart_item['product_id'];
		$cart_data[$count]['item_key'] = $cart_item_key;
		$cart_data[$count]['name'] = $cart_item['data']->post->post_title;
		$cart_data[$count]['quantity'] = $cart_item['quantity'];
		$cart_data[$count]['price'] = WC()->cart->get_product_price( $cart_data[$count]['product'] );
		$cart_data[$count]['subtotal'] = WC()->cart->get_product_subtotal( $cart_data[$count]['product'], $cart_item['quantity'] );
		$cart_data[$count]['link'] = $cart_data[$count]['product']->get_permalink( $cart_item );
		$cart_data[$count]['meta'] = wc_get_formatted_cart_item_data( $cart_item );
		++$count;
	 }
	 
	 return $cart_data;
}

/**
 * Check for WC prerequisites for our REST request.
*/
function wc_REST_prerequisites() {
	if ( defined( 'WC_ABSPATH' ) ) {

		include_once WC_ABSPATH . 'includes/wc-cart-functions.php';
		include_once WC_ABSPATH . 'includes/wc-notice-functions.php';
		include_once WC_ABSPATH . 'includes/wc-template-hooks.php';
	}

	if ( null === WC()->session ) {
		$session_class = apply_filters( 'woocommerce_session_handler', 'WC_Session_Handler' );

		WC()->session = new $session_class();
		WC()->session->init();
	}

	if ( null === WC()->customer ) {
		WC()->customer = new WC_Customer( get_current_user_id(), true );
	}

	if ( null === WC()->cart ) {
		WC()->cart = new WC_Cart();

		WC()->cart->get_cart();
	}
}

/*
* Remove from basket AJAX call
*/
add_action('wp_ajax_wc_remove_from_cart', 'wc_remove_from_cart'); 
add_action('wp_ajax_nopriv_wc_remove_from_cart', 'wc_remove_from_cart');
function wc_remove_from_cart() {

	if(isset($_POST['product_id'])) {
		$product_id = absint($_POST['product_id']);

		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			if ( $cart_item['product_id'] == $product_id ) {
					 WC()->cart->remove_cart_item( $cart_item_key );
			}
		}

		$data = wc_get_cart_items();
	}else {
		$data = array( 'error' => true );
	}

	echo wp_send_json($data);
	wp_die();
}

/*
* Modal window for single product gallery
*/
add_filter( 'wc_get_template_part', function ( $template, $slug, $name ) {

	$custom_template_name = 'content-gallery-modal.php'; 

	if( $slug == 'content' && $name == 'gallery-modal' ){
			$template = STYLESHEETPATH.'/views/woocommerce/' . $custom_template_name;
	}
	return $template;
}, 10, 3 );

/*
* 
*/
function wc_rest_add_to_cart(WP_REST_Request $request) {
	wc_REST_prerequisites();
	$params = $request->get_body();
	$params = json_decode($params);

	foreach($params->data as $product_item) {
    $product_id = absint($product_item->id);
    $quantity = empty($product_item->qty) ? 1 : wc_stock_amount($product_item->qty);
    $variation_id = absint($product_item->variation_id);
		$product_status = get_post_status($product_id); 
		
		if (WC()->cart->add_to_cart($product_id, $quantity, $variation_id) && 'publish' === $product_status) {
			wc_add_to_cart_message(array($product_id => $quantity), true);
			$data = wc_get_cart_items();
		}
	}
	return $data;
}

add_action( 'rest_api_init', function () {
  register_rest_route( 'manage-cart/v1', '/add-to-cart/', array(
    'methods' => 'POST',
    'callback' => 'wc_rest_add_to_cart',
  ) );
} );

/*
* 
*/
function wc_rest_update_cart(WP_REST_Request $request) {
	wc_REST_prerequisites();
	$params = $request->get_body();
	$params = json_decode($params);
	//return[$params[0]->item_key, $params[0]->item_qty ];//$params;

	foreach($params->data as $cart_item) {
		WC()->cart->set_quantity( $cart_item->item_key, $cart_item->item_qty );
	}

	$data = wc_get_cart_items();
	return $data;
}

add_action( 'rest_api_init', function () {
  register_rest_route( 'manage-cart/v1', '/update-cart/', array(
    'methods' => 'POST',
    'callback' => 'wc_rest_update_cart',
  ) );
} );

/*
* Product gallery data
*/
function wc_product_gallery( $data ) {
  $post = get_post( $data['id']);

	$product = new WC_product($data['id']);
	$attachment_ids = $product->get_gallery_image_ids();
	$data = [];
	$data['product_title'] = $product->get_name();
	$data['featured'] = wp_get_attachment_image( $product->get_image_id(), 'full' );
	$data['imgs'] = [];

	if($attachment_ids != null) {
		for($i = 0; $i < count($attachment_ids); ++$i) {
			$data['imgs'][$i] = wp_get_attachment_image($attachment_ids[$i], 'full');
		}
	}

	array_unshift($data['imgs'] , $data['featured']);
  return $data;
}

add_action( 'rest_api_init', function () {
  register_rest_route( 'product-gallery/v1', '/product/(?P<id>\d+)', array(
    'methods' => 'GET',
    'callback' => 'wc_product_gallery',
  ) );
} );


add_filter('woocommerce_add_to_cart_fragments', 'wc_header_add_to_cart_fragment');
function wc_header_add_to_cart_fragment( $fragments ) {
    global $woocommerce;
		ob_start(); ?>
		<a href="<?= WC()->cart->get_cart_url() ?>" class="site-header__basket" title="<?= _e('Shopping cart') ?>"><i class="fas fa-shopping-cart"></i><span class="site-header__basket-count"><?= $woocommerce->cart->get_cart_contents_count() ?></span></a>
		<?php

    $fragments['a.site-header__basket'] = ob_get_clean();
		return $fragments;
}

/*
* Modal window for shopping cart
*/
add_filter( 'wc_get_template_part', function ( $template, $slug, $name ) {

	$custom_template_name = 'content-gallery-modal.php'; 

	if( $slug == 'content' && $name == 'gallery-modal' ){
			$template = STYLESHEETPATH.'/views/woocommerce/' . $custom_template_name;
	}
	return $template;
}, 10, 3 );

 /* end Woocommerce */