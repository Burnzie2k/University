<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8 " />
	<title>assignment 3</title>
	<!-- other meta here -->
	<link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
	include_once "header.inc";
	include_once "nav.inc";
?>

<?php
	// validate form data, echo message
	if (!isset($_POST["jobref"])) {
		header("location:apply.php");
		exit();
	}
	$err_msg="";
	// get value.      validate and sanitise the values
	$jobref=trim($_POST["jobref"]);
	if ($jobref=="")
		$err_msg .= "<p>Please enter Job Ref.</p>";
	$fname=trim($_POST["fname"]);
	if ($fname=="")
		$err_msg .= "<p>Please enter first name.</p>";

	$lname=trim($_POST["lname"]);
	if ($lname=="")
		$err_msg .= "<p>Please enter last name.</p>";

	if (isset($_POST["gender"]))    // radio button
		$gender=$_POST["gender"];
	else
		$gender="";

	if (isset($_POST["skills"]))    // check box
		$skills=$_POST["skills"];
	else
		$err_msg .= "<p>Please select skills.</p>";

	$dob=trim($_POST["dob"]);	// dob
	if (!preg_match("/^\d{2}\/\d{2}\/\d{4}$/", $dob)){
		$err_msg .= "<p>Please enter your date of birth follow the dd/mm/yyyy format.</p>";
	}
	else {
		$dob=explode("/", $dob);
		$dob=$dob[2] . "-" . $dob[1] . "-" . $dob[0];

		$dateDob = date_create($dob);
		$dateNow = date_create();
		$age = date_diff($dateDob, $dateNow);
		$age = date_interval_format($age, "%Y");

		if ($age<15 || $age>80)
			$err_msg .= "<p>You age is NOT between 15 and 80.</p>";
	}

	if ($err_msg!=""){
		echo $err_msg;
	}
	else {
	// connect to db, create table, insert record
	require_once "settings.php";	// Load MySQL log in credentials
	$conn = mysqli_connect ($host,$user,$pwd,$sql_db);	// Log in and use database

	if ($conn) { // check is database is available for use
		$query = "CREATE TABLE IF NOT EXISTS eoi (
					id INT AUTO_INCREMENT PRIMARY KEY,
					jobref VARCHAR(6),
					fname VARCHAR(25),
					lname VARCHAR(25),
					gender VARCHAR(10),
					dob DATE,
					skills VARCHAR(50),
					app_date DATE,
					status VARCHAR(20)
					);";

		$result = mysqli_query ($conn, $query);
		if ($result) {								// check if query was successfully executed

			$query = "INSERT INTO eoi (jobref, fname, lname, gender, dob, skills,app_date, status) 
					VALUES ('$jobref', '$fname','$lname', '$gender', '$dob', '" . implode(',', $skills) . "', CURDATE(), 'new');";

			$insert_result = mysqli_query ($conn, $query);

			if ($insert_result) {			// check if insert successfully
				echo "<p>Insert  successful. Your application number is " . mysqli_insert_id($conn) . ".</p>";
			} else {
				echo "<p>Insert  unsuccessful.</p>";
			}
		} else {
			echo "<p>Create table operation unsuccessful.</p>";
		}
		mysqli_close ($conn);					// Close the database connect
	} else {
		echo "<p>Unable to connect to the database.</p>";
	}
	}
?>
</body>
</html>
