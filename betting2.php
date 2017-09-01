<? include 'included.php'; session_start();?>

<html>
<head>
<title>:: State Gangsters</title><link rel="stylesheet" href="layout/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<link rel="shortcut icon" href="/layout/icon.png" type="image/x-icon" />
</head>
<body background="/layout/wallpaper.png">
<script type="text/javascript">
function emotion(em) { document.smiley.newpost.value=document.smiley.newpost.value+em;}
function emotions(em) { document.smileys.editprofile.value=document.smiley.newpost.value+em;}
</script>
<table width="100%" height="335" align="center" cellpadding="0" cellspacing="3">
<tr>
<td width="250" valign="top">
<? include 'leftmenu.php'; ?>
</td>
<td width="100%" valign="top">
<?php
$saturate = "/[^a-z0-9]/i";
$saturated = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$newpostraw = $_POST['newpost'];
$newpost = htmlentities($newpostraw, ENT_QUOTES);
$dobet = mysql_real_escape_string($_POST['placebet']);
$betraw = mysql_real_escape_string($_POST['amount']);
$whobetraw = mysql_real_escape_string($_POST['whobet']);
$whowon = mysql_real_escape_string($_POST['whowon']);
$bet = preg_replace($saturated,"",$betraw);
$whobet = preg_replace($saturated,"",$whobetraw);
$userip = $_SERVER[REMOTE_ADDR]; 
$gangsterusername = $usernameone;
$playerrank = $myrank;
$playerarray =$statustesttwo;
$playerrank = $playerarray['rankid'];
$playermoney = $playerarray['money'];
$betprofit = $playerarray['betprofit'];

if($playerrank < 0){ die('<font size=1 face=verdana color=white>There is currently no events to bet on!'); }
$entertainer = $ent;
if($entertainer != '0'){die('<font color=white face=verdana size=1>As you are an entertainer you cannot view this page</font>');}

$openclose = mysql_query("SELECT * FROM gametimes WHERE game = 'betting'");
$isit = mysql_fetch_array($openclose);
$isitopen = $isit['time'];

$oneodd = "1.30"; $twoodd = "3.50"; $threeodd = "4.00";
$teamone = "Manchester City"; $teamtwo = "Draw"; $teamthree = "Newcastle";
$date = "19/08/2013 - 20:00";

if($_POST['refund'] AND $_POST['refunduser']){
$theuser = $_POST['refunduser'];
$getuserr = mysql_query("SELECT * FROM bettingshop WHERE username = '$theuser'");
$getuser = mysql_fetch_array($getuserr);
$theuser = $getuser['username'];
$theamount = $getuser['amount'];
mysql_query("UPDATE users SET money = money + $theamount WHERE username = '$theuser'");
mysql_query("UPDATE users SET betprofit = betprofit + $theamount WHERE username = '$theuser'");
mysql_query("DELETE FROM bettingshop WHERE username = '$theuser'");
}

if($_POST['placebet'] AND $whobet > '0' AND $isitopen == 1){
$getbet = mysql_num_rows(mysql_query("SELECT * FROM bettingshop WHERE username = '$usernameone'"));
if($playermoney < $bet){ $showoutcome++; $outcome = "You can not afford this bet!"; }
elseif($bet < 2500000 || $bet > 1000000000){ $showoutcome++; $outcome = "The minimum bet is $2,500,000 and the maximum $1,000,000,000"; }
elseif($getbet > 0){ $showoutcome++; $outcome = "You already have a bet!"; }
else{ 
mysql_query("UPDATE users SET money = money - '$bet' WHERE ID = '$ida' AND money >= '$bet'");
if(mysql_affected_rows()==0){die('<font color=white face=verdana size=1>Error 1.</font>');}
mysql_query("UPDATE users SET betprofit = betprofit - '$bet' WHERE ID = '$ida'");
if($whobet == 1){ $doodd = "$oneodd"; }
elseif($whobet == 2){ $doodd = "$twoodd"; }
elseif($whobet == 3){ $doodd = "$threeodd"; }
mysql_query("INSERT INTO `bettingshop` (username,amount,odd,value) VALUES ('$usernameone','$bet','$doodd','$whobet')");
$showoutcome++; $outcome = "Your bet have been placed!";
}}

