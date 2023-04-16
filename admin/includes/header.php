 <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
    <?php
    $sql="SELECT * from  tblcompany ";
    $query = $dbh -> prepare($sql);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    $cnt=1;
    if($query->rowCount() > 0)
    {
      foreach($results as $row)
      {  
        if($row->companylogo=="avatar_15.jpg")
        { 
          ?>
          <a class="navbar-brand brand-logo " href="dashboard.php"><img class="img-avatar" style="height: 60px; width: 60px;" src="assets/img/avatars/avatar15.jpg" alt=""></a>
        <a class="navbar-brand brand-logo-mini" href="dashboard.php"><img style="height: 30px; width: 30px;" src="assets/img/avatars/avatar15.jpg" alt="logo" /></a>
          <?php 
        } else { ?>
          <a class="navbar-brand brand-logo " href="dashboard.php"><img class="img-avatar" style="height: 60px; width: 60px;" src="companyimages/<?php  echo $row->companylogo;?>" alt=""></a>
        <a class="navbar-brand brand-logo-mini" href="dashboard.php"><img style="height: 30px; width: 30px;" src="companyimages/<?php  echo $row->companylogo;?>" alt="logo" /></a>
          <?php 
        } ?>
        <?php
      }
    }
    ?>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-stretch">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="mdi mdi-menu"></span>
    </button>
    <div class="search-field d-none d-md-block">
      <form class="d-flex align-items-center h-100" action="#">
        <div class="input-group">
          <div class="input-group-prepend bg-transparent">
            <i class="input-group-text border-0 mdi mdi-magnify"></i>
          </div>
          <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
        </div>
      </form>
    </div>
    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item nav-profile dropdown">
        <?php
        $aid=$_SESSION['odmsaid'];
        $sql="SELECT * from  tbladmin where ID=:aid";
        $query = $dbh -> prepare($sql);
        $query->bindParam(':aid',$aid,PDO::PARAM_STR);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        if($query->rowCount() > 0)
        {
          foreach($results as $row)
          { 
            ?>
            <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <div class="nav-profile-img">
                <?php 
                if($row->Photo=="avatar_15.jpg")
                { 
                  ?>
                  <img class="img-avatar" src="assets/img/avatars/avatar_15.jpg" alt="">
                  <?php 
                } else { 
                  ?>
                  <img class="img-avatar" src="profileimages/<?php  echo $row->Photo;?>" alt=""> 
                  <?php 
                } ?>
              </div>
              <div class="nav-profile-text">
                <p class="mb-1 text-black"><?php  echo $row->FirstName;?> <?php  echo $row->LastName;?></p>
              </div>
            </a>
            <?php
          }
        } ?>

        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
          <a class="dropdown-item" href="profile.php">
            <i class="mdi mdi-account mr-2 text-success"></i> Profile </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="change_password.php"><i class="mdi mdi-settings mr-2 text-success"></i> settings </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="logout.php">
              <i class="mdi mdi-logout mr-2 text-primary"></i> Signout </a>
            </div>
          </li>
          <li class="nav-item d-none d-lg-block full-screen-link">
            <a class="nav-link">
              <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
            </a>
          </li>
          <li class="nav-item dropdown">
            <?php 
            $sql ="SELECT * from tblbooking where Status='0'  ORDER BY id DESC ";
            $query = $dbh -> prepare($sql);
            $query->execute();
            $results=$query->fetchAll(PDO::FETCH_OBJ);
            $totalnewbooking=$query->rowCount();
            $cnt=1;
            ?>
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="mdi mdi-bell-outline"></i>
              <span class="count-symbol "><h5 class="badge2 blue"><?php echo htmlentities($totalnewbooking);?></h5></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <h6 class="p-3 mb-0">You have <?php echo htmlentities($totalnewbooking);?> new notifications</h6>
              <div class="dropdown-divider"></div>
              <?php
              $sql ="SELECT tblbooking.userEmail,tblvehicles.VehiclesTitle from tblbooking join tblvehicles on tblbooking.VehicleId=tblvehicles.id  where tblbooking.Status='0' ORDER BY tblbooking.id DESC LIMIT 10";
              $query = $dbh -> prepare($sql);
              $query->execute();
              $results=$query->fetchAll(PDO::FETCH_OBJ);
              $totalnewbooking=$query->rowCount();
              $cnt=1;

              ?>
              <?php if($query->rowCount() > 0)
              {
                foreach($results as $row)
                {              
                  ?>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-success">
                        <i class="mdi mdi-calendar"></i>
                      </div>
                    </div>

                    <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                      <h6 class="preview-subject font-weight-normal mb-1"><?php  echo substr($row->VehiclesTitle,0,50);?></h6>
                      <p class="text-gray ellipsis mb-0">is booked</p>
                    </div>
                  </a>
                  <?php 
                }
              } else {?>
                <a class="dropdown-item" href="#">No New booking Received</a>
              <?php } ?>
              <div class="dropdown-divider"></div>
              <h6 class="p-3 mb-0 text-center"> <a href="#">See all new bookings</a></h6>
            </div>
          </li>
          <li class="nav-item nav-logout d-none d-lg-block">
            <a class="nav-link" href="logout.php">
              <i class="mdi mdi-power"></i>
            </a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>




