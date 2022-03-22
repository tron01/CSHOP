<?php 
/*logout of seller */
session_start();
unset($_SESSION['SELLER_LOGIN']);//uset the valeuss
unset($_SESSION['SELLER_NAME']);
	header('location:index.php');
        die();

?>