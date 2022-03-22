<?php
require('top_user.php');



if(!isset($_SESSION['USER_LOGIN'])){
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}




?>

<div class="container-fluid a" style="background:#fff;">
   
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="#">My orders</a></li>
      </ol>
    </nav>
  </div>
</nav> 
 
<table class="table">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Order Date</th>
                            <th>Address</th> 
                            <th>Payment Type</th>
                             
                            <th>Order Status</th>

                        </tr>
                    </thead>
                   
                    <tbody>
                    <?php
						$uid=$_SESSION['USER_ID'];

						$res=mysqli_query($con,"select `orders`.*,order_status.name as order_status_str from `orders`,order_status where `orders`.user_id='$uid' and order_status.id=`orders`.order_status");
						if(mysqli_num_rows($res)>0){
            while($row=mysqli_fetch_assoc($res))
                            {
						?>
                     <tr>
                    
                     <td><span class="btn btn-danger"><a href="my_order_details.php?id=<?php echo $row['id']?>"> <?php echo $row['id']?></a></span></td>
                     <td><?php  
                     $date_p=strtotime( $row['added_on']);
                     echo date('d M Y',$date_p);?>
                     </td>
                     <td>
                     <?php echo $row['name']?><br/>
                      <?php echo $row['address']?><br/>
					            <?php echo $row['city']?><br/>
						           <?php echo $row['pincode']?><br>
                       ph: <?php echo $row['mobile']?><br/>

                    
                    </td>
                     <td><?php echo $row['payment_type']?></td>
                               
                     <td><?php echo $row['order_status_str'];if($row['order_status_str']=="Canceled"){ ?>
                      <?php  $order_ids=$row['id'];
                        $seller_res=mysqli_query($con,"select order_review.msg,seller.name from seller,order_review where order_review.order_id='$order_ids'"); ?>
                    <br><span><?php  $seller_row=mysqli_fetch_assoc($seller_res) ?>
                   <b> <?php  echo $seller_row['name']; ?> </b> : <small class="text-muted"> <?php  echo $seller_row['msg']; ?></small>
                   
                      </span><?php  }else if($row['order_status_str']=="Complete"){ ?><br><form method="post">
                        <small class="text-muted">Write a review</small>
                        <br><input type="text" name="user_odr_review">
                        <button class="btn btn-info" name="user_order_msg">Submit</button>
                      </form>
    <?php                
    
  if(isset($_POST['user_order_msg']))  {

$user_msg=$_POST['user_odr_review'];

$order_ids=$row['id'];
$usr_id=$_SESSION['USER_ID'];

$user_res=mysqli_query($con,"select * from user_order_review where order_id='$order_ids'"); //checking   
$check=mysqli_num_rows($user_res);

 if($check>0)
  {
  mysqli_query($con,"update user_order_review  set msg='$user_msg'");
                
  }else{
mysqli_query($con,"INSERT INTO user_order_review (order_id,user_id,msg)VALUES('$order_ids','$usr_id','$user_msg')");
}


}
 ?>
                    </td> 
                     
                    </tr>
                     <?php }} ?>
                      <br>
                     <?php }else{echo '<td><h5 class="text-info">No Orders yet</h5></td>';}?>

                      
                       </tbody>

                     
                </table> 


<br>
<br>
<br>
<br>
</div>

<?php
require('footer_user.php');
?>
