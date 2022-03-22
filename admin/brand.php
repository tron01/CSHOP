<?php
require('top.php');

$sql="select * from brand";
$res=mysqli_query($con,$sql);

if(isset($_GET['type']) &&  $_GET['type']!=''){
	$type=get_safe_value($con,$_GET['type']); 
if($type=='delete')
	{
	$id=get_safe_value($con,$_GET['id']);       //delete by - id
	$delete_sql="delete from brand where id='$id'";
	mysqli_query($con,$delete_sql);
    }
}
    

?>

<div id="layoutSidenav_content">
<main>
<div class="container-fluid">


 <div class="row">  
     <div class="col-xl-12">
         <div class="card">
             <div class="card-body">
                 <h4 class="box-title">Brands</h4>
                 <h4 class="box-title2"><a href="manage_brands.php"> Add Brands</a></h4>
             </div>
			 </div>
             
             <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Brands</th>
                            <th>Website</th> 
                            <th>description</th>  
                            <th>action</th>
     
                        </tr>
                    </thead>
                    <tbody>
                     <tr>
                         <?php
                     $i=1;
			while($row=mysqli_fetch_assoc($res))
            {?>
                     <td><?php echo $i?></td>
                     <td><?php echo $row['name'] ?></td>
                     <td><?php echo $row['website'] ?></td> 
                    <td><?php echo $row['description'] ?></td> 
                     <td><?php echo "&nbsp;<span class='mybadge red'><a style='color:#fff; text-decoration:none;' href='?type=delete&id=".$row['id']."'>Delete</a></span>&nbsp;"; ?></td>
                     </tr> <?php
                    $i++;}?>
                       </tbody>
                </table> 
            
         </div>
     </div>
 </main>

<?php
require('footer.php');
?>