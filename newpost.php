<?
include 'included2.php'; 

$saturate = "/[^a-z0-9]/i";
$saturated = "/[^0-9]/i";
$topicidraw = $_GET['posts'];
$topicid = preg_replace($saturated,"",$topicidraw);

$topicidraws = $_GET['topicid'];
$tits = preg_replace($saturated,"",$topicidraws);

$editsql = mysql_query("SELECT * FROM forumtopics WHERE topicid = '$tits' AND esc = '1'");
$editarray = mysql_fetch_array($editsql);
$sjs= mysql_num_rows($editsql);
$posttitss = mysql_num_rows(mysql_query("SELECT * FROM forumposts WHERE topicid = '$tits' AND esc = '1'"));
$news = $posttitss - $topicid;

if($sjs <= '0'){
echo"<table width=100%><tr><td width=100% bgcolor=222222 height=40 align=center valign=middle style='border: black 1px solid;border-radius:25px;'><b><u><font color=red face=verdana size=1>No such topic!</font></b></td></tr></table>";}else{
if($news > 1){ $news = $news - 1;
echo"<table width=100%><tr><td width=100% bgcolor=222222 height=40 align=center valign=middle style='border: black 1px solid;border-radius:25px;'><a href=viewtopic.php?topicid=$tits><b><u><font color=white face=verdana size=1>There are <font color=khaki>$news</font> new posts,</font><font color=white face=verdana size=1> click here to view</u>!</font></b></a></td></tr></table>";}}
?>