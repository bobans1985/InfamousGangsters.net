<?
$do12 = mysql_query("SELECT * FROM users WHERE rankid < '26' AND activity > '0' ORDER BY crewbullets DESC");
$rr12 = 0;
while($r12 = mysql_fetch_array($do12)){ 
$getuser = $r12['username'];
$rr12++;
mysql_query("INSERT INTO `recordsrank` (`username`,`12`) VALUES ('$getuser','$rr12')");
}?>