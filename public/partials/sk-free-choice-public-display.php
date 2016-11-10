<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       http://cybercom.com
 * @since      1.0.0
 *
 * @package    Sk_Free_Choice
 * @subpackage Sk_Free_Choice/public/partials
 */
?>
<?php


error_reporting( - 1 );
ini_set( 'display_errors', 'On' );

?>
<?php $pluginIncludePath = dirname( plugin_dir_path( __DIR__ ) ) . '/includes/'; ?>
<?php require_once $pluginIncludePath . '/class-sk-nyko-data-updater.php'; ?>
<?php require_once $pluginIncludePath . '/class-sk-nyko-areas-helper.php'; ?>
<?php require_once $pluginIncludePath . '/class-sk-nyko-area.php'; ?>

<?php $areas = SK_Nyko_Areas_Helper::get_areas(); ?>

<div class="free-choice-wrapper">
	<script type="text/javascript">
		var freeChoiceSuggestions = <?php echo get_option( SK_Nyko_Data_Updater::SK_FREE_CHOICE_DATA ); ?>;
	</script>

	<form method="post" id="freeChoiceForm">


		<div class="form-group">
			<label for="freeChoiceInput"><?php _e('Välj ditt område:', 'skfc' ); ?></label>
			<div id="free-choice-button-wrapper">
				<?php foreach ( $areas as $area ): ?>

					<?php if ( $area->get_code() === '0' ) : ?>

						<button id="free-choice-area-<?php echo $area->get_code(); ?>"
						        data-filter="<?php printf( "nykoarea-%s", $area->get_code() ); ?>"
						        class="btn btn-info free-choice-area-button">
							<?php echo $area->get_name(); ?>
						</button>

					<?php else: ?>

						<button id="free-choice-area-<?php echo $area->get_code(); ?>"
						        data-filter="<?php printf( "nykoarea-%s", $area->get_code() ); ?>"
						        class="btn btn-secondary free-choice-area-button">
							<?php echo $area->get_name(); ?>
						</button>

					<?php endif; ?>

				<?php endforeach; ?>
			</div>
		</div>
		<div class="form-group">
			<label for="freeChoiceInput"><?php _e('Vilket område tillhör jag?', 'skfc' ); ?></label>
			<input type="text" id="freeChoiceInput" value="" class="form-control" autocomplete="off"
			       placeholder="<?php _e( 'Ange din gatuadress', 'skfc' ); ?>">
		</div>
	</form>
	<div id="free-choice-search-result" class="sk-free-choice-card-spacing">
		<?php
		$args = array(
			'posts_per_page'   => 30,
			'offset'           => 0,
			'orderby'          => 'title',
			'order'            => 'ASC',
			'post_type'        => 'home_service',
			'post_status'      => 'publish',
			'suppress_filters' => true,
		);

		$home_service_companies = get_posts( $args );

		foreach ( $home_service_companies as $item ) {

			$item->free_choice = array(
				'street_address'      => get_field( 'home_service_street_address', $item->ID ),
				'postal'              => get_field( 'home_service_postal', $item->ID ),
				'city'                => get_field( 'home_service_city', $item->ID ),
				'phone'               => get_field( 'home_service_phone', $item->ID ),
				'webpage'             => get_field( 'home_service_webpage', $item->ID ),
				'areas'               => get_field( 'home_service_area', $item->ID ),
				'services'            => get_field( 'home_service_services', $item->ID ),
				'services_selectable' => get_field( 'home_service_services_selectable', $item->ID ),
				'picture'             => get_field( 'home_service_pic', $item->ID ),
				'document'            => get_field( 'home_service_document', $item->ID )
			);
		}


		?>
		<?php require_once 'sk-free-choice-company-template.php'; ?>
	</div>
</div> <!-- END .free-choice-wrapper" -->