jQuery(document).ready(function($) {
	var carousel = '.gallery-post';

	sunsetWp_gallery_thumbs(carousel);

	$(carousel).on('slid.bs.carousel', function() {
		sunsetWp_gallery_thumbs(carousel);
	});
	function sunsetWp_gallery_thumbs( carousel ) {
		var nextThumb = $('.carousel-item.active').find('.nextimg-preview').data('image');
		var prevThumb = $('.carousel-item.active').find('.previmg-preview').data('image');

		$(carousel).find('.carousel-control-next').find('.slider-thumbnail').css({'background-image': 'url('+nextThumb+')'});
		$(carousel).find('.carousel-control-prev').find('.slider-thumbnail').css({'background-image': 'url('+prevThumb+')'});
	}
});