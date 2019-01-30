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


//Ajax load more function

$(document).on('click', '.sunsetWp-load-more:not(.loading)', function() {

	var that = $(this);
	var page = $(this).data('page');
	var newpage = page + 1;
	var ajaxurl = that.data('url');

	that.addClass('loading').find('.load-text').slideUp(320);
	that.find('.sunset-loading').addClass('spin');
	
	$.ajax({
		url : ajaxurl,
		type : 'post',
		data : {
			page : page,
			action : 'sunsetWp_load_more'
		},
		error : function( response ) {
			console.log( response );
		},
		success : function( response ) {
			that.data('page', newpage);
			$('.sunsetWp-posts-container').append( response );
			that.removeClass('loading').find('.load-text').slideDown(320);
			that.find('.sunset-loading').removeClass('spin');
		}

	}); 
});

});