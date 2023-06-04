<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>




<div class="container">


    <br><br>
    <a href="Index.php"><button type="button" class="btn btn-outline-dark">Show All Products</button></a>
    <br><br>
    <form method="post">
        <input class="form-control" name="Name" type="text" placeholder="Product Name " aria-label="default input example">
        <br>
        <input class="form-control" name="Code" type="text" placeholder="Product Code " aria-label="default input example">
        <br>
        <input class="form-control" name="Price" type="text" placeholder="Product Price " aria-label="default input example">
        <br>
        <input class="form-control" name="Count" type="text" placeholder="Product Count " aria-label="default input example">
        <br>
        <input class="form-control" name="User_Id" type="text" placeholder="User Id" aria-label="default input example">
        <br>
        <select class="form-select" aria-label="Default select example" name="Colors">
            <option selected>Choose a color</option>
            <option value="1">Red</option>
            <option value="2">Green</option>
            <option value="3">Blue</option>
        </select>
        <br><br>
        <select class="form-select" aria-label="Default select example" name="Dimensions">
            <option selected>Choose a Dimension</option>
            <option value="2">4*3</option>
            <option value="3">2*1</option>
        </select>
        <br><br>
        <select class="form-select" aria-label="Default select example" name="Designs">
            <option selected>Choose a Design</option>
            <option value="1">Design 1</option>
            <option value="2">Design 2</option>
            <option value="3">Design 3</option>
        </select>
        <br><br>
        <select class="form-select" aria-label="Default select example" name="Densities">
            <option selected>Choose a Density</option>
            <option value="1">500</option>
            <option value="2">700</option>
            <option value="3">1000</option>
        </select>
        <br><br>
        <select class="form-select" aria-label="Default select example" name="Categories">
            <option selected>Choose a Category</option>
            <option value="1">فرش</option>
            <option value="2">قالیچه</option>
            <option value="3">پادری</option>
        </select>
        <br><br>
        <select class="form-select" aria-label="Default select example" name="Status">
            <option selected>Choose a Status</option>
            <option value="1">موجود در انبار</option>
            <option value="0">این کالا فعلا موجود نیست</option>
        </select>
        <br><br>

        <button type="submit" name="addProduct" class="btn btn-primary">Primary</button>
        <button value="Cancle" type="reset" class="btn btn-warning">Warning</button>

    </form>
    <?php
    if (isset($_POST['addProduct'])) {
        include 'config.php';
        $CarpetName = $_POST['Name'];
        $Code = $_POST['Code'];
        $Price = $_POST['Price'];
        $Count = $_POST['Count'];
        $Color = $_POST['Colors'];
        $Dimention = $_POST['Dimensions'];
        $Density = $_POST['Densities'];
        $Design = $_POST['Designs'];
        $Category = $_POST['Categories'];
        $Staus = $_POST['Status'];
        $User = $_POST['User_Id'];

        $timestamp = time();
        $currentDate = gmdate('Y-m-d', $timestamp);
        // echo $currentDate;

        $sql = "INSERT INTO tbl_products(Name,Code,Price,Count,Status,Color_Id,Dimension_Id,Density_Id,Design_Id,User_Id,Categoru_Id,CreationDate,ModificationDate)
         VALUES ('$CarpetName','$Code','$Price','$Count','$Staus','$Color','$Dimention','$Density','$Design','$User','$Category','$currentDate','')";
        var_dump($sql);
        if ($conn->query($sql) === false) { // Jika gagal meng-insert data tampilkan pesan dibawah 'Perintah SQL Salah'
            trigger_error('Wrong SQL Command: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
        } else { // Jika berhasil alihkan ke halaman tampil.php
            echo "<script>alert('Add Success!')</script>";
            echo "<meta http-equiv=refresh content=\"0; url=index.php\">";
        }
    }

    ?>




</div>