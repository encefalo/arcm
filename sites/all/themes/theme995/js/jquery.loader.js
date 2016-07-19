jQuery(window).bind('load', function() {
	jQuery('.foreground').toggle('slow');
});

jQuery(function() {
	if (jQuery('html').hasClass('desktop')) {
		jQuery.srSmoothscroll({
			step: 150,
			speed: 800
		});
	}
});

(function($) {
	jQuery(window).load(function($) {
		if (jQuery(".portfolio-grid").length) {
			function getNumColumns() {
				var $folioWrapper = jQuery('#isotope-container').data('cols');

				if ($folioWrapper == '1col') {
					var winWidth = jQuery("#isotope-container").width(),
						column = 1;
					return column;
				}

				else if ($folioWrapper == '2cols') {
					var winWidth = jQuery("#isotope-container").width(),
						column = 2;
					if (winWidth < 380) {
						column = 1;
					}
					return column;
				}

				else if ($folioWrapper == '3cols') {
					var winWidth = jQuery("#isotope-container").width(),
						column = 3;
					if (winWidth < 380) {
						column = 1;
					}
					else if ((winWidth >= 380) && (winWidth < 788)) {
						column = 2;
					}
					else if (winWidth >= 788) {
						column = 3;
					}
					return column;
				}

				else if ($folioWrapper == '4cols') {
					var winWidth = jQuery("#isotope-container").width(),
						column = 4;
					if (winWidth < 380) {
						column = 1;
					}
					else if ((winWidth >= 380) && (winWidth < 788)) {
						column = 2;
					}
					else if ((winWidth >= 788) && (winWidth < 940)) {
						column = 3;
					}
					else if (winWidth >= 940) {
						column = 4;
					}
					return column;
				}
			}

			function setColumnWidth() {
				var columns = getNumColumns(),
					containerWidth = jQuery("#isotope-container").width(),
					postWidth;

				if (columns == 1) {
					postWidth = containerWidth - 30;
				}
				if (columns == 2) {
					postWidth = (containerWidth - 60)/columns;
				}
				if (columns == 3) {
					postWidth = (containerWidth - 90)/columns;
				}
				if (columns == 4) {
					postWidth = (containerWidth - 120)/columns;
				}

				postWidth = Math.floor(postWidth);

				jQuery(".isotope-element").each(function(index) {
					jQuery(this).css({"width" : postWidth + "px"});
				});
			}
			
			var $container = jQuery('#isotope-container'),
				filters = {},
				items_count = jQuery(".isotope-element").size();

			setColumnWidth();
			$container.isotope({
				itemSelector		: '.isotope-element',
				layoutMode			: 'fitRows',
			});

			jQuery(window).on("debouncedresize", function(event) {
				setColumnWidth();
				$container.isotope()
			});
		};

		if (jQuery.cookie('the_cookie') == 0) {
			styleSwitch(0)
		}

		function styleSwitch(cookie) {
			if (cookie == 0) {
				$('#style-mobile').remove();
				$('#skeleton-mobile').remove();
				$('.switcher').text("Responsive Version");
				$.cookie('the_cookie', 0);
			} else {
				$('head').append('<link rel="stylesheet" href="<?php echo base_path().path_to_theme() ?>/css/style-mobile.css" media="screen" id="style-mobile">');
				$('head').append('<link rel="stylesheet" href="<?php echo base_path().path_to_theme() ?>/css/skeleton-mobile.css" media="screen" id="skeleton-mobile">');
				$('.switcher').text("Desktop Version only");
				$.cookie('the_cookie', 1);
			}
		}

		jQuery('.switcher').click(function() {
			styleSwitch(jQuery.cookie('the_cookie') == 0 ? 1 : 0);
			location.reload();
		});
	});
})(jQuery);

jQuery(document).ready(function () {
	jQuery("#isotope-options .option-set li a[data-option-value='.all']").addClass("selected");
	
	// Sticky menu
	if ((jQuery(window).width() > 995) && (jQuery('#header .stickup').length)) {
		jQuery('#header .stickup').tmStickUp({});
	}
	
	// Contact form validation
	var my_form_id = new tFormer('contact-site-form', {
		fields: {
			name: {
				rules: "*"
			},
			mail: {
				rules: "* @"
			},
			subject: {
				rules: "*"
			},
			message: {
				rules: "*"
			}
		}
	});
	
	// Contact form tooltips
	jQuery(".contact-form .form-item-name").append('<div class="error-message">This field is required!</div>');
	jQuery(".contact-form .form-item-mail").append('<div class="error-message">Please enter a valid email address!</div>');
	jQuery(".contact-form .form-item-subject").append('<div class="error-message">This field is required!</div>');
	jQuery(".contact-form .form-item-message .form-textarea-wrapper").append('<div class="error-message">This field is required!</div>');
	
	jQuery(".contact-form input[type='reset']").on("click", function($) {
		jQuery(this).parents(".contact-form").find(".error").removeClass("error");
	})
});

// Back to Top Button
jQuery(window).load(function() {
	jQuery().UItoTop({
		easingType: 'easeOutQuart',
		containerID: 'backtotop'
	});
})

// Mobile menu
jQuery(window).load(function() {
	jQuery('#superfish-1').mobileMenu();
})


// EqualHeight
jQuery.fn.equalHeights = function(minHeight,maxHeight) {
	tallest = (minHeight) ? minHeight : 0;
	this.each(function() {
		if (jQuery(this).height() > tallest) {
			tallest = jQuery(this).height()
		}
	});
	if ((maxHeight) && tallest > maxHeight) {
		tallest = maxHeight;
	}
	return this.each(function() {
		jQuery(this).height(tallest);
	})
}

jQuery(window).load(function() {
	if (jQuery(document).width() > 767) {
		if (jQuery(".equal").length) {
			jQuery(".equal").equalHeights()
		}
	}
})
jQuery(window).resize(function(){
	jQuery(".equal").css({height: 'auto'});
	if (jQuery(document).width() > 767) {
		if (jQuery(".equal").length) {
			jQuery(".equal").equalHeights()
		}
	}
})