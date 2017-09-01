<? include 'included.php'; session_start();

$reward = $statustesttwo['reward'];
$money = $statustesttwo['money'];
$userlocation = $statustesttwo['location'];
$time = time(); $jailtimee = $time + 320;

if($reward > $money){ 
mysql_query("UPDATE users SET reward = '0' WHERE ID = '$ida'");
mysql_query("UPDATE jail SET reward = '0' WHERE username = '$usernameone'");}


$tyn = rand(0,10);
if($tyn == '3'){
$deletetopicssql = mysql_query("SELECT id FROM forumposts WHERE type = 'jail' ORDER BY id DESC LIMIT 10,50");
while($deletetopics = mysql_fetch_array($deletetopicssql))
{$dtopicid = $deletetopics['id'];
$deleted = mysql_query("DELETE FROM forumposts WHERE id = '$dtopicid'");}}

$saturate = "/[^a-z0-9]/i";
$allowed = "/[^0-9]/i";
$time = time();
$sessionidraw = $_COOKIE['PHPSESSID'];
$setrewarda = mysql_real_escape_string($_POST['reward']);
$getforma = $_GET['deletejail'];
$vera = mysql_real_escape_string($_POST['ver']);
$verpost = preg_replace($saturate,"",$vera);
$poster = $_GET['deletepost'];
$bustbutton = ceil($time / 50);
$bustraw = mysql_real_escape_string($_POST["$bustbutton"]);
$sessionid = preg_replace($saturate,"",$sessionidraw);
$setreward = preg_replace($allowed,"",$setrewarda);
$deletepost = preg_replace($allowed,"",$poster);
$getform = preg_replace($allowed,"",$getforma);
$bust = preg_replace($allowed,"",$bustraw);
$userip = $_SERVER[REMOTE_ADDR]; 

$vericheck = mysql_num_rows(mysql_query("SELECT * FROM users WHERE username = '$usernameone' AND ver1 != '0'"));
if($vericheck > 0){ die(include 'doverifjail.php'); }

if(isset($_POST['dobust'])){
$verificationcode = rand(1,25);
if($verificationcode == '25'){ 
$verifarray = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
shuffle($verifarray);
$verif1 = $verifarray[0];
$verif2 = $verifarray[1];
$verif3 = $verifarray[2];
mysql_query("UPDATE users SET ver1 = '$verif1', ver2 = '$verif2', ver3 = '$verif3' WHERE ID = '$ida'");
die(include 'doverifjail.php');
}}
?>

<html>
<head>
<title>ToughDons.com</title><link rel="stylesheet" href="layout/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<link rel="shortcut icon" href="/layout/icon.png" type="image/x-icon" />
</head>
<body background="/layout/wallpaper.png" onload='ajaxFunction();'>
<script type="text/javascript">
function emotion(em) { document.smiley.newpost.value=document.smiley.newpost.value+em;}
</script>
    
<table width="100%" height="335" align="center" cellpadding="0" cellspacing="3">
<tr>
<td width="250" valign="top">
<? include 'leftmenu.php'; ?>
</td>
<td width="100%" valign="top">
<?php 
$gangsterusername = $usernameone;

$getuserinfoarray = $statustesttwo;
$getname = $gangsterusername;
$getmoney = $getuserinfoarray['money'];
$getreward = $getuserinfoarray['reward'];
$bustss = $getuserinfoarray['jailbusts'];
$busts = $getuserinfoarray['jailbusts'];
$donebusts = $getuserinfoarray['donebusts'];
$rankid = $getuserinfoarray['rankid'];
$getrewarda = number_format($getreward);
$rank = $getuserinfoarray['rankid'];
$joint = $getuserinfoarray['joint'];
$now = $getuserinfoarray['now'];
$ver = $getuserinfoarray['ver1'];
$jailrand = $getuserinfoarray['jailrand'];
$points = $getuserinfoarray['points'];
$mission = $getuserinfoarray['mission'];
$userloc = $getuserinfoarray['location'];

$guessopen = mysql_query("SELECT * FROM gametimes WHERE game = 'weekly'");
$openx = mysql_fetch_array($guessopen);
$openxox = $openx['time'];

