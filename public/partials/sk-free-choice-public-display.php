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


error_reporting(-1);
ini_set('display_errors', 'On');

?>
<?php $pluginIncludePath = dirname(plugin_dir_path( __DIR__ )) . '/includes/'; ?>
<?php require_once $pluginIncludePath . '/class-sk-nyko-data-updater.php'; ?>
<?php require_once $pluginIncludePath . '/class-sk-nyko-areas-helper.php'; ?>
<?php require_once $pluginIncludePath . '/class-sk-nyko-area.php'; ?>

<?php $areas = SK_Nyko_Areas_Helper::get_areas(); ?>

<div id="free-choice-wrapper">
	<script type="text/javascript">
		var freeChoiceSuggestions = <?php echo get_option(SK_Nyko_Data_Updater::SK_FREE_CHOICE_DATA); ?>;
	</script>

	<form method="post" id="freeChoiceForm">
		 <div class="form-group">
			<div id="free-choice-button-wrapper">
				<?php foreach($areas as $area): ?>

					<?php if ($area->get_code() === '0') : ?>

						<button id="free-choice-area-<?php echo $area->get_code();?>" data-filter="<?php printf("nykoarea-%s", $area->get_code()); ?>" class="btn btn-info free-choice-area-button">
							<?php echo $area->get_name();?>
						</button>

					<?php else: ?>

						<button id="free-choice-area-<?php echo $area->get_code();?>" data-filter="<?php printf("nykoarea-%s", $area->get_code()); ?>" class="btn btn-secondary free-choice-area-button">
							<?php echo $area->get_name();?>
						</button>

					<?php endif; ?>

				<?php endforeach; ?>
			</div>
		</div>
		<div class="input-group">
			<input type="text" id="freeChoiceInput" value="" class="text-field form-control" autocomplete="off" placeholder="<?php _e('Ange din gatuadress')?>">
			<span class="input-group-btn">
				<button class="btn btn-secondary" type="submit" id="freeChoiceSubmit">		
					<span class="icon icon-search" role="img" aria-label="Sök">
						<canvas class="icon-canvas" width="1" height="1"></canvas>
						<svg class="icon-svg" width="1" height="1" viewBox="0 0 1 1">
							<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#search"></use>
						</svg>
					</span>			
				</button>
			</span>
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

			$home_service_companies = get_posts($args);
		?>
		<?php require_once 'sk-free-choice-company-template.php' ;?>
	</div>
</div> <!-- END #free-choice-wrapper" -->