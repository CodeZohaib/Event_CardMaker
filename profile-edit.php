
<?php 

include "files/allFunction.php";

if(!isset($_SESSION['userLogin']) AND empty($_SESSION['userLogin'][0]) AND empty($_SESSION['userLogin'][1]))
{
    header('location:login.php');
}

$userData=getUser($_SESSION['userLogin'][0]);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Profile</title>
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
  </head><br />

      <style>
    /* Custom styles */
    body{
      color: black;
      background-color: #f8f9fa;
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

      <div class="row">

        <?php 
         if(is_array($userData))
         {
              ?>
              <div class="col-lg-3"></div>
              <div class="col-lg-7">
                 <div class="card-body px-5 py-5">
                            <center><h3 class="card-title text-left mb-3">Update Profile</h3></center>
                            <form action="files/requestPage.php" method="post" class="form">

                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" style="color:white"; name="u_name" class="form-control p_input" placeholder="Enter Full Name" value="<?php echo $userData['name']; ?>">

                                    <input type="text" name="updateProfile" value="updateProfile" hidden>
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" style="color:white"; name="u_email" class="form-control p_input"  placeholder="Enter Email Address" value="<?php echo $userData['email']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>New Password</label>
                                    <input type="password" style="color:white"; name="u_password" class="form-control p_input" placeholder="Enter Password" >
                                </div>

                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" style="color:white"; name="u_c_password" class="form-control p_input" placeholder="Enter Confirm Password">
                                </div>

                                 <div class="form-group">
                                    <label>Profie Picture</label>
                                    <input type="file" style="color:white"; name="image" class="form-control p_input" accept=".png, .jpg, .jpeg">
                                </div>
                               
                               

                                <div class="text-center">
                                    <input  type="submit" name="done" class="btn btn-primary btn-block enter-btn" value="Update" >         
                               </div><br>

                               <div class="msgShow"></div><br>
                            </form>
                        </div>
              </div>

      <?php
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

   <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="customModalLabel"
                aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content" style="background-color:white;color: black;">
              <div class="modal-header">
                  <h5 class="modal-title" id="customModalLabel">Delete Wedding Card</h5>
                  <button type="button" class="close btn btn-info" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <p>Are you sure you want to delete wedding card.?</p>
              </div>

              <div class="msgShow"></div><br>
              
              <div class="modal-footer">
                  <button type="button" class="btn btn-primary yesDeleteWedding">Yes</button>
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