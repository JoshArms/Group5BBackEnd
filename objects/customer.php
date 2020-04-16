<?php
// 'user' object
class Customer{
 
    // database connection and table name
    private $conn;
    private $table_name = "customer_db";
 
    // object properties
    public $id;
    public $name;
    public $quote;
 
    // constructor
    public function __construct($db){
        $this->conn = $db;
    }

    echo "here1";

    function Modify(){

        $query = "INSERT INTO " . $this->table_name . "
                SET
                    quote = :quote,
                    comment = :comment";
    
        // prepare the query
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->quote=htmlspecialchars(strip_tags($this->quote));
        $this->comment=htmlspecialchars(strip_tags($this->comment));
    
        // bind the values
        $stmt->bindParam(':quote', $this->quote);
        $stmt->bindParam(':comment', $this->comment);
       
        // execute the query, also check if query was successful
        if($stmt->execute()){
            return true;
        }
    
        return false;
        
    }

}