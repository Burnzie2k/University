<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Using PHP variables, arrays and operators</title>
</head>
<body>
    <h1>Creating Web applications - Lab08</h1>
<?php
    $marks = array (85, 85, 95);
    $marks[1] = 90;
    $ave = ($marks[0] + $marks[1] + $marks[2])/3;
    if ($ave >= 50)
        $status = "PASSED";
    else
        $status = "FAILED";
    echo "<p>The average score is $ave. Your $status.</p>";
?>

</body>
</html>
