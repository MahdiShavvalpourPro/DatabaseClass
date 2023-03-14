<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soft Delete</title>
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

    $sql = "Update Users Set Status='InActive' Where Id='2' ";

    if ($connection->query($sql) == true) {
        echo "the record Deleted successfully";
    } else {
        echo "Error" . $sql . "<br>" . $connection->error;
    }

    $connection->close();
    ?>
</body>

</html>