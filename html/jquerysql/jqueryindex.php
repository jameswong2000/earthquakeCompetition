<?php
$con=mysql_connect("localhost", "spkcriver", "river123");

if(!$con){
   die("error.".mysql_error());
   }
   mysql_select_db("spkcriver",$con);
   $result=mysql_query("SELECT * FROM riverdata");
   ?>
   <html>
       <head><title>datatables</title>
      
      <meta htp-equiv="content-type" content="text/html; charget=UTF-8" />
      <script src="jquery.js" type="text/javascript"></script>
      <script src="jquery.dataTables.js" type="text/javascript"></script>
      <style type="text/css">
	   @import "table_demo.css";
	   </style>
	   
	  <script type="text/javascript" charset="utf-8">
	   $(document).ready(funchtion){
	        $('#rlevel").dataTable();
	   })
	  </script>
	  </head>
	  <body>
	  <div>
      <table id="rlevel" class="display" border=1>
</div>
   <thead>
      <tr>
          <th>id</th>
          <th>rtime</th>
          <th>rdata($r)</th>
          </tr>
             </thead>
          <tbody>
          <?php
		  while($row=mysql_fetch_array($result)){   ?>
          <tr>
          <td><?=$row["id"]?></td>
          <td><?=$row["rtime"]?></td>
          <td><?=$row["rdata"]?></td>
          </tr>
		  
		  ?>
          </tbody>
          </table>
          </body>
	  </html>