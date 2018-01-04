// JavaScript Document
jQuery(document).ready(function($) {
        // Apply Bootstrap classes for some WordPress components
	"use strict";
	
	if( jQuery('.fancybox').length )
	jQuery('.fancybox').fancybox();	
	
		
	if( $("#owl-classes").length )
	{
		var owl = $("#owl-classes");
		
		owl.owlCarousel({
		
		items : 3, //10 items above 1000px browser width
		itemsDesktop : [1000,3], //5 items between 1000px and 901px
		itemsDesktopSmall : [900,3], // 3 items betweem 900px and 601px
		itemsTablet: [640,2],
		itemsMobile : [480,1], // itemsMobile disabled - inherit from itemsTablet option
		navigation: false,
		pagination: true,
		autoPlay:true
		});
	}

	if( $("#owl-teachers").length )
	{
		var owl = $("#owl-teachers");
		
		owl.owlCarousel({
		
		items : 2, //10 items above 1000px browser width
		itemsDesktop : [1000,2], //5 items between 1000px and 901px
		itemsDesktopSmall : [900,2], // 3 items betweem 900px and 601px
		itemsTablet: [600,1],
		itemsMobile : [480,1], // itemsMobile disabled - inherit from itemsTablet option
		navigation: false,
		pagination: true,
		autoPlay:true
		});
	}
	
	if( $("#owl-teachers2").length )
	{
		var owl = $("#owl-teachers2");

		owl.owlCarousel({
		
		items : 1, //10 items above 1000px browser width
		itemsDesktop : [1000,1], //5 items between 1000px and 901px
		itemsDesktopSmall : [900,1], // 3 items betweem 900px and 601px
		itemsTablet: [640,1],
		itemsMobile : [480,1], // itemsMobile disabled - inherit from itemsTablet option
		navigation: false,
		pagination: true,
		autoPlay:true
		});
	}
	
	
	if( jQuery('#carousel').length && jQuery('#slider').length ) 
	{
		
		
		jQuery('#carousel').flexslider({
			animation: "slide",
			controlNav: false,
			animationLoop: false,
			slideshow: false,
			itemWidth: 145,
			itemMargin: 12,
			asNavFor: '#slider'
			});
			
		jQuery('#slider').flexslider({
			animation: "slide",
			controlNav: false,
			animationLoop: false,
			slideshow: false,
			sync: "#carousel",
			start: function(slider){
			$('body').removeClass('loading');
			}
		});
		
		
	}
	
	
	
});