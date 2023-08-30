<?php 
include "files/allFunction.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Online Card Maker</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="./files/assets/img/DESIGNER'S.png" rel="icon">
  <link href="./files/assets/img/DESIGNER_S__1_-removebg-preview.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="files/asset/vendor/aos/aos.css" rel="stylesheet">
  <link href="files/asset/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="files/asset/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="files/asset/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="files/asset/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="files/asset/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="files/asset/css/style.css" rel="stylesheet">

  <style>
    .p-tag {
      font-family: 'Arial', sans-serif;
      font-size: 18px;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

  </style>

</head>

<body>

  <?php include "files/header.php" ?>


      <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#carouselExample" data-bs-slide-to="1"></li>
        <li data-bs-target="#carouselExample" data-bs-slide-to="2"></li>
        <li data-bs-target="#carouselExample" data-bs-slide-to="3"></li>
        <li data-bs-target="#carouselExample" data-bs-slide-to="4"></li>
      </ol>

      <!-- Slides -->
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="./files/asset/img/abc.jpg" class="d-block w-100" alt="Image 1" width="500" height="600">
          <div class="carousel-caption">
            <a href="weddingCard.php" style="color:white;"> 
              <h5>Wedding </h5>
            <p>Wedding Card Create</p></a>
            <p class="p-tag">Next gen designer is a platform which provides you a variety of Cards which can be useful for every event</p>
          </div>
        </div>
        <div class="carousel-item">
          <img  src="./files/asset/img/himal-rana-wjilUku6cMU-unsplash.jpg" class="d-block w-100" alt="Image 2"  height="600">
          <div class="carousel-caption">
           <a href="eidCardCreate.php" style="color:white;"><h5>Eid</h5>
            <p>Eid Card Create</p></a>
            <p class="p-tag">Next gen designer is a platform which provides you a variety of Cards which can be useful for every event</p>
          </div>
        </div>
        <div class="carousel-item">
          <img  src="./files/asset/img/adele-morris-mDiFpFl_jTs-unsplash.jpg " alt="Image 3" style="width: 100%;" height="600">
          <div class="carousel-caption">
            <a href="happayBirthday.php" style="color:white;"> 
              <h5>Birthday</h5>
            <p>Birthday Card Create</p></a>
            <p class="p-tag">Next gen designer is a platform which provides you a variety of Cards which can be useful for every event</p>
          </div>
        </div>

        <div class="carousel-item">
          <img  src="./files/asset/img/fadi-xd-I4dR572y7l0-unsplash.jpg " alt="Image 4" style="width: 100%;" height="600">
          <div class="carousel-caption">
            <a href="anniversaryCardCreate.php" style="color:white;"> <h5>Aniversary</h5>
            <p>Aniversary Card Create</p></a>
            <p class="p-tag">Next gen designer is a platform which provides you a variety of Cards which can be useful for every event</p>
          </div>
        </div>

        <div class="carousel-item">
          <img src="./files/asset/img/jon-tyson-vD6UFu8QYUI-unsplash.jpg" alt="Image 4" style="width: 100%;" height="600">
          <div class="carousel-caption">
            <a href="thankYouCardCreate.php" style="color:white;"> 
              <h5>Thank You</h5>
            <p>Thank You Card Create</p></a>
            <p class="p-tag">Next gen designer is a platform which provides you a variety of Cards which can be useful for every event</p>
          </div>
        </div>

      </div>

      <!-- Navigation -->
      <a class="carousel-control-prev" href="#carouselExample" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExample" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </a>
    </div>


  <main id="main">

    <!-- ======= About Section ======= -->
    
      
       <div class="container-fluid text-center">
        <h2 class="mb-4 mt-4"> Make a Card</h2>
        <div class="row mt-4 mb-4 p-4 text-center">

          <div class="col-md-4">
            <div class="card">
              <img
                src="./files/asset/img/abc.jpg"
                class="card-img-top"
                alt="hollywood sign" height="255">
              <div class="card-body">
                <a href="weddingCard.php" class="btn btn-light stretched-link">Wedding</a>
              </div>
            </div>
          </div>

        <div class="col-md-4">
            <div class="card">
              <img
                src="./files/asset/img/himal-rana-wjilUku6cMU-unsplash.jpg"
                class="card-img-top"
                alt="hollywood sign"
              />
              <div class="card-body">
                
                
                <a href="eidCardCreate.php" class="btn btn-light stretched-link">Eid</a>
              </div>
            </div>
          </div>


          <div class="col-md-4 mt-2">
            <div class="card">
              <img
                src="./files/asset/img/adele-morris-mDiFpFl_jTs-unsplash.jpg "
                class="card-img-top"
                alt="hollywood sign"
              />
              <div class="card-body">
              <a href="happayBirthday.php" class="btn btn-light stretched-link">Birthday</a>
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-4 mb-4 p-4">

       <div class="col-md-4">
            <div class="card">
              <img
                src="./files/asset/img/fadi-xd-I4dR572y7l0-unsplash.jpg "
                class="card-img-top"
                alt="hollywood sign"
              />
              <div class="card-body">
                <a href="anniversaryCardCreate.php" class="btn btn-light stretched-link">Aniversary</a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <img
                src="./files/asset/img/jon-tyson-vD6UFu8QYUI-unsplash.jpg"
                class="card-img-top"
                alt="hollywood sign"
              />
              <div class="card-body"><br>
                
                
                <a href="thankYouCardCreate.php" class="btn btn-light stretched-link">Thank you</a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <img
                src="./files/asset/img/jeremy-wong-weddings-K8KiCHh4WU4-unsplash.jpg"
                class="card-img-top"
                alt="hollywood sign" height="280"
              />
              <div class="card-body">
                
                
                <a href="visitingCardCreate.php" class="btn btn-light stretched-link">Visiting Card</a>
              </div>
            </div>
          </div>
          
        </div>
       
        </div>
       </div>

        <!-- End Pricing Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="container">

      <div class="copyright-wrap d-md-flex py-4">
        <div class="me-md-auto text-center text-md-start">
          <div class="copyright">
            &copy; Copyright <strong><span>Huzaifa Bin Afzal</span></strong>. All Rights Reserved
          </div>
          <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/techie-free-skin-bootstrap-3/ -->
            Designed by <a href="https://bootstrapmade.com/">Huzaifa Bin Afzal</a>
          </div>
        </div>
        <div class="social-links text-center text-md-right pt-3 pt-md-0">
          <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
          <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
          <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
          <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
      </div>

    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
   <script src="files/jquery-3.6.0.min.js"></script>
  <script src="files/asset/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="files/asset/vendor/aos/aos.js"></script>
  <script src="files/asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="files/asset/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="files/asset/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="files/asset/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="files/asset/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="files/asset/js/main.js"></script>

  <script src="files/custom.js"></script>

</body>

</html>