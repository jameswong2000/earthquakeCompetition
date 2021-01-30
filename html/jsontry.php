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

    //create an array
    $earthquake = array();
    while($row =mysqli_fetch_assoc($result))
    {
        $earthquake[] = $row;
    }
    echo json_encode($earthquake);

    
?>