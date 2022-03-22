<?php
require('top.php');

$sql="select * from users orders by id desc";
$res=mysqli_query($con,$sql);
?>
<div id="layoutSidenav_content">
<main>
<div class="container-fluid">


 <div class="row">  
     <div class="col-xl-12">
         <div class="card">
             <div class="card-body">
                 <h4 class="box-title">Orders Completed</h4>
               
             </div>
			 </div>
             
             <table class="table">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Order Date</th>
                            <th>Address</th>
                            <th> Payment Type</th> 
                            <th>Payment Status</th>
                            <th> Order Status</th>      
                        </tr>
                    </thead>
                    <tbody>
                    <?php
					$res=mysqli_query($con,"select orders.*,order_status.name as order_status from orders,order_status where  orders.order_status=5 and  order_status.id=orders.order_status");
						while($row=mysqli_fetch_assoc($res)){
						?>
                     <tr>
                     <td>
                         <a href="order_success_det.php?id=<?php echo $row['id']?>"><span class="btn btn-danger">
                         <?php echo $row['id']?><span> 
                         </a>
                </td>
                     <td><?php $date_p=strtotime( $row['added_on']);
                      echo date('d M Y',$date_p);   ?></td> 
                     <td>
                         <?php echo $row['name']?><br/>
                         <?php echo $row['address']?><br/>
                         <?php echo $row['city']?><br/>
                          <?php echo $row['pincode']?><br>
                         ph: <?php echo $row['mobile']?><br/>
                    
                    </td>
                       
                     <td><?php echo $row['payment_type']?></td>
                     <td><?php echo $row['payment_status']?></td>
                     <td><?php echo $row['order_status']?></td>
                     </tr>
                     <?php } ?>
                       </tbody>
                </table> 
            
         </div>
     </div>
 </main>

<?php
require('footer.php');
?>