<?php //$pluginIncludePath = dirname(plugin_dir_path( __DIR__ )) . '/includes/'; ?>
<?php //require_once $pluginIncludePath . '/class-sk-nyko-areas-helper.php'; ?>

<?php foreach ( $home_service_companies as $company ): ?>
	<?php $areas_as_string = 'card filter'; ?>
	<?php foreach ( $company->free_choice['areas'] as $area ) : ?>
	<?php $areas_as_string .= ' nykoarea-' . SK_Nyko_Areas_Helper::display_name_to_area_id( $area ); ?>
<?php endforeach; ?>

	<div class="<?php echo $areas_as_string; ?>">
		<div class="card-header">
			<h2 class="card-title"><?php echo $company->post_title; ?><?php Sk_Free_Choice_Public::get_img_services( $company->free_choice['services'] ); ?></h2>
		</div>
		<div class="card-block">



			<?php Sk_Free_Choice_Public::html_contact( $company->free_choice ); ?>

			<?php if ( $company->free_choice['areas'] !== false ) : ?>
				<div class="container sk-free-choice-areas">
					<div class="row">

						<ul class="sk-free-choice-list-bullet">
							<li class="list-title">Områden:</li>
							<?php foreach ( $company->free_choice['areas'] as $area ) : ?>

								<li><?php echo $area; ?></li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
			<?php endif; ?>
			<?php Sk_Free_Choice_Public::html_available_services( $company->free_choice ); ?>
			<?php if ( $company->free_choice['picture'] !== null && $company->free_choice['picture'] !== false ) : ?>
				<div class="clearfix sk-free-choice-img">
					<img src="<?php echo $company->free_choice['picture']; ?>" alt="<?php echo $company->post_title; ?>"
					     class="sk-free-choice-company-img">
				</div>
			<?php endif; ?>

			<p class="card-text"><?php echo $company->post_content; ?></p>
			<?php if( !empty( $company->free_choice['document']['url'] ) ) : ?>
			<a target="_blank" href="<?php echo $company->free_choice['document']['url']; ?>"
			   class="btn btn-secondary btn-rounded">Läs mer (pdf)</a>
			<?php endif; ?>
			<?php if( !empty( $company->free_choice['webpage'] ) ) : ?>
				<a target="_blank" href="<?php echo $company->free_choice['webpage']; ?>" class="btn btn-secondary btn-rounded">Webbplats</a>
			<?php endif; ?>
		</div>
	</div>

<?php endforeach; ?>