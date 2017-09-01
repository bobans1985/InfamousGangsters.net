<? include 'included.php'; session_start();

$tyn = rand(0,5);
if($tyn == '3'){
$deletetopicssql = mysql_query("SELECT id FROM forumposts WHERE type = 'hospital' ORDER BY id DESC LIMIT 16,50");
while($deletetopics = mysql_fetch_array($deletetopicssql))
{$dtopicid = $deletetopics['id'];
$deleted = mysql_query("DELETE FROM forumposts WHERE id = '$dtopicid'");}}

$saturate = "/[^a-z0-9]/i";
$allowed = "/[^0-9]/i";
$poster = $_GET['deletepost'];
$deletepost = preg_replace($allowed,"",$poster);
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$userip = $_SERVER[REMOTE_ADDR]; 
$gangsterusername = $usernameone;
?>

<html>
<head>
<title>:: State Gangsters</title><link rel="stylesheet" href="layout/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<link rel="shortcut icon" href="/layout/icon.png" type="image/x-icon" />
</head>
<body background="/layout/wallpaper.png">
<script type="text/javascript">
function emotion(em) { document.smiley.newpost.value=document.smiley.newpost.value+em;}
</script>
<table width="100%" height="335" align="center" cellpadding="0" cellspacing="3">
<tr>
<td width="250" valign="top">
<?
mysql_query("DELETE FROM hospital WHERE hours <= '0'");
include 'leftmenu.php'; ?>
</td>
<td width="100%" valign="top">

<?

$hchecks = mysql_query("SELECT * FROM hospital WHERE username = '$usernameone'");
$hcheck = mysql_num_rows($hchecks);
if($hcheck != '0'){
$hinfo = mysql_fetch_array($hchecks);
$tomah = time();
$htime = $hinfo['end'];

$hosp = mysql_query("SELECT username,time,hours FROM hospital WHERE username = '$usernameone'");
while($hospital = mysql_fetch_array($hosp)){
$tem = time();
$hname = $hospital['username'];
$hospitaltime = $hospital['time'];
$hosphours = $hospital['hours'];
$normalbanktimetotall = time() - $hospitaltime;

$healthcheck = mysql_fetch_array(mysql_query("SELECT health,ID FROM users WHERE username = '$hname'"));
$healthc = floor($healthcheck['health']);
$healthid = $healthcheck['ID'];
}}
?>

<?php 
$time = time();
$hospital = $_POST['time'];
$hospitaltime = preg_replace($allowed,"",$hospital);
$hospitaltimes = $hospitaltime * 3600;
$hospitaltimess = $time + $hospitaltimes;

$getuserinfoarray = $statustesttwo;
$getname = $getuserinfoarray['username'];
$userlocation = $getuserinfoarray['location'];
$health = ceil($getuserinfoarray['health']);
$rankid = $getuserinfoarray['rankid'];
$userrankid = $getuserinfoarray['rankid'];
$usermoney = $getuserinfoarray['money'];
$newlocation = $_GET['location'];
if($newlocation == 1){ $newlocation = "Las Vegas"; }
elseif($newlocation == 2){ $newlocation = "Los Angeles"; }
elseif($newlocation == 3){ $newlocation = "New York"; }
$makenewmaybe = mysql_num_rows(mysql_query("SELECT owner FROM casinos WHERE owner = '$usernameone' AND casino = 'Hospital' AND location = '$newlocation'"));
if($makenewmaybe > 0){ $userlocation = "$newlocation"; }

$ownersql = mysql_query("SELECT * FROM casinos WHERE casino = 'Hospital' AND owner = '$usernameone' AND location = '$userlocation'");
$owner = mysql_num_rows($ownersql);
$ownerinfosql = mysql_query("SELECT * FROM casinos WHERE casino = 'Hospital' AND location = '$userlocation'");
$ownerinfoarray = mysql_fetch_array($ownerinfosql);
$ownername = $ownerinfoarray['owner'];
$ownermaxbet = $ownerinfoarray['maxbet'];
$ownerprofit = $ownerinfoarray['profit'];
$ownerprofittwo = number_format($ownerinfoarray['profit']);
$ownermaxbettwo = number_format($ownerinfoarray['maxbet']);
$ownerstatssql = mysql_query("SELECT * FROM users WHERE username = '$ownername'");
$ownerstatsarray = mysql_fetch_array($ownerstatssql);
$ownermoney = $ownerstatsarray['money'];

