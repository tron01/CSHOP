<?php
require('top.php');
$web='';
$brand=''; //for ediiting value must be empty
$msg='';

if(isset($_POST['submit']))
{
	
	$brand=get_safe_value($con,$_POST['brand']); 
    
	$web=get_safe_value($con,$_POST['website']);
   $des=get_safe_value($con,$_POST['description']);


       //passing cate
	$res=mysqli_query($con,"select * from brand where name='$brand'"); //checking   by matching categories 
	$check=mysqli_num_rows($res);
	  if($check>0)
    {	
        $msg="Brand already exist!";
	 }else{
			   
		}

         
	 if($msg==''){   //if no error msg found
        mysqli_query($con,"insert into brand(name,website,description) values('$brand','$web','$des')");  //insert cate ,stauts 
        ?>
        <script>
           window.location.href = 'brand.php';
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
                        <div class="card-header"><strong>Brands</strong><small> Form</small></div>
                        <div class="card-body card-block">
                           <form method="post">
						        
                           <div class="form-group">
						         <label for="Categories" class=" form-control-label">Brands</label>
				  <input type="text" placeholder="Enter Brand name" name="brand" class="form-control" required   >
						         </div>
                           <div class="form-group">
						         <label for="website" class=" form-control-label">Website</label>
						   
                           <input type="text" placeholder="Enter Brand website" name="website" class="form-control" required   >
						   
                           </div>

                           <div class="form-group">
						         <label  class=" form-control-label">Description</label>
						   
                           <input type="text" placeholder="Enter Brand description" name="description" class="form-control" required  >
						   
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