if($_POST['changeit']){ 
if($isitopen == 1){ mysql_query("UPDATE gametimes SET time = 0 WHERE game = 'betting'"); $showoutcome++; $outcome = "Betting has been closed!"; }
else{ mysql_query("UPDATE gametimes SET time = 1 WHERE game = 'betting'"); $showoutcome++; $outcome = "Betting is now open!";
}}

if($_POST['adminroll'] AND $_POST['whowon']){
$getwinners = mysql_query("SELECT * FROM bettingshop WHERE value = '$whowon' ORDER BY id");
while($doroll = mysql_fetch_array($getwinners)){
$winname = $doroll['username'];
$winamount = $doroll['amount'];
$winodd = $doroll['odd'];
$totalwin = $winamount * $winodd;
mysql_query("UPDATE users SET money = money + '$totalwin' WHERE username = '$winname'");
mysql_query("UPDATE users SET betprofit = betprofit + '$totalwin' WHERE username = '$winname'");
}
mysql_query("DELETE FROM bettingshop WHERE id >= '0'");
$showoutcome++; $outcome = "Payments have been sent out!";
}

if(isset($_POST['dopost'])) { 
$mutedusernamesql = mysql_query("SELECT username,ip FROM muted WHERE  username = '$gangsterusername'")or die(mysql_error());
$mutedusernamerows = mysql_num_rows($mutedusernamesql);
$mutedusernamearray = mysql_fetch_array($mutedusernamesql);
$mutedusernameone = $mutedusernamearray['username'];
$mutedipone = $mutedusernamearray['ip'];

$mutedipsql = mysql_query("SELECT username,ip FROM muted WHERE  ip = '$userip'")or die(mysql_error());
$mutediprows  = mysql_num_rows($mutedipsql);
$mutediparray = mysql_fetch_array($mutedipsql);
$mutedusernametwo = $mutediparray['username'];
$mutediptwo = $mutediparray['ip'];

if($mutedusernamerows > '0'){die("<font color=white face=verdana size=1>Username: <b>$mutedusernameone</b> and IP: <b>$mutedipone</b> have been muted! Contact a member of <b>State Gangsters</b> to be unmuted!");}
elseif($mutediprows > '0'){die("<font color=white face=verdana size=1>Username: <b>$mutedusernametwo</b> and IP: <b>$mutediptwo</b> have been muted! Contact a member of <b>State Gangsters</b> to be unmuted!");}

if(!$newpost){}
else{
$posttits++;
if(($senior == '1')&&($playerrank < '25')){$playerrank = '123';}
mysql_query("INSERT INTO forumposts(username,ip,type,post,rankid,esc)
VALUES ('$gangsterusername','$userip','betting','$newpost','$playerrank','1')");
}}
?> 
<table align="center" cellpadding="0" width=100% cellspacing="0">
<tbody><tr>
<td class=menutopleft><img style="display: block" height=22 width=8 alt="" src="blank.gif"></td>
<td class=menutopbar height=22 style="white-space: nowrap"><font color="#222222"><b>Betting Shop</b></font></td>
<td class=menutopend><IMG style="display: block" height=20 alt="" src="blank.gif" width=28></td>
<td class=menutopmain><IMG style="display: block" height=22 width=30px alt="" src="blank.gif" ></td>
<td class=menutopright><IMG style="display: block" height=22 alt="" src="blank.gif" width=8></td></tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width: 100%"><tbody><tr>
<td class=menuleft><img style="display: block" alt="" src="blank.gif" width=8></td>
<td background="/layout/crossbg.png">
<table align="center" width="85%" cellpadding="0" cellspacing="1" class="section"><font color=red size=1 face=verdana><b>PLEASE NOTE*</b> <font color=white>You can only place one bet each event.</font><br><br>
<?if($usernameone == 'Steven' || $usernameone == 'Mitch'){ echo "<form method=post><input type=text class=textbox name=whowon> <input type=submit class=textbox name=adminroll value='Pay bets'> <input type=submit class=textbox name=changeit value='Open/Close bets'></form><br><br>"; }?>
<center><font face=verdana color=white size=2>Betting is currently: <?if($isitopen == 1){echo"<font color=lime><b>OPEN</b></font>"; }else{ echo"<font color=red><b>CLOSED</b></font>"; }?><br><br></center>

<? if($showoutcome>=1){ ?>
<table width=70% align=center cellpadding=0 cellspacing=1 class=section>
<tr><td><div class=button1 style="background-color:#171717;">&nbsp;<?echo$outcome;?></td></tr>
</table><br>
<? } ?>

<table width=45% align=center cellpadding=0 cellspacing=1 class="section">
<tr><td colspan=2><div class=tab>Make Bet</td></tr><form method=post>
<tr><td align=center colspan=2><div class=button1><b><?echo$teamone;?> VS <?echo$teamthree;?></b> <?echo$date;?></td></tr>
<tr><td width=50%><div class=button1><input type="radio" class="textbox" name="whobet" value="1"><?echo$teamone;?></td><td width=50% align=center><div class=button1>@ <?echo$oneodd;?><input type="radio" style="visibility:hidden;"></td></tr>
<tr><td width=50%><div class=button1><input type="radio" class="textbox" name="whobet" value="2"><?echo$teamtwo;?></td><td width=50% align=center><div class=button1>@ <?echo$twoodd;?><input type="radio" style="visibility:hidden;"></td></tr>
<?if($rankid >= 0){?><tr><td width=50%><div class=button1><input type="radio" class="textbox" name="whobet" value="3"><?echo$teamthree;?></td><td width=50% align=center><div class=button1>@ <?echo$threeodd;?><input type="radio" style="visibility:hidden;"></td></tr><?}?>
<tr><td colspan=2 align=right><div class=button1>Bet:<input type="text" class="textbox" name="amount" value="$"></td></tr>
<tr><td colspan=2 align=right><div class=button1><input type="submit" class="textbox" name="placebet" style="width:100%;" value="Place Bet"></td></tr>
</form></table><br>

<table width=45% align=center cellpadding=0 cellspacing=1 class=section>
<tr><td><div class=tab>My Bet</td>
<?
$getmybet = mysql_query("SELECT * FROM bettingshop WHERE username = '$usernameone'");
$if = mysql_num_rows($getmybet);
$getit = mysql_fetch_array($getmybet);
$amountt = number_format($getit['amount']);
$oddd = $getit['odd'];
$valuee = $getit['value'];
if($valuee == 1){ $yourbet = "You have <b>$$amountt</b> on <b>$teamone</b> to win @ <b>$oddd</b>"; }
elseif($valuee == 2){ $yourbet = "You have <b>$$amountt</b> on the result ending as a $teamtwo @ <b>$oddd</b>"; }
elseif($valuee == 3){ $yourbet = "You have <b>$$amountt</b> on <b>$teamthree</b> to win @ <b>$oddd</b>"; }
if($if < 1){ echo "<tr><td align=center><div class=button1>You currently have no bets!</td></tr>"; }else{ ?>
<tr><td align=center><div class=button1><?echo$yourbet?></td></tr><?}?>
</table><br>

<table width=45% align=center cellpadding=0 cellspacing=1 class="section">
<tr><td colspan=2><div class=tab>All Bets</td></tr>
<? $getamount = mysql_query("SELECT * FROM bettingshop");
$nobets = mysql_num_rows($getamount);
while($doitnow = mysql_fetch_array($getamount)){
$msa = $doitnow['amount'] + $msa; 
} 
echo "<tr><td><div class=button1><font color=khaki>&nbsp;There is currently <b>$nobets</b> bets placed valued at <b>$".number_format($msa)."</b></div></td></tr>"; ?>

<? $getamountt = mysql_query("SELECT * FROM bettingshop WHERE value = 1");
$nobetss = mysql_num_rows($getamountt);
while($doitnoww = mysql_fetch_array($getamountt)){
$msaa = $doitnoww['amount'] + $msaa; 
} 
echo "<tr><td><div class=button1>&nbsp;There is <b>$nobetss</b> bets placed on <b>$teamone</b> valued at <b>$".number_format($msaa)."</b></div></td></tr>";
if($rankid >= 0){ $getamounttt = mysql_query("SELECT * FROM bettingshop WHERE value = 2");
$nobetsss = mysql_num_rows($getamounttt);
while($doitnowww = mysql_fetch_array($getamounttt)){
$msaaa = $doitnowww['amount'] + $msaaa; 
} 
echo "<tr><td><div class=button1>&nbsp;There is <b>$nobetsss</b> bets placed on a <b>$teamtwo</b> valued at <b>$".number_format($msaaa)."</b></div></td></tr>";
}
$getamountttt = mysql_query("SELECT * FROM bettingshop WHERE value = 3");
$nobetssss = mysql_num_rows($getamountttt);
while($doitnowwww = mysql_fetch_array($getamountttt)){
$msaaaa = $doitnowwww['amount'] + $msaaaa; 
} 
echo "<tr><td><div class=button1>&nbsp;There is <b>$nobetssss</b> bets placed on <b>$teamthree</b> valued at <b>$".number_format($msaaaa)."</b></div></td></tr>"; ?>
</table><br>

<?if($rankid >= 100){?><table width=45% align=center cellpadding=0 cellspacing=1 class="section">
<tr><td colspan=2><div class=tab>Admin Bet Check</td></tr>
<? 
$doitall = mysql_query("SELECT * FROM bettingshop ORDER BY time DESC");
while($doit = mysql_fetch_array($doitall)){
$doitusername = $doit['username'];
$doitamount = $doit['amount'];
$doittime = $doit['time'];
echo "<tr><td><div class=button1>&nbsp;$doitusername bet $".number_format($doitamount)." at $doittime</div></td></tr>"; } 
?>
<form method=post><tr><td><div class=button1>Refund user:<input type=text name=refunduser class=textbox><input type=submit name=refund class=textbox value="Do It"></div></td></tr></form>
</table><br><?}?>


<table width="98%" cellpadding="0" cellspacing="0" align="center"><tr><td height="1" bgcolor="#444444"></td></tr><tr><td height="3"></td></tr>
<tr><td><font color=silver face=verdana size=1>Betting Profit: <font color=khaki>$<b><?echo number_format($betprofit);?></b></font></td></tr><tr><td height="3"></td></tr></table>
<td class=menuright><img style="display: block"  alt="" src="blank.gif" width=8></td>
</tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width:  100%">
<tbody><tr>
<td class=menubottomleft><img style="display:  block" alt="" src="blank.gif" width="8" height="9"></td>
<td class=menubottommain><img style="display:  block" alt="" src="blank.gif"></td>
<td class=menubottomright><img style="display:  block" alt="" src="blank.gif" width="8" height="9"></td>
</tr></tbody></table></div>

<?php

$selecterraw = $_POST['select'];
$selecter = preg_replace($saturated,"",$selecterraw);
if(isset($_POST['next'])){$one = $selecter + 1;}
elseif(isset($_POST['previous'])){$one = $selecter - 1;}else{$one = '0';}

$selectfroma = $one * 25;
$selecttoa = $selectfrom + 25;
$selectfrom = preg_replace($saturated,"",$selectfroma);
$selectto = preg_replace($saturated,"",$selecttoa);

$getposts = mysql_query("SELECT * FROM forumposts WHERE type = 'betting' ORDER BY id DESC LIMIT $selectfrom,$selectto");
while($getpostsarray = mysql_fetch_array($getposts)){
$postname = $getpostsarray['username'];
$rankcolor = $getpostsarray['rankid'];
$postid = $getpostsarray['id'];
$liyks = $getpostsarray['likes'];
if($liyks < '1'){$liyks = '';}if($liyks >= '1'){


$liyks = "+$liyks";}
$time = $getpostsarray['time'];
$postinforawa = html_entity_decode($getpostsarray['post'], ENT_NOQUOTES);
$postinforawb = $postinforawa;



$postinforawz = str_replace($zpattern,$zreplace,$postinforawb);

$epattern[1] = "/\[b\](.*?)\[\/b\]/is";
$epattern[2] = "/\[u\](.*?)\[\/u\]/is";
$epattern[3] = "/\[i\](.*?)\[\/i\]/is";
$epattern[4] = "/\[center\](.*?)\[\/center\]/is";
$epattern[5] = "/\[color=(.*?)\](.*?)\[\/color\]/is";
$epattern[7] = "/\[font=(.*?)\](.*?)\[\/font\]/is";
$epattern[8] = "/\[br\]/is";
$epattern[10] = "/\[quote\](.*?)\[\/quote\]/is";
$epattern[11] = "/\[left\](.*?)\[\/left\]/is";
$epattern[12] = "/\[right\](.*?)\[\/right\]/is";
$epattern[13] = "/\[s\](.*?)\[\/s\]/is";



$ereplace[1] = "<b>$1</b>";
$ereplace[2] = "<u>$1</u>";
$ereplace[3] = "<i>$1</i>";
$ereplace[4] = "<center>$1</center>";
$ereplace[5] = "<font color=\"$1\">$2</font>";
$ereplace[7] = "<font face=\"$1\">$2</font>";
$ereplace[8] = "<br>";
$ereplace[10] = "<blockquote><b><font color=7e96ac>$1</font></b></blockquote>";
$ereplace[11] = "<div align=\"left\">$1</div>";
$ereplace[12] = "<div align=\"right\">$1</div>";
$ereplace[13] = "<s>$1</s>";



$postinforawb = preg_replace($epattern,$ereplace,$postinforawz);

$fpattern[1] = ":arrow:";
$fpattern[2] = ":D";
$fpattern[3] = ":S";
$fpattern[4] = "8)";
$fpattern[5] = ":cry:";
$fpattern[6] = "8|";
$fpattern[7] = ":evil:";
$fpattern[8] = ":!:";
$fpattern[9] = ":idea:";
$fpattern[10] = ":lol:";
$fpattern[11] = ":mad:";
$fpattern[12] = ":?:";
$fpattern[13] = ":redface:";
$fpattern[14] = ":rolleyes:";
$fpattern[15] = ":(";
$fpattern[16] = ":)";
$fpattern[17] = ":o";
$fpattern[18] = ":tdn:";
$fpattern[19] = ":P";
$fpattern[20] = ":tup:";
$fpattern[21] = ":twisted:";
$fpattern[22] = ";)";
$fpattern[23] = ":slepy:";
$fpattern[24] = ":whistle:";
$fpattern[25] = ":wub:";
$fpattern[26] = ":muah:";
$fpattern[27] = ":zipped:";
$fpattern[28] = ":love:";
$fpattern[29] = ":sarcasm:";

$freplace[1] = '<img src=/layout/smiles/arrow.gif class="smileys">';
$freplace[2] = '<img src=/layout/smiles/biggrin.gif class="smileys">';
$freplace[3] = '<img src=/layout/smiles/confused.gif class="smileys">';
$freplace[4] = '<img src=/layout/smiles/cool.gif class="smileys">';
$freplace[5] = '<img src=/layout/smiles/cry.gif class="smileys">';
$freplace[6] = '<img src=/layout/smiles/eek.gif class="smileys">';
$freplace[7] = '<img src=/layout/smiles/evil.gif class="smileys">';
$freplace[8] = '<img src=/layout/smiles/exclaim.gif class="smileys">';
$freplace[9] = '<img src=/layout/smiles/idea.gif class="smileys">';
$freplace[10] = '<img src=/layout/smiles/lol.gif class="smileys">';
$freplace[11] = '<img src=/layout/smiles/mad.gif class="smileys">';
$freplace[12] = '<img src=/layout/smiles/question.gif class="smileys">';
$freplace[13] = '<img src=/layout/smiles/redface.gif class="smileys">';
$freplace[14] = '<img src=/layout/smiles/rolleyes.gif class="smileys">';
$freplace[15] = '<img src=/layout/smiles/sad.gif class="smileys">';
$freplace[16] = '<img src=/layout/smiles/smile.gif class="smileys">';
$freplace[17] = '<img src=/layout/smiles/surprised.gif class="smileys">';
$freplace[18] = '<img src=/layout/smiles/tdown.gif class="smileys">';
$freplace[19] = '<img src=/layout/smiles/toungue.gif class="smileys">';
$freplace[20] = '<img src=/layout/smiles/tup.gif class="smileys">';
$freplace[21] = '<img src=/layout/smiles/twisted.gif class="smileys">';
$freplace[22] = '<img src=/layout/smiles/wink.gif class="smileys">';
$freplace[23] = '<img src=/layout/smiles/slepy.png class="smileys">';
$freplace[24] = '<img src=/layout/smiles/whistle.gif class="smileys">';
$freplace[25] = '<img src=/layout/smiles/wub.gif class="smileys">';
$freplace[26] = '<img src=/layout/smiles/muah.gif class="smileys">';
$freplace[27] = '<img src=/layout/smiles/zipped.gif class="smileys">';
$freplace[28] = '<img src=/layout/smiles/love.gif class="smileys">';
$freplace[29] = '<img src=/layout/smiles/sarcasm.gif class="smileys">';

$postinfo = str_replace($fpattern, $freplace, $postinforawb, $countthree);

$usershdo = mysql_query("SELECT hdo FROM users WHERE username = '$postname'");
$arethey = mysql_fetch_array($usershdo);
$hdoperson = $arethey['hdo'];
$shdoperson = mysql_num_rows(mysql_query("SELECT * FROM senior WHERE username = '$postname'"));

if($rankcolor == '100'){$color = "<font color=red face=verdana size=1><b>$postname</b></font>";} 
elseif($rankcolor == '75'){$color = "<font color=cornflowerblue face=verdana size=1><b>$postname</b></font>";} 
elseif($rankcolor == '50'){$color = "<font color=cornflowerblue face=verdana size=1><b>$postname</b></font>";} 
elseif($rankcolor == '25'){$color = "<font color=cornflowerblue face=verdana size=1><b>$postname</b></font>";} 
elseif($shdoperson == '1'){$color = "<font color=lime face=verdana size=1><b>$postname</b></font>";} 
elseif($hdoperson == '1'){$color = "<font color=green face=verdana size=1><b>$postname</b></font>";} 
else{$color = "<font color=silver face=verdana size=1>$postname</font>";} 
?>
<table align="center" cellpadding="0" width=100% cellspacing="0">
<tbody><tr>
<td class=menutopleft><img style="display: block" height=22 width=8 alt="" src="blank.gif"></td>
<td class=menutopbar height=22 style="white-space: nowrap"><font color="#222222"><b><a href=viewprofile.php?username=<? echo $postname?>><? echo $color; ?></a><? if(($playerrank >= '25')||($senior > '0')){echo"<a href=viewtopic.php?topicid=$topicid&deletepost=$postid><font color=white face=verdana size=1> (Delete)</font></a>";}?></b></font></td>
<td class=menutopend><IMG style="display: block" height=20 alt="" src="blank.gif" width=28></td>
<td class=menutopmain><IMG style="display: block" height=22 width=30px alt="" src="blank.gif" ></td>
<td class=menutopright><IMG style="display: block" height=22 alt="" src="blank.gif" width=8></td></tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width: 100%"><tbody><tr>
<td class=menuleft><img style="display: block" alt="" src="blank.gif" width=8></td>
<td background="/layout/crossbg.png">
<table align="center" width="85%" cellpadding="0" cellspacing="1" class="section">

<font color=white face=verdana size=1>

<? if($countthree > '20'){echo"This user tried to post more than 20 smilies, this is <b>NOT</b> allowed";
}else{echo nl2br($postinfo);} ?>

</font><br>
</tbody></table></td>
<td class=menuright><img style="display: block"  alt="" src="blank.gif" width=8></td>
</tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width:  100%">
<tbody><tr>
<td class=menubottomleft><img style="display:  block" alt="" src="blank.gif" width="8" height="9"></td>
<td class=menubottommain><img style="display:  block" alt="" src="blank.gif"></td>
<td class=menubottomright><img style="display:  block" alt="" src="blank.gif" width="8" height="9"></td>
</tr></tbody></table></div>
<?}?></div>


<table align="center" cellpadding="0" width=100% cellspacing="0">
<tbody><tr>
<td class=menutopleft><img style="display: block" height=22 width=8 alt="" src="blank.gif"></td>
<td class=menutopbar height=22 style="white-space: nowrap"><font color="#222222"><b>Add Comment</b></font></td>
<td class=menutopend><IMG style="display: block" height=20 alt="" src="blank.gif" width=28></td>
<td class=menutopmain><IMG style="display: block" height=22 width=30px alt="" src="blank.gif" ></td>
<td class=menutopright><IMG style="display: block" height=22 alt="" src="blank.gif" width=8></td></tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width: 100%"><tbody><tr>
<td class=menuleft><img style="display: block" alt="" src="blank.gif" width=8></td>
<td background="/layout/crossbg.png">
<table align="center" width="85%" cellpadding="0" cellspacing="1" class="section">
<center>
<form action="betting.php" method="post" name="smiley"><textarea name="newpost" cols="80" rows="8" class="textbox" id ="newpost"></textarea><br>
    <img class="smileys" src="/layout/smiles/arrow.gif" onClick="emotion(':arrow:')">
    <img onClick="emotion(':D')" src="/layout/smiles/biggrin.gif" class="smileys">
    <img src="/layout/smiles/confused.gif" onClick="emotion(':S')" class="smileys">
    <img src="/layout/smiles/cry.gif" onClick="emotion(':cry:')" class="smileys">
    <img src="/layout/smiles/cool.gif" onClick="emotion('8)')" class="smileys">
    <img src="/layout/smiles/eek.gif" onClick="emotion('8|')" class="smileys">
    <img onClick="emotion(':evil:')" src="/layout/smiles/evil.gif" class="smileys">
    <img onClick="emotion(':!:')" src="/layout/smiles/exclaim.gif" class="smileys">
    <img onClick="emotion(':idea:')" src="/layout/smiles/idea.gif" class="smileys">
    <img onClick="emotion(':lol:')" src="/layout/smiles/lol.gif" class="smileys">
    <img onClick="emotion(':mad:')" src="/layout/smiles/mad.gif" class="smileys">
    <img onClick="emotion(':?:')" src="/layout/smiles/question.gif" class="smileys">
    <img onClick="emotion(':redface:')" src="/layout/smiles/redface.gif" class="smileys">
    <img onClick="emotion(':rolleyes:')" src="/layout/smiles/rolleyes.gif" class="smileys">
    <img onClick="emotion(':(')" src="/layout/smiles/sad.gif" class="smileys">
    <img onClick="emotion(':)')" src="/layout/smiles/smile.gif" class="smileys">
    <img onClick="emotion(':o')" src="/layout/smiles/surprised.gif" class="smileys">
    <img onClick="emotion(':P')" src="/layout/smiles/toungue.gif" class="smileys">
    <img onClick="emotion(':twisted:')" src="/layout/smiles/twisted.gif" class="smileys">
    <img onClick="emotion(';)')" src="/layout/smiles/wink.gif" class="smileys">
    <img onClick="emotion(':tdn:')" src="/layout/smiles/tdown.gif" class="smileys">
    <img onClick="emotion(':tup:')" src="/layout/smiles/tup.gif" class="smileys">
    <img onClick="emotion(':zipped:')" src="/layout/smiles/zipped.gif" class="smileys">
    <img onClick="emotion(':love:')" src="/layout/smiles/love.gif" class="smileys">
    <img onClick="emotion(':sarcasm:')" src="/layout/smiles/sarcasm.gif" class="smileys"><br>
    <input type ="submit" value="Post comment" class="textbox" name="dopost"></form></center><div align=right>
<form action = "betting.php" method = "post"><input type="hidden" name="select" value="<? echo $one; ?>"><?php if($selectfrom != '0'){echo'<input type ="submit" value="Previous page" class="textbox" name="previous">';}?><input type ="submit" value="Next page" class="textbox" name="next"></form></center><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></div>
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

</body></html>

