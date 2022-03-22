<?php

require('top.php');


	$sql="select * from seller,seller_complaints where seller.id=seller_complaints.seller_id  ";

$res=mysqli_query($con,$sql);

?>
<div id="layoutSidenav_content">
<main>

<div class="container-fluid">

 <div class="row">  
     <div class="col-xl-12">                           

         <div class="card">
             <div class="card-body">
                 <h4 class="box-title"> Seller complaints </h4>
                 
             </div>
           </div>

             <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            
                            <th>Comment</th>
                            <th>Date</th>
                            <th>action</th>
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
				   
				   <td><?php echo $row['mssg'] ?></td>
				   <td><?php   $date_p=strtotime( $row['date']);
                   echo date('d M Y',$date_p); ?></td>
             
             <td>  
             
             <form method="post">
            
             <input class='form-control bt-mr-5' type='text' name="mssg" placeholder='enter your replay'>

            <button type="submit" class="btn btn-info" name="feedback_btn">submit </button>

            </form>

            <?php
         
         if(isset($_POST['feedback_btn']))  {
          
            $cmp_id=$row['complaint_id'];
            $feedback=$_POST['mssg'];
            $date=date('Y-m-d h:i:s');
            $status='1';


            $user_res=mysqli_query($con,"select * from seller_com_feeback where comp_id='$cmp_id'"); //checking   
$check=mysqli_num_rows($user_res);

 if($check>0)
  {
  mysqli_query($con,"update seller_com_feeback  set message='$feedback'");
                
  }else{
    mysqli_query($con,"insert into seller_com_feeback (comp_id,message,viewed,addedon)values('$cmp_id','$feedback','$status','$date')");
}
 
         }

            ?>
        </td>
         
             
                
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