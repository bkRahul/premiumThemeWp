jQuery(document).ready(function($) {
	var mediaUploader;

	$('#upload-picture').on('click', function(e) {
		e.preventDefault();
		if(mediaUploader) {
			mediaUploader.open();
			return;
		}

		mediaUploader = wp.media.frames.file_frame = wp.media({
			title: 'Choose a profile picture',
			button: {
				text: 'Choose Picture'
			},
			multiple: false
		});

		mediaUploader.on('select', function(){
			attachment = mediaUploader.state().get('selection').first().toJSON();
			$('#profile-picture').val(attachment.url);//attach the image url to input field
			$('#profile-image-preview').css('background-image', 'url('+attachment.url+')');//preview the image on selecting
		});
		mediaUploader.open();
	});

	$('#remove-picture').on('click', function(e) {
		e.preventDefault();	

		var answer = confirm("Do you want to remove profile picture");
		if (answer == true) {
			$('#profile-picture').val('');
			$('.sidebar-admin-form').submit();

		}
		return;
	});
});