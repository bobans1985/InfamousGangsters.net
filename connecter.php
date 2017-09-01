<?php error_reporting(0);

include 'checkme.php'; 


mysql_connect("localhost", "infamous_game", "codeman123") or die('Database error1');
mysql_select_db("infamous_game") or die('Database error');  
$alloks = 1; 
?>