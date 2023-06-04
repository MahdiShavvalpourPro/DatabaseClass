<a href="add.php">Add</a>
<br><br>

<h1>ContactUs</h1>

<table border="">
   <tbody>
      <tr>
         <th>Id</th>
         <th>FirstName</th>
         <th>LastName</th>
         <th>Mobile</th>
         <th>Email</th>
         <th>Title</th>
         <th>Message</th>
         <th>Action</th>
      </tr>
      <?php
      include 'config.php';
      $AllMessage = mysqli_query($conn, "SELECT * FROM tbl_contactus");
      foreach ($AllMessage as $Item) {
      ?>
         <tr>
            <td><?= $Item['Id']; ?></td>
            <td><?= $Item['FirstName']; ?></td>
            <td><?= $Item['LastName']; ?></td>
            <td><?= $Item['Mobile']; ?></td>
            <td><?= $Item['Email']; ?></td>
            <td><?= $Item['Title']; ?></td>
            <td><?= $Item['Messages']; ?></td>
            <td>
               <a href="update.php?Id=<?= $Item['Id']; ?>"><b><i>Edit</i></b></a> |
               <a href="index.php?Id=<?= $Item['Id']; ?>" onclick="return confirm('Are you sure?')"><b><i>Hard Delete</i></b></a> |
               <!-- <a href="index.php?Id=<?= $Item['Id']; ?>" onclick="return confirm('Are you sure Soft Delete Item ?')"><b><i>SOft Delete</i></b></a> -->
            </td>
         </tr>
      <?php } ?>
   </tbody>
</table>
<?php
//include 'koneksi.php';
if (isset($_GET['Id'])) {
   $row_id = $_GET['Id'];
   $sql = "DELETE FROM Tbl_ContactUs WHERE Id='$row_id'";
   if ($conn->query($sql) === false) { // Jika gagal meng-insert data tampilkan pesan dibawah 'Perintah SQL Salah'
      trigger_error('Wrong SQL Command: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
   } else { // Jika berhasil alihkan ke halaman tampil.php
      echo "<script>alert('Delete Success!')</script>";
      echo "<meta http-equiv=refresh content=\"0; url=index.php\">";
   }
}

?>




<hr>

<a href="addUser.php">Add User</a>
<br><br>

<h1>Users</h1>

<table border="">
   <tbody>
      <tr>
         <th hidden>Id</th>
         <th>FirstName</th>
         <th>LastName</th>
         <th>Username</th>
         <th>password</th>
         <!-- <th>Status</th> -->
         <th>Email</th>
         <th>Image</th>
         <th>Access Modifiers</th>
         <th>Action</th>
      </tr>
      <?php
      include 'config.php';
      // $AllUsers = mysqli_query($conn, "SELECT * FROM tbl_users WHERE Status='Active'");
      $AllUsers = mysqli_query($conn, "SELECT tbl_usertype.UserType ,tbl_users.* 
      FROM tbl_users INNER JOIN tbl_usertype on tbl_usertype.Id=tbl_users.UserTypeId WHERE tbl_users.Status='Active'");
      foreach ($AllUsers as $Item) {
      ?>
         <tr>
            <!-- <td><?= $Item['Id']; ?></td> -->
            <td><?= $Item['FirstName']; ?></td>
            <td><?= $Item['LastName']; ?></td>
            <td><?= $Item['Username']; ?></td>
            <td><?= $Item['Password']; ?></td>
            <!-- <td><?= $Item['Status']; ?></td> -->
            <td><?= $Item['Email']; ?></td>
            <td><?= $Item['Image']; ?></td>
            <td><?= $Item['UserType']; ?></td>
            <td>
               <a href="UpdateUser.php?Id=<?= $Item['Id']; ?>"><b><i>Edit</i></b></a> |
               <!-- <a href="index.php?Id=<?= $Item['Id']; ?>" onclick="return confirm('Are you sure?')"><b><i>Hard Delete</i></b></a> | -->
               <a href="index.php?Id=<?= $Item['Id']; ?>" onclick="return confirm('Are you sure Soft Delete Item ?')"><b><i>Soft Delete</i></b></a>
            </td>
         </tr>
      <?php } ?>
   </tbody>
</table>

<?php
//include 'koneksi.php';
if (isset($_GET['Id'])) {
   $user_id = $_GET['Id'];
   $sql = "UPDATE Tbl_Users Set Status='DisActive' WHERE Id='$user_id'";
   if ($conn->query($sql) === false) { // Jika gagal meng-insert data tampilkan pesan dibawah 'Perintah SQL Salah'
      trigger_error('Wrong SQL Command: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
   } else { // Jika berhasil alihkan ke halaman tampil.php
      echo "<script>alert('Delete Success!')</script>";
      echo "<meta http-equiv=refresh content=\"0; url=index.php\">";
   }
}

?>