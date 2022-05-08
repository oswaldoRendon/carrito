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


<!--<?php


//$nombre=$_POST['nombre'];
//$producto=$_POST['producto'];
//$cantidad=$_POST['cantidad'];
//$importe=$_POST['importe'];


//echo $nombre;
//echo "<pre>";
//var_dump($producto);
//var_dump($cantidad);
//var_dump($importe);
//var_dump($nombre);
?>-->

<?php     
if(isset($_POST["action"]))
{
 	include('conexion.php');

 	$nombre = $_POST['fName'];
	$apellido = $_POST['sName'];
	$fechaHoy = date('Y-m-d');
	$fechaEx = explode('/',$_POST['fecha']);
	$fecha = $fechaEx[2].'-'.$fechaEx[1].'-'.$fechaEx[0];
	$item5=$_POST['item5'];

	$telefono = $_POST['tel'];
	$pais = $_POST['pais'];
	$email = $_POST['email'];
	
	if(isset($_POST['idCupon']))
		$idCupon = $_POST['idCupon'];
	else
		$idCupon = '-1';
	
	$elementos=[];

	$cantidad = $_POST['cantidad'];
	$servicios = $_POST['servicios'];
	$importe = str_replace('$','',$_POST['importe']);
	$categoria = $_POST['categoria'];

	
	
	for($t=0;$t<count($servicios);$t++){
	 $html=new stdclass();	
	 $html->nombre=$servicios[$t];
	 $html->cantidad=$cantidad[$t];
	 $html->importe=$importe[$t];
	 $html->categoria=$categoria[$t];
	 $elementos[]=$html;		
	}

	$total = str_replace('$','',$_POST['total']);

	if($idCupon != '-1')
	{
		$lisCupon = mysqli_query($link2, "SELECT * FROM cupones where idCupon = '$idCupon'");
		$rowlisCupon = mysqli_fetch_assoc($lisCupon);
		$codigoCupon = $rowlisCupon['codigo'];
		$importeCupon = $rowlisCupon['importe'];

		if($importeCupon > 0)
		{
			$descuento = $total*$importeCupon/100;
			$total = $total-$descuento;
		}
	}
	 
	   
		
  	$lisFactura = mysqli_query($link2, "SELECT * FROM facturas order by idFactura desc limit 1");
	$rowlisFactura = mysqli_fetch_assoc($lisFactura);
	$idFactura = $rowlisFactura['idFactura']+1;

 	echo $res= mysqli_query($link2,"INSERT INTO facturas (idFactura, fecha, idCupon, nombre, apellido, telefono, pais, email, importe, estado) VALUES ('$idFactura', '$fechaHoy', '$idCupon', '$nombre', '$apellido', '$telefono', '$pais', '$email', '$total', 'Creado')");

 
	foreach($elementos as $i=>$j){	
		$resProducto = mysqli_query($link2, "SELECT * FROM productos order by idProducto desc limit 1");
		$rowresProducto = mysqli_fetch_assoc($resProducto);
		$idProducto = $rowresProducto['idProducto']+1;
		$categoria = $j->categoria;
		
 		
		if( isset( $_POST['categoria'.$k] ))
		{
 			$item1 = $_POST['categoria'.$categoria.'-item1'];
			$item2 = $_POST['categoria'.$categoria.'-item2'];
		}
		else
		{
			$categoria = $item1 = $item2 = '';
		}
		
	 
		
		$sqlsentencia="INSERT INTO productos (idProducto, idFactura, nombre, apellido, cantidad, servicios, importe, total, estado, fecha, categoria, item1, item2, item5) 
		VALUES ('$idProducto', '$idFactura', '$nombre', '$apellido', '$j->cantidad', '$j->nombre', '$j->importe', '0', '', '$fecha', '$categoria', '$item1', '$item2', '$item5')";
	   
		echo $res= mysqli_query($link2,$sqlsentencia);
		
 	} 
}
?>
<?php

 $output = '

<img style="margin:40px; width:10%" margin-left:50px; src="img/logo.jpg" />
<br><br><br><br><br><br>
<h1>Travel N Change</h1>
 <style>
h1{
	font-family:"Arial Black", Gadget, sans-serif;
}

img {
    position: absolute;
    left: 45px;
    top: 0px;
}
 </style>

 
 <br>
	<div class="table-responsive">
		<table class="table table-striped table-bordered">
			<tr>
				<th>Name</th>
				<th>Surname</th>
				<th>Receipt number</th>
				<th>Date</th>
 			</tr>
			<tr>
				<td width="" nowrap>'.$nombre.'</td>
				<td>'.$apellido.'</td>
				<td>'.$idFactura.'</td>
				<td>'.$_POST["fecha"].'</td>
			</tr>
		</table>
		
	</div>
	<div class="table-responsive">
 		<table class="table table-striped table-bordered">
			<tr> 
 				<th width="404" nowrap> description</th>
                                <th>Quantity</th>  
				<th>Amount</th>
 			</tr>';
			
			foreach($elementos as $l=>$m){
				$output.='		
				<tr>
				<td width="" nowrap>'.$m->nombre.'</td>
				<td width="" nowrap>'.$m->cantidad.'</td>
				<td width="" nowrap>€'.$m->importe.'</td>
			</tr>';
			 } 
	
		if($idCupon != '-1')
		{
			$output.='
			<tr>
				<td width="" nowrap colspan="2">Discount Coupon Applied: #'.$codigoCupon.' ('.$importeCupon.'% OFF)</td>
				<td width="" nowrap>-€ '.$descuento.'</td>
 			</tr>';
		}
				
				$output.=' 
			
		</table>

     <div class="table-responsive">
		<table class="table table-striped table-bordered" >
			<tr>
				<th width="470" nowrap>Total</th>
				<th>&#8364;'.$total.'</th>
				 
			</tr>
			</table><br>
		               
                <h4>Useful information:</h4>
                <h5>You can modify the date and/or time of your trip for free informing us at least ONE WEEK before by e-mail or phone. </h5>

                <h4>Conditions:</h4>
                <h5>Please present a valid ID to the driver. It is not necesary to print this document.</h5>
   	</div>';

 

	require('pdf/pdf.php');
	//$num_factura=rand(1,50);
	//$file_name = md5(rand()) . '.pdf';
	$file_name="factura_producto_".$idFactura.".pdf";
	$ruta="facturas/pdf/";
	$html_code = '<link rel="stylesheet" href="css/bootstrap.min.css">';
	$html_code .= $output;
	$pdf = new Pdf();
	$pdf->load_html($html_code);
	$pdf->render();
	$file = $pdf->output();
	file_put_contents($ruta.$file_name, $file);
 
 
		echo '
			<script>
				location.href="paynew?id='.$idFactura.'";
			</script>';	
 
 

?>