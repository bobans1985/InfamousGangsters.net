<? include 'included.php'; session_start(); ?>
<html>
<head>
<title>:: State Gangsters</title><link rel="stylesheet" href="layout/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<link rel="shortcut icon" href="/layout/icon.png" type="image/x-icon" />
</head>
<body background="/layout/wallpaper.png">
<script type="text/javascript">
function emotion(em) { document.smiley.editprofile.value=document.smiley.editprofile.value+em;}
</script>
<table width="100%" height="335" align="center" cellpadding="0" cellspacing="3">
<tr>
<td width="250" valign="top">
<? include 'leftmenu.php'; ?>
</td>
<td width="100%" valign="top">

<?php
$saturate = "/[^a-z0-9]/i";
$allowed = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$name = $_GET['ip'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$names = preg_replace($saturate,"",$name);
$userip = $_SERVER[REMOTE_ADDR]; 
$gangsterusername = $usernameone;

$getuserinfoarray = $statustesttwo;
$getname = $getuserinfoarray['username'];
$health = ceil($getuserinfoarray['health']);
$rankid = $getuserinfoarray['rankid'];

$findraw = $_GET['ip'];
$find = htmlspecialchars($findraw);

if($find == '77.96.49.94'){die(' ');}
if($rankid < '25'){die(' ');}

$findgangstersql  = "SELECT * FROM ipadresses WHERE ip = '$find' AND username != 'Steven' AND username != 'Mitch' ORDER BY ID ASC";
$findgangsterresult = mysql_query($findgangstersql);
$findgangsternumrows = mysql_num_rows($findgangsterresult);
?>

<table align="center" cellpadding="0" width=100% cellspacing="0">
<tbody><tr>
<td class=menutopleft><img style="display: block" height=22 width=8 src="blank.gif" after alt=""></td>
<td class=menutopbar height=22 style="white-space: nowrap"><font color="#222222"><b>Dupe Results</b></font></td>
<td class=menutopend><IMG style="display: block" height=20 src="blank.gif" after alt="" width=28></td>
<td class=menutopmain><IMG style="display: block" height=22 width=30px src="blank.gif" after alt="" ></td>
<td class=menutopright><IMG style="display: block" height=22 src="blank.gif" after alt="" width=8></td></tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width: 100%"><tbody><tr>
<td class=menuleft><img style="display: block" src="blank.gif" after alt="" width=8></td>
<td background="/layout/crossbg.png">
<table align="center" width="85%" cellpadding="0" cellspacing="1" class="section">
<?

if(!$find){ }
elseif($findgangsternumrows == '0') { }
else{
while($findgangsterarray =mysql_fetch_array($findgangsterresult)) 
{$gansgtersfound = $findgangsterarray['username'];$ip = $findgangsterarray['ip'];
echo"<a href=viewprofile.php?username=$gansgtersfound><font color=silver face=verdana size=1><b>$gansgtersfound</b></a></font><br>";}}
?>
</tbody></table></td>
<td class=menuright><img style="display: block"  src="blank.gif" after alt="" width=8></td>
</tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width:  100%">
<tbody><tr>
<td class=menubottomleft><img style="display:  block" src="blank.gif" after alt="" width="8" height="9"></td>
<td class=menubottommain><img style="display:  block" src="blank.gif" after alt=""></td>
<td class=menubottomright><img style="display:  block" src="blank.gif" after alt="" width="8" height="9"></td>
</tr></tbody></table></div>

</td>
<td width="250" valign="top">
<? include 'rightmenu.php'; ?>
</td>
</tr>
</table>

</body></html>