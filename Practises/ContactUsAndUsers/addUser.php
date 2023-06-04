<a href="index.php">Show All Users</a>
<br><br>
<form method="post">
    FirstName : <input type="text" name="FirstName" placeholder="Insert FirstName"><br><br>
    LastName : <input type="text" name="LastName" placeholder="Insert LastName"><br><br>
    Username : <input type="text" name="Username" placeholder="Insert Username"><br><br>
    Password : <input type="password" name="Password" placeholder="Insert Password"><br><br>
    Email : <input type="email" name="Email" placeholder="Insert Email"><br><br>
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
    <input type="submit" name="addUser" value="addUser">
    <input type="reset" name="reset" value="Cancel">
</form>
<?php
if (isset($_POST['addUser'])) {
    include 'config.php';
    $LastName = $_POST['LastName'];
    $FirstName = $_POST['FirstName'];
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];
    $Email = $_POST['Email'];
    $UserType = $_POST['UserType'];
    $Status = $_POST['Status'];

    $sql = "INSERT INTO tbl_users (FirstName,LastName,Username,Password,Email,Status,Image,UserTypeId) 
    VALUES ('$FirstName','$LastName','$Username','$Password','$Email','$Status','-',$UserType)";
    if ($conn->query($sql) === false) { // Jika gagal meng-insert data tampilkan pesan dibawah 'Perintah SQL Salah'
        trigger_error('Wrong SQL Command: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
    } else { // Jika berhasil alihkan ke halaman tampil.php
        echo "<script>alert('Add Success!')</script>";
        echo "<meta http-equiv=refresh content=\"0; url=index.php\">";
    }
}

?>