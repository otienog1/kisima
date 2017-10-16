<h1 class="wp-heading-inline">Theme Support</h1>
<?php settings_errors(); ?>

<form method="post" action="options.php" class="kisima-options-form">
	<div class="box clearfix">
		<div class="box-body">
				<?php settings_fields('kisima-theme-support'); ?>
				<?php do_settings_sections('kisima_theme_support_page'); ?>
				<?php submit_button(); ?>
		</div>
	</div>
</form>

<?php //esc_attr(get_option('avatar')) ?>