<?
$do16 = mysql_query("SELECT * FROM users WHERE rankid < '26' AND activity > '0' ORDER BY moneycrimes DESC");
$rr16 = 0;
while($r16 = mysql_fetch_array($do16)){ 
$getuser = $r16['username'];
$rr16++;
mysql_query("INSERT INTO `recordsrank` (`username`,`16`) VALUES ('$getuser','$rr16')");
}?>