<?php
$servername = "wongwongjames.noip.me";
$username = "earthquake";
$password = "420";
$dbname = "earthquake";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM earthquaketable ORDER BY id DESC LIMIT 0,50";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
          echo "id: " . $row["id"]. " - time: " . $row["time"]. " " . $row["magnitude"]. " " . $row["tow"]. "<br>";
     }
} else {
     echo "0 results";
}

$conn->close();
?>  
