<?php

require 'connection.php';

if(isset($_POST['ProductExpiryDate'])){

    $ProductName = $_POST['ProductName'];
    $ProductCode = $_POST['ProductCode'];
    $ProductPrice = $_POST['ProductPrice'];
    $ProductExpiryDate = $_POST['ProductExpiryDate'];
    $id = $_POST['id'];

    $result = mysqli_query($connection,"UPDATE product SET product_name='$ProductName',product_code='$ProductCode',product_price='$ProductPrice',product_expiry_date='$ProductExpiryDate' WHERE product_id='$id'");

    if($result){
        echo 'data updated';
    }
}
?>