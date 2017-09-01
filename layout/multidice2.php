<? include 'included.php'; ?>
<?

$saturate = "/[^a-z0-9]/i";
$saturated = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
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

$checkindb = mysql_num_rows(mysql_query("SELECT * FROM mdgprofit WHERE username = '$usernameone'"));
if($checkindb < 1){ mysql_query("INSERT INTO `mdgprofit` (username,id) VALUES ('$usernameone','')"); }
?>

<html>
<head>
<title>:: Tough Dons</title><link rel="stylesheet" href="layout/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
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

if($crewid != '0'){
$crewbosssql = mysql_query("SELECT boss FROM crews WHERE boss = '$user'");
$crewboss = mysql_num_rows($crewbosssql);
}else{$crewboss = 0;}



?>

<head><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<script type="text/javascript">
<!--
function shithouse(){
var answer = confirm ("Log out?")
if (answer)
location.href='logout.php?id=<?echo$sessionid;?>';
else
alert ("Request cancelled.")
}

// -->
</script> 
<title>Login</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</head>

<?
$mdgtest = mysql_query("SELECT * FROM mdg WHERE username = '$username'");
$mdgtest = mysql_num_rows($mdgtest);
?>

<? include 'leftmenu.php'; ?>

</td>
<td width="100%" valign="top">
<?
 


if($mdgtest > '2'){die('<font color=white face=verdana size=1>Message admin and say you saw error MDG</font>');}

