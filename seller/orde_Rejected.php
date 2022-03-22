<?php
require('top.seller.php');


$order_id=get_safe_value($con,$_GET['id']);
$seller_id=$_SESSION['SELLER_LOGIN'];

if(isset($_POST['seller_sub'])){
	$seller_msg=$_POST['seller_msg'];


	
	$res=mysqli_query($con,"select * from order_review where order_id='$order_id'"); //checking   
	$check=mysqli_num_rows($res);
	
   if($check>0)
    {
    mysqli_query($con,"update order_review  set msg='$seller_msg'");
		              
    }else{
	mysqli_query($con,"INSERT INTO order_review (order_id,seller_id,msg)VALUES('$order_id','$seller_id','$seller_msg')");
	}
	
}

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
				 <h4 class="box-title2"><a href="orders_Rejected.php"> < Order </a></h4>
               
             </div>
			 </div>
             
             <table class="table">
                    <thead>
                        <tr>

                            <th>Product Name</th>
							<th>Seller</th>
                            <th>Product Image</</th>
                            <th>Qty</th>
                            <th>Price</</th> 
                            <th>Total Price</</th>
                             
                        </tr>
                    </thead>
                    <tbody>
                    <?php      
                                    $seller=$_SESSION['SELLER_LOGIN'];
									$res=mysqli_query($con,"select distinct(order_details.id),order_details.*,seller.name as sname,product.name,product.seller_id,product.image,orders.address,orders.city,orders.pincode from order_details,product,seller,orders where order_details.order_id='$order_id' and  order_details.product_id=product.id and  order_details.seller_id='$seller'  and seller.id='$seller'    GROUP by order_details.id");
									$total_price=0;
									
									$userInfo=mysqli_fetch_assoc(mysqli_query($con,"select * from orders where id='$order_id'"));


									
									$address=$userInfo['address'];
									$city=$userInfo['city'];
									$pincode=$userInfo['pincode'];
									
									while($row=mysqli_fetch_assoc($res)){
										$seller_id=$row['seller_id'];	
			                    
									$total_price=$total_price+($row['qty']*$row['price']);
                                   
                                 
									?>
                     <tr>
                     <td class="product-name"><?php echo $row['name']?></td>
					   
					 
					 <td><?php echo $row['sname']?></td>



						<td> <img style="width:90px;height:90px;" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']?>"></td>
						<td><?php echo $row['qty']?></td>
						<td><?php echo $row['price']?></td>
				        <td><?php echo $row['qty']*$row['price']?></td>
                     </tr>

                     <?php }  ?>
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
								<form method="post">
									<span><b>Seller msg</b>:</span><br>
									<input type="text" name="seller_msg"class="form-control"><br>
									<input type="submit" name="seller_sub" class="btn btn-info"/>
								</form>
							</div>
						</div>

         </div>
     </div>


     
 </main>

<?php
require('footer.seller.php');
?>