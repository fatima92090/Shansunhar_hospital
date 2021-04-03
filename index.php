<?php 
include "lib/connection.php";

$result="";

$selectQuery = "SELECT * FROM doctor_list";
$resultall = $conn->query($selectQuery);



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

 <!-- BOXSLIDE EFFECT EXAMPLES -->
 <section class="boxslide">
  <div class="container-fluid">
    <div class="row four-box">
      <div class="col-sm-6 col-12" style="background-color: #E91E63;">
        <p><a href="find_doctor.php"><img src="images/ambulanc_icon.png" alt="ambulanc" class="img-fluid custom-img">Find a Doctor</a></p>
      </div>
      <div class="col-sm-6 col-12" style="background-color: #F88D3A;"><p><a data-toggle="modal" href="#exampleModalCenter"><img src="images/time-icon.png" alt="time" class="img-fluid custom-img">&nbsp; Call for information</a></p></div>
      <!-- modal-->
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
         <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Hospital information</h5>
      
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     <p>Saturia-Daragram Road, Saturia Bazer, Saturia</p>   
     <p><i  class="fas fa-phone"></i> 01985272110</p>   
     <p><i  class="fa fa-envelope" aria-hidden="true"></i>sneyehospital1.com</p> 
     <p><i class="fa fa-globe"></i> www.samsunnahareyehospitalbd.com </p>
      </div>
     
    </div>
  </div>
</div>
      <!--modal-->
    </div>
  </div>
</section>
<!-- BOXSLIDE EFFECT EXAMPLES -->

<!-- choose-us -->
<section class="choose-us">
  <div class="row">
    <div class="left-div col-lg-6 col-12">
      <img src="images/hospital.jpg" alt="hospital" class="img-fluid">
    </div>
    <div class="right-div col-lg-6 col-12">
      <div class="right-content">
        <h3 class="pseudo_border">WHY <span style="color:#E91E63;">CHOOSE US?</span></h3>
      </div>
      <div class="row padd-sm">
        <div id="accordion" style="width: 92%;">
          <div class="card">
            <div class="card-header" id="headingOne">
              <h4 class="mb-0">
                <button class="btn btn-link btn-accordion collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                 <i class="fas fa-phone-square"></i> Excellent Services <i class="fa fa-chevron-up pull-right"></i>
               </button>
             </h4>
           </div>

           <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
             In healthcare sector, service excellence is the facility of the hospital as healthcare service provider to consistently meet and manage patient requirements. Clinical excellence must be the priority for any health care service provider.  Hospital ensures the best healthcare service comprise of professional (clinical) service excellence with outstanding personal service.
           </div>
         </div>
       </div>
       <div class="card">
        <div class="card-header" id="headingTwo">
          <h4 class="mb-0">
            <button class="btn btn-link btn-accordion collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              <i class="fas fa-user-shield"></i>Qualified Doctors <i class="fa fa-chevron-up pull-right"></i>
            </button>
          </h4>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
          <div class="card-body">
            Hospital aims to provide the highest possible level of care by the qualified consultants from India, Singapore, USA, UK & quality hospitals in the Middle East as well as the nurses/technicians proficiently trained from Bangladesh, Australia, UK, India and The Philippines.
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header" id="headingThree">
          <h4 class="mb-0">
            <button class="btn btn-link btn-accordion collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
             <i class="fas fa-ambulance"></i> Emergency Departments <i class="fa fa-chevron-up pull-right"></i>
           </button>
         </h4>
       </div>
       <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
        <div class="card-body">
          Hospital aims to provide the highest possible level of care by the qualified consultants from India, Singapore, USA, UK & quality hospitals in the Middle East as well as the nurses/technicians proficiently trained from Bangladesh, Australia, UK, India and The Philippines.
        </div>
      </div>
    </div>
    
  </div>
</div>      
</div>
</div>
</section>
<!-- choose-us end -->
<!-- myinspiration -->
<section class="myinspiration">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="inspiration-img">                                        
         <img src="images/pediatric.jpg" alt="">
        </div>
      </div>
      <div class="row">
          <div class="col-12">
            <div class="inspiration-content">
              <h5>My Inspiration</h5>
              <p></p>
            </div>
          </div>
      </div>
    </div>
  </div>
</section>
<!-- myinspiration -->
<!-- specialdoctor -->
<section class="specialdoctor">
  <div class="container">
    <div class="row">
      <div class="col-12 text-specialdoctor">
        <h3>Our Specialist</h3>
        <p>State of the art technology and expertise combined with the support of our friendly staff, we strive each day to be the top healthcare provider.</p>
      </div>
    </div>
    <div class="doctor-container">
      <div class="owl-carousel">
       <?php  if( $resultall->num_rows > 0){ ?>
         <?php while ($results=$resultall->fetch_assoc()) { ?>
          <div class="card card-bottom shadow-lg p-3 mb-5 bg-white rounded">
            <img class="card-img-top img-fluid doctor_img" src="/hospital-management/uploadimage/<?php
            echo $results['image_path']; ?>" alt="doctor">
            <div class="card-body">
              <h5 class="card-title"><?php echo  $results['first_name']; echo $results['last_name'];   ?> </h5>

              <p class="card-text"><strong>Specialty - </strong>
               <?php $dpt_id =  $results['department'];
               $selectDpt = "SELECT * FROM departmet WHERE id= $dpt_id  ";
               $result_dpt = $conn->query($selectDpt);
               if($result_dpt-> num_rows > 0){ 
                if($resultdpt= $result_dpt->fetch_assoc()){
                 echo  $results['designation'];  echo  $resultdpt['departmet_name']; ?></p>
               <?php } ?>
             <?php } else {?>
               <?php echo  $results['designation'];  ?></p>
             <?php } ?>              
             <p><strong>Degree - </strong><?php echo  $results['specialist'];  ?> </p>
           </div>
         </div>
       <?php } ?>
     <?php } else { ?>
      <div class="card card-bottom">
        <img class="card-img-top" src="images/doctor3.jpg" alt="doctor" class="img-fluid">
        <div class="card-body" style="margin-top: 7px;">
          <h5 class="card-title">Dr. Rownak Jahan</h5>
          <p class="card-text"><strong>Specialty - </strong>Consultant, Medicine</p>
          <p><strong>Degree - </strong>MBBS, FCPS, MD(Medicine)</p>
        </div>
      </div>
    <?php }?>          
  </div>
</div>
</div>
</section>
<!-- specialdoctor -->

<!--google maps-->
<section class="googlemap">
<div class="container-fluid">
    <div class="map-responsive">
   <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q=Bangladesh+Development+Bank+saturia" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
</div>
</section>
<!--google maps-->



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

