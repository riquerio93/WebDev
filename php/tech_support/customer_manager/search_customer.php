<!DOCTYPE html>
<html>

<body>

<main>
    <h1>Customer Search</h1>

	<section>
		<p>
			<form action="." method="post">
			<input type="hidden" name="action" value="search_customer">
			
				<label>Last Name</label>
				<input type="text" name="lastName">
				<input type="submit" name="search_customer" value="Search">
			</form>
			
	</section>
    <section>
		<h1> Results </h1>
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
				<th>City</th>
                <th>&nbsp;</th>
            </tr>

            <?php foreach ($customers as $customer) : ?>
            <tr>
                <td><?php echo $customer['firstName'] . ' ' . $customer['lastName']; ?></td>
				<td><?php echo $customer['email']; ?></td>
				<td><?php echo $customer['city']; ?></td>
				
				<td>
					<form action="." method="post">
					<input type="hidden" name="action" value="select_customer">
					
                    <input type="hidden" name="customerID"
                           value="<?php echo $customer['customerID']; ?>">
                    <input type="submit" value="Select">
					</form>
				</td>
				
            </tr>
            <?php endforeach; ?> 
        </table> 
		
		<h1> Add A New Customer </h1>
		<form action="." method="post">
		<input type="hidden" name="action" value="new_customer">
         <button type="submit">Add Customer</button>
      </form>
		
    </section>
</main>

</body>
</html>