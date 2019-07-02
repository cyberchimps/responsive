<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

$responsive_options = responsive_get_options();
//test for first install no database
$db = get_option( 'responsive_theme_options' );
//test if all options are empty so we can display default text if they are
$empty     = ( empty( $responsive_options['home_headline'] ) && empty( $responsive_options['home_subheadline'] ) && empty( $responsive_options['home_content_area'] ) ) ? false : true;
$emtpy_cta = ( empty( $responsive_options['cta_text'] ) ) ? false : true;

?>
<?php
	$responsive_options = responsive_get_options();
	
	$display_slider = (! empty ($responsive_options['enable_slider']))?$responsive_options['enable_slider']:0;
	
	if ($display_slider == 1) {
		$slider_content = $responsive_options['home_slider'];
	?>
	<div class='slider'><?php echo do_shortcode($slider_content); ?></div>
<?php
}
?>
<div id="content-outer">
<div id="featured" class="grid col-940">

	<div id="featured-content" class="grid col-460">

		<h1 class="featured-title">
			<?php
			if ( isset( $responsive_options['home_headline'] ) && $db && $empty )
				echo $responsive_options['home_headline'];
			else {
				_e( 'HAPPINESS', 'responsive' );
			}
			?>
		</h1>

		<h2 class="featured-subtitle">
			<?php
			if ( isset( $responsive_options['home_subheadline'] ) && $db && $empty )
				echo $responsive_options['home_subheadline'];
			else
				_e( 'IS A WARM CUP', 'responsive' );
			?>
		</h2>

		<?php
		if ( isset( $responsive_options['home_content_area'] ) && $db && $empty ) {
			echo do_shortcode( wpautop( $responsive_options['home_content_area'] ) );
		} else {
			echo '<p>' . __( 'Your title, subtitle and this very content is editable from Theme Option. Call to Action button and its destination link as well. Image on your right can be an image or even YouTube video if you like.', 'responsive' ) . '</p>';
		} ?>


		<?php if ( $responsive_options['cta_button'] == 0 ): ?>

			<div class="call-to-action">
                           <?php 
                           if($responsive_options['button_style'] == 'default')
                            {
                              $button_class = "blue button";
                            }
                           else  if($responsive_options['button_style'] == 'flat_style')
                            {
                               $button_class = "blue button flat";
                            }
                            ?>
				<a href="<?php echo $responsive_options['cta_url']; ?>" class="<?php echo $button_class; ?>">
					<?php
					if ( isset( $responsive_options['cta_text'] ) && $db && $emtpy_cta )
						echo $responsive_options['cta_text'];
					else
						_e( 'Call to Action', 'responsive' );
					?>
				</a>

			</div><!-- end of .call-to-action -->

		<?php endif; ?>

	</div><!-- end of .col-460 -->

	<div id="featured-image" class="grid col-460 fit">

		<?php $featured_content = ( !empty( $responsive_options['featured_content'] ) ) ? $responsive_options['featured_content'] : '<img class="aligncenter" src="' . get_template_directory_uri() . '/core/images/featured-image.png" width="440" height="300" alt="responsivepro featured image" />'; ?>

		<?php echo do_shortcode( wpautop( $featured_content ) ); ?>

	</div><!-- end of #featured-image -->

</div><!-- end of #featured -->
</div>

<?php if ( isset( $responsive_options['about']) && $responsive_options['about'] == '1') { ?>
<?php 
if($responsive_options['button_style'] == 'default')
{
	$button_class = "blue button";
}
else  if($responsive_options['button_style'] == 'flat_style')
{
	$button_class = "blue button flat";
}
?>
<div id="about_div" class="grid col-940">
	<div id="content-outer">
	<div class="about-content grid col-620">
	<?php 
		$responsive_about_title = isset( $responsive_options['about_title']) ?  $responsive_options['about_title'] : 'About Box Title';
		$responsive_about_text = isset( $responsive_options['about_text']) ?  $responsive_options['about_text'] : '';
		$responsive_about_cta_url = isset( $responsive_options['about_cta_url']) ?  $responsive_options['about_cta_url'] : '';
	?>
	<h2 class="section_title"><?php echo esc_html($responsive_about_title);?></h2>
	<p class="about_text"><?php echo esc_html( $responsive_about_text ) ; ?></p>
	</div>
	<div class="about_cta grid col-300 fit">
			<a href="<?php echo $responsive_about_cta_url; ?>" class="about-cta-button <?php echo $button_class; ?>">
			<?php
			if ( isset( $responsive_options['about_cta_text'] ) )
				echo $responsive_options['about_cta_text'];
			
			?>
		</a>
	
	</div>	
	</div>
	
</div> <!--  -->
		
<!--  </div>-->
<?php }?>

