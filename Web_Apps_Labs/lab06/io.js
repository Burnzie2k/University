/**
* Author: Owen Byrne 102581507
* Target: clickme.html
* Purpose: This file is for lab06
* Created: 11/04/19
* Last updated: 11/04/19
* Credits: Web Applicaitons lab06
*/

"use strict";     // prevenets creation of global variables in functions

// this function is called when the browser window loads
// it will register functions that will respond to browser events
function promptName() {
  var sName = prompt("Enter Your name. \nThis prompt should show up when the\
            \nClick me button is clicked.", "Your Name");
  alert("Hi there " + sName +". Alert boxes are on their way to check the\
            state\n of your variables when you are developing code.");
  rewriteParagraph(sName);
}
function rewriteParagraph(userName) {
  var message = document.getElementById("message")
  message.innerHTML = "Hi " + userName + ". If you can see this you have\
        successfully overwritten the contents of this paragraph.\n Congratulations!!";

}
function writeNewMessage() {
  document.getElementById("spanToCall").textContent = "You have finished task 1"


}
function init() {
  var clickMe = document.getElementById("clickme");
  var headerbutton = document.getElementById("heading");
  clickme.onclick = promptName;
  headerbutton.onclick = writeNewMessage;


}
window.onload = init;
