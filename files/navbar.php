 <!-- partial:partials/_sidebar.php -->
    <nav class="sidebar" id="sidebar" style="background-color:white;">
      <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top" style="background-color:white;">
        <a class="sidebar-brand brand-logo" href="index.php"><img src="./files/asset/img/DESIGNER'S.png" style="width: 50px;" alt="logo" /></a>
        <a class="sidebar-brand brand-logo-mini" href="index.php"><img src="files/assets/images/logo-mini.svg" alt="logo" /></a>
      </div>
      <ul class="nav">
        <li class="nav-item profile">
          <div class="profile-desc">
            <div class="profile-pic">
              <div class="count-indicator">
                <img class="img-sm rounded-circle " src="files/upload/usersProfile/<?php echo $userData['profile_image']; ?>" alt="">
                
              </div>
              <div class="profile-name">
                <span><?php echo ucwords($userData['name']); ?></span>
              </div>
            </div>
           
          </div>
        </li>
        <li class="nav-item nav-category">
          <span class="nav-link">Navigation</span>
        </li>

        <li class="nav-item menu-items">
          <a class="nav-link" href="index.php">
            <span class="menu-icon">
              <i class="mdi mdi-home"></i> <!-- Add the home icon here -->
            </span>
            <span class="menu-title">Home</span>
          </a>
        </li>


        <li class="nav-item menu-items">
          <a class="nav-link" href="profile-edit.php">
            <span class="menu-icon">
              <i class="mdi mdi-table-large"></i>
            </span>
            <span class="menu-title">Profile </span>
          </a>
        </li>
      <li class="nav-item menu-items">
          <a class="nav-link" href="index2.php">
            <span class="menu-icon">
              <i class="mdi mdi-table-large"></i>
            </span>
            <span class="menu-title">Wedding Card</span>
          </a>
        </li>

         <li class="nav-item menu-items">
          <a class="nav-link" href="birthday-list.php">
            <span class="menu-icon">
              <i class="mdi mdi-table-large"></i>
            </span>
            <span class="menu-title">Birthday</span>
          </a>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="eid-list.php">
            <span class="menu-icon">
              <i class="mdi mdi-table-large"></i>
            </span>
            <span class="menu-title">Eids</span>
          </a>
        </li>

         <li class="nav-item menu-items">
          <a class="nav-link" href="anniversary-list.php">
            <span class="menu-icon">
              <i class="mdi mdi-table-large"></i>
            </span>
            <span class="menu-title">Aniversary</span>
          </a>
        </li>
       
        <li class="nav-item menu-items">
          <a class="nav-link" href="thank-list.php">
            <span class="menu-icon">
              <i class="mdi mdi-table-large"></i>
            </span>
            <span class="menu-title">Thank you Card</span>
          </a>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="visitingCard-list.php">
            <span class="menu-icon">
              <i class="mdi mdi-table-large"></i>
            </span>
            <span class="menu-title">Visiting Card</span>
          </a>
        </li>
      </ul>
    </nav><!-- partial -->