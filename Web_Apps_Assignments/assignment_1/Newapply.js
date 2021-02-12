"use strict";

function validate() {
  var errMsg = "";
  var result = true;
  var fName = document.getElementById("fName").value;
  var lName = document.getElementById("lName").value;

  if (errMsg != "") {
    alert(errMsg);
  }

  if (result) {
    storeBooking(fName, lName)
  }

  return result;


}




function storeBooking(fName, lName) {
  sessionStorage.fName = fName;
  sessionStorage.lName = lName;


}

function init() {
  var regForm = document.getElementById("applyForm");
  regForm.onsubmit = validate;

}

window.onload = init;
