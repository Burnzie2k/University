<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Using PHP variables, arrays and operators</title>
</head>
<body>
    <h1>Creating Web applications - Lab08</h1>
<?php
    $days[] = "Sunday";
    $days[] = "Monday";
    $days[] = "Tuesday";
    $days[] = "Wednesday";
    $days[] = "Thursday";
    $days[] = "Friday";
    $days[] = "Saturday";

    echo "<p>The days of the week in english are:</p>";
    foreach ($days       as $d      )
        echo $d , ", ";

    echo "<p>The days of the week in french are:</p>";
    
?>

</body>
</html>
