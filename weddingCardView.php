<?php 
include "files/allFunction.php";

if(isset($_GET['weddingCardID']) AND !empty($_GET['weddingCardID']) AND is_numeric($_GET['weddingCardID']))
{
    $run=$con->prepare("SELECT * FROM `wedding` WHERE id=?");
    $run->bindParam(1,$_GET['weddingCardID'],PDO::PARAM_INT);

     if($run->execute())
     {
       if($run->rowCount()>0)
       {
         $weddingData=$run->fetch(PDO::FETCH_ASSOC);
       }
     }
}

if(!is_array($weddingData))
{
   header('location:index2.php');
}
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
    /* Custom styles */
       .card {
      max-width: 400px;
      margin: 0 auto;
      margin-top: 50px;
      padding: 20px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      border: 2px solid rgba(0, 0, 0, 0.1);
      border-radius: 5px;
      outline: 2px solid rgba(0, 0, 0, 0.1);
      background: white;
      color: black;
      background-size: cover; 
      background-position: center; 
      background-repeat: no-repeat;

    }
    .text-center {
      text-align: center;
    }
    .hidden {
      display: none;
    }
  </style>

</head>

<body>

  <?php include 'files/header.php'; ?>

  <main id="main" style="margin-top:100px; margin-bottom: 100px">

    <!-- ======= About Section ======= -->
    
      
       <div class="container-fluid text-center">
          <div class="container">
            <div class="msgShow"></div>
            <div class="row" >
              <div class="col-md-12 printable-content" >
                <div class="card" style="color: <?php echo $weddingData['fontColor']; ?>;
                                           font-family: <?php echo $weddingData['fontStyle']; ?>;
                                           font-size: <?php echo $weddingData['fontSize']; ?>;
                                           background-image: url(files/upload/weddingCardImages/<?php echo $weddingData['background_img']; ?>);">
                   <h2 class="text-center" id="title" style="background-color: <?php echo $weddingData['title_bg_color']; ?>;
                                                      padding: 10px;">
                          <?php echo htmlspecialchars($weddingData['title']); ?>
                      </h2>
                  <hr>
                  <h4 class="text-center" id="names"><?php echo htmlspecialchars($weddingData['name']); ?></h4>
                  <p class="text-center" id="occasion"><?php echo htmlspecialchars($weddingData['occasion']); ?></p>
                  <p class="text-center" id="date">Date: <?php echo htmlspecialchars($weddingData['date']); ?></p>
                  <p class="text-center" id="time">Time: <?php echo htmlspecialchars($weddingData['time']); ?></p>
                  <p class="text-center" id="location">Location: <?php echo htmlspecialchars($weddingData['location']); ?></p>
                  <p class="text-center" id="message"><?php echo htmlspecialchars($weddingData['message']); ?></p>
                  <p class="text-center" id="rsvp">RSVP by <?php echo htmlspecialchars($weddingData['rsvp']); ?></p>
                  <p class="text-center" id="email">Email: <?php echo htmlspecialchars($weddingData['email']); ?></p>
                </div>
              </div>
              </div>
            </div>
          </div><br>

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
  <script src="files/asset/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="files/asset/vendor/aos/aos.js"></script>
  <script src="files/asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="files/asset/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="files/asset/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="files/asset/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="files/asset/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="files/asset/js/main.js"></script>
<script src="files/jquery-3.6.0.min.js"></script>
<script src="files/custom.js"></script>

</body>

</html>