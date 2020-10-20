$(document).ready(function() {
	$('.gallery ul li img').click(function(event) {
		var img = $(this).attr('src');
		$('.gallery-img img').attr('src', img);
	});
	$('.minusbtn').attr('disabled', true);
	$('.minusbtn').click(function(event) {
		$('#quanlity').val(Number($('#quanlity').val())-1);
		if (Number($('#quanlity').val()) < 2){
			$('.minusbtn').attr('disabled', true);
		}
	});
	$('.plusbtn').click(function(event) {
		$('#quanlity').val(Number($('#quanlity').val())+1);
		$('.minusbtn').removeAttr('disabled');
	});
});