<?php
require('connection.php');
require('functions.php');


$comment=get_safe_value($con,$_POST['message']);

$user_id=$_SESSION['SELLER_LOGIN'];
$added_on=date('Y-m-d h:i:s');

$sql="select * from seller,seller_complaints where seller.id='$user_id'";
$res=mysqli_query($con,$sql);
$num=mysqli_num_rows($res);
if($num>0){

    $update_sql="update seller_complaints set mssg='$comment'";
    mysqli_query($con,$update_sql);
    
echo "updated Thank you";

}else{
    mysqli_query($con,"insert into seller_complaints (seller_id,mssg,date) values('$user_id','$comment','$added_on')");
    echo "Thank you";
}



?>