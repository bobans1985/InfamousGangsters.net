<?
$do1 = mysql_query("SELECT * FROM users WHERE rankid < '26' AND activity > '0' ORDER BY crimes DESC");
$rr1 = 0;
while($r1 = mysql_fetch_array($do1)){ 
$getuser = $r1['username'];
$rr1++;
$yesno = mysql_num_rows(mysql_query("SELECT * FROM recordsrank WHERE username = '$getuser'"));
mysql_query("INSERT INTO `recordsrank` (`username`,`1`) VALUES ('$getuser','$rr1')");
}
?>