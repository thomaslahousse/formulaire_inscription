$(document).ready(function() {
  $("#nom, #prenom, #pseudo").on('blur', function() {
		if ($(this).val() == "") {
			$(this).css("background", "red");
		}
		else {
		$(this).css("background", "green");
		}
	})


});
