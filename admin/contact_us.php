<?php

require('top.php');

if(isset($_GET['type']) &&  $_GET['type']!='')
{
	$type=get_safe_value($con,$_GET['type']);  //passing type value  for checking 

if($type=='delete')
	{
	$id=get_safe_value($con,$_GET['id']);      //delete by - id
	$delete_sql="delete from contact_us where id='$id'";
	mysqli_query($con,$delete_sql);
    }
     	
}
	$sql="select * from contact_us order by id  asc";

$res=mysqli_query($con,$sql);

?>
<div id="layoutSidenav_content">
<main>

<div class="container-fluid">

 <div class="row">  
     <div class="col-xl-12">
         <div class="card">
             <div class="card-body">
                 <h4 class="box-title">Contact us </h4>
                 
             </div>
           </div>

             <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Comment</th>
                            <th>Date</th>
                            <th>action</th>

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
				   <td><?php echo $row['comment'] ?></td>
				   <td><?php   $date_p=strtotime( $row['added_on']);
                    echo date('d M Y',$date_p); ?></td>
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