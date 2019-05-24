
module.exports = function(grunt) {

	require('load-grunt-tasks')(grunt);

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
					'**/*.php',
					'!**/class-tgm-plugin-activation.php',
					'!node_modules/**',
					'!core/**',
					'!build/**',
					'!**/*~'
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
					exclude: ['core/includes/classes/class-tgm-plugin-activation.php', 'core/includes/functions-install.php', 'build/.*'],       // List of files or directories to ignore.
					processPot: function( pot, options ) {
						pot.headers['report-msgid-bugs-to'] = 'https://cyberchimps.com/forum/free/responsive/';
						pot.headers['plural-forms'] = 'nplurals=2; plural=n != 1;';
						pot.headers['last-translator'] = 'Ulrich Pogson <ulrich@cyberchimps.com>\n';
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

		exec: {
			update_po_wti: { // Update WebTranslateIt translation - grunt exec:update_po_wti
				cmd: 'wti pull',
				cwd: 'languages/',
			}
		},

		po2mo: {
			files: {
					src: 'languages/*.po',
				expand: true,
			},
		},

		potomo: {
			dist: {
				options: {
					poDel: false
				},
				files: [{
					expand: true,
					cwd: '<%= dirs.lang %>',
					src: ['*.po'],
					dest: '<%= dirs.lang %>',
					ext: '.mo',
					nonull: true
				}]
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
					'!build/**',
					'!.git/**',
					'!**/.git/**',
					'!Gruntfile.js',
					'!package.json',
					'!.gitignore',
					'!.gitmodules',
					'!**/.gitignore',
					'!**/.gitmodules',
					'!.wti',
					'!**/Gruntfile.js',
					'!**/package.json',
					'!**/README.md',
					'!**/*~'
				],
				dest: 'build/<%= pkg.name %>/'
			},
            ],
		},
    },
	});

	// Default task(s).
	grunt.registerTask( 'default', [ 'clean', 'copy', 'compress' ] );
	grunt.registerTask( 'i18n', [ 'exec', 'po2mo' ] );

};
