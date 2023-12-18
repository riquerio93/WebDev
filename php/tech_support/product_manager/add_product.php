<?php include '../view/header.php';?>

<!DOCTYPE html>
<html>
<body>
    <main>
        <h1>Add Product</h1>

		<form action="." method="post">
		<input type="hidden" name="action" value="add_product">
		
			<p>
				<label>Code:</label>
				<input type="text" name="productCode">
			</p>

			<p>
				<label>Name:</label>
				<input type="text" name="name">
			</p>
			
			<p>
				<label>Version:</label>
				<input type="text" name="version">
			</p>
			
			<p>
				<!-- add proper date validarion -->
				<label>Release Date:</label>
				<input type="text" name="releaseDate">
			</p>

			<input type="submit" name="add_product" value="Add Product"><br><br>
			
			<a href="index.php">View Product List</a>
			
		</form>
		
    </main>
</body>
</html>

<?php include '../view/footer.php'; ?>