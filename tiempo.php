<?php include "dash/conexion.php";?>
<!DOCTYPE html>
<html lang="en">
   <head>
    
    <title>TRAVEL N CHANGE</title>
   
   <?php include "head-meta.php";?>
   <script src="https://code.jquery.com/jquery-3.2.1.js"></script>

  </head>
  <!-- Body-->
  <body class="handheld-toolbar-enabled">
    <!-- Google Tag Manager (noscript)-->
    
    <!-- Sign in / sign up modal-->
 
    <main class="page-wrapper">
      <!-- Navbar 3 Level (Light)-->
      <header class="navbar navbar-sticky navbar-expand-lg navbar-light bg-light">
        <!-- Topbar-->
      <?php include "navbar.php";?>
      </header>
      <!-- Page Title-->
      <div class="page-title-overlap bg-dark pt-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
          <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                <li class="breadcrumb-item"><a class="text-nowrap" href="index.html"><i class="ci-home"></i>Home</a></li>
                <li class="breadcrumb-item text-nowrap"><a href="shop-grid-ls.html">Shop</a>
                </li>
                <li class="breadcrumb-item text-nowrap active" aria-current="page">Checkout</li>
              </ol>
            </nav>
          </div>
          <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
            <h1 class="h3 text-light mb-0">Checkout</h1>
          </div>
        </div>
      </div>
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
                <div class="step-label"><i class="ci-check-circle"></i>Review</div></a></div>
            <!-- Autor info-->
          
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
          
          <?php 
         
         $select_cart = mysqli_query($mysqli, "SELECT * FROM `cart`");
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
         ?>
        

<?php 

