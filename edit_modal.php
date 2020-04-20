<!--***********************
    Written by David Tullis
    Last Modified - 4/19/20
    ***********************-->

<?php 
 //inserts the updated customer data in the db
 $connect = mysqli_connect("localhost", "root", "");  
 if(!empty($_POST))  
 { 
    session_start();
    $customer_id = $_SESSION['cid'];
    $output = '';  
    $message = '';
    mysqli_select_db($connect, 'sales_associates_db');
    if($customer_id != '')  
      {  
        if($_POST["quote"] != '' && $_POST["comment"] != ''){
          $query = "
          UPDATE customer_db
          SET quote = '".$_POST["quote"]."',
          comment = '".$_POST["comment"]."'
          WHERE id= $customer_id ";
          $message = 'Data Updated';  
        } else if ($_POST["quote"] != '') {
          $query = "
          UPDATE customer_db
          SET quote = '".$_POST["quote"]."'
          WHERE id= $customer_id ";
          $message = 'Data Updated'; 
        } else if ($_POST["comment"] != ''){
          $query = "
          UPDATE customer_db
          SET comment = '".$_POST["comment"]."'
          WHERE id= $customer_id ";
          $message = 'Data Updated';
        }
      }
     
      if(mysqli_query($connect, $query))  
      {  
           $output .= '<label class="text-success">' . $message . '</label>';    
      }  
      echo $output; 
      header('Location: sap.php'); 
 }  
 ?>
 


