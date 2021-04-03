<?php 

include "lib/connection.php";

$user_type = $_SESSION['user_type'];
$username=$_SESSION['login_user_name'];
$userID=isset($_SESSION['user_id'])? $_SESSION['user_id'] : "";
$userinfo=array("user_type" => "$user_type", "username" => "$username");

?>

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <!-- <i class="fas fa-laugh-wink"></i> -->
        </div>
        <div class="sidebar-brand-text mx-3"><?php echo $username; ?></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">       

        <!-- Nav Item - Pages Collapse Menu -->
        <?php if($user_type=="AD"){?>
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
              <i class="fas fa-user-md"></i>
              <span>Doctor</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="py-2 collapse-inner rounded">             
                <a class="collapse-item" href="add_doctor.php">Add Doctor</a>
                <hr class="sidebar-divider1">
                <a class="collapse-item" href="doctor_list.php">Doctor List</a>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
              <i class="fas fa-user-md"></i>
              <span>Service</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="py-2 collapse-inner rounded">             
                <a class="collapse-item" href="add_doctor.php">Add Service</a>
                <hr class="sidebar-divider1">
                <a class="collapse-item" href="Service_list.php">Service List</a>
              </div>
            </div>
          </li>

         
  <?php } ?>

  <!-- ////////// -->


</ul>
<!-- End of Sidebar -->