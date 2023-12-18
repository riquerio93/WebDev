<?php
require('../model/database.php');
require('../model/customer_db.php');
require('../model/product_db.php');
require('../model/registration_db.php');
include '../view/header.php';

$action = filter_input(INPUT_POST, 'action');

//per-session management
session_start();


if(isSet($_COOKIE['email']) and ($action != 'logout' and $action != 'register'))
{

	$email = $_COOKIE['email'];
	$customer = get_customer_by_email($email);
	$products = get_products();
	
	include 'register_product.php';
}
		

else if($action === 'login') {
	
	$emailLogin = filter_input(INPUT_POST, 'email');
	setcookie('email', $emailLogin, 0);
	
	$customer = get_customer_by_email($emailLogin);
	$products = get_products();
	
	include 'register_product.php';
}

else if($action === 'register') {
	
	$customerID = filter_input(INPUT_POST, 'customerID');
	$productCode = filter_input(INPUT_POST, 'productCode');
	$date = date('Y-m-d');
	
	add_registration($customerID, $productCode, $date);
	include 'register_product_success.php';
}

else if($action === 'logout') {

	$email = $_COOKIE['email'];
	setcookie('email', $email, time() -3600);
	
	include 'customer_login.php';
}

else {
	include 'customer_login.php';
}?>


<?php include '../view/footer.php'; ?>