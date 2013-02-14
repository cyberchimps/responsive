/*!
 * Responsive JS Plugins v1.2.2
 */
// Placeholder
jQuery(function(){
    jQuery('input[placeholder], textarea[placeholder]').placeholder();
});
// FitVids
jQuery(document).ready(function(){
// Target your #container, #wrapper etc.
    jQuery("#wrapper").fitVids();
});

// Have a custom video player? We now have a customSelector option where you can add your own specific video vendor selector (mileage may vary depending on vendor and fluidity of player):
// jQuery("#thing-with-videos").fitVids({ customSelector: "iframe[src^='http://example.com'], iframe[src^='http://example.org']"});
// Selectors are comma separated, just like CSS
// Note: This will be the quickest way to add your own custom vendor as well as test your player's compatibility with FitVids.

// Responsive Menu (TinyNav)
jQuery(".menu").tinyNav({
	active: 'current_page_item', // Set the "active" class for default menu
	label: '', // String: Sets the <label> text for the <select> (if not set, no label will be added)
    header: '' // String: Specify text for "header" and show header instead of the active item
});

// Responsive Menu (Selectbox)
jQuery(function () {
    jQuery(".tinynav").selectbox();
});