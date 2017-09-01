<?
$domissiontasks = mysql_query("SELECT * FROM missiontasks WHERE username = '$usernameone'");
$taskresults = mysql_fetch_array($domissiontasks);
$referralsstage = $taskresults['referralsstage'];
$referralstask = $taskresults['referrals'];
$crime1stage = $taskresults['crime1stage'];
$crime1task = $taskresults['crime1'];
$crime2stage = $taskresults['crime2stage'];
$crime2task = $taskresults['crime2'];
$crime3stage = $taskresults['crime3stage'];
$crime3task = $taskresults['crime3'];
$crime4stage = $taskresults['crime4stage'];
$crime4task = $taskresults['crime4'];
$crime5stage = $taskresults['crime5stage'];
$crime5task = $taskresults['crime5'];
$crime6stage = $taskresults['crime6stage'];
$crime6task = $taskresults['crime6'];
$crime7stage = $taskresults['crime7stage'];
$crime7task = $taskresults['crime7'];
$stealstage = $taskresults['stealstage'];
$stealtask = $taskresults['steal'];
$stealrarestage = $taskresults['stealrarestage'];
$stealraretask = $taskresults['stealrare'];
$meltbulletsstage = $taskresults['meltbulletsstage'];
$meltbulletstask = $taskresults['meltbullets'];
$meltcarsstage = $taskresults['meltcarsstage'];
$meltcarstask = $taskresults['meltcars'];
$bustsstage = $taskresults['bustsstage'];
$buststask = $taskresults['busts'];
$busts10stage = $taskresults['busts10stage'];
$busts10task = $taskresults['busts10'];
$busts60stage = $taskresults['busts60stage'];
$busts60task = $taskresults['busts60'];
$crewmoneystage = $taskresults['crewmoneystage'];
$crewmoneytask = $taskresults['crewmoney'];
$crewbulletsstage = $taskresults['crewbulletsstage'];
$crewbulletstask = $taskresults['crewbullets'];
$killstage = $taskresults['killstage'];
$killtask = $taskresults['kill'];
$killcrewstage = $taskresults['killcrewstage'];
$killcrewtask = $taskresults['killcrew'];

if($referralstask >= 1 && $referralsstage == 1){ mysql_query("UPDATE missiontasks SET referralsstage = 2 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 100000) WHERE username = '$usernameone'"); }
if($referralstask >= 3 && $referralsstage == 2){ mysql_query("UPDATE missiontasks SET referralsstage = 3 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 200000) WHERE username = '$usernameone'"); }
if($referralstask >= 5 && $referralsstage == 3){ mysql_query("UPDATE missiontasks SET referralsstage = 4 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 300000) WHERE username = '$usernameone'"); }
if($referralstask >= 7 && $referralsstage == 4){ mysql_query("UPDATE missiontasks SET referralsstage = 5 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 400000) WHERE username = '$usernameone'"); }
if($referralstask >= 10 && $referralsstage == 5){ mysql_query("UPDATE missiontasks SET referralsstage = 6 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 500000) WHERE username = '$usernameone'"); }

if($crime1task >= 500 && $crime1stage == 1){ mysql_query("UPDATE missiontasks SET crime1stage = 2 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 100000) WHERE username = '$usernameone'"); }
if($crime1task >= 700 && $crime1stage == 2){ mysql_query("UPDATE missiontasks SET crime1stage = 3 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 200000) WHERE username = '$usernameone'"); }
if($crime1task >= 1000 && $crime1stage == 3){ mysql_query("UPDATE missiontasks SET crime1stage = 4 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 300000) WHERE username = '$usernameone'"); }
if($crime1task >= 1400 && $crime1stage == 4){ mysql_query("UPDATE missiontasks SET crime1stage = 5 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 400000) WHERE username = '$usernameone'"); }
if($crime1task >= 1900 && $crime1stage == 5){ mysql_query("UPDATE missiontasks SET crime1stage = 6 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 500000) WHERE username = '$usernameone'"); }

