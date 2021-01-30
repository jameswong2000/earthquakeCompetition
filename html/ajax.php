<?php

   
  $db = mysql_connect("localhost","spkcriver","river123");
  if (!$db) {
    die('Could not connect to db: ' . mysql_error());
    }

    mysql_select_db("spkcriver",$db);

    $result = mysql_query("select * from riverdata", $db);
   
    
    $json_response = array();
    
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        $row_array['id'] = $row['id'];
        $row_array['rtime'] = $row['rtime'];
        $row_array['rdata'] = $row['rdata'];

        //push the values in the array
        array_push($json_response,$row_array);
    }
    
    $j=end($json_response);
    echo json_encode($j);

    //$file = fopen("json.txt","w");
   // echo fwrite($file, $j);

   // fclose($file);
 
?>