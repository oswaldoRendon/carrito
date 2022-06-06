<?php
$headerUrl='http://localhost/carrito/';
require '../dash/conexion.php';
require './vendor/autoload.php';

\Stripe\Stripe::setApiKey('');
//require '../includes/header.php';
//require '../includes/phpfunction.php';
header('Content-Type: application/json');
?>
<h1>hola</h1>
 <div class="display-order">
      <?php
         $fechaCompra=date('Y-m-d');
         $strsql="SELECT *  FROM cart 
         INNER JOIN products ON products.name=cart.name
         INNER  JOIN facturas_detalle ON products.id=facturas_detalle.idproducto
         LEFT JOIN coupon ON cart.id_Coupon=coupon.coupon_id    
         WHERE cart.fechaCompra='".$fechaCompra."'
         order by cart.fechacompra desc"; 

        
          $select_cart = mysqli_query($mysqli,$strsql );

        
        
         $total = 0;
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){

              


            $total_price = number_format((($fetch_cart['price'] * $fetch_cart['quantity'])*100));
           // $grand_total = $total += $total_price;
      ?>
      <span><?= $fetch_cart['name']; ?>(<?= $fetch_cart['quantity']; ?>)</span>
      <?php
         }
      }else{
         echo "<div class='display-order'><span>your cart is empty!</span></div>";
      }
      ?>
      <span class="grand-total"> grand total : $<?= $grand_total; ?>/- </span>
   </div>
   <?php
$items=[];
$itemdiscount=[];
$idcupon=0;
foreach($select_cart as $k=>$fetch_cart){
  /* sacas la clave del precio */
  $queryproduct=" SELECT price_clave FROM products WHERE name='".$fetch_cart['name']."'";  
  $rowproducto= mysqli_query($mysqli,$queryproduct );
  $fetch_product = mysqli_fetch_assoc($rowproducto);
  if($fetch_cart['id_Coupon'] !=""){
    $idcupon=$fetch_cart['id_Coupon'];
  }
  
  $items[]=[    
      'price' =>$fetch_product['price_clave'],
      'quantity' => $fetch_cart['quantity'],   
    ];   
}
/* sacas la clave del coupon */
$querycoupon=" SELECT coupon_clave FROM coupon WHERE coupon_id=".$idcupon;
$rowcoupon= mysqli_query($mysqli,$queryproduct );
$fetch_coupon = mysqli_fetch_assoc($rowproducto);


$checkout_session = \Stripe\Checkout\Session::create([
  'payment_method_types' => [
    'card',
  ],
  'line_items' => $items,
  'mode' => 'payment',  
  'discounts' => [[
    'coupon' => 'G3NoPR7U',
  ]], 
  'success_url' => $headerUrl . 'stripe/success_payment.php',
  'cancel_url' => $headerUrl . 'cancel_payment.php',
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);