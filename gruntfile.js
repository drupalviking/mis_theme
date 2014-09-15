module.exports = function(grunt) {
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-compass');
  grunt.initConfig({
    uglify: {
      my_target: {
        files: {
          'scripts/script.js': ['_/scripts/*.js']
        } //files
      } //my_target
    }, //uglify
    compass: {
      dev: {
        options: {
          config: 'config.rb'
        } //options
      } //dev
    }, //compass
    watch: {
      options: { livereload: true },
      scripts: {
        files: ['_/scripts/*.js'],
        tasks: ['uglify']
      }, //script
      sass: {
        files: ['_/sass/*.scss'],
        tasks: ['compass:dev']
      }, //sass
      drupal: {
        files: ['templates/*.php', 'templates/includes/*.inc']
      }
    } //watch
  }) //initConfig
  grunt.registerTask('default', 'watch');
} //exports