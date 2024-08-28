<?php

// Include the Database class from the 'database.php' file.
require_once 'database.php';

// The Product class handles operations related to the products in the database.
class Product{
    // These are the properties representing the columns in the products table.
    public $id = '';            // The ID of the product (not used in the add method, but typically used when updating or deleting).
    public $name = '';          // The name of the product.
    public $category = '';      // The category the product belongs to.
    public $price = '';         // The price of the product.
    public $availability = '';  // Availability status of the product (e.g., 'In Stock', 'Out of Stock').

    protected $db; // This will hold the instance of the Database class for database operations.

    // The constructor method initializes the Product class by creating a new Database object.
    function __construct(){
        $this->db = new Database(); // Instantiate the Database class.
    }

    // The add() method is used to add a new product to the database.
    function add(){
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
        if($query->execute()){
            return true;
        }else{
            return false;
        }
    }

    // The showAll() method retrieves all products from the database and returns them.
    function showAll(){
        // SQL query to select all products, ordered alphabetically by name.
        $sql = "SELECT * FROM product ORDER BY name ASC;";

        // Prepare the SQL statement for execution.
        $query = $this->db->connect()->prepare($sql);
        $data = null; // Initialize a variable to hold the fetched data.

        // Execute the query. If successful, fetch all the results into an array.
        if($query->execute()){
            $data = $query->fetchAll(); // Fetch all rows from the result set.
        }

        return $data; // Return the fetched data.
    }
}

// Uncomment the lines below to test the Product class methods.
// Create a new Product instance and display all products.
// $obj = new Product();
// var_dump($obj->showAll());

// Uncomment to add a new product using the add() method.
// $obj->add();
