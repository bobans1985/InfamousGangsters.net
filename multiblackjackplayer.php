<?
include 'included2.php'; 

$saturate = "/[^a-z0-9]/i";
$saturated = "/[^0-9]/i";
$current = $_GET['current'];
$totalplayers = $_GET['totalplayers'];
$givengameid = $_GET['gameid'];

$if = mysql_num_rows(mysql_query("SELECT * FROM blackjackmultijoin WHERE gameid = '$givengameid'"));
if($if != $current){ echo"<table width=70% align=center cellpadding=0 cellspacing=1 class=section>
<tr><td><div class=button1 style=background-color:#171717;>&nbsp;<a href=multiblackjackgame.php?game=$givengameid><b><font color=khaki face=verdana size=1>A player has joined the game, click here to refresh!</td></tr>
</table><br>"; }
?>