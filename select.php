<!--***********************
    Written by David Tullis
    Last Modified - 4/19/20
    ***********************-->

<?php  
 if(isset($_POST["customer_id"]))  
 {  
     //connect to customer db and group 5B's own db
    $output = '';  
    $connect = mysqli_connect("er7lx9km02rjyf3n.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306", "bpvm4e1ureo7ypgw", "mx6iaon6rr8fuvgs");
    $connect2 = mysqli_connect("localhost", "root", "");
    $sql = "SELECT * FROM customers WHERE id = '".$_POST["customer_id"]."'"; 
    $sql2 = "SELECT quote, comment FROM customer_db WHERE id = '".$_POST["customer_id"]."'"; 
    mysqli_select_db($connect, 'wamcf15azpogz0i9');
    mysqli_select_db($connect2, 'sales_associates_db');
    $result = mysqli_query($connect, $sql);
    $result2 = mysqli_query($connect2, $sql2);
    if (!$result) {
        printf("Error: %s\n", mysqli_error($connect));
        exit();
    }
    $output .= '  
    <div class="table-responsive">  
        <table class="table table-bordered">';  
    while($row = mysqli_fetch_array($result) )  
    {  
        $output .= '  
                <tr>  
                    <td width="30%"><label>ID</label></td>  
                    <td width="70%">'.$row["id"].'</td>  
                </tr>  
                <tr>  
                    <td width="30%"><label>Name</label></td>  
                    <td width="70%">'.$row["name"].'</td>  
                </tr>  
                <tr>  
                    <td width="30%"><label>City</label></td>  
                    <td width="70%">'.$row["city"].'</td>  
                </tr>  
                <tr>  
                    <td width="30%"><label>Street</label></td>  
                    <td width="70%">'.$row["street"].'</td>  
                </tr>  
                <tr>  
                    <td width="30%"><label>Contact</label></td>  
                    <td width="70%">'.$row["contact"].'</td>  
                </tr>  
                ';
        $row2 = mysqli_fetch_array($result2);
        $output .= '  
                <tr>  
                    <td width="30%"><label>Quote</label></td>  
                    <td width="70%">'.$row2["quote"].'</td>  
                </tr>
                <tr>  
                    <td width="30%"><label>Comment</label></td>  
                    <td width="70%">'.$row2["comment"].'</td>  
                </tr>
                ';

    }  
    //starts a session so that the customer id can be transferred to the sql scripts
    echo $output;
    session_start();
    $_SESSION['cid'] = $_POST["customer_id"];
    
 }  
 ?>
