// Axios
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
 
// jQuery
global.$ = global.jQuery = require('jquery');
 
// Foundation
require('what-input');
require('foundation-sites');
 
// App Code

/** jQuery library */
$(function() {

    /** initialize foundation */
    $(document).foundation();

    /** mean navigation menu scroll to */
    $("#mean_nav ul li a").on('click', function(e) {
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
        if ($(this).scrollTop() > 749) {
            back_top.stop().animate({ opacity: 1 }, 250);
        } else {
            back_top.stop().animate({ opacity: 0 }, 250);
        }
    });
  
/** twitch.tv */
    const width_size = 400
    new Twitch.Embed("luquesti", {
      channel: "luquesti",
      width: width_size,
      height: 300,
      autoplay: false,
      layout: 'video',
      parent: 'localhost',
    });
    new Twitch.Embed("zetohaysoul", {
      channel: "zetohaysoul",
      width: width_size,
      height: 300,
      autoplay: false,
        layout: 'video',
      parent: 'localhost',
    });
    new Twitch.Embed("eyimshadow", {
      channel: "eyimshadow",
      width: width_size,
      height: 300,
      autoplay: false,
      layout: 'video',
      parent: 'localhost',
    });
    new Twitch.Embed("loljenkins", {
      channel: "loljenkins",
      width: width_size,
      height: 300,
      autoplay: false,
      layout: 'video',
      parent: 'localhost',
    });
    new Twitch.Embed("paulokazan", {
      channel: "paulokazan",
      width: width_size,
      height: 300,
      autoplay: false,
      layout: 'video',
      parent: 'localhost',
    });
    // new Twitch.Embed("paulokazan", {
    //   channel: "paulokazan",
    //   width: 400,
    //   height: 300,
    //   autoplay: false,
    //   layout: 'video',
    // parent: 'localhost',
    // });
    // 

});
