<?php
$headerUrl='http://localhost/cartchop/';
require '../dash/conexion.php';
require '../vendor/autoload.php';
\Stripe\Stripe::setApiKey('sk_test_51JCfE2KMQwBDLjYkslgiFIAWuKfHH7hA8Uq4E4XKg11Xr8iBKFxn42uQpKnapTqfmdGeUWTj56Y4ti69qmW74qaN0011UNngQu');
//require '../includes/header.php';
//require '../includes/phpfunction.php';
header('Content-Type: application/json');
?>

 <div class="display-order">
      <?php
         $select_cart = mysqli_query($mysqli, "SELECT * FROM `cart`");
         $total = 0;
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = number_format($fetch_cart['price'] * $fetch_cart['quantity']);
            $grand_total = $total += $total_price;
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

foreach($select_cart as $k=>$fetch_cart){

  $items[]=[
      'price_data' => [
        'currency' => 'eur',
        'product_data' => [
          'name' => $fetch_cart['name'],
          //'images' => $fetch_cart['image'],
        ],
        'unit_amount' => $fetch_cart['price'],
      ],
      'quantity' => $fetch_cart['quantity'],
    //],
         //  'images' => $fetch_cart['image'],
    ];

}

$checkout_session = \Stripe\Checkout\Session::create([
  'payment_method_types' => [
    'card',
  ],
  'line_items' => $items,
  'mode' => 'payment',
  'success_url' => $headerUrl . 'stripe/success_payment.php',
  'cancel_url' => $headerUrl . 'cancel_payment.php',
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);