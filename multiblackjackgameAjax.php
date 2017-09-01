<? include 'included.php'; session_start();
$time = time();
$saturate = "/[^a-z0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$playerip = $_SERVER['REMOTE_ADDR'];
$gameid = $_GET['game'];
$username = $usernameone;
$userarray = $statustesttwo;
$userlocation = $userarray['location'];
$userrankid = $userarray['rankid'];
$usermoney = $userarray['money'];
$userpoints = $userarray['points'];
$penpoints = $userarray['penpoints'];
$today = date("m.d.y"); 

$player1countt = "n/a";
$player2countt = "n/a";
$getgame = mysql_query("SELECT * FROM blackjackmulti WHERE id = '$gameid'");
$gameidcorrect = mysql_num_rows($getgame);
$gameresults = mysql_fetch_array($getgame);
$gamename = $gameresults['username'];
$gameplayers = $gameresults['players'];
$gamedraw = $gameresults['draw'];
$gameamount = $gameresults['amount'];
$gametime = $gameresults['time'];
$gamefinished = $gameresults['finished'];
$gametimeleft = $gametime - time();
if($gametimeleft < 1){ $gametimeleft = 0; }
$gamecurrentplayers = mysql_num_rows(mysql_query("SELECT * FROM blackjackmultijoin WHERE gameid = '$gameid'"));
$gamestand = mysql_num_rows(mysql_query("SELECT * FROM blackjackmultijoin WHERE username = '$usernameone' AND gameid = '$gameid' AND stand = '1'"));


$howmanyplayersstand = mysql_num_rows(mysql_query("SELECT * FROM blackjackmultijoin WHERE gameid = '$gameid' AND stand = '1'"));
function doublemax($mylist){
  $maxvalue=max($mylist);
  while(list($key,$value)=each($mylist)){
    if($value==$maxvalue)$maxindex=$key;
  }
  return $maxindex;
} 
function getWinner(){
	global $gameid,$howmanyplayersstand;
	$getgame = mysql_query("SELECT * FROM blackjackmulti WHERE id = '$gameid'");
	$getGameData = mysql_fetch_array($getgame);
	$gameplayers = $getGameData['players'];
	$playerData = array();
	// echo $howmanyplayersstand."|".$gameplayers;
	for($i=0;$i < $gameplayers;$i++){
		// $thisPlayer = $playerDatas[$i];
		$playerData[($i + 1)] = 0;
		$playerr = mysql_query("SELECT * FROM blackjackmulticards WHERE player = '".($i+1)."' AND gameid = '$gameid'");
		while($player = mysql_fetch_array($playerr)){
			$playercard = $player['card'];
			$playercardvalue = mysql_query("SELECT * FROM cards WHERE name = '$playercard'");
			$playercardvaluea = mysql_fetch_array($playercardvalue);
			$playervalue = $playercardvaluea['value'];
			$playerData[($i + 1)] += $playervalue;
		}
	}
	// if nobody won
	foreach($playerData as $i => $p){
		if($p > 21){ unset($playerData[$i]); }
	}
	
	if(($howmanyplayersstand == $gameplayers OR $getGameData['finished'] == 1) AND !empty($playerData)){
		return doublemax($playerData);
	}elseif(($howmanyplayersstand == $gameplayers OR $getGameData['finished'] == 1) AND empty($playerData)){
		return "nobody";
	}
	
	
	return false;
}

// print_r(getWinner());

if($_GET['game'] AND $_GET["cancel_game"]){
	$gameid = $_GET['game'];
	$getgame = mysql_query("SELECT * FROM blackjackmulti WHERE id = '$gameid'");
	$gameidcorrect = mysql_num_rows($getgame);
	$gameresults = mysql_fetch_array($getgame);
	$gamename = $gameresults['username'];
	// echo $gamename."|".$username;
	if($gamename == $username){
		mysql_query("DELETE FROM blackjackmulti WHERE id = '$gameid'");
		mysql_query("DELETE FROM blackjackmulticards WHERE gameid = '$gameid'");
		mysql_query("DELETE FROM blackjackmultijoin WHERE gameid = '$gameid'");
	}else{
		mysql_query("DELETE FROM blackjackmulticards WHERE gameid = '$gameid' AND player = '$username'");
		mysql_query("DELETE FROM blackjackmultijoin WHERE gameid = '$gameid' AND player = '$username'");
	}
	echo"<script>location.href='multiblackjack.php';</script>";
}

