<?php
// 'user' object
class User{
 
    // database connection and table name
    private $conn;
    private $table_name = "users";
 
    // object properties
    public $user_id;
    public $name;
    public $address;
    public $acc_commission;
    public $password;
 
    // constructor
    public function __construct($db){
        $this->conn = $db;
    }
 
    // create new user record
    function create(){
    
        // insert query
        $query = "INSERT INTO " . $this->table_name . "
                SET
                    name = :name,
                    user_id = :user_id,
                    address = :address,
                    password = :password,
                    acc_commission = :acc_commission";
    
        // prepare the query
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->user_id=htmlspecialchars(strip_tags($this->user_id));
        $this->address=htmlspecialchars(strip_tags($this->address));
        $this->password=htmlspecialchars(strip_tags($this->password));
        $this->acc_commission=htmlspecialchars(strip_tags($this->acc_commission));
    
        // bind the values
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':user_id', $this->user_id);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':address', $this->address);
        $stmt->bindParam(':acc_commission', $this->acc_commission);
    
        // execute the query, also check if query was successful
        if($stmt->execute()){
            return true;
        }
    
        return false;
    }
    
    // check if given user_id exist in the database
    function idExists(){
    
        // query to check if user_id exists
        $query = "SELECT name, password, address, acc_commission
                FROM " . $this->table_name . "
                WHERE user_id = ?
                LIMIT 0,1";
    
        // prepare the query
        $stmt = $this->conn->prepare( $query );
    
        // sanitize
        $this->user_id=htmlspecialchars(strip_tags($this->user_id));
    
        // bind given user_id value
        $stmt->bindParam(1, $this->user_id);
    
        // execute the query
        $stmt->execute();
    
        // get number of rows
        $num = $stmt->rowCount();
    
        // if user_id exists, assign values to object properties for easy access and use for php sessions
        if($num>0){
    
            // get record details / values
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
            // assign values to object properties
            $this->name = $row['name'];
            $this->address = $row['address'];
            $this->acc_commission = $row['acc_commission'];
            $this->password = $row['password'];
    
            // return true because user_id exists in the database
            return true;
        }
    
        // return false if user_id does not exist in the database
        return false;
    }

    function passwordExists(){
    
        // query to check if user_id exists
        $query = "SELECT name, user_id, address, acc_commission
                FROM " . $this->table_name . "
                WHERE password = ?
                LIMIT 0,1";
    
        // prepare the query
        $stmt = $this->conn->prepare( $query );
    
        // sanitize
        $this->password=htmlspecialchars(strip_tags($this->password));
    
        // bind given user_id value
        $stmt->bindParam(1, $this->password);
    
        // execute the query
        $stmt->execute();
    
        // get number of rows
        $num = $stmt->rowCount();
    
        // if user_id exists, assign values to object properties for easy access and use for php sessions
        if($num>0){
    
            // get record details / values
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
            // assign values to object properties
            $this->name = $row['name'];
            $this->address = $row['address'];
            $this->acc_commission = $row['acc_commission'];
            $this->user_id = $row['user_id'];
    
            // return true because user_id exists in the database
            return true;
        }
    
        // return false if user_id does not exist in the database
        return false;
    }

    // update a user record
    public function update(){
    
        // if password needs to be updated
        $password_set=!empty($this->password) ? ", password = :password" : "";
    
        // if no posted password, do not update the password
        $query = "UPDATE " . $this->table_name . "
                SET
                    name = :name,
                    address = :address,
                    acc_commission = :acc_commission
                    {$password_set}
                WHERE user_id = :user_id";
    
        // prepare the query
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->address=htmlspecialchars(strip_tags($this->address));
        $this->acc_commission=htmlspecialchars(strip_tags($this->acc_commission));
    
        // bind the values from the form
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':address', $this->address);
        $stmt->bindParam(':acc_commission', $this->acc_commission);
    
        
        if(!empty($this->password)){
            $this->password=htmlspecialchars(strip_tags($this->password));
            $stmt->bindParam(':password', $this->password);
        }
    
        // execute the query
        if($stmt->execute()){
            return true;
        }
    
        return false;
    }
}