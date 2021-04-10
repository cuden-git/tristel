<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       denis.cummins@greenduck.co.uk
 * @since      1.0.0
 *
 * @package    Tristel_Cpt
 * @subpackage Tristel_Cpt/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Tristel_Cpt
 * @subpackage Tristel_Cpt/admin
 * @author     Green Duck <denis.cummins@greenduck.co.uk>
 */
class Tristel_Cpt_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Tristel_Cpt_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Tristel_Cpt_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/tristel-cpt-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Tristel_Cpt_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Tristel_Cpt_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/tristel-cpt-admin.js', array( 'jquery' ), $this->version, false );

	}

	/*
	* Register custom post types
	*/
	public function custom_post_types() {
		register_post_type( 'tristel-science',
			array(
					'labels' => array(
							'name' => __( 'Triology' ),
							'singular_name' => __( 'Triology' )
					),
					'public' => true,
					'has_archive' => true,
					'rewrite' => array('slug' => 'triology-article','with_front' => false),
					'show_in_rest' => true,
					'supports' => array( 'thumbnail', 'title', 'editor')
			)
		);
		
		register_post_type( 'tristel-resources',
			array(
					'labels' => array(
							'name' => __( 'Tristel Resources' ),
							'singular_name' => __( 'Tristel Resource' )
					),
					'public' => true,
					'has_archive' => true,
					'rewrite' => array('slug' => 'tristel-resources-posts','with_front' => false),
					'show_in_rest' => true,
					'supports' => array( 'thumbnail', 'title', 'editor')
			)
		);
		
		register_post_type( 'tristel-team',
			array(
					'labels' => array(
							'name' => __( 'Tristel Team' ),
							'singular_name' => __( 'Tristel Team' )
					),
					'public' => true,
					'has_archive' => true,
					'rewrite' => array('slug' => 'tristel-team-posts','with_front' => false),
					'show_in_rest' => true,
					'supports' => array( 'thumbnail', 'title', 'editor')
			)
		);

		register_post_type( 'tristel-brands',
			array(
					'labels' => array(
							'name' => __( 'Tristel Brands' ),
							'singular_name' => __( 'Tristel Brands' )
					),
					'public' => true,
					'has_archive' => true,
					'rewrite' => array('slug' => 'tristel-brands-posts'),
					'show_in_rest' => true,
					'supports' => array( 'thumbnail', 'title', 'editor')
			)
		);

		register_post_type( 'tristel-ads',
			array(
					'labels' => array(
							'name' => __( 'Tristel Ads' ),
							'singular_name' => __( 'Tristel Ads' )
					),
					'public' => true,
					'has_archive' => true,
					'rewrite' => array('slug' => 'tristel-ads'),
					'show_in_rest' => true,
					'supports' => array('title')
			)
		);
	}
}
