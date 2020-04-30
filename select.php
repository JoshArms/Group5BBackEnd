<!--***********************
    Written by David Tullis
    Last Modified - 4/29/20
    ***********************-->

<?php  


//connect to customer db and group 5B's own db

$connect = mysqli_connect("blitz.cs.niu.edu:3306", "student", "student");
$sql = "SELECT * FROM customers WHERE id = '".$_POST["customer_id"]."'"; 
mysqli_select_db($connect, 'csci467');
$result = mysqli_query($connect, $sql);

if (!$result) {
    printf("Error: %s\n", mysqli_error($connect));
    exit();
}

// get posted data
$data = json_decode(file_get_contents("php://input"));

$output = '';  


$output .= '  
<div class="table-responsive">  
    <table class="table table-bordered">';  
while($row = mysqli_fetch_array($result) )  
{  
    $output .= '  
            <tr>  
                <td width="30%"><label>ID</label></td>  
                <td width="70%">'.$row["id"].'</td>  
            </tr>  
            <tr>  
                <td width="30%"><label>Name</label></td>  
                <td width="70%">'.$row["name"].'</td>  
            </tr>  
            <tr>  
                <td width="30%"><label>City</label></td>  
                <td width="70%">'.$row["city"].'</td>  
            </tr>  
            <tr>  
                <td width="30%"><label>Street</label></td>  
                <td width="70%">'.$row["street"].'</td>  
            </tr>  
            <tr>  
                <td width="30%"><label>Contact</label></td>  
                <td width="70%">'.$row["contact"].'</td>  
            </tr>  
            ';
}  
//starts a session so that the customer id can be transferred to the sql scripts
echo $output;
session_start();
$_SESSION['cid'] = $_POST["customer_id"];

  
?>
