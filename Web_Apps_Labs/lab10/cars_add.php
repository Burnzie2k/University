<?php
    require_once("settings.php");

    $make = htmlspecialchars($_POST["carmake"]);
    $model = trim($_POST["carmodel"]);
    $price = trim($_POST["price"]);
    $yom = trim($_POST["yom"]);

    $conn = @mysqli_connect(
    $host,
    $user,
    $pwd,
    $sql_db
    );

    $sql_table = "cars";



    $query = "insert into $sql_table (make, model, price, yom) VALUES ('$make', '$model', '$price', '$yom')";
        $result = mysqli_query($conn, $query);
        if(!$result) {
            echo "<p class=\"wrong\">Something is wrong with ", $query,"</p>";
        } else {
            echo "<p class=\"ok\">Succesfully added New Car record ", $query,"</p>";
        }

    mysqli_close($conn);



 ?>
