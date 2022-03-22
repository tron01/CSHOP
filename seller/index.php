<?php
/*login page of seller*/ 
require('connection.php');
require('functions.php');

$msg="";

if(isset($_POST['submit']))
{

$name=get_safe_value($con,$_POST['name']);
$pass= get_safe_value($con,$_POST['password']);


$sql="select * from seller where name='$name' and password='$pass'";//check login detiles are matched to database
$res=mysqli_query($con,$sql);
$num=mysqli_num_rows($res);

while($row=mysqli_fetch_assoc($res)){
   $seller_id=$row['id'];
}

if($num>0){

   $_SESSION['SELLER_LOGIN']=$seller_id;
   $_SESSION['SELLER_NAME']=$name;
header('location:product.php');
die();

}else{
   $msg="please enter the correct detiales";
}


}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SELLER</title>
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
    
</head>
<body class="bg-dark">
      

<div class="row">
   <div class="container">
      <h4>Seller Login</h4>
   </div>
</div>

    
<div class="sufee-login d-flex align-content-center flex-wrap">
         <div class="container">
            <div class="login-content">
               <div class="login-form mt-150">
                  <form method="POST">
                     <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="name"   class="form-control" placeholder="Email"
                         required>
                     </div>
                     <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                     </div>
                     <button type="submit" name="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
					</form>
                 <div class="field_error"><?php echo $msg ?></div>           
			</div>
            </div>
         </div>
      </div>
</body>
</html>