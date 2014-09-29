/* ==========================================================================
	General Site Scripts
============================================================================= */

$(document).ready(function() {
	
	$navMenu = $('nav ul');
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