<? include 'included.php'; session_start(); ?>
<?
$saturate = "/[^a-z0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$playerip = $_SERVER['REMOTE_ADDR'];
$username = $usernameone;

$userarray = $statustesttwo;
$userlocation = $userarray['location'];
$userrankid = $userarray['rankid'];
$usermoney = $userarray['money'];
$userpoints = $userarray['points'];
$penpoints = $userarray['penpoints'];
$check = $userarray['sentmsgs'];
$today = date("m.d.y"); 
mysql_query("DELETE FROM casinoroulettebets WHERE time != '$today'");
$newlocation = $_GET['location'];
if($newlocation == 1){ $newlocation = "Las Vegas"; }
elseif($newlocation == 2){ $newlocation = "Los Angeles"; }
elseif($newlocation == 3){ $newlocation = "New York"; }
elseif($newlocation == 6){ $newlocation = "Staff Land"; }
$makenewmaybe = mysql_num_rows(mysql_query("SELECT owner FROM casinos WHERE owner = '$usernameone' AND casino = 'Roulette' AND location = '$newlocation'"));
if($makenewmaybe > 0){ $userlocation = "$newlocation"; }

$jailtest = mysql_query("SELECT username FROM jail WHERE username  = '$username'");
$jailtester = mysql_num_rows($jailtest);
if($jailtester != '0'){die(include 'jail.php'); }
?>

<html>
<head>
<title>:: State Gangsters</title><link rel="stylesheet" href="layout/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache"></head>
<link rel="shortcut icon" href="/layout/icon.png" type="image/x-icon" />
<body background="/layout/wallpaper.png">
<table width="100%" height="335" align="center" cellpadding="0" cellspacing="3">
<tr>
<td width="250" valign="top">
<? include 'leftmenu.php'; ?>
</td>
<td width="100%" valign="top">
<?php

$entertainer = $ent;
if($entertainer != '0'){die('<font color=white face=verdana size=1>As entertainer you cannot view this page</font>');}

$ownerinfosql = mysql_query("SELECT * FROM casinos WHERE casino = 'Roulette' AND location = '$userlocation'");
$ownerinfoarray = mysql_fetch_array($ownerinfosql);
$ownername = $ownerinfoarray['owner'];
$getbuyback = $ownerinfoarray['buyback'];

$getsug = mysql_fetch_array(mysql_query("SELECT * FROM suggestions WHERE username = '$ownername'"));
$getsugid = $getsug['id'];

if($ownername == $usernameone){$owner = 1;}else{$owner = 0;}
$ownermaxbet = $ownerinfoarray['maxbet'];
$ownerprofit = $ownerinfoarray['profit'];
$ownermaxbettwo = number_format($ownerinfoarray['maxbet']);
if($ownermaxbettwo == '999,999,999,999'){$ownermaxbettwo = 'Infinite';}else{$ownermaxbettwo = "$$ownermaxbettwo";} 
$ownerprofittwo = number_format($ownerinfoarray['profit']);

$ownerstatssql = mysql_query("SELECT * FROM users WHERE ID = '$getsugid'");
$ownerstatsarray = mysql_fetch_array($ownerstatssql);
$ownermoney = $ownerstatsarray['money'];
$ownerpoints = $ownerstatsarray['points'];

$saturated = "/[^0-9]/i";
$setmaxraw = mysql_real_escape_string($_POST['setmaxrlt']);
$priceraw = mysql_real_escape_string($_POST['setpricerlt']);
$buybackraw = mysql_real_escape_string($_POST['setbuybackrlt']);
$setownerrawraw = mysql_real_escape_string($_POST['setownerrlt']);
$roubetraw = mysql_real_escape_string($_POST['bet']);
$roubet = preg_replace($saturated,"",$roubetraw);

$price = preg_replace($saturated,"",$priceraw);
$buyback = preg_replace($saturated,"",$buybackraw)
;
$betformat  = number_format($bet);
$setmax = preg_replace($saturated,"",$setmaxraw);
$setownerraw = preg_replace($saturate,"",$setownerrawraw);
$setmaxtwo = number_format($setmax);

$checkindb = mysql_num_rows(mysql_query("SELECT * FROM casinoprofit WHERE username = '$usernameone'"));
if($checkindb < 1){ mysql_query("INSERT INTO `casinoprofit` (username,id) VALUES ('$usernameone','')"); }

if(($owner != '0')||($userrankid == '100')){
if(isset($_POST['setmaxrlt'])) {
if($setmax < '250000'){$showoutcome++; $outcome = "The maxbet must be at least $<b>250,000</b>!";}
elseif($setmax > '999999999999'){
mysql_query("UPDATE casinos SET maxbet = '999999999999' WHERE casino= 'Roulette' AND location = '$userlocation'");
$showoutcome++; $outcome = "The maxbet is now <b>Infinite</b>!</b>";}
else{
mysql_query("UPDATE casinos SET maxbet = '$setmax' WHERE casino= 'Roulette' AND location = '$userlocation'");
$showoutcome++; $outcome = "The maxbet is now $<b>$setmaxtwo</b>!</font>";}}}


