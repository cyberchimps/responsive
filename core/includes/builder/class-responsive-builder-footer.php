<?php
/**
 * Responsive Builder Footer.
 *
 * @package responsive-builder
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Builder_Footer' ) ) {

    class Responsive_Builder_Footer {

        /**
		 * Member Variable
		 *
		 * @var mixed instance
		 */
		private static $instance = null;

		/**
		 *  Initiator
		 */
		public static function get_instance() {

			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

        public function __construct()
        {

            add_action( 'responsive_footer', array( $this, 'footer_markup' ), 10 );

            add_action( 'responsive_above_footer', array( $this, 'above_footer'), 10 );

            add_action( 'responsive_primary_footer', array( $this, 'primary_footer' ), 10 );

            add_action( 'responsive_below_footer', array( $this, 'below_footer' ), 10 );

            add_action( 'responsive_render_footer_column', array( $this, 'footer_column' ), 10, 2 );

            add_action( 'responsive_footer_social', 'responsive_get_social_icons', 10 );
        }

        /**
         * Main Call for Responsive Footer
         */
        public function footer_markup() {
            get_template_part( 'template-parts/footer/base' );
        }

        /**
         * Footer Above Row
         */
        public function above_footer() {
            if ( $this->display_footer_row( 'above' ) ) {
                get_other_template( 'template-parts/footer/footer', 'row', array( 'row' => 'above' ) );
            }
        }

        /**
         * Footer Primary Row
         */
        public function primary_footer() {
            if ( $this->display_footer_row( 'primary' ) ) {
                get_other_template( 'template-parts/footer/footer', 'row', array( 'row' => 'primary' ) );
            }

        }

        /**
         * Footer Below Row
         */
        public function below_footer() {
            if ( $this->display_footer_row( 'below' ) ) {
                get_other_template( 'template-parts/footer/footer', 'row', array( 'row' => 'below' ) );
            }
        }

        /**
         * Footer Column
         *
         * @param string $row the column row.
         * @param string $column the row column.
         */
        public function footer_column( $row, $column ) {
            $this->render_footer( $row, $column );
        }

        /**
         * Adds support to render footer columns.
         *
         * @param string $row the name of the row.
         * @param string $column the name of the column.
         */
        public function render_footer( $row = 'bottom', $column = '1' ) {
            $elements = get_theme_mod( 'responsive_footer_items', Responsive\Core\get_responsive_customizer_defaults( 'responsive_footer_items' ) );
            if ( isset( $elements ) && isset( $elements[ $row ] ) && isset( $elements[ $row ][ $row . '_' . $column ] ) && is_array( $elements[ $row ][ $row . '_' . $column ] ) && ! empty( $elements[ $row ][ $row . '_' . $column ] ) ) {
                foreach ( $elements[ $row ][ $row . '_' . $column ] as $key => $item ) {
                    $template = apply_filters( 'responsive_footer_elements_template_path', 'template-parts/footer/' . $item, $item, $row, $column );
                    get_template_part( $template );
                }
            }
        }

        /**
         * Checks to see if the row has any content.
         *
         * @param string $row the name of the row.
         * @return bool
         */
        public function display_footer_row( $row = 'bottom' ) {
            $display = false;
            foreach ( array( '1', '2', '3', '4', '5', '6' ) as $column ) {
                $elements = get_theme_mod( 'responsive_footer_items', Responsive\Core\get_responsive_customizer_defaults( 'responsive_footer_items' ) );
                if ( isset( $elements ) && isset( $elements[ $row ] ) && isset( $elements[ $row ][ $row . '_' . $column ] ) && is_array( $elements[ $row ][ $row . '_' . $column ] ) && ! empty( $elements[ $row ][ $row . '_' . $column ] ) ) {
                    $display = true;
                    break;
                }
            }
            return $display;
        }

        /**
         * Adds support to get the footer item count for a specific column.
         *
         * @param string $row the name of the row.
         * @param string $column the name of the column.
         */
        public function footer_column_item_count( $row = 'bottom', $column = '1' ) {
            $count    = 0;
            $elements = get_theme_mod( 'responsive_footer_items', Responsive\Core\get_responsive_customizer_defaults( 'responsive_footer_items' ) );
            if ( isset( $elements ) && isset( $elements[ $row ] ) && isset( $elements[ $row ][ $row . '_' . $column ] ) && is_array( $elements[ $row ][ $row . '_' . $column ] ) && ! empty( $elements[ $row ][ $row . '_' . $column ] ) ) {
                $count = count( $elements[ $row ][ $row . '_' . $column ] );
            }
            return $count;
        }

    }

    Responsive_Builder_Footer::get_instance();
}