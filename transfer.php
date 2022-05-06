<?php include "dash/conexion.php";


if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = 1;

   $select_cart = mysqli_query($mysqli, "SELECT * FROM `cart` WHERE name = '$product_name'");

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'product already added to cart';
   }else{
      $insert_product = mysqli_query($mysqli, "INSERT INTO `cart`(name, price, image, quantity) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')");
      $message[] = 'product added to cart succesfully';
   }

}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    
    <title>TRAVEL N CHANGE</title>
   
   <?php include "head-meta.php";?>
   <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
 
<script>
      $(document).ready(function(){
         

          $('#m').click(function(){
            $("#contenido1").load("m.php");
                         });
          $('#n').click(function(){
            $("#contenido1").load("n.php");
                         });
                $('#o').click(function(){
            $("#contenido1").load("o.php");
                         });
                  $('#p').click(function(){
            $("#contenido1").load("p.php");
                         });
        
                    });
    </script>
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
<br><br><br>
<div class="container pb-5 mb-2 mb-md-4">
     <div class="bg-light shadow-lg rounded-3 mb-4" style="margin-top: -35px;">
          <div class="d-flex">
            <!-- Search-->
            <div class="w-100">
              <div class="input-group ms-2 pe-sm-3">
                <input class="form-control bg-transparent rounded-0 border-0 shadow-none ps-5 py-4" type="text" placeholder="Search collection, title or user..."><i class="ci-search position-absolute top-50 start-0 translate-middle-y zindex-5 ms-3 fs-lg text-muted"></i>
              </div>
            </div>
           
            <div class="d-md-flex d-none">
              <!-- Pages-->
              <div class="border-start">
                <div class="p-4 fs-md text-nowrap">Pages 1/5</div>
              </div>
              <!-- Back-->
              <div class="border-start"><a class="btn border-0 p-4 fw-medium" href="#"><i class="ci-arrow-left"></i></a></div>
              <!-- Forward-->
              <div class="border-start"><a class="btn border-0 p-4 fw-medium" href="#"><i class="ci-arrow-right"></i></a></div>
            </div>
          </div>
        </div>
           <div class="d-flex flex-lg-row flex-column align-items-lg-center justify-content-between pt-lg-3">
          <div class="d-flex flex-wrap">
            <!-- Categories-->
            <div class="dropdown mb-lg-3 mb-2 me-lg-3 me-2">
            
              <button class="btn btn-outline-accent w-100" role="link" onclick="window.location='maleta.php'" type="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">maletas</button>
            
            </div>
            <!-- Sale Types-->
            <div class="dropdown mb-lg-3 mb-2 me-lg-3 me-2">
              <button class="btn btn-outline-accent w-100" role="link" onclick="window.location='football.php'" type="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">futball</button>
            
            </div>
            <!-- Price range-->
            <div class="dropdown mb-lg-3 mb-2 me-lg-3 me-2">
              <button class="btn btn-outline-accent w-100" role="link" onclick="window.location='intership.php'" type="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">INTERSHIP</button>
             
            </div>
            <!-- Collections-->
            <div class="dropdown mb-lg-3 mb-2 me-lg-3 me-2">
              <button class="btn btn-outline-accent w-100" role="link" onclick="window.location='transfer.php'" type="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">TRANSFERS</button>
        
            </div>
            <!-- Creators-->
            <div class="dropdown mb-lg-3 mb-2 me-lg-3 me-2">
              <button class="btn btn-outline-accent w-100" type="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">Creators</button>
              
            </div>
          </div>
          <!-- Total-->
          <div class="mb-3 fs-sm text-muted">1240 results</div>
        </div>

         <?php

if(isset($message)){
   foreach($message as $message){

   
echo'<div class="alert alert-success alert-dismissible fade show" role="alert"><span class="fw-medium">'.$message.'</span><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
      //echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>
       
        
          
       
          
     
      <!--<hr class="mt-md-2 mb-5">  hr que esta arriba del carrousel ver que pasa si se queda o se va  ------------------------------------------------ -->
      <!-- Gallery-->

    <div class="row row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1 gy-sm-4 gy-3 pt-sm-3" id="contenido1">
          <!-- Product-->
           <?php
      







      $select_products = mysqli_query($mysqli, "SELECT * FROM products WHERE n_service=2");
      if(mysqli_num_rows($select_products) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_products)){
      ?>
      <form action="" method="post">
          <div class="col mb-2">
            <article class="card h-100 border-0 shadow">
              <div class="card-img-top position-relative overflow-hidden"><a class="d-block" href="nft-single-auction-live.html"><img src="dash/uploaded_img/<?php echo $fetch_product['image']; ?>" alt="Product image"></a>
                <!-- Countdown timer-->
                <div class="badge bg-dark m-3 fs-sm position-absolute top-0 start-0 zindex-5"><i class="ci-time me-1"></i>
                  <div class="countdown d-inline" data-countdown="12/31/2022 12:00:00 PM"><span class="countdown-hours mb-0 me-0"><span class="countdown-value">0</span><span class="countdown-label fs-lg">:</span></span><span class="countdown-minutes mb-0 me-0"><span class="countdown-value">0</span><span class="countdown-label fs-lg">:</span></span><span class="countdown-seconds mb-0 me-0"><span class="countdown-value">0</span></span></div>
                </div>
                <!-- Wishlist button-->
                <button class="btn-wishlist btn-sm position-absolute top-0 end-0" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Favorites" style="margin: 12px;"><i class="ci-heart"></i></button>
              </div>
              <div class="card-body">
                <h3 class="product-title mb-2 fs-base"><a class="d-block text-truncate" href="nft-single-auction-live.html"><?php echo $fetch_product['name']; ?></a></h3>
                <div class="d-flex align-items-center flex-wrap">
                  <h4 class="mt-1 mb-0 fs-base text-darker">€ <?php echo $fetch_product['price']; ?></h4>
                </div>
              </div>
              <div class="card-footer mt-n1 py-0 border-0">
                <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
            <input type="text" name='hcategoria' value="<?php echo $fetch_product['n_service']; ?>">
                <div class="d-flex align-items-center position-relative mb-1 py-3 border-top">
                  <button type="submit" name="add_to_cart" style="width: 100%;" onclick="agregar(this,1)" class="btn-success">add to cart</button></div>
              </div>
            </article>
          </div>
          </form>
          <?php
         };
      };
      ?>
          <!-- Product-->
      
    
        
        </div>
       <hr class="mt-4 mb-3">
        <!-- Pagination-->
        <nav class="d-flex justify-content-between pt-2" aria-label="Page navigation">
          <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#"><i class="ci-arrow-left me-2"></i>Prev</a></li>
          </ul>
          <ul class="pagination">
            <li class="page-item d-sm-none"><span class="page-link page-link-static">1 / 5</span></li>
            <li class="page-item active d-none d-sm-block" aria-current="page"><span class="page-link">1<span class="visually-hidden">(current)</span></span></li>
            <li class="page-item d-none d-sm-block"><a class="page-link" href="#">2</a></li>
            <li class="page-item d-none d-sm-block"><a class="page-link" href="#">3</a></li>
            <li class="page-item d-none d-sm-block"><a class="page-link" href="#">4</a></li>
            <li class="page-item d-none d-sm-block"><a class="page-link" href="#">5</a></li>
          </ul>
          <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#" aria-label="Next">Next<i class="ci-arrow-right ms-2"></i></a></li>
          </ul>
        </nav>
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
  </body>
</html>