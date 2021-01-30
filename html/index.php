<HTML>

<!--****************************** Stylesheet css ************************ -->

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
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
	color: #F3E500;
  }
#BigDiv2 {
  position:absolute;
  left: 0px;
  top: 50px;
  width: 800px;
  height: 650px;
  background-color: #9BCBEB;
  text-align: center;
  }
#BigDiv3 {
	position: absolute;
	left: 0px;
	top: 49px;
	width: 800px;
	height: 650px;
	background-color: #F9B5C4;
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
  top: 70px;
  font-size: 90px;
  font-family: 'Arial', sans serif;
  color: #FFE200;
}

#displaydata2 {
  position:absolute;
  left: 270px;
  top: 90px;
  font-size: 30px;
  font-family: 'Arial', sans serif;
  color: #FFE200;
}	

#divTable {
    position:absolute;
    top: 20px;
    left: 100px;
    background: white;
    border-radius:3px;
    border-collapse: collapse;
    margin: auto;
    max-width: 600px;
    padding:5px;
    width: 100%;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    animation: float 5s infinite;
}

table, th, td {
    border: 1px solid black;
    text-align: center;
}

	
</style>


<!--****************************** HTML Objects ************************ -->

<div id="Title1">Simulator</div>
<div id="Title2">Graph</div>
<div id="Title3">Table</div>
<div id="Title4"></div>


<div id="BigDiv1">
  <div id="water"></div>
	<div id="background"></div>
	<div id="displaydata"></div>
	<div id="displaydata2"></div>
</div>

<div id="BigDiv2" class="DIVcss">  
	<div id="graphlabelx">Time</div>
	<div id="graphlabely">Sea level (cm)</div>
	<div id="placeholder" style="position:absolute; left:50px; top:0px; width:700px; height:500px;"></div>
	<div id="graphbar" style="position:absolute; left:50px; top:7px; width:1px; height:486px; background-color:red; visibility:hidden;"></div>
	<div id="graphclicktext"></div>
</div>

<div id="BigDiv3" class="DIVcss">
  <table id= "divTable">
  </table>
</div>

<!--****************************** Script ************************ -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.js"></script>
<script type = "text/javascript" language = "javascript"> 

 /* Get json */
 function updateData() {
    $.getJSON('https://marcowingwing.000webhostapp.com/jsontry.php', function(jd) { 
  		$('#displaydata').html('<p> Magnitude: ' + jd[0].magnitude + '</p>');
  		$('#displaydata2').html('<p> ' + jd[0].tow+ '</p>');

   
      var tabletxt = "<table>";
      tabletxt += "<tr><th> Time</th>";
      tabletxt += "<th> Magnitude</th>";
      tabletxt += "<th> Type of Wave</th></tr>";
      for (i = 0; i < jd.length; i++) { 
        tabletxt += "<tr><td>"+jd[i].time+"</td>";
        tabletxt += "<td>"+jd[i].magnitude+"</td>";
        tabletxt += "<td>"+jd[i].tow+"</td></tr>";

      } 
      tabletxt += "</table>";
      $("#divTable").html(tabletxt)

  		var data = jd[0].magnitude;
      /* SHAKING EFFECT */
  		if ( data == 1) {
    	  $( "#background" ).effect( "shake", {times:15,direction:"up",distance:25}, 12000 );
  		} 
      else if ( data == 2){
  			$( "#background" ).effect( "shake", {times:20,direction:"up",distance:35}, 9000 );
  		} 
      else { 
        $( "#background" ).effect( "shake", {times:25,direction:"up",distance:45}, 6000 );
      } 
    });
 }


  /* Change TABS */
  function changeDialog(i) {
    if (i==0) { $('#BigDiv1').show(); $('#BigDiv2').hide(); $('#BigDiv3').hide(); }
    if (i==1) { $('#BigDiv1').hide(); $('#BigDiv2').show(); $('#BigDiv3').hide(); }
    if (i==2) { $('#BigDiv1').hide(); $('#BigDiv2').hide(); $('#BigDiv3').show(); }
 }

  /* Document ready (initial) Events */

  $(document).ready(function() {       
    setInterval(updateData, 1000);
    changeDialog(0);

  });

  /* TAB Events */

  $("#Title1").click(function(){
    changeDialog(0);
  });
  $("#Title2").click(function(){
    changeDialog(1);
  });
  $("#Title3").click(function(){
    changeDialog(2);
  });

 </script>

</HTML>