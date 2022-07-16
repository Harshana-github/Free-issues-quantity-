<?php
require '../../Backend/connection.php';
require_once '../../Backend/insert.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <title>Add Product</title>
</head>
<body>
    <form action="<?php echo($_SERVER["PHP_SELF"]);?>" method="POST">
        <div class="row text-center mt-5">
            <h3>Add Product</h3>
        </div><br/>
        <div class="row justify-content-center">
            <div class="col-sm-2">
                <label class="form-label">Product Name</label>
            </div>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="" name="product_name">
            </div>
        </div><br/>
        <div class="row justify-content-center">
            <div class="col-sm-2">
                <label class="form-label">Product Code</label>
            </div>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="" name="product_code">
            </div>
        </div><br/>
        <div class="row justify-content-center">
            <div class="col-sm-2">
                <label class="form-label">Price</label>
            </div>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="" name="product_price">
            </div>
        </div><br/>
        <div class="row justify-content-center">
            <div class="col-sm-2">
                <label class="form-label">Expriry Date</label>
            </div>
            <div class="col-sm-3">
                <input type="date" class="form-control" id="" name="product_expiry_date">
            </div>
        </div><br/>
        <div align="center">
            <input type="submit" name="AddProduct" class="btn btn-dark " value="ADD" name="AddProduct">
            <a href="../View/view_product.php" class="btn btn-danger ">Back</a> 
        </div>
    </form>
</body>
</html>