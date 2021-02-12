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
    if (isset ($_POST["ID_number"]))
        $ID_number=$_POST["ID_number"];
        $newStatus=$_POST["newStatus"];
    require_once "settings.php";
    $conn = @mysqli_connect ($host, $user, $pwd, $sql_db);
    if ($conn) {
        $query = "UPDATE EOI SET status = '$newStatus' WHERE id = '$ID_number'";
        $result = mysqli_query ($conn, $query);

    if ($result) {
        echo "<p>Record Updated. </p>";
    } else {
        echo "<p>Update unsuccessful</p>";
    }
    mysqli_close($conn);
} else {
    echo "<p>Unable to connect to the database</p>";
}
 ?>



 </body>
 </html>
