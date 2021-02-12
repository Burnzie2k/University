"use strict";

function getDetails(){
	if (typeof(Storage)!=="undefined"){
		if (sessionStorage.getItem("fName") !== null){
			document.getElementById("fName").value = sessionStorage.getItem("fName");
		}
		if (sessionStorage.getItem("lName") !== null){
			document.getElementById("lName").value = sessionStorage.getItem("lName");
		}

	}
}

function saveDetails(fName, lName) {
	if (typeof(Storage)!=="undefined"){
		sessionStorage.setItem("fName", fName);
		sessionStorage.setItem("lName", lName);
	}
}


function validate() {
	var errMsg="";
	var result=true;

	var fName=document.getElementById("fName").value;
	var lName=document.getElementById("lName").value;

	if (fName=="") {
		errMsg += "Please enter your first name.\n";
		result=false;
	}
	if (lName=="") {
		errMsg += "Please enter your last name.\n";
		result=false;
	}
	//  more validation here

	if (errMsg!="")
		alert (errMsg);
	else {    // no error, save data to storage
		saveDetails(fName, lName);
	}
	return result;
}

function saveJobRef (jobRefNumber){
	if(typeof(Storage)!=="undefined"){
		localStorage.setItem("jobRef", jobRefNumber);
	}
}

function getJobRef (){
	if(typeof(Storage)!=="undefined"){
		if (localStorage.getItem("jobRef") !== null) {
			var jobRef= document.getElementById("jobRef");
			jobRef.value = localStorage.getItem("jobRef");
		}
	}
}

function init() {
	if (document.getElementById("applypage")!=null) {  // apply page init
		getJobRef();
		getDetails();
		document.getElementById("applyForm").onsubmit = validate;

	}
	else if (document.getElementById("jobspage")!=null) { // jobs page init

		var applylinks=document.getElementsByClassName("applylink");  // array
		for (var i=0; i<applylinks.length; i++)
			applylinks[i].onclick = function () { saveJobRef(this.id); }
	}
}
window.onload = init;
