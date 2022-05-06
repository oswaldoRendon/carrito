<?php
  include "dash/conexion.php";
  $query_eventos = "SELECT * FROM tbl_members";
  $eventos = mysqli_query($mysqli, $query_eventos) or die(mysqli_error($mysqli));
  $row_eventos = mysqli_fetch_assoc($eventos);
  $totalRows_eventos = mysqli_num_rows($eventos);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    
    <title>TRAVEL N CHANGE</title>
   
   <?php include "head-meta.php";?>
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

     <section style="padding-top: 7rem;">
        <div class="bg-holder" style="background-image:url(sombra.png);"></div>
        <!--/.bg-holder-->
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-5 col-lg-6 order-0 order-md-1 text-end"><img class="pt-7 pt-md-0 hero-img" src="https://technext.github.io/jadoo/v1.0.0/assets/img/hero/hero-img.png" alt="hero-header" /></div>
            <div class="col-md-7 col-lg-6 text-md-start text-center py-6">
              <h4 class="fw-bold text-danger mb-3">Best Destinations around the world</h4>
              <h1 class="hero-title">Travel, enjoy and live a new and full life</h1>
              <p class="mb-4 fw-medium">Built Wicket longer admire do barton vanity itself do in it.<br class="d-none d-xl-block" />Preferred to sportsmen it engrossed listening. Park gate<br class="d-none d-xl-block" />sell they west hard for the.</p>
              <div class="text-center text-md-start"> <a class="btn btn-primary btn-lg me-md-4 mb-3 mb-md-0 border-0 primary-btn-shadow" href="#!" role="button">Find out more</a>
                <div class="w-100 d-block d-md-none"></div><a href="#!" role="button" data-bs-toggle="modal" data-bs-target="#popupVideo"><span class="btn btn-danger round-btn-lg rounded-circle me-3 danger-btn-shadow"> <img src="https://technext.github.io/jadoo/v1.0.0/assets/img/hero/play.svg" width="15" alt="paly"/></span></a><span class="fw-medium">Play Demo</span>
                <div class="modal fade" id="popupVideo" tabindex="-1" aria-labelledby="popupVideo" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content"> <iframe class="rounded" style="width:100%;max-height:500px;" height="500px" src="https://technext.github.io/jadoo/v1.0.0/https://www.youtube.com/embed/_lhdhL4UDIo" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="allowfullscreen"></iframe></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
       
        
          
        <hr style="position: absolute; width:50%;" />
          
    
      <!-- Divider-->
      <!--<hr class="mt-md-2 mb-5">  hr que esta arriba del carrousel ver que pasa si se queda o se va  ------------------------------------------------ -->
      <!-- Gallery-->

      <section class="container mb-2 py-lg-5 py-4">
          <div class="row row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1 gy-sm-4 gy-3 pt-sm-3">
      <!-- Product-->
         <?php if ($totalRows_eventos > 0) {?>
  
                        <?php do { ?>
      <form action="" method="post">
          <div class="col mb-2">
            <article class="card h-100 border-0 shadow">
              <div class="card-img-top position-relative overflow-hidden"><a class="d-block" href="nft-single-auction-live.html"><img src="dash/img/<?php echo $row_eventos['foto']; ?>" alt="Product image"></a>
                <!-- Countdown timer-->
                <div class="badge bg-dark m-3 fs-sm position-absolute top-0 start-0 zindex-5"><i class="ci-time me-1"></i>
                  <div class="countdown d-inline" data-countdown="12/31/2022 12:00:00 PM"><span class="countdown-hours mb-0 me-0"><span class="countdown-value">0</span><span class="countdown-label fs-lg">:</span></span><span class="countdown-minutes mb-0 me-0"><span class="countdown-value">0</span><span class="countdown-label fs-lg">:</span></span><span class="countdown-seconds mb-0 me-0"><span class="countdown-value">0</span></span></div>
                </div>
                <!-- Wishlist button-->
                <button class="btn-wishlist btn-sm position-absolute top-0 end-0" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="<?php echo $row_eventos['informacion'];?>" style="margin: 12px;"><i class="ci-heart"></i></button>
              </div>
              <div class="card-body">
                <h3 class="product-title mb-2 fs-base"><a class="d-block text-truncate" href="<?php echo $row_eventos['pagina'];?>"><?php echo $row_eventos['titulo'];?></a></h3>
                
              </div>
             
            </article>
          </div>
          </form>
        <?php } while ($row_eventos = mysqli_fetch_assoc($eventos)); ?>
                    <?php } else { ?>
                        <?php  echo "0 results"; ?>
                    <?php } ?> 
                  </div>
      </section>

      
        
        
       

      


         <!-- Page Title (Light)-->
      <div class="bg-secondary py-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
          <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-start">
                <li class="breadcrumb-item"><a class="text-nowrap" href="index.html"><i class="ci-home"></i>Home</a></li>
                <li class="breadcrumb-item text-nowrap active" aria-current="page">Contacts</li>
              </ol>
            </nav>
          </div>
          <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
            <h1 class="h3 mb-0">Contacts</h1>
          </div>
        </div>
      </div>
      <!-- Contact detail cards-->
      <section class="container-fluid pt-grid-gutter">
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-grid-gutter"><a class="card h-100" href="#map" data-scroll>
              <div class="card-body text-center"><i class="ci-location h3 mt-2 mb-4 text-primary"></i>
                <h3 class="h6 mb-2">Main store address</h3>
                <p class="fs-sm text-muted">396 Lillian Blvd, Holbrook, NY 11741, USA</p>
                <div class="fs-sm text-primary">Click to see map<i class="ci-arrow-right align-middle ms-1"></i></div>
              </div></a></div>
          <div class="col-xl-3 col-sm-6 mb-grid-gutter">
            <div class="card h-100">
              <div class="card-body text-center"><i class="ci-time h3 mt-2 mb-4 text-primary"></i>
                <h3 class="h6 mb-3">Working hours</h3>
                <ul class="list-unstyled fs-sm text-muted mb-0">
                  <li>Mon - Fri: 10AM - 7PM</li>
                  <li class="mb-0">Sta: 11AM - 5PM</li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-grid-gutter">
            <div class="card h-100">
              <div class="card-body text-center"><i class="ci-phone h3 mt-2 mb-4 text-primary"></i>
                <h3 class="h6 mb-3">Phone numbers</h3>
                <ul class="list-unstyled fs-sm mb-0">
                  <li><span class="text-muted me-1">For customers:</span><a class="nav-link-style" href="tel:+108044357260">+1 (080) 44 357 260</a></li>
                  <li class="mb-0"><span class="text-muted me-1">Tech support:</span><a class="nav-link-style" href="tel:+100331697720">+1 00 33 169 7720</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-grid-gutter">
            <div class="card h-100">
              <div class="card-body text-center"><i class="ci-mail h3 mt-2 mb-4 text-primary"></i>
                <h3 class="h6 mb-3">Email addresses</h3>
                <ul class="list-unstyled fs-sm mb-0">
                  <li><span class="text-muted me-1">For customers:</span><a class="nav-link-style" href="mailto:+108044357260">customer@example.com</a></li>
                  <li class="mb-0"><span class="text-muted me-1">Tech support:</span><a class="nav-link-style" href="mailto:support@example.com">support@example.com</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Outlet stores-->
    
      <!-- Split section: Map + Contact form-->
      <div class="container-fluid px-0" id="map">
        <div class="row g-0">
          <div class="col-lg-6 iframe-full-height-wrap">
            <iframe class="iframe-full-height" width="600" height="250" src="https://cartzilla.createx.studio/https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d53357.14257194912!2d-73.07268695801845!3d40.78017062807504!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e8483b8bffed93%3A0x53467ceb834b7397!2s396+Lillian+Blvd%2C+Holbrook%2C+NY+11741%2C+USA!5e0!3m2!1sen!2sua!4v1558703206875!5m2!1sen!2sua"></iframe>
          </div>
          <div class="col-lg-6 px-4 px-xl-5 py-5 border-top">
            <h2 class="h4 mb-4">Drop us a line</h2>
            <form class="needs-validation mb-3" novalidate>
              <div class="row g-3">
                <div class="col-sm-6">
                  <label class="form-label" for="cf-name">Your name:&nbsp;<span class="text-danger">*</span></label>
                  <input class="form-control" type="text" id="cf-name" placeholder="John Doe" required>
                  <div class="invalid-feedback">Please fill in you name!</div>
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="cf-email">Email address:&nbsp;<span class="text-danger">*</span></label>
                  <input class="form-control" type="email" id="cf-email" placeholder="johndoe@email.com" required>
                  <div class="invalid-feedback">Please provide valid email address!</div>
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="cf-phone">Your phone:&nbsp;<span class="text-danger">*</span></label>
                  <input class="form-control" type="text" id="cf-phone" placeholder="+1 (212) 00 000 000" required>
                  <div class="invalid-feedback">Please provide valid phone number!</div>
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="cf-subject">Subject:</label>
                  <input class="form-control" type="text" id="cf-subject" placeholder="Provide short title of your request">
                </div>
                <div class="col-12">
                  <label class="form-label" for="cf-message">Message:&nbsp;<span class="text-danger">*</span></label>
                  <textarea class="form-control" id="cf-message" rows="6" placeholder="Please describe in detail your request" required></textarea>
                  <div class="invalid-feedback">Please write a message!</div>
                  <button class="btn btn-primary mt-4" type="submit">Send message</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>


   
      <!-- Reviews-->
      <section class="bg-secondary pt-5" style="padding-bottom: 300px;">
        <div class="container py-md-5 mb-4 pt-3 pb-4">
          <h2 class="text-center mb-4 mb-md-5 pb-2">Customer reviews</h2>
          <div class="tns-carousel mb-3">
            <div class="tns-carousel-inner" data-carousel-options="{&quot;items&quot;: 2, &quot;controls&quot;: false, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1, &quot;gutter&quot;:20}, &quot;576&quot;:{&quot;items&quot;:2, &quot;gutter&quot;:20},&quot;850&quot;:{&quot;items&quot;:3, &quot;gutter&quot;:20},&quot;1080&quot;:{&quot;items&quot;:4, &quot;gutter&quot;:25}}}">
              <blockquote class="mb-2">
                <div class="card border-0 shadow-sm"><span class="testimonial-mark"></span>
                  <div class="card-body fs-md text-muted">
                    <div class="mb-2">
                      <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>
                      </div>
                    </div>Lorem ipsum dolor sit amet, quia non consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                  </div>
                </div>
                <footer class="d-flex justify-content-center pt-4">
                  <div class="d-flex align-items-center"><img class="rounded-circle" src="https://cartzilla.createx.studio/img/testimonials/03.jpg" width="50" alt="Richard Davis">
                    <div class="ps-3">
                      <h6 class="fs-sm mb-n1">Richard Davis</h6><span class="fs-ms text-muted opacity-75">Feb 14, 2020</span>
                    </div>
                  </div>
                </footer>
              </blockquote>
              <blockquote class="mb-2">
                <div class="card border-0 shadow-sm"><span class="testimonial-mark"></span>
                  <div class="card-body fs-md text-muted">
                    <div class="mb-2">
                      <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i>
                      </div>
                    </div>Lorem ipsum dolor sit amet, quia non consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                  </div>
                </div>
                <footer class="d-flex justify-content-center pt-4">
                  <div class="d-flex align-items-center"><img class="rounded-circle" src="https://cartzilla.createx.studio/img/testimonials/04.jpg" width="50" alt="Laura Willson">
                    <div class="ps-3">
                      <h6 class="fs-sm mb-n1">Laura Willson</h6><span class="fs-ms text-muted opacity-75">Feb 05, 2020</span>
                    </div>
                  </div>
                </footer>
              </blockquote>
              <blockquote class="mb-2">
                <div class="card border-0 shadow-sm"><span class="testimonial-mark"></span>
                  <div class="card-body fs-md text-muted">
                    <div class="mb-2">
                      <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i><i class="star-rating-icon ci-star"></i>
                      </div>
                    </div>Lorem ipsum dolor sit amet, quia non consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                  </div>
                </div>
                <footer class="d-flex justify-content-center pt-4">
                  <div class="d-flex align-items-center"><img class="rounded-circle" src="https://cartzilla.createx.studio/img/testimonials/01.jpg" width="50" alt="Mary Grant">
                    <div class="ps-3">
                      <h6 class="fs-sm mb-n1">Mary Alice Grant</h6><span class="fs-ms text-muted opacity-75">Jan 27, 2020</span>
                    </div>
                  </div>
                </footer>
              </blockquote>
              <blockquote class="mb-2">
                <div class="card border-0 shadow-sm"><span class="testimonial-mark"></span>
                  <div class="card-body fs-md text-muted">
                    <div class="mb-2">
                      <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>
                      </div>
                    </div>Lorem ipsum dolor sit amet, quia non consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                  </div>
                </div>
                <footer class="d-flex justify-content-center pt-4">
                  <div class="d-flex align-items-center"><img class="rounded-circle" src="https://cartzilla.createx.studio/img/shop/reviews/01.jpg" width="50" alt="Rafael Marquez">
                    <div class="ps-3">
                      <h6 class="fs-sm mb-n1">Rafael Marquez</h6><span class="fs-ms text-muted opacity-75">Dec 19, 2020</span>
                    </div>
                  </div>
                </footer>
              </blockquote>
              <blockquote class="mb-2">
                <div class="card border-0 shadow-sm"><span class="testimonial-mark"></span>
                  <div class="card-body fs-md text-muted">
                    <div class="mb-2">
                      <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i>
                      </div>
                    </div>Lorem ipsum dolor sit amet, quia non consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                  </div>
                </div>
                <footer class="d-flex justify-content-center pt-4">
                  <div class="d-flex align-items-center"><img class="rounded-circle" src="https://cartzilla.createx.studio/img/testimonials/02.jpg" width="50" alt="Adrian Lewis">
                    <div class="ps-3">
                      <h6 class="fs-sm mb-n1">Adrian Lewis</h6><span class="fs-ms text-muted opacity-75">Dec 13, 2020</span>
                    </div>
                  </div>
                </footer>
              </blockquote>
              <blockquote class="mb-2">
                <div class="card border-0 shadow-sm"><span class="testimonial-mark"></span>
                  <div class="card-body fs-md text-muted">
                    <div class="mb-2">
                      <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i><i class="star-rating-icon ci-star"></i>
                      </div>
                    </div>Lorem ipsum dolor sit amet, quia non consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                  </div>
                </div>
                <footer class="d-flex justify-content-center pt-4">
                  <div class="d-flex align-items-center"><img class="rounded-circle" src="https://cartzilla.createx.studio/img/shop/reviews/03.jpg" width="50" alt="Daniel Adams">
                    <div class="ps-3">
                      <h6 class="fs-sm mb-n1">Daniel Adams</h6><span class="fs-ms text-muted opacity-75">Dec 04, 2020</span>
                    </div>
                  </div>
                </footer>
              </blockquote>
            </div>
          </div>
        </div>
      </section>
      <!-- Related products-->
    
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