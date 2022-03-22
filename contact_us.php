
<?php
require('top_user.php');
?>


<div class="container-fluid bg-light"> 
    
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="#">contact us</a></li>
      </ol>
    </nav>
  </div>
</nav>  



<div class="row">

<div class="col-lg-6">
    <form role="form" method="post" action="register.php">
        <fieldset>
            <p class="text-uppercase pull-center"> Contact US:</p>

            <div class="form-group">
            <input type="text" id="name"  class="form-control input-lg" placeholder="Your Name*">
                    <span class="text-danger" id="rname_error"></span>
            </div>

            <div class="form-group">
            <input type="email" id="email" class="form-control input-lg"  placeholder="Email*">
										
                    <span class="text-danger" id="remail_error"></span>
            </div>

            <div class="form-group">
            <input type="text" id="mobile" class="form-control input-lg" maxlength="10"  placeholder="Mobile*">
                    <span class="text-danger" id="rmobile_error"></span>
            </div>
            <div class="form-group">
            <textarea  id="message"  class="form-control input-lg" placeholder="Your Message"></textarea>
            </div>
            <input type="button" onclick="send_message()" class="btn btn-lg btn-primary" value="Send Message"><br>
            <span class="text-danger" id="register_error"></span>
            <br><br>
        </fieldset>
    </form>
</div>
</div>










</div>
<?php
require('footer_user.php');
?>
