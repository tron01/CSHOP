<?php
require('top.php');
$categories=''; //for ediiting value must be empty
$msg='';

if(isset($_GET['id']) && $_GET['id']!=''){
	
	$id=get_safe_value($con,$_GET['id']);  
	$res=mysqli_query($con,"select * from categories where id='$id'");
    $check=mysqli_num_rows($res);
    if($check>0)
	 {	
	    $row=mysqli_fetch_assoc($res); 
        $categories=$row['categories'];    //passing categories
	 }else{
		header('categories.php');
		die();
		}	
}


if(isset($_POST['submit']))
{
	
	$categories=get_safe_value($con,$_POST['categories']);    //passing cate
	$res=mysqli_query($con,"select * from categories where categories='$categories'"); //checking   by matching categories 
	$check=mysqli_num_rows($res);
	
   if($check>0)
    {
             //if row exsits
		if(isset($_GET['id']) && $_GET['id']!='')
		{  //if id= not null
	
		     $getdata=mysqli_fetch_array($res); 
             if($id==$getdata['id']){      
				
                }else{ 
					$msg="categories already exist!";
				}		
		}else{
			$msg="categories already exist!";   
		}
    }	    
 	 
	 if($msg==''){   //if no error msg found
		if(isset($_GET['id']) && $_GET['id']!='')
		{ //if id=not null(same id saving)
	       mysqli_query($con,"update  categories set categories='$categories' where id='$id' ");   
		    //update categories name 
  

	    }else{ //new categories insert
	       mysqli_query($con,"insert into categories(categories,status) values('$categories','1')");  //insert cate ,stauts 

	         }

	  
			 ?>
			 <script>
				 window.location.href = 'categories.php';
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
                        <div class="card-header"><strong>Categories</strong><small> Form</small></div>
                        <div class="card-body card-block">
                           <form method="post">
						   <div class="form-group">
						   <label for="Categories" class=" form-control-label">Categories</label>
						   
                           <input type="text" placeholder="Enter your Categories name" name="categories"class="form-control" required value="<?php echo $categories ?>" >
						   
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