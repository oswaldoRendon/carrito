
<?php
	require_once 'dash/conexion.php';
	$idcoupon = $_POST['idcoupon'];
	$idCart = $_POST['idCart'];
	


		$query = mysqli_query($mysqli, " UPDATE cart set 	id_Coupon=".$idcoupon." WHERE id =".$idCart ) or die(mysqli_error());
		if($query){
			echo "1";
		}else{
			echo "0";
		}

	

?>