$saturated = "/[^0-9]/i";
$setownerrawraw = mysql_real_escape_string($_POST['setownerbuy']);
$priceraw = mysql_real_escape_string($_POST['setpricebuy']);
$vera = mysql_real_escape_string($_POST['ver']);

$ver = preg_replace($saturate,"",$vera);
$amount = preg_replace($saturated,"",$amounta);
$setownerraw = preg_replace($saturate,"",$setownerrawraw);
$price = preg_replace($saturated,"",$priceraw);
$give = preg_replace($saturated,"",$givea);
$setmaxtwo = number_format($setmax);

if(($ownername == 'None')){
if(isset($_POST['takeoverbuy'])){
if($usermoney < '10000000'){$showoutcome++; $outcome = "You don't have enough money! Taking over a hospital costs $<b>10,000,000</b>!</font>";}
else{$showoutcome++; $outcome = "You now own the Hospital!";
mysql_query("UPDATE users SET money = money - '10000000' WHERE username = '$usernameone'");
mysql_query("UPDATE casinos SET owner = '$usernameone' WHERE location = '$userlocation' AND casino = 'Hospital'");
mysql_query("UPDATE casinos SET nickname = '$usernameone' WHERE location = '$userlocation' AND casino = 'Hospital'");
mysql_query("DELETE FROM buycasinos WHERE city = '$userlocation' AND type = 'Hospital'");}}}

$ownerinfosql = mysql_query("SELECT * FROM casinos WHERE casino = 'Hospital' AND location = '$userlocation'");
$ownerinfoarray = mysql_fetch_array($ownerinfosql);
$ownername = $ownerinfoarray['owner'];
$ownerprofit = $ownerinfoarray['profit'];

if(($owner != '0')||($userrankid == '100')){
if(isset($_POST['resetbuyprofit'])) {
$showoutcome++; $outcome = "Profit reset!</font>";
mysql_query("UPDATE casinos SET profit = '0' WHERE casino= 'Hospital' AND location = '$userlocation'");}}

