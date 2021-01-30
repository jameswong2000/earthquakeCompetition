<HTML>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script language="javascript" type="text/javascript" src="flot/jquery.flot.js"></script>

<!-- <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/themes/smoothness/jquery-ui.css" /> --->
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js"></script>  --->
<!-- <script src="lib/jquery.ui.touch-punch.min.js"></script>  --->

<style>
#flot_chart_tooltip{
    position: absolute;
    display: none;
    border: 1px solid #ddd;
    padding: 2px;
    background-color: #eee;
    opacity: 0.80;
}
#Title1 {
  position:absolute;
  left: 0px;
  top: 0px;
  width: 180px;
  height: 100px;
  background-color: #2269EB;
  font-size: 20px;
  font-family: 'Arial', sans serif;
  text-align: center;
  color: #333333;
  line-height:250%;
  cursor: pointer;
}
#Title2 {
  position:absolute;
  left: 180px;
  top: 0px;
  width: 180px;
  height: 100px;
  background-color: #99FF99;
  font-size: 20px;
  font-family: 'Arial', sans serif;
  text-align: center;
  color: #333333;
  line-height:250%;
  cursor: pointer;
  
  }
#Title3 {
  position:absolute;
  left: 360px;
  top: 0px;
  width: 180px;
  height: 100px;
  background-color: #FF88FF;
  font-size: 20px;
  font-family: 'Arial', sans serif;
  text-align: center;
  color: #333333;
  line-height:250%;
  cursor: pointer;
  }
#Title4 {
  position:absolute;
  left: 540px;
  top: 0px;
  width: 260px;
  height: 60px;
  background-image: url("LOGO.png");
  font-size: 40px;
  font-family: 'Arial', sans serif;
  text-align: center;
  color: #333333;
  }
#BigDiv1 {
  position:absolute;
  left: 0px;
  top: 50px;
  width: 800px;
  height: 650px;
  background-image: url("sky.png");
  }
#BigDiv2 {
  position:absolute;
  left: 0px;
  top: 50px;
  width: 800px;
  height: 650px;
  background-color: #99FF99;
  }
#BigDiv3 {
  position:absolute;
  left: 0px;
  top: 50px;
  width: 800px;
  height: 650px;
  background-color: #FF88FF;
  }
#water {
  position:relative;
  left: 0px;
  top: 340px;
  width: 800px;
  height: 300px;
  background-color: #3344FF;
}
#background {
  position: absolute;
  left: 0px;
  top: 50px;
  width: 800px;
  height: 600px;
  background-image: url("bg2.png");
}
#displaydata {
  position:absolute;
  left: 270px;
  top: 400px;
  font-size: 100px;
  font-family: 'Arial', sans serif;
  color: #FFE200;
}

</style>

<!---Andrew's style--->
<style>
#Bigdiv3 {
  position: absolute;
  left: 0px;
  top: 50px;
  width: 800px;
  height: 600px;
  background-color:#FF88FF;
  overflow-y: scroll;
}
  body {
  background-color: #FFFFFF;
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


<div id="Title1">Simulator</div>
<div id="Title2">Graph</div>
<div id="Title3">Table</div>
<div id="Title4"></div>
<div id="BigDiv1">
  <div id="water"></div>
  <div id="background"></div>
  <div id="displaydata"></div>
  <script>
  function changeLevel() {
    var data = $("#river").find('tr').eq(0).find('td').eq(1).text();
    data = data.replace(" cm","");
    if (isNaN(data)) {
      $("#displaydata").html("Loading...");
    }else{
      $("#water").animate({top:340-3*(data)},1000);
      $("#displaydata").html(data + " cm");
    }
  }
  var timer1 = setInterval(changeLevel, 2000);
  </script>
</div>

<div id="BigDiv2" class="DIVcss">
   <script>
     
 
     
     function updateGraph() {
       var rowCount = $('#river tr').length;
       var d1 = [];
       for (var i = 0; i < rowCount ; i++) {
//         var x = Date.parse($("#river").find('tr').eq(i).find('td').eq(0).text());
         var data = $("#river").find('tr').eq(i).find('td').eq(1).text();
         data = data.replace(" cm","");
//         d1.push([x, data]);
         d1.push([rowCount-i, data]);
       }
       $.plot($("#placeholder"), [ d1 ], {grid: {hoverable: true, clickable: true, autoHighlight: true, 
       points: { show: true, fillColor: "#FFFF77" },
       markings: [
        {xaxis: { from: 0, to: 100 },color: "#FFFFFF"}
       ]}
       });
   
      


     }

     

     var timer2 = setInterval(updateGraph, 2000);
   </script>
   <div id="placeholder" style="width:700px; height:500px;"></div>
</div>

<div id="BigDiv3" class="DIVcss">
<br>
<br>
<table id="river" class="table-fill">
<?php
   $dsn = 'mysql:host=localhost;dbname=spkcriver';
   $username = 'spkcriver';
   $password = 'river123'; 
   $options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
   );

   $pdo= new PDO($dsn, $username, $password, $options);
   //table data from sql riverdata
   $stmt = $pdo->query("SELECT * FROM riverdata ORDER BY id DESC");
   $r = $stmt->fetchALL();   // save result
   foreach($r as $row){
     $i++;
     echo "<tr><td>".$row['rtime']."</td>";
     echo "<td>".$row['rdata']." cm </td></tr>";
   }
?>
</table>
     
   <script>
    
   function updatetable() {
      $.getJSON("ajax.php",function(data){
       var x1 = data.rtime;
       var x2 = data.rdata;
       //var old = $("#river").find('tr').eq(0).find('td').eq(0).text();
      // if( x1!= old ){
         $('#river > tbody > tr:first').before('<tr><td>'+x1+'</td><td>'+x2+' cm</td></tr>');
       }
      });
   }
   var timer3 = setInterval(updatetable, 2000);
   </script>
</div>

<script>
changeDialog(0);
$("#Title1").click(function(){
   changeDialog(0);
});
$("#Title2").click(function(){
   changeDialog(1);
});
$("#Title3").click(function(){
   changeDialog(2);
});
function changeDialog(i) {
  if (i==0) { $('#BigDiv1').show(); $('#BigDiv2').hide(); $('#BigDiv3').hide(); }
  if (i==1) { $('#BigDiv1').hide(); $('#BigDiv2').show(); $('#BigDiv3').hide(); }
  if (i==2) { $('#BigDiv1').hide(); $('#BigDiv2').hide(); $('#BigDiv3').show(); }
}
</script>

</HTML>