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
$saturated = "/[^0-9]/i";
$getnameraw = $_GET['username'];
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$getname = preg_replace($saturate,"",$getnameraw);
$userip = $_SERVER[REMOTE_ADDR]; 


$playerarray =$statustesttwo;
$playerrank = $playerarray['rankid'];

if(!$getname){die('<font color=white face=verdana size=1>Error.</font>');}

if($playerrank < '100'){die(' ');}

$getuserinfosql = mysql_query("SELECT * FROM users WHERE username = '$getname'");
$getuserinfoarray = mysql_fetch_array($getuserinfosql);
$name= $getuserinfoarray['username'];

?> 

<table align="center" cellpadding="0" width=100% cellspacing="0">
<tbody><tr>
<td class=menutopleft><img style="display: block" height=22 width=8 alt="" src="blank.gif"></td>
<td class=menutopbar height=22 style="white-space: nowrap"><font color="#222222"><b><? echo$getname;?>'s stats</b></font></td>
<td class=menutopend><IMG style="display: block" height=20 alt="" src="blank.gif" width=28></td>
<td class=menutopmain><IMG style="display: block" height=22 width=30px alt="" src="blank.gif" ></td>
<td class=menutopright><IMG style="display: block" height=22 alt="" src="blank.gif" width=8></td></tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width: 100%"><tbody><tr>
<td class=menuleft><img style="display: block" alt="" src="blank.gif" width=8></td>
<td background="/layout/crossbg.png">

<form action = "" method = "get">
<input type="text" name="name" class="textbox" value="<?echo"$getname";?>">
<input type="submit" class="textbox" value="View stats"></form>
<br>
<?$spots = mysql_query("SELECT * FROM bodyguards WHERE guarding = '$getname' ORDER by id");
$spotsrows = mysql_num_rows($spots);

$aspots = mysql_query("SELECT * FROM bodyguards WHERE username = '$getname'");
$aspotsrows = mysql_num_rows($aspots);

$i = 0;

if($spotsrows != '0'){
while($spotsarray = mysql_fetch_array($spots)){
$i++;
$status = $spotsarray['status'];
$invited = $spotsarray['username'];

if($status == '0'){echo"<font color=white face=verdana size=1>Spot $i: $name has a free bodyguard spot</font><br>";}

elseif($status == '1'){echo"<font color=white face=verdana size=1>Spot $i: $name has invited </font><a href=viewprofile.php?username=$invited><font color=white face=verdana size=1>$invited</a> to become his bodyguard</font><br>";}

elseif($status == '2'){echo"<font color=white face=verdana size=1>Spot $i: </font><a href=viewprofile.php?username=$invited><font color=white face=verdana size=1>$invited</a> is a bodyguard for $getname</font><br>";}

}}

if($aspotsrows != '0'){
while($aspotsarray = mysql_fetch_array($aspots)){
$status = $aspotsarray['status'];
$invited = $aspotsarray['guarding'];

if($status == '1'){echo"<a href=viewprofile.php?username=$invited><font color=white face=verdana size=1>$invited</a> has invited $getname to be his bodyguard</font><br>";}

elseif($status == '2'){echo"<font color=white face=verdana size=1>$getname is a bodyguard for </font><a href=viewprofile.php?username=$invited><font color=white face=verdana size=1>$invited</a></font><br>";}

}}
?><br>
</td>
<td width="8" background="/layout/rightb.png" NOWRAP></td>
</tr>

<tr>
<td width="8" height="9" background="/layout/bottomleft.png"></td>
<td height="9" background="/layout/bottom.png"></td>
<td width="8" height="9" background="/layout/bottomright.png"></td>
</tr>
</table>
</td>
<td width="250" valign="top">
<? include 'rightmenu.php'; ?>
</td>
</tr>
</table>

</body></html>