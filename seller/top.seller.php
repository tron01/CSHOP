<?php

require('connection.php');
require('functions.php');


if($_SESSION['SELLER_LOGIN'] && $_SESSION['SELLER_NAME']!=''){

}else{
    header('location:index.php');
    die();
}
$sql="select * from seller";
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
    <title>Dashboard - Seller</title>
    
    <link href="css/styles.css" rel="stylesheet" />
   <link href="css/bootstrap.min.css" rel="stylesheet"> 
   <link href="css/custom.css" rel="stylesheet"> 
    
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">SELLER PANNEL</a>
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
                      
                        <a class="nav-link" href="product.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>
                            product Master
                        </a>
                        <a class="nav-link" href="orders_seller.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-luggage-cart"></i></div>
                            Order Master
                        </a>
                        <a class="nav-link" href="orders_success.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-luggage-cart"></i></div>
                            Order Completed
                        </a>
                        <a class="nav-link" href="orders_Rejected.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-luggage-cart"></i></div>
                            Order Rejected
                        </a>
                        <a class="nav-link" href="Seller_regi_comp.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-luggage-cart"></i></div>
                            Register Complaints
                        </a>
                        <a class="nav-link" href="seller_notice.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-luggage-cart"></i></div>
                            seller_notices
                        </a>
                        <a class="nav-link" href="logout.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                            Logout
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:  <?php echo  $_SESSION['SELLER_NAME']?></div>
                   <em style="text-transform: uppercase;"> </em>
                </div>
            </nav>
        </div>

