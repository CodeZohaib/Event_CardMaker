<?php 
include "files/allFunction.php";
if(!isset($_SESSION['userLogin']) AND empty($_SESSION['userLogin'][0]) AND empty($_SESSION['userLogin'][1]))
{
    header('location:login.php');
}

$userData=getUser($_SESSION['userLogin'][0]);

$anniversaryData=getEditAnniversary($_GET['anniversaryCardID']);

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
        <h2 class="mb-4 mt-4">Anniversary Card</h2>
        <form action="files/requestPage.php" method="post" class="form">
          <div class="container">
            <center>
              <input type="submit" name="submit" value="Update Card" class="btn btn-primary" >
              <button type="button" class="btn btn-primary" id="print-button">Print</button>
              <button type="button" class="btn btn-primary" id="anniversaryCardDownload">Download</button>
            </center><br>

            <div class="msgShow"></div>

            <input type="text" name="anniversaryCardUpdate" hidden value="<?php echo $anniversaryData['id']; ?>">
            <div class="row ">
              <div class="col-md-6 printable-content">
                <div class="card card-container" style="margin-top:100px;color: <?php echo $anniversaryData['font_color']; ?> !important;
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

              <div class="col-md-6">
                <div class="row mt-4">
                  <div class="col-md-12"><br>
                    <center><h3>Add Card Style</h3></center>
                  </div>
                </div>
                <div class="row mt-4">
                  <div class="col-md-6">
                    <h5>Title Background Color:</h5>
                    <input type="color" name="titleBgColor" id="backgroundcolortitle" class="form-control" value="<?php echo htmlspecialchars($anniversaryData['title_bg_color']); ?>" required>
                  </div>

                   <div class="col-md-6">
                    <h5>Select Font Color:</h5>
                    <input type="color" name="fontColor" id="fontColorSelect" class="form-control" value="<?php echo htmlspecialchars($anniversaryData['font_color']); ?>">
                  </div>

                  

                   <div class="col-md-6" style="margin-top:20px">
                    <h5>Background Picture Style:</h5>
                    <input type="file" name="image" id="backgroundInput" class="form-control">
                  </div>

                 
                </div>
                <div class="row mt-4" style="margin-top:20px">
                  <div class="col-md-6">
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

                    <select id="fontStyleSelect" name="fontStyle" class="form-control" value="<?php echo $anniversaryData['font_color']; ?>">
                        <?php foreach ($fontOptions as $option) : ?>
                          <?php
                            if($option['value']==$anniversaryData['font_style'])
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
                               if($option['value']==$anniversaryData['font_size'])
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
                    <h5>Title:</h5>
                    <input type="text" name="title" id="titleInput" class="form-control" required value="<?php echo htmlspecialchars($anniversaryData['title']); ?>">
                  </div>

                  <div class="col-md-6">
                    <h5>Sub Title:</h5>
                    <input type="text" name="subtitle" id="subTitleInput" class="form-control" required value="<?php echo htmlspecialchars($anniversaryData['subtitle']); ?>">
                  </div>



                  <div class="col-md-6">
                    <h5>Footer Text:</h5>
                    <input type="text" name="footerText" id="footerInput" class="form-control" required value="<?php echo htmlspecialchars($anniversaryData['footer']); ?>">
                  </div>

                  <div class="col-md-6">
                    <h5>Name :</h5>
                    <input type="text" name="name" id="nameInput" class="form-control" required value="<?php echo htmlspecialchars($anniversaryData['name']); ?>">
                  </div>



                   <div class="col-md-12" style="margin-top:30px">
                    <h5>Message:</h5>
                     <textarea name="message" id="messageInput" class="form-control" rows="3" required><?php echo htmlspecialchars($anniversaryData['message']); ?></textarea>
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
          'background-size': 'cover',
          'background-position': 'center',
          'background-repeat': 'no-repeat'
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

