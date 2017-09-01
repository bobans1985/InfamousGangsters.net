<? include 'included.php'; session_start(); ?>

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
<? include 'leftmenu.php'; ?>
</td>
<td width="100%" valign="top">
<?php
$saturate = "/[^a-z0-9]/i";
$saturated = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$userip = $_SERVER[REMOTE_ADDR]; 
$gangsterusername = $usernameone;
$playerrank = $myrank;
$playerarray =$statustesttwo;
$playerrank = $playerarray['rankid'];
$crewid = $playerarray['crewid'];
$nowtime = time();


$check = mysql_num_rows(mysql_query("SELECT * FROM dailyrewards WHERE username = '$usernameone'"));
if($check < 1){ mysql_query("INSERT INTO `dailyrewards` (id,username) VALUES ('','$usernameone')"); }

$getdr = mysql_query("SELECT * FROM dailyrewards WHERE username = '$usernameone'");
$dorows = mysql_fetch_array($getdr);
$collected = $dorows['collected'];
$consecutive = $dorows['consecutive'];
$tryme = gmdate('Y-m-d');

if($collected == '0000-00-00' || (strtotime($tryme) - strtotime($collected)) >= 172800){ mysql_query("UPDATE dailyrewards SET consecutive = '0' WHERE username = '$usernameone'"); 

$getdr = mysql_query("SELECT * FROM dailyrewards WHERE username = '$usernameone'");
$dorows = mysql_fetch_array($getdr);
$collected = $dorows['collected'];
$consecutive = $dorows['consecutive'];
$tryme = gmdate('Y-m-d');
}
if($consecutive == 5){ mysql_query("UPDATE dailyrewards SET consecutive = '0' WHERE username = '$usernameone'");

$getdr = mysql_query("SELECT * FROM dailyrewards WHERE username = '$usernameone'");
$dorows = mysql_fetch_array($getdr);
$collected = $dorows['collected'];
$consecutive = $dorows['consecutive'];
$tryme = gmdate('Y-m-d');
}

