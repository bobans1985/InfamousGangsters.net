<?
$do9 = mysql_query("SELECT * FROM users WHERE rankid < '26' AND activity > '0' ORDER BY joint DESC");
$rr9 = 0;
while($r9 = mysql_fetch_array($do9)){ 
$getuser = $r9['username'];
$rr9++;
mysql_query("INSERT INTO `recordsrank` (`username`,`9`) VALUES ('$getuser','$rr9')");
}?>