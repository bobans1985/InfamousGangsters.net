<? include 'included.php'; session_start(); ?>

<html>
<head>
<title>:: State Gangsters</title><link rel="stylesheet" href="layout/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<link rel="shortcut icon" href="/layout/icon.png" type="image/x-icon" />
</head>
<body background="/layout/wallpaper.png" onLoad="setTimeout('ajaxFunctionhiss()',5000);">
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
$orderbys = $_GET['orderby'];
$orderby = preg_replace($saturated,"",$orderbys);
$userip = $_SERVER[REMOTE_ADDR]; 
$gangsterusername = $usernameone;
$playerarray =$statustesttwo;
$playerrank = $playerarray['rankid'];
$thdotestnumrows = $playerarray['thdo'];
$hdotestnumrows = $hdo;
?>

<?
$theuser = $_POST['theuser'];
$newpostraw = $_POST['post'];
$newpostto = $_POST['postto'];
$newpost = htmlentities($newpostraw, ENT_QUOTES);

if($_POST['delete'] AND $_POST['theuser']){
mysql_query("DELETE FROM home WHERE username = '$theuser'");}

if($_POST['submit'] AND $_POST['post']) { 
$mutedusernamesql = mysql_query("SELECT username,ip FROM muted WHERE  username = '$gangsterusername'")or die(mysql_error());
$mutedusernamerows = mysql_num_rows($mutedusernamesql);
$mutedusernamearray = mysql_fetch_array($mutedusernamesql);
$mutedusernameone = $mutedusernamearray['username'];
$mutedipone = $mutedusernamearray['ip'];

$mutedipsql = mysql_query("SELECT username,ip FROM muted WHERE  ip = '$userip'")or die(mysql_error());
$mutediprows  = mysql_num_rows($mutedipsql);
$mutediparray = mysql_fetch_array($mutedipsql);
$mutedusernametwo = $mutediparray['username'];
$mutediptwo = $mutediparray['ip'];

if($mutedusernamerows > '0'){die("<font color=white face=verdana size=1>Username: <b>$mutedusernameone</b> and IP: <b>$mutedipone</b> have been muted! Contact a member of <b>State Gangsters</b> to be unmuted!");}
elseif($mutediprows > '0'){die("<font color=white face=verdana size=1>Username: <b>$mutedusernametwo</b> and IP: <b>$mutediptwo</b> have been muted! Contact a member of <b>State Gangsters</b> to be unmuted!");}

if(!$newpost){}
else{
if(!$newpostto){ $posttype = 0; $postuser = ''; }else{ 
$posttype = 1; $postuser = $newpostto;
$checkuser = mysql_num_rows(mysql_query("SELECT * FROM suggestions WHERE username = '$newpostto'"));
if($checkuser < 1){ echo "<font size=1 face=verdana color=white>No such user!"; $postuser = ''; $posttype = 0; }else{ 
$boring = mysql_query("SELECT * FROM suggestions WHERE username = '$newpostto'");
$haha = mysql_fetch_array($boring);
$postuser = $haha['username'];
}}
mysql_query("INSERT INTO home(`username`,`to`,`update`,`type`) VALUES ('$gangsterusername','$postuser','$newpost','$posttype')");
mysql_query("UPDATE users SET notification = 'a_open$usernameone a_closed$usernameone a_slash mentioned you on the game network.', notify = (notify + 1) WHERE username = '$postuser'");
mysql_query("UPDATE users SET posts = (posts + 1) WHERE username = '$usernameone'");
}}
?>
<table align="center" cellpadding="0" width=100% cellspacing="0">
<tbody><tr>
<td class=menutopleft><img style="display: block" height=22 width=8 alt="" src="blank.gif"></td>
<td class=menutopbar height=22 style="white-space: nowrap"><font color="#222222"><b>Game Network</b></font></td>
<td class=menutopend><IMG style="display: block" height=20 alt="" src="blank.gif" width=28></td>
<td class=menutopmain><IMG style="display: block" height=22 width=30px alt="" src="blank.gif" ></td>
<td class=menutopright><IMG style="display: block" height=22 alt="" src="blank.gif" width=8></td></tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width: 100%">
<tbody><tr>
<td class=menuleft><img style="display: block" alt="" src="blank.gif" width=8></td>
<td background="/layout/crossbg.png">
<table align="center" width="99%" cellpadding="0" cellspacing="1">
<table width=100%><tr><td width=10%></td><td width=55% valign=top>
<font color=silver size=1 face=verdana>Click here to view the <a href=faq.php><font color=silver><b>FAQ (Frequently Asked Questions)</b></a></font><br>
<font color=silver size=1 face=verdana>Click here to view the <a href=tos.php><font color=silver><b>TOS (Terms of Service)</b></a></font><br><br>

