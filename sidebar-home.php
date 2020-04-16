<?php
/**
 * Home Widgets Template
 *
 * @file           sidebar-home.php
 * @package        Responsive
 * @author         Emil Uzelac
 * @copyright      2003 - 2014 CyberChimps
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/sidebar-home.php
 * @link           http://codex.wordpress.org/Theme_Development#secondary_.28sidebar.php.29
 * @since          available since Release 1.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<?php
	$responsive_options = Responsive\Core\responsive_get_options();
if ( isset( $responsive_options['home-widgets'] ) && '1' != $responsive_options['home-widgets'] ) {
	Responsive\responsive_widgets_before(); // above widgets container hook. ?>
	<aside id="secondary" class="widget-area custom-home-widget-section home-widgets" role="complementary">
		<div class="home-widget-wrapper">
			<div id="home_widget_1" class="home-widget-1 grid col-300">
			<?php Responsive\responsive_widgets(); // above widgets hook. ?>

			<?php if ( ! dynamic_sidebar( 'home-widget-1' ) ) : ?>
					<div class="widget-wrapper">

						<div class="widget-title-home"><h4><?php esc_html_e( 'Fermentum', 'responsive' ); ?></h4></div>
						<div class="textwidget">
							<img src="<?php echo esc_url( get_template_directory_uri() . '/images/box1.jpg' ); ?>" >
						</div>
						<div class="textwidget">
							<?php
							if ( is_user_logged_in() && current_user_can( 'edit_theme_options' ) ) :
								esc_html_e( 'This is your first home widget box. To edit please go to Appearance > Widgets and choose 6th widget from the top in area 6 called Home Widget 1. Title is also manageable from widgets as well.', 'responsive' );
							else :
								esc_html_e( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'responsive' );
							endif;
							?>
						</div>

					</div><!-- end of .widget-wrapper -->
				<?php endif; // end of home-widget-1. ?>

			<?php Responsive\responsive_widgets_end(); // responsive after widgets hook. ?>
			</div><!-- end of .col-300 -->

			<div id="home_widget_2" class="home-widget-2 grid col-300">
			<?php Responsive\responsive_widgets(); // responsive above widgets hook. ?>

			<?php if ( ! dynamic_sidebar( 'home-widget-2' ) ) : ?>
					<div class="widget-wrapper">

						<div class="widget-title-home"><h4><?php esc_html_e( 'Elementum', 'responsive' ); ?></h4></div>
						<div class="textwidget">

							<img src="<?php echo esc_url( get_template_directory_uri() . '/images/box2.jpg' ); ?>" >

						</div>
						<div class="textwidget">
							<?php
							if ( is_user_logged_in() && current_user_can( 'edit_theme_options' ) ) :
								esc_html_e( 'This is your second home widget box. To edit please go to Appearance > Widgets and choose 7th widget from the top in area 7 called Home Widget 2. Title is also manageable from widgets as well.', 'responsive' );
							else :
								esc_html_e( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'responsive' );
							endif;
							?>
						</div>

					</div><!-- end of .widget-wrapper -->
				<?php endif; // end of home-widget-2. ?>

			<?php Responsive\responsive_widgets_end(); // after widgets hook. ?>
			</div><!-- end of .col-300 -->

			<div id="home_widget_3" class="home-widget-3 grid col-300 fit">
			<?php Responsive\responsive_widgets(); // above widgets hook. ?>

			<?php if ( ! dynamic_sidebar( 'home-widget-3' ) ) : ?>
					<div class="widget-wrapper">

						<div class="widget-title-home"><h4><?php esc_html_e( 'Interdum', 'responsive' ); ?></h4></div>
						<div class="textwidget">
							<img src="<?php echo esc_url( get_template_directory_uri() . '/images/box3.jpg' ); ?>">
						</div>
							<div class="textwidget">
								<?php
								if ( is_user_logged_in() && current_user_can( 'edit_theme_options' ) ) :
									esc_html_e( 'This is your third home widget box. To edit please go to Appearance > Widgets and choose 8th widget from the top in area 8 called Home Widget 3. Title is also manageable from widgets as well.', 'responsive' );
								else :
									esc_html_e( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'responsive' );
								endif;
								?>
							</div>

					</div><!-- end of .widget-wrapper -->
				<?php endif; // end of home-widget-3. ?>

			<?php Responsive\responsive_widgets_end(); // after widgets hook. ?>
			</div><!-- end of .col-300 fit -->
		</div>
	</aside><!-- end of #secondary -->
	<?php Responsive\responsive_widgets_after(); // after widgets container hook.
}
?>