if($crime2task >= 400 && $crime2stage == 1){ mysql_query("UPDATE missiontasks SET crime2stage = 2 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 100000) WHERE username = '$usernameone'"); }
if($crime2task >= 600 && $crime2stage == 2){ mysql_query("UPDATE missiontasks SET crime2stage = 3 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 200000) WHERE username = '$usernameone'"); }
if($crime2task >= 900 && $crime2stage == 3){ mysql_query("UPDATE missiontasks SET crime2stage = 4 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 300000) WHERE username = '$usernameone'"); }
if($crime2task >= 1300 && $crime2stage == 4){ mysql_query("UPDATE missiontasks SET crime2stage = 5 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 400000) WHERE username = '$usernameone'"); }
if($crime2task >= 1800 && $crime2stage == 5){ mysql_query("UPDATE missiontasks SET crime2stage = 6 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 500000) WHERE username = '$usernameone'"); }

if($crime3task >= 300 && $crime3stage == 1){ mysql_query("UPDATE missiontasks SET crime3stage = 2 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 100000) WHERE username = '$usernameone'"); }
if($crime3task >= 500 && $crime3stage == 2){ mysql_query("UPDATE missiontasks SET crime3stage = 3 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 200000) WHERE username = '$usernameone'"); }
if($crime3task >= 800 && $crime3stage == 3){ mysql_query("UPDATE missiontasks SET crime3stage = 4 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 300000) WHERE username = '$usernameone'"); }
if($crime3task >= 1200 && $crime3stage == 4){ mysql_query("UPDATE missiontasks SET crime3stage = 5 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 400000) WHERE username = '$usernameone'"); }
if($crime3task >= 1700 && $crime3stage == 5){ mysql_query("UPDATE missiontasks SET crime3stage = 6 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 500000) WHERE username = '$usernameone'"); }

if($crime4task >= 200 && $crime4stage == 1){ mysql_query("UPDATE missiontasks SET crime4stage = 2 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 100000) WHERE username = '$usernameone'"); }
if($crime4task >= 400 && $crime4stage == 2){ mysql_query("UPDATE missiontasks SET crime4stage = 3 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 200000) WHERE username = '$usernameone'"); }
if($crime4task >= 700 && $crime4stage == 3){ mysql_query("UPDATE missiontasks SET crime4stage = 4 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 300000) WHERE username = '$usernameone'"); }
if($crime4task >= 1100 && $crime4stage == 4){ mysql_query("UPDATE missiontasks SET crime4stage = 5 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 400000) WHERE username = '$usernameone'"); }
if($crime4task >= 1600 && $crime4stage == 5){ mysql_query("UPDATE missiontasks SET crime4stage = 6 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 500000) WHERE username = '$usernameone'"); }

if($crime5task >= 100 && $crime5stage == 1){ mysql_query("UPDATE missiontasks SET crime5stage = 2 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 100000) WHERE username = '$usernameone'"); }
if($crime5task >= 300 && $crime5stage == 2){ mysql_query("UPDATE missiontasks SET crime5stage = 3 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 200000) WHERE username = '$usernameone'"); }
if($crime5task >= 600 && $crime5stage == 3){ mysql_query("UPDATE missiontasks SET crime5stage = 4 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 300000) WHERE username = '$usernameone'"); }
if($crime5task >= 1000 && $crime5stage == 4){ mysql_query("UPDATE missiontasks SET crime5stage = 5 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 400000) WHERE username = '$usernameone'"); }
if($crime5task >= 1500 && $crime5stage == 5){ mysql_query("UPDATE missiontasks SET crime5stage = 6 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 500000) WHERE username = '$usernameone'"); }

