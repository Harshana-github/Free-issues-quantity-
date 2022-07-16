<?php
	require 'connection.php';

	if ( isset($_GET['product_id']) ) {

		$zone_code = mysqli_real_escape_string($connection, $_GET['product_id']);
	
		$query 		= "SELECT * FROM product WHERE product_id = {$zone_code}";
		$result_set = mysqli_query($connection, $query);
	
		$region_list = "";
		while ( $result = mysqli_fetch_assoc($result_set) ) {
			$region_list .= "<option value=\"{$result['product_id']}\">{$result['product_code']}</option>";
		}
		echo $region_list;
	} else {
		echo "<option>Error</option>";
	}
?>