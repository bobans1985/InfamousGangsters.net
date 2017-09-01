<?
$do2 = mysql_query("SELECT * FROM users WHERE rankid < '26' AND activity > '0' ORDER BY donecrimes DESC");
$rr2 = 0;
while($r2 = mysql_fetch_array($do2)){ 
$getuser = $r2['username'];
$rr2++;
mysql_query("INSERT INTO `recordsrank` (`username`,`2`) VALUES ('$getuser','$rr2')");
}
?>