if($crime6task >= 50 && $crime6stage == 1){ mysql_query("UPDATE missiontasks SET crime6stage = 2 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 100000) WHERE username = '$usernameone'"); }
if($crime6task >= 250 && $crime6stage == 2){ mysql_query("UPDATE missiontasks SET crime6stage = 3 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 200000) WHERE username = '$usernameone'"); }
if($crime6task >= 550 && $crime6stage == 3){ mysql_query("UPDATE missiontasks SET crime6stage = 4 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 300000) WHERE username = '$usernameone'"); }
if($crime6task >= 950 && $crime6stage == 4){ mysql_query("UPDATE missiontasks SET crime6stage = 5 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 400000) WHERE username = '$usernameone'"); }
if($crime6task >= 1450 && $crime6stage == 5){ mysql_query("UPDATE missiontasks SET crime6stage = 6 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 500000) WHERE username = '$usernameone'"); }

if($crime7task >= 25 && $crime7stage == 1){ mysql_query("UPDATE missiontasks SET crime7stage = 2 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 100000) WHERE username = '$usernameone'"); }
if($crime7task >= 225 && $crime7stage == 2){ mysql_query("UPDATE missiontasks SET crime7stage = 3 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 200000) WHERE username = '$usernameone'"); }
if($crime7task >= 525 && $crime7stage == 3){ mysql_query("UPDATE missiontasks SET crime7stage = 4 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 300000) WHERE username = '$usernameone'"); }
if($crime7task >= 925 && $crime7stage == 4){ mysql_query("UPDATE missiontasks SET crime7stage = 5 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 400000) WHERE username = '$usernameone'"); }
if($crime7task >= 1425 && $crime7stage == 5){ mysql_query("UPDATE missiontasks SET crime7stage = 6 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 500000) WHERE username = '$usernameone'"); }

if($stealtask >= 25 && $stealstage == 1){ mysql_query("UPDATE missiontasks SET stealstage = 2 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 100000) WHERE username = '$usernameone'"); }
if($stealtask >= 75 && $stealstage == 2){ mysql_query("UPDATE missiontasks SET stealstage = 3 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 200000) WHERE username = '$usernameone'"); }
if($stealtask >= 150 && $stealstage == 3){ mysql_query("UPDATE missiontasks SET stealstage = 4 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 300000) WHERE username = '$usernameone'"); }
if($stealtask >= 250 && $stealstage == 4){ mysql_query("UPDATE missiontasks SET stealstage = 5 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 400000) WHERE username = '$usernameone'"); }
if($stealtask >= 375 && $stealstage == 5){ mysql_query("UPDATE missiontasks SET stealstage = 6 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 500000) WHERE username = '$usernameone'"); }

if($stealraretask >= 5 && $stealrarestage == 1){ mysql_query("UPDATE missiontasks SET stealrarestage = 2 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 100000) WHERE username = '$usernameone'"); }
if($stealraretask >= 15 && $stealrarestage == 2){ mysql_query("UPDATE missiontasks SET stealrarestage = 3 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 200000) WHERE username = '$usernameone'"); }
if($stealraretask >= 30 && $stealrarestage == 3){ mysql_query("UPDATE missiontasks SET stealrarestage = 4 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 300000) WHERE username = '$usernameone'"); }
if($stealraretask >= 50 && $stealrarestage == 4){ mysql_query("UPDATE missiontasks SET stealrarestage = 5 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 400000) WHERE username = '$usernameone'"); }
if($stealraretask >= 75 && $stealrarestage == 5){ mysql_query("UPDATE missiontasks SET stealrarestage = 6 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 500000) WHERE username = '$usernameone'"); }

if($meltbulletstask >= 500 && $meltbulletsstage == 1){ mysql_query("UPDATE missiontasks SET meltbulletsstage = 2 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 100000) WHERE username = '$usernameone'"); }
if($meltbulletstask >= 1500 && $meltbulletsstage == 2){ mysql_query("UPDATE missiontasks SET meltbulletsstage = 3 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 200000) WHERE username = '$usernameone'"); }
if($meltbulletstask >= 3000 && $meltbulletsstage == 3){ mysql_query("UPDATE missiontasks SET meltbulletsstage = 4 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 300000) WHERE username = '$usernameone'"); }
if($meltbulletstask >= 5000 && $meltbulletsstage == 4){ mysql_query("UPDATE missiontasks SET meltbulletsstage = 5 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 400000) WHERE username = '$usernameone'"); }
if($meltbulletstask >= 7500 && $meltbulletsstage == 5){ mysql_query("UPDATE missiontasks SET meltbulletsstage = 6 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 500000) WHERE username = '$usernameone'"); }

