<?php
// used to get mysql database connection
class Customer_db{
 
    // specify your own database credentials
    private $host = "er7lx9km02rjyf3n.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
    private $port = "3306";
    private $db_name = "b25oudnru9u3blk4";
    private $username = "rs0czd6o8w8e8r3j";
    private $password = "w1ffboir25orrcs4";
    public $conn;
 
    // get the database connection
    public function getConnection(){
 
        $this->conn = null;
 
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";port=" . $this->port .";dbname=" . $this->db_name, $this->username, $this->password);
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
 
        return $this->conn;
    }
}
?>