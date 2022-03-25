function get_vals() {
	var course = document.getElementById("course_selector").value;

	var accommodation_filter = document.getElementById('accommodation_filter').children;
	var checked_accommodation = Array("");

	for (var i = 0; i < accommodation_filter.length; i++) {
		if (accommodation_filter[i].checked == true && accommodation_filter[i].type == "checkbox") {
			checked_accommodation.push(accommodation_filter[i].name);
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


$(document).ready(function() {
	$("#filters").on('click', function() {
		data = get_vals();
		ajax_req(data)
			.then((data) => {
				$("#user_info").html(data);
			})
			.catch((error) => {
				console.log(error);
			})
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