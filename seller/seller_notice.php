
<?php
require('top.seller.php');

$seller=$_SESSION['SELLER_LOGIN'];
$sql="SELECT seller.name AS sname,product.name,product.seller_id,seller.id FROM product,seller WHERE seller.id='$seller' AND product.seller_id='$seller' AND product.qty=0;";
$res=mysqli_query($con,$sql);


?>



<div id="layoutSidenav_content">
<main>


<div class="container-fluid">

<div class="row">  
     <div class="col-xl-12">
         <div class="card">
             <div class="card-body">
                 <h4 class="box-title">Seller Notices </h4>
                
             </div>
		</div>





             <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product</th>
							
							<th>Info</th>
                        
                                                      
                        </tr>
                    </thead>
                    <tbody>
                                    <?php

if(mysqli_num_rows($res)>0){
    

                                     $i=1;
									while($row=mysqli_fetch_assoc($res)){
									?>
									<tr>
                                      
									   <td><?php echo $i ?></td>
									     <td><?php echo $row['name'] ?></td>
                                         <td><?php echo "update the products qty";
                                        
                                         
                                         
                                         ?></td>
										  
                                    </tr>
            					  <?php $i++;}}else{
                                      echo '<td>nothing</td>';
                                  } ?>
                                   </tbody>
                       </tbody>
                </table> 
				</div>           
     </div>
</div>

</main>


<?php
require('footer.seller.php');
?>