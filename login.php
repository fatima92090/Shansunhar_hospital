
<?php 
include "lib/connection.php";

session_start();
if(isset($_SESSION['login_user'])){
  if($_SESSION['login_user']==1){
    header("location:./dashboard.php");
  }
}else{
  if(isset($_COOKIE['cookiename'])){
    if($_COOKIE['cookiename']==true){
      header("location:./dashboard.php");
    }
  }
}

$queries = array();
parse_str($_SERVER['QUERY_STRING'], $queries);

$resultecho= "";
$user_type="";
if(isset($queries['user_type'])){
  $user_type=$queries['user_type'];
}



 if(isset($_POST["btn_ADlogin"])){
  $email=$_POST['email1'];
  $password=$_POST['password1'];
  $loogged=isset($_POST['keep_loogin']) ? 1 : 0;


  $selectall = "SELECT * FROM `user_admins` WHERE `email`='$email' AND `pass`='$password'";
  $result = $conn->query($selectall);
  if($result->num_rows > 0) {
    while($results=$result->fetch_assoc()){
      $_SESSION['login_user_name']=$results['full_name'];
      $_SESSION['user_id']="";
      $_SESSION['login_user']=1;
      $_SESSION['user_type'] = 'AD';
      $usertype =  $results['user_type']; 
      $cookievalue=$results['full_name'];
      if($loogged==1){
        setcookie('cookiename',$cookievalue,time()+(60*60*24*1),'/');
      }

      $query = array('username' => $results['full_name'],
      'id' => $results['id'],
        'user_type' => $results['user_type']);
      $queryall =http_build_query($query);
      header("location:./dashboard.php?$queryall");
    }
  }else{
    $resultecho= "Login Failed!";
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
</head>
<body>

  <header>
   <!-- HEARDER START -->
   <?php include("index_header.php");?>
   <!-- HEARDER END -->
 </header>

 <!-- header end -->



 <section class="page-content">
  <div class="container"> 
    <div class="row login_box shadow-lg p-3 mb-5 bg-white rounded"> 
      <?php if($user_type=="DC"){?>    
        <form style="margin: 0 auto;"  action="<?php echo $_SERVER['PHP_SELF'] . '?user_type=' . $user_type; ?>"  method="post" >
          <input type="hidden" name="user_type" value="<?php $user_type ?>">
          <h5 style="margin-bottom: 25px;">Doctor's Login</h5>
          <div class="form-group row">
            <label for="email1">Email</label>
            <input type="email" name="email1" class="form-control">
          </div>
          <div class="form-group row">
            <label for="password1">password</label>
            <input type="password" name="password1" class="form-control">
          </div>
          <div class="form-group row">
           <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="keep_loogin" value="">Keep me Logged in
          </label>
        </div>
        <button type="submit" class="btn cust_btnappoinment mt-5 mb-5" name="btn_DClogin">Log in</button>

        <?php echo $resultecho?>
      </form>
    <?php } ?>
    <?php if($user_type=="AD"){?>    
      <form style="margin: 0 auto;" action="<?php echo $_SERVER['PHP_SELF'] . '?user_type=' . $user_type; ?>"  method="post" >
        <input type="hidden" name="user_type" value="<?php $user_type ?>">
        <h5 style="margin-bottom: 25px;">Admin's Login</h5>
        <div class="form-group row">
          <label for="email1">Email</label>
          <input type="email" name="email1" class="form-control">
        </div>
        <div class="form-group row">
          <label for="password1">password</label>
          <input type="password" name="password1" class="form-control">
        </div>
        <div class="form-group row">
         <label class="form-check-label">
          <input type="checkbox" class="form-check-input"  name="keep_loogin" value="">Keep me Logged in
        </label>
      </div>
      <button type="submit" class="btn cust_btnappoinment mt-5 mb-5" name="btn_ADlogin">Log in</button>

      <?php echo $resultecho?>
    </form>
  <?php } ?>
  <?php if($user_type=="PT"){?>    
    <form style="margin: 0 auto;"  action="<?php echo $_SERVER['PHP_SELF'] . '?user_type=' . $user_type; ?>"  method="post" >
      <input type="hidden" name="user_type" value="<?php $user_type ?>">
      <h5 style="margin-bottom: 25px;">Patain's Login</h5>
      <div class="form-group row">
        <label for="mobile">Mobile Number</label>
        <input type="text" name="mobile" class="form-control">
      </div>      
      <div class="form-group row">
       <label class="form-check-label">
        <input type="checkbox" class="form-check-input" name="keep_loogin" value="">Keep me Logged in
      </label>
    </div>
    <button type="submit" class="btn cust_btnappoinment mt-5 mb-5" name="btn_PTlogin">Log in</button>

    <?php echo $resultecho?>
  </form>
<?php } ?>      
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


