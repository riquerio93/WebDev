<?php

function add_incident($customerID, $productCode, $title, $description)
{
		global $db;
		$query = 'INSERT INTO incidents
				  (customerID, productCode, title, description)
				  VALUES
				  (:customerID, :productCode, :title, :description)';
				  
		$statement = $db->prepare($query);
		$statement->bindValue(':productCode', $productCode);
		$statement->bindValue(':customerID', $customerID);
		$statement->bindValue(':title', $title);
		$statement->bindValue(':description', $description);
		$statement->execute();
	
}

function get_all_incidents() {
    global $db;
    $query = 'SELECT c.firstName, c.lastName, i.*
              FROM incidents i
                  INNER JOIN customers c ON c.customerID = i.customerID';
    try {
        $statement = $db->prepare($query);
        $statement->execute();
        return $statement->fetchAll();
        } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();     
		}
}

function get_technicians_open_incidents() {
    global $db;
    $query = 'SELECT t.techID, t.firstName, t.lastName, 
			  COALESCE(i.openIncidents, 0) AS openIncidents FROM 
              (SELECT * FROM technicians) t
              LEFT JOIN
			  (SELECT techID, COUNT(*) AS openIncidents
			     FROM incidents
				 WHERE dateClosed IS NULL
				 GROUP BY techID) i
			   ON t.techID = i.techID
			   ORDER BY i.openIncidents';
    try {
        $statement = $db->prepare($query);
        $statement->execute();
        return $statement->fetchAll();
        } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();     
		}
}

function get_incident($id) {

		global $db;
		$query = 'SELECT * FROM incidents
				  WHERE incidentId = :id';

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

function assign_incident($incidentId, $techId) {
    global $db;
    $query =
        'UPDATE incidents
         SET techID = :techId
         WHERE incidentID = :incidentId';
 
        $statement = $db->prepare($query);
        $statement->bindValue(':incidentId', $incidentId);
        $statement->bindValue(':techId', $techId);
        $statement->execute();
}

function get_incidents_by_technician($id) {
    global $db;
    $query = 'SELECT c.firstName, c.lastName, i.*
              FROM incidents i
                  INNER JOIN customers c ON c.customerID = i.customerID
                  WHERE techID = :id AND dateClosed IS NULL';
 
		try{
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
		        return $statement->fetchAll();
        } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();     
		}
}


function update_incident($id, $dateClosed, $description) {
    global $db;
    $query = 'UPDATE incidents
              SET dateClosed = :dateClosed, description = :description
              WHERE incidentID = :id';

        $statement = $db->prepare($query);
        $statement->bindValue(':dateClosed', $dateClosed);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':id', $id);
        $statement->execute();
}

function get_unassigned_incidents() {
    global $db;
    $query = 'SELECT c.firstName, c.lastName,
			  p.name AS productName, i.*
              FROM incidents i
                  INNER JOIN customers c ON c.customerID = i.customerID
				  INNER JOIN products p ON p.productCode = i.productCode
			   WHERE i.techID IS NULL';
    try {
        $statement = $db->prepare($query);
        $statement->execute();
        return $statement->fetchAll();
        } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();     
		}
}

function get_assigned_incidents() {
    global $db;
    $query = 'SELECT c.firstName AS custFirstName, c.lastName AS custLastName,
			  t.firstName AS techFirstName, t.lastName AS techLastName, 
			  p.name AS productName, i.*
              FROM incidents i
                  INNER JOIN customers c ON c.customerID = i.customerID
				  INNER JOIN products p ON p.productCode = i.productCode
				  INNER JOIN technicians t ON t.techID = i.techID';
    try {
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