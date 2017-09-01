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

<table align="center" cellpadding="0" width=100% cellspacing="0">
<tbody><tr>
<td class=menutopleft><img style="display: block" height=22 width=8 alt="" src="blank.gif"></td>
<td class=menutopbar height=22 style="white-space: nowrap"><font color="#222222"><b>Donate</b></font></td>
<td class=menutopend><IMG style="display: block" height=20 alt="" src="blank.gif" width=28></td>
<td class=menutopmain><IMG style="display: block" height=22 width=30px alt="" src="blank.gif" ></td>
<td class=menutopright><IMG style="display: block" height=22 alt="" src="blank.gif" width=8></td></tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width: 100%"><tbody><tr>
<td class=menuleft><img style="display: block" alt="" src="blank.gif" width=8></td>
<td background="/layout/crossbg.png"><?php
$saturate = "/[^a-z0-9]/i";
$saturated = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$getkeycode = $_POST['CovNum'];
$getpass = $_POST['Password'];
$getprice = $_POST['price'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$userip = $_SERVER[REMOTE_ADDR]; 
$gangsterusername = $usernameone;
$playerrank = $myrank;
$playerarray =$statustesttwo;
$playerrank = $playerarray['rankid'];
$todays = gmdate('Y-m-d');
$ref = getenv("HTTP_REFERER"); 

if($_POST['CovNum'] AND $_POST['price'] AND $_POST['Password']){
if($getpass != "compaq111"){ die('Nice try.....'); }
if($ref != "http://www.glpayment.co.uk/glpay0205/Auth_Standard.php"){ die('Alex your mum stinks of fish kk.....'); }

$codedup = mysql_num_rows(mysql_query("SELECT * FROM smsphone WHERE code = '$getkeycode'"));
$limit30 = mysql_num_rows(mysql_query("SELECT * FROM smsphone WHERE username = '$usernameone' AND time = '$todays'"));
if($codedup > 0){ $showoutcome++; $outcome = "<font size=1 face=verdana color=white>This keycode has already been used!<br>"; }
elseif($limit30 >= 10){ $showoutcome++; $outcome = "<font size=1 face=verdana color=white>You have reached the limit for today, use this code again tomorrow! ($getkeycode)<br>"; }
else{
if($getprice == "3.00"){ $pointsadd = 250; }
elseif($getprice == "6.00"){ $pointsadd = 600; }
elseif($getprice == "9.00"){ $pointsadd = 800; }
$totaladd = $pointsadd * $smstimes;
mysql_query("UPDATE users SET points = points + $totaladd WHERE ID = '$ida'");
mysql_query("INSERT INTO pointssent(username,amount,sent,ip) VALUES ('SMS','$totaladd','$user','$userip')");
$f = ("$usernameone received $totaladd points for their donation!");
mysql_query("UPDATE users SET mail = (mail + 1) WHERE username = 'Jack'");
mysql_query("UPDATE users SET mail = (mail + 1) WHERE username = 'Animal'");
mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info) VALUES ('Jack','SMS','1','$userip','$f')");
mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info) VALUES ('Animal','SMS','1','$userip','$f')");
mysql_query("INSERT INTO `smsphone` (code,username,price,time) VALUES ('$getkeycode','$usernameone','$getprice','$todays')");
$showoutcome++; $outcome = "Thank you for your donation, $totaladd points has been added to your account!<br>";
}}
?> <? if($showoutcome>=1){ ?>
  <br>
  <table width=70% align=center cellpadding=0 cellspacing=1 class=section>
<tr><td><div class=button1 style="background-color:#171717;">&nbsp;<?echo$outcome;?></td></tr>
</table><br>
<? } ?>
<?php if($_GET['fail'] == "yes"){ ?>
<br>
<table width=70% align=center cellpadding=0 cellspacing=1 class=section>
<tr><td><div class=button1 style="background-color:#171717;">&nbsp;<font color=red><b>There has been an error with this transaction!</b></font></td></tr>
</table><br>
<?php } ?>
  <br>
  <table align="center" width="55%" cellpadding="0" cellspacing="1" class="section">
    <tr>
      <td width="100%"><div class=tab>Donate (SMS) </div></td>
    </tr>
    <tr>
      <td><div class="button1"><input type="radio" onclick="window.location='/sms1.php';" />
        250<?php if($smstimes != 1){ ?><font color=khaki> *<?php echo $smstimes ?></font><?php } ?> Points [�3.00]</div></td>
    </tr>
    <tr>
      <td><div class="button1"><input type="radio" onclick="window.location='/sms2.php';" />600<?php if($smstimes != 1){ ?><font color=khaki> *<?php echo $smstimes ?></font><?php } ?> Points [�6.00] - <b>SELECTED</b></div></td>
    </tr>
    <tr>
      <td><div class="button1"><input type="radio" onclick="window.location='/sms3.php';" /><font color=yellow><b>800<?php if($smstimes != 1){ ?><font color=khaki> *<?php echo $smstimes ?></font><?php } ?> Points</b></font> [�9.00]</div></td>
    </tr>
  </table><br><center><h2><font face="verdana" color="white">Text <b>GL bonus</b> to <b>87070</b></font></h2>
   <br><br><font face="verdana" size=1 color="white">After you have completed the text you will be given a 10 digit unique code please type it in bellow to recieve your points!</font>
 
  </center><br><form name="glform"method="post" action="http://www.glpayment.co.uk/glpay0205/Auth_Standard.php">
    <div align="center">
  <input type="text" class="textbox" name="number" placeholder="Enter 10 digit code">
  <input type="hidden" name="ddi_id" value="13282">
  <br><br>
  <input type="submit" class="textbox" value="Go">  
    </div>
  </form>
<br>
  <center><font size="1" face="verdana" color="white">If you have any queries regarding this service or experience any issues please contact support on
0844 375 4020 or contact support at <a href=mailto:support@glpayment.co.uk>support@glpayment.co.uk</a></font> </center>
  <br>
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