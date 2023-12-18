<?php

function get_products() 
{
		global $db;
		$query = 'SELECT * FROM products
				  ORDER BY productCode';
		
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

function add_product($productCode, $name, $version, $releaseDate)
{
		global $db;
		$query = 'INSERT INTO products
				  (productCode, name, version, releaseDate)
				  VALUES
				  (:productCode, :name, :version, :releaseDate)';
				  
		$statement = $db->prepare($query);
		$statement->bindValue(':productCode', $productCode);
		$statement->bindValue(':name', $name);
		$statement->bindValue(':version', $version);
		$statement->bindValue(':releaseDate', $releaseDate);
		$statement->execute();
}

function delete_product($productCode)
{
	global $db;
	$query = 'DELETE FROM products
			  WHERE productCode = :productCode';
	
	$statement = $db->prepare($query);
	$statement->bindValue(':productCode', $productCode);
	$statement->execute();
}

?>