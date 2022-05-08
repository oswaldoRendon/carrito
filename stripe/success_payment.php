<?php 
$headerUrl='http://localhost/cartchop/';
//$hashids = new Hashids\Hashids('pedroperez',10);
require '../config.php';
//require '../includes/header.php';
//require '../includes/phpfunction.php';


?>


 <?php
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
         $total = 0;
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = number_format($fetch_cart['price'] * $fetch_cart['quantity']);
            $grand_total = $total += $total_price;
}
}
      ?>



<?php





//$carro=$_SESSION['carro'];

//$total=0;
foreach($select_cart as $k=>$fetch_cart){

	$total+=$fetch_cart['price']*$fetch_cart['quantity'];
}


$sql = "INSERT INTO pedidos (ped_user, ped_fecha, ped_total)
VALUES ('rolo', '2022-04-22', '200')";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

//mysqli_close($conn);
/*
$insertSQL = sprintf("INSERT INTO pedidos (ped_user, ped_fecha, ped_total) VALUES (%s, %s, %s)",
	                       GetSQLValueString($_SESSION['id'], "int"),
	                       GetSQLValueString(date("Y-m-d"), "date"),
	                       GetSQLValueString($total, "double"));
$Result1 = mysqli_query($mysqli, $insertSQL) or die(mysqli_error($mysqli));*/



$query_ultimo = "select max(ped_id) as ultimo from pedidos";
$ultimo = mysqli_query($conn, $query_ultimo) or die(mysqli_error($conn));
$row_ultimo = mysqli_fetch_assoc($ultimo);
$totalRows_ultimo = mysqli_num_rows($ultimo);

$pos=0;
foreach($select_cart as $k=>$fetch_cart){

	$totalLinea=$fetch_cart['price']*$fetch_cart['quantity'];
	/*$insertSQL = sprintf("INSERT INTO pedidos_items (pi_pedido,pi_producto,pi_nombre,pi_detalle,pi_portada, pi_cantidad,pi_precio,pi_total,pi_pos,pi_user) VALUES (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)",
		                       GetSQLValueString($row_ultimo['ultimo'], "int"),
		                       GetSQLValueString($v['id'], "int"),
		                       GetSQLValueString($v['nombre'], "text"),
		                       GetSQLValueString($v['descripcion'], "text"),
		                       GetSQLValueString($v['portada'], "text"),
		                       GetSQLValueString($v['cantidad'], "int"),
		                       GetSQLValueString($v['precioUnitario'], "double"),
		                       GetSQLValueString($totalLinea, "text"),
		                       GetSQLValueString($pos, "int"),
		                       GetSQLValueString($_SESSION['id'], "int"));
	$Result1 = mysqli_query($mysqli, $insertSQL) or die(mysqli_error($mysqli));*/


 $insert_product = mysqli_query($conn, "INSERT INTO `pedidos_items`(pi_name, pi_price, pi_image, pi_quantity, pi_pos, pi_pos) VALUES('a', 'b', 'c', 'd','e','f')");
      $message[] = 'product added to cart succesfully';
   }



	$pos++;


//}

		
//$_SESSION['carro']=null;
//unset($_SESSION['carro']);

header("Location:../success_payment.php?pedido=".($row_ultimo['ultimo']));




?>