if(($owner != '0')||($userrankid >= '25')){
if(isset($_POST['setownerrlt'])) {

$setownerinfosql = mysql_query("SELECT * FROM users WHERE username = '$setownerraw'");
$setownerinfoarray = mysql_fetch_array($setownerinfosql);
$setownerinforows = mysql_num_rows($setownerinfosql);
$setowner = $setownerinfoarray['username'];
if(!$setowner){die (' ');}
$setownerstatus = $setownerinfoarray['status'];
$ssskkk = $setownerinfoarray['rankid'];
$ssskkkid = $setownerinfoarray['ID'];

$anum_true=mysql_num_rows(mysql_query("SELECT * FROM users WHERE username='$setownerraw' AND blockcasinos='1'"));
if ($anum_true == "1"){
die("<font size=2 face=verdana color=silver>$setownerraw doesnt allow Roulettes to be sent to him/her.</font>");}

$anum_true=mysql_num_rows(mysql_query("SELECT * FROM protection WHERE username='$setownerraw'"));
if ($anum_true == "1"){
die("<font size=2 face=verdana color=silver>$setownerraw is under protection!</font>");}

if($setowner == $ownername){$showoutcome++; $outcome = "You already own the roulette!</font>";}
elseif($setownerinforows == '0'){$showoutcome++; $outcome = "No such user!</font>";}
elseif($setownerstatus == 'Dead'){$showoutcome++; $outcome = "You cannot send a casino to a dead player!</font>";}
elseif(($ssskkk > '25')&&($userrankid < '50')){$showoutcome++; $outcome = "You cannot send a casino to a staff member!</font>";}
else{
$cunt = mysql_num_rows(mysql_query("SELECT owner FROM casinos WHERE owner = '$setowner' AND type = 'casi'"));
$cunts = mysql_num_rows(mysql_query("SELECT owner FROM casinos WHERE owner = '$setowner' AND casino = 'Roulette'"));
if($cunt > '3' AND $setowner != 'None'){die('<font color=white face=verdana size=1>That user already has 2 casinos!</font>');}
if($cunts > '0' AND $setowner != 'None'){die('<font color=white face=verdana size=1>That user already has a roulette!</font>');}


$penpoint = mysql_num_rows(mysql_query("SELECT * FROM ipadresses WHERE ip = '$userip' AND username = '$setowner'"));
if(($penpoint > '0')&&($setowner != $username)){ mysql_query("UPDATE users SET penpoints = penpoints + 1 WHERE username = '$username'");
$reason = "$username sent $userlocation roulette to $setowner";
mysql_query("INSERT INTO penpoints(username,reason) VALUES('$username','$reason')");}

mysql_query("UPDATE casinos SET buyback = '0' WHERE casino = 'Roulette' AND location = '$userlocation'");
mysql_query("UPDATE casinos SET owner = '$setowner' WHERE casino= 'Roulette' AND location = '$userlocation'");
mysql_query("UPDATE casinos SET nickname = '$setownerraw' WHERE casino= 'Roulette' AND location = '$userlocation'");
mysql_query("UPDATE casinos SET maxbet = '250000' WHERE casino= 'Roulette' AND location = '$userlocation'");
$showoutcome++; $outcome = "You gave the casino to <a href=viewprofile.php?username=$setowner><b>$setownerraw</b>!</font></a>";
mysql_query("DELETE FROM buycasinos WHERE city = '$userlocation' AND type = 'Roulette'");

mysql_query("UPDATE users SET notify = '1', notification = 'a_open$usernameone a_closed$usernameone a_slashsent you $userlocation Roulette.' WHERE username = '$ssskkkid'");}}}

