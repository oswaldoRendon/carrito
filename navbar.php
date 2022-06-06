
      <?php
      $contnav=1;
      $selectnav=" SELECT * FROM cart  ORDER BY fechacompra desc";

      $select_cart = mysqli_query($mysqli,$selectnav);
         $grand_total = 0;
   
      $row_count = mysqli_num_rows($select_cart);
      $totaldescuentonav=0;
      ?>
 <div class="container"><img src="logo.png"><a class="navbar-brand d-none d-sm-block me-4 order-lg-1 logo" href="index.html">&nbsp;TRAVEL N CHANGE</a>

          <a class="navbar-brand d-sm-none me-2 order-lg-1" href="index.html"><img src="https://cartzilla.createx.studio/img/logo-icon.png" width="74" alt="Cartzilla"></a>
          <div class="navbar-toolbar d-flex align-items-center order-lg-3">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"><span class="navbar-toggler-icon"></span></button><!--<a class="navbar-tool ms-1 me-n1" href="#signin-modal" data-bs-toggle="modal"><span class="navbar-tool-tooltip">Account</span>
              <div class="navbar-tool-icon-box"><i class="navbar-tool-icon ci-user"></i></div></a>-->
            <div  class="navbar-tool dropdown ms-3"><a class="navbar-tool-icon-box bg-secondary dropdown-toggle" href="cart3.php"><i class="navbar-tool-icon ci-cart"></i><span class="navbar-tool-label"><?php echo $row_count; ?></span></a>
                
              <div id="divcarrito" style="width:460px; " class="dropdown-menu dropdown-menu-end py-4 px-3 ">
                <div id="global"  >
                 <?php 
                       $descuento=0;
                       $total=0;
                       $subtotal=0;
                 while($fetch_cartnav = mysqli_fetch_assoc($select_cart)){  
                  $subtotal=$fetch_cartnav['price']*$fetch_cartnav['quantity'];   
                  
                 
                   ?>
                  <form >
                 <div class="form-group row">
                 <label  class="col-sm-4 col-form-label"><?php echo $fetch_cartnav['name']; ?></label>
    <div class="col-sm-4">
    <input type="hidden" id="subtotal<?php echo $contnav; ?>" value="<?php echo $sub_total = $fetch_cartnav['price'] * $fetch_cartnav['quantity']; ?>" />
      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="€ <?php echo number_format($fetch_cartnav['price']); ?>">
    </div>
    <div class="col-sm-4">
    <input id="cantservicionav<?php echo $contnav; ?>" class="apuntadorcarronav form-control" type="number" name="update_quantity" min="1"  value="<?php echo $fetch_cartnav['quantity']; ?>" />
    </div>
                 
                </div>
                 
                <?php $contnav++; 
                 $total+=$subtotal; 
                 $cuponnav=$fetch_cartnav['id_Coupon'];
                 if($cuponnav>0){              
                    $strDescuentonav=" SELECT * FROM coupon WHERE coupon_id =".$cuponnav;                
                    $resDescuentonav=mysqli_query($mysqli,$strDescuentonav);
                    $fetch_desctnav = mysqli_fetch_assoc($resDescuentonav);
                    $totaldescuentonav+=($fetch_cartnav['price']*($fetch_desctnav['discount']/100));
                 }                              
              } ?>
                <input id="totalservicios" type="hidden" value="<?php echo $contnav; ?>" >
