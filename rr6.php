<?
$do6 = mysql_query("SELECT * FROM users WHERE rankid < '26' AND activity > '0' ORDER BY consecutivethefts DESC");
$rr6 = 0;
while($r6 = mysql_fetch_array($do6)){ 
$getuser = $r6['username'];
$rr6++;
mysql_query("INSERT INTO `recordsrank` (`username`,`6`) VALUES ('$getuser','$rr6')");
}?>
