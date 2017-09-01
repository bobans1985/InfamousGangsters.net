<? include 'included.php'; session_start(); ?>
<?
$time = time();
$times = $time + 300;
$jailtime = $time + 120;
$saturate = "/[^a-z0-9]/i";
$saturated = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$userip = $_SERVER[REMOTE_ADDR];
$getida = $_GET['dropid'];
$getid = preg_replace($saturated,"",$getida);
$gangsterusername = $usernameone;

$jailtest = mysql_query("SELECT username FROM jail WHERE username  = '$gangsterusername'");
$jailtester = mysql_num_rows($jailtest);
if($jailtester != '0'){die(include 'jaill.php'); }
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

         {
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
            $statustest = mysql_query("SELECT * FROM users WHERE username = '$usernameone'")or die(mysql_error());
            $statustesttwo = mysql_fetch_array($statustest);
            $getuserinfoarray = $statustesttwo;
            $getname = $getuserinfoarray['username'];
            $userlocation = $getuserinfoarray['location'];
            $health = ceil($getuserinfoarray['health']);
            $rankid = $getuserinfoarray['rankid'];
            $userrankid = $getuserinfoarray['rankid'];
            $userpoints = $getuserinfoarray['points'];
            $usermoney = $getuserinfoarray['money'];
            $newlocation = $_GET['location'];

            if($_POST['travel']==1){
                $lasvegas = true;
            }
            if($_POST['travel']==2){
                $losangeles = true;
            }
            if($_POST['travel']==3){
                $newyork = true;
            }
            if($_POST['travel']==4){
                $chicago = true;
            }
            if($_POST['travel']==5){
                $miami = true;
            }
            if($_POST['travel']==6){
                $seatle = true;
            }
            if($_POST['travel']==7){
                $dallas = true;
            }
            if($newlocation == 1){ $newlocation = "Las Vegas"; }
            elseif($newlocation == 2){ $newlocation = "Los Angeles"; }
            elseif($newlocation == 3){ $newlocation = "New York"; }
            elseif($newlocation == 4){ $newlocation = "Chicago"; }
            elseif($newlocation == 5){ $newlocation = "Miami"; }
            elseif($newlocation == 6){ $newlocation = "Seatle"; }
            elseif($newlocation == 7){ $newlocation = "Dallas"; }
            $makenewmaybe = mysql_num_rows(mysql_query("SELECT owner FROM casinos WHERE owner = '$usernameone' AND casino = 'Airport' AND location = '$newlocation'"));
            if($makenewmaybe > 0){ $userlocation = "$newlocation"; }

            $withraw = $_POST['car'];
            $toraw = $_POST['to'];
            $with = preg_replace($saturated,"",$withraw);
            $to = preg_replace($saturated,"",$toraw);

            $entertainertests = mysql_query("SELECT username FROM entertainers WHERE username  = '$gangsterusername'");
            $entertainers = mysql_num_rows($entertainertests);
            if($entertainers != '0'){die('<font color=white face=verdana size=1>As entertainer you cannot view this page</font>');}

            $ownersql = mysql_query("SELECT * FROM casinos WHERE casino = 'Airport' AND owner = '$usernameone' AND location = '$userlocation'");
            $owner = mysql_num_rows($ownersql);
            $ownerinfosql = mysql_query("SELECT * FROM casinos WHERE casino = 'Airport' AND location = '$userlocation'");
            $ownerinfoarray = mysql_fetch_array($ownerinfosql);
            $ownername = $ownerinfoarray['owner'];
            $ownermaxbet = $ownerinfoarray['maxbet'];
            $ownerprofit = $ownerinfoarray['profit'];
            $ownerprofittwo = number_format($ownerinfoarray['profit']);
            $ownermaxbettwo = number_format($ownerinfoarray['maxbet']);
            $ownerstatssql = mysql_query("SELECT * FROM users WHERE username = '$ownername'");
            $ownerstatsarray = mysql_fetch_array($ownerstatssql);
            $ownermoney = $ownerstatsarray['money'];

            $saturated = "/[^0-9]/i";
            $setownerrawraw = mysql_real_escape_string($_POST['setownerbuy']);
            $priceraw = mysql_real_escape_string($_POST['setpricebuy']);
            $vera = mysql_real_escape_string($_POST['ver']);

            $ver = preg_replace($saturate,"",$vera);
            $amount = preg_replace($saturated,"",$amounta);
            $setownerraw = preg_replace($saturate,"",$setownerrawraw);
            $price = preg_replace($saturated,"",$priceraw);
            $give = preg_replace($saturated,"",$givea);
            $setmaxtwo = number_format($setmax);

            if(($ownername == 'None')){
                if(isset($_POST['takeoverbuy'])){
                    if($usermoney < '50000000'){$showoutcome++; $outcome = "You don't have enough money! Taking over an airport costs $<b>50,000,000</b>!</font>";}
                    else{$showoutcome++; $outcome = "You now own this Airport!";
                        mysql_query("UPDATE users SET money = money - '50000000' WHERE username = '$usernameone'");
                        mysql_query("UPDATE casinos SET owner = '$usernameone' WHERE location = '$userlocation' AND casino = 'Airport'");
                        mysql_query("UPDATE casinos SET nickname = '$usernameone' WHERE location = '$userlocation' AND casino = 'Airport'");
                        mysql_query("DELETE FROM buycasinos WHERE city = '$userlocation' AND type = 'Airport'");}}}

            if($_POST["dropCasino"]){
                mysql_query("UPDATE casinos SET owner = 'None' WHERE casino='Airport' AND location = '$userlocation' AND owner = '".$usernameone."'");
            }

            if($_POST['cost_travel']){
                if($_POST['cost_travel']=='5 points'){
                    mysql_query("UPDATE casinos SET profit = 5 WHERE location = '$userlocation' AND casino = 'Airport'");
                    $showoutcome++;
                    $outcome = "You set the price to <b>5 points</b>!</font>";
                }elseif($_POST['cost_travel']=='10 points'){
                    mysql_query("UPDATE casinos SET profit = 10 WHERE location = '$userlocation' AND casino = 'Airport'");
                    $showoutcome++;
                    $outcome = "You set the price to <b>10 points</b>!</font>";
                }elseif($_POST['cost_travel']=='15 points'){
                    mysql_query("UPDATE casinos SET profit = 15 WHERE location = '$userlocation' AND casino = 'Airport'");
                    $showoutcome++;
                    $outcome = "You set the price to <b>15 points</b>!</font>";
                }
            }


            $ownerinfosql = mysql_query("SELECT * FROM casinos WHERE casino = 'Airport' AND location = '$userlocation'");
            $ownerinfoarray = mysql_fetch_array($ownerinfosql);
            $ownername = $ownerinfoarray['owner'];
            $ownerprofit = $ownerinfoarray['profit'];

            if(($owner != '0')||($userrankid == '100')){
                if(isset($_POST['resetbuyprofit'])) {
                    $showoutcome++; $outcome = "Profit reset!</font>";
                    mysql_query("UPDATE casinos SET profit = '0' WHERE casino= 'Airport' AND location = '$userlocation'");}}

            if(($owner != '0')||($userrankid == '100')){
                if(isset($_POST['setpricebuy'])) {
                    mysql_query("DELETE FROM buycasinos WHERE type = 'Airport' AND city = '$userlocation'");
                    $buytime = time()+86400;
                    mysql_query("INSERT INTO buycasinos(username,time,city,price,type)
VALUES ('$ownername','$buytime','$userlocation','$price','Airport')");
                    $showoutcome++; $outcome = "The casino has been added to quicktrade!</font>";
                }}

            $getuserinfoarray = $statustesttwo;
            $userlocation = $getuserinfoarray['location'];

            if($userlocation == 'Las Vegas'){$goto = 1;}
            elseif($userlocation == 'Los Angeles'){$goto = 2;}
            elseif($userlocation == 'New York'){$goto = 3;}
            elseif($userlocation == 'Chicago'){$goto = 4;}
            elseif($userlocation == 'Miami'){$goto = 5;}
            elseif($userlocation == 'Seatle'){$goto = 6;}
            elseif($userlocation == 'Dallas'){$goto = 7;}

            if($lasvegas){$dest = 'Las Vegas';}
            elseif($losangeles){$dest = 'Los Angeles';}
            elseif($newyork){$dest = 'New York';}
            elseif($chicago){$dest = 'Chicago';}
            elseif($miami){$dest = 'Miami';}
            elseif($seatle){$dest = 'Seatle';}
            elseif($dallas){$dest = 'Dallas';}

            $blackjack = mysql_query("SELECT * FROM blackjack WHERE username = '$gangsterusername'");
            $blackjackrows = mysql_num_rows($blackjack);
            if($blackjackrows > 0){die('<font color=white face=verdana size=1><center>You cannot travel while in a blackjack game</center></font>');}
            $travelchecka = mysql_query("SELECT * FROM travel WHERE username = '$gangsterusername'");
            $travelcheck = mysql_num_rows($travelchecka);
            $travelif = mysql_fetch_array($travelchecka);
            $destination = $travelif['goto'];
            $timeleftraw = $travelif['time'];
            $travelid = $travelif['carid'];
            $timeleft = $timeleftraw - $time;
            $button = ceil($time / 45);
            $timeleft=0;
//            if(($travelcheck > '0')&&($timeleft <= 0)){$showoutcome++; $outcome = "You arrived in $destination!</font>";
//                mysql_query("UPDATE users SET location = '$destination' WHERE username = '$gangsterusername'");
//                mysql_query("DELETE FROM travel WHERE username = '$gangsterusername'");
//            }
//            elseif(($travelcheck > '0')&&($timeleft > 0)){$showoutcome++; $outcome = "You will arrive in $destination in $timeleft seconds!</font>";}
            if($_POST["travel"]){
                $a = mysql_query("SELECT * FROM casinos WHERE location = '$userlocation' AND casino = 'Airport'");
                $b = mysql_fetch_array($a);
                $r_price = $b['profit'];
//                if($userlocation == $dest){$showoutcome++; $outcome = "You are already in <b>$userlocation</b>!</font>";}
                if($userpoints < $r_price){$showoutcome++; $outcome = "You can not afford this flight!</font>";}
//                elseif($travelcheck != '0'){}
                else{
                    mysql_query("UPDATE users SET points = (points + $r_price) WHERE username = '$ownername'");
                    mysql_query("UPDATE users SET points = (points - $r_price) WHERE username = '$gangsterusername'");
                    mysql_query("UPDATE users SET location = '$dest' WHERE username = '$gangsterusername'");

                    if($dest == 'Las Vegas'){$d="Las Vegas, Nevada";}
                    elseif($dest == 'Los Angeles'){$d="Los Angeles, California";}
                    elseif($dest == 'New York'){$d="New York City, New York";}
                    elseif($dest == 'Chicago'){$d="Chicago, Illionis";}
                    elseif($dest == 'Miami'){$d="Miami, Florida";}
                    elseif($dest == 'Seatle'){$d="Seatle, Washington";}
                    elseif($dest == 'Dallas'){$d="Dallas, Texas";}

                    $showoutcome++; $outcome = "Welcome to <span style=\"color: #FFC753;\"><b>$d</b>!</span></font>";
                    $userlocation = $dest;
                    $ownerinfosql = mysql_query("SELECT * FROM casinos WHERE casino = 'Airport' AND location = '$userlocation'");
                    $ownerinfoarray = mysql_fetch_array($ownerinfosql);
                    $ownername = $ownerinfoarray['owner'];
                }}

            if($makenewmaybe > 0){ $userlocation = "$newlocation"; }

            if(($owner != '0')||($userrankid == '100')){
                $setownerinfosql = mysql_query("SELECT * FROM users WHERE username = '$setownerraw'");
                $setownerinfoarray = mysql_fetch_array($setownerinfosql);
                $setownerinforows = mysql_num_rows($setownerinfosql);
                $setowner = $setownerinfoarray['username'];
                $setownerstatus = $setownerinfoarray['status'];
                $ssskkk = $setownerinfoarray['rankid'];
                $ssskkkid = $setownerinfoarray['ID'];

                if(isset($_POST['setownerbuy'])) {
                    if(!$setowner){die ('');}

                    $anum_true=mysql_num_rows(mysql_query("SELECT * FROM users WHERE username='$setownerraw' AND blockcasinos='1'"));
                    if ($anum_true == "1"){
                        die("<font size=2 face=verdana color=silver>$setownerraw doesnt allow Airports to be sent to him/her.</font>");}

                    if($setowner == $ownername){$showoutcome++; $outcome = "You already own this airport!</font>";}
                    elseif($setownerinforows == '0'){$showoutcome++; $outcome = "No such user!</font>";}
                    elseif(($ssskkk > '25')&&($userrankid != '100')){$showoutcome++; $outcome = "You cannot send this airport to a staff member!</font>";}
                    elseif($setownerstatus == 'Dead'){$showoutcome++; $outcome = "You cannot send this airport to dead player!</font>";}
                    else{

                        $cunt = mysql_num_rows(mysql_query("SELECT * FROM casinos WHERE owner = '$setowner'"));
                        $cunts = mysql_num_rows(mysql_query("SELECT * FROM casinos WHERE owner = '$setowner' AND casino = 'Airport'"));
                        if($cunt > '3' AND $setowner != 'None'){die('<font color=white face=verdana size=1>That user already has 2 properties!</font>');}
                        if($cunts > '0' AND $setowner != 'None'){die('<font color=white face=verdana size=1>That user already has a Airport!</font>');}

                        $penpoint = mysql_num_rows(mysql_query("SELECT * FROM ipadresses WHERE ip = '$userip' AND username = '$setowner'"));
                        if(($penpoint > '0')&&($setowner != $username)){ mysql_query("UPDATE users SET penpoints = penpoints + 1 WHERE username = '$username'");
                            $reason = "$username sent $userlocation airport to $setowner";
                            mysql_query("INSERT INTO penpoints(username,reason) VALUES('$username','$reason')");}

                        mysql_query("UPDATE casinos SET owner = '$setowner' WHERE casino = 'Airport' AND location = '$userlocation'");
                        mysql_query("UPDATE casinos SET nickname = '$setownerraw' WHERE casino = 'Airport' AND location = '$userlocation'");
                        $showoutcome++; $outcome = "You gave the airport to <a href=viewprofile.php?username=$setowner><b>$setownerraw</b>!</font></a>";
                        mysql_query("DELETE FROM buycasinos WHERE city = '$userlocation' AND type = 'Airport'");

                        mysql_query("UPDATE users SET notify = '1', notification = 'a_open$usernameone a_closed$usernameone a_slashsent you $userlocation Airport.' WHERE username = '$ssskkkid'");}}}
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
                                Travel by Airport
                            </div>
                            <div style="padding: 5px; margin: auto; text-align: center; color: #fefefe;">
                                <center style="margin: auto; padding-top: 16px; padding-bottom: 6px; text-align: center;">
                                    <style>
                                        .info {
                                            display: block;
                                            font-size: 12.5px;
                                            margin-bottom: 17px;
                                        }

                                    </style>
                                    <? if ($showoutcome >= 1) { ?>
                                        <span class="info js-parent" data-finish-text="...">
                                            <? echo $outcome; ?>
                                        </span>
                                    <? } ?>
                                    <form method="post" style="font-size: 11px;">
                                        <table class="regTable" style="margin-top: 35px; margin-bottom: 15px; min-width: 230px; width: 85%; max-width: 450px;" cellspacing="0" cellpadding="0" align="center">
                                            <tbody><tr>
                                                <td class="header" colspan="3">
                                                    Select Destination
                                                </td>
                                            </tr>
                                            <?if($userlocation != "Las Vegas"){?>
                                                <tr class="is-label">
                                                    <td class="col " style="border-left: 0; width: 1%;">
                                                        <input name="travel" id="option_1" value="1" type="radio">
                                                    </td>
                                                    <td class="col  is-label" style="width: 52%;">
                                                        <label for="option_1" style=""> Las Vegas, Nevada</label>
                                                    </td>
                                                </tr>
                                            <?}else {?>
                                                <tr class="is-label">
                                                    <td class="col " style="border-left: 0; width: 1%;">
                                                        <input disabled="disabled" id="option_1" name="travel" value="1" type="radio">
                                                    </td>
                                                    <td class="col  is-label" style="width: 52%;">
                                                        <label for="option_1" style=""><span style="float: right; color: silver;">- CURRENT LOCATION -</span> Las Vegas, Nevada</label>
                                                    </td>
                                                </tr>
                                            <?}?>
                                            <?if($userlocation != "New York"){?>
                                                <tr class="is-label">
                                                    <td class="col " style="border-left: 0; width: 1%;">
                                                        <input name="travel" id="option_3" value="3" type="radio">
                                                    </td>
                                                    <td class="col  is-label" style="width: 52%;">
                                                        <label for="option_3" style=""> New York City, New York</label>
                                                    </td>
                                                </tr>
                                            <?}else {?>
                                                <tr class="is-label">
                                                    <td class="col " style="border-left: 0; width: 1%;">
                                                        <input disabled="disabled" id="option_3" name="travel" value="3" type="radio">
                                                    </td>
                                                    <td class="col  is-label" style="width: 52%;">
                                                        <label for="option_3" style=""><span style="float: right; color: silver;">- CURRENT LOCATION -</span> New York City, New York</label>
                                                    </td>
                                                </tr>
                                            <?}?>
                                            <?if($userlocation != "Seatle"){?>
                                                <tr class="is-label">
                                                    <td class="col " style="border-left: 0; width: 1%;">
                                                        <input name="travel" id="option_6" value="6" type="radio">
                                                    </td>
                                                    <td class="col  is-label" style="width: 52%;">
                                                        <label for="option_6" style=""> Seatle, Washington</label>
                                                    </td>
                                                </tr>
                                            <?}else {?>
                                                <tr class="is-label">
                                                    <td class="col " style="border-left: 0; width: 1%;">
                                                        <input disabled="disabled" id="option_6" name="travel" value="6" type="radio">
                                                    </td>
                                                    <td class="col  is-label" style="width: 52%;">
                                                        <label for="option_6" style=""><span style="float: right; color: silver;">- CURRENT LOCATION -</span> Seatle, Washington</label>
                                                    </td>
                                                </tr>
                                            <?}?>
                                            <?if($userlocation != "Chicago"){?>
                                                <tr class="is-label">
                                                    <td class="col " style="border-left: 0; width: 1%;">
                                                        <input name="travel" id="option_4" value="4" type="radio">
                                                    </td>
                                                    <td class="col  is-label" style="width: 52%;">
                                                        <label for="option_4" style=""> Chicago, Illinois</label>
                                                    </td>
                                                </tr>
                                            <?}else {?>
                                                <tr class="is-label">
                                                    <td class="col " style="border-left: 0; width: 1%;">
                                                        <input disabled="disabled" id="option_4" name="travel" value="4" type="radio">
                                                    </td>
                                                    <td class="col  is-label" style="width: 52%;">
                                                        <label for="option_4" style=""><span style="float: right; color: silver;">- CURRENT LOCATION -</span> Chicago, Illinois</label>
                                                    </td>
                                                </tr>
                                            <?}?>
                                            <?if($userlocation != "Dallas"){?>
                                                <tr class="is-label">
                                                    <td class="col " style="border-left: 0; width: 1%;">
                                                        <input name="travel" id="option_7" value="7" type="radio">
                                                    </td>
                                                    <td class="col  is-label" style="width: 52%;">
                                                        <label for="option_7" style=""> Dallas, Texas</label>
                                                    </td>
                                                </tr>
                                            <?}else {?>
                                                <tr class="is-label">
                                                    <td class="col " style="border-left: 0; width: 1%;">
                                                        <input disabled="disabled" id="option_7" name="travel" value="7" type="radio">
                                                    </td>
                                                    <td class="col  is-label" style="width: 52%;">
                                                        <label for="option_7" style=""><span style="float: right; color: silver;">- CURRENT LOCATION -</span> Dallas, Texas</label>
                                                    </td>
                                                </tr>
                                            <?}?>
                                            <?if($userlocation != "Los Angeles"){?>
                                                <tr class="is-label">
                                                    <td class="col " style="border-left: 0; width: 1%;">
                                                        <input name="travel" id="option_2" value="2" type="radio">
                                                    </td>
                                                    <td class="col  is-label" style="width: 52%;">
                                                        <label for="option_2" style=""> Los Angeles, California</label>
                                                    </td>
                                                </tr>
                                            <?}else {?>
                                                <tr class="is-label">
                                                    <td class="col " style="border-left: 0; width: 1%;">
                                                        <input disabled="disabled" id="option_2" name="travel" value="2" type="radio">
                                                    </td>
                                                    <td class="col  is-label" style="width: 52%;">
                                                        <label for="option_2" style=""><span style="float: right; color: silver;">- CURRENT LOCATION -</span> Los Angeles, California</label>
                                                    </td>
                                                </tr>
                                            <?}?>
                                            <?if($userlocation != "Miami"){?>
                                                <tr class="is-label">
                                                    <td class="col " style="border-left: 0; width: 1%;">
                                                        <input name="travel" id="option_5" value="5" type="radio">
                                                    </td>
                                                    <td class="col  is-label" style="width: 52%;">
                                                        <label for="option_5" style=""> Miami, Florida</label>
                                                    </td>
                                                </tr>
                                            <?}else {?>
                                                <tr class="is-label">
                                                    <td class="col " style="border-left: 0; width: 1%;">
                                                        <input disabled="disabled" id="option_5" name="travel" value="5" type="radio">
                                                    </td>
                                                    <td class="col  is-label" style="width: 52%;">
                                                        <label for="option_5" style=""><span style="float: right; color: silver;">- CURRENT LOCATION -</span> Miami, Florida</label>
                                                    </td>
                                                </tr>
                                            <?}?>
                                            </tbody>
                                        </table>
                                        <input class="textarea curve3px" name="submit" style="padding-left: 8px; padding-right: 8px; margin-top: 4px; margin-bottom: 3px;" value="Travel!" type="submit">
                                    </form>

                                    <? if($ownername == $usernameone){ ?>
                                        <form method=post><input type=submit value="Abandon Airport" class="textarea curve3px" name=dropCasino></form>
                                    <? }else{ ?>
                                        <form method=post style="padding-top: 20px;">
                                            <input type=submit value="Take over Airport ($50.000.000)" class="textarea curve3px" name=takeoverbuy>
                                        </form>
                                    <? }?>
                                    <div class="break" style="padding-top: 32px;"></div>
                                    <div class="spacer"></div>
                                    <div style="padding-top: 23px; padding-bottom: 4px; color: #aaaaaa; font-size: 115%;">
                                        Owner: <a href="viewprofile.php?username=<?echo$ownername;?>" style="color: #ffffff;"><?echo$ownername;?></a><span style="color: #555555; padding-left: 7px; padding-right: 7px;"> - </span>
                                        Travel Time: <span style="color: white;">Instant</span><span style="color: #555555; padding-left: 7px; padding-right: 7px;"> - </span>
                                        Cost to Travel: <span style="color: #ffffff;"><?echo $ownerprofittwo;?> points</span>
                                    </div>
                                    <div class="break" style="padding-top: 15px;">
                                        <div class="spacer"></div>
                                        <div class="break" style="padding-top: 4px;"></div>
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