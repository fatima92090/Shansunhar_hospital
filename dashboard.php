<?php 

include "lib/connection.php";

session_start();
if(isset($_SESSION['login_user'])){
  if($_SESSION['login_user']!=1){
    header("location:./index.php");   
  }
}else{
  if(isset($_COOKIE['cookiename'])){
    if($_COOKIE['cookiename'] ==""){
      header("location:./index.php");
    }
  }else{
    header("location:./index.php");
  }  
}

if((isset($_GET['username'])) && (isset($_GET['user_type']))){
  $user_type=trim($_GET['user_type']);
  $username=$_GET['username'];
}

$selectdpt = "SELECT * FROM `departmet`";
$result_dpt = $conn->query($selectdpt);
$resdpt=mysqli_num_rows($result_dpt);


$selectdoc = "SELECT * FROM `doctor_list`";
$result_doc = $conn->query($selectdoc);
$resdoc=mysqli_num_rows($result_doc);


$selectpat = "SELECT * FROM `pataint_info`";
$result_pat = $conn->query($selectpat);
$respataint=mysqli_num_rows($result_pat);

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Hospital Admin - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/sb-admin-2.css">
  <script type="text/javascript">
    function myFunction(event){
      $.ajax({
        type: "GET",
        url: "sidebar.php",
        data: { "user_type" : <?php  $user_type ?>; "username" : <?php $username ?>},

        success: function(response) {
            //any success method here
          }
        });

    }


  </script>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- sidebar -->
    <?php include("sidebar.php");?>
    <!-- End of Sidebar -->
    <!-- sidebar end -->
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include("topbar.php");?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>            
          </div>
          <?php if($user_type=="AD"){ ?>
            <section class="currentdashboard">
              <div class="container">

                <div class="row">
                  <div class="col-sm-6">
                    <div class="card text-center">
                      <div class="card-body">
                        <h5 class="card-title">Number Of Department</h5>
                        <p class="card-text"><?php echo $resdpt; ?></p>
                        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 text-center">
                    <div class="card" id="load_tweets">
                      <div class="card-body">
                        <h5 class="card-title">Number Of Doctor</h5>
                        <p class="card-text"><?php echo $resdoc; ?></p>
                        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                      </div>
                    </div>
                  </div>
                </div>
                <!-- row end -->
                <div class="row mt-5">
                  <div class="col-sm-6">
                    <div class="card text-center">
                      <div class="card-body">
                        <h5 class="card-title">Number Of Pataint</h5>
                        <p class="card-text"><?php echo $respataint; ?></p>
                        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                      </div>
                    </div>
                  </div>

                </div>

              </div>

            </section>
          <?php } ?>
        </div>
        <!-- End of Main Content -->



      </div>
      <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->




    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

  </body>

  </html>
