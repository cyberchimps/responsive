<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Post Meta-Data Template-Part File
 *
 * @file           post-meta.php
 * @package        Responsive
 * @author         Emil Uzelac
 * @copyright      2003 - 2014 CyberChimps
 * @license        license.txt
 * @version        Release: 1.1.0
 * @filesource     wp-content/themes/responsive/post-meta.php
 * @link           http://codex.wordpress.org/Templates
 * @since          available since Release 1.0
 */
?>

<?php if ( is_single() ): ?>
	<h1 class="entry-title post-title responsive"><?php the_title(); ?></h1>
<?php else: ?>
	<h2 class="entry-title post-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
<?php endif; ?>

<div class="post-meta">
	<?php
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); 
	if( is_plugin_active('responsivepro-plugin/index.php')){ 
		responsivepro_plugin_posted_on();
		responsivepro_plugin_posted_by();
		responsivepro_plugin_comments_link();
	}else{	
	responsive_post_meta_data(); ?>

	<?php if ( comments_open() ) : ?>
		<span class="comments-link">
		<span class="mdash">&mdash;</span>
			<?php comments_popup_link( __( 'No Comments &darr;', 'responsive' ), __( '1 Comment &darr;', 'responsive' ), __( '% Comments &darr;', 'responsive' ) ); ?>
		</span>
	<?php endif; 
	} ?>
</div><!-- end of .post-meta -->
