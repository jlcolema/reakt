
/*-------------------------------------------
	Browser Detection
-------------------------------------------*/

// For when you get desparate.

// http://rog.ie/post/9089341529/html5boilerplatejs

// var b = document.documentElement;
// b.setAttribute('data-useragent',  navigator.userAgent);
// b.setAttribute('data-platform', navigator.platform);

// sample CSS: html[data-useragent*='Chrome/13.0'] { ... }


/*-------------------------------------------
	General Functions
-------------------------------------------*/


(function($){


	/* On Page Ready */

	$(document).ready(function (){


		/*-------------------------------------------
			Title
		-------------------------------------------*/

		// Notes...


		/*-------------------------------------------
			Nav Toggle
		-------------------------------------------*/

		// Notes...


		$('#nav').find('.toggle').click(function() {

			$('#nav').toggleClass('open');

		});


		/*-------------------------------------------
			Reduce Size of Header on Scroll
		-------------------------------------------*/

		// Notes...


		var header = $('body');

		$(window).scroll(function() {

			var scroll = $(window).scrollTop();

			if (scroll >= 125) {

				header.addClass('small-header');

			} else {

				header.removeClass('small-header');

			}

		});


		/*-------------------------------------------
			Smooth Scroll
		-------------------------------------------*/

		// Notes...


		$('.more a').smoothScroll({

			offset: -190

		});


		$('.hero .more-details a').smoothScroll({

			offset: -210

		});


		$('.new-hero .more-details a').smoothScroll({

			offset: -125

		});


		/*-------------------------------------------
			Auto-expanding Textarea
		-------------------------------------------*/

		// Notes...


		$("textarea").expanding();


		/*-------------------------------------------
			Slideshow Headlines
		-------------------------------------------*/

		// Notes...


		// $("#slideshow .slide-01 h1").fitText({

		// 	minFontSize: '32',
		// 	maxFontSize: '100'

		// });


		/*-------------------------------------------
			Video Volume Control
		-------------------------------------------*/

		// Notes...


		$(".volume-button").click(function () {

			$(this).toggleClass('hide-button');

			$(this).parent().parent().find('.mute-button').toggleClass('hide-button');

		});

		$(".mute-button").click(function () {

			$(this).toggleClass('hide-button');

			$(this).parent().parent().find('.volume-button').toggleClass('hide-button');

		});


		/*-------------------------------------------
			Select
		-------------------------------------------*/

		// Notes...


		/* Forms */

		$('.project-type select').select2({

			placeholder: "Project Type"

		});

		$('.timeframe select').select2({

			placeholder: "Timeframe"

		});


		/*-------------------------------------------
			Autoplay Videos
		-------------------------------------------*/

		// Notes...


		(function($){

			function moveDifferent() {

				var scrollTop = $(window).scrollTop(),
				movers = $("[data-scroll-speed]");

				movers.each(function() {

					var scrollspeed = parseInt($(this).data("scroll-speed")),
					imagePos = $(this).offset().top,
					offset = (-(scrollTop - imagePos) / scrollspeed);
					$(this).css("transform", "translateY(" + offset + "px)");

				});

			}

			$(window).on('load scroll', moveDifferent);

		})(jQuery);

		(function($){

			var muteButton = $(".mute-button"),
			videoWrap = muteButton.closest(".video-container"),
			thisVideo = videoWrap.find("video");

			muteButton.click( function (){

				thisVideo.prop("muted", !thisVideo.prop("muted"));
				$(this).toggleClass("muted").blur();

			});

		})(jQuery);

		(function($){

			function restartVideo(endedVid) {

				var videoSource = endedVid.get(0).currentSrc;
				videoWrap = $(endedVid).closest(".video-container");
				videoWrap.removeClass("play").addClass("paused");
				endedVid.get(0).src = "";
				endedVid.get(0).src = videoSource;
				endedVid.get(0).currentTime = 0;

			}

			function changeState(video) {

				var videoWrap = $(video).closest(".video-container");

				if ($(video).get(0).paused === true) {

					// Play the video

					videoWrap.toggleClass("paused play");
					$(video).get(0).play();

				} else {

					// Pause the video

					videoWrap.toggleClass("paused play");
					$(video).get(0).pause();

				}

			}

			function videoSetup() {

				var videoWrap = $(".not-autoplay"),
				playButton = videoWrap.find(".play-button"),
				video = videoWrap.find("video");

				videoWrap.each( function(index, val) {

					videoWrap.addClass("paused");

					playButton.on("click", function () {

						$(this).blur();
						changeState(video);

					});

					video.bind("ended", function() {

						restartVideo(video);

					});

				});

			}

			function smartVideo() {

				var smartVidWrap = $(".smart-video"),
				smartVid = smartVidWrap.find("video"),
				interacted = smartVidWrap.hasClass("interacted");

				if (smartVid[0] !== undefined) {

					var videoPos = smartVid.offset().top,
					videoHeight = smartVid.height(),
					topOfWindow = $(window).scrollTop();

					if (interacted === false) {

						if (videoPos <= topOfWindow + videoHeight && videoPos > topOfWindow - (videoHeight / 2)) {

							smartVid.get(0).play();
							smartVidWrap.toggleClass("paused play");

						}

						else {

							smartVid.get(0).pause();
							smartVidWrap.toggleClass("paused play");

						}

					}

				}

				if (interacted === false) {

					smartVid.on("click", function() {

						changeState(smartVid);
						smartVid.get(0).pause();
						smartVidWrap.addClass("interacted");

					});

				}

				smartVid.bind("ended", function() {

					smartVidWrap.removeClass("smart-video");
					restartVideo(smartVid);

				});

			}

			$(document).ready(function() {

				videoSetup();
				smartVideo();

			});

			$(window).scroll(function() {

				smartVideo();

			});

		})(jQuery);


		/*-------------------------------------------
			Open External URLs in New Tab
		-------------------------------------------*/

		// Notes...


		$('a[rel="external"]').click(function() {

			window.open( $(this).attr('href') );

			return false;

		});


		/*-------------------------------------------
			Screen Size
		-------------------------------------------*/


		// Add class of "dev" to <body>


		$("body").addClass("dev");


		// Displays screen size on the fly.


		var windowWidth = $(window).width();

		var windowHeight = $(window).height();

		$("#footer").after('<div id="dev"></div>');

		$("#dev").text(windowWidth + ' ' + 'W' + ' ' + '/' + ' ' + windowHeight + ' ' + 'H');


	});


	/* On Page Load */


	$(window).load(function() {


		/*-------------------------------------------
			Title
		-------------------------------------------*/

		// Notes...


		/*-------------------------------------------
			Grid
		-------------------------------------------*/

		// Notes...


		var $body = $("body")

		var $folioItems = $("#portfolio"),
			$folioElements = $("#portfolio .item")

		var $article = $("#article");

		if ($folioItems.length > 0) {

			$folioItems.imagesLoaded(function() {

				var columWidthh = getFolioColWidth();

				if ($folioItems.hasClass("layout-fixed")) $folioElements.each(function() {

						$(this).width(columWidthh[0])

				});

				else $folioElements.each(function() {

					$(this).width(columWidthh[0] * (columWidthh[1] == 1 ? 1 : $(this).data("factor")))

				});

				$folioItems.isotope({

					isOriginLeft: !$body.hasClass("rtl") ? true : false,
					itemSelector: ".item",

					masonry: {

						columnWidth: columWidthh[0]

					},

					isResizeBound: false

				});

				if ($folioItems.hasClass("layout-fixed")) $(window).resize(function() {

					var columWidthh = getFolioColWidth();
					var elems = $folioItems.isotope("getItemElements");
					for (var i = 0; i < elems.length; i++) $(elems[i]).width(columWidthh[0]);

					$folioItems.isotope({

						masonry: {

							columnWidth: columWidthh[0]

						}

					})

				}).trigger("resize");

				else $(window).resize(function() {

					var columWidthh = getFolioColWidth();
					var elems = $folioItems.isotope("getItemElements");

					for (var i = 0; i < elems.length; i++) $(elems[i]).width(columWidthh[0] * (columWidthh[1] == 1 ? 1 : $(elems[i]).data("factor")));

					$folioItems.isotope({

						masonry: {

							columnWidth: columWidthh[0]

						}

					})

				}).trigger("resize")
			});

			$body.append('<div id="responsive-queries"><div id="break-43"></div><div id="break-42"></div><div id="break-41"></div><div id="break-32"></div><div id="break-31"></div><div id="break-21"></div></div>');

			var $break21 = $("#break-21"),
				$break32 = $("#break-32"),
				$break31 = $("#break-31"),
				$break43 = $("#break-43"),
				$break42 = $("#break-42"),
				$break41 = $("#break-41")

		}

		if (window.addEventListener) window.addEventListener("orientationchange", function() {

			setTimeout(function() {

				$(window).trigger("resize")

			}, 500)

		}, false);

		function getFolioColWidth() {

			var colWidth = 0,
				factor = 0,
				containerWidth = $article.width();

			if ($folioItems.hasClass("cols-two"))

				if ($break21.css("display") == "block") {

					colWidth = containerWidth;
					factor = 1

				} else colWidth = containerWidth / 2;

			else if ($folioItems.hasClass("cols-three"))

				if ($break31.css("display") == "block") {

					colWidth = containerWidth;
					factor = 1

				} else if ($break32.css("display") == "block") colWidth = containerWidth / 2;

			else colWidth = containerWidth / 3;

			else if ($break41.css("display") == "block") {

				colWidth = containerWidth;
				factor = 1

			} else if ($break42.css("display") == "block") colWidth = containerWidth / 2;

			else if ($break43.css("display") == "block") colWidth = containerWidth / 3;

			else colWidth = containerWidth / 4;

			return Array(colWidth, factor)

		}


		/*-------------------------------------------
			Flexslider
		-------------------------------------------*/

		// Notes...


		$(".home .flexslider").flexslider({

			animation: "fade",
			slideshowSpeed: 5000,
			slideshow: false,
			animationSpeed: 600,
			useCSS: false,
			controlNav: true,
			directionNav: false,

			start: function(slider){

				$("body").removeClass("loading");

				$('.current-slide').text(slider.currentSlide+1);
				$('.total-slides').text(slider.count);

			},

			before: function(slider) {

				$('.current-slide').text(slider.animatingTo+1);

			}

		});


		/*-------------------------------------------
			Flexslider
		-------------------------------------------*/

		// Notes...


		$(".matrix-carousel .flexslider").flexslider({

			animation: "fade",
			slideshowSpeed: 7000,
			useCSS: false,
			controlNav: true,
			directionNav: false,
			start: function(slider){

				$("body").removeClass("loading");

			}

		});


	});


	/* On Window Resize */


	$(window).resize(function() {


		/*-------------------------------------------
			Screen Size
		-------------------------------------------*/


		// Displays screen size on the fly.


		var windowWidth = $(window).width();

		var windowHeight = $(window).height();

		$("#dev").text(windowWidth + ' ' + 'W' + ' ' + '/' + ' ' + windowHeight + ' ' + 'H');


	});


})(window.jQuery);