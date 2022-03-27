<?php
require('top_user.php');
if(!isset($_SESSION['cart'])|| count($_SESSION['cart'])==0){
	?>
<script>
    window.location.href = 'index.php';
</script>
<?php
}

$cart_total=0;

if(isset($_POST['submit'])){

    $order_name=get_safe_value($con,$_POST['Oname']);
    $order_mobile=get_safe_value($con,$_POST['Omobile']);
    $address=get_safe_value($con,$_POST['address']);
	$city=get_safe_value($con,$_POST['city']);
	$pincode=get_safe_value($con,$_POST['pincode']);
	$payment_type=get_safe_value($con,$_POST['payment_type']);
    $user_id=$_SESSION['USER_ID'];

	foreach($_SESSION['cart'] as $key=>$val){
		
        $productArr=get_product($con,'','',$key);
		$price=$productArr[0]['price'];
                  
		$qty=$val['qty'];
		$cart_total=$cart_total+($price*$qty);
        
    }

	$total_price=$cart_total;
	$payment_status='pending';
	
  if($payment_type=='COD'){
		$payment_status='success';

        
  $order_status='1';
  $added_on=date('Y-m-d h:i:s');
  
	
	
	mysqli_query($con,"insert into orders(user_id,name,address,city,pincode,mobile,payment_type,total_amount,payment_status,order_status,added_on) values('$user_id','$order_name','$address','$city','$pincode','$order_mobile','$payment_type','$total_price','$payment_status','$order_status','$added_on')");
	
	$order_id=mysqli_insert_id($con);
	
	foreach($_SESSION['cart'] as $key=>$val){
		$productArr=get_product($con,'','',$key);
		$price=$productArr[0]['price'];
        
        $pqty=$productArr[0]['qty'];
        $pid=$productArr[0]['id'];

        $seller_id=$productArr[0]['seller_id'];
		
        $qty=$val['qty'];

        $added_on=date('Y-m-d h:i:s'); 
        
        mysqli_query($con,"insert into order_details(order_id,product_id,qty,price,added_on,seller_id) values('$order_id ','$key','$qty','$price','$added_on','$seller_id')");
        $productSoldQtyByProductId=productSoldQtyByProductId($con,$pid);
        $pneding_qty=$pqty-$productSoldQtyByProductId;
        mysqli_query($con,"update product set qty='$pneding_qty' where id='$pid'");        

    }
    
	}
   
   
    if($payment_type=='payu')
    {
  
  $payment_status='success';
  $order_status='1';
  $added_on=date('Y-m-d h:i:s');
  mysqli_query($con,"insert into orders(user_id,name,address,city,pincode,mobile,payment_type,total_amount,payment_status,order_status,added_on) values('$user_id','$order_name','$address','$city','$pincode','$order_mobile','$payment_type','$total_price','$payment_status','$order_status','$added_on')");
  $order_id=mysqli_insert_id($con);
	
	foreach($_SESSION['cart'] as $key=>$val){
		$productArr=get_product($con,'','',$key);
		$price=$productArr[0]['price'];
        
        $pqty=$productArr[0]['qty'];
        $pid=$productArr[0]['id'];
		
        $qty=$val['qty'];

        $added_on=date('Y-m-d h:i:s'); 
        
        mysqli_query($con,"insert into order_details(order_id,product_id,qty,price,added_on,seller_id) values('$order_id ','$key','$qty','$price','$added_on','$seller_id')");
        $productSoldQtyByProductId=productSoldQtyByProductId($con,$pid);
        $pneding_qty=$pqty-$productSoldQtyByProductId;
        mysqli_query($con,"update product set qty='$pneding_qty' where id='$pid'");        
       }  
         
	?>
    <script>
        window.location.href = 'pay.php';
    </script>
    <?php 


}



	

	unset($_SESSION['cart']);

     
	?>
<script>
    window.location.href = 'thank_you.php';
</script>
<?php
	
	
}
?>
<div class="container-fulid" style="background:#fff;">


    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="cart.php">Cart</a></li>
                    <li class="breadcrumb-item"><a href="#">Checkout</a></li>
                </ol>
            </nav>
        </div>
    </nav>

    <div class="row">
        <div class="col-md-8">
            <?php 
            
            $login_diss='';
            $address_diss='';
            $payment_diss='';

			if(isset($_SESSION['USER_LOGIN'])){
                $login_diss='disabled';
               
                }else{
                    $address_diss='disabled';
                    $payment_diss='disabled';
                    
                }
			?>

            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn  btn-info " type="button" <?php echo $login_diss ?>
                                data-toggle="collapse" data-target="#collapseOne"
                                aria-expanded="true" aria-controls="collapseOne">
                                Checkout method
                            </button>
                        </h2>
                    </div>

                    <div id="collapseOne" class="collapse " aria-labelledby="headingOne"
                        data-parent="#accordionExample">

                        <div class="card-body">
                            <div class="container">


                                <div class="row">

                                    <div class="col-md-5">
                                    <form role="form" method="post" action="register.php">
                        <fieldset>
                            <p class="text-uppercase pull-center"> SIGN UP:</p>

                            <div class="form-group">
                                <input type="text" name="username" id="r_name" class="form-control input-lg"
                                    placeholder="username">
                                    <span class="text-danger" id="rname_error"></span>
                            </div>

                            <div class="form-group">
                                <input type="email" name="email" id="r_email" class="form-control input-lg"
                                    placeholder="Email Address">
                                    <span class="text-danger" id="remail_error"></span>
                            </div>

                            <div class="form-group">
                                <input type="mobile" name="mobile" id="r_mobile" class="form-control input-lg"
                                    placeholder="mobile" maxlength="10">
                                    <span class="text-danger" id="rmobile_error"></span>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" id="r_password" class="form-control input-lg"
                                    placeholder="Password">
                                    <span class="text-danger" id="rpassword_error"></span>
                            </div>
                            <input type="button" id="register" class="btn btn-lg btn-primary" value="Register"><br>
                            <span class="text-danger" id="register_error"></span>
                            <br><br>
                        </fieldset>
                    </form>
                                    </div>

                                    <div class="col-md-2">
                                        <!-------null------>
                                    </div>

                                    <div class="col-md-5">
                                    <form action="" method="post">
                        <fieldset>
                            <p class="text-uppercase"> Login using your account: </p>

                            <div class="form-group">
                                <input type="text" name="name" id="name" class="form-control input-lg"
                                    placeholder="Email" required>
                                
                                    <span class="text-danger" id="name_error"></span>

                            </div>
                            <input type="password" name="pass" id="login_password" class="form-control input-lg"
                                placeholder="Password" required>
                                
                                <span class="text-danger" id="pass_error"></span><br>

                            <input type="button" id="user_login" class="btn btn-md btn-success" value="Sign In"><br>
                            <span class="text-danger" id="login_error"></span>
                        </fieldset>
                    </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <?php}?>

                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                            <button class="btn btn-info  text-left collapsed" <?php echo $address_diss?> type="button"
                                data-toggle="collapse"
                                data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Adrdress information
                            </button>
                        </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                            <form method="post">
                            
                            <div class="form-group">
                                    <input type="text" name="Oname" class="form-control input-lg"
                                        placeholder="Name here.." required>
                                </div>
                               
                                
                                <div class="form-group">
                                            <input type="text" name="city" class="form-control input-lg"
                                                placeholder="City/State" required>
                                        </div>
                            
                            <!--row end-->
                                <div class="row">
                                 
                                 
                                <div class="col">
                                       <div class="form-group">
                                        <input type="mobile" name="Omobile" class="form-control input-md"
                                        placeholder="mobile" maxlength="10" required>
                                       </div>
                               </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <input type="mobile" name="pincode" placeholder="Post code/ zip"
                                                class="form-control input-lg" maxlength="6"  required>
                                        </div>
                                    </div>
                                </div>
                                <!--row end-->
                                <div class="form-group">
                                    <input type="text" name="address" class="form-control input-lg"
                                        placeholder="Street Address" required>
                                </div>


                        </div>
                    </div>
                </div>



                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                            <button class="btn btn-info  text-left collapsed" <?php echo $payment_diss ?> type="button"
                                data-toggle="collapse"
                                data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Payment information
                            </button>
                        </h2>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                        data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="single-method">
                                COD <input type="radio" name="payment_type" value="COD" required />
                                &nbsp;&nbsp;PayU <input type="radio" name="payment_type" value="payu" required />
                            </div>
                            <div class="single-method">

                            </div>
                        </div>
                    </div>
                </div><br>&nbsp;&nbsp;
                <input type="submit" class="btn btn-info " value="Submit" name="submit" />
                </form>
            </div>
        </div>

        <div class="col-md-4" style="background:#fff;">
            <div class="order-details">
                <h5 class="order-details__title">Your Order</h5>
                <div class="order-details__item">
                    <?php
			$cart_total=0;
			foreach($_SESSION['cart'] as $key=>$val){
			$productArr=get_product($con,'','',$key);
			$pname=$productArr[0]['name'];
			$mrp=$productArr[0]['mrp'];
			$price=$productArr[0]['price'];
			$image=$productArr[0]['image'];
			$qty=$val['qty'];
		    $cart_total=$cart_total+($price*$qty);?>

                    <div class="single-item">
                        <div class="single-item__thumb">
                            <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$image?>" />
                        </div>
                        <div class="single-item__content">
                            <a href="#">
                                <?php echo $pname?>
                            </a>
                            <span class="price">
                                <?php echo $price*$qty?>
                            </span>
                        </div>
                        <div class="single-item__remove">
                            <span class="btn btn-danger btn-sm remove"
                                onclick="manage_cart('<?php echo $key?>','remove')"><i class="fa fa-trash"></i></span>
                        </div>
                    </div>
                    <?php } ?>

                </div>
                <div class="ordre-details__total">
                    <h5>Order total</h5>
                    <span class="price">
                        <?php echo $cart_total?>
                    </span>
                </div>
            </div>
        </div>
    </div>




</div>





<?php
require('footer_user.php');
?>