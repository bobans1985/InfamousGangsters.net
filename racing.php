<? include 'included.php'; session_start(); ?>
<?php
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
$today = date("m.d.y");
$newlocation = $_GET['location'];
if($newlocation == 1){ $newlocation = "Las Vegas"; }
elseif($newlocation == 2){ $newlocation = "Los Angeles"; }
elseif($newlocation == 3){ $newlocation = "New York"; }
elseif($newlocation == 6){ $newlocation = "Staff Land"; }
$makenewmaybe = mysql_num_rows(mysql_query("SELECT owner FROM casinos WHERE owner = '$usernameone' AND casino = 'Races' AND location = '$newlocation'"));
if($makenewmaybe > 0){ $userlocation = "$newlocation"; }

$jailtest = mysql_query("SELECT username FROM jail WHERE username  = '$username'");
$jailtester = mysql_num_rows($jailtest);
if($jailtester != '0'){die(include 'redirect.php'); }
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

            $check = $statustesttwo['sentmsgs'];

            $entertainer = $ent;
            if($entertainer != '0'){die('<font color=white face=verdana size=1>As entertainer you cannot view this page</font>');}

            $ownerinfosql = mysql_query("SELECT * FROM casinos WHERE casino = 'Races' AND location = '$userlocation'");
            $ownerinfoarray = mysql_fetch_array($ownerinfosql);
            $ownername = $ownerinfoarray['owner'];
            $getbuyback = $ownerinfoarray['buyback'];

            $getsug = mysql_fetch_array(mysql_query("SELECT * FROM suggestions WHERE username = '$ownername'"));
            $getsugid = $getsug['id'];

            if($ownername == $usernameone){$owner = 1;}else{$owner = 0;}

            $ownermaxbet = $ownerinfoarray['maxbet'];
            $ownerprofit = $ownerinfoarray['profit'];
            $ownermaxbettwo = number_format($ownerinfoarray['maxbet']);
            if($ownermaxbettwo == '999,999,999,999'){$ownermaxbettwo = 'Infinite';}else{$ownermaxbettwo = "$$ownermaxbettwo";}
            $ownerprofittwo = number_format($ownerinfoarray['profit']);

            $ownerstatssql = mysql_query("SELECT * FROM users WHERE ID = '$getsugid'");
            $ownerstatsarray = mysql_fetch_array($ownerstatssql);
            $ownermoney = $ownerstatsarray['money'];
            $ownersid = $ownerstatsarray['ID'];
            $ownerpoints = $ownerstatsarray['points'];


            $saturated = "/[^0-9]/i";
            $setmaxraw = mysql_real_escape_string($_POST['setmaxrace']);
            $priceraw = mysql_real_escape_string($_POST['setpricerace']);
            $buybackraw = mysql_real_escape_string($_POST['setbuybackrace']);
            $colorraw = mysql_real_escape_string($_POST['color']);
            $setownerrawraw = mysql_real_escape_string($_POST['setownerrace']);
            $betraw = mysql_real_escape_string($_POST['bet']);
            $bet = preg_replace($saturated,"",$betraw);
            $price = preg_replace($saturated,"",$priceraw);
            $buyback = preg_replace($saturated,"",$buybackraw);
            $betformat  = number_format($bet);
            $color = preg_replace($saturated,"",$colorraw);
            $setmax = preg_replace($saturated,"",$setmaxraw);
            $setownerraw = preg_replace($saturate,"",$setownerrawraw);
            $setmaxtwo = number_format($setmax);

            $checkindb = mysql_num_rows(mysql_query("SELECT * FROM casinoprofit WHERE username = '$usernameone'"));
            if($checkindb < 1){ mysql_query("INSERT INTO `casinoprofit` (username,id) VALUES ('$usernameone','')"); }

            if(($owner != '0')||($userrankid == '100')){
                if(isset($_POST['setmaxrace'])) {
                    if($setmax < '250000'){$showoutcome++; $outcome = "The maxbet must be at least $<b>250,000</b>!";}
                    elseif($setmax >= '999999999999'){
                        mysql_query("UPDATE casinos SET maxbet = '999999999999' WHERE casino= 'Races' AND location = '$userlocation'");
                        $showoutcome++; $outcome = "The maxbet is now <b>Infinite</b>!";}
                    else{
                        mysql_query("UPDATE casinos SET maxbet = '$setmax' WHERE casino= 'Races' AND location = '$userlocation'");
                        $showoutcome++; $outcome = "The maxbet is now $<b>$setmaxtwo</b>!";}}}

            if(($owner != '0')||($userrankid >= '25')){
                if(isset($_POST['setownerrace'])) {

                    $setownerinfosql = mysql_query("SELECT * FROM users WHERE username = '$setownerraw'");
                    $setownerinfoarray = mysql_fetch_array($setownerinfosql);
                    $setownerinforows = mysql_num_rows($setownerinfosql);
                    $setowner = $setownerinfoarray['username'];
                    if(!$setowner){die (' ');}
                    $setownerstatus = $setownerinfoarray['status'];
                    $ssskkk = $setownerinfoarray['rankid'];
                    $ssskkkid = $setownerinfoarray['ID'];

                    $anum_true=mysql_num_rows(mysql_query("SELECT * FROM users WHERE username='$setownerraw' AND blockcasinos='1'"));
                    if ($anum_true == "1"){
                        die("<font size=2 face=verdana color=silver>$setownerraw doesnt allow Horse Racing to be sent to him/her.</font>");}

                    $anum_true=mysql_num_rows(mysql_query("SELECT * FROM protection WHERE username='$setownerraw'"));
                    if ($anum_true == "1"){
                        die("<font size=2 face=verdana color=silver>$setownerraw is under protection!</font>");}

                    if($setowner == $ownername){$showoutcome++; $outcome = "You already own the track!";}
                    elseif($setownerinforows == '0'){$showoutcome++; $outcome = "No such user!";}
                    elseif($setownerstatus == 'Dead'){$showoutcome++; $outcome = "You cannot send a casino to a dead player!";}
                    elseif(($ssskkk > '25')&&($userrankid < '25')){$showoutcome++; $outcome = "You cannot send a casino to a staff member!";}
                    else{

                        $cunt = mysql_num_rows(mysql_query("SELECT * FROM casinos WHERE owner = '$setowner' AND type = 'casi'"));
                        $cunts = mysql_num_rows(mysql_query("SELECT * FROM casinos WHERE owner = '$setowner' AND casino = 'Races'"));
                        if($cunt > '3' AND $setowner != 'None'){die('<font color=white face=verdana size=1>That user already has 2 casinos!</font>');}
                        if($cunts > '0' AND $setowner != 'None'){die('<font color=white face=verdana size=1>That user already has a greyhound!</font>');}

                        $penpoint = mysql_num_rows(mysql_query("SELECT * FROM ipadresses WHERE ip = '$userip' AND username = '$setowner'"));
                        if(($penpoint > '0')&&($setowner != $username)){ mysql_query("UPDATE users SET penpoints = penpoints + 1 WHERE username = '$username'");
                            $reason = "$username sent $userlocation races to $setowner";
                            mysql_query("INSERT INTO penpoints(username,reason) VALUES('$username','$reason')");}

                        mysql_query("UPDATE casinos SET buyback = '0' WHERE casino = 'Races' AND location = '$userlocation'");
                        mysql_query("UPDATE casinos SET owner = '$setowner' WHERE casino= 'Races' AND location = '$userlocation'");
                        mysql_query("UPDATE casinos SET nickname = '$setownerraw' WHERE casino= 'Races' AND location = '$userlocation'");
                        mysql_query("UPDATE casinos SET maxbet = '250000' WHERE casino= 'Races' AND location = '$userlocation'");
                        $showoutcome++; $outcome = "You gave the casino to <a href=viewprofile.php?username=$setowner><b>$setownerraw</b>!</a>";
                        mysql_query("DELETE FROM buycasinos WHERE city = '$userlocation' AND type = 'Races'");

                        mysql_query("UPDATE users SET notify = '1', notification = 'a_open$usernameone a_closed$usernameone a_slashsent you $userlocation Race.' WHERE username = '$ssskkkid'");}}}

            if(($owner != '0')||($userrankid == '100')){
                if(isset($_POST['setpricerace'])) {
                    mysql_query("DELETE FROM buycasinos WHERE type = 'Races' AND city = '$userlocation'");
                    $buytime = time()+86400;
                    mysql_query("INSERT INTO buycasinos(username,time,city,price,type)
VALUES ('$ownername','$buytime','$userlocation','$price','Races')");
                    $showoutcome++; $outcome = "The casino has been added to quicktrade!";}}

            if(($owner != '0')||($userrankid == '100')){
                if(isset($_POST['setbuybackrace'])){
                    if($buyback < 1){ mysql_query("UPDATE casinos SET buyback = '0' WHERE casino= 'Races' AND location = '$userlocation'");
                        $showoutcome++; $outcome = "You buyback has been removed!"; }
                    elseif($buyback < 500){ $showoutcome++; $outcome = "Minimum buy back is 500 points!"; }
                    elseif($buyback > $userpoints){ $showoutcome++; $outcome = "You can not afford this buy back!"; }
                    else{
                        mysql_query("UPDATE casinos SET buyback = '$buyback' WHERE casino= 'Races' AND location = '$userlocation'");
                        $showoutcome++; $outcome = "Your casino buyback has been set!";}}}

            if(($owner != '0')||($userrankid == '100')){
                if(isset($_POST['resetraceprofit'])) {
                    $showoutcome++; $outcome = "Profit reset!";
                    mysql_query("UPDATE casinos SET profit = '0' WHERE casino= 'Races' AND location = '$userlocation'");}}

            if($owner == '0' AND $ownername != 'None'){
                if(isset($_POST['color'])){
                    if(!$bet){$showoutcome++; $outcome = "You did not enter an amount to bet!";}
                    elseif($bet > $usermoney){$showoutcome++; $outcome = "You dont have that much money!";}
                    elseif($bet > $ownermaxbet){$showoutcome++; $outcome = "The maxbet is set at <b>$ownermaxbettwo</b>!";}
                    else{
                        $rand = mt_rand(35,390);
                        $rr = rand(0,2);
                        if(($rr == '0')&&($rand < '200')){
                            $rand = mt_rand(35,390);}

                        $betformat = number_format($bet);
                        if($_POST['color']==2){ $times = '2'; $chose = 'Green'; }
                        elseif($_POST['color']==3){ $times = '3'; $chose = 'Orange'; }
                        elseif($_POST['color']==5){ $times = '5'; $chose = 'Pink'; }
                        elseif($_POST['color']==8){ $times = '8'; $chose = 'White'; }
                        else{ $times = '40'; $chose = 'Black'; }

                        $winraw = $bet * $times;
                        $winformat = number_format($winraw);
                        $realwin = $winraw - $bet;

                        if($rand <= 200){$winner = "Green";}
                        elseif(($rand > 195)&&($rand <= 292)){$winner = "Orange";}
                        elseif(($rand > 292)&&($rand <= 351)){$winner = "Pink";}
                        elseif(($rand > 351)&&($rand <= 383)){$winner = "White";}
                        else{$winner = "Black";}
                        if($chose == $winner){$showoutcome++; $outcome ="<table class=\"menuTable curve10px\" id=\"mainTable\" cellspacing=\"0\" cellpadding=\"0\">
                    <tbody><tr>
                        <td class=\"topleft\"></td>
                        <td class=\"top\"></td>
                        <td class=\"topright\"></td>
                    </tr>
                    <tr>
                        <td class=\"left\"></td>
                        <td>
                            <div class=\"main\">
                                <div class=\"menuHeader noTop\" style=\"padding-top: 6px;\">
                                    Result
                                </div>
                                <div style=\"padding: 5px; padding-top: 21px; font-size: 12px; padding-bottom: 15px; text-align: center; color: #ffffff;\">You chose the <b>".strtoupper($chose)."</b> horse,
                                    and the <b>".strtoupper($winner)."</b> horse won!
                                    <div style=\"padding-top: 5px;\">
                                        <span style=\"color: lime;\">You won <b>$$winformat</b>!</span> </div>
                            </div>
                            <div class=\"spacer\"></div>
                            <div class=\"break\" style=\"padding-top: 10px;\"></div>
                        </td>
                        <td class=\"right\"></td>
                    </tr>
                    <tr>
                        <td class=\"bottomleft\"></td>
                        <td class=\"bottom\"></td>
                        <td class=\"bottomright\"></td>
                    </tr>
                    </tbody></table>";
                            mysql_query("INSERT INTO `casinoracebets` (username,location,result,amount,time,bet) VALUES ('$usernameone','$userlocation','win','$winraw','$today','$bet')");
                            if($chose == $winner AND $ownermoney <= $realwin){$showoutcome++; $outcome = "Your chosen dog won the race! You won <font color=yellow>$<b>$winformat</font></b>! <b>You won all of the owners cash, you now own the casino!</b>";

                                if($ownermoney == '0'){$new = '1';}else{$new = '0';}
                                mysql_query("INSERT INTO moneylogs(`username`,`id`,`action`,`time`,`where`) VALUES ('$usernameone','','Won $$winformat on races from $ownername','$datetime','races')");
                                mysql_query("INSERT INTO moneylogs(`username`,`id`,`action`,`time`,`where`) VALUES ('$ownername','','$usernameone won $$winformat from this race','$datetime','races')");

                                mysql_query("UPDATE users SET money = '$new' WHERE ID = '$ownersid' AND money = '$ownermoney'");
                                if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error minus cash one.</font>');}
                                mysql_query("UPDATE users SET money = (money + $ownermoney + 1) WHERE ID = '$ida' AND money >= '$bet'");
                                if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 1.</font>');}
                                mysql_query("UPDATE casinoprofit SET races = races + '$ownermoney', overall = overall + '$ownermoney' WHERE username = '$usernameone'");
                                mysql_query("DELETE FROM buycasinos WHERE city = '$userlocation' AND type = 'Races'");
                                mysql_query("UPDATE users SET casinos = casinos + 1 WHERE ID = '$ida'");
                                mysql_query("UPDATE casinos SET profit = profit - $realwin WHERE casino = 'Races' AND location = '$userlocation'");
                                mysql_query("UPDATE casinos SET owner = '$username' WHERE casino = 'Races' AND location = '$userlocation'");
                                mysql_query("UPDATE casinos SET nickname = '$username' WHERE casino = 'Races' AND location = '$userlocation'");
                                mysql_query("UPDATE casinos SET buyback = '0' WHERE casino = 'Races' AND location = '$userlocation'");
                                mysql_query("UPDATE casinos SET maxbet = '250000' WHERE casino = 'Races' AND location = '$userlocation'");

                                if($getbuyback > 0 AND $ownerpoints >= $getbuyback){
                                    mysql_query("UPDATE users SET points = points + $getbuyback WHERE ID = '$ida'");
                                    mysql_query("UPDATE users SET points = points - $getbuyback WHERE ID = '$getsugid'");
                                    mysql_query("UPDATE casinos SET owner = '$ownername', maxbet = '0' WHERE casino = 'Races' AND location = '$userlocation'");
                                    mysql_query("UPDATE users SET notification = 'a_open$usernameone a_closed$usernameone a_slashwon your races.', notify = (notify + 1) WHERE ID = '$getsugid'");
                                }}
                            else{

                                mysql_query("UPDATE users SET money = (money - $realwin) WHERE ID = '$ownersid' AND money >= '$realwin'");
                                if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error minus cash two.</font>');}
                                mysql_query("UPDATE users SET money = money + $realwin WHERE ID = '$ida' AND money >= '$bet'");
                                if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 2.</font>');}

                                mysql_query("UPDATE casinoprofit SET races = races + '$realwin', overall = overall + '$realwin' WHERE username = '$usernameone'");
                                mysql_query("UPDATE casinos SET profit = profit - $realwin WHERE casino = 'Races' AND location = '$userlocation'");}}
                        else{
                            $showoutcome++; $outcome = "<table class=\"menuTable curve10px\" id=\"mainTable\" cellspacing=\"0\" cellpadding=\"0\">
                    <tbody><tr>
                        <td class=\"topleft\"></td>
                        <td class=\"top\"></td>
                        <td class=\"topright\"></td>
                    </tr>
                    <tr>
                        <td class=\"left\"></td>
                        <td>
                            <div class=\"main\">
                                <div class=\"menuHeader noTop\" style=\"padding-top: 6px;\">
                                    Result
                                </div>
                                <div style=\"padding: 5px; padding-top: 21px; font-size: 12px; padding-bottom: 15px; text-align: center; color: #ffffff;\">You chose the <b>".strtoupper($chose)."</b> horse,
                                    but the <b>".strtoupper($winner)."</b> horse won!
                                    <div style=\"padding-top: 5px;\">
                                        <span style=\"color: red;\">You lost <b>$$betformat</b>!</span> </div>
                            </div>
                            <div class=\"spacer\"></div>
                            <div class=\"break\" style=\"padding-top: 10px;\"></div>
                        </td>
                        <td class=\"right\"></td>
                    </tr>
                    <tr>
                        <td class=\"bottomleft\"></td>
                        <td class=\"bottom\"></td>
                        <td class=\"bottomright\"></td>
                    </tr>
                    </tbody></table>";
                            mysql_query("INSERT INTO `casinoracebets` (username,location,result,amount,time,bet) VALUES ('$usernameone','$userlocation','lost','$bet','$today','$bet')");
                            mysql_query("INSERT INTO moneylogs(`username`,`id`,`action`,`time`,`where`) VALUES ('$usernameone','','Lost $$betformat on races to $ownername','$datetime','races')");
                            mysql_query("INSERT INTO moneylogs(`username`,`id`,`action`,`time`,`where`) VALUES ('$ownername','','$usernameone lost $$betformat to this race','$datetime','races')");
                            mysql_query("UPDATE users SET money = money - '$bet' WHERE ID = '$ida' AND money >= '$bet'");
                            if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 3.</font>');}
                            mysql_query("UPDATE casinoprofit SET races = races - '$bet', overall = overall - '$bet' WHERE username = '$usernameone'");
                            mysql_query("UPDATE users SET money = money + '$bet' WHERE ID = '$ownersid'");
                            mysql_query("UPDATE casinos SET profit = profit + $bet WHERE casino = 'Races' AND location = '$userlocation'");}}}}

            if(($ownername == 'None')){
                if(isset($_POST['takeoverrace'])){
                    if($usermoney < '30000000'){$showoutcome++; $outcome = "You don't have enough money! Taking over a greyhound racing costs $<b>30,000,000</b>!";}
                    else{$showoutcome++; $outcome = "You now own the track!";
                        mysql_query("UPDATE users SET money = money - '30000000' WHERE ID = '$ida'");
                        mysql_query("UPDATE casinos SET owner = '$username' WHERE location = '$userlocation' AND casino = 'Races'");
                        mysql_query("UPDATE casinos SET nickname = '$username' WHERE location = '$userlocation' AND casino = 'Races'");
                        mysql_query("DELETE FROM buycasinos WHERE city = '$userlocation' AND type = 'Races'");}}}
            ?>
            <? if ($showoutcome >= 1) { ?>
                <? echo $outcome; ?>
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
                                Horse Racing
                            </div>
                            <div style="padding: 5px; margin: auto; text-align: center; color: #fefefe;">
                                <div style="margin: auto; padding-top: 16px; padding-bottom: 6px; text-align: center;">
                                    <?php
                                    if(($owner == '0')||($userrankid == '100')){?>
                                    <div style="font-size: 11px; margin-top: 25px;">
                                        <form method=post>
                                            <table class="regTable" style="min-width: 230px; width: 85%; max-width: 450px;" cellspacing="0" cellpadding="0" align="center">
                                                <tbody>
                                                <tr>
                                                    <td class="header" colspan="3">Races</td>
                                                </tr>
                                                <tr class="is-label">
                                                    <td class="col " style="border-left: 0; background: #336600; width: 1%;">
                                                        <input name="color" onclick="calc_return();" value="2" type="radio" <?php echo ($_POST['color'] == 2) ? 'checked' : '';?> >
                                                    </td>
                                                    <td class="col  is-label" style="background: #336600; width: 52%;">
                                                        <label for="option_GREEN" style="color: #ffffff;">GREEN<input type=submit name=doall style="visibility:hidden;width:1%;"></label>
                                                    </td>
                                                    <td class="col  is-label" style="background: #336600;">
                                                        <label for="option_GREEN" style="color: #ffffff;">2/1<input type=submit name=doall style="visibility:hidden;width:1%;"></label>
                                                    </td>
                                                </tr>
                                                <tr class="is-label">
                                                    <td class="col " style="border-left: 0; background: #e65c00; width: 1%;">
                                                        <input name=color onclick="calc_return();" value="3" type="radio" <?php echo ($_POST['color'] == 3) ? 'checked' : '';?> >
                                                    </td>
                                                    <td class="col  is-label" style="background: #e65c00; width: 52%;">
                                                        <label for="option_GREEN" style="color: #ffffff;">ORANGE<input type=submit name=doall style="visibility:hidden;width:1%;"></label>
                                                    </td>
                                                    <td class="col  is-label" style="background: #e65c00;">
                                                        <label for="option_GREEN" style="color: #ffffff;">3/1<input type=submit name=doall style="visibility:hidden;width:1%;"></label>
                                                    </td>
                                                </tr>
                                                <tr class="is-label">
                                                    <td class="col " style="border-left: 0; background: #ff6699; width: 1%;">
                                                        <input name=color onclick="calc_return();" value="5" type="radio" <?php echo ($_POST['color'] == 5) ? 'checked' : '';?> >
                                                    </td>
                                                    <td class="col  is-label" style="background: #ff6699; width: 52%;">
                                                        <label for="option_PINK" style="color: #ffffff;">PINK<input type=submit name=doall style="visibility:hidden;width:1%;"></label>
                                                    </td>
                                                    <td class="col  is-label" style="background: #ff6699;">
                                                        <label for="option_PINK" style="color: #ffffff;">5/1<input type=submit name=doall style="visibility:hidden;width:1%;"></label>
                                                    </td>
                                                </tr>
                                                <tr class="is-label">
                                                    <td class="col " style="border-left: 0; background: #1f1f1f; width: 1%;">
                                                        <input name=color onclick="calc_return();" value="40" type="radio" <?php echo ($_POST['color'] == 40) ? 'checked' : '';?> >
                                                    </td>
                                                    <td class="col  is-label" style="background: #1f1f1f; width: 52%;">
                                                        <label for="option_BLACK" style="color: #ffffff;">BLACK<input type=submit name=doall style="visibility:hidden;width:1%;"></label>
                                                    </td>
                                                    <td class="col  is-label" style="background: #1f1f1f;">
                                                        <label for="option_BLACK" style="color: #ffffff;">40/1<input type=submit name=doall style="visibility:hidden;width:1%;"></label>
                                                    </td>
                                                </tr>
                                                <tr class="is-label">
                                                    <td class="col " style="border-left: 0; background: #ffffff; width: 1%;">
                                                        <input name=color onclick="calc_return();" value="8" type="radio" <?php echo ($_POST['color'] == 8) ? 'checked' : '';?> >
                                                    </td>
                                                    <td class="col  is-label" style="background: #ffffff; width: 52%;">
                                                        <label for="option_WHITE" style="color: #000000;">WHITE<input type=submit style="visibility:hidden;width:1%;"></label>
                                                    </td>
                                                    <td class="col  is-label" style="background: #ffffff;">
                                                        <label for="option_WHITE" style="color: #000000;">8/1<input type=submit name=doall style="visibility:hidden;width:1%;"></label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="col is-btn-wrapper noTop" colspan="2">
                                                        <input tabindex="4" class="textarea" id="bet" onchange="calc_return()" name=bet style="border-left: 0; width: 100%; height: 28px;" value="<?echo$bet;?>" placeholder="Enter Bet..." type="text">
                                                    </td>
                                                    <td class="col is-btn-wrapper noTop">
                                                        <input class="textarea" style="width: 100%; height: 28px;" value="Place Bet" type="submit">
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </form>
                                        <div style="padding: 33px; padding-top: 32px;">
                                            Returns: <span style="color: #FFC753;">$<b id="returns">0</b></span>
                                        </div>
                                    </div>
                                        <script>
                                            function calc_return(){
												var return_money = document.getElementById('bet').value * document.querySelector('input[name="color"]:checked').value;
												var returns = String(return_money).replace(/(.)(?=(\d{3})+$)/g,'$1,');
												document.getElementById('returns').innerHTML = '' + returns;
												+'';
                                            }
                                        </script>
                                    <?}?>

                                    <div align="center">
                                    <?if(($owner != '0')||($userrankid >= '25')){?>
                                        <?if($getbuyback > 99){ $tellbb = "$getbuyback"; }else{ $tellbb = "None"; }?>
                                        <table class="regTable" style="margin-left: 10px; margin-right: 0; min-width: 230px; margin-bottom: 11px; width: 85%; max-width: 550px;text-align: center;" cellspacing="0" cellpadding="0" align="center">
                                            <tbody>
                                            <tr>
                                                <td class="header" colspan="3">
                                                    Edit Track Stats
                                                </td>
                                            </tr>
                                            <form method=post>
                                                <tr>
                                                    <td class="col noTop">
                                                        Set Maxbet:<input type=submit name=doall class=textbox style="visibility:hidden; width:1%;">
                                                    </td>
                                                    <td class="col noTop">
                                                        <input type=text name=setmaxrace class="textarea" style="width:100%; height:100%;">
                                                    </td>
                                                    <td class="col noTop">
                                                        <input type=submit value="Do it" class="textarea curve3px" name=setmaxsubmit>
                                                    </td>
                                                </tr>
                                            </form>
                                            <form method=post>
                                                <tr>
                                                    <td class="col">
                                                        Send Track:<input type=submit name=doall class=textbox style="visibility:hidden; width:1%;">
                                                    </td>
                                                    <td class="col">
                                                        <input type=text name=setownerrace class="textarea" style="width:100%; height:100%;">
                                                    </td>
                                                    <td class="col">
                                                        <input type=submit value="Do it" class="textarea curve3px" name=setownersubmit>
                                                    </td>
                                                </tr>
                                            </form>
                                            <form method=post>
                                                <tr>
                                                    <td class="col">
                                                        Sell Track:<input type=submit name=doall class=textbox style="visibility:hidden; width:1%;">
                                                    </td>
                                                    <td class="col">
                                                        <input type=text name=setpricerace class="textarea" style="width:100%; height:100%;">
                                                    </td>
                                                    <td class="col">
                                                        <input type=submit value="Do it" class="textarea curve3px" name=setpricesubmit>
                                                    </td>
                                                </tr>
                                            </form>
                                            <form method=post>
                                                <tr>
                                                    <td class="col">
                                                        Set Buyback:<input type=submit name=doall class=textbox style="visibility:hidden; width:1%;">
                                                    </td>
                                                    <td class="col">
                                                        <input type=text name=setbuybackrace class="textarea" style="width:100%; height:100%;">
                                                    </td>
                                                    <td class="col">
                                                        <input type=submit value="Do it" class="textarea curve3px" name=setbuybacksubmit>
                                                    </td>
                                                </tr>
                                            </form>
                                            <form method=post>
                                                <tr>
                                                    <td class="col" colspan="3" style="text-align: center;">
                                                        <input type=submit value="Reset Profit" class="textarea curve3px" name=resetraceprofit>
                                                    </td>
                                                </tr>
                                            </form>
                                            </tbody>
                                        </table>
                                        <?}?>
                                    </div>
                                <?php
                                if (($ownername == 'None')) {
                                    echo '<form method=post><input type=submit value="Take Over Casino" class="textarea curve3px" name=takeoverrace></form>';
                                }?>
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