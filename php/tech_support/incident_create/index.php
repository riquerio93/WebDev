<?php
require('../model/database.php');
require('../model/customer_db.php');
require('../model/product_db.php');
require('../model/incident_db.php');
include '../view/header.php';

$action = filter_input(INPUT_POST, 'action');
		
if($action == 'login') {
	
	$email = filter_input(INPUT_POST, 'email');
	
	$customer = get_customer_by_email($email);
	$products = get_customer_registrations($customer['customerID']);
	
	include 'create_incident.php';
}

else if($action == 'create_incident') {
	
	$customerID = filter_input(INPUT_POST, 'customerID');
	$productCode = filter_input(INPUT_POST, 'productCode');
	$title = filter_input(INPUT_POST, 'title');
	$description = filter_input(INPUT_POST, 'description');
	
	add_incident($customerID, $productCode, $title, $description);
	include 'create_incident_success.php';
}

else {
	$incidents = get_all_incidents();
	include 'select_incident.php';
}?>


<?php include '../view/footer.php'; ?>