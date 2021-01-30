<?php
$dsn = 'mysql:host=localhost;dbname=spkcriver';
$username = 'spkcriver';
$password = 'river123'; 
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
   
);

  $pdo= new PDO($dsn, $username, $password, $options);

   $stmt = $pdo->query("SELECT * FROM riverdata");
   $r = $stmt->fetchALL();   // save result
   $i=0;
   do{
   echo $r[$i]['rdata'];
   echo '</br>';
   $i++;}
   while ($i<=1);

   
  
   
?>