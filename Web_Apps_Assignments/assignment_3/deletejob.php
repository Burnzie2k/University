<!--
filename: [Owen Byrne]
Author: [Owen Byrne]
created: [20/05/2019]
last modified: [20/05/2019]
description: [Assignment]
-->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="description" content="IT Business positions" />
  <meta name="keywords" content="IT, Business, positions, vacant" />
  <meta name="author" content="102581507" />
  <link href= "Styles/Styles.css" rel="stylesheet"/>
  <script src="scripts/apply.js" ></script>
  <style type="text/css">
  p {
      color: white;
      font-family: arial, Helvetica, sans-serif;
  }
  </style>

  <title>Cloud Computing</title>
</head>
<body>
  <h1>CLOUD COMPUTING.CO</h1>
  <p >
    <!--Credit https://www.efect.ro/ for the image -->
    <img src="Images/CloudComputing.png" alt="IT logo" id="image1" >
  </p>

<?php include 'included/header.inc';?>

<?php
	if (isset ($_POST["jobref"]))
		$job_ref=$_POST["jobref"];
	else {
		header ("location:manage.php");
		exit();
	}
	require_once "settings.php";	// Load MySQL log in credentials
	$conn = @mysqli_connect ($host,$user,$pwd,$sql_db);	// Log in and use database
	if ($conn) { // check is database is available for use
		$query = "DELETE FROM EOI WHERE job_ref = '$job_ref'";

		$result = mysqli_query ($conn, $query);
		if ($result) {								// check if query was successfully executed
			echo "<p>" . mysqli_affected_rows($conn) . " record deleted. </p>";
		} else {
			echo "<p>Delete operation unsuccessful.</p>";
		}
		mysqli_close ($conn);					// Close the database connect
	} else {
		echo "<p>Unable to connect to the database.</p>";
	}
?>



<!-- Footer containg the author, email and university -->
<?php include 'included/footer.inc';?>

</body>
</html>