if($_GET['game'] AND $_GET["join"]){
	$join = $_GET['game'];
	$jointest = mysql_num_rows(mysql_query("SELECT * FROM blackjackmulti WHERE id = '$join'"));
	$joinoktest = mysql_num_rows(mysql_query("SELECT * FROM blackjackmultijoin WHERE gameid = '$join' AND username = '$usernameone'"));
	$playersalready = mysql_num_rows(mysql_query("SELECT * FROM blackjackmultijoin WHERE gameid = '$join'"));
	$joininfo = mysql_fetch_array(mysql_query("SELECT * FROM blackjackmulti WHERE id = '$join'"));
	$joinbet = $joininfo['amount'];
	$joinname = $joininfo['username'];
	$playeramount = $joininfo['players'];
	if($jointest == '0'){}
	elseif($joinoktest > '0'){}
	elseif($playersalready >= $playeramount){}
	elseif($joinbet > $usermoney){}
	elseif($joinname == $usernameone){}
	else{
	mysql_query("UPDATE users SET money = money - $joinbet WHERE ID = '$ida' AND money >= '$joinbet'");
	if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 2.</font>');}
	mysql_query("UPDATE mbjprofit SET games = games + 1, winnings = winnings - $joinbet WHERE username = '$usernameone'");
	mysql_query("UPDATE users SET winnings = winnings - $joinbet WHERE username = '$usernameone'");
	$playerplayer = mysql_num_rows(mysql_query("SELECT * FROM blackjackmultijoin WHERE gameid = '$join'"));
	$playernew = $playerplayer + 1;
	mysql_query("INSERT INTO blackjackmultijoin(username,gameid,player) VALUES ('$usernameone','$join','$playernew')");

	mysql_query('INSERT into casinochat VALUES (null, "", "'.$usernameone.' joined!", now(), "'.$gameid.'")');
	if($playernew == $playeramount){ 
	mysql_query("UPDATE blackjackmulti SET time = ($time + 120) WHERE id = '$join'"); 
	mysql_query("UPDATE blackjackmulti SET endgame = ($time + 720) WHERE id = '$join'"); 

	$dofirstcards = mysql_query("SELECT * FROM blackjackmultijoin WHERE gameid = '$join' ORDER BY player");
	while($docards = mysql_fetch_array($dofirstcards)){
	$cardsusername = $docards['username'];
	$playerorder = $docards['player'];
	$type = array("h", "d", "c", "s");
	$xone = mt_rand(0,3);
	$xtwo = mt_rand(0,3);

	$numone = mt_rand(1,13);
	$numtwo = mt_rand(1,13);
	$cardone = $numone.''.$type[$xone];
	$cardtwo = $numtwo.''.$type[$xtwo];

	if($cardsusername != $usernameone){ mysql_query("UPDATE users SET notify = '1', notification = 'A multi blackjack game has started! <a href=multiblackjackgame.php?game=$join>Click here to play</a>.' WHERE username = '$cardsusername'"); }

	mysql_query("INSERT INTO blackjackmulticards(username,card,gameid,player) VALUES ('$cardsusername','$cardone','$join','$playerorder')");
	mysql_query("INSERT INTO blackjackmulticards(username,card,gameid,player) VALUES ('$cardsusername','$cardtwo','$join','$playerorder')");
	}}
	}
}



$player1countt = "n/a";
$player2countt = "n/a";
$getgame = mysql_query("SELECT * FROM blackjackmulti WHERE id = '$gameid'");
$gameidcorrect = mysql_num_rows($getgame);
$gameresults = mysql_fetch_array($getgame);
$gamename = $gameresults['username'];
$gameplayers = $gameresults['players'];
$gamedraw = $gameresults['draw'];
$gameamount = $gameresults['amount'];
$gametime = $gameresults['time'];
$gamefinished = $gameresults['finished'];
$gametimeleft = $gametime - time();
if($gametimeleft < 1){ $gametimeleft = 0; }
$gamecurrentplayers = mysql_num_rows(mysql_query("SELECT * FROM blackjackmultijoin WHERE gameid = '$gameid'"));
$gamestand = mysql_num_rows(mysql_query("SELECT * FROM blackjackmultijoin WHERE username = '$usernameone' AND gameid = '$gameid' AND stand = '1'"));

