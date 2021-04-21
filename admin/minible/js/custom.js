$(window).on('load', function() {
	var theme = sessionStorage.getItem('is_visited');
	if (theme == 'dark-mode-switch') {
		$('.preloader-wrapper').css('background-color', '#2d313e')
	} else {
		$('.preloader-wrapper').css('background-color', '#FFF')

	}
	$('.preloader-wrapper').fadeOut();
});