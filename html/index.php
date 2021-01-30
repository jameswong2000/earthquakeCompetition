<HTML>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script language="javascript" type="text/javascript" src="flot/jquery.flot.js"></script>
<script src="jquery.ui.touch-punch.min.js"></script>
<!-- <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/themes/smoothness/jquery-ui.css" /> --->
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js"></script>  --->
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<style>
#Title1 {
  position:absolute;
  left: 0px;
  top: 0px;
  width: 180px;
  height: 100px;
  background-color: #F3E500;
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
  background-color: #9BCBEB;
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
  background-color: #F9B5C4;
  font-size: 20px;
  font-family: 'Arial', sans serif;
  text-align: center;
  color: #333333;
  line-height:250%;
  cursor: pointer;
  }
#Title4 {
	position: absolute;
	left: 540px;
	top: 0px;
	width: 260px;
	height: 77px;
	background-image: url("logo(new).png");
	font-size: 40px;
	font-family: 'Arial', sans serif;
	text-align: center;
	color: #333333;
  }
#BigDiv1 {
	position: absolute;
	left: 0px;
	top: 49px;
	width: 800px;
	height: 650px;
	background-image: url("sky.png");
	color: #39b54a;
  }
#BigDiv2 {
  position:absolute;
  left: 0px;
  top: 50px;
  width: 800px;
  height: 650px;
  background-color: #99FF99;
  text-align: center;
  }
#BigDiv3 {
	position: absolute;
	left: 0px;
	top: 49px;
	width: 800px;
	height: 650px;
	background-color: #FF88FF;
  }
#water {
  position:relative;
  left: 0px;
  top: 342px;
  width: 800px;
  height: 350px;
  background-color: #39b54a;
}
#background {
  position: absolute;
  left: 0px;
  top: 50px;
  width: 800px;
  height: 600px;
  background-image: url("BG(NEW).png");
}
#displaydata {
  position:absolute;
  left: 270px;
  top: 400px;
  font-size: 100px;
  font-family: 'Arial', sans serif;
  color: #FFE200;
}

#graphlabely {
  writing-mode:tb-rl;
  -webkit-transform:rotate(270deg);
  -moz-transform:rotate(270deg);
  -o-transform: rotate(270deg);
  -ms-transform:rotate(270deg);
  transform: rotate(270deg);
  font-size:14px;
  position:absolute;
  left:-10px; 
  top:250px;
}

#graphlabelx {
  position:absolute;
  font-size:14px;
  left:400px;
  top:500px;
}

#graphclicktext {
  position:absolute;
  background-color:#FFCCCC;
  opacity:0.7;
  top:20px;
  font-size:20px;
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
  <script>
    var bgref = 0;
    $('#background').click(function(){
      if (bgref == 1) {
        $('#background').css('background-image','url("BG(NEW).png")');
        bgref = 0;
      }
      else if (bgref == 0) {
        $('#background').css('background-image','url("BG(NEW).png")');
        bgref = 1;
      }
    });
  </script>
 <!------------shake(high)------------>
<!--- <script>
$( document ).click(function() {
  $( "#background" ).effect( "shake", {times:25,direction:"up",distance:50}, 5000 );
});
</script> ---->
 <!------------shake(mid)------------>
 <!----<script>
$( document ).click(function() {
  $( "#background" ).effect( "shake", {times:20,direction:"up",distance:40}, 9000 );
});
</script>--->
 <!----------shake(low)------------>
<script>
$( document ).click(function() {
  $( "#background" ).effect( "shake", {times:15,direction:"up",distance:25}, 12000 );
});
</script>
 
  <div id="displaydata"></div>
  <script>
  function changeLevel() {
    var data = $("#river").find('tr').eq(0).find('td').eq(1).text();
    data = data.replace(" cm","");
    if (isNaN(data)) {
      $("#displaydata").html("Loading...");
    }else{
      $("#water").animate({top:342-3*(data)},1000);
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
       var options = {
         grid: {
           hoverable: true, clickable: true, autoHighlight: true, 
           points: { show: true, fillColor: "#FFFF77" },
           markings: [ {color: "#FFFFFF"} ]
         },
         xaxis: {show: false}
       };
       var plot = $.plot($("#placeholder"), [ d1 ], options);
/*
       $("#placeholder").bind("plothover", function (event,pos,item) {
           var str = "(" + pos.x.toFixed(2) + ", " + pos.y.toFixed(2) + ")";
           $("#clickdata").text(str);
           o = plot.pointOffset({ x: pos.x.toFixed(0), y: pos.y.toFixed(0)});
           $("#graphbar").css("left",o.left+50);
			 });
*/
       $("#graphclicktext").css("visibility","hidden");
       $("#graphbar").css("visibility","hidden");
       $("#placeholder").bind("plotclick",function (event,pos,item) {
         var i = pos.x.toFixed(0);
         var datax = $("#river").find('tr').eq(rowCount-i).find('td').eq(0).text();
         var datay = $("#river").find('tr').eq(rowCount-i).find('td').eq(1).text();
         var str = datay + "<br><span style='font-size:12px;'>" + datax.substr(11,8) + "</span>";
         o = plot.pointOffset({ x: pos.x.toFixed(0), y: pos.y.toFixed(0)});
         $("#graphclicktext").css("visibility","visible");
         $("#graphclicktext").html(str);
         $("#graphclicktext").css("left",o.left+51);
         $("#graphclicktext").css("top",o.top-80);
         $("#graphbar").css("visibility","visible");
         $("#graphbar").css("left",o.left+50);
		   });

     }

     var timer2 = setInterval(updateGraph, 2000);
   </script>
   <div id="graphlabelx">Time</div>
   <div id="graphlabely">Sea level (cm)</div>
   <div id="placeholder" style="position:absolute; left:50px; top:0px; width:700px; height:500px;"></div>
   <div id="graphbar" style="position:absolute; left:50px; top:7px; width:1px; height:486px; background-color:red; visibility:hidden;"></div>
   <div id="graphclicktext"></div>
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
   $stmt = $pdo->query("SELECT * FROM riverdata ORDER BY id DESC LIMIT 50 ");
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
       var old = $("#river").find('tr').eq(0).find('td').eq(0).text();
       if( x1!= old ){
         $('#river > tbody > tr:first').before('<tr><td>'+x1+'</td><td>'+x2+' cm</td></tr>');
         $('#river tr:last').remove();
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

