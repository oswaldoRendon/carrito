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
$claveCoupon="";
$idcupon=0;
$importeCoupon=0;
$total=0;
$strdatosProducto="";

 $sqlQuery=" SELECT *  FROM cart 
 INNER JOIN products ON products.name=cart.name
 INNER  JOIN facturas_detalle ON products.id=facturas_detalle.idproducto
 LEFT JOIN coupon ON cart.id_Coupon=coupon.coupon_id
WHERE cart.fechaCompra='".$fechaCompra."'
ORDER BY cart.fechacompra DESC LIMIT ".$totalProducto;

$prodDet=mysqli_query($mysqli,$sqlQuery);
$porcCoupon=0;
while ($rowFacDet=mysqli_fetch_assoc($prodDet)) {

	$subtotal=($rowFacDet['price']*$rowFacDet['quantity']);
	$strdatosProducto.='<tr>
		<td width="auto" nowrap>'.$rowFacDet['name'].'</td>
		<td width="auto" nowrap>'.$rowFacDet['quantity'].'</td>
		<td width="auto" nowrap>€'.($rowFacDet['price']*$rowFacDet['quantity']).'</td>		
	</tr>';	
	$strdatosServicios.='<tr>
		<td width="auto" nowrap>'.$rowFacDet[1].'</td>
		<td width="auto" nowrap>'.$rowFacDet[4].'</td>
		<td width="auto" nowrap>€'.($rowFacDet[4]*$rowFacDet[2]).'</td>		
	</tr>';	

	if($rowFacDet["coupon_id"]<>''){		
		$claveCoupon=$rowFacDet["coupon_clave"];
		$porcCoupon=($rowFacDet['discount']);
		$importeCoupon+= $rowFacDet['price']*($porcCoupon/100);	
	}
	$total+=$subtotal;
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
			 <td width="auto" >'.$idfactura.'</td>
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
		<td width="" nowrap colspan="2">Discount Coupon Applied: #'.$claveCoupon.' ('.($porcCoupon).'% OFF)</td>
		<td width="" nowrap>'.$importeCoupon.'</td>
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


 require('../sendemail.php');

 enviarcorreo($file_name,"Se envia lla factura","Gracias por su compra","","");	

  




?>