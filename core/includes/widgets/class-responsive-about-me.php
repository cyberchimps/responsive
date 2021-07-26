<?php
/**
 * Enqueues scripts for the widget
 *
 * @since 4.5.4
 */
function responsive_about_me_scripts() {
	wp_enqueue_media();
	wp_enqueue_script( 'admin_enqueue_scripts', get_theme_file_uri( 'core/js-dev/responsive-about-me-widget.js' ), array( 'jquery' ), RESPONSIVE_THEME_VERSION, true );
}
add_action( 'admin_enqueue_scripts', 'responsive_about_me_scripts' );

/**
 * Responsive About Me widget class
 *
 * @since 4.5.4
 */
class Responsive_About_Me extends WP_Widget {
	/**
	 * Constructor
	 *
	 * @since 4.5.4
	 */
	public function __construct() {
		$args = array(
			'classname'   => 'responsive-about-me-widget-container',
			'description' => __( 'About Me Widget', 'responsive' ),
		);

		parent::__construct( 'responsive_about_me_widget', __( 'About Me', 'responsive' ), $args );
	}

	/**
	 * Widget render function for frontend
	 *
	 * @param array  $args Arguments for the widget.
	 * @param object $instance Current instance of the widget.
	 * @since 4.5.4
	 */
	public function widget( $args, $instance ) {
		extract( $args ); //phpcs:ignore WordPress.PHP.DontExtract.extract_extract
		echo $before_widget; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		$title = apply_filters( 'widget_title', isset( $instance['title'] ) ? $instance['title'] : '' );
		$image = isset( $instance['author_image'] ) ? $instance['author_image'] : '';
		$bio   = isset( $instance['author_bio'] ) ? $instance['author_bio'] : '';

		if ( ! empty( $title ) ) { ?>
		<div class="widget-title">
			<h4><?php echo esc_html( $title ); ?></h4>
			<span class="responsive-about-me__fancy-bg"></span>
		</div>
			<?php
		}

		if ( ! empty( $image ) ) {
			?>
			<div class="responsive-about-me__img">
				<figure class="featured-thumbnail thumbnail large">
					<img src="<?php echo esc_url( $image ); ?>" alt="">
				</figure>
			</div>
		<?php } ?>

		<?php if ( ! empty( $bio ) ) { ?>
			<div class="responsive-about-me__bio"><?php echo esc_html( $instance['author_bio'] ); ?></div>
			<?php
		}
		echo $after_widget; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}

	/**
	 * Widget backend form
	 *
	 * @param object $instance Current instance of the widget.
	 * @since 4.5.4
	 */
	public function form( $instance ) {
		$title = isset( $instance['title'] ) ? $instance['title'] : 'About Me';
		$image = isset( $instance['author_image'] ) ? $instance['author_image'] : '';
		$bio   = isset( $instance['author_bio'] ) ? $instance['author_bio'] : '';

		$title_field_id   = $this->get_field_id( 'title' );
		$title_field_name = $this->get_field_name( 'title' );

		$author_image_field_id   = $this->get_field_id( 'author_image' );
		$author_image_field_name = $this->get_field_name( 'author_image' );

		$author_bio_field_id   = $this->get_field_id( 'author_bio' );
		$author_bio_field_name = $this->get_field_name( 'author_bio' );

		ob_start();
		?>

		<p>
			<label for="<?php echo esc_attr( $title_field_id ); ?>"><?php esc_html_e( 'Title :', 'responsive' ); ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr( $title_field_id ); ?>" name="<?php echo esc_attr( $title_field_name ); ?>" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $author_image_field_id ); ?>"><?php esc_html_e( 'Image :', 'responsive' ); ?></label>

			<?php if ( ! empty( $image ) ) : ?>
				<img class="<?php echo esc_attr( $this->id ); ?>_img" src="<?php echo esc_attr( $image ); ?>" style="margin:0;padding:0;max-width:100%;display:block"/>
				<a href="#" id="<?php echo esc_attr( $this->id ); ?>" class="responsive-image-remove">Remove Image</a>
				<input type="hidden" name="<?php echo esc_attr( $author_image_field_name ); ?>" value="<?php echo esc_url( $image ); ?>" />
			<?php else : ?>
				<img class="<?php echo esc_attr( $this->id ); ?>_img" src="" style="margin:0;padding:0;max-width:100%;display:none"/>
				<a role="button" id="<?php echo esc_attr( $this->id ); ?>" class="button button-primary responsive-custom-upload-media-btn" style="margin-top:7px;margin-left: 5px;"><?php esc_html_e( 'Choose Image', 'responsive' ); ?></a>
				<input type="hidden" name="<?php echo esc_attr( $author_image_field_name ); ?>" value="" />
			<?php endif; ?>
		</p>
		<p>
			<label for="<?php echo esc_attr( $author_bio_field_id ); ?>"><?php esc_html_e( 'Bio :', 'responsive' ); ?></label>
			<textarea class="widefat" name="<?php echo esc_attr( $author_bio_field_name ); ?>" id="<?php echo esc_attr( $author_bio_field_id ); ?>" cols="46" rows="10"><?php echo esc_html( $bio ); ?></textarea>
		</p>

		<?php
		echo ob_get_clean(); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}

	/**
	 * Widget update when the form is updated in the backend
	 *
	 * @param object $new_instance Updated instance of the widget.
	 * @param object $old_instance Old instance of the widget.
	 *
	 * @since 4.5.4
	 */
	public function update( $new_instance, $old_instance ) {
		$instance                 = $old_instance;
		$instance['title']        = wp_strip_all_tags( $new_instance['title'] );
		$instance['author_image'] = wp_strip_all_tags( $new_instance['author_image'] );
		$instance['author_bio']   = wp_strip_all_tags( $new_instance['author_bio'] );

		return $instance;
	}
}
