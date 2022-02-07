window.onclick = function(event) {
	var current_location = event.target;

	if (document.getElementById("login_modal").style.display == "block") {
		if (current_location.id != "modal_content" & current_location.id != "login_button" & current_location.id == "login_modal") {
			while (current_location.class !== "modal") {
				current_location = current_location.parentElement;

				if (current_location == null) {
					document.getElementById("login_modal").style.display = "none";
					break;
				}
			}
		}
	}

	if (document.getElementById("join_modal").style.display == "block") {
		if (current_location.id != "modal_content" & current_location.id != "join_button" & current_location.id == "join_modal") {
			while (current_location.class !== "modal") {
				current_location = current_location.parentElement;

				if (current_location == null) {
					document.getElementById("join_modal").style.display = "none";
					break;
				}
			}
		}
	}
}

function toggle_modal(modal_name) {
	var modal_status = document.getElementById(modal_name + "_modal");
	
	if (modal_status.style.display == "none" | modal_status.style.display == "") {
		modal_status.style.display = "block";
	} else {
		modal_status.style.display = "none";
	}
}

function open_content(section) {
	var current = document.getElementById(section + "_content");
	var sections = ["gp_signup", "bank_signup", "find_accommodation", "BRP_card_collection", "student_id"]

	for (i = 0; i < sections.length; i++) {
		if (section != sections[i]) {
			document.getElementById(sections[i] + "_content").style.display = "none";
		} else {
			current.style.display = "block";
		}
	}
}
