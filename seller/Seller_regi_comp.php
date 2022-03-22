
<?php
require('top.seller.php');






?>



<div id="layoutSidenav_content">
<main>


<div class="container-fluid">

<div class="row">  
     <div class="col-xl-12">
         <div class="card">
             <div class="card-body">
                 <h4 class="box-title">Complaints Register </h4>
                
             </div>
		</div>




        <div class="row">

<div class="col-lg-6">
    <form role="form" method="post" action="register.php">
        <fieldset>
            <p class="text-uppercase pull-center">                        



            </p><br>

            <form method="post">
            <div class="form-group">
               


                
            <textarea  id="seller_message"   class="form-control input-lg" placeholder="Your Message"></textarea>
           
            </div>
  
            <button type="button" onclick="seller_send_compliant()" class="btn btn-lg btn-primary bt-mr-5" >submit</button>
            </form>

            
            
            <span class="text-danger" id="register_error"></span>
           
           




            <br><br>
        </fieldset>
    </form>
</div>

<div class="col-lg-6 ">

 <div class="card p-4 m-3">
     <div class="card-title">
         <h5>Replay</h5>
     </div>
     <div class="card-body">
               <?php 
                 $res=mysqli_query($con,"select * from seller_com_feeback");
                 if(mysqli_num_rows($res)>0){
                       while($row=mysqli_fetch_assoc($res)){
                      ?>
                       <span> <b>Admin: </b> <?php echo $row['message']?></span> <br>
                       <small class="text-muted"><?php   $date_p=strtotime( $row['addedon']);
                     echo date('d M Y',$date_p);?></small>  
                     
                      <?php
                       }
                 }else{
                   echo' <span> <b>Admin: </b> not yet viewed</span>';
                 }
               ?>

         
     
        </div>
 </div>
</div>
</div>

				</div>           
     </div>
</div>

</main>


<?php
require('footer.seller.php');
?>