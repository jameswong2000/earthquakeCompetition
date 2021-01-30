<html>
  <head>
    <div id="divResult"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </head>
  <body>
<script type = "text/javascript" language = "javascript"> 
	$(document).ready(function() { 			 
		setInterval(function() { $.getJSON('https://marcowingwing.000webhostapp.com/jsontry.php', function(jd) { 
			$('#divResult').html('<p> ID: ' + jd[1].id + '</p>'); 
			$('#divResult').append('<p>TIME : ' + jd[1].time+ '</p>');
			$('#divResult').append('<p>Magnitude : ' + jd[1].magnitude+ '</p>'); 
			$('#divResult').append('<p> Type of wave : ' + jd[1].tow+ '</p>'); }); }); }, 5000);				  
	  </script>

   
  </body>
</html>  
 