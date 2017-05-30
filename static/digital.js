(function($) {
	"use strict";
	
	jQuery(document).mouseup(function (e) {
		var container = jQuery('.header-search .product-categories');

		if (!container.is(e.target) && container.has(e.target).length === 0 && !jQuery('.cate-toggler').is(e.target) ) { /* if the target of the click isn't the container nor a descendant of the container */
			if(jQuery('.header-search .product-categories').hasClass('open')) {
				jQuery('.header-search .product-categories').removeClass('open');
			}
		}
	});
	jQuery(document).ready(function(){
		jQuery('.digital-categories').ntm();	
		
		//Header Search by category
		var cateToggler = jQuery('.cate-toggler');
		
		jQuery('.header-search .product-categories').prepend('<li><a href="'+jQuery('#searchform').attr('action')+'">'+cateToggler.html()+'</a></li>');
		
		cateToggler.on('click', function(){
			jQuery('.header-search .product-categories').toggleClass('open');
		});
		
		/* Init values */
		var searchCat = ''; //category to search, set when click on a category
		var currentCat = RoadgetParameterByName( 'product_cat', jQuery('.header-search .product-categories .current-cat a').attr('href') ); /* when SEO off */
		var currentCatName = jQuery('.current-cat a').html();
		
		if(currentCatName!=''){
			cateToggler.html(currentCatName);
			
			//change form action when click submit
			jQuery('#wsearchsubmit').on('click', function(){
				if( searchCat==''){
					jQuery('#searchform').attr( 'action', jQuery('.header-search .product-categories .current-cat a').attr('href') );
				}
			});
		}
		if(currentCat!='') {
			/* when SEO off, we need product_cat */
			if( !(jQuery('#product_cat').length > 0) ) {
				jQuery('#searchform').append('<input type="hidden" id="product_cat" name="product_cat" value="'+currentCat+'" />');
			}
			jQuery('#product_cat').val(currentCat);
		}
		
		jQuery('.header-search .product-categories a').each(function(){
			jQuery(this).on('click', function(event){
				event.preventDefault();
				
				jQuery('.header-search .product-categories a.active').removeClass('active');
				jQuery(this).addClass('active');
				jQuery('.header-search .product-categories').removeClass('open');
				jQuery('#searchform').attr( 'action', jQuery(this).attr('href') );
				cateToggler.html(jQuery(this).html());
				searchCat = jQuery(this).attr('href');
				
				/* when SEO off, we need product_cat */
				if( !( jQuery('#product_cat').length > 0) && ( RoadgetParameterByName( 'product_cat', jQuery(this).attr('href') ) != '' ) ) {
					jQuery('#searchform').append('<input type="hidden" id="product_cat" name="product_cat" value="" />');
				}
				jQuery('#product_cat').val( RoadgetParameterByName( 'product_cat', jQuery(this).attr('href') ) );
			});
		});
		
		//Product Tabs - layout 1
		jQuery('.new-products .wpb_wrapper > h3').each(function(){
			var newProductsTitle = jQuery(this).html();
			jQuery(this).html('<span>'+newProductsTitle+'</span><i class="cross-icon"><i></i></i>');
		});
		window.setTimeout(function(){
			var tabCount = 1;
			var tabTotal = jQuery('.home-tabs.digital .wpb_content_element').length;
			jQuery('.home-tabs.digital').prepend('<div class="container"><ul class="home-tabs-title"></ul></div>');
			var tabTitle = jQuery('.home-tabs.digital .home-tabs-title');
			jQuery('.home-tabs.digital .wpb_content_element').each(function(){
				var tabClass = '';
				var tabLinkClass = '';
				var tabWidget = jQuery(this);
				var widgetTitle = tabWidget.find('h3').html();
				tabWidget.attr('id', 'wpb_content_element-'+tabCount);
				
				if(tabCount==1) {
					tabClass = 'first';
					tabLinkClass = 'active';
					
					tabWidget.addClass('active');
					
					//first tab carousel
					roadtabCarousel('#wpb_content_element-'+tabCount+' .shop-productss', 5);
				} else {
					jQuery(this).addClass('heightzero');
				}
				if(tabCount == tabTotal) {
					tabClass = 'last';
				}
				
				tabTitle.append('<li class="'+tabClass+'"><a class="tab-link '+tabLinkClass+'" href="#" rel="wpb_content_element-'+tabCount+'">'+widgetTitle+'</a></li>');
				
				tabCount++;
				
				//tab click
				jQuery('.home-tabs.digital .tab-link').each(function(){
					jQuery(this).on('click', function(event){
						event.preventDefault();
						var tabRel = jQuery(this).attr('rel');
						
						jQuery('.home-tabs.digital .tab-link').removeClass('active');
						jQuery(this).addClass('active');
						
						jQuery('.home-tabs.digital .wpb_content_element').addClass('heightzero');
						jQuery('#'+tabRel).removeClass('heightzero');
						
						jQuery('.home-tabs.digital .wpb_content_element').removeClass('active');
						jQuery('#'+tabRel).addClass('active');
						
						//make carousel
						roadtabCarousel('#'+tabRel+' .shop-productss', 5);
					});
				});
			});
			
		}, 1000 );
		
		//Product Tabs - layout 2
		jQuery('.new-products .wpb_wrapper > h3').each(function(){
			var newProductsTitle = jQuery(this).html();
			jQuery(this).html('<span>'+newProductsTitle+'</span><i class="cross-icon"><i></i></i>');
		});
		window.setTimeout(function(){
			var tabCount = 1;
			var tabTotal = jQuery('.home-tabs.digital2 .wpb_content_element').length;
			jQuery('.home-tabs.digital2').prepend('<div class="container"><ul class="home-tabs-title"></ul></div>');
			var tabTitle = jQuery('.home-tabs.digital2 .home-tabs-title');
			jQuery('.home-tabs.digital2 .wpb_content_element').each(function(){
				var tabClass = '';
				var tabLinkClass = '';
				var tabWidget = jQuery(this);
				var widgetTitle = tabWidget.find('h3').html();
				tabWidget.attr('id', 'wpb_content_element-'+tabCount);
				
				if(tabCount==1) {
					tabClass = 'first';
					tabLinkClass = 'active';
					
					tabWidget.addClass('active');
					
					//first tab carousel
					roadtabCarousel('#wpb_content_element-'+tabCount+' .shop-productss', 4);
				} else {
					jQuery(this).addClass('heightzero');
				}
				if(tabCount == tabTotal) {
					tabClass = 'last';
				}
				
				tabTitle.append('<li class="'+tabClass+'"><a class="tab-link '+tabLinkClass+'" href="#" rel="wpb_content_element-'+tabCount+'">'+widgetTitle+'</a></li>');
				
				tabCount++;
				
				//tab click
				jQuery('.home-tabs.digital2 .tab-link').each(function(){
					jQuery(this).on('click', function(event){
						event.preventDefault();
						var tabRel = jQuery(this).attr('rel');
						
						jQuery('.home-tabs.digital2 .tab-link').removeClass('active');
						jQuery(this).addClass('active');
						
						jQuery('.home-tabs.digital2 .wpb_content_element').addClass('heightzero');
						jQuery('#'+tabRel).removeClass('heightzero');
						
						jQuery('.home-tabs.digital2 .wpb_content_element').removeClass('active');
						jQuery('#'+tabRel).addClass('active');
						
						//make carousel
						roadtabCarousel('#'+tabRel+' .shop-productss', 4);
					});
				});
			});
			
		}, 1000 );

		//Product Tabs - layout 3
		jQuery('.new-products .wpb_wrapper > h3').each(function(){
			var newProductsTitle = jQuery(this).html();
			jQuery(this).html('<span>'+newProductsTitle+'</span><i class="cross-icon"><i></i></i>');
		});
		window.setTimeout(function(){
			var tabCount = 1;
			var tabTotal = jQuery('.home-tabs.digital3 .wpb_content_element').length;
			jQuery('.home-tabs.digital3').prepend('<div class="container"><ul class="home-tabs-title"></ul></div>');
			var tabTitle = jQuery('.home-tabs.digital3 .home-tabs-title');
			jQuery('.home-tabs.digital3 .wpb_content_element').each(function(){
				var tabClass = '';
				var tabLinkClass = '';
				var tabWidget = jQuery(this);
				var widgetTitle = tabWidget.find('h3').html();
				tabWidget.attr('id', 'wpb_content_element-'+tabCount);
				
				if(tabCount==1) {
					tabClass = 'first';
					tabLinkClass = 'active';
					
					tabWidget.addClass('active');
					
					//first tab carousel
					roadtabCarousel1('#wpb_content_element-'+tabCount+' .shop-productss', 3);
				} else {
					jQuery(this).addClass('heightzero');
				}
				if(tabCount == tabTotal) {
					tabClass = 'last';
				}
				
				tabTitle.append('<li class="'+tabClass+'"><a class="tab-link '+tabLinkClass+'" href="#" rel="wpb_content_element-'+tabCount+'">'+widgetTitle+'</a></li>');
				
				tabCount++;
				
				//tab click
				jQuery('.home-tabs.digital3 .tab-link').each(function(){
					jQuery(this).on('click', function(event){
						event.preventDefault();
						var tabRel = jQuery(this).attr('rel');
						
						jQuery('.home-tabs.digital3 .tab-link').removeClass('active');
						jQuery(this).addClass('active');
						
						jQuery('.home-tabs.digital3 .wpb_content_element').addClass('heightzero');
						jQuery('#'+tabRel).removeClass('heightzero');
						
						jQuery('.home-tabs.digital3 .wpb_content_element').removeClass('active');
						jQuery('#'+tabRel).addClass('active');
						
						//make carousel
						roadtabCarousel1('#'+tabRel+' .shop-productss', 3);
					});
				});
			});
			
		}, 1000 );
		//Products carousel
		jQuery('.products-carousel .wpb_wrapper > h3').each(function(){
			var pwidgetTitle = jQuery(this).html();
			jQuery(this).html('<span>'+pwidgetTitle+'</span>');
		});
		jQuery('.products-carousel .shop-productss').slick({
			infinite: false,
			slidesToShow: 5,
			slidesToScroll: 1,
			speed: 500,
			easing: 'linear',
			swipeToSlide: true,
			autoplaySpeed: 1000,
			responsive: [
				{
				  breakpoint: 1200,
				  settings: {
					slidesToShow: 4,
					slidesToScroll: 1
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
					slidesToShow: 3,
					slidesToScroll: 1
				  }
				},
				{
				  breakpoint: 600,
				  settings: {
					slidesToShow: 2,
					slidesToScroll: 1
				  }
				},
				{
				  breakpoint: 480,
				  settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				  }
				}
			]
		});
		
		//Products carousel2
		jQuery('.products-carousel2 .wpb_wrapper > h3').each(function(){
			var pwidgetTitle = jQuery(this).html();
			jQuery(this).html('<span>'+pwidgetTitle+'</span>');
		});
		jQuery('.products-carousel2 .shop-productss').slick({
			infinite: false,
			slidesToShow: 4,
			slidesToScroll: 1,
			speed: 500,
			easing: 'linear',
			swipeToSlide: true,
			autoplaySpeed: 1000,
			responsive: [
				{
				  breakpoint: 1200,
				  settings: {
					slidesToShow: 3,
					slidesToScroll: 1
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
					slidesToShow: 3,
					slidesToScroll: 1
				  }
				},
				{
				  breakpoint: 600,
				  settings: {
					slidesToShow: 2,
					slidesToScroll: 1
				  }
				},
				{
				  breakpoint: 480,
				  settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				  }
				}
			]
		});

		//Products carousel3
		jQuery('.products-carousel3 .wpb_wrapper > h3').each(function(){
			var pwidgetTitle = jQuery(this).html();
			jQuery(this).html('<span>'+pwidgetTitle+'</span>');
		});
		jQuery('.products-carousel3 .shop-productss').slick({
			infinite: false,
			slidesToShow: 4,
			slidesToScroll: 1,
			speed: 500,
			easing: 'linear',
			swipeToSlide: true,
			autoplaySpeed: 1000,
			responsive: [
				{
				  breakpoint: 1200,
				  settings: {
					slidesToShow: 3,
					slidesToScroll: 1
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
					slidesToShow: 3,
					slidesToScroll: 1
				  }
				},
				{
				  breakpoint: 600,
				  settings: {
					slidesToShow: 2,
					slidesToScroll: 1
				  }
				},
				{
				  breakpoint: 480,
				  settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				  }
				}
			]
		});
		//Products carousel4
		jQuery('.products-carousel4 .wpb_wrapper > h3').each(function(){
			var pwidgetTitle = jQuery(this).html();
			jQuery(this).html('<span>'+pwidgetTitle+'</span>');
		});
		jQuery('.products-carousel4 .shop-productss').slick({
			infinite: false,
			slidesToShow: 4,
			slidesToScroll: 1,
			speed: 500,
			easing: 'linear',
			swipeToSlide: true,
			autoplaySpeed: 1000,
			responsive: [
				{
				  breakpoint: 1200,
				  settings: {
					slidesToShow: 3,
					slidesToScroll: 1
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
					slidesToShow: 3,
					slidesToScroll: 1
				  }
				},
				{
				  breakpoint: 600,
				  settings: {
					slidesToShow: 2,
					slidesToScroll: 1
				  }
				},
				{
				  breakpoint: 480,
				  settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				  }
				}
			]
		});

		//Products carousel5
		jQuery('.products-carousel5 .wpb_wrapper > h3').each(function(){
			var pwidgetTitle = jQuery(this).html();
			jQuery(this).html('<span>'+pwidgetTitle+'</span>');
		});
		jQuery('.products-carousel5 .shop-productss').slick({
			infinite: false,
			slidesToShow: 3,
			slidesToScroll: 1,
			speed: 500,
			easing: 'linear',
			swipeToSlide: true,
			autoplaySpeed: 1000,
			responsive: [
				{
				  breakpoint: 1200,
				  settings: {
					slidesToShow: 3,
					slidesToScroll: 1
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
					slidesToScroll: 1
				  }
				},
				{
				  breakpoint: 600,
				  settings: {
					slidesToShow: 2,
					slidesToScroll: 1
				  }
				},
				{
				  breakpoint: 480,
				  settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				  }
				}
			]
		});

		//Latest posts carousel
		jQuery('.latest-posts .wpb_wrapper > h3').each(function(){
			var pwidgetTitle = jQuery(this).html();
			jQuery(this).html('<span>'+pwidgetTitle+'</span>');
		});
		jQuery('.latest-posts .posts-carousel').slick({
			arrows: true,
			dots: false,
			infinite: false,
			slidesToShow: 4,
			slidesToScroll: 1,
			speed: road_bloganimate,
			easing: 'linear',
			autoplay: road_blogscroll,
			swipeToSlide: true,
			autoplaySpeed: road_blogpause,
			responsive: [
				{
				  breakpoint: 1200,
				  settings: {
					slidesToShow: 2,
					slidesToScroll: 1
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
					slidesToShow: 1,
					slidesToScroll: 1
				  }
				},
				{
				  breakpoint: 600,
				  settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				  }
				}

			]
		});
		//Latest posts carousel
		jQuery('.latest-posts2 .wpb_wrapper > h3').each(function(){
			var pwidgetTitle = jQuery(this).html();
			jQuery(this).html('<span>'+pwidgetTitle+'</span>');
		});
		jQuery('.latest-posts2 .posts-carousel').slick({
			arrows: true,
			dots: false,
			infinite: false,
			slidesToShow: 1,
			slidesToScroll: 1,
			speed: road_bloganimate,
			easing: 'linear',
			autoplay: road_blogscroll,
			swipeToSlide: true,
			autoplaySpeed: road_blogpause,
			responsive: [
				{
				  breakpoint: 1200,
				  settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				  }
				},
				{
				  breakpoint: 992,
				  settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				  }
				},
				{
				  breakpoint: 767,
				  settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				  }
				},
				{
				  breakpoint: 600,
				  settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				  }
				}

			]
		});
		//Product tabs carousel
		function roadtabCarousel(element, itemnumber) {
			//jQuery(element).unslick();
			jQuery(element).slick({
				infinite: false,
				slidesToShow: itemnumber,
				slidesToScroll: 1,
				speed: 700,
				easing: 'linear',
				swipeToSlide: true,
				autoplaySpeed: 2000,
				responsive: [
					{
					  breakpoint: 1200,
					  settings: {
						slidesToShow: 3,
						slidesToScroll: 1
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
						slidesToScroll: 1
					  }
					},
					{
					  breakpoint: 600,
					  settings: {
						slidesToShow: 1,
						slidesToScroll: 1
					  }
					}
				]
			});
		}

		//Product tabs carousel1
		function roadtabCarousel1(element, itemnumber) {
			//jQuery(element).unslick();
			jQuery(element).slick({
				infinite: false,
				slidesToShow: itemnumber,
				slidesToScroll: 1,
				speed: 700,
				easing: 'linear',
				swipeToSlide: true,
				autoplaySpeed: 2000,
				responsive: [
					{
					  breakpoint: 1200,
					  settings: {
						slidesToShow: 3,
						slidesToScroll: 1
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
						slidesToScroll: 1
					  }
					},
					{
					  breakpoint: 600,
					  settings: {
						slidesToShow: 1,
						slidesToScroll: 1
					  }
					}
				]
			});
		}

	});
})(jQuery);