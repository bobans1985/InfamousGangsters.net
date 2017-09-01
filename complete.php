<? include 'included.php'; session_start(); ?>

<html>
<head>
<title>:: Tough Dons</title><link rel="stylesheet" href="layout/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
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
$getkeycode = $_POST['CovNum'];
$getprice = $_POST['price'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$userip = $_SERVER[REMOTE_ADDR]; 
$gangsterusername = $usernameone;
$playerrank = $myrank;
$playerarray =$statustesttwo;
$playerrank = $playerarray['rankid'];
$todays = gmdate('Y-m-d');

if($_POST['CovNum'] AND $_POST['price'] AND $_POST['Password']){
$codedup = mysql_num_rows(mysql_query("SELECT * FROM smsphone WHERE code = '$getkeycode'"));
$limit30 = mysql_num_rows(mysql_query("SELECT * FROM smsphone WHERE username = '$usernameone' AND time = '$todays'"));
if($codedup > 0){ $showoutcome++; $outcome = "<font size=1 face=verdana color=white>This keycode has already been used!"; }
elseif($limit30 >= 5){ $showoutcome++; $outcome = "<font size=1 face=verdana color=white>You have reached the limit for today, use this code again tomorrow! ($getkeycode)"; }
else{
if($getprice == "1.50"){ $pointsadd = 105; }
elseif($getprice == "3.00"){ $pointsadd = 220; }
elseif($getprice == "4.50"){ $pointsadd = 340; }
elseif($getprice == "6.00"){ $pointsadd = 460; }
elseif($getprice == "7.50"){ $pointsadd = 575; }
elseif($getprice == "9.00"){ $pointsadd = 700; }
$totaladd = $pointsadd * 2;
mysql_query("UPDATE users SET points = points + $totaladd WHERE ID = '$ida'");
mysql_query("INSERT INTO pointssent(username,amount,sent,ip) VALUES ('SMS','$totaladd','$user','$userip')");
$f = ("$usernameone received $totaladd points for their donation!");
mysql_query("UPDATE users SET mail = (mail + 1) WHERE username = 'Pentium'");
mysql_query("UPDATE users SET mail = (mail + 1) WHERE username = 'Jack'");
mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info) VALUES ('Pentium','SMS','1','$userip','$f')");
mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info) VALUES ('Jack','SMS','1','$userip','$f')");
mysql_query("INSERT INTO `smsphone` (code,username,price,time) VALUES ('$getkeycode','$usernameone','$getprice','$todays')");
$showoutcome++; $outcome = "Thankyou for your donation, $totaladd points has been added to your account!";
}}
?> 
<table align="center" cellpadding="0" width=100% cellspacing="0">
<tbody><tr>
<td class=menutopleft><img style="display: block" height=22 width=8 alt="" src="blank.gif"></td>
<td class=menutopbar height=22 style="white-space: nowrap"><font color="#222222"><b>Payment Complete</b></font></td>
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
<? } ?>

<td class=menuright><img style="display: block" alt="" src="blank.gif" width=8></td>
</tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width: 100%">
<tbody><tr>
<td class=menubottomleft><img style="display: block" alt="" src="blank.gif" width="8" height="9"></td>
<td class=menubottommain><img style="display: block" alt="" src="blank.gif"></td>
<td class=menubottomright><img style="display: block" alt="" src="blank.gif" width="8" height="9"></td>
</tr></tbody></table></div>
</td>
<td width="250" valign="top">
<? include 'rightmenu.php'; ?>
</td>
</tr>
</table>

</body></html>