if(($owner != '0')||($userrankid == '100')){
if(isset($_POST['setpricebuy'])) {
mysql_query("DELETE FROM buycasinos WHERE type = 'Hospital' AND city = '$userlocation'");
$buytime = time()+86400;
mysql_query("INSERT INTO buycasinos(username,time,city,price,type)
VALUES ('$ownername','$buytime','$userlocation','$price','Hospital')");
$showoutcome++; $outcome = "The casino has been added to quicktrade!</font>";
}}

if($rankid == '100'){
if(isset($_GET['deletepost'])) { 
mysql_query("DELETE FROM forumposts WHERE type = 'hospital' AND id = '$deletepost'");
}}

if(isset($_POST['deleteall'])) { 
if($rankid < '50'){}
else{mysql_query("DELETE FROM forumposts WHERE type = 'hospital'");
$showoutcome++; $outcome = "Posts deleted!</font>";}}

$mutedusernamesql = mysql_query("SELECT * FROM muted WHERE username = '$gangsterusername'")or die(mysql_error());
$mutedusernamerows = mysql_num_rows($mutedusernamesql);
$mutedusernamearray = mysql_fetch_array($mutedusernamesql);
$mutedusernameone = $mutedusernamearray['username'];
$mutedipone = $mutedusernamearray['ip'];

$mutedipsql = mysql_query("SELECT * FROM muted WHERE ip = '$userip'")or die(mysql_error());
$mutediprows  = mysql_num_rows($mutedipsql);
$mutediparray = mysql_fetch_array($mutedipsql);
$mutedusernametwo = $mutediparray['username'];
$mutediptwo = $mutediparray['ip'];

$newpostraw = $_POST['newpost'];
$newpost = htmlentities($newpostraw, ENT_QUOTES);
if(isset($_POST['dopost'])) { 
if(!$newpost){}
elseif($mutedusernamerows > '0'){die("<font color=white face=verdana size=1>Username: <b>$mutedusernameone</b> and IP: <b>$mutedipone</b> have been muted! Contact a member of <b>State Gangsters</b> to be unmuted!");}
elseif($mutediprows > '0'){die("<font color=white face=verdana size=1>Username: <b>$mutedusernametwo</b> and IP: <b>$mutediptwo</b> have been muted! Contact a member of <b>State Gangsters</b> to be unmuted!");}
else{
mysql_query("INSERT INTO forumposts(username,topicid,ip,type,post,rankid)
VALUES ('$gangsterusername',' ','$userip','hospital','$newpost','$myrank')");
mysql_query("UPDATE users SET posts = (posts + 1) WHERE username = '$gangsterusername'");}}

if(isset($_POST['time'])){ 
$totalcharge = $ownermaxbet * $hospitaltime;
if(!$hospitaltime){}
elseif($hcheck > '0'){$showoutcome++; $outcome = "You are already in the hospital!</font>";}
elseif($hospitaltime > '10'){$showoutcome++; $outcome = "You can only check in the hospital for a maximum of 10 hours!</font>";}
elseif($health >= '100'){$showoutcome++; $outcome = "Your health is already at 100%!</font>";}
elseif($usermoney < $totalcharge){$showoutcome++; $outcome = "You can not afford this length of time!</font>";}
elseif($hospitaltime == '0'){}
else{
$tem = time();
mysql_query("UPDATE casinos SET profit = (profit + '$totalcharge') WHERE casino = 'Hospital' AND location = '$userlocation'");
mysql_query("UPDATE users SET money = (money + '$totalcharge') WHERE username = '$ownername'");
mysql_query("UPDATE users SET money = (money - '$totalcharge') WHERE ID = '$ida'");
mysql_query("INSERT INTO hospital(username,amount,hours,time) VALUES('$gangsterusername','0','$hospitaltime','$tem')");
$showoutcome++; $outcome = "You checked into the hospital for <b>$hospitaltime</b> hours!";}
}
elseif(isset($_POST['leave'])) { 
if($hcheck == '0'){$showoutcome++; $outcome = "You are not in hospital!";}
else{
mysql_query("DELETE FROM hospital WHERE username = '$gangsterusername'");
$showoutcome++; $outcome = "You left the hospital!</font>";}}

if(($owner != '0')||($userrankid == '100')){
$setownerinfosql = mysql_query("SELECT * FROM users WHERE username = '$setownerraw'");
$setownerinfoarray = mysql_fetch_array($setownerinfosql);
$setownerinforows = mysql_num_rows($setownerinfosql);
$setowner = $setownerinfoarray['username'];
$setownerstatus = $setownerinfoarray['status'];
$ssskkk = $setownerinfoarray['rankid'];
$ssskkkid = $setownerinfoarray['ID'];

if(isset($_POST['setownerbuy'])) {
if(!$setowner){die ('');}

$anum_true=mysql_num_rows(mysql_query("SELECT * FROM users WHERE username='$setownerraw' AND blockcasinos='1'"));
if ($anum_true == "1"){
die("<font size=2 face=verdana color=silver>$setownerraw doesnt allow Hospitals to be sent to him/her.</font>");}

if($setowner == $ownername){$showoutcome++; $outcome = "You already own this hospital!</font>";}
elseif($setownerinforows == '0'){$showoutcome++; $outcome = "No such user!</font>";}
elseif(($ssskkk > '25')&&($userrankid != '100')){$showoutcome++; $outcome = "You cannot send this hospital to a staff member!</font>";}
elseif($setownerstatus == 'Dead'){$showoutcome++; $outcome = "You cannot send this hospital to dead player!</font>";}
else{

$cunt = mysql_num_rows(mysql_query("SELECT * FROM casinos WHERE owner = '$setowner'"));
$cunts = mysql_num_rows(mysql_query("SELECT * FROM casinos WHERE owner = '$setowner' AND casino = 'Hospital'"));
if($cunt > '3' AND $setowner != 'None'){die('<font color=white face=verdana size=1>That user already has 2 properties!</font>');}
if($cunts > '0' AND $setowner != 'None'){die('<font color=white face=verdana size=1>That user already has a Hospital!</font>');}

$penpoint = mysql_num_rows(mysql_query("SELECT * FROM ipadresses WHERE ip = '$userip' AND username = '$setowner'"));
if(($penpoint > '0')&&($setowner != $username)){ mysql_query("UPDATE users SET penpoints = penpoints + 1 WHERE username = '$username'");
$reason = "$username sent $userlocation hospital to $setowner";
mysql_query("INSERT INTO penpoints(username,reason) VALUES('$username','$reason')");}

mysql_query("UPDATE casinos SET owner = '$setowner' WHERE casino= 'Hospital' AND location = '$userlocation'");
mysql_query("UPDATE casinos SET nickname = '$setownerraw' WHERE casino= 'Hospital' AND location = '$userlocation'");
$showoutcome++; $outcome = "You gave the hospital to <a href=viewprofile.php?username=$setowner><b>$setownerraw</b>!</a>";
mysql_query("DELETE FROM buycasinos WHERE city = '$userlocation' AND type = 'Hospital'");

mysql_query("UPDATE users SET notify = '1', notification = 'a_open$usernameone a_closed$usernameone a_slashsent you $userlocation Hospital.' WHERE username = '$ssskkkid'");}}}

function banktime($until){
$difference = $until; $days = floor($difference/86400);
$difference = $difference - ($days*86400); $hours = floor($difference/3600);
$difference = $difference - ($hours*3600); $minutes = floor($difference/60);
$difference = $difference - ($minutes*60); $seconds = $difference;
if($days >= 1){ $output = "".sprintf( "%02u", $days )." days ".sprintf( "%02u", $hours )." hours ".sprintf( "%02u", $minutes )." minutes"; return $output; }
elseif($hours < 1 AND $minutes < 1){ $output = "".sprintf( "%02u", $seconds )." seconds"; return $output; }
elseif($hours < 1){ $output = "".sprintf( "%02u", $minutes )." minutes ".sprintf( "%02u", $seconds )." seconds"; return $output; }
else{ $output = "".sprintf( "%02u", $hours )." hours ".sprintf( "%02u", $minutes )." minutes ".sprintf( "%02u", $seconds )." seconds"; return $output; }}

$hchecks = mysql_query("SELECT * FROM hospital WHERE username = '$usernameone'");
$hcheck = mysql_num_rows($hchecks);
if($hcheck != '0'){
$hinfo = mysql_fetch_array($hchecks);
$hname = $hinfo['username'];
$hospitaltime = $hinfo['time'];
$hosphours = $hinfo['hours'];
$normalbanktimetotall = time() - $hospitaltime;
}
?>
<table align="center" cellpadding="0" width=100% cellspacing="0">
<tbody><tr>
<td class=menutopleft><img style="display: block" height=22 width=8 alt="" src="blank.gif"></td>
<td class=menutopbar height=22 style="white-space: nowrap"><font color="#222222"><b>Hospital</b></font></td>
<td class=menutopend><IMG style="display: block" height=20 alt="" src="blank.gif" width=28></td>
<td class=menutopmain><IMG style="display: block" height=22 width=30px alt="" src="blank.gif"></td>
<td class=menutopright><IMG style="display: block" height=22 alt="" src="blank.gif" width=8></td></tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width: 100%">
<tbody><tr>
<td class=menuleft><img style="display: block" alt="" src="blank.gif" width=8></td>
<td background="/layout/crossbg.png"><br>
<? if($showoutcome>=1){ ?>
<table width=70% align=center cellpadding=0 cellspacing=1 class=section>
<tr><td><div class=button1 style="background-color:#171717;">&nbsp;<?echo$outcome;?></td></tr>
</table><br>
<? } ?>
<center><form action="" method="post">
<? if(($owner != '0')||($rankid == '100')){echo"<div align=center><table width=40% cellpadding=0 cellspacing=1 align=center class=section>
<tr><td colspan=2><div class=tab>Hospital Info</td></tr>
<tr><td width=50%><div class=button1>&nbsp;Profit:</td><td width=50%><div class=button1>&nbsp;$$ownerprofittwo</font></td></tr>
<tr><td width=50%><div class=button1>&nbsp;Price Per Hour:</td><td width=50%><div class=button1>&nbsp;$$ownermaxbettwo</font></td></tr>
</table>"; ?>

<br><table cellpadding=0 cellspacing=1 align=center class=section width="40%">
<tr><td colspan=3><div class=tab>Edit Hospital Stats</td></tr>
<form method=post><tr><td width=100%><div class=button1>&nbsp;Send Hospital:</b><input type=submit name=doall class=textbox style="visibility:hidden;width:1%;"></td><td width=100%><div class=button1><input type=text name=setownerbuy class=textbox></td><td width=100%><div class=button1><input type=submit value="Do it" class=textbox name=setownersubmit></td></tr></form>
<form method=post><tr><td width=100%><div class=button1>&nbsp;Sell Hospital:</b><input type=submit name=doall class=textbox style="visibility:hidden;width:1%;"></td><td width=100%><div class=button1><input type=text name=setpricebuy class=textbox></td><td width=100%><div class=button1><input type=submit value="Do it" class=textbox name=setpricesubmit></td></tr></form>
<form method=post><tr><td width=100% colspan=3><div class=button1><input type=submit value="Reset Profit" class=textbox name=resetbuyprofit style=width:100%; height:100%;></td></tr></form>

</table><br></div><?php }?>
<center><font color=gray size=1 face=verdana>The hospital is owned by </font><a href=viewprofile.php?username=<?echo$ownername;?>><font color=gray size=1 face=verdana><b><?echo$ownername;?></b></a><br>
You will be charged $<b><?echo$ownermaxbettwo;?></b> per hour</center><br>

<? if(($ownername == 'None')){echo'<div align=center><form method=post><input type=submit value="Take Over Hospital" class=textbox name=takeoverbuy></form><br>';} ?>

<table width=40% align=center cellpadding=0 cellspacing=1 id=crimesTable class=section><form method=post>
<tr><td colspan=3><div class=tab>Hospital</td></tr>
<tr>
<?if($hcheck > '0'){?><td width=98%><div class=button1>&nbsp;Hours entered: <?echo$hosphours;?><input type=submit name=doall class=textbox value="Commit" style="visibility:hidden;"></td>
<?}else{?><td width=98%><div class=button1>&nbsp;Hours:<input type=submit name=doall class=textbox value="Commit" style="visibility:hidden;"></td>
<td width=1%><div class=button1><input maxlength="2" type"text" name="time" class="textbox"></td><?}?>
<?if($hcheck < 1){?><td width=1%><div class=button1><input type=submit class=textbox value="Enter"></td><?}else{?>
<td width=1%><div class=button1><input type=submit name=leave class=textbox value="Leave"></td><?}?>
<?if($hcheck > '0'){?><tr><td width=100% colspan=2><div class=button1>&nbsp;Time spent: <?echo banktime($normalbanktimetotall);?><input type=submit name=doall class=textbox value="Commit" style="visibility:hidden;"></td></tr><?}?>
</tr>
</table></form><br>

<td class=menuright><img style="display: block" alt="" src="blank.gif" width=8></td>
</tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width: 100%">
<tbody><tr>
<td class=menubottomleft><img style="display: block" alt="" src="blank.gif" width="8" height="9"></td>
<td class=menubottommain><img style="display: block" alt="" src="blank.gif"></td>
<td class=menubottomright><img style="display: block" alt="" src="blank.gif" width="8" height="9"></td>
</tr></tbody></table></div>

<td width="250" valign="top">

<?
$statustest = mysql_query("SELECT * FROM users WHERE username = '$usernameone'")or die(mysql_error());
$statustesttwo = mysql_fetch_array($statustest);?>
<? include 'rightmenu.php'; ?>
</td>
</tr>
</table>
</body></html>