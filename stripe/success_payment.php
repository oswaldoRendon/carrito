<?php
	include('../dash/conexion.php');
/*Se genera el pdf  */
/* Paso se obtiene la factura encabezado y el detalle */	
$fechaCompra=date('Y-m-d');
$queryFact=" SELECT * FROM facturas ORDER BY  fecha desc";
$resFactura=mysqli_query($mysqli,$queryFact);
$rowFact=mysqli_fetch_array($resFactura);
$idfactura=$rowFact[0];
$totalProducto=$rowFact[3];
$nombre=$rowFact[4];
$apellido=$rowFact[5];
$apellido=$rowFact[6];

$importeCoupon=0;
$total=0;


$sqlQuery=" SELECT  * FROM cart WHERE fechaCompra='".$fechaCompra."' ORDER BY fechaCompra desc limit ".$totalProductos;// exit;
$prodDet=mysqli_query($mysqli,$sqlQuery);
while ($rowFacDet=mysqli_fetch_array($prodDet)) {
	$nameprodc=$rowFacDet[0];
	$queryProduct=" SELECT * FROM product where name='".$nameprodc."'";
	$rstproducto=mysqli_query($mysqli,$queryProduct);
	$rowrstproducto=mysqli_fetch_array($rstproducto);
	$idcupon=$rowrstproducto[6];	
	$strdatosProducto.='<tr>
		<td width="auto" nowrap>'.$rowrstproducto[1].'</td>
		<td width="auto" nowrap>'.$rowrstproducto[4].'</td>
		<td width="auto" nowrap>€'.($rowrstproducto[4]*$rowrstproducto[2]).'</td>		
	</tr>';	

	if($idcupon>0){
		$strSelectcupon=' SELECT * FROM coupon WHERE coupon_id='.$idcupon;
		$rstcupon=mysqli_query($mysqli,$strSelectcupon);
		$rowrstcupon=mysqli_fetch_array($rstcupon);
		$claveCoupon=$rowrstcupon[1];
		$porcCoupon=(($rowrstcupon[2])/100);
		$importeCoupon+=($porcCoupon*($cantidad*$rowrstproducto[2]));
		mysqli_free_result($rstcupon);
	}
	$total+=($cantidad*$rowrstproducto[2]);
}

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
 </style> ';

 $output .= '<br>
 <div class="table-responsive">
	 <table class="table table-striped table-bordered">
		 <tr>
			 <th>Name</th>
			 <th>Surname</th>
			 <th>Receipt number</th>
			 <th>Date</th>
		  </tr>
		 <tr>
			 <td width="auto" >'.$nombre.'</td>
			 <td width="auto" >'.$apellido.'</td>
			 <td width="auto" >'.$idFactura.'</td>
			 <td width="auto" >'.$fechaCompra.'</td>
		 </tr>
	 </table>
	 
 </div>';

 $output .= '<div class="table-responsive">
 <table class="table table-striped table-bordered">
	<tr> 
		 <th width="404" nowrap> description</th>
						<th>Quantity</th>  
		<th>Amount</th>
	 </tr>'. $strdatosProducto;
	
if($idCupon != '-1')
{
	$output.='
	<tr>
		<td width="" nowrap colspan="2">Discount Coupon Applied: #'.$claveCoupon.' ('.$importeCoupon.'% OFF)</td>
		<td width="" nowrap>-€ '.$porcCoupon.'</td>
	 </tr>';
}


$output.=' 
			
</table>

<div class="table-responsive">
<table class="table table-striped table-bordered" >
	<tr>
		<th width="470" nowrap>Total</th>
		<th>&#8364;'.($total-$importeCoupon).'</th>
		 
	</tr>
	</table><br>
			   
		<h4>Useful information:</h4>
		<h5>You can modify the date and/or time of your trip for free informing us at least ONE WEEK before by e-mail or phone. </h5>

		<h4>Conditions:</h4>
		<h5>Please present a valid ID to the driver. It is not necesary to print this document.</h5>
</div>';

require('../pdf/pdf.php');
	//$num_factura=rand(1,50);
	//$file_name = md5(rand()) . '.pdf';
	$file_name="factura_producto_".$nombre.$fechaCompra.$idFactura.".pdf";
	$ruta="../facturas/pdf/";
	$html_code = '<link rel="stylesheet" href="css/bootstrap.min.css">';
	$html_code .= $output;
	$pdf = new Pdf();
	$pdf->load_html($html_code);
	$pdf->render();
	$file = $pdf->output();
	file_put_contents($ruta.$file_name, $file);


 require('../../sendemail.php');

 enviarcorreo($file_name,"Se envia lla factura","Gracias por su compra","coreo desde","correo hasta");	

header("Location:../success_payment.php?pedido=".($row_ultimo['ultimo']));




?>