<?php
/**
 * Exit if accessed directly.
 *
 * @package Responsive
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$responsive_options = Responsive\Core\responsive_get_options();
// test for first install no database.
$db = get_option( 'responsive_theme_options' );
// test if all options are empty so we can display default text if they are.
$empty     = ( empty( $responsive_options['home_headline'] ) && empty( $responsive_options['home_subheadline'] ) && empty( $responsive_options['home_content_area'] ) ) ? false : true;
$emtpy_cta = ( empty( $responsive_options['cta_text'] ) ) ? false : true;

?>
<?php
	$responsive_options = Responsive\Core\responsive_get_options();

	$display_slider = ( ! empty( $responsive_options['enable_slider'] ) ) ? $responsive_options['enable_slider'] : 0;

if ( 1 == $display_slider ) {
	$slider_content = $responsive_options['home_slider'];
	?>
	<div class='slider'><?php echo do_shortcode( $slider_content ); ?></div>
	<?php
}

if ( ! get_theme_mod( 'responsive_disable_hero_area', 0 ) ) {
	?>
<div id="featured" class="custom-home-featured-area grid col-940">

	<div class="featured-area-wrapper">
		<div id="featured-content" class="featured-content grid col-460">

			<?php
			if ( isset( $responsive_options['home_headline'] ) && ! empty( $responsive_options['home_headline'] ) ) {
				?>
				<h1 class="featured-title">
					<?php echo esc_html( $responsive_options['home_headline'] ); ?>
				</h1>
			<?php } ?>

			<?php
			if ( isset( $responsive_options['home_subheadline'] ) && ! empty( $responsive_options['home_subheadline'] ) ) {
				?>
				<h2 class="featured-subtitle">
					<?php echo esc_html( $responsive_options['home_subheadline'] ); ?>
				</h2>
			<?php } ?>

			<?php
			if ( isset( $responsive_options['home_content_area'] ) ) {
				echo do_shortcode( wpautop( $responsive_options['home_content_area'] ) );
			}
			?>

			<?php if ( 0 == $responsive_options['cta_button'] ) : ?>

				<div class="call-to-action">
					<?php
					if ( 'default' == $responsive_options['button_style'] ) {
						$button_class = 'blue button';
					} elseif ( 'flat_style' == $responsive_options['button_style'] ) {
						$button_class = 'blue button flat';
					}
					?>
					<a href="<?php echo esc_url( $responsive_options['cta_url'] ); ?>" class="<?php echo esc_attr( $button_class ); ?>" <?php responsive_schema_markup( 'url' ); ?>>
						<?php
						if ( isset( $responsive_options['cta_text'] ) ) {
							echo esc_html( $responsive_options['cta_text'] );
						}
						?>
					</a>

				</div><!-- end of .call-to-action -->

			<?php endif; ?>

		</div><!-- end of .col-460 -->

		<div id="featured-image" class="featured-image grid col-460 fit">

			<?php
			$featured_content_image = wp_get_attachment_image_src( get_theme_mod( 'responsive_home_content_area_image' ), 'full' );
			$featured_content_image = $featured_content_image ? '<img class="aligncenter" src="' . $featured_content_image[0] . '" width="440" height="300" alt="featured image" />' : '';

			$featured_content = ( ! empty( $responsive_options['featured_content'] ) || $featured_content_image ) ? $featured_content_image . $responsive_options['featured_content'] : '<img class="aligncenter" src="' . get_template_directory_uri() . '/core/images/featured-image.jpg" width="440" height="300" alt="featured image" />';

			echo do_shortcode( wpautop( $featured_content ) );
			?>

		</div><!-- end of #featured-image -->
	</div>
</div><!-- end of #featured -->

	<?php
}
if ( isset( $responsive_options['about'] ) && '1' == $responsive_options['about'] ) {

	if ( 'default' == $responsive_options['button_style'] ) {
		$button_class = 'blue button';
	} elseif ( 'flat_style' == $responsive_options['button_style'] ) {
		$button_class = 'blue button flat';
	}
	?>
<div id="about_div" class="custom-home-about-section grid col-940">
	<div class="about-section-wrapper">
		<div class="about-content grid col-620">
		<?php
			$responsive_about_title   = isset( $responsive_options['about_title'] ) ? $responsive_options['about_title'] : __( 'About Box Title', 'responsive' );
			$responsive_about_text    = isset( $responsive_options['about_text'] ) ? $responsive_options['about_text'] : '';
			$responsive_about_cta_url = isset( $responsive_options['about_cta_url'] ) ? $responsive_options['about_cta_url'] : '';
		?>
			<?php if ( ! empty( $responsive_about_title ) ) { ?>
				<h2 class="section_title"><?php echo esc_html( $responsive_about_title ); ?></h2>
			<?php } ?>
			<?php if ( ! empty( $responsive_about_text ) ) { ?>
				<p class="about_text"><?php echo esc_html( $responsive_about_text ); ?></p>
			<?php } ?>
		</div>
		<div class="about_cta about-cta grid col-300 fit">
				<a href="<?php echo esc_url( $responsive_about_cta_url ); ?>" class="about-cta-button <?php echo esc_attr( $button_class ); ?>">
				<?php
				if ( isset( $responsive_options['about_cta_text'] ) ) {
					echo esc_html( $responsive_options['about_cta_text'] );
				}
				?>
			</a>

		</div>
	</div>
</div> <!--  -->

<!--  </div>-->
<?php } ?>

<?php if ( isset( $responsive_options['feature'] ) && '1' == $responsive_options['feature'] ) { ?>
<div id="feature_div" class="custom-home-feature-section grid">
	<?php
	$responsive_feature_title = isset( $responsive_options['feature_title'] ) ? $responsive_options['feature_title'] : __( 'Features', 'responsive' );

	if ( isset( $responsive_options['feature1'] ) ) {
		$responsive_feature1_post_id = $responsive_options['feature1'];
		if ( ! '' == $responsive_feature1_post_id ) {
			$responsive_feature1_post = get_post( $responsive_feature1_post_id );
			$responsive_feature1_desc = $responsive_feature1_post->post_content;
			$feature1_showcase_img    = wp_get_attachment_url( get_post_thumbnail_id( $responsive_feature1_post_id ) );
			$feature1_showcase_title  = get_the_title( $responsive_feature1_post_id );
			$image_id                 = attachment_url_to_postid( $feature1_showcase_img );
			$responsive_alt1_text     = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
			if ( '' == $responsive_alt1_text ) {
				$responsive_alt1_text = get_the_title( $responsive_feature1_post_id );
			}
		}
	} else {
		$responsive_feature1_post_id = '';
	}

	if ( isset( $responsive_options['feature2'] ) ) {
		$responsive_feature2_post_id = $responsive_options['feature2'];
		if ( ! '' == $responsive_feature2_post_id ) {
			$responsive_feature2_post = get_post( $responsive_feature2_post_id );
			$responsive_feature2_desc = $responsive_feature2_post->post_content;
			$feature2_showcase_img    = wp_get_attachment_url( get_post_thumbnail_id( $responsive_feature2_post_id ) );
			$feature2_showcase_title  = get_the_title( $responsive_feature2_post_id );
			$image_id                 = attachment_url_to_postid( $feature2_showcase_img );
			$responsive_alt2_text     = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
			if ( '' == $responsive_alt2_text ) {
				$responsive_alt2_text = get_the_title( $responsive_feature2_post_id );
			}
		}
	} else {
		$responsive_feature2_post_id = '';
	}
	if ( isset( $responsive_options['feature3'] ) ) {
		$responsive_feature3_post_id = $responsive_options['feature3'];
		if ( ! '' == $responsive_feature3_post_id ) {
			$responsive_feature3_post = get_post( $responsive_feature3_post_id );
			$responsive_feature3_desc = $responsive_feature3_post->post_content;
			$feature3_showcase_img    = wp_get_attachment_url( get_post_thumbnail_id( $responsive_feature3_post_id ) );
			$feature3_showcase_title  = get_the_title( $responsive_feature3_post_id );
			$image_id                 = attachment_url_to_postid( $feature3_showcase_img );
			$responsive_alt3_text     = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
			if ( '' == $responsive_alt3_text ) {
				$responsive_alt3_text = get_the_title( $responsive_feature3_post_id );
			}
		}
	} else {
		$responsive_feature3_post_id = '';
	}
	?>
	<?php if ( ! empty( $responsive_feature_title ) ) { ?>
	<h2 class="section_title">
			<span><?php echo esc_html( $responsive_feature_title ); ?></span>
	</h2>
	<?php } ?>

	<div class="feature_main_div feature-main-div">
		<?php if ( ! '' == $responsive_feature1_post_id ) { ?>
		<div class="section-feature grid">
			<div class="feature_img"><img src="<?php echo esc_url( $feature1_showcase_img ); ?>" alt="<?php echo esc_attr( $responsive_alt1_text ); ?>"/></div>
			<div class="feature_title"><?php echo esc_html( $feature1_showcase_title ); ?></div>
			<div class="feature_desc"><?php echo wp_kses_post( $responsive_feature1_desc ); ?></div>
		</div>
		<?php } ?>
		<?php if ( ! '' == $responsive_feature2_post_id ) { ?>
		<div class="section-feature grid">
			<div class="feature_img"><img src="<?php echo esc_url( $feature2_showcase_img ); ?>" alt="<?php echo esc_attr( $responsive_alt2_text ); ?>"/></div>
			<div class="feature_title"><?php echo esc_html( $feature2_showcase_title ); ?></div>
			<div class="feature_desc"><?php echo wp_kses_post( $responsive_feature2_desc ); ?></div>
		</div>
		<?php } ?>
		<?php if ( ! '' == $responsive_feature3_post_id ) { ?>
		<div class="section-feature grid">
			<div class="feature_img"><img src="<?php echo esc_url( $feature3_showcase_img ); ?>" alt="<?php echo esc_attr( $responsive_alt3_text ); ?>"/></div>
			<div class="feature_title"><?php echo esc_html( $feature3_showcase_title ); ?></div>
			<div class="feature_desc"><?php echo wp_kses_post( $responsive_feature3_desc ); ?></div>
		</div>
		<?php } ?>
	</div>
	</div>
<?php } ?>

<?php if ( isset( $responsive_options['testimonials'] ) && '1' == $responsive_options['testimonials'] ) { ?>
<div id="testimonial_div" class="custom-home-testimonial-section grid col-940">
	<?php

		$responsive_testimonial_title = isset( $responsive_options['testimonial_title'] ) ? $responsive_options['testimonial_title'] : __( 'Testimonial', 'responsive' );
		$responsive_testimonial_id    = $responsive_options['testimonial_val'];
	if ( '' != $responsive_testimonial_id ) {
		$responsive_testimonial_desc     = get_post( $responsive_testimonial_id );
		$responsive_testimonial_img      = wp_get_attachment_url( get_post_thumbnail_id( $responsive_testimonial_id ) );
		$image_id                        = attachment_url_to_postid( $responsive_testimonial_img );
		$responsive_testimonial_alt_text = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
		if ( '' == $responsive_testimonial_alt_text ) {
			$responsive_testimonial_alt_text = get_the_title( $responsive_testimonial_id );
		}
		$responsive_testimonial_name         = get_the_title( $responsive_testimonial_id );
		$responsive_testimonial_desc_content = $responsive_testimonial_desc->post_content;
	}
	?>
	<?php if ( ! empty( $responsive_testimonial_title ) ) { ?>
		<h2 class="section_title">
			<span><?php echo esc_html( $responsive_testimonial_title ); ?></span>
		</h2>
	<?php } ?>
	<div class="testimonial-content">
		<?php if ( '' != $responsive_testimonial_id ) { ?>
		<div id="testimonial-img" class="testimonial-img grid col-300">
			<div class="testimonial_main_div">
				<div class="testimonial_img"><img src="<?php echo esc_url( $responsive_testimonial_img ); ?>" alt="<?php echo esc_attr( $responsive_testimonial_alt_text ); ?>"/></div>
			</div>
		</div>

		<div class="testimonial_main_text grid col-620 fit">
			<i class="icon-quote-left" aria-hidden="true"></i>
			<p class="testimonial_text"><?php echo wp_kses_post( $responsive_testimonial_desc_content ); ?></p>
			<h3 class="testimonial_author"><?php echo esc_html( $responsive_testimonial_name ); ?></h3>
		</div>
		<?php } ?>
	</div>
</div>

<?php } ?>
<?php if ( isset( $responsive_options['team'] ) && '1' == $responsive_options['team'] ) { ?>
<div id="team_div" class="custom-home-team-section grid">
	<?php
	$responsive_team_title = isset( $responsive_options['team_title'] ) ? $responsive_options['team_title'] : __( 'Team', 'responsive' );
	if ( isset( $responsive_options['teammember1'] ) ) {
		$responsive_team1_post_id = $responsive_options['teammember1'];
		if ( ! '' == $responsive_team1_post_id ) {
			$responsive_team1_post      = get_post( $responsive_team1_post_id );
			$responsive_team1_desc      = $responsive_team1_post->post_content;
			$team1_showcase_img         = wp_get_attachment_url( get_post_thumbnail_id( $responsive_team1_post_id ) );
			$team1_showcase_title       = get_the_title( $responsive_team1_post_id );
			$team1_showcase_designation = get_post_meta( $responsive_team1_post_id, 'responsive_meta_box_designation', true );
			$team1_showcase_facebook    = get_post_meta( $responsive_team1_post_id, 'responsive_meta_box_facebook', true );
			$team1_showcase_twitter     = get_post_meta( $responsive_team1_post_id, 'responsive_meta_box_twitter', true );
			$team1_showcase_googleplus  = get_post_meta( $responsive_team1_post_id, 'responsive_meta_box_googleplus', true );
			$team1_showcase_linkedin    = get_post_meta( $responsive_team1_post_id, 'responsive_meta_box_text_linkedin', true );
			$image_id                   = attachment_url_to_postid( $team1_showcase_img );
			$responsive_alt1_text       = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
			if ( '' == $responsive_alt1_text ) {
				$responsive_alt1_text = get_the_title( $responsive_team1_post_id );
			}
		}
	} else {
		$responsive_team1_post_id = '';
	}

	if ( isset( $responsive_options['teammember2'] ) ) {
		$responsive_team2_post_id = $responsive_options['teammember2'];
		if ( ! '' == $responsive_team2_post_id ) {
			$responsive_team2_post      = get_post( $responsive_team2_post_id );
			$responsive_team2_desc      = $responsive_team2_post->post_content;
			$team2_showcase_img         = wp_get_attachment_url( get_post_thumbnail_id( $responsive_team2_post_id ) );
			$team2_showcase_title       = get_the_title( $responsive_team2_post_id );
			$team2_showcase_designation = get_post_meta( $responsive_team2_post_id, 'responsive_meta_box_designation', true );
			$team2_showcase_facebook    = get_post_meta( $responsive_team2_post_id, 'responsive_meta_box_facebook', true );
			$team2_showcase_twitter     = get_post_meta( $responsive_team2_post_id, 'responsive_meta_box_twitter', true );
			$team2_showcase_googleplus  = get_post_meta( $responsive_team2_post_id, 'responsive_meta_box_googleplus', true );
			$team2_showcase_linkedin    = get_post_meta( $responsive_team2_post_id, 'responsive_meta_box_text_linkedin', true );
			$image_id                   = attachment_url_to_postid( $team2_showcase_img );
			$responsive_alt2_text       = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
			if ( '' == $responsive_alt2_text ) {
				$responsive_alt2_text = get_the_title( $responsive_team2_post_id );
			}
		}
	} else {
		$responsive_team2_post_id = '';
	}

	if ( isset( $responsive_options['teammember3'] ) ) {
		$responsive_team3_post_id = $responsive_options['teammember3'];
		if ( ! '' == $responsive_team3_post_id ) {
			$responsive_team3_post      = get_post( $responsive_team3_post_id );
			$responsive_team3_desc      = $responsive_team3_post->post_content;
			$team3_showcase_img         = wp_get_attachment_url( get_post_thumbnail_id( $responsive_team3_post_id ) );
			$team3_showcase_title       = get_the_title( $responsive_team3_post_id );
			$team3_showcase_designation = get_post_meta( $responsive_team3_post_id, 'responsive_meta_box_designation', true );
			$team3_showcase_facebook    = get_post_meta( $responsive_team3_post_id, 'responsive_meta_box_facebook', true );
			$team3_showcase_twitter     = get_post_meta( $responsive_team3_post_id, 'responsive_meta_box_twitter', true );
			$team3_showcase_googleplus  = get_post_meta( $responsive_team3_post_id, 'responsive_meta_box_googleplus', true );
			$team3_showcase_linkedin    = get_post_meta( $responsive_team3_post_id, 'responsive_meta_box_text_linkedin', true );
			$image_id                   = attachment_url_to_postid( $team3_showcase_img );
			$responsive_alt3_text       = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
			if ( '' == $responsive_alt3_text ) {
				$responsive_alt3_text = get_the_title( $responsive_team2_post_id );
			}
		}
	} else {
		$responsive_team3_post_id = '';
	}
	?>
	<?php if ( ! empty( $responsive_team_title ) ) { ?>
		<h2 class="section_title">
			<span><?php echo esc_html( $responsive_team_title ); ?></span>
		</h2>
	<?php } ?>

	<div class="team_main_div team-main-div">
		<?php if ( ! '' == $responsive_team1_post_id ) { ?>
		<div class="section-team grid">
			<div class="team_img"><img src="<?php echo esc_url( $team1_showcase_img ); ?>" alt="<?php echo esc_attr( $responsive_alt1_text ); ?>"/></div>
			<div class="team_member"><h3><?php echo esc_html( $team1_showcase_title ); ?></h3></div>
			<div class="team_designation"><?php echo esc_html( $team1_showcase_designation ); ?></div>
			<div class="team_desc"><?php echo wp_kses_post( $responsive_team1_desc ); ?></div>
			<div class="social">
			<?php if ( ! empty( $team1_showcase_facebook ) ) { ?>
						<a class="tw_showcase_facebook" href="<?php echo esc_url( $team1_showcase_facebook ); ?>" target="_blank"><i class="icon-facebook" aria-hidden="true"></i></a>
			<?php } ?>
			<?php if ( ! empty( $team1_showcase_twitter ) ) { ?>
						<a class="tw_showcase_twitter" href="<?php echo esc_url( $team1_showcase_twitter ); ?>" target="_blank"><i class="icon-twitter" aria-hidden="true"></i></a>
			<?php } ?>
			<?php if ( ! empty( $team1_showcase_googleplus ) ) { ?>
					<a class="tw_showcase_googleplus" href="<?php echo esc_url( $team1_showcase_googleplus ); ?>" target="_blank"><i class="icon-google-plus" aria-hidden="true"></i></a>
			<?php } ?>
			<?php if ( ! empty( $team1_showcase_linkedin ) ) { ?>
					<a class="tw_showcase_linkedin" href="<?php echo esc_url( $team1_showcase_linkedin ); ?>" target="_blank"><i class="icon-linkedin" aria-hidden="true"></i></a>
			<?php } ?></div>
		</div>
		<?php } ?>
		<?php if ( ! '' == $responsive_team2_post_id ) { ?>
		<div class="section-team grid">
			<div class="team_img"><img src="<?php echo esc_url( $team2_showcase_img ); ?>" alt="<?php echo esc_attr( $responsive_alt2_text ); ?>"/></div>
			<div class="team_member"><h3><?php echo esc_html( $team2_showcase_title ); ?></h3></div>
			<div class="team_designation"><?php echo esc_html( $team2_showcase_designation ); ?></div>
			<div class="team_desc"><?php echo wp_kses_post( $responsive_team2_desc ); ?></div>
			<div class="social">
			<?php if ( ! empty( $team2_showcase_facebook ) ) { ?>
						<a class="tw_showcase_facebook" href="<?php echo esc_url( $team2_showcase_facebook ); ?>" target="_blank"><i class="icon-facebook" aria-hidden="true"></i></a>
			<?php } ?>
			<?php if ( ! empty( $team2_showcase_twitter ) ) { ?>
						<a class="tw_showcase_twitter" href="<?php echo esc_url( $team2_showcase_twitter ); ?>" target="_blank"><i class="icon-twitter" aria-hidden="true"></i></a>
			<?php } ?>
			<?php if ( ! empty( $team2_showcase_googleplus ) ) { ?>
					<a class="tw_showcase_googleplus" href="<?php echo esc_url( $team2_showcase_googleplus ); ?>" target="_blank"><i class="icon-google-plus" aria-hidden="true"></i></a>
			<?php } ?>
			<?php if ( ! empty( $team2_showcase_linkedin ) ) { ?>
					<a class="tw_showcase_linkedin" href="<?php echo esc_url( $team2_showcase_linkedin ); ?>" target="_blank"><i class="icon-linkedin" aria-hidden="true"></i></a>
			<?php } ?></div>
		</div>
		<?php } ?>
		<?php if ( ! '' == $responsive_team3_post_id ) { ?>
		<div class="section-team grid">
			<div class="team_img"><img src="<?php echo esc_url( $team3_showcase_img ); ?>" alt="<?php echo esc_attr( $responsive_alt3_text ); ?>"/></div>
			<div class="team_member"><h3><?php echo esc_html( $team3_showcase_title ); ?></h3></div>
			<div class="team_designation"><?php echo esc_html( $team3_showcase_designation ); ?></div>
			<div class="team_desc"><?php echo wp_kses_post( $responsive_team3_desc ); ?></div>
			<div class="social">
			<?php if ( ! empty( $team3_showcase_facebook ) ) { ?>
						<a class="tw_showcase_facebook" href="<?php echo esc_url( $team3_showcase_facebook ); ?>" target="_blank"><i class="icon-facebook" aria-hidden="true"></i></a>
			<?php } ?>
			<?php if ( ! empty( $team3_showcase_twitter ) ) { ?>
						<a class="tw_showcase_twitter" href="<?php echo esc_url( $team3_showcase_twitter ); ?>" target="_blank"><i class="icon-twitter" aria-hidden="true"></i></a>
			<?php } ?>
			<?php if ( ! empty( $team3_showcase_googleplus ) ) { ?>
					<a class="tw_showcase_googleplus" href="<?php echo esc_url( $team3_showcase_googleplus ); ?>" target="_blank"><i class="icon-google-plus" aria-hidden="true"></i></a>
			<?php } ?>
			<?php if ( ! empty( $team3_showcase_linkedin ) ) { ?>
					<a class="tw_showcase_linkedin" href="<?php echo esc_url( $team3_showcase_linkedin ); ?>" target="_blank"><i class="icon-linkedin" aria-hidden="true"></i></a>
			<?php } ?></div>
		</div>
		<?php } ?>
	</div>
</div>
<?php } ?>
