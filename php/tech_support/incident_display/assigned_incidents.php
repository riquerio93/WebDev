<!DOCTYPE html>
<html>

<body>

<main>
    <h1>Assigned Incidents</h1>

	<section>
		<p>
			<form action="." method="post">
			<input type="hidden" name="action" value="unassigned_incident">
			
			<a href="index.php">View UnAssigned Incidents</a>
			
			<table>
            <tr>
                <th>Customer</th>
                <th>Product</th>
				<th>Technician</th>
				<th>Incident</th>

            </tr>

            <?php foreach ($incidents as $incident) : ?>
            <tr>
                <td><?php echo $incident['custFirstName'] . ' ' . $incident['custLastName']; ?></td>
				<td><?php echo $incident['productCode']; ?></td>
				<td><?php echo $incident['techFirstName'] . ' ' . $incident['techLastName']; ?></td>
				<td>ID: <?php echo $incident['incidentID']; ?><br><br>
					Opened: <?php $date = new DateTime($incident['dateOpened']); echo $date->format('m/d/y'); ?><br><br>
					Closed: <?php if($incident['dateClosed'] == NULL)
					{ echo "OPEN"; } 
				    else{  $date = new DateTime($incident['dateClosed']);
					echo $date->format('m/d/y');} ?><br><br>
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