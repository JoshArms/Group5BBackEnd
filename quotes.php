<?php
$connect = mysqli_connect("localhost", "root", "", "testing");
$sql = "SELECT id, name, quote FROM customer_quotes_db";
$result = mysqli_connect($connect, $sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["quote"]. "<br>";
    }
} else {
    echo "0 results";
}
?>



