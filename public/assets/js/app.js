$(document).ready(function() {
	var forms = document.getElementsByClassName('needs-validation');
	var validation = Array.prototype.filter.call(forms, function(form) {
		form.addEventListener('submit', function(event) {
			if (form.checkValidity() === false) {
				event.preventDefault();
				event.stopPropagation();
			}
			form.classList.add('was-validated');
		}, false);
	});

	$('.gallery').magnificPopup({
		delegate: 'a',
		type: 'image',
		mainClass: 'mfp-img-mobile',
		gallery: {
			enabled: true,
			navigateByImgClick: true,
			preload: [0,1], 
			tPrev: 'Previous (Left arrow key)',
			tNext: 'Next (Right arrow key)',
			tCounter: '<span class="mfp-counter">%curr% sur %total%</span>'
		},
		image: {
			tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
			titleSrc: function(item) {
				return item.el.attr('title') + '<small>by president</small>';
			}
		},
		zoom: {
			enabled: true, 
			duration: 300,
			easing: 'ease-in-out', 
			opener: function(openerElement) {
				return openerElement.is('img') ? openerElement : openerElement.find('img');
			}
		}
	});

	$('.footer-gallery').magnificPopup({
		delegate: 'a',
		type: 'image',
		mainClass: 'mfp-img-mobile',
		gallery: {
			enabled: true,
			navigateByImgClick: true,
			preload: [0,1], 
			tPrev: 'Previous (Left arrow key)',
			tNext: 'Next (Right arrow key)',
			tCounter: '<span class="mfp-counter">%curr% sur %total%</span>'
		},
		image: {
			tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
			titleSrc: function(item) {
				return item.el.attr('title') + '<small>by president</small>';
			}
		},
		zoom: {
			enabled: true, 
			duration: 300,
			easing: 'ease-in-out', 
			opener: function(openerElement) {
				return openerElement.is('img') ? openerElement : openerElement.find('img');
			}
		}
	});


	var index = new Swiper('.swiper-container', {
		pagination: {
			el: '.swiper-pagination',
		},

		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
		autoplay: {
			delay: 2000,
		},
	})
	/*var madagascar = new Swiper('.madagascar', {
		pagination: {
			el: '.swiper-pagination-madagascar',
		},

		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
		autoplay: {
			delay: 2000,
		},
	})
	var turkey = new Swiper('.turkey', {
		pagination: {
			el: '.swiper-pagination-turkey',
		},

		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
		autoplay: {
			delay: 2000,
		},
	})
	var international = new Swiper('.international', {
		pagination: {
			el: '.swiper-pagination-international',
		},

		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
		autoplay: {
			delay: 2000,
		},
	})*/

	var mySwiper = new Swiper('.activity', {
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
		autoplay: {
			delay: 2000,
		},
		pagination: {
			el: '.swiper-pagination-activity',
		},
		autoplay: {
			delay: 2000,
		}
	});

	
	$(".owl-carousel").owlCarousel({
		loop:true,
		margin:30,
		responsiveClass:true,
		responsive:{
			0:{
				items:1,
				nav:false
			},
			600:{
				items:2,
				nav:false
			},
			768:{
				items:3,
				nav:false
			},
			1000:{
				items:4,
				nav:false,
				loop:true
			}
		},
		autoplay:true,
		autoplayTimeout:3000,
		autoplayHoverPause:true
	});

	$('.slide-activity').slick({
		autoplay:true,
		dots: false,
		infinite: true,
		slidesToShow: 4,
		slidesToScroll: 4,
		autoplaySpeed:2000,
		responsive: [
		{
			breakpoint: 1024,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 3,
				infinite: true,
			}
		},
		{
			breakpoint: 768,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 2
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
	new WOW().init();
});