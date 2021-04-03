
<?php

include "lib/connection.php";



$selectQuery = "SELECT * FROM departmet";
$result_all = $conn->query($selectQuery);

$result="";
$pataint_serialNo="";
//$det_name="";
if(isset($_POST["btn_appoinment"])){
  $departmet_name=$_POST['dept_name'];
  $dept_docName=$_POST['doct_name'];
  $appoinment_date = $_POST['appoinment_date'];
  $mobile=$_POST['mobile'];
  $patient_name=$_POST['patient_name'];
  $patient_age = $_POST['patient_age'];

  $insertpataint_info="INSERT INTO pataint_info(pataint_name,pataint_mobile,pataint_age,appointment_date,doctor_id,doctor_department_id)
 VALUES('$patient_name','$mobile',$patient_age,'$appoinment_date','$dept_docName','$departmet_name') ";

 if($conn->query($insertpataint_info)){
  $pataint_id = $conn->insert_id;

  $selectserial= "SELECT serial_no  FROM `doctor_pataints` WHERE doctor_id= '$dept_docName' ";
  $res=$conn->query($selectserial);
  if($res->num_rows > 0 ){
    $resss=$res->fetch_assoc();
      $pataint_serialNo = $resss['serial_no']+1;
      // if($res['serial_no']=="" ||$res['serial_no'] == null){
      //   $pataint_serialNo=0+1;
      // }
      // else{
      //   $pataint_serialNo=$res+1;
      // }
    //}
  }else{
    $pataint_serialNo=0+1;
  }

  $insertdoctor_pataints="INSERT INTO doctor_pataints(serial_no,doctor_id,pataint_id,pataint_name,appointment_date)
  VALUES($pataint_serialNo,'$dept_docName','$pataint_id','$patient_name','$appoinment_date') ";
  $resdoctor_pataints= $conn->query($insertdoctor_pataints);
  if($resdoctor_pataints){
    $result=" You can login using your mobile number".  $mobile . "to see,  which serial number patient is checking by doctor. <br>
    Thank you.";
  }else{
    $result="Data not instert successfully.";
    die($conn->error);
  }
 }
 else{
  $result="Data not instert successfully.";
  die($conn->error);
 }


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

  <script type="text/javascript">
    function myFunction(event){
      $.ajax({
        type: "POST",
        dataType: 'JSON',
        url: "dept_doctor_list.php",
        data: { "x" : event.target.value },

        success: function(response) {
          $('select[name=doct_name]').empty();
          var len= response.length;          
          for(var i=0; i<len; i++){
            var id=response[i].id;
            var name= response[i].name;
            if(id!=undefined && name!=undefined) {
              $('select[name=doct_name]').append('<option  value="'+ id +  '">' + name + '</option>');
            }else{
              var val= " No Doctor ";
              $('select[name=doct_name]').append('<option >' + val + '</option>');
            }          
          }       
           
          }
        });

    }

  </script>
</head>
<body>

  <header>
   <!-- HEARDER START -->
   <?php include("index_header.php");?>
   <!-- HEARDER END -->
 </header>

 <!-- header end -->

 <section class="appoinment_content">
  <div class="container"> 
    <div class="row appoinment_header">
      <h3>Make a appoinment</h3>
    </div>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
      <div class="row appoint_box shadow-lg p-3 mb-5 bg-white rounded">

       <div class="col-md-6 doctor_selection">
        <h5>Selection Area</h5>
        <div class="form-group row">
          <label for="department" class="col-md-5 col-form-label">Select Department</label>
          <div class="col-md-6">
            <select id="mySelect" name="dept_name" class="form-control" onchange="myFunction(event)" required>
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
        <div class="form-group row">
          <label for="department" class="col-md-5 col-form-label">Select Doctor</label>
          <div class="col-md-6">
            <select name="doct_name" class="form-control" required>
              <option >Choose...</option>
              
          </select>
        </div>
      </div>
      <div class="form-group row">
       <label for="department" class="col-md-5 col-form-label">Select Date</label>
       <div class="col-md-6">
       <input  type="date" value="" class="form-control" name="appoinment_date" required style="padding-right: 0;">        
    </div>
  </div>     

</div>
<div class="offset-md-1 col-md-5 pataint_info">
  <h5>Patient's Details</h5>
  <div class="form-group row">
    <label for="mobile" class="col-md-5 col-form-label">Phone Number</label>
    <div class="col-md-7">
      <input type="number" class="form-control" name="mobile" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="patient_name" class="col-md-5 col-form-label">Patient's Name</label>
    <div class="col-md-7">
      <input type="text" class="form-control" name="patient_name" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="patient_age" class="col-md-5 col-form-label">Patient's Age</label>
    <div class="col-md-7">
      <input type="number" class="form-control" name="patient_age" required>
    </div>
  </div>
  
</div> 
<button class="btn cust_btnappoinment mt-5 mb-5" name="btn_appoinment" data-toggle="modal" data-target="#exampleModalCenter">Make a appoinment</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Your Serial Number is <?php echo $pataint_serialNo ?></h5>
      
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php echo $result ?>       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn cust_btnappoinment" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>

</div>
</form>

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
<script type="text/javascript">
  // $(".form_datetime").datetimepicker({
  //   format: "dd MM yyyy - hh:ii"
  // });
</script>
</body>
</html>

