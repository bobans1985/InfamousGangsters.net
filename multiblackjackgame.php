<? include 'included.php'; session_start(); ?>
<?
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

$howmanyplayersstand = mysql_num_rows(mysql_query("SELECT * FROM blackjackmultijoin WHERE gameid = '$gameid' AND stand = '1'"));

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

$getplayer2 = mysql_query("SELECT * FROM blackjackmultijoin WHERE gameid = '$gameid' AND player = '2'");
$player2 = mysql_fetch_array($getplayer2);
$player2username = $player2['username'];
if(!$player2username){ $player2username = "Waiting..."; }

if($_POST['hit']){
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
        if($countii >= 21){ mysql_query("UPDATE blackjackmultijoin SET stand = 1 WHERE gameid = '$gameid' AND username = '$usernameone'"); }}

    $checkifdone = mysql_num_rows(mysql_query("SELECT * FROM blackjackmultijoin WHERE gameid = '$gameid' AND stand = '1'"));
    if($checkifdone >= $gameplayers){
        $player1aceofh = mysql_num_rows(mysql_query("SELECT * FROM blackjackmulticards WHERE player = '1' AND gameid = '$gameid' AND card = '1h'"));
        $player1aceofs = mysql_num_rows(mysql_query("SELECT * FROM blackjackmulticards WHERE player = '1' AND gameid = '$gameid' AND card = '1s'"));
        $player1aceofc = mysql_num_rows(mysql_query("SELECT * FROM blackjackmulticards WHERE player = '1' AND gameid = '$gameid' AND card = '1c'"));
        $player1aceofd = mysql_num_rows(mysql_query("SELECT * FROM blackjackmulticards WHERE player = '1' AND gameid = '$gameid' AND card = '1d'"));
        $player1aces = $player1aceofh + $player1aceofs + $player1aceofc + $player1aceofd;

        $player1count = 0;
        $player1countraw = mysql_query("SELECT * FROM blackjackmulticards WHERE player = '1' AND gameid = '$gameid'");
        while($player1countrawa = mysql_fetch_array($player1countraw)){
            $player1card = $player1countrawa['card'];
            $player1cardvalue = mysql_query("SELECT * FROM cards WHERE name = '$player1card'");
            $player1cardvaluea = mysql_fetch_array($player1cardvalue);
            $player1value = $player1cardvaluea['value'];
            $player1count = $player1count + $player1value;}

        while(($player1count > 21) && ($player1aces > 0)){
            $player1count = $player1count - 10;
            $player1aces = $player1aces - 1;}
        if($player1count > 21){ $player1count = 0; }

        $player2aceofh = mysql_num_rows(mysql_query("SELECT * FROM blackjackmulticards WHERE player = '2' AND gameid = '$gameid' AND card = '1h'"));
        $player2aceofs = mysql_num_rows(mysql_query("SELECT * FROM blackjackmulticards WHERE player = '2' AND gameid = '$gameid' AND card = '1s'"));
        $player2aceofc = mysql_num_rows(mysql_query("SELECT * FROM blackjackmulticards WHERE player = '2' AND gameid = '$gameid' AND card = '1c'"));
        $player2aceofd = mysql_num_rows(mysql_query("SELECT * FROM blackjackmulticards WHERE player = '2' AND gameid = '$gameid' AND card = '1d'"));
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

        if($gameplayers == 2){
            $gametotalwin = $gameamount * $gameplayers;
            $gamenumberwin = number_format($gametotalwin);
            if($player1count > $player2count){
                $getwinnername = mysql_query("SELECT * FROM blackjackmultijoin WHERE gameid = '$gameid' AND player = '1'");
                $winnerresult = mysql_fetch_array($getwinnername);
                $player1name = $winnerresult['username'];
                if($gamefinished == 0){
                    mysql_query("UPDATE mbjprofit SET won = won + 1 WHERE username = '$player1name'");
                    mysql_query("UPDATE mbjprofit SET `winnings` = winnings + $gametotalwin WHERE username = '$player1name'");
                    mysql_query("UPDATE users SET `winnings` = winnings + $gametotalwin WHERE username = '$player1name'");
                    mysql_query("UPDATE users SET money = money + $gametotalwin WHERE username = '$player1name'");
                    $sendinfo = "You joined a multi blackjack game created by \[b\]$gamename\[\/b\]! \[b\]$player1name\[\/b\] had the highest total and won $\[b\]$gamenumberwin\[\/b\]!";
                    $gamesendmessage = mysql_query("SELECT * FROM blackjackmultijoin WHERE gameid = '$gameid'");
                    while($gamegetit = mysql_fetch_array($gamesendmessage)){
                        $gamesendusername = $gamegetit['username'];
                        mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info) VALUES ('$gamesendusername','$gamesendusername','2','$userip','$sendinfo')"); }}
                $showoutcome++; $outcome = "<a href=viewprofile.php?username=$player1name>$player1name</a> won the multi blackjack game and received <font color=khaki>$<b>$gamenumberwin</b></font>!";
            }
            elseif($player2count > $player1count){
                $getwinnername = mysql_query("SELECT * FROM blackjackmultijoin WHERE gameid = '$gameid' AND player = '2'");
                $winnerresult = mysql_fetch_array($getwinnername);
                $player2name = $winnerresult['username'];
                if($gamefinished == 0){
                    mysql_query("UPDATE mbjprofit SET won = won + 1 WHERE username = '$player2name'");
                    mysql_query("UPDATE mbjprofit SET `winnings` = winnings + $gametotalwin WHERE username = '$player2name'");
                    mysql_query("UPDATE users SET `winnings` = winnings + $gametotalwin WHERE username = '$player2name'");
                    mysql_query("UPDATE users SET money = money + $gametotalwin WHERE username = '$player2name'");
                    $sendinfo = "You joined a multi blackjack game created by \[b\]$gamename\[\/b\]! \[b\]$player2name\[\/b\] had the highest total and won $\[b\]$gamenumberwin\[\/b\]!";
                    $gamesendmessage = mysql_query("SELECT * FROM blackjackmultijoin WHERE gameid = '$gameid'");
                    while($gamegetit = mysql_fetch_array($gamesendmessage)){
                        $gamesendusername = $gamegetit['username'];
                        mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info) VALUES ('$gamesendusername','$gamesendusername','2','$userip','$sendinfo')"); }}
                $showoutcome++; $outcome = "<a href=viewprofile.php?username=$player2name>$player2name</a> won the multi blackjack game and received <font color=khaki>$<b>$gamenumberwin</b></font>!";
            }else{
                $sendinfo = "You joined a multi blackjack game created by \[b\]$gamename\[\/b\]! The game ended as a draw!";
                $gamesendmessage = mysql_query("SELECT * FROM blackjackmultijoin WHERE gameid = '$gameid'");
                while($gamegetit = mysql_fetch_array($gamesendmessage)){
                    $gamesendusername = $gamegetit['username'];
                    mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info) VALUES ('$gamesendusername','$gamesendusername','2','$userip','$sendinfo')");
                    mysql_query("UPDATE users SET money = money + ($gametotalwin/2) WHERE username = '$gamesendusername'");
                }
                $showoutcome++; $outcome = "The game ended as a draw!"; }}

        mysql_query("UPDATE blackjackmulti SET finished = 1 WHERE id = '$gameid'");
        mysql_query("UPDATE blackjackmulti SET time = (time - 200) WHERE id = '$gameid'");
    }}

