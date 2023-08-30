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
  <link rel="stylesheet" href="files/fontawesome/css/all.min.css">

  <!-- Template Main CSS File -->
  <link href="files/asset/css/style.css" rel="stylesheet">
     <style>
    .card {
      width: 300px;
      background-color: #f8f9fa;
      border-radius: 5px;
      padding: 20px;
      margin: 0 auto;
      text-align: center;
      background-size: cover; 
      background-position: center; 
      background-repeat: no-repeat;
    }
    
    .card h4 {
      margin-bottom: 10px;
    }
    
    .card p {
      margin-bottom: 5px;
    }
    
    .card img {
      width: 150px;
      height: 150px;
      border-radius: 50%;
      margin-bottom: 10px;
    }
    
    .card .contact-info {
      margin-top: 20px;
    }
    
    .card .social-icons {
      margin-top: 10px;
    }
    
    .card .social-icons a {
      margin-right: 5px;
    }
  </style>

</head>

<body><br><br><br><br>

  <?php include 'files/header.php'; ?>

  <main id="main">

    <!-- ======= About Section ======= -->
    
      
       <div class="container-fluid text-center">
          <div class="container">
            <center>
             <button type="button" class="btn btn-primary" id="c_print-button">Print</button>
            </center><br>

            <div class="msgShow"></div>

            <input type="text" name="visitingCardCreate" hidden value="visitingCardCreate">
            <div class="row">
              <div class="col-md-6 printable-content">
                 <div class="card draggable resizable" style="margin-top:50px">
                  <center><img src="files/user.png" id="uploadImage" alt="Profile Picture" class="draggable resizable"></center>
                  <h4 id="name" class="draggable resizable">John Doe</h4>
                  <p id="profession" class="draggable resizable">Web Developer</p>
                  <hr>
                  <p  class="draggable resizable">Email: <span id="email">john.doe@example.com</span></p>
                  <p class="draggable resizable">Website: <span id="detail">www.johndoe.com</span></p>
                  <p class="draggable resizable">Phone: <span id="phone">+1 123-456-7890</span></p>
                  
                  <div class="contact-info draggable resizable">
                    <p id="address">123 Main St, City, State, ZIP</p>
                  </div>
                  <div class="social-icons draggable resizable">
                    <a href="" id="twitter"><i class="fab fa-twitter"></i></a>
                    <a href="" id="facebook"><i class="fab fa-facebook"></i></a>
                    <a href="" id="linkedin"><i class="fab fa-linkedin"></i></a>
                    <a href="" id="github"><i class="fab fa-github"></i></a>
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
                    <h5>Add Image:</h5>
                    <input type="file" name="add_image" id="addImage" class="form-control" required>
                  </div>

                   <div class="col-md-6">
                    <h5>Background Picture Style:</h5>
                    <input type="file" name="image" id="backgroundInput" class="form-control" required>
                  </div>

                  <div class="col-md-6" style="margin-top:25px">
                    <h5>Select Font Color:</h5>
                    <input type="color" name="fontColor" id="fontColorSelect" class="form-control">
                  </div>

                  <div class="col-md-6" style="margin-top:25px">
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
                </div>
                <div class="row mt-4">
                  
                  <div class="col-md-6">
                    <h5>Select Font Size:</h5>
                    <select id="fontSizeSelect" name="fontSize" class="form-control">
                      <option value=" ">-- Select Font Size --</option>
                      <option value="12px">12px</option>
                      <option value="14px">14px</option>
                      <option value="16px">16px</option>
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
                    <h5>Name:</h5>
                    <input type="text" name="name" id="namesInput" class="form-control" required>
                  </div>


                  <div class="col-md-6">
                    <h5>Profession :</h5>
                    <input type="text" name="profession" id="professionInput" class="form-control" required>
                  </div>
                  
                </div>
                <div class="row mt-4">


                  <div class="col-md-6">
                    <h5>Email:</h5>
                    <input type="text"  name="email" id="emailInput" class="form-control" required>
                  </div>


                  <div class="col-md-6">
                    <h5>Website:</h5>
                    <input type="text" name="website" id="detailInput" class="form-control">
                  </div>


                  
                </div>

                 <div class="row mt-4">
                  <div class="col-md-6">
                    <h5>Phone:</h5>
                    <input type="text"  name="phone_number" id="phoneInput" class="form-control" required>
                  </div>
                  <div class="col-md-6">
                    <h5>Address:</h5>
                    <input type="text" name="address" id="addressInput" class="form-control" required>
                  </div>
                </div>

                 <div class="row mt-4">
                  <div class="col-md-6">
                    <h5>Twitter Link</h5>
                    <input type="text"  name="twitter" id="twitterInput" class="form-control">
                  </div>
                  <div class="col-md-6">
                    <h5>Facebook Link</h5>
                    <input type="text" name="facebook" id="facebookInput" class="form-control">
                  </div>
                </div>

                <div class="row mt-4">
                  <div class="col-md-6">
                    <h5>Linkedin Link</h5>
                    <input type="text"  name="linkedin" id="linkedinInput" class="form-control">
                  </div>
                  <div class="col-md-6">
                    <h5>Github Link</h5>
                    <input type="text" name="github" id="githubInput" class="form-control">
                  </div>
                </div>
               
                  
                </div><br><br>

                
            
              </div>
            </div>
          </div><br>
    
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
<script src="files/custom.js"></script>
   <script>
    $(document).ready(function() {

    $('#addImage').change(function(e) {
      var file = e.target.files[0];
      var reader = new FileReader();
      reader.onload = function(event) {
        var selectedBackground = event.target.result;
        $('#uploadImage').attr('src', selectedBackground);
      };
      reader.readAsDataURL(file);
    });

      // Change background color
      $('#backgroundcolortitle').change(function() {
        var selectedBackgroundColor = $(this).val();
        $('#title').css('background-color', selectedBackgroundColor);
      });

      // Change font color
      $('#fontColorSelect').change(function() {
        var selectedFontColor = $(this).val();
        $('.card').css('color', selectedFontColor);
      });

      // Change font style
      $('#fontStyleSelect').change(function() {
        var selectedFontStyle = $(this).val();
        $('.card').css('font-family', selectedFontStyle);
      });

      // Change font size
      $('#fontSizeSelect').change(function() {
        var selectedFontSize = $(this).val();
        $('.card').css('font-size', selectedFontSize);
      });

      // Update card details
      $('#professionInput').keyup(function() {
        var text = $(this).val();
        $('#profession').text(text);
      });

      $('#namesInput').keyup(function() {
        var names = $(this).val();
        $('#name').text(names);
      });

      $('#emailInput').keyup(function() {
        var email = $(this).val();
        $('#email').text(email);
      });

       $('#detailInput').keyup(function() {
        var text = $(this).val();
        $('#detail').text( text);
      });

        $('#phoneInput').keyup(function() {
        var text = $(this).val();
        $('#phone').text( text);
        });

        $('#addressInput').keyup(function() {
        var text = $(this).val();
        $('#address').text( text);
        });

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


        $('#twitterInput').on('keyup', function() {
            var text = $(this).val();
            $('#twitter').attr('href', text);
          });

          // Update Facebook link on keyup event
          $('#facebookInput').on('keyup', function() {
            var text = $(this).val();
            $('#facebook').attr('href', text);
          });

          // Update Linkedin link on keyup event
          $('#linkedinInput').on('keyup', function() {
            var text = $(this).val();
            $('#linkedin').attr('href', text);
          });

          // Update Github link on keyup event
          $('#githubInput').on('keyup', function() {
            var text = $(this).val();
            $('#github').attr('href', text);
          });
        });

  </script>

</body>

</html>