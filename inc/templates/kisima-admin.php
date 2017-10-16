<?php $user = wp_get_current_user(); ?>
<h1 class="wp-heading-inline">Kisima Theme Options</h1>
<?php settings_errors(); ?>
<div class="card">
	<form method="post" action="options.php" class="kisima-options-form">
		<div class="box clearfix">
			<div class="box-body">
					<?php settings_fields('kisima-setting-group'); ?>
					<!-- arg -> page -->
					<?php do_settings_sections('kisima-options'); ?>
					<?php submit_button(); ?>
			</div>
		</div>
	</form>
</div>

<?php //esc_attr(get_option('avatar')) ?>