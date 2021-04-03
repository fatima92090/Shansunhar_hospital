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

 <section class="contact">
  <div class="container"> 
    <div class="row">
    <div class="col-md-8">
      <div class="row">
        <div class="col-12 mb-4">
          <h3>Send Message</h3>
        </div>
        <div class="col-12">
          <form action="" method="post" role="form" class="contactForm">
            <div id="sendmessage">Your message has been sent. Thank you!</div>
            <div id="errormessage"></div>
            <div class="row">
              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validation"></div>
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <div class="form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validation"></div>
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                  <div class="validation"></div>
                </div>
              </div>
              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                  <div class="validation"></div>
                </div>
              </div>
              <div class="col-md-12">
                <button type="submit" class="button button-a button-big button-rouded">Send Message</button>
              </div>
            </div>
          </form>
        </div>

      </div>
    </div>
    <div class="col-md-4">
      <div class="row contact_address">
        <div class="col-12 mb-3">        
          <h3>Contact</h3>
        </div>
      </div>
      <div class="row contact_address">
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><i class="fas fa-globe contact-side-icon iside-icon-contact"></i> Saturia-Daragram Road, Saturia Bazer, Saturia.</li>
          <li class="list-group-item"><i class="fas fa-phone-square contact-side-icon iside-icon-contact"></i>01985272110</li>
          <li class="list-group-item"><i class="fas fa-envelope-square contact-side-icon iside-icon-contact"></i> <p> sneyehospital1.com </p></li>
         
          
        </ul>
      </div>

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
<script src="contactform/contactform.js"></script>   
<script src="js/script.js"></script>
</body>
</html>
