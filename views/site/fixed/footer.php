<footer class="ftco-footer ftco-section img">
<div class="overlay"></div>
<div class="container">
<div class="row mb-5 d-flex flex-row justify-content-around">
<div class="col-lg-4 col-md-6 mb-5 mb-md-5">
<div class="ftco-footer-widget mb-4">
<h2 class="ftco-heading-2">About Us</h2>
<p><?php echo prikazTxt("About",'infoRestaurant.txt');?></p>
</div>
</div>
<div class="col-lg-4 col-md-6 mb-5 mb-md-5">
<div class="ftco-footer-widget mb-4">
<h2 class="ftco-heading-2">Have a Questions?</h2>
<div class="block-23 mb-3">
<ul>
<li><span class="icon icon-map-marker"></span><span class="text"><?php echo prikazTxt("Address",'infoRestaurant.txt');?></span></li>
<li><a href=""><span class="icon icon-phone"></span><span class="text"><?php echo prikazTxt("Phone",'infoRestaurant.txt');?></span></a></li>
<li><a href=""><span class="icon icon-envelope"></span><span class="text"><span><?php echo prikazTxt("Email",'infoRestaurant.txt');?></span></a></li>
</ul>
</div>
</div>
</div>
</div>
</div></div>
</footer>
<!--</div>-->

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery-migrate-3.0.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.easing.1.3.js"></script>
<script src="assets/js/jquery.waypoints.min.js"></script>
<script src="assets/js/jquery.stellar.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script src="assets/js/aos.js"></script>
<script src="assets/js/jquery.animateNumber.min.js"></script>
<script src="assets/js/bootstrap-datepicker.js"></script>
<script src="assets/js/jquery.timepicker.min.js"></script>
<script src="assets/js/scrollax.min.js"></script>
<script src="assets/js/main.js"></script>
<script>
    //  AOS.init({
//  	duration: 800,
//  	easing: 'slide'
//  });

(function($) {"use strict";

$(window).stellar({
responsive: true,
parallaxBackgrounds: true,
parallaxElements: true,
horizontalScrolling: false,
hideDistantElements: false,
scrollProperty: 'scroll',
horizontalOffset: 0,
  verticalOffset: 0
});

Scrollax
$.Scrollax();


var fullHeight = function() {

    $('.js-fullheight').css('height', $(window).height());
    $(window).resize(function(){
        $('.js-fullheight').css('height', $(window).height());
    });

};
fullHeight();

// loader
var loader = function() {
    setTimeout(function() { 
        if($('#ftco-loader').length > 0) {
            $('#ftco-loader').removeClass('show');
        }
    }, 1);
};
loader();

// Scrollax
$.Scrollax();

var carousel = function() {
    $('.home-slider').owlCarousel({
    loop:true,
    autoplay: true,
    margin:0,
    animateOut: 'fadeOut',
    animateIn: 'fadeIn',
    nav:false,
    autoplayHoverPause: false,
    items: 1,
    navText : ["<span class='ion-md-arrow-back'></span>","<span class='ion-chevron-right'></span>"],
    responsive:{
      0:{
        items:1,
        nav:false
      },
      600:{
        items:1,
        nav:false
      },
      1000:{
        items:1,
        nav:false
      }
    }
    });
    $('.carousel-work').owlCarousel({
        autoplay: true,
        center: true,
        loop: true,
        items:1,
        margin: 30,
        stagePadding:0,
        nav: true,
        navText: ['<span class="ion-ios-arrow-back">', '<span class="ion-ios-arrow-forward">'],
        responsive:{
            0:{
                items: 1,
                stagePadding: 0
            },
            600:{
                items: 2,
                stagePadding: 50
            },
            1000:{
                items: 3,
                stagePadding: 100
            }
        }
    });

};
carousel();
var counter = function() {
    
    $('#section-counter').waypoint( function( direction ) {

        if( direction === 'down' && !$(this.element).hasClass('ftco-animated') ) {

            var comma_separator_number_step = $.animateNumber.numberStepFactories.separator(',')
            $('.number').each(function(){
                var $this = $(this),
                    num = $this.data('number');
                    console.log(num);
                $this.animateNumber(
                  {
                    number: num,
                    numberStep: comma_separator_number_step
                  }, 7000
                );
            });
            
        }

    } , { offset: '95%' } );

}
counter();

var contentWayPoint = function() {
    var i = 0;
    $('.ftco-animate').waypoint( function( direction ) {

        if( direction === 'down' && !$(this.element).hasClass('ftco-animated') ) {
            
            i++;

            $(this.element).addClass('item-animate');
            setTimeout(function(){

                $('body .ftco-animate.item-animate').each(function(k){
                    var el = $(this);
                    setTimeout( function () {
                        var effect = el.data('animate-effect');
                        if ( effect === 'fadeIn') {
                            el.addClass('fadeIn ftco-animated');
                        } else if ( effect === 'fadeInLeft') {
                            el.addClass('fadeInLeft ftco-animated');
                        } else if ( effect === 'fadeInRight') {
                            el.addClass('fadeInRight ftco-animated');
                        } else {
                            el.addClass('fadeInUp ftco-animated');
                        }
                        el.removeClass('item-animate');
                    },  k * 50, 'easeInOutExpo' );
                });
                
            }, 100);
            
        }

    } , { offset: '95%' } );
};
contentWayPoint();


// navigation
var OnePageNav = function() {
    $(".smoothscroll[href^='#'], #ftco-nav ul li a[href^='#']").on('click', function(e) {
         e.preventDefault();

         var hash = this.hash,
                 navToggler = $('.navbar-toggler');
         $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 700, 'easeInOutExpo', function(){
        window.location.hash = hash;
      });


      if ( navToggler.is(':visible') ) {
          navToggler.click();
      }
    });
    $('body').on('activate.bs.scrollspy', function () {
      console.log('nice');
    })
};
OnePageNav();


// magnific popup
$('.image-popup').magnificPopup({
type: 'image',
closeOnContentClick: true,
closeBtnInside: true,
fixedContentPos: true,
mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
 gallery: {
  enabled: true,
  navigateByImgClick: true,
  preload: [0,1] // Will preload 0 - before current, and 1 after the current image
},
image: {
  verticalFit: true
},
zoom: {
  enabled: true,
  duration: 300 // don't foget to change the duration also in CSS
}
});

$('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
disableOn: 700,
type: 'iframe',
mainClass: 'mfp-fade',
removalDelay: 160,
preloader: false,

fixedContentPos: false
});


$('.appointment_date').datepicker({
  'format': 'm/d/yyyy',
  'autoclose': true
});

$('.appointment_time').timepicker();
})(jQuery);


  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
</body>

</html>