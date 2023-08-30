<header id="header" class="fixed-top" style="background-color: rgba(24, 6, 185, 0.8)">
  <div class="container d-flex align-items-center justify-content-between">
    <div class="logo">
      <a href="index.html"><img src="./files/asset/img/DESIGNER'S.png" style="width: 50px;" alt=""></a>
    </div>
    <nav id="navbar" class="navbar">
      <ul> <!-- Update CSS class to "left-links" -->
        <li><a class="nav-link scrollto" href="index.php">Home</a></li>
        <?php 
          if (!isset($_SESSION['userLogin']) && empty($_SESSION['userLogin'][0]) && empty($_SESSION['userLogin'][1])) {
        ?>
        <li><a class="nav-link scrollto" href="register.php">Register</a></li>
        <li><a class="nav-link scrollto" href="login.php">Login</a></li>
        <?php
          } else {
        ?>

         <li class="dropdown">
          <a href="#">
            <span>Dashboard</span>
            <i class="bi bi-chevron-down"></i>
          </a>
          <ul>
            <li><a href="anniversary-list.php" class="btn btn-light stretched-link">Anniversary</a></li>
            <li><a href="visitingCard-list.php" class="btn btn-light stretched-link">Visiting Card</a></li>
            <li><a href="birthday-list.php" class="btn btn-light stretched-link">Birthday</a></li>
            <li><a href="index2.php" class="btn btn-light stretched-link">Wedding</a></li>
            <li><a href="eid-list.php" class="btn btn-light stretched-link">Eid</a></li>
            <li><a href="thank-list.php" class="btn btn-light stretched-link">Thank You</a></li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="#">
            <span>Create Card</span>
            <i class="bi bi-chevron-down"></i>
          </a>
          <ul>
            <li><a href="anniversaryCardCreate.php" class="btn btn-light stretched-link">Anniversary</a></li>
            <li><a href="visitingCardCreate.php" class="btn btn-light stretched-link">Visiting Card</a></li>
            <li><a href="happayBirthday.php" class="btn btn-light stretched-link">Birthday</a></li>
            <li><a href="weddingCard.php" class="btn btn-light stretched-link">Wedding</a></li>
            <li><a href="eidCardCreate.php" class="btn btn-light stretched-link">Eid</a></li>
            <li><a href="thankYouCardCreate.php" class="btn btn-light stretched-link">Thank You</a></li>
          </ul>
        </li>


         <li class="dropdown">
          <a href="#">
            <span>Custom Card</span>
            <i class="bi bi-chevron-down"></i>
          </a>
          <ul>
            <li><a href="c_anniversaryCardCreate.php" class="btn btn-light stretched-link">Anniversary</a></li>
            <li><a href="c_visitingCardCreate.php" class="btn btn-light stretched-link">Visiting Card</a></li>
            <li><a href="c_happayBirthday.php" class="btn btn-light stretched-link">Birthday</a></li>
            <li><a href="c_weddingCard.php" class="btn btn-light stretched-link">Wedding</a></li>
            <li><a href="c_eidCardCreate.php" class="btn btn-light stretched-link">Eid</a></li>
            <li><a href="c_thankYouCardCreate.php" class="btn btn-light stretched-link">Thank You</a></li>
          </ul>
        </li>
        <li><a class="nav-link scrollto" href="logout.php">Logout</a></li>
        <?php 
          }
        ?>
      </ul> 

      <div class="search-bar" <?php if (!isset($_SESSION['userLogin']) && empty($_SESSION['userLogin'][0]) && empty($_SESSION['userLogin'][1])) { ?>style="margin-left: 800px;"<?php } else { ?>style="margin-left: 150px;"<?php } ?>>
         <?php 
          if (isset($_SESSION['userLogin']) && !empty($_SESSION['userLogin'][0]) && !empty($_SESSION['userLogin'][1])) 
          {
        ?>
        <div class="input-group">
          <input type="text" name="searchValue" id="searchData" class="form-control" placeholder="Search Card...">
          <button class="btn btn-primary" type="button" id="searchCard"><i class="bi bi-search"></i></button>
        </div>
      <?php } ?>
      </div>

      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav>
  </div>
</header>
