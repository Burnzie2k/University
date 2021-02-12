"use strict";

function validate() {
  var errMsg = "";
  var result = true;
  var fName = document.getElementById("fName").value;
  var lName = document.getElementById("lName").value;
  var dateOfBirth = document.getElementById("dateOfBirth").value;
  var streetAddress = document.getElementById("streetAddress").value;
  var suburbTown = document.getElementById("suburbTown").value;
  var email = document.getElementById("email").value;
  var phone = document.getElementById("phone").value;
  var postcode = document.getElementById("postcode").value;
  var aws = document.getElementById("aws").checked;
  var azure = document.getElementById("azure").checked;
  var salesforce = document.getElementById("salesforce").checked;
  var ec2 = document.getElementById("ec2").checked;
  var s3 = document.getElementById("s3").checked;
  var otherskills = document.getElementById("otherskills").checked;
  var comments = document.getElementById("comments").value;


  if (document.getElementById("state").value =="none") {
    errMsg = errMsg + "You must select which state you reside in.\n";
    result = false;
  }

  if (!postcode.match(/^\s*(?:[0-9]{4})\s*$/)) {
    document.getElementById("postcodeErrMsg").textContent = "the postcode must be numbers only\n";
    result = false;
  }

  if (!dateOfBirth.match(/^([0-9]{2})\/([0-9]{2})\/([0-9]{4})$/)) {
    document.getElementById("dateOfBirthErrMsg").textContent = "Your date of birth must match the format dd/mm/yyyy\n";
    result = false;
  }

  if (!(aws || azure || salesforce || ec2 || s3 || otherskills)) {
    document.getElementById("skillErrMsg").textContent = "You must select at least one skill\n";
    result = false;
  }

  if (comments.match("") && otherskills) {
    document.getElementById("commentErrMsg").textContent = "Please enter your specified other skills\n";
    result = false;

  }


  if (result) {
    storeDetails(fName, lName, dateOfBirth, streetAddress, suburbTown, email, phone, aws, azure, salesforce, ec2, s3, otherskills, postcode, gender)

  }

  if (errMsg != "") {
    window.alert(errMsg);
  }

  return result;


}

function genderRadio() {
  var gender = "";
  if (document.getElementById("male").checked) {
    gender = "male";
  }
  else if (document.getElementById("female").checked) {
    gender = "female";
  }
  else if (document.getElementById("other").checked) {
    gender = "other";
  }
  return gender;
}





function storeDetails(fName, lName, dateOfBirth, streetAddress, suburbTown, email, phone, aws, azure, salesforce, ec2, s3, otherskills, postcode, gender) {
  var state = document.getElementById("state").value;
  var skill = "";
  var gender = genderRadio();
  if(aws) skill = "aws";
  if(azure) skill += ", azure";
  if(salesforce) skill += ", salesforce";
  if(ec2) skill += ", ec2";
  if(s3) skill += ", s3";
  if(otherskills) skill += ", otherskills";
  sessionStorage.skill = skill;
  sessionStorage.fName = fName;
  sessionStorage.lName = lName;
  sessionStorage.dateOfBirth = dateOfBirth;
  sessionStorage.streetAddress = streetAddress;
  sessionStorage.suburbTown = suburbTown;
  sessionStorage.state = state;
  sessionStorage.email = email;
  sessionStorage.phone = phone;
  sessionStorage.postcode = postcode;
  sessionStorage.gender = gender;

}

function getDetails() {
  if(sessionStorage.fName != undefined) {
    document.getElementById("fName").value = sessionStorage.fName;
    document.getElementById("lName").value = sessionStorage.lName;
    document.getElementById("dateOfBirth").value = sessionStorage.dateOfBirth;
    document.getElementById("streetAddress").value = sessionStorage.streetAddress;
    document.getElementById("suburbTown").value = sessionStorage.suburbTown;
    document.getElementById("state").value = sessionStorage.state;
    document.getElementById("email").value = sessionStorage.email;
    document.getElementById("phone").value = sessionStorage.phone;
    document.getElementById("postcode").value = sessionStorage.postcode;
    document.getElementById("gender").value = sessionStorage.gender;
    document.getElementsByTagName("skill").value = sessionStorage.skill;


  }
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
