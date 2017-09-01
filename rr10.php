<?
$do10 = mysql_query("SELECT * FROM users WHERE rankid < '26' AND activity > '0' ORDER BY carsmelted DESC");
$rr10 = 0;
while($r10 = mysql_fetch_array($do10)){ 
$getuser = $r10['username'];
$rr10++;
mysql_query("INSERT INTO `recordsrank` (`username`,`10`) VALUES ('$getuser','$rr10')");
}?>