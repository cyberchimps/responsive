<?php
/**
 * Responsive SVG Icon Library.
 * This file serves as a centralized repository for SVG icons.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Retrieves an SVG icon by its name from a predefined set of icons.
 *
 * This function returns the SVG markup for the requested icon name.
 * It is useful for centralizing and reusing icons across your theme or plugin.
 *
 * @param string $icon_name The name of the icon to retrieve (e.g., 'facebook', 'youtube').
 * 
 * @return string The SVG markup of the requested icon if found, or an empty string if not found.
 * 
 * @example
 * // Example usage:
 * echo get_svg_icon('facebook'); // Outputs the 'facebook' icon's SVG markup.
 */
function responsive_get_svg_icon($icon_name) {
  $icons = array(
    'behance' => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="28" viewBox="0 0 32 28" > <path d="M28.875 5.297h-7.984v1.937h7.984V5.297zm-3.937 6.656c-1.875 0-3.125 1.172-3.25 3.047h6.375c-.172-1.891-1.156-3.047-3.125-3.047zm.25 9.141c1.188 0 2.719-.641 3.094-1.859h3.453c-1.062 3.266-3.266 4.797-6.672 4.797-4.5 0-7.297-3.047-7.297-7.484 0-4.281 2.953-7.547 7.297-7.547 4.469 0 6.937 3.516 6.937 7.734 0 .25-.016.5-.031.734H21.688c0 2.281 1.203 3.625 3.5 3.625zm-20.86-.782h4.625c1.766 0 3.203-.625 3.203-2.609 0-2.016-1.203-2.812-3.109-2.812H4.328v5.422zm0-8.39h4.391c1.547 0 2.641-.672 2.641-2.344 0-1.813-1.406-2.25-2.969-2.25H4.329v4.594zM0 3.969h9.281c3.375 0 6.297.953 6.297 4.875 0 1.984-.922 3.266-2.688 4.109 2.422.688 3.594 2.516 3.594 4.984 0 4-3.359 5.719-6.937 5.719H0V3.968z"></path> </svg>',
    'facebook' => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" > <path d="M31.997 15.999C31.997 7.163 24.834 0 15.998 0S-.001 7.163-.001 15.999c0 7.985 5.851 14.604 13.499 15.804v-11.18H9.436v-4.625h4.062v-3.525c0-4.01 2.389-6.225 6.043-6.225 1.75 0 3.581.313 3.581.313v3.937h-2.017c-1.987 0-2.607 1.233-2.607 2.498v3.001h4.437l-.709 4.625h-3.728v11.18c7.649-1.2 13.499-7.819 13.499-15.804z" ></path> </svg>',
    'facebookAlt' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" > <path d="M17 3v2h-2c-.552 0-1.053.225-1.414.586S13 6.448 13 7v3a1 1 0 001 1h2.719l-.5 2H14a1 1 0 00-1 1v7h-2v-7a1 1 0 00-1-1H8v-2h2a1 1 0 001-1V7c0-1.105.447-2.103 1.172-2.828S13.895 3 15 3zm1-2h-3c-1.657 0-3.158.673-4.243 1.757S9 5.343 9 7v2H7a1 1 0 00-1 1v4a1 1 0 001 1h2v7a1 1 0 001 1h4a1 1 0 001-1v-7h2c.466 0 .858-.319.97-.757l1-4A1 1 0 0018 9h-3V7h3a1 1 0 001-1V2a1 1 0 00-1-1z"></path> </svg>',
    'facebookAlt2' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="28" viewBox="0 0 16 28" > <path d="M14.984.187v4.125h-2.453c-1.922 0-2.281.922-2.281 2.25v2.953h4.578l-.609 4.625H10.25v11.859H5.469V14.14H1.485V9.515h3.984V6.109C5.469 2.156 7.891 0 11.422 0c1.687 0 3.141.125 3.563.187z"></path> </svg>',
  );

  return isset($icons[$icon_name]) ? $icons[$icon_name] : '';
}
?>
