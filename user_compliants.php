
<?php
require('top_user.php');
?>


<div class="container-fluid bg-light"> 
    
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="#">contact us</a></li>
      </ol>
    </nav>
  </div>
</nav>  



<div class="row">

<div class="col-lg-6">
    <form role="form" method="post" action="register.php">
        <fieldset>
            <p class="text-uppercase pull-center"> Contact US:</p>

            <div class="form-group">
            <textarea  id="message"  class="form-control input-lg" placeholder="Your Message"></textarea>
            </div>

  
            <input type="button" onclick="send_compliant()" class="btn btn-lg btn-primary" value="Send Message"><br>
            
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
                 $res=mysqli_query($con,"select * from user_com_feeback");
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
<?php
require('footer_user.php');
?>
