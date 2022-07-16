<?php
require '../../Backend/connection.php';
require_once '../../Backend/insert.php';
require_once '../../Backend/code_increment.php';
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
    <title>Add Customer</title>
</head>
<body>
    <form action="<?php echo($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div class="row text-center mt-5">
            <h3>Add Customer</h3>
        </div><br/>
        <div class="row justify-content-center">
            <div class="col-sm-2">
                <label class="form-label">Customer Name</label>
            </div>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="" name="customer_name">
            </div>
        </div><br/>
        <div class="row justify-content-center">
            <div class="col-sm-2">
                <label class="form-label">Customer Code</label>
            </div>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="" name="customer_code" value="<?php echo $CustomerCode;?>" readonly>
            </div>
        </div><br/>
        <div class="row justify-content-center">
            <div class="col-sm-2">
                <label class="form-label">Customer Address</label>
            </div>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="" name="customer_address">
            </div>
        </div><br/>
        <div class="row justify-content-center">
            <div class="col-sm-2">
                <label class="form-label">Customer Contact</label>
            </div>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="customer_contact" name="customer_contact" maxlength="10" minlength="10">
            </div>
        </div><br/>
        <div align="center">
            <input type="submit" name="AddCustomer" class="btn btn-dark " value="ADD">
            <a href="../View/view_customer.php" class="btn btn-danger ">Back</a> 
        </div>
    </form>

</body>
</html>