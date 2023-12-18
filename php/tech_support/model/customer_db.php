<?php

function get_customers() 
{
		global $db;
		$query = 'SELECT * FROM customers';

		$statement = $db->prepare($query);
		$statement->execute();

		return $statement->fetchAll();
}

function get_customer_by_email($email)
{
	global $db;
	$query = 'SELECT * FROM customers
			   WHERE email = :email';
	
	try{
	$statement = $db->prepare($query);
	$statement->bindValue(':email', $email);
	$statement->execute();
	
	return $statement->fetch();
	} catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
}

function search_customer($lastName)
{
	   global $db;
		$query = 'SELECT * FROM customers
				  WHERE lastName = :lastName';
				  
		try{		  
		$statement = $db->prepare($query);
		$statement->bindValue(':lastName', $lastName);
		$statement->execute();
		
		return $statement->fetchAll();
		} catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
}

function view_customer($customerID)
{
	global $db;
	$query = 'SELECT * FROM customers
			   WHERE customerID = :customerID';
	
	try{
	$statement = $db->prepare($query);
	$statement->bindValue(':customerID', $customerID);
	$statement->execute();
	
	return $statement->fetch();
	} catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
}

function update_customer($customerID, $firstName, $lastName, $email, $phone, $password,
						$address, $city, $state, $postalCode, $countryCode)
{
	global $db;
	$query = 'UPDATE customers
			  SET  
			  firstName = :firstName, lastName = :lastName, email = :email, phone = :phone, password = :password, 
			  address = :address, city = :city, state = :state, postalCode = :postalCode, countryCode = :countryCode
			  WHERE customerID = :customerID';
	
	$statement = $db->prepare($query);
	$statement->bindValue(':firstName', $firstName);
	$statement->bindValue(':lastName', $lastName);
	$statement->bindValue(':email', $email);
	$statement->bindValue(':phone', $phone);
	$statement->bindValue(':password', $password);
	$statement->bindValue(':customerID', $customerID);
	$statement->bindValue(':address', $address);
	$statement->bindValue(':city', $city);
	$statement->bindValue(':state', $state);
	$statement->bindValue(':postalCode', $postalCode);
	$statement->bindValue(':countryCode', $countryCode);
	$statement->execute();
}

function add_customer($firstName, $lastName, $email, $phone, $password,
						$address, $city, $state, $postalCode, $countryCode)
{
	global $db;
	$query = 'INSERT INTO customers (firstName, lastName, email, phone, password, address, city, state, postalCode, countryCode)
			  VALUES  
			  (:firstName, :lastName, :email, :phone, :password, 
			  :address,:city, :state, :postalCode, :countryCode)';
	
	$statement = $db->prepare($query);
	$statement->bindValue(':firstName', $firstName);
	$statement->bindValue(':lastName', $lastName);
	$statement->bindValue(':email', $email);
	$statement->bindValue(':phone', $phone);
	$statement->bindValue(':password', $password);
	$statement->bindValue(':address', $address);
	$statement->bindValue(':city', $city);
	$statement->bindValue(':state', $state);
	$statement->bindValue(':postalCode', $postalCode);
	$statement->bindValue(':countryCode', $countryCode);
	$statement->execute();
}

?>