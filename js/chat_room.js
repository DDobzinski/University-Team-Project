window.onclick = function(event) {
	var current_location = event.target;

	if (document.getElementById("login_modal")) {
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
	}
	
	if (document.getElementById("join_modal")) {
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

	if (document.getElementById("hobbies_modal")) {
		if (document.getElementById("hobbies_modal").style.display == "block") {
			if (current_location.id != "modal_content_hobbies" & current_location.id == "hobbies_modal") {
				while (current_location.class !== "modal") {
					current_location = current_location.parentElement;

					if (current_location == null) {
						document.getElementById("hobbies_modal").style.display = "none";
						break;
					}
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
			document.getElementById(sections[i]).style.backgroundColor = "white";
			document.getElementById(sections[i]).children[0].style.color = "black";
		} else {
			current.style.display = "block";
			document.getElementById(sections[i]).style.backgroundColor = "#63B4CF";
			document.getElementById(sections[i]).children[0].style.color = "white";
		}
	}
}

function check_modals() {
	if (document.getElementsByClassName("error_message")) {
		var error_messages = document.getElementsByClassName("error_message");
		var for_value = error_messages[0].getAttribute('for');

		if (for_value == "join") {
			return document.getElementById("join_modal").style.display = "block";
		} else if (for_value == "login") {
			return document.getElementById("login_modal").style.display = "block";
		}
	}
}

function open_topic(section) {
	var nav_pane = document.getElementById('navigation_pane');
	var main_content = document.getElementById("basic_content");
	if (nav_pane.style.display == "none") {
		nav_pane.style.display = "block";
		main_content.style.width = "80%";

	}

	document.getElementById("basic_content").style.display = "none";

	var current = document.getElementById(section + "_content");
	var sections = [];
	var children = document.getElementById("topics_list").children;

	for (var i = 0; i < children.length; i++) {
		sections.push(children[i].id);
	}

	console.log(sections);
	
	for (i = 0; i < sections.length; i++) {
		if (section != sections[i]) {
			document.getElementById(sections[i] + "_content").style.display = "none";
			document.getElementById(sections[i]).style.backgroundColor = "white";
			document.getElementById(sections[i]).children[0].style.color = "black";
		} else {
			current.style.display = "block";
			document.getElementById(sections[i]).style.backgroundColor = "#63B4CF";
			document.getElementById(sections[i]).children[0].style.color = "white";
		}
	}
}

function open_reply(chat_id) {
	var reply = document.getElementById("reply_box_" + chat_id);
	if (reply.style.display == "none" | reply.style.display == "") {
		reply.style.display = "block";
	} else {
		reply.style.display = "none";
	}
}


$(document).ready(function() {
	$("#add_topic").on("submit", (function(e) {
		e.preventDefault();
		$.ajax({
			type: "POST",
			url: "php/add_topic.php",
			data: $(this).serialize(),
			success: function(response) {
				console.log(response);
				$("#text_area_add_topic").val("");
			}
		});
	});
)});