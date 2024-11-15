const path = require( 'path' );
const defaultConfig = require("@wordpress/scripts/config/webpack.config");

const isProduction = process.env.NODE_ENV === 'production';

module.exports = {
	...defaultConfig,
	entry: {
		'customizer': path.resolve( process.cwd(), '/src/index.js' ),
	},
	output: {
		filename: '[name].js',
		path: path.resolve( process.cwd(), 'dist/' ),
	},

    module: {
        rules: [
          ...defaultConfig.module.rules,

          {
            test: /\.js$/, // Match .js and .jsx files
            exclude: /node_modules/, // Exclude node_modules
            use: {
              loader: 'babel-loader', // Use babel-loader to transpile files
              options: {
                presets: ['@babel/preset-env', '@babel/preset-react'], // Use env and react presets
                plugins: ['@babel/plugin-proposal-class-properties'], // Add the class properties plugin
              },
            },
          },
        ],
      },

    resolve: {
      extensions: ['.js', '.jsx'], // Resolve these extensions
    },
    devtool: 'source-map', // Enable source maps for easier debugging
    devServer: {
      contentBase: path.join(__dirname, 'dist'), // Serve content from dist
      compress: true,
      port: 9000, // Port number
    },
};