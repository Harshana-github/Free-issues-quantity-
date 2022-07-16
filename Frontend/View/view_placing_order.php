<?php
require '../../Backend/connection.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Placing Order</title>

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
    <h2>Placing Order Details
    <a href="../../Backend/Admin/" class="btn btn-danger float-end">Back to dashbord</a>
    <a href="../Add/placing_order.php" class="btn btn-primary float-end">Add PO</a>
    <input type="button" onclick="generate()" class="btn btn-success float-end" value="Export To PDF" />
    </h2>

    <table class="table">
        <thead>
            <tr>
                <th>Order Number</th>
                <th>Customer Name</th>
                <th>Order Date</th>
                <th>Order Time</th>
                <th>Net Amount</th>
                
            </tr>
        </thead>
        <tbody>
            <?php
                $table = mysqli_query($connection,"SELECT customer.customer_id, placing_order.*,customer.customer_name 
                FROM placing_order
                INNER JOIN customer ON placing_order.customer_id=customer.customer_id");
                while($row = mysqli_fetch_array($table)){ ?>
                    <tr id="<?php echo $row['id']; ?>">
                        <td data-target="ProductName"><?php echo $row['order_number'] ?></td>
                        <td data-target="ProductCode"><?php echo $row['customer_name'] ?></td>
                        <td data-target="ProductPrice"><?php echo $row['created_at'] ?></td>
                        <td><?php echo $row['created_at_time'] ?></td>
                        <td data-target="ProductExpiryDate"><?php echo $row['net'] ?></td>
                        
                    </tr>
            <?php    }
            ?>
        </tbody>
    </table>

   </div> 

   <script src="script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.6/jspdf.plugin.autotable.min.js"></script>
</body>
</html>