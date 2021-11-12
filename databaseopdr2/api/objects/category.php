// Maak in product.php de volgende code:
<?php
class Category
{
   // database connectie en tabel-naam
   private $conn;
   private $table_name = "category";
   // object properties
   public $id;
   // constructor with $db as database connection
   public function __construct($db)
   {
       $this->conn = $db;
   }
   // read products
   function read()
   {
       // select all query
       $query = "SELECT * FROM " . $this->table_name;
       $result = $this->conn->query($query);
       return $result;
   }
}