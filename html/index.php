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
	height: 50px;
	background-image: url("logo(new).png");
	font-size: 40px;
	font-family: 'Arial', sans serif;
	text-align: center;
	color: #333333;
  }
#BigDiv1 {
	position: absolute;
	left: 0px;
	top: 50px;
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
	top: 50px;
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
    font-family: "Arial", Helvetica, sans-serif;
}

table, th, td {
    border: 1px solid black;
    text-align: center;
}

#chartContainer {
  position:absolute;
  left: 20px;
  top: 50px;
} 

#legend {
  position:absolute;
  top: 350px;
  left: 35px;
  font-size: 18px;
  font-family: 'Arial', sans serif;
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
  <div id="chartContainer" style="width: 80%; height: 300px;"></div>
  <div id="legend"><p><font color= #20B2AA>acc_xy  &nbsp&nbsp&nbsp</font><font color=#F08080>acc_z</p></div>
</div>

<div id="BigDiv3" class="DIVcss">
  <table id= "divTable">
  </table>
</div>

<!--****************************** Script ************************ -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/canvasjs/1.7.0/canvasjs.min.js"></script>
<script type = "text/javascript" language = "javascript"> 
  // Graph setup
  var chart = new CanvasJS.Chart("chartContainer",
    {
      width:760,         
      height: 350,

      title:{
        text: "Earthquake Wave",
        fontSize: 30
      },

                        animationEnabled: true,
      axisX:{
        title: "Time",
        gridColor: "Silver",
        tickColor: "silver",
        labelAutoFit: true,
        labelFontSize: 8


      },                        
                        toolTip:{
                          shared:true
                        },
      axisY: {
        title: "Acceleration",
      //  maximum: 10,
        minimum: 0,
        interval: 1,
        gridColor: "Silver",
        tickColor: "silver"
      },

      data: [
        {        
          type: "line",
         // showInLegend: true,
          lineThickness: 2,
          name: "acc_z",
          markerType: "square",
          color: "#F08080",
          dataPoints: []
        },
        {        
          type: "line",
        //  showInLegend: true,
          name: "acc_xy",
          color: "#20B2AA",
          lineThickness: 2,
          dataPoints: []
        }
      ],
      legend:{
        horizontalAlign: "left", // left, center ,right 
        verticalAlign: "top",  // top, center, bottom
        cursor:"pointer",
        itemclick:function(e){
          if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
            e.dataSeries.visible = false;
          }
          else{
            e.dataSeries.visible = true;
          }
        }
      }
      
    });
            
  var MAXCHARTDATA = 200;
 /* Get json */
 function updateData() {
    var dataPts = [];
    var dataPts2 = [];
    $.getJSON('http://wongwongjames.noip.me/420/jsontry.php', function(jd) { 
  		$('#displaydata').html('<p> Magnitude: ' + jd[0].magnitude + '</p>');
  		$('#displaydata2').html('<p> ' + jd[0].wave+ ' wave </p>');

/* Table DATA */

      var tabletxt = "<table>";
      tabletxt += "<tr><th> Time</th>";
      tabletxt += "<th> Magnitude</th>";
      tabletxt += "<th> Type of Wave</th>";
      tabletxt += "<th> acc_xy</th>";
      tabletxt += "<th> acc_z</th></tr>";
      for (i = 0; i < 25; i++) { 
        tabletxt += "<tr><td>"+jd[i].time+"</td>";
        tabletxt += "<td>"+jd[i].magnitude+"</td>";
        tabletxt += "<td>"+jd[i].wave+"</td>";
        tabletxt += "<td>"+jd[i].acc_xy+"</td>";
        tabletxt += "<td>"+jd[i].acc_z+"</td></tr>";
      } 
      tabletxt += "</table>";
      $("#divTable").html(tabletxt);

      /* Graph DATA */
      for (i = MAXCHARTDATA-1; i>=0 ; i--) {
        dataPts.push({ label: jd[i].time, y: parseFloat(jd[i].acc_z) });
        dataPts2.push({ label: jd[i].time, y: parseFloat(jd[i].acc_xy) }); 
      }
      chart.options.data[0].dataPoints = dataPts;
      chart.options.data[1].dataPoints = dataPts2;     
      chart.render();   

      
    

  		var data = jd[0].magnitude;
      /* SHAKING EFFECT */
  		if ( data == 1) {
    	  $( "#background" ).effect( "shake", {times:3,direction:"up",distance:25}, 1000 );
  		} 
      else if ( data == 2){
  			$( "#background" ).effect( "shake", {times:5,direction:"up",distance:35}, 1000 );
  		} 
      else if ( data == 3){ 
        $( "#background" ).effect( "shake", {times:7,direction:"up",distance:45}, 1000 );
      } 
      else {
        $( "#background" ).effect( "shake", {times:0,direction:"up",distance:45}, 0);
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