$(document).ready(function(){
$(".checkbox__input").on('click', function(){
	
	var checked = $(this).attr('checked');
	
	var value = $(this).val();
	
		$.ajax({
			url: "php/homepage_update_info.php",
			type: "POST",
			data:{"task":value}
		  });
	
	});

document.querySelector('.close').addEventListener('click', function(){
	document.querySelector('.modal_container').style.display='none';

});
});

function tooltip_activation() {
	var tooltips = document.getElementsByClassName("tooltip");
	
	for (var i = 0; i < tooltips.length; i++) {
		if (document.querySelector(".sidebar").classList.value == "sidebar active") {
			tooltips[i].style.display = "none";
		} else {
			tooltips[i].style.display = "block";
		}
	}
}

window.onload = function(){ 
    let btn = document.querySelector("#btn");
	let sidebar = document.querySelector(".sidebar");
	let current_content = document.querySelector("#current_content");

	btn.onclick = function(){
		sidebar.classList.toggle("active");
		current_content.classList.toggle("active");
		tooltip_activation();

	}
	window.in_progress =  new progressBar(document.querySelector('.progress'),0);
	var checked_checkboxes = document.querySelectorAll('input[type="checkbox"]:checked').length;
	window.in_progress.setValue(checked_checkboxes * 10);

	
}

function open_content(section) {
	document.getElementById("landing_page").style.display="none";
	
	var sections = document.getElementById("nav_list").children;
	var section_ids = [];

	for (var i = 0; i < sections.length; i++) {
		section_ids.push(sections[i].id);
	}

	var prefix = "content_";
	for (var j = 0; j < section_ids.length; j++) {
		if (section_ids[j] != section) {
			document.getElementById(prefix + section_ids[j]).style.display = "none";
			document.getElementById(section_ids[j]).style.backgroundColor = "#202A45";
		} else {
			document.getElementById(prefix + section_ids[j]).style.display = "block";
			document.getElementById('progress_bar').style.display = "flex";
			document.getElementById(section_ids[j]).style.backgroundColor = "#63B4CF";
		}
	}
}

class progressBar{
	constructor(element, initialValue = 0){
		this.valueElem = element.querySelector('.progress_value');
		this.fillElem = element.querySelector('.progress_fill');

		this.setValue(initialValue);
	}

	setValue(newValue){
		if (newValue < 0){
			newValue = 0;
		}
		if (newValue > 100){
			newValue = 100;
		}
		this.value = newValue;
		this.update();
	}

	update_value(id){
		let cb = document.getElementById('content_' + id).querySelector('#check_' + id);
		var checkbox = document.getElementsByClassName('checkbox');
		var dict = {
			'gp': 0,
			'bank': 1,
			'accommodation': 2,
			'brp': 3,
			'police': 4,
			'studentid': 5,
			'society': 6,
			'tour_campus': 7,
			'blackboard_setup': 8,
			'tuition_fees': 9,
		  };

		if (cb.checked){
			this.value +=10;
			console.log(cb.checked);
			checkbox[dict[id]].style.backgroundColor = "#63B4CF";
			checkbox[dict[id]].innerText = "Undone";
			console.log(cb.checked);

		}
		else if (!cb.checked){
			this.value -=10;
			checkbox[dict[id]].style.backgroundColor = "#202A45";
			checkbox[dict[id]].innerText = "Done";
			console.log(cb.checked);
		}

		this.update();
	}

	// update(){
	// 	this.fillElem.style.width = (this.value / 10) + "em";
	// 	this.valueElem.textContent = this.value + '%';
	// }
		update(){
			const precentage = this.value + '%';
			this.fillElem.style.width = (this.value/2) + 'em';
			this.valueElem.textContent = precentage;
			let tasks = (100 - this.value) / 10;
			document.getElementById("task_remaining").innerText = tasks + " tasks left to be completed";
			
			if (this.value == 100){
				document.getElementById('modal_container').style.display = 'inherit';
			}
			else{
				document.getElementById('modal_container').style.display = 'hidden';
			}
		}
}
