<? include 'included.php'; session_start(); ?>
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
        <td valign="top">
            <?
            $time = time();
            $times = $time + 120;
            $jailtime = $time + 80;
            $saturate = "/[^a-z0-9]/i";
            $saturated = "/[^0-9]/i";
            $sessionidraw = $_COOKIE['PHPSESSID'];
            $sessionid = preg_replace($saturate,"",$sessionidraw);
            $userip = $_SERVER[REMOTE_ADDR];
            $vera = $_POST['ver'];
            $verpost = preg_replace($saturate,"",$vera);
            $getida = $_GET['dropid'];
            $getid = preg_replace($saturated,"",$getida);
            $gangsterusername = $usernameone;
            $jailtest = mysql_query("SELECT username FROM jail WHERE username  = '$gangsterusername'");
            $jailtester = mysql_num_rows($jailtest);
            if($jailtester != '0'){$ffs = '1'; die(include 'redirect.php'); }
            $vericheck = mysql_num_rows(mysql_query("SELECT * FROM users WHERE username = '$usernameone' AND ver1 != '0'"));
            /*if($vericheck > 999999999999999){

                die('<meta http-equiv="refresh" content="0; url=doverifsteal.php" />');

            }

            if(isset($_POST['verifsteal'])){
                $verificationcode = rand(1,40);
                if($verificationcode == '40'){
                    $verifarray = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
                    shuffle($verifarray);
                    $verif1 = $verifarray[0];
                    $verif2 = $verifarray[1];
                    $verif3 = $verifarray[2];
                    mysql_query("UPDATE users SET ver1 = '$verif1', ver2 = '$verif2', ver3 = '$verif3' WHERE ID = '$ida'");
                    die('<meta http-equiv="refresh" content="0; url=doverifsteal.php" />');

                }}*/
            ?>
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
                                Grand Theft Auto
                            </div>
                            <div style="padding: 5px; margin: auto; text-align: center; color: #fefefe;">
                                <div style="margin: auto; padding-top: 16px; padding-bottom: 6px; text-align: center;">
                                    <?php
                                    $getuserinfoarray = $statustesttwo;
									
                                    $username = $getuserinfoarray['username'];
                                    $points = $getuserinfoarray['points'];
                                    $reward = $getuserinfoarray['reward'];
                                    $steal = $getuserinfoarray['steal'];
                                    $rank = $getuserinfoarray['rankid'];
                                    $rankup = $getuserinfoarray['rankup'];
                                    $userlocation = $getuserinfoarray['location'];
                                    $mission = $getuserinfoarray['mission'];
                                    $missioncount = $getuserinfoarray['missioncount'];

                                    $guessopen = mysql_query("SELECT * FROM gametimes WHERE game = 'weekly'");
                                    $openx = mysql_fetch_array($guessopen);
                                    $openxox = $openx['time'];

                                    $alfas = $getuserinfoarray['alfas'];
                                    $maybach = $getuserinfoarray['maybach'];
                                    $porsche = $getuserinfoarray['porsche'];
                                    $pagani = $getuserinfoarray['pagani'];

                                    $crewid = $getuserinfoarray['crewid'];
                                    $thefts = $getuserinfoarray['thefts'];
                                    $currentc = $getuserinfoarray['nowthefts'];
                                    $currentcon = $getuserinfoarray['consecutivethefts'];
                                    $ID = $getuserinfoarray['ID'];
                                    $stealtime = $steal - $time;
                                    $ver = $getuserinfoarray['ver1'];
                                    $input = $getuserinfoarray['stealinput'];
                                    if($stealtime <= 0){$timeleft = "<b>Available</b>";}else{$timeleft = $stealtime;}

                                    $stealbutton = ceil($time / 200);
                                    $hidden = ceil($time / 2500);
                                    $box = ceil($time / 2000);
                                    $timea = time();

                                    if($_POST['resetsteal']){
                                        if($points < '555555555555555'){ $showoutcome++; $outcome = "You do not have enough points!"; }
                                        else{
                                            mysql_query("UPDATE users SET points = (points - 555555555555555) WHERE ID = '$ida' AND points >= '555555555555555'");
                                            if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 13.</font>');}
                                            mysql_query("UPDATE users SET ptsspent = (ptsspent + 555555555555555) WHERE ID = '$ida'");
                                            mysql_query("UPDATE users SET steal = '0' WHERE ID = '$ida'");
                                            $showoutcome++; $outcome = "You can now steal a car!"; }}

                                    $inputrand = mt_rand(0,3);
                                    if($inputrand == '0'){$newinput = 1;}

                                    if(isset($_POST['gta'])){
				if (isset($_POST['captcha_need']) && $_POST['captcha'] != $_SESSION['rand_code']) {
					$showoutcome++; $outcome = "Verification code is not valid!";
				}
				elseif ((isset($_POST['captcha_need']) && $_POST['captcha'] == $_SESSION['rand_code']) || !isset($_POST['captcha_need'])) {
                                        if($stealtime > '0'){}
                                        else{
						$verificationcode = rand(1, 25);
						if ($verificationcode == '25') {
							$showcaptcha = true;
						}
						else {
                                            mysql_query("UPDATE users SET steal = $times WHERE ID = '$ida' AND steal <= '$time'");
                                            mysql_query("UPDATE users SET thefts = (thefts + 1) WHERE ID = '$ida'");
                                            if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error.</font>');}

                                            $rand = mt_rand(0,16);
                                            $cardamagea = mt_rand(0,19);
                                            if($rand < 2){
                                                mysql_query("INSERT INTO jail(username,time,reward)
VALUES ('$gangsterusername','$jailtime','$reward')");
                                                mysql_query("UPDATE users SET nowthefts = 0 WHERE ID = '$ida'");
                                                mysql_query("UPDATE loggedin SET stealfailed = (stealfailed + 1) WHERE username = '$usernameone'");

                                                $showoutcome++; $outcome = "You got caught trying to steal a car, <b>you are now in Jail!</b>";
                                                $stopit = 1;}
                                            if($stopit != '1'){

                                                if($rank == '1'){ $update = '121';$newrank = "$rank2";}
                                                elseif($rank == '2'){ $update = '45';$newrank = "$rank3";}
                                                elseif($rank == '3'){ $update = '28';$newrank = "$rank4";}
                                                elseif($rank == '4'){ $update = '12';$newrank = "$rank5";}
                                                elseif($rank == '5'){ $update = '8.5';$newrank = "$rank6";}
                                                elseif($rank == '6'){ $update = '6.5';$newrank = "$rank7";}
                                                elseif($rank == '7'){ $update = '2.65';$newrank = "$rank8";}
                                                elseif($rank == '8'){ $update = '2.2';$newrank = "$rank9";}
                                                elseif($rank == '9'){ $update = '0.95';$newrank = "$rank10";}
                                                elseif($rank == '10'){ $update = '0.69';$newrank = "$rank11";}
                                                elseif($rank == '11'){ $update = '0.53';$newrank = "$rank12";}
                                                elseif($rank == '12'){ $update = '0.45';$newrank = "$rank13";}
                                                elseif($rank == '13'){ $update = '0.41';$newrank = "$rank14";}
                                                elseif($rank == '14'){ $update = '0.4';$newrank = "$rank15";}
                                                elseif($rank == '15'){ $update = '0.33';$newrank = "$rank16";}
                                                elseif($rank == '16'){ $update = '0.28';$newrank = "$rank17";}
                                                elseif($rank == '17'){ $update = '0.23';$newrank = "$rank18";}
                                                elseif($rank == '18'){ $update = '0.156';$newrank = "$rank19";}
                                                elseif($rank == '19'){ $update = '0.07';$newrank = "$rank20";}
                                                elseif($rank == '20'){ $update = '0.06';$newrank = "$rank21";}
                                                elseif($rank == '21'){ $update = '0.02';$newrank = "$rank22";}

                                                $crewperk = mysql_num_rows(mysql_query("SELECT * FROM crewperks WHERE crewid = '$crewid' AND perk = '1'"));
                                                $refreward2 = mysql_num_rows(mysql_query("SELECT * FROM referralrewards WHERE rank > '$time'"));
                                                if($crewperk > 0 || $refreward2 > 0){
                                                    if($rank == '1'){ $update = '121';$newrank = "$rank2";}
                                                    elseif($rank == '2'){ $update = '121';$newrank = "$rank3";}
                                                    elseif($rank == '3'){ $update = '45';$newrank = "$rank4";}
                                                    elseif($rank == '4'){ $update = '28';$newrank = "$rank5";}
                                                    elseif($rank == '5'){ $update = '12';$newrank = "$rank6";}
                                                    elseif($rank == '6'){ $update = '8.5';$newrank = "$rank7";}
                                                    elseif($rank == '7'){ $update = '6.5';$newrank = "$rank8";}
                                                    elseif($rank == '8'){ $update = '2.65';$newrank = "$rank9";}
                                                    elseif($rank == '9'){ $update = '2.2';$newrank = "$rank10";}
                                                    elseif($rank == '10'){ $update = '0.95';$newrank = "$rank11";}
                                                    elseif($rank == '11'){ $update = '0.69';$newrank = "$rank12";}
                                                    elseif($rank == '12'){ $update = '0.53';$newrank = "$rank13";}
                                                    elseif($rank == '13'){ $update = '0.45';$newrank = "$rank14";}
                                                    elseif($rank == '14'){ $update = '0.41';$newrank = "$rank15";}
                                                    elseif($rank == '15'){ $update = '0.4';$newrank = "$rank16";}
                                                    elseif($rank == '16'){ $update = '0.33';$newrank = "$rank17";}
                                                    elseif($rank == '17'){ $update = '0.28';$newrank = "$rank18";}
                                                    elseif($rank == '18'){ $update = '0.23';$newrank = "$rank19";}
                                                    elseif($rank == '19'){ $update = '0.156';$newrank = "$rank20";}
                                                    elseif($rank == '20'){ $update = '0.07';$newrank = "$rank21";}
                                                    elseif($rank == '21'){ $update = '0.04';$newrank = "<font style='color: #FFC753;'>$rank22</font>";}}

                                                if($rank <= 21){
                                                    if(($rankup + $update) > ('100')){
                                                        $newrankup = $rankup + $update - 100;

                                                        if($newrank == 'gt5g'){$sendinfo = "You have been promoted to \[b\]$newrank\[\/b\]! Congratulations, you received \[b\]1,000\[\/b\] bullets!\[br\]\[br\]The more you rank up, the more crimes you can commit which make you ALOT more money!";mysql_query("UPDATE users SET mail = (mail + 1) WHERE ID = '$ida'");}else{
                                                            $sendinfo = "You have been promoted to \[b\]$newrank\[\/b\]! Congratulations, you received \[b\]1,000\[\/b\] bullets!";}
                                                        $homeinfo = "ranked to \[b\]$newrank\[\/b\]!";
                                                        mysql_query("INSERT INTO home(`username`,`update`,`type`) VALUES ('$gangsterusername','$homeinfo','1')");
                                                        mysql_query("UPDATE users SET rankid = rankid + 1,rankup = $newrankup, bullets = bullets + 1000 WHERE ID = '$ida'");
                                                        mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
															VALUES ('$gangsterusername','$gangsterusername','1','$userip','$sendinfo')");}
                                                    else{mysql_query("UPDATE users SET rankup = rankup + $update WHERE ID = '$ida'");}}
                                                if($openxox == 2){ mysql_query("UPDATE weeklychal SET total = (total + 1) WHERE username = '$usernameone'"); }
                                                mysql_query("UPDATE users SET donethefts = (donethefts + 1) WHERE ID = '$ida'");
                                                mysql_query("UPDATE users SET nowthefts = (nowthefts + 1) WHERE ID = '$ida'");
                                                mysql_query("UPDATE missiontasks SET steal = steal + 1 WHERE username = '$usernameone'");
                                                mysql_query("UPDATE loggedin SET stealdone = (stealdone + 1) WHERE username = '$usernameone'");
                                                $consecutivecrimee = mysql_query("SELECT consecutivethefts,nowthefts FROM users WHERE id = '$ida'");
                                                $consecutivecrime = mysql_fetch_array($consecutivecrimee);
                                                $currentc = $consecutivecrime['nowthefts'];
                                                $currentcon = $consecutivecrime['consecutivethefts'];
                                                if($currentc > $currentcon){ mysql_query("UPDATE users SET consecutivethefts = $currentc WHERE ID = '$ida'"); }

                                                if($cardamagea < 5){$cardamage = '0';}else{$cardamage = $cardamagea * 5;}
                                                $crewperk = mysql_num_rows(mysql_query("SELECT * FROM crewperks WHERE crewid = '$crewid' AND perk = '6'"));

                                                $crapcar=rand(1,13); if($crapcar < 3 AND $crewperk < 1){ $random_car=rand(10,13); }else{
                                                    $howmanysupers = mysql_num_rows(mysql_query("SELECT * FROM cars WHERE carid >= '14'"));
                                                    if($howmanysupers < 35 AND $crewperk < 1){ $random_car=rand(1,13); }
                                                    elseif($howmanysupers < 35 AND $crewperk > 0){ $random_car=rand(1,7); }
                                                    elseif($howmanysupers >= 35 AND $crewperk > 0){ $random_car=rand(2,7); }
                                                    else{ $random_car=rand(2,13); }
													}
                                                    //$random_car = 1;
                                                if($random_car == 1){ $chance = rand(1,50); if ($chance >= 46){
                                                    $superone = mysql_num_rows(mysql_query("SELECT * FROM cars WHERE carid = '14'"));
                                                    $supertwo = mysql_num_rows(mysql_query("SELECT * FROM cars WHERE carid = '15'"));
                                                    $superthree = mysql_num_rows(mysql_query("SELECT * FROM cars WHERE carid = '16'"));
                                                    $superfour = mysql_num_rows(mysql_query("SELECT * FROM cars WHERE carid = '17'"));
                                                    $superfive = mysql_num_rows(mysql_query("SELECT * FROM cars WHERE carid = '18'"));

                                                    if($superone < 7){ $carname = 'Bugatti Veyron'; $link = '14'; $bullets = '350'; $speed = '0'; }
                                                    elseif($supertwo < 7){ $carname = 'Ferrari 458 Italia'; $link = '15'; $bullets = '350'; $speed = '0'; }
                                                    elseif($superthree < 7){ $carname = 'Lamborghini Murcielago'; $link = '16'; $bullets = '350'; $speed = '0'; }
                                                    elseif($superfour < 7){ $carname = 'Koenigsegg Agera R'; $link = '17'; $bullets = '350'; $speed = '0'; }
                                                    elseif($superfive < 7){ $carname = 'Lamborghini Aventador'; $link = '18'; $bullets = '350'; $speed = '0'; }
                                                    elseif($superfive < 7){ $carname = 'Audi Prologue'; $link = '19'; $bullets = '350'; $speed = '0'; }
                                                    mysql_query("UPDATE missiontasks SET stealrare = stealrare + 1 WHERE username = '$usernameone'");
                                                }else{ $random_car=rand(7,13);}}

                                                elseif ($random_car ==2){ if($crewperk > 0){ $chance = rand(39,50); }else{ $chance = rand(1,50); } if($chance >=40){
                                                    $carname = 'Pagani Zonda'; $link = '12'; $bullets = '200'; $speed = '60';
                                                    mysql_query("UPDATE missiontasks SET stealrare = stealrare + 1 WHERE username = '$usernameone'");
                                                }else{ $random_car=rand(7,13);}}

                                                if ($random_car ==3){ if($crewperk > 0){ $chance = rand(37,50); }else{ $chance = rand(1,50); } if ($chance >=38){
                                                    $carname = 'Porsche Carrera GT'; $link = '11'; $bullets = '140'; $speed = '140';
                                                    mysql_query("UPDATE missiontasks SET stealrare = stealrare + 1 WHERE username = '$usernameone'");
                                                }else{ $random_car=rand(7,13);}}

                                                if ($random_car ==4){ if($crewperk > 0){ $chance = rand(37,50); }else{ $chance = rand(1,50); } if ($chance >=38){
                                                    $carname = 'Audi TT'; $link = '10'; $bullets = '108'; $speed = '150';
                                                    mysql_query("UPDATE missiontasks SET stealrare = stealrare + 1 WHERE username = '$usernameone'");
                                                }else{ $random_car=rand(7,13);}}

                                                if ($random_car ==5){ if($crewperk > 0){ $chance = rand(37,50); }else{ $chance = rand(1,50); } if ($chance >=38){
                                                    $carname = 'Maserati'; $link = '9'; $bullets = '68'; $speed = '160';
                                                    mysql_query("UPDATE missiontasks SET stealrare = stealrare + 1 WHERE username = '$usernameone'");
                                                }else{ $random_car=rand(7,13);}}

                                                if ($random_car ==6){ if($crewperk > 0){ $chance = rand(34,50); }else{ $chance = rand(1,50); } if ($chance >=35){
                                                    $carname = 'Maybach 62'; $link = '8'; $bullets = '42'; $speed = '360';
                                                }else{ $random_car=rand(7,13);}}
												
												//$cardamage = 0;

                                                if ($random_car ==7){ $carname = 'Continental GT'; $link = '7'; $bullets = '38'; $speed = '500'; }
                                                if ($random_car ==8){ $carname = 'Alfa Romeo'; $link = '6'; $bullets = '30'; $speed = '650'; }
                                                if ($random_car ==9){ $carname = 'Aston Martin'; $link = '5'; $bullets = '24'; $speed = '800'; }
                                                if ($random_car ==10){ $carname = 'BMW'; $link = '4'; $bullets = '10'; $speed = '1000'; }
                                                if ($random_car ==11){ $carname = 'Porsche 911'; $link = '3'; $bullets = '4'; $speed = '1200'; }
                                                if ($random_car ==12){ $carname = 'Renault Clio'; $link = '2'; $bullets = '2'; $speed = '2400'; }
                                                if ($random_car ==13){ $carname = 'Volvo'; $link = '1'; $bullets = '1'; $speed = '3600'; }

                                                $image = "<img src =/layout/car/$link.jpg style='width: 100%;'>";
                                                if($link >= 9 AND $link <= 11){ $before = '<b><font color=red face=verdana size=1>Rare:&nbsp;</b></font>'; }
                                                elseif($link == 12){ $before = '<b><font color=red face=verdana size=1>Very Rare:&nbsp;</b></font>'; }
                                                elseif($link >= 14){ $before = '<b><font color=#0066FF face=verdana size=1>Super Rare:&nbsp;</b></font>'; }
                                                $showoutcome++; $outcome = "You successfully stole a $before $carname $link with $cardamage% damage!";
                                                
												if ($mission == 9 && $carname == 'Bugatti Veyron' && $cardamage == 0) {
													mysql_query("UPDATE users SET `money`=`money`+'350000000', `bullets`=`bullets`+'30000', `mission`=`mission`+'1', mail='1' WHERE username = '$gangsterusername'");
													$completeinfo = 'Thanks the car is perfect! I have sent you $350,000,000 & 30,000 bullets!';
													mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
														VALUES ('$gangsterusername','MrBrown','1','$userip','$completeinfo')");
												}
                                                else {
	                                                mysql_query("INSERT INTO cars(owner,damage,bullets,carid,speed)
														VALUES ('$gangsterusername','$cardamage','$bullets','$link','$speed')");
												}
													
											}
										}}}
									}

                                    elseif(isset($_GET['dropid'])){
                                        $dropexist = mysql_num_rows(mysql_query("SELECT owner FROM cars WHERE id = $getid AND owner = '$gangsterusername'"));
                                        if($dropexist < '1'){ $showoutcome++; $outcome = "This is not your car!"; }
                                        else{mysql_query("DELETE FROM cars WHERE id = $getid AND owner = '$gangsterusername'");
                                            $showoutcome++; $outcome = "You dropped the car!";}}

                                    $getuserinfosql = mysql_query("SELECT * FROM users WHERE ID = '$ida'");
                                    $getuserinfoarray = mysql_fetch_array($getuserinfosql);
                                    $steal = $getuserinfoarray['steal'];
                                    $stealtime = $steal - $time;

                                    $tyrand= mt_rand(3500,5000);
                                    $tyrandone = mt_rand(5001,8000);

                                    $br = mt_rand(0,2);

                                    $getuserinfosql = mysql_query("SELECT * FROM users WHERE ID = '$ida'");
                                    $getuserinfoarray = mysql_fetch_array($getuserinfosql);
                                    $steal = $getuserinfoarray['steal'];
                                    ?>

                                    <script>
                                        function crimesCountdown(load){
                                            if(load){
                                                var table = document.getElementById('crimes');
                                                var inmates = table.getElementsByTagName('span');
                                                for(var i = 0; i < inmates.length; i++){
                                                    if(inmates[i].id == 'countdown'){
                                                        var timeleft = parseInt(inmates[i].innerHTML);
                                                        if(timeleft >= 0){
                                                            if(timeleft == 0){
                                                                inmates[i].innerHTML = 'Available';
																inmates[i].style.color = 'gold';
																var button = inmates[i].parentNode;
																button.name = 'gta';
																button.type = '';
                                                            } else {
																var newtimeleft = timeleft - 1;
                                                                inmates[i].innerHTML = newtimeleft + ' seconds';
                                                            }
														}
													}
												}
											}
                                            setTimeout("crimesCountdown(true)",1000);
                                        }
                                        window.onload = crimesCountdown;
                                    </script>


                                    <? if($showoutcome>=1){ ?>
                                        <div class="stoleHeader">
                                            <?echo$outcome;?>
                                        </div>
                                        <?if($image!=''){?>
                                        <div class="car">
                                            <?echo$image;?>
											<div class="info">
												<span class="owner">Owner: 
													<a href="viewprofile.php?username=<?=$gangsterusername?>"><?=$gangsterusername?></a>
												</span> 
												<?=$carname?>
											</div>
                                        </div>
                                        <div class="car more-info">
                                            <div class="row-info">
                                                <div class="col title">Damage</div>
												<?php 
													if ($cardamage == 0) $color = 'green';
													if ($cardamage > 0 && $cardamage <= 25) $color = '#eeeeee';
													if ($cardamage > 25) $color = '#FFC2B2';
												?>
                                                <div class="col"><span style="color: <?=$color?>;"><?echo$cardamage;?>%</span></div>
                                                <div class="col title">Travel Time</div>
                                                <div class="col"><span style="color: #eeeeee;"><?echo$speed;?> seconds</span></div>
                                            </div>
                                            <div class="row-info">
                                                <!--<div class="col title">Owner</div>
                                                <div class="col"><a href="viewprofile.php?username=<?echo$usernameone;?>"><?echo$usernameone;?></a></div>-->
                                                <div class="col title">Rate of Damage</div>
                                                <div class="col"><span style="color: #eeeeee;">5%</span></div>
                                                <div class="col title">Bullets</div>
                                                <div class="col"><span style="color: #eeeeee;"><?echo$bullets;?> bullets</span></div>
                                            </div>
                                        </div>
                                            <?}?>
                                    <? } ?>
                                    <form method="post" id=crimes>
										<span style="color: #777777; font-size: 11px; margin-bottom: 7px; display: inline-block;">Risk: 12%</span>
										<br>
                                        <? if($stealtime <= 0){?>
                                            <button class="textarea curve3px" name="gta" style="font-size: 11.5px; padding: 8px 13px 7px 13px; margin: 0 0 11px 0;">
                                                GTA: <span class="crimeTimer" data-counter="-1"><span style="color: gold;">Available</span></span>
                                            </button>
                                        <?}else{?>
                                            <button type="button" class="textarea curve3px" style="font-size: 11.5px; padding: 8px 13px 7px 13px; margin: 0 0 11px 0;">
                                                GTA: <span style="color: #999999;" id="countdown"><?echo$stealtime;?> seconds</span>
                                            </button>
                                        <?} ?>
                                        <input type=submit name=doall class=textbox value="Commit" style="visibility:hidden;">
										<?php if ($showcaptcha == true): ?>
										<div style="margin-top: 10px; margin-bottom: 10px;">
											<label for="captcha_txt"><img src="captcha_generate.php" style="height: 24px;"></label>
											<input class="textarea" value="" id="captcha_txt" name="captcha" placeholder="Enter Code..." type="text">
											<input type="hidden" name="captcha_need" value="1">
											<!--<input type="submit" value="Submit" class="textarea" style="display: inline-block" name="captcha_btn">-->
										</div>
										<?php endif; ?>
                                    </form>
                                    <div class="break" style="padding-top: 8px;">
                                        <div class="spacer"></div>
                                        <div class="break" style="padding-top: 23px;">
										<span class="updated" id="car-dropped-span" style="display: none; margin-top: 3px; margin-bottom: 20px; font-size: 13px; color: yellow;">Car Dropped!</span>
                                            <table class="regTable" id="carTable" style="margin: auto; margin-bottom: 18px; width: 80%; max-width: 700px;" cellspacing="0" cellpadding="0">
                                                <tbody><tr>
                                                    <td colspan="3" class="header">
                                                        My Garage </td>
                                                </tr>
                                                <tr style="text-align:center;">
                                                    <td class="subHeader" style="border-left: 0; width: 60%;">Car</td>
                                                    <td class="subHeader" style="width: 20%;">Damage&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                    <td class="subHeader" style="width: 20%;">&nbsp;&nbsp;&nbsp;Action&nbsp;&nbsp;&nbsp;&nbsp;</td> </tr>
                                                <?php
                                                $contador=0;
												$page = $_GET['page'];
												if (!$page) {
													$page = 1;
												}
												$limit = 8;
												$offset = ($page - 1) * $limit;
												$total_cars = mysql_num_rows(mysql_query("SELECT * FROM cars WHERE owner = '$usernameone'"));
												$total_pages = ceil($total_cars / $limit);
                                                $carlist =mysql_query("SELECT * FROM cars WHERE owner = '$usernameone' ORDER BY bullets DESC LIMIT $limit OFFSET $offset");
                                                while($carlists = mysql_fetch_array($carlist)){
                                                    $carid = $carlists['carid'];
                                                    $carida = $carlists['id'];
                                                    $card = $carlists['damage'];
                                                    $checkedraw = $carlists['display'];
                                                    $carname = $carlists['carname'];
                                                    $carnamea = $carlists['carname'];

                                                    if($checkedraw == 'yes'){$checked = 'CHECKED';}else{$checked = ' ';}


                                                    if($carid == 1){$carname = 'Volvo';}
                                                    elseif($carid == 2){$carname = 'Renault Clio';}
                                                    elseif($carid == 3){$carname = 'Porsche 911';}
                                                    elseif($carid == 4){$carname = 'BMW';}
                                                    elseif($carid == 5){$carname = 'Aston Martin';}
                                                    elseif($carid == 6){$carname = 'Alfa Romeo';}
                                                    elseif($carid == 7){$carname = 'Continental GT';}
                                                    elseif($carid == 8){$carname = 'Maybach 62';}
                                                    elseif($carid == 9){$carname = 'Maserati';}
                                                    elseif($carid == 10){$carname = 'Audi TT';}
                                                    elseif($carid == 11){$carname = 'Porsche Carrera GT';}
                                                    elseif($carid == 12){$carname = 'Pagani Zonda';}
                                                    elseif($carid == 13){$carname = $carnamea;}
                                                    elseif($carid == 14){$carname = 'Bugatti Veyron';}
                                                    elseif($carid == 15){$carname = 'Ferrari 458 Italia';}
                                                    elseif($carid == 16){$carname = 'Lamborghini Murcielago';}
                                                    elseif($carid == 17){$carname = 'Koenigsegg Agera R';}
                                                    elseif($carid == 18){$carname = 'Lamborghini Aventador';}
                                                    elseif($carid == 19){$carname = 'Audi Prologue';}
                                                    if($carid == 12){$before = '<b><font color=red face=verdana size=1>Very Rare:&nbsp;</b></font>';}
                                                    elseif($carid == 9){$before = '<b><font color=red face=verdana size=1>Rare:&nbsp;</b></font>';}
                                                    elseif($carid == 10){$before = '<b><font color=red face=verdana size=1>Rare:&nbsp;</b></font>';}
                                                    elseif($carid == 11){$before = '<b><font color=red face=verdana size=1>Rare:&nbsp;</b></font>';}
													elseif($carid == 16){$before = '<b><font color=red face=verdana size=1>Rare:&nbsp;</b></font>';}
													elseif($carid == 17){$before = '<b><font color=red face=verdana size=1>Rare:&nbsp;</b></font>';}
                                                    elseif($carid == 13){$before = '<b><font color=red face=verdana size=1>Custom:&nbsp;</b></font>';}
                                                    elseif($carid >= 14 && $carid != 16 && $carid != 17){$before = '<b><font color=#0066FF face=verdana size=1>Super Rare:&nbsp;</b></font>';}
                                                    else{ $before = ''; }?>
                                                <script>
                                                function drop_<?echo$carida;?>(){
                                                var ajaxRequest;
                                                try{ajaxRequest = new XMLHttpRequest();} catch (e){
                                                try{ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");} catch (e) {
                                                try{ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");} catch (e){
                                                alert("Your browser broke1!");return false;}}}
                                                ajaxRequest.open("GET", "cardrop.php?id=<?echo$carida;?>", true);
                                                ajaxRequest.send(null);

                                                ajaxRequest.onreadystatechange = function(){
                                                if(ajaxRequest.readyState == 4){
                                                if(ajaxRequest.responseText){
                                                document.getElementById("car_<?echo$carida;?>").style.display='none';
                                                document.getElementById("car-dropped-span").style.display='block';
                                                }}}}
                                                </script>
                                                    <?if($contador==0){
                                                        echo"<tr class='row' id='car_$carida'>
                                                                <td class='col noTop'>                                                  
                                                                    <a href=viewcar.php?id=$carida>$before$carname</a>
                                                                </td>
                                                                <td class='col noTop' align=left>
                                                                    &nbsp;$card%
                                                                </td>
                                                                <td class='col noTop' style='width: 1 %;'>
                                                                    <a onclick=\"drop_$carida();\" href=\"#\"><label style=\"display: inline-block; width: 100%; opacity: 0.6;\">Drop</label></a>
                                                                </td>
                                                            </tr>";
                                                    }else{
                                                        echo"<tr class='row' id='car_$carida'>                                               
                                                                <td class='col'>                                                  
                                                                    <a href=viewcar.php?id=$carida>$before$carname</a>
                                                                </td>
                                                                <td class='col' align=left>
                                                                    &nbsp;$card%
                                                                </td>
                                                                <td class='col' style='width: 1 %;'>
                                                                    <a onclick=\"drop_$carida();\" href=\"#\"><label style=\"display: inline-block; width: 100%; opacity: 0.6;\">Drop</label></a>
                                                                </td>
                                                            </tr>";
                                                    }

                                                    $contador++;
                                                }
                                                ?>
                                                </tbody>
                                            </table>
											
											<div style="padding: 7px; margin-bottom: 5px; text-align: center;">
											<?php if ($page > 1): ?>
												<a href="steal.php?page=<?=($page - 1)?>" class="textarea curve3px" style="opacity: 0.5; padding-left: 9px; padding-right: 9px;">Prev page</a>
											<?php endif; ?>
											<?php if ($page < $total_pages && $total_pages > 1): ?>
												<a href="steal.php?page=<?=($page + 1)?>" class="textarea curve3px" style="padding-left: 9px; padding-right: 9px;">Next page</a>
											<?php endif; ?>
											</div>
											
                                            <?php  /*if($carlistamount > 50){?>
                                                <div style="padding: 7px; margin-bottom: 5px; text-align: center;">
                                                    <form action = "" method = "post">
                                                        <input type="hidden" name="select" value="<?php  echo $one; ?>">
                                                        <?php if($selectfrom != '0'){
                                                            echo'<input type ="submit" value="Prev page" class="textarea curve3px" name="previous">';}?>
                                                        <input type ="submit" value="Next page" class="textarea curve3px" name="next">
                                                    </form>
                                                </div>
                                            <?php }else{echo"<br>";}*/?>
                                            <div class="break" style="padding-top: 15px;">
                                                <div class="spacer"></div>
                                                <?
                                                $carlist = mysql_num_rows(mysql_query("SELECT * FROM cars WHERE owner = '$usernameone'"));
                                                $totalcrimes = number_format($getuserinfoarray['thefts']);
                                                $totalcrimess = $getuserinfoarray['thefts'];
                                                $concrimes = number_format($getuserinfoarray['nowthefts']);
                                                $crimessuccess = $getuserinfoarray['donethefts'];
                                                    if($totalcrimes == 0){ $rating = 0; }else{
                                                        $rating = round($crimessuccess/$totalcrimess*100); }
                                                ?>
                                                <div class="break" style="padding-top: 4px;">
                                                    <div style="text-align: right; padding: 5px; padding-right: 6px; padding-top: 1px;">
                                                        <span style="float: left;">Cars Stolen: <b style="color: silver;"> <?echo$totalcrimes;?></b>
                                                            <span class="miniSep">-</span> Cars in Garage:<b style="color: silver;"> <?echo$carlist;?></b>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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