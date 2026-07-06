const defaultConfig = require( '@wordpress/scripts/config/webpack.config' );
const path = require( 'path' );

module.exports = {
	...defaultConfig,
	output: {
		...defaultConfig.output,
		path: path.resolve( process.cwd(), '../js/dashboard' ), // Points to the destination directory
		filename: 'responsive-admin-dashboard.js',  // Sets the specific compiled file name
	},
};