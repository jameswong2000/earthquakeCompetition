<?php
  $dsn = 'mysql:host=localhost;dbname=spkcriver';
$username = 'spkcriver';
$password = 'river123'; 
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);
  $pdo= new PDO($dsn, $username, $password, $options);

  $t = $_GET["t"];
  $d = $_GET["d"];
  $upload = $pdo->query("INSERT INTO `riverdata` (`rtime`,`rdata`)
  VALUES ('".date('Y-m-d G:i:s',intval($t/1000))."',$d)");

  
  $stmt = $pdo->query("SELECT * FROM riverdata");
  $r = $stmt->fetchALL();
  print_r($r);
  
  
?>