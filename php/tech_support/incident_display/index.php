<?php
require('../model/database.php');
require('../model/customer_db.php');
require('../model/product_db.php');
require('../model/incident_db.php');
include '../view/header.php';

$action = filter_input(INPUT_POST, 'action');
session_start();
		
if(isset($_SESSION['assign'])) {
	unset($_SESSION['assign']);
	$incidents = get_assigned_incidents();
	include 'assigned_incidents.php';

}

else {
		$incidents = get_unassigned_incidents();
		$_SESSION['assign'] = true;
		include 'unassigned_incidents.php';

}?>


<?php include '../view/footer.php'; ?>