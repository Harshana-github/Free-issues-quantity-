<?php
require '../../Backend/connection.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Issues</title>

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
    <h2>Free Issues Details
    <a href="../../Backend/Admin/" class="btn btn-danger float-end">Back to dashbord</a>
    <a href="../Add/free_issues.php" class="btn btn-primary float-end">Add Free Issues</a>
    </h2>

    <table class="table">
        <thead>
            <tr>
                <th>Free Issue Label</th>
                <th>Free Issue Type</th>
                <th>Purchase Product</th>
                <th>Free Product</th>
                <th>Purchase Quantity</th>
                <th>Free Quantity</th>
                <th>Lower Limit</th>
                <th>Uper Limit</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $table = mysqli_query($connection,"SELECT product.product_id, product.product_name, free_issues.*
                FROM free_issues
                INNER JOIN product ON free_issues.fproduct_id=product.product_id;");

                while($row = mysqli_fetch_array($table)){ ?>
                    <tr id="<?php echo $row['free_issues_id']; ?>">
                        <td data-target="FreeIssuesLabel"><?php echo $row['free_issues_label'] ?></td>
                        <td data-target="FreeIssuesType"><?php if($row['free_issues_type'] == 1){echo "Flat";}else{echo "Multiple";} ;?></td>
                        <td data-target="PurchaseProduct"><?php echo $row['product_name'] ?></td>
                        <td data-target="FreeProduct"><?php echo $row['product_name'] ?></td>
                        <td data-target="PurchaseQuantity"><?php echo $row['purchase_quantity'] ?></td>
                        <td data-target="FreeQuantity"><?php echo $row['free_purchase_quantity'] ?></td>
                        <td data-target="LowerLimit"><?php echo $row['lower_limit'] ?></td>
                        <td data-target="UperLimit"><?php echo $row['uper_limit'] ?></td>
                        <td><a href="#" data-role="update" data-id="<?php echo $row['free_issues_id']; ?>" data-toggle="modal" data-target="#myModal" class="btn btn-success">Update</a></td>
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
          <h4 class="modal-title">Update Free Issues Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">

          <div class="form-group">
            <label>Free Issues Label</label>
            <input type="text" id="FreeIssuesLabel" class="form-control">
          </div>
          <div class="form-group">
            <label>Free Issues Type</label>
            <input type="text" id="FreeIssuesType" class="form-control" readonly>
          </div>
          <div class="form-group">
            <label>Purchase Product</label>
            <input type="text" id="PurchaseProduct" class="form-control">
          </div>
          <div class="form-group">
            <label>Free Product</label>
            <input type="text" id="FreeProduct" class="form-control" maxlength="10" minlength="10">
          </div>
          <div class="form-group">
            <label>Purchase Quantity</label>
            <input type="text" id="PurchaseQuantity" class="form-control">
          </div>
          <div class="form-group">
            <label>Free Quantity</label>
            <input type="text" id="FreeQuantity" class="form-control" readonly>
          </div>
          <div class="form-group">
            <label>Lower Limit</label>
            <input type="text" id="LowerLimit" class="form-control">
          </div>
          <div class="form-group">
            <label>Uper Limit</label>
            <input type="text" id="UperLimit" class="form-control" maxlength="10" minlength="10">
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

            var FreeIssuesLabel = $('#'+id).children('td[data-target=FreeIssuesLabel]').text();
            var FreeIssuesType = $('#'+id).children('td[data-target=FreeIssuesType]').text();
            var PurchaseProduct = $('#'+id).children('td[data-target=PurchaseProduct]').text();
            var FreeProduct = $('#'+id).children('td[data-target=FreeProduct]').text();

            var PurchaseQuantity = $('#'+id).children('td[data-target=PurchaseQuantity]').text();
            var FreeQuantity = $('#'+id).children('td[data-target=FreeQuantity]').text();
            var LowerLimit = $('#'+id).children('td[data-target=LowerLimit]').text();
            var UperLimit = $('#'+id).children('td[data-target=UperLimit]').text();

            $('#FreeIssuesLabel').val(FreeIssuesLabel);
            $('#FreeIssuesType').val(FreeIssuesType);
            $('#PurchaseProduct').val(PurchaseProduct);
            $('#FreeProduct').val(FreeProduct);

            $('#PurchaseQuantity').val(PurchaseQuantity);
            $('#FreeQuantity').val(FreeQuantity);
            $('#LowerLimit').val(LowerLimit);
            $('#UperLimit').val(UperLimit);

            $('#userId').val(id);
            $('#myModal').modal('toggle');

        });

        //now create event to get data from fields and update in database
        $('#save').click(function(){
            var id = $('#userId').val();

            var FreeIssuesLabel = $('#FreeIssuesLabel').val();
            var FreeIssuesType = $('#FreeIssuesType').val();
            var PurchaseProduct = $('#PurchaseProduct').val();
            var FreeProduct = $('#FreeProduct').val();

            var PurchaseQuantity = $('#PurchaseQuantity').val();
            var FreeQuantity = $('#FreeQuantity').val();
            var LowerLimit = $('#LowerLimit').val();
            var UperLimit = $('#UperLimit').val();

            $.ajax({
                url : '../../Backend/ajax_view_free_issues.php',
                method : 'POST',
                data : {FreeIssuesLabel:FreeIssuesLabel,FreeIssuesType:FreeIssuesType,PurchaseProduct:PurchaseProduct,FreeProduct:FreeProduct,PurchaseQuantity:PurchaseQuantity,FreeQuantity:FreeQuantity,LowerLimit:LowerLimit,UperLimit:UperLimit,id:id},
                success : function(response){

                    $('#'+id).children('td[data-target=FreeIssuesLabel]').text(FreeIssuesLabel);
                    $('#'+id).children('td[data-target=FreeIssuesType]').text(FreeIssuesType);
                    $('#'+id).children('td[data-target=PurchaseProduct]').text(PurchaseProduct);
                    $('#'+id).children('td[data-target=FreeProduct]').text(FreeProduct);

                    $('#'+id).children('td[data-target=PurchaseQuantity]').text(PurchaseQuantity);
                    $('#'+id).children('td[data-target=FreeQuantity]').text(FreeQuantity);
                    $('#'+id).children('td[data-target=LowerLimit]').text(LowerLimit);
                    $('#'+id).children('td[data-target=UperLimit]').text(UperLimit);
                    $('#myModal').modal('toggle');
                    location.reload();
                }
            });
        });
    });
</script>
</body>
</html>