<?php 
include "files/allFunction.php";

if(isset($_GET['anniversaryCardID']) AND !empty($_GET['anniversaryCardID']) AND is_numeric($_GET['anniversaryCardID']))
{
    $run=$con->prepare("SELECT * FROM `anniversary` WHERE id=?");
    $run->bindParam(1,$_GET['anniversaryCardID'],PDO::PARAM_INT);

     if($run->execute())
     {
       if($run->rowCount()>0)
       {
         $anniversaryData=$run->fetch(PDO::FETCH_ASSOC);
       }
     }
}

if(!is_array($anniversaryData))
{
   header('location:anniversary-list.php');
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
    .card-container {
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
      background-color: #f8f9fa;
      border-radius: 10px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    
    .card-title {
      text-align: center;
      font-size: 25px;
      color: #333;
      margin-bottom: 20px;
      text-transform: uppercase;
      letter-spacing: 2px;
      padding: 10px;
    }
    
    .card-subtitle {
      text-align: center;
      font-size: 24px;
      color: #666;
      margin-bottom: 30px;
    }
    
    .card-message {
      text-align: center;
      font-size: 18px;
      color: #555;
      line-height: 1.5;
    }
    
    .card-footer {
      text-align: center;
      margin-top: 40px;
      font-size: 14px;
      color: #888;
    }
    
    .heart-icon {
      display: inline-block;
      margin-top: 10px;
      margin-bottom: 10px;
      color: #ff4b4b;
      font-size: 24px;
    }
  </style>

</head>
<body>
   <?php include 'files/header.php'; ?>

  <main id="main" style="margin-top:150px; margin-bottom: 100px">

    <!-- ======= About Section ======= -->
    
      
       <div class="container-fluid text-center">
        
          <div class="container">
            <div class="msgShow"></div>
            <div class="row">
              <div class="col-md-3"></div>
             <div class="col-md-6 printable-content">
                <div class="card card-container" style="color: <?php echo $anniversaryData['font_color']; ?> !important;
                         font-family: <?php echo $anniversaryData['font_style']; ?> !important;
                         font-size: <?php echo $anniversaryData['font_size']; ?>;
                         background-image: url('files/upload/anniversaryCardBGImage/<?php echo $anniversaryData['background_img']; ?>'); background-size:cover;">
                  <h1 class="card-title" id="title" style="background-color: <?php echo $anniversaryData['title_bg_color']; ?>;<?php if(!empty($anniversaryData['font_color'])){ echo "color:".$anniversaryData['font_color']; }else{ echo "color: black"; } ?>"> Happy Anniversary!</h1>

                  <h2 class="card-subtitle" id="subtitle" style="<?php if(!empty($anniversaryData['font_color'])){ echo "color:".$anniversaryData['font_color']; }else{ echo "color: black"; } ?>"><?php echo htmlspecialchars($anniversaryData['subtitle']); ?></h2>

                  <p class="card-message message" style="<?php if(!empty($anniversaryData['font_color'])){ echo "color:".$anniversaryData['font_color']; }else{ echo "color: black"; } ?>"><?php echo htmlspecialchars($anniversaryData['message']); ?></p>
                  <div class="card-footer" style="<?php if(!empty($anniversaryData['font_color'])){ echo "color:".$anniversaryData['font_color']; }else{ echo "color: black"; } ?>">
                    <span class="heart-icon">&hearts;</span>
                    <b id="footerText"><?php echo htmlspecialchars($anniversaryData['footer']); ?></b><br>
                    <b id="name"><?php echo htmlspecialchars($anniversaryData['name']); ?></b>
                  </div>
                </div>
              </div>
          </div>
      </div>
    </main>

  <!-- ======= Footer ======= -->
  <footer id="footer" style="margin-top:10px">

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

