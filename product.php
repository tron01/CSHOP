<?php
require('top_user.php');
  
if(isset($_GET['id'])){
	$product_id=mysqli_real_escape_string($con,$_GET['id']);
	
	if($product_id>0){
		$get_product=get_product($con,'','',$product_id);
     
   
    


	}else{
		?>
		<script>
		window.location.href='index.php';
		</script>
		<?php 
	}
}else{

  ?>
	<script>
	window.location.href='index.php';
	</script>
	<?php


}


if(isset($_POST['review_submit'])){
  
  $review=get_safe_value($con,$_POST['review']);   
  $rating=get_safe_value($con,$_POST['rating']);        
  $product_id=mysqli_real_escape_string($con,$_GET['id']);
  $userid=$_SESSION['USER_ID'];
  $status=1;
  $added_on=date('Y-m-d h:i:s');
  mysqli_query($con,"insert INTO produt_review (product_id,user_id,rating,review,status,added_on)VALUES('$product_id','$userid','$rating','$review','$status','$added_on')");
  header('location:product.php?id='.$product_id);
  die(); 

}



?>
<style>

.container{
    padding-top: 50px;
        
    }
    .newarrival{
        background: green ;
        width: 50px;
        color: white;
        font-size: 12px;
        font-weight: blod;

    }
    .col-md-7{
        color: #555;
    }
    .stars{
        height: 15px;
    }

    .mrp{
        text-decoration:line-through;
    }
    .price{
        color: #FE980F;
        font-size: 26px;
        font-weight: bold;
        padding-top:10px ;  
     }
     input{
         border: 1px solid#ccc;
         font-weight: bold;
         height: 33px;
         text-align: center;
          width: 30px;   
         }
      .cart{
          width:130px;
          background:#FE980F;
          color:#FFFFFF ;
          
          margin-top:10px
        }   
/*sliderbox*/
.slider-area2 {
  width: 100%;
  height: 400px;
}
.slider-area2 .slider2 img {
  width: 100%;
  height: 300px;
}
.bx-wrapper {
  border: none !important;
}

.bx-wrapper .bx-controls-auto,
.bx-wrapper .bx-pager {
  bottom: 30px !important;
}
/*slider-content*/
.slider-content2{
  position: absolute;
  top: 350px;
  left: 100px;
  width: 600px;
}

/*end slider box*/
@media only screen and (min-width: 991px) {
   
.container{
        margin-top: 0px;
        padding-top: 50px;
    }
    .newarrival{
        background: green ;
        width: 50px;
        color: white;
        font-size: 12px;
        font-weight: blod;

    }
    .col-md-7{
        color: #555;
    }
    .stars{
        height: 15px;
    }
    .price{
        color: #FE980F;
        font-size: 26px;
        font-weight: bold;
        padding-top:10px ;  
     }
     .input{
         border: 1px solid#ccc;
         font-weight: bold;
         height: 33px;
         text-align: center;
          width: 30px;   
         }

      .cart{
          background:#FE980F   ;
          color:#FFFFFF ;
          margin-left: 20px;
        }   
        /*sliderbox*/
.slider-area2 {
  width: 400px;
  height: 300px;
}
.slider-area2 .slider2 img {
  width: 100%;
  height: 300px;
}
.bx-wrapper {
    border: none !important;
  }

  .bx-wrapper .bx-controls-auto,
  .bx-wrapper .bx-pager {
    bottom: 30px !important;
  }

/*slider-content*/
.slider-content2{
  position: absolute;
  top: 350px;
  left: 100px;
  width: 600px;
}

/*end slider box*/
     }

</style>





<div class="container-fluid"style="background-color:#fff;">

   
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="#"><?php echo $get_product['0']['name'] ?></a></li>
      </ol>
    </nav>
  </div>
