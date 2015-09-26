'use strict';

module.exports = function (grunt) {
  grunt.initConfig({
    phpunit: {
      classes: {
        dir: './tests/'
      },
      bin: 'vendor/bin/phpunit/'
    }
  });
  grunt.loadNpmTasks('grunt-phpunit');

  grunt.registerTask('default', ['phpunit']);
};
