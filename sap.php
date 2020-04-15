<?php
/*<td><?php echo $row["name"]; ?></td>
            <td><?php echo $row["city"]; ?></td>
            <td><?php echo $row["street"]; ?></td>
            <td><?php echo $row["contact"]; ?></td>
            */

/*
<th scope="col">City</th>
                    <th scope="col">Street</th>
                    <th scope="col">Contact</th>*/

//add error statements
$connect = mysqli_connect("er7lx9km02rjyf3n.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306", "rs0czd6o8w8e8r3j", "w1ffboir25orrcs4");
$sql = "SELECT id, name, city, street, contact FROM customers";
mysqli_select_db($connect, 'b25oudnru9u3blk4');
$result = mysqli_query($connect, $sql);
if (!$result) {
    printf("Error: %s\n", mysqli_error($connect));
    exit();
}


?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
 
        <title>Login Portal</title>
 
        <!-- Libraries -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
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
            <a class="nav-item nav-link" href="#" id='update_account'>Account</a>
            <a class="nav-item nav-link" href="#" id='logout'>Quotes</a>
            <a class="nav-item nav-link" href="login.html" id='login'>Login</a>
        </div>
    </div>
</nav>
<!-- /navbar -->
<div class="container" style="width:900px;">
    <div class="table-responsive">
        <table class="table table-dark">
            <thead>
                <tr>
                    <th width="70%">Customers</th>
                    <th width="30%">Info</th>
                </tr>
            </thead>
    <?php
        while($row = mysqli_fetch_array($result))
        {
        ?>   
        <tr>
            <td><?php echo $row["name"]; ?></td>
            <td><input type="button" name="view" value="View" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_data" /></td>
        </tr>
        <?php
        }
        ?>
      
  </table> 

</body>
</html>


   <div id="dataModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Customer Information</h5>    
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" id="customer_info">
                    <p>Eat shit!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Edit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                
            </div>
        </div>
   </div>

<script>
    $(document).ready(function(){
        $('.view_data').click(function(){
            var customer_id = $(this).attr("id");

            $.ajax({
                url:"select.php",
                method:"post",
                data:{customer_id:customer_id},
                success:function(data){
                    $('#customer_info').html(data);
                    $('#dataModal').modal("show");
                }
            })

        
        })
    });
</script>

