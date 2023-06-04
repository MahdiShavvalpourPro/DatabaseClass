<a href="index.php">Show Data</a>
<br><br>

<?php
include 'config.php';
$row_id = $_GET['Id'];
$AllMessages = mysqli_query($conn, "SELECT * FROM Tbl_ContactUs WHERE Id='$row_id'");
$Data = mysqli_fetch_array($AllMessages, MYSQLI_ASSOC)
?>
<form method="post">
    FirstName : <input type="text" name="FirstName" placeholder="Insert FirstName" value="<?= $Data['FirstName'] ?>"><br><br>
    LastName : <input type="text" name="LastName" placeholder="Insert LastName" value="<?= $Data['LastName'] ?>"><br><br>
    Mobile : <input type="number" name="Mobile" placeholder="Insert Mobile" value="<?= $Data['Mobile'] ?>"><br><br>
    Email : <input type="email" name="Email" placeholder="Insert Email" value="<?= $Data['Email'] ?>"><br><br>
    Title : <input type="text" name="Title" placeholder="Insert Title" value="<?= $Data['Title'] ?>"><br><br>
    Message : <textarea rows="4" name="Message" ?>
    <?php echo $Data['Messages'] ?>
    </textarea><br><br>
    <input type="submit" name="update" value="Update">
    <input type="reset" name="cancel" value="Cancel">
</form>
<?php
if (isset($_POST['update'])) {
    include 'config.php';
    $LastName = $_POST['LastName'];
    $FirstName = $_POST['FirstName'];
    $Mobile = $_POST['Mobile'];
    $Email = $_POST['Email'];
    $Message = $_POST['Message'];
    $Title = $_POST['Title'];

    $sql = "UPDATE Tbl_contactus SET Id='$row_id',LastName='$LastName',FirstName='$FirstName',Mobile='$Mobile',Email='$Email',Title='$Title',Messages='$Message' WHERE Id='$row_id'";
    if ($conn->query($sql) === false) { // Jika gagal meng-insert data tampilkan pesan dibawah 'Perintah SQL Salah'
        trigger_error('Wrong SQL Command: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
    } else { // Jika berhasil alihkan ke halaman tampil.php
        echo "<script>alert('Update Success!')</script>";
        echo "<meta http-equiv=refresh content=\"0; url=index.php\">";
    }
}

?>