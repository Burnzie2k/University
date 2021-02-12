<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="description" content="about assignment 2" />
    <meta name="author" content="Lecturer"  /> 
	<title>Assignment 3</title>
	<link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
	include_once "header.inc";
	include_once "nav.inc";
?>

<h2>Application Form</h2>
<hr/>
	<form id="applyForm" action="processEOI.php" method="post">
		<p><label>Job Reference: <input type="text" name="jobref" /></label></p>
		<p><label>First Name: <input type="text" name="fname" /></label></p>    
		<p><label>Last Name: <input type="text" name="lname" /></label></p>     
		<p><label>Date of Birth: <input type="text" name="dob" /></label></p>     
		<p>
			<label>Male: <input type="radio" name="gender" value="M"/></label>
			<label>Female: <input type="radio" name="gender" value="F"/></label>
		</p>    
		<p>
			<label>HTML <input type="checkbox" name="skills[]" value="HTML"/></label>
			<label>CSS <input type="checkbox" name="skills[]" value="CSS"/></label>
			<label>JavaScript <input type="checkbox" name="skills[]" value="JavaScript"/></label>
			<label>PHP <input type="checkbox" name="skills[]" value="PHP"/></label>
			<label>MySql <input type="checkbox" name="skills[]" value="MySql"/></label>
		</p>    
		
		<input type="submit" value="Apply" />
	</form>

</body>
</html>
