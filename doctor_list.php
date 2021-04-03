<?php

include "lib/connection.php";
session_start();
$result="";
$user_type="AD";

if(isset($_GET['page'])){
	$page=$_GET['page'];
}
else{
	$page = 1;
}

$num_per_page = 05;
$start_from =($page-1)*05;
$selectQuery = "SELECT * FROM doctor_list limit $start_from, $num_per_page";
$result_all = $conn->query($selectQuery);


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
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">

	<script type="text/javascript">
    function myFunction(event){
      $.ajax({
        type: "GET",
        url: "sidebar.php",
        data: { "user_type" : <?php  $user_type ?>},

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
						<div class="btn-group"> 
							<a class="btn" href="add_doctor.php" style="background-color: #E91E63; color: #fff;"> <i class="fa fa-plus"></i> Add Doctor
							</a>  
						</div>         
					</div>

					<section class="doctorlist">
						<div class="container">
							<div class="table-responsive">
								<table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th scope="col">Serial No</th>
											<th scope="col">Picture</th>
											<th scope="col">First Name</th>
											<th scope="col">Last Name</th>
											<th scope="col">Department</th>
											<th scope="col">Designation</th>
											<th scope="col">Specialist</th>
											<th scope="col">Email</th>
											<th scope="col">Mobile No</th>
											<th scope="col">BioGrapghy</th>
											<th scope="col">Update</th>

										</tr>
									</thead>
									<tbody>
										<?php if($result_all->num_rows > 0 ){ ?>
											<?php while ($results=$result_all->fetch_assoc()) {	?>
												<tr>
													<td> <?php echo $results['id']; ?></td>
													<td><?php if($results['image_path'] != '' || !empty($results['image_path'])){ ?>
														<img src="/hospital_management/uploadimage/<?php 									
														echo $results['image_path']; ?> " alt="pic" style="width:60px; height: 50px;">
													<?php } else { ?>
														<img src="/hospital_management/images/thamble.jpg" alt="pic" style="width:60px; height: 50px;">
													<?php  } ?>

												</td>
												<td><?php echo  $results['first_name'];  ?></td>
												<td><?php echo  $results['last_name'];  ?></td>
												<td><?php $dpt_id =  $results['department'];
												$selectDpt = "SELECT * FROM departmet WHERE id= $dpt_id  ";
												$result_dpt = $conn->query($selectDpt); 
												if($result_dpt-> num_rows > 0){ 
													if($resultdpt= $result_dpt->fetch_assoc()){ 
														echo  $resultdpt['departmet_name']; ?>
													</td>

												<?php } ?>
											<?php } else {?>
												<td>No data</td>
											<?php } ?>
											<td><?php echo  $results['designation'];  ?></td>
											<td><?php echo  $results['specialist'];  ?></td>
											<td><?php echo  $results['email'];  ?></td>
											<td><?php echo  $results['mobile'];  ?></td>
											<td><?php echo  $results['sort_biography'];  ?></td>
											<td><a type="button" class="btn btn-xs"  style="background-color: #E91E63; color: #fff;" href="edit_modal.php?id=<?php 
											echo $results['id'];
											?>" >Edit</a>
											<a type="button" class="btn btn-xs"  style="background-color: #E91E63; color: #fff;" href="lib/delete_doctor.php?id=<?php 
											echo $results['id'];
											?>" >Delete</a>


										</td>

										</tr>
									<?php } ?>
								<?php } else{ ?>
									<tr>
										<th colspan="11">No student data to show</th>
									</tr>

								<?php }?>
							</tbody>
						</table>
					</div>


					<?php 
					$Query = "SELECT * FROM doctor_list";
					$resall = $conn->query($Query);
					$totalrec= $resall->num_rows;
							//echo $totalrec;
					
					$total_page = ceil($totalrec/$num_per_page);
							//echo $total_page;
					for($i=1; $i <= $total_page; $i++){
								//echo $total_page;
						echo "<a href= 'doctor_list.php?page=".$i."' class='btn btn_page'>$i</a>";

					}
					?>
				</div>
			</section>			


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
<script src="js/contact.js"></script>

</body>

</html>
