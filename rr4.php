<?
$do4 = mysql_query("SELECT * FROM users WHERE rankid < '26' AND activity > '0' ORDER BY thefts DESC");
$rr4 = 0;
while($r4 = mysql_fetch_array($do4)){ 
$getuser = $r4['username'];
$rr4++;
mysql_query("INSERT INTO `recordsrank` (`username`,`4`) VALUES ('$getuser','$rr4')");
}?>