<center><a href=home.php><font color=yellow face=verdana size=1><b>All Posts</b></font></a><font color=silver face=verdana size=1> / </font><a href=home.php?orderby=1><font color=yellow face=verdana size=1><b>Mentions</b></font></a><font color=silver face=verdana size=1> / </font><a href=home.php?orderby=2><font color=yellow face=verdana size=1><b>Mentioned</b></font></a></center><br>

<? $latesthome = mysql_query("SELECT * FROM `home` ORDER BY `id` DESC LIMIT 1");
$isit = mysql_fetch_array($latesthome);
$posttits = $isit['id']; ?>
<script>
function ajaxFunctionhiss(){
	var ajaxRequest;  
	try{ajaxRequest = new XMLHttpRequest();} catch (e){
        try{ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");} catch (e) {
	try{ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");} catch (e){
alert("Your browser broke!");return false;}}}
var strhehe = "<?echo$posttits;?>&rand="+Math.random();
	ajaxRequest.open("GET", "newhomepost.php?posts=" + strhehe, true);
        ajaxRequest.send(null); 
        ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){if(ajaxRequest.responseText){document.getElementById("county").style.display = "block";document.getElementById("county").innerHTML = ajaxRequest.responseText;}}}
 setTimeout("ajaxFunctionhiss()",6000);
}
</script>

<div id=county style=width:100%; style=display:none;></div>
<div id=posts>

<? if($orderby == '1'){ $gethome = mysql_query("SELECT * FROM `home` WHERE `to` = '$usernameone' ORDER BY id DESC LIMIT 50"); }
elseif($orderby == '2'){ $gethome = mysql_query("SELECT * FROM `home` WHERE `username` = '$usernameone' AND type = '1' ORDER BY id DESC LIMIT 50"); }
else{ $gethome = mysql_query("SELECT * FROM home ORDER BY id DESC LIMIT 0,50"); }