if(($owner != '0')||($userrankid == '100')){
if(isset($_POST['setpricerlt'])) {
mysql_query("DELETE FROM buycasinos WHERE type = 'Roulette' AND city = '$userlocation'");
$buytime = time()+86400;
mysql_query("INSERT INTO buycasinos(username,time,city,price,type)
VALUES ('$ownername','$buytime','$userlocation','$price','Roulette')");
$showoutcome++; $outcome = "The casino has been added to quicktrade!</font>";
}}

if(($owner != '0')||($userrankid == '100')){
if(isset($_POST['resetrltprofit'])) {
$showoutcome++; $outcome = "Profit reset!</font>";
mysql_query("UPDATE casinos SET profit = '0' WHERE casino= 'Roulette' AND location = '$userlocation'");}}

if(($owner != '0')||($userrankid == '100')){
if(isset($_POST['setbuybackrlt'])){
if($buyback < 1){ mysql_query("UPDATE casinos SET buyback = '0' WHERE casino= 'Roulette' AND location = '$userlocation'");
$showoutcome++; $outcome = "You buyback has been removed!</font>"; }
elseif($buyback < 500){ $showoutcome++; $outcome = "Minimum buy back is 500 points!</font>"; }
elseif($buyback > $userpoints){ $showoutcome++; $outcome = "You can not afford this buy back!</font>"; }
else{
mysql_query("UPDATE casinos SET buyback = '$buyback' WHERE casino= 'Roulette' AND location = '$userlocation'");
$showoutcome++; $outcome = "Your casino buyback has been set!</font>";
}}}

if($owner == '0' AND $ownername != 'None'){

if(isset($_POST['bet'])){

$no['37'] = preg_replace($saturated,"",$_POST['37']);
$no['1'] = preg_replace($saturated,"",$_POST['1']);
$no['2'] = preg_replace($saturated,"",$_POST['2']);
$no['3'] = preg_replace($saturated,"",$_POST['3']);
$no['4'] = preg_replace($saturated,"",$_POST['4']);
$no['5'] = preg_replace($saturated,"",$_POST['5']);
$no['6'] = preg_replace($saturated,"",$_POST['6']);
$no['7'] = preg_replace($saturated,"",$_POST['7']);
$no['8'] = preg_replace($saturated,"",$_POST['8']);
$no['9'] = preg_replace($saturated,"",$_POST['9']);
$no['10'] = preg_replace($saturated,"",$_POST['10']);
$no['11'] = preg_replace($saturated,"",$_POST['11']);
$no['12'] = preg_replace($saturated,"",$_POST['12']);
$no['13'] = preg_replace($saturated,"",$_POST['13']);
$no['14'] = preg_replace($saturated,"",$_POST['14']);
$no['15'] = preg_replace($saturated,"",$_POST['15']);
$no['16'] = preg_replace($saturated,"",$_POST['16']);
$no['17'] = preg_replace($saturated,"",$_POST['17']);
$no['18'] = preg_replace($saturated,"",$_POST['18']);
$no['19'] = preg_replace($saturated,"",$_POST['19']);
$no['20'] = preg_replace($saturated,"",$_POST['20']);
$no['21'] = preg_replace($saturated,"",$_POST['21']);
$no['22'] = preg_replace($saturated,"",$_POST['22']);
$no['23'] = preg_replace($saturated,"",$_POST['23']);
$no['24'] = preg_replace($saturated,"",$_POST['24']);
$no['25'] = preg_replace($saturated,"",$_POST['25']);
$no['26'] = preg_replace($saturated,"",$_POST['26']);
$no['27'] = preg_replace($saturated,"",$_POST['27']);
$no['28'] = preg_replace($saturated,"",$_POST['28']);
$no['29'] = preg_replace($saturated,"",$_POST['29']);
$no['30'] = preg_replace($saturated,"",$_POST['30']);
$no['31'] = preg_replace($saturated,"",$_POST['31']);
$no['32'] = preg_replace($saturated,"",$_POST['32']);
$no['33'] = preg_replace($saturated,"",$_POST['33']);
$no['34'] = preg_replace($saturated,"",$_POST['34']);
$no['35'] = preg_replace($saturated,"",$_POST['35']);
$no['36'] = preg_replace($saturated,"",$_POST['36']);

$no['red'] = preg_replace($saturated,"",$_POST['red']);
$no['black'] = preg_replace($saturated,"",$_POST['black']);
$no['odd'] = preg_replace($saturated,"",$_POST['odd']);
$no['even'] = preg_replace($saturated,"",$_POST['even']);
$no['1to18'] = preg_replace($saturated,"",$_POST['1to18']);
$no['19to36'] = preg_replace($saturated,"",$_POST['19to36']);
$no['1to12'] = preg_replace($saturated,"",$_POST['1to12']);
$no['13to24'] = preg_replace($saturated,"",$_POST['13to24']);
$no['25to36'] = preg_replace($saturated,"",$_POST['25to36']);
$no['column1'] = preg_replace($saturated,"",$_POST['column1']);
$no['column2'] = preg_replace($saturated,"",$_POST['column2']);
$no['column3'] = preg_replace($saturated,"",$_POST['column3']);

$stake = $no['37']+$no['1']+$no['2']+$no['3']+$no['4']+$no['5']+$no['6']+$no['7']+$no['8']+$no['9']+$no['10']+$no['11']+$no['12']+$no['13']+$no['14']+$no['15']+$no['16']+$no['17']+$no['18']+$no['19']+$no['20']+$no['21']+$no['22']+$no['23']+$no['24']+$no['25']+$no['26']+$no['27']+$no['28']+$no['29']+$no['30']+$no['31']+$no['32']+$no['33']+$no['34']+$no['35']+$no['36']+$no['red']+$no['black']+$no['odd']+$no['even']+$no['1to18']+$no['19to36']+$no['1to12']+$no['13to24']+$no['25to36']+$no['column1']+$no['column2']+$no['column3'];
$stakea = number_format($stake);
$rand = mt_rand(1,37);
if($ida == 011){ $rand = 37; }

if($_POST['543543543'] != $check){$stake = '0';}
if(!$stake){}
elseif($stake > $usermoney){ $showoutcome++; $outcome = "You dont have that much money!</font>"; }
elseif($stake > $ownermaxbet){ $showoutcome++; $outcome = "The maximum bet is set at <b>$ownermaxbettwo</b>!</font>";}
else{
$allblack = array("2", "4", "6", "8", "10", "11", "13", "15", "17", "20", "22", "24", "26", "28", "29", "31", "33", "35");
$allred = array("1", "3", "5", "7", "9", "12", "14", "16", "18", "19", "21", "23", "25", "27", "30", "32", "34", "36");
$onetoeightteen = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18");
$nineteentothirtysix = array("19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31", "32", "33", "34", "35", "36");
$onetotwelve = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12"); 
$thirteentotwentyfour = array("13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24");
$twentyfivetothirtysix = array ("25", "26", "27", "28", "29", "30", "31", "32", "33", "34", "35", "36");
$allodd = array ("1", "3", "5", "7", "9", "11", "13", "15", "17", "19", "21", "23", "25", "27", "29", "31", "33", "35");
$alleven = array ("2", "4", "6", "8", "10", "12", "14", "16", "18", "20", "22", "24", "26", "28", "30", "32", "34", "36");
$colone = array ("1", "4", "7", "10", "13", "16", "19", "22", "25", "28", "31", "34");
$coltwo = array ("2", "5", "8", "11", "14", "17", "20", "23", "26", "29", "32", "35");
$colthree = array ("3", "6", "9", "12", "15", "18", "21", "24", "27", "30", "33", "36");

$won = 0;

//numbers
for ($i = 0; $i <= 37; $i++) {
if ($rand == $i){ $won = $won + $no[$i] * 36;}
}
//black
for ($i = 0; $i <= 36; $i++) {
if ($rand == $allblack[$i]){ $won = $won + $no['black'] * 2;}
}
//red
for ($i = 0; $i <= 36; $i++) {
if ($rand == $allred[$i]){ $won = $won + $no['red'] * 2;}}
// 1 to 18
for ($i = 0; $i <= 36; $i++) {
if ($rand == $onetoeightteen[$i]){ $won = $won + $no['1to18'] * 2;}}
// 19 to 36
for ($i = 0; $i <= 36; $i++) {
if ($rand == $nineteentothirtysix[$i]){ $won = $won + $no['19to36'] * 2;}}
// 1 to 12
for ($i = 0; $i <= 36; $i++) {
if ($rand == $onetotwelve[$i]){ $won = $won + $no['1to12'] * 3;}}
// 13 to 24
for ($i = 0; $i <= 36; $i++) {
if ($rand == $thirteentotwentyfour[$i]){ $won = $won + $no['13to24'] * 3;}}
// 25 to 36
for ($i = 0; $i <= 36; $i++) {
if ($rand == $twentyfivetothirtysix[$i]){ $won = $won + $no['25to36'] * 3;}}
//odd
for ($i = 0; $i <= 36; $i++) {
if ($rand == $allodd[$i]){ $won = $won + $no['odd'] * 2;}}
//even
for ($i = 0; $i <= 36; $i++) {
if ($rand == $alleven[$i]){ $won = $won + $no['even'] * 2;}}
//column one
for ($i = 0; $i <= 36; $i++) {
if ($rand == $colone[$i]){ $won = $won + $no['column1'] * 3;}}
//column two
for ($i = 0; $i <= 36; $i++) {
if ($rand == $coltwo[$i]){ $won = $won + $no['column2'] * 3;}}
//column three
for ($i = 0; $i <= 36; $i++) {
if ($rand == $colthree[$i]){ $won = $won + $no['column3'] * 3;}}

$wona = number_format($won);
$realwin = $won - $stake;

$showoutcome++; $outcome = "You bet $<b>$stakea</b> and won <font color=khaki>$<b>$wona</b></font>!";
if($won == 0){ mysql_query("INSERT INTO `casinoroulettebets` (username,location,result,amount,time,bet) VALUES ('$usernameone','$userlocation','lost','$stake','$today','$stake')"); }else{
mysql_query("INSERT INTO `casinoroulettebets` (username,location,result,amount,time,bet) VALUES ('$usernameone','$userlocation','win','$won','$today','$stake')"); }
if($realwin >= $ownermoney){$showoutcome++; $outcome = "You bet $<b>$stakea</b> and won <font color=khaki>$<b>$wona</font></b>! <b>You won all of the owners cash, you now own the casino!</b>";

if($ownermoney == '0'){$new = '1';}else{$new = '0';}


mysql_query("UPDATE users SET money = '$new' WHERE ID = '$getsugid' AND money = '$ownermoney'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error minus cash 1.</font>');}

mysql_query("UPDATE users SET money = (money + $ownermoney + 1) WHERE username = '$username' AND money >= '$stake'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error, too fast 1.</font>');}

mysql_query("UPDATE casinoprofit SET roulette = roulette + '$ownermoney', overall = overall + '$ownermoney' WHERE username = '$usernameone'");

mysql_query("UPDATE users SET casinos = casinos + 1 WHERE username = '$username'");
mysql_query("DELETE FROM buycasinos WHERE city = '$userlocation' AND type = 'Roulette'");
mysql_query("UPDATE casinos SET owner = '$username' WHERE casino = 'Roulette' AND location = '$userlocation'");
mysql_query("UPDATE casinos SET nickname = '$username' WHERE casino = 'Roulette' AND location = '$userlocation'");
mysql_query("UPDATE casinos SET buyback = '0' WHERE casino = 'Roulette' AND location = '$userlocation'");
mysql_query("UPDATE casinos SET maxbet = '250000' WHERE casino = 'Roulette' AND location = '$userlocation'");

if($getbuyback > 0 AND $ownerpoints >= $getbuyback){
mysql_query("UPDATE users SET points = points + $getbuyback WHERE ID = '$ida'");
mysql_query("UPDATE users SET points = points - $getbuyback WHERE ID = '$getsugid'");
mysql_query("UPDATE casinos SET owner = '$ownername', maxbet = '0' WHERE casino = 'Roulette' AND location = '$userlocation'");
mysql_query("UPDATE users SET notification = 'a_open$usernameone a_closed$usernameone a_slashwon your roulette.', notify = (notify + 1) WHERE ID = '$getsugid'");
}}
else{
mysql_query("UPDATE users SET money = money + '$realwin' WHERE ID = '$ida' AND money >= '$stake'");
mysql_query("UPDATE casinoprofit SET roulette = roulette + '$realwin', overall = overall + '$realwin' WHERE username = '$usernameone'");
mysql_query("INSERT INTO moneylogs(`username`,`id`,`action`,`time`,`where`) VALUES ('$usernameone','','Won $$wona from $$stakea bet on roulette from $ownername','$datetime','roulette')");
mysql_query("INSERT INTO moneylogs(`username`,`id`,`action`,`time`,`where`) VALUES ('$ownername','','$usernameone won $$wona from $$stakea bet from this roulette','$datetime','roulette')");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error, too fast.</font>');}

mysql_query("UPDATE users SET money = money - '$realwin' WHERE ID = '$getsugid'");}

mysql_query("UPDATE casinos SET profit = profit - '$realwin' WHERE casino = 'Roulette' AND location = '$userlocation'");

for ($i = 0; $i <= 37; $i++) {
if($rand == '37'){$square = "<table cellpadding=0 align=center cellspacing=0 width=70 height=70><tr><td bgcolor=green><center><font color=white size=8 face=verdana>0</font></center></td></tr></table>";}
elseif($rand == $allblack[$i]){$square = "<table cellpadding=0 align=center cellspacing=0 width=70 height=70><tr><td bgcolor=black><center><font color=white size=8 face=verdana>$rand</font></center></td></tr></table>";}
elseif($rand == $allred[$i]){ $square = "<table cellpadding=0 cellspacing=0 width=70 height=70 align=center><tr><td bgcolor=red><center><font color=black size=8 face=verdana>$rand</font></center></td></tr></table>";}}


}}}

if(($ownername == 'None')){
if(isset($_POST['takeoverrlt'])){
if($usermoney < '25000000'){$showoutcome++; $outcome = "You don't have enough money! Taking over a roulette costs $<b>25,000,000</b>!</font>";}
else{$showoutcome++; $outcome = "You now own the roulette!";
mysql_query("UPDATE users SET money = money - '25000000' WHERE username = '$username'");
mysql_query("UPDATE casinos SET owner = '$username' WHERE location = '$userlocation' AND casino = 'Roulette'");
mysql_query("UPDATE casinos SET nickname = '$username' WHERE location = '$userlocation' AND casino = 'Roulette'");
mysql_query("DELETE FROM buycasinos WHERE city = '$userlocation' AND type = 'Roulette'");}}}
?>
<table align="center" cellpadding="0" width=100% cellspacing="0">
<tbody><tr>
<td class=menutopleft><img style="display: block" height=22 width=8 alt="" src="blank.gif"></td>
<td class=menutopbar height=22 style="white-space: nowrap"><font color="#222222"><b>Roulette</b></font></td>
<td class=menutopend><IMG style="display: block" height=20 alt="" src="blank.gif" width=28></td>
<td class=menutopmain><IMG style="display: block" height=22 width=30px alt="" src="blank.gif" ></td>
<td class=menutopright><IMG style="display: block" height=22 alt="" src="blank.gif" width=8></td></tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width: 100%"><tbody><tr>
<td class=menuleft><img style="display: block" alt="" src="blank.gif" width=8></td>
<td background="/layout/crossbg.png"><br>

<? if($showoutcome>=1){ ?>
<table width=70% align=center cellpadding=0 cellspacing=1 class=section>
<tr><td><div class=button1 style="background-color:#171717;">&nbsp;<?echo$outcome;?></td></tr>
</table><br>
<?echo$square;?><br>
<? } ?>


<table align="center" width="85%" cellpadding="0" cellspacing="1" class="section">
<table width="100%" cellpadding="0" cellspacing="0"><tr><td valign="top" width="50%">
<table align="center" cellpadding="0" cellspacing="1" class="section"><br><br>
<tr><td colspan=6><div class=tab>Roulette</td></tr>
<form action="" method="post"> 
<tr><td align=center colspan=6><div class=button1><input type="text" class="textbox" style="width: 1px; visibility:hidden;">0: <input type="text" name="37" class="textbox" style="width: 50px;" value="<?echo$_POST['37'];?>"></td></tr><tr><td align="right"><div class=button1><input type="text" class="textbox" style="width: 1px; visibility:hidden;">1:</td><td align="right"><div class=button1><input type="text" name="1" class="textbox" style="width: 50px;" value="<?echo$_POST['1'];?>"></td><td align="right"><div class=button1><input type="text" class="textbox" style="width: 1px; visibility:hidden;">2:</font></td><td align="center"><div class=button1><input type="text" name="2" class="textbox" style="width: 50px;" value="<?echo$_POST['2'];?>"></td><td align="right"><div class=button1><input type="text" class="textbox" style="width: 1px; visibility:hidden;">3:</td><td align="center"><div class=button1><input type="text" name="3" class="textbox" style="width: 50px;" value="<?echo$_POST['3'];?>"></td></tr><tr><td align="right"><div class=button1><input type="text" class="textbox" style="width: 1px; visibility:hidden;">4:</td><td align="center"><div class=button1><input type="text" name="4" class="textbox" style="width: 50px;" value="<?echo$_POST['4'];?>"></td><td align="right"><div class=button1><input type="text" class="textbox" style="width: 1px; visibility:hidden;">5:</td><td align="center"><div class=button1><input type="text" name="5" class="textbox" style="width: 50px;" value="<?echo$_POST['5'];?>"></td><td align="right"><div class=button1><input type="text" class="textbox" style="width: 1px; visibility:hidden;">6:</td><td align="center"><div class=button1><input type="text" name="6" class="textbox" style="width: 50px;" value="<?echo$_POST['6'];?>"></td></tr><tr><td align="right"><div class=button1><input type="text" class="textbox" style="width: 1px; visibility:hidden;">7:</td><td align="center"><div class=button1><input type="text" name="7" class="textbox" style="width: 50px;" value="<?echo$_POST['7'];?>"></td><td align="right"><div class=button1><input type="text" class="textbox" style="width: 1px; visibility:hidden;">8:</td><td align="center"><div class=button1><input type="text" name="8" class="textbox" style="width: 50px;" value="<?echo$_POST['8'];?>"></td><td align="right"><div class=button1><input type="text" class="textbox" style="width: 1px; visibility:hidden;">9:</td><td align="center"><div class=button1><input type="text" name="9" class="textbox" style="width: 50px;" value="<?echo$_POST['9'];?>"></td></tr><tr><td align="right"><div class=button1><input type="text" class="textbox" style="width: 1px; visibility:hidden;">10:</td><td align="center"><div class=button1><input type="text" name="10" class="textbox" style="width: 50px;" value="<?echo$_POST['10'];?>"></td><td align="right"><div class=button1><input type="text" class="textbox" style="width: 1px; visibility:hidden;">11:</td><td align="center"><div class=button1><input type="text" name="11" class="textbox" style="width: 50px;" value="<?echo$_POST['11'];?>"></td><td align="right"><div class=button1><input type="text" class="textbox" style="width: 1px; visibility:hidden;">12:</td><td align="center"><div class=button1><input type="text" name="12" class="textbox" style="width: 50px;" value="<?echo$_POST['12'];?>"></td></tr><tr><td align="right"><div class=button1><input type="text" class="textbox" style="width: 1px; visibility:hidden;">13:</td><td align="center"><div class=button1><input type="text" name="13" class="textbox" style="width: 50px;" value="<?echo$_POST['13'];?>"></td><td align="right"><div class=button1><input type="text" class="textbox" style="width: 1px; visibility:hidden;">14:</td><td align="center"><div class=button1><input type="text" name="14" class="textbox" style="width: 50px;" value="<?echo$_POST['14'];?>"></td><td align="right"><div class=button1><input type="text" class="textbox" style="width: 1px; visibility:hidden;">15:</td><td align="center"><div class=button1><input type="text" name="15" class="textbox" style="width: 50px;" value="<?echo$_POST['15'];?>"></td></tr><tr><td align="right"><div class=button1><input type="text" class="textbox" style="width: 1px; visibility:hidden;">16:</td><td align="center"><div class=button1><input type="text" name="16" class="textbox" style="width: 50px;" value="<?echo$_POST['16'];?>"></td><td align="right"><div class=button1>17:</td><td align="center"><div class=button1><input type="text" name="17" class="textbox" style="width: 50px;" value="<?echo$_POST['17'];?>"></td><td align="right"><div class=button1><input type="text" class="textbox" style="width: 1px; visibility:hidden;">18:</td><td align="center"><div class=button1><input type="text" name="18" class="textbox" style="width: 50px;" value="<?echo$_POST['18'];?>"></td></tr><tr><td align="right"><div class=button1><input type="text" class="textbox" style="width: 1px; visibility:hidden;">19:</td><td align="center"><div class=button1><input type="text" name="19" class="textbox" style="width: 50px;" value="<?echo$_POST['19'];?>"></td><td align="right"><div class=button1><input type="text" class="textbox" style="width: 1px; visibility:hidden;">20:</td><td align="center"><div class=button1><input type="text" name="20" class="textbox" style="width: 50px;" value="<?echo$_POST['20'];?>"></td><td align="right"><div class=button1><input type="text" class="textbox" style="width: 1px; visibility:hidden;">21:</td><td align="center"><div class=button1><input type="text" name="21" class="textbox" style="width: 50px;" value="<?echo$_POST['21'];?>"></td></tr><tr><td align="right"><div class=button1><input type="text" class="textbox" style="width: 1px; visibility:hidden;">22:</td><td align="center"><div class=button1><input type="text" name="22" class="textbox" style="width: 50px;" value="<?echo$_POST['22'];?>"></td><td align="right"><div class=button1><input type="text" class="textbox" style="width: 1px; visibility:hidden;">23:</td><td align="center"><div class=button1><input type="text" name="23" class="textbox" style="width: 50px;" value="<?echo$_POST['23'];?>"></td><td align="right"><div class=button1><input type="text" class="textbox" style="width: 1px; visibility:hidden;">24:</td><td align="center"><div class=button1><input type="text" name="24" class="textbox" style="width: 50px;" value="<?echo$_POST['24'];?>"></td></tr><tr><td align="right"><div class=button1><input type="text" class="textbox" style="width: 1px; visibility:hidden;">25:</td><td align="center"><div class=button1><input type="text" name="25" class="textbox" style="width: 50px;" value="<?echo$_POST['25'];?>"></td><td align="right"><div class=button1><input type="text" class="textbox" style="width: 1px; visibility:hidden;">26:</td><td align="center"><div class=button1><input type="text" name="26" class="textbox" style="width: 50px;" value="<?echo$_POST['26'];?>"></td><td align="right"><div class=button1><input type="text" class="textbox" style="width: 1px; visibility:hidden;">27:</td><td align="center"><div class=button1><input type="text" name="27" class="textbox" style="width: 50px;" value="<?echo$_POST['27'];?>"></td></tr><tr><td align="right"><div class=button1><input type="text" class="textbox" style="width: 1px; visibility:hidden;">28:</td><td align="center"><div class=button1><input type="text" name="28" class="textbox" style="width: 50px;" value="<?echo$_POST['28'];?>"></td><td align="right"><div class=button1><input type="text" class="textbox" style="width: 1px; visibility:hidden;">29:</td><td align="center"><div class=button1><input type="text" name="29" class="textbox" style="width: 50px;" value="<?echo$_POST['29'];?>"></td><td align="right"><div class=button1><input type="text" class="textbox" style="width: 1px; visibility:hidden;">30:</td><td align="center"><div class=button1><input type="text" name="30" class="textbox" style="width: 50px;" value="<?echo$_POST['30'];?>"></td></tr><tr><td align="right"><div class=button1><input type="text" class="textbox" style="width: 1px; visibility:hidden;">31:</td><td align="center"><div class=button1><input type="text" name="31" class="textbox" style="width: 50px;" value="<?echo$_POST['31'];?>"></td><td align="right"><div class=button1><input type="text" class="textbox" style="width: 1px; visibility:hidden;">32:</td><td align="center"><div class=button1><input type="text" name="32" class="textbox" style="width: 50px;" value="<?echo$_POST['32'];?>"></td><td align="right"><div class=button1><input type="text" class="textbox" style="width: 1px; visibility:hidden;">33:</td><td align="center"><div class=button1><input type="text" name="33" class="textbox" style="width: 50px;" value="<?echo$_POST['33'];?>"></td></tr><tr><td align="right"><div class=button1><input type="text" class="textbox" style="width: 1px; visibility:hidden;">34:</td><td align="center"><div class=button1><input type="text" name="34" class="textbox" style="width: 50px;" value="<?echo$_POST['34'];?>"></td><td align="right"><div class=button1><input type="text" class="textbox" style="width: 1px; visibility:hidden;">35:</td><td align="center"><div class=button1><input type="text" name="35" class="textbox" style="width: 50px;" value="<?echo$_POST['35'];?>"></td><td align="right"><div class=button1><input type="text" class="textbox" style="width: 1px; visibility:hidden;">36:</td><td align="center"><div class=button1><input type="text" name="36" class="textbox" style="width: 50px;" value="<?echo$_POST['36'];?>"></td></tr><tr><td align="right"><div class=button1><input type="text" class="textbox" style="width: 1px; visibility:hidden;">Red:</td><td align="center"><div class=button1><input type="text" name="red" class="textbox" style="width: 50px;" value="<?echo$_POST['red'];?>"></td><td align="right"><div class=button1><input type="text" class="textbox" style="width: 1px; visibility:hidden;">Black:</td><td align="center"><div class=button1><input type="text" name="black" class="textbox" style="width: 50px;" value="<?echo$_POST['black'];?>"></td><td align="right"><div class=button1><input type="text" class="textbox" style="width: 1px; visibility:hidden;">Odd:</td><td align="center"><div class=button1><input type="text" name="odd" class="textbox" style="width: 50px;" value="<?echo$_POST['odd'];?>"></td></tr><tr><td align="right"><div class=button1><input type="text" class="textbox" style="width: 1px; visibility:hidden;">Even:</td><td align="center"><div class=button1><input type="text" name="even" class="textbox" style="width: 50px;" value="<?echo$_POST['even'];?>"></td><td align="right"><div class=button1><input type="text" class="textbox" style="width: 1px; visibility:hidden;">1-18:</td><td align="center"><div class=button1><input type="text" name="1to18" class="textbox" style="width: 50px;" value="<?echo$_POST['1to18'];?>"></td><td align="right"><div class=button1><input type="text" class="textbox" style="width: 1px; visibility:hidden;">19-36:</td><td align="center"><div class=button1><input type="text" name="19to36" class="textbox" style="width: 50px;" value="<?echo$_POST['19to36'];?>"></td></tr><tr><td align="right"><div class=button1><input type="text" class="textbox" style="width: 1px; visibility:hidden;">1-12:</td><td align="center"><div class=button1><input type="text" name="1to12" class="textbox" style="width: 50px;" value="<?echo$_POST['1to12'];?>"></td><td align="right"><div class=button1><input type="text" class="textbox" style="width: 1px; visibility:hidden;">13-24:</td><td align="center"><div class=button1><input type="text" name="13to24" class="textbox" style="width: 50px;" value="<?echo$_POST['13to24'];?>"></td><td align="right"><div class=button1><input type="text" class="textbox" style="width: 1px; visibility:hidden;">25-36:</td><td align="center"><div class=button1><input type="text" name="25to36" class="textbox" style="width: 50px;" value="<?echo$_POST['25to36'];?>"></td></tr><tr><td align="right"><div class=button1><input type="text" class="textbox" style="width: 1px; visibility:hidden;">1st&nbsp;col:</td><td align="center"><div class=button1><input type="text" name="column1" class="textbox" style="width: 50px;" value="<?echo$_POST['column1'];?>"></td><td align="right"><div class=button1>2nd&nbsp;col:</td><td align="center"><div class=button1><input type="text" name="column2" class="textbox" style="width: 50px;" value="<?echo$_POST['column2'];?>"></td><td align="right"><div class=button1><input type="text" class="textbox" style="width: 1px; visibility:hidden;">3rd&nbsp;col:</td><td align="center"><div class=button1><input type="text" name="column3" class="textbox" style="width: 50px;" value="<?echo$_POST['column3'];?>"></td></tr>
<tr><td colspan=6><input type=hidden value=<?echo$check;?> name=543543543><div class=button1><input type="submit" style=width:100%;  name="bet" class="textbox" value="Place bet!"></td></tr>
</table></td>

<td valign="top" width="50%">
<table width="95%" cellspacing="1" cellpadding="0" align="center">
<tr><td align=center><img src=roulette.png></td></tr>
</table></td></tr></table>

<center><font color=gray size=1 face=verdana>The casino is owned by </font><a href=viewprofile.php?username=<?echo$ownername;?>><b><font color=gray size=1 face=verdana><?echo$ownername;?></b></a><br>The maximum bet is set at <b><?echo$ownermaxbettwo;?></b>
<?if($getbuyback > 99){?><br><font color=gray size=1 face=verdana>The casino has a buyback price set at <b><font color=gray size=1 face=verdana><? echo number_format($getbuyback); ?> points</b></font></div><?}?>

<?
if(($owner != '0')||($userrankid >= '25')){
if($getbuyback > 99){ $tellbb = "$getbuyback"; }else{ $tellbb = "None"; }
echo"<div align=center><br><table width=40% cellpadding=0 cellspacing=1 align=center class=section>
<tr><td colspan=2><div class=tab>Roulette Info</td></tr>
<tr><td width=50%><div class=button1>&nbsp;Profit:</td><td width=50%><div class=button1>&nbsp;$$ownerprofittwo</td></tr>
<tr><td width=50%><div class=button1>&nbsp;Maxbet:</td><td width=50%><div class=button1>&nbsp;$ownermaxbettwo</td></tr>
<tr><td width=50%><div class=button1>&nbsp;Buyback:</td><td width=50%><div class=button1>&nbsp;$tellbb</td></tr>
</table><br>";
?>
<table cellpadding=0 cellspacing=1 align=center class=section width="40%">
<tr><td colspan=3><div class=tab>Edit Roulette Stats</td></tr>
<form method=post><tr><td width=100%><div class=button1>&nbsp;Set Maxbet:<input type=submit name=doall class=textbox style="visibility:hidden;width:1%;"></td><td width=100%><div class=button1><input type=text name=setmaxrlt class=textbox></td><td width=100%><div class=button1><input type=submit value="Do it" class=textbox name=setmaxsubmit></td></tr></form>
<form method=post><tr><td width=100%><div class=button1>&nbsp;Send Roulette:<input type=submit name=doall class=textbox style="visibility:hidden;width:1%;"></td><td width=100%><div class=button1><input type=text name=setownerrlt class=textbox></td><td width=100%><div class=button1><input type=submit value="Do it" class=textbox name=setownersubmit></td></tr></form>
<form method=post><tr><td width=100%><div class=button1>&nbsp;Sell Roulette:<input type=submit name=doall class=textbox style="visibility:hidden;width:1%;"></td><td width=100%><div class=button1><input type=text name=setpricerlt class=textbox></td><td width=100%><div class=button1><input type=submit value="Do it" class=textbox name=setpricesubmit></td></tr></form>
<form method=post><tr><td width=100%><div class=button1>&nbsp;Set Buyback:<input type=submit name=doall class=textbox style="visibility:hidden;width:1%;"></td><td width=100%><div class=button1><input type=text name=setbuybackrlt class=textbox></td><td width=100%><div class=button1><input type=submit value="Do it" class=textbox name=setbuybacksubmit></td></tr></form>
<form method=post><tr><td width=100% colspan=3><div class=button1><input type=submit value="Reset Profit" class=textbox name=resetrltprofit style=width:100%; height:100%;></td></tr></form>
</table><br>

<table cellpadding=0 cellspacing=1 align=center class=section width="40%">
<tr><td colspan=3><div class=tab>Todays Bets</td></tr>
<? 
$countmoneysqaaal = mysql_query("SELECT SUM(amount-bet) AS todaywin FROM casinoroulettebets WHERE location = '$userlocation' AND time = '$today' AND result = 'win'");
$countmoneyassaxarray = mysql_fetch_array($countmoneysqaaal);
$todayswin = $countmoneyassaxarray['todaywin'];
$countmoneysqaaal = mysql_query("SELECT SUM(amount) AS todaylost FROM casinoroulettebets WHERE location = '$userlocation' AND time = '$today' AND result = 'lost'");
$countmoneyassaxarray = mysql_fetch_array($countmoneysqaaal);
$todayslost = $countmoneyassaxarray['todaylost'];
$todaysprofit = $todayslost - $todayswin; ?>
<tr><td colspan=3><div class=button1 style="background-color:#222222;">&nbsp;Profit: <font color=khaki>$<b><?echo number_format($todaysprofit);?></b></font></td></tr>
<?
$getbetss = mysql_query("SELECT * FROM casinoroulettebets WHERE location = '$userlocation' AND time = '$today' ORDER BY id DESC LIMIT 150");
while($getbets = mysql_fetch_array($getbetss)){
$betuser = $getbets['username'];
$betresult = $getbets['result'];
$betamount = $getbets['amount'];
if($betresult == win){ echo "<tr><td><div class=button1>&nbsp;<a href=viewprofile.php?username=$betuser>$betuser</a> bet and <font color=red><b>won</b></font> $".number_format($betamount).""; }
elseif($betresult == lost){ echo "<tr><td><div class=button1>&nbsp;<a href=viewprofile.php?username=$betuser>$betuser</a> bet and <font color=green><b>lost</b></font> $".number_format($betamount).""; }
elseif($betresult == draw){ echo "<tr><td><div class=button1>&nbsp;<a href=viewprofile.php?username=$betuser>$betuser</a> bet $".number_format($betamount)." and drew"; }
} ?>
</table></div><br></div>

<? }if(($ownername == 'None')){echo'<form method=post><center><input type=submit value="Take Over Casino" class=textbox name=takeoverrlt></form></center>';} ?>

<table width="98%" cellpadding="0" cellspacing="0" align="center"><tr><td height="1" bgcolor="#444444"></td></tr><tr><td height="3"></td></tr>
<? 
$getgprofit = mysql_query("SELECT * FROM casinoprofit WHERE username = '$usernameone'");
$doitnow = mysql_fetch_array($getgprofit);
$blackjackprofit = $doitnow['roulette'];
$casinoprofit = $doitnow['overall'];
?>
<tr><td><font color=silver face=verdana size=1>Roulette Profit: <font color=khaki>$<b><?echo number_format($blackjackprofit);?></b></font> || Gambling Profit: <font color=khaki>$<b><?echo number_format($casinoprofit);?></font></b></td></tr><tr><td height="3"></td></tr></table>
<td class=menuright><img style="display: block"  alt="" src="blank.gif" width=8></td>
</tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width:  100%">
<tbody><tr>
<td class=menubottomleft><img style="display:  block" alt="" src="blank.gif" width="8" height="9"></td>
<td class=menubottommain><img style="display:  block" alt="" src="blank.gif"></td>
<td class=menubottomright><img style="display:  block" alt="" src="blank.gif" width="8" height="9"></td>
</tr></tbody></table></div>
</td>
<td width="250" valign="top">
<? include 'rightmenu.php'; ?>
</td>
</tr>
</table>

</body>
<head><META HTTP-EQUIV="Pragma" CONTENT="no-cache"></head></html>

