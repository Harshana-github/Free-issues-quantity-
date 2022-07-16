<?php
    /*if((isset($_GET['num1'])&&(isset($_GET['num2']))))
    {
        require_once '../../Backend/connection.php';
        $harshana = $_GET['num1'];
        $lakmal = $_GET['num2'];
        // echo $lakmal;
        $q = "SELECT FROM free_issues WHERE fproduct_id ='$lakmal'";
        $query_run=mysqli_query($connection,$q);
        // echo $query_run;
        echo json_encode($query_run);

        // $q = "SELECT free_issues.fproduct_id,free_issues.free_issues_type,product.product_name FROM product INNER JOIN free_issues ON product.product_id=free_issues.fproduct_id WHERE product.product_id='$lakmal'";
	} else {
		echo "<option>Error</option>";
	}*/
    require_once '../../Backend/connection.php';
    if($_REQUEST['product_id']) {
	$sql = "SELECT * 
	FROM  free_issues
	WHERE fproduct_id='".$_REQUEST['product_id']."'";
	$resultSet = mysqli_query($connection, $sql);	
	$empData = array();
	while( $product = mysqli_fetch_assoc($resultSet) ) {
		$productData = $product;
        // $num1 = $productData['free_purchase_quantity'];
        // $num2 = $productData['purchase_quantity'];
        // $sum = $num1 / $num2;
	}
    if($productData){
        echo json_encode($productData);
        
    }else{
        $val=0;
        echo json_encode($productData=$val);
    }

} else {
	echo 0;	
}
?>