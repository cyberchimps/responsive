
module.exports = function(grunt) {

	require('load-grunt-tasks')(grunt);
	const sass = require('node-sass');

	// Project configuration.
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		dirs: {
			lang: 'languages',
		},

		checktextdomain: {
			options:{
				text_domain: '<%= pkg.name %>',
				correct_domain: true,
				keywords: [
					'__:1,2d',
					'_e:1,2d',
					'_x:1,2c,3d',
					'esc_html__:1,2d',
					'esc_html_e:1,2d',
					'esc_html_x:1,2c,3d',
					'esc_attr__:1,2d',
					'esc_attr_e:1,2d',
					'esc_attr_x:1,2c,3d',
					'_ex:1,2c,3d',
					'_n:1,2,4d',
					'_nx:1,2,4c,5d',
					'_n_noop:1,2,3d',
					'_nx_noop:1,2,3c,4d'
				]
			},
			files: {
				src:  [
					'*.php',
					'**/*.php',
					'!**/class-tgm-plugin-activation.php',
					'!node_modules/**',
					'!vendor/**',
					'!core/**',
					'!build/**',
					'!package-lock.json',
					'!composer.json',
					'!composer.lock',
					'!phpcs.xml.dist',
					'!**/*~',
					'!.test/**',
					'!tests/**'
				],
				expand: true
			}
		},

		makepot: {
			target: {
				options: {
					domainPath: '/languages/',    // Where to save the POT file.
					mainFile: 'style.css',      // Main project file.
					potFilename: 'responsive.pot',   // Name of the POT file.
					type: 'wp-theme',  // Type of project (wp-plugin or wp-theme).
					exclude: ['core/includes/classes/class-tgm-plugin-activation.php', 'core/includes/functions-install.php', 'build/.*', 'vendor/*'],       // List of files or directories to ignore.
					processPot: function( pot, options ) {
						pot.headers['report-msgid-bugs-to'] = 'https://cyberchimps.com/forum/free/responsive/';
						pot.headers['plural-forms'] = 'nplurals=2; plural=n != 1;';
						pot.headers['last-translator'] = 'CyberChimps <support@cyberchimps.com>\n';
						pot.headers['language-team'] = 'CyberChimps Translate <support@cyberchimps.com>\n';
						pot.headers['x-poedit-basepath'] = '.\n';
						pot.headers['x-poedit-language'] = 'English\n';
						pot.headers['x-poedit-country'] = 'UNITED STATES\n';
						pot.headers['x-poedit-sourcecharset'] = 'utf-8\n';
						pot.headers['x-poedit-keywordslist'] = '__;_e;__ngettext:1,2;_n:1,2;__ngettext_noop:1,2;_n_noop:1,2;_c,_nc:4c,1,2;_x:1,2c;_ex:1,2c;_nx:4c,1,2;_nx_noop:4c,1,2;\n';
						pot.headers['x-textdomain-support'] = 'yes\n';
						return pot;
					}
				}
			}
		},

		sass: {
			options: {
				implementation: sass,
				sourcemap: 'none',
				outputStyle: 'expanded',
				linefeed: 'lf',
			},
			dist: {
				files: [

					/* Main CSS file */
					{
						'core/css/style.css': 'core/sass/style.scss'
					},

					{
						'core/css/sidebar.css': 'core/sass/responsive_sidebar.scss',
					},

					{
						'core/css/header.css': 'core/sass/responsive_header.scss',
					},

					{
						'core/css/footer.css': 'core/sass/responsive_footer.scss',
					},

					{
						'core/css/content.css': 'core/sass/responsive_content.scss',
					},

					{
						'core/css/blog.css': 'core/sass/responsive_blog.scss',
					},

					{
						'core/css/typography.css': 'core/sass/responsive_typography.scss',
					},

					{
						'core/css/wordpress.css': 'core/sass/responsive_wordpress.scss',
					},

					{
						'core/css/gutenberg-front.css': 'core/sass/responsive_gutenberg-front.scss',
					},

					{
						'core/css/woocommerce-pro.css': 'core/sass/responsive_woocommerce-pro.scss',
					},

					{
						'core/css/about-me.css': 'core/sass/responsive_about-me.scss',
					},
					
					{
						'core/css/header_mixin_pro.css': 'core/sass/responsive_header_mixin_pro.scss',
					},


					/* Sensei CSS file */
					{
						'core/css/sensei_content.css': 'core/sass/sensei_content.scss'
					},

					/* WooCommerce */
					{
						'core/css/woocommerce.css': 'core/sass/woocommerce.scss',
					},

					/* Gutenberg Editor */
					{
						'core/css/gutenberg-editor.css': 'core/sass/gutenberg-editor.scss',
					},
				]
			}
		},

		//Compress build directory into <name>.zip and <name>-<version>.zip
		compress: {
			main: {
				options: {
					mode: 'zip',
					archive: './build/<%= pkg.name %>.zip'
				},
				expand: true,
				cwd: 'build/<%= pkg.name %>/',
				src: ['**/*'],
				dest: '<%= pkg.name %>/'
			}
		},

		// Clean up build directory
		clean: {
			main: ['build/<%= pkg.name %>']
		},

		uglify: {
			options: {
				mangle: false
			},
			frontend: {
				files: [
					{
						expand: true,     // Enable dynamic expansion.
						cwd: 'core/js-dev/',      // Src matches are relative to this path.
						src: ['*.js', '!*.min.js'], // Actual pattern(s) to match.
						dest: 'core/js/',   // Destination path prefix.
						ext: '.min.js',   // Dest filepaths will have this extension.
					},
				]
			},
			typography_customize_preview: {
				files: [
					{
						expand: true, // Enable dynamic expansion.
						cwd: 'core/includes/customizer/assets/js/', // Src matches are relative to this path.
						src: ['*.js', '!*.min.js'], // Actual pattern(s) to match.
						dest: 'core/includes/customizer/assets/js/', // Destination path prefix.
						ext: '.min.js', // Dest filepaths will have this extension.
					},
				]
			},
		},

		csscomb: {
			dynamic_mappings: {
				expand: true,
				cwd: 'core/css/',
				src: ['*.css', '!*.min.css'],
				dest: 'core/css/',
				ext: '.css'
			}
		},

		cssmin: {
			style: {
				options: {
					//banner: '/* Theme Name: Responsive Author: CyberChimps.com Version: 1.9.4.9 Text Domain: responsive */'
				},
				files: {
					'core/css/style.min.css': 'core/css/style.css',
					'core/css/style-rtl.min.css': 'core/css/style-rtl.css',
					'core/css/sensei_content.min.css': 'core/css/sensei_content.css',
					'core/css/sensei_content-rtl.min.css': 'core/css/sensei_content-rtl.css',
					'core/css/woocommerce.min.css':  'core/css/woocommerce.css',
					'core/css/woocommerce-rtl.min.css':  'core/css/woocommerce-rtl.css',
					'core/css/gutenberg-editor.min.css':  'core/css/gutenberg-editor.css',
					'core/css/gutenberg-editor-rtl.min.css':  'core/css/gutenberg-editor-rtl.css',
					'core/css/icomoon/style.min.css': 'core/css/icomoon/style.css',
					'core/css/icomoon/style-rtl.min.css': 'core/css/icomoon/style-rtl.css',
					'core/css/lifterlms/lifter_notice.min.css': 'core/css/lifterlms/lifter_notice.css',
					'core/css/lifterlms/lifter_style.min.css': 'core/css/lifterlms/lifter_style.css',
					'core/css/lifterlms/llms.min.css': 'core/css/lifterlms/llms.css',
					'core/css/content.min.css': 'core/css/content.css',
					'core/css/header.min.css': 'core/css/header.css',
					'core/css/footer.min.css': 'core/css/footer.css',
					'core/css/blog.min.css': 'core/css/blog.css',
					'core/css/wordpress.min.css': 'core/css/wordpress.css',
					'core/css/typography.min.css': 'core/css/typography.css',
					'core/css/gutenberg-front.min.css': 'core/css/gutenberg-front.css',
					'core/css/header_mixin_pro.min.css': 'core/css/header_mixin_pro.css',
					'core/css/woocommerce-pro.min.css': 'core/css/woocommerce-pro.css',
					'core/css/about-me.min.css': 'core/css/about-me.css',
					'core/includes/customizer/assets/min/css/dimensions.min.css':'core/includes/customizer/controls/dimensions/dimensions.css',
					'core/includes/customizer/assets/min/css/selectbtn.min.css':'core/includes/customizer/controls/selectbtn/selectbtn.css',
					'core/includes/customizer/assets/min/css/general.min.css': 'core/includes/customizer/controls/general.css',
					'core/includes/customizer/assets/min/css/imageradiobtn.min.css':'core/includes/customizer/controls/imageradiobtn/imageradiobtn.css',
					'core/includes/customizer/assets/min/css/sortable.min.css':'core/includes/customizer/controls/sortable/sortable.css',
					'core/includes/customizer/assets/min/css/social.min.css':'core/includes/customizer/controls/social/social.css',
					'core/includes/customizer/assets/min/css/redirect.min.css':'core/includes/customizer/controls/redirect/redirect.css',
					'core/includes/customizer/assets/min/css/typography.min.css':'core/includes/customizer/controls/typography/typography.css',
					'core/includes/customizer/assets/min/css/multi-select.min.css':'core/includes/customizer/controls/multi-select/multi-select.css',
					'core/includes/customizer/assets/min/css/range-switchers.min.css':'core/includes/customizer/controls/range-with-switchers/range-switchers.css',
					'core/includes/customizer/assets/min/css/row-layout.min.css':'core/includes/customizer/controls/builder-row-layout/row-layout.css',
					'core/includes/customizer/assets/min/css/shadow.min.css':'core/includes/customizer/controls/shadow/shadow.css',
					'core/includes/customizer/assets/min/css/font-presets.min.css':'core/includes/customizer/controls/fontpresets/font-presets.css',
					'core/includes/customizer/assets/min/css/color.min.css':'core/includes/customizer/controls/color/color.css',
					'core/includes/customizer/assets/min/css/contact-info.min.css':'core/includes/customizer/controls/contact-info/contact-info.css',
					'core/includes/customizer/assets/min/css/heading.min.css':'core/includes/customizer/controls/heading/heading.css',
				}
			}
		},
		// Generate RTL .css files.
		rtlcss: {
			options: {
				// rtlcss options
				config: {
					preserveComments: true,
					greedy: true
				},
				// generate source maps
				map: false
			},
			dist: {
				files: [
					{
						expand: true,
						cwd: 'core/css',
						src: [
							'*.css',
							'!*-rtl.css',
							'!*.min.css'
						],
						dest: 'core/css',
						ext: '-rtl.css'
					},
					{
						expand: true,
						cwd: 'core/includes/css',
						src: [
							'*.css',
							'!*-rtl.css',
							'!*.min.css'
						],
						dest: 'core/includes/css',
						ext: '-rtl.css'
					},
					{
						expand: true,
						cwd: 'core/css/icomoon',
						src: [
							'*.css',
							'!*-rtl.css',
							'!*.min.css'
						],
						dest: 'core/css/icomoon',
						ext: '-rtl.css'
					}
				]
			}
		},
		// Copy the theme into the build directory
		copy: {
			main: {
                files: [
                {
                    expand: true,
                    dot: true,
				src:  [
					'**',
					'!node_modules/**',
					'!**/node_modules/**',
					'!bin/**',
					'!build/**',
					'!.git/**',
					'!.circleci/**',
					'!**/output/**',
					'!**/.git/**',
					'!Gruntfile.js',
					'!package.json',
					'!composer.json',
					'!.gitignore',
					'!.codecov.yml',
					'!.prettierrc',
					'!.settings/**',
					'!.prettierignore',
					'!composer.json',
					'!phpcs.xml.dist',
					'!.gitmodules',
					'!package-lock.json',
					'!**/.gitignore',
					'!**/.gitmodules',
					'!.wti',
					'!**/Gruntfile.js',
					'!**/package.json',
					'!composer.lock',
					'!**/README.md',
					'!**/*~',
					'!.editorconfig',
					'!**/.csscomb.json',
					'!.csscomb.json',
					'!**/sass/**',
					'!**/vendor/**',
					'!.sass-cache/**',
					'!**/sass-cache/**',
					'!**/automationtest/**',
					'!tests/**',
					'!bitbucket-pipelines.yml',
					'!**/jenkincodeception/**',
					'!core/css/woocommerce.css.map',
					'!core/css/style.css.map',
					'!core/css/sensei_content.css.map',
					'!package-lock.json',
					'!core/package-lock.json',
					'!core/css/icomoon/selection.json',
					'!travis.yml',
					'!phpunit.xml.dist',
					'!.codeclimate.yml',
					'!.init.sh',
					'!.buildpath',
					'!.gitpod.yml',
					'!.project',
					'!.travis.yml',
					'!.phpcs.xml.dist',
					'!phpcs.xml',
					'!core/js/jquery.min.js',
					'!.test/**',
					'!.sasslintrc.json',
					'!core/includes/customizer/extend-controls/package.json',
					'!core/includes/customizer/extend-controls/package-lock.json',
					'!core/includes/customizer/extend-controls/src/**',
					'!core/includes/customizer/extend-controls/node_modules/**',
					'!core/includes/customizer/extend-controls/build/index.asset.php',
					'!core/includes/customizer/extend-controls/build/index.js.map',
					'!chromedriver',
					'!.DS_Store',
				],
				dest: 'build/<%= pkg.name %>/'
			},
            ],
		},
    },
	shell: {
		multiple: {
			command: [
				'cd core/includes/customizer/extend-controls ',
				'npm install',
				'npm run build'
			].join('&&')
		}
	},
	});

	// Update google Fonts
	grunt.registerTask('google-fonts', function () {
		var done = this.async();
		var request = require('request');
		var fs = require('fs');

		request('https://www.googleapis.com/webfonts/v1/webfonts?key=AIzaSyDu1nDK2o4FpxhrIlNXyPNckVW5YP9HRu8', function (error, response, body) {

			if (response && response.statusCode == 200) {

				var fonts = JSON.parse(body).items.map(function (font) {
					return {
						[font.family] : {
							'variants' : font.variants,
							'category' : font.category
						}
					};
				})

				fs.writeFile('core/includes/customizer/controls/typography/google-fonts.json', JSON.stringify(fonts, undefined, 4), function (err) {
					if (! err ) {
						console.log("Google Fonts Updated!");
					}
				});
			}

		});

	});

	// Default task(s).
	grunt.registerTask( 'updatefonts', [ 'google-fonts' ] );
	grunt.registerTask( 'addtextdomain', ['checktextdomain'] );
	grunt.registerTask( 'rtl', ['rtlcss'] );

	// SASS compile
	grunt.registerTask('scss', ['sass']);
	grunt.registerTask( 'default', [ 'shell:multiple', 'scss', 'rtl', 'uglify', 'cssmin' ] );
	grunt.registerTask( 'build', [ 'shell:multiple','i18n', 'scss', 'rtl', 'uglify', 'cssmin', 'clean', 'copy', 'compress' ] );
	grunt.registerTask( 'i18n', [ 'addtextdomain', 'makepot' ] );

};
