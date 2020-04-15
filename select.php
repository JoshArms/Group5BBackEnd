<!--This is where his db will combine with the quote db-->

<?php  
 if(isset($_POST["customer_id"]))  
 {  
    $output = '';  
    $connect = mysqli_connect("er7lx9km02rjyf3n.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306", "rs0czd6o8w8e8r3j", "w1ffboir25orrcs4");
    $connect2 = mysqli_connect("localhost", "root", "");
    $sql = "SELECT * FROM customers WHERE id = '".$_POST["customer_id"]."'"; 
    $sql2 = "SELECT quotes FROM customers WHERE id = '".$_POST["customer_id"]."'"; 
    mysqli_select_db($connect, 'b25oudnru9u3blk4');
    mysqli_select_db($connect2, 'sales_associates_db');
    $result = mysqli_query($connect, $sql);
    $result2 = mysqli_query($connect2, $sql2);
    if (!$result || !$result2) {
        printf("Error: %s\n", mysqli_error($connect));
        exit();
    }
    $output .= '  
    <div class="table-responsive">  
        <table class="table table-bordered">';  
    while($row = mysqli_fetch_array($result) && $db2 = mysqli_fetch_array($result2))  
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
                    <td width="70%">'.$row["contact"].' Year</td>  
                </tr>
                <tr>  
                    <td width="30%"><label>Quote</label></td>  
                    <td width="70%">'.$db2["quote"].' Year</td>  
                </tr>    
                ';  
    }  
    $output .= "</table></div>";  
    echo $output;  
 }  
 ?>