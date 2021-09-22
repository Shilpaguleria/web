<?php
$con = mysql_connect("localhost","solarpan","test123");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("solarpan_Tettra_App", $con);
?>
