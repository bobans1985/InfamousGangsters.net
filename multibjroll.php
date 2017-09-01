<?

$player1aceofha = mysql_query("SELECT * FROM blackjackmulticards WHERE player = '1' AND gameid = '$gameid' AND card = '1h'");
$player1aceofsa = mysql_query("SELECT * FROM blackjackmulticards WHERE player = '1' AND gameid = '$gameid' AND card = '1s'");
$player1aceofca = mysql_query("SELECT * FROM blackjackmulticards WHERE player = '1' AND gameid = '$gameid' AND card = '1c'");
$player1aceofda = mysql_query("SELECT * FROM blackjackmulticards WHERE player = '1' AND gameid = '$gameid' AND card = '1d'");
$player1aceofh = mysql_num_rows($aceofha);
$player1aceofs = mysql_num_rows($aceofsa);
$player1aceofc = mysql_num_rows($aceofca);
$player1aceofd = mysql_num_rows($aceofda);
$player1aces = $player1aceofh + $player1aceofs + $player1aceofc + $player1aceofd;

$player1count = 0;
$player1countraw = mysql_query("SELECT * FROM blackjackmulticards WHERE player = '1' AND gameid = '$gameid'");
while($player1countrawa = mysql_fetch_array($player1countraw)){
$player1card = $player1countrawa['card'];
$player1cardvalue = mysql_query("SELECT * FROM cards WHERE name = '$player1card'");
$player1cardvaluea = mysql_fetch_array($player1cardvalue);
$player1value = $player1cardvaluea['value'];
$player1count = $player1count + $player1value;}

while(($player1count > 21) && ($player1aces >= 1)){
$player1count = $player1count - 10;
$player1aces = $player1aces - 1;}
if($player1count > 21){ $player1count = 0; }

$player2aceofha = mysql_query("SELECT * FROM blackjackmulticards WHERE player = '2' AND gameid = '$gameid' AND card = '1h'");
$player2aceofsa = mysql_query("SELECT * FROM blackjackmulticards WHERE player = '2' AND gameid = '$gameid' AND card = '1s'");
$player2aceofca = mysql_query("SELECT * FROM blackjackmulticards WHERE player = '2' AND gameid = '$gameid' AND card = '1c'");
$player2aceofda = mysql_query("SELECT * FROM blackjackmulticards WHERE player = '2' AND gameid = '$gameid' AND card = '1d'");
$player2aceofh = mysql_num_rows($aceofha);
$player2aceofs = mysql_num_rows($aceofsa);
$player2aceofc = mysql_num_rows($aceofca);
$player2aceofd = mysql_num_rows($aceofda);
$player2aces = $player2aceofh + $player2aceofs + $player2aceofc + $player2aceofd;

$player2count = 0;
$player2countraw = mysql_query("SELECT * FROM blackjackmulticards WHERE player = '2' AND gameid = '$gameid'");
while($player2countrawa = mysql_fetch_array($player2countraw)){
$player2card = $player2countrawa['card'];
$player2cardvalue = mysql_query("SELECT * FROM cards WHERE name = '$player2card'");
$player2cardvaluea = mysql_fetch_array($player2cardvalue);
$player2value = $player2cardvaluea['value'];
$player2count = $player2count + $player2value;}

while(($player2count > 21) && ($player2aces >= 1)){
$player2count = $player2count - 10;
$player2aces = $player2aces - 1;}
if($player2count > 21){ $player2count = 0; }

