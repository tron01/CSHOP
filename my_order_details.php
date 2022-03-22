<?php
require('top_user.php');
if(!isset($_SESSION['USER_LOGIN'])){
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}
$order_id=get_safe_value($con,$_GET['id']);
?>

<div class="container-fluid a" style="background:#fff; padding-bottom: 10px;">
   
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="my_order.php">My orders</a></li>
        <li class="breadcrumb-item"><a href="#">Order Details</a></li>
      </ol>
    </nav>
  </div>
</nav> 
 
<table class="table">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Product Name</th>
                            <th>Qty</th> 
                            <th>Price</th>
                             
                            <th>Total Price</th>

                        </tr>
                    </thead>
                   
                    <tbody>
                    <?php
					    $uid=$_SESSION['USER_ID'];
						$res=mysqli_query($con,"select distinct(order_details.id) ,order_details.*,product.name,product.image from order_details,product ,orders where order_details.order_id='$order_id' and orders.user_id='$uid' and order_details.product_id=product.id");
						$total_price=0;
						while($row=mysqli_fetch_assoc($res)){
				      $total_price=$total_price+($row['qty']*$row['price']);
				     	?>
                    
                     <td><?php echo $row['name']?></td>
                     <td><img style="width:90px;height:90px;" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']?>"></td>
                     <td><?php echo $row['qty']?>
					
                     <td><?php echo  $row['price']?></td>
                     <td><?php echo  $row['qty']*$row['price']?></td> 
                     
                     </tr>
                     <?php } ?>
                     <tr>
                     <td colspan="3"></td>
						<td>Total Price</td>
						<td><?php echo $total_price?></td>
                     </tr>
                       </tbody>
              
                </table> 



</div>

<?php
require('footer_user.php');
?>
