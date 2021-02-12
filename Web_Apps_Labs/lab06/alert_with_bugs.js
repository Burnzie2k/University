var yourName;   //global variable accessible to all functions

function showAnotherMessage(yourName) {
	alert("Hi " + yourName + ".\nThis is an alert message is no longer\
	defined\nin the HTML but in a JavaScript file");
}

function init() {
	var yourName = prompt("Hi. Enter your name.\nWhen the browser window is first\
	loaded\nthe function containing this prompt window is called.", "Your name");
	var clickme = document.getElementById("clickme");
	clickme.onclick = showAnotherMessage(yourName);
	clickme.addEventListener('click', function(){
		showAnotherMessage(yourName);

	});
	}

window.onload = init;
