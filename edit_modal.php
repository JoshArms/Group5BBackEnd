<?php
// required headers
header("Access-Control-Allow-Origin: http://localhost/467_final_proj/");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// files needed to connect to database
include_once 'config/database.php';
include_once 'objects/customer.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// instantiate product object
$customer = new Customer($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));

$customer->quote = $data->quote;
$customer->comment = $data->comment;

echo "here2";

if($customer->modify()){
 
    // set response code
    http_response_code(200);
 
    // display message: customer data altered
    echo json_encode(array("message" => "Customer data altered."));
} // message if unable to edit quote data
else{
 
    // set response code
    http_response_code(400);
 
    // display message: unable to modify customer data
    echo json_encode(array("message" => "Unable to modify customer data."));
}
?>