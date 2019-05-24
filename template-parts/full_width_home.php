<?php 
if ( !defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div id='full-home'>
<?php
$responsive_options = responsive_get_options();

$display_slider = (! empty ($responsive_options['enable_slider']))?$responsive_options['enable_slider']:0;

if ($display_slider != 1) {
	$slider_content = $responsive_options['home_slider'];
?>
<div class='slider'><?php echo do_shortcode($slider_content); ?></div>
<?php
}
?>
</div>

