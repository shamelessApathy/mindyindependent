function updateQueryStringParameter(uri, key, value) {
	"use strict";
	if ( ! uri ) { uri = window.location.href; }
  var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
  var separator = uri.indexOf('?') !== -1 ? "&" : "?";
  if (uri.match(re)) {
	  
	if(value!="")
    {
		return uri.replace(re, '$1' + key + "=" + value + '$2');
	}else{
		return uri.replace(re,'$1');
	}
  }
  else {
    return uri + separator + key + "=" + value;
  }
}
//Function to animate slider captions 
function doAnimations( elems ) {
	//Cache the animationend event in a variable
	"use strict";
	var animEndEv = 'webkitAnimationEnd animationend';
	
	elems.each(function () {
		var $this = jQuery(this),
			$animationType = $this.data('animation');
		$this.addClass($animationType).one(animEndEv, function () {
			$this.removeClass($animationType);
		});
	});
}

jQuery(document).ready(function($) {
        // Apply Bootstrap classes for some WordPress components
	"use strict";
	
	if( jQuery('.fancybox').length )
	jQuery('.fancybox').fancybox();	
	
	//Start for owl
	if( $("#owl-campus").length ) {
		var owl = $("#owl-campus");
		
		owl.owlCarousel({
		
		items : 3, //10 items above 1000px browser width
		itemsDesktop : [1000,3], //5 items between 1000px and 901px
		itemsDesktopSmall : [900,3], // 3 items betweem 900px and 601px
		itemsTablet: [600,2],
		itemsMobile : [479,1], // itemsMobile disabled - inherit from itemsTablet option
		navigation: false,
		pagination: true,
		autoPlay:true
		});
	 }
	 if($("#owl-partners").length) {
		  var owl = $("#owl-partners");
	 
		  owl.owlCarousel({
	
		  items : 6, //10 items above 1000px browser width
		  itemsDesktop : [1000,6], //5 items between 1000px and 901px
		  itemsDesktopSmall : [900,4], // 3 items betweem 900px and 601px
		  itemsTablet: [600,3],
		  itemsMobile : [479,2], // itemsMobile disabled - inherit from itemsTablet option
		  navigation: false,
		  pagination: true,
		  autoPlay:true
		  });	
	  }
	//End for owl
    
	// Like it Code
	$('#fav-id').on('click', function() {	
		console.log('clicked');
		var $this = $(this);
		var likeit = $this.text();
		var liketype;
		$this.addClass('fav-load');
		$this.html('<img src="'+edupress_university_vars.loadgif+'">');
		if($this.hasClass('loved')) {
			liketype="unlike";
		    $this.removeClass('loved');
		}	
		if($this.hasClass('love-it')) {
			liketype="like";
			$this.removeClass('love-it');
		}
		var post_id = $this.data('post-id');
		var user_id = $this.data('user-id');
		var post_data = {
			action: 'edupress_university_love_it',
			item_id: post_id,
			user_id: user_id,
			liketype: liketype,
			love_it_nonce: edupress_university_vars.nonce
		};
		$.post(edupress_university_vars.ajaxurl, post_data, function(response) {
			if(response == 'loved') {
				$this.addClass('loved');
				$this.removeClass('fav-load');
				//var count_wrap = $this.next();
				var count = parseInt(likeit) + 1
				$this.html('<i class="fa fa-heart"></i> <span>'+count+'</span> ');
				//var count = count_wrap.text();
				//count_wrap.text(parseInt(count) + 1);	
				
			}else if(response == 'unloved') {
				
				$this.addClass('love-it');
				$this.removeClass('fav-load');
				//var count_wrap = $this.next();
				var count = parseInt(likeit) - 1
				$this.html('<i class="fa fa-heart-o"></i> <span>'+count+'</span> ');
			
			}else {
				alert(edupress_university_vars.error_message);
			}
		});
		return false;
	});
	
	
	// Like it Code
	$('#like-id, .like-id').on('click', function() {	
		var $this = $(this);
		var likeit = $this.text();
		var liketype;
		if($this.hasClass('love-it')) {
			alert(edupress_university_vars.already_unliked_message);
			return false;
		}	
		if($this.hasClass('loved')) {
			liketype="unlike";
		    $this.removeClass('loved');
		}	
		
		var post_id = $this.data('post-id');
		var user_id = $this.data('user-id');
		var post_data = {
			action: 'edupress_university_love_it',
			item_id: post_id,
			user_id: user_id,
			liketype: liketype,
			love_it_nonce: edupress_university_vars.nonce
		};
		$.post(edupress_university_vars.ajaxurl, post_data, function(response) {
			if(response == 'unloved') {
				$this.addClass('love-it');
				$this.html('<i class="fa fa-heart-o"></i> '+edupress_university_vars.unliked_message+'');
			
			}else {
				alert(edupress_university_vars.error_message);
			}
		});
		return false;
	});
	
	
	

	
	$('#free').change(function() {
		var queryString = $(this).val();
		var existingquery = location.href.split('?')[1];
		var main_url=window.location.href;
		var re1 = new RegExp("/page/.*(&|$)", "i");
		if (main_url.match(re1)) 
		{
			main_url = main_url.replace(re1,'')+'/';
			if (typeof existingquery !== 'undefined'){
			main_url = main_url+'?'+existingquery;
			}
		}

        if($(this).is(":checked")) {
           var queryString = $(this).val();
		   var redirect_url=updateQueryStringParameter(main_url,'free',queryString);
       	}else{
		   var main_url=window.location.href;
		   var redirect_url=updateQueryStringParameter(main_url,'free','');
		}
		window.location = redirect_url;
	   });
	   
	   
	   $('#ccat').change(function() {
		var queryString = $(this).val();
		if ($(this).val() !=='') 
		{
			window.location = $(this).val();
		}
	   });
	   
	   
	   
	    $('#scat').change(function() {
		var queryString = $(this).val();
		var existingquery = location.href.split('?')[1];
		var main_url=window.location.href;
		var re1 = new RegExp("/page/.*(&|$)", "i");
		if (main_url.match(re1)) 
		{
			main_url = main_url.replace(re1,'')+'/';
			if (typeof existingquery !== 'undefined')
			{
			main_url = main_url+'?'+existingquery;
			}
		}
        var redirect_url=updateQueryStringParameter(main_url,'scat',queryString);
		window.location = redirect_url;
	   });
	   
	   
	   
	   $('#paid').change(function() {
		var queryString = $(this).val();
		var existingquery = location.href.split('?')[1];
		var main_url=window.location.href;
		var re1 = new RegExp("/page/.*(&|$)", "i");
		if (main_url.match(re1)) 
		{
			main_url = main_url.replace(re1,'')+'/';
			if (typeof existingquery !== 'undefined')
			{
			main_url = main_url+'?'+existingquery;
			}
		}
        if($(this).is(":checked")) {
           var queryString = $(this).val();
		   var redirect_url=updateQueryStringParameter(main_url,'paid',queryString);
       	}else{
		   var redirect_url=updateQueryStringParameter(main_url,'paid','');
		}
		window.location = redirect_url;
	   });
	   
	   
    $('input[name="lang"').change(function(){
	var existingquery = location.href.split('?')[1];
	var main_url=window.location.href;
	var re1 = new RegExp("/page/.*(&|$)", "i");
	if (main_url.match(re1)) 
	{
		main_url = main_url.replace(re1,'')+'/';
		if (typeof existingquery !== 'undefined'){
		main_url = main_url+'?'+existingquery;
		}
	}
	
	var checked = $('input[type="checkbox"].langfil:checked'); // get checked values
    var checkedValues = [];
    checked.each(function (i) {
        checkedValues.push(checked[i].value); // add checked values to our temporary list
    });
	var queryString = checkedValues.join(',');
	var redirect_url=updateQueryStringParameter(main_url,'lang',queryString);
	window.location = redirect_url;
    });
	
	
	  
	/* auto complete the search field with tags */
	if ( jQuery.isFunction( jQuery.fn.autocomplete ) ) {
	jQuery('#s').autocomplete({
		source: function( request, response ) {
			jQuery.ajax({
				url: edupress_university_vars.ajax_url,
				dataType: 'json',
				data: {
					action: 'edupress-university-ajax-tag-search-front',
					term: request.term
				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					//alert('Error: ' + errorThrown + ' - ' + textStatus + ' - ' + XMLHttpRequest);
				},
				success: function( data ) {
					response( jQuery.map( data, function( item ) {
						return {
							term: item,
							value: item.name
						};
					}));
				}
			});
		},
		minLength: 2
	});
	}
	
	
	$('#free').change(function() {
		var queryString = $(this).val();
		var existingquery = location.href.split('?')[1];
		var main_url=window.location.href;
		var re1 = new RegExp("/page/.*(&|$)", "i");
		if (main_url.match(re1)) 
		{
			main_url = main_url.replace(re1,'')+'/';
			if (typeof existingquery !== 'undefined'){
			main_url = main_url+'?'+existingquery;
			}
		}

        if($(this).is(":checked")) {
           var queryString = $(this).val();
		   var redirect_url=updateQueryStringParameter(main_url,'free',queryString);
       	}else{
		   var main_url=window.location.href;
		   var redirect_url=updateQueryStringParameter(main_url,'free','');
		}
		window.location = redirect_url;
	   });
	   
	   
	   $('#ccat').change(function() {
		var queryString = $(this).val();
		if ($(this).val() !=='') 
		{
			window.location = $(this).val();
		}
	   });
	   
	   
	   
	    $('#scat').change(function() {
		var queryString = $(this).val();
		var existingquery = location.href.split('?')[1];
		var main_url=window.location.href;
		var re1 = new RegExp("/page/.*(&|$)", "i");
		if (main_url.match(re1)) 
		{
			main_url = main_url.replace(re1,'')+'/';
			if (typeof existingquery !== 'undefined')
			{
			main_url = main_url+'?'+existingquery;
			}
		}
        var redirect_url=updateQueryStringParameter(main_url,'scat',queryString);
		window.location = redirect_url;
	   });
	   
	   
	   
	   $('#paid').change(function() {
		var queryString = $(this).val();
		var existingquery = location.href.split('?')[1];
		var main_url=window.location.href;
		var re1 = new RegExp("/page/.*(&|$)", "i");
		if (main_url.match(re1)) 
		{
			main_url = main_url.replace(re1,'')+'/';
			if (typeof existingquery !== 'undefined')
			{
			main_url = main_url+'?'+existingquery;
			}
		}
        if($(this).is(":checked")) {
           var queryString = $(this).val();
		   var redirect_url=updateQueryStringParameter(main_url,'paid',queryString);
       	}else{
		   var redirect_url=updateQueryStringParameter(main_url,'paid','');
		}
		window.location = redirect_url;
	   });
	 /*-----------------------------------------------------------------------------------*/
    /* Page Loader
    /*-----------------------------------------------------------------------------------*/
     jQuery(window).load(function () {
        jQuery(".page-loader-img").fadeOut();
        jQuery(".page-loader").delay(300).fadeOut("slow", function () {
            jQuery(this).remove();
        });

    });

});