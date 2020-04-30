<!--***********************
    Written by David Tullis
    Last Modified - 4/29/20
    ***********************-->
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
 
        <title>Quote Editor</title>
 
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
    <a class="navbar-brand" href="#">Sales Associate Portal</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link" href="index.html" id='home'>Home</a>
            <a class="nav-item nav-link" href="sap.php" id='quotes'>Customers</a>
            <a class="nav-item nav-link" href="login.html" id='login'>Login</a>
        </div>
    </div>
</nav>

<div class="jumbotron">
<img src="img/dollar.png" class="img-thumbnail" alt="logo">
  <h1 class="display-5">Quote Creator</h1>
  <hr class="my-5">


<form action="add_modal.php" method="POST" id="insert_form">
    <div class="form-group">
        <label for="l1d">Line Description (1)</label>
        <input type="l1d" class="form-control" id="l1d" name="l1d" placeholder="Modify the description">
    </div>

    <div class="form-group">
        <label for="l1p">Line Price (1)</label>
        <input type="l1p" class="form-control" id="l1p" name="l1p" placeholder="N/A">
    </div>

    <div class="form-group">
        <label for="l2d">Line Description (2)</label>
        <input type="l2d" class="form-control" id="l2d" name="l2d" placeholder="N/A">
    </div>

    <div class="form-group">
        <label for="l2p">Line Price (2)</label>
        <input type="l2p" class="form-control" id="l2p" name="l2p" placeholder="N/A">
    </div>

    <div class="form-group">
        <label for="l3d">Line Description (3)</label>
        <input type="l3d" class="form-control" id="l3d" name="l3d" placeholder="N/A">
    </div>

    <div class="form-group">
        <label for="l3p">Line Price (3)</label>
        <input type="l3p" class="form-control" id="l3p" name="l3p" placeholder="N/A">
    </div>

    <div class="form-group">
        <label for="comment">Comment</label>
        <input type="comment" class="form-control" id="comment" name="comment" placeholder="N/A">
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="N/A">
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
</form>
</div>
</body>
</html>

<?php
session_start();
$_SESSION['c_id'] = $_SESSION['cid'];
?>

<style type='text/css'>
input, textarea{
    background-color:#666;
    color: #FFF;
}

img {
float: left;
  width: 5%;
  height: 5%;
  border: 0;
}
</style>