<? include 'included.php'; session_start();
die();
?>

<html>
<head>
<title>:: State Gangsters</title><link rel="stylesheet" href="more/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<link rel="shortcut icon" href="/more/icon.png" type="image/x-icon" />
</head>
<body background="/more/bgtest.png">
<script type="text/javascript">
function emotion(em) { document.smiley.topicinfo.value=document.smiley.topicinfo.value+em;}
</script>
<table width="100%" height="335" align="center" cellpadding="0" cellspacing="3">
<tr>
<td width="250" height="25"></td>
<td width="100%">
</td>
<td width="250"></td>
</tr>

<tr>
<td width="250" valign="top">
<? include 'leftmenu.php'; ?>
</td>
<td width="100%" valign="top">
<?php 


$saturate = "/[^a-z0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$userip = $_SERVER[REMOTE_ADDR]; 
$gangsterusername = $usernameone;

$rank = $myrank;





?> 
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b>Forum</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td class="left" NOWRAP></td>
<td background="/more/crossbg.png">
<br>




<table align="center" width="80%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="8" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><center><font color="#222222" face="verdana" size="1"><b>Main Forum</b></font></center></font></font></td>
<td width="8" height="8" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png"></td>
<td background="/more/crossbg.png">
<table width="100%" cellpadding="0" cellspacing="2" align="center">
<tr><td align=center bgcolor=#222222><font color="white" face=verdana size=2>Recent Topics</font></td><td bgcolor=#222222><font size=2 face=verdana color="white">&nbsp;&nbsp;Posts&nbsp;&nbsp;</font></td><td bgcolor=#222222 nowrap><font size=2 face=verdana color="white">&nbsp;&nbsp;New Posts&nbsp;&nbsp;</font></td></tr>

<?php
$selecttopicssql = mysql_query("SELECT * FROM forumtopics WHERE type = 'e'  ORDER BY time DESC");

$selectstickysql = mysql_query("SELECT * FROM forumtopics WHERE type = 'd' ORDER BY time DESC LIMIT 0,50");

$selectimportantsql = mysql_query("SELECT * FROM forumtopics WHERE type = 'main' AND creator = '$user' AND topicid != '5481' ORDER BY time DESC LIMIT 0,50");



$apattern[1] = "/\[b\](.*?)\[\/b\]/is";
$apattern[2] = "/\[u\](.*?)\[\/u\]/is";
$apattern[3] = "/\[i\](.*?)\[\/i\]/is";
$apattern[5] = "/\[color=(.*?)\](.*?)\[\/color\]/is";
$apattern[13] = "/\[s\](.*?)\[\/s\]/is";


$areplace[1] = "<b>$1</b>";
$areplace[2] = "<u>$1</u>";
$areplace[3] = "<i>$1</i>";
$areplace[5] = "<font color=\"$1\">$2</font>";
$areplace[13] = "<s>$1</s>";

$bpattern[1] = ":arrow:";
$bpattern[2] = ":D";
$bpattern[3] = ":S";
$bpattern[4] = "8)";
$bpattern[5] = ":cry:";
$bpattern[6] = "8|";
$bpattern[7] = ":evil:";
$bpattern[8] = ":!:";
$bpattern[9] = ":idea:";
$bpattern[10] = ":lol:";
$bpattern[11] = ":mad:";
$bpattern[12] = ":?:";
$bpattern[13] = ":redface:";
$bpattern[14] = ":rolleyes:";
$bpattern[15] = ":(";
$bpattern[16] = ":)";
$bpattern[17] = ":o";
$bpattern[18] = ":tdn:";
$bpattern[19] = ":P";
$bpattern[20] = ":tup:";
$bpattern[21] = ":twisted:";
$bpattern[22] = ";)";

