
(function($){
	"use strict";
	
	//Loader	
	$(window).on('load', function () {
		$('.Loader').delay(350).fadeOut('slow');
		$('body').delay(350).css({ 'overflow': 'visible' });
	})

    // Navigation
	! function(n, e, i, a) {
		n.navigation = function(t, s) {
			var o = {
					responsive: !0,
					mobileBreakpoint:992,
					showDuration: 300,
					hideDuration: 300,
					showDelayDuration: 0,
					hideDelayDuration: 0,
					submenuTrigger: "hover",
					effect: "fade",
					submenuIndicator: !0,
					hideSubWhenGoOut: !0,
					visibleSubmenusOnMobile: !1,
					fixed: !1,
					overlay: !0,
					overlayColor: "rgba(0, 0, 0, 0.5)",
					hidden: !1,
					offCanvasSide: "left",
					onInit: function() {},
					onShowOffCanvas: function() {},
					onHideOffCanvas: function() {}
				},
				u = this,
				r = Number.MAX_VALUE,
				d = 1,
				f = "click.nav touchstart.nav",
				l = "mouseenter.nav",
				c = "mouseleave.nav";
			u.settings = {};
			var t = (n(t), t);
			n(t).find(".nav-menus-wrapper").prepend("<span class='nav-menus-wrapper-close-button'>✕</span>"), n(t).find(".nav-search").length > 0 && n(t).find(".nav-search").find("form").prepend("<span class='nav-search-close-button'>✕</span>"), u.init = function() {
				u.settings = n.extend({}, o, s), "right" == u.settings.offCanvasSide && n(t).find(".nav-menus-wrapper").addClass("nav-menus-wrapper-right"), u.settings.hidden && (n(t).addClass("navigation-hidden"), u.settings.mobileBreakpoint = 99999), v(), u.settings.fixed && n(t).addClass("navigation-fixed"), n(t).find(".nav-toggle").on("click touchstart", function(n) {
					n.stopPropagation(), n.preventDefault(), u.showOffcanvas(), s !== a && u.callback("onShowOffCanvas")
				}), n(t).find(".nav-menus-wrapper-close-button").on("click touchstart", function() {
					u.hideOffcanvas(), s !== a && u.callback("onHideOffCanvas")
				}), n(t).find(".nav-search-button").on("click touchstart", function(n) {
					n.stopPropagation(), n.preventDefault(), u.toggleSearch()
				}), n(t).find(".nav-search-close-button").on("click touchstart", function() {
					u.toggleSearch()
				}), n(t).find(".megamenu-tabs").length > 0 && y(), n(e).resize(function() {
					m(), C()
				}), m(), s !== a && u.callback("onInit")
			};
			var v = function() {
				n(t).find("li").each(function() {
					n(this).children(".nav-dropdown,.megamenu-panel").length > 0 && (n(this).children(".nav-dropdown,.megamenu-panel").addClass("nav-submenu"), u.settings.submenuIndicator && n(this).children("a").append("<span class='submenu-indicator'><span class='submenu-indicator-chevron'></span></span>"))
				})
			};
			u.showSubmenu = function(e, i) {
				g() > u.settings.mobileBreakpoint && n(t).find(".nav-search").find("form").slideUp(), "fade" == i ? n(e).children(".nav-submenu").stop(!0, !0).delay(u.settings.showDelayDuration).fadeIn(u.settings.showDuration) : n(e).children(".nav-submenu").stop(!0, !0).delay(u.settings.showDelayDuration).slideDown(u.settings.showDuration), n(e).addClass("nav-submenu-open")
			}, u.hideSubmenu = function(e, i) {
				"fade" == i ? n(e).find(".nav-submenu").stop(!0, !0).delay(u.settings.hideDelayDuration).fadeOut(u.settings.hideDuration) : n(e).find(".nav-submenu").stop(!0, !0).delay(u.settings.hideDelayDuration).slideUp(u.settings.hideDuration), n(e).removeClass("nav-submenu-open").find(".nav-submenu-open").removeClass("nav-submenu-open")
			};
			var h = function() {
					n("body").addClass("no-scroll"), u.settings.overlay && (n(t).append("<div class='nav-overlay-panel'></div>"), n(t).find(".nav-overlay-panel").css("background-color", u.settings.overlayColor).fadeIn(300).on("click touchstart", function(n) {
						u.hideOffcanvas()
					}))
				},
				p = function() {
					n("body").removeClass("no-scroll"), u.settings.overlay && n(t).find(".nav-overlay-panel").fadeOut(400, function() {
						n(this).remove()
					})
				};
			u.showOffcanvas = function() {
				h(), "left" == u.settings.offCanvasSide ? n(t).find(".nav-menus-wrapper").css("transition-property", "left").addClass("nav-menus-wrapper-open") : n(t).find(".nav-menus-wrapper").css("transition-property", "right").addClass("nav-menus-wrapper-open")
			}, u.hideOffcanvas = function() {
				n(t).find(".nav-menus-wrapper").removeClass("nav-menus-wrapper-open").on("webkitTransitionEnd moztransitionend transitionend oTransitionEnd", function() {
					n(t).find(".nav-menus-wrapper").css("transition-property", "none").off()
				}), p()
			}, u.toggleOffcanvas = function() {
				g() <= u.settings.mobileBreakpoint && (n(t).find(".nav-menus-wrapper").hasClass("nav-menus-wrapper-open") ? (u.hideOffcanvas(), s !== a && u.callback("onHideOffCanvas")) : (u.showOffcanvas(), s !== a && u.callback("onShowOffCanvas")))
			}, u.toggleSearch = function() {
				"none" == n(t).find(".nav-search").find("form").css("display") ? (n(t).find(".nav-search").find("form").slideDown(), n(t).find(".nav-submenu").fadeOut(200)) : n(t).find(".nav-search").find("form").slideUp()
			};
			var m = function() {
					u.settings.responsive ? (g() <= u.settings.mobileBreakpoint && r > u.settings.mobileBreakpoint && (n(t).addClass("navigation-portrait").removeClass("navigation-landscape"), D()), g() > u.settings.mobileBreakpoint && d <= u.settings.mobileBreakpoint && (n(t).addClass("navigation-landscape").removeClass("navigation-portrait"), k(), p(), u.hideOffcanvas()), r = g(), d = g()) : k()
				},
				b = function() {
					n("body").on("click.body touchstart.body", function(e) {
						0 === n(e.target).closest(".navigation").length && (n(t).find(".nav-submenu").fadeOut(), n(t).find(".nav-submenu-open").removeClass("nav-submenu-open"), n(t).find(".nav-search").find("form").slideUp())
					})
				},
				g = function() {
					return e.innerWidth || i.documentElement.clientWidth || i.body.clientWidth
				},
				w = function() {
					n(t).find(".nav-menu").find("li, a").off(f).off(l).off(c)
				},
				C = function() {
					if (g() > u.settings.mobileBreakpoint) {
						var e = n(t).outerWidth(!0);
						n(t).find(".nav-menu").children("li").children(".nav-submenu").each(function() {
							n(this).parent().position().left + n(this).outerWidth() > e ? n(this).css("right", 0) : n(this).css("right", "auto")
						})
					}
				},
				y = function() {
					function e(e) {
						var i = n(e).children(".megamenu-tabs-nav").children("li"),
							a = n(e).children(".megamenu-tabs-pane");
						n(i).on("click.tabs touchstart.tabs", function(e) {
							e.stopPropagation(), e.preventDefault(), n(i).removeClass("active"), n(this).addClass("active"), n(a).hide(0).removeClass("active"), n(a[n(this).index()]).show(0).addClass("active")
						})
					}
					if (n(t).find(".megamenu-tabs").length > 0)
						for (var i = n(t).find(".megamenu-tabs"), a = 0; a < i.length; a++) e(i[a])
				},
				k = function() {
					w(), n(t).find(".nav-submenu").hide(0), navigator.userAgent.match(/Mobi/i) || navigator.maxTouchPoints > 0 || "click" == u.settings.submenuTrigger ? n(t).find(".nav-menu, .nav-dropdown").children("li").children("a").on(f, function(i) {
						if (u.hideSubmenu(n(this).parent("li").siblings("li"), u.settings.effect), n(this).closest(".nav-menu").siblings(".nav-menu").find(".nav-submenu").fadeOut(u.settings.hideDuration), n(this).siblings(".nav-submenu").length > 0) {
							if (i.stopPropagation(), i.preventDefault(), "none" == n(this).siblings(".nav-submenu").css("display")) return u.showSubmenu(n(this).parent("li"), u.settings.effect), C(), !1;
							if (u.hideSubmenu(n(this).parent("li"), u.settings.effect), "_blank" == n(this).attr("target") || "blank" == n(this).attr("target")) e.open(n(this).attr("href"));
							else {
								if ("#" == n(this).attr("href") || "" == n(this).attr("href")) return !1;
								e.location.href = n(this).attr("href")
							}
						}
					}) : n(t).find(".nav-menu").find("li").on(l, function() {
						u.showSubmenu(this, u.settings.effect), C()
					}).on(c, function() {
						u.hideSubmenu(this, u.settings.effect)
					}), u.settings.hideSubWhenGoOut && b()
				},
				D = function() {
					w(), n(t).find(".nav-submenu").hide(0), u.settings.visibleSubmenusOnMobile ? n(t).find(".nav-submenu").show(0) : (n(t).find(".nav-submenu").hide(0), n(t).find(".submenu-indicator").removeClass("submenu-indicator-up"), u.settings.submenuIndicator ? n(t).find(".submenu-indicator").on(f, function(e) {
						return e.stopPropagation(), e.preventDefault(), u.hideSubmenu(n(this).parent("a").parent("li").siblings("li"), "slide"), u.hideSubmenu(n(this).closest(".nav-menu").siblings(".nav-menu").children("li"), "slide"), "none" == n(this).parent("a").siblings(".nav-submenu").css("display") ? (n(this).addClass("submenu-indicator-up"), n(this).parent("a").parent("li").siblings("li").find(".submenu-indicator").removeClass("submenu-indicator-up"), n(this).closest(".nav-menu").siblings(".nav-menu").find(".submenu-indicator").removeClass("submenu-indicator-up"), u.showSubmenu(n(this).parent("a").parent("li"), "slide"), !1) : (n(this).parent("a").parent("li").find(".submenu-indicator").removeClass("submenu-indicator-up"), void u.hideSubmenu(n(this).parent("a").parent("li"), "slide"))
					}) : k())
				};
			u.callback = function(n) {
				s[n] !== a && s[n].call(t)
			}, u.init()
		}, n.fn.navigation = function(e) {
			return this.each(function() {
				if (a === n(this).data("navigation")) {
					var i = new n.navigation(this, e);
					n(this).data("navigation", i)
				}
			})
		}
	}
	(jQuery, window, document), $(document).ready(function() {
		$("#navigation").navigation()
	});	
	
	// Count
	$(window).on('load', function() {
		$('.count').counterUp({
			delay:20,
			time: 800
		});
	});
	
	$(window).scroll(function() {    
		var scroll = $(window).scrollTop();

		if (scroll >= 50) {
			$(".header").addClass("header-fixed");
		} else {
			$(".header").removeClass("header-fixed");
		}
	});
	
	// Featured Slide
	$('#theme-slide').owlCarousel({
		loop:false,
		margin:0,
		nav:false,
		dots:true,
		navText: ['<i class="fa fa-arrow-left"></i>', '<i class="fa fa-arrow-right"></i>'],
		responsiveClass:true,
		responsive:{
			0:{
				items:1,
				autoplay:true
			},
			600:{
				items:2,
				autoplay:true
			},
			1000:{
				items:3,
				autoplay:true
			},
			1280:{
				items:3,
				autoplay:true
			}
		}
	})
	
	// Reviews Slides
	$('#reviews-slide').owlCarousel({
		loop:true,
		margin:0,
		nav:false,
		dots:true,
		navText: ['<i class="fa fa-arrow-left"></i>', '<i class="fa fa-arrow-right"></i>'],
		responsiveClass:true,
		responsive:{
			0:{
				items:1,
				autoplay:true
			},
			600:{
				items:2,
				autoplay:true
			},
			1000:{
				items:3,
				autoplay:true
			},
			1280:{
				items:3,
				autoplay:true
			}
		}
	})
	
	// Featured Slide
	$('#theme-slide-2').owlCarousel({
		loop:true,
		margin:0,
		nav:false,
		dots:true,
		navText: ['<i class="fa fa-arrow-left"></i>', '<i class="fa fa-arrow-right"></i>'],
		responsiveClass:true,
		responsive:{
			0:{
				items:1,
				autoplay:true
			},
			600:{
				items:1,
				autoplay:true
			},
			1000:{
				items:2,
				autoplay:true
			},
			1280:{
				items:2,
				autoplay:true
			}
		}
	})
	
	// Login reviews
	$('#reviews-login').owlCarousel({
		loop:true,
		margin:0,
		nav:false,
		dots:false,
		navText: ['<i class="fa fa-arrow-left"></i>', '<i class="fa fa-arrow-right"></i>'],
		responsiveClass:true,
		responsive:{
			0:{
				items:1,
				autoplay:true
			},
			600:{
				items:1,
				autoplay:true
			},
			1000:{
				items:1,
				autoplay:true
			},
			1280:{
				items:1,
				autoplay:true
			}
		}
	})
	
	$('.confirm-modal2').on('show.bs.modal', function(e) {
		$(this).find('.btn-ok2').attr('href', $(e.relatedTarget).data('href'));
	  });

	$('.confirm-modal2 .btn-ok2').on('click', function(e) {

		if(loader == 1)
    {
    $('.Loader').show();
    }
	  
		  $.ajax({
		  type:"GET",
		  url:$(this).attr('href'),
		  success:function(data)
		  {
				$('.confirm-modal2').modal('hide');
				toastr.success("Successfully Updated");
	  
				if(loader == 1)
    {
    $('.Loader').hide();
    }
	  
		  }
		  });
		  return false;
		});
	
	/****----- Counter ---------*/
	$('.count').on('each', function () {
		$(this).prop('Counter',0).animate({
			Counter: $(this).text()
		}, {
			duration: 4000,
			easing: 'swing',
			step: function (now) {
				$(this).text(Math.ceil(now));
			}
		});
	});

	// LOGIN FORM
$("#loginform").on('submit', function (e) {
	var $this = $(this).parent();
	e.preventDefault();
	$this.find('button.submit-btn').prop('disabled', true);
	$this.find('.alert-info').show();
	// $this.find('.alert-info p').html(langg.authenticating);
	$.ajax({
	  method: "POST",
	  url: $(this).prop('action'),
	  data: new FormData(this),
	  dataType: 'JSON',
	  contentType: false,
	  cache: false,
	  processData: false,
	  success: function (data) {
		if ((data.errors)) {
		  $this.find('.alert-success').hide();
		  $this.find('.alert-info').hide();
		  $this.find('.alert-danger').show();
		  $this.find('.alert-danger ul').html('');
		  for (var error in data.errors) {
			$this.find('.alert-danger p').html(data.errors[error]);
		  }
		} else {
		  $this.find('.alert-info').hide();
		  $this.find('.alert-danger').hide();
		  $this.find('.alert-success').show();
		  $this.find('.alert-success p').html('Success !');
		  if (data == 1) {
			location.reload();
		  } else {
			window.location = data;
		  }
  
		}
		$this.find('button.submit-btn').prop('disabled', false);
	  }
  
	});
  
  });
  
  // LOGIN FORM ENDS

 
  

  //submit form
  $("#geniusformdata").on('submit', function (e) {
	var $this = $(this).parent();
	e.preventDefault();
	if(loader == 1)
    {
    $('.Loader').show();
    }
	$this.find('button.submit-btn').prop('disabled', true);
	$this.find('.alert-info').show();
	// $this.find('.alert-info p').html(langg.authenticating);
	$.ajax({
	  method: "POST",
	  url: $(this).prop('action'),
	  data: new FormData(this),
	  dataType: 'JSON',
	  contentType: false,
	  cache: false,
	  processData: false,
	  success: function (data) {
		if ((data.errors)) {
		  $this.find('.alert-success').hide();
		  $this.find('.alert-info').hide();
		  $this.find('.alert-danger').show();
		  $this.find('.alert-danger ul').html('');
		   for (var error in data.errors) {
			$this.find('.alert-danger p').html(data.errors[error]);
		  }
		  if(loader == 1)
		  {
		  $('.Loader').hide();
		  }

		} else {
		  $this.find('.alert-info').hide();
		  $this.find('.alert-danger').hide();
		  $this.find('.alert-success').show();
		  $this.find('.alert-success p').html(data);
		  if(loader == 1)
                {
                $('.Loader').hide();
                }
              
		}
		$('body, html').animate({
			scrollTop: $('html').offset().top
		  }, 'slow');
		  $('.gocover').hide();
		  $this.find('button.submit-btn').prop('disabled', false);
		  $('#refund').modal('hide');
	  }
  
	});
  
  });
  $(".geniusformdata").on('submit', function (e) {
	var $this = $(this).parent();
	e.preventDefault();
	$this.find('button.submit-btn').prop('disabled', true);
	$this.find('.alert-info').show();
	// $this.find('.alert-info p').html(langg.authenticating);
	$.ajax({
	  method: "POST",
	  url: $(this).prop('action'),
	  data: new FormData(this),
	  dataType: 'JSON',
	  contentType: false,
	  cache: false,
	  processData: false,
	  success: function (data) {
		if ((data.errors)) {
		  $this.find('.alert-success').hide();
		  $this.find('.alert-info').hide();
		  $this.find('.alert-danger').show();
		  $this.find('.alert-danger ul').html('');
		  for (var error in data.errors) {
			$this.find('.alert-danger p').html(data.errors[error]);
		  }
		} else {
		  $this.find('.alert-info').hide();
		  $this.find('.alert-danger').hide();
		  $this.find('.alert-success').show();
		  $this.find('.alert-success p').html(data);
  
		}
		$('body, html').animate({
			scrollTop: $('html').offset().top
		  }, 'slow');
		  $('.gocover').hide();
		  $this.find('button.submit-btn').prop('disabled', false);
		  $('#refund').modal('hide');
	  }
  
	});
  
  });

  
	$(".js-cookie-consent-agree").on("click", function () {
		$(".cookie-bar-wrap").removeClass("show");
		$(".cookie-bar-wrap").addClass("hide");
	});


  $("#geniusform2").on('submit', function (e) {
	var $this = $(this).parent();
	e.preventDefault();
	$('button.submit-btn').prop('disabled', true);
	$('.alert-info').show();
	// $this.find('.alert-info p').html(langg.authenticating);
	$.ajax({
	  method: "POST",
	  url: $(this).prop('action'),
	  data: new FormData(this),
	  dataType: 'JSON',
	  contentType: false,
	  cache: false,
	  processData: false,
	  success: function (data) {
	  if ((data.errors)) {
		toastr.error("Something Wrong!");
	  } else {
		toastr.success("Successfully Sent");
	
	  }
	  $('body, html').animate({
		scrollTop: $('html').offset().top
		}, 'slow');
		$('.gocover').hide();
		$('button.submit-btn').prop('disabled', false);
		$('#refund').modal('hide');
	  }
	
	});
	
	});


	$(document).on('submit','#messageform',function(e){
		e.preventDefault();
		var href = $(this).data('href');
		
		$('button.mybtn1').prop('disabled',true);
			$.ajax({
			 method:"POST",
			 url:$(this).prop('action'),
			 data:new FormData(this),
			 contentType: false,
			 cache: false,
			 processData: false,
			 success:function(data)
			 {
				if ((data.errors)) {
					toastr.error("Something Wrong!");
				}
				else
				{
					toastr.success("Successfully Sent");
				}
				
				$('button.mybtn1').prop('disabled',false);
			 }
			});
	  });
	  // POPUP MODAL
	  $('.confirm-modal').on('show.bs.modal', function(e) {
		$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
	  });
	
	  $('.confirm-modal .btn-ok').on('click', function(e) {
	
	var product_id=$(this).attr('href').split("/");
	let item_id = product_id[product_id.length-1];
	
		$.ajax({
		type:"GET",
		url:$(this).attr('href'),
		success:function(data)
		{
			  $('.confirm-modal').modal('hide');
			  $('.alert-danger').hide();
			  $('.alert-success').show();
			  $('.alert-success p').html(data);
			  $(`.items${item_id}`).remove();
		}
		});
		return false;
	  });
	
	  // POPUP MODAL ENDS
  
    // MODAL REGISTER FORM
    $(".mregisterform").on('submit', function (e) {
		e.preventDefault();
		if(loader == 1)
    {
    $('.Loader').show();
    }
		var $this = $(this).parent();
		$this.find('button.submit-btn').prop('disabled', true);
		$this.find('.alert-info').show();
		var processdata = $this.find('.mprocessdata').val();
		$this.find('.alert-info p').html(processdata);
		$.ajax({
		  method: "POST",
		  url: $(this).prop('action'),
		  data: new FormData(this),
		  dataType: 'JSON',
		  contentType: false,
		  cache: false,
		  processData: false,
		  success: function (data) {
			if (data == 1) {
			  window.location = mainurl + '/user/dashboard';
			} else {
  
			  if ((data.errors)) {
				$this.find('.alert-success').hide();
				$this.find('.alert-info').hide();
				$this.find('.alert-danger').show();
				$this.find('.alert-danger ul').html('');
				for (var error in data.errors) {
				  $this.find('.alert-danger p').html(data.errors[error]);
				}
				$this.find('button.submit-btn').prop('disabled', false);
			  } else {
				$this.find('.alert-info').hide();
				$this.find('.alert-danger').hide();
				$this.find('.alert-success').show();
				$this.find('.alert-success p').html(data);
				$this.find('button.submit-btn').prop('disabled', false);
				if(loader == 1)
					{
					$('.Loader').hide();
					}
			  }
			}
			

				window.scrollTo({top: 50, behavior: 'smooth'});
			
		
  
		  }
		});
  
	  });
	  // MODAL REGISTER FORM ENDS
	  $('.refresh_code').on( "click", function() {
		$.get(mainurl+'/contact/refresh_code', function(data, status){
			$('.codeimg1').attr("src",mainurl+"/assets/images/capcha_code.png?time="+ Math.random());
		});
	})


  $(".selectors").on('change',function () {
	var url = $(this).val();
	window.location = url;
  });
  // REGISTER FORM ENDS
  $(document).on('click', 'li.stars', function () {
    let $this = $(this);
    let countStars = $this.find('.fas.fa-star').length;
    $("input[name='rating']").val(countStars);
  });

  // Review Section

  $(document).on('click', '.stars', function () {
    $('.stars').removeClass('active');
    $(this).addClass('active');
    $('#rating').val($(this).data('val'));

  });
  // Review Section Ends  

  $('#reviewform').on('submit', function (e) {
	// console.log('review');
	e.preventDefault();
	e.stopImmediatePropagation();

	var $this = $(this);
	$('.gocover').show();
	$('button.submit-btn').prop('disabled', true);
	$.ajax({
	  method: "POST",
	  url: $(this).prop('action'),
	  data: new FormData(this),
	  contentType: false,
	  cache: false,
	  processData: false,
	  success: function (data) {
		console.log(data);

		if ((data.errors)) {
		  $('.alert-success').hide();
		  $('.alert-danger').show();
		  $('.alert-danger p').html('');
		  for (var error in data.errors) {
			$this.find('.alert-danger p').html(data.errors[error]);
		  }
		  $('#reviewform textarea').eq(0).focus();

		}
		else {
		  $this.find('.alert-info').hide();
		  $this.find('.alert-danger').hide();
		  $this.find('.alert-success').show();
		  $this.find('.alert-success p').html(data);
		
		  $('#star-rating').html(data[1]);
		  $('#reviewform textarea').eq(0).focus();
		  $('#reviewform textarea').val('');
		  $('#reviews-section').load($this.data('href'));
		}
		$('.gocover').hide();
		$('button.submit-btn').prop('disabled', false);
		$('#reviewform').reset();
	  }

	});
  });

  //Forgot Form Start
  // FORGOT FORM

  $("#forgotform").on('submit', function (e) {
	e.preventDefault();
	var $this = $(this).parent();
	$this.find('button.submit-btn').prop('disabled', true);
	$this.find('.alert-info').show();
	$this.find('.alert-info p').html($('.authdata').val());
	$.ajax({
	  method: "POST",
	  url: $(this).prop('action'),
	  data: new FormData(this),
	  dataType: 'JSON',
	  contentType: false,
	  cache: false,
	  processData: false,
	  success: function (data) {
		if ((data.errors)) {
		  $this.find('.alert-success').hide();
		  $this.find('.alert-info').hide();
		  $this.find('.alert-danger').show();
		  $this.find('.alert-danger ul').html('');
		  for (var error in data.errors) {
			$this.find('.alert-danger p').html(data.errors[error]);
		  }
		} else {
		  $this.find('.alert-info').hide();
		  $this.find('.alert-danger').hide();
		  $this.find('.alert-success').show();
		  $this.find('.alert-success p').html(data);
		  $this.find('input[type=email]').val('');
		}
		  $this.find('button.submit-btn').prop('disabled', false);
	  }

	});

  });

  //Forgot Form End

  $(document).on('submit', '#comment-form', function (e) {
    e.preventDefault();
    e.stopImmediatePropagation();

    $('#comment-form button.submit-btn').prop('disabled', true);
    $.ajax({
      method: "POST",
      url: $(this).prop('action'),
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      success: function (data) {
        $("#comment_count").html(data[4]);
        $('#comment-form textarea').val('');
        $('.all-comment').prepend('<li>' +
          '<div class="single-comment comment-section">' +
          '<div class="left-area">' +
          '<img src="' + data[0] + '" alt="">' +
          '<h5 class="name">' + data[1] + '</h5>' +
          '<p class="date">' + data[2] + '</p>' +
          '</div>' +
          '<div class="right-area">' +
          '<div class="comment-body">' +
          '<p>' + data[3] + '</p>' +
          '</div>' +
          '<div class="comment-footer">' +
          '<div class="links">' +
          '<a href="javascript:;" class="comment-link reply mr-2"><i class="fas fa-reply "></i>Reply</a>' +
          '<a href="javascript:;" class="comment-link edit mr-2"><i class="fas fa-edit "></i>Edit</a>' +
          '<a href="javascript:;" data-href="' + data[5] + '" class="comment-link comment-delete mr-2">' +
          '<i class="fas fa-trash"></i>Delete</a>' +
          '</div>' +
          '</div>' +
          '</div>' +
          '</div>' +
          '<div class="replay-area edit-area" style="display:none;">' +
          '<form class="update" action="' + data[6] + '" method="POST">' +
          '<input type="hidden" name="_token" value="' + $('input[name=_token]').val() + '">' +
          '<textarea placeholder="Edit Your Comment" name="text" required=""></textarea>' +
          '<button type="submit">Submit</button>' +
          '<a href="javascript:;" class="remove">Cancel</a>' +
          '</form>' +
          '</div>' +
          '<div class="replay-area reply-reply-area">' +
          '<form class="reply-form" action="' + data[7] + '" method="POST">' +
          '<input type="hidden" name="user_id" value="' + data[8] + '">' +
          '<input type="hidden" name="_token" value="' + $('input[name=_token]').val() + '">' +
          '<textarea placeholder="Write your reply" name="text" required=""></textarea>' +
          '<button type="submit">Submit</button>' +
          '<a href="javascript:;" class="remove">Cancel</a>' +
          '</form>' +
          '</div>' +
          '</li>');

        $('#comment-form button.submit-btn').prop('disabled', false);
      }

    });
  });

  // COMMENT FORM ENDS
	  // REPLY FORM

	  $(document).on('submit', '.reply-form', function (e) {
		e.preventDefault();
		e.stopImmediatePropagation();
		var btn = $(this).find('button[type=submit]');
		btn.prop('disabled', true);
		var $this = $(this).parent();
		var text = $(this).find('textarea');
		$.ajax({
		  method: "POST",
		  url: $(this).prop('action'),
		  data: new FormData(this),
		  contentType: false,
		  cache: false,
		  processData: false,
		  success: function (data) {
			$('#comment-form textarea').val('');
			$('button.submit-btn').prop('disabled', false);
			$this.before('<div class="single-comment replay-review">' +
			  '<div class="left-area">' +
			  '<img src="' + data[0] + '" alt="">' +
			  '<h5 class="name">' + data[1] + '</h5>' +
			  '<p class="date">' + data[2] + '</p>' +
			  '</div>' +
			  '<div class="right-area">' +
			  '<div class="comment-body">' +
			  '<p>' + data[3] + '</p>' +
			  '</div>' +
			  '<div class="comment-footer">' +
			  '<div class="links">' +
			  '<a href="javascript:;" class="comment-link reply mr-2"><i class="fas fa-reply "></i>Reply</a>' +
			  '<a href="javascript:;" class="comment-link edit mr-2"><i class="fas fa-edit "></i>Edit</a>' +
			  '<a href="javascript:;" data-href="' + data[4] + '" class="comment-link reply-delete mr-2">' +
			  '<i class="fas fa-trash"></i>Delete</a>' +
			  '</div>' +
			  '</div>' +
			  '</div>' +
			  '</div>' +
			  '<div class="replay-area edit-area" style="display:none;">' +
			  '<form class="update" action="' + data[5] + '" method="POST">' +
			  '<input type="hidden" name="_token" value="' + $('input[name=_token]').val() + '">' +
			  '<textarea placeholder="Edit Your Reply" name="text" required=""></textarea>' +
			  '<button type="submit">Submit</button>' +
			  '<a href="javascript:;" class="remove">Cancel</a>' +
			  '</form>' +
			  '</div>');
			$this.toggle();
			text.val('');
			btn.prop('disabled', false);
		  }
	
		});
	  });
	
	  // REPLY FORM ENDS
	
	  // EDIT
	  $(document).on('click', '.edit', function (e) {
		// console.log('clicled');
		e.preventDefault();
		e.stopImmediatePropagation();
		
		var text = $(this).parent().parent().prev().find('p').html();
		text = $.trim(text);
		$(this).parents('.single-comment').next('.edit-area').find('textarea').val(text);
		$(this).parents('.single-comment').next('.edit-area').toggle();
	  });
	  // EDIT ENDS
	
	  // UPDATE
	  $(document).on('submit', '.update', function (e) {
		e.preventDefault();
		e.stopImmediatePropagation();
		var btn = $(this).find('button[type=submit]');
		var text = $(this).parent().prev().find('.right-area .comment-body p');
		var $this = $(this).parent();
		btn.prop('disabled', true);
		$.ajax({
		  method: "POST",
		  url: $(this).prop('action'),
		  data: new FormData(this),
		  contentType: false,
		  cache: false,
		  processData: false,
		  success: function (data) {
			text.html(data);
			$this.toggle();
			btn.prop('disabled', false);
		  }
		});
	  });
	  // UPDATE ENDS
	
	  // COMMENT DELETE
	  $(document).on('click', '.comment-delete', function (e) {
		e.preventDefault();
		e.stopImmediatePropagation();
		var count = parseInt($("#comment_count").html());
		count--;
		$("#comment_count").html(count);
		$(this).parent().parent().parent().parent().parent().remove();
		$.get($(this).data('href'));
	  });
	  // COMMENT DELETE ENDS
	
	
	  // COMMENT REPLY
	  $(document).on('click', '.reply', function (e) {
		e.preventDefault();
		e.stopImmediatePropagation();
		$(this).parent().parent().parent().parent().parent().show().find('.reply-reply-area').show();
		$(this).parent().parent().parent().parent().parent().show().find('.reply-reply-area .reply-form textarea').focus();
	
	  });
	  // COMMENT REPLY ENDS
	
	  // REPLY DELETE
	  $(document).on('click', '.reply-delete', function (e) {
		e.preventDefault();
		e.stopImmediatePropagation();
		$(this).parent().parent().parent().parent().remove();
		$.get($(this).data('href'));
	  });
	  // REPLY DELETE ENDS
	
	  // View Replies
	  $(document).on('click', '.view-reply', function (e) {
		e.preventDefault();
		e.stopImmediatePropagation();
		$(this).parent().parent().parent().parent().siblings('.replay-review').removeClass('hidden');
	
	  });
	  // View Replies ENDS
	
	  // CANCEL CLICK
	
	  $(document).on('click', '#comment-area .remove', function (e) {
		e.preventDefault();
		e.stopImmediatePropagation();
		$(this).parent().parent().hide();
	  });
	
	  // CANCEL CLICK ENDS
	  
	  $(document).on('click', '.nextbtn', function(e) {
		e.preventDefault();
		let index = $(this).parents('.tab-pane').next('.tab-pane').index();
		
		$(".checkout-process li").eq(index).find('a').click();
	  })

   
	      // Wishlist Section

		  $(document).on('click', '.add-to-wish', function (e) {
			e.preventDefault();
			
	

			$.get($(this).attr('href'), function (data) {
			  
				if(data.error==1){
					location.href = mainurl+'/user/loginform';
					
				}

			  if (data.status == 2) {
				toastr.success("Successfully Added To Wishlist");
				$('.favorite-area span').html(data.count);
			  }
			  
			  if(data.status == 0) {
				toastr.error("Already Added To Wishlist");
			  }

			  if(data.status == 1){
				toastr.error("You can't Add your own Product");
			  }

			});
	  
			return false;
		  });
	  
		
		  $(document).on('click', '.wishlist-remove', function () {
			$(this).parent().parent().remove();
			$.get($(this).data('href'), function (data) {
			  $('.favorite-area span').html(data);
			  toastr.success("Successfully Removed From The Wishlist");
			});
		  });
	  
		  // Wishlist Section Ends

		  $('.subBtn').on('click',function(e){
			e.preventDefault();
			var url  = $('.subscribe-form').attr('action');
			var data = new FormData(subForm);
	
			$.ajax({
				url  : url,
				type : 'POST',
				data : data,
				cache: false,
				contentType: false,
				processData: false,
				success : function(data){
							if(data == 1){
								$(".subEmail").notify("Please Put Correct Email");
							}
							if(data == 2){
								$(".subEmail").notify("You Already Subscribed");
							}
							if(data == 3){
								$('.subEmail').val('');
								$(".subEmail").notify("Thank you for subscribing us","success");
							}
				}
	
			});
		});
		    //  FORM SUBMIT SECTION

			$(document).on('submit','#contactform',function(e){
				e.preventDefault();
				if(loader == 1)
					{
					$('.Loader').show();
					}
				$('button.submit-btn').prop('disabled',true);
					$.ajax({
					 method:"POST",
					 url:$(this).prop('action'),
					 data:new FormData(this),
					 contentType: false,
					 cache: false,
					 processData: false,
					 success:function(data)
					 {
						if ((data.errors)) {
							toastr.error("Something Wrong");
						  $('#contactform input[type=text], #contactform input[type=email], #contactform textarea').eq(0).focus();
						 
		  
						}
						else
						{
							toastr.success("Successfully Sent Message");
						  $('#contactform input[type=text], #contactform input[type=email], #contactform textarea').eq(0).focus();
						  $('#contactform input[type=text], #contactform input[type=email], #contactform textarea').val('');
						
		  
						}
						if(loader == 1)
						{
						$('.Loader').hide();
						}
						$('button.submit-btn').prop('disabled',false);
					 }
		  
					});
		  
			  });

			  $(document).on('click', '.cat_hm_prod', function () {
				let url = $(this).attr('data-href');
				$('#view_hm_cat_prod').load(url);
				
			})	
})(jQuery);