<?php 
include "files/allFunction.php";
if(!isset($_SESSION['userLogin']) AND empty($_SESSION['userLogin'][0]) AND empty($_SESSION['userLogin'][1]))
{
    header('location:login.php');
}

$userData=getUser($_SESSION['userLogin'][0]);

//check($userData);
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
    .card-container {
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
      background-color: #f8f9fa;
      border-radius: 10px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      background-size: cover; 
      background-position: center; 
      background-repeat: no-repeat;

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

  <main id="main" style="margin-top:100px">

    <!-- ======= About Section ======= -->
    
      
       <div class="container-fluid text-center">
        <form action="files/requestPage.php" method="post" class="form">
          <div class="container">
            <center>
              <input type="submit" name="submit" value="Save Card" class="btn btn-primary" >
              <button type="button" class="btn btn-primary" id="print-button">Print</button>
              <button type="button" class="btn btn-primary" id="anniversaryCardDownload2">Download</button>
            </center><br>

            <div class="msgShow"></div>

            <input type="text" name="anniversaryCardCreate" hidden value="eidCardCreate">
            <div class="row ">
              <div class="col-md-6 printable-content">
                <div class="card card-container" style="margin-top:100px;">
                  <h1 class="card-title" id="title">Happy Anniversary!</h1>
                  <h2 class="card-subtitle" id="subtitle">Celebrating Our Love</h2>
                  <p class="card-message message">"I know everyone says that they're the luckiest person in the world, but I truly am the luckiest in the world. Because I have you!</p>
                  <div class="card-footer">
                    <span class="heart-icon">&hearts;</span>
                    <b id="footerText">With love,</b><br>
                    <b id="name">Your Name</b>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="row mt-4">
                  <div class="col-md-12"><br>
                    <center><h3>Add Card Style</h3></center>
                  </div>
                </div>
                <div class="row mt-4">
                  <div class="col-md-6">
                    <h5>Title Background Color:</h5>
                    <input type="color" name="titleBgColor" id="backgroundcolortitle" class="form-control" value="empty">
                  </div>

                   <div class="col-md-6">
                    <h5>Select Font Color:</h5>
                    <input type="color" name="fontColor" id="fontColorSelect" class="form-control">
                  </div>

                  

                   <div class="col-md-6" style="margin-top:20px">
                    <h5>Background Picture Style:</h5>
                    <input type="file" name="image" id="backgroundInput" class="form-control">
                  </div>

                 
                </div>
                <div class="row mt-4" style="margin-top:20px">
                  <div class="col-md-6">
                    <h5>Select Font Style:</h5>
                   <select id="fontStyleSelect" name="fontStyle" class="form-control">
                      <option value=" ">Select Font</option>
                      <option disabled style="font-weight: bold; background-color: #EEEEEE">Serif Fonts</option>
                      <option value="Georgia,serif" style="font-family: Georgia,serif">Georgia</option>
                      <option value="Palatino Linotype,Book Antiqua,Palatino,serif" style="font-family: Palatino Linotype,Book Antiqua,Palatino,serif">Palatino Linotype</option>
                      <option value="Times New Roman,Times,serif" style="font-family: Times New Roman,Times,serif">Times New Roman</option>
                      <option disabled style="font-weight: bold; background-color: #EEEEEE">Sans-Serif Fonts</option>
                      <option value="Arial,Helvetica,sans-serif" style="font-family: Arial,Helvetica,sans-serif">Arial</option>
                      <option value="Arial Black,Gadget,sans-serif" style="font-family: Arial Black,Gadget,sans-serif">Arial Black</option>
                      <option value="Comic Sans MS,cursive,sans-serif" style="font-family: Comic Sans MS,cursive,sans-serif">Comic Sans MS</option>
                      <option value="Impact,Charcoal,sans-serif" style="font-family: Impact,Charcoal,sans-serif">Impact</option>
                      <option value="Lucida Sans Unicode,Lucida Grande,sans-serif" style="font-family: Lucida Sans Unicode,Lucida Grande,sans-serif">Lucida Sans Unicode</option>
                      <option  value="Tahoma,Geneva,sans-serif" style="font-family: Tahoma,Geneva,sans-serif">Tahoma</option>
                      <option value="Trebuchet MS,Helvetica,sans-serif" style="font-family: Trebuchet MS,Helvetica,sans-serif">Trebuchet MS</option>
                      <option value="Verdana,Geneva,sans-serif" style="font-family: Verdana,Geneva,sans-serif">Verdana</option>
                      <option disabled style="font-weight: bold; background-color: #EEEEEE">Monospace Fonts</option>
                      <option value="Courier New,Courier,monospace" style="font-family: Courier New,Courier,monospace">Courier New</option>
                      <option value="Lucida Console,Monaco,monospace" style="font-family: Lucida Console,Monaco,monospace">Lucida Console</option>
                      <!-- Additional font options -->
                      <option value="Arial Narrow,Arial,sans-serif" style="font-family: Arial Narrow,Arial,sans-serif">Arial Narrow</option>
                      <option value="Calibri,Helvetica,sans-serif" style="font-family: Calibri,Helvetica,sans-serif">Calibri</option>
                      <option value="Garamond,serif" style="font-family: Garamond,serif">Garamond</option>
                    </select>
                  </div>
                  
                  <div class="col-md-6">
                    <h5>Select Font Size:</h5>
                    <select id="fontSizeSelect" name="fontSize" class="form-control">
                      <option value=" ">-- Select Font Size --</option>
                      <option value="8px">8px</option>
                      <option value="12px">12px</option>
                      <option value="14px">14px</option>
                      <option value="16px">16px</option>
                      <option value="20px">20px</option>
                    </select>
                  </div>

                </div>

                <div class="row mt-4">
                  <div class="col-md-12"><br>
                    <center><h3>Add Card Details:</h3></center>
                  </div>
                </div>

                 <div class="row mt-4">

                  <div class="col-md-6">
                    <h5>Title:</h5>
                    <input type="text" name="title" id="titleInput" class="form-control" required>
                  </div>

                  <div class="col-md-6">
                    <h5>Sub Title:</h5>
                    <input type="text" name="subtitle" id="subTitleInput" class="form-control" required>
                  </div>



                  <div class="col-md-6">
                    <h5>Footer Text:</h5>
                    <input type="text" name="footerText" id="footerInput" class="form-control" required>
                  </div>

                  <div class="col-md-6">
                    <h5>Name :</h5>
                    <input type="text" name="name" id="nameInput" class="form-control" required>
                  </div>



                   <div class="col-md-12" style="margin-top:30px">
                    <h5>Message:</h5>
                     <textarea name="message" id="messageInput" class="form-control" rows="3" required></textarea>
                  </div>
                </div>
            </div>
          </div>
        </form>
      </div>
    </main>

  <!-- ======= Footer ======= -->
  <footer id="footer" style="margin-top:20px">

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
<script src="files/html2canvas.min.js"></script>
  <!-- Template Main JS File -->
  <script src="files/asset/js/main.js"></script>
<script src="files/jquery-3.6.0.min.js"></script>
<script src="files/custom.js"></script>
<script type="text/javascript">

  $('#backgroundInput').change(function(e) {
      var file = e.target.files[0];
      var reader = new FileReader();
      reader.onload = function(event) {
        var selectedBackground = event.target.result;
        $('.card').css({
          'background-image': 'url("' + selectedBackground + '")',
          'background-size': 'cover'
        });
      };
      reader.readAsDataURL(file);
    });


    $('#addImage').change(function(e) {
      var file = e.target.files[0];
      var reader = new FileReader();
      reader.onload = function(event) {
        var selectedBackground = event.target.result;
        $('#uploadImage').attr('src', selectedBackground);
      };
      reader.readAsDataURL(file);
    });




  $('#backgroundcolortitle').change(function() {
        var selectedBackgroundColor = $(this).val();
        $('#title').css('background-color', selectedBackgroundColor);
      });


  // Change font color
    $('#fontColorSelect').change(function() {
      var selectedFontColor = $(this).val();
      $('.printable-content .card *').each(function() {
        $(this).css('color', selectedFontColor);
      });
    });


      // Change font style
      $('#fontStyleSelect').change(function() {
        var selectedFontStyle = $(this).val();
        $('.card').css('font-family', selectedFontStyle);
      });

      // Change font size
     $('#fontSizeSelect').change(function() {
        var selectedFontSize = $(this).val();
        $('.subtitle,.message').css('font-size', selectedFontSize);
      });


      // Update card details
      $('#titleInput').keyup(function() {
        var title = $(this).val();
        $('#title').html("<h4>"+title+"</h4>");
      });

      $('#subTitleInput').keyup(function() {
        var title = $(this).val();
        $('#subtitle').html("<h4>"+title+"</h4>");
      });

      $('#nameInput').keyup(function() {
        var names = $(this).val();
        $('#name').text(names);
      });

       $('#footerInput').keyup(function() {
        var text = $(this).val();
        $('#footerText').text(text);
      });

      $('#messageInput').keyup(function() {
        var message = $(this).val();
        $('.message').text(message);
      });
</script>
</body>

</html>

