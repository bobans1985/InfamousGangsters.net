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
$sessionid = preg_replace($saturate,"",$sessionidraw);
$userip = $_SERVER[REMOTE_ADDR]; 
$gangsterusername = $usernameone;

$playerrank = $myrank;

$time = time();
$edittopicraw= $_POST['edittopic'];
$edittopic = htmlentities($edittopicraw , ENT_QUOTES);



$playerarray =$statustesttwo;
$playerrank = $playerarray['rankid'];



$editsql = mysql_query("SELECT * FROM forumtopics WHERE type = 'faq'");
$editarray = mysql_fetch_array($editsql);
$editname = $editarray['creator'];

if(($rankid == '100')||($rankid == '75')){
if(isset($_POST['edit'])) { if(!$edittopic){}else{
mysql_query("UPDATE forumtopics SET info = '$edittopic' WHERE type = 'faq'");
}}}


$topicinforaw = html_entity_decode($editarray['info'], ENT_NOQUOTES);

$zpattern[a] = "<";
$zpattern[b] = ">";
$zpattern[c] = "[div id=key]";
$zpattern[d] = "[/div]";
$zreplace[a] = "&lt;";
$zreplace[b] = "&gt;";
$zreplace[c] = "<div id=key>";
$zreplace[d] = "</div>";


$topicinforawz = str_replace($zpattern,$zreplace,$topicinforaw);
$dpattern[1] = "/\[b\](.*?)\[\/b\]/is";
$dpattern[2] = "/\[u\](.*?)\[\/u\]/is";
$dpattern[3] = "/\[i\](.*?)\[\/i\]/is";
$dpattern[4] = "/\[center\](.*?)\[\/center\]/is";
$dpattern[5] = "/\[color=(.*?)\](.*?)\[\/color\]/is";
$dpattern[6] = "/\[img\](.*?)\[\/img\]/is";
$dpattern[7] = "/\[font=(.*?)\](.*?)\[\/font\]/is";
$dpattern[8] = "/\[br\]/is";
$dpattern[9] = "/\[size=(.*?)\](.*?)\[\/size\]/is";
$dpattern[10] = "/\[quote\](.*?)\[\/quote\]/is";
$dpattern[11] = "/\[left\](.*?)\[\/left\]/is";
$dpattern[12] = "/\[right\](.*?)\[\/right\]/is";
$dpattern[13] = "/\[s\](.*?)\[\/s\]/is";

$dreplace[1] = "<b>$1</b>";
$dreplace[2] = "<u>$1</u>";
$dreplace[3] = "<i>$1</i>";
$dreplace[4] = "<center>$1</center>";
$dreplace[5] = "<font color=\"$1\">$2</font>";
$dreplace[6] = "<img src=\"$1\">";
$dreplace[7] = "<font face=\"$1\">$2</font>";
$dreplace[8] = "<br>";
$dreplace[9] = "<font size=\"$1\">$2</font><font size=\"1\">";
$dreplace[10] = "<blockquote><b>$1</b></blockquote>";
$dreplace[11] = "<div align=\"left\">$1</div>";
$dreplace[12] = "<div align=\"right\">$1</div>";
$dreplace[13] = "<s>$1</s>";

$topicinfoa = preg_replace($dpattern,$dreplace,$topicinforawz);

$cpattern[1] = ":arrow:";
$cpattern[2] = ":D";
$cpattern[3] = ":S";
$cpattern[4] = "8)";
$cpattern[5] = ":cry:";
$cpattern[6] = "8|";
$cpattern[7] = ":evil:";
$cpattern[8] = ":!:";
$cpattern[9] = ":idea:";
$cpattern[10] = ":lol:";
$cpattern[11] = ":mad:";
$cpattern[12] = ":?:";
$cpattern[13] = ":redface:";
$cpattern[14] = ":rolleyes:";
$cpattern[15] = ":(";
$cpattern[16] = ":)";
$cpattern[17] = ":o";
$cpattern[18] = ":tdn:";
$cpattern[19] = ":P";
$cpattern[20] = ":tup:";
$cpattern[21] = ":twisted:";
$cpattern[22] = ";)";

$creplace[1] = '<img src=/layout/smiles/arrow.gif>';
$creplace[2] = '<img src=/layout/smiles/biggrin.gif>';
$creplace[3] = '<img src=/layout/smiles/confused.gif>';
$creplace[4] = '<img src=/layout/smiles/cool.gif>';
$creplace[5] = '<img src=/layout/smiles/cry.gif>';
$creplace[6] = '<img src=/layout/smiles/eek.gif>';
$creplace[7] = '<img src=/layout/smiles/evil.gif>';
$creplace[8] = '<img src=/layout/smiles/exclaim.gif>';
$creplace[9] = '<img src=/layout/smiles/idea.gif>';
$creplace[10] = '<img src=/layout/smiles/lol.gif>';
$creplace[11] = '<img src=/layout/smiles/mad.gif>';
$creplace[12] = '<img src=/layout/smiles/question.gif>';
$creplace[13] = '<img src=/layout/smiles/redface.gif>';
$creplace[14] = '<img src=/layout/smiles/rolleyes.gif>';
$creplace[15] = '<img src=/layout/smiles/sad.gif>';
$creplace[16] = '<img src=/layout/smiles/smile.gif>';
$creplace[17] = '<img src=/layout/smiles/surprised.gif>';
$creplace[18] = '<img src=/layout/smiles/tdown.gif>';
$creplace[19] = '<img src=/layout/smiles/toungue.gif>';
$creplace[20] = '<img src=/layout/smiles/tup.gif>';
$creplace[21] = '<img src=/layout/smiles/twisted.gif>';
$creplace[22] = '<img src=/layout/smiles/wink.gif>';
$topicinfo = str_replace($cpattern,$creplace,$topicinfoa);
$toplocked = $gettopicidarray['locked'];
$newpostraw = $_POST['newpost'];
$newpost = htmlentities($newpostraw, ENT_QUOTES);

