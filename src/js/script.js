(	function( $ ) {
/*

  TOGGLE NAVIGATION MENU

*/
function nav_menu() {
  var
    $toggler = $( '.navbar-toggler .menu-open-btn' ),
    $li      = $( '.li-toggler' ),
    $nav     = $( '.header-menu' )
  ;

  $toggler.on( 'click', function() {
    $nav.addClass( 'open' );
  });

  $( document ).mouseup( function( e ) {
    $nav.removeClass( 'open' );
  });
}
nav_menu();
/*

  SCROLL TO

*/
function scrollTo(){
  $( 'a' ).on( 'click', function( e ) {
    // Make sure this.hash has a value before overriding default behavior
    if ( this.hash !== "" ) {
      e.preventDefault();
      var hash = this.hash; // Store hash

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $( 'html, body' ).animate({
        scrollTop: $( hash ).offset().top - 20
      }, 800, function(){
 
       // Add hash (#) to URL when done scrolling (default click behavior)
        //window.location.hash = hash;
      });
    }
  })
};
scrollTo();
/*

  SKILL ITEMS HIGHLIGHT

*/
function skill_items() {
  $item = $( '.grid-item' );

  $item
    .on( 'mouseover', function() {
      $( this ).find( 'i' ).addClass( 'colored' );
    })
    .on( 'mouseout', function() {
      $( this ).find( 'i' ).removeClass( 'colored' );
    })
}
skill_items();
/*

  MASONRY LAYOUT

*/
function add_masonry() {
	$( '.grid-skill' ).masonry({
	  itemSelector: '.grid-item',
	});

}
add_masonry();
/*

  SCROLL SPY

*/
function add_scrollspy() {
  $( 'body' ).scrollspy({
    target: '#header_nav',
    offset: 70
  });
}
add_scrollspy();
/*

  SWIPER

*/
function testimonials_slider() {
  var
    $swiper_args = {
      loop: true,
      autoplay: {
        delay: 5000,
      },
      grabCursor: true,
      slidesPerView: 1,
      spaceBetween: 0,
      pagination: {
        el: '.testimonials-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.button-next',
        prevEl: '.button-prev',
      },
    },
    $testimonials = new Swiper( '.testimonials-slider', $swiper_args )
  ;
}
testimonials_slider(); /* creates testimonials slider */

function project_slider( $slides_per_view ) {
  var
    $swiper_args = {
      loop: true,
      autoplay: {
        delay: 5000,
      },
      grabCursor: true,
      slidesPerView: $slides_per_view,
      spaceBetween: 30,
      pagination: {
        el: '.project-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.button-next',
        prevEl: '.button-prev',
      },
    },
    $swiper = new Swiper( '.project-slider', $swiper_args )
  ;

  $swiper.update();
  $swiper.navigation.update();
  $swiper.slideReset();
}

function set_slider() {
  var
    $window       = $( window ),
    $width        = $window.width(),
    $mid_screen   = 768,
    $large_screen = 992,
    $string       = '';

  function set_sizes( $name, $number ) {
    $string = $name;
    project_slider( $number );
  }

  if ( $width < $mid_screen ) {
    set_sizes( 'small', 1 );
  }
  else if ( $width > $large_screen ) {
    set_sizes( 'large', 3 );
  }
  else if ( $width > $mid_screen ) {
    set_sizes( 'mid', 2 );
  }

$window.on( 'load resize', function(){
  $width = $window.width()

  /* check for smal screen */
  if ( $width < $mid_screen ) {

    if ( $string != 'small' ) {
      $string = 'small';
      project_slider( 1 );
    }
  }
  /* check for large screen */
  else if ( $width > $large_screen ) {

    if ( $string != 'large' ) {
      $string = 'large';
      project_slider( 3 );
    }
  }
  /* check for mid screen */
  else if ( $width > $mid_screen ) {

    if ( $string != 'mid' ) {
      $string = 'mid';
      project_slider( 2 );
    }
  }

});

}
set_slider();

})(jQuery);