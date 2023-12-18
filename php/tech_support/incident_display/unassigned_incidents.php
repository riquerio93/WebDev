<!DOCTYPE html>
<html>

<body>

<main>
    <h1>Unassigned Incidents</h1>

	<section>
		<p>
			<form action="." method="post">
			<input type="hidden" name="action" value="assigned_incidents">
			
			<a href=".">View Assigned Incidents</a>
			
			<table>
            <tr>
                <th>Customer</th>
                <th>Product</th>
				<th>Incident</th>

            </tr>

            <?php foreach ($incidents as $incident) : ?>
            <tr>
                <td><?php echo $incident['firstName'] . ' ' . $incident['lastName']; ?></td>
				<td><?php echo $incident['productCode']; ?></td>
				
				<td>ID: <?php echo $incident['incidentID']; ?><br><br>
					Opened: <?php $date = new DateTime($incident['dateOpened']); echo $date->format('m/d/y'); ?><br><br>
				    Title: <?php echo $incident['title']; ?><br><br>
				    Desc: <?php echo $incident['description']; ?></td>
				
				
            </tr>
            <?php endforeach; ?> 
        </table> 
			</form>
			
	</section>
   
</main>

</body>
</html>