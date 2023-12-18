<!DOCTYPE html>
<html>

<body>

<main>
    <h1>Assign Incident</h1>

	<section>
		<p>
			<form action="." method="post">
			<input type="hidden" name="action" value="assign_technician">
			
		</p>
		
		<p> 
			<label> Customer: </label>
			<?php echo $customer['firstName'] . ' ' . $customer['lastName']; ?>
			
		</p>
		
		<p> 
			<label> Product: </label>
			<?php echo $incident['productCode']; ?>
			
		</p>
		
		<p> 
			<label> Technician: </label>
			<?php echo $technician['firstName'] . ' ' . $technician['lastName']; ?>
			
		</p>
		
		
				

         <button type="submit">Assign Technician</button>
      
			
			</form>
			
	</section>
   
</main>

</body>
</html>