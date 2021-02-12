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
  var male = document.getElementById("male").checked;
  var female = document.getElementById("female").checked;
  var other = document.getElementById("other").checked;


  if (document.getElementById("state").value =="none") {
    document.getElementById("stateErrMsg").textContent = " Please enter your state of origin\n";
    result = false;
  }

  if (!postcode.match(/^\s*(?:[0-9]{4})\s*$/)) {
    document.getElementById("postcodeErrMsg").textContent = " the postcode must be numbers only and only 4 numbers long\n";
    result = false;
  }

  if (!dateOfBirth.match(/^([0-9]{2})\/([0-9]{2})\/([0-9]{4})$/)) {
    document.getElementById("dateOfBirthErrMsg").textContent = " Your date of birth must match the format dd/mm/yyyy\n";
    result = false;
  }

  if (dateOfBirth.substring(6,10) <= ( 2019 - 80) || dateOfBirth.substring(6,10) >= ( 2019 - 15)) {
    document.getElementById("dateOfBirthErrMsgAge").textContent = " Your age must be between 15 and 80\n";
    result = false;
	}

  if (!(aws || azure || salesforce || ec2 || s3 || otherskills)) {
    document.getElementById("skillErrMsg").textContent = " You must select at least one skill\n";
    result = false;
  }


  if (otherskills && comments.length ==0) {
    document.getElementById("commentErrMsg").textContent = " Please enter your specified other skills\n";
    result = false;

  }

 var postcode = document.getElementById("postcode").value;
 var state = document.getElementById("state").options[document.getElementById("state").selectedIndex].text;

  var regex;
  //VIC = 3 OR 8, NSW = 1 OR 2 ,QLD = 4 OR 9 ,NT = 0 ,WA = 6 ,SA=5 ,TAS=7 ,ACT= 0. https://stackoverflow.com/questions/46426301/javascript-validation-for-postcode-and-state-combined
  switch (state) {
     case "Please Select":
         return false;
     case "VIC":
         regex = new RegExp(/(3|8)\d+/);
         break;
      case "NSW":
         regex = new RegExp(/(1|2)\d+/);
         break;
      case "QLD":
         regex = new RegExp(/(4|9)\d+/);
         break;
      case "NT":
         regex = new RegExp(/0\d+/);
         break;
      case "WA":
         regex = new RegExp(/6\d+/);
         break;
      case "SA":
         regex = new RegExp(/5\d+/);
         break;
      case "TAS":
         regex = new RegExp(/7\d+/);
         break;
      case "ACT":
         regex = new RegExp(/0\d+/);
         break;
  }

  if(!postcode.match(regex)){
    document.getElementById("wrongStatePost").textContent = " State and postcode do not match\n";
    result = false;
  }



  if (result) {
    storeDetails(fName, lName, dateOfBirth, streetAddress, suburbTown, email, phone, aws, azure, salesforce, ec2, s3, otherskills, postcode, male, female, other, comments)

  }

  if (errMsg != "") {
    window.alert(errMsg);
  }

  return result;


}


function storeDetails(fName, lName, dateOfBirth, streetAddress, suburbTown, email, phone, aws, azure, salesforce, ec2, s3, otherskills, postcode, male, female, other, comments) {
  var state = document.getElementById("state").value;
  sessionStorage.fName = fName;
  sessionStorage.lName = lName;
  sessionStorage.dateOfBirth = dateOfBirth;
  sessionStorage.streetAddress = streetAddress;
  sessionStorage.suburbTown = suburbTown;
  sessionStorage.state = state;
  sessionStorage.email = email;
  sessionStorage.phone = phone;
  sessionStorage.postcode = postcode;
  sessionStorage.aws = aws;
  sessionStorage.azure = azure;
  sessionStorage.salesforce = salesforce;
  sessionStorage.ec2 = ec2;
  sessionStorage.s3 = s3;
  sessionStorage.otherskills = otherskills;
  sessionStorage.comments = comments;
  sessionStorage.male = male;
  sessionStorage.female = female;
  sessionStorage.other = other;

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

  if (sessionStorage.getItem("aws") !==null) {
    if (sessionStorage.getItem("aws") == "true") {
      document.getElementById("aws").checked = true;
    }
  }

  if (sessionStorage.getItem("azure") !==null) {
    if (sessionStorage.getItem("azure") == "true") {
      document.getElementById("azure").checked = true;
    }
  }

  if (sessionStorage.getItem("salesforce") !==null) {
    if (sessionStorage.getItem("salesforce") == "true") {
      document.getElementById("salesforce").checked = true;
    }
  }

  if (sessionStorage.getItem("ec2") !==null) {
    if (sessionStorage.getItem("ec2") == "true") {
      document.getElementById("ec2").checked = true;
    }
  }

  if (sessionStorage.getItem("s3") !==null) {
    if (sessionStorage.getItem("s3") == "true") {
      document.getElementById("s3").checked = true;
    }
  }

  if (sessionStorage.getItem("otherskills") !==null) {
    if (sessionStorage.getItem("otherskills") == "true") {
      document.getElementById("otherskills").checked = true;
    }
  }

  if (sessionStorage.getItem("male") !==null) {
    if (sessionStorage.getItem("male") == "true") {
      document.getElementById("male").checked = true;
    }
  }

  if (sessionStorage.getItem("female") !==null) {
    if (sessionStorage.getItem("female") == "true") {
      document.getElementById("female").checked = true;
    }
  }

  if (sessionStorage.getItem("other") !==null) {
    if (sessionStorage.getItem("other") == "true") {
      document.getElementById("other").checked = true;
    }
  }

  if (sessionStorage.getItem("comments") !== null){
			document.getElementById("comments").value = sessionStorage.getItem("comments");
		}
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
