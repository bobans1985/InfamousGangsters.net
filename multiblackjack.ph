<? include 'included.php'; session_start();?>
<?

$saturate = "/[^a-z0-9]/i";
$saturated = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$time = time();
$poster = $_GET['deletepost'];
$betraw = mysql_real_escape_string($_POST['bet']);
$joinraw = mysql_real_escape_string($_POST['join']);
$autoraw = mysql_real_escape_string($_POST['auto']);
$sessionid = preg_replace($saturate,"",$sessionidraw);
$join = preg_replace($saturated,"",$joinraw);
$bet = preg_replace($saturated,"",$betraw);
$auto = preg_replace($saturated,"",$autoraw);
$playerip = $_SERVER['REMOTE_ADDR'];
$username = $usernameone;
$userarray = $statustesttwo;
$userlocation = $userarray['location'];
$userrankid = $myrank;
$usermoney = $userarray['money'];
$penpoints = $userarray['penpoints'];
$deletepost = preg_replace($saturated,"",$poster);

$checkindb = mysql_num_rows(mysql_query("SELECT * FROM mbjprofit WHERE username = '$usernameone'"));
if($checkindb < 1){ mysql_query("INSERT INTO `mbjprofit` (username,id) VALUES ('$usernameone','')"); }
?>

<html>
<head>
<title>:: State Gangsters</title><link rel="stylesheet" href="layout/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<link rel="shortcut icon" href="/layout/icon.png" type="image/x-icon" />
<script type="text/javascript">
function emotion(em) { document.smiley.newpost.value=document.smiley.newpost.value+em;}
</script>
</head>
<body background="/layout/wallpaper.png" onload="document.teehee.bet.select();">
<table width="100%" height="335" align="center" cellpadding="0" cellspacing="3">
<tr>
<td width="250" valign="top">
<?php

if($bar == '/leftmenu.php'){die('<font color=black face=verdana size=1>Go away.</font>');}
$gimtime = time();

$usernameone = $usernameone;
$user = $statustesttwo['username'];
$rankid = $statustesttwo['rankid'];
$crewid = $statustesttwo['crewid'];
$notice = $statustesttwo['notice'];
$live = $statustesttwo['live'];
$hdo = $statustesttwo['hdo'];
$rr = $statustesttwo['rr'];
$silencer = $statustesttwo['silencer'];
$mails = $statustesttwo['mail'];
?>
<head><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<?
$dofirstone = mysql_query("SELECT * FROM blackjackmulti WHERE username = '$usernameone'");
$nomore = mysql_fetch_array($dofirstone);
$endgamee = $nomore['endgame'];
if($endgame != '0'){ 
$mdgtest = mysql_query("SELECT * FROM blackjackmulti WHERE username = '$usernameone' AND endgame < '$gimtime'");
$mdgtest = mysql_num_rows($mdgtest);
}
?>
<? include 'leftmenu.php'; ?>
</td>
<td width="100%" valign="top">
<?

$deletethefinishedones = mysql_query("SELECT * FROM blackjackmulti");
while($doresults = mysql_fetch_array($deletethefinishedones)){
$gameidgame = $doresults['id'];
$gameendgame = $doresults['endgame'];
if($gimtime > $gameendgame AND $gameendgame != '0'){ mysql_query("DELETE FROM blackjackmulti WHERE id = '$gameidgame'");
mysql_query("DELETE FROM blackjackmulticards WHERE gameid = '$gameidgame'");
mysql_query("DELETE FROM blackjackmultijoin WHERE gameid = '$gameidgame'");
}}

