For one data:

    $logininfo = $result->fetch(PDO::FETCH_ASSOC);   // sid class num name cname sex login
    echo $logininfo["sid"];


For multiple data:

    $q = "SELECT name, max(score) AS mscore FROM `appadb_score` WHERE `class` LIKE '".$statclass."' GROUP BY `name` ORDER BY mscore DESC LIMIT 0,10 ";
    $result = $pdo->query($q);
    foreach ($result as $row) {
      $i++;
      echo "<tr><td>".$i."</td>";
      echo "<td>".$row["name"]."</td>";
      echo "<td align=right>".$row["mscore"]."</td></tr>";
    }




<?php
  error_reporting(0);
  $func = $_GET["func"];
  $playersid = $_GET["playersid"];
  $playername = $_GET["playername"];
  $score = $_GET["score"];
  $statclass = $_GET["statclass"];
  
  // ******** access the database and courses table ********
  $pdo = new PDO('mysql:host=localhost;dbname=xxxx', 'xxxx', 'xxxxxxxx');


  if ($func=="sidcheck") {
  
    if ((substr($playersid,0,1)=="s") || (substr($playersid,0,1)=="S")) $playersid = substr($playersid,1);
    if (!is_numeric($playersid)) {
      echo "1";   // Incorrect student ID
      exit;
    }

    $result = $pdo->query("SELECT * FROM `appadb_students` WHERE `sid`=".$playersid);
    $logininfo = $result->fetch(PDO::FETCH_ASSOC);   // sid class num name cname sex login
    if ($logininfo["sid"]!=$playersid) {
      echo "2";   // Student ID not found
      exit;
    }

    echo "0";     // success
  }

  if ($func=="addscore") {
    if ($playersid!="") {
      if ((substr($playersid,0,1)=="s") || (substr($playersid,0,1)=="S")) $playersid = substr($playersid,1);
      $result = $pdo->query("SELECT * FROM `appadb_students` WHERE `sid`=".$playersid);
      $logininfo = $result->fetch(PDO::FETCH_ASSOC);   // sid class num name cname sex login
      $result = $pdo->query("INSERT INTO `appadb_score`(`name`,`class`,`score`) VALUES ('".$logininfo["name"]."','".$logininfo["class"]."','".$score."')");
    }
    else if ($playername!="") {
      $result = $pdo->query("INSERT INTO `appadb_score`(`name`,`class`,`score`) VALUES ('".$playername."','Open','".$score."')");
    }
  }
  
  if ($func=="showstat") {
    $q = "SELECT name, max(score) AS mscore FROM `appadb_score` WHERE `class` LIKE '".$statclass."' GROUP BY `name` ORDER BY mscore DESC LIMIT 0,10 ";
    $result = $pdo->query($q);
    echo "<table align=center width=300>";
    echo "<tr><td><u>Rank</u></td><td><u>Name</u></td><td align=right><u>Score</u></td></tr>";
    $i = 0;
    foreach ($result as $row) {
      $i++;
      echo "<tr><td>".$i."</td>";
      echo "<td>".$row["name"]."</td>";
      echo "<td align=right>".$row["mscore"]."</td></tr>";
    }
    echo "</table>";
    if ($i==0) echo "No record. Be the first one!";
  }
?>