if($gameidcorrect < '1'){die('<font color=black face=verdana size=1>This game has finished!</font>');}


if($_GET['hit']){
	if($gametimeleft < 1){}
	elseif($gamestand == 1){}else{
	$typ = array("h", "d", "c", "s");
	$newface = mt_rand(0,3);
	$newnum = mt_rand(1,13);
	$hitcard = $newnum.''.$typ[$newface];

	$hitexist = mysql_query("SELECT * FROM blackjackmulticards WHERE card = '$hitcard' AND gameid = '$gameid'");
	$hitexists = mysql_num_rows($hitexist);
	$hitexista = mysql_query("SELECT * FROM blackjackmultijoin WHERE username = '$usernameone' AND gameid = '$gameid'");
	$hittime = mysql_fetch_array($hitexista);
	$hitplayer = $hittime['player'];

	while($hitexists > '0'){
	$newface = mt_rand(0,3);
	$newnum = mt_rand(1,13);
	$hitcard = $newnum.''.$typ[$newface];
	$hitexist = mysql_query("SELECT * FROM blackjackmulticards WHERE card = '$hitcard' AND gameid = '$gameid'");
	$hitexists = mysql_num_rows($hitexist);}

	$counti = 0;
	$countrawi = mysql_query("SELECT * FROM blackjackmulticards WHERE username = '$usernameone' AND gameid = '$gameid'");
	while($countrawai = mysql_fetch_array($countrawi)){
	$cardi = $countrawai['card'];
	$cardvaluei = mysql_query("SELECT * FROM cards WHERE name = '$cardi'");
	$cardvalueai = mysql_fetch_array($cardvaluei);
	$valuei = $cardvalueai['value'];
	$counti = $counti + $valuei; }

	$ace1 = mysql_num_rows(mysql_query("SELECT * FROM blackjackmulticards WHERE username = '$usernameone' AND gameid = '$gameid' AND card = '1h'"));
	$ace2 = mysql_num_rows(mysql_query("SELECT * FROM blackjackmulticards WHERE username = '$usernameone' AND gameid = '$gameid' AND card = '1s'"));
	$ace3 = mysql_num_rows(mysql_query("SELECT * FROM blackjackmulticards WHERE username = '$usernameone' AND gameid = '$gameid' AND card = '1c'"));
	$ace4 = mysql_num_rows(mysql_query("SELECT * FROM blackjackmulticards WHERE username = '$usernameone' AND gameid = '$gameid' AND card = '1d'"));
	$totalaces = $ace1 + $ace2 + $ace3 + $ace4;

	while(($counti > 21) && ($totalaces > 0)){
	$counti = $counti - 10;
	$totalaces = $totalaces - 1; }

	mysql_query("INSERT INTO blackjackmulticards(username,card,gameid,player) VALUES ('$usernameone','$hitcard','$gameid','$hitplayer')");
	$countrawi2 = mysql_query("SELECT * FROM blackjackmulticards WHERE username = '$usernameone' AND gameid = '$gameid' ORDER BY id DESC LIMIT 1");
	$countrawai2 = mysql_fetch_array($countrawi2);
	$cardi2 = $countrawai2['card'];
	$cardvaluei2 = mysql_query("SELECT * FROM cards WHERE name = '$cardi2'");
	$cardvalueai2 = mysql_fetch_array($cardvaluei2);
	$valuei2 = $cardvalueai2['value'];
	$countii = $counti + $valuei2;
	if($countii > 21 AND $valuei2 == '11'){ $countii = $countii - 10; }
	// echo $countii;
	if($countii >= 21){ mysql_query("UPDATE blackjackmultijoin SET stand = 1 WHERE gameid = '$gameid' AND username = '$usernameone'"); }}

	// mysql_query("UPDATE blackjackmulti SET finished = 1 WHERE id = '$gameid'");
	// mysql_query("UPDATE blackjackmulti SET time = (time - 200) WHERE id = '$gameid'");
}

