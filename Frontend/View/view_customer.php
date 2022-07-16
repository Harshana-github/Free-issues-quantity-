<?php
require '../../Backend/connection.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Customer</title>

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
    <h2>Customer Details
    <a href="../../Backend/Admin/" class="btn btn-danger float-end">Back to dashbord</a>
    <a href="../Add/customer.php" class="btn btn-primary float-end">Add Customer</a>
    </h2>

    <table class="table">
        <thead>
            <tr>
                <th>Customer Name</th>
                <th>Customer Code</th>
                <th>Customer Address</th>
                <th>Customer Contact</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $table = mysqli_query($connection,"SELECT * FROM customer");
                while($row = mysqli_fetch_array($table)){ ?>
                    <tr id="<?php echo $row['customer_id']; ?>">
                        <td data-target="CustomerName"><?php echo $row['customer_name'] ?></td>
                        <td data-target="CustomerCode"><?php echo $row['customer_code'] ?></td>
                        <td data-target="CustomerAddress"><?php echo $row['customer_address'] ?></td>
                        <td data-target="CustomerContact"><?php echo $row['customer_contact'] ?></td>
                        <td><a href="#" data-role="update" data-id="<?php echo $row['customer_id']; ?>" data-toggle="modal" data-target="#myModal" class="btn btn-success">Update</a></td>
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
          <h4 class="modal-title">Update Customer Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">

          <div class="form-group">
            <label>Customer Name</label>
            <input type="text" id="CustomerName" class="form-control">
          </div>
          <div class="form-group">
            <label>Customer Code</label>
            <input type="text" id="CustomerCode" class="form-control" readonly>
          </div>
          <div class="form-group">
            <label>Customer Address</label>
            <input type="text" id="CustomerAddress" class="form-control">
          </div>
          <div class="form-group">
            <label>Customer Contact</label>
            <input type="text" id="CustomerContact" class="form-control" maxlength="10" minlength="10">
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

            var CustomerName = $('#'+id).children('td[data-target=CustomerName]').text();
            var CustomerCode = $('#'+id).children('td[data-target=CustomerCode]').text();
            var CustomerAddress = $('#'+id).children('td[data-target=CustomerAddress]').text();
            var CustomerContact = $('#'+id).children('td[data-target=CustomerContact]').text();

            $('#CustomerName').val(CustomerName);
            $('#CustomerCode').val(CustomerCode);
            $('#CustomerAddress').val(CustomerAddress);
            $('#CustomerContact').val(CustomerContact);
            $('#userId').val(id);
            $('#myModal').modal('toggle');

        });

        //now create event to get data from fields and update in database
        $('#save').click(function(){
            var id = $('#userId').val();

            var CustomerName = $('#CustomerName').val();
            var CustomerCode = $('#CustomerCode').val();
            var CustomerAddress = $('#CustomerAddress').val();
            var CustomerContact = $('#CustomerContact').val();

            $.ajax({
                url : '../../Backend/ajax_view_customer.php',
                method : 'POST',
                data : {CustomerName:CustomerName,CustomerCode:CustomerCode,CustomerAddress:CustomerAddress,CustomerContact:CustomerContact,id:id},
                success : function(response){

                    $('#'+id).children('td[data-target=CustomerName]').text(CustomerName);
                    $('#'+id).children('td[data-target=CustomerCode]').text(CustomerCode);
                    $('#'+id).children('td[data-target=CustomerAddress]').text(CustomerAddress);
                    $('#'+id).children('td[data-target=CustomerContact]').text(CustomerContact);
                    $('#myModal').modal('toggle');
                    location.reload();
                }
            });
        });
    });
</script>
</body>
</html>