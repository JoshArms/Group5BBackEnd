<!--***********************
  Written by Rhianna Eberle
  last updated 4/25/20
**********************-->



<?php
//info in table
$user_id = $_POST['user_id'];
$password = $_POST['password'];
$name = $_POST['name'];
$acc_commision = $_POST['acc_commision'];
$address = $_POST['address'];
//if table is not empty
if (!empty($user_id) || !empty($password) || !empty($name) || !empty($acc_commision) || !empty($address))
{
  //connect to database
    $host = "courses";
    $db_name = "z1860353";
    $username = "z1860353";
    $password = "1999Mar23";

   $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
//error to connecting
   if(mysqli_connect_error())
   {
    die('Connect Error(' .mysqli_connect_errno().')'. mysqli_connect_error());
   }
   //else insert itno user table
   else
   {
     $SELECT = "SELECT id From register WHERE id = ? Limit 1";
     $INSERT = "INSERT INTO users(user_id,password,name,acc_commision,address) Values(?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param('s', $id);
    $stmt->execute();
    $stmt->bind_result($email);
    $stmt->store_result();
    $rnum = $stmt->num_rows;
   //if ID number is in use
   if($rnum==0)
   {
    $stmt->close();
    $stmt = $conn->prepare($INSERT);
    $stmt->bind_param("siiss",$user_id,$password,$name,$acc_commision,$address);
    $stmt->execute();
    echo "New record inserted sucessfully";
   }
   else
   {
    echo "That ID number is in use";
   }

   $stmt->close();
   $conn->close(); 
}
}
 else
{
  echo "All field are required";
  die();
}

?>
