<?php

/*
** Add site options menu to admin
*/
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));
	
}

/*
** Navigation
*/
class Walker_Sub_Menu extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {
		$has_mega = get_field('has_mega_menu', $item->ID);
		$output .= '<li class="' .  implode(" ", $item->classes) . ($has_mega? ' main-nav__has-mega' : null) . '"><a href="' .$item->url. '">'. $item->title.'</a>';
		if(in_array('menu-item-has-children', $item->classes) && $depth == 0) {
			$output .= '<i class="fas fa-chevron-down"></i>';
		}
		if($has_mega && $depth == 0) {
			$output .= "<div class=\"main-nav__mega\">\n<div class=\"container\">\n";
		}
	}

	function start_lvl(&$output, $depth = 0, $args = NULL) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"main-nav__sub-menu\" data-depth=\"".$depth."\">\n";
	}

	function end_el(&$output, $item, $depth=0, $args=array(), $id = 0) {
		$has_mega = get_field('has_mega_menu', $item->ID);
		if($has_mega && $depth == 0) {
			$output .= "</div>\n</div>\n";
		}
	}
}

/*
* ACF Google map
*/
function acf_google_map_api( $api ){
	$api['key'] = 'AIzaSyAgS_sdDRVhM25Ajj8tjeDVZEDX2dXZ1EY';
	return $api;
}
add_filter('acf/fields/google_map/api', 'acf_google_map_api');

/*
** ACF block
*/
function product_block() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        // register a product block.
        acf_register_block_type(array(
            'name'              => 'product-block',
            'title'             => __('Product block'),
            'description'       => __('A custom product block.'),
            'render_template'   => get_template_directory() . '/views/blocks/product-block.php',
            'category'          => 'tristel-blocks',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'product' ),
				));
				
				// register a team block.
        acf_register_block_type(array(
					'name'              => 'team-members-block',
					'title'             => __('Team members block'),
					'description'       => __('A custom team block.'),
					'render_template'   => get_template_directory() . '/views/blocks/team-members-block.php',
					'category'          => 'tristel-blocks',
					'icon'              => 'admin-comments',
					'keywords'          => array( 'team', 'member' ),
			));

			// register block for telephone.
			acf_register_block_type(array(
				'name'              => 'contact-number-block',
				'title'             => __('Contact number'),
				'description'       => __('Displays telephone contact number'),
				'render_template'   => get_template_directory() . '/views/blocks/contact-number-block.php',
				'category'          => 'tristel-blocks',
				'icon'              => 'admin-comments',
				'keywords'          => array( 'telephone', 'number', 'contact' ),
			));

			// register block for email.
			acf_register_block_type(array(
				'name'              => 'contact-email-block',
				'title'             => __('Contact email'),
				'description'       => __('Displays contact email address'),
				'render_template'   => get_template_directory() . '/views/blocks/contact-email-block.php',
				'category'          => 'tristel-blocks',
				'icon'              => 'admin-comments',
				'keywords'          => array( 'email', 'address', 'contact' ),
			));
    }
}
add_action('acf/init','product_block');

function tristel_block_cats( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug' => 'tristel-blocks',
				'title' => __( 'Tristel blocks', 'tristel-blocks' ),
			),
		)
	);
}
add_filter( 'block_categories', 'tristel_block_cats', 10, 2);

/*
* Remove auto p tags from Contact 7 form
*/
add_filter('wpcf7_autop_or_not', '__return_false');

/*
* Create Tristel brand taxonomy for product post type
*/
function tristel_brand_taxonomy() {
 
	if ( !class_exists( 'WooCommerce' ) ) {
		return false;
	}

	$labels = array(
			'name' => _x( 'Tristel Brands', 'Tristel Brands' ),
			'singular_name' => _x( 'Tristel Brand', 'taxonomy singular name' ),
			'search_items' =>  __( 'Search Brands' ),
			'all_items' => __( 'All Brands' ),
			'parent_item' => __( 'Parent Brand' ),
			'parent_item_colon' => __( 'Parent Brand:' ),
			'edit_item' => __( 'Edit Brand' ), 
			'update_item' => __( 'Update Brand' ),
			'add_new_item' => __( 'Add New Brand' ),
			'new_item_name' => __( 'New Brand Name' ),
			'menu_name' => __( 'Tristel Brands' ),
	);    

	register_taxonomy('tristel_brands','product', array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_in_rest' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'tristel-brand' ),
	));
register_taxonomy_for_object_type( 'tristel_brands', 'product' );
}
add_action( 'init', 'tristel_brand_taxonomy');

/*
* Add brand URL param
*/
function gd_add_query_vars_filter( $vars ){
	$vars[] = "brand_id";
	$vars[] = "posts_sortby";
	return $vars;
}
add_filter( 'query_vars', 'gd_add_query_vars_filter' );

/**
 * Converts a long string of bytes into a readable format e.g KB, MB, GB, TB, YB
 * 
 * ref: https://ourcodeworld.com/articles/read/718/converting-bytes-to-human-readable-values-kb-mb-gb-tb-pb-eb-zb-yb-with-php
 * @param {Int} num The number of bytes.
 */
function readable_bytes($bytes) {
    $i = floor(log($bytes) / log(1024));
    $sizes = array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');

    return sprintf('%.02F', $bytes / pow(1024, $i)) * 1 . ' ' . $sizes[$i];
}

