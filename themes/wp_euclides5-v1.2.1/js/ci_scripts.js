jQuery(document).ready(function($) {

	$("ul.main-nav").superfish(); 

	$('input[type=text]').each(function() {
		var default_value = this.value;
		$(this).focus(function() {
			if(this.value == default_value) {
				this.value = '';
			}
		});

		$(this).blur(function() {
			if(this.value == '') {
				this.value = default_value;
			}
		});
	});
		
});
