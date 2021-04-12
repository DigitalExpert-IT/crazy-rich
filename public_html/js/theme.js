// js Document



(function($) {
    "use strict";
    
    
    $(document).on ('ready', function (){


      // --------------------- SVG convert Function
        $('img.svg').each(function(){
        var $img = $(this);
        var imgID = $img.attr('id');
        var imgClass = $img.attr('class');
        var imgURL = $img.attr('src');
    
        $.get(imgURL, function(data) {
            // Get the SVG tag, ignore the rest
            var $svg = $(data).find('svg');
    
            // Add replaced image's ID to the new SVG
            if(typeof imgID !== 'undefined') {
                $svg = $svg.attr('id', imgID);
            }
            // Add replaced image's classes to the new SVG
            if(typeof imgClass !== 'undefined') {
                $svg = $svg.attr('class', imgClass+' replaced-svg');
            }
    
            // Remove any invalid XML tags as per http://validator.w3.org
            $svg = $svg.removeAttr('xmlns:a');
            
            // Check if the viewport is set, else we gonna set it if we can.
            if(!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
                $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'))
            }
    
            // Replace image with new SVG
            $img.replaceWith($svg);
    
            }, 'xml');
    
        });
      
        // ------------------------------ DropDown 
        var select= $(".theme-dropdown");
          if(select.length) {
             select.chosen({
              no_results_text: "Oops, nothing found!"
            }); 
          }


        // ------------------------------- WOW Animation 
        var wow = new WOW({
            offset:       0,          // distance to the element when triggering the animation (default is 0)
            mobile:       true,       // trigger animations on mobile devices (default is true)
            live:         true,       // act on asynchronously loaded content (default is true)
            scrollContainer: null,    // optional scroll container selector, otherwise use window,
            resetAnimation: true,     // reset animation on end (default is true)
          });
          wow.init();


        
        // -------------------- Remove Placeholder When Focus Or Click
        $("input,textarea").each( function(){
            $(this).data('holder',$(this).attr('placeholder'));
            $(this).on('focusin', function() {
                $(this).attr('placeholder','');
            });
            $(this).on('focusout', function() {
                $(this).attr('placeholder',$(this).data('holder'));
            });     
        });


        // ----------------------------- Range Slider
        $(".range-amount").ionRangeSlider({
            min: 1000,
            max: 50000,
            from: 10000
          });

        // ----------------------------- Range Slider
        $(".range-time").ionRangeSlider({
            min: 1,
            max: 12,
            from: 3
          });


        // ----------------------- Select js
        if ($('.theme-select-dropdown').length) {
          $('.theme-select-dropdown').selectric();
        }
        

        // -------------------------------- Accordion Panel
          if ($('.theme-accordion > .panel').length) {
            $('.theme-accordion > .panel').on('show.bs.collapse', function (e) {
                  var heading = $(this).find('.panel-heading');
                  heading.addClass("active-panel");
                  
            });
            $('.theme-accordion > .panel').on('hidden.bs.collapse', function (e) {
                var heading = $(this).find('.panel-heading');
                  heading.removeClass("active-panel");
                  //setProgressBar(heading.get(0).id);
            });
            $('.panel-heading a').on('click',function(e){
                if($(this).parents('.panel').children('.panel-collapse').hasClass('in')){
                    e.stopPropagation();
                }
            });
          };


        // ------------------------------- Testimonial Slider One 
        var mSlider = $ (".hiw-img-slider");
        if(mSlider.length) {
            mSlider.owlCarousel({
              loop:true,
              nav:false,
              dots:true,
              autoplay:false,
              smartSpeed:1200,
              autoplayHoverPause:true,
              lazyLoad:true,
              items:1
          })
        }


        // --------------------------- Legal page mobile dropdown
          if($('.information-nav .nav-button').length) {
            $(".information-nav .nav-button").on('click', function(){
              $(".information-nav li").toggleClass("show");
              $(".information-nav ul").toggleClass("show-border");
            });
          }



        

        
    });

    
    
})(jQuery)