if($_POST['stand']){
    if($gametimeleft < 1){}
    elseif($gamestand == 1){}else{
        mysql_query("UPDATE blackjackmultijoin SET stand = 1 WHERE gameid = '$gameid' AND username = '$usernameone'");
        if(($howmanyplayersstand + 1) == $gameplayers AND $gamefinished == '0'){
            $player1aceofh = mysql_num_rows(mysql_query("SELECT * FROM blackjackmulticards WHERE username = '$usernameone' AND gameid = '$gameid' AND card = '1h'"));
            $player1aceofs = mysql_num_rows(mysql_query("SELECT * FROM blackjackmulticards WHERE username = '$usernameone' AND gameid = '$gameid' AND card = '1s'"));
            $player1aceofc = mysql_num_rows(mysql_query("SELECT * FROM blackjackmulticards WHERE username = '$usernameone' AND gameid = '$gameid' AND card = '1c'"));
            $player1aceofd = mysql_num_rows(mysql_query("SELECT * FROM blackjackmulticards WHERE username = '$usernameone' AND gameid = '$gameid' AND card = '1d'"));
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

            $player2aceofh = mysql_num_rows(mysql_query("SELECT * FROM blackjackmulticards WHERE username = '$usernameone' AND gameid = '$gameid' AND card = '1h'"));
            $player2aceofs = mysql_num_rows(mysql_query("SELECT * FROM blackjackmulticards WHERE username = '$usernameone' AND gameid = '$gameid' AND card = '1s'"));
            $player2aceofc = mysql_num_rows(mysql_query("SELECT * FROM blackjackmulticards WHERE username = '$usernameone' AND gameid = '$gameid' AND card = '1c'"));
            $player2aceofd = mysql_num_rows(mysql_query("SELECT * FROM blackjackmulticards WHERE username = '$usernameone' AND gameid = '$gameid' AND card = '1d'"));
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

            if($gameplayers == 2){
                $gametotalwin = $gameamount * $gameplayers;
                $gamenumberwin = number_format($gametotalwin);
                if($player1count > $player2count){
                    $getwinnername = mysql_query("SELECT * FROM blackjackmultijoin WHERE gameid = '$gameid' AND player = '1'");
                    $winnerresult = mysql_fetch_array($getwinnername);
                    $player1name = $winnerresult['username'];
                    if($gamefinished == 0){
                        mysql_query("UPDATE mbjprofit SET won = won + 1 WHERE username = '$player1name'");
                        mysql_query("UPDATE mbjprofit SET `winnings` = winnings + $gametotalwin WHERE username = '$player1name'");
                        mysql_query("UPDATE users SET `winnings` = winnings + $gametotalwin WHERE username = '$player1name'");
                        mysql_query("UPDATE users SET money = money + $gametotalwin WHERE username = '$player1name'");
                        $sendinfo = "You joined a multi blackjack game created by \[b\]$gamename\[\/b\]! \[b\]$player1name\[\/b\] had the highest total and won $\[b\]$gamenumberwin\[\/b\]!";
                        $gamesendmessage = mysql_query("SELECT * FROM blackjackmultijoin WHERE gameid = '$gameid'");
                        while($gamegetit = mysql_fetch_array($gamesendmessage)){
                            $gamesendusername = $gamegetit['username'];
                            mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info) VALUES ('$gamesendusername','$gamesendusername','2','$userip','$sendinfo')"); }}
                    $showoutcome++; $outcome = "<a href=viewprofile.php?username=$player1name>$player1name</a> won the multi blackjack game and received <font color=khaki>$<b>$gamenumberwin</b></font>!";
                }
                elseif($player2count > $player1count){
                    $getwinnername = mysql_query("SELECT * FROM blackjackmultijoin WHERE gameid = '$gameid' AND player = '2'");
                    $winnerresult = mysql_fetch_array($getwinnername);
                    $player2name = $winnerresult['username'];
                    if($gamefinished == 0){
                        mysql_query("UPDATE mbjprofit SET won = won + 1 WHERE username = '$player2name'");
                        mysql_query("UPDATE mbjprofit SET `winnings` = winnings + $gametotalwin WHERE username = '$player2name'");
                        mysql_query("UPDATE users SET `winnings` = winnings + $gametotalwin WHERE username = '$player2name'");
                        mysql_query("UPDATE users SET money = money + $gametotalwin WHERE username = '$player2name'");
                        $sendinfo = "You joined a multi blackjack game created by \[b\]$gamename\[\/b\]! \[b\]$player2name\[\/b\] had the highest total and won $\[b\]$gamenumberwin\[\/b\]!";
                        $gamesendmessage = mysql_query("SELECT * FROM blackjackmultijoin WHERE gameid = '$gameid'");
                        while($gamegetit = mysql_fetch_array($gamesendmessage)){
                            $gamesendusername = $gamegetit['username'];
                            mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info) VALUES ('$gamesendusername','$gamesendusername','2','$userip','$sendinfo')"); }}
                    $showoutcome++; $outcome = "<a href=viewprofile.php?username=$player2name>$player2name</a> won the multi blackjack game and received <font color=khaki>$<b>$gamenumberwin</b></font>!";
                }else{
                    $sendinfo = "You joined a multi blackjack game created by \[b\]$gamename\[\/b\]! The game ended as a draw!";
                    $gamesendmessage = mysql_query("SELECT * FROM blackjackmultijoin WHERE gameid = '$gameid'");
                    while($gamegetit = mysql_fetch_array($gamesendmessage)){
                        $gamesendusername = $gamegetit['username'];
                        mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info) VALUES ('$gamesendusername','$gamesendusername','2','$userip','$sendinfo')");
                        mysql_query("UPDATE users SET money = money + ($gametotalwin/2) WHERE username = '$gamesendusername'"); }
                    $showoutcome++; $outcome = "The game ended as a draw!";
                }}

            mysql_query("UPDATE blackjackmulti SET finished = 1 WHERE id = '$gameid'");
            mysql_query("UPDATE blackjackmulti SET time = (time - 200) WHERE id = '$gameid'");
        }}}
?>
<?php

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
$player2count = $player2count + $player2value;}

