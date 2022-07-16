<?php

require 'connection.php';

if(isset($_POST['CustomerContact'])){

    $CustomerName = $_POST['CustomerName'];
    $CustomerCode = $_POST['CustomerCode'];
    $CustomerAddress = $_POST['CustomerAddress'];
    $CustomerContact = $_POST['CustomerContact'];
    $id = $_POST['id'];

    $result = mysqli_query($connection,"UPDATE customer SET customer_name='$CustomerName',customer_code='$CustomerCode',customer_address='$CustomerAddress',customer_contact='$CustomerContact' WHERE customer_id='$id'");

    if($result){
        echo 'data updated';
    }
}
?>