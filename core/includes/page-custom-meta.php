<?php
/**
 * Page Custom Meta box
 *
 * @file           page-custom-meta.php
 * @package        Responsive
 * @author         CyberChimps
 * @copyright      2020 CyberChimps
 * @license        license.txt
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * [responsive_box_add description].
 */
function responsive_add_meta_box() {
	add_meta_box( 'responsive-meta-box-id', 'Responsive Page Options', 'responsive_meta_box', 'page', 'side', 'high' );
}
add_action( 'add_meta_boxes', 'responsive_add_meta_box' );

/**
 * [responsive_box description].
 *
 * @param  [type] $post [description].
 * @return void       [description].
 */
function responsive_meta_box( $post ) {

	// Sidebar.
	$sidebar_choices = array(
		''      => esc_html__( 'Default', 'responsive' ),
		'right' => esc_html__( 'Right Sidebar', 'responsive' ),
		'left'  => esc_html__( 'Left Sidebar', 'responsive' ),
		'no'    => esc_html__( 'No Sidebar', 'responsive' ),
	);
	if ( is_rtl() ) {
		$sidebar_choices = array(
			''      => esc_html__( 'Default', 'responsive' ),
			'right' => esc_html__( 'Left Sidebar', 'responsive' ),
			'left'  => esc_html__( 'Right Sidebar', 'responsive' ),
			'no'    => esc_html__( 'No Sidebar', 'responsive' ),
		);
	}
	?>
	<div class="components-base-control ">
		<div class="components-base-control__field">
			<label for="responsive_page_meta_sidebar_position"><?php esc_html_e( 'Sidebar Position', 'responsive' ); ?></label>
			<select name="responsive_page_meta_sidebar_position" id="responsive_page_meta_sidebar_position" class="components-select-control__input" style="max-width:86%">
				<?php
				foreach ( $sidebar_choices as  $value => $sidebar_choice ) :
					$sidebar_position = get_post_meta( $post->ID, 'responsive_page_meta_sidebar_position', true );
					if ( $sidebar_position === $value ) {
						?>
						<option value="<?php echo esc_attr( $value ); ?>" selected="selected"><?php echo esc_html( $sidebar_choice ); ?></option>

					<?php } else { ?>
						<option value="<?php echo esc_attr( $value ); ?>"><?php echo esc_html( $sidebar_choice ); ?></option>
						<?php
					}

				endforeach;
				?>
			</select>
		</div>
	</div>

	<?php
	$responsive_style_choices = array(
		''              => esc_html__( 'Default', 'responsive' ),
		'boxed'         => esc_html__( 'Boxed', 'responsive' ),
		'content-boxed' => esc_html__( 'Content Boxed', 'responsive' ),
		'flat'          => esc_html__( 'Flat', 'responsive' ),
	);
	?>
	<div class="components-base-control ">
		<div class="components-base-control__field">
			<label for="responsive_page_meta_layout_style"><?php esc_html_e( 'Page Layout Style', 'responsive' ); ?></label>
			<select name="responsive_page_meta_layout_style" id="responsive_page_meta_layout_style" class="components-select-control__input" style="max-width:86%">
				<?php
				foreach ( $responsive_style_choices as  $value => $responsive_style_choice ) :
					$site_style = get_post_meta( get_the_ID(), 'responsive_page_meta_layout_style', true );
					if ( $site_style === $value ) {
						?>
							<option value="<?php echo esc_attr( $value ); ?>" selected="selected"><?php echo esc_html( $responsive_style_choice ); ?></option>

						<?php } else { ?>
							<option value="<?php echo esc_attr( $value ); ?>"><?php echo esc_html( $responsive_style_choice ); ?></option>
						<?php
						}
				endforeach;
				?>
			</select>
		</div>
	</div>

	<?php
	$responsive_style_choices = array(
		''         => esc_html__( 'Default', 'responsive' ),
		'1'        => esc_html__( 'Enable', 'responsive' ),
		'disabled' => esc_html__( 'Disable', 'responsive' ),
	);
	?>
	<div class="components-base-control ">
		<div class="components-base-control__field">
			<label for="responsive_page_meta_transparent_header"><?php esc_html_e( 'Transparent Header', 'responsive' ); ?></label>
			<select name="responsive_page_meta_transparent_header" id="responsive_page_meta_transparent_header" class="components-select-control__input" style="max-width:86%">
				<?php
				foreach ( $responsive_style_choices as  $value => $responsive_style_choice ) :
					$site_style = get_post_meta( get_the_ID(), 'responsive_page_meta_transparent_header', true );
					if ( $site_style == $value ) {
						?>
							<option value="<?php echo esc_attr( $value ); ?>" selected="selected"><?php echo esc_html( $responsive_style_choice ); ?></option>

						<?php } else { ?>
							<option value="<?php echo esc_attr( $value ); ?>"><?php echo esc_html( $responsive_style_choice ); ?></option>
						<?php
						}
				endforeach;
				?>
			</select>
		</div>
	</div>

	<div class="components-base-control ">
		<div class="components-base-control__field">
			<label for="responsive_page_meta_content_width"><?php esc_html_e( 'Content Width in % Max 100 ', 'responsive' ); ?></label>
			<input type="number" value="<?php echo esc_html( get_post_meta( get_the_ID(), 'responsive_page_meta_content_width', true ) ); ?>" name="responsive_page_meta_content_width" id="responsive_page_meta_content_width" class="components-select-control__input" max="100">
		</div>
	</div>

	<?php
}

/**
 * [responsive_box_save description]
 *
 * @param  [type] $post_id [description].
 * @return [type]          [description]
 */
function responsive_box_save( $post_id ) {
	if ( 'page' !== get_post_type() ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( isset( $_POST['responsive_nonce'] ) && wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['responsive_nonce'] ) ), 'the_nonce' ) ) {
		sanitize_text_field( wp_unslash( $_POST['responsive_nonce'] ) );
	}

	if ( isset( $_POST['responsive_page_meta_sidebar_position'] ) ) {
		update_post_meta( $post_id, 'responsive_page_meta_sidebar_position', sanitize_text_field( wp_unslash( $_POST['responsive_page_meta_sidebar_position'] ) ) );
	}

	if ( isset( $_POST['responsive_page_meta_layout_style'] ) ) {
		update_post_meta( $post_id, 'responsive_page_meta_layout_style', sanitize_text_field( wp_unslash( $_POST['responsive_page_meta_layout_style'] ) ) );
	}

	if ( isset( $_POST['responsive_page_meta_transparent_header'] ) ) {
		update_post_meta( $post_id, 'responsive_page_meta_transparent_header', sanitize_text_field( wp_unslash( $_POST['responsive_page_meta_transparent_header'] ) ) );
	}

	if ( isset( $_POST['responsive_page_meta_content_width'] ) ) {
		update_post_meta( $post_id, 'responsive_page_meta_content_width', sanitize_text_field( wp_unslash( $_POST['responsive_page_meta_content_width'] ) ) );
	}

}
add_action( 'save_post', 'responsive_box_save' );