/*
* Function to output class selectors to site content wrapper
*/
function wrapper_class($add_classes = []) {
	$classes = ['main'];
	$classes[] = (get_field('page_padding')['padding_top'])? 'page-padding-top' : null ;
	$classes[] = (get_field('page_padding')['padding_bottom'])? 'page-padding-bottom' : null ;
	
	if(!is_front_page()) {
		$classes[] = 'page-content';
	}


	$classes = array_merge($classes, $add_classes);

	echo 'class="' . esc_attr( implode( ' ', $classes ) ) . '"';
}

/*
* Custom searchform
*/
add_filter('get_search_form', function () {
  return \App\template( 'partials.searchform' );
});

/*
* Shortcodes to embed in editor for Tristel contact info
*/
add_shortcode('tristel-phone', function() {
	$phone = get_field('contact_tel', 'option');

	return '<a href="tel:'.$phone.'" class="option-tel">'.$phone.'</a>';
});

add_shortcode('tristel-email', function() {
	$email = get_field('contact_email', 'option');

	return '<a href="mailto:'.$email.'" class="option-email">'.$email.'</a>';
});

add_shortcode('tristel-address', function() {
	$address = get_field('contact_address', 'option');

	return '<span class="option-address">'.$address.'</span>';	
});

/*
* Redirect to country site
*/
function country_site_redirect() {
	if ( is_main_site() && !is_admin() && 'wp-login.php' != $GLOBALS['pagenow'] && ! defined( 'WP_CLI' ) ) {
		
		$base = get_site_url();
		$sites = App\Controllers\App::GeoSite();
		$countries = App\Controllers\App::AllCountries();
		$is_served = (in_array(VISITOR_COUNTRY, $countries))? true : false ;
		$current_blog_id = get_current_blog_id();

		if($sites['main_site_id'] == $current_blog_id) {//if mainsite
			$all_sites = get_sites();

			if($is_served) {

				if(!isset($_COOKIE["countryPath"]) || VISITOR_COUNTRY != $_COOKIE["countryCode"]) {
					$site_url = $sites['default_url'];
					
					if(count($sites['sites']) == 1) {
						set_country_cookies(VISITOR_COUNTRY, $site_url, $sites['default_blog_id']);
					}else {
						remove_country_cookies();
					}
				}else if(VISITOR_COUNTRY == $_COOKIE["countryCode"]) {
					$site_url = urldecode($_COOKIE["countryPath"]);	
				}

				wp_redirect( $site_url );
				exit();
			}
		}
	}
}
add_action('template_redirect', 'country_site_redirect');

/*
* Set country constants
*/
add_action( 'init', function() {
	//define( 'SITE_COUNTRY', get_field('country', 'option')['value'] );
//	define( 'SITE_LANG', get_field('language', 'option')['value'] );
	define( 'VISITOR_COUNTRY', get_visitor_ip() );
	//define( 'VISITOR_COUNTRY', 'GB' );
} );

function set_country_cookies($country_code, $site_url, $blog_id) {
	setcookie("countryCode", $country_code, time() + (3600 * 24 * 30), '/');
	setcookie("countryPath", $site_url, time() + (3600 * 24 * 30), '/');
	setcookie("countryBlogId", $blog_id, time() + (3600 * 24 * 30), '/');
}

function remove_country_cookies() {
	setcookie("countryCode", "", time() - 3600);
	setcookie("countryPath", "", time() - 3600);
	setcookie("countryBlogId", "", time() - 3600);
}

function get_visitor_ip() {
	if (isset($_SERVER['HTTP_CLIENT_IP'])) {
			$visitor_ip = $_SERVER['HTTP_CLIENT_IP'];
	} else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$visitor_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	}	else {
			$visitor_ip = $_SERVER['REMOTE_ADDR'];
	}

	$data = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?" . $visitor_ip));

	return $data->geoplugin_countryCode;
}

function country_permitted() {
	if(SITE_COUNTRY == VISITOR_COUNTRY) {
		return true;
	}

	return false;
}

add_action('wp_head', function() {
	$all_sites = App\Controllers\App::AllSites();
	$output = '';
	$current_blog_id = get_current_blog_id();

	foreach(array_keys($all_sites['all']) as $key) {
			$count = 0;

			foreach ($all_sites['all'][$key]['sites']['language'] as $language) {
					if($current_blog_id != $all_sites['all'][$key]['sites']['blog_id'][$count]) {
						echo '<link rel="alternate" hreflang="'.$language['value'].'-'.strtolower($key).'" href="'.$all_sites['all'][$key]['sites']['url'][$count].'" />';
					}
					++$count;
			}
	}
});

/*
* Hide country specific content
*/
add_action('template_redirect', function() {
	if((is_account_page() || is_cart() || is_checkout()) && !country_permitted()) {
		global $wp_query;
    $wp_query->set_404();
    status_header(404);
	}
});

/**
 * Add country code as tag to MailChimp subscriber
 */
add_filter( 'mc4wp_subscriber_data', function(MC4WP_MailChimp_Subscriber $subscriber) {
	$subscriber->tags[] = 'website -'.SITE_COUNTRY;
	return $subscriber;
});
