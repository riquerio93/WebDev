<!DOCTYPE html>
<html>

<body>

<main>
    <h1>Select Incident</h1>

	<section>
		<p>
			<form action="." method="post">
			<input type="hidden" name="action" value="view_incident">
			
		</p>
		
		 <table>
            <tr>
                <th>Customer</th>
                <th>Product</th>
				<th>Date Opened</th>
				<th>Title</th>
				<th>Descripton</th>
                <th>&nbsp;</th>
            </tr>

            <?php foreach ($incidents as $incident) : ?>
            <tr>
                <td><?php echo $incident['firstName'] . ' ' . $incident['lastName']; ?></td>
				<td><?php echo $incident['productCode']; ?></td>
				<td><?php $date = new DateTime($incident['dateOpened']); echo $date->format('m/d/y'); ?></td>
				<td><?php echo $incident['title']; ?></td>
				<td><?php echo $incident['description']; ?></td>
				
				<td>
				   <form action="." method="post">
				   <input type="hidden" name="action" value="view_incident">
					
                    <input type="hidden" name="incidentID"
                           value="<?php echo $incident['incidentID']; ?>">
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