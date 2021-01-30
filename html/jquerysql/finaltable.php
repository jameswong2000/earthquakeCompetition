<style>
#Bigdiv3 {
  position: absolute;
  left: 0px;
  top: 50px;
  width: 800px;
  height: 600px;
  background-color:#DDDDFF;
  overflow-y: scroll;
}
  body {
  background-color: #3e94ec;
  font-family: "Roboto", helvetica, arial, sans-serif;
  font-size: 16px;
  font-weight: 400;
  text-rendering: optimizeLegibility;
}

div.table-title {
   display: block;
  margin: auto;
  max-width: 600px;
  padding:5px;
  width: 100%;
}

.table-title h3 {
   color: #fafafa;
   font-size: 30px;
   font-weight: 400;
   font-style:normal;
   font-family: "Roboto", helvetica, arial, sans-serif;
   text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
   text-transform:uppercase;
}


/*** Table Styles **/

.table-fill {
  background: white;
  border-radius:3px;
  border-collapse: collapse;
  height: 60px;
  margin: auto;
  max-width: 600px;
  padding:5px;
  width: 100%;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
  animation: float 5s infinite;
}
 
th {
  color:#D5DDE5;;
  background:#1b1e24;
  border-bottom:4px solid #9ea7af;
  border-right: 1px solid #343a45;
  font-size:23px;
  font-weight: 100;
  padding:24px;
  text-align:center;
  text-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
  vertical-align:middle;
}

th:first-child {
  border-top-left-radius:3px;
}
 
th:last-child {
  border-top-right-radius:3px;
  border-right:none;
}
  
tr {
  border-top: 1px solid #C1C3D1;
  border-bottom: 1px solid #C1C3D1;
  color:#666B85;
  font-size:16px;
  font-weight:normal;
  text-shadow: 0 1px 1px rgba(256, 256, 256, 0.1);
}
 
tr:hover td {
  background:#4E5066;
  color:#FFFFFF;
  border-top: 1px solid #22262e;
  border-bottom: 1px solid #22262e;
}
 
tr:first-child {
  border-top:none;
}

tr:last-child {
  border-bottom:none;
}
 
tr:nth-child(odd) td {
  background:#EBEBEB;
}
 
tr:nth-child(odd):hover td {
  background:#4E5066;
}

tr:last-child td:first-child {
  border-bottom-left-radius:3px;
}
 
tr:last-child td:last-child {
  border-bottom-right-radius:3px;
}
 
td {
  background:#FFFFFF;
  padding:0px;
  text-align:center;
  vertical-align:middle;
  font-weight:300;
  font-size:18px;
  text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
  border-right: 1px solid #C1C3D1;
}

td:last-child {
  border-right: 0px;
}

th.text-left {
  text-align: center;
}

th.text-center {
  text-align: center;
}

th.text-right {
  text-align: center;
}

td.text-left {
  text-align: center;
}

td.text-center {
  text-align: center;
}

td.text-right {
  text-align: center;
}


</style>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js">
</script>



<?php
$dsn = 'mysql:host=localhost;dbname=spkcriver';
$username = 'spkcriver';
$password = 'river123'; 
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
   
);
$pdo= new PDO($dsn, $username, $password, $options);
?>


<div id="Bigdiv3">
<table id="river" class="table-fill">
<?php
   //table data from sql riverdata
   $stmt = $pdo->query("SELECT * FROM riverdata ORDER BY id DESC LIMIT 2");
   $r = $stmt->fetchALL();   // save result
   foreach($r as $row){
     $i++;
     echo "<tr><td>".$row['rtime']."</td>";
     echo "<td>".$row['rdata']." cm </td></tr>";
   }   
?>
</table>
     
   <script>
    
   function update() {
      $.getJSON("ajax.php",function(data){
       var x1 = data.rtime;
       var x2 = data.rdata;
     //  var old = $("#river").find('tr').eq(0).find('td').eq(0).text();
      // if( x1!= old ){
       $('#river > tbody > tr:first').before('<tr><td>'+x1+'</td><td>'+x2+' cm</td></tr>');
      // }
      });
   }
   setInterval(update, 2000);
   </script>
   


</div>
