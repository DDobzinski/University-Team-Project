// function scrolldown(){ window.setInterval(function() {
//   var elem = document.getElementById('box');
//   elem.scrollTop = elem.scrollHeight;
// }, 500);}


function open_topic(section) {
	let right = document.getElementById('right');
	let left = document.getElementById('left');
	let chat = document.getElementById('chat_page');
	right.style.display = 'none';
	left.style.display = 'none';
	chat.style.display = 'inline-flex';

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
	
	for (i = 0; i < sections.length; i++) {
		if (section != sections[i]) {

			document.getElementById(sections[i] + "_content").style.display = "none";
			console.log(sections[i])
			document.getElementById(sections[i]).style.backgroundColor = "#303f68";
			document.getElementById(sections[i]).children[0].style.color = "white";
		} else {
			current.style.display = "block";
			console.log(sections[i])
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