while($getit = mysql_fetch_array($gethome)){
$postid = $getit['id'];
$homeusername = $getit['username'];
$hometo = $getit['to'];
$homeupdate = $getit['update'];
$hometype = $getit['type'];
$like = $getit['like'];
$hometime = $getit['time'];

if($like < '1'){$like = '';}
if($like >= '1'){ $like = "+$like"; }

$i = 0;
$while = mysql_query("SELECT * FROM blacklist");
while ($all = mysql_fetch_array($while)){
$i = $i + 1;
$zpattern[$i] = $all['word'];
$zreplace[$i] = "infamousgangsters";}

$postinforawa = html_entity_decode($getit['update'], ENT_NOQUOTES);
$postinforawb = $postinforawa;
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

$ereplace[1] = "<b>$1</b>";
$ereplace[2] = "<u>$1</u>";
$ereplace[3] = "<i>$1</i>";
$ereplace[4] = "<center>$1</center>";
$ereplace[5] = "<font color=\"$1\">$2</font>";
$ereplace[7] = "<font face=\"$1\">$2</font>";
$ereplace[8] = "<br>";
$ereplace[10] = "<blockquote><b><font color=7e96ac>$1</font></b></blockquote>";
$ereplace[11] = "<div align=\"left\">$1</div>";
$ereplace[12] = "<div align=\"right\">$1</div>";
$ereplace[13] = "<s>$1</s>";

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

?>
<script>
function getitnow<?echo$postid;?>(){
urnamed=<?echo$postid;?>;
	var ajaxRequest;  
	try{ajaxRequest = new XMLHttpRequest();} catch (e){
        try{ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");} catch (e) {
	try{ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");} catch (e){
alert("Your browser broke1!");return false;}}}
var strhehefd = "&topic=<?echo$topicid;?>&rand="+Math.random();
	ajaxRequest.open("GET", "homeok.php?id=" + urnamed + strhehefd, true);
        ajaxRequest.send(null); 

ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
if(ajaxRequest.responseText >= 1)
{
document.getElementById("u<?echo$postid;?>").innerHTML = "<b>" + ajaxRequest.responseText + "</b>"; 
document.getElementById("v<?echo$postid;?>").innerHTML = "<b>" + ajaxRequest.responseText + "</b>";}
if(ajaxRequest.responseText == 'Error')
{
document.getElementById("u<?echo$postid;?>").innerHTML = "Error"; 
document.getElementById("v<?echo$postid;?>").innerHTML = "Error";}}}}
</script>
<script>
function nogetitnow<?echo$postid;?>(){
urnamed=<?echo$postid;?>;
	var ajaxRequest;  
	try{ajaxRequest = new XMLHttpRequest();} catch (e){
        try{ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");} catch (e) {
	try{ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");} catch (e){
alert("Your browser broke1!");return false;}}}
var strhehefd = "&topic=<?echo$topicid;?>&rand="+Math.random();
	ajaxRequest.open("GET", "homenotok.php?id=" + urnamed + strhehefd, true);
        ajaxRequest.send(null); 

ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
if(ajaxRequest.responseText >= 1)
{
document.getElementById("u<?echo$postid;?>").innerHTML = "<b>" + ajaxRequest.responseText + "</b>"; 
document.getElementById("v<?echo$postid;?>").innerHTML = "<b>" + ajaxRequest.responseText + "</b>";}
if(ajaxRequest.responseText == 'Error')
{
document.getElementById("u<?echo$postid;?>").innerHTML = "Error"; 
document.getElementById("v<?echo$postid;?>").innerHTML = "Error";}}}}
</script>
<script>
function hidemepls<?echo$postid;?>()
{document.getElementById("oklol<?echo$postid;?>").style.display = "none"; document.getElementById("heheoklol<?echo$postid;?>").style.display = "block"; 
}</script>
<script>
function showmepls<?echo$postid;?>()
{document.getElementById("oklol<?echo$postid;?>").style.display = "block"; document.getElementById("heheoklol<?echo$postid;?>").style.display = "none"; 
}</script>
<?
$postinfo = str_replace($fpattern, $freplace, $postinforawb, $countthree);

if($homeusername == Pentium || $homeusername == Jack){ $docolor = "<font color=crimson face=verdana size=1><b>$homeusername</b></font><font color=silver>"; }else{ $docolor = "<font color=silver face=verdana size=1>$homeusername"; }
if($hometo == Pentium || $hometo == Jack){ $docolorr = "<font color=crimson face=verdana size=1><b>$hometo</b></font><font color=silver>"; }else{ $docolorr = "<font color=silver face=verdana size=1>$hometo"; }

