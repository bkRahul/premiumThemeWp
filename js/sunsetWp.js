jQuery(document).ready(function($) {
	
//init functions	
	revealPosts();

//variable declarations	
	var carousel = '.gallery-post';

	var last_scroll = 0;
	sunsetWp_gallery_thumbs(carousel);

	$(carousel).on('slid.bs.carousel', function() {
		sunsetWp_gallery_thumbs(carousel);
	});

	function sunsetWp_gallery_thumbs( carousel ) {

		$(carousel).each(function() {
	
			var nextThumb = $(this).find('.carousel-item.active').find('.nextimg-preview').data('image');
			var prevThumb = $(this).find('.carousel-item.active').find('.previmg-preview').data('image');

			$(this).find('.carousel-control-next').find('.slider-thumbnail').css({'background-image': 'url('+nextThumb+')'});
			$(this).find('.carousel-control-prev').find('.slider-thumbnail').css({'background-image': 'url('+prevThumb+')'});
		});
	}


//Ajax load more function

$(document).on('click', '.sunsetWp-load-more:not(.loading)', function() {

	var that = $(this);
	var page = $(this).data('page');
	var newpage = page+1;
	var ajaxurl = that.data('url');
	var prev = that.data('prev');
	var archive = that.data('archive');

	if ( typeof prev == 'undefined' ) {
		prev = 0;
	}

	if ( typeof archive == 'undefined' ) {
		archive = 0;
	}

	that.addClass('loading').find('.load-text').slideUp(320);
	that.find('.sunset-loading').addClass('spin');
	
	$.ajax({
		url : ajaxurl,
		type : 'post',
		data : {
			page : page,
			prev : prev,
			archive :archive,
			action : 'sunsetWp_load_more'
		},
		error : function( response ) {
			console.log( response );
		},
		success : function( response ) {

			if( response == 0 ){
				$('.sunsetWp-posts-container').append("<h3 class='text-center'> No more posts to load</h3>");
				that.slideUp(320);
			}
			else{
			setTimeout(function() {

				if(prev == 1) {

					$('.sunsetWp-posts-container').prepend( response );
					newpage = page-1;

				}else{

					$('.sunsetWp-posts-container').append( response );			

				}
				if(newpage == 1 ){

					that.slideUp(320);

				}else{
				that.data( 'page', newpage );
				that.removeClass('loading').find('.load-text').slideDown(320);
				that.find('.sunset-loading').removeClass('spin');
				}

				revealPosts();
			}, 500);
		}
		}

	}); 
});

//Scroll function

$(window).scroll( function() {
	var scroll = $(window).scrollTop();
	if( Math.abs( scroll - last_scroll ) > $(window).height()*0.1 ) {
		last_scroll = scroll;

		$('.page-limit').each(function( index ) {
			if(isVisible( $(this) )) {
				history.replaceState( null, null, $(this).attr("data-page") );
				return (false);
			}
		});
	}
});

/* helper functions */

function revealPosts() {

	var posts = $('article:not(.reveal)');
	var i = 0;
	setInterval(function() {
		sunsetWp_gallery_thumbs(carousel);
		if( i >= posts.length) return false;
		var el = posts[i];
		$(el).addClass('reveal').find('.gallery-post').carousel();
		i++;
	}, 500);
}

function isVisible(element){
	var scroll_pos = $(window).scrollTop();
	var window_height = $(window).height();
	var el_top = $(element).offset().top;
	var el_height = $(element).height();
	var el_bottom = el_top + el_height;
	return ( (el_bottom-el_height*0.25 > scroll_pos ) && ( el_top < ( scroll_pos+0.5*window_height ) ) );
}


$(document).on('click', '.js-toggleSidebar', function() {

	$('.sunsetWp-sidebar').toggleClass( 'sidebar-closed' );
	$('body').toggleClass( 'no-scroll' );
	$('.sidebar-overlay').fadeToggle( 320 );

});


$('[data-toggle="tooltip"]').tooltip();

$('[data-toggle="popover"]').popover();

});