?> 
<table align="center" cellpadding="0" width=100% cellspacing="0">
<tbody><tr>
<td class=menutopleft><img style="display: block" height=22 width=8 src="blank.gif" after alt="" src="blank.gif"></td>
<td class=menutopbar height=22 style="white-space: nowrap"><font color="#222222"><b>Terms of Service</b></font></td>
<td class=menutopend><IMG style="display: block" height=20 src="blank.gif" after alt="" src="blank.gif" width=28></td>
<td class=menutopmain><IMG style="display: block" height=22 width=30px src="blank.gif" after alt="" src="blank.gif" ></td>
<td class=menutopright><IMG style="display: block" height=22 src="blank.gif" after alt="" src="blank.gif" width=8></td></tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width: 100%">
<tbody><tr>
<td class=menuleft><img style="display: block" src="blank.gif" after alt="" src="blank.gif" width=8></td>
<td background="/layout/crossbg.png">
<table align="center" width="99%" cellpadding="0" cellspacing="1">
<div align=center><font color="#cccccc" face="verdana" size="2"><b>Welcome to Tough Dons</b><br>
<font size=-2>The following page is the Terms of Service<br><br>
Registering to Tough Dons means you agree to the Terms of Service that we provide!</font></div><br><br>

<font size=1 face=verdana cp;pr=999999><b>Privacy</b><br>
When playing Tough Dons your email and IP address is collected upon your Registration. This information will not be sent to anyone who asks and will only be held in the
database created by Tough Dons. A session is reached on your computer while you are online. This is to make sure you dont need to keep re-logging every so often. Once 
you have logged out of Tough Dons the session will be deleted from the database.<br><br>

<b>Conduct</b><br>
While playing Tough Dons you must remember there are other people playing at the same time as you. Because of this there are strict rules in such places as Forums. On
the pages that require rules there will be a section which explains them. Any content that can seem offensive to other members of the game will be deleted and you will be warned. 
Carry on and this could result in a Ban of your account. No member is to attempt to exploit Tough Dons. If there is a problem then please report it straight into the
helpdesk where it will be dealt with.<br><br>

<b>Account</b><br>
You are only allowed to have one account alive at a time. If there is another member of your family playing then you must let the Helpdesk know. The password you use is totally 
your choice. If you was to get hacked then Tough Dons will not take the blame for you. Make sure your using a strong password, and a password that hasnt been used on 
anything else before. NO ONE on Tough Dons will ask for your password, that includes the administrator. So make sure you are not to give your password to anyone. Selling 
your account is also not allowed, Doing so will only result in the account being modkilled and the IP possibly Banned.<br><br>

<b>Banning</b><br>
Your account can be banned at anytime throughout Tough Dons AND without notice. Your account would most likely be banned due to violation of this TOS or a breaking of a 
rule. If a rule is set you must stand by it like any other player must. Once your account is banned you will not be able to regain any points or money from it, and nor will you be 
able to access it. If an exploit of somesort is found and abused by you, your IP will be banned meaning you cannot access anything of Tough Dons.<br><br>

<b>Hacking</b><br>
Hacking is strictly not allowed here at Tough Dons. If anyone is found doing it your accounts will be stripped and banned. However, those who are being hacked will not get
off lightly. We will not take the blame for you being Hacked unless there was somewhat an exploit in which gave users others information. If it is your fault you were hacked then
we will do nothing about it, it will have to be you to go to lost password and sort it out. Not used a Real email? Well then your account has gone. This does include Donators, you
arent anymore special than normal members.<br><br>

<b>Points</b><br>
Points can be bought from Tough Dons with REAL money. These are to enhance gameplay. The Points can be sent to other members exchanged for items etc. You agree that it is 
NOT our fault if these are lost in some problem or transaction between you and another member, such as being scammed. If Tough Dons was to suffer a reset,
Then those who donated within the Last month will recieve a certain % of there points back. depending on how long ago it was during that month.
</tbody></table></td>
<td class=menuright><img style="display: block" src="blank.gif" after alt="" src="blank.gif" width=8></td>
</tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width: 100%">
<tbody><tr>
<td class=menubottomleft><img style="display: block" src="blank.gif" after alt="" src="blank.gif" width="8" height="9"></td>
<td class=menubottommain><img style="display: block" src="blank.gif" after alt="" src="blank.gif"></td>
<td class=menubottomright><img style="display: block" src="blank.gif" after alt="" src="blank.gif" width="8" height="9"></td>
</tr></tbody></table></div>
</td>
<td width="250" valign="top">
<? include 'rightmenu.php'; ?>
</td>
</tr>
</table>
</body></html>