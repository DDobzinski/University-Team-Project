function get_vals() {
	var course = document.getElementById("course_selector").value;

	var accommodation_filter_raw = document.getElementsByClassName("flex_row");
	var accommodation_filter = new Array();

	for (var i = 0; i < accommodation_filter_raw.length; i++) {
		accommodation_filter.push(accommodation_filter_raw[i].children);
	}

	var checked_accommodation = Array("");

	for (var i = 0; i < accommodation_filter.length; i++) {
		if (accommodation_filter[i][0].checked == true && accommodation_filter[i][0].type == "checkbox") {
			checked_accommodation.push(accommodation_filter[i][0].name);
		}
	}

	var hobbies_filter = document.getElementById("hobbies_filter").children;
	var checked_hobbies = Array("");

	for (var j = 0; j < hobbies_filter.length; j++) {
		if (hobbies_filter[j].checked == true && hobbies_filter[j].type == "checkbox") {
			checked_hobbies.push(hobbies_filter[j].value);
		}
	}

	var nationality = document.getElementById("nationality_selector").value;

	var data = Array(course, checked_accommodation, checked_hobbies, nationality);

	// need to check if nationality or course is none
	// return course, checked_accommodation, checked_hobbies, nationality;
	return data;
}


function do_ajax() {
	data = get_vals();
	ajax_req(data)
		.then((data) => {
			$("#user_info").html(data);
		})
		.catch((error) => {
			console.log(error);
	})
}

$(document).ready(function() {
	$("#accommodation_boxes").on('click', function() {
		do_ajax();
	});
	$("#course_selector").on('click', function() {
		do_ajax();
	});
	$("#hobbies_filter").on('click', function() {
		do_ajax();
	});
	$("#nationality_selector").on('click', function() {
		do_ajax();
	});
	$("#dropdown_button_accommodation").on('click', function() {
		if ($("#accommodation_boxes").css("display") == "none") {
			$("#accommodation_boxes").css("display", "block");
			$("#dropdown_button_accommodation").removeClass("bx-expand-vertical");
			$("#dropdown_button_accommodation").addClass("bx-collapse-vertical");
		} else {
			$("#accommodation_boxes").css("display", "none");
			$("#dropdown_button_accommodation").removeClass("bx-collapse-vertical");
			$("#dropdown_button_accommodation").addClass("bx-expand-vertical");
		}
	});

	$("#dropdown_button_hobbies").on('click', function() {
		if ($("#hobbies_boxes").css("display") == "none") {
			$("#hobbies_boxes").css("display", "block");
			$("#dropdown_button_hobbies").removeClass("bx-expand-vertical");
			$("#dropdown_button_hobbies").addClass("bx-collapse-vertical");
		} else {
			$("#hobbies_boxes").css("display", "none");
			$("#dropdown_button_hobbies").removeClass("bx-collapse-vertical");
			$("#dropdown_button_hobbies").addClass("bx-expand-vertical");	
		}
	});
});


function ajax_req(data) {
	return new Promise((resolve, reject) => {
		$.ajax({
			url: "php/find_friends_change_filter.php",
			type: "POST",
			data: {
				"data": data
			},

			success: function(data) {
				resolve(data);
			},
			error: function(error) {
				reject(error);
			}
		})
	})
}