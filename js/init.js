(function ($) {

	/* ================= Configure functions  =================  */

	// Enhance Contact Form 7 plugin behavior to fit theme design.
	function cf7_extra() {
		// Hide status message by click.
		$('.wpcf7-response-output').on('click', function () {
			$(this).hide(300);
		});

		// Hide notifications by click.
		$('.wpcf7-form-control-wrap').each(function () {
			$(this).on('click', function () {
				$(this).find('.wpcf7-form-control').focus().next().remove();
			})
		})
	}

	cf7_extra();

	// Show drop down on first menu click.
	function preventMenuAction() {
		if ($(window).width() > 767) {
			$('.touch .menu-item-has-children > a').one('click', function (e) {
				e.preventDefault();
			})
		}
	}

	preventMenuAction();

	// Show menu buttons one by one.
	function animateMenuButtons() {
		var i = 0;
		$(".header-menu .main-menu > li").each(function () {
			var $li = $(this);
			setTimeout(function () {
				$li.addClass('visible');
			}, i += 150);
		});
	}

	animateMenuButtons();

	// Youtube video close after finish.
	function onPlayerStateChange(event) {
		switch (event.data) {
			case YT.PlayerState.ENDED:
				$.magnificPopup.close();
				break;
		}
	}

	$(document).ready(function () {

		/* ================= Custom theme scripts  =================  */
		// Align slider text with the grid system.
		$('.caption-wrap .caption').addClass('container').wrapInner('<div class="inner"></div>');

		/* ================= Initialize external plugins  ================ */

		// Video popup plans gallery.
		$(".video-blocks .featured-thumbnail a").magnificPopup({
			type: 'iframe',
			disableOn: 700,
			mainClass: 'mfp-fade',
			iframe: {
				markup: '<div class="mfp-iframe-scaler"><div class="mfp-close"></div><iframe id="player" class="mfp-iframe" src="//about:blank" frameborder="0" allowfullscreen></iframe></div>',
				patterns: {
					youtube: {
						src: '//www.youtube.com/embed/%id%?autoplay=1&rel=0&showinfo=0&enablejsapi=1'
					}
				}
			},
			callbacks: {
				open: function () {
					new YT.Player('player', {
						events: {
							'onStateChange': onPlayerStateChange
						}
					});
				}
			}
		});


		// On scroll animations.
		var wow = new WOW(
			{
				boxClass: 'wow',      // animated element css class (default is wow)
				animateClass: 'animated', // animation css class (default is animated)
				offset: 0,          // distance to the element when triggering the animation (default is 0)
				mobile: true,       // trigger animations on mobile devices (default is true)
				live: true,       // act on asynchronously loaded content (default is true)
				callback: function (box) {
					// the callback is fired every time an animation is started
					// the argument that is passed in is the DOM node being animated
				},
				scrollContainer: null // optional scroll container selector, otherwise use window
			}
		);
		wow.init();

		// Projects categories blocks carousel.
		$('.home .services-list').owlCarousel({
			responsive: {
				0: {
					items: 1
				},
				660: {
					items: 2
				},
				1200: {
					items: 3
				},
				1330: {
					//items: 4
				}
			},
			lazyLoad: true,
			dots: false,
			nav: true,
			rewind: false,
			autoplay: true,
			autoplayTimeout: 4000,
			autoplayHoverPause: false,
			loop: true
		});

		// Testimonials carousel.
		$('.home .testimonials-list').owlCarousel({
			items: 1,
			lazyLoad: true,
			dots: true,
			nav: false,
			rewind: false,
			autoplay: true,
			autoplayTimeout: 5000,
			autoplayHoverPause: false,
			loop: true,
			//stagePadding: 30,
			smartSpeed: 450,
			animateIn: 'flipInX',
			animateOut: 'slideOutDown'
		});

		// Logotypes carousel.
		$(".home .logotypes-list").owlCarousel({
			responsive: {
				0: {
					items: 1
				},
				380: {
					items: 2
				},
				768: {
					items: 3
				}
			},
			lazyLoad: true,
			dots: false,
			nav: true,
			rewind: false,
			autoplay: true,
			autoplayTimeout: 3000,
			autoplayHoverPause: false,
			loop: true
		});

		// Smooth scroll for anchor links(single project page).
		/*function anchor_links() {
		 $(".site-content a[href^='#']").click(function () {
		 var elementClick = $(this).attr("href");
		 var destination = $(elementClick).offset().top;
		 $('body, html').animate({scrollTop: destination}, 500);
		 return false;
		 });
		 }

		 anchor_links();*/

		// Logotypes page.
		$('.logotypes-list .network_logo').matchHeight();

		// Scripts for mobile devices.
		if ($(window).width() < 768) {
			// Mobile menu.
			$('nav#menu_mobile').mmenu();

		}
		// Scripts for non mobile
		else {

			// Default Menu dropdown.
			$('.nav-primary ul.main-menu').superfish({
				animation: false,
				animationOut: false
			});

			// Forbid click event for phone links
			$('a[href^="tel:"]').on('click', function (e) {
				e.preventDefault();
			});

		}

	});


	$(window).load(function () {
		$('body').addClass('loaded');
	});

	// Window resize
	$(window).resize(function () {

	});

	// Window scroll actions.
	$(window).scroll(function () {

	});


	// Orientation change
	window.addEventListener("orientationchange", function () {

	});

})(jQuery);
