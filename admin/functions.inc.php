<?php 
 
 function pr($arr){
     echo '<pre>';
     print_r($arr);


 }

 function prx($arr){
    echo '<pre>';
    print_r($arr);
    die();
	}

function get_safe_value($con,$str)
{
		
 	if($str!='')
	{   
        $str=trim($str);
		return mysqli_real_escape_string($con,$str);
		
	}
}

function productSoldQtyByProductId($con,$pid){
	$sql="select sum(order_details.qty) as qty from order_details,`orders` where `orders`.id=order_details.order_id and order_details.product_id=$pid and `orders`.order_status!=4 and ((`orders`.payment_type='payu' and `orders`.payment_status='success') or (`orders`.payment_type='COD' and `orders`.payment_status!=''))";
	$res=mysqli_query($con,$sql);
	$row=mysqli_fetch_assoc($res);
	return $row['qty'];
}

function productQty($con,$pid){
	$sql="select qty from product where id='$pid'";
	$res=mysqli_query($con,$sql);
	$row=mysqli_fetch_assoc($res);
	return $row['qty'];
}


?>