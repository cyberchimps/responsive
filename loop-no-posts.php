<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * No-Posts Loop Content Template-Part File
 *
 * @file           loop-no-posts.php
 * @package        Responsive
 * @author         Emil Uzelac
 * @copyright      2003 - 2014 CyberChimps
 * @license        license.txt
 * @version        Release: 1.1.0
 * @filesource     wp-content/themes/responsive/loop-no-posts.php
 * @link           http://codex.wordpress.org/Templates
 * @since          available since Release 1.0
 */

/**
 * If there are no posts in the loop,
 * display default content
 */

$title = ( is_search() ? sprintf( __( 'Your search for %s did not match any entries.', 'responsive' ), get_search_query() ) : __( '404 &#8212; Fancy meeting you here!', 'responsive' ) );

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if( is_plugin_active('responsivepro-plugin/index.php')){
	if (responsivepro_plugin_get_option ('404_title'))
		$title = responsivepro_plugin_get_option ('404_title');
}

?>

	<h1 class="title-404"><?php echo $title; ?></h1>

<?php 
if( is_plugin_active('responsivepro-plugin/index.php')){
	if (responsivepro_plugin_get_option ('404_content'))
		echo '<p>' . responsivepro_plugin_get_option( '404_content' ) . '</p>';
   else { 		
?>
	<p><?php _e( 'Don&#39;t panic, we&#39;ll get through this together. Let&#39;s explore our options here.', 'responsive' ); ?></p>

	<h6><?php
		printf( __( 'You can return %s or search for the page you were looking for.', 'responsive' ),
				sprintf( '<a href="%1$s" title="%2$s">%3$s</a>',
						 esc_url( get_home_url() ),
						 esc_attr__( 'Home', 'responsive' ),
						 esc_attr__( '&larr; Home', 'responsive' )
				)
		);
		?></h6>

<?php get_search_form(); 
	}
}
?>