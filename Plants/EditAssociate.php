<!--*******************
  written by Rhianna Eberle
  Last Modified - 4/25/20
*********************-->

<!DOCTYPE html>
<html lang="en">
<head>
<Title>Maintain Associate Data</title>
    <!-- Libraries -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha38$
        <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
        <link href="custom.css" rel="stylesheet">
</head>
<body>
<!-- navbar -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">Edit Sales Associate</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" ari$
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

<h2 style="color:white;">Select Sales Associate to Delete</h2>
<table class="table table-striped table-bordered bg-light">
  <thead>
  <tr class="bg-dark text-light text-center">
  <th>Name</th>
  <th>ID</th>
  <th>Password</th>
  <th>Commission</th>
  <th>Address</th>
  <th>Edit</th>
</tr>
</thead>
<body>
<?php
  include 'connect.php';  //connect to database
  $sql="SELECT * FROM users";  //show table
  $result=mysqli_query($conn,$sql);
  if(mysqli_num_rows($result)>0)   //if there is results in table
  {
  while($row=mysqli_fetch_assoc($result)){
?>
//show table results
<tr class="text-center">
<td><?= $row['user_id'];?></td>
<td><?= $row['password'];?></td>
<td><?= $row['name'];?></td>
<td><?= $row['acc_commision'];?></td>
<td><?= $row['address'];?></td>
//redirect to edit page
<td><a href="edit.php?user_id=<?= $row['user_id'];?>">Edit</a></td>
</tr>
 <?php }} ?>
</body>
</table>



