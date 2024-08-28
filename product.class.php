<?php

// Include the Database class from the 'database.php' file.
require_once 'database.php';

// The Product class handles operations related to products in the database.
class Product {
    // These properties represent the columns in the 'products' table.
    public $id = '';            // The ID of the product. Typically used when updating or deleting a product.
    public $name = '';          // The name of the product.
    public $category = '';      // The category the product belongs to.
    public $price = '';         // The price of the product.
    public $availability = '';  // Availability status of the product (e.g., 'In Stock', 'Out of Stock').

    protected $db; // This will hold an instance of the Database class for database operations.

    // The constructor method initializes the Product class by creating a new Database object.
    function __construct() {
        $this->db = new Database(); // Instantiate the Database class.
    }

    // The add() method is used to add a new product to the database.
    function add() {
        // SQL query to insert a new product into the 'products' table.
        $sql = "INSERT INTO product (name, category, price, availability) VALUES (:name, :category, :price, :availability);";

        // Prepare the SQL statement for execution.
        $query = $this->db->connect()->prepare($sql);

        // Bind the product properties to the named placeholders in the SQL statement.
        $query->bindParam(':name', $this->name);
        $query->bindParam(':category', $this->category);
        $query->bindParam(':price', $this->price);
        $query->bindParam(':availability', $this->availability);

        // Execute the query. If successful, return true; otherwise, return false.
        return $query->execute();
    }

    // The edit() method is used to update an existing product in the database.
    function edit() {
        // SQL query to update an existing product in the 'products' table.
        $sql = "UPDATE product SET name = :name, category = :category, price = :price, availability = :availability WHERE id = :id;";

        // Prepare the SQL statement for execution.
        $query = $this->db->connect()->prepare($sql);

        // Bind the product properties to the named placeholders in the SQL statement.
        $query->bindParam(':name', $this->name);
        $query->bindParam(':category', $this->category);
        $query->bindParam(':price', $this->price);
        $query->bindParam(':availability', $this->availability);
        $query->bindParam(':id', $this->id);

        // Execute the query. If successful, return true; otherwise, return false.
        return $query->execute();
    }

    // The showAll() method retrieves all products from the database and returns them.
    function showAll() {
        // SQL query to select all products, ordered alphabetically by name.
        $sql = "SELECT * FROM product ORDER BY name ASC;";

        // Prepare the SQL statement for execution.
        $query = $this->db->connect()->prepare($sql);
        $data = null; // Initialize a variable to hold the fetched data.

        // Execute the query. If successful, fetch all the results into an array.
        if($query->execute()) {
            $data = $query->fetchAll(); // Fetch all rows from the result set.
        }

        return $data; // Return the fetched data.
    }

    // The fetchRecord() method retrieves a single product record from the database based on its ID.
    function fetchRecord($recordID) {
        // SQL query to select a single product based on its ID.
        $sql = "SELECT * FROM product WHERE id = :recordID;";

        // Prepare the SQL statement for execution.
        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(':recordID', $recordID);
        $data = null; // Initialize a variable to hold the fetched data.

        // Execute the query. If successful, fetch the result.
        if($query->execute()) {
            $data = $query->fetch(); // Fetch the single row from the result set.
        }

        return $data; // Return the fetched data.
    }
}

// Uncomment the lines below to test the Product class methods.
// Create a new Product instance and display all products.
// $obj = new Product();
// var_dump($obj->showAll());

// Uncomment to add a product using the add() method.
// $obj->add();

// Uncomment to update a product using the edit() method.
// $obj->edit(1);

// var_dump($obj->fetchRecord(1));