<!DOCTYPE html>
<html>

<body>

<main>
    <h1>Select Technician</h1>

	<section>
		<p>
			<form action="." method="post">
			<input type="hidden" name="action" value="select_technician">
			
		</p>
		
		 <table>
            <tr>
                <th>Name</th>
                <th>Open Incidents</th>
                <th>&nbsp;</th>
            </tr>

            <?php foreach ($technicians as $technician) : ?>
            <tr>
                <td><?php echo $technician['firstName'] . ' ' . $technician['lastName']; ?></td>
				<td><?php echo $technician['openIncidents']; ?></td>
				
				
				
				<td>
				   <form action="." method="post">
				   <input type="hidden" name="action" value="assign_incident">
					
                    <input type="hidden" name="techID"
                           value="<?php echo $technician['techID']; ?>">
                    <input type="submit" value="Select">
					</form>
				</td>
				
				
            </tr>
            <?php endforeach; ?> 
        </table> 
				
			
			</form>
			
	</section>
   
</main>

</body>
</html>