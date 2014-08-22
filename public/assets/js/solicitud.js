$(document).ready(function() {

	var config = {
      		'.chosen-select'           : {}
    	}
	    for (var selector in config) {
	      $(selector).chosen(config[selector]);
	    }

	    $('.fecha').datepicker({ dateFormat: "yy-mm-dd",changeMonth: true, changeYear: true });

} );
