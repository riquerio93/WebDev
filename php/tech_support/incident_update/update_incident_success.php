<!DOCTYPE html>
<html>

<body>

<main>
    <h1>Assign Incident</h1>

	<section>
		<p>
			This incident was assigned updated.
		</p>
		

  

            <a href="."> Select Another Incident </a>

		
		<form action="." method ="post">
            <input type="hidden" name="action" value="logout" />
            <p>You are logged in as <?php echo $_SESSION['technicianEmail']; ?></p> 

            <input type="submit" name ="logout" value="logout" />
			</form>
			
	</section>
   
</main>

</body>
</html>