/* globals jQuery */

'use strict'

require('calc-polyfill/calc.min.js')
require('./common')

jQuery(function ($) {
  $('.send_email_button').click(function (e) {
    if (!window.confirm('Are you sure?')) {
      return
    }
    var nonce = $('#send_email_nonce').val()
    console.log(nonce)
    var data = {
      action: 'send_email',
      target: $(e.target).attr('id'),
      subject: $(e.target).data('subject'),
      body: $($(e.target).data('body')).val(),
      _ajax_nonce: nonce
    }
    console.log(data)
    $('.email_results').removeClass('alert')
    $.post('/wp-admin/admin-ajax.php', data, function (data, status, xhr) {
      $('.email_results').html(data)
      if (status !== 'success') {
        $('.email_results').addClass('alert')
      }
      $('.email_results').removeClass('hidden')
    })
  })
})
