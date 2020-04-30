
<!--***********************
    Written by David Tullis
    Last Modified - 4/19/20
    ***********************-->

<!--A form that allows the quotes and comments to be modified -->
<?php
//connect to customer db
session_start();
$customer_id = $_SESSION['cid'];

$db = new PDO('mysql:host=courses; dbname=z1860353', 'z1860353', '1999Mar23');
$query = "SELECT q_id, l1d, l1p, l2d, l2p, l3p, l3d, comment, email FROM customer_quotes where c_id = $customer_id";
$sth = $db->prepare($query);
$sth->execute();

?>

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
<!-- /navbar -->
<div class="container">
    <div class="table-responsive fixed-table-body">
        <div id="customer_table">
        <table class="table table-dark">
            <thead>
                <tr>
                    <th >Quote Number</th>
                    <th >Line Description (1)</th>
                    <th >Line Price (1)</th>
                    <th >Line Description (2)</th>
                    <th >Line Price (2)</th>
                    <th >Line Description (3)</th>
                    <th >Line Price (3)</th>
                    <th >Comment</th>
                    <th >Email</th>
                </tr>
            </thead>
    <?php
        foreach ($db->query($query) as $row) {
        ?>   
        <tr>
            <td ><?php echo $row["q_id"]; ?></td>
            <td ><?php echo $row["l1d"]; ?></td>
            <td ><?php echo $row["l1p"]; ?></td>
            <td ><?php echo $row["l2d"]; ?></td>
            <td ><?php echo $row["l2p"]; ?></td>
            <td ><?php echo $row["l3d"]; ?></td>
            <td ><?php echo $row["l3p"]; ?></td>
            <td ><?php echo $row["comment"]; ?></td>
            <td ><?php echo $row["email"]; ?></td>
            <td><input type="button" name="edit" value="Edit" id="<?php echo $row["q_id"]; ?>" class="btn btn-info btn-xs edit_data" /></td>
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
                    <h5 class="modal-title">Edit Quote</h5>    
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body"  id="quote_info"> 
                </form> 
                </div>
                <div class="modal-footer">
                   <div class="dropdown">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                
            </div>
        </div>
   </div> 
   

   <script>
       

    $(document).ready(function(){
        $('.edit_data').click(function(){
            var q_id = $(this).attr("id");

            $.ajax({
                url:"http://students.cs.niu.edu/~z1860353/467_final_proj/select_edit.php",
                method: "POST",
                data:{q_id:q_id},
                success:function(data){
                    $('#quote_info').html(data);
                    $('#dataModal').modal("show");
                   
                }
            })
        })
    });
// on button click show a modal with the form in it, and the form is from this page. 
    
</script>


</body>
</html>

<style type='text/css'>
.fullscreen {
    width: 100% !important;
    height: 100% !important;
    margin: 0;
    top: 0;
    left: 4;
}
.modal-dialog {
  position: fixed;
  top: 0%;
  left: 35%;
  transform: translatse(-50%, -50%);
  width: 100%;
}



.table-responsive {
 
 padding: 100px;
 height: 100%;
 width: 100%;
 
}

</style>