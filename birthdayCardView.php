<?php 
include "files/allFunction.php";

if(isset($_GET['birthdayCardID']) AND !empty($_GET['birthdayCardID']) AND is_numeric($_GET['birthdayCardID']))
{
    $run=$con->prepare("SELECT * FROM `birthday` WHERE id=? ORDER BY id DESC");
    $run->bindParam(1,$_GET['birthdayCardID'],PDO::PARAM_INT);

     if($run->execute())
     {
       if($run->rowCount()>0)
       {
         $birthdayData=$run->fetch(PDO::FETCH_ASSOC);
       }
     }
}

if(!is_array($birthdayData))
{
   header('location:birthday-list.php');
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
   

    
    .card {
      <?php if(!empty($birthdayData['font_color'])){ echo "color:".$birthdayData['font_color']; } ?>;
      max-width: 400px;
      margin: 50px auto;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      background-color: #fff;
      padding: 20px;

       background-size: cover; 
      background-position: center; 
      background-repeat: no-repeat;
    }
    
    .card-title {
      font-size: 24px;
      font-weight: bold;
       <?php if(!empty($birthdayData['font_color'])){ echo "color:".$birthdayData['font_color']; } else { echo "color:#333;"; } ?>;
      margin-bottom: 20px;
      text-align: center;
    }
    
    .card-subtitle {
      font-size: 18px;
      <?php if(!empty($birthdayData['font_color'])){ echo "color:".$birthdayData['font_color']; } else { echo "color:#777;"; } ?>;
      margin-bottom: 10px;
      text-align: center;
    }
    
    .card-message {
      font-size: 16px;
     <?php if(!empty($birthdayData['font_color'])){ echo "color:".$birthdayData['font_color']; } else { echo "color:#555;"; } ?>;
      margin-bottom: 30px;
      text-align: center;
    }
    
    .card-footer {
      font-size: 14px;
      <?php if(!empty($birthdayData['font_color'])){ echo "color:".$birthdayData['font_color']; } else { echo "color:#777;"; } ?>;
      text-align: center;
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
            <div class="row" >
              <div class="col-md-12 printable-content">
                   <div class="card" style="color: <?php echo $birthdayData['font_color']; ?>
                         font-family: <?php echo $birthdayData['font_style']; ?>;
                         font-size: <?php echo $birthdayData['font_size']; ?>;
                         background-image: url('files/upload/birthdayCardImages/<?php echo $birthdayData['background_img']; ?>'); background-size: cover;">
                    <div class="card-title" id="title" style="background-color: <?php echo $birthdayData['title_bg_color']; ?>; padding: 10px;">
                      <?php echo htmlspecialchars($birthdayData['title']); ?>
                    </div>
                    <div class="card-subtitle"><b>Name: </b><span id="names"><?php echo htmlspecialchars($birthdayData['name']); ?></span></div>
                    <div class="card-subtitle"><b>DOB: </b><span id="DOB"><?php echo htmlspecialchars($birthdayData['DOB']); ?></span></div>
                    <div class="card-subtitle subtitle"><?php echo htmlspecialchars($birthdayData['subtitle']); ?></div>
                    <div class="card-message message"><?php echo htmlspecialchars($birthdayData['message']); ?></div>
                    <div class="card-footer footer"><?php echo htmlspecialchars($birthdayData['footer']); ?></div>
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

