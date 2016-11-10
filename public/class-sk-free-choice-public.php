<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://cybercom.com
 * @since      1.0.0
 *
 * @package    Sk_Free_Choice
 * @subpackage Sk_Free_Choice/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Sk_Free_Choice
 * @subpackage Sk_Free_Choice/public
 * @author     Daniel Pihlström <daniel.pihlstrom@cybercom.com>
 */
class Sk_Free_Choice_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		add_shortcode( 'free-choice', array( 'Sk_Free_Choice_Public', 'free_choice_short_code' ) );
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/sk-free-choice-public.css', array(), $this->version, 'all' );

	}

	/**
	 * 
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( $this->plugin_name . '-autocomplete', plugin_dir_url( __FILE__ ) . 'js/jquery.easy-autocomplete.min.js', 
			array( 'jquery' ),
			 $this->version, false 
		);

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/sk-free-choice-public.js', 
			array( $this->plugin_name . '-autocomplete' ),
			 $this->version, false 
		);

	}

	public static function get_img_services( $services ){
		$service_output = '';
		if(!empty($services)) {
			$service_output = '<span class="float-right">';
			foreach ( $services as $service ) {
				$service_name = $service == 'care' ? 'Omvårdnad' : 'Service';
				$service_output .= '<img title="'.$service_name.'" src="'. plugin_dir_url(SK_FREE_CHOICE_URL) . 'public/img/sk-free-choice-'.$service.'.png' . '">';
			}
			$service_output .= '</span>';
		}

		echo $service_output;
	}

	public static function html_available_services( $free_choices ) {

		if(empty($free_choices['services']))
			return false;

		$print_services = implode( ' och ', $free_choices['services']);
		$print_services = str_replace( 'care', 'omvårdnad', $print_services );
		$print_services = str_replace( 'service', 'service', $print_services );
		$print_services = ucfirst( $print_services );

		?>
		<div class="container sk-free-choice-available-services">
			<div class="row">
				<ul class="sk-free-choice-list">
					<li class="list-title"><?php _e('Utför: ', 'sk-tivoli'); ?></li>

					<?php if( ! empty( $print_services ) ) : ?>
						<li><?php echo $print_services; ?></li>
					<?php endif; ?>

					<li class="list-title"><?php _e('Valbar: ', 'sk-tivoli'); ?></li>
					<li><?php echo intval( $free_choices['services_selectable'] ) === 1 ? 'Ja' : 'Nej'; ?></li>

				</ul>
			</div>
		</div><!-- .sk-free-choice-contact -->
	<?php
	}

	public static function html_contact( $free_choices ){
		?>

		<div class="container sk-free-choice-contact">
			<div class="row">
				<ul class="sk-free-choice-list-bullet">
					<li class="list-title"><?php _e('Kontakt: ', 'sk-tivoli'); ?></li>

					<?php if( ! empty( $free_choices['phone'] ) ) : ?>
					<li><?php echo $free_choices['phone']; ?></li>
					<?php endif; ?>

					<?php if( ! empty( $free_choices['street_address'] ) ) : ?>
					<li><?php echo $free_choices['street_address']; ?></li>
					<?php endif; ?>

					<?php if( ! empty( $free_choices['postal'] ) ) : ?>
					<li><?php echo $free_choices['postal']; ?></li>
					<?php endif; ?>

					<?php if( ! empty( $free_choices['city'] ) ) : ?>
					<li><?php echo $free_choices['city']; ?></li>
					<?php endif; ?>
				</ul>
			</div>
		</div><!-- .sk-free-choice-contact -->

<?php
	}


	public static function free_choice_short_code() {
		ob_start();
		require_once 'partials/sk-free-choice-public-display.php';
		$content = ob_get_clean();
		return $content;

	}


}