if($_GET['stand']){
	if($gametimeleft < 1){}
	elseif($gamestand == 1){}else{
	mysql_query("UPDATE blackjackmultijoin SET stand = 1 WHERE gameid = '$gameid' AND username = '$usernameone'"); 
	mysql_query('INSERT into casinochat VALUES (null, "", "'.$usernameone.' has stood!", now(), "'.$gameid.'")');
	}
	

}
	if(getWinner() != "" AND getWinner() != "nobody"){
		$getwinnername = mysql_query("SELECT * FROM blackjackmultijoin WHERE gameid = '$gameid' AND player = '".getWinner()."'");
		$winnerresult = mysql_fetch_array($getwinnername);
		$gametotalwin = $gameamount * $gameplayers;
		$gamenumberwin = number_format($gametotalwin);

		
		if($gamefinished == 0){
			mysql_query("UPDATE mbjprofit SET won = won + 1 WHERE username = '".$winnerresult['username']."'");
			mysql_query("UPDATE mbjprofit SET `winnings` = winnings + $gametotalwin WHERE username = '".$winnerresult['username']."'");
			mysql_query("UPDATE users SET `winnings` = winnings + $gametotalwin WHERE username = '".$winnerresult['username']."'");
			mysql_query("UPDATE users SET money = money + $gametotalwin WHERE username = '".$winnerresult['username']."'");
			$sendinfo = "You joined a multi blackjack game created by \[b\]$gamename\[\/b\]! \[b\]".$winnerresult['username']."\[\/b\] had the highest total and won $\[b\]$gamenumberwin\[\/b\]!";
			$gamesendmessage = mysql_query("SELECT * FROM blackjackmultijoin WHERE gameid = '$gameid'");
			while($gamegetit = mysql_fetch_array($gamesendmessage)){
				$gamesendusername = $gamegetit['username'];
				mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info) VALUES ('$gamesendusername','$gamesendusername','2','$userip','$sendinfo')");
			}
		}
		mysql_query("UPDATE blackjackmulti SET finished = 1 WHERE id = '$gameid'");
		mysql_query("UPDATE blackjackmulti SET time = (time - 200) WHERE id = '$gameid'");
		$showoutcome++; $outcome = "<a href=viewprofile.php?username=".$winnerresult['username'].">".$winnerresult['username']."</a> won the multi blackjack game and received <font color=khaki>$<b>$gamenumberwin</b></font>!"; 
	}elseif(getWinner() != "" AND getWinner() == "nobody"){
		$gametotalwin = $gameamount;
		$gamenumberwin = number_format($gametotalwin);
		if($gamefinished == 0){
			$sendinfo = "You joined a multi blackjack game created by \[b\]$gamename\[\/b\]! The game ended as a draw!";
			$gamesendmessage = mysql_query("SELECT * FROM blackjackmultijoin WHERE gameid = '$gameid'");
			while($gamegetit = mysql_fetch_array($gamesendmessage)){
				$gamesendusername = $gamegetit['username'];
				mysql_query("UPDATE users SET money = money + $gametotalwin WHERE username = '".$gamesendusername."'");
				mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info) VALUES ('$gamesendusername','$gamesendusername','2','$userip','$sendinfo')");
			}
		}
		mysql_query("UPDATE blackjackmulti SET finished = 1 WHERE id = '$gameid'");
		mysql_query("UPDATE blackjackmulti SET time = (time - 200) WHERE id = '$gameid'");
		$showoutcome++; $outcome = "The game ended as a draw!"; 
	}


$getplayers = mysql_query("SELECT * FROM blackjackmultijoin WHERE gameid = '$gameid' ORDER by player");
$playerDatas = array();
while($getplayer = mysql_fetch_array($getplayers)){
	$playerDatas[] = $getplayer;
}


