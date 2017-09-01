<?
include 'included2.php'; 

$saturate = "/[^a-z0-9]/i";
$saturated = "/[^0-9]/i";
$topicidraw = $_GET['posts'];
$topicid = preg_replace($saturated,"",$topicidraw);

$ifnew = mysql_num_rows(mysql_query("SELECT * FROM home WHERE id > '$topicid'"));

if($ifnew > 0){
echo"<table width=100%><tr><td width=100% bgcolor=222222 height=40 align=center valign=middle style='border: black 1px solid;border-radius:25px;'><a href=home.php><b><u><font color=white face=verdana size=1>There are <font color=khaki>$ifnew</font> new feeds,</font><font color=white face=verdana size=1> click here to view</u>!</font></b></a></td></tr></table><br>";}
?>