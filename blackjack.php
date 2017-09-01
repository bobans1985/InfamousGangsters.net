<? include 'included.php'; session_start(); ?>
<?
$time = time();
$saturate = "/[^a-z0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$playerip = $_SERVER['REMOTE_ADDR'];
$username = $usernameone;
$userarray = $statustesttwo;
$userlocation = $userarray['location'];
$userrankid = $userarray['rankid'];
$usermoney = $userarray['money'];
$userpoints = $userarray['points'];
$penpoints = $userarray['penpoints'];
$bj = $userarray['blackjack'];
$today = date("m.d.y");
$newlocation = $_GET['location'];
if($newlocation == 1){ $newlocation = "Las Vegas"; }
elseif($newlocation == 2){ $newlocation = "Los Angeles"; }
elseif($newlocation == 3){ $newlocation = "New York"; }
elseif($newlocation == 6){ $newlocation = "Staff Land"; }
$makenewmaybe = mysql_num_rows(mysql_query("SELECT owner FROM casinos WHERE owner = '$usernameone' AND casino = 'Blackjack' AND location = '$newlocation'"));
if($makenewmaybe > 0){ $userlocation = "$newlocation"; }

$dealerscards = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND person = 'Dealer' ORDER BY id ASC");
$drows = mysql_num_rows($dealerscards);

if($bj > '0'){die('<font color=black face=verdana size=1>Contact the Administrator and say you saw error 500!</font>');}

$jailtest = mysql_query("SELECT username FROM jail WHERE username  = '$username'");
$jailtester = mysql_num_rows($jailtest);
if ( $jailtester != '0' ) {
	die(include 'redirect.php');
}

function calc_user_hand ( $username, $userlocation )
{
	$count = 0;
	$countraw = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND place = '$userlocation' AND person = '$username'");

	while ( $countrawa = mysql_fetch_array($countraw) ) {
		$card = $countrawa['card'];
		$cardvalue = mysql_query("SELECT * FROM cards WHERE name = '$card'");
		$cardvaluea = mysql_fetch_array($cardvalue);
		$value = $cardvaluea['value'];
		$count = $count + $value;
	}

	$query = "SELECT COUNT(*) FROM `blackjack` WHERE `username` = '$username' AND `place` = '$userlocation' AND `person` = '$username' AND `card` IN ('1h','1s','1c','1d')";
	$aces_count_r = mysql_query($query);
	$aces_count = mysql_fetch_array($aces_count_r);
	$aces = $aces_count[0];

	while ( ($count > 21) && ($aces >= 1) ) {
		$count = $count - 10;
		$aces = $aces - 1;
	}
	return $count;
}



