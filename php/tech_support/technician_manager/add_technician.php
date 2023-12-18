<?php include '../view/header.php';?>

<!DOCTYPE html>
<html>
<body>
    <main>
        <h1>Add Technician</h1>

		<form action="." method="post">
		<input type="hidden" name="action" value="add_technician">
		
			<p>
				<label>First Name:</label>
				<input type="text" name="firstName">
			</p>

			<p>
				<label>Last Name:</label>
				<input type="text" name="lastName">
			</p>
			
			<p>
				<label>Email:</label>
				<input type="text" name="email">
			</p>
			
			<p>
				<label>Phone:</label>
				<input type="text" name="phone">
			</p>
			
			<p>
				<label>Password:</label>
				<input type="text" name="password">
			</p>

			<input type="submit" name="add_technician" value="Add Technician"><br><br>
			
			<a href="index.php">View Technician List</a>
			
		</form>
		
    </main>
</body>
</html>

<?php include '../view/footer.php'; ?>