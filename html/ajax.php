<?php

$db = mysql_connect("wongwongjames.noip.me", "earthquake", "420");
if (!$db) {
  die('Could not connect to db: ' . mysql_error());
}

mysql_select_db("earthquake", $db);

$result = mysql_query("select * from earthquake", $db);

$json_response = array();

while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
  $row_array['id'] = $row['id'];
  $row_array['time'] = $row['time'];
  $row_array['magnitude'] = $row['magnitude'];

  //push the values in the array
  array_push($json_response, $row_array);
}

$j = end($json_response);
echo json_encode($j);
//$file = fopen("json.txt","w");
// echo fwrite($file, $j);
// fclose($file);
