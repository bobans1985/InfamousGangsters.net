<?
$aceofha = mysql_query("SELECT * FROM blackjackmulticards WHERE player = '1' AND gameid = '$dogameid' AND card = '1h'");
$aceofsa = mysql_query("SELECT * FROM blackjackmulticards WHERE player = '1' AND gameid = '$dogameid' AND card = '1s'");
$aceofca = mysql_query("SELECT * FROM blackjackmulticards WHERE player = '1' AND gameid = '$dogameid' AND card = '1c'");
$aceofda = mysql_query("SELECT * FROM blackjackmulticards WHERE player = '1' AND gameid = '$dogameid' AND card = '1d'");
$aceofh = mysql_num_rows($aceofha);
$aceofs = mysql_num_rows($aceofsa);
$aceofc = mysql_num_rows($aceofca);
$aceofd2 = mysql_num_rows($aceofda);
$aces2 = $aceofh + $aceofs + $aceofc + $aceofd;

$count = 0;
$countraw = mysql_query("SELECT * FROM blackjackmulticards WHERE player = '1' AND gameid = '$dogameid'");
while($countrawa = mysql_fetch_array($countraw)){
$card = $countrawa['card'];
$cardvalue = mysql_query("SELECT * FROM cards WHERE name = '$card'");
$cardvaluea = mysql_fetch_array($cardvalue);
$value = $cardvaluea['value'];
$count = $count + $value;}

while(($count > 21) && ($aces >= 1)){
$count = $count - 10;
$aces = $aces - 1;}

$aceofha2 = mysql_query("SELECT * FROM blackjackmulticards WHERE player = '2' AND gameid = '$dogameid' AND card = '1h'");
$aceofsa2 = mysql_query("SELECT * FROM blackjackmulticards WHERE player = '2' AND gameid = '$dogameid' AND card = '1s'");
$aceofca2 = mysql_query("SELECT * FROM blackjackmulticards WHERE player = '2' AND gameid = '$dogameid' AND card = '1c'");
$aceofda2 = mysql_query("SELECT * FROM blackjackmulticards WHERE player = '2' AND gameid = '$dogameid' AND card = '1d'");
$aceofh2 = mysql_num_rows($aceofha2);
$aceofs2 = mysql_num_rows($aceofsa2);
$aceofc2 = mysql_num_rows($aceofca2);
$aceofd2 = mysql_num_rows($aceofda2);
$aces2 = $aceofh2 + $aceofs2 + $aceofc2 + $aceofd2;

$count2 = 0;
$countraw2 = mysql_query("SELECT * FROM blackjackmulticards WHERE player = '2' AND gameid = '$dogameid'");
while($countrawa2 = mysql_fetch_array($countraw2)){
$card2 = $countrawa2['card'];
$cardvalue2 = mysql_query("SELECT * FROM cards WHERE name = '$card2'");
$cardvaluea2 = mysql_fetch_array($cardvalue2);
$value2 = $cardvaluea2['value'];
$count2 = $count2 + $value2;}

while(($count2 > 21) && ($aces2 >= 1)){
$count2 = $count2 - 10;
$aces2 = $aces2 - 1;}

if($count > $count2){ echo "
?>