<?
$do7 = mysql_query("SELECT * FROM users WHERE rankid < '26' AND activity > '0' ORDER BY jailbusts DESC");
$rr7 = 0;
while($r7 = mysql_fetch_array($do7)){ 
$getuser = $r7['username'];
$rr7++;
mysql_query("INSERT INTO `recordsrank` (`username`,`7`) VALUES ('$getuser','$rr7')");
}?>