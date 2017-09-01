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

$time = time();
$edittopicraw= $_POST['edittopic'];
$edittopic = htmlentities($edittopicraw , ENT_QUOTES);



$playerarray =$statustesttwo;
$playerrank = $playerarray['rankid'];
?>

<table align="center" width="100%" cellpadding="0" cellspacing="0"><tr><td width="8" height="22" background="/layout/topleft.png"></td><td height="22" background="/layout/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><b>Thankyou</b></font></td><td width="8" height="22" background="/layout/topright.png"></td></tr><tr><td width="8" background="/layout/leftb.png" NOWRAP></td><td background="/layout/crossbg.png"><font color="white" face="verdana" size="1">

<? 
$appcode = 62995;
$prodcode = trim($_GET["prodcode"]);
$pin = trim($_GET["pin"]);
if($appcode != $_GET["appcode"]) { exit; }
$order1 = $_GET['orderno'];
$order2 = strip_tags($order1);
$order = mysql_real_escape_string($order2);

$sql = mysql_query("SELECT * FROM smsphone WHERE code='$prodcode' AND app='$pin'");
$num = mysql_num_rows($sql);
if ($num >= "1"){ echo "<b><font size=1>Your points have been added to your account already!</b>"; }else{
if (strlen($prodcode) && strlen($pin)) {
$handle = fopen("http://daopay.com/svc/pincheck?appcode=".$appcode."&prodcode=".$prodcode."&pin=".$pin, "r");
if ($handle) {
$reply = fgets($handle);
if (substr($reply,0,2) == "ok") {
$add = $prodcode*3;

mysql_query("UPDATE `users` SET `points`=points+'".$add."' WHERE `username`='$usernameone'");
$c = ("$username donated for $prodcode points");
mysql_query("UPDATE users SET mail=mail+'1' WHERE username='Steven'");	
$f = ("$usernameone received $add points for their donation!");
mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info) VALUES ('Steven','SMS','1','$userip','$f')");
mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info) VALUES ('Mitch','SMS','1','$userip','$f')");
mysql_query("INSERT INTO pointssent(username,amount,sent,ip) VALUES ('StateGangsters','$add','$usernameone','$userip')");
echo "<font size=1>Payment successfully completed, ".$add." points have been added to your account!<br />Thank you for your donation.";
$time = time();
mysql_query("INSERT INTO `smsphone` (code,username,app,time) VALUES ('$prodcode','$usernameone','$pin','')");
} else {
echo "<b><font size=1>PIN code invalid/expired</b>"; }}
else {
echo "<font size=1>Please quote ".$pin." to the donations helpdesk, and wait patiently for your points as there is an error connecting to the SMS servers. "; }}}
?>  

<table width="98%" cellpadding="0" cellspacing="0" align="center"><tr><td height="1" bgcolor="#444444"></td></tr><td height="11"></td></tr></table></td><td width="8" background="/layout/rightb.png" NOWRAP></td></tr><tr><td width="8" height="9" background="/layout/bottomleft.png"></td><td height="9" background="/layout/bottom.png"></td><td width="8" height="9" background="/layout/bottomright.png"></td></tr></table>
</td>
<td width="250" valign="top">
<? include 'rightmenu.php'; ?>
</td>
</tr>
</table>

</body></html>