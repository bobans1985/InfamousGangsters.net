<?
$do18 = mysql_query("SELECT * FROM users WHERE rankid < '26' AND activity > '0' ORDER BY oilprofit DESC");
$rr18 = 0;
while($r18 = mysql_fetch_array($do18)){ 
$getuser = $r18['username'];
$rr18++;
mysql_query("INSERT INTO `recordsrank` (`username`,`18`) VALUES ('$getuser','$rr18')");
}?>