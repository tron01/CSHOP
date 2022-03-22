<?php
require('top.php');
 //for ediiting value must be empty
$spassword='';
$smobile='';
$smail='';
$sname='';
$msg='';

if(isset($_POST['submit']))
{
	
	$sname=get_safe_value($con,$_POST['sname']); 
   $smail=get_safe_value($con,$_POST['smail']);
   $smobile=get_safe_value($con,$_POST['smobile']);
   $spassword=get_safe_value($con,$_POST['spassword']);
 


       //passing cate
	$res=mysqli_query($con,"select * from seller where name='$sname'"); //checking   by matching categories 
	$check=mysqli_num_rows($res);
	  if($check>0)
    {	
        $msg="seller already exist!";
	 }else{
			   
		}

         
	 if($msg==''){   //if no error msg found
        mysqli_query($con,"insert into seller(name,password,mobile,email) values('$sname','$spassword','$smobile','$smail')");  //insert cate ,stauts 
        ?>
        <script>
           window.location.href = 'seller.php';
        </script>
        <?php
     }
}	    
 	

?>

<div id="layoutSidenav_content">
<main>
<div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Seller</strong><small> Form</small></div>
                        <div class="card-body card-block">
                           <form method="post">
						        
                           <div class="form-group">
						         <label for="Categories" class=" form-control-label">Seller</label>
				  <input type="text" placeholder="Enter Seller name" name="sname" class="form-control" required   >
						         </div>
                           <div class="form-group">
						         <label for="website" class=" form-control-label">Email</label>
						   
                           <input type="text" placeholder="Enter Email" name="smail" class="form-control" required   >
						   
                           </div>

                           <div class="form-group">
						         <label  class=" form-control-label">Mobile</label>
						   
                           <input type="mobile" placeholder="Enter mobile" maxlength="10" name="smobile" class="form-control" required  >
						   
                           </div>
                           <div class="form-group">
						         <label  class=" form-control-label">Password</label>
						   
                           <input type="text" placeholder="Enter Seller password" name="spassword" class="form-control" required  >
						   
                           </div>

                           
                           <button id="payment-button" type="submit" name="submit" class="btn btn-lg btn-info btn-block">
                           <span id="payment-button-amount">Submit</span>
                           </button>
						   <div class="field_error"><?php  echo $msg	?></div>  
						   </form>
                        </div>
                     </div>
                  </div>
               </div>
</main>


<?php
require('footer.php');
?>