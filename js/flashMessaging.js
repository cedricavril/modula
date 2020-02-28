flashShow = function(msgAlert,  msgText) {
	window.scrollTo(0, 0);
    var alertBox = '<div class="alert alert-' + msgAlert + ' alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + msgText + '</div>';
    $('#flash').find('.messages').html(alertBox);
}