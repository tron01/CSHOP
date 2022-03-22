<?php
require('top.seller.php');

if(isset($_GET['type']) &&  $_GET['type']!=''){
	$type=get_safe_value($con,$_GET['type']);  //passing type value  for checking 


if($type=='status')
{
	$operation=get_safe_value($con,$_GET['operation']);  //pass opertion valuee for checking 
	$id=get_safe_value($con,$_GET['id']);
	
 	if($operation=='active')
	{ 
	   	$status='1';
	}else
	{
		$status='0';
	}
	$update_status_sql="update product set status='$status' where id='$id'";      //update status value by id 
	mysqli_query($con,$update_status_sql);
}

if($type=='delete')
	{
	$id=get_safe_value($con,$_GET['id']);       //delete by - id
	$delete_sql="delete from product where id='$id'";
	mysqli_query($con,$delete_sql);
    }
}
$seller=$_SESSION['SELLER_LOGIN'];
$sql="select seller.name as sname,seller.id,product.*,categories.categories from seller,product,categories where product.categories_id=categories.id AND product.seller_id=seller.id AND seller_id='$seller' order by seller.id asc";

$res=mysqli_query($con,$sql);
?>

<div id="layoutSidenav_content">
<main>


<div class="container-fluid">

<div class="row">  
     <div class="col-xl-12">
         <div class="card">
             <div class="card-body">
                 <h4 class="box-title">Products </h4>
                 <h4 class="box-title2"><a href="manage_products.php"> Add Products</a></h4>
             </div>
		</div>





             <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>categories</th>
							
							<th>Name</th>
                            <th>Image</th>  
                            <th>MRP</th>  
                            <th>Qty</th>
                            <th>Action</th> 
                                                      
                        </tr>
                    </thead>
                    <tbody>
                                    <?php
                                     $i=1;
									while($row=mysqli_fetch_assoc($res)){
									?>
									<tr>
                                      
									   <td><?php echo $i ?></td>
									    <td><?php echo $row['categories'] ?></td>
										
										 <td><?php echo $row['name'] ?></td>
										  <td><img style="max-width: 30px;margin-right: 10px;" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image'] ?>"/></td>
										   <td><?php echo $row['price'] ?></td>
											 <td><?php echo $row['qty'] ?></td>
											  <td><?php 
											  if($row['status']==1)
											  {
												echo"<span class='mybadge green'><a style='color:#fff; text-decoration:none;' href='?type=status&operation=deactive&id=".$row['id']."'>Active</a></span>&nbsp;";
										      }else{
												echo " <span class='mybadge or'><a style='color:#fff; text-decoration:none;' href='?type=status&operation=active&id=".$row['id']."'>Deactive</a></span>&nbsp;";  
										            }
													echo "&nbsp;<span class='mybadge grey'><a style='color:#fff; text-decoration:none;' href='manage_products.php?id=".$row['id']."'>Edit</a></span>";  //pasiing id in url
													echo "&nbsp;<span class='mybadge red'><a style='color:#fff; text-decoration:none;' href='?type=delete&id=".$row['id']."'>Delete</a></span>&nbsp;";
										 ?></td>
                                    </tr>
            					  <?php $i++;} ?>
                                   </tbody>
                       </tbody>
                </table> 
				</div>           
     </div>
</div>

</main>
<?php
require('footer.seller.php');
?>