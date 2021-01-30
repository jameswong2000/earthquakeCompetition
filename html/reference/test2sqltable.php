<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js">
</script>

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

 //  echo"<Script language="Javascript">"
  // function data() {
  // window.alert($r['rdata'])";
  // }
   //</script>

echo "<table id=\"river\" border=1>";
      foreach($r as $row){
      $i++;
      echo "<td>".$i."</td>";
      echo "<td>".$row['rtime']."</td>";
      echo "<td>".$row['rdata']."</td></tr>";}
      
 echo"</table>";

?>
<script>
$("#river tr").click(function() {
  //取得 TR 內 第二個 [ eq(1) ] TD 元素值
  var x = $(this).find('td').eq(2).text().trim();
  alert(x);
});
</script>

