module.exports = function(grunt) {
    grunt.initConfig({
        // Configuration for compiling SCSS to CSS
        sass: {
            options: {
                implementation: require('sass'), // Specify the Sass implementation (Dart Sass)
                sourceMap: true, // Generate source maps for easier debugging
                outputStyle: 'compressed' // Minify the output CSS
            },
            dist: {
                files: {
                    'style.css': 'scss/style.scss' // Output compiled CSS to style.css
                }
            }
        }
    });

    // Load the plugins
    grunt.loadNpmTasks('grunt-sass');

    // Register tasks
    grunt.registerTask('default', ['sass']);
};