$breplace[1] = '<img src=/more/smiles/arrow.gif border=0>';
$breplace[2] = '<img src=/more/smiles/biggrin.gif border=0>';
$breplace[3] = '<img src=/more/smiles/confused.gif border=0>';
$breplace[4] = '<img src=/more/smiles/cool.gif border=0>';
$breplace[5] = '<img src=/more/smiles/cry.gif border=0>';
$breplace[6] = '<img src=/more/smiles/eek.gif border=0>';
$breplace[7] = '<img src=/more/smiles/evil.gif border=0>';
$breplace[8] = '<img src=/more/smiles/exclaim.gif border=0>';
$breplace[9] = '<img src=/more/smiles/idea.gif border=0>';
$breplace[10] = '<img src=/more/smiles/lol.gif border=0>';
$breplace[11] = '<img src=/more/smiles/mad.gif border=0>';
$breplace[12] = '<img src=/more/smiles/question.gif border=0>';
$breplace[13] = '<img src=/more/smiles/redface.gif border=0>';
$breplace[14] = '<img src=/more/smiles/rolleyes.gif border=0>';
$breplace[15] = '<img src=/more/smiles/sad.gif border=0>';
$breplace[16] = '<img src=/more/smiles/smile.gif border=0>';
$breplace[17] = '<img src=/more/smiles/surprised.gif border=0>';
$breplace[18] = '<img src=/more/smiles/tdown.gif border=0>';
$breplace[19] = '<img src=/more/smiles/toungue.gif border=0>';
$breplace[20] = '<img src=/more/smiles/tup.gif border=0>';
$breplace[21] = '<img src=/more/smiles/twisted.gif border=0>';
$breplace[22] = '<img src=/more/smiles/wink.gif border=0>';





while($selectimportant = mysql_fetch_array($selectimportantsql))
{

$countywounty = 1;


$ititle = html_entity_decode($selectimportant ['title'], ENT_NOQUOTES);
$itopicid = $selectimportant['topicid'];
$ilocked = $selectimportant['locked'];
$icreator = $selectimportant['creator'];
$iforumrank = $selectimportant['rankid'];
$inew = $selectimportant['new'];

$zpattern[a] = "<";
$zpattern[b] = ">";

$zreplace[a] = "&lt;";
$zreplace[b] = "&gt;";

$i = 0;
$while = mysql_query("SELECT word FROM blacklist");
while ($all = mysql_fetch_array($while)){
$i = $i + 1;
$zpattern[$i] = $all['word'];
$zreplace[$i] = "mafiasociety";}

$ititle = str_replace($zpattern,$zreplace,$ititle);


if($iforumrank >= '25'){

$ititlea = preg_replace($apattern,$areplace,$ititle);


$ititle = str_replace($bpattern,$breplace,$ititlea);
}
if($inew >= '1'){$cul = 555555;$culs = white;}else{$cul = 333333;$culs = silver;}

$itopicpost = $selectimportant['posts'];

echo("<tr><td bgcolor=#$cul width=100%><a href=viewtopic.php?topicid=$itopicid STYLE=FONT-FAMILY:tahoma;>&nbsp;</font><font color=$culs size=1 face=verdana>&nbsp;$ititle</font></a>");
if($ilocked == 'yes'){echo'<font color=gray size=1 face=verdana>&nbsp;(Locked)</font>';}
echo("</td><td bgcolor=#$cul><font color=$culs size=1 face=verdana>&nbsp;$itopicpost</font>");
if($inew > '1'){
echo("</td><td bgcolor=222222><font color=khaki size=1 face=verdana>&nbsp;<b>$inew new posts</b></font></td></tr>");}
elseif($inew == '1'){
echo("</td><td bgcolor=222222><font color=khaki size=1 face=verdana>&nbsp;<b>$inew new post</b></font></td></tr>");}
else{
echo("</td><td bgcolor=333333></td></tr>");}

}

if(!$countywounty){echo'<tr><td colspan=3 bgcolor=333333 align=center><br><font color=white size=1 face=verdana>You do not currently have any open main forum topics</font><br><br></td></tr>';}

?>

</table>
</td>
<td width="8" background="/more/rightb.png" NOWRAP></td>
</tr>

<tr>
<td width="8" height="9" background="/more/bottomleft.png"></td>
<td height="9" background="/more/bottom.png"></td>
<td width="8" height="9" background="/more/bottomright.png"></td>
</tr>
</table>




