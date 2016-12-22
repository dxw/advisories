/* globals jQuery */

var enquire = require('../../bower_components/enquire/dist/enquire.js')
require('../../bower_components/jquery-accessibleMegaMenu/js/jquery-accessibleMegaMenu.js')

'use strict'

jQuery(function ($) {
  $('.email_button').click(function (e) {
    var confirm
    if (!confirm('Are you sure?')) {
      return
    }
    var data = {
      action: 'send_email',
      target: $(e.target).attr('id'),
      subject: $(e.target).data('subject'),
      body: $($(e.target).data('body')).val()
    }
    console.log(data)
    $('.email_results').removeClass('alert-danger')
    $.post('/wp-admin/admin-ajax.php', data, function (data, status, xhr) {
      $('.email_results').html(data)
      if (status !== 'success') {
        $('.email_results').addClass('alert-danger')
      }
      $('.email_results').removeClass('hidden')
    })
  })
})

jQuery(function ($) {
  $(window).scroll(function () {
    $('.header').addClass('scrolled')
  }).removeClass('scrolled')
})

jQuery(function ($) {
  enquire.register('screen and (min-width:779px)', {
    match: function () {
      // Main Nav
      $('.menu-header-menu-container').accessibleMegaMenu({
        uuidPrefix: 'accessible-nav',
        menuClass: 'nav-menu',
        topNavItemClass: 'nav-item',
        panelClass: 'sub-nav',
        panelGroupClass: 'sub-nav-group',
        hoverClass: 'hover',
        focusClass: 'focus',
        openClass: 'open'
      })
      // hack so that the megamenu doesn't show flash of css animation after the page loads.
      setTimeout(function () {
        $('body').removeClass('init')
      }, 500)
      // Change aria-hidden state
      $('#js-navigation-toggle').attr('aria-hidden', 'true')
    },
    unmatch: function () {
    }
  })
})

// Change aria-hidden state
jQuery(function ($) {
  enquire.register('screen and (max-width:779px)', {
    match: function () {
      $('#js-navigation-toggle').attr('aria-hidden', 'false')
      $('.sub-nav').attr('aria-hidden', 'false')
    },
    unmatch: function () {
      $('#js-navigation-toggle').attr('aria-hidden', 'true')
      $('.sub-nav').attr('aria-hidden', 'true')
    }
  })
})

jQuery(function ($) {
  // Extend jQuery to make a toggle text function.
  jQuery.fn.extend({
    toggleText: function (stateOne, stateTwo) {
      return this.each(function () {
        stateTwo = stateTwo || ''
        $(this).text() !== stateTwo && stateOne ? $(this).text(stateTwo) : $(this).text(stateOne)
      })
    }
  })
})

// Toggle navigation
jQuery(function ($) {
  $('#js-navigation-toggle').click(function () {
    $(this).toggleText('Close', 'Menu')
    $('#js-navigation').toggleClass('open')
  })
})