$player1countt = "n/a";
$player2countt = "n/a";
$getgame = mysql_query("SELECT * FROM blackjackmulti WHERE id = '$gameid'");
$gameidcorrect = mysql_num_rows($getgame);
$gameresults = mysql_fetch_array($getgame);
$gamename = $gameresults['username'];
$gameplayers = $gameresults['players'];
$gamedraw = $gameresults['draw'];
$gameamount = $gameresults['amount'];
$gametime = $gameresults['time'];
$gamefinished = $gameresults['finished'];
$gametimeleft = $gametime - time();
if($gametimeleft < 1){ $gametimeleft = 0; }
$gamecurrentplayers = mysql_num_rows(mysql_query("SELECT * FROM blackjackmultijoin WHERE gameid = '$gameid'"));
$gamestand = mysql_num_rows(mysql_query("SELECT * FROM blackjackmultijoin WHERE username = '$usernameone' AND gameid = '$gameid' AND stand = '1'"));




// echo $gametimeleft;
$entertainer = $ent;
if($entertainer != '0'){die('<font color=white face=verdana size=1>As you are an entertainer you cannot view this page.</font>');}

$saturated = "/[^0-9]/i";
$betraw = mysql_real_escape_string($_POST['bet']);
$setmax = preg_replace($saturated,"",$setmaxraw);
$price = preg_replace($saturated,"",$priceraw);
$buyback = preg_replace($saturated,"",$buybackraw);
$setownerraw = preg_replace($saturate,"",$setownerrawraw);
$setmaxtwo = number_format($setmax);
$bet = preg_replace($saturated,"",$betraw);

$checkindb = mysql_num_rows(mysql_query("SELECT * FROM casinoprofit WHERE username = '$usernameone'"));
if($checkindb < 1){ mysql_query("INSERT INTO `casinoprofit` (username,id) VALUES ('$usernameone','')"); }

$doesuserplay = mysql_num_rows(mysql_query("SELECT * FROM blackjackmultijoin WHERE username = '$usernameone' AND gameid = '$gameid'"));
if($doesuserplay > 0){
$aceofha = mysql_query("SELECT * FROM blackjackmulticards WHERE username = '$usernameone' AND gameid = '$gameid' AND card = '1h'");
$aceofsa = mysql_query("SELECT * FROM blackjackmulticards WHERE username = '$usernameone' AND gameid = '$gameid' AND card = '1s'");
$aceofca = mysql_query("SELECT * FROM blackjackmulticards WHERE username = '$usernameone' AND gameid = '$gameid' AND card = '1c'");
$aceofda = mysql_query("SELECT * FROM blackjackmulticards WHERE username = '$usernameone' AND gameid = '$gameid' AND card = '1d'");
$aceofh = mysql_num_rows($aceofha);
$aceofs = mysql_num_rows($aceofsa);
$aceofc = mysql_num_rows($aceofca);
$aceofd = mysql_num_rows($aceofda);
$aces = $aceofh + $aceofs + $aceofc + $aceofd;

$count = 0;
$countraw = mysql_query("SELECT * FROM blackjackmulticards WHERE username = '$usernameone' AND gameid = '$gameid'");
while($countrawa = mysql_fetch_array($countraw)){
$card = $countrawa['card'];
$cardvalue = mysql_query("SELECT * FROM cards WHERE name = '$card'");
$cardvaluea = mysql_fetch_array($cardvalue);
$value = $cardvaluea['value'];
$count = $count + $value;}

while(($count > 21) && ($aces >= 1)){
$count = $count - 10;
$aces = $aces - 1;}
}

$gamefinished = mysql_num_rows(mysql_query("SELECT * FROM blackjackmulti WHERE finished = '1' AND id = '$gameid'"));
$howmanyplayersstand = mysql_num_rows(mysql_query("SELECT * FROM blackjackmultijoin WHERE gameid = '$gameid' AND stand = '1'"));
if($gamefinished > 0 || $howmanyplayersstand == $gameplayers){ $player1cards = mysql_query("SELECT * FROM blackjackmulticards WHERE gameid = '$gameid' AND player = '1' ORDER BY id ASC"); }
else{ $player1cards = mysql_query("SELECT * FROM blackjackmulticards WHERE username = '$usernameone' AND gameid = '$gameid' AND player = '1' ORDER BY id ASC"); }
$player1cardsrows = mysql_num_rows($player1cards);


