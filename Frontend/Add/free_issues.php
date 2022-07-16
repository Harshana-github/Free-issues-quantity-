<?php
require '../../Backend/connection.php';
require_once '../../Backend/insert.php';
require_once '../../Backend/drop_down.php';
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
    <title>Free Issues</title>
</head>
<body>
    <form action="<?php echo($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div class="row text-center mt-5">
            <h3>Add Free Issues</h3>
        </div><br/>
        <div class="row justify-content-center">
            <div class="col-sm-2">
                <label class="form-label">Free Issue Label</label>
            </div>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="" name="free_issue_lable">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-2">
                <label class="form-label">Free Issue Type</label>
            </div>
            <div class="col-sm-3">
                <select class="form-label" name="free_issue_type">
                    <option value="1">Flat</option>
                    <option value="0">Multiple</option>
                </select>
            </div>
        </div><br/>
        <div class="row justify-content-center">
            <div class="col-sm-2">
                <label class="form-label">Purchase Product</label>
            </div>
            <div class="col-sm-3">
                    <select name="purchase_product" id="purchase_product">
                        <option value="">Select</option>
                        <?php echo $purchase_product_list; ?>
                    </select>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-2">
                <label class="form-label">Free Product</label>
            </div>
            <div class="col-sm-3">
                    <select name="free_product" id="free_product">
                        <?php echo $free_product_list;?>
                    </select>
            </div>
        </div><br/>
        <div class="row justify-content-center">
            <div class="col-sm-2">
                <label class="form-label">Purchase Quantity</label>
            </div>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="" name="purchase_quantity">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-2">
                <label class="form-label">Free Quantity</label>
            </div>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="" name="free_quntity">
            </div>
        </div><br/>
        <div class="row justify-content-center">
            <div class="col-sm-2">
                <label class="form-label">Lower Limit</label>
            </div>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="" name="lower_limit">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-2">
                <label class="form-label">Upper Limit</label>
            </div>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="" name="upper_limit">
            </div>
        </div><br/>
        <div align="center">
            <input type="submit" name="AddFreeIssues" class="btn btn-dark " value="ADD">
            <a href="../View/view_free_issues.php" class="btn btn-danger ">Back</a> 
        </div>
    </form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("#purchase_product").on("change", function() {
            var purchase_product = $("#purchase_product").val();
            var getURL = "../../Backend/get_free_product.php?product_id=" + purchase_product;
            $.get(getURL, function(data, status) {
                $("#free_product").html(data);
            });
        });
    });
</script>
</body>
</html>