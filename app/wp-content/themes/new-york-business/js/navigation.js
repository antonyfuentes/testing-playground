/* global newYorkBusinessScreenReaderText */
/**
 * Theme functions file.
 *
 * Contains handlers for navigation and widget area.
 */

(function( $ ) {
		  
	var modal = document.getElementById('myModal');
	$(document).ready(function() {
		$("#myBtn").click(function(){
			modal.style.display = "block";
			document.getElementById('main-search-form').focus();
		});
		
		// When the user clicks on <span> (x), close the modal
		$("#search-close").click(function(){
			modal.style.display = "none";
		});				
	});
	
	$(document).keydown(function(event) { 
								 
		  if (event.keyCode == 27 || event.keyCode == 13) { 
			$('#myModal').hide();
		  }
	});
	
	
	$('#myModal :input:last').on('keydown', function (e) { 
		if ($("this:focus") && (e.which == 9)) {
			e.preventDefault();
			$('#myModal :input:first').focus();
		}
	});
	
	$('#search-close').on('keydown', function (e) {
											  
		if ($("this:focus") && (e.shiftKey)) {
			e.preventDefault();
		}
	});
	
	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {			
	// Get the modal			
		if (event.target == modal) {
			modal.style.display = "none";
		}
	} 
		  
	var masthead, menuToggle, siteNavContain, siteNavigation;

	function initMainNavigation( container ) {

		// Add dropdown toggle that displays child menu items.
		var dropdownToggle = $( '<button />', { 'class': 'dropdown-toggle', 'aria-expanded': false })
			.append( newYorkBusinessScreenReaderText.icon )
			.append( $( '<span />', { 'class': 'screen-reader-text', text: newYorkBusinessScreenReaderText.expand }) );

		container.find( '.menu-item-has-children > a, .page_item_has_children > a' ).after( dropdownToggle );

		// Set the active submenu dropdown toggle button initial state.
		container.find( '.current-menu-ancestor > button' )
			.addClass( 'toggled-on' )
			.attr( 'aria-expanded', 'true' )
			.find( '.screen-reader-text' )
			.text( newYorkBusinessScreenReaderText.collapse );
		// Set the active submenu initial state.
		container.find( '.current-menu-ancestor > .sub-menu' ).addClass( 'toggled-on' );

		container.find( '.dropdown-toggle' ).click( function( e ) {
			var _this = $( this ),
				screenReaderSpan = _this.find( '.screen-reader-text' );

			e.preventDefault();
			_this.toggleClass( 'toggled-on' );
			_this.next( '.children, .sub-menu' ).toggleClass( 'toggled-on' );

			_this.attr( 'aria-expanded', _this.attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );	
			

			screenReaderSpan.text( screenReaderSpan.text() === newYorkBusinessScreenReaderText.expand ? newYorkBusinessScreenReaderText.collapse : newYorkBusinessScreenReaderText.expand );
		});
	}

	//init navigation if top menu exist
	if ($('.main-navigation')[0]){
		initMainNavigation( $( '.main-navigation' ) );
	}

	masthead       = $( '#masthead' );
	menuToggle     = masthead.find( '.menu-toggle' );
	siteNavContain = masthead.find( '.main-navigation' );
	siteNavigation = masthead.find( '.main-navigation > div > ul' );

	// Enable menuToggle.
	(function() {

		// Return early if menuToggle is missing.
		if ( ! menuToggle.length ) {
			return;
		}

		// Add an initial value for the attribute.
		menuToggle.attr( 'aria-expanded', 'false' );

		menuToggle.on( 'click.new-york-business', function() {
			siteNavContain.toggleClass( 'toggled-on' );
            //get cart id
            
			$( this ).attr( 'aria-expanded', siteNavContain.hasClass( 'toggled-on' ) );
			var element = document.getElementById("cart-top");
			if(element){
            	element.classList.toggle("show-cart");
			}		
			 
		});
	})();
	
	// Fix sub-menus for touch devices and better focus for hidden submenu items for accessibility.
	(function() {
		if ( ! siteNavigation.length || ! siteNavigation.children().length ) {
			return;
		}

		// Toggle `focus` class to allow submenu access on tablets.
		function toggleFocusClassTouchScreen() {
			if ( 'none' === $( '.menu-toggle' ).css( 'display' ) ) {

				$( document.body ).on( 'touchstart.new-york-business', function( e ) {
					if ( ! $( e.target ).closest( '.main-navigation li' ).length ) {
						$( '.main-navigation li' ).removeClass( 'focus' );
					}
				});

				siteNavigation.find( '.menu-item-has-children > a, .page_item_has_children > a' )
					.on( 'touchstart.new-york-business', function( e ) {
						var el = $( this ).parent( 'li' );

						if ( ! el.hasClass( 'focus' ) ) {
							e.preventDefault();
							el.toggleClass( 'focus' );
							el.siblings( '.focus' ).removeClass( 'focus' );
						}
					});

			} else {
				siteNavigation.find( '.menu-item-has-children > a, .page_item_has_children > a' ).unbind( 'touchstart.new-york-business' );
			}
		}

		if ( 'ontouchstart' in window ) {
			$( window ).on( 'resize.new-york-business', toggleFocusClassTouchScreen );
			toggleFocusClassTouchScreen();
		}

		siteNavigation.find( 'a' ).on( 'focus.new-york-business blur.new-york-business', function() {
			$( this ).parents( '.menu-item, .page_item' ).toggleClass( 'focus' );
		});
	})();
})( jQuery );

