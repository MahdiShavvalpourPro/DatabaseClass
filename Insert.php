<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Data</title>
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

    $sql = "Insert Into Users (FirstName,LastName,Password,Username,Email,Status)
            Values ('Hesam','Mosavi','sfd1gns3ldnf','09145632145','Hesam@gmail.com','InActive') ";

    if ($connection->query($sql) == true) {
        echo "New record created successfully";
    } else {
        echo "Error" . $sql . "<br>" . $connection->error;
    }

    $connection->close();
    ?>
</body>

</html>