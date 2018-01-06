/**
 * Title:
 *    Main Javascript
 * Description:
 *    The main Javascript file where you will write the bulk
 *    of your scripts. Make sure to include this just before
 *    the closing </body> tag.
 * Sections:
 *    $. Your Scripts
 *    $. Grunticon Loader
 */



/* $. Your Scripts - To go within the SIAF (Self invoking annonymous function)
\*----------------------------------------------------------------*/

(function($) {

    /**
     * Setup 'CustomSelect' plugin on all Select elements
     */
    // if(!$('html').hasClass('ie')) {
    //     $("select").each(function() {
    //         new CustomSelect($(this));
    //     });
    // }

    /**
     * Set variable to pool DOM only once.
     */
    var html = $('html');
    var body = $('body');
    var toggleNav = $('.toggle__icon--nav');


    /**
     * Toggle the navigation
     */
    $('.js-toggle-nav').on('click', function() {
        // 1. Toggle the Nav
        body.toggleClass('is-active-nav');

        // 2. Toggle Icons to show whether Nav is active or not
        toggleNav.toggleClass('icon--menu-open').toggleClass('icon--menu-close');
    });


    /**
     * Toggle the filter area
     */
    $('.js-toggle-form').on('click', function() {
        // 1. Toggle the filter area on and off
        body.toggleClass('is-active-form');
    });


    /**
     * Slick stuff
     */
    $('.slider-for').slick({
        autoplay: false,
        arrows: false,
        mobileFirst: true,
        draggable: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        asNavFor: '.slider-nav',
        infinite: false,
        variableWidth: true
    });

    $('.slider-nav').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        asNavFor: '.slider-for',
        centerMode: true,
        infinite: false,
        focusOnSelect: true
    });


    /**
     * Sequential animation
     */
     // Code from here https://stackoverflow.com/questions/16867887/how-can-i-sequentially-fade-in-several-divs
    $('.card--animated').each(function(i) {
        $(this).delay(300*(i+1)).animate({opacity:1}); //Uses the each methods index+1 to create a multiplier on the delay
    });


    /**
     * PrintThis
     */
     $('#js-voucher-print').on('click', function() {
         $('.voucher').printThis({
            pageTitle: "This month's voucher from Chomp"
         });
     });


     /**
      * ACF Map JS
      */

     /*
     *  new_map
     *
     *  This function will render a Google Map onto the selected jQuery element
     *
     *  @type   function
     *  @date   8/11/2013
     *  @since  4.3.0
     *
     *  @param  $el (jQuery element)
     *  @return n/a
     */

     function new_map( $el ) {

        // var
        var $markers = $el.find('.marker');

        // vars
        var args = {
            zoom        : 16,
            center      : new google.maps.LatLng(0, 0),
            mapTypeId   : google.maps.MapTypeId.ROADMAP
        };

        // create map
        var map = new google.maps.Map( $el[0], args);

        // add a markers reference
        map.markers = [];

        // add markers
        $markers.each(function(){

            add_marker( $(this), map );

        });

        // center map
        center_map( map );

        // return
        return map;

     }

     /*
     *  add_marker
     *
     *  This function will add a marker to the selected Google Map
     *
     *  @type   function
     *  @date   8/11/2013
     *  @since  4.3.0
     *
     *  @param  $marker (jQuery element)
     *  @param  map (Google Map object)
     *  @return n/a
     */

     function add_marker( $marker, map ) {

        // var
        var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

        // create marker
        var marker = new google.maps.Marker({
            position    : latlng,
            map         : map
        });

        // add to array
        map.markers.push( marker );

        // if marker contains HTML, add it to an infoWindow
        if( $marker.html() )
        {
            // create info window
            var infowindow = new google.maps.InfoWindow({
                content     : $marker.html()
            });

            // show info window when marker is clicked
            google.maps.event.addListener(marker, 'click', function() {

                infowindow.open( map, marker );

            });
        }

     }

     /*
     *  center_map
     *
     *  This function will center the map, showing all markers attached to this map
     *
     *  @type   function
     *  @date   8/11/2013
     *  @since  4.3.0
     *
     *  @param  map (Google Map object)
     *  @return n/a
     */

     function center_map( map ) {

        // vars
        var bounds = new google.maps.LatLngBounds();

        // loop through all markers and create bounds
        $.each( map.markers, function( i, marker ){

            var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

            bounds.extend( latlng );

        });

        // only 1 marker?
        if( map.markers.length == 1 )
        {
            // set center of map
            map.setCenter( bounds.getCenter() );
            map.setZoom( 16 );
        }
        else
        {
            // fit to bounds
            map.fitBounds( bounds );
        }

     }

     /*
     *  document ready
     *
     *  This function will render each map when the document is ready (page has loaded)
     *
     *  @type   function
     *  @date   8/11/2013
     *  @since  5.0.0
     *
     *  @param  n/a
     *  @return n/a
     */
     // global var
     var map = null;



        $('.acf-map').each(function(){

            // create map
            map = new_map( $(this) );

        });



})(jQuery);



/* $. Grunticon Load
\*----------------------------------------------------------------*/

grunticon([
    stylesheet.dir + "/assets/dist/grunticon/icons.data.svg.css",
    stylesheet.dir + "/assets/dist/grunticon/icons.data.png.css",
    stylesheet.dir + "/assets/dist/grunticon/icons.fallback.css"
]);
