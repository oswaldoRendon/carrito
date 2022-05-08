<?php include "dash/conexion.php";


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    
    <title>TRAVEL N CHANGE</title>
   
   <?php include "head-meta.php";?>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>

  </head>
  <!-- Body-->
  <body class="handheld-toolbar-enabled">
   
    <main class="page-wrapper">
      <!-- Floating Navbar (Transparent version)-->
      <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
      <header class="navbar navbar-sticky navbar-expand-lg navbar-light bg-light">
       <?php include "navbar.php";?>
      </header>
      <!-- Hero section-->
<br>
 <div class="page-title-overlap bg-dark pt-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
          <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                <li class="breadcrumb-item"><a class="text-nowrap" href="index.html"><i class="ci-home"></i>Home</a></li>
                <li class="breadcrumb-item text-nowrap"><a href="shop-grid-ls.html">Shop</a>
                </li>
                <li class="breadcrumb-item text-nowrap active" aria-current="page">Cart</li>
              </ol>
            </nav>
          </div>
          <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
            <h1 class="h3 text-light mb-0">Your cart</h1>
          </div>
        </div>
      </div>
<div class="container pb-5 mb-2 mb-md-4">
        <div class="row">
          <!-- List of items-->
          <section class="col-lg-8">
            <div class="d-flex justify-content-between align-items-center pt-3 pb-4 pb-sm-5 mt-1">
              <h2 class="h6 text-light mb-0">Products</h2><a class="btn btn-outline-primary btn-sm ps-2" href="service2.php"><i class="ci-arrow-left me-2"></i>Continue shopping</a>
            </div>
            <!-- Item-->
               <?php 
         
         $select_cart = mysqli_query($mysqli, "SELECT * FROM `cart`");
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
         ?>
            <div class="d-sm-flex justify-content-between align-items-center my-2 pb-3 border-bottom">
              <div class="d-block d-sm-flex align-items-center text-center text-sm-start"><a class="d-inline-block flex-shrink-0 mx-auto me-sm-4" href="shop-single-v1.html"><img src="dash/uploaded_img/<?php echo $fetch_cart['image']; ?>" width="160" alt="Product"></a>
                <div class="pt-2">
                  <h3 class="product-title fs-base mb-2"><a href="shop-single-v1.html"><?php echo $fetch_cart['name']; ?></a></h3>
                 <!-- <div class="fs-sm"><span class="text-muted me-2">Size:</span>8.5</div>-->
                  <div class="fs-sm"><span class="text-muted me-2">subtotal:</span>€ <?php echo $sub_total = $fetch_cart['price'] * $fetch_cart['quantity']; ?></div>
                  <div class="fs-lg text-accent pt-2">€ <?php echo number_format($fetch_cart['price']); ?></div>
                  
                </div>
              </div>
              <div class="pt-2 pt-sm-0 ps-sm-3 mx-auto mx-sm-0 text-center text-sm-start" style="max-width: 9rem;">
                <label class="form-label" for="quantity1">Quantity</label>
                 <form action="" method="post">
                  <input type="hidden" name="update_quantity_id"  value="<?php echo $fetch_cart['id']; ?>" >
                  <button>-</button>
                  <input class="form-control" type="number" name="update_quantity" min="1"  value="<?php echo $fetch_cart['quantity']; ?>" >
                  <button>+</button>
                  <input type="submit" value="update" name="update_update_btn">
                  <?php echo $fetch_cart['n_service'];?>
               </form> 
                <a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('remove item from cart?')" class="delete-btn"> <i class="ci-close-circle me-2"></i> remove</a>
                <!--<button class="btn btn-link px-0 text-danger" type="button"><i class="ci-close-circle me-2"></i><span class="fs-sm">Remove</span></button>-->
                <!--<a href="cart.php?delete_all" onclick="return confirm('are you sure you want to delete all?');" class="delete-btn"> <i class="fas fa-trash"></i> delete all </a>-->
              </div>
            </div>


            <?php
           $grand_total += $sub_total;  
            };
         };
         ?>
         
          </section>
          <!-- Sidebar-->
          
          <aside class="col-lg-4 pt-4 pt-lg-0 ps-xl-5">
            <form action="tiempo.php" method="post">
            <div class="bg-white rounded-3 shadow-lg p-4">
              <div class="py-2 px-xl-2">
              
                <div class="text-center mb-4 pb-3 border-bottom">
                  <h2 class="h6 mb-3 pb-1">Total</h2>
                      <div class="accordion" id="order-options">
                                   <div class="accordion-collapse collapse show"  data-bs-parent="#order-options">
                      <!--<form class="accordion-body needs-validation" method="post" novalidate>-->
                        <div class="mb-3">
                          
                          <input class="" type="text" name="total" style=" border: 0;text-align: center; font-size: 1.55rem; font-weight: 400 !important; line-height: 1.2; color: #373f50;" value="€ <?php echo $grand_total; ?>" id="total">
                        </div>
                    </div>
                </div>
                  
                  <!-- <h3 class="fw-normal" id="total">€ <?php echo $grand_total; ?></h3>-->
                </div>
                
                <div class="accordion" id="order-options">
                                <div class="accordion-collapse collapse show"  data-bs-parent="#order-options">
                      <!--<form class="accordion-body needs-validation" method="post" novalidate>-->
                        <div class="mb-3">
                          <input class="form-control" type="text" placeholder="Promo code" id="coupon">
                          <input type="hidden" value="<?php echo $grand_total; ?>" id="price"/>
                          <div class="invalid-feedback">Please provide promo code.</div>
                          <div id="result"></div>
                          <p id="ejemplo"></p>
                          <p id="ejemplo1"></p>
                        </div>
                        <a class="btn btn-outline-primary d-block w-100" id="activate">Apply promo code</a>
                      <!--</form>-->
              </div>
                       </div>
