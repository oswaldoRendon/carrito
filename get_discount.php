
<?php
	require_once 'dash/conexion.php';
	$coupon_code = $_POST['coupon'];
	$price = $_POST['price'];
	
	$query = mysqli_query($mysqli, "SELECT * FROM `coupon` WHERE `coupon_code` = '$coupon_code' && `status` = 'Valid'") or die(mysqli_error());
	$count = mysqli_num_rows($query);
	$fetch_cart = mysqli_fetch_array($query);
	$array = array();
	if($count > 0){
		$discount = $fetch_cart['discount'] / 100;
		$total = $discount * $price;
		$array['discount'] = $fetch_cart['discount'];
		$array['price'] = $price - $total;
		$array['id'] =$fetch_cart['coupon_id'];
		echo json_encode($array);
		
	}else{
		echo "error";
		
	}
?>