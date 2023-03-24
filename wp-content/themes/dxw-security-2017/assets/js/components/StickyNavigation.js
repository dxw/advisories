/* globals $ */

$(function() {
  $(window).scroll(function() {
    const headerHeight = $('header.global-header').outerHeight();

    if ($(window).scrollTop() > headerHeight / 2 && window.innerWidth > 768) {
      $('header.global-header').addClass('sticky');
      $('body').css('margin-top', headerHeight + 'px');
    } else {
      $('header.global-header').removeClass('sticky');
      $('body').css('margin-top', '0');
    }
  })
})
