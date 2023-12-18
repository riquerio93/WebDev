<?php
require('../model/database.php');
require('../model/incident_db.php');
require('../model/technician_db.php');
require('../model/customer_db.php');
include '../view/header.php';

$action = filter_input(INPUT_POST, 'action');
		
session_start();



if($action == 'login') {
	

}

else if($action == 'select_technician') {
	$technicians = get_technicians_open_incidents();
	
	$incidentID = filter_input(INPUT_POST, 'incidentID');
	$custID = filter_input(INPUT_POST, 'custID');
	$_SESSION['incidentID'] = $incidentID; 
	$_SESSION['custID'] = $custID; 
	
	include 'select_technician.php';
}

else if($action == 'assign_incident') {
	$techID = filter_input(INPUT_POST, 'techID');
    $_SESSION['techID'] = $techID; 
	

	$incident = get_incident($_SESSION['incidentID']);
	$customer = view_customer($_SESSION['custID']);
	$technician = get_technician($_SESSION['techID']);

	include 'assign_incident.php';
}

else if($action == 'assign_technician') {

	assign_incident($_SESSION['incidentID'], $_SESSION['techID']);
	include 'assign_technician_success.php';
}

else {
	$incidents = get_all_incidents();
	include 'select_incident.php';
}?>


<?php include '../view/footer.php'; ?>