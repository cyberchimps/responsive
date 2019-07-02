module.exports = function(grunt) {

	const sass = require('node-sass');

	require('load-grunt-tasks')(grunt);

	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
	    sass: {
	        options: {
	            implementation: sass,
	            sourceMap: true
	        },
	        dist: {
	            files: {
	                'main.css': 'sass/editor-style.scss'
	            }
	        }
	    }
	});
	grunt.loadNpmTasks('grunt-sass');
	grunt.registerTask('default', ['sass']);
}