if(isset($_POST['bet'])) {
if($mdgtest >= '1'){}
elseif($bet > $usermoney){}
elseif($auto < '2' || $auto > '4'){} 
elseif($bet < '1000000'){}
elseif($bet > '5000000'){}
elseif(!$bet){}
else{

mysql_query("UPDATE users SET money = money - $bet WHERE ID = '$ida' AND money >= '$bet'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 1.</font>');}

mysql_query("UPDATE mbjprofit SET games = games + 1, winnings = winnings - $bet WHERE username = '$usernameone'");
mysql_query("UPDATE users SET winnings = winnings - $bet WHERE username = '$usernameone'");
mysql_query("INSERT INTO blackjackmulti(username,amount,players)
VALUES ('$usernameone','$bet','$auto')");
$getgameid = mysql_fetch_array(mysql_query("SELECT * FROM blackjackmulti WHERE username = '$usernameone' ORDER BY id DESC"));
$gameid = $getgameid['id'];
mysql_query("INSERT INTO blackjackmultijoin(username,gameid,player) VALUES ('$usernameone','$gameid','1')");}}

if($_GET['game']){
$join = $_GET['game'];
$jointest = mysql_num_rows(mysql_query("SELECT * FROM blackjackmulti WHERE id = '$join'"));
$joinoktest = mysql_num_rows(mysql_query("SELECT * FROM blackjackmultijoin WHERE gameid = '$join' AND username = '$usernameone'"));
$playersalready = mysql_num_rows(mysql_query("SELECT * FROM blackjackmultijoin WHERE gameid = '$join'"));
$joininfo = mysql_fetch_array(mysql_query("SELECT * FROM blackjackmulti WHERE id = '$join'"));
$joinbet = $joininfo['amount'];
$joinname = $joininfo['username'];
$playeramount = $joininfo['players'];
if($jointest == '0'){}
elseif($joinoktest > '0'){}
elseif($playersalready >= $playeramount){}
elseif($joinbet > $usermoney){}
elseif($joinname == $usernameone){}
else{
mysql_query("UPDATE users SET money = money - $joinbet WHERE ID = '$ida' AND money >= '$joinbet'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 2.</font>');}
mysql_query("UPDATE mbjprofit SET games = games + 1, winnings = winnings - $joinbet WHERE username = '$usernameone'");
mysql_query("UPDATE users SET winnings = winnings - $joinbet WHERE username = '$usernameone'");
$playerplayer = mysql_num_rows(mysql_query("SELECT * FROM blackjackmultijoin WHERE gameid = '$join'"));
$playernew = $playerplayer + 1;
mysql_query("INSERT INTO blackjackmultijoin(username,gameid,player) VALUES ('$usernameone','$join','$playernew')");
if($playernew == $playeramount){ 
mysql_query("UPDATE blackjackmulti SET time = ($time + 120) WHERE id = '$join'"); 
mysql_query("UPDATE blackjackmulti SET endgame = ($time + 720) WHERE id = '$join'"); 

$dofirstcards = mysql_query("SELECT * FROM blackjackmultijoin WHERE gameid = '$join' ORDER BY player");
while($docards = mysql_fetch_array($dofirstcards)){
$cardsusername = $docards['username'];
$playerorder = $docards['player'];
$type = array("h", "d", "c", "s");
$xone = mt_rand(0,3);
$xtwo = mt_rand(0,3);

$numone = mt_rand(1,13);
$numtwo = mt_rand(1,13);
$cardone = $numone.''.$type[$xone];
$cardtwo = $numtwo.''.$type[$xtwo];

if($cardsusername != $usernameone){ mysql_query("UPDATE users SET notify = '1', notification = 'A multi blackjack game has started! <a href=multiblackjackgame.php?game=$join>Click here to play</a>.' WHERE username = '$cardsusername'"); }

mysql_query("INSERT INTO blackjackmulticards(username,card,gameid,player) VALUES ('$cardsusername','$cardone','$join','$playerorder')");
mysql_query("INSERT INTO blackjackmulticards(username,card,gameid,player) VALUES ('$cardsusername','$cardtwo','$join','$playerorder')");
}}
}}

if($mdgtest < '1'){?>
<table width=100%><form method="post"><tr>
<input type="submit" value="Bet:" class="textbox">
<input type="text" autocomplete=off value="$" id="bet" name=bet class=textbox>
<select name="auto" class="textbox">
<option value="2">2 players</option>
</select>
<input type="submit" name=dobet value="Create" class="textbox">
</tr></form></table>
<?}?>
<style> 
#left { float: left; }
#right { float: right; }
</style>
<table align="center" cellpadding="0" width=100% cellspacing="0">
<tbody><tr>
<td class=menutopleft><img style="display: block" height=22 width=8 alt="" src="blank.gif"></td>
<td class=menutopbar height=22 style="white-space: nowrap"><font color="#222222"><b>Multi Blackjack</b></font></td>
<td class=menutopend><IMG style="display: block" height=20 alt="" src="blank.gif" width=28></td>
<td class=menutopmain><IMG style="display: block" height=22 width=30px alt="" src="blank.gif" ></td>
<td class=menutopright><IMG style="display: block" height=22 alt="" src="blank.gif" width=8></td></tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width: 100%"><tbody><tr>
<td class=menuleft><img style="display: block" alt="" src="blank.gif" width=8></td>
<td background="/layout/crossbg.png">
<table align="center" width="85%" cellpadding="0" cellspacing="1" class="section"><table width=100% cellpadding=0 cellspacing=1>
<form method="post"><tr><td width=100% bgcolor=444444 colspan=2 align=center>
<? $mdgs = mysql_query("SELECT * FROM blackjackmulti ORDER BY id DESC"); 
$howmany = mysql_num_rows($mdgs); ?>
<style> 
#left { float: left; }
#right { float: right; }
</style>
<form action="" method="post">
<? 
if($howmany < 1){ echo"<tr><td width=100%><div class=button1>&nbsp;There are currently no games to join!</td></tr>"; }
while($getgame = mysql_fetch_array($mdgs)){

$start = 0;

$id = $getgame['id'];
$creator = $getgame['username'];
$gamebet = $getgame['amount'];
$gamefinished = $getgame['finished'];
$ar = $getgame['players'];
$gamebeta = number_format($gamebet);
$getjoin = mysql_query("SELECT * FROM blackjackmultijoin WHERE gameid = $id ORDER BY id ASC");
$userjoined = mysql_num_rows(mysql_query("SELECT * FROM blackjackmultijoin WHERE gameid = '$id' AND username = '$usernameone'"));

if($userjoined > 0){ $gamedec = "<a href='multiblackjackgame.php?game=$id'><font color=white><b>Enter Game</a>"; }else{ $gamedec = "<a href='multiblackjack.php?game=$id'><font color=white><b>Join Game</a>"; }
if($userjoined > 0){ $cula = '#222222'; }else{ $cula = '#282828'; }
echo"<tr><td width=100%><div class=button1 style=background-color:$cula;>&nbsp;"; echo "<a href=multidice.php?game=$id>$rollit</a>"; echo" <font color=khaki>Bet: $<b>$gamebeta</b></font> <font color=silver>(<b>$ar</b> player game)</font> <font color=silver>-</font> ";
while($getjoined = mysql_fetch_array($getjoin)){
$start++;
$getnames = $getjoined[username];

echo"<a href=viewprofile.php?username=$getnames><font $culas>$getnames</font></a><font size=1 face=verdana color=silver> - </font>";}
echo" $gamedec</b></font> <a href='multiblackjackgame.php?game=$id'>(View Game)</a>"; 
if($gamefinished == 1){ echo "<span id=right>GAME HAS FINISHED&nbsp;</span>"; }}
?>
</table>
<table width="98%" cellpadding="0" cellspacing="0" align="center"><tr><td height="1" bgcolor="#444444"></td></tr><tr><td height="3"></td></tr>
<? 
$getgprofit = mysql_query("SELECT * FROM `mbjprofit` WHERE username = '$usernameone'");
$doitnow = mysql_fetch_array($getgprofit);
$mdggames = $doitnow['games'];
$mdgwon = $doitnow['won'];
$mdgwinnings = $doitnow['winnings'];
if($mdggames > 0 AND $mdgwon > 0){ $crimerating = floor($mdgwon / $mdggames * 100); }
else{ $crimerating = 0; }
?>
<tr><td><font color=silver face=verdana size=1>Games: <b><font color=khaki><?echo number_format($mdggames);?></font></b> || Win Percentage: <font color=khaki><b><?echo "$crimerating%";?></font></b> || Winnings: <font color=khaki>$<b><?echo number_format($mdgwinnings);?></b></font></td></tr><tr><td height="3"></td></tr></table>

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

