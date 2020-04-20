<!--***********************
    Written by David Tullis
    Last Modified - 4/19/20
    ***********************-->



<?php
//connect to customer db
$connect = mysqli_connect("er7lx9km02rjyf3n.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306", "bpvm4e1ureo7ypgw", "mx6iaon6rr8fuvgs");
$sql = "SELECT id, name, city, street, contact FROM customers";
mysqli_select_db($connect, 'wamcf15azpogz0i9');
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
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
        <link href="custom.css" rel="stylesheet">
        
    </head>
<body>
 
<div style="background-image: url('img/bg.jpg');"> 

<!-- navbar -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">Sales Associate Portal</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link" href="index.html" id='home'>Home</a>
            <a class="nav-item nav-link" href="sap.php" id='quote'>Quotes</a>
            <a class="nav-item nav-link" href="login.html" id='login'>Login</a>
        </div>
    </div>
</nav>
<!-- /navbar -->
<div class="container" style="width:900px;">
    <div class="table-responsive">
        <div id="customer_table">
        <table class="table table-dark">
            <thead>
                <tr>
                    <th width="90%">Customers</th>
                    <th width="10%">Info</th>
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
        </div>
    </div>
</div>
      

<div id="dataModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Customer Information</h5>    
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" id="customer_info"> 
                </div>
                <div class="modal-footer">
                    <input type="button" name="edit" value="Edit" id="edit" class="btn btn-info btn-warning edit_data" />   
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                
            </div>
        </div>
   </div>


<!--Script to load the modal and then alternate between viewing customer data and modifying it-->
<script>
    jQuery.fn.extend({
        disable: function(state) {
            return this.each(function() {
                this.disabled = state;
            });
        }
    });


    $(document).ready(function(){
        $('.view_data').click(function(){
            var customer_id = $(this).attr("id");
            $('input[id="edit"]').attr('disabled', false);
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
        $('.edit_data').click(function(){
            var customer_id = $(this).attr("id");
            $('.edit_data').button('dispose');
            $.ajax({
                url:"select_edit.php",
                success:function(data){
                    $('#customer_info').html(data);
                    $('#dataModal').modal("show");
                    $('input[id="edit"]').attr('disabled', true);
                    
                }
            })

        
         })
        
    });
</script>

</body>
</html>