<br>
<table align="center" width="80%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="8" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><center><font color="#222222" face="verdana" size="1"><b>Designers Forum</b></font></center></font></font></td>
<td width="8" height="8" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png"></td>
<td background="/more/crossbg.png">
<table width="100%" cellpadding="0" cellspacing="2" align="center">
<tr><td align=center bgcolor=#222222><font color="white" face=verdana size=2>Recent Topics</font></td><td bgcolor=#222222><font size=2 face=verdana color="white">&nbsp;&nbsp;Posts&nbsp;&nbsp;</font></td><td bgcolor=#222222 nowrap><font size=2 face=verdana color="white">&nbsp;&nbsp;New Posts&nbsp;&nbsp;</font></td></tr>

<?php

$selectimportantsql = mysql_query("SELECT * FROM forumtopics WHERE type = 'd' AND creator = '$user' ORDER BY time DESC LIMIT 0,50");



$apattern[1] = "/\[b\](.*?)\[\/b\]/is";
$apattern[2] = "/\[u\](.*?)\[\/u\]/is";
$apattern[3] = "/\[i\](.*?)\[\/i\]/is";
$apattern[5] = "/\[color=(.*?)\](.*?)\[\/color\]/is";
$apattern[13] = "/\[s\](.*?)\[\/s\]/is";


$areplace[1] = "<b>$1</b>";
$areplace[2] = "<u>$1</u>";
$areplace[3] = "<i>$1</i>";
$areplace[5] = "<font color=\"$1\">$2</font>";
$areplace[13] = "<s>$1</s>";

$bpattern[1] = ":arrow:";
$bpattern[2] = ":D";
$bpattern[3] = ":S";
$bpattern[4] = "8)";
$bpattern[5] = ":cry:";
$bpattern[6] = "8|";
$bpattern[7] = ":evil:";
$bpattern[8] = ":!:";
$bpattern[9] = ":idea:";
$bpattern[10] = ":lol:";
$bpattern[11] = ":mad:";
$bpattern[12] = ":?:";
$bpattern[13] = ":redface:";
$bpattern[14] = ":rolleyes:";
$bpattern[15] = ":(";
$bpattern[16] = ":)";
$bpattern[17] = ":o";
$bpattern[18] = ":tdn:";
$bpattern[19] = ":P";
$bpattern[20] = ":tup:";
$bpattern[21] = ":twisted:";
$bpattern[22] = ";)";

$breplace[1] = '<img src=/more/smiles/arrow.gif border=0>';
$breplace[2] = '<img src=/more/smiles/biggrin.gif border=0>';
$breplace[3] = '<img src=/more/smiles/confused.gif border=0>';
$breplace[4] = '<img src=/more/smiles/cool.gif border=0>';
$breplace[5] = '<img src=/more/smiles/cry.gif border=0>';
$breplace[6] = '<img src=/more/smiles/eek.gif border=0>';
$breplace[7] = '<img src=/more/smiles/evil.gif border=0>';
$breplace[8] = '<img src=/more/smiles/exclaim.gif border=0>';
$breplace[9] = '<img src=/more/smiles/idea.gif border=0>';
$breplace[10] = '<img src=/more/smiles/lol.gif border=0>';
$breplace[11] = '<img src=/more/smiles/mad.gif border=0>';
$breplace[12] = '<img src=/more/smiles/question.gif border=0>';
$breplace[13] = '<img src=/more/smiles/redface.gif border=0>';
$breplace[14] = '<img src=/more/smiles/rolleyes.gif border=0>';
$breplace[15] = '<img src=/more/smiles/sad.gif border=0>';
$breplace[16] = '<img src=/more/smiles/smile.gif border=0>';
$breplace[17] = '<img src=/more/smiles/surprised.gif border=0>';
$breplace[18] = '<img src=/more/smiles/tdown.gif border=0>';
$breplace[19] = '<img src=/more/smiles/toungue.gif border=0>';
$breplace[20] = '<img src=/more/smiles/tup.gif border=0>';
$breplace[21] = '<img src=/more/smiles/twisted.gif border=0>';
$breplace[22] = '<img src=/more/smiles/wink.gif border=0>';





