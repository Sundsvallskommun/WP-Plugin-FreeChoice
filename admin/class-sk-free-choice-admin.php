<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://cybercom.com
 * @since      1.0.0
 *
 * @package    Sk_Free_Choice
 * @subpackage Sk_Free_Choice/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Sk_Free_Choice
 * @subpackage Sk_Free_Choice/admin
 * @author     Daniel Pihlström <daniel.pihlstrom@cybercom.com>
 */
class Sk_Free_Choice_Admin {

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

		add_action('init', array( $this, 'register_post_type' ) );

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
		 * defined in Sk_Free_Choice_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Sk_Free_Choice_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/sk-free-choice-admin.css', array(), $this->version, 'all' );

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
		 * defined in Sk_Free_Choice_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Sk_Free_Choice_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/sk-free-choice-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function register_post_type() {

		register_post_type( 'home_service',
			array(
				'labels'      => array(
					'name'               => __( 'Utförare', 'skfc' ),
					'singular_name'      => __( 'Hemtjänst', 'skfc' ),
					'menu_name'          => __( 'Hemtjänst', 'skfc' ),
					'name_admin_bar'     => __( 'Hemtjänst', 'skfc' ),
					'add_new'            => __( 'Lägg till ny', 'skfc' ),
					'add_new_item'       => __( 'Lägg till ny utförare', 'skfc' ),
					'new_item'           => __( 'Ny utförare', 'skfc' ),
					'edit_item'          => __( 'Ändra utförare', 'skfc' ),
					'view_item'          => __( 'Visa utförare', 'skfc' ),
					'all_items'          => __( 'Alla utförare', 'skfc' ),
					'search_items'       => __( 'Sök utförare', 'skfc' ),
					'not_found'          => __( 'Inga utförare funna.', 'skfc' ),
					'not_found_in_trash' => __( 'Inga utförare finns i papperskorgen.', 'skfc' ),
				),
				'public'      => true,
				'has_archive' => true,
				'rewrite'     => array( 'slug' => 'hemtjanstutforare' ),
			)
		);
	  	
	  	add_theme_support( 'post-thumbnails', array('home_service') );
	}

	
	
}
