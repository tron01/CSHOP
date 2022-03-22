<?php
require('top.php');
$order_id=get_safe_value($con,$_GET['id']);




?>
<style>
    #address_details{
	margin:10px;
}
</style>
<div id="layoutSidenav_content">
<main>
<div class="container-fluid">


 <div class="row">  
     <div class="col-xl-12">
         <div class="card">
             <div class="card-body">
                 <h4 class="box-title">Order Detail</h4>
				 <h4 class="box-title2"><a href="order__Success.php"> < Order </a></h4>
               
             </div>
			 </div>
             
             <table class="table">
                    <thead>
                        <tr>
                            <th>Product Name</th>
							<th>seller</th>
                            <th>Product Image</</th>
                            <th>Qty</th>
                            <th>Price</</th> 
                            <th>Total Price</</th>
                             
                        </tr>
                    </thead>
                    <tbody>
                    <?php
									$res=mysqli_query($con,"select distinct(order_details.id) ,order_details.*,product.name,product.seller_id,product.image,orders.address,orders.city,orders.pincode from order_details,product ,orders where order_details.order_id='$order_id' and  order_details.product_id=product.id GROUP by order_details.id");
									$total_price=0;
									
									$userInfo=mysqli_fetch_assoc(mysqli_query($con,"select * from orders where id='$order_id'"));


									
									$address=$userInfo['address'];
									$city=$userInfo['city'];
									$pincode=$userInfo['pincode'];
									
									while($row=mysqli_fetch_assoc($res)){
										$seller_id=$row['seller_id'];	
			                    
									$total_price=$total_price+($row['qty']*$row['price']);

                                  $seller_res=mysqli_query($con,"SELECT seller.name as sname FROM seller WHERE seller.id='$seller_id'");
                                  while($seller_row=mysqli_fetch_assoc($seller_res)){
									?>
                     <tr>
                     <td class="product-name"><?php echo $row['name']?></td>
					   <td><?php  echo $seller_row['sname']?></td>
						<td> <img style="width:90px;height:90px;" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']?>"></td>
						<td><?php echo $row['qty']?></td>
						<td><?php echo $row['price']?></td>
				        <td><?php echo $row['qty']*$row['price']?></td>
                     </tr>

                     <?php } } ?>
					<tr>
					<td colspan="3"></td>
					<td>Total Price</td>
					<td><?php echo $total_price?></td>
					</tr>
                     
                       </tbody>


                </table> 
                <div id="address_details">
							<strong>Address</strong>
							<?php echo $address?>, <?php echo $city?>, <?php echo $pincode?><br/><br/>
							<strong>Order Status</strong>
							<?php 
							$order_status_arr=mysqli_fetch_assoc(mysqli_query($con,"select order_status.name from order_status,orders where orders.id='$order_id' and orders.order_status=order_status.id"));
							echo $order_status_arr['name'];
							?>
							<br><br>
							<div>
                            <span style=" text-decoration: underline;"><b>User feedback</b></span><br>
								<?php $user_res=mysqli_query($con,"select user_order_review.msg,user.name  from user,user_order_review where order_id='$order_id' and user.id=user_order_review.user_id");
								 $user_row=mysqli_fetch_assoc($user_res);

								?>
								<div>
									<?php if(isset($user_row)){?>
                                    <span><b><?php echo $user_row['name'] ?></b>:<?php echo $user_row['msg']?></span><br>
                                    <?php } else {
										echo '<span> <small> User not reviewed yet.....</small></span>';
									}  ?>
                                </div>
							</div>
						</div>

         </div>
     </div>


     
 </main>

<?php
require('footer.php');
?>