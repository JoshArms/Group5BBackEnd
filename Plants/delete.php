<!--***********************
  Written by Rhianna Eberle
  last updated 4/25/20
**********************-->


<?php
  include 'connect.php';  //connect to database
  $user_id=$_GET['user_id'];  //get row you want to delete

  $sql="DELETE FROM users  WHERE user_id='$user_id'";  //delete from SQL
  if(mysqli_query($conn,$sql))
  {
   header("location:deleteSearch.php");  //reload page
  }
  else
  {
   echo"Could not Delete";
}
?>
