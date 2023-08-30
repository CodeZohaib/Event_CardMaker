<?php 
include "files/allFunction.php";

if(isset($_GET['visitingCardID']) AND !empty($_GET['visitingCardID']) AND is_numeric($_GET['visitingCardID']))
{
    $run=$con->prepare("SELECT * FROM `visitingcard` WHERE id=?");
    $run->bindParam(1,$_GET['visitingCardID'],PDO::PARAM_INT);

     if($run->execute())
     {
       if($run->rowCount()>0)
       {
         $visitingData=$run->fetch(PDO::FETCH_ASSOC);

       }
       else
       {
        header('location:index.php');
       }
     }
     else
     {
      header('location:index.php');
     }
}
else
{
  header('location:index.php');
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
           
            <div class="msgShow"></div>

            <input type="text" name="visitingCardUpdate" hidden value="<?php echo  $visitingData['id']; ?>">
            <div class="row">
              <div class="col-md-12 printable-content" style="margin-top:20px;">
                 <div class="card" style="color: <?php echo $visitingData['font_color']; ?> !important;
                         font-family: <?php echo $visitingData['font_style']; ?> !important;
                         font-size: <?php echo $visitingData['font_size']; ?>;
                         background-image: url('files/upload/visitingCardBgImages/<?php echo $visitingData['background_img']; ?>');">
                  <center><img src="files/upload/visitingCardProfile/<?php echo htmlspecialchars($visitingData['add_img']); ?>" id="uploadImage" alt="Profile Picture"></center>
                  <h4 id="name"> <?php echo htmlspecialchars($visitingData['name']); ?></h4>
                  <p id="profession"><?php echo htmlspecialchars($visitingData['profession']); ?></p>
                  <hr>
                  <p >Email: <span id="email"><?php echo htmlspecialchars($visitingData['email']); ?></span></p>
                  <?php 
                   if(!empty($visitingData['website_link']))
                   {
                     echo '<p>Website: <span id="detail">'.htmlspecialchars($visitingData['website_link']).'</span></p>';
                   }
                  ?>
                  
                  <p>Phone: <span id="phone"><?php echo htmlspecialchars($visitingData['phone_no']); ?></span></p>
                  
                  <div class="contact-info">
                    <p id="address"><?php echo htmlspecialchars($visitingData['address']); ?></p>
                  </div>
                  <div class="social-icons">
                     <?php 
                       if(!empty($visitingData['twitter_link']))
                       {
                         echo '<a href="'.htmlspecialchars($visitingData['twitter_link']).'" id="twitter"><i class="fab fa-twitter"></i></a>';
                       }

                       if(!empty($visitingData['twitter_link']))
                       {
                         echo '<a href="'.htmlspecialchars($visitingData['facebook_link']).'" id="facebook"><i class="fab fa-facebook"></i></a>';
                       }

                        if(!empty($visitingData['linkedin_link']))
                       {
                         echo '<a href="'.htmlspecialchars($visitingData['linkedin_link']).'" id="linkedin"><i class="fab fa-linkedin"></i></a>';
                       }

                        if(!empty($visitingData['github_link']))
                       {
                         echo '<a href="'.htmlspecialchars($visitingData['github_link']).'" id="github"><i class="fab fa-github"></i></a>';
                       }
                      ?>
                  </div><br>

                   
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
          $('.card').css('background-image', 'url("' + selectedBackground + '")');
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