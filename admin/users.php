<?php

require('top.php');

if(isset($_GET['type']) &&  $_GET['type']!='')
{
	$type=get_safe_value($con,$_GET['type']);  //passing type value  for checking 

if($type=='delete')
	{
	$id=get_safe_value($con,$_GET['id']);      //delete by - id
	$delete_sql="delete from user where id='$id'";
	mysqli_query($con,$delete_sql);
    }
     	
}
	$sql="select * from user order by id  asc";

$res=mysqli_query($con,$sql);

?>
<div id="layoutSidenav_content">
<main>
<div class="container-fluid">


 <div class="row">  
     <div class="col-xl-12">
         <div class="card">
             <div class="card-body">
                 <h4 class="box-title">Users</h4>
               
             </div>
             </div>
             
             <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Date </th>
                            <th>Action</th>        
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
										<td><?php echo $row['email'] ?></td>
										<td><?php echo $row['mobile'] ?></td>
										<td><?php  $date_p=strtotime( $row['added_on']);
                                        echo date('d M Y',$date_p);             
                                         ?></td>
                                        <td>
										<?php
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