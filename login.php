<!--***********************
    Written by David Tullis
    Last Modified - 4/19/20
    ***********************-->


<?php
// required headers


// files needed to connect to database
require_once dirname( __FILE__ ) . '/config/database.php';
require_once dirname( __FILE__ ) . '/objects/user.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();

 
// instantiate user object
$user = new User($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// set product property values
$user->user_id = $data->user_id;
$user_id_exists = $user->idExists();
$user->password = $data->password;
$password_exists = $user->passwordExists();

 
// check if user_id exists and if password is correct
if($user_id_exists && $password_exists){
 
    
    $column = array(
        "user_id" => $user->user_id,
        "name" => $user->name,
        "password" => $user->password,
        "address" => $user->address
    );
    
    session_start();
    $_SESSION['user'] = $user->user_id;


    // set response code
    http_response_code(200);
 
    echo json_encode(array("message" => "Successful login.", "data" => $column));
    
}
 
// login failed
else{
 
    // set response code
    http_response_code(401);
 
    // tell the user login failed
    echo json_encode(array("message" => "Login failed."));
    
}
?>