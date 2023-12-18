<?php

function get_countries() 
{
		global $db;
		$query = 'SELECT * FROM countries';

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


?>