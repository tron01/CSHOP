<?php
/*login page of admin*/ 
require('connection.inc.php');
require('functions.inc.php');

$msg='';

if(isset($_POST['submit'])){ //on pressing submit in login form detiles are passed 
	  $username=get_safe_value($con,$_POST['username']); //get username
 $password=get_safe_value($con,$_POST['password']);	



$sql="select *from admin_users where username='$username' and password='$password'";//check login detiles are matched to database
$res=mysqli_query($con,$sql);
$count=mysqli_num_rows($res);

if($count>0){  //only if anny row exists
	
	$_SESSION['ADMIN_LOGIN']='yes';   //for seting defalult page
	$_SESSION['ADMIN_USERNAME']=$username;
	header('location:dashboard.php');
        die();
	}
	else{
	$msg=" please enter the corret login detiles";
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
    
</head>
<body class="bg-dark">
      

<div class="row">
   <div class="container">
      <h4>Admin Login</h4>
   </div>
</div>

    
<div class="sufee-login d-flex align-content-center flex-wrap">
         <div class="container">
            <div class="login-content">
               <div class="login-form mt-150">
                  <form method="POST">
                     <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username"   class="form-control" placeholder="Email"
                         required>
                     </div>
                     <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                     </div>
                     <button type="submit" name="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
					</form>
                 <div class="field_error"><?php  echo $msg	?></div>           
			</div>
            </div>
         </div>
      </div>
</body>
</html>