while(($player2count > 21) && ($p2aces >= 1)){
$player2count = $player2count - 10;
$p2aces = $p2aces - 1;}
$player2countt = $player2count;
if($player2count > 21){ $player2count = 0; }

if($gameplayers == 2){
$gametotalwin = $gameamount * $gameplayers;
$gamenumberwin = number_format($gametotalwin);
if($p1count > $player2count){
$getwinnername = mysql_query("SELECT * FROM blackjackmultijoin WHERE gameid = '$gameid' AND player = '1'");
$winnerresult = mysql_fetch_array($getwinnername);
$player1name = $winnerresult['username'];
if($gamefinished == 0){
mysql_query("UPDATE mbjprofit SET won = won + 1 WHERE username = '$player1name'");
mysql_query("UPDATE mbjprofit SET `winnings` = winnings + $gametotalwin WHERE username = '$player1name'");
mysql_query("UPDATE users SET `winnings` = winnings + $gametotalwin WHERE username = '$player1name'");
mysql_query("UPDATE users SET money = money + $gametotalwin WHERE username = '$player1name'");
$sendinfo = "You joined a multi blackjack game created by \[b\]$gamename\[\/b\]! \[b\]$player1name\[\/b\] had the highest total and won $\[b\]$gamenumberwin\[\/b\]!";
$gamesendmessage = mysql_query("SELECT * FROM blackjackmultijoin WHERE gameid = '$gameid'");
while($gamegetit = mysql_fetch_array($gamesendmessage)){
$gamesendusername = $gamegetit['username'];
mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info) VALUES ('$gamesendusername','$gamesendusername','2','$userip','$sendinfo')"); }}
$showoutcome++; $outcome = "<a href=viewprofile.php?username=$player1name>$player1name</a> won the multi blackjack game and received <font color=khaki>$<b>$gamenumberwin</b></font>!";
}
elseif($player2count > $p1count){
$getwinnername = mysql_query("SELECT * FROM blackjackmultijoin WHERE gameid = '$gameid' AND player = '2'");
$winnerresult = mysql_fetch_array($getwinnername);
$player2name = $winnerresult['username'];
if($gamefinished == 0){
mysql_query("UPDATE mbjprofit SET won = won + 1 WHERE username = '$player2name'");
mysql_query("UPDATE mbjprofit SET `winnings` = winnings + $gametotalwin WHERE username = '$player2name'");
mysql_query("UPDATE users SET `winnings` = winnings + $gametotalwin WHERE username = '$player2name'");
mysql_query("UPDATE users SET money = money + $gametotalwin WHERE username = '$player2name'");
$sendinfo = "You joined a multi blackjack game created by \[b\]$gamename\[\/b\]! \[b\]$player2name\[\/b\] had the highest total and won $\[b\]$gamenumberwin\[\/b\]!";
$gamesendmessage = mysql_query("SELECT * FROM blackjackmultijoin WHERE gameid = '$gameid'");
while($gamegetit = mysql_fetch_array($gamesendmessage)){
$gamesendusername = $gamegetit['username'];
mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info) VALUES ('$gamesendusername','$gamesendusername','2','$userip','$sendinfo')"); }}
$showoutcome++; $outcome = "<a href=viewprofile.php?username=$player2name>$player2name</a> won the multi blackjack game and received <font color=khaki>$<b>$gamenumberwin</b></font>!";
}else{ $showoutcome++; $outcome = "The game ended as a draw!"; }

mysql_query("UPDATE blackjackmulti SET finished = 1 WHERE id = '$gameid'");

}} ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" type="text/css" href="css/layout.css">
    <link rel="stylesheet" href="layout/style.css" type="text/css" />
    <title>Infamous Gangsters</title>
    <link rel="icon" type="image/png" href="images/icon.png">
    <script src="javascript/jquery.min.js"></script>
    <script src="javascript/main3.js"></script>
    

    <style>
        .stat.title {
            margin-top: 9px;
        }

        .stat.title:first-of-type {
            margin-top: 14px;
        }

        .btm-statbreak {
            height: 7px;
            display: block;
        }
    </style>
    <? if($gamefinished == 0 AND $gametime != 0){?>
        <script>
            function crimesCountdown(load){
                if(load){
                    var table = document.getElementById('crimesTable');
                    var inmates = table.getElementsByTagName('span');
//var targetURL = "http://www.stategangsters.com/multiblackjackgame.php?game=<?//echo$gameid?>//"
                    for(var i = 0; i < inmates.length; i++){
                        if(inmates[i].id == 'countdown'){
                            var timeleft = parseInt(inmates[i].innerHTML);
                            if(timeleft < 1){ window.location=targetURL }
                            if(timeleft > 0){
                                if(timeleft == 1){
                                    inmates[i].innerHTML = '0';
                                } else {
                                    inmates[i].innerHTML = timeleft - 1;
                                }}}}}
                setTimeout("crimesCountdown(true)",1000);
            }
            window.onload = crimesCountdown;
        </script>
    <?}?>
    <script>
        function ajaxFunctionhis(){
            var ajaxRequest;
            try{ajaxRequest = new XMLHttpRequest();} catch (e){
                try{ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");} catch (e) {
                    try{ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");} catch (e){

                        alert("Your browser broke!");return false;}}}

            var strhehe = "<?echo$gamecurrentplayers;?>&totalplayers=<?echo$gameplayers;?>&gameid=<?echo$gameid;?>&rand="+Math.random();
            ajaxRequest.open("GET", "multiblackjackplayer.php?current=" + strhehe, true);
            ajaxRequest.send(null);
            ajaxRequest.onreadystatechange = function(){
                if(ajaxRequest.readyState == 4){if(ajaxRequest.responseText){document.getElementById("county").style.display = "block";document.getElementById("county").innerHTML = ajaxRequest.responseText;}}}
            setTimeout("ajaxFunctionhis()",6000);

        }
    </script>
    <script>
        if (window.innerHeight > 700) {
            document.getElementById('crewFeedScrollID').style.maxHeight = "330px";
        }

        var unixTime = 1498981670.58;
        var muteSound = false;

        $('input, select, textarea').focus(function () {
            $('meta[name=viewport]').attr('content', 'width=device-width,initial-scale=1,maximum-scale=1.0');
        });
        $('input, select, textarea').blur(function () {
            $('meta[name=viewport]').attr('content', 'width=device-width,initial-scale=1,maximum-scale=10');
        });
    </script>
    <script type="text/javascript">
        function emotion(em) {
            $('#topicinfo').html($('#topicinfo').html() + em);
        }
    </script>
</head>
<body id="body">
<div id="alertBox"></div>
<div class="headerFloat">
    <div class="header">
        <table class="resize" cellspacing="0">
            <tr>
                <td width="220px" valign="top">
                    <div class="curve2px searchBox" id="searchBox">
                        <img class="searchBoxIcon" src="images/search.png">
                        <input name="search" autocomplete="off" class="searchBoxInput" maxlength="22" type="text"
                               id="search" placeholder="Search User..." onclick="this.select(); reClick();"
                               onfocus="document.getElementById('searchBox').style.border='2px solid #E6B34B'; "
                               onblur="document.getElementById('searchBox').style.border='';">
                    </div>
                </td>
                <td valign="top" class="centerTd">
                    <? include "cpanel_top.php";?>
                </td>
                <td width="233px" valign="top" class="centerTd">
                    <?php include "relative_block.php"; ?>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <div class="curve4pxBottom searchFloat preventscroll" id="searchResults"
                         style="text-align: center;"></div>
                </td>
            </tr>
        </table>
    </div>
</div>
<table cellspacing="0" class="resize" id="block">
    <tr>
        <td width="224px" style="min-width: 224px;" valign="top">
            <table class="menuTable curve10px" cellspacing="0" cellpadding="0">
                <tr>
                    <td class="topleft"></td>
                    <td class="top"></td>
                    <td class="topright"></td>
                </tr>
                <tr>
                    <td class="left"></td>
                    <?php include 'leftmenu.php'; ?>
                    <td class="right"></td>
                </tr>
                <tr>
                    <td class="bottomleft"></td>
                    <td class="bottom"></td>
                    <td class="bottomright"></td>
                </tr>
            </table>
        </td>
        <td valign="top" class="main">
            <? if ($showoutcome >= 1) { ?>
                <span><? echo $outcome; ?></span>
            <? } ?>
            <table class="menuTable curve10px" cellspacing="0" cellpadding="0">
                <tr>
                    <td class="topleft"></td>
                    <td class="top"></td>
                    <td class="topright"></td>
                </tr>
                <tr>
                    <td class="left"></td>
                    <td class="top">
                        <div class="main curve2px">
                            <div class="menuHeader noTop">
                                Multi Blackjack Game
                            </div>
                            <div style="padding: 5px; margin: auto; text-align: center; color: #fefefe;">
                                <div style="margin: auto; padding-top: 16px; padding-bottom: 6px; text-align: center;">
                                    <?

                                    $getgame = mysql_query("SELECT * FROM blackjackmulti WHERE id = '$gameid'");
                                    $gameidcorrect = mysql_num_rows($getgame);
                                    $gameresults = mysql_fetch_array($getgame);
                                    $gamename = $gameresults['username'];
                                    $gameplayers = $gameresults['players'];
                                    ?>
                                    <form method="post" style=" font-size: 11px; margin-top: 25px; margin-bottom: 32px;">
                                        <table class="regTable" style="<?if($outcome!=''){;?>opacity: 0.5;<?}?> min-width: 375px; width: 90%; max-width: 820px !important;" cellspacing="0" cellpadding="0" align="center">
                                            <tbody><tr>
                                                <td class="header" colspan="2">
                                                    Blackjack Table
                                                </td>
                                            </tr>
                                            <?if($player1cardsrows != '0' || $player2cardsrows != '0'){?>
                                                <tr>
                                                    <td class="noTop bet-col" colspan="2" style="border-left: 0;">
                                                        <span style="color: silver;">Total Bet:</span> $<?echo$gamenumberwin;?>
                                                        <span style="margin-left: 6px; margin-right: 6px; color: white;">-</span>
                                                        <span style="color: silver;">Time Remaining:</span>
                                                        <span class="js-timer" data-finish-text="..." data-countdown="180" style="margin-left: 2px; color: #ffffff;"><?echo$gametimeleft;?> seconds</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="subHeader bj-sub" style="border-left: 0; width: 50%;">
                                                        <?echo "<a href=viewprofile.php?username=$gamename>$gamename</a>";?>
                                                        (<b style="color: #FFC753;"><?echo$player1countt;?></b>)
                                                    </td>
                                                    <td class="subHeader bj-sub" style="width: 50%;">
                                                        <?echo "<a href=viewprofile.php?username=$player2username>$player2username</a>";?>
                                                        (<b style="color: #FFC753;"><?echo$player2countt;?></b>) </td>
                                                </tr>
                                            <?}else{?>
                                                <tr>
                                                    <td class="noTop bet-col" colspan="2" style="border-left: 0;">
                                                        <span style="color: silver;">Total Bet:</span> <span style="color: #999999;">$<?echo$gamenumberwin;?></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="subHeader bj-sub" style="border-left: 0; width: 50%;">
                                                        <?echo "<a href=viewprofile.php?username=$gamename>$gamename</a>";?>
                                                    </td>
                                                    <td class="subHeader bj-sub" style="width: 50%;">
                                                        <?echo "<a href=viewprofile.php?username=$player2username>$player2username</a>";?>
                                                    </td>
                                                </tr>
                                            <?}?>
                                            <tr>
                                                <td class="col bj-card-col noTop" style="border-left: 0; max-width: 200px;">
                                                    <?if($player1cardsrows < 1){echo"<img class=\"bj-card\" src=/layout/card.png> <img class=\"bj-card\" src=/layout/card.png>";}
                                                    else{while($player1cardss = mysql_fetch_array($player1cards)){
                                                        $player1card = $player1cardss['card'];
                                                        echo"<img class=\"bj-card\" src=/layout/$player1card.png> ";}} ?>
                                                </td>
                                                <td class="col bj-card-col noTop" style="border-left: 1px solid #444444;">
                                                    <?if($player2cardsrows < 1){echo"<img class=\"bj-card\" src=/layout/card.png> <img class=\"bj-card\" src=/layout/card.png>";}
                                                    else{while($player2cardss = mysql_fetch_array($player2cards)){
                                                        $player2card = $player2cardss['card'];
                                                        echo"<img class=\"bj-card\" src=/layout/$player2card.png> ";}} ?>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <?
                                        $gamestand = mysql_num_rows(mysql_query("SELECT * FROM blackjackmultijoin WHERE username = '$usernameone' AND gameid = '$gameid' AND stand = '1'"));
                                        if($count < 22 AND $count > 0 || $gametime != 0 AND $gametimeleft > 0 || $gamestand == 0){
                                        ?>
                                        <input name="hit" value="Hit" class="textarea bj-action" type="submit">
                                        <input name="stand" value="Stand" class="textarea bj-action" type="submit">
                                        <?}?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="right"></td>
                </tr>
                <tr>
                    <td class="bottomleft"></td>
                    <td class="bottom"></td>
                    <td class="bottomright"></td>
                </tr>
            </table>
        </td>
        <td width="232px" style="min-width: 232px;" valign="top">
            <table class="menuTable curve10px" cellspacing="0" cellpadding="0">
                <tr>
                    <td class="topleft"></td>
                    <td class="top"></td>
                    <td class="topright"></td>
                </tr>
                <tr>
                    <td class="left"></td>
                    <td><? include 'rightmenu.php'; ?></td>
                    <td class="right"></td>
                </tr>
                <tr>
                    <td class="bottomleft"></td>
                    <td class="bottom"></td>
                    <td class="bottomright"></td>
                </tr>
            </table>
            <?

include 'included.php'; session_start();

$getinfoarray = $statustesttwo;
$getcrewid = $getinfoarray['crewid'];
$getname = $getinfoarray['username'];

$time = time();
$timetwo = $time-3000;

$acount = mysql_num_rows(mysql_query("SELECT * FROM users WHERE crewid='$getcrewid' and activity >= '$timetwo'"));

            if($getcrewid==0){?>
            <table class="menuTable curve10px" cellspacing="0" cellpadding="0">
                <tr>
                    <td class="topleft"></td>
                    <td class="top"></td>
                    <td class="topright"></td>
                </tr>
                <tr>
                    <td class="left"></td>
                    <td>
                        <div class="crewFeed" style="position: relative;">
                            <div class="menuHeader noTop"
                                 style="position: absolute; margin-top: -1px; width: 100%; box-sizing: border-box; -moz-box-sizing: border-box; z-index: 1;">
                                Crew Feed
                                <span style="z-index: 0; margin-top: 1px; float: right; color: white; opacity: 0.88; font-size: 9px;"></span>
                            </div>
                            <div style="margin-left: -9px; padding-bottom: 13px; padding-top: 38px; text-align: center;">
                                <a href="crews.php">Join a Crew</a>
                            </div>
                        </div>
                    </td>
                    <td class="right"></td>
                </tr>
                <tr>
                    <td class="bottomleft"></td>
                    <td class="bottom"></td>
                    <td class="bottomright"></td>
                </tr>
            </table>
            <?}else{?>
            <table class="menuTable curve10px" cellspacing="0" cellpadding="0">
                <tr>
                    <td class="topleft"></td>
                    <td class="top"></td>
                    <td class="topright"></td>
                </tr>
                <tr>
                    <td class="left"></td>
                    <td>
                        <div class="crewFeed" style="position: relative;">
                            <div class="menuHeader noTop"
                                 style="position: absolute; margin-top: -1px; width: 100%; box-sizing: border-box; -moz-box-sizing: border-box; z-index: 1;">
                                Crew Feed <span
                                        style="z-index: 0; margin-top: 1px; float: right; color: white; opacity: 0.88; font-size: 9px;"><? echo $acount;?>
                                    <span class="membersOnline twinkle"
                                          style="position: relative; top: -0.75px;">•</span></span>
                                <?
                        $getcrewsql = mysql_query("SELECT boss,id,name FROM crews WHERE id = '$getcrewid'");
                        $getcrewarray = mysql_fetch_array($getcrewsql);

                        $getcrewboss = $getcrewarray['boss'];
                        if($getcrewboss == $getname){?>
                                <a style="margin-left: -35px; float: right; padding-left: 3px; margin-right: 8px; padding-top: 0px; font-size: 9px; opacity: 0.25;"
                                   href="#" onclick="clearFeed();">wipe</a>
                                <?}?>
                            </div>
                            <div class="preventscroll crewFeedScroll" id="crewFeedScrollID" style="max-height: 330px;">
                                <div id="crewFeedChat" style="max-width: 218px;">
                                    <?
                                        if(isset($_SESSION['chat'])){
                                            echo $_SESSION['chat'];
                                        }
                                    ?>
                                </div>
                                <form method="post" onsubmit="submitCrewFeed(); return false;">
                                    <input type="hidden" value="<?echo $statustesttwo['username'];?>" id="feed_name">
                                    <input type="hidden" value="<?echo $statustesttwo['crewid'];?>" id="feed_crew">
                                    <input class="textarea" id="feed_msg"                                           style="box-sizing: border-box; -moz-box-sizing: border-box; width: 100%; position: absolute; bottom: 0; margin-bottom: -1px; border-top: 2px solid rgba(20, 20, 20, 0.8); border-bottom: 0; border-left: 0; border-right: 0;"                                           placeholder="Enter Message..." type="text">                                </form>                            </div>                        </div>                    </td>                    <td class="right"></td>                </tr>                <tr>                    <td class="bottomleft"></td>                    <td class="bottom"></td>                    <td class="bottomright"></td>                </tr>            </table><div style="padding: 10px; font-size: 9.5px; opacity:0.7; text-align: center;">You can mute sounds in <a href="profile.php">Edit Profile</a>		</div>
            <?}?>
        </td>
    </tr>
</table>
</body>
</html>