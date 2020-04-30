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
    $customer_id = $_SESSION['cid'];
    $quote_id = $_SESSION['qid'];
    $output = '';  
    $message = '';
    if($customer_id != '' && $quote_id != '')  
      {  
        $query = "
          UPDATE customer_quotes
          SET l1d = '".$_POST["l1d"]."',
          l1p = '".$_POST["l1p"]."',
          l2d = '".$_POST["l2d"]."',
          l2p = '".$_POST["l2p"]."',
          l3d = '".$_POST["l3d"]."',
          l3p = '".$_POST["l3p"]."',
          comment = '".$_POST["comment"]."',
          email = '".$_POST["email"]."'
          WHERE c_id= $customer_id 
          AND q_id= $quote_id";
          $message = 'Data Updated';   
      }
     
      $sth = $db->prepare($query);
      $sth->execute();


      if($sth)  
      {  
           $output .= '<label class="text-success">' . $message . '</label>';    
      }  
      echo $output; 
      header('Location: edit_quotes.php'); 
 }  
 ?>
 


