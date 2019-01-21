jQuery(document).ready(function($) {
	$(document).on('mouseenter', '.carousel-control-next', function() {
		var nextThumb = $('.carousel-item.active').find('.nextimg-preview').data('image');

		$(this).find('.slider-thumbnail').css({'background-image': 'url('+nextThumb+')'});

	});

	$(document).on('mouseenter', '.carousel-control-prev', function() {
		var prevThumb = $('.carousel-item.active').find('.previmg-preview').data('image');

		$(this).find('.slider-thumbnail').css({'background-image': 'url('+prevThumb+')'});

	});
});