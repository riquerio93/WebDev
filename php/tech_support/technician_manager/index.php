<?php
require('../model/database.php');
require('../model/technician_db.php');

$action = filter_input(INPUT_POST, 'action');
		
if($action == 'add_technician') {
	
	$firstName = filter_input(INPUT_POST, 'firstName');
	$lastName = filter_input(INPUT_POST, 'lastName');
	$email = filter_input(INPUT_POST, 'email');
	$phone = filter_input(INPUT_POST, 'phone');
	$password = filter_input(INPUT_POST, 'password');
	
	//validate data
	if ($firstName == NULL || $lastName == NULL ||
        $email == NULL || $phone == NULL ||
		$password == NULL) {
        $error = "Missing data, please be sure all information is present.";
        include('../errors/error.php');
	}
	
	else
	add_technician($firstName, $lastName, $email, $phone, $password);
}

if($action == 'delete_technician') {
	
	$techID = filter_input(INPUT_POST, 'techID');
	
	delete_technician($techID);
}

$technicians = get_technicians();

include '../view/header.php';?>

<!DOCTYPE html>
<html>

<body>

<main>
    <h1>Technician List</h1>

    <section>
        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
				<th>Phone</th>
				<th>Password</th>
                <th>&nbsp;</th>
            </tr>

            <?php foreach ($technicians as $technician) : ?>
            <tr>
                <td><?php echo $technician['firstName']; ?></td>
				<td><?php echo $technician['lastName']; ?></td>
				<td><?php echo $technician['email']; ?></td>
				<td><?php echo $technician['phone']; ?></td>
				<td><?php echo $technician['password']; ?></td>
				
				<td>
					<form action="." method="post">
					<input type="hidden" name="action" value="delete_technician">
					
                    <input type="hidden" name="techID"
                           value="<?php echo $technician['techID']; ?>">
                    <input type="submit" value="Delete">
					</form>
				</td>
				
            </tr>
            <?php endforeach; ?> 
        </table> 
		
        <p><a href="add_technician.php">Add Technician</a></p>
    </section>
</main>

</body>
</html>

<?php include '../view/footer.php'; ?>