<?php if ( isset( $responsive_options['feature']) && $responsive_options['feature'] == '1') { ?>
<div id="content-outer">
<div id="feature_div" class="grid">
	<?php 
	$responsive_feature_title = isset( $responsive_options['feature_title']) ?  $responsive_options['feature_title'] : 'Features';

	if (isset ($responsive_options['feature1'])) {
		$responsive_feature1_post_id = $responsive_options['feature1'];
		if (!$responsive_feature1_post_id ==''){
		$responsive_feature1_post = get_post($responsive_feature1_post_id);
		$responsive_feature1_desc = $responsive_feature1_post->post_content;
		$feature1_showcase_img = wp_get_attachment_url( get_post_thumbnail_id( $responsive_feature1_post_id ) );
		$feature1_showcase_title = get_the_title( $responsive_feature1_post_id );
		$image_id = responsive_get_attachment_id_from_url($feature1_showcase_img);
		$responsive_alt1_text = get_post_meta($image_id, '_wp_attachment_image_alt', true);
		if ($responsive_alt1_text == "")
			$responsive_alt1_text = get_the_title( $responsive_feature1_post_id );
		}
	}
	else 
		$responsive_feature1_post_id='';
		
	if (isset ($responsive_options['feature2'])) {
	$responsive_feature2_post_id = $responsive_options['feature2'];
		if (!$responsive_feature2_post_id ==''){
			$responsive_feature2_post = get_post($responsive_feature2_post_id);
			$responsive_feature2_desc = $responsive_feature2_post->post_content;
			$feature2_showcase_img = wp_get_attachment_url( get_post_thumbnail_id( $responsive_feature2_post_id ) );
			$feature2_showcase_title = get_the_title( $responsive_feature2_post_id );
			$image_id = responsive_get_attachment_id_from_url($feature2_showcase_img);
			$responsive_alt2_text = get_post_meta($image_id, '_wp_attachment_image_alt', true);
			if ($responsive_alt2_text == "")
				$responsive_alt2_text = get_the_title( $responsive_feature2_post_id );
		}
	}
	else
		$responsive_feature2_post_id='';	
	if (isset ($responsive_options['feature3'])) {
	$responsive_feature3_post_id = $responsive_options['feature3'];
		if (!$responsive_feature3_post_id ==''){
			$responsive_feature3_post = get_post($responsive_feature3_post_id);
			$responsive_feature3_desc = $responsive_feature3_post->post_content;
			$feature3_showcase_img = wp_get_attachment_url( get_post_thumbnail_id( $responsive_feature3_post_id ) );
			$feature3_showcase_title = get_the_title( $responsive_feature3_post_id );
			$image_id = responsive_get_attachment_id_from_url($feature3_showcase_img);
			$responsive_alt3_text = get_post_meta($image_id, '_wp_attachment_image_alt', true);
			if ($responsive_alt3_text == "")
				$responsive_alt3_text = get_the_title( $responsive_feature3_post_id );
		}	
	}
	else
		$responsive_feature3_post_id='';
	?>
	<h2 class="section_title"> 
			<span><?php echo esc_html($responsive_feature_title); ?></span>
	</h2>
	
	<div class="feature_main_div">
		<?php if (!$responsive_feature1_post_id ==''){?>
		<div class="section-feature grid">
			<div class="feature_img"><img src="<?php echo esc_url($feature1_showcase_img); ?>" alt="<?php echo esc_attr($responsive_alt1_text); ?>"/></div>
			<div class="feature_title"><?php echo esc_html($feature1_showcase_title); ?></div>			
			<div class="feature_desc"><?php echo $responsive_feature1_desc; ?></div>			
		</div>
		<?php }?>
		<?php if (!$responsive_feature2_post_id ==''){?>
		<div class="section-feature grid">
			<div class="feature_img"><img src="<?php echo esc_url($feature2_showcase_img); ?>" alt="<?php echo esc_attr($responsive_alt2_text); ?>"/></div>
			<div class="feature_title"><?php echo esc_html($feature2_showcase_title); ?></div>			
			<div class="feature_desc"><?php echo $responsive_feature2_desc; ?></div>			
		</div>
		<?php }?>
		<?php if (!$responsive_feature3_post_id ==''){?>
		<div class="section-feature grid">
			<div class="feature_img"><img src="<?php echo esc_url($feature3_showcase_img); ?>" alt="<?php echo esc_attr($responsive_alt3_text); ?>"/></div>
			<div class="feature_title"><?php echo esc_html($feature3_showcase_title); ?></div>			
			<div class="feature_desc"><?php echo $responsive_feature3_desc; ?></div>			
		</div>
		<?php }?>
	</div>
	</div>
</div>		
<?php } ?>

