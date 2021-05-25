$(function() {
	"use strict"
	//Preloader
	setTimeout(function(){
		$('body').addClass('loaded');
	}, 350);

	$('.reset').click(function(){
		$('body').removeClass('loaded');
		setTimeout(function(){
			$('body').addClass('loaded');
		}, 350);
	});
	/*menu*/
	var options = {
		offset: 500
	}
	/*var header = new Headhesive('#menu', options);*/

	//mini-menu toggle-mnu
	$(".toggle-mnu").click(function() {
		$(this).toggleClass("on");
		$(".mob-menu").slideToggle();
		return false;
	});


	$('.sub > a').click(function(){
		$('.sub ul').slideUp();
		if ($(this).next().is(":visible")){
			$(this).next().slideUp();
		} else {
			$(this).next().slideToggle();
		}
		return false;
	});

	$('.sub2 > a').click(function(){
		$('.sub2 ul').slideUp();
		if ($(this).next().is(":visible")){
			$(this).next().slideUp();
		} else {
			$(this).next().slideToggle();
		}
		return false;
	});

	$('.mob-menu > ul > li > a').click(function(){
		$('.mob-menu > ul > li > a, .sub a').removeClass('active');
		$(this).addClass('active');
	}),
	$('.sub ul li a').click(function(){
		$('.sub ul li a').removeClass('active');
		$(this).addClass('active');
	});

	//Roberto: remover divs equipos 4 y 5

	$(".table-4").slideUp();
	$(".tabel-link4").removeClass("on");
	$(".table-5").slideUp();
	$(".tabel-link5").removeClass("on");


//spoylar-table-Schedule
/*
$(".one-l").click(function() {
	$(this).toggleClass("on");
	$(".wrap-inner-s-1").slideToggle();
	----------------------------------------------------------
	$(".wrap-inner-s-2").slideUp();
	$(".two-l").removeClass("on");
	$(".wrap-inner-s-3").slideUp();
	$(".thire-l").removeClass("on");
	----------------------------------------------------------
	return false;
});

$(".two-l").click(function() {
	$(this).toggleClass("on");
	$(".wrap-inner-s-2").slideToggle();
	----------------------------------------------------------
	$(".wrap-inner-s-1").slideUp();
	$(".one-l").removeClass("on");
	$(".wrap-inner-s-3").slideUp();
	$(".thire-l").removeClass("on");
	----------------------------------------------------------
	return false;
});*/

$(".thire-l").click(function() {
	$(this).toggleClass("on");
	$(".wrap-inner-s-3").slideToggle();
	/*----------------------------------------------------------*/
	$(".wrap-inner-s-1").slideUp();
	$(".one-l").removeClass("on");
	$(".wrap-inner-s-2").slideUp();
	$(".two-l").removeClass("on");
	/*----------------------------------------------------------*/
	return false;
});

//Spoylar-About
$(".spoiler-l1").click(function() {
	$(this).toggleClass("on");

	$(".info-spoiler1").slideToggle();
	$("#seleccion-equipos").hide();
	
	/*----------------------------------------------------------*/
	$(".info-spoiler2").slideUp();
	$(".spoiler-l2").removeClass("on");
	$(".info-spoiler3").slideUp();
	$(".spoiler-l3").removeClass("on");
	/*----------------------------------------------------------*/
	return false;
});

$(".spoiler-l2").click(function() {
	$(this).toggleClass("on");
	$(".info-spoiler2").slideToggle();
	/*----------------------------------------------------------*/
	$(".info-spoiler1").slideUp();
	$(".spoiler-l1").removeClass("on");
	$(".info-spoiler3").slideUp();
	$(".spoiler-l3").removeClass("on");
	/*----------------------------------------------------------*/
	return false;
});

$(".spoiler-l3").click(function() {
	$(this).toggleClass("on");
	$(".info-spoiler3").slideToggle();
	/*----------------------------------------------------------*/
	$(".info-spoiler1").slideUp();
	$(".spoiler-l1").removeClass("on");
	$(".info-spoiler2").slideUp();
	$(".spoiler-l2").removeClass("on");
	/*----------------------------------------------------------*/
	return false;
});

/*Spoiler-Table-Schedule*/

$(".tabel-link1").click(function() {

	$(this).toggleClass("on");
	$(".table-1").slideToggle();
	/*----------------------------------------------------------*/
	$(".table-1").slide();
	$(".tabel-link1").removeClass("on");
	$(".table-2").slide();
	$(".tabel-link2").removeClass("on");
	$(".table-3").slideUp();
	$(".tabel-link3").removeClass("on");
	$(".table-4").slideUp();
	$(".tabel-link4").removeClass("on");
	$(".table-5").slideUp();
	$(".tabel-link5").removeClass("on");
	/*----------------------------------------------------------*/
	return false;
});

$(".tabel-link2").click(function() {
	$(this).toggleClass("on");
	$(".table-2").slideToggle();
	/*----------------------------------------------------------*/
	$(".table-1").slideUp();
	$(".tabel-link1").removeClass("on");
	$(".table-3").slideUp();
	$(".tabel-link3").removeClass("on");
	$(".table-4").slideUp();
	$(".tabel-link4").removeClass("on");
	$(".table-5").slideUp();
	$(".tabel-link5").removeClass("on");
	/*----------------------------------------------------------*/
	return false;
});

$(".tabel-link3").click(function() {
	$(this).toggleClass("on");
	$(".table-3").slideToggle();
	/*----------------------------------------------------------*/
	$(".table-1").slideUp();
	$(".tabel-link1").removeClass("on");
	$(".table-2").slideUp();
	$(".tabel-link2").removeClass("on");
	$(".table-4").slideUp();
	$(".tabel-link4").removeClass("on");
	$(".table-5").slideUp();
	$(".tabel-link5").removeClass("on");
	/*----------------------------------------------------------*/
	return false;
});

$(".tabel-link4").click(function() {
	$(this).toggleClass("on");
	$(".table-4").slideToggle();
	/*----------------------------------------------------------*/
	$(".table-1").slideUp();
	$(".tabel-link1").removeClass("on");
	$(".table-2").slideUp();
	$(".tabel-link2").removeClass("on");
	$(".table-3").slideUp();
	$(".tabel-link3").removeClass("on");
	$(".table-5").slideUp();
	$(".tabel-link5").removeClass("on");
	/*----------------------------------------------------------*/
	return false;
});

$(".tabel-link5").click(function() {
	$(this).toggleClass("on");
	$(".table-5").slideToggle("slow");
	/*----------------------------------------------------------*/
	$(".table-1").slideUp();
	$(".tabel-link1").removeClass("on");
	$(".table-2").slideUp();
	$(".tabel-link2").removeClass("on");
	$(".table-3").slideUp();
	$(".tabel-link3").removeClass("on");
	$(".table-4").slideUp();
	$(".tabel-link4").removeClass("on");
	/*----------------------------------------------------------*/
	return false;
});
	//Owl-caroudel-Home
	$(".carousel-eq ").owlCarousel({
		loop:true,
		margin:0,
		nav:true,
		autoplay:true,
		autoplayTimeout:10000,
		smartSpeed:2400,
		animateOut: 'fadeOut',
		animateIn: 'fadeIn',
		navText:["<i class='icon-left-arrow'></i>","<i class='icon-right-arrow'></i>"],
		responsive:{
			0:{
				items:1,
			},
			600:{
				items:1,
			},
			1000:{
				items:1,
			}
		}
	});

	//Carousel-teams
	$(".carousel-wrap-teams").owlCarousel({
		loop:true,
		margin:0,
		smartSpeed:2400,
		autoplay:true,
		navText:["<i class='icon-left-arrow'></i>","<i class='icon-right-arrow'></i>"],
		responsive:{
			0:{
				items:1,
			},
			768:{
				items:3,
			},
			1200:{
				items:3,
			}
		}
	});

	//Carousel-Coaches
/*	$(".carousel-wrap-coaches").owlCarousel({
		loop:true,
		margin:0,
		smartSpeed:3200,
		autoplay:true,
		navText:["<i class='icon-left-arrow orange-text'></i>","<i class='icon-right-arrow orange-text'></i>"],
		responsive:{
			0:{
				items:1,
			},
			864:{
				items:2,
			},
			1200:{
				items:2,
			}
		}
	});*/

//Carousel-News
$(".carousel-wrap-news").owlCarousel({
	items:3,
	loop:true,
	margin:0,
	/*smartSpeed:10000,*/
	autoplay:true,
	/*autoplayTimeout:1000,*/
	navText:["<i class='icon-left-arrow'></i>","<i class='icon-right-arrow'></i>"],
	responsive:{
			0:{
				items:1,
			},
			768:{
				items:3,
			},
			1200:{
				items:3,
			}
	}

});

//Carousel-Partners
$(".carousel-wrap-partners").owlCarousel({
	loop:true,
	margin:0,
	smartSpeed:2400,
	autoplay:true,
	navText:["<i class='icon-left-arrow'></i>","<i class='icon-right-arrow'></i>"],
	responsive:{
		0:{
			items:1,
		},
		476:{
			items:2,
		},
		776:{
			items:3,
		},
		1000:{
			items:6,
		}
	}
});

//Carousel-About-players
$(".carousel-wrap-about-players ").owlCarousel({
	loop:true,
	margin:0,
	nav:true,
	autoplay:true,
	autoplayTimeout:5000,
	smartSpeed:2400,
	navText:["<i class='icon-left-arrow'></i>","<i class='icon-right-arrow'></i>"],
	responsive:{
		0:{
			items:1,
		},
		600:{
			items:1,
		},
		1000:{
			items:1,
		}
	}
});

//Carousel-about-sections
$(".carousel-wrap-about-sections").owlCarousel({
	loop:true,
	margin:0,
	smartSpeed:2400,
	autoplay:true,
	navText:["<i class='icon-left-arrow'></i>","<i class='icon-right-arrow'></i>"],
	responsive:{
		0:{
			items:1,
		},
		476:{
			items:2,
		},
		1124:{
			items:3,
		}
	}
});

	//Carousel-Sponsor Partners Block
	$(".carousel-wrap-sponsors").owlCarousel({
		loop:true,
		margin:0,
		smartSpeed:2400,
		autoplay:true,
		navText:["<i class='icon-left-arrow'></i>","<i class='icon-right-arrow'></i>"],
		responsive:{
			0:{
				items:1,
			},
			768:{
				items:2,
			},
			1200:{
				items:3,
			}
		}
	});

	//Carousel-Post Blog Block
	$(".post-img-carousel-wrap").owlCarousel({
		loop:true,
		margin:0,
		smartSpeed:2400,
		autoplay:true,
		navText:["<i class='icon-left-arrow'></i>","<i class='icon-right-arrow'></i>"],
		responsive:{
			0:{
				items:1,
			},
			768:{
				items:1,
			},
			1200:{
				items:1,
			}
		}
	});

	/* Global variables */
	"use strict";
	var $document = $(document),
	$window = $(window),
	plugins = {
		mainSlider: $('#slider'),
		categoryCarousel: $('.category-carousel .container'),
		testimonialsCarousel: $('.testimonials-carousel'),
		brandsCarousel: $('.brands-carousel'),
		textIconCarousel: $('.text-icon-carousel'),
		bulbCarousel: $('.bulb-carousel'),
		gallery: $('#gallery'),
		gallery: $('#gallery2'),
		backToTop: $('.back-to-top'),
		submenu: $('[data-submenu]'),
		isotopeGallery: $('.gallery-isotope'),
		postGallery: $('.blog-isotope'),
		postCarousel: $('.post-carousel'),
		contactForm: $('#contactform'),
		requestForm: $('#requestform'),
		googleMapFooter: $('#footer-map'),
		googleMap: $('#map')
	},
	shiftMenu = $('#slidemenu, #page-content, body, .navbar, .navbar-header'),
	$navbarToggle = $('.navbar-toggle'),
	$dropdown = $('.dropdown-submenu, .dropdown');

	// Isotope
	if (plugins.isotopeGallery.length) {
		var $gallery = plugins.isotopeGallery;
		$gallery.imagesLoaded(function () {
			setGallerySize();
		});
		$gallery.isotope({
			itemSelector: '.gallery__item',
			masonry: {
				columnWidth: '.gallery__item:not(.doubleW)'
			}
		});
		isotopeFilters($gallery);
	}

	// Isotope Filters (for gallery)
	function isotopeFilters(gallery) {
		var gallery = $(gallery);
		if (gallery.length) {
			var container = gallery;
			var optionSets = $(".filters-by-category .option-set"),
			optionLinks = optionSets.find("a");
			optionLinks.on('click', function (e) {
				var thisLink = $(this);
				if (thisLink.hasClass("selected")) return false;
				var optionSet = thisLink.parents(".option-set");
				optionSet.find(".selected").removeClass("selected");
				thisLink.addClass("selected");
				var options = {},
				key = optionSet.attr("data-option-key"),
				value = thisLink.attr("data-option-value");
				value = value === "false" ? false : value;
				options[key] = value;
				if (key === "layoutMode" && typeof changeLayoutMode === "function") changeLayoutMode($this, options);
				else {
					container.isotope(options);
					setGallerySize();
				}
				return false
			})
		}
	}

	function setGallerySize() {
		var windowW = window.innerWidth || $window.width(),
		itemsInRow = 1;
		if (windowW > 1199) {
			itemsInRow = 3;
		} else if (windowW > 767) {
			itemsInRow = 3;
		} else if (windowW > 480) {
			itemsInRow = 1;
		}
		var containerW = $('.gallery-W').width(),
		galleryW = containerW / itemsInRow;
		$gallery.find('.gallery__item').each(function () {
			$(this).css({
				width: galleryW + 'px'
			});
		});
		$gallery.isotope('layout');
	}

	// Post Isotope
	if (plugins.postGallery.length) {
		var $postgallery = plugins.postGallery;
		$postgallery.imagesLoaded(function () {
			setPostSize();
		});
		$postgallery.isotope({
			itemSelector: '.blog-post',
			masonry: {
				gutter: 30,
				columnWidth: '.blog-post:not(.doubleW)'
			}
		});
	}

	$('#gallery').imagesLoaded().done( function( instance ) {
	/*	console.log('DONE- Все изображения были УДАЧНО загружены');*/
	});

	/*magnific-popup*/
	$('.mfp-gallery').magnificPopup({
		mainClass: 'mfp-zoom-in',
		type: 'image',
		tLoading: '',
		gallery:{
			enabled:true,
		},
		image: {
		  markup: '<div class="mfp-figure">'+
		            '<div class="mfp-close"></div>'+
		            '<div class="mfp-img"></div>'+
		            '<div class="mfp-bottom-bar">'+
		              '<div class="mfp-title"></div>'+
		              '<div class="mfp-counter"></div>'+
		            '</div>'+
		          '</div>', // Popup HTML markup. `.mfp-img` div will be replaced with img tag, `.mfp-close` by close button

		  cursor: 'mfp-zoom-out-cur', // Class that adds zoom cursor, will be added to body. Set to null to disable zoom out cursor.

		  titleSrc: function(item) {
		    return '<h4>'+item.el.attr('alt')+'</h4>';
		   },

		  verticalFit: true, // Fits image in area vertically

		  tError: '<a href="%url%">The image</a> could not be loaded.' // Error message
		},
		removalDelay: 300,
		callbacks: {
			beforeChange: function() {
				this.items[0].src = this.items[0].src + '?=' + Math.random(); 
			},
			open: function() {
				$.magnificPopup.instance.next = function() {
					var self = this;
					self.wrap.removeClass('mfp-image-loaded');
					setTimeout(function() { $.magnificPopup.proto.next.call(self); }, 120);
				}
				$.magnificPopup.instance.prev = function() {
					var self = this;
					self.wrap.removeClass('mfp-image-loaded');
					setTimeout(function() { $.magnificPopup.proto.prev.call(self); }, 120);
				}
			},
			imageLoadComplete: function() { 
				var self = this;
				setTimeout(function() { self.wrap.addClass('mfp-image-loaded'); }, 16);
			}
		}
	});


	//Animated
	$(".infoClub-wrap").animated("fadeInLeft");
//	$(".infoCommittee-wrap").animated("fadeInRight");
	$(".block-Teams .t-wrap").animated("fadeInUp");
//	$(".b-wrap-Coaches .text-wrap").animated("fadeInUp");
//	$(".b-wrap-Coaches .coaches-animated1").animated("zoomIn");
//	$(".b-wrap-Coaches .coaches-animated2").animated("zoomIn");
//	$(".b-wrap-Coaches .coaches-animated3").animated("zoomIn");
	$(".block-News .text-wrap").animated("fadeInUp");
	$(".block-Club-Gallery .text-wrap").animated("fadeInUp");
//	$(".block-Partners .text-wrap").animated("fadeInUp");

	/*//SVG Fallback
	if(!Modernizr.svg) {
		$("img[src*='svg']").attr("src", function() {
			return $(this).attr("src").replace(".svg", ".png");
		});
	};*/

	/* Roberto: Lo comento por que dejó de funcionar el buscadro de noticias*/
	/*$("form").submit(function() { 
		var th = $(this);
		$.ajax({
			type: "POST",
			url: "mail.php", 
			data: th.serialize()
		}).done(function() {
			alert("Thank you!");
			setTimeout(function() {
				// Done Functions
				th.trigger("reset");
			}, 1000);
		});
		return false;
	});*/

});

//toggle memu idiomas
$("#botonidioma").click(function(){
    $("#idioma").slideToggle("slow");
});

//Roberto: Animación de las imágenes de los equipos
$(".nombreequipo").click(function() {
	$("html, body").animate({ scrollTop: 100 }, 500);
});
