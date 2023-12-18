<!DOCTYPE html>
<html>

<body>

<main>
    <h1>Create Incident</h1>

	<section>
		<p>
			<form action="." method="post">
			<input type="hidden" name="action" value="create_incident">
			
				<p>
					<label>Customer</label>
					<?php echo $customer['firstName'] . ' ' . $customer['lastName']; ?>
					
					<input type="hidden" name="customerID"
                           value="<?php echo $customer['customerID']; ?>">
				</p>
				
				<p>
					<label>Product</label>
					<select name="productCode">
					
						<?php foreach($products as $product) : ?>
							<option value="<?php echo $product['productCode']; ?>">
								<?php echo $product['productCode']; ?>
							</option>
						<?php endforeach;?>
					</select>
				</p>
				
				<p>
					<label>Title</label>
					<input type="text" name="title">
				</p>
				
				<p>
					<label>Description</label>
					<input type="text" name="description">
				</p>
				
				
				
				<input type="submit" name="create_incident" value="Create Incident">
			</form>
			
	</section>
   
</main>

</body>
</html>