<?
include 'included2.php'; 

$saturate = "/[^a-z0-9]/i";
$saturated = "/[^0-9]/i";
$givengameid = $_GET['gameid'];
$givengameplayers = $_GET['players'];
echo $givengameplayers;
echo $givegameid;

$tryit = mysql_num_rows(mysql_query("SELECT * FROM blackjackmulti WHERE gameid = '$givengameplayers' AND finished = '1'"));
if($if == 1){ echo"<table width=70% align=center cellpadding=0 cellspacing=1 class=section>
<tr><td><div class=button1 style=background-color:#171717;>&nbsp;<a href=multiblackjackgame.php?game=$givengameid><b><font color=khaki face=verdana size=1>A player has joined the game, click here to refresh!</td></tr>
</table><br>"; }
?>