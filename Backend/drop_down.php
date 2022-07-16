<?php
require 'connection.php';
?>
<?php
//Pass product to dropdown menu
$query1 = "SELECT * FROM product";

$result_set1 = mysqli_query($connection,$query1);

$purchase_product_list = '';

while($result1 = mysqli_fetch_assoc($result_set1)) {
    $purchase_product_list .="<option value=\"{$result1['product_id']}\">{$result1['product_name']}</option>"; 
}
?>
<?php
//Pass customer to dropdown menu
$query2 = "SELECT * FROM customer";

$result_set2 = mysqli_query($connection,$query2);

$customer_list = '';

while($result2 = mysqli_fetch_assoc($result_set2)) {
    $customer_list .="<option value=\"{$result2['customer_id']}\">{$result2['customer_name']}</option>"; 
}
?>