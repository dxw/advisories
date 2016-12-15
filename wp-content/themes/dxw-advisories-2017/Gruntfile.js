module.exports = function (grunt) {
  'use strict'

  grunt.loadNpmTasks('grunt-contrib-watch')
  grunt.loadNpmTasks('grunt-sass')
  grunt.loadNpmTasks('grunt-img')
  grunt.loadNpmTasks('grunt-standard')
  grunt.loadNpmTasks('grunt-modernizr')
  grunt.loadNpmTasks('grunt-browserify')
  grunt.loadNpmTasks('grunt-contrib-copy')
  grunt.loadNpmTasks('grunt-contrib-clean')

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    // clean: {
    //   production: {
    //     src: [
    //       'static/'
    //     ]
    //   }
    // },

    sass: {
      options: {
        outputStyle: 'compressed',
        sourceMap: true
      },
      production: {
        files: {
          'static/css/main.min.css': 'assets/scss/main.scss'
        }
      }
    },

    modernizr: {
      production: {
        'crawl': false,
        'customTests': [],
        'dest': 'static/js/lib/modernizr.min.js',
        'tests': [
          'flexbox',
          'svg'
        ],
        'options': [
          'html5printshiv',
          'html5shiv',
          'setClasses',
          'mq'
        ],
        'uglify': true
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
          'static/js/main.min.js': 'assets/js/main.js',
          'static/js/admin.min.js': 'assets/js/admin.js'
        }
      }
    },

    copy: {
      production: {
        files: {
          'static/js/lib/jquery.min.js': 'bower_components/jquery/dist/jquery.min.js'
        }
      }
    },

    img: {
      dist: {
        src: 'assets/img',
        dest: 'static/img'
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
          'assets/js/main.js',
          'assets/js/admin.js'
        ]
      }
    }
  })

  grunt.registerTask('bower-install', 'Installs bower deps', function () {
    var done = this.async()
    var bower = require('bower')

    bower.commands.install().on('end', function () {
      done()
    })
  })

  // // Hack to make `img` task work
  // grunt.registerTask('img-mkdir', 'mkdir static/img', function () {
  //   var fs = require('fs')
  //
  //   fs.mkdirSync('static')
  //   fs.mkdirSync('static/img')
  // })

  grunt.renameTask('watch', '_watch')

  grunt.registerTask('watch', [
    'default',
    '_watch'
  ])

  grunt.registerTask('default', [
    'bower-install',
    'img',
    'sass',
    'standard',
    'copy',
    'browserify',
    'modernizr'
  ])
}
