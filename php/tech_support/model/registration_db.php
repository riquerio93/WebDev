<?php

function add_registration($customerID, $productCode, $registrationDate)
{
		global $db;
		$query = 'INSERT INTO registrations
				  (customerID, productCode, registrationDate)
				  VALUES
				  (:customerID, :productCode, :registrationDate)';
				  
		$statement = $db->prepare($query);
		$statement->bindValue(':productCode', $productCode);
		$statement->bindValue(':customerID', $customerID);
		$statement->bindValue(':registrationDate', $registrationDate);
		$statement->execute();
}

function get_customer_registrations($customerID)
{
	global $db;
	$query = 'SELECT * FROM registrations
			  WHERE customerID = :customerID';
				
		try{
		$statement = $db->prepare($query);
		$statement->bindValue(':customerID', $customerID);
		$statement->execute();
		
		return $statement->fetchAll();
		} catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
}

?>