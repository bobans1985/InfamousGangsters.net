<?
$do8 = mysql_query("SELECT * FROM users WHERE rankid < '26' AND activity > '0' ORDER BY donebusts DESC");
$rr8 = 0;
while($r8 = mysql_fetch_array($do8)){ 
$getuser = $r8['username'];
$rr8++;
mysql_query("INSERT INTO `recordsrank` (`username`,`8`) VALUES ('$getuser','$rr8')");
}?>