if($gameplayers >= 3){
$player3aceofha = mysql_query("SELECT * FROM blackjackmulticards WHERE player = '3' AND gameid = '$gameid' AND card = '1h'");
$player3aceofsa = mysql_query("SELECT * FROM blackjackmulticards WHERE player = '3' AND gameid = '$gameid' AND card = '1s'");
$player3aceofca = mysql_query("SELECT * FROM blackjackmulticards WHERE player = '3' AND gameid = '$gameid' AND card = '1c'");
$player3aceofda = mysql_query("SELECT * FROM blackjackmulticards WHERE player = '3' AND gameid = '$gameid' AND card = '1d'");
$player3aceofh = mysql_num_rows($aceofha);
$player3aceofs = mysql_num_rows($aceofsa);
$player3aceofc = mysql_num_rows($aceofca);
$player3aceofd = mysql_num_rows($aceofda);
$player3aces = $player3aceofh + $player3aceofs + $player3aceofc + $player3aceofd;

$player3count = 0;
$player3countraw = mysql_query("SELECT * FROM blackjackmulticards WHERE player = '3' AND gameid = '$gameid'");
while($player3countrawa = mysql_fetch_array($player3countraw)){
$player3card = $player3countrawa['card'];
$player3cardvalue = mysql_query("SELECT * FROM cards WHERE name = '$player3card'");
$player3cardvaluea = mysql_fetch_array($player3cardvalue);
$player3value = $player3cardvaluea['value'];
$player3count = $player3count + $player3value;}

while(($player3count > 21) && ($player3aces >= 1)){
$player3count = $player3count - 10;
$player3aces = $player3aces - 1;}
if($player3count > 21){ $player3count = 0; }
}

if($gameplayers >= 4){
$player4aceofha = mysql_query("SELECT * FROM blackjackmulticards WHERE player = '4' AND gameid = '$gameid' AND card = '1h'");
$player4aceofsa = mysql_query("SELECT * FROM blackjackmulticards WHERE player = '4' AND gameid = '$gameid' AND card = '1s'");
$player4aceofca = mysql_query("SELECT * FROM blackjackmulticards WHERE player = '4' AND gameid = '$gameid' AND card = '1c'");
$player4aceofda = mysql_query("SELECT * FROM blackjackmulticards WHERE player = '4' AND gameid = '$gameid' AND card = '1d'");
$player4aceofh = mysql_num_rows($aceofha);
$player4aceofs = mysql_num_rows($aceofsa);
$player4aceofc = mysql_num_rows($aceofca);
$player4aceofd = mysql_num_rows($aceofda);
$player4aces = $player4aceofh + $player4aceofs + $player4aceofc + $player4aceofd;

$player4count = 0;
$player4countraw = mysql_query("SELECT * FROM blackjackmulticards WHERE player = '4' AND gameid = '$gameid'");
while($player4countrawa = mysql_fetch_array($player4countraw)){
$player4card = $player4countrawa['card'];
$player4cardvalue = mysql_query("SELECT * FROM cards WHERE name = '$player4card'");
$player4cardvaluea = mysql_fetch_array($player4cardvalue);
$player4value = $player4cardvaluea['value'];
$player4count = $player4count + $player4value;}

while(($player4count > 21) && ($player4aces >= 1)){
$player4count = $player4count - 10;
$player4aces = $player4aces - 1;}
if($player4count > 21){ $player4count = 0; }
}

if($gameplayers = 2){ 
if($player1count > $player2count){ 
$getwinnername = mysql_query("SELECT * FROM blackjackmultijoin WHERE gameid = '$gameid' AND player = '1'");
$winnerresult = mysql_fetch_array($getwinnername);
$player1name = $winnerresult['username'];
$showoutcome++; $outcome = "<a href=viewprofile.php?username=$player1name>$player1name</a> won the multi blackjack game!"; 
}
elseif($player2count > $player1count){ 
$getwinnername = mysql_query("SELECT * FROM blackjackmultijoin WHERE gameid = '$gameid' AND player = '2'");
$winnerresult = mysql_fetch_array($getwinnername);
$player2name = $winnerresult['username'];
$showoutcome++; $outcome = "<a href=viewprofile.php?username=$player2name>$player2name</a> won the multi blackjack game!"; 
}else{ $dodraw = 1; }}

if($gameplayers = 3){ 
if($player1count > $player2count AND $player1count > $player3count){ 
$getwinnername = mysql_query("SELECT * FROM blackjackmultijoin WHERE gameid = '$gameid' AND player = '1'");
$winnerresult = mysql_fetch_array($getwinnername);
$player1name = $winnerresult['username'];
$showoutcome++; $outcome = "<a href=viewprofile.php?username=$player1name>$player1name</a> won the multi blackjack game!"; }
elseif($player2count > $player1count AND $player2count > $player3count){ 
$getwinnername = mysql_query("SELECT * FROM blackjackmultijoin WHERE gameid = '$gameid' AND player = '2'");
$winnerresult = mysql_fetch_array($getwinnername);
$player2name = $winnerresult['username'];
$showoutcome++; $outcome = "<a href=viewprofile.php?username=$player2name>$player2name</a> won the multi blackjack game!"; }
elseif($player3count > $player1count AND $player3count > $player2count){ 
$getwinnername = mysql_query("SELECT * FROM blackjackmultijoin WHERE gameid = '$gameid' AND player = '3'");
$winnerresult = mysql_fetch_array($getwinnername);
$player3name = $winnerresult['username'];
$showoutcome++; $outcome = "<a href=viewprofile.php?username=$player3name>$player3name</a> won the multi blackjack game!"; 
}else{ $dodraw = 1; }}

