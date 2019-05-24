<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Post Data Template-Part File
 *
 * @file           post-data.php
 * @package        Responsive
 * @author         Emil Uzelac
 * @copyright      2003 - 2014 CyberChimps
 * @license        license.txt
 * @version        Release: 1.1.0
 * @filesource     wp-content/themes/responsive/post-data.php
 * @link           http://codex.wordpress.org/Templates
 * @since          available since Release 1.0
 */
?>

<?php if ( !is_page() && !is_search() ) { ?>
<?php if( is_plugin_active('responsivepro-plugin/index.php')){  ?>
			<div class="post-data">
			<?php responsivepro_plugin_posted_in(); ?>
			<br/>
			<?php responsivepro_plugin_pro_post_tags(); ?>
			<br/>
			<?php responsivepro_plugin_post_author_bio(); ?>
		</div><!-- end of .post-data -->
<?php } else { ?>
	<div class="post-data">
		<?php the_tags( __( 'Tagged with:', 'responsive' ) . ' ', ', ', '<br />' ); ?>
	</div><!-- end of .post-data -->
<?php } ?>
<?php } ?>

<div class="post-edit"><?php edit_post_link( __( 'Edit', 'responsive' ) ); ?></div>