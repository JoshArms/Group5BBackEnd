<!--***********************
    Written by David Tullis
    Last Modified - 4/19/20
    ***********************-->

<?php
// used to get mysql database connection
class Database{
 
    // specify your own database credentials
    private $host = "courses";
    private $db_name = "z1860353";
    private $username = "z1860353";
    private $password = "1999Mar23";
    public $conn;
 
    // get the database connection
    public function getConnection(){
 
        $this->conn = null;
 
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
 
        return $this->conn;
    }
}
?>