"use strict";

function validate() {
  var errMsg = "";
  var result = true;
  var firstname = document.getElementById("firstname").value;
  var lastname = document.getElementById("lastname").value;
  var age = document.getElementById("age").value;
  var partySize = document.getElementById("partySize").value;
  var is1day = document.getElementById("1day").checked;
  var is4day = document.getElementById("4day").checked;
  var is10day = document.getElementById("10day").checked;
  var human = document.getElementById("human").checked;
  var dwarf = document.getElementById("dwarf").checked;
  var elf = document.getElementById("elf").checked;
  var hobbit = document.getElementById("hobbit").checked;



  if (errMsg != "") {
    alert(errMsg);
  }

  if (!firstname.match(/^[a-zA-Z]+$/)) {
    errMsg = errMsg + "Your first name must only contain alpha characters\n";
    result = false;
  }

  if (!lastname.match(/^[a-zA-Z\-\_]+$/)) {
    errMsg = errMsg + "Your first name must only contain alpha characters\n";
    result = false;
  }

  if (isNaN(age)) {
    errMsg = errMsg + "Your age must be a number\n";
    result = false;
  }
  else if (age < 18) {
    errMsg = errMsg + "your age must be 18 or older\n";
    result = false;
  }
  else if (age >= 100) {
    errMsg = errMsg + "Your age must be 100 years or younger\n";
    result = false;
  }

  if (isNaN(partySize)) {
    errMsg = errMsg + "Your party size must be a number\n";
    result = false;
  }
  else if (partySize < 1) {
    errMsg = errMsg + "Your party must be 1 or greater\n";
    result = false;
  }
  else if (partySize >= 100) {
    errMsg = errMsg + "Your party size must be 100 or less\n";
    result = false;
  }
  else {
    var tempMsg = checkSpeciesAge(age);
    if (tempMsg != "") {
      errMsg = errMsg + tempMsg;
      result = false;
    };
  }

  if (document.getElementById("food").value =="none") {
    errMsg = errMsg + "You must select a food preference\n";
    result = false;
  }

  if (!(is1day || is4day || is10day)) {
    errMsg = errMsg + "Please select at least one trip\n";
    result = false;
  }

  if (!(human || dwarf || elf || hobbit)) {
    errMsg = errMsg + "Please select a species\n";
    result = false;
  }

  if (result) {
    storeBooking(firstname, lastname, age, species, is1day, is4day, is10day, food, partySize)
  }

  return result;


}

function getSpecies() {
  var speciesName = "Unknown";
  var speciesArray = document.getElementById("species").getElementsByTagName("input");

  for (var i = 0; i < speciesArray.length; i++) {
    if (speciesArray[i].checked)
      speciesName = speciesArray[i].value;

  }
  return speciesName;
}

function checkSpeciesAge(age) {
  var errMsg = "";
  var species = getSpecies();
  switch(species) {
    case "Human":
    if (age > 120) {
      errMsg = "you cannot be a human and over 120.\n";
    }
    break;
  case "Dwarf":
  case "Hobbit":
    if (age > 150) {
      errMsg = "You cannot be a " + species + " and over 150\n";
    }

    break;
  case "Elf":
    break;
  default:
    errMsg = "We don't allow your kind on our tours\n"
  }
  return errMsg;
}

function storeBooking(firstname, lastname, age, species, is1day, is4day, is10day, food, partySize) {
  var trip = "";
  var food = document.getElementById("food").value;
  var species = document.getElementById("partySize").value;
  if(is1day) trip = "1day";
  if(is4day) trip += ", 4day";
  if(is10day) trip += ", 10day";
  sessionStorage.trip = trip;
  sessionStorage.firstname = firstname;
  sessionStorage.lastname = lastname;
  sessionStorage.age = age;
  sessionStorage.species = species;
  sessionStorage.food = food;
  sessionStorage.partySize = partySize;

}

function init() {
  var regForm = document.getElementById("regform");
  regForm.onsubmit = validate;

}

window.onload = init;
