<!--***********************
  Written by Rhianna Eberle
  last updated 4/25/20
**********************-->


<!--*********************** Written by Rhianna Eberle last updated 4/25/20 
**********************-->
<?php
 // Connects to Our Database
$dbhost="courses"; 
$dbuser="z1860353"; 
$dbpass="1999Mar23"; 
$dbname="z1860353";

 $conn=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname); /* check connection 
*/ if (!$conn) 
{
    echo "Could not connect to database, please check your connection details"; 
    exit();
}
else { echo "connected to database";
}
 ?>
