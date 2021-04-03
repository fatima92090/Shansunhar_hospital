<?php   

include "lib/connection.php";

$selectdepartmet = "SELECT * FROM departmet";
$result_dept = $conn->query($selectdepartmet);





$resultall = "";
if(isset($_POST['btn_find'])){
  $doctor_name =$_POST['name'];
  $department =$_POST['department'];
  if($department !=null && ($doctor_name ==null || $doctor_name =="") ){
    $selectDoctor= "SELECT * FROM `doctor_list` WHERE `department`='$department'";
    $resultall = $conn->query($selectDoctor);
  }else if(($department ==null || $department =="" ) && $doctor_name !=null){
    $selectDoctor= "SELECT * FROM `doctor_list` WHERE `first_name` LIKE '%$doctor_name%' OR `last_name` LIKE '%$doctor_name%' ";
    $resultall = $conn->query($selectDoctor);
  }else if(($department !=null  || $department !="") && ($doctor_name !=null  || $department !="")){
    $selectDoctor= "SELECT * FROM `doctor_list` WHERE `department`='$department' AND `first_name` LIKE '%$doctor_name%' OR `last_name` LIKE '%$doctor_name%' ";

    $resultall = $conn->query($selectDoctor);
  }else if(($department ==null || $department =="" ) && ($doctor_name ==null || $doctor_name =="")){
   $selectQuery = "SELECT * FROM doctor_list LIMIT 2";
   $resultall = $conn->query($selectQuery);
 } 
}else{
  $selectQuery = "SELECT * FROM doctor_list LIMIT 2";
  $resultall = $conn->query($selectQuery);

}



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

 <section class="find-doctor">
  <div class="container"> 
    <div class="row">
      <div class="col-12">
        <h3>Find a Doctor</h3>
      </div>
      <div class="col-12">
        <p>Select a specialty first to narrow the list to doctors in that specialty. Or if you know the doctor’s name, you may select it from the third column below.</p>
      </div>
      <div class="col-12">
        <div class="box-finddoctor shadow-lg p-3 mb-5 bg-white rounded"> 
          <div class="row">
            <div class="col-md-4">
              <img src="images/doctorsearch.jpg" alt="search doctor" class="img-fluid" style="height: 220px; width: 220px;">
            </div>
            <div class="col-md-7 finddoctor">
              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="row">
                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <label for="name">Doctor's Name</label>
                      <input type="text" name="name" class="form-control" id="name" />
                    </div>
                    <div class="form-group">
                      <label for="department">Select Department</label>
                      <select name="department" value="department" class="form-control">
                        <option selected> </option>
                        <?php if($result_dept->num_rows > 0){ ?>
                          <?php while($result_data = $result_dept->fetch_assoc()){ ?>
                            <option value="<?php  echo $result_data['id'] ?>"> <?php  echo $result_data['departmet_name']  ?> </option>
                          <?php } ?> 
                        <?php } else { ?>
                          <option>No Department</option>
                        <?php } ?>
                      </select>         
                      
                    </div>
                    <button type="submit" class="btn btn-primary cust_save_btn" name="btn_find">Search</button>
                    <!-- <a href="#" class="btn cust-btnsearch" name="btn_find">Search</a>                     -->
                  </div>
                </div>
              </form>
            </div>
          </div> 
        </div>

      </div>
    </div>
  </div>

</section>


<!-- doctor's -->
<section class="ourdoctor">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h3>Our Doctor</h3>
      </div>
    </div>


    <div class="row">
     <?php  if( $resultall->num_rows > 0){ ?>
       <?php while ($results=$resultall->fetch_assoc()) { ?>
        <div class="col-md-6">
          <div class="row finddoc-card-bottom shadow-lg p-3 mb-5 bg-white rounded">
            <div class="col-md-4">
              <img class="card-img-top img-fluid doctor_img" src="/hospital_management/uploadimage/<?php
              echo $results['image_path']; ?>" alt="doctor">
            </div>
            <div class="col-md-8 pt-3 pr-0">
             <h5 class="card-title title_doc"><?php echo  $results['first_name']; echo $results['last_name'];   ?> </h5>
             <p class="card-text title_doc"><strong>Specialty - </strong>
               <?php $dpt_id =  $results['department'];
               $selectDpt = "SELECT * FROM departmet WHERE id= $dpt_id  ";
               $result_dpt = $conn->query($selectDpt);
               if($result_dpt-> num_rows > 0){ 
                if($resultdpt= $result_dpt->fetch_assoc()){
                 echo  $results['designation']; ?>, <?php  echo  $resultdpt['departmet_name']; ?></p>
               <?php } ?>
             <?php } else {?>
               <?php echo  $results['designation'];  ?></p>
             <?php } ?>              
             <p class="title_doc"><strong>Degree - </strong><?php echo  $results['specialist'];  ?> </p>
             <p class="title_doc"><strong>Time - </strong><?php $time = $results['available_time'];
             $seltime="SELECT * FROM time_slot WHERE id='$time'"; 
             $avatime=$conn->query($seltime);
             if($avatime->num_rows > 0){
              while ($timeavailable = $avatime->fetch_assoc()) {
               echo  $timeavailable['time_duration'];
             }
           }else{
            echo "No Time";
          }
          
          ?> Without
          <?php if($results['Unavailable_days']==1){
            echo "FriDay";
          }else if($results['Unavailable_days']==2){
            echo "SaturDay";
          }else if($results['Unavailable_days']==3){
            echo "Sunday";
          }else if($results['Unavailable_days']==4){
            echo "Monday";
          }else if($results['Unavailable_days']==5){
            echo "Thusday";
          }else if($results['Unavailable_days']==6){
            echo "Wednesday";
          }else if($results['Unavailable_days']==7){
            echo "Thusday";
          }
          ?>  </p>
          <br>
          <div class="row">
           <a href="appoinment.php" class="btn btn-primary custdoctor_btn">Get Appointment </a> <a href="doctor's_details.php?id=<?php echo  $results['id']; ?>" class="btn btn-primary custdoctor_btn">View Details</a>
         </div>           

       </div>
     </div>
   </div>
 <?php } ?>
<?php } else { ?>
  <div class="col-md-6">

  </div>
<?php }?> 
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
