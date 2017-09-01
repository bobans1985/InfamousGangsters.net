<?
$do17 = mysql_query("SELECT * FROM users WHERE rankid < '26' AND activity > '0' ORDER BY winnings DESC");
$rr17 = 0;
while($r17 = mysql_fetch_array($do17)){ 
$getuser = $r17['username'];
$rr17++;
mysql_query("INSERT INTO `recordsrank` (`username`,`17`) VALUES ('$getuser','$rr17')");
}?>