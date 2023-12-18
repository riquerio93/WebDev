<!DOCTYPE html>
<html>

<body>

<main>
    <h1>Register Product</h1>

	<section>
		<p>
			Product (<?php echo $productCode; ?>) was registered successfully.
		</p>
		
		<form action="." method="post">
				<input type="hidden" name="action" value="logout">
				
				<input type="submit" name="logout" value="logout">
			</form>
			
	</section>
   
</main>

</body>
</html>