while($selectimportant = mysql_fetch_array($selectimportantsql))
{

$countywountyd = 1;


$ititle = html_entity_decode($selectimportant ['title'], ENT_NOQUOTES);
$itopicid = $selectimportant['topicid'];
$ilocked = $selectimportant['locked'];
$icreator = $selectimportant['creator'];
$iforumrank = $selectimportant['rankid'];
$inew = $selectimportant['new'];

$zpattern[a] = "<";
$zpattern[b] = ">";

$zreplace[a] = "&lt;";
$zreplace[b] = "&gt;";

$i = 0;
$while = mysql_query("SELECT word FROM blacklist");
while ($all = mysql_fetch_array($while)){
$i = $i + 1;
$zpattern[$i] = $all['word'];
$zreplace[$i] = "mafiasociety";}

$ititle = str_replace($zpattern,$zreplace,$ititle);

if($iforumrank >= '25'){

$ititlea = preg_replace($apattern,$areplace,$ititle);


$ititle = str_replace($bpattern,$breplace,$ititlea);
}
if($inew >= '1'){$cul = 555555;$culs = white;}else{$cul = 333333;$culs = silver;}

$itopicpost = $selectimportant['posts'];

echo("<tr><td bgcolor=#$cul width=100%><a href=dviewtopic.php?topicid=$itopicid STYLE=FONT-FAMILY:tahoma;>&nbsp;</font><font color=$culs size=1 face=verdana>&nbsp;$ititle</font></a>");
if($ilocked == 'yes'){echo'<font color=gray size=1 face=verdana>&nbsp;(Locked)</font>';}
echo("</td><td bgcolor=#$cul><font color=$culs size=1 face=verdana>&nbsp;$itopicpost</font>");
if($inew > '1'){
echo("</td><td bgcolor=222222><font color=khaki size=1 face=verdana>&nbsp;<b>$inew new posts</b></font></td></tr>");}
elseif($inew == '1'){
echo("</td><td bgcolor=222222><font color=khaki size=1 face=verdana>&nbsp;<b>$inew new post</b></font></td></tr>");}
else{
echo("</td><td bgcolor=333333></td></tr>");}

}


if($countywountyd == 0){echo'<tr><td colspan=3 bgcolor=333333 align=center><br><font color=white size=1 face=verdana>You do not currently have any open main forum topics</font><br><br></td></tr>';}

?>

</table>
</td>
<td width="8" background="/more/rightb.png" NOWRAP></td>
</tr>

