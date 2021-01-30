<HTML>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/themes/smoothness/jquery-ui.css" /> --->
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js"></script>  --->
<!-- <script src="lib/jquery.ui.touch-punch.min.js"></script>  --->

<style>
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
  }
#Title4 {
  position:absolute;
  left: 540px;
  top: 0px;
  width: 260px;
  height: 100px;
  background-color: #FFFF00;
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
  top: 320px;
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
<div id="Title1">Simulator</div>
<div id="Title2">Graph</div>
<div id="Title3">Table</div>
<div id="Title4"></div>
<div id="BigDiv1">
  <input id="level" onchange="changeLevel();"> 
  <div id="water"></div>
  <div id="background"></div>
  <div id="displaydata"></div>
  <script>
  function changeLevel() {
    $("#water").animate({top:320-3*($("#level").val())},1000);
    $("#level").val();
    $("#displaydata").html($("#level").val() + " cm");
  }
  </script>
</div>

<div id="BigDiv2" class="DIVcss">
//#00FF6F
</div>

<div id="BigDiv3" class="DIVcss">
//#C400FF
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