foreach ($select_cart as $fetch_cart) {
    



 if ($fetch_cart['n_service'] == "3") {
 echo "<h2 class='h6 pt-1 pb-3 mb-3 border-bottom'>MALETA</h2>
            <div class='row'>
              <div class='col-sm-6'>
                <div class='mb-3'>
                  <label class='form-label' for='checkout-fn'>First Name</label>
                  <input class='form-control' type='text' id='checkout-fn'>
                </div>
              </div>
              <div class='col-sm-6'>
                <div class='mb-3'>
                  <label class='form-label' for='checkout-ln'>Last Name</label>
                  <input class='form-control' type='text' id='checkout-ln'>
                </div>
              </div>
            </div>";
}
if ($fetch_cart['n_service'] == "2") {
 echo "<h2 class='h6 pt-1 pb-3 mb-3 border-bottom'>FOOTBALL</h2>
            <div class='row'>
              <div class='col-sm-6'>
                <div class='mb-3'>
                  <label class='form-label' for='checkout-fn'>First Name</label>
                  <input class='form-control' type='text' id='checkout-fn'>
                </div>
              </div>
              <div class='col-sm-6'>
                <div class='mb-3'>
                  <label class='form-label' for='checkout-ln'>Last Name</label>
                  <input class='form-control' type='text' id='checkout-ln'>
                </div>
              </div>
            </div>";
}
if ($fetch_cart['n_service'] == "1") {
 echo "<h2 class='h6 pt-1 pb-3 mb-3 border-bottom'>INTERSHIP</h2>
            <div class='row'>
              <div class='col-sm-6'>
                <div class='mb-3'>
                  <label class='form-label' for='checkout-fn'>First Name</label>
                  <input class='form-control' type='text' id='checkout-fn'>
                </div>
              </div>
              <div class='col-sm-6'>
                <div class='mb-3'>
                  <label class='form-label' for='checkout-ln'>Last Name</label>
                  <input class='form-control' type='text' id='checkout-ln'>
                </div>
              </div>
            </div>";
}
if ($fetch_cart['n_service'] == "4") {
 echo "<h2 class='h6 pt-1 pb-3 mb-3 border-bottom'>TRANSFER</h2>
            <div class='row'>
              <div class='col-sm-6'>
                <div class='mb-3'>
                  <label class='form-label' for='checkout-fn'>First Name</label>
                  <input class='form-control' type='text' id='checkout-fn'>
                </div>
              </div>
              <div class='col-sm-6'>
                <div class='mb-3'>
                  <label class='form-label' for='checkout-ln'>Last Name</label>
                  <input class='form-control' type='text' id='checkout-ln'>
                </div>
              </div>
            </div>";
}


 }
 ?>

            <!--<h6 class="mb-3 py-3 border-bottom">Billing address</h6>-->
           
            <!-- Navigation (desktop)-->
            <!--<div class="d-none d-lg-flex pt-4 mt-3">
              <div class="w-50 pe-3"><a class="btn btn-secondary d-block w-100" href="shop-cart.html"><i class="ci-arrow-left mt-sm-0 me-1"></i><span class="d-none d-sm-inline">Back to Cart</span><span class="d-inline d-sm-none">Back</span></a></div>
              <div class="w-50 ps-2"><a class="btn btn-primary d-block w-100" href="checkout-shipping.html"><span class="d-none d-sm-inline">Proceed to Shipping</span><span class="d-inline d-sm-none">Next</span><i class="ci-arrow-right mt-sm-0 ms-1"></i></a></div>
            </div>-->
          </section>
          <!-- Sidebar-->
          <aside class="col-lg-4 pt-4 pt-lg-0 ps-xl-5">
            <div class="bg-white rounded-3 shadow-lg p-4 ms-lg-auto">
              <div class="py-2 px-xl-2">
                <div class="widget mb-3">
                  <h2 class="widget-title text-center">Resumen del pedido</h2>
                  <div class="d-flex align-items-center pb-2 border-bottom"><a class="d-block flex-shrink-0" href="shop-single-v1.html"><img src="dash/uploaded_img/<?php echo $fetch_cart['image']; ?>" width="64" alt="Product"></a>
                    <div class="ps-2">
                      <h6 class="widget-product-title"><a href="shop-single-v1.html"><?php echo $fetch_cart['name']; ?></a></h6>
                      <div class="widget-product-meta"><span class="text-accent me-2">$150.<small>00</small></span><span class="text-muted">x 1</span></div>
                    </div>
                  </div>
                  <!--<div class="d-flex align-items-center py-2 border-bottom"><a class="d-block flex-shrink-0" href="shop-single-v1.html"><img src="https://cartzilla.createx.studio/img/shop/cart/widget/02.jpg" width="64" alt="Product"></a>
                    <div class="ps-2">
                      <h6 class="widget-product-title"><a href="shop-single-v1.html">TH Jeans City Backpack</a></h6>
                      <div class="widget-product-meta"><span class="text-accent me-2">$79.<small>50</small></span><span class="text-muted">x 1</span></div>
                    </div>
                  </div>
                  <div class="d-flex align-items-center py-2 border-bottom"><a class="d-block flex-shrink-0" href="shop-single-v1.html"><img src="https://cartzilla.createx.studio/img/shop/cart/widget/03.jpg" width="64" alt="Product"></a>
                    <div class="ps-2">
                      <h6 class="widget-product-title"><a href="shop-single-v1.html">3-Color Sun Stash Hat</a></h6>
                      <div class="widget-product-meta"><span class="text-accent me-2">$22.<small>50</small></span><span class="text-muted">x 1</span></div>
                    </div>
                  </div>
                  <div class="d-flex align-items-center py-2 border-bottom"><a class="d-block flex-shrink-0" href="shop-single-v1.html"><img src="https://cartzilla.createx.studio/img/shop/cart/widget/04.jpg" width="64" alt="Product"></a>
                    <div class="ps-2">
                      <h6 class="widget-product-title"><a href="shop-single-v1.html">Cotton Polo Regular Fit</a></h6>
                      <div class="widget-product-meta"><span class="text-accent me-2">$9.<small>00</small></span><span class="text-muted">x 1</span></div>
                    </div>
                  </div>-->
                </div>
                <ul class="list-unstyled fs-sm pb-2 border-bottom">
                  <li class="d-flex justify-content-between align-items-center"><span class="me-2">Subtotal:</span><span class="text-end">$265.<small>00</small></span></li>
                 
                  <li class="d-flex justify-content-between align-items-center"><span class="me-2">Discount:</span><span class="text-end">—</span></li>
                </ul>
                <h3 class="fw-normal text-center my-4">$274.<small>50</small></h3>
                <form class="needs-validation" method="post" novalidate>
                  <div class="mb-3">
                   
                    <div class="invalid-feedback">Please provide promo code.</div>
                  </div>
                  <button class="btn btn-outline-primary d-block w-100" onclick="window.location='stripe/create-checkout-session.php'" type="button">pagar con stripe</button>
                </form>
              </div>
            </div>
          </aside>
        </div>

            <?php
           
            };
         };
         ?>
        <!-- Navigation (mobile)-->
        <!--<div class="row d-lg-none">
          <div class="col-lg-8">
            <div class="d-flex pt-4 mt-3">
              <div class="w-50 pe-3"><a class="btn btn-secondary d-block w-100" href="shop-cart.html"><i class="ci-arrow-left mt-sm-0 me-1"></i><span class="d-none d-sm-inline">Back to Cart</span><span class="d-inline d-sm-none">Back</span></a></div>
              <div class="w-50 ps-2"><a class="btn btn-primary d-block w-100" href="checkout-shipping.html"><span class="d-none d-sm-inline">Proceed to Shipping</span><span class="d-inline d-sm-none">Next</span><i class="ci-arrow-right mt-sm-0 ms-1"></i></a></div>
            </div>
          </div>
        </div>-->
      </div>
    </main>
    <!-- Footer-->
    <?php include "footer.php";?>
    <!-- Toolbar for handheld devices (Default)-->
    <div class="handheld-toolbar">
      <div class="d-table table-layout-fixed w-100"><a class="d-table-cell handheld-toolbar-item" href="account-wishlist.html"><span class="handheld-toolbar-icon"><i class="ci-heart"></i></span><span class="handheld-toolbar-label">Wishlist</span></a><a class="d-table-cell handheld-toolbar-item" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" onclick="window.scrollTo(0, 0)"><span class="handheld-toolbar-icon"><i class="ci-menu"></i></span><span class="handheld-toolbar-label">Menu</span></a><a class="d-table-cell handheld-toolbar-item" href="shop-cart.html"><span class="handheld-toolbar-icon"><i class="ci-cart"></i><span class="badge bg-primary rounded-pill ms-1">4</span></span><span class="handheld-toolbar-label">$265.00</span></a></div>
    </div>
    <!-- Back To Top Button--><a class="btn-scroll-top" href="#top" data-scroll><span class="btn-scroll-top-tooltip text-muted fs-sm me-2">Top</span><i class="btn-scroll-top-icon ci-arrow-up">   </i></a>
    <!-- Vendor scrits: js libraries and plugins-->
  <?php include "scripts.php";?>
  </body>
</html>