<?
$recordsinfo = mysql_query("SELECT * FROM users WHERE username = '$usernameone'");
$donee = mysql_fetch_array($recordsinfo);
$record1 = number_format($donee['crimes']);
$record2 = number_format($donee['donecrimes']);
$record3 = number_format($donee['consecutivecrimes']);
$record4 = number_format($donee['thefts']);
$record5 = number_format($donee['donethefts']);
$record6 = number_format($donee['consecutivethefts']);
$record7 = number_format($donee['jailbusts']);
$record8 = number_format($donee['donebusts']);
$record9 = number_format($donee['joint']);
$record10 = number_format($donee['carsmelted']);
$record11 = number_format($donee['totalmelted']);
$record12 = number_format($donee['crewbullets']);
$record13 = number_format($donee['kills']);
$record14 = number_format($donee['casinos']);
$record15 = number_format($donee['ptsspent']);
$record16 = number_format($donee['moneycrimes']);
$record17 = number_format($donee['profit']);
$record18 = number_format($donee['oilprofit']);
?>