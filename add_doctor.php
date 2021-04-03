<?php

include "lib/connection.php";

require __DIR__ . '/twilio-php-master/Twilio/autoload.php';

// Use the REST API Client to make requests to the Twilio REST API
use Twilio\Rest\Client;

session_start();

$twilioSid = 'AC6babbc2d156fd45c1afb79251c46dcc9';
$twilioToken = '63ba212b154cf01b11e52ce7cd4fdaf5';

if((isset($_GET['username'])) && (isset($_GET['user_type']))){
  $user_type=trim($_GET['user_type']);
  $username=trim($_GET['username']);

}
//$user_type="AD";


$selectQuery = "SELECT * FROM departmet";
$result_all = $conn->query($selectQuery);

$selecttime = "SELECT * FROM time_slot";
$timeall = $conn->query($selecttime);

$result="";
if(isset($_POST["btn_save"])){

	$firstname=$_POST['first_name'];
	$lasttname=$_POST['last_name'];
	$email=$_POST['email'];
// $password=$_POST['password'];
	$designation=$_POST['designation'];
	$department =$_POST['department'];
	$address = $_POST['address'];
	$Specialist = $_POST['specialist'];
	$mobile = $_POST['mobile'];
	$gender=$_POST['gender'];
$filename = $_FILES['pictureupload']['name']; //declaring variables
$filetmpname = $_FILES['pictureupload']['tmp_name'];
$sort_biography=$_POST['sort_biography'];
$available_time = $_POST['available_time'];
$Unavailable_days = $_POST['Unavailable_days'];

//folder where images will be uploaded
$folder = 'uploadimage/';
//function for saving the uploaded images in a specific folder
move_uploaded_file($filetmpname, $folder.$filename);
$sort_biography=$_POST['sort_biography'];


$insertQuery="INSERT INTO doctor_list(first_name,last_name,email,gender,designation,department,address,specialist,mobile,image_path,sort_biography,available_time,Unavailable_days)
VALUES('$firstname','$lasttname','$email',$gender,'$designation','$department','$address','$Specialist', '$mobile', '$filename','$sort_biography','$available_time','$Unavailable_days') ";





if($conn->query($insertQuery)){
	$last_id = $conn->insert_id;
	$pass=rand(1000, 9999);
	$smsBody = "Login Email: $email and Password: $pass";

	$client = new Twilio\Rest\Client($twilioSid, $twilioToken);
	$message = $client->messages->create(
  	$mobile, // Text this number
  	array(
    'from' => '+13342316536', // From a valid Twilio number
    'body' => $smsBody
)
  );

	$insertdocuser="INSERT INTO user_doctor(doctor_id,user_type,email,pass)
	VALUES('$last_id','DC','$email','$pass') ";

	if($conn->query($insertdocuser)){
		$result="Data instert successfully.";
	}else{
		$result="SomeThing Error.";
		die($conn->error);
	}

	
}else{
	$result="Data not instert successfully.";
	die($conn->error);

}

} 

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
	<link rel="stylesheet" type="text/css" href="css/style.css">

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
							<a class="btn" href="doctor_list.php" style="background-color: #E91E63; color: #fff;"> <i class="fa fa-list"></i> Doctor List
							</a>  
						</div>         
					</div>

					<section class="adddoctor">
						<div class="container"> 
							<div class="row">
								<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"  enctype="multipart/form-data" style="width: 100%;">
									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="first_name">First Name</label>
											<input type="text" class="form-control" name="first_name" placeholder="First Name" required>
										</div>
										<div class="form-group col-md-6">
											<label for="last_name">Last Name</label>
											<input type="text" class="form-control" name="last_name" placeholder="Last Name" required>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="email">Email</label>
											<input type="email" class="form-control" name="email" placeholder="Email" required>
										</div>
										<div class="form-group col-md-6">
											<label for="address">Address</label>
											<input type="text" class="form-control" name="address" placeholder="Address" required>

										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="designation">Designation</label>
											<input type="text" class="form-control" name="designation" placeholder="Designation" required>
										</div>
										<div class="form-group col-md-6">
											<label for="department">Department</label>            
											<select name="department" class="form-control" required>
												<option selected>Choose...</option>
												<?php if($result_all->num_rows > 0){ ?>
													<?php while($result_data = $result_all->fetch_assoc()){ ?>
														<option value="<?php  echo $result_data['id'] ?>"> <?php  echo $result_data['departmet_name']  ?> </option>
													<?php } ?> 
												<?php } else { ?>
													<option>No Department</option>
												<?php } ?>
											</select>         

										</div>
									</div>

									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="specialist">Degree</label>
											<input type="specialist" class="form-control" name="specialist" placeholder="Specialist" required>
										</div>
										<div class="form-group col-md-6">
											<label for="mobile">Mobile</label>
											<input type="text" class="form-control" name="mobile" placeholder="Mobile"required>
										</div>
									</div>

									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="gender">Gender</label>
											<select class="form-control" name="gender" required required>
												<option value="0">Male</option>
												<option value="1">Female</option>
											</select>
										</div>

										<div class="form-group col-md-6">
											<label for="available_time">Available Time</label>
											<select name="available_time" class="form-control" required>
												<option selected>Choose...</option>
												<?php if($timeall->num_rows > 0){ ?>
													<?php while($times = $timeall->fetch_assoc()){ ?>
														<option value="<?php  echo $times['id'] ?>"> <?php  echo $times['time_duration']  ?> </option>
													<?php } ?> 
												<?php } else { ?>
													<option>No Time Duration</option>
												<?php } ?>
											</select>
										</div>
									</div>

									<div class="form-row">		
										<div class="form-group col-md-6">
											<label for="Unavailable_days">Unavailable Days</label>
											<select name="Unavailable_days" class="form-control" required>
												<option selected>Choose...</option>
												<option value="1">Friday</option>
												<option value="2">Saturday</option>
												<option value="3">Sunday</option>
												<option value="4">Monday</option>
												<option value="5">Thusday</option>
												<option value="6">Wednesday</option>
												<option value="7">Thusday</option>

											</select>
										</div>
										<div class="form-group col-md-6">
											<label for="pictureupload">Picture Upload</label>
											<div class="input-group mb-2">
												<div class="custom-file">
													<input type="file" class="input-default-js" name="pictureupload">
													<label class="label-for-default-js rounded-right mb-3" for="pictureupload"><span class="span-choose-file"></span></label>
												</div>              
											</div>
										</div>
									</div>   

									<div class="form-row">
										<label for="sort_biography">Short Biography</label>
										<textarea class="form-control" name="sort_biography" rows="3"></textarea>
									</div>


									<button type="submit" class="btn cust_save_btn mt-3" name="btn_save">Save</button>

									<?php echo $result; ?>
								</form>
							</div>
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

	</body>

	</html>
