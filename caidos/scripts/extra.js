jQuery(function($){
	$('a.bottom').click(function(e){
		
		var piso = $(this).data('piso');

		var target = $(this).data('target');

		$(target).find('.depto-val').val(piso);
	});
});