if($meltcarstask >= 10 && $meltcarsstage == 1){ mysql_query("UPDATE missiontasks SET meltcarsstage = 2 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 100000) WHERE username = '$usernameone'"); }
if($meltcarstask >= 30 && $meltcarsstage == 2){ mysql_query("UPDATE missiontasks SET meltcarsstage = 3 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 200000) WHERE username = '$usernameone'"); }
if($meltcarstask >= 60 && $meltcarsstage == 3){ mysql_query("UPDATE missiontasks SET meltcarsstage = 4 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 300000) WHERE username = '$usernameone'"); }
if($meltcarstask >= 100 && $meltcarsstage == 4){ mysql_query("UPDATE missiontasks SET meltcarsstage = 5 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 400000) WHERE username = '$usernameone'"); }
if($meltcarstask >= 150 && $meltcarsstage == 5){ mysql_query("UPDATE missiontasks SET meltcarsstage = 6 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 500000) WHERE username = '$usernameone'"); }

if($buststask >= 10 && $bustsstage == 1){ mysql_query("UPDATE missiontasks SET bustsstage = 2 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 100000) WHERE username = '$usernameone'"); }
if($buststask >= 30 && $bustsstage == 2){ mysql_query("UPDATE missiontasks SET bustsstage = 3 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 200000) WHERE username = '$usernameone'"); }
if($buststask >= 60 && $bustsstage == 3){ mysql_query("UPDATE missiontasks SET bustsstage = 4 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 300000) WHERE username = '$usernameone'"); }
if($buststask >= 100 && $bustsstage == 4){ mysql_query("UPDATE missiontasks SET bustsstage = 5 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 400000) WHERE username = '$usernameone'"); }
if($buststask >= 150 && $bustsstage == 5){ mysql_query("UPDATE missiontasks SET bustsstage = 6 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 500000) WHERE username = '$usernameone'"); }

if($busts10task >= 5 && $busts10stage == 1){ mysql_query("UPDATE missiontasks SET busts10stage = 2 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 100000) WHERE username = '$usernameone'"); }
if($busts10task >= 15 && $busts10stage == 2){ mysql_query("UPDATE missiontasks SET busts10stage = 3 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 200000) WHERE username = '$usernameone'"); }
if($busts10task >= 30 && $busts10stage == 3){ mysql_query("UPDATE missiontasks SET busts10stage = 4 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 300000) WHERE username = '$usernameone'"); }
if($busts10task >= 50 && $busts10stage == 4){ mysql_query("UPDATE missiontasks SET busts10stage = 5 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 400000) WHERE username = '$usernameone'"); }
if($busts10task >= 75 && $busts10stage == 5){ mysql_query("UPDATE missiontasks SET busts10stage = 6 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 500000) WHERE username = '$usernameone'"); }

if($busts60task >= 5 && $busts60stage == 1){ mysql_query("UPDATE missiontasks SET busts60stage = 2 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 100000) WHERE username = '$usernameone'"); }
if($busts60task >= 15 && $busts60stage == 2){ mysql_query("UPDATE missiontasks SET busts60stage = 3 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 200000) WHERE username = '$usernameone'"); }
if($busts60task >= 30 && $busts60stage == 3){ mysql_query("UPDATE missiontasks SET busts60stage = 4 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 300000) WHERE username = '$usernameone'"); }
if($busts60task >= 50 && $busts60stage == 4){ mysql_query("UPDATE missiontasks SET busts60stage = 5 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 400000) WHERE username = '$usernameone'"); }
if($busts60task >= 75 && $busts60stage == 5){ mysql_query("UPDATE missiontasks SET busts60stage = 6 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 500000) WHERE username = '$usernameone'"); }

