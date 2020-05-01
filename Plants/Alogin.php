<?php

$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');

if(!empty($username))
{
if(!empty($password))
{
 $host = "courses";
 $dbusername = "z1848017";
 $dbpassword = "1998Mar15";
 $dbname = "z1848017";

//connect
$conn = new mysqli ($host,$dbusername,$dbpassword,$dbname);
if (mysqli_connect_error())
{
  die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
}
else
{
$sql = "INSERT INTO ALogin (username, password) values('$username','$password')";
if($conn->query($sql))
{
// echo "<a href="http://students.cs.niu.edu/~z1848017/Plants/AdminH.html#">Admin</a>";

 header('location: http://students.cs.niu.edu/~z1848017/Plants/AdminH.html#');
}
//}
else
{
  echo"error:".$sql ."<br>". $conn->error;
}
  $conn->close();
}
}
else
{
  echo "password should not be empty";
  die();
}
}
else
{
  echo "Username should not by empty";
  die();
}
