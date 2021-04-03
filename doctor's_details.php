<?php
include "lib/connection.php";

if(isset($_GET['id'])){
$edit_id=$_GET['id'];
$selectQuery = "SELECT * FROM doctor_list WHERE id = $edit_id";
$resultall = $conn->query($selectQuery);

if( $resultall->num_rows > 0 ){
while($doctors_details = $resultall->fetch_assoc()){




?>



<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- font awosme -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <link href="css/owl.carousel.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/media.css">

  <title>Hospital Management</title>
</head>
<body>

  <header>
   <!-- HEARDER START -->
   <?php include("index_header.php");?>
   <!-- HEARDER END -->
 </header>

 <!-- header end -->

 <!-- banner -->
 <?php include("index_banner.php");?>
 

 <!-- banner end-->
 <section class="doc_details">
  <div class="container"> 
    <div class="row">
      <div class="col-md-4">
        <img src="/hospital_management/uploadimage/<?php
            echo $doctors_details['image_path']; ?>" alt="image" class="img-fluid">
      </div>
      <div class="col-md-8">
        <h3><?php  echo $doctors_details['first_name']; echo $doctors_details['last_name']; ?></h3>
        <p><strong>Specialty</strong>
          <?php $dpt_id =  $doctors_details['department'];
          $selectDpt = "SELECT * FROM departmet WHERE id= $dpt_id";
          $result_dpt = $conn->query($selectDpt);
          if($result_dpt-> num_rows > 0){ 
          if($resultdpt= $result_dpt->fetch_assoc()){
          echo  $doctors_details['designation']; ?>, <?php  echo  $resultdpt['departmet_name']; ?></p>
          <?php } ?>
          <?php } else {?>
          <?php echo  $doctors_details['designation'];  ?></p>
          <?php } ?> 

          
          <p><strong>Degree</strong><?php echo  $doctors_details['specialist'];  ?></p>
          <p><?php echo  $doctors_details['sort_biography'];  ?></p>
          <a href="appoinment.php" class="btn btn-primary custdoctor_btn btn_details">Get Appointment </a>
        </div>
      </div>
    </div>  
  </section>



  <!-- footer-top -->

  <?php include("index_footer.php");?>



  <!-- jQuery links-->
  <script src="js/jquery-3.3.1.min.js"></script>  
  <script src="js/popper.min.js"></script>  
  <script src="js/bootstrap.min.js"></script> 
  <script src="js/owl.carousel.min.js"></script>   
  <script src="js/script.js"></script>
</body>
</html>

<?php 
}

}else{
header("location:./find_doctor.php");
}
}else{
header("location:./find_doctor.php");
}



?>