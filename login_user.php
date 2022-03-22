<?php

require('top_user.php');



?>
<div class="container-fluid bg-light"> 
    
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="login_user.php">login</a></li>
      </ol>
    </nav>
  </div>
</nav>  



      <div class="row">

                <div class="col-md-5">
                    <form role="form" method="post" action="register.php">
                        <fieldset>
                            <p class="text-uppercase pull-center"> SIGN UP:</p>

                            <div class="form-group">
                                <input type="text" name="username" id="r_name" class="form-control input-lg"
                                    placeholder="username">
                                    <span class="text-danger" id="rname_error"></span>
                            </div>

                            <div class="form-group">
                                <input type="email" name="email" id="r_email" class="form-control input-lg"
                                    placeholder="Email Address">
                                    <span class="text-danger" id="remail_error"></span>
                            </div>

                            <div class="form-group">
                                <input type="mobile" name="mobile" id="r_mobile" class="form-control input-lg"
                                    placeholder="mobile" maxlength="10">
                                    <span class="text-danger" id="rmobile_error"></span>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" id="r_password" class="form-control input-lg"
                                    placeholder="Password">
                                    <span class="text-danger" id="rpassword_error"></span>
                            </div>
                            <input type="button" id="register" class="btn btn-lg btn-primary" value="Register"><br>
                            <span class="text-danger" id="register_error"></span>
                            <br><br>
                        </fieldset>
                    </form>
                </div>

                <div class="col-md-2">
                    <!-------null------>
                </div>

                <div class="col-md-5">
                    <form action="" method="post">
                        <fieldset>
                            <p class="text-uppercase"> Login using your account: </p>

                            <div class="form-group">
                                <input type="text" name="name" id="name" class="form-control input-lg"
                                    placeholder="Email" required>
                                
                                    <span class="text-danger" id="name_error"></span>

                            </div>
                            <input type="password" name="pass" id="login_password" class="form-control input-lg"
                                placeholder="Password" required>
                                
                                <span class="text-danger" id="pass_error"></span><br>

                            <input type="button" id="user_login" class="btn btn-md btn-success" value="Sign In"><br>
                            <span class="text-danger" id="login_error"></span>
                        </fieldset>
                    </form>
                </div>
        </div>
    </div>
</div>


<?php require('footer_user.php');?>