<?php if ( isset( $responsive_options['testimonials']) && $responsive_options['testimonials'] == '1') { ?>
<div id="testimonial_div" class="grid col-940">
<div id="content-outer">
	<?php 
	
		$responsive_testimonial_title = isset( $responsive_options['testimonial_title']) ?  $responsive_options['testimonial_title'] : 'Testimonial';		
		$responsive_testimonial_id = $responsive_options['testimonial_val'];
		if ($responsive_testimonial_id != ''){
		$responsive_testimonial_desc = get_post($responsive_testimonial_id);
		$responsive_testimonial_img        = wp_get_attachment_url( get_post_thumbnail_id( $responsive_testimonial_id ) );
		$image_id = responsive_get_attachment_id_from_url($responsive_testimonial_img);
		$responsive_testimonial_alt_text = get_post_meta($image_id, '_wp_attachment_image_alt', true);
		if ($responsive_testimonial_alt_text == "")
			$responsive_testimonial_alt_text = get_the_title( $responsive_testimonial_id );
		$responsive_testimonial_name      = get_the_title( $responsive_testimonial_id );
		$responsive_testimonial_desc_content = $responsive_testimonial_desc->post_content;
		}
	?>
	<h2 class="section_title"> 
			<span><?php echo esc_html($responsive_testimonial_title); ?></span>
	</h2>
	<?php if($responsive_testimonial_id != '') {?>
	<div id="testimonial-img" class="grid col-300">
		<div class="testimonial_main_div">
			<div class="testimonial_img"><img src="<?php echo esc_url($responsive_testimonial_img); ?>" alt="<?php echo esc_attr($responsive_testimonial_alt_text); ?>"/></div>
		</div>
	</div>	
	
	<div class="grid col-620 fit">	
		<div class="testimonial_main_text">		
		<p class="testimonial_text"><?php echo $responsive_testimonial_desc_content; ?></p>
		<p class="testimonial_author"><?php echo esc_html($responsive_testimonial_name); ?></p>		
		</div>
	</div>	
	<?php }?>
</div>		
</div>

<?php }?>
<?php if ( isset( $responsive_options['team']) && $responsive_options['team'] == '1') { ?>
<div id="content-outer">
<div id="team_div" class="grid">
	<?php 
	$responsive_team_title = isset( $responsive_options['team_title']) ?  $responsive_options['team_title'] : 'Team';
	if (isset ($responsive_options['teammember1'])) {	
		$responsive_team1_post_id = $responsive_options['teammember1'];
		if (!$responsive_team1_post_id ==''){
		$responsive_team1_post = get_post($responsive_team1_post_id);
		$responsive_team1_desc = $responsive_team1_post->post_content;
		$team1_showcase_img = wp_get_attachment_url( get_post_thumbnail_id( $responsive_team1_post_id ) );
		$team1_showcase_title = get_the_title( $responsive_team1_post_id );
		$team1_showcase_designation = get_post_meta($responsive_team1_post_id, 'responsive_meta_box_designation', true);
		$team1_showcase_facebook = get_post_meta($responsive_team1_post_id, 'responsive_meta_box_facebook', true);
		$team1_showcase_twitter = get_post_meta($responsive_team1_post_id, 'responsive_meta_box_twitter', true);
		$team1_showcase_googleplus = get_post_meta($responsive_team1_post_id, 'responsive_meta_box_googleplus', true);
		$team1_showcase_linkedin = get_post_meta($responsive_team1_post_id, 'responsive_meta_box_text_linkedin', true);
		$image_id = responsive_get_attachment_id_from_url($team1_showcase_img);
		$responsive_alt1_text = get_post_meta($image_id, '_wp_attachment_image_alt', true);
		if ($responsive_alt1_text == "")
			$responsive_alt1_text = get_the_title( $responsive_team1_post_id );
		}
	}
	else 
		$responsive_team1_post_id='';	
	
	if (isset ($responsive_options['teammember2'])) {
		$responsive_team2_post_id = $responsive_options['teammember2'];
		if (!$responsive_team2_post_id ==''){ 
		$responsive_team2_post = get_post($responsive_team2_post_id);
		$responsive_team2_desc = $responsive_team2_post->post_content;
		$team2_showcase_img = wp_get_attachment_url( get_post_thumbnail_id( $responsive_team2_post_id ) );
		$team2_showcase_title = get_the_title( $responsive_team2_post_id );
		$team2_showcase_designation = get_post_meta($responsive_team2_post_id, 'responsive_meta_box_designation', true);
		$team2_showcase_facebook = get_post_meta($responsive_team2_post_id, 'responsive_meta_box_facebook', true);
		$team2_showcase_twitter = get_post_meta($responsive_team2_post_id, 'responsive_meta_box_twitter', true);
		$team2_showcase_googleplus = get_post_meta($responsive_team2_post_id, 'responsive_meta_box_googleplus', true);
		$team2_showcase_linkedin = get_post_meta($responsive_team2_post_id, 'responsive_meta_box_text_linkedin', true);
		$image_id = responsive_get_attachment_id_from_url($team2_showcase_img);
		$responsive_alt2_text = get_post_meta($image_id, '_wp_attachment_image_alt', true);
		if ($responsive_alt2_text == "")
			$responsive_alt2_text = get_the_title( $responsive_team2_post_id );
		}
	}
	else
		$responsive_team2_post_id='';
	
	if (isset ($responsive_options['teammember3'])) {
		$responsive_team3_post_id = $responsive_options['teammember3'];
		if (!$responsive_team3_post_id ==''){
		$responsive_team3_post = get_post($responsive_team3_post_id);
		$responsive_team3_desc = $responsive_team3_post->post_content;
		$team3_showcase_img = wp_get_attachment_url( get_post_thumbnail_id( $responsive_team3_post_id ) );
		$team3_showcase_title = get_the_title( $responsive_team3_post_id );
		$team3_showcase_designation = get_post_meta($responsive_team3_post_id, 'responsive_meta_box_designation', true);
		$team3_showcase_facebook = get_post_meta($responsive_team3_post_id, 'responsive_meta_box_facebook', true);
		$team3_showcase_twitter = get_post_meta($responsive_team3_post_id, 'responsive_meta_box_twitter', true);
		$team3_showcase_googleplus = get_post_meta($responsive_team3_post_id, 'responsive_meta_box_googleplus', true);
		$team3_showcase_linkedin = get_post_meta($responsive_team3_post_id, 'responsive_meta_box_text_linkedin', true);
		$image_id = responsive_get_attachment_id_from_url($team3_showcase_img);
		$responsive_alt3_text = get_post_meta($image_id, '_wp_attachment_image_alt', true);
		if ($responsive_alt3_text == "")
			$responsive_alt3_text = get_the_title( $responsive_team2_post_id );
		}
	}
	else
		$responsive_team3_post_id='';
	?>
	<h2 class="section_title"> 
			<span><?php echo esc_html($responsive_team_title); ?></span>
	</h2>
	
	<div class="team_main_div">
		<?php if (!$responsive_team1_post_id ==''){?>
		<div class="section-team grid">
			<div class="team_img"><img src="<?php echo esc_url($team1_showcase_img); ?>" alt="<?php echo esc_attr($responsive_alt1_text); ?>"/></div>
			<div class="team_member"><?php echo esc_html($team1_showcase_title); ?></div>
			<div class="team_designation"><?php echo esc_html($team1_showcase_designation); ?></div>
			<div class="team_desc"><?php echo $responsive_team1_desc; ?></div>
			<div class="social">
			<?php if(!empty($team1_showcase_facebook)) { ?>
						<a class="tw_showcase_facebook" href="<?php echo esc_url($team1_showcase_facebook); ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
			<?php } ?>
			<?php if(!empty($team1_showcase_twitter)) { ?>
						<a class="tw_showcase_twitter" href="<?php echo esc_url($team1_showcase_twitter); ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
			<?php } ?>
			<?php if(!empty($team1_showcase_googleplus)) { ?>
					<a class="tw_showcase_googleplus" href="<?php echo esc_url($team1_showcase_googleplus); ?>" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
			<?php } ?>
			<?php if(!empty($team1_showcase_linkedin)) { ?>
					<a class="tw_showcase_linkedin" href="<?php echo esc_url($team1_showcase_linkedin); ?>" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
			<?php } ?></div>
		</div>
		<?php }?>
		<?php if (!$responsive_team2_post_id ==''){?>
		<div class="section-team grid">
			<div class="team_img"><img src="<?php echo esc_url($team2_showcase_img); ?>" alt="<?php echo esc_attr($responsive_alt2_text); ?>"/></div>
			<div class="team_member"><?php echo esc_html($team2_showcase_title); ?></div>
			<div class="team_designation"><?php echo esc_html($team2_showcase_designation); ?></div>
			<div class="team_desc"><?php echo $responsive_team2_desc; ?></div>
			<div class="social">			
			<?php if(!empty($team2_showcase_facebook)) { ?>
						<a class="tw_showcase_facebook" href="<?php echo esc_url($team2_showcase_facebook); ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
			<?php } ?>
			<?php if(!empty($team2_showcase_twitter)) { ?>
						<a class="tw_showcase_twitter" href="<?php echo esc_url($team2_showcase_twitter); ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
			<?php } ?>
			<?php if(!empty($team2_showcase_googleplus)) { ?>
					<a class="tw_showcase_googleplus" href="<?php echo esc_url($team2_showcase_googleplus); ?>" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
			<?php } ?>
			<?php if(!empty($team2_showcase_linkedin)) { ?>
					<a class="tw_showcase_linkedin" href="<?php echo esc_url($team2_showcase_linkedin); ?>" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
			<?php } ?></div>
		</div>
		<?php }?>
		<?php if (!$responsive_team3_post_id ==''){?>
		<div class="section-team grid">
			<div class="team_img"><img src="<?php echo esc_url($team3_showcase_img); ?>" alt="<?php echo esc_attr($responsive_alt3_text); ?>"/></div>
			<div class="team_member"><?php echo esc_html($team3_showcase_title); ?></div>
			<div class="team_designation"><?php echo esc_html($team3_showcase_designation); ?></div>
			<div class="team_desc"><?php echo $responsive_team3_desc; ?></div>
			<div class="social">
			<?php if(!empty($team3_showcase_facebook)) { ?>
						<a class="tw_showcase_facebook" href="<?php echo esc_url($team3_showcase_facebook); ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
			<?php } ?>
			<?php if(!empty($team3_showcase_twitter)) { ?>
						<a class="tw_showcase_twitter" href="<?php echo esc_url($team3_showcase_twitter); ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
			<?php } ?>
			<?php if(!empty($team3_showcase_googleplus)) { ?>
					<a class="tw_showcase_googleplus" href="<?php echo esc_url($team3_showcase_googleplus); ?>" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
			<?php } ?>
			<?php if(!empty($team3_showcase_linkedin)) { ?>
					<a class="tw_showcase_linkedin" href="<?php echo esc_url($team3_showcase_linkedin); ?>" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
			<?php } ?></div>
		</div>
		<?php }?>
	</div>
</div>
</div>
<?php }?>
