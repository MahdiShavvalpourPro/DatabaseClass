<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "carpetstore_db";


    $connection = new mysqli($servername, $username, $password, $dbname);

    if ($connection->connect_errno) {
        die("Connection Failed " . $connection->connect_errno);
    }

    //the most expensive
    // $sql = "SELECT * FROM `products`
    // ORDER BY Price desc";

    //cheapest
    // $sql = "SELECT * FROM `products`
    // ORDER BY Price asc";


    // Sort by colors
    // $sql = "SELECT * FROM `products`
    // ORDER BY Color_Id ";

    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "Id : " . $row["Id"] . " | Name : " . $row["Name"] . " | Code : " . $row["Code"] .
                " | Price : " . $row["Price"] . " | Color_Id : " . $row["Color_Id"] . " | Design_Id : " . $row["Design_Id"] .
                " | Dimension_Id : " . $row["Dimension_Id"] .
                "<br>";
        }
    } else {
        echo "Not Found";
    }

    $connection->close();
    ?>
</body>

</html>