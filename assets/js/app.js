// get state

jQuery(document).on("change", "select#country-name", function (e) {
	e.preventDefault();
	var countryID = jQuery(this).val();
	getStatesList(countryID);
});

// get city
jQuery(document).on("change", "select#state-name", function (e) {
	e.preventDefault();
	var stateID = jQuery(this).val();
	getCityList(stateID);
});

// Global function get All States
function getStatesList(countryID) {
	$.ajax({
		url: baseurl + "app/getstates",
		type: "post",
		data: { countryID: countryID },
		dataType: "json",
		beforeSend: function () {
			jQuery("select#state-name").find("option:eq(0)").html("Please wait..");
		},
		complete: function () {
			// code
		},
		success: function (json) {
			var options = "";
			options += '<option value="">Select State</option>';
			for (var i = 0; i < json.length; i++) {
				options +=
					'<option value="' +
					json[i].state_id +
					'">' +
					json[i].state +
					"</option>";
			}
			jQuery("select#state-name").html(options);
		},
		error: function (xhr, ajaxOptions, thrownError) {
			console.log(
				thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText
			);
		},
	});
}

// Global function get All Cities
function getCityList(stateID) {
	$.ajax({
		url: baseurl + "app/getcities",
		type: "post",
		data: { stateID: stateID },
		dataType: "json",
		beforeSend: function () {
			jQuery("select#city-name").find("option:eq(0)").html("Please wait..");
		},
		complete: function () {
			// code
		},
		success: function (json) {
			var options = "";
			options += '<option value="">Select City</option>';
			for (var i = 0; i < json.length; i++) {
				options +=
					'<option value="' + json[i].city + '">' + json[i].city + "</option>";
			}
			jQuery("select#city-name").html(options);
		},
		error: function (xhr, ajaxOptions, thrownError) {
			console.log(
				thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText
			);
		},
	});
}
