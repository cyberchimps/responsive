<?php
/**
 * Theme Options Class
 *
 * Creates the options from supplied arrays
 *
 * Requires a sections array and an options array
 *
 *
 * @file           Responsive_Options.php
 * @package        Responsive
 * @author         CyberChimps
 * @copyright      CyberChimps
 * @license        license.txt
 * @version        Release: 1.0
 * @since          available since Release 1.9.5
 */

Class Responsive_Options {

	public $sections;

	public $options;

	public $responsive_options;

	/**
	 * Pulls in the arrays for the options and sets up the responsive options
	 *
	 * @param $sections array
	 * @param $options array
	 */
	public function __construct( $sections, $options ) {
		$this->sections           = $sections;
		$this->options            = $options;
		$this->responsive_options = get_option( 'responsive_theme_options' );
		// Set confirmaton text for restore default option as attributes of submit_button().
		$this->attributes['onclick'] = 'return confirm("' . __( 'Do you want to restore?', 'responsive' ) . '\n' . __( 'All theme settings will be lost!', 'responsive' ) . '\n' . __( 'Click OK to Restore.', 'responsive' ) . '")';
	}

	/**
	 * Displays the options, called from class instance
	 *
	 * Loops through sections array
	 *
	 * @return string
	 */
	public function render_display() {
		$html = '';
		$i=1;
		
		foreach( $this->sections as $section ) {
			$this->display_title( $section['id'], $section['title'],$i++);
		}
		$i=1;
		echo '<ul>';
		foreach( $this->sections as $section ) {
			$sub = $this->options[$section['id']];
			$this->display_data($section['id'],$sub,$i++);
		}
		echo '</ul>';
	}
	
	protected function display_title( $id, $title ,$i ) {
	
		$check ='';
		
		if ($i == '1')
			$check = 'checked=checked';
			
		echo '<input type="radio"' . $check . ' name="sky-tabs" id="sky-'. $id .'"  class="sky-tab-content-' . $i . '">';
		echo '<label for="sky-' . $id . '"><span><span><i class="fa fa-bolt"></i>' . esc_html ($title) . ' </span></span></label>';
	
	}
	
	/**
	 * Creates main sections title and container
	 *
	 * Loops through the options array
	 *
	 * @param $title string
	 * @param $sub array
	 *
	 * @return string
	 */
	protected function display_data( $id, $sub, $i ) {
	
		echo '<li class="sky-tab-content-'. $i . '">
			  <div class="typography">';
		//echo '<p>';
		foreach( $sub as $opt ) {
			echo $this->sub_heading( $this->parse_args( $opt ) );
			echo $this->section( $this->parse_args( $opt ) );
		}
		echo $this->save();
		//echo '</p>';
		echo '</div>	 </li>';
	
	}

	/**
	 * Creates main sections title and container
	 *
	 * Loops through the options array
	 *
	 * @param $title string
	 * @param $sub array
	 *
	 * @return string
	 */
	protected function container( $title, $sub ) {

		echo '<h3 class="rwd-toggle"><a href="#">' . esc_html( $title ) . '</a></h3>
                <div class="rwd-container">
                <div class="rwd-block">';
		foreach( $sub as $opt ) {
			echo $this->sub_heading( $this->parse_args( $opt ) );
			echo $this->section( $this->parse_args( $opt ) );
		}

		echo $this->save();
		echo '</div><!-- rwd-block --></div><!-- rwd-container -->';

	}

	/**
	 * Creates the title section for each option input
	 *
	 * @param $title string
	 * @param $subtitle string
	 *
	 * @return string
	 */
	protected function sub_heading( $args ) {

		// If width is not set or it's not set to full then go ahead and create default layout
		if ( !isset( $args['width'] ) || $args['width'] != 'full' ) {
			echo '<div class="grid col-300">';

			echo $args['title'];

			echo $args['subtitle'];

			echo '</div><!-- end of .grid col-300 -->';

		}
	}

	/**
	 * Creates option section with inputs
	 *
	 * Calls option type
	 *
	 * @param $options array
	 *
	 * @return string
	 */
	protected function section( $options ) {

		// If the width is not set to full then create normal grid size, otherwise create full width
		$html = ( !isset( $options['width'] ) || $options['width'] != 'full' ) ? '<div class="grid col-620 fit">' : '<div class="grid col-940">';

		$html .= $this->{$options['type']}( $options );

		$html .= '</div>';

		echo $html;

	}

	/**
	 * Creates text input
	 *
	 * @param $args array
	 *
	 * @return string
	 */
	protected function text( $args ) {

		extract( $args );

		$value = ( !empty( $this->responsive_options[$id] ) ) ? ( $this->responsive_options[$id] ) : '';

		$html = '<input id="' . esc_attr( 'responsive_theme_options[' . $id . ']' ) . '" class="regular-text" type="text" name="' . esc_attr( 'responsive_theme_options[' . $id . ']' ) . '" value="'
			. esc_html( $value ) . '"
        placeholder="' .
			esc_attr( $placeholder ) . '" />
                 <label class="description" for="' . esc_attr( 'responsive_theme_options[' . $id . ']' ) . '">' . esc_html( $description ) . '</label>';

		return $html;
	}

	/**
	 * Creates textarea input
	 *
	 * @param $args array
	 *
	 * @return string
	 */
	protected function textarea( $args ) {

		extract( $args );

		$class[] = 'large-text';
		$classes = implode( ' ', $class );

		$value = ( !empty( $this->responsive_options[$id] ) ) ? $this->responsive_options[$id] : '';

		$html = '<p>' . esc_html( $heading ) . '</p>
                <textarea id="' . esc_attr( 'responsive_theme_options[' . $id . ']' ) . '" class="' . esc_attr( $classes ) . '" cols="50" rows="30" name="' . esc_attr(
				'responsive_theme_options[' . $id .
				']'
			) . '"
                 placeholder="' . $placeholder . '">' .
			esc_html( $value ) .
			'</textarea>
			<label class="description" for="' . esc_attr( 'responsive_theme_options[' . $id . ']' ) . '">' . esc_html( $description ) . '</label>';

		return $html;
	}

	/**
	 * Creates select dropdown input
	 *
	 * Loops through options
	 *
	 * @param $args array
	 *
	 * @return string
	 */
	protected function select( $args ) {

		extract( $args );

		$html = '<select id="' . esc_attr( 'responsive_theme_options[' . $id . ']' ) . '" name="' . esc_attr( 'responsive_theme_options[' . $id . ']' ) . '">';
		foreach( $options as $key => $value ) {
			$html .= '<option' . selected( $this->responsive_options[$id], $key, false ) . ' value="' . esc_attr( $key ) . '">' . esc_html( $value ) . '</option>';
		}
		$html .= '</select>';

		return $html;

	}

	/**
	 * Creates checkbox input
	 *
	 * @param $args array
	 *
	 * @return string
	 */
	protected function checkbox( $args ) {

		extract( $args );

		$checked = ( isset( $this->responsive_options[$id] ) ) ? checked( '1', esc_attr( $this->responsive_options[$id] ), false ) : checked( 0, 1 );

		$html = '<input id="' . esc_attr( 'responsive_theme_options[' . $id . ']' ) . '" name="' . esc_attr( 'responsive_theme_options[' . $id . ']' ) . '" type="checkbox" value="1" ' . $checked . '
         />
                <label class="description" for="' . esc_attr( 'responsive_theme_options[' . $id . ']' ) . '">' . wp_kses_post( $description ) . '</label>';

		return $html;
	}

	/**
	 * Creates description only. No input
	 */
	protected function description( $args ) {

		extract( $args );

		$html = '<p>' . wp_kses_post( $description ) . '</p>';

		return $html;
	}

	/**
	 * Creates save, reset and upgrade buttons
	 *
	 * @return string
	 */
	protected function save() {
		echo '<div class="grid col-940">
                <p class="submit">
				' . get_submit_button( __( 'Save Options', 'responsive' ), 'primary', 'responsive_theme_options[submit]', false ) .
			get_submit_button( __( 'Restore Defaults', 'responsive' ), 'secondary', 'responsive_theme_options[reset]', false, $this->attributes ) . '
                <a href="http://cyberchimps.com/store/responsivepro/" class="button upgrade">' . __( 'Upgrade', 'responsive' ) . '</a>
                </p>                
                </div>';

	}
	public static function options_posts() {
		$options_posts = array();
		$options_posts_obj = get_posts('posts_per_page=-1');
		$options_posts[''] = esc_html(__( 'Choose Post', 'responsive' ));
		foreach ( $options_posts_obj as $posts ) {
			$options_posts[$posts->ID] = $posts->post_title;
		}
		
		return $options_posts;
	}
	/**
	 * Default layouts static function
	 *
	 * @return array
	 */
	public static function valid_layouts() {
		$layouts = array(
			'default'                   => __( 'Default', 'responsive' ),
			'content-sidebar-page'      => __( 'Content/Sidebar', 'responsive' ),
			'sidebar-content-page'      => __( 'Sidebar/Content', 'responsive' ),
			'content-sidebar-half-page' => __( 'Content/Sidebar Half Page', 'responsive' ),
			'sidebar-content-half-page' => __( 'Sidebar/Content Half Page', 'responsive' ),
			'full-width-page'           => __( 'Full Width Page (no sidebar)', 'responsive' )
		);

		return apply_filters( 'responsive_valid_layouts', $layouts );
	}
	/**
	 * Default blog layouts static function
	 *
	 * @return array
	 */
	public static function blog_valid_layouts() {
		$bloglayouts = array(
				'default'                   => __( 'Default', 'responsive' ),
				'content-sidebar-page'      => __( 'Content/Sidebar', 'responsive' ),
				'sidebar-content-page'      => __( 'Sidebar/Content', 'responsive' ),
				'content-sidebar-half-page' => __( 'Content/Sidebar Half Page', 'responsive' ),
				'sidebar-content-half-page' => __( 'Sidebar/Content Half Page', 'responsive' ),
				'full-width-page'           => __( 'Full Width Page (no sidebar)', 'responsive' ),
				'blog-3-col'      			=> __( 'Blog 3 Column', 'responsive' )
		);
	
		return apply_filters( 'responsive_blog_valid_layouts', $bloglayouts );
	}

	/**
	 * Makes sure that every option has all the required args
	 *
	 * @param $args array
	 *
	 * @return array
	 */
	protected function parse_args( $args ) {
		$default_args = array(
			'title'       => '',
			'subtitle'    => '',
			'heading'     => '',
			'type'        => 'text',
			'id'          => '',
			'class'       => array(),
			'description' => '',
			'placeholder' => '',
			'options'     => array()
		);

		$result = array_merge( $default_args, $args );

		return $result;
	}

	/**
	 * Creates editor input
	 *
	 * @param $args array
	 *
	 * @return string
	 */
	protected function editor( $args ) {

		extract( $args );

		$class[] = 'large-text';
		$classes = implode( ' ', $class );

		$value = ( !empty( $this->responsive_options[$id] ) ) ? $this->responsive_options[$id] : '';

		$editor_settings = array(
			'textarea_name' => 'responsive_theme_options[' . $id . ']',
			'media_buttons' => true,
			'tinymce'       => array( 'plugins' => 'wordpress' ),
			'editor_class'  => esc_attr( $classes )
		);

		$html = '<div class="tinymce-editor">';
		ob_start();
		$html .= wp_editor( $value, 'responsive_theme_options_' . $id . '_', $editor_settings );
		$html .= ob_get_contents();
		$html .= '<label class="description" for="' . esc_attr( 'responsive_theme_options[' . $id . ']' ) . '">' . esc_html( $description ) . '</label>';
		$html .= '</div>';
		ob_clean();
		return $html;
	}
}
