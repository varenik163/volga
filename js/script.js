if (jQuery(window).width() > 1024) {
    setTimeout(function () {
        jQuery('#slidebotbox').animate({'bottom': '0px'}, 300);
    }, 30000);
}

jQuery(document).ready(function () {
	jQuery('#sidebar-btn').click(function() {
	    jQuery('.sidebar-wrapper').toggleClass('opened_sidebar', 300);
		jQuery('#sidebar').toggle(200);
	});
	jQuery('.slidebotbox_close').click(function () {
		jQuery(this).parent().hide(200);
	});

	/*jQuery(window).scroll(function () {
		if(jQuery(window).scrollTop() >= 20) jQuery('.top_bar').css({
			'background': '#f5f7f9'
		});

		if(jQuery(window).scrollTop() < 20) jQuery('.top_bar').css({
			'background': 'transparent'
		})
	});*/

	// Search
	function onSearchClick() {
		var parent = jQuery(this).parent();
		var searchform = parent.find('.searchform');

		searchform.toggleClass('search-open');
		parent.find('.search_input').focus();
		jQuery(this).css({ 'display' : 'none' });
		parent.find('.icon-arrow-up').css({ 'display' : 'inline-block' });
	}

	jQuery('.icon-search').click(onSearchClick);

	jQuery('.icon-arrow-up').click(function () {
		var parent = jQuery(this).parent();
		parent.find('.searchform').toggleClass('search-open');
		parent.find('.icon-arrow-up').css({ 'display' : 'none' });
		parent.find('.icon-search').css({ 'display': 'inline-block' });
	});

	jQuery('#searchform .icon.icon-arrow-up').click(function () {
		var parent = jQuery(this).parent().parent();
		parent.find('.searchform').toggleClass('search-open');
		parent.find('.icon-arrow-up').css({ 'display' : 'none' });
		parent.find('.icon-search').css({ 'display': 'inline-block' });
	});

	// Slider
	jQuery('.row__inner').slick({
		slidesToShow: 4,
		slidesToScroll: 1,
		infinite: true,
		responsive: [
			{
				breakpoint: 768,
				settings: {
					arrows: false,
					centerMode: true,
					centerPadding: '40px',
					slidesToShow: 3
				}
			},
			{
				breakpoint: 480,
				settings: {
					arrows: false,
					centerMode: true,
					centerPadding: '40px',
					slidesToShow: 1
				}
			}
		]
	});

	jQuery('.specs-slider').slick({
		slidesToShow: 4,
		slidesToScroll: 1,
		infinite: true,
		prevArrow: '<button type="button" class="slick-prev"></button>',
		nextArrow: '<button type="button" class="slick-next"></button>',
		responsive: [
			{
				breakpoint: 992,
				settings: {
					arrows: false,
					centerMode: true,
					centerPadding: '40px',
					slidesToShow: 2
				}
			},
			{
				breakpoint: 768,
				settings: {
					arrows: false,
					centerMode: true,
					centerPadding: '40px',
					slidesToShow: 2
				}
			},
			{
				breakpoint: 480,
				settings: {
					arrows: false,
					centerMode: true,
					centerPadding: '40px',
					slidesToShow: 1
				}
			}
		]

	});
	jQuery('.campaign-slider').slick({
		slidesToShow: 2,
		slidesToScroll: 1,
		infinite: true,
		prevArrow: '<button type="button" class="slick-prev"></button>',
		nextArrow: '<button type="button" class="slick-next"></button>',
		responsive: [
			{
				breakpoint: 768,
				settings: {
					arrows: false,
					centerMode: true,
					centerPadding: '40px',
					slidesToShow: 1
				}
			},
			{
				breakpoint: 480,
				settings: {
					variableWidth: true,
					arrows: false,
					centerMode: true,
					centerPadding: '40px',
					slidesToShow: 1
				}
			}
		]
	});
	jQuery('.campaign-home-slider').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
        dots: true,
        autoplay: true,
        autoplaySpeed: 3500,
		infinite: true,
        arrows: false,
        pauseOnHover: true,
		responsive: [
			{
				breakpoint: 768,
				settings: {
					arrows: false,
					centerMode: true,
					centerPadding: '40px',
					slidesToShow: 1
				}
			},
			{
				breakpoint: 480,
				settings: {
					variableWidth: true,
					arrows: false,
					centerMode: true,
					centerPadding: '40px',
					slidesToShow: 1
				}
			}
		]
	});
	/*var slideWidth = document.querySelector('.slider-item').clientWidth;
	var marginR = document.querySelector('.tile').style.marginRight;
	jQuery('.arrow-right').click(function() {
		var parent = jQuery(this).parent();
		var first = parent.find('.tile').first();
		var clone = first.clone();

		parent.find('.row__inner').append(clone);

		var slider = jQuery('.slider');
		jQuery('.slider').animate({scrollLeft: slider.scrollLeft() + slideWidth + marginR}, 500)
		first.remove();
	});

	jQuery('.arrow-left').click(function() {
		jQuery('.slider').animate({scrollLeft: slider.scrollLeft() - slideWidth - marginR}, 500)
	});*/

	// Order request from page
	function AjaxFormPageRequest() {
		jQuery.ajax({
			url:    window.location.origin + '/wp-content/themes/volga/helpers/sendOrderByEmail.php', //Адрес подгружаемой страницы
			type:     "POST", //Тип запроса
			dataType: "html", //Тип данных
			data: jQuery("#order_call_page").serialize(),
			success: function(response) { //Если все нормально
				console.log(response);
				jQuery("#order_call_page").hide();
				jQuery(".thanks_page").show();
				jQuery(".thanks_page").html(response);
			},
			error: function(error) { //Если ошибка
				jQuery(".thanks_page").html(error);
			}
		});
	}

	var btn = document.getElementById('send_page');
	if(btn){ btn.onclick = function submit_form(value){
		var phone = jQuery("#your_phone_page");
		var name = jQuery("#your_name_page");
		jQuery('#order_call_page .error').removeClass('error');
		if(! name.val() ) {
			name.addClass('error').focus();
			return false;
		}
		if(! phone.val() ) {
			phone.addClass('error').focus();
			return false;
		}
		else {
			AjaxFormPageRequest();
			return false;
		}
	}}
	
	function AjaxFormSignRequest() {
		jQuery.ajax({
			url:    window.location.origin + '/wp-content/themes/volga/helpers/sendSignByEmail.php', //Адрес подгружаемой страницы
			type:     "POST", //Тип запроса
			dataType: "html", //Тип данных
			data: jQuery("#sign_form").serialize(),
			success: function(response) { //Если все нормально
				console.log(response);
				jQuery("#sign_form").hide();
				jQuery(".thanks").show();
				jQuery(".thanks").html(response);
				setTimeout(function(){
					jQuery("#modalSign").modal('hide');
					jQuery(".thanks").hide();
					jQuery("#sign_form").show();
				}, 3000);
			},
			error: function(error) { //Если ошибка
				jQuery(".thanks_page").html(error);
			}
		});
	}

	var btn = document.getElementById('sign_send');
	if(btn){ btn.onclick = function sign_submit_form(value){
		var phone = jQuery("#sign_phone");
		var name = jQuery("#sign_name");
		jQuery('#sign_form .error').removeClass('error');
		if(! name.val() ) {
			name.addClass('error').focus();
			return false;
		}
		if(! phone.val() ) {
			phone.addClass('error').focus();
			return false;
		}
		else {
			AjaxFormSignRequest();
			return false;
		}
	}}
	

	// Order request
	function AjaxFormRequest() {
		jQuery.ajax({
			url:    window.location.origin + '/wp-content/themes/volga/helpers/sendOrderByEmail.php', //Адрес подгружаемой страницы
			type:     "POST", //Тип запроса
			dataType: "html", //Тип данных
			data: jQuery("#order_call").serialize(),
			success: function(response) { //Если все нормально
				console.log(response);
				jQuery("#order_call").hide();
				jQuery(".thanks").show();
				jQuery(".thanks").html(response);
				setTimeout(function(){
					jQuery("#modalOrder").modal('hide');
					jQuery(".thanks").hide();
					jQuery("#order_call").show();
				}, 3000);
			},
			error: function(error) { //Если ошибка
				jQuery(".thanks").html(error);
			}
		});
	}

	var btn = document.getElementById('send');
	if(btn){ btn.onclick = function submit_form(value){
		var phone = jQuery("#your_phone");
		var name = jQuery("#your_name");
		jQuery('#order_call .error').removeClass('error');
		if(! name.val() ) {
			name.addClass('error').focus();
			return false;
		}
		if(! phone.val() ) {
			phone.addClass('error').focus();
			return false;
		}
		else {
			AjaxFormRequest();
			return false;
		}
	}}

	// New review
	function AjaxFormReview() {
		jQuery.ajax({
			url:    window.location.origin + '/wp-content/themes/volga/helpers/sendNewReviewByEmail.php', //Адрес подгружаемой страницы
			type:     "POST", //Тип запроса
			dataType: "html", //Тип данных
			data: jQuery("#new_review").serialize(),
			success: function(response) { //Если все нормально
				console.log(response);
				jQuery("#new_review").hide();
				jQuery(".thanks").show();
				jQuery(".thanks").html(response);
				setTimeout(function(){
					jQuery("#modalReview").modal('hide');
					jQuery(".thanks").hide();
					jQuery("#new_review").show();
				}, 3000);
			},
			error: function(error) { //Если ошибка
				jQuery(".thanks").html(error);
			}
		});
	}

	var btn = document.getElementById('send_review');
	if(btn){ btn.onclick = function send_review(value){
		var person_name = jQuery("#person_name");
		var review_text = jQuery("#review_text");

		jQuery('#new_review .error').removeClass('error');

		if(! person_name.val() )
		{
			person_name.addClass('error').focus();
			return false;
		}
		else if(! review_text.val() )
		{
			review_text.addClass('error').focus();
			return false;
		}
		else {
			AjaxFormReview();
			return false;
		}
	}}

    // New tour
    function AjaxFormTour() {
        console.log(jQuery("#cruise_form").serialize())
        jQuery.ajax({
            url:    window.location.origin + '/wp-content/themes/volga/helpers/sendNewReviewByEmail.php', //Адрес подгружаемой страницы
            type:     "POST", //Тип запроса
            dataType: "html", //Тип данных
            data: jQuery("#cruise_form").serialize(),
            success: function(response) { //Если все нормально
                console.log(response);
                jQuery("#cruise_form").hide();
                jQuery(".thanks").show(); 
                jQuery(".thanks").html(response);
                setTimeout(function(){
                    jQuery("#modalCruise").modal('hide');
                    jQuery(".thanks").hide();
                    jQuery("#cruise_form").show();
                }, 3000);
            },
            error: function(error) { //Если ошибка
                jQuery(".thanks").html(error);
            }
        });
    }

    var btn = document.getElementById('send_tour_order');
    var btn_send_cruise_order = document.getElementById('send_cruise_order');
    function send_tour_order(value){
        var person_name = jQuery("#cruise_form_name");
        var review_text = jQuery("#cruise_form_text");
        var phone = jQuery("#cruise_phone");
        var mail = jQuery("#cruise_mail");

        jQuery('#new_review .error').removeClass('error');

        if(!person_name.val() )
        {
            person_name.addClass('error').focus();
            return false;
        }
        else if(!review_text.val() )
        {
            review_text.addClass('error').focus();
            return false;
        }
        else if(! phone.val() )
        {
            phone.addClass('error').focus();
            return false;
        }
        else if(!mail.val() )
        {
            mail.addClass('error').focus();
            return false;
        }
        else {
            AjaxFormTour();
            return false;
        }
    }
    if(btn) btn.onclick = send_tour_order;
    if (btn_send_cruise_order) btn_send_cruise_order.onclick = send_tour_order;


	// liquid page help
	function AjaxFormLiquidHelp() {
		jQuery.ajax({
			url:    window.location.origin + '/wp-content/themes/volga/helpers/sendPhoneByEmail.php', //Адрес подгружаемой страницы
			type:     "POST", //Тип запроса
			dataType: "html", //Тип данных
			data: jQuery("#order_call_page_help").serialize(),
			success: function(response) { //Если все нормально
				console.log(response);
				jQuery("#order_call_page_help").hide();
				jQuery(".thanks_page_help").show();
				jQuery(".thanks_page_help").html(response);
			},
			error: function(error) { //Если ошибка
				jQuery(".thanks_page_help").html(error);
			}
		});
	}

	var btn = document.getElementById('send_page_help');
	if(btn){ btn.onclick = function send_review(value){
		var phone = jQuery("#your_phone_page_help");

		jQuery('#order_call_page_help .error').removeClass('error');

		if(! phone.val() )
		{
			phone.addClass('error').focus();
			return false;
		}
		else {
			AjaxFormLiquidHelp();
			return false;
		}
	}}

	// call widjet
	window.onscroll = function() {
		var widjet = document.querySelector('.z-circle-message-button');
		if(!widjet) return;
		var scrollTop = document.documentElement.scrollTop;
		var rectTop = document.documentElement.clientHeight - document.getElementsByTagName('footer')[0].getBoundingClientRect().height;
		var footerOffset = document.getElementsByTagName('footer')[0].offsetTop;
		//console.log(scrollTop + rectTop, footerOffset);
		if( scrollTop + rectTop + 100 >= footerOffset) widjet.style.display = 'none';
		else if(widjet.style.display !== 'flex') widjet.style.display = 'flex'
	};

	//review preview

	jQuery('.review-preview-link').click(function (e) {
		jQuery('.review-' + jQuery(this).attr('data-review')).toggleClass('open')
	});
	jQuery('.review-preview').click(function () {
		jQuery(this).toggleClass('open')
	});

	if(window.innerWidth > 1200 && window.innerHeight > 875) jQuery('.service-custom-top').height(window.innerHeight);
	if(window.innerWidth > 1400 && window.innerHeight > 875) jQuery('.head_top').height(window.innerHeight - 170);
    jQuery('#sidebar').css({ 'maxHeight': window.innerHeight - 350 });
});

