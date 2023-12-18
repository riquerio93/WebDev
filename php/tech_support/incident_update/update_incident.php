<!DOCTYPE html>
<html>

<body>

<main>
    <h1>Update Incident</h1>

	<section>
		<p>
			<form action="." method="post">
			<input type="hidden" name="action" value="update_incident_success">
			
		</p>
		
		<p>
			<label> Incident ID: </label>  &nbsp; &nbsp;
			<?php echo $incident['incidentID']; ?>
			<input type="hidden" name="incidentID"
                           value="<?php echo $incident['incidentID']; ?>">
			
		</p>
		
		<p>
			<label> Product Code: </label>  &nbsp; &nbsp;
			<?php echo $incident['productCode']; ?>
		</p>
		
		<p> 
			<label> Date Opened: </label>  &nbsp; &nbsp;
			<?php $date = new DateTime($incident['dateOpened']); echo $date->format('m/d/y'); ?>
		</p>
		
		<p>
			<label> Date Closed: </label>  &nbsp; &nbsp;
			<input type="text" id="dateClosed" name="dateClosed" value="<?php $date = new DateTime($incident['dateClosed']); echo $date->format('m/d/y'); ?>"></input>

		</p>
		
		<p>
			<label> Title: </label>  &nbsp; &nbsp;
			<?php echo $incident['title']; ?>
		</p>
		
		<p>
			<label> Description: </label>  &nbsp; &nbsp;
			<textarea id="textareaDesc" name="textareaDesc"> <?php echo $incident['description'] ?> </textarea>
			
		</p>
				
            <input type="submit" value="Update Incident">
			</form>
			
			<form action="." method ="post">
            <input type="hidden" name="action" value="logout" />
            <p>You are logged in as <?php echo $_SESSION['technicianEmail']; ?></p> 

            <input type="submit" name ="logout" value="logout" />
			</form>
			
	</section>
   
</main>

</body>
</html>