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
   $i++;
   } while($i<=2);
  

//  $upload = $pdo->query("INSERT INTO `riverdata` (`rtime`,`rdata`)
//   VALUES ('".date('Y-m-d h:i:s',1430296261)."',12)");
 echo "<script type='text/javascript'>\";
 echo "function data() {
 window.alert"($r['rdata'])";}";
 echo"</script>";
        
 foreach ($r as $row) {
      $i++;
      echo "<tr><td>".$i."</td>";
      echo "<td>"<html><button onclick=data()></html>.$row['rtime'].
           "</button></td>";
      echo "<td>".$row['rdata']."</td></tr>";
  }
 echo"</table>";

   
?>