if($gamefinished > 0 || $howmanyplayersstand == $gameplayers){ $player2cards = mysql_query("SELECT * FROM blackjackmulticards WHERE gameid = '$gameid' AND player = '2' ORDER BY id ASC"); }
else{ $player2cards = mysql_query("SELECT * FROM blackjackmulticards WHERE username = '$usernameone' AND gameid = '$gameid' AND player = '2' ORDER BY id ASC"); }
$player2cardsrows = mysql_num_rows($player2cards);

if($gametimeleft < 1 AND $gametime != 0){
$p1aceofh = mysql_num_rows(mysql_query("SELECT * FROM blackjackmulticards WHERE player = '1' AND gameid = '$gameid' AND card = '1h'"));
$p1aceofs = mysql_num_rows(mysql_query("SELECT * FROM blackjackmulticards WHERE player = '1' AND gameid = '$gameid' AND card = '1s'"));
$p1aceofc = mysql_num_rows(mysql_query("SELECT * FROM blackjackmulticards WHERE player = '1' AND gameid = '$gameid' AND card = '1c'"));
$p1aceofd = mysql_num_rows(mysql_query("SELECT * FROM blackjackmulticards WHERE player = '1' AND gameid = '$gameid' AND card = '1d'"));
$p1aces = $p1aceofh + $p1aceofs + $p1aceofc + $p1aceofd;

$p1count = 0;
$p1countraw = mysql_query("SELECT * FROM blackjackmulticards WHERE player = '1' AND gameid = '$gameid'");
while($p1countrawa = mysql_fetch_array($p1countraw)){
$p1card = $p1countrawa['card'];
$p1cardvalue = mysql_query("SELECT * FROM cards WHERE name = '$p1card'");
$p1cardvaluea = mysql_fetch_array($p1cardvalue);
$p1value = $p1cardvaluea['value'];
$p1count = $p1count + $p1value;}

while($p1count > 21 AND $p1aces > 0){
$p1count = $p1count - 10;
$p1aces = $p1aces - 1;}
$player1countt = $p1count;
if($p1count > 21){ $p1count = 0; }

$p2aceofh = mysql_num_rows(mysql_query("SELECT * FROM blackjackmulticards WHERE player = '2' AND gameid = '$gameid' AND card = '1h'"));
$p2aceofs = mysql_num_rows(mysql_query("SELECT * FROM blackjackmulticards WHERE player = '2' AND gameid = '$gameid' AND card = '1s'"));
$p2aceofc = mysql_num_rows(mysql_query("SELECT * FROM blackjackmulticards WHERE player = '2' AND gameid = '$gameid' AND card = '1c'"));
$p2aceofd = mysql_num_rows(mysql_query("SELECT * FROM blackjackmulticards WHERE player = '2' AND gameid = '$gameid' AND card = '1d'"));
$p2aces = $p2aceofh + $p2aceofs + $p2aceofc + $p2aceofd;

$player2count = 0;
$player2countraw = mysql_query("SELECT * FROM blackjackmulticards WHERE player = '2' AND gameid = '$gameid'");
while($player2countrawa = mysql_fetch_array($player2countraw)){
$player2card = $player2countrawa['card'];
$player2cardvalue = mysql_query("SELECT * FROM cards WHERE name = '$player2card'");
$player2cardvaluea = mysql_fetch_array($player2cardvalue);
$player2value = $player2cardvaluea['value'];
$player2count = $player2count + $player2value;
}

while(($player2count > 21) && ($p2aces >= 1)){
$player2count = $player2count - 10;
$p2aces = $p2aces - 1;}
$player2countt = $player2count;
if($player2count > 21){ $player2count = 0; }



} ?>
<? if($gamefinished == 0 AND $gametime != 0){?>

<?}?>
<?
$getgame = mysql_query("SELECT * FROM blackjackmulti WHERE id = '$gameid'");
$gameidcorrect = mysql_num_rows($getgame);
$gameresults = mysql_fetch_array($getgame);
$gamename = $gameresults['username'];
$gameplayers = $gameresults['players'];
?>

