module.exports = function(grunt) {
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		sass: {
			options: {
				includePaths: ['bower_components/foundation/scss']
			},
	      
			dev: {
				options: {
					outputStyle: 'expanded'
				},
		        files: {
		          'css/style.css': 'scss/style.scss',
		          'css/custom-login.css': 'scss/custom-login.scss'
		        }        
			},
	
			release: {
				options: {
					outputStyle: 'compressed'
				},
				files: {
					'css/style.min.css': 'scss/style.scss',
					'css/custom-login.min.css': 'scss/custom-login.scss'
				}        
			}
		},
	
	    watch: {
			grunt: {
				files: ['Gruntfile.js']
			},
	
			sass: {
				files: 'scss/**/*.scss',
				tasks: 'sass:dev'
			},
	      
			php: {
				files: ['*.php', 'inc/{,*/}*.php', 'templates/{,*/}*.php', 'tplparts/{,*/}*.php'],
			},

		    options: {
		        livereload: true,
		        spawn: false
		    }
	    },

		/* Multiple files per target @source: //github.com/gruntjs/grunt-contrib-concat */
		concat: {
			dev: {
				files: {
					'js/vendor.js': ['bower_components/modernizr/modernizr.js','bower_components/foundation/js/foundation.js'],
					'js/theme.js': ['js/soblossom.js','js/skip-link-focus-fix.js'],
				},
			},
		},
		
		/* Basic compression @source: //github.com/gruntjs/grunt-contrib-uglify */
		uglify: {
		    release: {
				files: {
				    'js/soblossom.min.js': ['js/vendor.js', 'js/theme.js']
				}
		    }
		},

    	/* @source: //npmjs.org/package/grunt-wp-i18n */
	    makepot: {
	        target: {
	            options: {
	                domainPath: '/languages/',    // Where to save the POT file.
	                potFilename: 'soblossom.pot',   // Name of the POT file.
	                type: 'wp-theme'  // Type of project (wp-plugin or wp-theme).
	            }
	        }
	    }
	    
	});

	grunt.loadNpmTasks('grunt-sass');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-wp-i18n');
	
	grunt.registerTask( 'build', [
		'sass'
	]);
	
	grunt.registerTask( 'default', [
		'sass:dev',
		'concat',
		'watch'
	]);

	grunt.registerTask( 'release', [
		'sass:release',
		'concat',
		'uglify:release',
		'makepot'
	]);
}
