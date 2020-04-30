<!--***********************
    Written by David Tullis
    Last Modified - 4/29/20
    ***********************-->

    <?php 
 //inserts the updated customer data in the db
 $db = new PDO('mysql:host=courses; dbname=z1860353', 'z1860353', '1999Mar23');

 if(!empty($_POST))  
 { 
    session_start();
    $customer_id = $_SESSION['c_id'];
    $user_id = $_SESSION['user'];
    $orderDate = date('Y-m-d H:i:s');
    $status = "u";
    $sql = "SELECT MAX(q_id) FROM customer_quotes where c_id = $customer_id;";
    $stm = $db->prepare($sql);
    $stm->execute();
    $quote_id = $stm + 1;
    $output = '';  
    $message = '';
    if($customer_id != '' && $quote_id != '')  
      {  
        $query = "
          INSERT INTO customer_quotes
          VALUES ('".$customer_id."',
          '".$quote_id."',
          '".$_POST["l1d"]."',
          '".$_POST["l1p"]."',
          '".$_POST["l2d"]."',
          '".$_POST["l2p"]."',
          '".$_POST["l3d"]."',
          '".$_POST["l3p"]."',
          '".$_POST["comment"]."',
          '".$_POST["email"]."',
          '".$user_id."',
          '".$orderDate."',
          '".$status."')";
          $message = 'Data Updated';   
      }
     
      $sth = $db->prepare($query);
      $sth->execute();
      if($sth)  
      {  
           $output .= '<label class="text-success">' . $message . '</label>';    
      }  
      echo $output; 
      header('Location: sap.php'); 
 }  