<!DOCTYPE html>
<html lang="en">
<head>
	<title>Booking Confirmation</title>
	<meta charset="utf-8"/>
	<meta name="description" content="Rohirrim Booking Form" />
	<meta name="keywords"    content=" " />
	<meta name="Author" content="Owen Byrne"/>
</head>
<body>
<header>
	<h1>Rohirrim Booking Confirmation</h1>
</header>

<?php
	function sanitise_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
 ?>

<?php

	if (isset ($_POST["firstname"])) {
		$firstname = $_POST["firstname"];
		$firstname = sanitise_input($firstname);
	}
	else {
		header ("location: register.html");
	}

	if (isset ($_POST["lastname"])) {
		$lastname = $_POST["lastname"];
		$lastname = sanitise_input($lastname);
	}

	if (isset ($_POST["age"])) {
		$age = $_POST["age"];
		$age = sanitise_input($age);
	}

	if (isset ($_POST["food"])) {
		$food = $_POST["food"];
		$food = sanitise_input($food);
	}

	if (isset ($_POST["partySize"])) {
		$partySize = $_POST["partySize"];
		$partySize = sanitise_input($partySize);
	}

	if (isset($_POST["species"])) {
    	$species = $_POST["species"];
		$species = sanitise_input($species);
	}
	else {
    	$species = "Unknown species";
	}

	$tour = "";
	if (isset($_POST["1day"])) $tour = $tour . "One-day tour";
	if (isset($_POST["4day"])) $tour = $tour . "Four-day tour";
	if (isset($_POST["10day"])) $tour = $tour . "Ten-day tour";

	$errmsg = "";

	if ($firstname == "") {
	    $errmsg .= "<p> You must enter your first name.</p>";
	}
	else if (!preg_match("/^[a-zA-Z]*$/", $firstname)) {
	    $errmsg .= "<p> Only alpha letters allowed in your first name.</p>";
	}
	if ($lastname == "") {
	    $errmsg .= "<p> You must enter your last name.</p>";
	}
	else if (!preg_match("/^[a-zA-Z]*$/", $lastname)) {
	    $errmsg .= "<p> Only alpha letters allowed in your last name.</p>";
	}
	if (is_numeric($age) == False){
	    $errmsg .= "<p> Only numbers allowed in age field.</p>";
	}
	else if ($age <= 10 || $age >= 10000){
	    $errmsg .= "<p> Your age must be beetween 10 - 10000.</p>";
	}
	if ($errmsg != "") {
	    echo "<p>$errmsg</p>";
	}
	else {
    echo "<p> Welcome $firstname $lastname</p>";
    echo "<p> You are now booked on the $tour</p>";
	echo "<p>Species: $species </p>";
    echo "<p> Age: $age</p>";
    echo "<p> Preference: $food</p>";
    echo "<p> Number of travellers: $partySize</p>";
	}
 ?>


</body>
</html>
