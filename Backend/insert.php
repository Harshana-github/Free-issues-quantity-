<?php
require 'connection.php';
?>
<?php
//Add Product data into database
if(isset($_POST['AddProduct'])){

    $ProductName = $_POST['product_name'];
    $ProductCode = $_POST['product_code'];
    $ProductPrice = $_POST['product_price'];
    $ProductExpiryDate = $_POST['product_expiry_date'];

    $query1 = "INSERT INTO product(product_name,product_code,product_price,product_expiry_date)VALUES('$ProductName','$ProductCode','$ProductPrice','$ProductExpiryDate')";
    $run_query1 = mysqli_query($connection,$query1);
    if($run_query1){
        echo "Data Added !";
    }
    else{
        echo "Filed !";
    }
}
?>
<?php
//Add Customer data into database

if(isset($_POST['AddCustomer'])){

    $CustomerName = $_POST['customer_name'];
    $CustomerCode = $_POST['customer_code'];
    $CustomerAddress = $_POST['customer_address'];
    $CustomerContact = $_POST['customer_contact'];

    $query2 = "INSERT INTO customer(customer_name,customer_code,customer_address,customer_contact)VALUES('$CustomerName','$CustomerCode','$CustomerAddress','$CustomerContact')";
    $run_query2 = mysqli_query($connection,$query2);
    if($run_query2){
        echo "Data Added !";
    }
    else{
        echo "Filed !";
    }
}
?>
<?php
//Add Customer data into database

if(isset($_POST['AddFreeIssues'])){

    $FreeIssueLable = $_POST['free_issue_lable'];
    $FreeIssueType = $_POST['free_issue_type'];
    $PurchaseProduct = $_POST['purchase_product'];
    $FreeProduct = $_POST['free_product'];
    $PurchaseQuantity = $_POST['purchase_quantity'];
    $FreeQuntity = $_POST['free_quntity'];
    $LowerLimit = $_POST['lower_limit'];
    $UpperLimit = $_POST['upper_limit'];

    $query3 = "INSERT INTO free_issues(free_issues_label,free_issues_type,fproduct_id,ffree_product_id,purchase_quantity,free_purchase_quantity,lower_limit,uper_limit)VALUES('$FreeIssueLable','$FreeIssueType','$PurchaseProduct','$FreeProduct','$PurchaseQuantity','$FreeQuntity','$LowerLimit','$UpperLimit')";
    $run_query3 = mysqli_query($connection,$query3);
    if($run_query3){
        echo "Data Added !";
    }
    else{
        echo "Filed !";
    }
}
?>
<?php
//Add placing order data into database


if(isset($_POST['save_multiple_data'])){
    $CustomerName = $_POST['customer_name'];
    $OrderNumber = $_POST['order_number'];
    $ProductName = $_POST['proname'];
    $ProductNumber = $_POST['pronum'];
    $Price = $_POST['price'];
    $qty = $_POST['qty'];
    $fqty = $_POST['fqty'];
    $Total = $_POST['total'];
    $NetTotal = $_POST['nettotal'];
    
    // $name = $_POST['name'];
    // $phone = $_POST['phone'];
    $sum = 0;
    foreach($ProductName as $index => $n){
        $Product_id = $n; //product id
        $total = $Total[$index];
        $sum+=$total; //net total

        // $s_name = $names;
        // $s_phone = $phone[$index];

        // $query = "INSERT INTO test1 (name,phone) VALUES ('$s_name','$s_phone')";
        // $query_run = mysqli_query($connection,$query);
    }

    $query4 = "INSERT INTO placing_order(customer_id,order_number,net)VALUES('$CustomerName','$OrderNumber','$sum')";
    $run_query4 = mysqli_query($connection,$query4);

    // if($query_run){
    //     $_SESSION['status'] = "Multiple Data Inserted Succesfuly";
    //     header("Location: ../Frontend/Add/placing_order.php");
    //     exit(0);
    // }
    // else
    // {
    //     $_SESSION['status'] = "Data Not Inserted";
    //     header("Location: ../Frontend/Add/placing_order.php");
    //     exit(0);
    // }
}
?>