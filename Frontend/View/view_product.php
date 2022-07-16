<?php
require '../../Backend/connection.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Product</title>

</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container mt-5">
    <h2>Product Details
    <a href="../../Backend/Admin/" class="btn btn-danger float-end">Back to dashbord</a>
    <a href="../Add/product.php" class="btn btn-primary float-end">Add Product</a>
    </h2>

    <table class="table">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Product Code</th>
                <th>Price</th>
                <th>Expiry Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $table = mysqli_query($connection,"SELECT * FROM product");
                while($row = mysqli_fetch_array($table)){ ?>
                    <tr id="<?php echo $row['product_id']; ?>">
                        <td data-target="ProductName"><?php echo $row['product_name'] ?></td>
                        <td data-target="ProductCode"><?php echo $row['product_code'] ?></td>
                        <td data-target="ProductPrice"><?php echo $row['product_price'] ?></td>
                        <td data-target="ProductExpiryDate"><?php echo $row['product_expiry_date'] ?></td>
                        <td><a href="#" data-role="update" data-id="<?php echo $row['product_id']; ?>" data-toggle="modal" data-target="#myModal" class="btn btn-success">Update</a></td>
                    </tr>
            <?php    }
            ?>
        </tbody>
    </table>

   </div> 
<div class="container">
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Update Product Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">

          <div class="form-group">
            <label>Product Name</label>
            <input type="text" id="ProductName" class="form-control">
          </div>
          <div class="form-group">
            <label>Product Code</label>
            <input type="text" id="ProductCode" class="form-control">
          </div>
          <div class="form-group">
            <label>Price</label>
            <input type="text" id="ProductPrice" class="form-control">
          </div>
          <div class="form-group">
            <label>Expiry Date</label>
            <input type="date" id="ProductExpiryDate" class="form-control">
          </div>
          <input type="hidden" id="userId" class="form-control">
        </div>
        <div class="modal-footer">
            <a href="#" id="save" class="btn btn-primary pull-right">Update</a>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
<script>
    $(document).ready(function(){
        //append values in iput fields
        $(document).on('click','a[data-role=update]',function(){
            var id = $(this).data('id');

            var ProductName = $('#'+id).children('td[data-target=ProductName]').text();
            var ProductCode = $('#'+id).children('td[data-target=ProductCode]').text();
            var ProductPrice = $('#'+id).children('td[data-target=ProductPrice]').text();
            var ProductExpiryDate = $('#'+id).children('td[data-target=ProductExpiryDate]').text();

            $('#ProductName').val(ProductName);
            $('#ProductCode').val(ProductCode);
            $('#ProductPrice').val(ProductPrice);
            $('#ProductExpiryDate').val(ProductExpiryDate);
            $('#userId').val(id);
            $('#myModal').modal('toggle');

        });

        //now create event to get data from fields and update in database
        $('#save').click(function(){
            var id = $('#userId').val();

            var ProductName = $('#ProductName').val();
            var ProductCode = $('#ProductCode').val();
            var ProductPrice = $('#ProductPrice').val();
            var ProductExpiryDate = $('#ProductExpiryDate').val();

            $.ajax({
                url : '../../Backend/ajax_view_product.php',
                method : 'POST',
                data : {ProductName:ProductName,ProductCode:ProductCode,ProductPrice:ProductPrice,ProductExpiryDate:ProductExpiryDate,id:id},
                success : function(response){

                    $('#'+id).children('td[data-target=ProductName]').text(ProductName);
                    $('#'+id).children('td[data-target=ProductCode]').text(ProductCode);
                    $('#'+id).children('td[data-target=ProductPrice]').text(ProductPrice);
                    $('#'+id).children('td[data-target=ProductExpiryDate]').text(ProductExpiryDate);
                    $('#myModal').modal('toggle');
                    location.reload();
                }
            });
        });
    });
</script>
</body>
</html>