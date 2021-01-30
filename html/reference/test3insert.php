<?php
class riverdata
{
public function insert(){
 
 $sql = 'INSERT INTO riverdata (rtime,rdata)
 VALUES(:rtime,:rdata)';
 
 return $this->conn->exec($sql);
 }
 }
   
?>