<a href="AddProduct.php">Add</a>
<br><br>

<h1>Products</h1>

<table border="">
   <tbody>
      <tr>
         <th hidden>Id</th>
         <th>Name</th>
         <th>Code</th>
         <th>Price</th>
         <th>Color</th>
         <th>Dimension</th>
         <th>Density</th>
         <th>Design</th>
         <th>Category</th>
         <th>User Name</th>
         <th>Action</th>
      </tr>
      <?php
      include 'config.php';
      $AllProduct = mysqli_query($conn, "SELECT * FROM tbl_products");
      foreach ($AllProduct as $Item) {
      ?>
         <tr>
            <td hidden><?= $Item['Id']; ?></td>
            <td><?= $Item['Name']; ?></td>
            <td><?= $Item['Code']; ?></td>
            <td><?= $Item['Price']; ?></td>
            <td><?= $Item['Color_Id']; ?></td>
            <td><?= $Item['Dimension_Id']; ?></td>
            <td><?= $Item['Density_Id']; ?></td>
            <td><?= $Item['Design_Id']; ?></td>
            <td><?= $Item['Categoru_Id']; ?></td>
            <td><?= $Item['User_Id']; ?></td>
            <td><?= $Item['Action']; ?></td>
            <td>
               <a href="UpdateProduct.php?Id=<?= $Item['Id']; ?>"><b><i>Edit</i></b></a> |
               <a href="index.php?Id=<?= $Item['Id']; ?>" onclick="return confirm('Are you sure Soft Delete This Product ?')"><b><i>Hard Delete</i></b></a> |
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
   $sql = "UPDATE Tbl_Products Set Status='DisActive' WHERE Id='$row_id'";
   if ($conn->query($sql) === false) { // Jika gagal meng-insert data tampilkan pesan dibawah 'Perintah SQL Salah'
      trigger_error('Wrong SQL Command: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
   } else { // Jika berhasil alihkan ke halaman tampil.php
      echo "<script>alert('Delete Success!')</script>";
      echo "<meta http-equiv=refresh content=\"0; url=index.php\">";
   }
}

?>