<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
</head>
<body>
    <!-- Link to a page where users can add a new product -->
    <a href="addproduct.php">Add Product</a>
    
    <?php
        // Include the Product class file
        require_once 'product.class.php';

        // Create an instance of the Product class
        $productObj = new Product();

        // Call the showAll() method to retrieve all products from the database
        $array = $productObj->showAll();
    ?>

    <!-- Display the products in an HTML table -->
    <table border=1>
        <tr>
            <th>No.</th> <!-- Column for numbering the products -->
            <th>Name</th> <!-- Column for the product name -->
            <th>Category</th> <!-- Column for the product category -->
            <th>Price</th> <!-- Column for the product price -->
            <th>Availability</th> <!-- Column for the product availability status -->
        </tr>
        
        <?php
        $i = 1; // Initialize a counter for numbering the rows
        // Loop through the array of products and display each one in a table row
        foreach($array as $arr){
        ?>
        <tr>
            <!-- Display the row number -->
            <td><?= $i ?></td>
            <!-- Display the product details -->
            <td><?= $arr['name'] ?></td>
            <td><?= $arr['category'] ?></td>
            <td><?= $arr['price'] ?></td>
            <td><?= $arr['availability'] ?></td>
        </tr>
        <?php
            $i++; // Increment the counter for the next row
        }
        ?>
    </table>
</body>
</html>
