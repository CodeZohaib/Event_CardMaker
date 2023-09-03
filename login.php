

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="files/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="files/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="files/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="files/assets/images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="row w-100 m-0">
                <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
                    <div class="card col-lg-4 mx-auto">
                        <div class="card-body px-5 py-5">
                            <h3 class="card-title text-left mb-3">Login</h3>
                            <form action="files/requestPage.php" method="post" class="form">

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" style="color:white"; name="login_email" class="form-control p_input">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" style="color:white"; name="login_pass" class="form-control p_input">
                                </div>
                               
                               <div class="msgShow"></div><br>

                               
                                <div class="text-center">
                                    <input  type="submit" name="login" class="btn btn-primary btn-block enter-btn" value="login" >       
                                </div>

                               
                                <p class="terms">I do'nt Have an Account<a href="register.php"> Register</a></p>
                            </form>
                        </div>

                                            </div>
                </div>
                <!-- content-wrapper ends -->
            </div>
            <!-- row ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="files/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="files/assets/js/off-canvas.js"></script>
    <script src="files/assets/js/hoverable-collapse.js"></script>
    <script src="files/assets/js/misc.js"></script>
    <script src="files/assets/js/settings.js"></script>
    <script src="files/assets/js/todolist.js"></script>
     <script src="files/custom.js"></script>
    <!-- endinject -->
</body>

</html>