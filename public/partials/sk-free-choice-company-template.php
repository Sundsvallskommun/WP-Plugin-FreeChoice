
<?php //$pluginIncludePath = dirname(plugin_dir_path( __DIR__ )) . '/includes/'; ?>
<?php //require_once $pluginIncludePath . '/class-sk-nyko-areas-helper.php'; ?>

<?php foreach($home_service_companies as $company) : ?>

	<?php $areas = get_field('home_service_area', $company->ID); ?>
	<?php $picture = get_field('home_service_pic', $company->ID); ?>
	<?php $document = get_field('home_service_document', $company->ID); ?>

	<?php $areas_as_string = 'card filter'; ?>
	<?php foreach($areas as $area) : ?>
		<?php $areas_as_string .= ' nykoarea-' . SK_Nyko_Areas_Helper::display_name_to_area_id($area);?>
	<?php endforeach; ?>

	<div class="<?php echo $areas_as_string; ?>">
		<div class="card-block">
		    <h2 class="card-title"><?php echo $company->post_title;?></h2>
		    <?php if ($areas !== false) : ?>
		    	<span class="tag tag-default">Områden:</span>
		    	<?php foreach($areas as $area) : ?>

		    		<span class="tag tag-default"><?php echo $area; ?></span>

		    	<?php endforeach; ?>
		   	<?php endif; ?>
		   	<?php if ($picture !== null && $picture !== false) : ?>
		   		<div class="clearfix">
		   			<img src="<?php echo $picture; ?>" alt="<?php echo $company->post_title;?>" class="sk-free-choice-company-img">
		   		</div>
		   	<?php endif; ?>

		    <p class="card-text"><?php echo $company->post_content;?></p>
		   	<a target="_blank" href="<?php echo $document; ?>" class="btn btn-primary">Läs mer</a>
		</div>
	</div>

<?php endforeach; ?>