?>
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
			<?php

			$entertainer = $ent;
			if($entertainer != '0'){die('<font color=white face=verdana size=1>As you are an entertainer you cannot view this page.</font>');}

			$ownerinfosql = mysql_query("SELECT * FROM casinos WHERE casino = 'Blackjack' AND location = '$userlocation'");
			$ownerinfoarray = mysql_fetch_array($ownerinfosql);
			$ownername = $ownerinfoarray['owner'];
			$getbuyback = $ownerinfoarray['buyback'];

			$getsug = mysql_fetch_array(mysql_query("SELECT * FROM suggestions WHERE username = '$ownername'"));
			$getsugid = $getsug['id'];

			if($ownername == $usernameone){$owner = 1;}else{$owner = 0;}
			$ownermaxbet = $ownerinfoarray['maxbet'];
			$ownerprofit = $ownerinfoarray['profit'];
			$ownermaxbettwo = number_format($ownerinfoarray['maxbet']);
			if($ownermaxbettwo == '999,999,999,999') {
				$ownermaxbettwo = 'Infinite';
			} else {
				$ownermaxbettwo = "$$ownermaxbettwo";
			}
			$ownerprofittwo = number_format($ownerinfoarray['profit']);

			$ownerstatssql = mysql_query("SELECT * FROM users WHERE ID = '$getsugid'");
			$ownerstatsarray = mysql_fetch_array($ownerstatssql);
			$ownermoney = $ownerstatsarray['money'];
			$ownerpoints = $ownerstatsarray['points'];

			$saturated = "/[^0-9]/i";
			$setmaxraw = mysql_real_escape_string($_POST['setmaxbj']);
			$priceraw = mysql_real_escape_string($_POST['setpricebj']);
			$buybackraw = mysql_real_escape_string($_POST['setbuybackbj']);
			$setownerrawraw = mysql_real_escape_string($_POST['setownerbj']);
			$betraw = mysql_real_escape_string($_POST['bet']);
			$setmax = preg_replace($saturated,"",$setmaxraw);
			$price = preg_replace($saturated,"",$priceraw);
			$buyback = preg_replace($saturated,"",$buybackraw);
			$setownerraw = preg_replace($saturate,"",$setownerrawraw);
			$setmaxtwo = number_format($setmax);
			$bet = preg_replace($saturated,"",$betraw);

			$checkindb = mysql_num_rows(mysql_query("SELECT * FROM casinoprofit WHERE username = '$usernameone'"));
			if($checkindb < 1){ mysql_query("INSERT INTO `casinoprofit` (username,id) VALUES ('$usernameone','')"); }

			if ( ($owner != '0')||($userrankid == '100') ) {
				if(isset($_POST['setmaxbj'])) {
					if ( $setmax < '5000000' ) {
						$showoutcome++;
						$outcome = "The maxbet must be at least $<b>5,000,000</b>!";
					} elseif ( $setmax >= '999999999999' ) {
						mysql_query("UPDATE casinos SET maxbet = '999999999999' WHERE casino = 'Blackjack' AND location = '$userlocation'");
						$showoutcome++; $outcome = "The maxbet is now <b>Infinite</b>!";
					} else {
						mysql_query("UPDATE casinos SET maxbet = '$setmax' WHERE casino= 'Blackjack' AND location = '$userlocation'");
						$showoutcome++; $outcome = "The maxbet is now <font color=yellow>$<b>$setmaxtwo</b></font>!";
					}
				}
			}

			if ( ($owner != '0')||($userrankid >= '25') ) {
				if ( isset($_POST['setownerbj']) ) {

					$anum_true=mysql_num_rows(mysql_query("SELECT * FROM users WHERE username='$setownerraw' AND blockcasinos='1'"));
					if ($anum_true == "1"){
						die("<font size=2 face=verdana color=silver>$setownerraw doesnt allow Blackjacks to be sent to him/her.</font>");}

					$anum_true=mysql_num_rows(mysql_query("SELECT * FROM protection WHERE username='$setownerraw'"));
					if ($anum_true == "1"){
						die("<font size=2 face=verdana color=silver>$setownerraw is under protection!</font>");}


					$setownerinfosql = mysql_query("SELECT * FROM users WHERE username = '$setownerraw'");
					$setownerinfoarray = mysql_fetch_array($setownerinfosql);
					$setownerinforows = mysql_num_rows($setownerinfosql);
					$setowner = $setownerinfoarray['username'];
					if(!$setowner){die (' ');}
					$setownerstatus = $setownerinfoarray['status'];
					$ssskkk = $setownerinfoarray['rankid'];
					$ssskkkid = $setownerinfoarray['ID'];
					if ( $setowner == $ownername ) {
						$showoutcome++;
						$outcome = "You already own the blackjack!";
					} elseif ( $setownerinforows == '0' ) {
						$showoutcome++;
						$outcome = "No such user!";
					} elseif ( $setownerstatus == 'Dead' ) {
						$showoutcome++;
						$outcome = "You cannot send a casino to a dead player!";
					} elseif ( ($ssskkk > '25')&&($userrankid < '25') ) {
						$showoutcome++;
						$outcome = "You cannot send a casino to a staff member!";
					} else {
						$cunt = mysql_num_rows(mysql_query("SELECT * FROM casinos WHERE owner = '$setowner' AND type = 'casi'"));
						$cunts = mysql_num_rows(mysql_query("SELECT * FROM casinos WHERE owner = '$setowner' AND casino = 'Blackjack'"));
						if($cunt > '3' AND $setowner != 'None'){die('<font color=white face=verdana size=1>That user already has 2 casinos!</font>');}
						if($cunts > '0' AND $setowner != 'None'){die('<font color=white face=verdana size=1>That user already has a blackjack!</font>');}

						$penpoint = mysql_num_rows(mysql_query("SELECT * FROM ipadresses WHERE ip = '$userip' AND username = '$setowner'"));
						if(($penpoint > '0')&&($setowner != $username)){
							mysql_query("UPDATE users SET penpoints = penpoints + 1 WHERE username = '$username'");
							$reason = "$username sent $userlocation blackjack to $setowner";
							mysql_query("INSERT INTO penpoints(username,reason) VALUES('$username','$reason')");
						}

						mysql_query("UPDATE casinos SET buyback = '0' WHERE casino = 'Blackjack' AND location = '$userlocation'");
						mysql_query("UPDATE casinos SET owner = '$setowner' WHERE casino= 'Blackjack' AND location = '$userlocation'");
						mysql_query("UPDATE casinos SET nickname = '$setownerraw' WHERE casino= 'Blackjack' AND location = '$userlocation'");
						mysql_query("UPDATE casinos SET maxbet = '5000000' WHERE casino= 'Blackjack' AND location = '$userlocation'");
						$showoutcome++; $outcome = "You gave the casino to <a href=viewprofile.php?username=$setowner><b>$setownerraw</b>!</a>";
						mysql_query("DELETE FROM buycasinos WHERE city = '$userlocation' AND type = 'Blackjack'");
						mysql_query("UPDATE users SET notify = '1', notification = 'a_open$usernameone a_closed$usernameone a_slashsent you $userlocation Blackjack.' WHERE username = '$ssskkkid'");
					}
				}
			}

			if ( ($owner != '0')||($userrankid == '100') ) {
				if ( isset($_POST['setpricebj']) ) {
					mysql_query("DELETE FROM buycasinos WHERE type = 'Blackjack' AND city = '$userlocation'");
					$buytime = time()+86400;
					mysql_query("INSERT INTO buycasinos(username,time,city,price,type) VALUES ('$ownername','$buytime','$userlocation','$price','Blackjack')");
					$showoutcome++; $outcome = "The casino has been added to quicktrade!";
				}
			}

			if ( ($owner != '0') || ($userrankid == '100') ) {
				if ( isset($_POST['setbuybackbj']) ) {
					if ( $buyback < 1 ) {
						mysql_query("UPDATE casinos SET buyback = '0' WHERE casino= 'Blackjack' AND location = '$userlocation'");
						$showoutcome++;
						$outcome = "You buyback has been removed!";
					} elseif ( $buyback < 1000 ) {
						$showoutcome++;
						$outcome = "Minimum buy back is 1000 points!";
					}  elseif ( $buyback > $userpoints ) {
						$showoutcome++;
						$outcome = "You can not afford this buy back!";
					} else {
						mysql_query("UPDATE casinos SET buyback = '$buyback' WHERE casino= 'Blackjack' AND location = '$userlocation'");
						$showoutcome++;
						$outcome = "Your casino buyback has been set!";
					}
				}
			}

			if ( ($owner != '0')||($userrankid == '100') ) {
				if(isset($_POST['resetbjprofit'])) {
					$showoutcome++;
					$outcome = "Profit reset!";
					mysql_query("UPDATE casinos SET profit = '0' WHERE casino= 'Blackjack' AND location = '$userlocation'");
				}
			}

			$timeupsql = mysql_query("SELECT * FROM blackjack WHERE username = '$username'");
			$timeup = mysql_num_rows($timeupsql);

			if($timeup != '0') {
				$timecheck = mysql_fetch_array($timeupsql);
				$timec = $timecheck['time'];
				$losed = $timecheck['bet'];
				$oldplace = $timecheck['place'];
				$oldowner = $timecheck['owner'];
				$lose = number_format($losed);
				$over = $timec + 600;
				$timeleft = $over - $time;

				if ( $oldplace != $userlocation ) {
					$showoutcome++;
					$outcome = "Error contact admin! <font color=\"red\"><b>You lost $$lose</b>!</font>";
					mysql_query("UPDATE users SET money = money + '$losed' WHERE ID = '$getsugid'");
					mysql_query("UPDATE casinoprofit SET blackjack = blackjack + '$losed', overall = overall + '$losed' WHERE username = '$usernameone'");
					mysql_query("UPDATE casinos SET profit = profit + '$losed' WHERE casino = 'Blackjack' AND location = '$userlocation' AND owner = '$ownername'");
					mysql_query("DELETE FROM blackjack WHERE username = '$username'");
				} elseif ( ($over < $time)&&($oldowner != $ownername) ) {
					$showoutcome++;
					$outcome = "Your time is up! <font color=\"red\"><b>You lost $$lose</b>!</font>";
					mysql_query("DELETE FROM blackjack WHERE username = '$username'");
				} elseif($over < $time) {
					$showoutcome++;
					$outcome = "Your time is up! <font color=\"red\"><b>You lost $$lose</b>!</font>";
					mysql_query("UPDATE users SET money = money + '$losed' WHERE ID = '$getsugid'");
					mysql_query("UPDATE casinoprofit SET blackjack = blackjack + '$losed', overall = overall + '$losed' WHERE username = '$usernameone'");
					mysql_query("UPDATE casinos SET profit = profit + '$losed' WHERE casino = 'Blackjack' AND location = '$userlocation' AND owner = '$ownername'");
					mysql_query("DELETE FROM blackjack WHERE username = '$username'");
				} elseif ( $oldowner != $ownername ) {
					$showoutcome++;
					$outcome = "The blackjack was sent to another user during the game! Your money has been returned!";
					mysql_query("UPDATE users SET money = money + '$losed' WHERE ID = '$ida'");
					mysql_query("UPDATE casinoprofit SET blackjack = blackjack + '$losed', overall = overall + '$losed' WHERE username = '$usernameone'");
					mysql_query("DELETE FROM blackjack WHERE username = '$username'");
				}
			}

			if ( $owner == '0' AND $ownername != 'None' ) {
				if ( isset($_POST['playbj']) ) {
					if ( !$bet ) {
						$showoutcome++;
						$outcome = "You did not enter an amount to bet!";
					} elseif ( $bet > $usermoney ) {
						$showoutcome++;
						$outcome = "You dont have enough money!";
					} elseif ( $bet > $ownermaxbet AND $userrankid < 100 ) {
						$showoutcome++;
						$outcome = "The maximum bet is set at <b>$ownermaxbettwo</b>!";
					} else {
						$ingamesql = mysql_query("SELECT username FROM blackjack WHERE username = '$username'");
						$ingame = mysql_num_rows($ingamesql);
						if ( $ingame > '0' ) {
							$showoutcome++;
							$outcome = "You are already in a game!";
						} else {

							mysql_query("UPDATE users SET money = money - '$bet' WHERE ID = '$ida' AND money >= '$bet'");
							if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 2.</font>');}
							mysql_query("UPDATE casinoprofit SET blackjack = blackjack - '$bet', overall = overall - '$bet' WHERE username = '$usernameone'");

							$type = array("h", "d", "c", "s");
							$xone = mt_rand(0,3);
							$xtwo = mt_rand(0,3);
							$xthree = mt_rand(0,3);

							$numone = mt_rand(1,13);
							$numtwo = mt_rand(1,13);
							$numthree = mt_rand(2,13);
							$cardone = $numone.''.$type[$xone];
							$cardtwo = $numtwo.''.$type[$xtwo];
							$cardthree = $numthree.''.$type[$xthree];

							mysql_query("INSERT INTO blackjack(username,time,owner,place,card,person,bet) 
VALUES ('$username','$time','$ownername','$userlocation','$cardthree','Dealer','$bet')");

							$dealerscards = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND person = 'Dealer' ORDER BY id ASC");
							$drows = mysql_num_rows($dealerscards);

							while($cardone == $cardtwo){
								$xtwo = mt_rand(0,3);
								$numtwo = mt_rand(1,13);
								$cardtwo = $numtwo.''.$type[$xtwo];
							}
							mysql_query("INSERT INTO blackjack(username,time,owner,place,card,person,bet) 
VALUES ('$username','$time','$ownername','$userlocation','$cardone','$username','$bet')");
							mysql_query("INSERT INTO blackjack(username,time,owner,place,card,person,bet) 
VALUES ('$username','$time','$ownername','$userlocation','$cardtwo','$username','$bet')");

							$ohokokok = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND place = '$userlocation' AND person = 'Dealer'");
							$ohokokok = mysql_fetch_array($ohokokok);
							$ijijij = $ohokokok['card'];
							$ffffffff = mysql_query("SELECT * FROM cards WHERE name = '$ijijij'");
							$jifdjfi = mysql_fetch_array($ffffffff);
							$dealercount = $jifdjfi['value'];

							mysql_query("UPDATE blackjack SET af = af + 1 WHERE username = '$username'");
							if (mysql_affected_rows() > 3) {mysql_query("UPDATE users SET blackjack = '1' WHERE username = '$username'");die('<font color=white face=verdana size=1>Error 1.</font>');
							}
						}
					}
				}
			}

			$timeupsql = mysql_query("SELECT * FROM blackjack WHERE username = '$username'");
			$timecheck = mysql_fetch_array($timeupsql);
			$timec = $timecheck['time'];
			$over = $timec + 600;
			$timeleft = $over - $time;

			$getcards = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND place = '$userlocation' AND owner = '$ownername' AND person ='$username' ORDER BY id ASC");
			$getcardsrows = mysql_num_rows($getcards);

			if(($ownername == 'None')){
				if(isset($_POST['takeoverbj'])){
					if($usermoney < '100000000'){
						$showoutcome++;
						$outcome = "You don't have enough money! Taking over a blackjack costs $<b>100,000,000</b>!";}
					else{
						$showoutcome++;
						$outcome = "You now own the Blackjack!";
						mysql_query("UPDATE users SET money = money - '100000000' WHERE ID = '$ida'");
						mysql_query("UPDATE casinos SET owner = '$username' WHERE location = '$userlocation' AND casino = 'Blackjack'");
						mysql_query("UPDATE casinos SET nickname = '$username' WHERE location = '$userlocation' AND casino = 'Blackjack'");
						mysql_query("DELETE FROM buycasinos WHERE city = '$userlocation' AND type = 'Blackjack'");}}}

			$aceofha = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND place = '$userlocation' AND person = '$username' AND card = '1h'");
			$aceofsa = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND place = '$userlocation' AND person = '$username' AND card = '1s'");
			$aceofca = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND place = '$userlocation' AND person = '$username' AND card = '1c'");
			$aceofda = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND place = '$userlocation' AND person = '$username' AND card = '1d'");
			$aceofh = mysql_num_rows($aceofha);
			$aceofs = mysql_num_rows($aceofsa);
			$aceofc = mysql_num_rows($aceofca);
			$aceofd = mysql_num_rows($aceofda);
			$aces = $aceofh + $aceofs + $aceofc + $aceofd;

			$count = 0;
			$countraw = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND place = '$userlocation' AND person = '$username'");

			while($countrawa = mysql_fetch_array($countraw)){
				$card = $countrawa['card'];
				$cardvalue = mysql_query("SELECT * FROM cards WHERE name = '$card'");
				$cardvaluea = mysql_fetch_array($cardvalue);
				$value = $cardvaluea['value'];
				$count = $count + $value;}

			while(($count > 21) && ($aces >= 1)){
				$count = $count - 10;
				$aces = $aces - 1;}

			$blackjack = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND person = '$username'");
			if ( ($getcardsrows == '2')&&($count == '21') ) {
				$blackjackget = mysql_fetch_array($blackjack);
				$blackjackwinb = $blackjackget['bet'];
				$blackjackwina = $blackjackwinb * 2.5;
				$blackjackwin = floor($blackjackwina);
				$remove = $blackjackwin - $blackjackwinb;
				$win = number_format($blackjackwin);
				$tot = $ownermoney + $blackjackwinb;

				$showoutcome++;
				$outcome = "You have blackjack, <font color=\"lime\"><b>you won $$win</b></font>!";
				mysql_query("INSERT INTO `casinoblackjackbets` (username,location,result,amount,time,bet) VALUES ('$usernameone','$userlocation','win','$blackjackwin','$today','$remove')");
				mysql_query("INSERT INTO moneylogs(`username`,`id`,`action`,`time`,`where`) VALUES ('$usernameone','','Won $$win on blackjack from $ownername','$datetime','blackjack')");
				mysql_query("INSERT INTO moneylogs(`username`,`id`,`action`,`time`,`where`) VALUES ('$ownername','','$usernameone won $$win from this blackjack','$datetime','blackjack')");
				if ( $ownermoney < $remove ) {
					$showoutcome++; $outcome = " <b>You won all of the owners cash, you now own the casino!</b>";
					mysql_query("UPDATE users SET casinos = casinos + 1 WHERE ID = '$ida'");
					mysql_query("DELETE FROM buycasinos WHERE city = '$userlocation' AND type = 'Blackjack'");
					mysql_query("UPDATE users SET money = money + $ownermoney WHERE ID = '$ida'");
					mysql_query("UPDATE users SET money = money + $blackjackwinb WHERE ID = '$ida'");
					mysql_query("UPDATE casinos SET maxbet = '5000000' WHERE casino = 'Blackjack' AND location = '$userlocation'");
					mysql_query("UPDATE casinoprofit SET blackjack = blackjack + '$ownermoney', overall = overall + '$ownermoney' WHERE username = '$usernameone'");
					mysql_query("UPDATE users SET money = '0' WHERE ID = '$getsugid'");
					mysql_query("UPDATE casinos SET profit = profit - $remove WHERE casino = 'Blackjack' AND location = '$userlocation'");
					mysql_query("UPDATE casinos SET owner = '$username' WHERE casino = 'Blackjack' AND location = '$userlocation'");
					mysql_query("UPDATE casinos SET nickname = '$username' WHERE casino = 'Blackjack' AND location = '$userlocation'");
					mysql_query("UPDATE casinos SET buyback = '0' WHERE casino = 'Blackjack' AND location = '$userlocation'");
					if ( $getbuyback > 0 AND $ownerpoints >= $getbuyback ) {
						mysql_query("UPDATE users SET points = points + $getbuyback WHERE ID = '$ida'");
						mysql_query("UPDATE users SET points = points - $getbuyback WHERE ID = '$getsugid'");
						mysql_query("UPDATE casinos SET owner = '$ownername', maxbet = '0' WHERE casino = 'Blackjack' AND location = '$userlocation'");
						mysql_query("UPDATE users SET notification = 'a_open$usernameone a_closed$usernameone a_slashwon your blackjack.', notify = (notify + 1) WHERE ID = '$getsugid'");
					}
				} else {
					mysql_query("UPDATE users SET money = money + $blackjackwin WHERE ID = '$ida'");
					mysql_query("UPDATE casinoprofit SET blackjack = blackjack + '$blackjackwin', overall = overall + '$blackjackwin' WHERE username = '$usernameone'");
					mysql_query("UPDATE users SET money = money - '$remove' WHERE ID = '$getsugid'");
					mysql_query("UPDATE casinos SET profit = profit - '$remove' WHERE casino = 'Blackjack' AND location = '$userlocation'");
				}
				mysql_query("DELETE FROM blackjack WHERE username = '$username'");
			}

			if ( $owner == '0' ) {
			
				if ( (isset($_POST['hit'])) || ($_GET['hit'] == '1') ) {

					$hitcheck = mysql_query("SELECT * FROM blackjack WHERE username = '$username'");
					$hitchecks = mysql_num_rows($hitcheck);

					if ( $hitchecks < '2' ) {
					} else {

						mysql_query("UPDATE users SET hit = hit + '1' WHERE ID = '$ida' AND hit <= '0'");
						if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 2.</font>');}
						mysql_query("UPDATE users SET hit = '0' WHERE ID = '$ida'");

						$ohokokok = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND place = '$userlocation' AND person = 'Dealer'");
						$ohokokok = mysql_fetch_array($ohokokok);
						$ijijij = $ohokokok['card'];
						$ffffffff = mysql_query("SELECT * FROM cards WHERE name = '$ijijij'");
						$jifdjfi = mysql_fetch_array($ffffffff);
						$dealercount = $jifdjfi['value'];

						$typ = array("h", "d", "c", "s");
						$newface = mt_rand(0,3);
						$newnum = mt_rand(1,13);
						$hitcard = $newnum.''.$typ[$newface];

						$hitexist = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND card = '$hitcard'");
						$hitexists = mysql_num_rows($hitexist);
						$hitexista = mysql_query("SELECT * FROM blackjack WHERE username = '$username'");
						$hittime = mysql_fetch_array($hitexista);
						$hitime = $hittime['time'];
						$hitbet = $hittime['bet'];
						$hitowner = $hittime['owner'];
						$bust = number_format($hitbet);
						$bet=$hitbet;

						while ( $hitexists > '0' ) {
							$newface = mt_rand(0,3);
							$newnum = mt_rand(1,13);
							$hitcard = $newnum.''.$typ[$newface];
							$hitexist = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND card = '$hitcard'");
							$hitexists = mysql_num_rows($hitexist);
						}

						$counti = 0;
						$countrawi = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND place = '$userlocation' AND person = '$username'");

						while ( $countrawai = mysql_fetch_array($countrawi) ) {
							$cardi = $countrawai['card'];
							$cardvaluei = mysql_query("SELECT * FROM cards WHERE name = '$cardi'");
							$cardvalueai = mysql_fetch_array($cardvaluei);
							$valuei = $cardvalueai['value'];
							$counti = $counti + $valuei;
						}

						$aceofhai = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND place = '$userlocation' AND person = '$username' AND card = '1h'");
						$aceofsai = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND place = '$userlocation' AND person = '$username' AND card = '1s'");
						$aceofcai = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND place = '$userlocation' AND person = '$username' AND card = '1c'");
						$aceofdai = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND place = '$userlocation' AND person = '$username' AND card = '1d'");
						$aceofhi = mysql_num_rows($aceofhai);
						$aceofsi = mysql_num_rows($aceofsai);
						$aceofci = mysql_num_rows($aceofcai);
						$aceofdi = mysql_num_rows($aceofdai);
						$acesi = $aceofhi + $aceofsi + $aceofci + $aceofdi;

						while ( ($counti > 21) && ($acesi >= 1) ) {
							$counti = $counti - 10;
							$acesi = $acesi - 1;
						}

						if ( $counti > 21 ) {
							$showoutcome++;
							$outcome = "You busted, <font color=\"red\"><b>you lost $$bust</b></font>!";
							mysql_query("INSERT INTO `casinoblackjackbets` (username,location,result,amount,time,bet) VALUES ('$usernameone','$userlocation','lost','$hitbet','$today','$hitbet)");
							mysql_query("INSERT INTO moneylogs(`username`,`id`,`action`,`time`,`where`) VALUES ('$usernameone','','Lost $$bust on blackjack to $ownername','$datetime','blackjack')");
							mysql_query("INSERT INTO moneylogs(`username`,`id`,`action`,`time`,`where`) VALUES ('$ownername','','$usernameone lost $$bust to this blackjack','$datetime','blackjack')");
							$hidescript = 1;
							mysql_query("DELETE FROM blackjack WHERE username = '$username'");
							if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 2.</font>');}

							mysql_query("UPDATE users SET money = money + '$hitbet' WHERE username = '$hitowner'");
							mysql_query("UPDATE casinos SET profit = profit + '$hitbet' WHERE casino = 'Blackjack' AND location = '$userlocation' AND owner = '$ownername'");

						} else {

							mysql_query("INSERT INTO blackjack(username,time,owner,place,card,person,bet) VALUES ('$username','$hitime','$ownername','$userlocation','$hitcard','$username','$hitbet')");

							$count = 0;
							$countraw = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND place = '$userlocation' AND person = '$username'");

							while ( $countrawa = mysql_fetch_array($countraw) ) {
								$card = $countrawa['card'];
								$cardvalue = mysql_query("SELECT * FROM cards WHERE name = '$card'");
								$cardvaluea = mysql_fetch_array($cardvalue);
								$value = $cardvaluea['value'];
								$count = $count + $value;
							}

							$aceofha = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND place = '$userlocation' AND person = '$username' AND card = '1h'");
							$aceofsa = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND place = '$userlocation' AND person = '$username' AND card = '1s'");
							$aceofca = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND place = '$userlocation' AND person = '$username' AND card = '1c'");
							$aceofda = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND place = '$userlocation' AND person = '$username' AND card = '1d'");
							$aceofh = mysql_num_rows($aceofha);
							$aceofs = mysql_num_rows($aceofsa);
							$aceofc = mysql_num_rows($aceofca);
							$aceofd = mysql_num_rows($aceofda);
							$aces = $aceofh + $aceofs + $aceofc + $aceofd;

							while ( ($count > 21) && ($aces >= 1) ) {
								$count = $count - 10;
								$aces = $aces - 1;
							}

							$getcards = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND place = '$userlocation' AND owner = '$ownername' AND person ='$username' ORDER BY id ASC");
							$getcardsrows = mysql_num_rows($getcards);

							if ( $count > 21 ) {
								$showoutcome++;
								$outcome = "You busted, <font color=\"red\"><b>you lost $$bust</b>!</font>";
								mysql_query("INSERT INTO `casinoblackjackbets` (username,location,result,amount,time,bet) VALUES ('$usernameone','$userlocation','lost','$hitbet','$today','$hitbet')");
								mysql_query("INSERT INTO moneylogs(`username`,`id`,`action`,`time`,`where`) VALUES ('$usernameone','','Lost $$bust on blackjack to $ownername','$datetime','blackjack')");
								mysql_query("INSERT INTO moneylogs(`username`,`id`,`action`,`time`,`where`) VALUES ('$ownername','','$usernameone lost $$bust to this blackjack','$datetime','blackjack')");
								$hidescript = 1;
								mysql_query("DELETE FROM blackjack WHERE username = '$username'");
								if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>eror ex 1.</font>');}
								mysql_query("UPDATE users SET money = money + '$hitbet' WHERE username = '$hitowner'");
								mysql_query("UPDATE casinos SET profit = profit + '$hitbet' WHERE casino = 'Blackjack' AND location = '$userlocation' AND owner = '$ownername'");
							}
						}
					}
				}

				elseif ( (isset($_POST['stand']))||($_GET['stand'] == '1') ) {
					$hidescript = 1;
					$standcheck = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND person = '$username'");
					$standchecks = mysql_num_rows($standcheck);
					if ( $standchecks < '1' ) {
					} else {
						$standpush = mysql_fetch_array($standcheck);
						$standtime = $standpush['time'];
						$standbet = $standpush['bet'];
						$standbetwin = $standbet * 2;
						$standbetwina = number_format($standbetwin);
						$standown = $standbet + $ownermoney;
						$standbetb = number_format($standbet);
						$bet = $standbet;
						/*
						$playercount = 0;

						$dealerhitcheck = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND place = '$userlocation' AND person = '$username'");
						
						while ( $dealerhit = mysql_fetch_array($dealerhitcheck) ) {
							$playercard = $dealerhit['card'];
							$playercardvalue = mysql_query("SELECT * FROM cards WHERE name = '$playercard'");
							$playercardvaluea = mysql_fetch_array($playercardvalue);
							$playervalue = $playercardvaluea['value'];
							$playercount = $playercount + $playervalue;
						}

						$paceofha = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND place = '$userlocation' AND person = '$username' AND card = '1h'");
						$paceofsa = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND place = '$userlocation' AND person = '$username' AND card = '1s'");
						$paceofca = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND place = '$userlocation' AND person = '$username' AND card = '1c'");
						$paceofda = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND place = '$userlocation' AND person = '$username' AND card = '1d'");
						$paceofh = mysql_num_rows($paceofha);
						$paceofs = mysql_num_rows($paceofsa);
						$paceofc = mysql_num_rows($paceofca);
						$paceofd = mysql_num_rows($paceofda);
						$paces = $paceofh + $paceofs + $paceofc + $paceofd;

						while ( ($playercount > 21) && ($paces >= 1) ) {
							$playercount = $playercount - 10;
							$paces = $paces - 1;
						}
						*/
						$playercount = calc_user_hand($username, $userlocation);

						$dtotal = 1;

						$ohokokok = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND place = '$userlocation' AND person = 'Dealer'");
						$ohokokok = mysql_fetch_array($ohokokok);
						$ijijij = $ohokokok['card'];
						$ffffffff = mysql_query("SELECT * FROM cards WHERE name = '$ijijij'");
						$jifdjfi = mysql_fetch_array($ffffffff);
						$dealercount = $jifdjfi['value'];
						
						$player_hand = calc_user_hand($username, $userlocation);
						
						$odd_trys = 0;
						while ( ($dealercount < 17) || ($dtotal < 2) ) {
							// next card
							$dtyp = array("h", "d", "c", "s");
							$dface = mt_rand(0,3);
							$dnum = mt_rand(1,13);
							$FGd = rand(5,6);
							if ( $FGd == '5' ) {
								if ( $dealercount >= '14' ) {
									$dnum = mt_rand(2,12);
								}
							}

							$dcard = $dnum.''.$dtyp[$dface];
							$dcheck = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND card = '$dcard'");
							$dchecks = mysql_num_rows($dcheck);

							while ( $dchecks > '0' ) {
								$dface = mt_rand(0,3);
								$dnum = mt_rand(1,13);
								$dcard = $dnum.''.$dtyp[$dface];
								$dcheck = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND card = '$dcard'");
								$dchecks = mysql_num_rows($dcheck);
							}

							$dealercardvalue = mysql_query("SELECT * FROM cards WHERE name = '$dcard'");
							$dealercardvaluea = mysql_fetch_array($dealercardvalue);
							$dealervalue = $dealercardvaluea['value'];
							
							if (
								$odd_trys++ < 1
								&& (
									$dealercount + $dealervalue > 21
									|| ($dealercount + $dealervalue > 17 && $dealercount + $dealervalue < $player_hand )
								)
							) {
								// repick
								continue;
							}

							mysql_query("INSERT INTO blackjack (username,time,owner,place,card,person,bet) VALUES ('$username','$standtime','$ownername','$userlocation','$dcard','Dealer','$standbet')");
							$dtotal = $dtotal + 1;

							$dealercount = $dealercount + $dealervalue;
							
							if ( $dcard == '1h' ) { 
								$daces = 1;
							} elseif ( $dcard == '1s' ) {
								$daces = 1;
							} elseif ( $dcard == '1c' ) {
								$daces = 1;
							} elseif ( $dcard == '1d' ) {
								$daces = 1;
							}

							while ( ($dealercount > 21) && ($daces == 1) ) {
								$dealercount = $dealercount - 10;
								$daces = $daces - 1;
							}
						}

						$dealerscards = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND person = 'Dealer' ORDER BY id ASC");
						$drows = mysql_num_rows($dealerscards);

						mysql_query("DELETE FROM blackjack WHERE username = '$username' AND person = 'Dealer'");
						if ( mysql_affected_rows()==0 ) {
							die('<font color=white face=verdana size=1>Dealer Error.</font>');
						}

						mysql_query("DELETE FROM blackjack WHERE username = '$username' AND person = 'Dealer'");
						if ( mysql_affected_rows() > $dtotal ) {
							mysql_query("DELETE FROM blackjack WHERE username = '$username' AND place = '$userlocation'");
							die('<font color=white face=verdana size=1>Error 3.</font>');
						}

						mysql_query("DELETE FROM blackjack WHERE username = '$username' AND place = '$userlocation'");
						if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 1.</font>');}

						if ( ( $dealercount > 21 ) && ( $ownermoney <= $standbet ) ) {
							$showoutcome++;
							$outcome = "The dealer busted! <font color=\"lime\"><b>You won $$standbetwina</b></font>! <b>You won all of the owners cash, you now own the casino!</b>";
							mysql_query("INSERT INTO `casinoblackjackbets` (username,location,result,amount,time,bet) VALUES ('$usernameone','$userlocation','win','$standbetwin','$today','$standbet')");
							mysql_query("INSERT INTO moneylogs(`username`,`id`,`action`,`time`,`where`) VALUES ('$usernameone','','Won $$standbetwina on blackjack from $ownername','$datetime','blackjack')");
							mysql_query("INSERT INTO moneylogs(`username`,`id`,`action`,`time`,`where`) VALUES ('$ownername','','$usernameone won $$standbetwina from this blackjack','$datetime','blackjack')");
							mysql_query("UPDATE users SET casinos = casinos + 1 WHERE username = '$username'");
							mysql_query("DELETE FROM buycasinos WHERE city = '$userlocation' AND type = 'Blackjack'");
							mysql_query("UPDATE users SET money = money + $ownermoney WHERE username = '$username'");
							mysql_query("UPDATE users SET money = money + $standbet WHERE username = '$username'");
							mysql_query("UPDATE casinoprofit SET blackjack = blackjack + '$ownermoney', overall = overall + '$ownermoney' WHERE username = '$usernameone'");
							mysql_query("UPDATE users SET money = '0' WHERE ID = '$getsugid'");
							mysql_query("UPDATE casinos SET profit = profit - $standbet WHERE casino = 'Blackjack' AND location = '$userlocation'");
							mysql_query("UPDATE casinos SET owner = '$username' WHERE casino = 'Blackjack' AND location = '$userlocation'");
							mysql_query("UPDATE casinos SET nickname = '$username' WHERE casino = 'Blackjack' AND location = '$userlocation'");
							mysql_query("UPDATE casinos SET buyback = '0' WHERE casino = 'Blackjack' AND location = '$userlocation'");
							mysql_query("UPDATE casinos SET maxbet = '5000000' WHERE casino = 'Blackjack' AND location = '$userlocation'");
							if ( $getbuyback > 0 AND $ownerpoints >= $getbuyback ) {
								mysql_query("UPDATE users SET points = points + $getbuyback WHERE ID = '$ida'");
								mysql_query("UPDATE users SET points = points - $getbuyback WHERE ID = '$getsugid'");
								mysql_query("UPDATE casinos SET owner = '$ownername', maxbet = '0' WHERE casino = 'Blackjack' AND location = '$userlocation'");
								mysql_query("UPDATE users SET notification = 'a_open$usernameone a_closed$usernameone a_slashwon your blackjack.', notify = (notify + 1) WHERE ID = '$getsugid'");
							}
						} elseif ( ($dealercount < $playercount) && ($ownermoney <= $standbet) ) {
							$showoutcome++;
							$outcome = "The dealer had $dealercount! and you had $playercount! <font color=\"lime\"><b>You won $$standbetwina</b></font>! <b>You won all of the owners cash, you now own the casino!</b>";
							mysql_query("INSERT INTO `casinoblackjackbets` (username,location,result,amount,time,bet) VALUES ('$usernameone','$userlocation','win','$standbetwin','$today','$standbet')");
							mysql_query("UPDATE users SET casinos = casinos + 1 WHERE username = '$username'");
							mysql_query("DELETE FROM buycasinos WHERE city = '$userlocation' AND type = 'Blackjack'");
							mysql_query("UPDATE users SET money = money + $ownermoney WHERE username = '$username'");
							mysql_query("UPDATE users SET money = money + $standbet WHERE username = '$username'");
							mysql_query("UPDATE casinoprofit SET blackjack = blackjack + '$ownermoney', overall = overall + '$ownermoney' WHERE username = '$usernameone'");
							mysql_query("UPDATE users SET money = '0' WHERE ID = '$getsugid'");
							mysql_query("UPDATE casinos SET profit = profit - $standbet WHERE casino = 'Blackjack' AND location = '$userlocation'");
							mysql_query("UPDATE casinos SET owner = '$username' WHERE casino = 'Blackjack' AND location = '$userlocation'");
							mysql_query("UPDATE casinos SET nickname = '$username' WHERE casino = 'Blackjack' AND location = '$userlocation'");
							mysql_query("UPDATE casinos SET buyback = '0' WHERE casino = 'Blackjack' AND location = '$userlocation'");
							mysql_query("UPDATE casinos SET maxbet = '5000000' WHERE casino = 'Blackjack' AND location = '$userlocation'");
							if($getbuyback > 0 AND $ownerpoints >= $getbuyback){
								mysql_query("UPDATE users SET points = points + $getbuyback WHERE ID = '$ida'");
								mysql_query("UPDATE users SET points = points - $getbuyback WHERE ID = '$getsugid'");
								mysql_query("UPDATE casinos SET owner = '$ownername', maxbet = '0' WHERE casino = 'Blackjack' AND location = '$userlocation'");
								mysql_query("UPDATE users SET notification = 'a_open$usernameone a_closed$usernameone a_slashwon your blackjack.', notify = (notify + 1) WHERE ID = '$getsugid'");}}

						elseif(($dealercount < $playercount)&&($ownermoney > $standbet)) {
							$showoutcome++;
							$outcome = "The dealer had $dealercount! and you had $playercount! <font color=\"lime\"><b>You won $$standbetwina</b></font>!";
							mysql_query("INSERT INTO `casinoblackjackbets` (username,location,result,amount,time,bet) VALUES ('$usernameone','$userlocation','win','$standbetwin','$today','$standbet')");
							mysql_query("UPDATE users SET money = money + $standbetwin WHERE username = '$username'");
							mysql_query("UPDATE casinoprofit SET blackjack = blackjack + '$standbetwin', overall = overall + '$standbetwin' WHERE username = '$usernameone'");
							mysql_query("UPDATE users SET money = money - $standbet WHERE ID = '$getsugid'");
							mysql_query("UPDATE casinos SET profit = profit - $standbet WHERE casino = 'Blackjack' AND location = '$userlocation'");}

						elseif($dealercount == '21' && $dtotal == '2') {
							$showoutcome++;
							$outcome = "The dealer had blackjack! <font color=\"red\"><b>You lost $$standbetb</b></font>!";
							mysql_query("INSERT INTO `casinoblackjackbets` (username,location,result,amount,time,bet) VALUES ('$usernameone','$userlocation','lost','$standbet','$today','$standbet')");
							mysql_query("INSERT INTO moneylogs(`username`,`id`,`action`,`time`,`where`) VALUES ('$usernameone','','Lost $$standbetb on blackjack to $ownername','$datetime','blackjack')");
							mysql_query("INSERT INTO moneylogs(`username`,`id`,`action`,`time`,`where`) VALUES ('$ownername','','$usernameone lost $$standbetb to this blackjack','$datetime','blackjack')");
							mysql_query("UPDATE users SET money = money + $standbet WHERE ID = '$getsugid'");
							mysql_query("UPDATE casinos SET profit = profit + $standbet WHERE casino = 'Blackjack' AND location = '$userlocation'");}

						elseif($dealercount == $playercount) {
							$showoutcome++;
							$outcome = "You had $dealercount! and the dealer had $dealercount! It was a draw";
							mysql_query("INSERT INTO `casinoblackjackbets` (username,location,result,amount,time,bet) VALUES ('$usernameone','$userlocation','draw','$standbet','$today','$standbet')");
							mysql_query("UPDATE users SET money = money + $standbet WHERE username = '$username'");
							mysql_query("UPDATE casinoprofit SET blackjack = blackjack + '$standbet', overall = overall + '$standbet' WHERE username = '$usernameone'");}

						elseif ( ($dealercount > 21)&&($ownermoney > $standbet) ) {
							$showoutcome++;
							$outcome = "The dealer busted! <font color=\"lime\"><b>You won $$standbetwina</b></font>!";
							mysql_query("INSERT INTO `casinoblackjackbets` (username,location,result,amount,time,bet) VALUES ('$usernameone','$userlocation','win','$standbetwin','$today','$standbet')");
							mysql_query("INSERT INTO moneylogs(`username`,`id`,`action`,`time`,`where`) VALUES ('$usernameone','','Won $$standbetwina on blackjack from $ownername','$datetime','blackjack')");
							mysql_query("INSERT INTO moneylogs(`username`,`id`,`action`,`time`,`where`) VALUES ('$ownername','','$usernameone won $$standbetwina from this blackjack','$datetime','blackjack')");
							mysql_query("UPDATE users SET money = money + $standbetwin WHERE username = '$username'");
							mysql_query("UPDATE casinoprofit SET blackjack = blackjack + '$standbetwin', overall = overall + '$standbetwin' WHERE username = '$usernameone'");
							mysql_query("UPDATE users SET money = money - $standbet WHERE ID = '$getsugid'");
							mysql_query("UPDATE casinos SET profit = profit - $standbet WHERE casino = 'Blackjack' AND location = '$userlocation'");
						}

						elseif ( $dealercount > $playercount ){
							$showoutcome++; $outcome = "You had $playercount! and the dealer had $dealercount! <font color=\"red\"><b>You lost $$standbetb</b></font>!";
							mysql_query("INSERT INTO `casinoblackjackbets` (username,location,result,amount,time,bet) VALUES ('$usernameone','$userlocation','lost','$standbet','$today','$standbet')");
							mysql_query("INSERT INTO moneylogs(`username`,`id`,`action`,`time`,`where`) VALUES ('$usernameone','','Lost $$standbetb on blackjack to $ownername','$datetime','blackjack')");
							mysql_query("INSERT INTO moneylogs(`username`,`id`,`action`,`time`,`where`) VALUES ('$ownername','','$usernameone lost $$standbetb to this blackjack','$datetime','blackjack')");
							mysql_query("UPDATE users SET money = money + $standbet WHERE ID = '$getsugid'");
							mysql_query("UPDATE casinos SET profit = profit + $standbet WHERE casino = 'Blackjack' AND location = '$userlocation'");
						}
					}
				}
			}
			
			?>
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
								Blackjack
							</div>
							<div style="padding: 5px; margin: auto; text-align: center; color: #fefefe;">
								<div style="margin: auto; padding-top: 16px; padding-bottom: 6px; text-align: center;">
									<?if($getcardsrows == '0'){?>
									<form method=post style="font-size: 11px; margin-top: 25px; display: ; ">
										<table class="regTable" style="min-width: 230px; width: 85%; max-width: 350px;" cellspacing="0" cellpadding="0" align="center">
											<tbody><tr>
												<td class="header" colspan="2">
													Play Blackjack
												</td>
											</tr>
											<tr>
												<td class="col noTop" style="border-left: 0;">
													<label style="display: block; padding: 0;" for="stake">Bet:</label>
												</td>
												<td class="col is-btn-wrapper noTop">
													<input class="textarea noTop" name=bet value="<? echo $bet; ?>" style="width: 100%; height: 28px;"  autofocus="" onfocus="this.value=this.value;" placeholder="Enter Bet..." type="text">
												</td>
											</tr>
											<tr>
												<td colspan="2" class="col is-btn-wrapper noTop" style="width: 100%; height: 28px; border-left: 0;">
													<input class="textarea" style="width: 100%; height: 28px; border-left: 0;" name=playbj value="Start Game!" type="submit">
												</td>
											</tr>
											</tbody>
										</table>
									</form>
									<?}?>
									<form method="post" action="blackjack.php" style=" font-size: 11px; margin-top: 25px; margin-bottom: 32px;">
										<table class="regTable" style="<?if($bet==0){;?>opacity: 0.5;<?}?> min-width: 375px; width: 90%; max-width: 820px !important;" cellspacing="0" cellpadding="0" align="center">
											<tbody><tr>
												<td class="header" colspan="2">
													Blackjack Table
												</td>
											</tr>
											<?if($getcardsrows == '0'){?>
												<tr>
													<td class="noTop bet-col" colspan="2" style="border-left: 0;">
														<span style="color: silver;">Total Bet:</span> <span style="color: #999999;">-</span>
													</td>
												</tr>
												<tr>
													<td class="subHeader bj-sub" style="border-left: 0; width: 50%;">Dealers Cards&nbsp;
													</td>
													<td class="subHeader bj-sub" style="width: 50%;">Your Cards&nbsp;
													</td>
												</tr>
											<?}else{?>
												<tr>
													<td class="noTop bet-col" colspan="2" style="border-left: 0;">
														<span style="color: silver;">Total Bet:</span> $<?echo number_format($bet);?>
														<span style="margin-left: 6px; margin-right: 6px; color: white;">-</span>
														<span style="color: silver;">Time Remaining:</span>
														<span class="js-timer" data-finish-text="..." data-countdown="180" style="margin-left: 2px; color: #ffffff;"><?echo$timeleft;?> seconds</span>
													</td>
												</tr>
												<tr>
													<td class="subHeader bj-sub" style="border-left: 0; width: 50%;">Dealers Cards&nbsp;
														(<b style="color: #FFC753;"><?echo$dealercount;?></b>)
													</td>
													<td class="subHeader bj-sub" style="width: 50%;">Your Cards&nbsp;
														(<b style="color: #FFC753;"><?echo$count;?></b>) </td>
												</tr>
											<?}?>
											<tr>
												<td class="col bj-card-col noTop" style="border-left: 0; max-width: 200px;">
													<?if(!$drows){echo"<img class=\"bj-card\" src=/layout/card.png> <img  src=/layout/card.png> ";}
													else{while($dcards = mysql_fetch_array($dealerscards)){
														$dcard = $dcards['card'];
														echo"<img class=\"bj-card\" src=/layout/$dcard.png> ";}}if($drows == '1'){echo"<img class=\"bj-card\" src=/layout/card.png>";}?>
												</td>
												<td class="col bj-card-col noTop" style="border-left: 1px solid #444444;">
													<?if($getcardsrows == '0'){echo"<img class=\"bj-card\" src=/layout/card.png> <img class=\"bj-card\" src=/layout/card.png> ";}
													else{while($cards = mysql_fetch_array($getcards)){
														$card = $cards['card'];
														echo"<img class=\"bj-card\" src=/layout/$card.png> ";}}?>
												</td>
											</tr>
											</tbody>
										</table>
										<?if($getcardsrows != '0'){?>


											<? if ($showoutcome >= 1) { ?>
										<input disabled="disabled" onclick='gameee(); return false;' name="hit" value="Hit" class="textarea bj-action" type="submit">
										<input disabled="disabled" name="stand" value="Stand" class="textarea bj-action" type="submit">
										<br/>
										<input name="refreshme" value="Start New Game" class="textarea bj-action" type="submit">
											<? }else{ ?>
										<input onclick='gameee(); return false;' name="hit" value="Hit" class="textarea bj-action" type="submit">
										<input name="stand" value="Stand" class="textarea bj-action" type="submit">
											<?}?>
											<?if($count >= '220'){ if($hidescript != 1){?>
												<script type=text/javascript>
													function gameee(){
														var answer = confirm ('Are you sure you want to hit?')
														if (answer){location.href='blackjack.php?hit=1';}
														else{
															return false;}}
												</script><? }
											}
										}?>
									</form>
										<?
										if(($owner != '0')||($userrankid >= '25')){
										if($getbuyback > 99){ $tellbb = "$getbuyback"; }else{ $tellbb = "None"; }
										?>

								<?php }
								if(($ownername == 'None')){echo'<form method=post><input type=submit value="Take Over Casino" class="textarea curve3px" name=takeoverbj></form><br>';} ?>

										<?
										$getgprofit = mysql_query("SELECT * FROM casinoprofit WHERE username = '$usernameone'");
										$doitnow = mysql_fetch_array($getgprofit);
										$blackjackprofit = $doitnow['blackjack'];
										$casinoprofit = $doitnow['overall'];
										?>
										<br/>
										<div class="spacer"></div>
										<div style="padding-top: 8px; padding-bottom: 8px; color: #aaaaaa; font-size: 115%;">
											Owner: <a href="viewprofile.php?username=<?echo$ownername?>" style="color: #ffffff;"><?echo$ownername?></a><span style="color: #555555; padding-left: 7px; padding-right: 7px;"> - </span>
											Maximum Bet: <span style="color: #ffffff;"><?if($ownermaxbettwo == '999,999,999,999'){echo"<span style=\"color: gold;\">Infinite</span>";}else{echo "$ownermaxbettwo";}?></span>
										</div>
										<div class="spacer"></div>
										<div class="break" style="padding-top: 23px;"></div>
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
										  style="position: relative; top: -0.75px;">â€¢</span></span>
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
									<input class="textarea" id="feed_msg"										   style="box-sizing: border-box; -moz-box-sizing: border-box; width: 100%; position: absolute; bottom: 0; margin-bottom: -1px; border-top: 2px solid rgba(20, 20, 20, 0.8); border-bottom: 0; border-left: 0; border-right: 0;"										   placeholder="Enter Message..." type="text">								</form>							</div>						</div>					</td>					<td class="right"></td>				</tr>				<tr>					<td class="bottomleft"></td>					<td class="bottom"></td>					<td class="bottomright"></td>				</tr>			</table><div style="padding: 10px; font-size: 9.5px; opacity:0.7; text-align: center;">You can mute sounds in <a href="profile.php">Edit Profile</a>		</div>
			<?}?>
		</td>
	</tr>
</table>
</body>
</html>