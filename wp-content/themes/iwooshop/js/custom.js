jQuery(document).ready(function() {
    
    // jQuery('#slider1').owlCarousel({
    //     animateOut: 'zoomOut',
    //     animateIn: 'zoomIn',
    //     items:1,
    //     margin:30,
    //     stagePadding:30,
    //     smartSpeed:300,
    //     onTranslate:'zoomOut',
    //     mouseDrag:false,
        
    // });

    jQuery("#slider1").owlCarousel({
        items:1,
        margin:0,
        navigation : true, // Show next and prev buttons
		nav: true,
		navText: ["<i aria-hidden='true' class='fa fa-arrow-circle-o-left'></i>","<i aria-hidden='true' class='fa fa-arrow-circle-o-right'></i>"],
        slideSpeed : 300,
        paginationSpeed : 400,
        singleItem:true,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true
 
      // "singleItem:true" is a shortcut for:
      // items : 1, 
      // itemsDesktop : false,
      // itemsDesktopSmall : false,
      // itemsTablet: false,
      // itemsMobile : false
 
  });
  
  jQuery("#gallery_d").owlCarousel({
        items:4,
        margin:0,
        navigation : true, // Show next and prev buttons
		nav: true,
		navText: ["<i aria-hidden='true' class='fa fa-arrow-circle-o-left'></i>","<i aria-hidden='true' class='fa fa-arrow-circle-o-right'></i>"],
        slideSpeed : 300,
        paginationSpeed : 400,
        singleItem:true,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true
 
      // "singleItem:true" is a shortcut for:
      // items : 1, 
      // itemsDesktop : false,
      // itemsDesktopSmall : false,
      // itemsTablet: false,
      // itemsMobile : false
 
  });




    var slider = new bootslider('#bootslider', {
        animationIn: "fadeInUp",
        animationOut: "flipOutX",
        timeout: 5000,
        autoplay: true,
        preload: true,
        pauseOnHover: false,
        thumbnails: false,
        pagination: true,
        mousewheel: false,
        keyboard: true,
        touchscreen: true
    });
    slider.init();

    var $bsslide = jQuery('.bootslider .active');
    var $bsimg = jQuery('.bootslider .bs-background img');

    var imgratio = 1920 / 850; // Change this ratio to your image size

    function setSize() {
        var ratio = $bsslide.width() / $bsslide.height();

        if (ratio >= imgratio) {
            $bsimg.removeClass().addClass('fullwidth');
        }
        else {
            $bsimg.removeClass().addClass('fullheight');
        }
    }

    jQuery(window).resize(function() {
        setSize();
    }).trigger('resize');

    // Nice Scroll js 
    

    var offset = 220;
    var duration = 500;
    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > offset) {
            jQuery('.back-to-top').fadeIn(duration);
        } else {
            jQuery('.back-to-top').fadeOut(duration);
        }
    });
    
    // Back to Top
    jQuery('.back-to-top').click(function(event) {
        event.preventDefault();
        jQuery('html, body').animate({scrollTop: 0}, duration);
        return false;
    });

    // Wow Effect
    wow = new WOW({
        animateClass: 'animated',
        offset:       100,
        callback:     function(box) {
          console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
        }
      }
    );
    wow.init();

    // Add Class

    jQuery('.gallery figure .gallery-icon a').attr("data-lightbox","lightbox");

});

jQuery(function() {
    var button = jQuery('#loginButton');
    var box = jQuery('#loginBox');
    var form = jQuery('#loginForm');
    button.removeAttr('href');
    button.mouseup(function(login) {
        box.toggle();
        button.toggleClass('active_menu');
    });
    form.mouseup(function() { 
        return false;
    });
    jQuery(this).mouseup(function(login) {
        if(!(jQuery(login.target).parent('#loginButton').length > 0)) {
            button.removeClass('active_menu');
            box.hide();
        }
    });
});