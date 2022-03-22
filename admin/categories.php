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
	$update_status_sql="update categories set status='$status' where id='$id'";      //update status value by id 
	mysqli_query($con,$update_status_sql);
}

if($type=='delete')
	{
	$id=get_safe_value($con,$_GET['id']);      //delete by - id
	$delete_sql="delete from categories where id='$id'";
	mysqli_query($con,$delete_sql);
    }
    
 	
	}
	



$sql="select * from categories order by id  asc";

$res=mysqli_query($con,$sql);

?>
<div id="layoutSidenav_content">
<main>

<div class="container-fluid">
	
<div class="row">  
     <div class="col-xl-12">
         <div class="card">
             <div class="card-body">
                 <h4 class="box-title">Categories </h4>
                 <h4 class="box-title2"><a href="manage_categories.php"> Add Categories</a></h4>
             </div>
		</div>

		<table class="table ">
                                 <thead>
                                    <tr>
									   <th>ID</th>
                                       <th>categories</th>
									   <th>action</th>

                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
									$i=1;
                                      //to print a table in datbase
									while($row=mysqli_fetch_assoc($res)){
									?>
									<tr>
                                       
									   <td><?php echo $i?></td>
									    <td><?php echo $row['categories'] ?></td>
										
                                        <td><?php if($row['status']==1)
										{
											echo " <span class='mybadge green'><a style='color:#fff; text-decoration:none;' href='?type=status&operation=deactive&id=".$row['id']."'>Active</a></span>&nbsp;";
										}else
										{
										    echo " <span class='mybadge or'><a style='color:#fff; text-decoration:none;'  href='?type=status&operation=active&id=".$row['id']."'>Deactive</a></span>&nbsp;"; 
										}
							              echo "&nbsp;<span class='mybadge grey'><a style='color:#fff; text-decoration:none;' href='manage_categories.php?id=".$row['id']."'>Edit</a>&nbsp;</span>";  //pasiing id in url
										  
										  echo " &nbsp;<span class='mybadge red'><a style='color:#fff; text-decoration:none;' href='?type=delete&id=".$row['id']."'>Delete</a></span>&nbsp;";
										   ?></td>
										   
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