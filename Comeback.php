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

<? 

$saturate = "/[^a-z0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$userip = $_SERVER[REMOTE_ADDR]; 

$gangsterusername = $usernameone;

$getuserinfoarray = $statustesttwo;
$rank = $getuserinfoarray['rankid'];

if($rank < 50){die(' ');}

$server="localhost";
$database="SG";
$db_user="root";
$db_pass="BacoN123";
$dbtable="users";
$emailyeah="email";

if(isset($_POST['submit'])){
$messagesend=$_POST['message'];
$subject = "SG - Email Notice";
mysql_connect($server, $db_user, $db_pass) or die ("Database error"); 
$resultquery = mysql_db_query($database, "select * from $dbtable");
while ($query = mysql_fetch_array($resultquery)){ 
$emailinfo=$myemail;  	
$mailto=$query[$emailyeah];
mail($mailto, "$subject", $messagesend,
"From: \"State Gangsters\" <Admins@stategangsters.com>\r\n" .
"X-Mailer: PHP/" . phpversion());
"MTME-Version:1.0";}
$showoutcome++; $outcome = 'Email sent to all users with registered emails!';}?>

<table align="center" cellpadding="0" width=100% cellspacing="0">
<tbody><tr>
<td class=menutopleft><img style="display: block" height=22 width=8 alt=""></td>
<td class=menutopbar height=22 style="white-space: nowrap"><font color="#222222"><b>Email Sender</b></font></td>
<td class=menutopend><IMG style="display: block" height=20 alt="" width=28></td>
<td class=menutopmain><IMG style="display: block" height=22 width=30px alt="" ></td>
<td class=menutopright><IMG style="display: block" height=22 alt="" width=8></td></tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width: 100%"><tbody><tr>
<td class=menuleft><img style="display: block" alt="" width=8></td>
<td background="/layout/crossbg.png">
<table align="center" width="85%" cellpadding="0" cellspacing="1" class="section">
<font color="white" face="verdana" size="1">
<br>
<? if($showoutcome>=1){ ?>
<table width="55%" align="center" cellpadding="0" cellspacing="10" class="section">
<tr><td align=center><div class=button1><?echo$outcome?></td></tr>
</table>
<? } ?>

<table align=center><form method=post><font color="white" face="verdana" size="1"><center>Email Registered Users:</font><br><br><textarea name="message" cols="42" rows="11" class="textbox"></textarea></center><br>
<tr><td><input type=submit name=submit class=textbox value="Send Email"></td></tr>
</form></table><br>
<td class=menuright><img style="display: block"  alt="" width=8></td>
</tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width:  100%">
<tbody><tr>
<td class=menubottomleft><img style="display:  block" alt="" width="8" height="9"></td>
<td class=menubottommain><img style="display:  block" alt=""></td>
<td class=menubottomright><img style="display:  block" alt="" width="8" height="9"></td>
</tr></tbody></table></div>
</td>
<td width="250" valign="top">
<? include 'rightmenu.php'; ?>
</td>
</tr>
</table>

</body></html>