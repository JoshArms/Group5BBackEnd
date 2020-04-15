<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// files needed to connect to database
include_once 'config/database.php';
include_once 'objects/user.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// instantiate user object
$user = new User($db);
 
$data = json_decode(file_get_contents("php://input"));

// set user property values
$user->name = $data->name;
$user->user_id = $data->user_id;
$user->password = $data->password;
$user->address = $data->address;
$user->acc_commission = $data->acc_commissions;
 
// update the user record
if($user->update()){
    $column = array(
        "user_id" => $user->user_id,
        "name" => $user->name,
        "password" => $user->password,
        "address" => $user->address
    );
    

    // set response code
    http_response_code(200);
 
    echo json_encode(array("message" => "Successful update.", "data" => $column));
}
 
// message if unable to update user
else{
    // set response code
    http_response_code(401);
 
    // show error message
    echo json_encode(array("message" => "Unable to update user."));
}