if(isset($_POST['bet'])) {
if($mdgtest > '1'){}
elseif($bet > $usermoney){}
elseif($auto <= '1' AND $auto != ''){} 
elseif($auto >= '1000'){} 
elseif($bet == '0'){}
elseif(!$bet){}
elseif($bet > '99999999999'){}
else{
mysql_query("UPDATE users SET money = money - $bet WHERE ID ='$ida' AND money >= '$bet'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 1.</font>');}

mysql_query("UPDATE mdgprofit SET winnings = winnings - $bet, games = games + 1 WHERE username = '$usernameone'");

mysql_query("INSERT INTO mdg(username,bet,autoroll)
VALUES ('$username','$bet','$auto')");
$getgameid = mysql_fetch_array(mysql_query("SELECT * FROM mdg WHERE username = '$usernameone' ORDER BY id DESC"));
$gameid = $getgameid['id'];
mysql_query("INSERT INTO mdice(username,number,id) VALUES ('$usernameone','1','$gameid')");}}

if($_POST['join']){
$join == $_POST['dice'];
$jointest = mysql_num_rows(mysql_query("SELECT * FROM mdg WHERE id = '$join'"));
$joinoktest = mysql_num_rows(mysql_query("SELECT * FROM mdice WHERE id = '$join' AND username = '$username'"));
$joininfo = mysql_fetch_array(mysql_query("SELECT * FROM mdg WHERE id = '$join'"));
$joinbet = $joininfo['bet'];
$joinname = $joininfo['username'];
$joinnuma = mysql_num_rows(mysql_query("SELECT * FROM mdice WHERE id = '$join'"));
$joinnum = $joinnuma + 1;
if($jointest == '0'){}
elseif($joinoktest > '0'){}
elseif($joinbet > $usermoney){}
elseif($joinname == $username){}
else{
mysql_query("UPDATE users SET money = (money - $joinbet) WHERE ID = '$ida' AND money >= '$joinbet'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 2.</font>');}
mysql_query("UPDATE mdgprofit SET winnings = winnings - $joinbet, games = games + 1 WHERE username = '$usernameone'");
mysql_query("INSERT INTO mdice(username,number,id) VALUES ('$username','$joinnum','$join')");
}}

if($_POST['roll']){
$rollid = mysql_real_escape_string($_POST['dice']);
$rollcheck = mysql_num_rows(mysql_query("SELECT * FROM mdg WHERE username = '$username' AND id = '$rollid'"));
$rollida = mysql_fetch_array(mysql_query("SELECT * FROM mdg WHERE username = '$username' AND id = '$rollid'"));
if($rollcheck < '1'){echo "1234";}
else{
$rollamount = mysql_num_rows(mysql_query("SELECT * FROM mdice WHERE id = '$rollid'"));
$rand = mt_rand(1,$rollamount);

$winner = mysql_fetch_array(mysql_query("SELECT * FROM mdice WHERE number = '$rand' AND id = '$rollid'"));
$winnername = $winner['username'];
$win = mysql_fetch_array(mysql_query("SELECT * FROM mdg WHERE id = '$rollid'"));
$wintotal = $win['bet'] * $rollamount;
$wintotala = number_format($wintotal);

$sendinfo = "You joined a dice game created by \[b\]$username\[\/b\]! The dice rolled $rand!\[br\]That means \[b\]$winnername\[\/b\] won $\[b\]$wintotala\[\/b\]!";
$selecttos = mysql_query("SELECT * FROM mdice WHERE id = '$rollid'");
while($to = mysql_fetch_array($selecttos)){
$sendto = $to['username'];
mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$sendto','$sendto','2','$userip','$sendinfo')");}

mysql_query("DELETE FROM mdg WHERE id = '$rollid'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error roll 1</font>');}
mysql_query("DELETE FROM mdice WHERE id = '$rollid'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error roll 2</font>');}

mysql_query("UPDATE users SET money = money + '$wintotal' WHERE username = '$winnername'");
mysql_query("UPDATE mdgprofit SET winnings = winnings + $wintotal, won = won + 1 WHERE username = '$winnername'");
}}

$doautorolll = mysql_query("SELECT * FROM mdg WHERE autoroll > '1'");
while($doautoroll = mysql_fetch_array($doautorolll)){
$autorollid = $doautoroll['id'];
$autorollnumber = $doautoroll['autoroll'];
$autorolluser = $doautoroll['username'];
$rollcheck = mysql_num_rows(mysql_query("SELECT * FROM mdg WHERE id='$autorollid'"));
if($rollcheck < '1'){}else{
$rollamount = mysql_num_rows(mysql_query("SELECT * FROM mdice WHERE id='$autorollid'"));
if($autorollnumber == $rollamount){
$rand = mt_rand(1,$rollamount);
$winner = mysql_fetch_array(mysql_query("SELECT * FROM mdice WHERE number='$rand' AND id='$autorollid'"));
$winnername = $winner['username'];
$win = mysql_fetch_array(mysql_query("SELECT * FROM mdg WHERE id='$autorollid'"));
$wintotal = $win['bet'] * $rollamount; 
$wintotala = number_format($wintotal); 
$sendinfo = "You joined a dice game created by \[b\]$autorolluser\[\/b\]! The dice rolled $rand!\[br\]That means \[b\]$winnername\[\/b\] won $\[b\]$wintotala\[\/b\]!";
$selecttos = mysql_query("SELECT * FROM mdice WHERE id='$autorollid'");
while($to = mysql_fetch_array($selecttos)){ $sendto = $to['username'];
mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info) VALUES ('$sendto','$sendto','2','$userip','$sendinfo')");
mysql_query("UPDATE users SET mail='1' WHERE username='$sendto'");}
mysql_query("DELETE FROM mdg WHERE id='$autorollid'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error roll 1</font>');}
mysql_query("DELETE FROM mdice WHERE id='$autorollid'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error roll 2</font>');} 
mysql_query("UPDATE users SET money=money+'$wintotal' WHERE username='$winnername'");
mysql_query("UPDATE mdgprofit SET winnings = winnings + $wintotal, won = won + 1 WHERE username = '$winnername'");
}}}

$deaddoautorolll = mysql_query("SELECT * FROM mdg");
while($deaddoautoroll = mysql_fetch_array($deaddoautorolll)){
$deadautorollid = $deaddoautoroll['id'];
$deadautorolluser = $deaddoautoroll['username'];
$isuserdead = mysql_query("SELECT status FROM users WHERE username = '$deadautorolluser'");
$wellarethey = mysql_fetch_array($isuserdead);
$deadornot = $wellarethey['status'];
if($deadornot == Alive){}else{
$rollcheck = mysql_num_rows(mysql_query("SELECT * FROM mdg WHERE id='$deadautorollid'"));
if($rollcheck < '1'){}else{
$rollamount = mysql_num_rows(mysql_query("SELECT * FROM mdice WHERE id='$deadautorollid'"));
$rand = mt_rand(1,$rollamount);
$winner = mysql_fetch_array(mysql_query("SELECT * FROM mdice WHERE number='$rand' AND id='$deadautorollid'"));
$winnername = $winner['username'];
$win = mysql_fetch_array(mysql_query("SELECT * FROM mdg WHERE id='$deadautorollid'"));
$wintotal = $win['bet'] * $rollamount; 
$wintotala = number_format($wintotal); 
$sendinfo = "You joined a dice game created by \[b\]$deadautorolluser\[\/b\]! The dice rolled $rand!\[br\]That means \[b\]$winnername\[\/b\] won $\[b\]$wintotala\[\/b\]!";
$selecttos = mysql_query("SELECT * FROM mdice WHERE id='$deadautorollid'");
while($to = mysql_fetch_array($selecttos)){ $sendto = $to['username'];
mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info) VALUES ('$sendto','$sendto','2','$userip','$sendinfo')");
mysql_query("UPDATE users SET mail='1' WHERE username='$sendto'");}
mysql_query("DELETE FROM mdg WHERE id='$deadautorollid'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error roll 1</font>');}
mysql_query("DELETE FROM mdice WHERE id='$deadautorollid'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error roll 2</font>');} 
mysql_query("UPDATE users SET money=money+'$wintotal' WHERE username='$winnername'");
mysql_query("UPDATE mdgprofit SET winnings = winnings + $wintotal, won = won + 1 WHERE username = '$winnername'");
}}}
?>
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/layout/topleft.png"></td>
<td class=menutopbar height=22 style="white-space: nowrap">Multidice</td>
<td width="8" height="22" background="/layout/topright.png"></td>
</tr><tr><td width="8" background="/layout/leftb.png" NOWRAP></td>
<? 
$getgprofit = mysql_query("SELECT * FROM mdgprofit WHERE username = '$usernameone'");
$doitnow = mysql_fetch_array($getgprofit);
$mdggames = $doitnow['games'];
$mdgwon = $doitnow['won'];
$mdgwinnings = $doitnow['winnings'];
if($mdggames > 0 AND $mdgwon > 0){ $crimerating = floor($mdgwon / $mdggames * 100); }
else{ $crimerating = 0; }
?>
<td bgcolor="333333"><table width="50%" align="right" cellpadding="3" cellspacing="0">
  <tr>
    <td><div class=tab2>
        <table width="100%"  border="0" align="center" bordercolor="#000000">
          <tr>
            <td bgcolor="333333"><div align="center">Profit Info </div></td>
          </tr>
          <tr>
            <td bgcolor="222222"><div align="center"><font face=verdana size=1 color=white> <font color=white >Games: <b><font color=cornflowerblue><?echo number_format($mdggames);?></font></b> || Win Percentage: <font color=cornflowerblue><b><?echo "$crimerating%";?></font></b> || Winnings: <font color=cornflowerblue>$<b><?echo number_format($mdgwinnings);?> </b></font></font></font></div></td>
          </tr>
        </table>
    </div></td>
  </tr>
</table>  <br>

  <br>
  <br>
  <br>
  <table align="center" width="75%" cellpadding="0" cellspacing="1" class="section">
    <tr>
      <td colspan="4"><div class=tab>
          <div align="center">MDG</div>
      </div></td>
    </tr>
    <tr>
      <td width="25%" colspan="1"><div class="button1">
          <div align="center">
            <table width=100% align=center cellpadding=0 cellspacing=2>
              <form method=post>
                <tr>
                  <td bgcolor=212121><div class=button1><font color=silver size=1 face=verdana><input type="text" autocomplete=off value="$" id="bet" name=bet2 class=textbox><input type="text" value="Autoroll?" onfocus="if(this.value == 'Autoroll?'){this.value=''}" name=auto2 size=6 class=textbox><input type="submit" name=dobet2 value="Create" class="textbox">
                  </font></div></td>
                </tr>
              </form>
              <? $howmany = mysql_num_rows(mysql_query("SELECT * FROM mdg"));
if($howmany < 1){ echo "<form method=post><tr><td bgcolor=282828><font size=1 face=verdana color=white>&nbsp;There are currently no games in play!</td></tr></form>"; }?>
              <form method=post>
                <? 
$mdgs = mysql_query("SELECT * FROM mdg ORDER BY id DESC");
while($getgame = mysql_fetch_array($mdgs)){
$start = 0;
$id = $getgame['id'];
$creator = $getgame['username'];
$gamebet = $getgame['bet'];
$ar = $getgame['autoroll'];
$gamebeta = number_format($gamebet);
$getjoin = mysql_query("SELECT * FROM mdice WHERE id = $id ORDER BY number ASC");
if($creator == $usernameone){ $dobg = "282828"; }else{ $dobg = "282828"; }

echo "<tr><td bgcolor=$dobg width=1%><input type=radio name=dice value=$id class=textbox></td><td bgcolor=$dobg>";
while($getjoined = mysql_fetch_array($getjoin)){
$start++;
$getnames = $getjoined[username]; 

echo"<a href=viewprofile.php?username=$getnames><font color=silver>$getnames</a> - "; }

$allbet = number_format($gamebet * $start);
echo "<font color=cornflowerblue size=1 face=verdana>&nbsp;Bet: $<b>$gamebeta</b></font>, <font color=cornflowerblue face=verdana size=1>Winnings: $<b>$allbet</b></font>";
if($ar > 1){ echo" <font size=1 face=verdana color=white>(Autoroll: <b>$ar</b> players)</font>"; 
}}
?>
                <tr>
                  <td align=center bgcolor="282828"><div class=button1><input type=submit name=join2 class=textbox value=Join>
                      <input type=submit name=roll2 class=textbox value=Roll></div></td>
                </tr>
              </form>
            </table>
          </div>
      </div></td>
  </table>
  <br>
<? 
$getgprofit = mysql_query("SELECT * FROM mdgprofit WHERE username = '$usernameone'");
$doitnow = mysql_fetch_array($getgprofit);
$mdggames = $doitnow['games'];
$mdgwon = $doitnow['won'];
$mdgwinnings = $doitnow['winnings'];
if($mdggames > 0 AND $mdgwon > 0){ $crimerating = floor($mdgwon / $mdggames * 100); }
else{ $crimerating = 0; }
?>
<td class=menuright><img style="display: block"  alt="" src="blank.gif" width=8></td>
</tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width:  100%" align=center>
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