<button class="btn btn-primary btn-shadow d-block w-100 mt-4" type="submit"><i class="ci-card fs-lg me-2"></i>Proceed to Checkout</button>
       
              
              </div>
            </div>
             </form>
          </aside>
         
        </div>
      </div>

    </main>
    <!-- Footer-->
   <?php include "footer.php";?>
    <!-- Toolbar for handheld devices (Single brand store)-->
    <div class="handheld-toolbar">
      <div class="d-table table-layout-fixed w-100"><a class="d-table-cell handheld-toolbar-item" href="#signin-modal" data-bs-toggle="modal"><span class="handheld-toolbar-icon"><i class="ci-user"></i></span><span class="handheld-toolbar-label">Account</span></a><a class="d-table-cell handheld-toolbar-item" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" onclick="window.scrollTo(0, 0)"><span class="handheld-toolbar-icon"><i class="ci-menu"></i></span><span class="handheld-toolbar-label">Menu</span></a><a class="d-table-cell handheld-toolbar-item" href="#"><span class="handheld-toolbar-icon"><i class="ci-cart"></i></span><span class="handheld-toolbar-label">$0.00</span></a></div>
    </div>
    <!-- Back To Top Button--><a class="btn-scroll-top" href="#top" data-scroll><span class="btn-scroll-top-tooltip text-muted fs-sm me-2">Top</span><i class="btn-scroll-top-icon ci-arrow-up">   </i></a>
    <!-- Vendor scrits: js libraries and plugins-->
    <?php include "scripts.php";?>
   
       <script>
        
  $(document).ready(function(){
    $('#activate').on('click', function(){
      var coupon = $('#coupon').val();
      var price = $('#price').val();
     
      if(coupon == ""){
         /*mensaje = "debes introducir un codigo";
         document.getElementById("ejemplo").innerHTML = mensaje;*/
     alert(" Coupon vacio!");
      }else{
       
        $.post('get_discount.php', {coupon: coupon, price: price}, function(data){
          
          if(data == "error"){



            alert("Invalid Coupon Code!");
           
            //$('#total').val(price);
           // $('#result').html('');
          }else{
            var json = JSON.parse(data);
            
            $('#result').html("<h4 class='pull-right text-danger'>"+json.discount+"% Off</h4>");
            $('#total').val(json.price);
            
          }
        });
      }
    });
  });
</script>

  </body>
</html>

