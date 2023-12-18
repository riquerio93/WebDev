<?php
require('../model/database.php');
require('../model/customer_db.php');
require('../model/product_db.php');
require('../model/incident_db.php');
require('../model/technician_db.php');
include '../view/header.php';

$action = filter_input(INPUT_POST, 'action');
session_start();

$incident = "";

if($action == 'logout') {
	
	unset($_SESSION['technicianEmail']);
	include 'technician_login.php';
}
		
else if($action == 'login') {
	$email = filter_input(INPUT_POST, 'email');
	
	$technician = get_technician_by_email($email);
	if($email != NULL && $technician != null || !empty($technician))
	{
		$_SESSION['technicianEmail'] = $email;
	
		$incidents = get_incidents_by_technician($technician['techID']);
	
		include 'select_incident.php';
	}
	else
	{
		include 'technician_login.php';
	}
}

else if($action == 'update_incident') {
	
	$incidentID = filter_input(INPUT_POST, 'incidentID');
	
	$incident = get_incident($incidentID);

	include 'update_incident.php';
}

else if($action == 'update_incident_success') {
	$dateClosed = filter_input(INPUT_POST, 'dateClosed');
	$id = filter_input(INPUT_POST, 'incidentID');
	$desc = filter_input(INPUT_POST, 'textareaDesc');
	
	update_incident($id, $dateClosed, $desc);

	include 'update_incident_success.php';
}

else if(isset($_SESSION['technicianEmail']) && !empty($_SESSION['technicianEmail']))
{
	$technician = get_technician_by_email($_SESSION['technicianEmail']);
	
	$incidents = get_incidents_by_technician($technician['techID']);
	
	include 'select_incident.php';
}

else {
	include 'technician_login.php';
}?>


<?php include '../view/footer.php'; ?>