<table cellpadding=0 cellspacing=1 align=center id=crimesTable>
<tr><td align=center width="100%">
<table>
<tr>
<?
// print_r($gameplayers);
for($i=0;$i < $gameplayers;$i++){
$thisPlayer = $playerDatas[$i];
// echo $i;
?><td align=center valign=top align=center width="<?=(100 / $gameplayers)?>%">
<table align=center style="margin:5px;padding:3px;" class=section>
<tr><td class=inside align=center><? if(!$thisPlayer["username"]){ echo"Waiting..."; }else{ ?><a href=viewprofile.php?username=<?=$thisPlayer["username"]?>><font color=cadetblue><b><?=$thisPlayer["username"]?></b></font></a> <? } ?></td></tr>
<tr><td class=inside align=center>
<?
$p2aceofh = mysql_num_rows(mysql_query("SELECT * FROM blackjackmulticards WHERE player = '". ($i + 1) ."' AND gameid = '$gameid' AND card = '1h'"));
$p2aceofs = mysql_num_rows(mysql_query("SELECT * FROM blackjackmulticards WHERE player = '". ($i + 1) ."' AND gameid = '$gameid' AND card = '1s'"));
$p2aceofc = mysql_num_rows(mysql_query("SELECT * FROM blackjackmulticards WHERE player = '". ($i + 1) ."' AND gameid = '$gameid' AND card = '1c'"));
$p2aceofd = mysql_num_rows(mysql_query("SELECT * FROM blackjackmulticards WHERE player = '". ($i + 1) ."' AND gameid = '$gameid' AND card = '1d'"));
$p2aces = $p2aceofh + $p2aceofs + $p2aceofc + $p2aceofd;

$player2count = 0;
$player2countraw = mysql_query("SELECT * FROM blackjackmulticards WHERE player = '". ($i + 1) ."' AND gameid = '$gameid'");
while($player2countrawa = mysql_fetch_array($player2countraw)){
$player2card = $player2countrawa['card'];
$player2cardvalue = mysql_query("SELECT * FROM cards WHERE name = '$player2card'");
$player2cardvaluea = mysql_fetch_array($player2cardvalue);
$player2value = $player2cardvaluea['value'];
$player2count = $player2count + $player2value;
}

$gamefinished = mysql_num_rows(mysql_query("SELECT * FROM blackjackmulti WHERE finished = '1' AND id = '$gameid'"));
$howmanyplayersstand = mysql_num_rows(mysql_query("SELECT * FROM blackjackmultijoin WHERE gameid = '$gameid' AND stand = '1'"));
if($gamefinished > 0 || $howmanyplayersstand == $gameplayers){ $player1cards = mysql_query("SELECT * FROM blackjackmulticards WHERE gameid = '$gameid' AND player = '". ($i + 1) ."' ORDER BY id ASC"); }
else{ $player1cards = mysql_query("SELECT * FROM blackjackmulticards WHERE username = '$usernameone' AND gameid = '$gameid' AND player = '". ($i + 1) ."' ORDER BY id ASC"); }
$player1cardsrows = mysql_num_rows($player1cards);
if($player1cardsrows < 1){
	echo"<img src=/layout/card.png> <img src=/layout/card.png>";
}else{
	while($player1cardss = mysql_fetch_array($player1cards)){
		// print_r($player1cardss);
		$player1card = $player1cardss['card'];
		echo"<img src=/layout/$player1card.gif> ";
	}
	echo "<br>".$player2count;
}
if($thisPlayer["username"] == $username){
if($player2count < 22 AND $player2count > 0 AND $gametimeleft > 0 AND $gamestand == 0){
echo "
	<div id='load_' style='display:none;' align='center'><img src='load2.gif'></div>
	<div align=center id=buttons_>
	<table width='100%'><tr><td><input type=button onClick='hitGame();' value=Hit class=submit name=hit style=width:100%;></td><td>
	<input type=button onClick='standGame();' value=Stand class=submit name=stand style=width:100%;></td></tr></table></div>";
} 
} 
?>

</td></tr>
</table></td><?
$ib++;
}
?>
</td>
</table>
</table>
<? if($gametimeleft > 0 AND !getWinner()){ ?>
<br><center>Time left: <font color=red><b><span id=countdown><?=gmdate("i:s", $gametimeleft)?></span></font></center><br>
<? } ?>


<?if($showoutcome >0){
	echo"<script>showNotif('".$outcome."');</script>";
}
