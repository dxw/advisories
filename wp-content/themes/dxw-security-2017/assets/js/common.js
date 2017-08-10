/* globals jQuery */

var ToggleMenu = require('./components/ToggleMenu')
var ToggleMenu = require('./components/StickyNavigation')
var ToggleMenu = require('./components/ProgressiveDisclosure')

jQuery(function ($) {
  'use strict'

  // Change previous/next navigation in pager
 $(function () {
   $('.arrow.previous a').html('<span class="hidden-min-width">Previous<span class="sr-only"> page</span></span>');
   $('.arrow.next a').html('<span class="hidden-min-width">Next<span class="sr-only"> page</span></span>');
 })

})
