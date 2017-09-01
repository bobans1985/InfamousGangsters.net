<?
$do3 = mysql_query("SELECT * FROM users WHERE rankid < '26' AND activity > '0' ORDER BY consecutivecrimes DESC");
$rr3 = 0;
while($r3 = mysql_fetch_array($do3)){ 
$getuser = $r3['username'];
$rr3++;
mysql_query("INSERT INTO `recordsrank` (`username`,`3`) VALUES ('$getuser','$rr3')");
}
?>