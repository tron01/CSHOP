<?php
?>

 <!--product section-->
 <section style="background-color: #eee;">
 
  <div class="container py-5">
      <div class="row"><?php
							
              $get_product=get_product($con);
							foreach($get_product as $list){
							
              ?>

    <!-- product card -->
    <div class="col-md-12 col-lg-4 mb-4 mb-lg-0 mycard">
    
    <div class="card">
             
			   <div class="col-xs-12 imagebox">
			     <a href="product.php?id=<?php echo $list['id']?>">
               <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image'] ?>"  class="card-img-top" alt="Laptop" />
              </a> 
			   </div>
              
			   
              <!--product hovered contents-->
               
             
              
            <!--product hovered contents-->
            <!-- product card detials-->
           
                 <div class="card-body">
                    <div class="d-flex justify-content-between">
                    <p class="small"><a href="#!" class="text-muted"></a></p>
                    <p class="small text-danger"><s><?php echo $list['price'] ?></s></p>
                    </div> 
                     
                    <div class="d-flex justify-content-between mb-3">
                    <a href="product.php?id=<?php echo $list['id']?>" class="text-dark" style="cursor:pointer">
                       <h5 class="mb-0"><?php echo $list['name'] ?></h5></a>
                       <h5 class="text-success mb-0"><?php echo $list['mrp'] ?></h5>
                      </div>
              
                  </div>
              
				  
              <!--end product card detials-->    

        </div>
		
     </div>
   
   <!-- End product card-->  
      <?php } ?>
    </div>
  </div>
  <input type="hidden" id="qty" value="1"/>
  <br><br><br><br><br><br><br>
  </section>
    
<!-- product section end-->
