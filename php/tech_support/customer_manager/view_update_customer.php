<!DOCTYPE html>
<html>
<body>
    <main>
        <h1>Add/Update Customer</h1>

	
		<form action="." method="post">
		<?php if($isNewCustomer) {
					$buttonName = "add_customer";
					$buttonValue = "Add New Customer";
				  }
				  else {
					$buttonName = "update_customer";
					$buttonValue = "Update Customer";
				  }
			?>
		<input type="hidden" name="action" value="<?php echo $buttonName ?>">
		<input type="hidden" name="customerID" value="<?php echo $customerID; ?>"
		
			<p>
				<label>First Name:</label>
				<input type="text" name="firstName" value="<?php echo htmlspecialchars($firstName);?>">
				<?php echo $fields->getField('firstName')->getHTML(); ?> <br>
				
			</p>

			<p>
				<label>Last Name:</label>
				<input type="text" name="lastName" value="<?php echo $lastName; ?>">
				<?php echo $fields->getField('lastName')->getHTML(); ?> <br>
			</p>
			
			<p>
				<label>Address:</label>
				<input type="text" name="address" value="<?php echo $address; ?>">
				<?php echo $fields->getField('address')->getHTML(); ?><br>
			</p>

			<p>
				<label>City:</label>
				<input type="text" name="city" value="<?php echo $city; ?>">
				<?php echo $fields->getField('city')->getHTML(); ?><br>
			</p>
			
			<p>
				<label>State:</label>
				<input type="text" name="state" value="<?php echo $state; ?>">
				<?php echo $fields->getField('state')->getHTML(); ?><br>
			</p>
			
			<p>
				<label>Postal Code:</label>
				<input type="text" name="postalCode" value="<?php echo $postalCode; ?>">
				<?php echo $fields->getField('postalCode')->getHTML(); ?><br>
			</p>
			
			<p>
				<label>Country Code:</label>
					<select name="countryCode">
					
						<?php foreach($countries as $country) : ?>
							<?php if($countryCode == $country['countryCode']): ?>
								<option value="<?php echo $country['countryCode']; ?>" selected>
									<?php echo $country['countryName']; ?>
								</option>
							<?php else: ?>
								<option value="<?php echo $country['countryCode']; ?>">
									<?php echo $country['countryName']; ?>
								</option>
							<?php endif;?>
						<?php endforeach;?>
					</select>
			</p>
			
			<p>
				<label>Phone:</label>
				<input type="text" name="phone" placeholder="999-999-9999" value="<?php echo $phone; ?>">
				<?php echo $fields->getField('phone')->getHTML(); ?><br>
			</p>
			
			<p>
				<label>Email:</label>
				<input type="text" name="email" value="<?php echo $email; ?>">
				<?php echo $fields->getField('email')->getHTML(); ?><br>
			</p>
			
			<p>
				<label>Password:</label>
				<input type="text" name="password" value="<?php echo $password; ?>">
				<?php echo $fields->getField('password')->getHTML(); ?><br>
			</p>

			
			<input type="submit" name="<?php echo $buttonName; ?>" value="<?php echo $buttonValue ?>"><br><br>
			
			<a href="index.php">Search Customers</a>
			
		</form>
		
    </main>
</body>
</html>