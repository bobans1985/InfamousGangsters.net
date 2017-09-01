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
$names = $_POST['name'];
$allowed = "/[^a-z0-9\\\\]/i";
$name = preg_replace($allowed,"",$names);

if($name){
$check = "SELECT username,ID FROM users WHERE username = '$name'";
$checksql = mysql_query($check);
$checkrows = mysql_num_rows($checksql);}

if(isset($_POST['add'])){
$checkifs = "SELECT * FROM friends WHERE myid = '$ida'";
$checkifsqls = mysql_query($checkifs);
$checkifrowss = mysql_num_rows($checkifsqls);
if($checkifrowss >= '50'){die('<font color=white face=verdana size=1>Friendship is limited to maximum of 50!</font>');}

if(!$name){}
elseif($checkrows != '1'){$showoutcome++; $outcome = "<font color=white face=verdana size=1>No such user!</font>";}
else{
$checkarray = mysql_fetch_array($checksql);
$checkname = $checkarray['username'];
$checkid = $checkarray['ID'];

$checkif = "SELECT * FROM friends WHERE thereid = '$checkid' AND myid = '$ida'";
$checkifsql = mysql_query($checkif);
$checkifrows = mysql_num_rows($checkifsql);

if($checkifrows > '0'){$showoutcome++; $outcome = "<font color=white face=verdana size=1>You have already added that user!</font>";}
else{
mysql_query("INSERT INTO friends(thereusername,thereid,myusername,myid)
VALUES ('$checkname','$checkid','$usernameone','$ida')");
mysql_query("UPDATE users SET notify = '1',notification = 'a_open$usernameone a_closed$usernameone a_slashadded you to his friends list.' WHERE ID = '$checkid'");
$showoutcome++; $outcome = "<font color=white face=verdana size=1>You added <a href=viewprofile.php?username=$checkname>$checkname</a> to your friend list.</font>";}
}}

elseif(isset($_POST['remove'])){
if(!name){}
elseif($checkrows != '1'){$showoutcome++; $outcome = "<font color=white face=verdana size=1>No such user!</font>";}
else{
$checkarray = mysql_fetch_array($checksql);
$checkname = $checkarray['username'];
$checkid = $checkarray['ID'];

$checkif = "SELECT * FROM friends WHERE thereid = '$checkid' AND myid = '$ida'";
$checkifsql = mysql_query($checkif);
$checkifrows = mysql_num_rows($checkifsql);

if($checkifrows != '1'){$showoutcome++; $outcome = "<font color=white face=verdana size=1>You have not added that user!</font>";}
else{
mysql_query("DELETE FROM friends WHERE thereid = '$checkid' AND myid = '$ida'");
$showoutcome++; $outcome = "<font color=white face=verdana size=1>You removed <a href=viewprofile.php?username=$checkname>$checkname</a> from your friend list.</font>";}
}} ?>

<? if($showoutcome>=1){ ?>
<table width="100%" align="center" cellpadding="0" cellspacing="10" class="section">
<tr><td align=center><div class=button1><?echo$outcome?></td></tr>
</table>
<? } ?>

<table align="center" cellpadding="0" width=100% cellspacing="0">
<tbody><tr>
<td class=menutopleft><img style="display: block" height=22 width=8 src="blank.gif" after alt=""></td>
<td class=menutopbar height=22 style="white-space: nowrap"><font color="#222222"><b>Friendship</b></font></td>
<td class=menutopend><IMG style="display: block" height=20 src="blank.gif" after alt="" width=28></td>
<td class=menutopmain><IMG style="display: block" height=22 width=30px src="blank.gif" after alt="" ></td>
<td class=menutopright><IMG style="display: block" height=22 src="blank.gif" after alt="" width=8></td></tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width: 100%"><tbody><tr>
<td class=menuleft><img style="display: block" src="blank.gif" after alt="" width=8></td>
<td background="/layout/crossbg.png">
<table align="center" width="85%" cellpadding="0" cellspacing="1" class="section">
<form action="" method="post">

<div align=right><input type=textbox class=textbox name=name><input type=submit name=add class=textbox value="Add friend"><input type=submit name=remove class=textbox value="Remove friend"></div></form>
<br><table cellpadding=0 cellspacing=1 width=45% align="center" class="section">
<tr><td width=100%><div class=tab>Your friends.</td></tr>
<tr><td width=60% bgcolor=222222 NOWRAP><font color=silver size=1 face=verdana>Username:</font></td><td width=40% bgcolor=222222 NOWRAP><font color=silver  size=1 face=verdana>Added at:</font></td></tr>

<?
$findgangstersql  = "SELECT * FROM friends WHERE myid = '$ida' ORDER BY id";
$findgangsterresult = mysql_query($findgangstersql);
$findgangsternumrows = mysql_num_rows($findgangsterresult);

if($findgangsternumrows == '0'){}else{
while($tima = mysql_fetch_array($findgangsterresult)){
$therename = $tima['thereusername'];
$date = $tima['date'];
echo"<tr><td width=60% bgcolor=222222 NOWRAP><a href=viewprofile.php?username=$therename><font color=white size=1 face=verdana>$therename</font></a></td><td width=40% bgcolor=222222 NOWRAP><font color=white size=1 face=verdana>$date</font></td></tr>";   
}} ?>
</table><br><br>

<table cellpadding=0 cellspacing=1 width=45% align="center" class="section">
<tr><td width=100%><div class=tab>People with you added</td></tr> 
<tr><td width=30% bgcolor=222222 NOWRAP><font color=silver size=1 face=verdana>Username:</font></td><td width=40% bgcolor=222222 NOWRAP><font color=silver  size=1 face=verdana>Added at:</font></td></tr>

<?
$findgangstersql  = "SELECT * FROM friends WHERE thereid = '$ida' ORDER BY id";
$findgangsterresult = mysql_query($findgangstersql);
$findgangsternumrows = mysql_num_rows($findgangsterresult);

if($findgangsternumrows == '0'){}else{
while($tima = mysql_fetch_array($findgangsterresult)){
$therename = $tima['myusername'];
$date = $tima['date'];
echo"<tr><td width=60% bgcolor=222222 NOWRAP><a href=viewprofile.php?username=$therename><font color=white size=1 face=verdana>$therename</font></a></td><td width=40% bgcolor=222222 NOWRAP><font color=white size=1 face=verdana>$date</font></td></tr>";   
}} ?>
</table><br><br>

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
