<?php 
include "files/allFunction.php";
if(!isset($_SESSION['userLogin']) AND empty($_SESSION['userLogin'][0]) AND empty($_SESSION['userLogin'][1]))
{
    header('location:login.php');
}
$userData=getUser($_SESSION['userLogin'][0]);

$weddingData=getEditWedding($_GET['weddingCardID']);

if(!is_array($weddingData))
{
   header('location:index2.php');
}

$string = $weddingData['time'];

// Get the start and end times
$start = substr($string, 0, 7);   // Extract "1:45 AM"
$end = substr($string, -7);       // Extract "2:46 AM"

// Split the time string into start and end parts
$timeParts = explode(" to ", $weddingData['time']);
$start = trim($timeParts[0]);
$end = trim($timeParts[1]);

// Convert start and end times to 24-hour format
$start_24 = date("H:i", strtotime($start));
$end_24 = date("H:i", strtotime($end));



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
    .card {
      max-width: 400px;
      margin: 0 auto;
      margin-top: 20px;
      margin-left:0px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      border: 2px solid rgba(0, 0, 0, 0.1);
      border-radius: 5px;
      outline: 2px solid rgba(0, 0, 0, 0.1);
       background-size: cover; 
       background-position: center; 
       background-repeat: no-repeat;
    }
    .text-center {
      text-align: center;
    }
    .hidden {
      display: none;
    }
  </style>

</head>

