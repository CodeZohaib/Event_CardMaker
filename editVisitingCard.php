<?php 
include "files/allFunction.php";
if(!isset($_SESSION['userLogin']) AND empty($_SESSION['userLogin'][0]) AND empty($_SESSION['userLogin'][1]))
{
    header('location:login.php');
}
$userData=getUser($_SESSION['userLogin'][0]);

$visitingData=getEditVisiting($_GET['editVisitingCardID']);

if(!is_array($visitingData))
{
   header('location:visitingCard-list.php');
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
        
        <form action="files/requestPage.php" method="post" class="form">
          <div class="container">
            <center>
              <input type="submit" name="submit" value="Update Card" class="btn btn-primary" >
             <button type="button" class="btn btn-primary" id="print-button">Print</button>
              <button type="button" class="btn btn-primary" id="weddingCardCreate">Download</button>
            </center><br>

            <div class="msgShow"></div>

            <input type="text" name="visitingCardUpdate" hidden value="<?php echo  $visitingData['id']; ?>">
            <div class="row">
              <div class="col-md-6 printable-content">
                 <div class="card" style="margin-top:50px;color: <?php echo $visitingData['font_color']; ?> !important;
                         font-family: <?php echo $visitingData['font_style']; ?> !important;
                         font-size: <?php echo $visitingData['font_size']; ?>;
                         background-image: url('files/upload/visitingCardBgImages/<?php echo $visitingData['background_img']; ?>');">
                  <center><img src="files/upload/visitingCardProfile/<?php echo htmlspecialchars($visitingData['add_img']); ?>" id="uploadImage" alt="Profile Picture"></center>
                  <h4 id="name"> <?php echo htmlspecialchars($visitingData['name']); ?></h4>
                  <p id="profession"><?php echo htmlspecialchars($visitingData['profession']); ?></p>
                  <hr>
                  <p >Email: <span id="email"><?php echo htmlspecialchars($visitingData['email']); ?></span></p>
                  <?php 
                   
                     echo '<p>Website: <span id="detail">'.htmlspecialchars($visitingData['website_link']).'</span></p>';
                   
                  ?>
                  
                  <p>Phone: <span id="phone"><?php echo htmlspecialchars($visitingData['phone_no']); ?></span></p>
                  
                  <div class="contact-info">
                    <p id="address"><?php echo htmlspecialchars($visitingData['address']); ?></p>
                  </div>
                  <div class="social-icons">
                     <?php 
                      
                         echo '<a href="'.htmlspecialchars($visitingData['twitter_link']).'" id="twitter"><i class="fab fa-twitter"></i></a>';
                       

                       
                         echo '<a href="'.htmlspecialchars($visitingData['facebook_link']).'" id="facebook"><i class="fab fa-facebook"></i></a>';
                      

                        
                         echo '<a href="'.htmlspecialchars($visitingData['linkedin_link']).'" id="linkedin"><i class="fab fa-linkedin"></i></a>';
                       

                        
                         echo '<a href="'.htmlspecialchars($visitingData['github_link']).'" id="github"><i class="fab fa-github"></i></a>';
                       
                      ?>
                  </div><br>
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
                    <input type="file" name="add_image" id="addImage" class="form-control">
                  </div>

                   <div class="col-md-6">
                    <h5>Background Picture Style:</h5>
                    <input type="file" name="image" id="backgroundInput" class="form-control">
                  </div>

                  <div class="col-md-6" style="margin-top:25px">
                    <h5>Select Font Color:</h5>
                    <input type="color" name="fontColor" id="fontColorSelect" class="form-control" value="<?php echo $visitingData['font_color']; ?>">
                  </div>

                  <div class="col-md-6" style="margin-top:20px">
                    <h5>Select Font Style:</h5>
                    <?php
                    $fontOptions = [
                        ['value' => ' ', 'label' => 'Select Font'],
                        ['value' => '', 'label' => 'Serif Fonts', 'disabled' => true, 'style' => 'font-weight: bold; background-color: #EEEEEE'],
                        ['value' => 'Georgia,serif', 'label' => 'Georgia', 'style' => 'font-family: Georgia,serif'],
                        ['value' => 'Palatino Linotype,Book Antiqua,Palatino,serif', 'label' => 'Palatino Linotype', 'style' => 'font-family: Palatino Linotype,Book Antiqua,Palatino,serif'],
                        ['value' => 'Times New Roman,Times,serif', 'label' => 'Times New Roman', 'style' => 'font-family: Times New Roman,Times,serif'],
                        ['value' => '', 'label' => 'Sans-Serif Fonts', 'disabled' => true, 'style' => 'font-weight: bold; background-color: #EEEEEE'],
                        ['value' => 'Arial,Helvetica,sans-serif', 'label' => 'Arial', 'style' => 'font-family: Arial,Helvetica,sans-serif'],
                        ['value' => 'Arial Black,Gadget,sans-serif', 'label' => 'Arial Black', 'style' => 'font-family: Arial Black,Gadget,sans-serif'],
                        ['value' => 'Comic Sans MS,cursive,sans-serif', 'label' => 'Comic Sans MS', 'style' => 'font-family: Comic Sans MS,cursive,sans-serif'],
                        ['value' => 'Impact,Charcoal,sans-serif', 'label' => 'Impact', 'style' => 'font-family: Impact,Charcoal,sans-serif'],
                        ['value' => 'Lucida Sans Unicode,Lucida Grande,sans-serif', 'label' => 'Lucida Sans Unicode', 'style' => 'font-family: Lucida Sans Unicode,Lucida Grande,sans-serif'],
                        ['value' => 'Tahoma,Geneva,sans-serif', 'label' => 'Tahoma', 'style' => 'font-family: Tahoma,Geneva,sans-serif'],
                        ['value' => 'Trebuchet MS,Helvetica,sans-serif', 'label' => 'Trebuchet MS', 'style' => 'font-family: Trebuchet MS,Helvetica,sans-serif'],
                        ['value' => 'Verdana,Geneva,sans-serif', 'label' => 'Verdana', 'style' => 'font-family: Verdana,Geneva,sans-serif'],
                        ['value' => '', 'label' => 'Monospace Fonts', 'disabled' => true, 'style' => 'font-weight: bold; background-color: #EEEEEE'],
                        ['value' => 'Courier New,Courier,monospace', 'label' => 'Courier New', 'style' => 'font-family: Courier New,Courier,monospace'],
                        ['value' => 'Lucida Console,Monaco,monospace', 'label' => 'Lucida Console', 'style' => 'font-family: Lucida Console,Monaco,monospace'],
                        ['value' => 'Arial Narrow,Arial,sans-serif', 'label' => 'Arial Narrow', 'style' => 'font-family: Arial Narrow,Arial,sans-serif'],
                        ['value' => 'Calibri,Helvetica,sans-serif', 'label' => 'Calibri', 'style' => 'font-family: Calibri,Helvetica,sans-serif'],
                        ['value' => 'Garamond,serif', 'label' => 'Garamond', 'style' => 'font-family: Garamond,serif'],
                    ];
                    ?>

                    <select id="fontStyleSelect" name="fontStyle" class="form-control">
                        <?php foreach ($fontOptions as $option) : ?>
                          <?php
                            if($option['value']==$visitingData['font_style'])
                            {
                              $selected="selected";
                            }
                            else
                            {
                               $selected='';
                            }
                          ?>
                            <option <?php echo $selected; ?> value="<?php echo $option['value']; ?>" <?php echo isset($option['disabled']) ? 'disabled' : ''; ?> <?php echo isset($option['style']) ? 'style="' . $option['style'] . '"' : ''; ?>>
                                <?php echo $option['label']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                  </div>
                </div>
                <div class="row mt-4">
                  
                  <div class="col-md-6">
                    <h5>Select Font Size:</h5>
                    <?php
                      $fontSizeOptions = [
                          ['value' => '12px', 'label' => '12px'],
                          ['value' => '14px', 'label' => '14px'],
                          ['value' => '16px', 'label' => '16px'],
                      ];
                      ?>

                      <select id="fontSizeSelect" name="fontSize" class="form-control">
                          <?php foreach ($fontSizeOptions as $option) : ?>
                             <?php 
                               if($option['value']==$visitingData['font_size'])
                                {
                                  $selected="selected";
                                }
                                else
                                {
                                   $selected='';
                                }
                             ?>
                              <option <?php echo $selected; ?> value="<?php echo $option['value']; ?>"><?php echo $option['label']; ?></option>
                          <?php endforeach; ?>
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
                    <input type="text" name="name" id="namesInput" class="form-control" required value="<?php echo $visitingData['name']; ?>">
                  </div>


                  <div class="col-md-6">
                    <h5>Profession :</h5>
                    <input type="text" name="profession" id="professionInput" class="form-control" required value="<?php echo $visitingData['profession']; ?>">
                  </div>
                  
                </div>
                <div class="row mt-4">


                  <div class="col-md-6">
                    <h5>Email:</h5>
                    <input type="text"  name="email" id="emailInput" class="form-control" required value="<?php echo $visitingData['email']; ?>">
                  </div>


                  <div class="col-md-6">
                    <h5>Website:</h5>
                    <input type="text" name="website" id="detailInput" class="form-control" value="<?php echo $visitingData['website_link']; ?>">
                  </div>
                </div>

                 <div class="row mt-4">
                  <div class="col-md-6">
                    <h5>Phone:</h5>
                    <input type="text"  name="phone_number" id="phoneInput" class="form-control" required value="<?php echo $visitingData['phone_no']; ?>">
                  </div>
                  <div class="col-md-6">
                    <h5>Address:</h5>
                    <input type="text" name="address" id="addressInput" class="form-control" required value="<?php echo $visitingData['address']; ?>">
                  </div>
                </div>

                 <div class="row mt-4">
                  <div class="col-md-6">
                    <h5>Twitter Link</h5>
                    <input type="text"  name="twitter" id="twitterInput" class="form-control" value="<?php echo $visitingData['twitter_link']; ?>">
                  </div>
                  <div class="col-md-6">
                    <h5>Facebook Link</h5>
                    <input type="text" name="facebook" id="facebookInput" class="form-control" value="<?php echo $visitingData['facebook_link']; ?>">
                  </div>
                </div>

                <div class="row mt-4">
                  <div class="col-md-6">
                    <h5>Linkedin Link</h5>
                    <input type="text"  name="linkedin" id="linkedinInput" class="form-control" value="<?php echo $visitingData['linkedin_link']; ?>">
                  </div>
                  <div class="col-md-6">
                    <h5>Github Link</h5>
                    <input type="text" name="github" id="githubInput" class="form-control" value="<?php echo $visitingData['github_link']; ?>">
                  </div>
                </div>
               
                  
                </div><br><br>

                
            
              </div>
            </div>
          </div><br>
       </form>
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