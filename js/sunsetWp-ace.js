jQuery(document).ready(function($) {
	var updateCss = function() {$('#custom_css').val(editor.getSession().getValue());}

	$('#save-custom-css').submit(updateCss);

});    

    var editor = ace.edit("editor");
    editor.setTheme("ace/theme/monokai");
    editor.getSession().setMode("ace/mode/css");