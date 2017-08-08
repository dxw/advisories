/* globals jQuery */

var ToggleMenu = require('./components/ToggleMenu')
var ToggleMenu = require('./components/StickyNavigation')

jQuery(function ($) {
  'use strict'

  // Change previous/next navigation in pager
 $(function () {
   $('.arrow.previous a').html('<span class="hidden-min-width">Previous</span>');
   $('.arrow.next a').html('<span class="hidden-min-width">Next</span>');
 })

})
