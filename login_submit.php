<?php
require('connection.inc.php');
require('functions.inc.php');

$email=get_safe_value($con,$_POST['email']);
$password=get_safe_value($con,$_POST['password']);

$res=mysqli_query($con,"select * from user where email='$email' and password='$password'");
$check_user=mysqli_num_rows($res);
if($check_user>0){
print "valid";
$row=mysqli_fetch_assoc($res);

$_SESSION['USER_LOGIN']='yes';
$_SESSION['USER_ID']=$row['id'];
$_SESSION['USER_NAME']=$row['name'];

}else{
print"wrong";
}
?>

  
