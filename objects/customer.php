<?php
// 'user' object
class Customer{
 
    // database connection and table name
    private $conn;
    private $table_name = "customer_quotes_db";
 
    // object properties
    public $id;
    public $name;
    public $quote;
 
    // constructor
    public function __construct($db){
        $this->conn = $db;
    }


}