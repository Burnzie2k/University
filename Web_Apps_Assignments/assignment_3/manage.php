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

<h2>Manage EOI</h2>
<br/>

<?php
if (!isset($_POST["fn"])&&!isset($_POST["ln"])&&!isset($_POST["jref"]))
    $query = "SELECT * FROM EOI;";
else {
    $fn=trim($_POST["fn"]);
    $ln=trim($_POST["ln"]);
    $jref=trim($_POST["jref"]);
    $query="SELECT * FROM EOI WHERE first_name LIKE '%$fn%' and last_name LIKE '%$ln%' and job_ref LIKE '%$jref%'";
}



require_once "settings.php";	// Load MySQL log in credentials
$conn = mysqli_connect ($host,$user,$pwd,$sql_db);	// Log in and use database
if ($conn) { // check is database is available for use

    $result = mysqli_query ($conn, $query);

    if ($result) {								// check if query was successfully executed

        $record = mysqli_fetch_assoc ($result);
        if ($record) {							// check if any record exists

            echo "<table border='1'>";
            echo "<tr><th>ID</th><th>Job Ref</th><th>First Name</th><th>Last Name</th><th>Street Address</th><th>Suburb Town</th><th>State</th><th>Postcode</th><th>Email</th><th>Phone</th><th>Skills</th><th>Comments</th><th>status</th></tr>";
            while ($record) {
                echo "<tr><td>{$record['id']}</td>";
                echo "<td>{$record['job_ref']}</td>";
                echo "<td>{$record['first_name']}</td>";
                echo "<td>{$record['last_name']}</td>";
                echo "<td>{$record['street_address']}</td>";
                echo "<td>{$record['suburb_town']}</td>";
                echo "<td>{$record['state']}</td>";
                echo "<td>{$record['postcode']}</td>";
                echo "<td>{$record['email_address']}</td>";
                echo "<td>{$record['phone']}</td>";
                echo "<td>{$record['skills']}</td>";
                echo "<td>{$record['other_skills']}</td>";
                echo "<td>{$record['status']}</td>";
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

 <h2>Search Applicant Table</h2>
 <form action="manage.php" method="post">
     <p><label>First Name: <input type="text" name="fn" /></label></p>
     <p><label>Last Name: <input type="text" name="ln" /></label></p>
     <p><label>Job Reference: <input type="text" name="jref" /></label></p>
     <input type="submit" value="Search" />
 </form>
 <h2>Delete Applications based on Job Reference</h2>

 <form action="deletejob.php" method="post">
     <p><label>Job Ref: <input type="text" name="jobref" /></label></p>
     <input type="submit" value="Delete" />
 </form>

 <h2>Change Status of Status</h2>
 <form action="statusupdate.php" method="post">
     <p><label>ID: <input type="text" name="ID_number" /></label></p>
     <p><label>Status: </label>
         <select name="newStatus">
             <option value="new">new</option>
             <option value="current">current</option>
             <option value="final">final</option></select></p>
     <input type="submit" value="change"/>
</form>
</br>

<!-- Footer containg the author, email and university -->
<?php include 'included/footer.inc';?>

</body>
</html>
