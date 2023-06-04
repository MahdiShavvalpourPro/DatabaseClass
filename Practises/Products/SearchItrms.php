<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>



<div class="container">
    <br>
    <h1>
        Search By
        <a style="color: rgb(205,133,63); text-decoration: none;">Name</a> |
        <a style="color: rgb(244,164,96); text-decoration: none;">Price</a> |
        <a style="color: rgb(222,184,135); text-decoration: none;">Carpet registration date</a>
    </h1>

    <br>

    <form action="post">
        <div class="input-group mb-3">
            <div class="input-group-text">
                <input class="form-check-input mt-0" checked='True' name="NameChecker" onchange="toggleCheckbox(this)" type="checkbox" value="">
            </div>
            <input type="text" class="form-control" name="SearchName" placeholder="Search By Carpet Name Or User Name">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-text">
                <input class="form-check-input mt-0" name="PriceChecker" onchange="toggleCheckbox(this)" type="checkbox" value="">
            </div>
            <input type="number" class="form-control" name="SearchPrice" placeholder="Search By Price">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-text">
                <input class="form-check-input mt-0" name="DateChecker" onchange="toggleCheckbox(this),toggleCheckbox_1(this)" type="checkbox" value="">
            </div>
            <input type="date" class="form-control" name="SearchDate" placeholder="Search By Carpet registration date">
        </div>

        <div class="d-grid gap-2">
            <button name="Search" class="btn btn-outline-success" type="button">Apply</button>
        </div>
    </form>

    <?php
    if (isset($_POST['Search'])) {
    }
    ?>

    <br>

    <script>
        function toggleCheckbox(checkbox) {
            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
            checkboxes.forEach(function(cb) {
                if (cb !== checkbox) {
                    cb.checked = false;
                    //    cb.setAttribute("disabled", "disabled");
                } else {
                    cb.removeAttribute("disabled");
                }
            });
        }

        function toggleCheckbox_1(checkbox) {
            if (checkbox.checked) {
                var inputValue = document.querySelector('input[name="SearchPrice"]').value;
                sendDataToPHP(inputValue);
            }
            
        }


    </script>



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
                </tr>
            <?php } ?>
        </tbody>
    </table>

</div>