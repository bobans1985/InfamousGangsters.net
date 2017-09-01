<?
$do13 = mysql_query("SELECT * FROM users WHERE rankid < '26' AND activity > '0' ORDER BY kills DESC");
$rr13 = 0;
while($r13 = mysql_fetch_array($do13)){ 
$getuser = $r13['username'];
$rr13++;
mysql_query("INSERT INTO `recordsrank` (`username`,`13`) VALUES ('$getuser','$rr13')");
}?>