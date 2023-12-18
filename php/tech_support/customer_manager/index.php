<?php
require('../model/database.php');
require('../model/customer_db.php');
require('../model/countries_db.php');
require('../model/validate.php');
require('../model/fields.php');
include '../view/header.php';

$validate = new Validate();
$fields = $validate->getFields();
$fields->addField('email', 'Must be a valid email address.');
$fields->addField('password', 'Must be at least 6 characters, upper&lower digits and special char.');
$fields->addField('firstName');
$fields->addField('lastName');
$fields->addField('address');
$fields->addField('city');
$fields->addField('state', 'Use 2 character abbreviation.');
$fields->addField('postalCode', 'Use 5 or 9 digit ZIP code.');
$fields->addField('phone', 'Use 999-999-9999 format. No parenthesis'); 

$action = filter_input(INPUT_POST, 'action');
		
if($action == 'search_customer') {
	
	$lastName = filter_input(INPUT_POST, 'lastName');
	
	$customers = search_customer($lastName);
	include 'search_customer.php';
}

else if($action == 'select_customer') {
	
	$customerID = filter_input(INPUT_POST, 'customerID');
	
	$selected_customer = view_customer($customerID);
	
	$firstName = $selected_customer['firstName'];
	$lastName = $selected_customer['lastName'];
	$email = $selected_customer['email'];
	$phone = $selected_customer['phone'];
	$password = $selected_customer['password'];
	$address = $selected_customer['address'];
	$city = $selected_customer['city'];
	$state = $selected_customer['state'];
	$postalCode = $selected_customer['postalCode'];
	$countryCode = $selected_customer['countryCode'];
	
	$isNewCustomer = false;
	
	$countries = get_countries();
	
	include 'view_update_customer.php';
	
}
else if($action == 'new_customer') {
	
	$firstName = "";
	$lastName = "";
	$email = "";
	$phone = "";
	$password = "";
	$address = "";
	$city = "";
	$state = "";
	$postalCode = "";
	
	$isNewCustomer = true;
	
	$countries = get_countries();
	
	include 'view_update_customer.php';
	
}
else if($action == 'update_customer') {
	$customerID = filter_input(INPUT_POST, 'customerID');
	$firstName = filter_input(INPUT_POST, 'firstName');
	$lastName = filter_input(INPUT_POST, 'lastName');
	$email = filter_input(INPUT_POST, 'email');
	$phone = filter_input(INPUT_POST, 'phone');
	$password = filter_input(INPUT_POST, 'password');
	$address = filter_input(INPUT_POST, 'address');
	$city = filter_input(INPUT_POST, 'city');
	$state = filter_input(INPUT_POST, 'state');
	$postalCode = filter_input(INPUT_POST, 'postalCode');
	$countryCode = filter_input(INPUT_POST, 'countryCode');
	
	 // Validate form data
     $validate->email('email', $email, 1, 50);
     $validate->password('password', $password, 1, 20);
     $validate->text('firstName', $firstName, 1, 50);
     $validate->text('lastName', $lastName, 1, 50);
     $validate->text('address', $address, 1, 50);
     $validate->text('city', $city, 1, 50);
     $validate->state('state', $state, 1, 50);
     $validate->postalCode('postalCode', $postalCode, 1, 50);
     $validate->phone('phone', $phone, 1, 50);


	if($fields->hasErrors())
	{
		$countries = get_countries();
		$isNewCustomer = false;
		include 'view_update_customer.php';
	}
	else
	{
	update_customer($customerID, $firstName, $lastName, $email, $phone, $password, 
					$address, $city, $state, $postalCode, $countryCode);

	$customers = get_customers();
	include 'search_customer.php';
	}
}

else if($action == 'add_customer') {
	$firstName = filter_input(INPUT_POST, 'firstName');
	$lastName = filter_input(INPUT_POST, 'lastName');
	$email = filter_input(INPUT_POST, 'email');
	$phone = filter_input(INPUT_POST, 'phone');
	$password = filter_input(INPUT_POST, 'password');
	$address = filter_input(INPUT_POST, 'address');
	$city = filter_input(INPUT_POST, 'city');
	$state = filter_input(INPUT_POST, 'state');
	$postalCode = filter_input(INPUT_POST, 'postalCode');
	$countryCode = filter_input(INPUT_POST, 'countryCode');
	
	 // Validate form data
     $validate->email('email', $email, 1, 50);
     $validate->password('password', $password, 1, 20);
     $validate->text('firstName', $firstName, 1, 50);
     $validate->text('lastName', $lastName, 1, 50);
     $validate->text('address', $address, 1, 50);
     $validate->text('city', $city, 1, 50);
     $validate->state('state', $state, 1, 50);
     $validate->postalCode('postalCode', $postalCode, 1, 50);
     $validate->phone('phone', $phone, 1, 50);


	if($fields->hasErrors())
	{
		$countries = get_countries();
		$isNewCustomer = true;
		include 'view_update_customer.php';
	}
	else
	{
	add_customer($firstName, $lastName, $email, $phone, $password, 
					$address, $city, $state, $postalCode, $countryCode);

	$customers = get_customers();
	include 'search_customer.php';
	}
}

else {
	$customers = get_customers();
	include 'search_customer.php';
}?>


<?php include '../view/footer.php'; ?>