<?php

require 'connection.php';

if(isset($_POST['UperLimit'])){

    $FreeIssuesLabel = $_POST['FreeIssuesLabel'];
    $FreeIssuesType = $_POST['FreeIssuesType'];
    $PurchaseProduct = $_POST['PurchaseProduct'];
    $FreeProduct = $_POST['FreeProduct'];
    $PurchaseQuantity = $_POST['PurchaseQuantity'];
    $FreeQuantity = $_POST['FreeQuantity'];
    $LowerLimit = $_POST['LowerLimit'];
    $UperLimit = $_POST['UperLimit'];
    $id = $_POST['id'];

    
    $result = mysqli_query($connection,"UPDATE free_issues SET free_issues_label='$FreeIssuesLabel',free_issues_type='$FreeIssuesType',/*fproduct_id='$PurchaseProduct',ffree_product_id='$FreeProduct',*/purchase_quantity='$PurchaseQuantity',free_purchase_quantity='$FreeQuantity',lower_limit='$LowerLimit',uper_limit='$UperLimit' WHERE free_issues_id='$id'");

    if($result){
        echo 'data updated';
    }
}
?>