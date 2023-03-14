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

    $sql = "Select * From Users Where Status='Active'";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "Id : " . $row["Id"] . " | Name : " . $row["FirstName"] . " | Family : " . $row["LastName"] .
                " | Username : " . $row["Username"] . " | Password : " . $row["Password"] . " | Email : " . $row["Email"] .
                "<br>";
        }
    } else {
        echo "Not Found";
    }

    $connection->close();
    ?>
</body>

</html>