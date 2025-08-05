module.exports = function (grunt) {
  'use strict'

  grunt.loadNpmTasks('grunt-contrib-watch')
  grunt.loadNpmTasks('grunt-sass')
  grunt.loadNpmTasks('grunt-image')
  grunt.loadNpmTasks('grunt-standard')
  grunt.loadNpmTasks('grunt-browserify')
  grunt.loadNpmTasks('grunt-contrib-copy')
  grunt.loadNpmTasks('grunt-contrib-clean')

  const sass = require('sass')

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    clean: {
      production: {
        src: [
          'static/'
        ]
      }
    },

    sass: {
      options: {
        implementation: sass,
        sourceMap: true,
        outputStyle: 'compressed'
      },
      production: {
        files: {
          'static/main.min.css': 'assets/scss/main.scss'
        }
      }
    },

    browserify: {
      options: {
        browserifyOptions: {
          debug: true
        }
      },
      production: {
        files: {
          'static/main.min.js': 'assets/js/main.js'
        }
      }
    },

    copy: {
      production: {
        files: {
          'static/img/favicon.ico': 'assets/img/favicon.ico',
          'static/img/site.webmanifest': 'assets/img/site.webmanifest',
          'static/lib/jquery.min.js': 'node_modules/jquery/dist/jquery.min.js',
          'static/font/poppins-v23-latin-ext-regular.woff2': 'assets/font/poppins-v23-latin-ext-regular.woff2',
          'static/font/poppins-v23-latin-ext-600.woff2': 'assets/font/poppins-v23-latin-ext-600.woff2',
          'static/font/poppins-v23-latin-ext-700.woff2': 'assets/font/poppins-v23-latin-ext-700.woff2'
        }
      }
    },

    image: {
      dynamic: {
        files: [{
          expand: true,
          cwd: 'assets/img',
          src: ['**/*.{png,jpg,gif,svg}'],
          dest: 'static/img'
        }]
      }
    },

    _watch: {
      less: {
        files: ['assets/scss/*.scss', 'assets/scss/*/*.scss'],
        tasks: ['sass']
      },
      js: {
        files: ['assets/js/*.js', 'assets/js/*/*.js'],
        tasks: ['standard', 'browserify']
      }
    },

    standard: {
      production: {
        src: [
          'Gruntfile.js',
          'assets/js/main.js'
        ]
      }
    }
  })

  grunt.renameTask('watch', '_watch')

  grunt.registerTask('watch', [
    'default',
    '_watch'
  ])

  grunt.registerTask('default', [
    'clean',
    'image',
    'sass',
    'standard',
    'copy',
    'browserify'
  ])
}
