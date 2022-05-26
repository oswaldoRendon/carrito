<?php include "dash/conexion.php";?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>TRAVEL N CHANGE</title>
    <?php include "head-meta.php";?>
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script src="js/cart.js"></script>
  </head>
   <!-- Body-->
   <body class="handheld-toolbar-enabled">
    <main class="page-wrapper">
      <!-- Navbar 3 Level (Light)-->
      <header class="navbar navbar-sticky navbar-expand-lg navbar-light bg-light">
        <!-- Topbar-->
      <?php include "navbar.php";?>
      </header>
      <div class="page-title-overlap bg-dark pt-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
          <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
              <li class="breadcrumb-item"><a class="text-nowrap" href="index.html"><i class="ci-home"></i>Home</a></li>
              <li class="breadcrumb-item text-nowrap"><a href="shop-grid-ls.html">Shop</a>  </li>
              <li class="breadcrumb-item text-nowrap active" aria-current="page">Checkout</li>
            </ol>  
            </nav>  
          </div>  
          <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
            <h1 class="h3 text-light mb-0">Checkout</h1>
          </div>
        </div>  
      </div>   
      <!-- linea de seguimiento -->
      <div class="container pb-5 mb-2 mb-md-4">
        <div class="row">
          <section class="col-lg-8">
            <!-- Steps-->
            <div class="steps steps-light pt-2 pb-3 mb-5"><a class="step-item active" href="shop-cart.html">
                <div class="step-progress"><span class="step-count">1</span></div>
                <div class="step-label"><i class="ci-cart"></i>Cart</div></a><a class="step-item active current" href="checkout-details.html">
                <div class="step-progress"><span class="step-count">2</span></div>
                <div class="step-label"><i class="ci-user-circle"></i>Details</div></a><a class="step-item" href="checkout-shipping.html">
                <div class="step-progress"><span class="step-count">3</span></div>
                <div class="step-label"><i class="ci-package"></i>Shipping</div></a><a class="step-item" href="checkout-payment.html">
                <div class="step-progress"><span class="step-count">4</span></div>
                <div class="step-label"><i class="ci-card"></i>Payment</div></a><a class="step-item" href="checkout-review.html">
                <div class="step-progress"><span class="step-count">5</span></div>
                <div class="step-label"><i class="ci-check-circle"></i>Review</div></a>
            </div>
             <!-- Shipping address-->
             <h2 class="h6 pt-1 pb-3 mb-3 border-bottom">DATOS PERSONALES</h2>
             <div class="row">
              <div class="col-sm-6">
                  <div class="mb-3">
                    <label class="form-label" for="checkout-fn">First Name</label>
                    <input class="form-control" type="text" id="checkout-fn">
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="mb-3">
                    <label class="form-label" for="checkout-ln">Last Name</label>
                    <input class="form-control" type="text" id="checkout-ln">
                  </div>
                </div>
             </div>  
            <div class="row">
              <div class="col-sm-6">
                <div class="mb-3">
                  <label class="form-label" for="checkout-email">E-mail Address</label>
                  <input class="form-control" type="email" id="checkout-email">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="mb-3">
                  <label class="form-label" for="checkout-phone">Phone Number</label>
                  <input class="form-control" type="text" id="checkout-phone">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6">
                <div class="mb-3">
                  <label class="form-label" for="checkout-company">Company</label>
                  <input class="form-control" type="text" id="checkout-company">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="mb-3">
                  <label class="form-label" for="checkout-country">Country</label>
                  <select class="form-select" id="checkout-country">
                    <option>Choose country</option>
                    <option>Australia</option>
                    <option>Canada</option>
                    <option>France</option>
                    <option>Germany</option>
                    <option>Switzerland</option>
                    <option>USA</option>
                  </select>
                </div>
              </div>
            </div>



          </section> 
          <aside class="col-lg-4 pt-4 pt-lg-0 ps-xl-5">
            <div class="bg-white rounded-3 shadow-lg p-4 ms-lg-auto">
              <div class="py-2 px-xl-2">
                <div class="widget mb-3">
                  <h2 class="widget-title text-center">Resumen del pedido</h2>
                  <?php 
                  $numprod=0;
                   $total=0;
                   $select_cartdet = mysqli_query($mysqli, "SELECT * FROM cart left join coupon on coupon.coupon_id=cart.id_Coupon ");
                   $contdet=1;
                   $descuento=0;                 
                   $arrayProductos=[mysqli_num_rows($select_cartdet)];
                   $idDescuento=0;
                   if(mysqli_num_rows($select_cartdet) > 0){
                     while($fetch_cartdet = mysqli_fetch_assoc($select_cartdet)){   
                       $numprod++;                     
                  ?>
                    <div id="divresumendet<?php echo $contdet; ?>" class="d-flex align-items-center pb-2 border-bottom">
                    <a id="linkresumendet<?php echo $contdet; ?>" class="d-block flex-shrink-0" href="shop-single-v1.html">
                      <img id="linkresumenimg<?php echo $contdet; ?>" src="dash/uploaded_img/<?php echo $fetch_cartdet['image']; ?>" width="64" alt="Product" />
                      <input type="hidden" name="producto_img[]" value="<?php echo $fetch_cartdet['image'];  ?>">

                    </a>
                    <div id="divresumensep<?php echo $contdet; ?>" class="ps-2">
                      <h6 id="divresumennombre<?php echo $contdet; ?>" class="widget-product-title">
                        <a id="linkresumendetlink<?php echo $contdet; ?>" href="shop-single-v1.html">
                            <?php echo $fetch_cartdet['name']; ?>
                        </a>
                      </h6>
                      
                      <input type="hidden" name="producto_name[]" value="<?php echo $fetch_cartdet['name'];  ?>">
                      <input type="hidden" name="producto_price[]" value="<?php echo $fetch_cartdet['price'];  ?>">
                      <div id="divresumenprice<?php echo $contdet; ?>" class="widget-product-meta"><span class="text-accent me-2"><?php echo $fetch_cartdet['price']; ?>  </span><span class="text-muted">x <?php echo $fetch_cartdet['quantity']; ?></span></div>
                    </div>
                  </div> 
                  <form action="stripe/create-checkout-session.php" method="POST"> 
                    <?php 
                      $idDescuento=$fetch_cartdet['id_Coupon'];
                      $total+=($fetch_cartdet['price']*$fetch_cartdet['quantity']);
                      $descuento+=($fetch_cartdet['price']*$fetch_cartdet['quantity'])-($fetch_cartdet['price']*($fetch_cartdet['discount'])/100);
                      $contdet++;
                    }
                  }  ?>
                  <ul class="list-unstyled fs-sm pb-2 border-bottom">
                    <li class="d-flex justify-content-between align-items-center">
                      <span class="me-2">Subtotal:</span><span class="text-end">€ <?php echo $total; ?></span>
                      <input id="subtotal" type="hidden" name="producto_total" value="€ <?php echo $total; ?>">
                    </li>
                    <li class="d-flex justify-content-between align-items-center">
                      <span class="me-2">Discount:</span><span class="text-end">€ <?php echo $total-$descuento; ?></span>
                      <input type="hidden" name="producto_totaldescuento" value="€ <?php echo  $total-$descuento; ?>">
                    </li>
                  </ul>  
                  <h3 class="fw-normal text-center my-4">€ <?php echo $descuento; ?></h3> 
                  <input type="hidden" id="numproducto" value="<?php echo $numprod;  ?>"> 
                  <input Type="hidden" id="idDescuento" value="<?php echo $idDescuento;  ?>" >
                  <input type="hidden" name="producto_descuento" value="€ <?php echo $descuento; ?>"> 
                  
                  <button id="btnCheckout" class="btn btn-outline-primary d-block w-100" onclick="guardarcheckout();" type="button">pagar con stripe</button>
                
                <script>
                    var guardarcheckout=function(){
                       var fnam=$('#checkout-fn').val();
                       var lnam=$('#checkout-ln').val();
                       var lemail=$('#checkout-email').val();
                       var lphone=$('#checkout-phone').val();
                       var lcompany=$('#checkout-company').val();
                       var lcountry=$('#checkout-country').val();
                       var lDescuento=$('#idDescuento').val();
                       var sbtotal=$('#subtotal').val();
                       var numProducto=$('#numproducto').val();
                       var res;
                        $.post('guardar.php', {fName: fnam, sName: lnam, tel:lphone, pais:lcountry,email:lemail,idCupon:lDescuento,total:sbtotal,totalproducto:numProducto}, function(data){
                       console.log(data);
                        });
                       
                    };
                 </script>
                </form>
                </div>  
              </div>  
            </div>  
          </aside> 
        </div>
      </div>

    </main`>  
  </body>  
</html>  

