$(document).ready(function() {
  $("#nom, #prenom, #pseudo").on('blur', function() {
		if ($(this).val() == "") {
			$(this).css("background", "#FF0066");
		}
		else {
		$(this).css("background", "#00CCFF");
		}
	})


});