<tr>
<td width="8" height="9" background="/more/bottomleft.png"></td>
<td height="9" background="/more/bottom.png"></td>
<td width="8" height="9" background="/more/bottomright.png"></td>
</tr>
</table>
<?if($crewid != '0'){?><br>
<table align="center" width="80%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="8" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><center><font color="#222222" face="verdana" size="1"><b>Crew Forum</b></font></center></font></font></td>
<td width="8" height="8" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png"></td>
<td background="/more/crossbg.png">
<table width="100%" cellpadding="0" cellspacing="2" align="center">
<tr><td align=center bgcolor=#222222><font color="white" face=verdana size=2>Recent Topics</font></td><td bgcolor=#222222><font size=2 face=verdana color="white">&nbsp;&nbsp;Posts&nbsp;&nbsp;</font></td><td bgcolor=#222222 nowrap><font size=2 face=verdana color="white">&nbsp;&nbsp;New Posts&nbsp;&nbsp;</font></td></tr>

<?php

$selectimportantsql = mysql_query("SELECT * FROM forumtopics WHERE type = '$crewid' AND creator = '$user' ORDER BY time DESC LIMIT 0,50");



$apattern[1] = "/\[b\](.*?)\[\/b\]/is";
$apattern[2] = "/\[u\](.*?)\[\/u\]/is";
$apattern[3] = "/\[i\](.*?)\[\/i\]/is";
$apattern[5] = "/\[color=(.*?)\](.*?)\[\/color\]/is";
$apattern[13] = "/\[s\](.*?)\[\/s\]/is";


$areplace[1] = "<b>$1</b>";
$areplace[2] = "<u>$1</u>";
$areplace[3] = "<i>$1</i>";
$areplace[5] = "<font color=\"$1\">$2</font>";
$areplace[13] = "<s>$1</s>";

$bpattern[1] = ":arrow:";
$bpattern[2] = ":D";
$bpattern[3] = ":S";
$bpattern[4] = "8)";
$bpattern[5] = ":cry:";
$bpattern[6] = "8|";
$bpattern[7] = ":evil:";
$bpattern[8] = ":!:";
$bpattern[9] = ":idea:";
$bpattern[10] = ":lol:";
$bpattern[11] = ":mad:";
$bpattern[12] = ":?:";
$bpattern[13] = ":redface:";
$bpattern[14] = ":rolleyes:";
$bpattern[15] = ":(";
$bpattern[16] = ":)";
$bpattern[17] = ":o";
$bpattern[18] = ":tdn:";
$bpattern[19] = ":P";
$bpattern[20] = ":tup:";
$bpattern[21] = ":twisted:";
$bpattern[22] = ";)";

$breplace[1] = '<img src=/more/smiles/arrow.gif border=0>';
$breplace[2] = '<img src=/more/smiles/biggrin.gif border=0>';
$breplace[3] = '<img src=/more/smiles/confused.gif border=0>';
$breplace[4] = '<img src=/more/smiles/cool.gif border=0>';
$breplace[5] = '<img src=/more/smiles/cry.gif border=0>';
$breplace[6] = '<img src=/more/smiles/eek.gif border=0>';
$breplace[7] = '<img src=/more/smiles/evil.gif border=0>';
$breplace[8] = '<img src=/more/smiles/exclaim.gif border=0>';
$breplace[9] = '<img src=/more/smiles/idea.gif border=0>';
$breplace[10] = '<img src=/more/smiles/lol.gif border=0>';
$breplace[11] = '<img src=/more/smiles/mad.gif border=0>';
$breplace[12] = '<img src=/more/smiles/question.gif border=0>';
$breplace[13] = '<img src=/more/smiles/redface.gif border=0>';
$breplace[14] = '<img src=/more/smiles/rolleyes.gif border=0>';
$breplace[15] = '<img src=/more/smiles/sad.gif border=0>';
$breplace[16] = '<img src=/more/smiles/smile.gif border=0>';
$breplace[17] = '<img src=/more/smiles/surprised.gif border=0>';
$breplace[18] = '<img src=/more/smiles/tdown.gif border=0>';
$breplace[19] = '<img src=/more/smiles/toungue.gif border=0>';
$breplace[20] = '<img src=/more/smiles/tup.gif border=0>';
$breplace[21] = '<img src=/more/smiles/twisted.gif border=0>';
$breplace[22] = '<img src=/more/smiles/wink.gif border=0>';





while($selectimportant = mysql_fetch_array($selectimportantsql))
{

$countywountyc = 1;


$ititle = html_entity_decode($selectimportant ['title'], ENT_NOQUOTES);
$itopicid = $selectimportant['topicid'];
$ilocked = $selectimportant['locked'];
$icreator = $selectimportant['creator'];
$iforumrank = $selectimportant['rankid'];
$inew = $selectimportant['new'];

$zpattern[a] = "<";
$zpattern[b] = ">";

$zreplace[a] = "&lt;";
$zreplace[b] = "&gt;";

$i = 0;
$while = mysql_query("SELECT word FROM blacklist");
while ($all = mysql_fetch_array($while)){
$i = $i + 1;
$zpattern[$i] = $all['word'];
$zreplace[$i] = "mafiasociety";}

$ititle = str_replace($zpattern,$zreplace,$ititle);

if($iforumrank >= '25'){

$ititlea = preg_replace($apattern,$areplace,$ititle);


$ititle = str_replace($bpattern,$breplace,$ititlea);
}
if($inew >= '1'){$cul = '666666';$culs = white;}else{$cul = 333333;$culs = silver;}

$itopicpost = $selectimportant['posts'];

echo("<tr><td bgcolor=$cul width=100%><a href=crewviewtopic.php?topicid=$itopicid STYLE=FONT-FAMILY:tahoma;>&nbsp;</font><font color=$culs size=1 face=verdana>&nbsp;$ititle</font></a>");
if($ilocked == 'yes'){echo'<font color=gray size=1 face=verdana>&nbsp;(Locked)</font>';}
echo("</td><td bgcolor=$cul><font color=$culs size=1 face=verdana>&nbsp;$itopicpost</font>");
if($inew > '1'){
echo("</td><td bgcolor=222222><font color=khaki size=1 face=verdana>&nbsp;<b>$inew new posts</b></font></td></tr>");}
elseif($inew == '1'){
echo("</td><td bgcolor=222222><font color=khaki size=1 face=verdana>&nbsp;<b>$inew new post</b></font></td></tr>");}
else{
echo("</td><td bgcolor=333333></td></tr>");}

}if(!$countywountyc){echo'<tr><td colspan=3 bgcolor=333333 align=center><br><font color=white size=1 face=verdana>You do not currently have any open crew forum topics</font><br><br></td></tr>';}

?>

</table>
</td>
<td width="8" background="/more/rightb.png" NOWRAP></td>
</tr>

<tr>
<td width="8" height="9" background="/more/bottomleft.png"></td>
<td height="9" background="/more/bottom.png"></td>
<td width="8" height="9" background="/more/bottomright.png"></td>
</tr>
</table>
<?}?>
<?if($ent != '0'){?><br>
<table align="center" width="80%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="8" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><center><font color="#222222" face="verdana" size="1"><b>Entertainment Forum</b></font></center></font></font></td>
<td width="8" height="8" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png"></td>
<td background="/more/crossbg.png">
<table width="100%" cellpadding="0" cellspacing="2" align="center">
<tr><td align=center bgcolor=#222222><font color="white" face=verdana size=2>Recent Topics</font></td><td bgcolor=#222222><font size=2 face=verdana color="white">&nbsp;&nbsp;Posts&nbsp;&nbsp;</font></td><td bgcolor=#222222 nowrap><font size=2 face=verdana color="white">&nbsp;&nbsp;New Posts&nbsp;&nbsp;</font></td></tr>

<?php

$selectimportantsql = mysql_query("SELECT * FROM forumtopics WHERE type = 'e' AND creator = '$user' ORDER BY time DESC LIMIT 0,50");



$apattern[1] = "/\[b\](.*?)\[\/b\]/is";
$apattern[2] = "/\[u\](.*?)\[\/u\]/is";
$apattern[3] = "/\[i\](.*?)\[\/i\]/is";
$apattern[5] = "/\[color=(.*?)\](.*?)\[\/color\]/is";
$apattern[13] = "/\[s\](.*?)\[\/s\]/is";


$areplace[1] = "<b>$1</b>";
$areplace[2] = "<u>$1</u>";
$areplace[3] = "<i>$1</i>";
$areplace[5] = "<font color=\"$1\">$2</font>";
$areplace[13] = "<s>$1</s>";

$bpattern[1] = ":arrow:";
$bpattern[2] = ":D";
$bpattern[3] = ":S";
$bpattern[4] = "8)";
$bpattern[5] = ":cry:";
$bpattern[6] = "8|";
$bpattern[7] = ":evil:";
$bpattern[8] = ":!:";
$bpattern[9] = ":idea:";
$bpattern[10] = ":lol:";
$bpattern[11] = ":mad:";
$bpattern[12] = ":?:";
$bpattern[13] = ":redface:";
$bpattern[14] = ":rolleyes:";
$bpattern[15] = ":(";
$bpattern[16] = ":)";
$bpattern[17] = ":o";
$bpattern[18] = ":tdn:";
$bpattern[19] = ":P";
$bpattern[20] = ":tup:";
$bpattern[21] = ":twisted:";
$bpattern[22] = ";)";

$breplace[1] = '<img src=/more/smiles/arrow.gif border=0>';
$breplace[2] = '<img src=/more/smiles/biggrin.gif border=0>';
$breplace[3] = '<img src=/more/smiles/confused.gif border=0>';
$breplace[4] = '<img src=/more/smiles/cool.gif border=0>';
$breplace[5] = '<img src=/more/smiles/cry.gif border=0>';
$breplace[6] = '<img src=/more/smiles/eek.gif border=0>';
$breplace[7] = '<img src=/more/smiles/evil.gif border=0>';
$breplace[8] = '<img src=/more/smiles/exclaim.gif border=0>';
$breplace[9] = '<img src=/more/smiles/idea.gif border=0>';
$breplace[10] = '<img src=/more/smiles/lol.gif border=0>';
$breplace[11] = '<img src=/more/smiles/mad.gif border=0>';
$breplace[12] = '<img src=/more/smiles/question.gif border=0>';
$breplace[13] = '<img src=/more/smiles/redface.gif border=0>';
$breplace[14] = '<img src=/more/smiles/rolleyes.gif border=0>';
$breplace[15] = '<img src=/more/smiles/sad.gif border=0>';
$breplace[16] = '<img src=/more/smiles/smile.gif border=0>';
$breplace[17] = '<img src=/more/smiles/surprised.gif border=0>';
$breplace[18] = '<img src=/more/smiles/tdown.gif border=0>';
$breplace[19] = '<img src=/more/smiles/toungue.gif border=0>';
$breplace[20] = '<img src=/more/smiles/tup.gif border=0>';
$breplace[21] = '<img src=/more/smiles/twisted.gif border=0>';
$breplace[22] = '<img src=/more/smiles/wink.gif border=0>';





while($selectimportant = mysql_fetch_array($selectimportantsql))
{

$countywountye = 1;


$ititle = html_entity_decode($selectimportant ['title'], ENT_NOQUOTES);
$itopicid = $selectimportant['topicid'];
$ilocked = $selectimportant['locked'];
$icreator = $selectimportant['creator'];
$iforumrank = $selectimportant['rankid'];
$inew = $selectimportant['new'];

$zpattern[a] = "<";
$zpattern[b] = ">";

$zreplace[a] = "&lt;";
$zreplace[b] = "&gt;";

$i = 0;
$while = mysql_query("SELECT word FROM blacklist");
while ($all = mysql_fetch_array($while)){
$i = $i + 1;
$zpattern[$i] = $all['word'];
$zreplace[$i] = "mafiasociety";}

$ititle = str_replace($zpattern,$zreplace,$ititle);

if($iforumrank >= '25'){

$ititlea = preg_replace($apattern,$areplace,$ititle);


$ititle = str_replace($bpattern,$breplace,$ititlea);
}
if($inew >= '1'){$cul = 555555;$culs = white;}else{$cul = 333333;$culs = silver;}

$itopicpost = $selectimportant['posts'];

echo("<tr><td bgcolor=#$cul width=100%><a href=eviewtopic.php?topicid=$itopicid STYLE=FONT-FAMILY:tahoma;>&nbsp;</font><font color=$culs size=1 face=verdana>&nbsp;$ititle</font></a>");
if($ilocked == 'yes'){echo'<font color=gray size=1 face=verdana>&nbsp;(Locked)</font>';}
echo("</td><td bgcolor=#$cul><font color=$culs size=1 face=verdana>&nbsp;$itopicpost</font>");
if($inew > '1'){
echo("</td><td bgcolor=222222><font color=khaki size=1 face=verdana>&nbsp;<b>$inew new posts</b></font></td></tr>");}
elseif($inew == '1'){
echo("</td><td bgcolor=222222><font color=khaki size=1 face=verdana>&nbsp;<b>$inew new post</b></font></td></tr>");}
else{
echo("</td><td bgcolor=333333></td></tr>");}

}if(!$countywountye){echo'<tr><td colspan=3 bgcolor=333333 align=center><br><font color=white size=1 face=verdana>You do not currently have any open crew forum topics</font><br><br></td></tr>';}

?>

</table>
</td>
<td width="8" background="/more/rightb.png" NOWRAP></td>
</tr>

<tr>
<td width="8" height="9" background="/more/bottomleft.png"></td>
<td height="9" background="/more/bottom.png"></td>
<td width="8" height="9" background="/more/bottomright.png"></td>
</tr>
</table>
<?}?>




<br>
<table width="98%" cellpadding="0" cellspacing="0" align="center"><tr><td height="1" bgcolor="#444444"></td></tr><td height="11"></td></tr></table>

</td>
<td width="8" background="/more/rightb.png" NOWRAP></td>
</tr>

<tr>
<td width="8" height="9" background="/more/bottomleft.png"></td>
<td height="9" background="/more/bottom.png"></td>
<td width="8" height="9" background="/more/bottomright.png"></td>
</tr>
</table>
</td>
<td width="250" valign="top">
<? include 'rightmenu.php'; ?>
</td>
</tr>
</table>

</body></html>