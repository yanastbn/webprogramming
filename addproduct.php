<?php

// Include the functions.php file for utility functions like clean_input, and the product.class.php for database operations.
require_once('functions.php');
require_once('product.class.php');

// Initialize variables to hold form input values and error messages.
$name = $category = $price = $availability = '';
$nameErr = $categoryErr = $priceErr = $availabilityErr = '';

// Check if the form was submitted using the POST method.
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Clean and assign the input values to variables.
    $name = clean_input(($_POST['name']));
    $category = clean_input(($_POST['category']));
    $price = clean_input(($_POST['price']));
    $availability = isset($_POST['availability'])? clean_input(($_POST['availability'])): '';

    // Validate the 'name' field.
    if(empty($name)){
        $nameErr = 'Name is required';
    }

    // Validate the 'category' field.
    if(empty($category)){
        $categoryErr = 'Category is required';
    }

    // Validate the 'price' field.
    if(empty($price)){
        $priceErr = 'Price is required';
    } else if (!is_numeric($price)){
        $priceErr = 'Price should be a number';
    } else if ($price < 1){
        $priceErr = 'Price must be greater than 0';
    }

    // Validate the 'availability' field.
    if(empty($availability)){
        $availabilityErr = 'Availability is required';
    }

    // If there are no validation errors, proceed to add the product to the database.
    if(empty($nameErr) && empty($priceErr) && empty($categoryErr) && empty($availabilityErr)){
        // Create a new instance of the Product class and set its properties.
        $productObj = new Product();
        $productObj->name = $name;
        $productObj->category = $category;
        $productObj->price = $price;
        $productObj->availability = $availability;

        // Try to add the product to the database.
        if($productObj->add()){
            // If successful, redirect to the product list page.
            header('location: product.php');
        } else {
            // If there's an issue, display an error message.
            echo 'Something went wrong when adding new product';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <style>
        .error{
            color: red;
        }
    </style>
</head>
<body>
    <!-- Form to collect product details -->
    <form action="" method="post">
        <!-- Display a note indicating required fields -->
        <span class="error">* are required fields</span>
        <br>

        <!-- Name field with validation error display -->
        <label for="name">Name</label><span class="error">*</span>
        <br>
        <input type="text" name="name" id="name" value="<?= $name ?>">
        <br>
        <?php if(!empty($nameErr)): ?>
            <span class="error"><?= $nameErr ?></span><br>
        <?php endif; ?>

        <!-- Category dropdown with validation error display -->
        <label for="category">Category</label><span class="error">*</span>
        <br>
        <select name="category" id="category">
            <option value="">--Select--</option>
            <option value="Gadget" <?= (isset($category) && $category == 'Gadget')? 'selected=true':'' ?>">Gadget</option>
            <option value="Toys" <?= (isset($category) && $category == 'Toys')? 'selected=true':'' ?>>Toys</option>
        </select>
        <br>
        <?php if(!empty($categoryErr)): ?>
            <span class="error"><?= $categoryErr ?></span><br>
        <?php endif; ?>

        <!-- Price field with validation error display -->
        <label for="price">Price</label><span class="error">*</span>
        <br>
        <input type="number" name="price" id="price" value="<?= isset($_POST['price'])? $price:'' ?>">
        <br>
        <?php if(!empty($priceErr)): ?>
            <span class="error"><?= $priceErr ?></span>
            <br>
        <?php endif; ?>

        <!-- Availability radio buttons with validation error display -->
        <label for="availability">Availability</label><span class="error">*</span>
        <br>
        <input type="radio" value="In Stock" name="availability" id="instock" <?= (isset($availability) && $availability == 'In Stock')? 'checked':'' ?>>
        <label for="instock">In Stock</label>
        <input type="radio" value="No Stock" name="availability" id="nostock" <?= (isset($availability) && $availability == 'No Stock')? 'checked':'' ?>>
        <label for="nostock">No Stock</label>
        <br>
        <?php if(!empty($availabilityErr)): ?>
            <span class="error"><?= $availabilityErr ?></span><br>
        <?php endif; ?>

        <!-- Submit button -->
        <br>
        <input type="submit" value="Save Product">
    </form>
</body>
</html>