if($_POST['getreward']){
if($collected != '0000-00-00' AND (strtotime($tryme) - strtotime($collected)) <= 0){ $showoutcome++; $outcome = "You have already received your reward today! Try again tomorrow."; }
else{
if($collected == '0000-00-00' || (strtotime($tryme) - strtotime($collected)) == 86400){ mysql_query("UPDATE dailyrewards SET consecutive = consecutive + '1' WHERE username = '$usernameone'"); }
mysql_query("UPDATE dailyrewards SET collected = '$tryme' WHERE username = '$usernameone'");

if($consecutive == 0){
$dayonerand = rand(1,5);
if($dayonerand == 1){ mysql_query("UPDATE users SET money = money + '500000' WHERE username = '$usernameone'"); $thereward = "$".number_format(500000).""; }
if($dayonerand == 2){ mysql_query("UPDATE users SET money = money + '1000000' WHERE username = '$usernameone'"); $thereward = "$".number_format(1000000).""; }
if($dayonerand == 3){ mysql_query("UPDATE users SET money = money + '2000000' WHERE username = '$usernameone'"); $thereward = "$".number_format(2000000).""; }
if($dayonerand == 4){ mysql_query("UPDATE users SET bullets = bullets + '150' WHERE username = '$usernameone'"); $thereward = "".number_format(150)." bullets"; }
if($dayonerand == 5){ mysql_query("UPDATE users SET bullets = bullets + '300' WHERE username = '$usernameone'"); $thereward = "".number_format(300)." bullets"; }
}

if($consecutive == 1){
$daytworand = rand(1,5);
if($daytworand == 1){ mysql_query("UPDATE users SET money = money + '3000000' WHERE username = '$usernameone'"); $thereward = "$".number_format(3000000).""; }
if($daytworand == 2){ mysql_query("UPDATE users SET money = money + '4000000' WHERE username = '$usernameone'"); $thereward = "$".number_format(4000000).""; }
if($daytworand == 3){ mysql_query("UPDATE users SET bullets = bullets + '500' WHERE username = '$usernameone'"); $thereward = "".number_format(500)." bullets"; }
if($daytworand == 4){ mysql_query("UPDATE users SET bullets = bullets + '750' WHERE username = '$usernameone'"); $thereward = "".number_format(750)." bullets"; }
if($daytworand == 5){ mysql_query("UPDATE users SET points = points + '50' WHERE username = '$usernameone'"); $thereward = "".number_format(50)." points"; }
}

if($consecutive == 2){
$daythreerand = rand(1,5);
if($daythreerand == 1){ mysql_query("UPDATE users SET money = money + '5000000' WHERE username = '$usernameone'"); $thereward = "$".number_format(5000000).""; }
if($daythreerand == 2){ mysql_query("UPDATE users SET money = money + '6000000' WHERE username = '$usernameone'"); $thereward = "$".number_format(6000000).""; }
if($daythreerand == 3){ mysql_query("UPDATE users SET bullets = bullets + '1000' WHERE username = '$usernameone'"); $thereward = "".number_format(1000)." bullets"; }
if($daythreerand == 4){ mysql_query("UPDATE users SET bullets = bullets + '1500' WHERE username = '$usernameone'"); $thereward = "".number_format(1500)." bullets"; }
if($daythreerand == 5){ mysql_query("UPDATE users SET points = points + '100' WHERE username = '$usernameone'"); $thereward = "".number_format(100)." points"; }
}

if($consecutive == 3){
$dayfourrand = rand(1,6); if($crewid > 0){ $dayfourrand = rand(1,8); }
if($dayfourrand == 1){ mysql_query("UPDATE users SET money = money + '7000000' WHERE username = '$usernameone'"); $thereward = "$".number_format(7000000).""; }
if($dayfourrand == 2){ mysql_query("UPDATE users SET money = money + '8000000' WHERE username = '$usernameone'"); $thereward = "$".number_format(8000000).""; }
if($dayfourrand == 3){ mysql_query("UPDATE users SET bullets = bullets + '2000' WHERE username = '$usernameone'"); $thereward = "".number_format(2000)." bullets"; }
if($dayfourrand == 4){ mysql_query("UPDATE users SET bullets = bullets + '2500' WHERE username = '$usernameone'"); $thereward = "".number_format(2500)." bullets"; }
if($dayfourrand == 5){ mysql_query("UPDATE users SET points = points + '150' WHERE username = '$usernameone'"); $thereward = "".number_format(150)." points"; }
if($dayfourrand == 6){ mysql_query("UPDATE users SET refpoints = refpoints + '1' WHERE username = '$usernameone'"); $thereward = "".number_format(1)." referral point"; }
if($dayfourrand == 7 || $dayfourrand == 8){ $perkrand = rand(1,6); $times = $nowtime + 7200; $perk1 = mysql_num_rows(mysql_query("SELECT * FROM crewperks WHERE crewid = '$crewid' AND perk = '$perkrand'"));
if($perk1 > 0){ mysql_query("UPDATE crewperks SET timer = (timer + 7200) WHERE crewid = '$crewid' AND perk = '$perkrand'"); }
else{ mysql_query("INSERT INTO `crewperks` (crewid,perk,timer) VALUES ('$crewid','$perkrand','$times')"); } $thereward = "2 hours of crew perk $perkrand"; }
}

if($consecutive == 4){
$dayfiverand = rand(1,6); if($crewid > 0){ $dayfiverand = rand(1,8); }
if($dayfiverand == 1){ mysql_query("UPDATE users SET money = money + '9000000' WHERE username = '$usernameone'"); $thereward = "$".number_format(9000000).""; }
if($dayfiverand == 2){ mysql_query("UPDATE users SET money = money + '10000000' WHERE username = '$usernameone'"); $thereward = "$".number_format(10000000).""; }
if($dayfiverand == 3){ mysql_query("UPDATE users SET bullets = bullets + '3000' WHERE username = '$usernameone'"); $thereward = "".number_format(3000)." bullets"; }
if($dayfiverand == 4){ mysql_query("UPDATE users SET bullets = bullets + '3500' WHERE username = '$usernameone'"); $thereward = "".number_format(3500)." bullets"; }
if($dayfiverand == 5){ mysql_query("UPDATE users SET points = points + '200' WHERE username = '$usernameone'"); $thereward = "".number_format(200)." points"; }
if($dayfiverand == 6){ mysql_query("UPDATE users SET refpoints = refpoints + '2' WHERE username = '$usernameone'"); $thereward = "".number_format(2)." referral points"; }
if($dayfiverand == 7 || $dayfiverand == 8){ $perkrand = rand(1,6); $times = $nowtime + 14400; $perk1 = mysql_num_rows(mysql_query("SELECT * FROM crewperks WHERE crewid = '$crewid' AND perk = '$perkrand'"));
if($perk1 > 0){ mysql_query("UPDATE crewperks SET timer = (timer + 14400) WHERE crewid = '$crewid' AND perk = '$perkrand'"); }
else{ mysql_query("INSERT INTO `crewperks` (crewid,perk,timer) VALUES ('$crewid','$perkrand','$times')"); } $thereward = "4 hours of crew perk $perkrand"; }
}

$showoutcome++; $outcome = "Welcome back! Your daily reward was $thereward!";
}}
?> 
<table align="center" cellpadding="0" width=100% cellspacing="0">
<tbody><tr>
<td class=menutopleft><img style="display: block" height=22 width=8 src="blank.gif" after alt="" src="blank.gif"></td>
<td class=menutopbar height=22 style="white-space: nowrap"><font color="#222222"><b>Daily Rewards</b></font></td>
<td class=menutopend><IMG style="display: block" height=20 src="blank.gif" after alt="" src="blank.gif" width=28></td>
<td class=menutopmain><IMG style="display: block" height=22 width=30px src="blank.gif" after alt="" src="blank.gif" ></td>
<td class=menutopright><IMG style="display: block" height=22 src="blank.gif" after alt="" src="blank.gif" width=8></td></tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width: 100%"><tbody><tr>
<td class=menuleft><img style="display: block" src="blank.gif" after alt="" src="blank.gif" width=8></td>
<td background="/layout/crossbg.png"><br>
<? if($showoutcome>=1){ ?>
<table width=70% align=center cellpadding=0 cellspacing=1 class=section>
<tr><td><div class=button1 style="background-color:#171717;">&nbsp;<?echo$outcome;?></td></tr>
</table><br>
<? } ?>
<? 
if($consecutive == 0){ $day1 = "<input type=submit name=getreward class=textbox value=Claim>"; $day1bg = "#222222"; }else{ $day1 = "n/a"; $day1bg = "#282828"; }
if($consecutive == 1){ $day2 = "<input type=submit name=getreward class=textbox value=Claim>"; $day2bg = "#222222"; }else{ $day2 = "n/a"; $day2bg = "#282828"; }
if($consecutive == 2){ $day3 = "<input type=submit name=getreward class=textbox value=Claim>"; $day3bg = "#222222"; }else{ $day3 = "n/a"; $day3bg = "#282828"; }
if($consecutive == 3){ $day4 = "<input type=submit name=getreward class=textbox value=Claim>"; $day4bg = "#222222"; }else{ $day4 = "n/a"; $day4bg = "#282828"; }
if($consecutive == 4){ $day5 = "<input type=submit name=getreward class=textbox value=Claim>"; $day5bg = "#222222"; }else{ $day5 = "n/a"; $day5bg = "#282828"; }
?>
<table width=90%" class="section" align=center><form method=post>
<tr><td width=20%><div class="tab">Day 1</td><td width=20%><div class="tab">Day 2</td><td width=20%><div class="tab">Day 3</td><td width=20%><div class="tab">Day 4</td><td width=20%><div class="tab">Day 5</td></tr>
<tr><td align=center><div class=button1 style='background-color:<?echo$day1bg;?>;'><br><br><?echo$day1;?><br><br><br></td><td align=center><div class=button1 style='background-color:<?echo$day2bg;?>;'><br><br><?echo$day2;?><br><br><br></td><td align=center><div class=button1 style='background-color:<?echo$day3bg;?>;'><br><br><?echo$day3;?><br><br><br></td><td align=center><div class=button1 style='background-color:<?echo$day4bg;?>;'><br><br><?echo$day4;?><br><br><br></td><td align=center><div class=button1 style='background-color:<?echo$day5bg;?>;'><br><br><?echo$day5;?><br><br><br></td></tr>
</form></table><br>
<td class=menuright><img style="display: block"  src="blank.gif" after alt="" src="blank.gif" width=8></td>
</tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width:  100%">
<tbody><tr>
<td class=menubottomleft><img style="display:  block" src="blank.gif" after alt="" src="blank.gif" width="8" height="9"></td>
<td class=menubottommain><img style="display:  block" src="blank.gif" after alt="" src="blank.gif"></td>
<td class=menubottomright><img style="display:  block" src="blank.gif" after alt="" src="blank.gif" width="8" height="9"></td>
</tr></tbody></table></div>
</td>
<td width="250" valign="top">
<? include 'rightmenu.php'; ?>
</td>
</tr>
</table>

</body></html>

