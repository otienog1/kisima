(function($){

	var mediaUploader;

	$('#kisima-upload-btn').on('click', function(e){
		e.preventDefault();

		if (mediaUploader) {
			mediaUploader.open();
			return;
		}

		mediaUploader = wp.media.frames.file_frame = wp.media({
			title: 'Choose Avatar',
			button: {
				text: 'Select'
			},
			multiple: false
		});

		mediaUploader.on('select', function() {
			attachment = mediaUploader.state().get('selection').first().toJSON();
			$('#avatar').val(attachment.url);
			$('.kisima-avatar').css('background-image', 'url('+attachment.url+')');
		});

		mediaUploader.open();
	});
}(jQuery));