<!--*****************

 Written by Rhianna Eberle

 last modified: 4/25/20

*********************-->



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

    <a class="navbar-brand" href="#">Quote System</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">

        <span class="navbar-toggler-icon"></span>

    </button>

    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">

        <div class="navbar-nav">

            <a class="nav-item nav-link" href="http://students.cs.niu.edu/~z1848017/Plants/SQuote.html" id='home'>Go Back</a>

            <a class="nav-item nav-link" href="mailto:z1848017@students.niu.edu?Subject=Login%20Issues" id='quote'>Customer Service Email</a>

        </div>

    </div>

</nav>


<?php
//create the table
echo"<html>";
 echo"<head>";
echo"<style>";
echo"table,tr,th,td
{
border: 1px solid white;
}";
echo "</style>";
echo "</head>";
echo '<table>';
echo '<tr style="color:white;">';
echo '<th>Quote Id</th>';
echo '<th>Date</th>';
echo '<th>Sales Associate_id</th>';
echo '<th>Customer_id</th>';
echo'<th>Status</th>';

//connect to php
include 'connect.php';

//after pressing search
if(isset($_POST['search']))
{
$user_id=$_POST['user_id'];    //grad user id
$sql="SELECT * FROM finalized_quotes WHERE user_id='$user_id'";  //look up user id inserted
$result=mysqli_query($conn,$sql);
 if(mysqli_num_rows($result)>0)    //if results have info
 {
  while($row=mysqli_fetch_assoc($result))   //fetch the results
 {
          echo '<tr style="color:white;">';     //show the results
          echo '<td>'.$row['q_id'].'</td>';
          echo '<td>'.$row['dateCreated'].'</td>';
          echo '<td>'.$row['user_id'].'</td>';
          echo '<td>'.$row['c_id'].'</td>';
          echo '<td>'.$row['status'].'</td>';
}
}
}
?>
