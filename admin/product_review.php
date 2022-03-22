<?php

require('top.php');


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
	$update_status_sql="update  produt_review set status='$status' where id='$id'";      //update status value by id 
	mysqli_query($con,$update_status_sql);
}

if($type=='delete')
	{
	$id=get_safe_value($con,$_GET['id']);      //delete by - id
	$delete_sql="delete from produt_review where id='$id'";
	mysqli_query($con,$delete_sql);
    }
    
 	
	}





	$sql=" SELECT user.name,review,rating,produt_review.status as rstatus,produt_review.added_on as pdate ,produt_review.id as rid ,product.name AS pname FROM product,user,produt_review WHERE product.id=produt_review.product_id AND user.id=user_id";

$res=mysqli_query($con,$sql);

?>
<div id="layoutSidenav_content">
<main>

<div class="container-fluid">

 <div class="row">  
     <div class="col-xl-12">
         <div class="card">
             <div class="card-body">
                 <h4 class="box-title">User Reviews</h4>
                 
             </div>
           </div>

             <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>User</th>
                            <th>product</th>
                            <th>Rating</th>
                            <th>Reviews</th>
                            <th>Date</th>
                            <th>Action</th>
                            <th></th>  
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i=1;
						while($row=mysqli_fetch_assoc($res)){
									?>
				 <tr>
                   <td><?php echo $i?></td>

				   <td><?php echo $row['name'] ?></td>
                   <td><?php echo $row['pname'] ?></td>
                   <td><?php echo $row['rating'] ?></td>
				   <td><?php echo $row['review'] ?></td>
				    <td><?php   $date_p=strtotime( $row['pdate']);
                       echo date('d M Y',$date_p); ?></td>
                    <td><?php if($row['rstatus']==1)
				{
				echo " <span class='mybadge green'><a style='color:#fff; text-decoration:none;' href='?type=status&operation=deactive&id=".$row['rid']."'>Active</a></span>";
					}else
				{
			  echo "<span class='mybadge or'><a style='color:#fff; text-decoration:none;'  href='?type=status&operation=active&id=".$row['rid']."'>Deactive</a></span>"; 
					}
				   //pasiing id in url
		     
			  ?></td>
              <td><?php echo "<span class='mybadge red'><a style='color:#fff; text-decoration:none;' href='?type=delete&id=".$row['rid']."'>Delete</a></span>&nbsp;"?></td>


             </tr>
              <?php $i++; } ?>
                 </tbody>
                </table> 
             </div>   
          </div>
      </div>
</main>
<?php
require('footer.php');
?>