<?php

function get_technicians() 
{
		global $db;
		$query = 'SELECT * FROM technicians';

		try{
		$statement = $db->prepare($query);
		$statement->execute();

		return $statement->fetchAll();
		} catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
}

function get_technician($id) 
{
		global $db;
		$query = 'SELECT * FROM technicians
				  WHERE techId = :id';

		try{
		$statement = $db->prepare($query);
		$statement->bindValue(':id', $id);
		$statement->execute();

		return $statement->fetch();
		} catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
}

function get_technician_by_email($email) 
{
		global $db;
		$query = 'SELECT * FROM technicians
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

function add_technician($firstName, $lastName, $email, $phone, $password)
{
		global $db;
		$query = 'INSERT INTO technicians
				  (firstName, lastName, email, phone, password)
				  VALUES
				  (:firstName, :lastName, :email, :phone, :password)';
				  
		$statement = $db->prepare($query);
		$statement->bindValue(':firstName', $firstName);
		$statement->bindValue(':lastName', $lastName);
		$statement->bindValue(':email', $email);
		$statement->bindValue(':phone', $phone);
		$statement->bindValue(':password', $password);
		$statement->execute();
}

function delete_technician($techID)
{
	global $db;
	$query = 'DELETE FROM technicians
			  WHERE techID = :techID';
	
	$statement = $db->prepare($query);
	$statement->bindValue(':techID', $techID);
	$statement->execute();
}

?>