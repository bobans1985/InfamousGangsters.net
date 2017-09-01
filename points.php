<?
include 'included.php'; session_start();
include 'names.php';
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
    <style type="text/css">
        .click{
            cursor: pointer;
            cursor: hand;
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
                <td valign="top" class="centerTd"><? include "cpanel_top.php";?></td>
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
            $outcome='';
            $saturate = "/[^a-z0-9]/i";
            $saturates = "/[^0-9]/i";
            $sessionidraw = $_COOKIE['PHPSESSID'];
            $sessionid = preg_replace($saturate,"",$sessionidraw);
            $userip = $_SERVER[REMOTE_ADDR];
            $chosenraw = mysql_real_escape_string($_POST['spend']);
            $spotida = mysql_real_escape_string($_POST['spotid']);
            $invitea = mysql_real_escape_string($_POST['invite']);
            $sendtoraw = mysql_real_escape_string($_POST['sendto']);
            $sendmoneyraw = mysql_real_escape_string($_POST['sendamount']);
            $sendto = preg_replace($saturate,"",$sendtoraw);
            $sendmoney = preg_replace($saturates,"",$sendmoneyraw);
            $chosen = preg_replace($saturates,"",$chosenraw);
            $spotid = preg_replace($saturates,"",$spotida);
            $invite = preg_replace($saturate,"",$invitea);
            $sendmoneytwo= number_format($sendmoney);

            $sendtotestsql = mysql_query("SELECT * FROM users WHERE username = '$sendto'");
            $sendtotestrows = mysql_num_rows($sendtotestsql);
            $sendtotestarray = mysql_fetch_array($sendtotestsql);
            $sendtostatus = $sendtotestarray['status'];
            $sendtoname = $sendtotestarray['username'];
            $latestip = $sendtotestarray['latestip'];
            $sendtoid = $sendtotestarray['ID'];

            $gangsterusername = $usernameone;

            $lasttensql = mysql_query("SELECT * FROM pointssent WHERE username = '$gangsterusername' ORDER BY id DESC LIMIT 0,15");
            $lasttensqlnum = mysql_num_rows($lasttensql);
            $lasttenrsql = mysql_query("SELECT * FROM pointssent WHERE sent = '$gangsterusername' ORDER BY id DESC LIMIT 0,15");
            $lasttenrsqlnum = mysql_num_rows($lasttenrsql);
            $lasttenitems = mysql_query("SELECT * FROM itemsbought WHERE username = '$gangsterusername' ORDER BY id DESC LIMIT 0,15");
            $lasttenitemsnum = mysql_num_rows($lasttenitems);
            $lasttenitemss = mysql_query("SELECT * FROM itemsbought WHERE sent = '$gangsterusername' ORDER BY id DESC LIMIT 0,15");
            $lasttenitemssnum = mysql_num_rows($lasttenitemss);

            $getuserinfoarray = $statustesttwo;
            $rank= $getuserinfoarray['rankid'];
            $points = $getuserinfoarray['points'];
            $add = $getuserinfoarray['addition'];
            $h = $getuserinfoarray['health'];
            $protectionid = $getuserinfoarray['protection'];
            $spentpts = $getuserinfoarray['ptsspent'];
            $shares = $getuserinfoarray['shares'];
            $recover = $getuserinfoarray['recover'];
            $tume = time();

            $countbgs = mysql_num_rows(mysql_query("SELECT guarding FROM bodyguards WHERE guarding = '$gangsterusername'"));
			$count_human_bgs = mysql_num_rows(mysql_query("SELECT guarding FROM bodyguards WHERE guarding = '$gangsterusername' AND robot = '0'"));
			$count_robot_bgs = mysql_num_rows(mysql_query("SELECT guarding FROM bodyguards WHERE guarding = '$gangsterusername' AND robot = '1'"));
            //var_dump ($count_human_bgs);
            //var_dump ($count_robot_bgs);
			if($countbgs > '5'){die('<font color=black face=verdana size=1>Contact admin immediately!</font>');}

            if (isset($_POST['sendamount'])) {
                if(!$sendmoney){$showoutcome++; $outcome = "You did not enter an amount to send!";}
                elseif(!$sendto){$showoutcome++; $outcome = "You did not enter an player to send to!";}
                elseif($sendtotestrows == '0'){$showoutcome++; $outcome = "No such user!";}
                elseif($sendmoney > $points){$showoutcome++; $outcome = "You do not have enough points!";}
                elseif($sendmoney > '99999999999'){$showoutcome++; $outcome = "ERROR, contact admin";}
                elseif($gangsterusername == $sendtoname){$showoutcome++; $outcome = "You cannot send points to yourself!";}
                else{
                    $penpoint = mysql_num_rows(mysql_query("SELECT * FROM ipadresses WHERE ip = '$userip' AND username ='$sendtoname'"));
                    if($penpoint > '0'){ mysql_query("UPDATE users SET penpoints = penpoints + 1 WHERE username = '$gangsterusername'");
                        $reason = "$gangsterusername sent $sendmoneytwo points to $sendto";
                        mysql_query("INSERT INTO penpoints(username,reason) VALUES('$gangsterusername','$reason')");}

                    mysql_query("UPDATE users SET points = (points - $sendmoney) WHERE ID = '$ida' AND points >= '$sendmoney'");
                    if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error send.</font>');}
                    mysql_query("UPDATE users SET points = points + '$sendmoney' WHERE ID = '$sendtoid'");

                    mysql_query("UPDATE users SET notification = 'a_open$usernameone a_closed$usernameone a_slashsent you $sendmoneytwo points.', notify = (notify + 1) WHERE ID = '$sendtoid'");

                    $insertsentsql = "INSERT INTO pointssent(username,amount,sent,ip) VALUES ('$gangsterusername','$sendmoney','$sendtoname','$userip')";
                    $insertsentresult = mysql_query($insertsentsql);
                    $showoutcome++; $outcome = "You sent <b><font color=yellow>$sendmoneytwo</font></b> points to <a href=viewprofile.php?username=$sendto><b>$sendto</b>!</a>";
                }}
            $time = time();

            if(isset($_POST['do'])){
                if($_POST['do']==1){
                    if($points < '25'){$showoutcome++; $outcome = "You dont have enough points!";}
                    else{
                        $antione = $time + 86400;
                        mysql_query("UPDATE users SET points = (points - 25) WHERE ID = '$ida' AND points >= '25'");
                        if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 1.</font>');}
                        mysql_query("UPDATE users SET ptsspent = (ptsspent + 25) WHERE ID = '$ida'");
                        mysql_query("UPDATE users SET antisteal = $antione WHERE ID = '$ida'");
                        $showoutcome++; $outcome .= "You bought the <span style=\"color: #FFC753;\">1 day anti steal protection!</span><br/>";}}

                if($_POST['do']==2){
                    if($points < '100'){$showoutcome++; $outcome = "You dont have enough points!";}
                    else{
                        $antione = $time + 604800;
                        mysql_query("UPDATE users SET points = (points - 100) WHERE ID = '$ida' AND points >= '100'");
                        if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 2.</font>');}
                        mysql_query("UPDATE users SET ptsspent = (ptsspent + 100) WHERE ID = '$ida'");
                        mysql_query("UPDATE users SET antisteal = $antione WHERE ID = '$ida'");
                        $showoutcome++; $outcome .= "You bought the <span style=\"color: #FFC753;\">1 week anti steal protection!</span><br/>";}}

                if($_POST['do']==3){
                    if($points < '100'){$showoutcome++; $outcome = "You dont have enough points!";}
                    else{
                        mysql_query("UPDATE users SET points = (points - 100) WHERE ID = '$ida' AND points >= '100'");
                        if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 4.</font>');}
                        mysql_query("UPDATE users SET ptsspent = (ptsspent + 100) WHERE ID = '$ida'");
                        if($add == '36000'){mysql_query("UPDATE users SET addition = (addition - 7200) WHERE ID = '$ida'");
                            mysql_query("UPDATE users SET timer = (timer - 7200) WHERE ID = '$ida'");
                            mysql_query("UPDATE crews SET timer = (timer - 7200) WHERE boss = '$gangsterusername'");}
                        $showoutcome++; $outcome .= "You can now <span style=\"color: #FFC753;\">do a city crime every 8 hours!</span><br/>";}}

				if($_POST['do']==3.1){
					if($points < '250'){$showoutcome++; $outcome = "You dont have enough points!";}
					else{
						mysql_query("UPDATE users SET points = (points - 250) WHERE ID = '$ida' AND points >= '250'");
						if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 4.</font>');}
						mysql_query("UPDATE users SET ptsspent = (ptsspent + 250) WHERE ID = '$ida'");
						if($add > '0'){//mysql_query("UPDATE users SET addition = (addition - 7200) WHERE ID = '$ida'");
							mysql_query("UPDATE users SET timer = 0 WHERE ID = '$ida'");
							mysql_query("UPDATE crews SET timer = 0 WHERE boss = '$gangsterusername'");}
						$showoutcome++; $outcome .= "OC timer reset!<br/>";}}

                if($_POST['do']==4){
                    if($points < '100'){$showoutcome++; $outcome = "You dont have enough points!";}
                    else{
                        mysql_query("UPDATE users SET points = (points - 100) WHERE ID = '$ida' AND points >= '100'");
                        if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 21.</font>');}
                        mysql_query("UPDATE users SET ptsspent = (ptsspent + 100) WHERE ID = '$ida'");
                        mysql_query("UPDATE users SET precise = '1' WHERE ID = '$ida'");
                        $showoutcome++; $outcome .= "You received a precise rankbar!<br/>";}}

                if($_POST['do']==5){
                    if($points < '100'){$showoutcome++; $outcome = "You dont have enough points!";}
                    else{
                        mysql_query("UPDATE users SET points = (points - 100) WHERE ID = '$ida' AND points >= '100'");
                        if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 8.</font>');}
                        mysql_query("UPDATE users SET ptsspent = (ptsspent + 100) WHERE ID = '$ida'");
                        mysql_query("INSERT INTO cars(owner,damage,bullets,carid,speed,carname,image)
VALUES ('$gangsterusername','0','275','13','60','$gangsterusername','q.png')");
                        $showoutcome++; $outcome .= "You bought a <span style=\"color: #FFC753;\">custom car!</span>!<br/>";}}

                if($_POST['do']==6){
                    $counthumanbgs = mysql_num_rows(mysql_query("SELECT * FROM bodyguards WHERE guarding = '$gangsterusername' AND status = '2' AND robot = '0'"));
                    $accepteda = mysql_query("SELECT * FROM bodyguards WHERE username = '$gangsterusername' AND status = '2'");
					$accepted = mysql_num_rows($accepteda);
					if($countrobotbgs >= '3'){
                        $showoutcome++; $outcome = "<font color=white face=verdana size=1>You can only have 3 human bodyguards!</font>";
                    }
					elseif ($accepted != '0') {
						$accepted_array = mysql_fetch_array($accepteda);
						$accepted_name = $accepted_array['guarding'];
						echo ('You can\'t buy bodyguards because your a bodyguard for the $accepted_name who you are protecting');
					}
					else {
						if($points < '100'){$showoutcome++; $outcome = "You dont have enough points!";}
						elseif($count_human_bgs >= '1'){$showoutcome++; $outcome = "You already have bodyguard spot 1!";}
						else{
							mysql_query("UPDATE users SET points = (points - 100) WHERE ID = '$ida' AND points >= '100'");
							if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 18.</font>');}
							mysql_query("UPDATE users SET ptsspent = (ptsspent + 100) WHERE ID = '$ida'");
							mysql_query("INSERT INTO bodyguards(username,guarding,status)
	VALUES (' ','$gangsterusername','0')");
							$showoutcome++; $outcome .= "You bought a <span style=\"color: #FFC753;\">bodyguard spot!</span><br/>";
							$count_human_bgs++;
						}
					}
				}

                if($_POST['do']==7){
                    $countrobotbgs = mysql_num_rows(mysql_query("SELECT * FROM bodyguards WHERE guarding = '$gangsterusername' AND status = '2' AND robot = '1'"));
                    $accepteda = mysql_query("SELECT * FROM bodyguards WHERE username = '$gangsterusername' AND status = '2'");
					$accepted = mysql_num_rows($accepteda);
					if($countrobotbgs >= '2'){
                        $showoutcome++; $outcome = "<font color=white face=verdana size=1>You can only have 2 robot bodyguards!</font>";
                    }
					elseif ($accepted != '0') {
						$accepted_array = mysql_fetch_array($accepteda);
						$accepted_name = $accepted_array['guarding'];
						echo ('You can\'t buy bodyguards because your a bodyguard for the $accepted_name who you are protecting');
					}
					else {
						if($points < '250'){$showoutcome++; $outcome = "You dont have enough points!";}
						elseif($count_robot_bgs >= '1'){$showoutcome++; $outcome = "You already have bodyguard spot 1!";}
						else{
							mysql_query("UPDATE users SET points = (points - 250) WHERE ID = '$ida' AND points >= '250'");
							if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 18.</font>');}
							mysql_query("UPDATE users SET ptsspent = (ptsspent + 250) WHERE ID = '$ida'");
							$robotone=$names[mt_rand(0,152)]."".mt_rand(10000,99999);
							$checkexist = mysql_num_rows(mysql_query("SELECT * FROM users WHERE username = '$robotone'"));
							while($checkexist > '0'){
								$robotone = mt_rand(1000000,99999999);
								$checkexist = mysql_num_rows(mysql_query("SELECT * FROM users WHERE username = '$robotone'"));
							}
							$loca = rand(1,7);
							if($loca == '1'){$locationrob = 'Las Vegas';}
							elseif($loca == '2'){$locationrob = 'Los Angeles';}
							elseif($loca == '3'){$locationrob = 'New York';}
							elseif($loca == '4'){$locationrob = 'Seatle';}
							elseif($loca == '5'){$locationrob = 'Miami';}
							elseif($loca == '6'){$locationrob = 'Chicago';}
							elseif($loca == '7'){$locationrob = 'Dallas';}
							$robotranka = rand(6,11);

							$insert = "INSERT INTO users (username, password, rankid, protection, location, robot)
	VALUES ('$robotone', 'fdsfsafdsfdfijreow9fj8re9j','$robotranka', '7', '$locationrob', '1')";
							$add_member = mysql_query($insert);

							mysql_query("INSERT INTO bodyguards(username,guarding,status,robot)
	VALUES ('$robotone','$gangsterusername','2','1')");

							$getrobotid = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE username = '$robotone'"));
							$robotid = $getrobotid['ID'];

							mysql_query("INSERT INTO suggestions(username,id,rob) VALUES('$robotone','$robotid','1')");
							$showoutcome++; $outcome .= "You bought a <span style=\"color: #FFC753;\">bodyguard spot!</span>!<br/>";
							$count_robot_bgs++;
						}
					}
				}

                if($_POST['do']==8){
                    $counthumanbgs = mysql_num_rows(mysql_query("SELECT * FROM bodyguards WHERE guarding = '$gangsterusername' AND status = '2' AND robot = '0'"));
                    $accepteda = mysql_query("SELECT * FROM bodyguards WHERE username = '$gangsterusername' AND status = '2'");
					$accepted = mysql_num_rows($accepteda);
					if($countrobotbgs >= '3'){
                        $showoutcome++; $outcome = "<font color=white face=verdana size=1>You can only have 3 human bodyguards!</font>";
                    }
					elseif ($accepted != '0') {
						$accepted_array = mysql_fetch_array($accepteda);
						$accepted_name = $accepted_array['guarding'];
						echo ('You can\'t buy bodyguards because your a bodyguard for the $accepted_name who you are protecting');
					}
					else {
						if($points < '200'){$showoutcome++; $outcome = "You dont have enough points!";}
						elseif($count_human_bgs >= '2'){$showoutcome++; $outcome = "You already have bodyguard spot 2!";}
						elseif($count_human_bgs < '1'){$showoutcome++; $outcome = "You need spot 1 before you can buy bodyguard spot 2!";}
						else{
							mysql_query("UPDATE users SET points = (points - 200) WHERE ID = '$ida' AND points >= '200'");
							if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 18.</font>');}
							mysql_query("UPDATE users SET ptsspent = (ptsspent + 200) WHERE ID = '$ida'");
							mysql_query("INSERT INTO bodyguards(username,guarding,status)
	VALUES (' ','$gangsterusername','0')");
							$showoutcome++; $outcome = "You bought a <span style=\"color: #FFC753;\"><b>bodyguard spot!</b></span>";
							$count_human_bgs++;
						}
					}
				}

                if($_POST['do']==9){
                    $countrobotbgs = mysql_num_rows(mysql_query("SELECT * FROM bodyguards WHERE guarding = '$gangsterusername' AND status = '2' AND robot = '1'"));
                    $accepteda = mysql_query("SELECT * FROM bodyguards WHERE username = '$gangsterusername' AND status = '2'");
					$accepted = mysql_num_rows($accepteda);
					if($countrobotbgs >= '2'){
                        $showoutcome++; $outcome = "<font color=white face=verdana size=1>You can only have 2 robot bodyguards!</font>";
                    }
					elseif ($accepted != '0') {
						$accepted_array = mysql_fetch_array($accepteda);
						$accepted_name = $accepted_array['guarding'];
						echo ('You can\'t buy bodyguards because your a bodyguard for the $accepted_name who you are protecting');
					}
					else {
						if($points < '350'){$showoutcome++; $outcome = "You dont have enough points!";}
						elseif($count_robot_bgs >= '2'){$showoutcome++; $outcome = "You already have bodyguard spot 2!";}
						else{
							$accepteda = mysql_query("SELECT * FROM bodyguards WHERE username = '$gangsterusername' AND status = '2'");
							$accepted = mysql_num_rows($accepteda);
							if($accepted != '0'){die (' ');}
							mysql_query("UPDATE users SET points = (points - 350) WHERE ID = '$ida' AND points >= '350'");
							if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 18.</font>');}
							mysql_query("UPDATE users SET ptsspent = (ptsspent + 350) WHERE ID = '$ida'");

							$robotone=$names[mt_rand(0,152)]."".mt_rand(10000,99999);
							$checkexist = mysql_num_rows(mysql_query("SELECT * FROM users WHERE username = '$robotone'"));
							while($checkexist > '0'){
								$robotone = mt_rand(1000000,99999999);
								$checkexist = mysql_num_rows(mysql_query("SELECT * FROM users WHERE username = '$robotone'"));
							}
							$loca = rand(1,7);
							if($loca == '1'){$locationrob = 'Las Vegas';}
							elseif($loca == '2'){$locationrob = 'Los Angeles';}
							elseif($loca == '3'){$locationrob = 'New York';}
							elseif($loca == '4'){$locationrob = 'Seatle';}
							elseif($loca == '5'){$locationrob = 'Miami';}
							elseif($loca == '6'){$locationrob = 'Chicago';}
							elseif($loca == '7'){$locationrob = 'Dallas';}
							$robotranka = rand(6,11);

							$insert = "INSERT INTO users (username, password, rankid, protection, location, robot)
	VALUES ('$robotone', 'fdsfsafdsfdfijreow9fj8re9j','$robotranka', '7', '$locationrob', '1')";
							$add_member = mysql_query($insert);

							mysql_query("INSERT INTO bodyguards(username,guarding,status,robot)
	VALUES ('$robotone','$gangsterusername','2','1')");

							$getrobotid = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE username = '$robotone'"));
							$robotid = $getrobotid['ID'];

							mysql_query("INSERT INTO suggestions(username,id,rob) VALUES('$robotone','$robotid','1')");
							$showoutcome++; $outcome .= "You bought a <span style=\"color: #FFC753;\"><b>bodyguard spot!</b></span><br/>";
							$count_robot_bgs++;
						}
					}
				}

                if($_POST['do']==10){
                    $counthumanbgs = mysql_num_rows(mysql_query("SELECT * FROM bodyguards WHERE guarding = '$gangsterusername' AND status = '2' AND robot = '0'"));
                    $accepteda = mysql_query("SELECT * FROM bodyguards WHERE username = '$gangsterusername' AND status = '2'");
					$accepted = mysql_num_rows($accepteda);
					if($countrobotbgs >= '3'){
                        $showoutcome++; $outcome = "<font color=white face=verdana size=1>You can only have 3 human bodyguards!</font>";
                    }
					elseif ($accepted != '0') {
						$accepted_array = mysql_fetch_array($accepteda);
						$accepted_name = $accepted_array['guarding'];
						echo ('You can\'t buy bodyguards because your a bodyguard for the $accepted_name who you are protecting');
					}
					else {
						if($points < '300'){$showoutcome++; $outcome = "You dont have enough points!";}
						elseif($count_human_bgs >= '3'){$showoutcome++; $outcome = "You already have bodyguard spot 3!";}
						elseif($count_human_bgs < '2'){$showoutcome++; $outcome = "You need spot 2 before you can buy bodyguard spot 3!";}
						else{
							mysql_query("UPDATE users SET points = (points - 300) WHERE ID = '$ida' AND points >= '300'");
							if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 20.</font>');}
							mysql_query("UPDATE users SET ptsspent = (ptsspent + 300) WHERE ID = '$ida'");
							mysql_query("INSERT INTO bodyguards(username,guarding,status)
	VALUES (' ','$gangsterusername','0')");
							$showoutcome++; $outcome .= "You bought a <span style=\"color: #FFC753;\"><b>bodyguard spot!</b></span><br/>";
							$count_human_bgs++;
						}
					}
				}

                /*
				if($_POST['do']==11){
                    $countrobotbgs = mysql_num_rows(mysql_query("SELECT * FROM bodyguards WHERE guarding = '$gangsterusername' AND status = '2' AND robot = '1'"));
                    if($countrobotbgs >= '2'){
                        $showoutcome++; $outcome = "<font color=white face=verdana size=1>You can only have 2 robot bodyguards!</font>";
                    }
                    if($points < '450'){$showoutcome++; $outcome = "You dont have enough points!";}
                    elseif($countbgs >= '3'){$showoutcome++; $outcome = "You already have bodyguard spot 3!";}
                    else{
                        $accepteda = mysql_query("SELECT * FROM bodyguards WHERE username = '$gangsterusername' AND status = '2'");
                        $accepted = mysql_num_rows($accepteda);
                        if($accepted != '0'){die (' ');}
                        mysql_query("UPDATE users SET points = (points - 450) WHERE ID = '$ida' AND points >= '450'");
                        if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 18.</font>');}
                        mysql_query("UPDATE users SET ptsspent = (ptsspent + 450) WHERE ID = '$ida'");
                        $robotone=$names[mt_rand(0,152)]."".mt_rand(10000,99999);
                        $checkexist = mysql_num_rows(mysql_query("SELECT * FROM users WHERE username = '$robotone'"));
                        while($checkexist > '0'){
                            $robotone = mt_rand(1000000,99999999);
                            $checkexist = mysql_num_rows(mysql_query("SELECT * FROM users WHERE username = '$robotone'"));
                        }
                        $loca = rand(1,7);
                        if($loca == '1'){$locationrob = 'Las Vegas';}
                        elseif($loca == '2'){$locationrob = 'Los Angeles';}
                        elseif($loca == '3'){$locationrob = 'New York';}
                        elseif($loca == '4'){$locationrob = 'Seatle';}
                        elseif($loca == '5'){$locationrob = 'Miami';}
                        elseif($loca == '6'){$locationrob = 'Chicago';}
                        elseif($loca == '7'){$locationrob = 'Dallas';}
                        $robotranka = rand(6,11);

                        $insert = "INSERT INTO users (username, password, rankid, protection, location, robot)
VALUES ('$robotone', 'fdsfsafdsfdfijreow9fj8re9j','$robotranka', '7', '$locationrob', '1')";
                        $add_member = mysql_query($insert);

                        mysql_query("INSERT INTO bodyguards(username,guarding,status,robot)
VALUES ('$robotone','$gangsterusername','2','1')");

                        $getrobotid = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE username = '$robotone'"));
                        $robotid = $getrobotid['ID'];

                        mysql_query("INSERT INTO suggestions(username,id,rob) VALUES('$robotone','$robotid','1')");
                        $showoutcome++; $outcome .= "You bought a <span style=\"color: #FFC753;\">bodyguard spot!</span>";}}

                if($_POST['do']==12){
                    if($points < '400'){$showoutcome++; $outcome = "You dont have enough points!";}

                    elseif($countbgs >= '4'){$showoutcome++; $outcome = "You already have bodyguard spot 4!";}
                    elseif($countbgs < '3'){$showoutcome++; $outcome = "You need spot 3 before you can buy bodyguard spot 4!";}
                    else{
                        mysql_query("UPDATE users SET points = (points - 400) WHERE ID = '$ida' AND points >= '400'");
                        if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 21.</font>');}
                        mysql_query("UPDATE users SET ptsspent = (ptsspent + 400) WHERE ID = '$ida'");
                        mysql_query("INSERT INTO bodyguards(username,guarding,status)
VALUES (' ','$gangsterusername','0')");;
                        $showoutcome++; $outcome .= "You bought a <span style=\"color: #FFC753;\">bodyguard spot!</span><br/>";}}

                if($_POST['do']==13){
                    $countrobotbgs = mysql_num_rows(mysql_query("SELECT * FROM bodyguards WHERE guarding = '$gangsterusername' AND status = '2' AND robot = '1'"));
                    if($countrobotbgs >= '2'){
                        $showoutcome++; $outcome = "<font color=white face=verdana size=1>You can only have 2 robot bodyguards!</font>";
                    }
                    elseif($points < '550'){$showoutcome++; $outcome = "You dont have enough points!";}
                    elseif($countbgs >= '4'){$showoutcome++; $outcome = "You already have bodyguard spot 4!";}
                    else{
                        $accepteda = mysql_query("SELECT * FROM bodyguards WHERE username = '$gangsterusername' AND status = '2'");
                        $accepted = mysql_num_rows($accepteda);
                        if($accepted != '0'){die (' ');}
                        mysql_query("UPDATE users SET points = (points - 550) WHERE ID = '$ida' AND points >= '550'");
                        if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 18.</font>');}
                        mysql_query("UPDATE users SET ptsspent = (ptsspent + 550) WHERE ID = '$ida'");

                        $robotone=$names[mt_rand(0,152)]."".mt_rand(10000,99999);
                        $checkexist = mysql_num_rows(mysql_query("SELECT * FROM users WHERE username = '$robotone'"));
                        while($checkexist > '0'){
                            $robotone = mt_rand(1000000,99999999);
                            $checkexist = mysql_num_rows(mysql_query("SELECT * FROM users WHERE username = '$robotone'"));
                        }
                        $loca = rand(1,7);
                        if($loca == '1'){$locationrob = 'Las Vegas';}
                        elseif($loca == '2'){$locationrob = 'Los Angeles';}
                        elseif($loca == '3'){$locationrob = 'New York';}
                        elseif($loca == '4'){$locationrob = 'Seatle';}
                        elseif($loca == '5'){$locationrob = 'Miami';}
                        elseif($loca == '6'){$locationrob = 'Chicago';}
                        elseif($loca == '7'){$locationrob = 'Dallas';}
                        $robotranka = rand(6,11);

                        $insert = "INSERT INTO users (username, password, rankid, protection, location, robot)
VALUES ('$robotone', 'fdsfsafdsfdfijreow9fj8re9j','$robotranka', '7', '$locationrob', '1')";
                        $add_member = mysql_query($insert);

                        mysql_query("INSERT INTO bodyguards(username,guarding,status,robot)
VALUES ('$robotone','$gangsterusername','2','1')");

                        $getrobotid = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE username = '$robotone'"));
                        $robotid = $getrobotid['ID'];

                        mysql_query("INSERT INTO suggestions(username,id,rob) VALUES('$robotone','$robotid','1')");
                        $showoutcome++; $outcome .= "You bought a <span style=\"color: #FFC753;\">bodyguard spot!</span><br/>";}}

                if($_POST['do']==14){
                    if($points < '500'){$showoutcome++; $outcome = "You dont have enough points!";}
                    elseif($countbgs >= '5'){$showoutcome++; $outcome = "You already have bodyguard spot 5!";}
                    elseif($countbgs < '4'){$showoutcome++; $outcome = "You need spot 4 before you can buy bodyguard spot 5!";}
                    else{
                        mysql_query("UPDATE users SET points = (points - 500) WHERE ID = '$ida' AND points >= '500'");
                        if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 21.</font>');}
                        mysql_query("UPDATE users SET ptsspent = (ptsspent + 500) WHERE ID = '$ida'");
                        mysql_query("INSERT INTO bodyguards(username,guarding,status)
VALUES (' ','$gangsterusername','0')");;
                        $showoutcome++; $outcome .= "You bought a <span style=\"color: #FFC753;\">bodyguard spot!</span><br/>"; }}

                if($_POST['do']==15){
                    $countrobotbgs = mysql_num_rows(mysql_query("SELECT * FROM bodyguards WHERE guarding = '$gangsterusername' AND status = '2' AND robot = '1'"));
                    if($countrobotbgs >= '2'){
                        $showoutcome++; $outcome = "<font color=white face=verdana size=1>You can only have 2 robot bodyguards!</font>";
                    }
                    elseif($points < '650'){$showoutcome++; $outcome = "You dont have enough points!";}
                    elseif($countbgs >= '5'){$showoutcome++; $outcome = "You already have bodyguard spot 5!";}
                    else{
                        $accepteda = mysql_query("SELECT * FROM bodyguards WHERE username = '$gangsterusername' AND status = '2'");
                        $accepted = mysql_num_rows($accepteda);
                        if($accepted != '0'){die (' ');}
                        mysql_query("UPDATE users SET points = (points - 650) WHERE ID = '$ida' AND points >= '650'");
                        if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 18.</font>');}
                        mysql_query("UPDATE users SET ptsspent = (ptsspent + 650) WHERE ID = '$ida'");

                        $robotone=$names[mt_rand(0,152)]."".mt_rand(10000,99999);
                        $checkexist = mysql_num_rows(mysql_query("SELECT * FROM users WHERE username = '$robotone'"));
                        while($checkexist > '0'){
                            $robotone = mt_rand(1000000,99999999);
                            $checkexist = mysql_num_rows(mysql_query("SELECT * FROM users WHERE username = '$robotone'"));
                        }
                        $loca = rand(1,7);
                        if($loca == '1'){$locationrob = 'Las Vegas';}
                        elseif($loca == '2'){$locationrob = 'Los Angeles';}
                        elseif($loca == '3'){$locationrob = 'New York';}
                        elseif($loca == '4'){$locationrob = 'Seatle';}
                        elseif($loca == '5'){$locationrob = 'Miami';}
                        elseif($loca == '6'){$locationrob = 'Chicago';}
                        elseif($loca == '7'){$locationrob = 'Dallas';}
                        $robotranka = rand(6,11);

                        $insert = "INSERT INTO users (username, password, rankid, protection, location, robot)
VALUES ('$robotone', 'fdsfsafdsfdfijreow9fj8re9j','$robotranka', '7', '$locationrob', '1')";
                        $add_member = mysql_query($insert);

                        mysql_query("INSERT INTO bodyguards(username,guarding,status,robot)
VALUES ('$robotone','$gangsterusername','2','1')");

                        $getrobotid = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE username = '$robotone'"));
                        $robotid = $getrobotid['ID'];

                        mysql_query("INSERT INTO suggestions(username,id,rob) VALUES('$robotone','$robotid','1')");
                        $showoutcome++; $outcome .= "You bought a <span style=\"color: #FFC753;\">bodyguard spot!</span><br/>";}}
				*/

                if($_POST['do']==16){
                    if($points < '100'){$showoutcome++; $outcome = "You dont have enough points!";}
                    else{
                        mysql_query("UPDATE users SET points = (points - 100) WHERE ID = '$ida' AND points >= '100'");
                        if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 9.</font>');}
                        mysql_query("UPDATE users SET ptsspent = (ptsspent + 100) WHERE ID = '$ida'");
                        mysql_query("UPDATE users SET gun = '10' WHERE ID = '$ida'");
                        $showoutcome++; $outcome .= "You received the <span style=\"color: #FFC753;\"><b>Beretta M501</b>!</span><br/>";}}

                if($_POST['do']==17){
                    if($points < '100'){$showoutcome++; $outcome = "You dont have enough points!";}
                    else{
                        mysql_query("UPDATE users SET points = (points - 100) WHERE ID = '$ida' AND points >= '100'");
                        if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 9.</font>');}
                        mysql_query("UPDATE users SET ptsspent = (ptsspent + 100) WHERE ID = '$ida'");
                        mysql_query("UPDATE users SET protection = '10' WHERE ID = '$ida'");
                        $showoutcome++; $outcome .= "You received the <span style=\"color: #FFC753;\"><b>Medium SWAT Vest</b>!</span><br/>";}}

                if($_POST['do']==18){
                    if($points < '175'){$showoutcome++; $outcome = "You dont have enough points!";}
                    elseif($protectionid < 10){$showoutcome++; $outcome = "You need to buy the Medium SWAT Vest first!";}
                    else{
                        mysql_query("UPDATE users SET points = (points - 175) WHERE ID = '$ida' AND points >= '175'");
                        if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 9.</font>');}
                        mysql_query("UPDATE users SET ptsspent = (ptsspent + 175) WHERE ID = '$ida'");
                        mysql_query("UPDATE users SET protection = '11' WHERE ID = '$ida'");
                        $showoutcome++; $outcome .= "You received the <span style=\"color: #FFC753;\"><b>Heavy SWAT Vest</b>!<br/></span>";}}

                if($_POST['do']==19){
                    if($points < '100'){$showoutcome++; $outcome = "You dont have enough points!";}
                    else{
                        mysql_query("UPDATE users SET points = (points - 100) WHERE ID = '$ida' AND points >= '100'");
                        if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 24.</font>');}
                        mysql_query("UPDATE users SET ptsspent = (ptsspent + 100) WHERE ID = '$ida'");
                        mysql_query("UPDATE users SET silencer = '1' WHERE ID = '$ida'");
                        $showoutcome++; $outcome .= "You bought a <span style=\"color: #FFC753;\"><b>weapon silencer!</b></span><br/>";}}

                if($_POST['do']==20){
                    if($points < 35){$showoutcome++; $outcome = "You dont have enough points!";}
                    else{
                        mysql_query("UPDATE users SET points = (points - 35) WHERE ID = '$ida' AND points >= '35'");
                        if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 5.</font>');}
                        mysql_query("UPDATE users SET ptsspent = (ptsspent + 35) WHERE ID = '$ida'");
                        mysql_query("UPDATE users SET bullets = (bullets + 1000) WHERE ID = '$ida'");
                        $showoutcome++; $outcome .= "You received 1,000 bullets!<br/>";}}

                if($_POST['do']==21){
                    if($points < 160){$showoutcome++; $outcome = "You dont have enough points!";}
                    else{
                        mysql_query("UPDATE users SET points = (points - 160) WHERE ID = '$ida' AND points >= '160'");
                        if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 6.</font>');}
                        mysql_query("UPDATE users SET ptsspent = (ptsspent + 160) WHERE ID = '$ida'");
                        mysql_query("UPDATE users SET bullets = (bullets + 5000) WHERE ID = '$ida'");
                        $showoutcome++; $outcome .= "You received 5,000 bullets!<br/>";}}

                if($_POST['do']==22){
                    if($points < 310){$showoutcome++; $outcome = "You dont have enough points!";}
                    else{
                        mysql_query("UPDATE users SET points = (points - 310) WHERE ID = '$ida' AND points >= '310'");
                        if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 7.</font>');}
                        mysql_query("UPDATE users SET ptsspent = (ptsspent + 310) WHERE ID = '$ida'");
                        mysql_query("UPDATE users SET bullets = (bullets + 10000) WHERE ID = '$ida'");
                        $showoutcome++; $outcome .= "You received 10,000 bullets!<br/>";}}

                if($_POST['do']==23){
                    if($points < '15'){$showoutcome++; $outcome = "You dont have enough points!";}
                    else{
                        mysql_query("UPDATE users SET points = (points - 15) WHERE ID = '$ida' AND points >= '15'");
                        if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 14.</font>');}
                        mysql_query("UPDATE users SET ptsspent = (ptsspent + 15) WHERE ID = '$ida'");
                        if(($h + 5) >= (100)){
                            mysql_query("UPDATE users SET health = '100' WHERE ID = '$ida'");}else{mysql_query("UPDATE users SET health = (health + 5) WHERE ID = '$ida'");}
                        $showoutcome++; $outcome .= "You received 5% health!<br/>";}}

                if($_POST['do']==24){
                    if($points < '30'){$showoutcome++; $outcome = "You dont have enough points!";}
                    else{
                        mysql_query("UPDATE users SET points = (points - 30) WHERE ID = '$ida' AND points >= '30'");
                        if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 15.</font>');}
                        mysql_query("UPDATE users SET ptsspent = (ptsspent + 30) WHERE ID = '$ida'");
                        if(($h + 15) >= (100)){
                            mysql_query("UPDATE users SET health = '100' WHERE ID = '$ida'");}else{mysql_query("UPDATE users SET health = (health + 15) WHERE ID = '$ida'");}
                        $showoutcome++; $outcome .= "You received 15% health!<br/>";}}

                if($_POST['do']==25){
                    if($points < '45'){$showoutcome++; $outcome = "You dont have enough points!";}
                    else{
                        mysql_query("UPDATE users SET points = (points - 45) WHERE ID = '$ida' AND points >= '45'");
                        if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 16.</font>');}
                        mysql_query("UPDATE users SET ptsspent = (ptsspent + 45) WHERE ID = '$ida'");
                        if(($h + 25) >= (100)){
                            mysql_query("UPDATE users SET health = '100' WHERE ID = '$ida'");}else{mysql_query("UPDATE users SET health = (health + 25) WHERE ID = '$ida'");}
                        $showoutcome++; $outcome .= "You received 25% health!<br/>";}}

                if($_POST['do']==26){
                    if($points < '500'){$showoutcome++; $outcome = "You dont have enough points!";}
                    elseif($shares == '7500'){$showoutcome++; $outcome = "You already have the maximum amount of shares!";}
                    else{
                        mysql_query("UPDATE users SET points = (points - 500) WHERE ID = '$ida' AND points >= '500'");
                        if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 16.</font>');}
                        mysql_query("UPDATE users SET ptsspent = (ptsspent + 500) WHERE ID = '$ida'");
                        mysql_query("UPDATE users SET shares = 7500 WHERE ID = '$ida'");
                        $showoutcome++; $outcome .= "You can now hold 7500 shares!<br/>";}}

                if($_POST['do']==27){
                    if($points < '100'){$showoutcome++; $outcome = "You dont have enough points!";}
                    elseif($recover>0){
                        mysql_query("UPDATE users SET points = (points - 100) WHERE ID = '$ida' AND points >= '100'");
                        if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 16.</font>');}
                        mysql_query("UPDATE users SET ptsspent = (ptsspent + 100) WHERE ID = '$ida'");
                        mysql_query("UPDATE users SET recover = 0 WHERE ID = '$ida'");
                        $showoutcome++; $outcome .= "You reset shooting timer!<br/>";
                    }else{
                        $showoutcome++; $outcome = "Your shooting timer doesn't need to be reset!";
                    }
                }
            }

            $chosen = mysql_real_escape_string(strip_tags($_POST['itemg']));
            $userg = mysql_real_escape_string(strip_tags($_POST['userg']));
            $loluser = $userg;
            if($userg){ $isusertrue = mysql_num_rows(mysql_query("SELECT * FROM users WHERE username = '$userg'"));
                if($isusertrue <= 0){ $showoutcome++; $outcome = "<font size=1 face=verdana color=white>No such user!"; }else{
                    $gettheuser = mysql_query("SELECT * FROM users WHERE username = '$userg'");
                    $theuserinfo = mysql_fetch_array($gettheuser);
                    $theuserid = $theuserinfo['ID'];
                    $theuserusername = $theuserinfo['username'];
                    $theuserprotection = $theuserinfo['protection'];

                    $penpoint = mysql_num_rows(mysql_query("SELECT * FROM ipadresses WHERE ip = '$userip' AND username ='$theuserusername'"));
                    if($penpoint > '0'){ mysql_query("UPDATE users SET penpoints = penpoints + 1 WHERE username = '$usernameone'");
                        $reason = "$username bought $theuserusername a gift";
                        mysql_query("INSERT INTO penpoints(username,reason) VALUES('$usernameone','$reason')");}

                    if($_POST['udo']==1){
                        if($points < '25'){$showoutcome++; $outcome = "You dont have enough points!";}
                        else{
                            $antione = $time + 86400;
                            mysql_query("UPDATE users SET points = (points - 25) WHERE ID = '$ida' AND points >= '25'");
                            if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 1.</font>');}
                            mysql_query("UPDATE users SET ptsspent = (ptsspent + 25) WHERE ID = '$ida'");
                            mysql_query("UPDATE users SET antisteal = $antione WHERE ID = '$theuserid'");
                            mysql_query("UPDATE users SET notification = 'a_open$usernameone a_closed$usernameone a_slashbought you 1 day anti steal protection.', notify = (notify + 1) WHERE ID = '$theuserid'");
                            $insertsentsql = "INSERT INTO itemsbought(username,amount,sent,ip) VALUES ('$gangsterusername','1 day anti-steal','$theuserusername','$userip')";
                            $insertsentresult = mysql_query($insertsentsql);

                            $showoutcome++; $outcome = "You bought the <span style=\"color: #FFC753;\"><b>1 day anti steal protection</b></span> for $theuserusername!";}}

                    elseif($_POST['udo']==2){
                        if($points < '100'){$showoutcome++; $outcome = "You dont have enough points!";}
                        else{
                            $antione = $time + 604800;
                            mysql_query("UPDATE users SET points = (points - 100) WHERE ID = '$ida' AND points >= '100'");
                            if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 2.</font>');}
                            mysql_query("UPDATE users SET ptsspent = (ptsspent + 100) WHERE ID = '$ida'");
                            mysql_query("UPDATE users SET antisteal = $antione WHERE ID = '$theuserid'");
                            mysql_query("UPDATE users SET notification = 'a_open$usernameone a_closed$usernameone a_slashbought you 1 week anti steal protection.', notify = (notify + 1) WHERE ID = '$theuserid'");
                            $insertsentsql = "INSERT INTO itemsbought(username,amount,sent,ip) VALUES ('$gangsterusername','1 week anti-steal','$theuserusername','$userip')";
                            $insertsentresult = mysql_query($insertsentsql);

                            $showoutcome++; $outcome = "You bought the <span style=\"color: #FFC753;\"><b>1 week anti steal protection</b></span> for $theuserusername!";}}

                    elseif($_POST['udo']==3){
                        if($points < '100'){$showoutcome++; $outcome = "You dont have enough points!";}
                        else{
                            mysql_query("UPDATE users SET points = (points - 100) WHERE ID = '$ida' AND points >= '100'");
                            if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 4.</font>');}
                            mysql_query("UPDATE users SET ptsspent = (ptsspent + 100) WHERE ID = '$ida'");
                            if($add == '36000'){mysql_query("UPDATE users SET addition = (addition - 7200) WHERE ID = '$theuserid'");
                                mysql_query("UPDATE users SET timer = (timer - 7200) WHERE ID = '$theuserid'");
                                mysql_query("UPDATE crews SET timer = (timer - 7200) WHERE boss = '$theuserusername'");}
                            mysql_query("UPDATE users SET notification = 'a_open$usernameone a_closed$usernameone a_slashbought you 8 hour city crime timer.', notify = (notify + 1) WHERE ID = '$theuserid'");
                            $insertsentsql = "INSERT INTO itemsbought(username,amount,sent,ip) VALUES ('$gangsterusername','8 hour city crime timer','$theuserusername','$userip')";
                            $insertsentresult = mysql_query($insertsentsql);

                            $showoutcome++; $outcome = "You bought city crime every 8 hours for $theuserusername!";}}

                    elseif($_POST['udo']==3.1){
                        if($points < '250'){$showoutcome++; $outcome = "You dont have enough points!";}
                        else{
                            mysql_query("UPDATE users SET points = (points - 250) WHERE ID = '$ida' AND points >= '100'");
                            if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 4.</font>');}
                            mysql_query("UPDATE users SET ptsspent = (ptsspent + 250) WHERE ID = '$ida'");
                            if($add == '36000'){//mysql_query("UPDATE users SET addition = (addition - 7200) WHERE ID = '$theuserid'");
                                mysql_query("UPDATE users SET timer = 0 WHERE ID = '$theuserid'");
                                mysql_query("UPDATE crews SET timer = 0 WHERE boss = '$theuserusername'");}
                            mysql_query("UPDATE users SET notification = 'a_open$usernameone a_closed$usernameone a_slashbought you reset city crime timer.', notify = (notify + 1) WHERE ID = '$theuserid'");
                            $insertsentsql = "INSERT INTO itemsbought(username,amount,sent,ip) VALUES ('$gangsterusername','reset city crime timer','$theuserusername','$userip')";
                            $insertsentresult = mysql_query($insertsentsql);

                            $showoutcome++; $outcome = "You bought reset city crime timer for $theuserusername!";}}

                    elseif($_POST['udo']==4){
                        if($points < '100'){$showoutcome++; $outcome = "You dont have enough points!";}
                        else{
                            mysql_query("UPDATE users SET points = (points - 100) WHERE ID = '$ida' AND points >= '100'");
                            if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 21.</font>');}
                            mysql_query("UPDATE users SET ptsspent = (ptsspent + 100) WHERE ID = '$ida'");
                            mysql_query("UPDATE users SET precise = '1' WHERE ID = '$theuserid'");
                            mysql_query("UPDATE users SET notification = 'a_open$usernameone a_closed$usernameone a_slashbought you a precise rankbar.', notify = (notify + 1) WHERE ID = '$theuserid'");
                            $insertsentsql = "INSERT INTO itemsbought(username,amount,sent,ip) VALUES ('$gangsterusername','a precise rankbar','$theuserusername','$userip')";
                            $insertsentresult = mysql_query($insertsentsql);

                            $showoutcome++; $outcome = "You bought a <span style=\"color: #FFC753;\"><b>precise rankbar</b></span> for $theuserusername";}}

                    elseif($_POST['udo']==5){
                        if($points < '100'){$showoutcome++; $outcome = "You dont have enough points!";}
                        else{
                            mysql_query("UPDATE users SET points = (points - 100) WHERE ID = '$ida' AND points >= '100'");
                            if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 8.</font>');}
                            mysql_query("UPDATE users SET ptsspent = (ptsspent + 100) WHERE ID = '$ida'");
                            mysql_query("INSERT INTO cars(owner,damage,bullets,carid,speed,carname,image)
VALUES ('$theuserusername','0','360','13','60','$theuserusername','q.png')");
                            mysql_query("UPDATE users SET notification = 'a_open$usernameone a_closed$usernameone a_slashbought you a custom car.', notify = (notify + 1) WHERE ID = '$theuserid'");
                            $insertsentsql = "INSERT INTO itemsbought(username,amount,sent,ip) VALUES ('$gangsterusername','a custom car','$theuserusername','$userip')";
                            $insertsentresult = mysql_query($insertsentsql);

                            $showoutcome++; $outcome = "You bought a <span style=\"color: #FFC753;\"><b>custom car</b></span> for $theuserusername!";}}

                    elseif($_POST['udo']==6){
                        if($points < '100'){$showoutcome++; $outcome = "You dont have enough points!";}
                        else{
                            mysql_query("UPDATE users SET points = (points - 100) WHERE ID = '$ida' AND points >= '100'");
                            if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 9.</font>');}
                            mysql_query("UPDATE users SET ptsspent = (ptsspent + 100) WHERE ID = '$ida'");
                            mysql_query("UPDATE users SET gun = '10' WHERE ID = '$theuserid'");
                            mysql_query("UPDATE users SET notification = 'a_open$usernameone a_closed$usernameone a_slashbought you a Beretta M501.', notify = (notify + 1) WHERE ID = '$theuserid'");
                            $insertsentsql = "INSERT INTO itemsbought(username,amount,sent,ip) VALUES ('$gangsterusername','a Beretta M501','$theuserusername','$userip')";
                            $insertsentresult = mysql_query($insertsentsql);

                            $showoutcome++; $outcome = "You bought the <span style=\"color: #FFC753;\"><b>Beretta M501</b></span> for $theuserusername!";}}

                    elseif($_POST['udo']==7){
                        if($points < '100'){$showoutcome++; $outcome = "You dont have enough points!";}
                        else{
                            mysql_query("UPDATE users SET points = (points - 100) WHERE ID = '$ida' AND points >= '100'");
                            if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 9.</font>');}
                            mysql_query("UPDATE users SET ptsspent = (ptsspent + 100) WHERE ID = '$ida'");
                            mysql_query("UPDATE users SET protection = '10' WHERE ID = '$theuserid'");
                            mysql_query("UPDATE users SET notification = 'a_open$usernameone a_closed$usernameone a_slashbought you a Medium SWAT Vest.', notify = (notify + 1) WHERE ID = '$theuserid'");
                            $insertsentsql = "INSERT INTO itemsbought(username,amount,sent,ip) VALUES ('$gangsterusername','a medium SWAT vest','$theuserusername','$userip')";
                            $insertsentresult = mysql_query($insertsentsql);

                            $showoutcome++; $outcome = "You bought the <span style=\"color: #FFC753;\"><b>Medium SWAT Vest</b></span> for $theuserusername!";}}

                    elseif($_POST['udo']==8){
                        if($points < '175'){$showoutcome++; $outcome = "You dont have enough points!";}
                        elseif($theuserprotection < 10){$showoutcome++; $outcome = "$theuserusername needs to have the Medium SWAT Vest before buying this!";}
                        else{
                            mysql_query("UPDATE users SET points = (points - 175) WHERE ID = '$ida' AND points >= '175'");
                            if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 9.</font>');}
                            mysql_query("UPDATE users SET ptsspent = (ptsspent + 175) WHERE ID = '$ida'");
                            mysql_query("UPDATE users SET protection = '11' WHERE ID = '$theuserid'");
                            mysql_query("UPDATE users SET notification = 'a_open$usernameone a_closed$usernameone a_slashbought you a Heavy SWAT Vest.', notify = (notify + 1) WHERE ID = '$theuserid'");
                            $insertsentsql = "INSERT INTO itemsbought(username,amount,sent,ip) VALUES ('$gangsterusername','a heavy SWAT vest','$theuserusername','$userip')";
                            $insertsentresult = mysql_query($insertsentsql);

                            $showoutcome++; $outcome = "You bought the <span style=\"color: #FFC753;\"><b>Heavy SWAT Vest</b></span> for $theuserusername!";}}

                    elseif($_POST['udo']==9){
                        if($points < '100'){$showoutcome++; $outcome = "You dont have enough points!";}
                        else{
                            mysql_query("UPDATE users SET points = (points - 100) WHERE ID = '$ida' AND points >= '100'");
                            if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 24.</font>');}
                            mysql_query("UPDATE users SET ptsspent = (ptsspent + 100) WHERE ID = '$ida'");
                            mysql_query("UPDATE users SET silencer = '1' WHERE ID = '$theuserid'");
                            mysql_query("UPDATE users SET notification = 'a_open$usernameone a_closed$usernameone a_slashbought you a weapon silencer.', notify = (notify + 1) WHERE ID = '$theuserid'");
                            $insertsentsql = "INSERT INTO itemsbought(username,amount,sent,ip) VALUES ('$gangsterusername','a weapon silencer','$theuserusername','$userip')";
                            $insertsentresult = mysql_query($insertsentsql);

                            $showoutcome++; $outcome = "You bought a <span style=\"color: #FFC753;\"><b>weapon silencer</b></span> for $theuserusername!";}}
                    elseif($_POST['udo']==10){
                        if($points < 35){$showoutcome++; $outcome = "You dont have enough points!";}
                        else{
                            mysql_query("UPDATE users SET points = (points - 35) WHERE ID = '$ida' AND points >= '35'");
                            if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 5.</font>');}
                            mysql_query("UPDATE users SET ptsspent = (ptsspent + 35) WHERE ID = '$ida'");
                            mysql_query("UPDATE users SET bullets = (bullets + 1000) WHERE ID = '$theuserid'");
                            mysql_query("UPDATE users SET notification = 'a_open$usernameone a_closed$usernameone a_slashbought you a 1,000 bullets.', notify = (notify + 1) WHERE ID = '$theuserid'");
                            $insertsentsql = "INSERT INTO itemsbought(username,amount,sent,ip) VALUES ('$gangsterusername','1,000 bullets','$theuserusername','$userip')";
                            $insertsentresult = mysql_query($insertsentsql);

                            $showoutcome++; $outcome .= "You received 1,000 bullets!<br/>";}}

                    elseif($_POST['udo']==11){
                        if($points < 160){$showoutcome++; $outcome = "You dont have enough points!";}
                        else{
                            mysql_query("UPDATE users SET points = (points - 160) WHERE ID = '$ida' AND points >= '160'");
                            if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 6.</font>');}
                            mysql_query("UPDATE users SET ptsspent = (ptsspent + 160) WHERE ID = '$ida'");
                            mysql_query("UPDATE users SET bullets = (bullets + 5000) WHERE ID = '$theuserid'");
                            mysql_query("UPDATE users SET notification = 'a_open$usernameone a_closed$usernameone a_slashbought you a 5,000 bullets.', notify = (notify + 1) WHERE ID = '$theuserid'");
                            $insertsentsql = "INSERT INTO itemsbought(username,amount,sent,ip) VALUES ('$gangsterusername','5,000 bullets','$theuserusername','$userip')";
                            $insertsentresult = mysql_query($insertsentsql);

                            $showoutcome++; $outcome .= "You received 5,000 bullets!<br/>";}}

                    elseif($_POST['udo']==12){
                        if($points < 310){$showoutcome++; $outcome = "You dont have enough points!";}
                        else{
                            mysql_query("UPDATE users SET points = (points - 310) WHERE ID = '$ida' AND points >= '310'");
                            if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 7.</font>');}
                            mysql_query("UPDATE users SET ptsspent = (ptsspent + 310) WHERE ID = '$ida'");
                            mysql_query("UPDATE users SET bullets = (bullets + 10000) WHERE ID = '$theuserid'");
                            mysql_query("UPDATE users SET notification = 'a_open$usernameone a_closed$usernameone a_slashbought you a 10,000 bullets.', notify = (notify + 1) WHERE ID = '$theuserid'");
                            $insertsentsql = "INSERT INTO itemsbought(username,amount,sent,ip) VALUES ('$gangsterusername','10,000 bullets','$theuserusername','$userip')";
                            $insertsentresult = mysql_query($insertsentsql);

                            $showoutcome++; $outcome .= "You received 10,000 bullets!<br/>";}}

                    elseif($_POST['udo']==13){
                        if($points < '15'){$showoutcome++; $outcome = "You dont have enough points!";}
                        else{
                            mysql_query("UPDATE users SET points = (points - 15) WHERE ID = '$ida' AND points >= '15'");
                            if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 14.</font>');}
                            mysql_query("UPDATE users SET ptsspent = (ptsspent + 15) WHERE ID = '$ida'");
                            if(($h + 5) >= (100)){
                                mysql_query("UPDATE users SET health = '100' WHERE ID = '$theuserid'");}else{mysql_query("UPDATE users SET health = (health + 5) WHERE ID = '$theuserid'");}
                            mysql_query("UPDATE users SET notification = 'a_open$usernameone a_closed$usernameone a_slashbought you a 5% health.', notify = (notify + 1) WHERE ID = '$theuserid'");
                            $insertsentsql = "INSERT INTO itemsbought(username,amount,sent,ip) VALUES ('$gangsterusername','5% health','$theuserusername','$userip')";
                            $insertsentresult = mysql_query($insertsentsql);

                            $showoutcome++; $outcome .= "You received 5% health!<br/>";}}

                    elseif($_POST['udo']==14){
                        if($points < '30'){$showoutcome++; $outcome = "You dont have enough points!";}
                        else{
                            mysql_query("UPDATE users SET points = (points - 30) WHERE ID = '$ida' AND points >= '30'");
                            if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 15.</font>');}
                            mysql_query("UPDATE users SET ptsspent = (ptsspent + 30) WHERE ID = '$ida'");
                            if(($h + 15) >= (100)){
                                mysql_query("UPDATE users SET health = '100' WHERE ID = '$theuserid'");}else{mysql_query("UPDATE users SET health = (health + 15) WHERE ID = '$theuserid'");}
                            mysql_query("UPDATE users SET notification = 'a_open$usernameone a_closed$usernameone a_slashbought you a 15% health.', notify = (notify + 1) WHERE ID = '$theuserid'");
                            $insertsentsql = "INSERT INTO itemsbought(username,amount,sent,ip) VALUES ('$gangsterusername','15% health','$theuserusername','$userip')";
                            $insertsentresult = mysql_query($insertsentsql);

                            $showoutcome++; $outcome .= "You received 15% health!<br/>";}}

                    elseif($_POST['udo']==15){
                        if($points < '45'){$showoutcome++; $outcome = "You dont have enough points!";}
                        else{
                            mysql_query("UPDATE users SET points = (points - 45) WHERE ID = '$ida' AND points >= '45'");
                            if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 16.</font>');}
                            mysql_query("UPDATE users SET ptsspent = (ptsspent + 45) WHERE ID = '$ida'");
                            if(($h + 25) >= (100)){
                                mysql_query("UPDATE users SET health = '100' WHERE ID = '$theuserid'");}else{mysql_query("UPDATE users SET health = (health + 25) WHERE ID = '$theuserid'");}
                            mysql_query("UPDATE users SET notification = 'a_open$usernameone a_closed$usernameone a_slashbought you a 25% health.', notify = (notify + 1) WHERE ID = '$theuserid'");
                            $insertsentsql = "INSERT INTO itemsbought(username,amount,sent,ip) VALUES ('$gangsterusername','25% health','$theuserusername','$userip')";
                            $insertsentresult = mysql_query($insertsentsql);

                            $showoutcome++; $outcome .= "You received 25% health!<br/>";}}

                }}


            $spots = mysql_query("SELECT * FROM bodyguards WHERE guarding = '$gangsterusername'");
            $spotsrows = mysql_num_rows($spots);

            $accepteda = mysql_query("SELECT * FROM bodyguards WHERE username = '$gangsterusername' AND status = '2'");
            $accepted = mysql_num_rows($accepteda);


            $aspots = mysql_query("SELECT * FROM bodyguards WHERE username = '$gangsterusername'");
            $aspotsrows = mysql_num_rows($aspots);

            $notverified = mysql_num_rows(mysql_query("SELECT * FROM users WHERE username = '$usernameone' AND verify = 'verified'"));

            if($spotsrows != '0'){
                if(isset($_POST['doinvite'])){
					$invite = $_POST['invite'];
                    if($accepted != '0'){
                        $showoutcome++; $outcome = '<font color=white face=verdana size=1>Error, you are already a bodyguard for someone';
                    }
                    $spotcheck = mysql_query("SELECT * FROM bodyguards WHERE guarding = '$gangsterusername' AND id = '$spotid' AND status = '0'");
                    $spotcheckrows = mysql_num_rows($spotcheck);
                    $userexist = mysql_num_rows(mysql_query("SELECT * FROM users WHERE username = '$invite'"));
                    if($spotcheckrows == '0'){die(' ');}
                    elseif($userexist == '0'){
                        $showoutcome++; $outcome = "<font color=white face=verdana size=1>User does not exist</font>";
                    }
                    elseif($invite == $gangsterusername){
                        $showoutcome++; $outcome = "<font color=white face=verdana size=1>You cannot invite yourself</font>";
                    }
                    else{
                        $infoey = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE username = '$invite'"));
                        $getbgranklid = $infoey['rankid'];
                        $getbgida = $infoey['ID'];
                        $exit=false;
                        if($getbgranklid < '6'){
                            $showoutcome++;
                            $outcome='<font color=red face=verdana size=1>ERROR:</font> The minimum bodyguard raink is  <b>Respected Crafter</b>';
                            $exit=true;
                        }
                        if(!$exit){
                            mysql_query("UPDATE bodyguards SET username = '$invite',status = '1' WHERE id = '$spotid'");

                            mysql_query("UPDATE users SET notify = '1',notification = 'a_open$usernameone a_closed$usernameone a_slashhas has invited you to become their bodyguard.' WHERE ID = '$getbgida'");

                            $showoutcome++; $outcome = "You invited ".$invite." to be your bodyguard!";
                        }
                        }}
                elseif(isset($_POST['cancel'])){
                    if($accepted != '0'){
                        $showoutcome++; $outcome = "<font color=white face=verdana size=1>Error, you are already a bodyguard for someone</font>";
                    }
                    $spotcheck = mysql_query("SELECT * FROM bodyguards WHERE guarding = '$gangsterusername' AND id = '$spotid' AND status = '1'");
                    $spotcheckrows = mysql_num_rows($spotcheck);

                    if($spotcheckrows == '0'){die('');}
                    else{mysql_query("UPDATE bodyguards SET username = ' ',status = '0' WHERE id = '$spotid'");mysql_query("UPDATE bodyguards SET robot = '0' WHERE id = '$spotid'");
                        $showoutcome++; $outcome = "Invite cancelled!";}}

                elseif(isset($_POST['drop'])){
                    if($accepted != '0'){
                        $showoutcome++; $outcome = "<font color=white face=verdana size=1>Error, you are already a bodyguard for someone</font>";
                    }
                    $spotcheck = mysql_query("SELECT * FROM bodyguards WHERE guarding = '$gangsterusername' AND id = '$spotid' AND status = '2'");
                    $spotcheckrows = mysql_num_rows($spotcheck);

                    if($spotcheckrows == '0'){die('');}
                    elseif($bgtimer > $time){
                        $tym = time();


                        $timeleft = $bgtimer - $time;
                        $totalh = $timeleft / 3600;
                        $totalh = floor($totalh);
                        if($totalh < '10'){ $leading = 0;}else{$leading = "";}



                        ?><font color=white face=verdana size=1>You can only drop a bodyguard every 6 hours<br><?
                        if($timeleft < '0'){echo"00:00:00";}else{echo "Time remaining before you can drop another bodyguard: "; "$leading";echo "$totalh"; echo date( ":i:s", $bgtimer - $tym);}?>

                        </font><?}
                    else{mysql_query("UPDATE bodyguards SET robot = '0' WHERE id = '$spotid'");
                        mysql_query("UPDATE bodyguards SET username = ' ',status = '0' WHERE id = '$spotid'");
                        $showoutcome++; $outcome = "Bodyguard dropped!";}}
            }

            elseif($aspotsrows != '0'){
                if(isset($_POST['accept'])){
                    if($rank >= '25'){die('<font color=white face=verdana size=1>Error</font>');}
                    elseif($accepted != '0'){
                        $showoutcome++; $outcome = "<font color=white face=verdana size=1>Error, you are already a bodyguard for someone</font>";
                    }
                    elseif($notverified != '1'){
                        $showoutcome++; $outcome = "<font color=white face=verdana size=1>You must be verified to accept this invite</font>";
                    }
                    $spotcheck = mysql_query("SELECT * FROM bodyguards WHERE username = '$gangsterusername' AND id = '$spotid' AND status = '1'");
                    $spotcheckrows = mysql_num_rows($spotcheck);
                    $bspots = mysql_query("SELECT * FROM bodyguards WHERE username = '$gangsterusername' AND status = '2'");
                    $bspotsrows = mysql_num_rows($bspots);
                    if($spotcheckrows == '0'){die('');}
                    elseif($bspotsrows > '0'){die('');}
                    else{mysql_query("UPDATE usersonline SET q = '1' WHERE id = '$ida'");
                        mysql_query("UPDATE bodyguards SET status = '2' WHERE id = '$spotid'");
                        mysql_query("UPDATE bodyguards SET status = '0' WHERE guarding = '$gangsterusername'");
                        $needed = mysql_num_rows(mysql_query("SELECT * FROM protection WHERE username = '$usernameone'"));
                        if($needed >= 1){ mysql_query("DELETE FROM protection WHERE username = '$usernameone'");
                            mysql_query("UPDATE users SET notification = 'Your protection has been removed!', notify = (notify + 1) WHERE ID = '$ida'"); }
                        $showoutcome++; $outcome = "You accepted the invite!";}}
                if(isset($_POST['decline'])){
					mysql_query("UPDATE bodyguards SET status = '0', username = '' WHERE id = '$spotid'");
					$showoutcome++; $outcome = "You declined the invite!";
				}
            }
            $countbgs = mysql_num_rows(mysql_query("SELECT guarding FROM bodyguards WHERE guarding = '$gangsterusername'"));
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
                                Points
                            </div>
                            <div style="padding: 5px; margin: auto; text-align: center; color: #fefefe;">
                                <div style="margin: auto; padding-top: 16px; padding-bottom: 6px; text-align: center;">
                                    <table width="100%">
                                        <tbody><tr>
                                            <td style="width: 50%; padding: 30px; padding-top: 25px; padding-right: 0; vertical-align: top;" valign="top" align="center">
                                                <form method="post">
                                                    <div style="font-size:12px; text-align: center;">Points Spent: <b style="color: silver;"><?php echo number_format($spentpts);?></b></div><b style="color: silver;"><br/>
                                                    <table class="regTable" style="margin-left: 10px; margin-right: 0; min-width: 230px; width: 85%; max-width: 350px;" cellspacing="0" cellpadding="0" align="center">
                                                        <tbody><tr>
                                                            <td class="header" colspan="3">
                                                                Spend Points
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="subHeader" colspan="2" style="border-left: 0; padding-left: 10px; padding-right: 15px; width: 80%;">Item</td>
                                                            <td class="subHeader" style="width: 20%;padding-left: 10px; padding-right: 15px; ">Price</td>
                                                        </tr>
                                                        <form method="post">
                                                            <input type=hidden name=cheki value=<? $pime = time(); $chei = floor($pime/45); echo"$chei"; ?>>

                                                        <tr>
                                                            <td class="col noTop" style="width: 1%;"><input name="do" id="option1" value="1" type="radio"></td>
                                                            <td class="col noTop" style="padding-top: 0; padding-bottom: 0;"><label for="option1" style="display: block; width: 100%; padding-top: 7px; padding-bottom: 7px; padding-right: 3px;">1 day anti-steal protection</label></td>
                                                            <td class="col noTop" style="padding-right: 15px;">25</td>

                                                        </tr><tr>
                                                            <td class="col " style="width: 1%;"><input name="do" id="option2" value="2" type="radio"></td>
                                                            <td class="col " style="padding-top: 0; padding-bottom: 0;"><label for="option2" style="display: block; width: 100%; padding-top: 7px; padding-bottom: 7px; padding-right: 3px;">1 week anti-steal protection</label></td>
                                                            <td class="col " style="padding-right: 15px;">100</td>

                                                        </tr><tr>
                                                            <td class="col " style="width: 1%;"><input name="do" id="option3" value="3" type="radio"></td>
                                                            <td class="col " style="padding-top: 0; padding-bottom: 0;"><label for="option3" style="display: block; width: 100%; padding-top: 7px; padding-bottom: 7px; padding-right: 3px;">Reduce OC Timer (<i style="color: #eeeeee;"><b>8 hours</b></i>)</label></td>
                                                            <td class="col " style="padding-right: 15px;">100</td>

                                                        </tr><tr>
                                                            <td class="col " style="width: 1%;"><input name="do" id="option3_1" value="3.1" type="radio"></td>
                                                            <td class="col " style="padding-top: 0; padding-bottom: 0;"><label for="option3_1" style="display: block; width: 100%; padding-top: 7px; padding-bottom: 7px; padding-right: 3px;">Reset OC Timer (<i style="color: #eeeeee;"><b>16 hours</b></i>)</label></td>
                                                            <td class="col " style="padding-right: 15px;">250</td>

                                                        </tr><tr>
                                                            <td class="col " style="width: 1%;"><input name="do" id="option4" value="4" type="radio"></td>
                                                            <td class="col " style="padding-top: 0; padding-bottom: 0;"><label for="option4" style="display: block; width: 100%; padding-top: 7px; padding-bottom: 7px; padding-right: 3px;">Precise Rankbar</label></td>
                                                            <td class="col " style="padding-right: 15px;">100</td>

                                                        </tr><tr>
                                                            <td class="col " style="width: 1%;"><input name="do" id="option5" value="26" type="radio"></td>
                                                            <td class="col " style="padding-top: 0; padding-bottom: 0;"><label for="option5" style="display: block; width: 100%; padding-top: 7px; padding-bottom: 7px; padding-right: 3px;">Hold x1.5 extra shares</label></td>
                                                            <td class="col " style="padding-right: 15px;">500</td>

                                                        </tr><tr>
                                                            <td class="col " style="width: 1%;"><input name="do" id="option6" value="5" type="radio"></td>
                                                            <td class="col " style="padding-top: 0; padding-bottom: 0;"><label for="option6" style="display: block; width: 100%; padding-top: 7px; padding-bottom: 7px; padding-right: 3px;">Create custom car</label></td>
                                                            <td class="col " style="padding-right: 15px;">100</td>

                                                        </tr><tr>
                                                            <td class="col " style="width: 1%;"><input name="do" id="option7" value="16" type="radio"></td>
                                                            <td class="col " style="padding-top: 0; padding-bottom: 0;"><label for="option7" style="display: block; width: 100%; padding-top: 7px; padding-bottom: 7px; padding-right: 3px;">Beretta M501 (<i style="color: #eeeeee;"><b>Assault Rifle</b></i>)</label></td>
                                                            <td class="col " style="padding-right: 15px;">100</td>

                                                        </tr><tr>
                                                            <td class="col " style="width: 1%;"><input name="do" id="option8" value="17" type="radio"></td>
                                                            <td class="col " style="padding-top: 0; padding-bottom: 0;"><label for="option8" style="display: block; width: 100%; padding-top: 7px; padding-bottom: 7px; padding-right: 3px;">Medium SWAT Vest</label></td>
                                                            <td class="col " style="padding-right: 15px;">100</td>

                                                        </tr><tr>
                                                            <td class="col " style="width: 1%;"><input name="do" id="option9" value="18" type="radio"></td>
                                                            <td class="col " style="padding-top: 0; padding-bottom: 0;"><label for="option9" style="display: block; width: 100%; padding-top: 7px; padding-bottom: 7px; padding-right: 3px;">Heavy SWAT Vest</label></td>
                                                            <td class="col " style="padding-right: 15px;">175</td>

                                                        </tr><tr>
                                                            <td class="col " style="width: 1%;"><input name="do" id="option10" value="19" type="radio"></td>
                                                            <td class="col " style="padding-top: 0; padding-bottom: 0;"><label for="option10" style="display: block; width: 100%; padding-top: 7px; padding-bottom: 7px; padding-right: 3px;">Weapon Silencer</label></td>
                                                            <td class="col " style="padding-right: 15px;">100</td>

                                                        </tr><tr>
                                                            <td class="col " style="width: 1%;"><input name="do" id="option11" value="20" type="radio"></td>
                                                            <td class="col " style="padding-top: 0; padding-bottom: 0;"><label for="option11" style="display: block; width: 100%; padding-top: 7px; padding-bottom: 7px; padding-right: 3px;">1,000 Bullets</label></td>
                                                            <td class="col " style="padding-right: 15px;">35</td>

                                                        </tr><tr>
                                                            <td class="col " style="width: 1%;"><input name="do" id="option12" value="21" type="radio"></td>
                                                            <td class="col " style="padding-top: 0; padding-bottom: 0;"><label for="option12" style="display: block; width: 100%; padding-top: 7px; padding-bottom: 7px; padding-right: 3px;">5,000 Bullets</label></td>
                                                            <td class="col " style="padding-right: 15px;">160</td>

                                                        </tr><tr>
                                                            <td class="col " style="width: 1%;"><input name="do" id="option13" value="22" type="radio"></td>
                                                            <td class="col " style="padding-top: 0; padding-bottom: 0;"><label for="option13" style="display: block; width: 100%; padding-top: 7px; padding-bottom: 7px; padding-right: 3px;">10,000 Bullets</label></td>
                                                            <td class="col " style="padding-right: 15px;">310</td>

                                                        </tr><tr>
                                                                <td class="col " style="width: 1%;"><input name="do" id="option14" value="23" type="radio"></td>
                                                                <td class="col " style="padding-top: 0; padding-bottom: 0;"><label for="option14" style="display: block; width: 100%; padding-top: 7px; padding-bottom: 7px; padding-right: 3px;">5% Health</label></td>
                                                                <td class="col " style="padding-right: 15px;">15</td>

                                                            </tr><tr>
                                                                <td class="col " style="width: 1%;"><input name="do" id="option15" value="24" type="radio"></td>
                                                                <td class="col " style="padding-top: 0; padding-bottom: 0;"><label for="option15" style="display: block; width: 100%; padding-top: 7px; padding-bottom: 7px; padding-right: 3px;">15% Health</label></td>
                                                                <td class="col " style="padding-right: 15px;">30</td>

                                                            </tr><tr>
                                                                <td class="col " style="width: 1%;"><input name="do" id="option16" value="25" type="radio"></td>
                                                                <td class="col " style="padding-top: 0; padding-bottom: 0;"><label for="option16" style="display: block; width: 100%; padding-top: 7px; padding-bottom: 7px; padding-right: 3px;">25% Health</label></td>
                                                                <td class="col " style="padding-right: 15px;">45</td>

                                                            </tr><tr>
                                                                <td class="col " style="width: 1%;"><input name="do" id="option28" value="27" type="radio"></td>
                                                                <td class="col " style="padding-top: 0; padding-bottom: 0;"><label for="option28" style="display: block; width: 100%; padding-top: 7px; padding-bottom: 7px; padding-right: 3px;">Reset Shooting Timer</label></td>
                                                                <td class="col " style="padding-right: 15px;">100</td>

                                                            </tr>
                                                            <tr>
                                                                <td colspan="3" class="col" style="padding: 1px; padding-top: 0; background-color: #555555;"></td>
                                                            </tr>
															<?php for ($i = 0; $i < 3; $i++): ?>
																<?php 
																	if ($i == 0) {
																		$option_id = 17;
																		$value = 6;
																	}
																	if ($i == 1) {
																		$option_id = 19;
																		$value = 8;
																	}
																	if ($i == 2) {
																		$option_id = 21;
																		$value = 10;
																	}
																?>
																<?php if($count_human_bgs == $i):?>
																<tr>
																	<td class="col " style="width: 1%;"><input name="do" id="option<?=$option_id?>" value="<?=$value?>" type="radio"></td>
																	<td class="col " style="padding-top: 0; padding-bottom: 0;"><label for="option<?=$option_id?>" style="display: block; width: 100%; padding-top: 7px; padding-bottom: 7px; padding-right: 3px;">Bodyguard Spot <?=($i + 1)?> (<i style="color: #eeeeee;"><b>Regular</b></i>)</label></td>
																	<td class="col " style="padding-right: 15px;"><?=($i + 1) * 100?></td>
																</tr>
																<?php endif; ?>
															<?php endfor; ?>
															<?php for ($j = 0; $j < 2; $j++): ?>
																<?php 
																	if ($j == 0) {
																		$option_id = 18;
																		$value = 7;
																	}
																	if ($j == 1) {
																		$option_id = 20;
																		$value = 9;
																	}
																?>
																<?php if($count_robot_bgs == $j):?>
																<tr>
																	<td class="col " style="width: 1%;"><input name="do" id="option<?=$option_id?>" value="<?=$value?>" type="radio"></td>
																	<td class="col " style="padding-top: 0; padding-bottom: 0;"><label for="option<?=$option_id?>" style="display: block; width: 100%; padding-top: 7px; padding-bottom: 7px; padding-right: 3px;">Bodyguard Spot <?=($j + 1)?> (<i style="color: #eeeeee;"><b>Robot</b></i>)</label></td>
																	<td class="col " style="padding-right: 15px;"><?=(($j + 1) * 100) + 150?></td>
																</tr>
																<?php endif; ?>
															<?php endfor; ?>
                                                            <?php /*if($count_human_bgs=='0'):?>
                                                            <tr>
                                                                <td class="col " style="width: 1%;"><input name="do" id="option17" value="6" type="radio"></td>
                                                                <td class="col " style="padding-top: 0; padding-bottom: 0;"><label for="option17" style="display: block; width: 100%; padding-top: 7px; padding-bottom: 7px; padding-right: 3px;">Bodyguard Spot 1 (<i style="color: #eeeeee;"><b>Regular</b></i>)</label></td>
                                                                <td class="col " style="padding-right: 15px;">100</td>
                                                            </tr>
															<?php endif; ?>
                                                            <?php if($count_robot_bgs=='0'):?>
															<tr>
                                                                <td class="col " style="width: 1%;"><input name="do" id="option18" value="7" type="radio"></td>
                                                                <td class="col " style="padding-top: 0; padding-bottom: 0;"><label for="option18" style="display: block; width: 100%; padding-top: 7px; padding-bottom: 7px; padding-right: 3px;">Bodyguard Spot 1 (<i style="color: #eeeeee;"><b>Robot</b></i>)</label></td>
                                                                <td class="col " style="padding-right: 15px;">250</td>

                                                            </tr>
															<?php endif; ?>
                                                            <?php if($count_human_bgs=='1'):?>
                                                            <tr>
                                                                <td class="col " style="width: 1%;"><input name="do" id="option19" value="8" type="radio"></td>
                                                                <td class="col " style="padding-top: 0; padding-bottom: 0;"><label for="option19" style="display: block; width: 100%; padding-top: 7px; padding-bottom: 7px; padding-right: 3px;">Bodyguard Spot 2 (<i style="color: #eeeeee;"><b>Regular</b></i>)</label></td>
                                                                <td class="col " style="padding-right: 15px;">200</td>

                                                            </tr>
															<?php endif; ?>
                                                            <?php if($count_robot_bgs=='1'):?>
															<tr>
                                                                <td class="col " style="width: 1%;"><input name="do" id="option20" value="9" type="radio"></td>
                                                                <td class="col " style="padding-top: 0; padding-bottom: 0;"><label for="option20" style="display: block; width: 100%; padding-top: 7px; padding-bottom: 7px; padding-right: 3px;">Bodyguard Spot 2 (<i style="color: #eeeeee;"><b>Robot</b></i>)</label></td>
                                                                <td class="col " style="padding-right: 15px;">350</td>

                                                            </tr>
															<?php endif; ?>
                                                            <?php if($count_human_bgs=='2'):?>
                                                            <tr>
                                                                <td class="col " style="width: 1%;"><input name="do" id="option21" value="10" type="radio"></td>
                                                                <td class="col " style="padding-top: 0; padding-bottom: 0;"><label for="option21" style="display: block; width: 100%; padding-top: 7px; padding-bottom: 7px; padding-right: 3px;">Bodyguard Spot 3 (<i style="color: #eeeeee;"><b>Regular</b></i>)</label></td>
                                                                <td class="col " style="padding-right: 15px;">300</td>

                                                            </tr>
															<?php endif;*/ ?>
															<!--
															<tr>
                                                                <td class="col " style="width: 1%;"><input name="do" id="option22" value="11" type="radio"></td>
                                                                <td class="col " style="padding-top: 0; padding-bottom: 0;"><label for="option22" style="display: block; width: 100%; padding-top: 7px; padding-bottom: 7px; padding-right: 3px;">Bodyguard Spot 3 (<i style="color: #eeeeee;"><b>Robot</b></i>)</label></td>
                                                                <td class="col " style="padding-right: 15px;">450</td>

                                                            </tr>
															-->
                                                            <?/*} if($countbgs=='3'){?>
                                                            <tr>
                                                                <td class="col " style="width: 1%;"><input name="do" id="option23" value="12" type="radio"></td>
                                                                <td class="col " style="padding-top: 0; padding-bottom: 0;"><label for="option23" style="display: block; width: 100%; padding-top: 7px; padding-bottom: 7px; padding-right: 3px;">Bodyguard Spot 4 (<i style="color: #eeeeee;"><b>Regular</b></i>)</label></td>
                                                                <td class="col " style="padding-right: 15px;">400</td>

                                                            </tr><tr>
                                                                <td class="col " style="width: 1%;"><input name="do" id="option24" value="13" type="radio"></td>
                                                                <td class="col " style="padding-top: 0; padding-bottom: 0;"><label for="option24" style="display: block; width: 100%; padding-top: 7px; padding-bottom: 7px; padding-right: 3px;">Bodyguard Spot 4 (<i style="color: #eeeeee;"><b>Robot</b></i>)</label></td>
                                                                <td class="col " style="padding-right: 15px;">550</td>

                                                            </tr>
                                                            <?} if($countbgs=='4'){?>
                                                                <tr>
                                                                    <td class="col " style="width: 1%;"><input name="do" id="option25" value="14" type="radio"></td>
                                                                    <td class="col " style="padding-top: 0; padding-bottom: 0;"><label for="option25" style="display: block; width: 100%; padding-top: 7px; padding-bottom: 7px; padding-right: 3px;">Bodyguard Spot 5 (<i style="color: #eeeeee;"><b>Regular</b></i>)</label></td>
                                                                    <td class="col " style="padding-right: 15px;">400</td>

                                                                </tr><tr>
                                                                    <td class="col " style="width: 1%;"><input name="do" id="option26" value="15" type="radio"></td>
                                                                    <td class="col " style="padding-top: 0; padding-bottom: 0;"><label for="option26" style="display: block; width: 100%; padding-top: 7px; padding-bottom: 7px; padding-right: 3px;">Bodyguard Spot 5 (<i style="color: #eeeeee;"><b>Robot</b></i>)</label></td>
                                                                    <td class="col " style="padding-right: 15px;">550</td>

                                                                </tr>
                                                            <?}*/?>
                                                            <tr>
                                                            <td colspan="3"><input id="bank_deposit_amount" maxlength="20" name="bank_deposit_amount" class="textarea" style="border-left: 0; width: 100%;" value="Submit!" type="submit"></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </form>
                                                <div class="break" style="padding-top: 27px;"></div>
                                                <div class="spacer"></div>
                                                <div class="break" style="padding-top: 23px;"></div>
                                                <table class="regTable" style="margin-left: 10px; margin-right: 0; min-width: 230px; margin-bottom: 5px; width: 85%; max-width: 350px;" cellspacing="0" cellpadding="0" align="center">
                                                    <tbody>
                                                    <tr>
                                                        <td class="header" colspan="6">
                                                            <b>Bodyguard Information</b>
                                                        </td>
                                                    </tr>
                                                    <?
                                                    $spots = mysql_query("SELECT * FROM bodyguards WHERE guarding = '$gangsterusername' ORDER BY id ASC");
                                                    $spotsrows = mysql_num_rows($spots);
                                                    ?>
                                                    <tr>
                                                        <td class="subHeader" colspan="2" style="border-left: 0; padding-left: 10px; padding-right: 15px; width: 50%;">Bodyguard</td>
                                                        <td class="subHeader" style="text-align: center; width: 25%;padding-left: 10px; padding-right: 10px; ">Status</td>
                                                        <td class="subHeader" colspan="2" style="text-align: center; width: 25%;padding-left: 10px; padding-right: 10px; ">Action</td>
                                                    </tr>
													<?
                                                    if($spotsrows >= 1){
                                                        $accepteda = mysql_query("SELECT * FROM bodyguards WHERE username = '$gangsterusername' AND status = '2' ORDER BY id ASC");
                                                        $accepted = mysql_num_rows($accepteda);
                                                        if($accepted == '0'){
                                                            if($spotsrows != '0'){
                                                                $cont=0;
                                                                while($spotsarray = mysql_fetch_array($spots)){
                                                                    $cont++;
                                                                    $spotid = $spotsarray['id'];
                                                                    $status = $spotsarray['status'];
                                                                    $invited = $spotsarray['username'];
                                                                    if($status == '0'){
                                                                        if($cont==1){
                                                                            echo"<form action=points.php method=post>
                                                                                       <tr>
                                                                                            <td class=\"col noTop\" style=\"width:1%; color: #666666;\">#$cont</td>
                                                                                            <td class=\"col noTop\" style=\"padding: 1px; padding-left: 1px; padding-bottom: 1px; padding-right: 2px;\"><input name=\"invite\" class=\"textarea\" style=\"width: 100%;\" placeholder=\"Invite user...\" type=\"text\"></td>
                                                                                            <td class=\"col noTop\" style=\"text-align: center; color: gray;\">-</td>
                                                                                            <td class=\"col noTop\" style=\"padding-left: 1px; padding: 2px;\"><input type=hidden value=$spotid name=spotid><input name=\"doinvite\" class=\"textarea\" style=\"width: 100%;\" value=\"Invite\" type=\"submit\"></td>
                                                                                            </tr>
                                                                                    </form>";
                                                                        }else{
                                                                            echo"<form action=points.php method=post>
                                                                                       <tr>
                                                                                            <td class=\"col \" style=\"width:1%; color: #666666;\">#$cont</td>
                                                                                            <td class=\"col \" style=\"padding: 1px; padding-left: 1px; padding-bottom: 1px; padding-right: 2px;\"><input name=\"invite\" class=\"textarea\" style=\"width: 100%;\" placeholder=\"Invite user...\" type=\"text\"></td>
                                                                                            <td class=\"col \" style=\"text-align: center; color: gray;\">-</td>
                                                                                            <td class=\"col \" style=\"padding-left: 1px; padding: 2px;\"><input type=hidden value=$spotid name=spotid><input name=\"doinvite\" class=\"textarea\" style=\"width: 100%;\" value=\"Invite\" type=\"submit\"></td>
                                                                                            </tr>
                                                                                    </form>";
                                                                        }
                                                                    }
                                                                    elseif($status == '1'){
                                                                        if($cont==1){
                                                                            echo"<form action=points.php method=post>
                                                                                       <tr>
                                                                                            <td class=\"col noTop\" style=\"width:1%; color: #666666;\">#$cont</td>
                                                                                            <td class=\"col noTop\" style=\"padding: 1px; padding-left: 1px; padding-bottom: 1px; padding-right: 2px;\"><span><a href=viewprofile.php?username=$invited>$invited</a></span><input type=submit name=doall style=visibility:hidden;></td>
                                                                                            <td class=\"col noTop\" style=\"text-align: center; color: white;\"><span>Invited</span></td>
                                                                                            <td class=\"col noTop\" style=\"padding-left: 1px; padding: 2px;\"><input type=hidden value=$spotid name=spotid><input class='textarea' type=submit value=Cancel name=cancel style=\"width: 100%;\"></td>
                                                                                            </tr>
                                                                                    </form>";
                                                                        }else{
                                                                            echo"<form action=points.php method=post>
                                                                                       <tr>
                                                                                            <td class=\"col \" style=\"width:1%; color: #666666;\">#$cont</td>
                                                                                            <td class=\"col \" style=\"padding: 1px; padding-left: 1px; padding-bottom: 1px; padding-right: 2px;\"><span><a href=viewprofile.php?username=$invited>$invited</a></span><input type=submit name=doall style=visibility:hidden;></td>
                                                                                            <td class=\"col\" style=\"text-align: center; color: white;\"><span>Invited</span></td>
                                                                                            <td class=\"col \" style=\"padding-left: 1px; padding: 2px;\"><input type=hidden value=$spotid name=spotid><input class='textarea' type=submit value=Cancel name=cancel style=\"width: 100%;\"></td>
                                                                                            </tr>
                                                                                    </form>";
                                                                        }
                                                                    }
                                                                    elseif($status == '2'){
                                                                        if($cont==1){
                                                                            echo"<form action=points.php method=post>
                                                                                       <tr>
                                                                                            <td class=\"col noTop\" style=\"width:1%; color: #666666;\">#$cont</td>
                                                                                            <td class=\"col noTop\" style=\"padding: 1px; padding-left: 1px; padding-bottom: 1px; padding-right: 2px;\"><span><a href=viewprofile.php?username=$invited>$invited</a></span><input type=submit name=doall style=visibility:hidden;></td>
                                                                                            <td class=\"col noTop\" style=\"text-align: center; color: gray;\"><span style=\"color: #FFC753;\"><b>Accepted</b></span></td>
                                                                                            <td class=\"col noTop\" style=\"padding-left: 1px; padding: 2px;\"><input type=hidden value=$spotid name=spotid><input class='textarea' type=submit value=Drop name=drop style=\"width: 100%;\"></td>
                                                                                            </tr>
                                                                                    </form>";
                                                                        }else{
                                                                            echo"<form action=points.php method=post>
                                                                                       <tr>
                                                                                            <td class=\"col \" style=\"width:1%; color: #666666;\">#$cont</td>
                                                                                            <td class=\"col \" style=\"padding: 1px; padding-left: 1px; padding-bottom: 1px; padding-right: 2px;\"><span><a href=viewprofile.php?username=$invited>$invited</a></span><input type=submit name=doall style=visibility:hidden;></td>
                                                                                            <td class=\"col\" style=\"text-align: center; color: gray;\"><span style=\"color: #FFC753;\"><b>Accepted</b></span></td>
                                                                                            <td class=\"col \" style=\"padding-left: 1px; padding: 2px;\" ><input type=hidden value=$spotid name=spotid><input class='textarea' type=submit value=Drop name=drop style=\"width: 100%;\"></td>
                                                                                            </tr>
                                                                                    </form>";
                                                                        }
                                                                    }
                                                                }
															}
														}
													}

                                                    /*
													if($aspotsrows != '0'){
                                                        $cont=0;
                                                        while($aspotsarray = mysql_fetch_array($aspots)){
                                                            $cont++;
                                                            $spotid = $aspotsarray['id'];
                                                            $status = $aspotsarray['status'];
                                                            $invited = $aspotsarray['guarding'];
                                                            if($status == '1'){
                                                                if($cont==1){
                                                                    echo"<form action=points.php method=post>
                                                                                       <tr>
                                                                                            <td class=\"col noTop\" style=\"width:1%; color: #666666;\">#$cont</td>
                                                                                            <td class=\"col noTop\" style=\"padding: 1px; padding-left: 1px; padding-bottom: 1px; padding-right: 2px;\"><a href=viewprofile.php?username=$invited>&nbsp;$invited</a> has invited you to become his bodyguard</td>
                                                                                            <td class=\"col noTop\" style=\"text-align: center; color: gray;\">-</td>
                                                                                            <td class=\"col noTop\" style=\"padding-left: 1px; padding: 2px;\" ><input type=hidden value=$spotid name=spotid><input class='textarea' type=submit value=Accept name=accept style=\"width: 100%;\"></td>
                                                                                            <td class=\"col noTop\" style=\"padding-left: 1px; padding: 2px;\" ><input type=hidden value=$spotid name=spotid><input class='textarea' type=submit value=Decline name=decline style=\"width: 100%;\"></td>
                                                                                            </tr>
                                                                                    </form>";
                                                                }else{
                                                                    echo"<form action=points.php method=post>
                                                                                       <tr>
                                                                                            <td class=\"col \" style=\"width:1%; color: #666666;\">#$cont</td>
                                                                                            <td class=\"col \" style=\"padding: 1px; padding-left: 1px; padding-bottom: 1px; padding-right: 2px;\"><a href=viewprofile.php?username=$invited>&nbsp;$invited</a> has invited you to become his bodyguard</td>
                                                                                            <td class=\"col noTop\" style=\"text-align: center; color: gray;\">-</td>
                                                                                            <td class=\"col \" style=\"padding-left: 1px; padding: 2px;\"><input type=hidden value=$spotid name=spotid><input class='textarea' type=submit value=Accept name=accept style=\"width: 100%;\"></td>
                                                                                            <td class=\"col \" style=\"padding-left: 1px; padding: 2px;\" ><input type=hidden value=$spotid name=spotid><input class='textarea' type=submit value=Decline name=decline style=\"width: 100%;\"></td>
                                                                                            </tr>
                                                                                    </form>";
                                                                }
                                                            }
                                                            elseif($status == '2'){
                                                                if($cont==1){
                                                                    echo"<form action=points.php method=post>
                                                                                       <tr>
                                                                                            <td class=\"col noTop\" colspan='6' style=\"padding: 1px; padding-left: 1px; padding-bottom: 1px; padding-right: 2px;\">You are a bodyguard for  <a href=viewprofile.php?username=$invited>&nbsp;$invited</a></td>                                                                                          
                                                                                            </tr>
                                                                                    </form>";
                                                                }else{
                                                                    echo"<form action=points.php method=post>
                                                                                       <tr>
                                                                                            <td class=\"col \" colspan='6' style=\"padding: 1px; padding-left: 1px; padding-bottom: 1px; padding-right: 2px;\">You are a bodyguard for  <a href=viewprofile.php?username=$invited>&nbsp;$invited</a></td>                                                                                          
                                                                                            </tr>
                                                                                    </form>";
                                                                }
                                                            }
                                                        }
                                                    }*/
                                                    if($spotsrows == '0'){
                                                        echo"<tr>
																<td class=\"col noTop\" colspan=\"6\">You have no bodyguards</td>
															</tr>";
                                                    }
                                                    ?>
                                                    </tbody>
                                                </table>
                                                <table class="regTable" style="margin-left: 10px; margin-right: 0; min-width: 230px; margin-bottom: 5px; width: 85%; max-width: 350px;" cellspacing="0" cellpadding="0" align="center">
                                                    <tbody>
                                                    <tr>
                                                        <td class="header" colspan="6">
                                                            <b>Bodyguard Invite</b>
                                                        </td>
                                                    </tr>
                                                    <?
                                                    $aspots = mysql_query("SELECT * FROM bodyguards WHERE username = '$gangsterusername' ORDER BY id ASC");
                                                    $aspotsrows = mysql_num_rows($aspots);
													?>
                                                    <tr>
                                                        <td class="subHeader" style="border-left: 0; padding-left: 10px; padding-right: 15px; width: 50%;">Invited By</td>
                                                        <td class="subHeader" style="text-align: center; width: 25%;padding-left: 10px; padding-right: 10px; ">Status</td>
                                                        <td class="subHeader" colspan="2" style="text-align: center; width: 25%;padding-left: 10px; padding-right: 10px; ">Action</td>
                                                    </tr>
													<?
													/*
                                                    if($spotsrows >= 1 || $aspotsrows >= 1){
                                                        $accepteda = mysql_query("SELECT * FROM bodyguards WHERE username = '$gangsterusername' AND status = '2' ORDER BY id ASC");
                                                        $accepted = mysql_num_rows($accepteda);
                                                        if($accepted == '0'){
                                                            if($spotsrows != '0'){
                                                                $cont=0;
                                                                while($spotsarray = mysql_fetch_array($spots)){
                                                                    $cont++;
                                                                    $spotid = $spotsarray['id'];
                                                                    $status = $spotsarray['status'];
                                                                    $invited = $spotsarray['username'];
                                                                    if($status == '0'){
                                                                        if($cont==1){
                                                                            echo"<form action=points.php method=post>
                                                                                       <tr>
                                                                                            <td class=\"col noTop\" style=\"width:1%; color: #666666;\">#$cont</td>
                                                                                            <td class=\"col noTop\" style=\"padding: 1px; padding-left: 1px; padding-bottom: 1px; padding-right: 2px;\"><input name=\"invite\" class=\"textarea\" style=\"width: 100%;\" placeholder=\"Invite user...\" type=\"text\"></td>
                                                                                            <td class=\"col noTop\" style=\"text-align: center; color: gray;\">-</td>
                                                                                            <td class=\"col noTop\" style=\"padding-left: 1px; padding: 2px;\"><input type=hidden value=$spotid name=spotid><input name=\"doinvite\" class=\"textarea\" style=\"width: 100%;\" value=\"Invite\" type=\"submit\"></td>
                                                                                            </tr>
                                                                                    </form>";
                                                                        }else{
                                                                            echo"<form action=points.php method=post>
                                                                                       <tr>
                                                                                            <td class=\"col \" style=\"width:1%; color: #666666;\">#$cont</td>
                                                                                            <td class=\"col \" style=\"padding: 1px; padding-left: 1px; padding-bottom: 1px; padding-right: 2px;\"><input name=\"invite\" class=\"textarea\" style=\"width: 100%;\" placeholder=\"Invite user...\" type=\"text\"></td>
                                                                                            <td class=\"col \" style=\"text-align: center; color: gray;\">-</td>
                                                                                            <td class=\"col \" style=\"padding-left: 1px; padding: 2px;\"><input type=hidden value=$spotid name=spotid><input name=\"doinvite\" class=\"textarea\" style=\"width: 100%;\" value=\"Invite\" type=\"submit\"></td>
                                                                                            </tr>
                                                                                    </form>";
                                                                        }
                                                                    }
                                                                    elseif($status == '1'){
                                                                        if($cont==1){
                                                                            echo"<form action=points.php method=post>
                                                                                       <tr>
                                                                                            <td class=\"col noTop\" style=\"width:1%; color: #666666;\">#$cont</td>
                                                                                            <td class=\"col noTop\" style=\"padding: 1px; padding-left: 1px; padding-bottom: 1px; padding-right: 2px;\"><span><a href=viewprofile.php?username=$invited>$invited</a></span><input type=submit name=doall style=visibility:hidden;></td>
                                                                                            <td class=\"col noTop\" style=\"text-align: center; color: white;\"><span>Invited</span></td>
                                                                                            <td class=\"col noTop\" style=\"padding-left: 1px; padding: 2px;\"><input type=hidden value=$spotid name=spotid><input class='textarea' type=submit value=Cancel name=cancel style=\"width: 100%;\"></td>
                                                                                            </tr>
                                                                                    </form>";
                                                                        }else{
                                                                            echo"<form action=points.php method=post>
                                                                                       <tr>
                                                                                            <td class=\"col \" style=\"width:1%; color: #666666;\">#$cont</td>
                                                                                            <td class=\"col \" style=\"padding: 1px; padding-left: 1px; padding-bottom: 1px; padding-right: 2px;\"><span><a href=viewprofile.php?username=$invited>$invited</a></span><input type=submit name=doall style=visibility:hidden;></td>
                                                                                            <td class=\"col\" style=\"text-align: center; color: white;\"><span>Invited</span></td>
                                                                                            <td class=\"col \" style=\"padding-left: 1px; padding: 2px;\"><input type=hidden value=$spotid name=spotid><input class='textarea' type=submit value=Cancel name=cancel style=\"width: 100%;\"></td>
                                                                                            </tr>
                                                                                    </form>";
                                                                        }
                                                                    }
                                                                    elseif($status == '2'){
                                                                        if($cont==1){
                                                                            echo"<form action=points.php method=post>
                                                                                       <tr>
                                                                                            <td class=\"col noTop\" style=\"width:1%; color: #666666;\">#$cont</td>
                                                                                            <td class=\"col noTop\" style=\"padding: 1px; padding-left: 1px; padding-bottom: 1px; padding-right: 2px;\"><span><a href=viewprofile.php?username=$invited>$invited</a></span><input type=submit name=doall style=visibility:hidden;></td>
                                                                                            <td class=\"col noTop\" style=\"text-align: center; color: gray;\"><span style=\"color: #FFC753;\"><b>Acepted</b></span></td>
                                                                                            <td class=\"col noTop\" style=\"padding-left: 1px; padding: 2px;\"><input type=hidden value=$spotid name=spotid><input class='textarea' type=submit value=Drop name=drop style=\"width: 100%;\"></td>
                                                                                            </tr>
                                                                                    </form>";
                                                                        }else{
                                                                            echo"<form action=points.php method=post>
                                                                                       <tr>
                                                                                            <td class=\"col \" style=\"width:1%; color: #666666;\">#$cont</td>
                                                                                            <td class=\"col \" style=\"padding: 1px; padding-left: 1px; padding-bottom: 1px; padding-right: 2px;\"><span><a href=viewprofile.php?username=$invited>$invited</a></span><input type=submit name=doall style=visibility:hidden;></td>
                                                                                            <td class=\"col\" style=\"text-align: center; color: gray;\"><span style=\"color: #FFC753;\"><b>Acepted</b></span></td>
                                                                                            <td class=\"col \" style=\"padding-left: 1px; padding: 2px;\" ><input type=hidden value=$spotid name=spotid><input class='textarea' type=submit value=Drop name=drop style=\"width: 100%;\"></td>
                                                                                            </tr>
                                                                                    </form>";
                                                                        }
                                                                    }
                                                                }
															}
														}
													}
													*/

                                                    if($aspotsrows != '0'){
                                                        $cont=0;
                                                        while($aspotsarray = mysql_fetch_array($aspots)){
                                                            $cont++;
                                                            $spotid = $aspotsarray['id'];
                                                            $status = $aspotsarray['status'];
                                                            $invited = $aspotsarray['guarding'];
                                                            if($status == '1'){
                                                                if($cont==1){
                                                                    echo"<form action=points.php method=post>
                                                                                       <tr>
                                                                                            
                                                                                            <td class=\"col noTop\" style=\"padding: 1px; padding-left: 1px; padding-bottom: 1px; padding-right: 2px;\"><a href=viewprofile.php?username=$invited>&nbsp;$invited</a> has invited you to become his bodyguard</td>
                                                                                            <td class=\"col noTop\" style=\"text-align: center; color: gray;\">-</td>
                                                                                            <td class=\"col noTop\" style=\"padding-left: 1px; padding: 2px;\" ><input type=hidden value=$spotid name=spotid><input class='textarea' type=submit value=Accept name=accept style=\"width: 100%;\"></td>
                                                                                            <td class=\"col noTop\" style=\"padding-left: 1px; padding: 2px;\" ><input type=hidden value=$spotid name=spotid><input class='textarea' type=submit value=Decline name=decline style=\"width: 100%;\"></td>
                                                                                            </tr>
                                                                                    </form>";
                                                                }else{
                                                                    echo"<form action=points.php method=post>
                                                                                       <tr>
                                                                                            
                                                                                            <td class=\"col \" style=\"padding: 1px; padding-left: 1px; padding-bottom: 1px; padding-right: 2px;\"><a href=viewprofile.php?username=$invited>&nbsp;$invited</a> has invited you to become his bodyguard</td>
                                                                                            <td class=\"col noTop\" style=\"text-align: center; color: gray;\">-</td>
                                                                                            <td class=\"col \" style=\"padding-left: 1px; padding: 2px;\"><input type=hidden value=$spotid name=spotid><input class='textarea' type=submit value=Accept name=accept style=\"width: 100%;\"></td>
                                                                                            <td class=\"col \" style=\"padding-left: 1px; padding: 2px;\" ><input type=hidden value=$spotid name=spotid><input class='textarea' type=submit value=Decline name=decline style=\"width: 100%;\"></td>
                                                                                            </tr>
                                                                                    </form>";
                                                                }
                                                            }
                                                            elseif($status == '2'){
                                                                if($cont==1){
																	echo"<form action=points.php method=post>
																					   <tr>
																							
																							<td class=\"col noTop\" style=\"padding: 1px; padding-left: 9px; padding-bottom: 1px; padding-right: 2px;\"><span><a href=viewprofile.php?username=$invited>$invited</a></span><input type=submit name=doall style=visibility:hidden;></td>
																							<td class=\"col noTop\" style=\"text-align: center; color: gray;\"><span style=\"color: #FFC753;\"><b>Accepted</b></span></td>
																							<td class=\"col noTop\" style=\"padding-left: 1px; padding: 2px; text-align: center;\">-</td>
																							</tr>
																					</form>";
                                                                }else{
																	echo"<form action=points.php method=post>
																					   <tr>
																							
																							<td class=\"col \" style=\"padding: 1px; padding-left: 9px; padding-bottom: 1px; padding-right: 2px;\"><span><a href=viewprofile.php?username=$invited>$invited</a></span><input type=submit name=doall style=visibility:hidden;></td>
																							<td class=\"col \" style=\"text-align: center; color: gray;\"><span style=\"color: #FFC753;\"><b>Accepted</b></span></td>
																							<td class=\"col \" style=\"padding-left: 1px; padding: 2px; text-align: center;\">-</td>
																							</tr>
																					</form>";
                                                                }
                                                            }
                                                        }
                                                    }
                                                    if($aspotsrows == '0'){
                                                        echo"<tr>
																<td class=\"col noTop\" colspan=\"6\">You have no invites</td>
															</tr>";
                                                    }
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td style="padding: 30px; padding-top: 25px; vertical-align: top;" align="center">

                                                <form method="post" action="">
                                                    <table class="regTable" style="margin-left: 10px; margin-right: 0; min-width: 230px; width: 85%; max-width: 350px;" cellspacing="0" cellpadding="0" align="center">
                                                        <tbody><tr>
                                                            <td class="header" colspan="3">
                                                                Gifts
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="subHeader" colspan="2" style="border-left: 0; padding-left: 10px; padding-right: 15px; width: 80%;">Item</td>
                                                            <td class="subHeader" style="width: 20%;padding-left: 10px; padding-right: 15px; ">Price</td>
                                                        </tr>
                                                            <input type=hidden name=cheki value=<?php  $pime = time(); $chei = floor($pime/45); echo"$chei"; ?>>
                                                            <tr>
                                                                <td class="col noTop" style="width: 1%;"><input name="udo" id="option1" value="1" type="radio"></td>
                                                                <td class="col noTop" style="padding-top: 0; padding-bottom: 0;"><label for="option1" style="display: block; width: 100%; padding-top: 7px; padding-bottom: 7px; padding-right: 3px;">1 day anti-steal protection</label></td>
                                                                <td class="col noTop" style="padding-right: 15px;">25</td>

                                                            </tr><tr>
                                                                <td class="col " style="width: 1%;"><input name="udo" id="option2" value="2" type="radio"></td>
                                                                <td class="col " style="padding-top: 0; padding-bottom: 0;"><label for="option2" style="display: block; width: 100%; padding-top: 7px; padding-bottom: 7px; padding-right: 3px;">1 week anti-steal protection</label></td>
                                                                <td class="col " style="padding-right: 15px;">100</td>

                                                            </tr><tr>
                                                                <td class="col " style="width: 1%;"><input name="udo" id="option3" value="3" type="radio"></td>
                                                                <td class="col " style="padding-top: 0; padding-bottom: 0;"><label for="option3" style="display: block; width: 100%; padding-top: 7px; padding-bottom: 7px; padding-right: 3px;">Reduce OC Timer (<i style="color: #eeeeee;"><b>8 hours</b></i>)</label></td>
                                                                <td class="col " style="padding-right: 15px;">100</td>

                                                            </tr><tr>
                                                                <td class="col " style="width: 1%;"><input name="udo" id="option3_1" value="3.1" type="radio"></td>
                                                                <td class="col " style="padding-top: 0; padding-bottom: 0;"><label for="option3_1" style="display: block; width: 100%; padding-top: 7px; padding-bottom: 7px; padding-right: 3px;">Reset OC Timer (<i style="color: #eeeeee;"><b>16 hours</b></i>)</label></td>
                                                                <td class="col " style="padding-right: 15px;">250</td>

                                                            </tr><tr>
                                                                <td class="col " style="width: 1%;"><input name="udo" id="option4" value="4" type="radio"></td>
                                                                <td class="col " style="padding-top: 0; padding-bottom: 0;"><label for="option4" style="display: block; width: 100%; padding-top: 7px; padding-bottom: 7px; padding-right: 3px;">Precise Rankbar</label></td>
                                                                <td class="col " style="padding-right: 15px;">100</td>

                                                            </tr><tr>
                                                                <td class="col " style="width: 1%;"><input name="udo" id="option6" value="5" type="radio"></td>
                                                                <td class="col " style="padding-top: 0; padding-bottom: 0;"><label for="option6" style="display: block; width: 100%; padding-top: 7px; padding-bottom: 7px; padding-right: 3px;">Create custom car</label></td>
                                                                <td class="col " style="padding-right: 15px;">100</td>

                                                            </tr><tr>
                                                                <td class="col " style="width: 1%;"><input name="udo" id="option7" value="6" type="radio"></td>
                                                                <td class="col " style="padding-top: 0; padding-bottom: 0;"><label for="option7" style="display: block; width: 100%; padding-top: 7px; padding-bottom: 7px; padding-right: 3px;">Beretta M501 (<i style="color: #eeeeee;"><b>Assault Rifle</b></i>)</label></td>
                                                                <td class="col " style="padding-right: 15px;">100</td>

                                                            </tr><tr>
                                                                <td class="col " style="width: 1%;"><input name="udo" id="option8" value="7" type="radio"></td>
                                                                <td class="col " style="padding-top: 0; padding-bottom: 0;"><label for="option8" style="display: block; width: 100%; padding-top: 7px; padding-bottom: 7px; padding-right: 3px;">Medium SWAT Vest</label></td>
                                                                <td class="col " style="padding-right: 15px;">100</td>

                                                            </tr><tr>
                                                                <td class="col " style="width: 1%;"><input name="udo" id="option9" value="8" type="radio"></td>
                                                                <td class="col " style="padding-top: 0; padding-bottom: 0;"><label for="option9" style="display: block; width: 100%; padding-top: 7px; padding-bottom: 7px; padding-right: 3px;">Heavy SWAT Vest</label></td>
                                                                <td class="col " style="padding-right: 15px;">175</td>

                                                            </tr><tr>
                                                                <td class="col " style="width: 1%;"><input name="udo" id="option10" value="9" type="radio"></td>
                                                                <td class="col " style="padding-top: 0; padding-bottom: 0;"><label for="option10" style="display: block; width: 100%; padding-top: 7px; padding-bottom: 7px; padding-right: 3px;">Weapon Silencer</label></td>
                                                                <td class="col " style="padding-right: 15px;">100</td>

                                                            </tr><tr>
                                                            <td class="col " style="width: 1%;"><input name="udo" id="option11" value="10" type="radio"></td>
                                                            <td class="col " style="padding-top: 0; padding-bottom: 0;"><label for="option11" style="display: block; width: 100%; padding-top: 7px; padding-bottom: 7px; padding-right: 3px;">1,000 Bullets</label></td>
                                                            <td class="col " style="padding-right: 15px;">35</td>

                                                        </tr><tr>
                                                            <td class="col " style="width: 1%;"><input name="udo" id="option12" value="11" type="radio"></td>
                                                            <td class="col " style="padding-top: 0; padding-bottom: 0;"><label for="option12" style="display: block; width: 100%; padding-top: 7px; padding-bottom: 7px; padding-right: 3px;">5,000 Bullets</label></td>
                                                            <td class="col " style="padding-right: 15px;">160</td>

                                                        </tr><tr>
                                                            <td class="col " style="width: 1%;"><input name="udo" id="option13" value="12" type="radio"></td>
                                                            <td class="col " style="padding-top: 0; padding-bottom: 0;"><label for="option13" style="display: block; width: 100%; padding-top: 7px; padding-bottom: 7px; padding-right: 3px;">10,000 Bullets</label></td>
                                                            <td class="col " style="padding-right: 15px;">310</td>

                                                        </tr><tr>
                                                            <td class="col " style="width: 1%;"><input name="udo" id="option14" value="13" type="radio"></td>
                                                            <td class="col " style="padding-top: 0; padding-bottom: 0;"><label for="option14" style="display: block; width: 100%; padding-top: 7px; padding-bottom: 7px; padding-right: 3px;">5% Health</label></td>
                                                            <td class="col " style="padding-right: 15px;">15</td>

                                                        </tr><tr>
                                                            <td class="col " style="width: 1%;"><input name="udo" id="option15" value="14" type="radio"></td>
                                                            <td class="col " style="padding-top: 0; padding-bottom: 0;"><label for="option15" style="display: block; width: 100%; padding-top: 7px; padding-bottom: 7px; padding-right: 3px;">15% Health</label></td>
                                                            <td class="col " style="padding-right: 15px;">30</td>

                                                        </tr><tr>
                                                            <td class="col " style="width: 1%;"><input name="udo" id="option16" value="15" type="radio"></td>
                                                            <td class="col " style="padding-top: 0; padding-bottom: 0;"><label for="option16" style="display: block; width: 100%; padding-top: 7px; padding-bottom: 7px; padding-right: 3px;">25% Health</label></td>
                                                            <td class="col " style="padding-right: 15px;">45</td>

                                                        </tr>
                                                            <tr>
                                                                <td colspan="3"><input type=text placeholder="Enter a Username..." class=textarea style="width: 100%;" name=userg value=<?php echo"$loluser";?>></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="3"><input id="bank_deposit_amount" maxlength="20" name="bank_deposit_amount" class="textarea" style="border-left: 0; width: 100%;" value="Submit!" type="submit"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </form>
                                                <div class="break" style="padding-top: 27px;"></div>
                                                <div class="spacer"></div>
                                                <div class="break" style="padding-top: 23px;"></div>

                                                <table class="regTable" style="margin-left: 10px; margin-right: 0; min-width: 230px; margin-bottom: 11px; width: 85%; max-width: 350px;" cellspacing="0" cellpadding="0" align="center">
                                                    <tbody><tr>
                                                        <td class="header" colspan="2">
                                                            Transfer Points
                                                        </td>
                                                    </tr>
                                                    <form method="post">
                                                    <tr>
                                                        <td><input name="sendto" class="textarea noTop" style="border-left: 0; width: 100%;" onClick="this.value=''"  placeholder="Enter Username..." type="text"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input name="sendamount" class="textarea" style="border-left: 0; width: 100%;" onClick="this.value=''" placeholder="Enter Amount..." type="text"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input name="sendsubmit" class="textarea curve3pxBottom" style="border-left: 0; width: 100%; padding-left: 6px; padding-right: 6px;" value="Send" type="submit">
                                                        </td>
                                                    </tr>
                                                    </form>
                                                    </tbody>
                                                </table>
                                                <table class="regTable" style="margin-left: 10px; margin-right: 0; margin-bottom: 11px; width: 85%; max-width: 350px;" cellspacing="0" cellpadding="0" align="center">
                                                    <tbody><tr>
                                                        <td class="header" colspan="2">
                                                            Last 15 Sent
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            <div class="preventscroll" style="max-height: 200px; overflow-y: auto;">
                                                                <table class="regTable inner" cellspacing="0" cellpadding="0">
                                                                    <tbody>
                                                                    <?php
                                                                    if($lasttensqlnum < 1){ echo "<tr class=\"row\">
                                                                        <td class=\"col noTop\" style=\"color: #dddddd; padding-right: 10px; \">
                                                                            No records yet.</td>
                                                                    </tr>"; }else {
                                                                        while ($lasttenarray = mysql_fetch_array($lasttensql)) {
                                                                            $lasttento = $lasttenarray['sent'];
                                                                            $senttime = $lasttenarray['time'];
                                                                            $lasttenamount = number_format($lasttenarray['amount']);
                                                                            echo "<tr class=\"row\">
                                                                                    <td class=\"col noTop\" style=\"padding-right: 10px; color: #cccccc;\">Sent <span style=\"color: #eeeeee;\">$lasttenamount</span> points to <a href=\"viewprofile.php?username=$lasttento\">$lasttento</a></td>
                                                                                    <td class=\"col noTop\" style=\"padding-right: 10px; font-size: 9px; width: 15%; color: #777777; \"><span class=\"masterTooltip\" >";
                                                                            $now = new DateTime();
                                                                            $time = DateTime::createFromFormat('Y-m-d H:i:s', $senttime);
                                                                            $diff = $now->diff($time);
                                                                            if ($diff->format('%a') > 10) {
                                                                                echo $time->format('Y-m-d');
                                                                            } elseif ($diff->format('%h') <= 0) {
                                                                                echo $diff->format('%i minutes ago');
                                                                            } elseif ($diff->format('%a') <= 0) {
                                                                                echo $diff->format('%h hours ago');
                                                                            } else {
                                                                                echo $diff->format('%a days ago');
                                                                            }
                                                                            echo "</span>
                                                                                    </td>
                                                                                </tr>";
                                                                        }
                                                                    }?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <table class="regTable" style="margin-left: 10px; margin-right: 0;  width: 85%; max-width: 350px;" cellspacing="0" cellpadding="0" align="center">
                                                    <tbody><tr>
                                                        <td class="header" colspan="2">
                                                            Last 15 Received
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            <div class="preventscroll" style="max-height: 200px; overflow-y: auto;">
                                                                <table class="regTable inner" cellspacing="0" cellpadding="0">
                                                                    <tbody>
                                                                    <?php
                                                                    if($lasttenrsqlnum < 1){ echo "<tr class=\"row\">
                                                                        <td class=\"col noTop\" style=\"color: #dddddd; padding-right: 10px; \">No records yet.
                                                                        </td>
                                                                    </tr>"; }else{
                                                                        while($lasttenrarray = mysql_fetch_array($lasttenrsql)){
                                                                            $lasttenrto = $lasttenrarray['username'];
                                                                            $rectime = $lasttenrarray['time'];
                                                                            $lasttenramount = number_format($lasttenrarray['amount']);
                                                                            echo "<tr class=\"row\">
                                                                                    <td class=\"col noTop\" style=\"padding-right: 10px; color: #cccccc;\">Received <span style=\"color: #eeeeee;\">$lasttenramount</span> points from <a href=\"viewprofile.php?username=$lasttenrto\">$lasttenrto</a></td>
                                                                                    <td class=\"col noTop\" style=\"padding-right: 10px; font-size: 9px; width: 15%; color: #777777; \"><span class=\"masterTooltip\" >";
                                                                            $now = new DateTime();
                                                                            $time = DateTime::createFromFormat('Y-m-d H:i:s', $rectime);
                                                                            $diff = $now->diff($time);
                                                                            if ($diff->format('%a') > 10) {
                                                                                echo $time->format('Y-m-d');
                                                                            } elseif ($diff->format('%h') <= 0) {
                                                                                echo $diff->format('%i minutes ago');
                                                                            } elseif ($diff->format('%a') <= 0) {
                                                                                echo $diff->format('%h hours ago');
                                                                            } else {
                                                                                echo $diff->format('%a days ago');
                                                                            }
                                                                            echo "</span>
                                                                                    </td>
                                                                                </tr>";

                                                                        }}?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <div class="break" style="padding-top: 27px;"></div>
                                                <div class="spacer"></div>
                                                <div class="break" style="padding-top: 23px;"></div>
												<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" style="margin-left: 10px; margin-right: 0; font-size: 12px;  text-align: center;">
												Points bought via PayPal are added automatically and instantly
												<input type="hidden" name="cmd" value="_s-xclick">
												<input type="hidden" name="hosted_button_id" value="5QRWLR56BY8NN">
												<table class="regTable" style="width: 85%; margin-top: 13px;  margin-bottom: 14px; max-width: 350px;" cellspacing="0" cellpadding="0" align="center">
												<tbody>
												<tr>
                                                    <td class="header">
                                                        Buy Points via PayPal
                                                    </td>
                                                </tr>
												<tr><td class="col noTop"><input type="hidden" name="on0" value="Points">Points</td></tr>
												<tr><td class="col"><select class="textarea" style="padding: 2px; height: 23px; width: 100%;" name="os0">
													<option value="300">300 £5.00 GBP</option>
													<option value="640">640 £10.00 GBP</option>
													<option value="1,400">1,400 £20.00 GBP</option>
													<option value="2,225">2,225 £30.00 GBP</option>
													<option value="3,125">3,125 £40.00 GBP</option>
													<option value="4,100">4,100 £50.00 GBP</option>
													<option value="6,750">6,750 £75.00 GBP</option>
													<option value="9,000">9,000 £100.00 GBP</option>
													<option value="11,800">11,800 £125.00 GBP</option>
													<option value="15,000">15,000 £150.00 GBP</option>
												</select></td></tr>
												<tr><td><input type="hidden" name="on1" value="Infamous Gangsters"></td></tr>
												</tbody>
												</table>
												<input type="hidden" name="currency_code" value="GBP">
												<input type="image" src="https://www.paypalobjects.com/en_US/GB/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal – The safer, easier way to pay online!">
												<img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
												</form>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <div class="break" style="padding-top: 10px;"></div>
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