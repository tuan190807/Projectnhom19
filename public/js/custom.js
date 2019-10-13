$(document).ready(function(){
	$('#btn-form-logout').click(function(){
		$('#form-logout').submit();
	});
	$('.summernote').summernote({
		height: 250,
	});
	// $('.link-submit').click(function(){
	// 	$('.link-submit').parent().submit();
	// });
});
function appendid(id, sj, lesson, file) {
	$('#id_delete').val(id);
	$('#modal-sj').text("sj");
	$('#modal-lesson').text("lesson");
	$('#modal-file').text("file");
	$('#modal-sj').text(sj);
	$('#modal-lesson').text(lesson);
	$('#modal-file').text(file);
}
