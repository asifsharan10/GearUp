<?php 
include('includes/checklogin.php');
check_login();

?>
<!DOCTYPE html>
<html lang="en">
<?php @include("includes/head.php");?>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php @include("includes/header.php");?>
   
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?php @include("includes/sidebar.php");?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">

        <?php 
            $sql ="SELECT * from tblbooking where Status='0'  ORDER BY id DESC ";
            $query = $dbh -> prepare($sql);
            $query->execute();
            $results=$query->fetchAll(PDO::FETCH_OBJ);
            $totalnewbooking=$query->rowCount();
            $cnt=1;
            ?>
            <!-- <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="mdi mdi-bell-outline"></i>
              <span class="count-symbol "><h5 class="badge2 blue"><?php echo htmlentities($totalnewbooking);?></h5></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <h6 class="p-3 mb-0">You have <?php echo htmlentities($totalnewbooking);?> new notification</h6>
              <div class="dropdown-divider"></div> -->
              <?php
              $sql ="SELECT tblbooking.userEmail,tblvehicles.VehiclesTitle, tblvehicles.VehiclesOverview from tblbooking join tblvehicles on tblbooking.VehicleId=tblvehicles.id  where tblbooking.Status='0' ORDER BY tblbooking.id DESC LIMIT 3";
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
                  <!-- <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-success">
                        <i class="mdi mdi-calendar"></i>
                      </div>
                    </div> -->

                    <div class=" d-flex align-items-start flex-column justify-content-center">
                      <h6 class=" font-weight-normal mb-1"><?php  echo substr($row->VehiclesTitle,0,50);?></h6>
                      <p class="text-gray ellipsis mb-0"><?php  echo substr($row->VehiclesOverview,0,50);?></p>
                    </div>
                  <!-- </a> -->
                  <?php 
                }
              } else {?>
                <a class="dropdown-item" href="#">No New booking Received</a>
              <?php } ?>
              <div class="dropdown-divider"></div>
              <!-- <h6 class="p-3 mb-0 text-center"> <a href="#">See all new bookings</a></h6> -->
            </div>
          


          <?php
          $aid6=$_SESSION['odmsaidge'];
          $sql="SELECT * from  tbladmin where ID=:aid6";
          $query = $dbh -> prepare($sql);
          $query->bindParam(':aid6',$aid6,PDO::PARAM_STR);
          $query->execute();
          $results=$query->fetchAll(PDO::FETCH_OBJ);
          if($query->rowCount() > 0)
          { 
            foreach($results as $row)
            {
              ?>
              <div class="row">
                <div class="col-md-3 stretch-card grid-margin">
                  <div class="card bg-gradient-info card-img-holder text-white"style="height: 140px;">
                    <div class="card-body" >
                      <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                      <h4 class="font-weight-normal mb-3">Registered Users
                      </h4>
                      <?php 
                      $sql ="SELECT id from tblusers ";
                      $query = $dbh -> prepare($sql);
                      $query->execute();
                      $results=$query->fetchAll(PDO::FETCH_OBJ);
                      $regusers=$query->rowCount();
                      ?>
                      <h2 class="mb-5"><?php echo htmlentities($regusers);?></h2>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 stretch-card grid-margin">
                  <div class="card bg-gradient-success card-img-holder text-white"style="height: 140px;">
                    <div class="card-body">
                      <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                      <h4 class="font-weight-normal mb-3">Listed Vehicles 
                      </h4>
                      <?php 
                      $sql1 ="SELECT id from tblvehicles ";
                      $query1 = $dbh -> prepare($sql1);;
                      $query1->execute();
                      $results1=$query1->fetchAll(PDO::FETCH_OBJ);
                      $totalvehicle=$query1->rowCount();
                      ?>
                      <h2 class="mb-5"><?php echo htmlentities($totalvehicle);?></h2>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 stretch-card grid-margin">
                  <div class="card bg-gradient-info card-img-holder text-white"style="height: 140px;">
                    <div class="card-body">
                      <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                      <h4 class="font-weight-normal mb-3">Total Bookings
                      </h4>
                      <?php 
                      $sql2 ="SELECT id from tblbooking ";
                      $query2= $dbh -> prepare($sql2);
                      $query2->execute();
                      $results2=$query2->fetchAll(PDO::FETCH_OBJ);
                      $bookings=$query2->rowCount();
                      ?>
                      <h2 class="mb-5"><?php echo htmlentities($bookings);?></h2>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 stretch-card grid-margin">
                  <div class="card bg-gradient-success card-img-holder text-white"style="height: 140px;">
                    <div class="card-body">
                      <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                      <h4 class="font-weight-normal mb-3">Total Brands
                      </h4>
                      <?php 
                      $sql3 ="SELECT id from tblbrands ";
                      $query3= $dbh -> prepare($sql3);
                      $query3->execute();
                      $results3=$query3->fetchAll(PDO::FETCH_OBJ);
                      $brands=$query3->rowCount();
                      ?>  
                      <h2 class="mb-5"><?php echo htmlentities($brands);?></h2>
                    </div>
                  </div>
                </div>
              </div>
              <?php 
            }
          } ?>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php include('includes/footer.php');?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <?php @include("includes/foot.php");?>
</script>
</body>
</html>


