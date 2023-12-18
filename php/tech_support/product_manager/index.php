<?php
require('../model/database.php');
require('../model/product_db.php');

$action = filter_input(INPUT_POST, 'action');
		
if($action == 'add_product') {
	
	$productCode = filter_input(INPUT_POST, 'productCode');
	$name = filter_input(INPUT_POST, 'name');
	$version = filter_input(INPUT_POST, 'version', FILTER_VALIDATE_FLOAT);
	$releaseDate = filter_input(INPUT_POST, 'releaseDate'); 
	
	$isValid = true;
	
	//validate data
	if ($productCode == NULL || $name == NULL ||
        $version == NULL ||
		$releaseDate == NULL) {
        $error = "Missing data, please be sure all information is present.";
		$isValid = false;
		if($version == FALSE) 
			$error = "\n TypeError: Version, is to be of type float.";
        include('../errors/error.php');
	}

	$isValidDate = false;
	$validFormats = ['m/d/Y', 'm-d-Y', 'Y/m/d', 'Y-m-d', 'Y-m-d H:i:s'];
	foreach ($validFormats as $format) {
		$dateValidation = DateTime::createFromFormat($format, $releaseDate);
		if($dateValidation && $dateValidation->format($format) === $releaseDate){
			$releaseDate = $dateValidation->format('Y-m-d H:i:s');
			$isValidDate = true;
			break;
		}
	}
			
	if(!$isValidDate){
		$error = "Invalid Date format. Enter a date as a valid date format.";
		include('../errors/error.php');
	}
	
	if($isValid && $isValidDate)
		add_product($productCode, $name, $version, $releaseDate);
	
}

if($action == 'delete_product') {
	
	$productCode = filter_input(INPUT_POST, 'productCode');
	
	delete_product($productCode);
}

$products = get_products();

include '../view/header.php';?>

<!DOCTYPE html>
<html>

<body>

<main>
    <h1>Product List</h1>

    <section>
        <table>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Version</th>
				<th>Release Date</th>
                <th>&nbsp;</th>
            </tr>

            <?php foreach ($products as $product) : ?>
			<?php
			
			$isValid = false;
			$validFormats = ['m/d/Y', 'm-d-Y', 'Y/m/d', 'Y-m-d', 'Y-m-d H:i:s'];
			foreach ($validFormats as $format) {
				$dateValidation = DateTime::createFromFormat($format, $product['releaseDate']);
				if($dateValidation && $dateValidation->format($format) === $product['releaseDate']){
					$isValid = true;
					break;
				}
				
				if($isValid)
					$formattedReleaseDate = DateTime::createFromFormat($format, $product['releaseDate']);
				else
					$formattedReleaseDate = DateTime::createFromFormat('Y-m-d H:i:s', $product['releaseDate']);
			} ?>
			
			
            <tr>
                <td><?php echo $product['productCode']; ?></td>
				<td><?php echo $product['name']; ?></td>
				<td><?php echo $product['version']; ?></td>
				<td><?php echo $formattedReleaseDate->format('m-d-Y'); ?></td>
				
				<td>
					<form action="." method="post">
					<input type="hidden" name="action" value="delete_product">
					
                    <input type="hidden" name="productCode"
                           value="<?php echo $product['productCode']; ?>">
                    <input type="submit" value="Delete">
					</form>
				</td>
				
            </tr>
            <?php endforeach; ?> 
        </table> 
		
        <p><a href="add_product.php">Add Product</a></p>
    </section>
</main>

</body>
</html>

<?php include '../view/footer.php'; ?>