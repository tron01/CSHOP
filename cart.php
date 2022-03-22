<?php
require('top_user.php');



?>
<style>
   body{
       background:#fff;
   }
   .mytext{
       text-align:center;
      
   }
    .cart-page{
    margin:10px auto;
    
    }
    .table{
        width:100%;
        border-collapse:collapse;
    }
    
    
    .cart-info{
      display:flex;
      flex-wrap:wrap;  
      
    }

    th{
        text-align:left;
        padding: 5px;
        color:#fff;
        font-weght:normal;
    }
    td{
        padding: 10px 5px;
    }
    
    td input{
        width: 60px;
        height:30px;
        padding:5px;
    }
    td .remove{  

        height:30px;
        color:#000;

    }
    td p{
        margin-right:10px;
    }
    td small{
        margin-right:10px;
    }

    td img{
        width:80px;
        height:80px;
        margin-right: 10px ;
    }
    .total-price {
    
    display:flex;
    justify-content:flex-end;

    }
   
   .total-price .tab{
      width:100%;
      border-top:3px solid #ff233b;
      max-width:400px;
    }
   
    td:last-child{
        text-align:right;
    }
    th:last-child{
        text-align:right;
    }

    .newbtns{
        display:flex;
        flex-wrap:wrap;
    }

    .checkoutbtn {
      margin-left:5px;
    
    }
    .contbtn {
      margin-left:5px;
    
    }

    @media only screen and (max-width:700px) {
        
        .cart-info p{
            display:none;
             }

    

    }


</style>

<div class="container-fluid a" style="background:#fff;">
    
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="#">cart</a></li>
      </ol>
    </nav>
  </div>
</nav> 
<table class="table cart-page">
    <br>
  <thead class="thead bg-danger">
    <tr>
      <th scope="col">Product</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
    </tr>
  </thead>
  <tbody>
   <?php     

if(isset($_SESSION['cart'])){
  foreach($_SESSION['cart'] as $key=>$val)
  {    
      $cart_total=0;
      $productArr=get_product($con,'','',$key); 
      $pname=$productArr[0]['name'];
      $mrp=$productArr[0]['mrp'];  
      $price=$productArr[0]['price'];  
      $image=$productArr[0]['image'];  
      $qty=$val['qty'];    
      $subtotal=$qty*$price; 
      

      ?>
  
  
  
 
  <tr>
        <td>
            <div class="cart-info">
            <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$image?>" alt="">
            <p><?php echo $pname ?></p><br>
            <small>price:<?php echo $price?></small><br>
           <span class="btn btn-danger btn-sm remove" onclick="manage_cart('<?php echo $key?>','remove')" ><i class="fa fa-trash"></i></span>
           </div>
        
        </td>
            
            <td> 
                <input type="number" id="<?php echo $key?>qty" value="<?php echo $qty?>" /> <br>
            <span  class="btn update" onclick="manage_cart('<?php echo $key?>','update')">update</span>
            </td>
           
            <td><?php      
                $cart_total=$cart_total+($price*$qty);     echo  $subtotal; ?></td>
          </tr>
  
<?php }   }if(!isset($_SESSION['cart'])){echo '<td><h5 class="text-info">No Items in the Cart</h5></td>';} ?>
   </tbody>
</table> 
<?php

 
?>


<br>

    <div class="row newbtns">
 
        
         <a href="index.php"><span class="btn btn-info contbtn ">Continue Shopping</span> </a>
          <a < href="checkout.php"><span class="btn btn-danger checkoutbtn ">Checkout</span></a>
        
        </div>

</div>




<?php

  
require('footer_user.php');
 
?>
