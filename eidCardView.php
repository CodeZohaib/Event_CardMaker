<?php 
include "files/allFunction.php";

if(isset($_GET['eidCardID']) AND !empty($_GET['eidCardID']) AND is_numeric($_GET['eidCardID']))
{
    $run=$con->prepare("SELECT * FROM `eid` WHERE id=?");
    $run->bindParam(1,$_GET['eidCardID'],PDO::PARAM_INT);

     if($run->execute())
     {
       if($run->rowCount()>0)
       {
         $eidData=$run->fetch(PDO::FETCH_ASSOC);

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

  <!-- Template Main CSS File -->
  <link href="files/asset/css/style.css" rel="stylesheet">
      <style>
       .card {
            width: 300px;
            margin: 0 auto;
            margin-top: 50px;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
        }

        .card-header {
            text-align: center;
            background-color: #f8f9fa;
        }

        .card-body {
            text-align: center;
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

             <input type="text" name="eidCardEdit" hidden value="<?php echo $eidData['id']; ?>">
            <div class="row ">
              <div class="col-md-12 printable-content">
               <div class="card" style="color: <?php echo $eidData['font_color']; ?> !important;
                         font-family: <?php echo $eidData['font_style']; ?> !important;
                         font-size: <?php echo $eidData['font_size']; ?>;
                         background-image: url('files/upload/eidCardBgImages/<?php echo $eidData['background_img']; ?>'); background-size:cover;">
                    <div class="card-header" id="title" style=" background-color:<?php if(!empty($eidData['title_bg_color'])){ echo $eidData['title_bg_color']; } ?>">

                        <h4><?php echo htmlspecialchars($eidData['title']); ?></h4>
                    </div>
                    <div class="card-body">

                      <?php 
                        if(!empty($eidData['add_img']))
                          { 
                            echo '<img src="files/upload/eidCardAddImages/'.$eidData['add_img'].'" id="uploadImage" alt="Eid Image" width="200"><br><br>';
                          }
                          else
                          {
                            echo "<br><br><br><br><br><br>";
                          }
                          
                        ?>

                        
                        <p class="message"><?php echo htmlspecialchars($eidData['message']); ?></p><br>

                        
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
        $('.subtitle,.message').css('font-size', selectedFontSize);
      });


      // Update card details
      $('#titleInput').keyup(function() {
        var title = $(this).val();
        $('#title').html("<h4>"+title+"</h4>");
      });

      $('#namesInput').keyup(function() {
        var names = $(this).val();
        $('#names').text(names);
      });


      $('#messageInput').keyup(function() {
        var message = $(this).val();
        $('.message').text(message);
      });
</script>
</body>

</html>

