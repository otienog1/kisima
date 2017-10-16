// kisimaContactForm

(function($){

	loadPosts();

	var last_scroll = 0;

	$('#menu-quick-links .menu-item-type-custom > a').on('click', function(e){
		e.preventDefault();
		$('.menu-item-has-children').removeClass('open')
		$(this).parent('.menu-item-has-children').addClass('open')
	});

	$('#kisimaContactForm').on('submit', function(e){
		e.preventDefault();

		$('.has-danger').removeClass('has-danger');

		var form = $(this),
			name = form.find('#name').val(),
			email = form.find('#email').val(),
			message = form.find('#message').val(),
			ajaxUrl = form.data('url');

		if ( name == '' ) {
			$('#name').parent('.form-group').addClass('has-danger');
			return;
		}

		if ( email == '' ) {
			$('#email').parent('.form-group').addClass('has-danger');
			return;
		}

		if ( message == '' ) {
			$('#message').parent('.form-group').addClass('has-danger');
			return;
		}

		form.find('input, button, textarea').attr('disabled', 'disabled');

		$('.js-form-submission').slideDown(300);

		$.ajax({
			url: ajaxUrl,
			type: 'post',
			data: {
				name: name,
				email: email,
				message: message,
				action: 'kisima_save_contact'
			},
			error: function(response){
				$('.js-form-submission').slideUp(300, function(){
					$('.js-form-error').slideDown(300);
				});
				form.find('input, button, textarea').removeAttr('disabled');
			},
			success: function(response){
				if ( response == 0 ) {
					$('.js-form-submission').slideUp(300, function(){
							$('.js-form-error').slideDown(300);
						});
					
					setTimeout(function(){
						$('.js-form-error').slideUp(300);
					}, 3000);

					form.find('input, button, textarea').removeAttr('disabled').val('');
					setTimeout(function(){
						$('.js-form-error').slideUp(300);
					}, 2000);
				}else{
					$('.js-form-submission').slideUp(300, function(){
						$('.js-form-success').slideDown(300);
					});
					form.find('input, button, textarea').removeAttr('disabled').val('');

					setTimeout(function(){
						$('.js-form-success').slideUp(300);
					}, 3000);
				}
			}
		});

	});

	$('#feedback-btn').on('click', function(e){

		e.preventDefault();
		$(this).toggleClass('active');

		$('.feedback-body').toggleClass('feedback-open')

	});

	$('#kisimaFeedbackForm').on('submit', function(e){
		e.preventDefault();

		var form = $(this),
			name = form.find('#name').val(),
			email = form.find('#email').val(),
			feedback = form.find('#feedback').val(),
			ajaxUrl = form.data('url');

		form.find('input, button, textarea').attr('disabled', 'disabled');

		$('.js-form-submission').slideDown(300);

		$.ajax({
			url: ajaxUrl,
			type: 'post',
			data: {
				name: name,
				email: email,
				feedback: feedback,
				action: 'kisima_save_feedback'
			},
			error: function(response){
				$('.js-form-submission').slideUp(300, function(){
					$('.js-form-error').slideDown(300);
				});
				form.find('input, button, textarea').removeAttr('disabled');
			},
			success: function(response){
				if ( response == 0 ) {
					$('.js-form-submission').slideUp(300, function(){
							$('.js-form-error').slideDown(300);
						});
					
					setTimeout(function(){
						$('.js-form-error').slideUp(300);
					}, 3000);

					form.find('input, button, textarea').removeAttr('disabled').val('');
					setTimeout(function(){
						$('.js-form-error').slideUp(300);
					}, 2000);
				}else{
					$('.js-form-submission').slideUp(300, function(){
						$('.js-form-success').slideDown(300);
					});
					form.find('input, button, textarea').removeAttr('disabled').val('');

					setTimeout(function(){
						$('.js-form-success').slideUp(300);
					}, 3000);
				}
			}
		});

	});



	$(document).on('click', '.kisima-load-more:not(.loading)', function(e) {

		var parent = $(this);
			page = $(this).data('page'),
			ajaxUrl = parent.data('url'),
			newPage = page+1;

		parent.addClass('loading').find('.load-text').slideUp(300);
		parent.find('.kisima-icon').slideDown(300).addClass('fa-spin');

		$.ajax({

			url: ajaxUrl,
			type: 'post',
			data: {
				page: page,
				action: 'kisima_load_more'
			},
			error: function(response) {
				console.log(response);
			},
			success: function(response) {
				setTimeout( function(){

					parent.data('page', newPage);
					$('.k-post-container').append(response);

					parent.removeClass('loading').find('.load-text').slideDown(300);
					parent.find('.kisima-icon').removeClass('fa-spin');

					loadPosts();
					
				},2000 );

			}

		});
	});

	$(window).scroll(function(){
		var scroll = $(window).scrollTop();

		if ( scroll > last_scroll ) {
			$('.navbar-kisima').addClass('nav-close');
			$('.fixed-main').addClass('top-nav-closed')
		}
		else{
			last_scroll = scroll;
			$('.navbar-kisima').removeClass('nav-close');
			$('.fixed-main').removeClass('top-nav-closed')
		}

		if ( Math.abs( scroll - last_scroll ) > $(window).height()*0.1 ) {
			last_scroll = scroll;

			$('.page-limit').each(function( index ){

				if ( isVisible( $(this) ) ) {
					
					history.replaceState( null, null, $(this).attr('data-page') );

					return(false);

				}

			});
		}

	});

	function loadPosts()
	{

		var posts = $('.kisima-article:not(.reveal)'),
			i = 0;

		setInterval( function(){

			if ( i >= posts.length ) return false;

			var post = posts[i];
			$(post).addClass('reveal');

			i++

		}, 200 );

	}

	function isVisible( element )
	{
		
		var scroll_pos = $(window).scrollTop();
		var window_height = $(window).height();
		var el_top = $(element).offset().top;
		var el_height = $(element).height();
		var el_bottom = el_top + el_height;

		return ( el_bottom - el_height * 0.25 > scroll_pos ) && ( el_top < ( scroll_pos + 0.5 * window_height ) );

	}

	// ƒ (e) {
 //        console.log('first');
 //        $(element).unbind('show.bs.dropdown');
 //        var $el = $(element).on('click.bs.dropdown', this.toggle)
 //    }

}(jQuery));