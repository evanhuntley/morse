/* ==========================================================================
	General Site Scripts
============================================================================= */

$(document).ready(function() {
	
	/* Init Lightbox -------------------------------- */
	$('.play-btn').magnificPopup({type:'iframe'});
	
	/* Init Flexslider ------------------------------ */
	
	$('.flexslider').flexslider();
	
	/* Handle change in Contact Form Select ---------- */
	
	$('footer select').change(function() {
		
		var $selectedItem = $(this).find(":selected").text();
		$('label[for="event-type"').text($selectedItem);		
		
	});
	
	/* Navigation ----------------------------------- */
	
	$navMenu = $('header nav > ul');
	$accessNav = $('.access-nav ul');
	
	enquire.register("screen and (max-width: 768px)", {
		
		setup: function() {
			$menuContent = $navMenu.html();	
		},
		
		match: function() {
		
			// Move Access Nav Items to Main Menu
			$accessItems = $accessNav.html();
			$accessNav.empty();
			$navMenu.append($accessItems);
			
			// Toggle Menu on Click 
			$('#menu-toggle').click(function() {
			
				$icon = $(this).find('i');
				$currentClass = $icon.attr('class');
				
				if ( $currentClass == "icon-menu") {
					$icon.attr('class', 'icon-close');
				} else {
					$icon.attr('class', 'icon-menu'); 
				}
			
				$('.main-menu').slideToggle();
			});			
			
			// Hide Menu
			$('.main-menu').css("display", "none");	
			
			// Expand Submenus on First Click, Go on Second
			$('header .menu-item-has-children a').click(function(e) {
				  var clicks = $(this).data('clicks');
				  if (clicks) {
				  
				  } else {
				     $(this).next('.sub-menu').slideDown();
				     e.preventDefault();			     
				  }
				  $(this).data('clicks', !clicks);
			});					
			
		},
		
		unmatch: function() {
			
			// Return Nav to Initial State
			$accessNav.append($accessItems);
			$navMenu.html($menuContent);
			
			//Move Social Items
			$('header .social').prependTo('.main-menu');
			
			//Unbind Click Toggle
			$('#menu-toggle').unbind('click');
			
			// Show Menu
			$('.main-menu').css("display", "block");
			$('.sub-menu').removeAttribute('style');
			
		}

	});
	
	
	enquire.register("screen and (min-width: 768px)", {	
	
		match: function() {
			
			//Move Social Items
			$('header .social').prependTo('.main-menu');			
			
		},
		
		unmatch: function() {
			
			//Move Social Items
			$('header .social').appendTo('.main-menu');			
			
		}
	
	});
	
});