if($gameplayers = 4){ 
if($player1count > $player2count AND $player1count > $player3count AND $player1count > $player4count){ 
$getwinnername = mysql_query("SELECT * FROM blackjackmultijoin WHERE gameid = '$gameid' AND player = '1'");
$winnerresult = mysql_fetch_array($getwinnername);
$player1name = $winnerresult['username'];
$showoutcome++; $outcome = "<a href=viewprofile.php?username=$player1name>$player1name</a> won the multi blackjack game!"; }
elseif($player2count > $player1count AND $player2count > $player3count AND $player2count > $player4count){ 
$getwinnername = mysql_query("SELECT * FROM blackjackmultijoin WHERE gameid = '$gameid' AND player = '2'");
$winnerresult = mysql_fetch_array($getwinnername);
$player2name = $winnerresult['username'];
$showoutcome++; $outcome = "<a href=viewprofile.php?username=$player2name>$player2name</a> won the multi blackjack game!"; }
elseif($player3count > $player1count AND $player3count > $player2count AND $player3count > $player4count){ 
$getwinnername = mysql_query("SELECT * FROM blackjackmultijoin WHERE gameid = '$gameid' AND player = '3'");
$winnerresult = mysql_fetch_array($getwinnername);
$player3name = $winnerresult['username'];
$showoutcome++; $outcome = "<a href=viewprofile.php?username=$player3name>$player3name</a> won the multi blackjack game!"; }
elseif($player4count > $player1count AND $player4count > $player2count AND $player4count > $player3count){ 
$getwinnername = mysql_query("SELECT * FROM blackjackmultijoin WHERE gameid = '$gameid' AND player = '4'");
$winnerresult = mysql_fetch_array($getwinnername);
$player4name = $winnerresult['username'];
$showoutcome++; $outcome = "<a href=viewprofile.php?username=$player4name>$player4name</a> won the multi blackjack game!"; 
}else{ $dodraw = 1; }}

mysql_query("UPDATE blackjackmulti SET finished = 1 WHERE id = '$gameid'");
mysql_query("UPDATE blackjackmulti SET time = 0 WHERE id = '$gameid'");

if($dodraw > 0){ $showoutcome++; $outcome = "There were no winners! Game has restarted.";
mysql_query("UPDATE blackjackmulti SET time = ($time + 150) WHERE id = '$gameid'"); 
mysql_query("UPDATE blackjackmulti SET endgame = ($time + 720) WHERE id = '$gameid'"); 
mysql_query("UPDATE blackjackmulti SET finished = '0' WHERE id = '$gameid'"); 
$dofirstcards = mysql_query("SELECT * FROM blackjackmultijoin WHERE gameid = '$gameid' ORDER BY player");
while($docards = mysql_fetch_array($dofirstcards)){
$cardsusername = $docards['username'];
$playerorder = $docards['player'];
mysql_query("DELETE FROM blackjackmulticards WHERE username = '$cardsusername' AND gameid = '$gameid'");
$type = array("h", "d", "c", "s");
$xone = mt_rand(0,3);
$xtwo = mt_rand(0,3);

$numone = mt_rand(1,13);
$numtwo = mt_rand(1,13);
$cardone = $numone.''.$type[$xone];
$cardtwo = $numtwo.''.$type[$xtwo];

mysql_query("INSERT INTO blackjackmulticards(username,card,gameid,player) VALUES ('$cardsusername','$cardone','$gameid','$playerorder')");
mysql_query("INSERT INTO blackjackmulticards(username,card,gameid,player) VALUES ('$cardsusername','$cardtwo','$gameid','$playerorder')");
}}
?>