<?
$do11 = mysql_query("SELECT * FROM users WHERE rankid < '26' AND activity > '0' ORDER BY totalmelted DESC");
$rr11 = 0;
while($r11 = mysql_fetch_array($do11)){ 
$getuser = $r11['username'];
$rr11++;
mysql_query("INSERT INTO `recordsrank` (`username`,`11`) VALUES ('$getuser','$rr11')");
}?>