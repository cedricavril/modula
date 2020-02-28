	// full-screen available?
if (
	document.fullscreenEnabled || 
	document.webkitFullscreenEnabled || 
	document.mozFullScreenEnabled ||
	document.msFullscreenEnabled
) {

	// click event handler
	$(".FullScreenEnablingImage").click(function(e) {
		image = e.target;
		// in full-screen?
		if (
			document.fullscreenElement ||
			document.webkitFullscreenElement ||
			document.mozFullScreenElement ||
			document.msFullscreenElement
		) {

			// exit full-screen
			if (document.exitFullscreen) {
				document.exitFullscreen();
			} else if (document.webkitExitFullscreen) {
				document.webkitExitFullscreen();
			} else if (document.mozCancelFullScreen) {
				document.mozCancelFullScreen();
			} else if (document.msExitFullscreen) {
				document.msExitFullscreen();
			}
		} else {
		
			// go full-screen
			if (image.requestFullscreen) {
				this.requestFullscreen();
			} else if (image.webkitRequestFullscreen) {
				image.webkitRequestFullscreen();
			} else if (image.mozRequestFullScreen) {
				image.mozRequestFullScreen();
			} else if (image.msRequestFullscreen) {
				image.msRequestFullscreen();
			}
		
		}
	
	});
}