if($crewmoneytask >= 1500000 && $crewmoneystage == 1){ mysql_query("UPDATE missiontasks SET crewmoneystage = 2 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 100000) WHERE username = '$usernameone'"); }
if($crewmoneytask >= 4500000 && $crewmoneystage == 2){ mysql_query("UPDATE missiontasks SET crewmoneystage = 3 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 200000) WHERE username = '$usernameone'"); }
if($crewmoneytask >= 9000000 && $crewmoneystage == 3){ mysql_query("UPDATE missiontasks SET crewmoneystage = 4 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 300000) WHERE username = '$usernameone'"); }
if($crewmoneytask >= 15000000 && $crewmoneystage == 4){ mysql_query("UPDATE missiontasks SET crewmoneystage = 5 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 400000) WHERE username = '$usernameone'"); }
if($crewmoneytask >= 22500000 && $crewmoneystage == 5){ mysql_query("UPDATE missiontasks SET crewmoneystage = 6 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 500000) WHERE username = '$usernameone'"); }

if($crewbulletstask >= 1500 && $crewbulletsstage == 1){ mysql_query("UPDATE missiontasks SET crewbulletsstage = 2 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 100000) WHERE username = '$usernameone'"); }
if($crewbulletstask >= 4500 && $crewbulletsstage == 2){ mysql_query("UPDATE missiontasks SET crewbulletsstage = 3 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 200000) WHERE username = '$usernameone'"); }
if($crewbulletstask >= 9000 && $crewbulletsstage == 3){ mysql_query("UPDATE missiontasks SET crewbulletsstage = 4 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 300000) WHERE username = '$usernameone'"); }
if($crewbulletstask >= 15000 && $crewbulletsstage == 4){ mysql_query("UPDATE missiontasks SET crewbulletsstage = 5 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 400000) WHERE username = '$usernameone'"); }
if($crewbulletstask >= 22500 && $crewbulletsstage == 5){ mysql_query("UPDATE missiontasks SET crewbulletsstage = 6 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 500000) WHERE username = '$usernameone'"); }

if($killtask >= 2 && $killstage == 1){ mysql_query("UPDATE missiontasks SET killstage = 2 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 100000) WHERE username = '$usernameone'"); }
if($killtask >= 4 && $killstage == 2){ mysql_query("UPDATE missiontasks SET killstage = 3 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 200000) WHERE username = '$usernameone'"); }
if($killtask >= 8 && $killstage == 3){ mysql_query("UPDATE missiontasks SET killstage = 4 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 300000) WHERE username = '$usernameone'"); }
if($killtask >= 14 && $killstage == 4){ mysql_query("UPDATE missiontasks SET killstage = 5 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 400000) WHERE username = '$usernameone'"); }
if($killtask >= 22 && $killstage == 5){ mysql_query("UPDATE missiontasks SET killstage = 6 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 500000) WHERE username = '$usernameone'"); }

if($killcrewtask >= 1 && $killcrewstage == 1){ mysql_query("UPDATE missiontasks SET killcrewstage = 2 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 100000) WHERE username = '$usernameone'"); }
if($killcrewtask >= 3 && $killcrewstage == 2){ mysql_query("UPDATE missiontasks SET killcrewstage = 3 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 200000) WHERE username = '$usernameone'"); }
if($killcrewtask >= 6 && $killcrewstage == 3){ mysql_query("UPDATE missiontasks SET killcrewstage = 4 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 300000) WHERE username = '$usernameone'"); }
if($killcrewtask >= 10 && $killcrewstage == 4){ mysql_query("UPDATE missiontasks SET killcrewstage = 5 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 400000) WHERE username = '$usernameone'"); }
if($killcrewtask >= 15 && $killcrewstage == 5){ mysql_query("UPDATE missiontasks SET killcrewstage = 6 WHERE username = '$usernameone'"); mysql_query("UPDATE users SET money = (money + 500000) WHERE username = '$usernameone'"); }
?>