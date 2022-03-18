window.onload = function(){ 
    let btn = document.querySelector("#btn");
	let sidebar = document.querySelector(".sidebar");
	let current_content = document.querySelector("#current_content");

	btn.onclick = function(){
		sidebar.classList.toggle("active");
		current_content.classList.toggle("active");

	}
	window.in_progress =  new progressBar(document.querySelector('.progress'),0);
	window.in_progress.setValue(0)
};

function open_content(section) {
	var sections = document.getElementById("nav_list").children;
	var section_ids = [];

	for (var i = 0; i < sections.length; i++) {
		section_ids.push(sections[i].id);
	}

	var prefix = "content_";
	for (var j = 0; j < section_ids.length; j++) {
		if (section_ids[j] != section) {
			document.getElementById(prefix + section_ids[j]).style.display = "none";
		} else {
			document.getElementById(prefix + section_ids[j]).style.display = "block";
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
		let cb = document.getElementById('content_' + id).querySelector('#myCheckboxId');
		if (cb.checked){
			this.value +=10;

		}
		else if (!cb.checked){
			this.value -=10;
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
		}


}