<?php if(!isset($row_count)){ ?>
  <img class="d-inline-block mb-2" src="descarga.png">
                  <p id="contenido" class="fs-sm text-muted mb-0">Your cart is currently empty</p>
<?php }else{  ?>
<div >Subtotal <span id="subtotalnav">€<?php echo ($total); ?></div>
<div>Descuento <span id="DescuentoNav"> €<?php echo $totaldescuentonav; ?> </span></div>
<div>Total <span id="totalNav">€ <?php echo $total-$totaldescuentonav; ?> </span></div>
<?php } ?>
                

                </div>
              </div>
            </div>
          </div>
          <div class="collapse navbar-collapse me-auto order-lg-2" id="navbarCollapse">
            <!-- Models dropdown-->
            <ul class="navbar-nav navbar-mega-nav ms-lg-4 pe-lg-2 me-lg-2 pt-3 pt-lg-0">
         
            </ul>
            <!-- Primary menu-->
            <ul class="navbar-nav">
              <li class="nav-item dropdown"><a class="nav-link" href="index4.php">HOME</a>
        
              </li>
              <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="service2.php">SERVICES</a>
                <div class="dropdown-menu p-0">
                  <div class="d-flex flex-wrap flex-sm-nowrap px-2">
                    <div class="mega-dropdown-column pt-1 pt-lg-4 pb-4 px-2 px-lg-3">
                      <div class="widget widget-links mb-4">
                        <h6 class="fs-base mb-3">Shop layouts</h6>
                        <ul class="widget-list">
                          <li class="widget-list-item"><a class="widget-list-link" href="shop-grid-ls.html">Shop Grid - Left Sidebar</a></li>
                          <li class="widget-list-item"><a class="widget-list-link" href="shop-grid-rs.html">Shop Grid - Right Sidebar</a></li>
                          <li class="widget-list-item"><a class="widget-list-link" href="shop-grid-ft.html">Shop Grid - Filters on Top</a></li>
                          <li class="widget-list-item"><a class="widget-list-link" href="shop-list-ls.html">Shop List - Left Sidebar</a></li>
                          <li class="widget-list-item"><a class="widget-list-link" href="shop-list-rs.html">Shop List - Right Sidebar</a></li>
                          <li class="widget-list-item"><a class="widget-list-link" href="shop-list-ft.html">Shop List - Filters on Top</a></li>
                        </ul>
                      </div>
                      <div class="widget widget-links mb-4">
                        <h6 class="fs-base mb-3">Marketplace</h6>
                        <ul class="widget-list">
                          <li class="widget-list-item"><a class="widget-list-link" href="marketplace-category.html">Category Page</a></li>
                          <li class="widget-list-item"><a class="widget-list-link" href="marketplace-single.html">Single Item Page</a></li>
                          <li class="widget-list-item"><a class="widget-list-link" href="marketplace-vendor.html">Vendor Page</a></li>
                          <li class="widget-list-item"><a class="widget-list-link" href="marketplace-cart.html">Cart</a></li>
                          <li class="widget-list-item"><a class="widget-list-link" href="marketplace-checkout.html">Checkout</a></li>
                        </ul>
                      </div>
                      <div class="widget widget-links">
                        <h6 class="fs-base mb-3">Grocery store</h6>
                        <ul class="widget-list">
                          <li class="widget-list-item"><a class="widget-list-link" href="grocery-catalog.html">Product Catalog</a></li>
                          <li class="widget-list-item"><a class="widget-list-link" href="grocery-single.html">Single Product Page</a></li>
                          <li class="widget-list-item"><a class="widget-list-link" href="grocery-checkout.html">Checkout</a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="mega-dropdown-column pt-1 pt-lg-4 pb-4 px-2 px-lg-3">
                      <div class="widget widget-links mb-4">
                        <h6 class="fs-base mb-3">Food Delivery</h6>
                        <ul class="widget-list">
                          <li class="widget-list-item"><a class="widget-list-link" href="food-delivery-category.html">Category Page</a></li>
                          <li class="widget-list-item"><a class="widget-list-link" href="food-delivery-single.html">Single Item (Restaurant)</a></li>
                          <li class="widget-list-item"><a class="widget-list-link" href="food-delivery-cart.html">Cart (Your Order)</a></li>
                          <li class="widget-list-item"><a class="widget-list-link" href="food-delivery-checkout.html">Checkout (Address &amp; Payment)</a></li>
                        </ul>
                      </div>
                      <div class="widget widget-links">
                        <h6 class="fs-base mb-3">NFT Marketplace<span class="badge bg-danger ms-1">NEW</span></h6>
                        <ul class="widget-list">
                          <li class="widget-list-item"><a class="widget-list-link" href="nft-catalog-v1.html">Catalog v.1</a></li>
                          <li class="widget-list-item"><a class="widget-list-link" href="nft-catalog-v2.html">Catalog v.2</a></li>
                          <li class="widget-list-item"><a class="widget-list-link" href="nft-single-auction-live.html">Single Item - Auction Live</a></li>
                          <li class="widget-list-item"><a class="widget-list-link" href="nft-single-auction-ended.html">Single Item - Auction Ended</a></li>
                          <li class="widget-list-item"><a class="widget-list-link" href="nft-single-buy.html">Single Item - Buy Now</a></li>
                          <li class="widget-list-item"><a class="widget-list-link" href="nft-vendor.html">Vendor Page</a></li>
                          <li class="widget-list-item"><a class="widget-list-link" href="nft-connect-wallet.html">Connect Wallet</a></li>
                          <li class="widget-list-item"><a class="widget-list-link" href="nft-create-item.html">Create New Item</a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="mega-dropdown-column pt-1 pt-lg-4 px-2 px-lg-3">
                      <div class="widget widget-links mb-4">
                        <h6 class="fs-base mb-3">Shop pages</h6>
                        <ul class="widget-list">
                          <li class="widget-list-item"><a class="widget-list-link" href="shop-categories.html">Shop Categories</a></li>
                          <li class="widget-list-item"><a class="widget-list-link" href="shop-single-v1.html">Product Page v.1</a></li>
                          <li class="widget-list-item"><a class="widget-list-link" href="shop-single-v2.html">Product Page v.2</a></li>
                          <li class="widget-list-item"><a class="widget-list-link" href="shop-cart.html">Cart</a></li>
                          <li class="widget-list-item"><a class="widget-list-link" href="checkout-details.html">Checkout - Details</a></li>
                          <li class="widget-list-item"><a class="widget-list-link" href="checkout-shipping.html">Checkout - Shipping</a></li>
                          <li class="widget-list-item"><a class="widget-list-link" href="checkout-payment.html">Checkout - Payment</a></li>
                          <li class="widget-list-item"><a class="widget-list-link" href="checkout-review.html">Checkout - Review</a></li>
                          <li class="widget-list-item"><a class="widget-list-link" href="checkout-complete.html">Checkout - Complete</a></li>
                          <li class="widget-list-item"><a class="widget-list-link" href="order-tracking.html">Order Tracking</a></li>
                          <li class="widget-list-item"><a class="widget-list-link" href="comparison.html">Product Comparison</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">TIPS</a>
                <ul class="dropdown-menu">
                  <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown">Shop User Account</a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="account-orders.html">Orders History</a></li>
                      <li><a class="dropdown-item" href="account-profile.html">Profile Settings</a></li>
                      <li><a class="dropdown-item" href="account-address.html">Account Addresses</a></li>
                      <li><a class="dropdown-item" href="account-payment.html">Payment Methods</a></li>
                      <li><a class="dropdown-item" href="account-wishlist.html">Wishlist</a></li>
                      <li><a class="dropdown-item" href="account-tickets.html">My Tickets</a></li>
                      <li><a class="dropdown-item" href="account-single-ticket.html">Single Ticket</a></li>
                    </ul>
                  </li>
                  <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown">Vendor Dashboard</a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="dashboard-settings.html">Settings</a></li>
                      <li><a class="dropdown-item" href="dashboard-purchases.html">Purchases</a></li>
                      <li><a class="dropdown-item" href="dashboard-favorites.html">Favorites</a></li>
                      <li><a class="dropdown-item" href="dashboard-sales.html">Sales</a></li>
                      <li><a class="dropdown-item" href="dashboard-products.html">Products</a></li>
                      <li><a class="dropdown-item" href="dashboard-add-new-product.html">Add New Product</a></li>
                      <li><a class="dropdown-item" href="dashboard-payouts.html">Payouts</a></li>
                    </ul>
                  </li>
                  <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown">NFT Marketplace<span class="badge bg-danger ms-1">NEW</span></a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="nft-account-settings.html">Profile Settings</a></li>
                      <li><a class="dropdown-item" href="nft-account-payouts.html">Wallet &amp; Payouts</a></li>
                      <li><a class="dropdown-item" href="nft-account-my-items.html">My Items</a></li>
                      <li><a class="dropdown-item" href="nft-account-my-collections.html">My Collections</a></li>
                      <li><a class="dropdown-item" href="nft-account-favorites.html">Favorites</a></li>
                      <li><a class="dropdown-item" href="nft-account-notifications.html">Notifications</a></li>
                    </ul>
                  </li>
                  <li><a class="dropdown-item" href="account-signin.html">Sign In / Sign Up</a></li>
                  <li><a class="dropdown-item" href="account-password-recovery.html">Password Recovery</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#">LANGUAGES</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="account-signin.html">Sign In / Sign Up</a></li>
                  <li><a class="dropdown-item" href="account-password-recovery.html">Password Recovery</a></li>
                  
                </ul>
              </li>
              <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">CONTACT</a>
               
              </li>
           
            </ul>
          </div>
        </div>