<body>

  <?php include 'files/header.php'; ?>

  <main id="main">

    <!-- ======= About Section ======= -->
    
      
       <div class="container-fluid text-center">
        <br><br> <br><br>
        <form action="files/requestPage.php" method="post" class="form">
          <div class="container">
            <center>
              <input type="submit" name="submit" value="Update Card" class="btn btn-primary" >
              <button type="button" class="btn btn-primary" id="print-button">Print</button>
              <button type="button" class="btn btn-primary" id="weddingCardDownload">Download</button>
            </center><br>

            <div class="msgShow"></div>

            <input type="text" name="weddingCardUpdate" hidden value="<?php echo $weddingData['id']; ?>">
            <div class="row" >
              <div class="col-md-6 printable-content" >
                <div class="card" style="color: <?php echo $weddingData['fontColor']; ?>;
                                           font-family: <?php echo $weddingData['fontStyle']; ?>;
                                           font-size: <?php echo $weddingData['fontSize']; ?>;
                                           background-image: url(files/upload/weddingCardImages/<?php echo $weddingData['background_img']; ?>);">
                   <h2 class="text-center" id="title" style="background-color: <?php echo $weddingData['title_bg_color']; ?>;
                                                      padding: 10px;">
                          <?php echo htmlspecialchars($weddingData['title']); ?>
                      </h2>
                  <hr>
                  <h4 class="text-center" id="names"><?php echo htmlspecialchars($weddingData['name']); ?></h4>
                  <p class="text-center" id="occasion"><?php echo htmlspecialchars($weddingData['occasion']); ?></p>
                  <p class="text-center" id="date">Date: <?php echo htmlspecialchars($weddingData['date']); ?></p>

                  <p class="text-center" id="time">Time: <span id="fromTime"><?php echo $start ?></span> to <span id="endTime"><?php echo $end ?></span></p>
                  <p class="text-center" id="location">Location: <?php echo htmlspecialchars($weddingData['location']); ?></p>
                  <p class="text-center" id="message"><?php echo htmlspecialchars($weddingData['message']); ?></p>
                  <p class="text-center" id="rsvp">RSVP by <?php echo htmlspecialchars($weddingData['rsvp']); ?></p>
                  <p class="text-center" id="email">Email: <?php echo htmlspecialchars($weddingData['email']); ?></p>
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
                    <input type="color" name="titleBgColor" id="backgroundcolortitle" class="form-control" value="<?php echo $weddingData['title_bg_color']; ?>">
                  </div>

                   <div class="col-md-6">
                    <h5>Background Picture Style:</h5>
                    <input type="file" name="image" id="backgroundInput" class="form-control">
                  </div>

                  <div class="col-md-6">
                    <h5>Select Font Color:</h5>
                    <input type="color" name="fontColor" id="fontColorSelect" class="form-control" value="<?php echo $weddingData['fontColor']; ?>">
                  </div>
                </div>
                <div class="row mt-4">
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

                    <select id="fontStyleSelect" name="fontStyle" class="form-control">
                        <?php foreach ($fontOptions as $option) : ?>
                          <?php
                            if($option['value']==$weddingData['fontStyle'])
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
                               if($option['value']==$weddingData['fontSize'])
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
                    <input type="text" name="title" id="titleInput" class="form-control" required value="<?php echo $weddingData['title']; ?>">
                  </div>
                  <div class="col-md-6">
                    <h5>Names:</h5>
                    <input type="text" name="name" id="namesInput" class="form-control" required value="<?php echo $weddingData['name']; ?>">
                  </div>
                </div>
                <div class="row mt-4">
                  <div class="col-md-6">
                    <h5>Occasion:</h5>
                    <input type="text" name="Occasion" id="occasionInput" class="form-control" required value="<?php echo $weddingData['occasion']; ?>">
                  </div>
                  <div class="col-md-6">
                    <h5>Date:</h5>
                    <input type="hidden" name="date" id="dateInput"  required value="<?php echo $weddingData['date']; ?>">
                    <input type="date" name="formattedDate" id="formattedDateInput" class="form-control" value="<?php echo date('Y-m-d', strtotime($weddingData['date'])); ?>">
                  </div>
                </div>
                <div class="row mt-4">
                   <input type="hidden" name="time" id="timeInput" value="<?php echo $weddingData['time']; ?>" class="form-control" required>


                  <div class="col-md-6">
                    <h5>From Time:</h5>
                    <input type="time" value="<?php echo $start_24; ?>" name="fromeTime" id="fromTimeInput" class="form-control" required>
                  </div>

                  <div class="col-md-6">
                    <h5>End Time:</h5>
                    <input type="time" value="<?php echo $end_24; ?>" name="endTime" id="endTimeInput" class="form-control" required>
                  </div>

                  <div class="col-md-6">
                    <h5>Location:</h5>
                    <input type="text" name="Location" id="locationInput" class="form-control" required value="<?php echo $weddingData['location']; ?>">
                  </div>
                </div>
                <div class="row mt-4">
                  <div class="col-md-12">
                    <h5>Message:</h5>
                    <textarea id="messageInput" name="message" class="form-control" rows="3" required><?php echo $weddingData['message']; ?></textarea>
                  </div>
                </div>
                <div class="row mt-4">
                  <div class="col-md-6">
                    <h5>RSVP:</h5>
                    <input type="text" name="RSVP" id="rsvpInput" class="form-control" required value="<?php echo $weddingData['rsvp']; ?>">
                  </div>
                  <div class="col-md-6">
                    <h5>Email:</h5>
                    <input type="text"  name="email" id="emailInput" class="form-control" required value="<?php echo $weddingData['email']; ?>">
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
      $('#titleInput').keyup(function() {
        var title = $(this).val();
        $('#title').text(title);
      });

      $('#namesInput').keyup(function() {
        var names = $(this).val();
        $('#names').text(names);
      });

      $('#occasionInput').keyup(function() {
        var occasion = $(this).val();
        $('#occasion').text(occasion);
      });

        $('#formattedDateInput').on('input', function() {
          var date = $(this).val();
          var parts = date.split('-');
          var formattedDate = parts[2] + '-' + parts[1] + '-' + parts[0];
          $('#date').text('Date: ' + formattedDate);
          $('#dateInput').val(formattedDate);
        });

      $('#timeInput').keyup(function() {
        var time = $(this).val();
        $('#time').text('Time: ' + time);
      });

      $('#locationInput').keyup(function() {
        var location = $(this).val();
        $('#location').text('Location: ' + location);
      });

      $('#messageInput').keyup(function() {
        var message = $(this).val();
        $('#message').text(message);
      });

      $('#rsvpInput').keyup(function() {
        var rsvp = $(this).val();
        $('#rsvp').text('RSVP by ' + rsvp);
      });

      $('#emailInput').keyup(function() {
        var email = $(this).val();
        $('#email').text('Email: ' + email);
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

      $('#fromTimeInput, #endTimeInput').on('input', function() {
        var fromTime = $('#fromTimeInput').val();
        var endTime = $('#endTimeInput').val();
        var formattedFromTime = formatTimeTo12Hour(fromTime);
        var formattedEndTime = formatTimeTo12Hour(endTime);
        $('#fromTime').text(formattedFromTime);
        $('#endTime').text(formattedEndTime);
        $('#timeInput').val(formattedFromTime + ' to ' + formattedEndTime);
      });


            function formatTimeTo12Hour(time) {
    var timeArr = time.split(':');
    var hour = parseInt(timeArr[0]);
    var minute = timeArr[1];
    var period = hour >= 12 ? 'PM' : 'AM';
    hour = hour % 12 || 12;
    return hour + ':' + minute + ' ' + period;
  }


    });
  </script>

</body>

</html>