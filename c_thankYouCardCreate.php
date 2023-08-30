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
  <link rel="stylesheet" href="files/jqueryte/jquery-te-1.4.0.css">

  <!-- Template Main CSS File -->
  <link href="files/asset/css/style.css" rel="stylesheet">
     <style>
    .card {
      max-width: 400px;
      margin: 0 auto;
      margin-top: 50px;
      padding: 20px;
      background-color: #f8f9fa;
        background-size: cover; 
      background-position: center; 
      background-repeat: no-repeat;
    }
    .thank-you {
      font-size: 24px;
      padding: 10px;
      text-align: center;
      margin-bottom: 20px;
    }
    .message {
      text-align: center;
    }
  </style>
</head>
<body>
   <?php include 'files/header.php'; ?>

  <main id="main" style="margin-top:100px">

    <!-- ======= About Section ======= -->
    
      
       <div class="container-fluid text-center">
        
          <div class="container">
            <center>
              <button type="button" class="btn btn-primary" id="c_print-button">Print</button>
            </center><br>

            <div class="msgShow"></div>

            <input type="text" name="thankYouCardCreate" hidden value="thankYouCardCreate">
            <div class="row ">
              <div class="col-md-6 printable-content">
                <div class="card draggable resizable">
                <h2 class="thank-you draggable resizable" id="title">Thank You!</h2>
                <p class="message draggable resizable">We appreciate your support.</p>
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
                    <h5>Select Font Color:</h5>
                    <input type="color" name="fontColor" id="fontColorSelect" class="form-control">
                  </div>

                  

                   <div class="col-md-6" >
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

                  <div class="col-md-12">
                    <h5>Title:</h5>
                    <input type="text" name="title" id="titleInput" class="form-control" required>
                  </div>



                   <div class="col-md-12" style="margin-top:30px">
                    <h5>Message:</h5>
                     <textarea name="message" id="messageInput" class="form-control myTextarea" rows="3" required></textarea>
                  </div>
                </div>
            </div>
          </div>
        
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
<script src="files/interactjs.js"></script>
<script src="files/jqueryte/jquery-te-1.4.0.min.js"></script>
<script src="files/custom.js"></script>
<script type="text/javascript">


 $(document).ready(function() {

       $('.myTextarea').jqte();

      $('.jqte_editor').on('keyup', function() {
        var message = $(this).html();
        updateMessage(message);
      });

      $('.jqte_toolbar').on('mouseenter', function() {
        var message = $('.jqte_editor').html();
        updateMessage(message);
      });

      $('.jqte_toolbar').on('mouseleave', function() {
        var message = $('.jqte_editor').html();
        updateMessage(message);
      });

      $('.jqte_toolbar').on('click', function() {
       var message = $('.jqte_editor').html();
        updateMessage(message);
      });


      function updateMessage(message) {
        if (message.trim() !== '') {
          $('.message').html(message);
        } else {
          // Handle empty message
          $('.message').html('We appreciate your support.');
        }
      }

    $('#backgroundInput').change(function(e) {
      var file = e.target.files[0];
      var reader = new FileReader();
      reader.onload = function(event) {
        var selectedBackground = event.target.result;
        $('.card').css({
          'background-image': 'url("' + selectedBackground + '")',
          'background-size': 'cover',
          'background-position': 'center',
          'background-repeat': 'no-repeat'
        });
      };
      reader.readAsDataURL(file);
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


      $('#messageInput').keyup(function() {
        var message = $(this).val();
        $('.message').text(message);
      });
   });
</script>
</body>

</html>

