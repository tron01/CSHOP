<?php
require('top.php');


$sql1="select * from user";
$res1=mysqli_query($con,$sql1);
$num1=mysqli_num_rows($res1);


$sql2="select * from seller";
$res2=mysqli_query($con,$sql2);
$num2=mysqli_num_rows($res2);


$sql3="select * from product";
$res3=mysqli_query($con,$sql3);
$num3=mysqli_num_rows($res3);

$sql4="select * from categories ";
$res4=mysqli_query($con,$sql4);
$num4=mysqli_num_rows($res4);


$sql5="select * from orders ";
$res5=mysqli_query($con,$sql5);
$num5=mysqli_num_rows($res5);


$sql6="select * from brand ";
$res6=mysqli_query($con,$sql6);
$num6=mysqli_num_rows($res6);





?>
<div id="layoutSidenav_content">
<main>
    <style>
        .box-title1{
            text-align: center;
            font-weight: 600;
            color:#4C4949;
            font-size: 20px;
           padding: 5px 0;
        }
        .card-text{
            color:green;
            font-size:50px;
            text-align: center;
        }
        .card-text:hover{
            color:red;
            
        }

  
        
    </style>
<div class="container-fluid">


 <div class="row">  
     <div class="col-xl-12">
         <div class="card">
             <div class="card-body">
                 <h2 class="box-title">Dashboard</h2>
               
             </div>
			 </div>
             
             <!--row--> 
<div class="row">
  <div class="col-sm-3">
    <div class="card new">
      <div class="card-body">
        <h6 class="box-title1">Users</h6>
        <p class="card-text"><?php echo $num1;?></p>
        
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        <h5 class="box-title1">Sellers</h5>
        <p class="card-text"><?php echo $num2;?></p>
       </div>

    </div>
  </div>
  <div class="col-sm-3">
    <div class="card new">
      <div class="card-body">
        <h6 class="box-title1">Product</h6>
        <p class="card-text"><?php echo $num3;?></p>
        
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        <h5 class="box-title1">Categories</h5>
        <p class="card-text"><?php echo $num4;?></p>
       
      </div>
    </div>
  </div>

  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        <h6 class="box-title1">Orders</h6>
        <p class="card-text"><?php echo $num5;?></p>
        
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        <h5 class="box-title1">Brand</h5>
        <p class="card-text"><?php echo $num6;?></p>
       
      </div>
    </div>
  </div>


</div>

 <!--row  end--> 


     




            
         </div>
     </div>
 </main>



<?php
require('footer.php');
?>