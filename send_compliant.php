<?php
require('connection.inc.php');
require('functions.inc.php');


$comment=get_safe_value($con,$_POST['message']);

$user_id=$_SESSION['USER_ID'];
$added_on=date('Y-m-d h:i:s');

mysqli_query($con,"insert into user_complaints (user_id,mssg,date) values('$user_id','$comment','$added_on')");
echo "Thank you";
?>