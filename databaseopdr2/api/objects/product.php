<?php
class Product
{
   // database connectie en tabel-naam
   private $conn;
   private $table_name = "product";
   // object properties
   public $id;
   public $word;
   public $grace;
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
   function create(){
   if (isset($_GET["create"])){
    $word= $_GET['word'];
    $checked = $_GET['checked'];
    $grace = $_GET['grace'];
    
    $sql = "INSERT INTO $this->table_name (word, checked, grace) VALUES ('$word','$checked','$grace')";
    $result = mysqli_query($this->conn, $sql);
    // echo " last toegevoegd " . mysqli_insert_id($conn);
    if($result)
    if($result){
    
    }
    else
    {
        echo "Error :".$sql;
    }
    }
}
function readUpdate()
   {
    if (isset($_GET["id"])){
        $id = $_GET["id"];
       $query = "SELECT * FROM " . $this->table_name . " WHERE id = $id";
    //    echo $query;
       }
       else{
        $query = "SELECT * FROM " . $this->table_name;
        // echo $query;
       }
       $result = $this->conn->query($query);
       return $result;
   }
function update(){
    // select all query
    if(isset($_GET['update'])){
        $id = $_GET["update"];
        $word= $_GET['word'];
        $checked = $_GET['checked'];
        $grace = $_GET['grace'];
    
        $sql = "UPDATE `$this->table_name` SET `word`='$word',`checked`='$checked',
        `grace`='$grace' WHERE `id` = '$id'";
        // echo $sql;
        // echo $id;
        // echo $title;
        $result = mysqli_query($this->conn, $sql);
        if($result){
             echo '<script type="text/javascript"> alert("Data Update")</script>';
             header ("refresh:0;url=read_all.php");
             echo "Redirecting.....";
    
        }
        else{
            echo '<script type="text/javascript"> alert("Data NOT Update")</script>';
        }
    }
}
function delete(){
    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $sql = "DELETE FROM $this->table_name WHERE `id`='$id'"  ;
        // echo $sql;
        // echo $id;
        // echo $title;
        $result = mysqli_query($this->conn, $sql);
        if($result){
            echo '<script type="text/javascript"> alert("Data Update")</script>';
            header ("refresh:0;url=read_all.php");
            echo "Redirecting.....";
        }
        else{
            echo '<script type="text/javascript"> alert("Data NOT Update")</script>';
        }
    }
}
}