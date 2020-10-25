// Axios
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
 
// jQuery
global.$ = global.jQuery = require('jquery');
 
// Foundation
require('what-input');
require('foundation-sites');
/** initialize foundation */
$(document).foundation();
 
// App Code

/** jQuery library */
$(function() {

    /** mean navigation menu scroll to */
    $(".top-bar ul li a.scroll").on('click', function(e) {
        e.preventDefault();
        scrollTo($(this).attr("href"), 900, "easeInOutCubic");
    });

    /** btn: back to top */
    var back_top = $("#back_top");
    back_top.on('click', function(e) {
        e.preventDefault();
        scrollTo(0, 900, "easeInOutCubic");
    });
  
    function scrollTo(target, speed, ease) {
        $(window).scrollTo(target, speed, { easing: ease });
    }
  
    $(window).on("scroll", function () {
        if ($(this).scrollTop() > 549) {
            back_top.stop().animate({ opacity: 1 }, 250);
        } else {
            back_top.stop().animate({ opacity: 0 }, 250);
        }
    });

});