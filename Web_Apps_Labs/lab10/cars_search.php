<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="description" content="php"/>
    <meta name="keywords" content="php"/>
    <meta name="author" content="Adam Jarzebak"/>


    <title>database lab09</title>

</head>

<body>



<h2>Database Searching</h2>

<section style="text-align: center">

    <form action="cars_search.php" method="GET">
        <input type="text" name="query"/>
        <input type="submit" value="Search"/>
    </form>
</section>


<?php
require_once("settings.php");
$sql_table = "cars";
$conn = @mysqli_connect(
    $host,
    $user,
    $pwd,
    $sql_db
);
if (!$conn) {
    echo "<p> Database connection error</p>";
} else {
    echo "<p> Database connection success</p>";
}
if (isset($_GET["query"])) {
    $query = $_GET["query"];
} else {
    $query = null;
}
$query = htmlspecialchars($query);
$queryToDB = "SELECT * FROM $sql_table
            WHERE (`make` LIKE '%" . $query . "%') OR (`model` LIKE '%" . $query . "%')";
$result = mysqli_query($conn, $queryToDB);
if (!$result) {
    echo "<p>Something is wrong with", $query, "</p>";
} else {
    echo "<table border=\"1\">\n";
    echo "<tr>\n "
        . "<th scope=\"col\">Make</th>\n "
        . "<th scope=\"col\">Model</th>\n "
        . "<th scope=\"col\">Price</th>\n "
        . "</tr>\n ";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>\n ";
        echo "<td>", $row["make"], "</td>\n";
        echo "<td>", $row["model"], "</td>\n";
        echo "<td>", $row["price"], "</td>\n";
        echo "</tr>\n ";
    }
    echo "</table>\n ";
}
mysqli_free_result($result);
mysqli_close($conn);
?>

</body>
</html>
