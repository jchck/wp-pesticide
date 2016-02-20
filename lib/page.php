<?php

namespace jchck\pesticide\page;

function page(){
	add_plugins_page( 'WP Pesticide', 'WP Pesticide', 'administrator', 'pesticide', __NAMESPACE__ . '\\page_display' );
}
add_action( 'admin_menu', __NAMESPACE__ . '\\page' );

function page_display(){ ?>
	<div class="wrap">
		<h2>WP Pesticide</h2>
		<p>Faster CSS layout debugging</p>

		<?php settings_errors(); ?>

		<form method="post" action="options.php">
			<?php settings_fields( 'sandbox_theme_display_options' ); ?>
			<?php do_settings_sections( 'sandbox_theme_display_options' ); ?>
			<?php submit_button(); ?>
		</form>
		
	</div>
<?php }