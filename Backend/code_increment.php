<?php
require 'connection.php';
?>
<?php
//Poduct Code Autoincrement
$query1 = "select * from customer order by customer_code desc limit 1";
$result1 = mysqli_query($connection,$query1);
$row1 = mysqli_fetch_array($result1);
$lastid1 = $row1['customer_code'];
if($lastid1 == "")
{
    $CustomerCode = "CUSTOMER1";
}
else
{
    $CustomerCode = substr($lastid1,8);
    $CustomerCode = intval($CustomerCode);
    $CustomerCode = "CUSTOMER" . ($CustomerCode + 1);
}
?>
<?php
//Poduct Code Autoincrement
$query2 = "select * from placing_order order by order_number desc limit 1";
$result2 = mysqli_query($connection,$query2);
$row2 = mysqli_fetch_array($result2);
$lastid2 = $row2['order_number'];
if($lastid2 == "")
{
    $OrderNumber = "ORDER1";
}
else
{
    $OrderNumber = substr($lastid2,5);
    $OrderNumber = intval($OrderNumber);
    $OrderNumber = "ORDER" . ($OrderNumber + 1);
}
?>