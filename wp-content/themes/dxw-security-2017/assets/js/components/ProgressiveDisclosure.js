/* globals $ */

jQuery(function($) {
  $('button.anchor').click(function () {
    if ($(this).siblings('div.details').hasClass('expanded')) {
      $(this).siblings('div.expanded').removeClass('expanded').slideUp(250)
      $(this).removeClass('open')
    } else {
      $(this).siblings('div.details').addClass('expanded').slideDown(250)
      $(this).addClass('open')
    }
  })
});