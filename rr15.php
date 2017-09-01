<?
$do15 = mysql_query("SELECT * FROM users WHERE rankid < '26' AND activity > '0' ORDER BY ptsspent DESC");
$rr15 = 0;
while($r15 = mysql_fetch_array($do15)){ 
$getuser = $r15['username'];
$rr15++;
mysql_query("INSERT INTO `recordsrank` (`username`,`15`) VALUES ('$getuser','$rr15')");
}?>