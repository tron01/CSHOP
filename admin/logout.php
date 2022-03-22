<?php 

/*logout of admin */
session_start();
unset($_SESSION['ADMIN_LOGIN']);//uset the valeuss
unset($_SESSION['ADMIN_USERNAME']);
unset($_SESSION['cart']);

	header('location:index.php');
        die();

?>