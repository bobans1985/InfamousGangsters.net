<?
$do14 = mysql_query("SELECT * FROM users WHERE rankid < '26' AND activity > '0' ORDER BY casinos DESC");
$rr14 = 0;
while($r14 = mysql_fetch_array($do14)){ 
$getuser = $r14['username'];
$rr14++;
mysql_query("INSERT INTO `recordsrank` (`username`,`14`) VALUES ('$getuser','$rr14')");
}?>