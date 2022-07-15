<?php
require('connection.inc.php');
require('functions.inc.php');
require('add_to_cart.php');




$cat_arr=array();
$cat_res=mysqli_query($con,"select * from categories where status=1");
while($row=mysqli_fetch_assoc($cat_res)){
	$cat_arr[]=$row;
	}

  $obj=new add_to_cart();
  $cart_num=$obj->totalProduct();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cshop</title>

  
  <link href="css/owl.carousel.min.css" rel="stylesheet">
  <link href="css/owl.theme.default.min.css" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/nav.css" rel="stylesheet">
  <link href="css/all.min.css" rel="stylesheet">
  <link href="css/brands.min.css" rel="stylesheet">
  


</head>

<body>
  <!-- navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <a class="navbar-brand brand" style="color: #fff;" href="index.php">shop</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse box1"  id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        
     
     <div>
 <!-- form -->
 <form class="form-inline my-2 my-lg-0 box2" method="get" action="search.php">
          <input class="form-control mr-sm-2" style="width:260px;" type="search" name="str" placeholder="Search all items..." aria-label="Search">
          <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
        </form>
   <ul class="list-group" id="#result"></ul>
     
        <!-- end form -->
     </div>
      
     


     <li class="nav-item dropdown user-menu ml-30 box3">
        <a class="nav-link dropdown-toggle " style="color: #fff;"  href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
        Categories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php foreach($cat_arr as $list){ ?> 
          <a class="dropdown-item textup" href="categories.php?id=<?php echo $list['id']?>"> 
          <?php echo $list['categories']?></a>
          <?php }  ?>
        </div>
      </li>

      
<?php


/*        <!--dropdown menu-->*/
if(isset($_SESSION['USER_LOGIN'])){
           
        echo '<li class="nav-item dropdown  user-menu ml-30 box3" >
        <a class="nav-link dropdown-toggle textup" style="color: #fff;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">';
        echo  '<i class="fas fa-user"></i>&nbsp;';echo $_SESSION['USER_NAME'];echo'</a>
         <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="my_order.php">My Orders</a>
        <a class="dropdown-item" href="profile.php">Account settings</a>
        <div class="dropdown-divider"></div>
         <a class="dropdown-item bg-danger" href="logout.php">logout</a>
          </div>
         </li>';
      }else{
        echo '<li class="nav-item user-menu ml-30 box4 " > <a class="nav-link" style="color: #fff;" href="login_user.php"><i class="fa fa-user"></i> Login</a></li>';
      }
?>

<?php
 if(isset($_SESSION['USER_LOGIN'])){

echo'  <li class="nav-item user-menu ml-30 box4 " > <a class="nav-link" style="color: #fff;" href="user_compliants.php"> <i class=""></i>Contact us</a></li>';

 }else{
  
  echo'<li class="nav-item user-menu ml-30 box4 " > <a class="nav-link" style="color: #fff;" href="contact_us.php"> <i class=""></i>Contact us</a></li>';

 }
?>
        




        <li class="nav-item user-menu  ml-30 box4"> <a class="nav-link" style="color: #fff;" href="cart.php"><i class="fas fa-shopping-cart"></i><span class="badge badge-danger cart_num"><?php echo $cart_num?></span></a></li>
      </ul>
     
      

    </div>
     
  </nav>
  <!-- navbar end -->
