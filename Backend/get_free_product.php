<?php
	require 'connection.php';

	if ( isset($_GET['product_id']) ) {

		$product_id = mysqli_real_escape_string($connection, $_GET['product_id']);
	
		$query 		= "SELECT * FROM product WHERE product_id = {$product_id}";
		$result_set = mysqli_query($connection, $query);
	
		$free_product_list = "";
		while ( $result = mysqli_fetch_assoc($result_set) ) {
			$free_product_list .= "<option value=\"{$result['product_id']}\">{$result['product_name']}</option>";
		}
		echo $free_product_list;
	} else {
		echo "<option>Error</option>";
	}
?>