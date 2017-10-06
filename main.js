$(document).ready(function() {
	$("#contact").submit(function() {
		$.ajax({
			type: "POST",
			url: "mailer.php",
			data: $(this).serialize()
		}).done(function() {
			$(this).find("input").val("");
			alert("Thank you!");
			$("#contact").trigger("reset");
		});
		return false;
	});
});