if($_POST['timetojail']){
$checkjaill=mysql_num_rows(mysql_query("SELECT * FROM jail WHERE username='$gangsterusername'"));
if($checkjaill>='1'){ $showoutcome++; $outcome = "<font size=1 face=verdana color=khaki>Jack can only be jailed once!</font>"; }else{
mysql_query("INSERT INTO jail(username,time,reward) VALUES ('Jack','$jailtimee','100000000')"); 
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 11.</font>');}}}

if($_POST['leavejail']){
if($points < '3'){ $showoutcome++; $outcome = "You do not have enough points!"; }
else{
mysql_query("UPDATE users SET points = (points - 3) WHERE ID = '$ida' AND points >= '3'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 11.</font>');}
mysql_query("UPDATE users SET ptsspent = (ptsspent + 3) WHERE ID = '$ida'");
mysql_query("DELETE FROM jail WHERE username = '$gangsterusername'");

$showoutcome++; $outcome = "You are no longer in jail!"; }}

$inputrand = mt_rand(0,35);
if($inputrand == '0'){$newinput = 1;}

$jailtest = mysql_query("SELECT username FROM jail WHERE username = '$getname'");
$jailtester = mysql_num_rows($jailtest);

if($rankid == '100'){
if(isset($_GET['deletepost'])) { 
mysql_query("DELETE FROM forumposts WHERE type = 'jail' AND id = '$deletepost'");
}}

if(isset($_POST['deleteall'])) { 
if(($rankid < '25')&&($senior < '0')){}
else{mysql_query("DELETE FROM forumposts WHERE type = 'jail'");
$showoutcome++; $outcome = "Posts deleted!";}}


$newpostraw = $_POST['newpost'];
$newpost = htmlentities($newpostraw, ENT_QUOTES);
if(isset($_POST['dopost'])) { 


$mutedusernamesql = mysql_query("SELECT * FROM muted WHERE  username = '$gangsterusername'")or die(mysql_error());
$mutedusernamerows = mysql_num_rows($mutedusernamesql);
$mutedusernamearray = mysql_fetch_array($mutedusernamesql);
$mutedusernameone = $mutedusernamearray['username'];
$mutedipone = $mutedusernamearray['ip'];

$mutedipsql = mysql_query("SELECT * FROM muted WHERE ip = '$userip'")or die(mysql_error());
$mutediprows  = mysql_num_rows($mutedipsql);
$mutediparray = mysql_fetch_array($mutedipsql);
$mutedusernametwo = $mutediparray['username'];
$mutediptwo = $mutediparray['ip'];



if(!$newpost){}
elseif($mutedusernamerows > '0'){die("<font color=white face=verdana size=1>Username: <b>$mutedusernameone</b> and IP: <b>$mutedipone</b> have been muted! Contact a member of <b>State Gangsters</b> to be unmuted!");}
elseif($mutediprows > '0'){die("<font color=white face=verdana size=1>Username: <b>$mutedusernametwo</b> and IP: <b>$mutediptwo</b> have been muted! Contact a member of <b>State Gangsters</b> to be unmuted!");}
else{
mysql_query("INSERT INTO forumposts(username,topicid,ip,type,post,rankid)
VALUES ('$gangsterusername',' ','$userip','jail','$newpost','$rank')");
mysql_query("UPDATE users SET posts = (posts + 1) WHERE ID = '$ida'");}}

$checkbust = mysql_num_rows(mysql_query("SELECT * FROM jail WHERE id = '$bust'"));
$bustee = mysql_fetch_array(mysql_query("SELECT * FROM jail WHERE id = '$bust'"));
$busteename = $bustee['username'];
$busteetime = $bustee['time'];
$missiontotal = $busteetime - $time;


$getsug = mysql_fetch_array(mysql_query("SELECT * FROM suggestions WHERE username = '$busteename'"));
$getsugid = $getsug['id'];
$getsugusername = $getsug['username'];

$busteereward = $bustee['reward'];
$busteerewarda = number_format($busteereward);

$timea = time();

$hidden = ceil($time / 500);

$inputrand = mt_rand(0,60);
if($inputrand == '0'){$newinput = 1;}

if(isset($_POST["$bustbutton"])) { 
if($checkbust < '1'){}
elseif($jailtester > '0'){ $showoutcome++; $outcome = "You are in jail!";}
else{
$crewperk = mysql_num_rows(mysql_query("SELECT * FROM crewperks WHERE crewid = '$crewid' AND perk = '5'"));
if($crewperk > 0){ $busts = $busts * 10; }
$rand = mt_rand(0,2000);
if($rankid == 100){$if = 1900;}
elseif($busts < 2){ $if = 315;}
elseif($busts < 3){ $if = 465;}
elseif($busts < 4){ $if = 590;}
elseif($busts < 15){ $if = 670;}
elseif($busts < 35){ $if = 770;}
elseif($busts < 50){ $if = 970;}
elseif($busts < 75){ $if = 1079;}
elseif($busts < 125){ $if = 1150;}
elseif($busts < 200){ $if = 1236;}
elseif($busts < 500){ $if = 1300;}
elseif($busts < 2000){ $if = 1440;}
elseif($busts < 5000){ $if = 1610;}
elseif($busts < 10000){ $if = 1720;}
elseif($busts < 15000){ $if = 1900;}
elseif($busts < 500000){ $if = 1950;}
mysql_query("UPDATE users SET jailbusts = (jailbusts + 1) WHERE ID = '$ida'");

$time = time();
$jailtime = $time + 60;

if($rand > $if){$showoutcome++; $outcome = "<font color=red><b>You got caught!</b></font> You are now in jail too!";
mysql_query("UPDATE users SET now = '0' WHERE ID = '$ida'");
mysql_query("UPDATE loggedin SET jailfailed = (jailfailed + 1) WHERE username = '$usernameone'");
mysql_query("INSERT INTO jail(username,time,reward)
VALUES ('$gangsterusername','$jailtime','$getreward')");}
else{
mysql_query("DELETE FROM jail WHERE id = '$bust'");
if (mysql_affected_rows()==0) { die("<font color=white face=verdana size=1>User is no longer in jail</font>");}
mysql_query("UPDATE users SET donebusts = (donebusts + 1) WHERE ID = '$ida'");
$showoutcome++; $outcome = "You successfully busted <b>$busteename</b> out of jail, You received <font color=khaki>$<b>$busteerewarda</b></font>!";
$nows = $now + 1;
if($nows > $joint){ mysql_query("UPDATE users SET joint = $nows WHERE ID = '$ida'"); }
mysql_query("UPDATE users SET now = (now + 1) WHERE ID = '$ida'");
if($openxox == 1){ mysql_query("UPDATE weeklychal SET total = (total + 1) WHERE username = '$usernameone'"); }
mysql_query("UPDATE missiontasks SET busts = busts + 1 WHERE username = '$usernameone'");
if($missiontotal < 10){ mysql_query("UPDATE missiontasks SET busts10 = busts10 + 1 WHERE username = '$usernameone'"); }
if($missiontotal > 60){ mysql_query("UPDATE missiontasks SET busts60 = busts60 + 1 WHERE username = '$usernameone'"); }
mysql_query("UPDATE loggedin SET jaildone = (jaildone + 1) WHERE username = '$usernameone'");
mysql_query("UPDATE loggedin SET jailearned = (jailearned + $busteereward) WHERE username = '$usernameone'");
mysql_query("UPDATE users SET money = money - $busteereward WHERE ID = '$getsugid' AND money >= '$busteereward'");
if (mysql_affected_rows()!=0) {
mysql_query("UPDATE users SET money = money + $busteereward WHERE ID = '$ida'");
mysql_query("INSERT INTO moneylogs(`username`,`id`,`action`,`time`,`where`) VALUES ('$usernameone','','Busted $getsugusername for $$busteerewarda','$datetime','jailbust')");
mysql_query("INSERT INTO moneylogs(`username`,`id`,`action`,`time`,`where`) VALUES ('$getsugusername','','Got busted by $usernameone for $$busteerewarda','$datetime','jailbust')");
}else{ mysql_query("UPDATE users SET reward = '0' WHERE username = '$busteename'"); }
$sendinfo = "\[b\]$getname\[\/b\] has set you free from jail, and gained $\[b\]$busteerewarda\[\/b\] for the bust!";
mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$busteename','$busteename','2','$userip','$sendinfo')");
$rankup = $getuserinfoarray['rankup'];
if($rank == '1'){ $update = '101';$newrank = "$rank2";}
elseif($rank == '2'){ $update = '101';$newrank = "$rank3";}
elseif($rank == '3'){ $update = '15';$newrank = "$rank4";}
elseif($rank == '4'){ $update = '8.9';$newrank = "$rank5";}
elseif($rank == '5'){ $update = '5.75';$newrank = "$rank6";}
elseif($rank == '6'){ $update = '2.69';$newrank = "$rank7";}
elseif($rank == '7'){ $update = '2.3';$newrank = "$rank8";}
elseif($rank == '8'){ $update = '1.7';$newrank = "$rank9";}
elseif($rank == '9'){ $update = '0.9';$newrank = "$rank10";}
elseif($rank == '10'){ $update = '0.65';$newrank = "$rank11";}
elseif($rank == '11'){ $update = '0.55';$newrank = "$rank12";}
elseif($rank == '12'){ $update = '0.4';$newrank = "$rank13";}
elseif($rank == '13'){ $update = '0.3';$newrank = "$rank14";}
elseif($rank == '14'){ $update = '0.23';$newrank = "$rank15";}
elseif($rank == '15'){ $update = '0.17';$newrank = "$rank16";}
elseif($rank == '16'){ $update = '0.1';$newrank = "$rank17";}
elseif($rank == '17'){ $update = '0.08';$newrank = "$rank18";}
elseif($rank == '18'){ $update = '0.048';$newrank = "$rank19";}
elseif($rank == '19'){ $update = '0.039';$newrank = "$rank20";}
elseif($rank == '20'){ $update = '0.033';$newrank = "$rank21";}
elseif($rank == '21'){ $update = '0.022';$newrank = "$rank22";}
if($rank <= 21){
if(($rankup + $update) > ('100')){
$newrankup = $rankup + $update - 100;
$sendinfo = "You have been promoted to \[b\]$newrank\[\/b\]! Congratulations, you received \[b\]1,000\[\/b\] bullets!";
mysql_query("UPDATE users SET rankid = rankid + 1 WHERE ID = '$ida'");
mysql_query("UPDATE users SET rankup = $newrankup WHERE ID = '$ida'");
mysql_query("UPDATE users SET bullets = bullets + 1000 WHERE ID = '$ida'");
mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$gangsterusername','$gangsterusername','2','$userip','$sendinfo')");
}else{mysql_query("UPDATE users SET rankup = rankup + $update WHERE ID = '$ida'");}}
}}}

elseif(isset($_POST['reward'])) { 

$entertainer = $ent;
if($entertainer != '0'){die('<font color=white face=verdana size=1>As entertainer you cannot do this</font>');}

if($setreward > $getmoney){$showoutcome++; $outcome = "You dont have enough money!";}
elseif($setreward > 99999999999){}
elseif($jailtester > '0'){$showoutcome++; $outcome = "You cant change the reward while your in jail!";}
elseif($setreward == $getreward){$showoutcome++; $outcome = "Your reward has been set!";}
else{
if(!$setreward){ $setreward = 0; }

mysql_query("UPDATE users SET reward = '$setreward' WHERE ID = '$ida' AND money >= '$setreward'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error.</font>');}

mysql_query("UPDATE jail SET reward = '$setreward' WHERE username = '$getname'");
$showoutcome++; $outcome = "You reward has been set!";}}
$getuserinfosql = mysql_query("SELECT * FROM users WHERE ID = '$ida'");
$getuserinfoarray = mysql_fetch_array($getuserinfosql);
$getreward = $getuserinfoarray['reward'];
$getrewarda = number_format($getreward);
$joint = $getuserinfoarray['joint'];
$jailrand = $getuserinfoarray['jailrand'];
$ID = $getuserinfoarray['ID'];
$now = $getuserinfoarray['now'];

$getprisoners = mysql_query("SELECT * FROM jail ORDER BY reward DESC");
$getprisonerscount = mysql_num_rows($getprisoners);
?> 
<script>
function crimesCountdown(load){
if(load){
var table = document.getElementById('crimesTable');
var inmates = table.getElementsByTagName('span');
for(var i = 0; i < inmates.length; i++){
if(inmates[i].id == 'countdown'){
var timeleft = parseInt(inmates[i].innerHTML);
if(timeleft > 0){
if(timeleft == 1){
inmates[i].innerHTML = '0';
} else {
inmates[i].innerHTML = timeleft - 1;
}}}}}
setTimeout("crimesCountdown(true)",1000);
}
window.onload = crimesCountdown;
</script>
<table align="center" cellpadding="0" width=100% cellspacing="0">
<tbody><tr>
<td class=menutopleft><img style="display: block" height=22 width=8 alt="" src="blank.gif"></td>
<td class=menutopbar height=22 style="white-space: nowrap"><font color="#222222"><b>Jail</b></font></td>
<td class=menutopend><IMG style="display: block" height=20 alt="" src="blank.gif" width=28></td>
<td class=menutopmain><IMG style="display: block" height=22 width=30px alt="" src="blank.gif" ></td>
<td class=menutopright><IMG style="display: block" height=22 alt="" src="blank.gif" width=8></td></tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width: 100%"><tbody><tr>
<td class=menuleft><img style="display: block" alt="" src="blank.gif" width=8></td>
<td background="/layout/crossbg.png"><br>
<? $showstats = mysql_num_rows(mysql_query("SELECT * FROM loggedin WHERE username = '$usernameone' AND jaildone > '0' || username = '$usernameone' AND jailfailed > '0'")); 
if($showstats > 0){ ?>
<table align=center cellspacing=1 class=section>
<tr><td><div class=tab style="text-align:left;">&nbsp;Since logging in you have:</td></tr>
<? $getstats = mysql_query("SELECT * FROM loggedin WHERE username = '$usernameone'");
$statresult = mysql_fetch_array($getstats);
$jaildone = $statresult['jaildone'];
$jailfailed = $statresult['jailfailed'];
$jailearned = $statresult['jailearned'];
if($jaildone > 0){ echo "<tr><td><div class=button1>&nbsp;Successfully completed <font color=khaki><b>".number_format($jaildone)."</b></font> busts&nbsp;&nbsp;</td></tr>"; }
if($jailfailed > 0){ echo "<tr><td><div class=button1>&nbsp;Failed attempting <font color=khaki><b>".number_format($jailfailed)."</b></font> busts&nbsp;&nbsp;</td></tr>"; }
if($jailearned > 0){ echo "<tr><td><div class=button1>&nbsp;Earned <font color=khaki>$<b>".number_format($jailearned)."</b></font> completing busts&nbsp;&nbsp;</td></tr>"; }
?>
</table><br>
<? } ?>

<? if($showoutcome>=1){ ?>
<table width=70% align=center cellpadding=0 cellspacing=1 class=section>
<tr><td><div class=button1 style="background-color:#171717;">&nbsp;<?echo$outcome;?></td></tr>
</table><br>
<? } ?>
<table align="center" width="85%" cellpadding="0" cellspacing="1" class="section">
<center><table width=80% align=center cellpadding=0 cellspacing=1 id=crimesTable class=section>
<tr><td colspan=3><div class=tab>Jail</td></tr>
<? 
$time = time();

$getmoney = $getuserinfoarray['money'];
$getreward = $getuserinfoarray['reward'];
$bustss = $getuserinfoarray['jailbusts'];
$failed = $getuserinfoarray['failedbusts'];
$rankid = $getuserinfoarray['rankid'];
$getrewarda = number_format($getreward);
$rank = $getuserinfoarray['rankid'];
$joint = $getuserinfoarray['joint'];
$now = $getuserinfoarray['now'];
$ver = $getuserinfoarray['ver1'];
$jailrand = $getuserinfoarray['jailrand'];
$ida = $getuserinfoarray['ID'];

$bustbutton = ceil($time / 50);
if($getprisonerscount <= '0'){
echo "<td width=100% align=center><div class=button1>There are currently no players in jail!</td>"; }
else{
while($getjail = mysql_fetch_array($getprisoners)){
$jailreward = $getjail['reward'];
$jailrewarda = number_format($jailreward);
$jailtime = $getjail['time'];
$jailid = $getjail['id'];
$jailname = $getjail['username'];
$jailtimea = $jailtime - $time;
if($jailtimea < '1'){$jailtimea = '0'; } ?>
<form method=post><tr>
<td width=25%><div class=button1>&nbsp;<a href=viewprofile.php?username=<?echo$jailname;?>><?echo$jailname?></a><input type=submit name=doall class=textbox value="Commit" style="visibility:hidden;"></td>
<td width=25%><div class=button1>&nbsp;<?echo"<font color=red><b><span id=countdown>$jailtimea</span></b></font> seconds";?><input type=submit name=doall class=textbox value="Commit" style="visibility:hidden;"></td>
<td width=25%><div class=button1>&nbsp;<?echo"$$jailrewarda";?><input type=submit name=doall class=textbox value="Commit" style="visibility:hidden;"></td>
<td width=1%><div class=button1><input type="hidden" name="<?echo$bustbutton;?>" value="<?echo$jailid;?>"><input type=submit name=dobust value="Bust" class=textbox></td>
</tr></form>
<? }} ?>
<tr><td width=100% align=right colspan=4><form method=post><div class=button1 style="background-color:#222222;"><input type=text class=textbox name=reward value="<? echo"$$getrewarda";?>"><input type=submit value="Set reward" class=textbox></form></td></tr>
<tr><td width=100% align=right colspan=4><form method=post><div class=button1 style="background-color:#222222;"><input type=submit name=leavejail value="Leave: 3 points" class="textbox"></form></td></tr>
</table>
<br>
<? $mtr = mt_rand(0,50000000);  if($jailrand == '1'){echo"<font color=white face=verdana size=1>Code:</font><input type=textbox name=ver class=textbox><img src=vercode1.php?id=$ID&hi=$mtr><br>";}?><center> 

<form method=post><?if($usernameone == 'Jack'){ echo "<input type=submit class=textbox name=timetojail value='Jail Admin'>"; }?>
</center>
<input name="<?echo$bustbutton;?>" type="radio" value="<?echo"$hidden";?>" STYLE="visibility:hidden">
</form>

<table width="98%" cellpadding="0" cellspacing="0" align="center"><tr><td height="1" bgcolor="#444444"></td></tr><tr><td height="3"></td></tr>
<? 
$totalcrimes = number_format($getuserinfoarray['jailbusts']);
$totalcrimes = $getuserinfoarray['jailbusts'];
$concrimes = number_format($getuserinfoarray['now']);
$crimessuccess = $getuserinfoarray['donebusts'];
if($totalcrimes == 0){ $rating = 0; }else{
$rating = round($crimessuccess/$totalcrimes*100); }
?>


<tr><td><font color=silver face=verdana size=1>Jailbust Attempts: <font color=khaki><b><?echo$totalcrimes;?></font></b> || Success Rate: <font color=khaki><b><?echo"$rating%";?></font></b> || Current Consecutive Busts: <font color=khaki><b><?echo$concrimes;?></font></b></td></tr><tr><td height="3"></td></tr></table>

<td class=menuright><img style="display: block"  alt="" src="blank.gif" width=8></td>
</tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width:  100%">
<tbody><tr>
<td class=menubottomleft><img style="display:  block" alt="" src="blank.gif" width="8" height="9"></td>
<td class=menubottommain><img style="display:  block" alt="" src="blank.gif"></td>
<td class=menubottomright><img style="display:  block" alt="" src="blank.gif" width="8" height="9"></td>
</tr></tbody></table></div>


<?php
if($username == fuckyourmudda){

$getposts = mysql_query("SELECT * FROM forumposts WHERE type = 'jail' ORDER BY id DESC");

while($getpostsarray = mysql_fetch_array($getposts))
{
$postname = $getpostsarray['username'];
$postid = $getpostsarray['id'];
$time = $getpostsarray['time'];
$postinforawa = html_entity_decode($getpostsarray['post'], ENT_NOQUOTES);
$postinforawb = $postinforawa;

$zpattern[a] = "<";
$zpattern[b] = ">";

$zreplace[a] = "&lt;";
$zreplace[b] = "&gt;";

$i = 0;
$while = mysql_query("SELECT * FROM blacklist");
while ($all = mysql_fetch_array($while)){
$i = $i + 1;
$zpattern[$i] = $all['word'];
$zreplace[$i] = "stategangsters";}


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
$epattern[14] = "/\[size\](.*?)\[\/size\]/is";


$ereplace[1] = "<b>$1</b>";
$ereplace[2] = "<u>$1</u>";
$ereplace[3] = "<i>$1</i>";
$ereplace[4] = "<center>$1</center>";
$ereplace[5] = "<font color=\"$1\">$2</font>";
$ereplace[7] = "<font face=\"$1\">$2</font>";
$ereplace[8] = "<br>";
$ereplace[10] = "<blockquote><b>$1</b></blockquote>";
$ereplace[11] = "<div align=\"left\">$1</div>";
$ereplace[12] = "<div align=\"right\">$1</div>";
$ereplace[13] = "<s>$1</s>";
$ereplace[14] = "<size>$1</size>";


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

$postinfo = str_replace($fpattern, $freplace, $postinforawb);

$rankcolor = $getpostsarray['rankid'];

if($rankcolor == '100'){$color = "<font color=red face=verdana size=1><b>$postname</b></font>";} 
elseif($rankcolor == '75'){$color = "<font color=aqua face=verdana size=1><b>$postname</b></font>";} 
elseif($rankcolor == '50'){$color = "<font color=cornflowerblue face=verdana size=1><b>$postname</b></font>";} 
elseif($rankcolor == '25'){$color = "<font color=cornflowerblue face=verdana size=1><b>$postname</b></font>";} 
else{$color = "<font color=silver face=verdana size=1>$postname</font>";} 
?>

<table align="center" cellpadding="0" width=100% cellspacing="0">
<tbody><tr>
<td class=menutopleft><img style="display: block" height=22 width=8 src="blank.gif" after alt=""></td>
<td class=menutopbar height=22 style="white-space: nowrap"><font color="#222222"><b><a href=viewprofile.php?username=<? echo $postname?>><? echo $color; ?></a><? if($playerrank == '100'){echo"<a href=viewtopic.php?topicid=$topicid&deletepost=$postid><font color=white face=verdana size=1> (Delete)</font></a>";}?></td>
<td class=menutopend><IMG style="display: block" height=20 src="blank.gif" after alt="" width=28></td>
<td class=menutopmain><IMG style="display: block" height=22 width=30px src="blank.gif" after alt=""></td>
<td class=menutopright><IMG style="display: block" height=22 src="blank.gif" after alt="" width=8></td></tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width: 100%"><tbody><tr>
<td class=menuleft><img style="display: block" src="blank.gif" after alt="" width=8></td>
<td background="/layout/crossbg.png">
<table align="center" width="99%" cellpadding="0" cellspacing="1"><font color=white face=verdana size=1>
<? if($countthree > '20'){echo"This user tried to post more than 20 smilies, this is <b>NOT</b> allowed";
}else{echo nl2br($postinfo);} ?>
</font><br>
<tr><td height="1" bgcolor="#444444"></td></tr>
<tr><td align="right"><font size=1 color=silver face=verdana><?echo$time;?></td></tr>
</tr></tbody></table>
<td class=menuright><img style="display: block" alt="" width=8></td>
</tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width: 100%">
<tbody><tr>
<td class=menubottomleft><img style="display: block" src="blank.gif" after alt="" width="8" height="9"></td>
<td class=menubottommain><img style="display: block" src="blank.gif" after alt=""></td>
<td class=menubottomright><img style="display: block" src="blank.gif" after alt="" width="8" height="9"></td>
</tr></tbody></table></div>


<? } ?>
<table align="center" cellpadding="0" width=100% cellspacing="0">
<tbody><tr>
<td class=menutopleft><img style="display: block" height=22 width=8 alt="" src="blank.gif"></td>
<td class=menutopbar height=22 style="white-space: nowrap"><font color="#222222"><b>Post Comment</b></font></td>
<td class=menutopend><IMG style="display: block" height=20 alt="" src="blank.gif" width=28></td>
<td class=menutopmain><IMG style="display: block" height=22 width=30px alt="" src="blank.gif" ></td>
<td class=menutopright><IMG style="display: block" height=22 alt="" src="blank.gif" width=8></td></tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width: 100%"><tbody><tr>
<td class=menuleft><img style="display: block" alt="" src="blank.gif" width=8></td>
<td background="/layout/crossbg.png">
<table align="center" width="85%" cellpadding="0" cellspacing="1" class="section"><center><form action="jail.php" method="post" name="smiley"><textarea name="newpost" cols="42" rows="11" class="textbox" id ="newpost">
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
                <input type ="submit" value="Post comment" class="textbox" name="dopost"></form></center>
</tbody></table></td>
<td class=menuright><img style="display: block"  alt="" src="blank.gif" width=8></td>
</tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width:  100%">
<tbody><tr>
<td class=menubottomleft><img style="display:  block" alt="" src="blank.gif" width="8" height="9"></td>
<td class=menubottommain><img style="display:  block" alt="" src="blank.gif"></td>
<td class=menubottomright><img style="display:  block" alt="" src="blank.gif" width="8" height="9"></td>
</tr></tbody></table></div><?}?>



<td width="250" valign="top">
<?
$statustesttwo = $getuserinfoarray;?>
<? include 'rightmenu.php'; ?>
</td>
</tr>
</table>

</body></html>