</nav>  


    <div class="container">
        <div class="row">
            <div class="col-md-5">
    
                <div class="slider-area2">
                    <div class="slider2">
                      <!--slide1-->
                      <div><a href="#">
                          <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$get_product['0']['image'] ?>"></a>
                        <div class="slider-content2">
                          <h3 class="text-white text-capitalize">Lorem ipsum dolor sit amet consectetur.</h3>
                        </div>
                      </div>
                      <!-- end slide1-->
                      <div><a href="#">
                          <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$get_product['0']['image'] ?>"></a>
                      </div>
                      <div><a href="#"><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$get_product['0']['image'] ?>"></a>
                      </div>
                    </div>

                  </div>
            </div>
            <div class="col-md-7" style="background-color:#fff;">
                
            <p class="newarrival text-center">NEW</p>

                <h2><?php echo $get_product['0']['name'] ?></h2>
                <p><?php echo $get_product['0']['short_desc'] ?></p>
                <small class="text-danger mrp"><?php echo $get_product['0']['mrp'] ?></small>
                 <p class="price"><?php echo $get_product['0']['price'] ?></p>
                 
                 <?php

										$productSoldQtyByProductId=productSoldQtyByProductId($con,$get_product['0']['id']);
										
										$pending_qty=$get_product['0']['qty']-$productSoldQtyByProductId;
										
										$cart_show='yes';
										
                    if($get_product['0']['qty']>$productSoldQtyByProductId && $get_product['0']['qty']!=0){
											$stock='In Stock';			
										}else{
											$stock='Not in Stock';
											$cart_show='';
										}
										?>
                 
                                   
                 
                 <p><b>Availabilty:</b><?php echo $stock?></p>
                 <?php $brand_res=mysqli_query($con,"SELECT brand.name FROM brand,product WHERE brand.id=product.brand_id AND product.id='$product_id'");
                 while($brand_row=mysqli_fetch_assoc($brand_res)){
                 ?>
                 
                 <p><b>Brand:</b><?php echo $brand_row['name'];}?></p>

                 
                 
                 <b><span>Categories:</b><?php echo $get_product['0']['categories']?></span><br><br>

                 <?php $seller_res=mysqli_query($con,"SELECT seller.name FROM seller,product WHERE seller.id=product.seller_id AND product.id='$product_id'");
                 while($seller_row=mysqli_fetch_assoc($seller_res)){
                 ?>

                 <p><b>Seller:</b><?php echo $seller_row['name'];}?></p>
                
                 
                 <?php if($cart_show!=''){?>
                  <label>Quantity:</label>
										
                    <select  id="qty">
                 	   <?php
                      for($i=1;$i<=$pending_qty;$i++){
												echo "<option>$i</option>";
											}
											?>
                 
                 </select>
                 <?php  }?>
                 <br>
 
                
                 
                   
                 
                <?php if($cart_show!=''){ ?>
                 <button type="button" onclick="manage_cart('<?php echo $get_product['0']['id'] ?>','add')" class="btn btn-default cart ">Add to cart </button>
              <?php  }?>



                </div>
        </div>
<br>
<br>
<br><br>
<!--reviw navbar-->
        <div class="container-fluid">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <a class="nav-link active" id="nav-home-tab" data-toggle="tab"
               href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Detials</a>
              
              <a class="nav-link" id="nav-contact-tab" data-toggle="tab" 
              href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Reviews</a>
            </div>
          </nav>
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"> 
                <?php
                $product_id=mysqli_real_escape_string($con,$_GET['id']);
                  $pres=mysqli_query($con,"SELECT * FROM `product` WHERE id='$product_id'");
                  
                  while($prow=mysqli_fetch_assoc($pres)){
 
                ?>

                
              <div>
                <br><br><br>
                <br>
               <span><?php echo $prow['short_desc'];?></span>
               <br><br>
               <br>
               <h5>Description</h5>
               <span><?php echo $prow['description'];?></span>
               <br>
               <span><?php echo $prow['meta_title'];?></span>
              </div>
               <?php }?> 

            </div>
           
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
            
            
            
            <!--reviw part-->
            <div class="container-fluid" >
                  <br><!--row start-->
                
                  <?php
                  $res=mysqli_query($con,"SELECT user.name,product_id,rating,user_id,review,produt_review.added_on FROM produt_review,user WHERE produt_review.user_id=user.id and produt_review.status=1 and produt_review.product_id='$product_id' ");
                     if(mysqli_num_rows($res)>0){
                  while($row=mysqli_fetch_assoc($res)){
?>
                 <div class="mt-10">
                     <div class=" container-fluid  reviews">
                      <br>
                       <span><h5><?php echo $row['name'];?></h5></span> 
                       <small class="text-muted"><?php $date_p=strtotime( $row['added_on']);
                         echo date('d M Y',$date_p);
                         ?></small><br>
                       <span class="newarrival"><?php echo $row['rating'];?></span><br>
                       <p><?php echo $row['review'];?></p> 
                    </div>
                   </div> 
 <?php }}else{
   echo '<div><br><br>
   <p class="text-left text-danger">No  reviews </p>
   
 </div>';
 } ?>
                   
                   <!--row end-->  
                   <br>   
                   <h5 class="table bg-light text-left">Enter your review</h5>
                   <?php  if(isset($_SESSION['USER_LOGIN'])) {?>
                    <form  method="post">
                    <select class="form-control" name="rating">
                     <option value="wrost">Wrost</option>
                     <option value="bad">Bad</option>
                     <option value="good">Good</option>
                     <option value="verygood">Very Goood</option>
                     <option value="Fantastic" selected>Fantastic</option>
                    
                   </select>
                   <br>
                   <textarea name="review"   class="form-control mb-10" Placeholder="write your reviews here..."  rows="3"></textarea><br>

                   <button class="btn btn-success" type="submit" name="review_submit">Submit</button>
                   

                  </form>
                   <?php }else{
                     echo '<div><br><br>
                     <p class="text-left text-danger">Please Login to Submit Your review</p>
                     <a href="login_user.php"><span class="btn btn-info">login</span></a>
                   </div>';}   ?>
                   </div>
                  

                   <div>  
                  <!--reviw end part-->

             </div>
            </div>
          </div>
<!--reviw navbar-->


    </div>
    </div>

<br><br><br><br><br><br><br>


</div>
<?php
require('footer_user.php');
?>

