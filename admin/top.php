<?php
require('connection.inc.php');
require('functions.inc.php');

    if(isset($_SESSION['ADMIN_LOGIN']) && $_SESSION['ADMIN_LOGIN']!=''){     //seted  login.php as default page  only
		}else{
		header('location:index.php');   //if admin login empty go to login
        die();
	}


    $sql="select * from admin_users";
    $res=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($res);
   


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
   
	</style>
    <link href="css/styles.css" rel="stylesheet" />
   <link href="css/bootstrap.min.css" rel="stylesheet"> 
   <link href="css/custom.css" rel="stylesheet"> 
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="#">ADMIN PANNEL</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>

        <!-- Navbar-->
  </nav>


    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">menu</div>
                        
                        <a class="nav-link" href="dashboard.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-line"></i></div>
                            Dashboard
                        </a>

                        <a class="nav-link" href="categories.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Categories Master
                        </a>
                        <a class="nav-link" href="brand.php">
                            <div class="sb-nav-link-icon"><i class="fab fa-btc"></i></div>
                            Brands Master
                        </a>
                        
                        <a class="nav-link" href="product.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>
                            Product Master
                        </a>
                        <a class="nav-link" href="users.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            User Master
                        </a>
                        <a class="nav-link" href="product_review.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            User Reviews
                        </a>
                        
                        <a class="nav-link" href="orders.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-luggage-cart"></i></div>
                            Order Master
                        </a>
                        <a class="nav-link" href="order__Success.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-luggage-cart"></i></div>
                            Order Success
                        </a>
                        <a class="nav-link" href="order__Rejected.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-luggage-cart"></i></div>
                            Order Rejected
                        </a>
                        <a class="nav-link" href="seller.php">
                            <div class="sb-nav-link-icon"><i class="far fa-address-card"></i></div>
                            Seller list
                        </a>
                        <a class="nav-link" href=" seller_complaints.php">
                            <div class="sb-nav-link-icon"><i class="far fa-address-book"></i></div>
                            Seller Complaints
                        </a>
                        
                        <a class="nav-link" href=" User_complaints.php">
                            <div class="sb-nav-link-icon"><i class="far fa-address-book"></i></div>
                            User Complaints
                        </a>
                        <a class="nav-link" href="contact_us.php">
                            <div class="sb-nav-link-icon"><i class="far fa-address-book"></i></div>
                            Contact Us
                        </a>

                        <a class="nav-link" href="logout.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                            Logout
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                   <em style="text-transform: uppercase;"> <?php echo $row['username'] ?></em>
                </div>
            </nav>
        </div>

