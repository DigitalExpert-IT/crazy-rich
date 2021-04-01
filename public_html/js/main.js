(function ($) {
"use strict";


// preloader
function preloader() {
	$('#preloader').delay(0).fadeOut();
};

$(window).on('load', function () {
	preloader(),
		wowanimation();
});



// One Page Nav
var top_offset = $('.header-area').height() + 30;
$('.main-menu nav ul').onePageNav({
	currentClass: 'active',
	scrollOffset: top_offset,
});


// menu toggle
$(".navbar-toggle").on("click", function () {
	$(".navbar-nav").addClass("mobile_menu");
});
$(".navbar-nav li a").on("click", function () {
	$(".navbar-collapse").removeClass("show");
});


// sticky-menu
$(window).on('scroll', function () {
	var scroll = $(window).scrollTop();
	if (scroll < 275) {
		$("#sticky-header").removeClass("sticky-menu");
	} else {
		$("#sticky-header").addClass("sticky-menu");
	}
});


// data - background
$("[data-background]").each(function () {
	$(this).css("background-image", "url(" + $(this).attr("data-background") + ")")
})


// mainSlider
function mainSlider() {
	var BasicSlider = $('.slider-active');
	BasicSlider.on('init', function (e, slick) {
		var $firstAnimatingElements = $('.single-slider:first-child').find('[data-animation]');
		doAnimations($firstAnimatingElements);
	});
	BasicSlider.on('beforeChange', function (e, slick, currentSlide, nextSlide) {
		var $animatingElements = $('.single-slider[data-slick-index="' + nextSlide + '"]').find('[data-animation]');
		doAnimations($animatingElements);
	});
	BasicSlider.slick({
		autoplay: false,
		autoplaySpeed: 10000,
		dots: false,
		fade: true,
		arrows: false,
		responsive: [
			{ breakpoint: 767, settings: { dots: false, arrows: false } }
		]
	});

	function doAnimations(elements) {
		var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
		elements.each(function () {
			var $this = $(this);
			var $animationDelay = $this.data('delay');
			var $animationType = 'animated ' + $this.data('animation');
			$this.css({
				'animation-delay': $animationDelay,
				'-webkit-animation-delay': $animationDelay
			});
			$this.addClass($animationType).one(animationEndEvents, function () {
				$this.removeClass($animationType);
			});
		});
	}
}
mainSlider();


// brand-active
$('.brand-active').slick({
  dots: false,
  infinite: true,
  speed: 1000,
  arrows: false,
  slidesToShow: 4,
  slidesToScroll: 2,
  responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 1,
        infinite: true,
      }
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 767,
      settings: {
        slidesToShow: 2,
		slidesToScroll: 1,
		arrows: false,
      }
    },
    {
      breakpoint: 575,
      settings: {
        slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
      }
    },
  ]
});

// testimonial-active
$('.testimonial-active').slick({
  dots: false,
  infinite: true,
  speed: 1000,
  autoplay: true,
  arrows: false,
  slidesToShow: 3,
  slidesToScroll: 2,
  responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 2,
        infinite: true,
      }
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 767,
      settings: {
        slidesToShow: 2,
		slidesToScroll: 1,
		arrows: false,
      }
    },
    {
      breakpoint: 575,
      settings: {
        slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
      }
    },
  ]
});


// aos-active
AOS.init({
	duration: 1000,
	mirror: true
});

/* magnificPopup img view */
$('.popup-image').magnificPopup({
	type: 'image',
	gallery: {
	  enabled: true
	}
});

/* magnificPopup video view */
$('.popup-video').magnificPopup({
	type: 'iframe'
});


// counterUp
$('.count').counterUp({
	delay: 10,
	time: 2000
});


// skrollr
skrollr.init({
	forceHeight: false,
	mobileCheck: function () {
		if ((/Android|iPhone|iPad|iPod|BlackBerry|Windows Phone/i).test(navigator.userAgent || navigator.vendor || window.opera)) {
			//alert('mobile');
			//setScrollTop(0);
			//Where should I set setScrollTop(0); ???
		}
	}
});


// paroller
if ($('.paroller').length) {
	$('.paroller').paroller();
}


// scrollToTop
$.scrollUp({
	scrollName: 'scrollUp',
	topDistance: '300',
	topSpeed: 300,
	animation: 'fade',
	animationInSpeed: 200,
	animationOutSpeed: 200,
	scrollText: '<i class="fas fa-level-up-alt"></i>',
	activeOverlay: false,
});


// WOW active
function wowanimation() {
	var wow = new WOW({
		boxClass: 'wow',
		animateClass: 'animated',
		offset: 0,
		mobile: false,
		live: true
	});
	wow.init();
}


})(jQuery);