<!DOCTYPE html>                             
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/style.css">
<!--
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>




<?php   

 	include('dash/conexion.php');
  
	$nombre = $_POST['fName'];
	$apellido = $_POST['sName'];
	$telefono = $_POST['tel'];
	$pais = $_POST['pais'];
	$email = $_POST['email'];
	$totalProductos=$_POST['totalproducto'];
	

	$fechaCompra=date('Y-m-d');
	$fechaCaducidad=date("Y-m-d H:i:s", strtotime('+5 hours'));

	$total = str_replace('€','',$_POST['total']);
	
	if(isset($_POST['idCupon'])){
		$idCupon = $_POST['idCupon'];		
	}else{
		$idCupon = '-1';
	}
 	/*se inserta el encabezado de la factura*/
 	 mysqli_query($mysqli," INSERT INTO facturas ( idCupon, cliente_nombre, cliente_apellido, cliente_telefono, cliente_pais, cliente_email, cliente_importe, cliente_estado,totalproductos) VALUES ( '$idCupon', '$nombre', '$apellido', '$telefono', '$pais', '$email', '$total', 'Creado','$totalProductos')");	
 
	$sql=" SELECT * FROM facturas ORDER BY idFactura desc";		
	$facturaRes=mysqli_query($mysqli,$sql);
	$rowresProducto = mysqli_fetch_assoc($facturaRes);
	$idFactura=$rowresProducto['idFactura'];//obtiene el id de factura
	mysqli_free_result($facturaRes);
	$fechahoy=date("Y-m-d");  
	$sqlQuery=" SELECT  * FROM cart WHERE fechaCompra='".$fechahoy."' limit ".$totalProductos;// exit;
	$prodDet=mysqli_query($mysqli,$sqlQuery);
	//$carritoProd = mysqli_fetch_assoc($prodDet);
	
	$queryFacturaDet='';
	$i=0;
	$strdatosProducto="";
	$claveCoupon="";
	$importeCoupon=0;
	$porcCoupon=0;
	$idcupon=0;
	while($carritoProd = mysqli_fetch_array($prodDet)){		
		$id=$carritoProd[0];
	 	$cantidad=$carritoProd[4];
		$idcupon=$carritoProd[6];
		$queryFacturaDet=" INSERT INTO facturas_detalle(idfactura ,idproducto ,cantidad) VALUES('$idFactura','$id','$cantidad')";
		mysqli_query($mysqli,$queryFacturaDet);	
		
		

	if($idcupon>0){
		$strSelectcupon=' SELECT * FROM coupon WHERE coupon_id='.$idcupon;
		$rstcupon=mysqli_query($mysqli,$strSelectcupon);
		$rowrstcupon=mysqli_fetch_array($rstcupon);
		$claveCoupon=$rowrstcupon[1];
		$porcCoupon=(($rowrstcupon[2])/100);
		$importeCoupon+=($porcCoupon*($cantidad*$rowrstproducto[2]));
		mysqli_free_result($rstcupon);
	}
	

	}

	
?>

<?php

		echo '
			<script>
				location.href="paynew?id='.$idFactura.'";
			</script>';	
 
 

?>