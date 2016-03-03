/**
 * Live-update changed settings in real time in the Customizer preview.
 */
( function( $ ) {
		api = wp.customize;

	// Site title.
	api( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.navbar-brand' ).text( to );
		} );
	} );

	// Site tagline.
	api( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
    
    // Add custom-background-image body class when background image is added.
	api( 'background_image', function( value ) {
		value.bind( function( to ) {
			$( 'body' ).toggleClass( 'custom-background-image', '' !== to );
		} );
	} );
      
	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
				$( '.navbar-brand a,.site-description' ).css( 'color',to );
			
		} );
	} );
} )( jQuery );
