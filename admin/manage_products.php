<?php
require('top.php');

$categories_id='';
$brand_id='';
$seller_id='';
$name='';
$mrp='';
$price='';
$qty='';
$short_desc='';
$description='';
$meta_title='';
$meta_desc='';
$meta_keyword='';
$msg='';
$image='';

$image_required='required';    


if(isset($_GET['id']) && $_GET['id']!=''){
	
	
	$image_required='';
	$id=get_safe_value($con,$_GET['id']);  
	$res=mysqli_query($con,"select * from product where id='$id'");
    $check=mysqli_num_rows($res);
    if($check>0)
	 {	
	
	$row=mysqli_fetch_assoc($res);
    //pass to varibles	
	$categories_id=$row['categories_id'];
	$seller_id=$row['seller_id'];
	$brand_id=$row['brand_id']; 
    $name=$row['name'];
    $mrp=$row['mrp'];
    $price=$row['price'];
    $qty=$row['qty'];
    $short_desc=$row['short_desc'];
    $description=$row['description'];
    $meta_title=$row['meta_title'];
    $meta_desc=$row['meta_desc'];
    $meta_keyword=$row['meta_keyword'];	

	   
	 }else{
		header('product.php');
		die();
		}	
}


if(isset($_POST['submit']))
{
	//passing from the form to databse
	$categories_id=get_safe_value($con,$_POST['categories_id']); 
	$seller_id=get_safe_value($con,$_POST['seller_id']);
	$brand_id=get_safe_value($con,$_POST['brand_id']);;
    $name=get_safe_value($con,$_POST['name']);
    $mrp=get_safe_value($con,$_POST['mrp']);
    $price=get_safe_value($con,$_POST['price']);
    $qty=get_safe_value($con,$_POST['qty']);
    $short_desc=get_safe_value($con,$_POST['short_desc']);
    $description=get_safe_value($con,$_POST['description']);
    $meta_title=get_safe_value($con,$_POST['meta_title']);
    $meta_desc=get_safe_value($con,$_POST['meta_desc']);
    $meta_keyword=get_safe_value($con,$_POST['meta_keyword']);	
	

 
	$res=mysqli_query($con,"select * from product where name='$name'"); //checking   
	$check=mysqli_num_rows($res);
	
   if($check>0)
    {
             //if row exsits
		if(isset($_GET['id']) && $_GET['id']!='')
		{  //if id= not null
	
		     $getdata=mysqli_fetch_array($res); //passing aso arry to getdate
             if($id==$getdata['id']){     //if  (user selected )id in url= id gatabase 
				
                }else{ 
					
					$msg="Product already exist!";
				}		
		}else{//no row exsits
			$msg="Product already exist!";    
		}
    }	    
 	 
	 
	 
	 //checking image format
     	 
//prx($_FILES);
if($_FILES['image']['type']='' && ($_FILES['image']['type']!='image/png' || $_FILES['image']['type']!='image/jpg' ||$_FILES['image']['type']!='image/jpeg')){
	$msg="image empty";
}

	 
	 
	 if($msg==''){   //if no error msg found
		if(isset($_GET['id']) && $_GET['id']!='')
		{ 
	
           if($_FILES['image']['name']!='')
		   {
		   $image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
		   move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image); 
		   
		   $update_sql="update  product set  seller_id='$seller_id',brand_id='$brand_id',categories_id='$categories_id',name='$name',mrp='$mrp',
		   price='$price',qty='$qty',short_desc='$short_desc',description='$description',
		   meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$meta_keyword',image='$image' where id='$id'"; 
		   
		   }else
		   {
			$update_sql="update  product set seller_id='$seller_id',brand_id='$brand_id',categories_id='$categories_id',name='$name',mrp='$mrp'
		   ,price='$price',qty='$qty',short_desc='$short_desc',description='$description',
		   meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$meta_keyword' where id='$id'"; 
		   }
		  
	       mysqli_query($con,$update_sql);
		   
	    }else{ 
		   $image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
		   move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
          
  		   mysqli_query($con,"insert into product(seller_id,brand_id,categories_id,name,mrp,price,qty,short_desc,description,meta_title,meta_desc,meta_keyword,status,image) 
		   values('$seller_id','$brand_id','$categories_id','$name','$mrp','$price','$qty','$short_desc','$description','$meta_title','$meta_desc','$meta_keyword','1','$image')");  
	       
		   }
	 
	?>
	<script>
		window.location.href = 'product.php';
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
                        <div class="card-header"><strong>Product</strong><small> Form</small></div>
                        <div class="card-body card-block">
                           <form method="post" enctype="multipart/form-data">
						   <div class="form-group">
						     <label for="Categories" class=" form-control-label">Categories</label>
						   
                             <select class="form-control "name="categories_id">
						     <option>Select Categories</option>
						     <?php
                             $res=mysqli_query($con,"select id,categories from categories order by categories asc");
						    while($row=mysqli_fetch_assoc($res)){
								if($row['id']==$categories_id){
								echo " <option selected value=".$row['id'].">".$row['categories']."</option>";
						        }else{
								echo " <option value=".$row['id'].">".$row['categories']."</option>";	
								}  
							}
						   ?>	

						  </select>
						  
						  <label for="Categories" class=" form-control-label">Seller</label>
						   
                             <select class="form-control "name="seller_id">
						     <option>Select Seller</option>
						     <?php
                             $res=mysqli_query($con,"select * from seller");
						     while($row=mysqli_fetch_assoc($res)){
								if($row['id']==$seller_id){
								echo " <option selected value=".$row['id'].">".$row['name']."</option>";
						        }else{
								echo " <option value=".$row['id'].">".$row['name']."</option>";	
								}  
							}
						   ?>					  
						  </select>

						  <label for="Categories" class=" form-control-label">Brand</label>
						   
						   <select class="form-control "name="brand_id">
						   <option>Select Brand</option>
						   <?php
						   $res=mysqli_query($con,"select * from brand");
						   while($row=mysqli_fetch_assoc($res)){
							  if($row['id']==$brand_id){
							  echo " <option selected value=".$row['id'].">".$row['name']."</option>";
							  }else{
							  echo " <option value=".$row['id'].">".$row['name']."</option>";	
							  }  
						  }
						 ?>					  
						</select>


                          <div class="form-group">
						   <label for="Categories" class=" form-control-label">Product Name</label>
						   <input type="text" placeholder="Enter your product Name" name="name"
						   class="form-control" required value="<?php echo $name ?>" >
						   </div>
						  
						   
						   <div class="form-group">
						   <label for="Categories" class=" form-control-label">MRP</label>
						   <input type="text" placeholder="Enter your product MRP" name="mrp"
						   class="form-control" required value="<?php echo $mrp ?>" >
						   </div>
						   
						   <div class="form-group">
						   <label for="Categories" class=" form-control-label">Price</label>
						   <input type="text" placeholder="Enter your product Price" name="price"
						   class="form-control" required value="<?php echo $price ?>" >
						   </div>
						   
						   <div class="form-group">
						   <label for="Categories" class=" form-control-label">Qty</label>
						   <input type="text" placeholder="Enter qty" name="qty"
						   class="form-control" required value="<?php echo $qty ?>" >
						   </div>
						   
						   <div class="form-group">
						   <label for="Categories" class=" form-control-label">Image</label>
						   <input type="file"  name="image" class="form-control" <?php echo $image_required?> >
						   </div>

						   <div class="form-group">
						   <label for="Categories" class=" form-control-label">Short Description</label>
						   <textarea placeholder="Enter your product Short description" name="short_desc"
						   class="form-control" required><?php echo $short_desc ?> </textarea>
						   </div>
						   
						   <div class="form-group">
						   <label for="Categories" class=" form-control-label">Description</label>
						   <textarea placeholder="Enter your product description" name="description"
						   class="form-control" required><?php echo $description ?></textarea>
						   </div>
						   
						   <div class="form-group">
						   <label for="Categories" class=" form-control-label">Meta Title</label>
						   <textarea placeholder="Enter your product Meta Title " name="meta_title" 
						   class="form-control" ><?php echo $meta_title ?></textarea>
						   </div>  
						   
						   <div class="form-group">
						   <label for="Categories" class=" form-control-label">Meta Description </label>
						   <textarea type="text" placeholder="Enter your product meta description" name="meta_desc" 
						   class="form-control" ><?php echo $meta_desc ?></textarea>
						   </div>  
						   
						   <div class="form-group">
						   <label for="Categories" class=" form-control-label">Meta Keyword</label>
						   <textarea placeholder="Enter your product meta keyword" name="meta_keyword"
						   class="form-control" ><?php echo $meta_keyword ?></textarea>
						   </div>  
						   
                     
                           <button id="payment-button" type="submit" name="submit" class="btn btn-lg btn-info btn-block">
                           <span id="payment-button-amount">Submit</span>
                           </button>
						   <div class="field_error"><?php  echo	$msg	?></div>  
						   </form>
                        </div>
                     </div>
                  </div>
               </div>
</main>


<?php
require('footer.php');
?>