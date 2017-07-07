/* globals $ */

$(function(){
  $(window).scroll(function() {
    if ($(this).scrollTop() > 1){  
      $('header.global-header').addClass('sticky');
    }
    else{
      $('header.global-header').removeClass('sticky');
    }
  })
})
