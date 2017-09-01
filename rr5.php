<?
$do5 = mysql_query("SELECT * FROM users WHERE rankid < '26' AND activity > '0' ORDER BY donethefts DESC");
$rr5 = 0;
while($r5 = mysql_fetch_array($do5)){ 
$getuser = $r5['username'];
$rr5++;
mysql_query("INSERT INTO `recordsrank` (`username`,`5`) VALUES ('$getuser','$rr5')");
}?>