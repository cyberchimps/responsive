<?php if ( has_nav_menu( 'footer-menu' ) || ! empty( responsive_get_social_icons() ) ) { ?>

	<?php if ( has_nav_menu( 'footer-menu', 'responsive' ) ) : ?>

		<?php
		wp_nav_menu(
			array(
				'container'       => 'nav',
				'container_class' => 'footer-layouts footer-menu-container',
				'container_id'    => 'footer-menu-container',
				'fallback_cb'     => false,
				'menu_class'      => 'footer-menu',
				'theme_location'  => 'footer-menu',
				'depth'           => 1,
			)
		);
		?>
	<?php endif; ?>
	<?php
}
