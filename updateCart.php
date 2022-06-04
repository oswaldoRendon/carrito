
<?php   
 	include('dash/conexion.php');
	 
	 if( $_POST['evento']=='cantidad'){
		 $cantidad=$_POST['cant_cart'];
		 $idCart=$_POST['id_cart'];
		  $sqlUpdateCart=" UPDATE cart SET quantity='".$cantidad."' WHERE id=".$idCart;		  
	
	mysqli_query($mysqli,$sqlUpdateCart) or die("Error al insertar");
 }
	 
  ?>

