<!DOCTYPE html>
<html>

<body>

<main>
    <h1>Register Product</h1>

	<section>
		<p>
			<form action="." method="post">
			<input type="hidden" name="action" value="register">
			
				<p>
					<label>Customer</label>
					<?php echo $customer['firstName'] . ' ' . $customer['lastName']; ?>
					
					<input type="hidden" name="customerID"
                           value="<?php echo $customer['customerID']; ?>">
				</p>
				
				<p>
					<label>Products</label>
					<select name="productCode">
					
						<?php foreach($products as $product) : ?>
							<option value="<?php echo $product['productCode']; ?>">
								<?php echo $product['name']; ?>
							</option>
						<?php endforeach;?>
					</select>
				</p>
				
				
				<input type="submit" name="register" value="register">
				
				
			</form>
			
			<form action="." method="post">
				<input type="hidden" name="action" value="logout">
				<br>
				<br>
				<input type="submit" name="logout" value="logout">
			</form>
			
	</section>
   
</main>

</body>
</html>