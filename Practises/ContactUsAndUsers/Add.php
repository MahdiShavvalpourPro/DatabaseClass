<a href="index.php">Show All Request</a>
<br><br>
<form method="post">
    FirstName : <input type="text" name="FirstName" placeholder="Insert FirstName"><br><br>
    LastName : <input type="text" name="LastName" placeholder="Insert LastName"><br><br>
    Mobile : <input type="number" name="Mobile" placeholder="Insert Mobile"><br><br>
    Email : <input type="email" name="Email" placeholder="Insert Email"><br><br>
    Title : <input type="text" name="Title" placeholder="Insert Title"><br><br>
    Message : <input type="text" name="Message" placeholder="Insert Message"><br><br>
    <input type="submit" name="add" value="Add">
    <input type="reset" name="reset" value="Cancel">
</form>
<?php
if (isset($_POST['add'])) {
    include 'config.php';
    $LastName = $_POST['LastName'];
    $FirstName = $_POST['FirstName'];
    $Mobile = $_POST['Mobile'];
    $Email = $_POST['Email'];
    $Message = $_POST['Message'];
    $Title = $_POST['Title'];

    $sql = "INSERT INTO tbl_contactus (FirstName,LastName,Mobile,Email,Title,Messages) 
    VALUES ('$FirstName','$LastName','$Mobile','$Email','$Title','$Message')";
    if ($conn->query($sql) === false) { // Jika gagal meng-insert data tampilkan pesan dibawah 'Perintah SQL Salah'
        trigger_error('Wrong SQL Command: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
    } else { // Jika berhasil alihkan ke halaman tampil.php
        echo "<script>alert('Add Success!')</script>";
        echo "<meta http-equiv=refresh content=\"0; url=index.php\">";
    }
}

?>