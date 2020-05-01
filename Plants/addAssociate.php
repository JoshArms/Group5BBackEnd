<!--***********************
  Written by Rhianna Eberle
  last updated 4/25/20
**********************-->
<?php
 include 'connect.php';  //connect to database
 $result="";

if(isset($_POST['submit']))  //search thre results to be added in SQL
 {
  $user_id=test_input($_POST['user_id']);
  $password=test_input($_POST['password']);
  $name=test_input($_POST['name']);
  $acc_commision=test_input($_POST['acc_commision']);
  $address=test_input($_POST['address']);

  //connect to SQL to be added
  $sql="INSERT INTO users(user_id,password,name,acc_commision,address)VALUES('$user_id','$password','$name','$acc_commision','$address')";
   //if the infomaiton was added succesfully
  if(mysqli_query($conn,$sql)){
  $result="Record was Added Successfully!"; 
  echo("<button onclick=\"location.href='http://students.cs.niu.edu/~z1848017/Plants/ViewAssociate.php'\">View New Data</button>");
  }
  else{
  $result="Something was entered in wrong";
 }
}
//test the input
function test_input($data)
{
  $data=trim($data);
  $data=stripslashes($data);
  $data=htmlspecialchars($data);
  return $data;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<Title>Maintain Associate Data</title>
    <!-- Libraries -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
        <link href="custom.css" rel="stylesheet">
</head>
<body>
<!-- navbar -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">Add Sale Associate Data</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link" href="http://students.cs.niu.edu/~z1860353/467_final_proj/index.html" id='home'>Home</a>
            <a class="nav-item nav-link" href="http://students.cs.niu.edu/~z1848017/Plants/AdminH.html#" id='Go Back'>Go Back</a>
            <a class="nav-item nav-link" href="mailto:z1848017@students.niu.edu?Subject=Login%20Issues" id='quote'>Customer Service Email</a>
        </div>
    </div>
</nav>

<form action="" method="POST">
<table  style="background-color:#A9A9A9;">
<tr>
 <td>ID :</td>
 <td><input type="text" name="user_id" required></td>
</tr>
<tr>
  <td>Password :</td>
  <td><input type="text" name="password" required></td>
</tr>
<tr>
  <td>name :</td>
  <td><input type="text" name="name" required></td>
</tr>
<tr>
  <td>Commission :</td>
  <td><input type="text" name="acc_commision" required></td>
</tr>
<tr>
  <td>Address :</td>
  <td><input type="text" name="address"  required></td>
</tr>
<tr>
<td><input type="submit" name="submit" value="Insert" class=btn btn-primary btn-block></td>

</tr>
</table>
</html>

