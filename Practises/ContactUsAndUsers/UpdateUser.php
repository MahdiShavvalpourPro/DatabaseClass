<a href="index.php">Show Users</a>
<br><br>

<?php
include 'config.php';
$user_id = $_GET['Id'];
$AllMessages = mysqli_query($conn, "SELECT * FROM Tbl_Users WHERE Id='$user_id'");
$Data = mysqli_fetch_array($AllMessages, MYSQLI_ASSOC)
?>
<form method="post">
    FirstName : <input type="text" name="FirstName" placeholder="Insert FirstName" value="<?= $Data['FirstName'] ?>"><br><br>
    LastName : <input type="text" name="FirstName" placeholder="Insert FirstName" value="<?= $Data['LastName'] ?>"><br><br>
    Username : <input type="text" name="FirstName" placeholder="Insert FirstName" value="<?= $Data['Username'] ?>"><br><br>
    Password : <input type="password" name="FirstName" placeholder="Insert FirstName" value="<?= $Data['Password'] ?>"><br><br>
    Eamil : <input type="email" name="FirstName" placeholder="Insert FirstName" value="<?= $Data['Email'] ?>"><br><br>
    User Types :
    <select name="UserType">
        <option value="1">User</option>
        <option value="2">Accountants</option>
        <option value="3">Secretary</option>
    </select>
    <br><br>
    Status :
    <select name="Status">
        <option value="Active">Active</option>
        <option value="DisActive">DisActive</option>
    </select>
    <input type="submit" name="Edit" value="Edit">
    <input type="reset" name="reset" value="Cancel">
</form>
<?php
if (isset($_POST['Edit'])) {
    include 'config.php';
    $LastName = $_POST['LastName'];
    $FirstName = $_POST['FirstName'];
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];
    $Email = $_POST['Email'];
    $UserType = $_POST['UserType'];
    $Status = $_POST['Status'];

    $sql = "UPDATE Tbl_users SET Id='$user_id',LastName='$LastName',FirstName='$FirstName',Username='$Username',Password='$Password',Email='$Email',Status='$Status',UserTypeId=$UserType
     WHERE Id='$user_id'";
    if ($conn->query($sql) === false) { // Jika gagal meng-insert data tampilkan pesan dibawah 'Perintah SQL Salah'
        trigger_error('Wrong SQL Command: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
    } else { // Jika berhasil alihkan ke halaman tampil.php
        echo "<script>alert('Update Success!')</script>";
        echo "<meta http-equiv=refresh content=\"0; url=index.php\">";
    }
}

?>