if($hometype == 0){?>
<table align="center" cellpadding="0" width=100% cellspacing="0">
<tbody><tr>
<td class=menutopleft><img style="display: block" height=22 width=8 alt="" src="blank.gif"></td>
<td class=menutopbar height=22 style="white-space: nowrap"><a href=viewprofile.php?username=<?echo$homeusername;?>><?echo$docolor;?></a></td>
<td class=menutopend><IMG style="display: block" height=20 alt="" src="blank.gif" width=28></td>
<td class=menutopmain><IMG style="display: block" height=22 width=30px alt="" src="blank.gif" ></td>
<td class=menutopright><IMG style="display: block" height=22 alt="" src="blank.gif" width=8></td></tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width: 100%">
<tbody><tr>
<td class=menuleft><img style="display: block" alt="" src="blank.gif" width=8></td>
<td background="/layout/crossbg.png">
<table align="center" width="99%" cellpadding="0" cellspacing="1">
<tr><td><font color=white size=1 face=verdana><?echo$postinfo;?></font></td></tr>
<tr><td height="1" bgcolor="#444444"></td></tr>
<tr><td align="right"><?echo$hometime;?></td></tr>
</tbody></table></td>
<td class=menuright><img style="display: block" alt="" src="blank.gif" width=8></td>
</tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width: 100%">
<tbody><tr>
<td class=menubottomleft><img style="display: block" alt="" src="blank.gif" width="8" height="9"></td>
<td class=menubottommain><img style="display: block" alt="" src="blank.gif"></td>
<td class=menubottomright><img style="display: block" alt="" src="blank.gif" width="8" height="9"></td>
</tr></tbody></table></div><br>
<?}
elseif($hometype == 1){?>
<table align="center" cellpadding="0" width=100% cellspacing="0">
<tbody><tr>
<td class=menutopleft><img style="display: block" height=22 width=8 alt="" src="blank.gif"></td>
<td class=menutopbar height=22 style="white-space: nowrap"><a href=viewprofile.php?username=<?echo$homeusername;?>><?echo$docolor;?> to <a href=viewprofile.php?username=<?echo$hometo;?>><?echo$docolorr;?></font></a></td>
<td class=menutopend><IMG style="display: block" height=20 alt="" src="blank.gif" width=28></td>
<td class=menutopmain><IMG style="display: block" height=22 width=30px alt="" src="blank.gif" ></td>
<td class=menutopright><IMG style="display: block" height=22 alt="" src="blank.gif" width=8></td></tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width: 100%">
<tbody><tr>
<td class=menuleft><img style="display: block" alt="" src="blank.gif" width=8></td>
<td background="/layout/crossbg.png">
<table align="center" width="99%" cellpadding="0" cellspacing="1">
<tr><td><font color=white size=1 face=verdana><?echo$postinfo;?></font></td></tr>
<tr><td height="1" bgcolor="#444444"></td></tr>
<tr><td align="right"><?echo$hometime;?></td></tr>
</tbody></table></td>
<td class=menuright><img style="display: block" alt="" src="blank.gif" width=8></td>
</tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width: 100%">
<tbody><tr>
<td class=menubottomleft><img style="display: block" alt="" src="blank.gif" width="8" height="9"></td>
<td class=menubottommain><img style="display: block" alt="" src="blank.gif"></td>
<td class=menubottomright><img style="display: block" alt="" src="blank.gif" width="8" height="9"></td>
</tr></tbody></table></div><br>
<?}
elseif($hometype == 2){ ?><table align="center" cellpadding="0" width=100% cellspacing="0">
<tbody><tr>
<td class=menutopleft><img style="display: block" height=22 width=8 alt="" src="blank.gif"></td>
<td class=menutopbar height=22 style="white-space: nowrap"><font color="#222222"><b>Update</b></font></td>
<td class=menutopend><IMG style="display: block" height=20 alt="" src="blank.gif" width=28></td>
<td class=menutopmain><IMG style="display: block" height=20 width=30px alt="" src="blank.gif" ></td>
<td class=menutopright><IMG style="display: block" height=22 alt="" src="blank.gif" width=8></td></tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width: 100%">
<tbody><tr>
<td class=menuleft><img style="display: block" alt="" src="blank.gif" width=8></td>
<td bgcolor="222222">
<table align="center" width="99%" cellpadding="0" cellspacing="1">
<font color=white size=1 face=verdana><?echo$postinfo;?></font>
</tbody></table></td>
<td class=menuright><img style="display: block" alt="" src="blank.gif" width=8></td>
</tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width: 100%">
<tbody><tr>
<td class=menubottomleft><img style="display: block" alt="" src="blank.gif" width="8" height="9"></td>
<td class=menubottommain><img style="display: block" alt="" src="blank.gif"></td>
<td class=menubottomright><img style="display: block" alt="" src="blank.gif" width="8" height="9"></td>
</tr></tbody></table></div><br>
<? }} ?>
</td>
<form method=post><td valign=top align=center width=35%><br><br><br>
<table width=98%>
<tr><td><font color=white size=1 face=verdana>Post (50max):</td> <td><input type=textbox name=post class=textbox></td></tr>
<tr><td><font color=white size=1 face=verdana>To (optional):</td> <td><input type=textbox name=postto class=textbox></td></tr>
<tr><td></td><td align=left><input type=submit name=submit class=textbox value="Do Post"></td></tr>
<?if(($playerrank >= '25')||($senior > '0')||($hdotestnumrows > '0')){?>
<tr><td height=5></td></tr>
<tr><td><font color=white size=1 face=verdana>Username:</td> <td><input type=textbox name=theuser class=textbox></td></tr>
<tr><td></td><td align=left><input type=submit name=delete class=textbox value="Delete Posts"></td></tr>
<?}?>
</table>
</td></form></tr>
</tbody></table></td>
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