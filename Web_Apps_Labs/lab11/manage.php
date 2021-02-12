<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8 " />
	<title>PHP - MySQL Select (Check - Display) Template</title>
	<link rel="stylesheet" href="style.css" />
	<!-- other meta here -->
</head>
<body>
<?php
	include_once "header.inc";
	include_once "nav.inc";
?>
<h2> Job Application Table</h2>
<?php
	if (!isset($_POST["fn"])&&!isset($_POST["ln"]))
		$query = "SELECT * FROM eoi;";
	else {
		$fn=trim($_POST["fn"]);
		$ln=trim($_POST["ln"]);
		$query="SELECT * FROM eoi WHERE fname LIKE '%$fn%' and lname LIKE '%$ln%'";
	}

	require_once "settings.php";	// Load MySQL log in credentials
	$conn = mysqli_connect ($host,$user,$pwd,$sql_db);	// Log in and use database
	if ($conn) { // check is database is available for use

		$result = mysqli_query ($conn, $query);

		if ($result) {								// check if query was successfully executed

			$record = mysqli_fetch_assoc ($result);
			if ($record) {							// check if any record exists

				echo "<table border='1'>";
				echo "<tr><th>ID</th><th>Job Ref</th><th>First Name</th><th>Last Name</th><th>Gender</th><th>DOB</th><th>Skills</th><th>Application Date</th><th>Status</th><th></th></tr>";
				while ($record) {
					echo "<tr><td>{$record['id']}</td>";
					echo "<td>{$record['jobref']}</td>";
					echo "<td>{$record['fname']}</td>";
					echo "<td>{$record['lname']}</td>";
					echo "<td>{$record['gender']}</td>";
					echo "<td>{$record['dob']}</td>";
					echo "<td>{$record['skills']}</td>";
					echo "<td>{$record['app_date']}</td>";
					echo "<td>{$record['status']}</td>";
					echo "<td><a href='delete.php?id=" . $record['id']
					            . "'>Delete</a></td></tr>";
					$record = mysqli_fetch_assoc($result);
				}
				echo "</table>";
				mysqli_free_result ($result);	// Free up resources
			} else {
				echo "<p>No records retrieved.</p>";
			}
		} else {
			echo "<p>Job application table doesn't exist or select operation unsuccessful.</p>";
		}
		mysqli_close ($conn);					// Close the database connect
	} else {
		echo "<p>Unable to connect to the database.</p>";
	}
?>
<h2>Search Application</h2>
	<form action="manage.php" method="post">
		<p><label>First Name: <input type="text" name="fn" /></label></p>
		<p><label>Last Name: <input type="text" name="ln" /></label></p>
		<input type="submit" value="Search" />
	</form>

<h2>Delete based on job reference number:
	<form action="deleteJob.php" method="post">
		<p><label>Job Ref: <input type="text" name="jobref" /></label></p>
		<input type="submit" value="Delete" />
	</form>

</body>
</html>
