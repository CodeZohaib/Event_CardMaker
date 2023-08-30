
<?php 

include "files/allFunction.php";

if(!isset($_SESSION['userLogin']) AND empty($_SESSION['userLogin'][0]) AND empty($_SESSION['userLogin'][1]))
{
    header('location:login.php');
}

$userData=getUser($_SESSION['userLogin'][0]);

$allThankYou= getAllThankYou();

//check($allThankYou);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Thank You Card</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="files/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="files/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="files/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="files/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="files/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="files/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="files/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="files/assets/images/favicon.png" />
    <link rel="stylesheet" href="files/fontawesome/css/all.min.css">
  </head><br />

     <style>
      .dropdown {
      position: relative;
      display: inline-block;
    }

    .dropdown .dropdown-menu {
      position: absolute;
      top: 100%;
      left: 0;
      min-width: 160px;
      padding: 0.5rem 0;
      margin: 0;
      font-size: 1rem;
      color: #212529;
      text-align: left;
      background-color: #fff;
      background-clip: padding-box;
      border: 1px solid rgba(0, 0, 0, 0.15);
      border-radius: 0.25rem;
      box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
      z-index: 1;
    }

    .dropdown .dropdown-item {
      display: block;
      padding: 0.5rem 1rem;
      clear: both;
      font-weight: 400;
      color: #212529;
      text-align: inherit;
      white-space: nowrap;
      background-color: transparent;
      border: 0;
      cursor: pointer;
    }

    .dropdown .dropdown-item:hover,
    .dropdown .dropdown-item:focus {
      color: #1b55e2;
      text-decoration: none;
      background-color: #f8f9fa;
    }

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
<body>
  <div class="container-scroller" style="background-color:white;">
   
   <?php include "files/navbar.php"; ?>

  <div class="container-fluid" style="background-color:white;">
    <!-- partial:partials/_navbar.php -->
    <nav class="navbar p-0 fixed-top d-flex flex-row" style="background-color:white;">
      <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
        <a class="navbar-brand brand-logo-mini" href="index.php"><img src="files/assets/images/logo-mini.svg" alt="logo" /></a>
      </div>
      <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
        
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown d-none d-lg-block">
            <a class='nav-link btn btn-success create-new-button' href='logout.php'>Logout</a>
          </li>
        </ul>
       
      </div>
    </nav>
    <!-- partial -->
    <div class="main-panel" style="background-color:white;">
    <div class="content-wrapper" style="background-color:white;">
      <div class="page-header">
        <h3 class="page-title"></h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="thankYouCardCreate.php" class="btn btn-danger">Add Thank You Card</a></li>
          </ol>
        </nav>
      </div>

      <div class="row">

        <?php 
         if(is_array($allThankYou))
         {
           foreach ($allThankYou as $key => $value) 
           {
              ?>

             <div class="col-md-6 printable-content">
                  <div class="card" style="color: <?php echo $value['font_color']; ?> !important;
                         font-family: <?php echo $value['font_style']; ?> !important;
                         font-size: <?php echo $value['font_size']; ?>;
                         background-image: url('files/upload/thankYouBgImages/<?php echo $value['background_img']; ?>'); background-size:cover;">
                  <h2 class="thank-you" id="title"><?php echo htmlspecialchars($value['title']); ?></h2>
                  <p class="message"><?php echo htmlspecialchars($value['message']); ?></p>

                  <div class="btn-group" role="group" aria-label="Button group">
                        <a href="editThankYouCard.php?editThankYouCard=<?php echo $value['id']; ?>" class="btn btn-success edit">View</a>
                        <button class="btn btn-danger deleteThankYouCard" data-toggle="modal" data-target="#deleteThankYou" thankYouCardID="<?php echo $value['id']; ?>">Delete</button>

                          <div class="dropdown">
                            <button class="btn btn-info dropdown-toggle" type="button" id="shareDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                              Share
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="shareDropdown">
                              <li><a class="dropdown-item" href="https://www.facebook.com/sharer/sharer.php?u=YOUR_URL" target="_blank"><i class="fab fa-facebook"></i> Facebook</a></li>
                              <li><a class="dropdown-item" href="https://www.instagram.com/sharer.php?u=YOUR_URL" target="_blank"><i class="fab fa-instagram"></i> Instagram</a></li>
                              <li><a class="dropdown-item" href="https://api.whatsapp.com/send?text=YOUR_MESSAGE%20YOUR_URL" target="_blank"><i class="fab fa-whatsapp"></i> WhatsApp</a></li>
                              <li><a class="dropdown-item" href="https://twitter.com/intent/tweet?url=YOUR_URL" target="_blank"><i class="fab fa-twitter"></i> Twitter</a></li>
                              <li><a class="dropdown-item" href="#" onclick="copyLink(this)" link="thankYouCardView.php?thankYouCardID=<?php echo $value['id']; ?>"><i class="far fa-copy"></i> Copy Link</a></li>
                            </ul>
                          </div>
                      </div>
              </div>
            </div>
      <?php
           }
        } 
        else
        {
          echo '<div style="margin-top:100px" class="alert alert-danger alert-dismissible fade show d-flex justify-content-center" role="alert">
            Thank You Card Not Desgin......!
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }
      ?>


      </div>
    </div>

  </div>
  <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

   <div class="modal fade" id="deleteThankYou" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content" style="background-color:white;color: black;">
              <div class="modal-header">
                  <h5 class="modal-title" id="customModalLabel">Delete Thank You Card</h5>
                  <button type="button" class="close btn btn-info" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <p>Are you sure you want to delete thank you card.?</p>
              </div>

              <div class="msgShow"></div><br>
              
              <div class="modal-footer">
                  <button type="button" class="btn btn-primary yesDeleteThankYou">Yes</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
              </div>
          </div>
      </div>
  </div>

  
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

  <script src="files/bootstrap.min.js"></script>
    <script src="files/custom.js"></script>  


</body>
</html>

