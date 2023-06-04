<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>



<div class="container">
   <br><br>
   <a href="AddProduct.php"><button type="button" class="btn btn-outline-dark">Add New Product</button></a>
   <a href="SearchItrms.php"><button type="button" class="btn btn-outline-dark">Search</button></a>
   <br><br>

   <h1>List Of Products</h1>


   <table class="table table-striped">
      <tbody>
         <tr>
            <th hidden>Id</th>
            <th>Name</th>
            <th>Code</th>
            <th>Price</th>
            <th>Count</th>
            <th>Color</th>
            <th>Dimension</th>
            <th>Density</th>
            <th>Design</th>
            <th>Category</th>
            <th>User Name</th>
            <th>Carpet registration date</th>
            <!-- <th>Action</th> -->
         </tr>
         <?php
         include 'config.php';
         $SelectAllQuery = "SELECT * FROM Tbl_Products WHERE status='1'";

         $AllProduct = mysqli_query($conn, $SelectAllQuery);
         foreach ($AllProduct as $Item) {
         ?>
            <tr>
               <td hidden><?= $Item['Id']; ?></td>
               <td><?= $Item['Name']; ?></td>
               <td><?= $Item['Code']; ?></td>
               <td><?= $Item['Price']; ?></td>
               <td><?= $Item['Count']; ?></td>
               <td><?= $Item['Color_Id']; ?></td>
               <td><?= $Item['Dimension_Id']; ?></td>
               <td><?= $Item['Density_Id']; ?></td>
               <td><?= $Item['Design_Id']; ?></td>
               <td><?= $Item['Categoru_Id']; ?></td>
               <td><?= $Item['User_Id']; ?></td>
               <td><?= $Item['CreationDate']; ?></td>
            </tr>
         <?php } ?>
      </tbody>
   </table>

   <hr>

   <!-- <a href="addUser.php">Add User</a> -->
   <!-- <br><br> -->

   <h1>Sort By Most Expensive Product</h1>


   <table class="table table-striped">
      <tbody>
         <tr>
            <th hidden>Id</th>
            <th>Name</th>
            <th>Code</th>
            <th>Price</th>
            <th>Count</th>
            <th>Color</th>
            <th>Dimension</th>
            <th>Density</th>
            <th>Design</th>
            <th>Category</th>
            <th>User Name</th>
            <th>Carpet registration date</th>
            <th>Action</th>
         </tr>
         <?php
         include 'config.php';
         $AllProduct = mysqli_query($conn, "SELECT CONCAT(tbl_users.FirstName ,' ', tbl_users.LastName) AS FullName,tbl_colors.ColorName,tbl_designs.DesignName,tbl_densities.Density,tbl_categories.Category,tbl_dimentions.Dimension,tbl_products.*
         FROM `tbl_products`
         JOIN tbl_colors on tbl_products.Color_Id=tbl_colors.Id  
         JOIN tbl_designs on tbl_products.Design_Id=tbl_designs.Id  
         JOIN tbl_densities on tbl_products.Density_Id=tbl_densities.Id  
         JOIN tbl_categories on tbl_products.Categoru_Id=tbl_categories.Id  
         JOIN tbl_dimentions on tbl_products.Dimension_Id=tbl_dimentions.Id  
         JOIN tbl_users on tbl_products.User_Id=tbl_users.Id
         WHERE tbl_products.Status='1'
         ORDER BY tbl_products.Price DESC;");
         foreach ($AllProduct as $Item) {
         ?>
            <tr>
               <td hidden><?= $Item['Id']; ?></td>
               <td><?= $Item['Name']; ?></td>
               <td><?= $Item['Code']; ?></td>
               <td><?= $Item['Price']; ?></td>
               <td><?= $Item['Count']; ?></td>
               <td><?= $Item['ColorName']; ?></td>
               <td><?= $Item['Dimension']; ?></td>
               <td><?= $Item['Density']; ?></td>
               <td><?= $Item['DesignName']; ?></td>
               <td><?= $Item['Category']; ?></td>
               <td><?= $Item['FullName']; ?></td>
               <td><?= $Item['CreationDate']; ?></td>
               <!-- <td><?= $Item['Action']; ?></td> -->
               <td>
                  <a href="UpdateProduct.php?Id=<?= $Item['Id']; ?>"><b><i>Edit</i></b></a> |
                  <a href="index.php?Id=<?= $Item['Id']; ?>" onclick="return confirm('Are you sure Soft Delete This Product ?')"><b><i>Delete</i></b></a> |
                  <!-- <a href="index.php?Id=<?= $Item['Id']; ?>" onclick="return confirm('Are you sure Soft Delete Item ?')"><b><i>SOft Delete</i></b></a> -->
               </td>
            </tr>
         <?php } ?>
      </tbody>
   </table>
   <?php
   if (isset($_GET['Id'])) {
      $row_id = $_GET['Id'];
      $sql = "UPDATE Tbl_Products Set Status='0' WHERE Id='$row_id'";
      if ($conn->query($sql) === false) { // Jika gagal meng-insert data tampilkan pesan dibawah 'Perintah SQL Salah'
         trigger_error('Wrong SQL Command: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
      } else { // Jika berhasil alihkan ke halaman tampil.php
         echo "<script>alert('Delete Success!')</script>";
         echo "<meta http-equiv=refresh content=\"0; url=index.php\">";
      }
   } ?>


   <hr>

   <!-- <a href="addUser.php">Add User</a> -->
   <!-- <br><br> -->

   <h1>Sort By cheapest Product</h1>


   <table class="table table-striped">
      <tbody>
         <tr>
            <th hidden>Id</th>
            <th>Name</th>
            <th>Code</th>
            <th>Price</th>
            <th>Count</th>
            <th>Color</th>
            <th>Dimension</th>
            <th>Density</th>
            <th>Design</th>
            <th>Category</th>
            <th>User Name</th>
            <th>Carpet registration date</th>
         </tr>
         <?php
         include 'config.php';
         $AllProduct = mysqli_query($conn, "SELECT CONCAT(tbl_users.FirstName ,' ', tbl_users.LastName) AS FullName,tbl_colors.ColorName,tbl_designs.DesignName,tbl_densities.Density,tbl_categories.Category,tbl_dimentions.Dimension,tbl_products.*
      FROM `tbl_products`
      JOIN tbl_colors on tbl_products.Color_Id=tbl_colors.Id  
      JOIN tbl_designs on tbl_products.Design_Id=tbl_designs.Id  
      JOIN tbl_densities on tbl_products.Density_Id=tbl_densities.Id  
      JOIN tbl_categories on tbl_products.Categoru_Id=tbl_categories.Id  
      JOIN tbl_dimentions on tbl_products.Dimension_Id=tbl_dimentions.Id  
      JOIN tbl_users on tbl_products.User_Id=tbl_users.Id
      WHERE tbl_products.Status='1'
      ORDER BY tbl_products.Price asc;");
         foreach ($AllProduct as $Item) {
         ?>
            <tr>
               <td hidden><?= $Item['Id']; ?></td>
               <td><?= $Item['Name']; ?></td>
               <td><?= $Item['Code']; ?></td>
               <td><?= $Item['Price']; ?></td>
               <td><?= $Item['Count']; ?></td>
               <td><?= $Item['ColorName']; ?></td>
               <td><?= $Item['Dimension']; ?></td>
               <td><?= $Item['Density']; ?></td>
               <td><?= $Item['DesignName']; ?></td>
               <td><?= $Item['Category']; ?></td>
               <td><?= $Item['FullName']; ?></td>
               <td><?= $Item['CreationDate']; ?></td>
            </tr>
         <?php } ?>
      </tbody>
   </table>





   <h1>Sort By The Newest Product</h1>


   <table class="table table-striped">
      <tbody>
         <tr>
            <th hidden>Id</th>
            <th>Name</th>
            <th>Code</th>
            <th>Price</th>
            <th>Count</th>
            <th>Color</th>
            <th>Dimension</th>
            <th>Density</th>
            <th>Design</th>
            <th>Category</th>
            <th>User Name</th>
            <th>Carpet registration date</th>
         </tr>
         <?php
         include 'config.php';
         $AllProduct = mysqli_query($conn, "SELECT CONCAT(tbl_users.FirstName ,' ', tbl_users.LastName) AS FullName,tbl_colors.ColorName,tbl_designs.DesignName,tbl_densities.Density,tbl_categories.Category,tbl_dimentions.Dimension,tbl_products.*
   FROM `tbl_products`
   JOIN tbl_colors on tbl_products.Color_Id=tbl_colors.Id  
   JOIN tbl_designs on tbl_products.Design_Id=tbl_designs.Id  
   JOIN tbl_densities on tbl_products.Density_Id=tbl_densities.Id  
   JOIN tbl_categories on tbl_products.Categoru_Id=tbl_categories.Id  
   JOIN tbl_dimentions on tbl_products.Dimension_Id=tbl_dimentions.Id  
   JOIN tbl_users on tbl_products.User_Id=tbl_users.Id
   WHERE tbl_products.Status='1'
   ORDER BY tbl_products.CreationDate desc;");
         foreach ($AllProduct as $Item) {
         ?>
            <tr>
               <td hidden><?= $Item['Id']; ?></td>
               <td><?= $Item['Name']; ?></td>
               <td><?= $Item['Code']; ?></td>
               <td><?= $Item['Price']; ?></td>
               <td><?= $Item['Count']; ?></td>
               <td><?= $Item['ColorName']; ?></td>
               <td><?= $Item['Dimension']; ?></td>
               <td><?= $Item['Density']; ?></td>
               <td><?= $Item['DesignName']; ?></td>
               <td><?= $Item['Category']; ?></td>
               <td><?= $Item['FullName']; ?></td>
               <td><?= $Item['CreationDate']; ?></td>
            </tr>
         <?php } ?>
      </tbody>
   </table>









</div>