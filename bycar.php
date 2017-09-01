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

         {
            margin-top: 14px;
        }

        .btm-statbreak {
            height: 7px;
            display: block;
        }
    </style>
    <script>
        function crimesCountdown(load) {
            if (load) {
                var table = document.getElementById('notification');
                var inmates = table.getElementsByTagName('span');
                for (var i = 0; i < inmates.length; i++) {
                    if (inmates[i].id == 'countdown') {
                        var timeleft = parseInt(inmates[i].innerHTML);
                        if (timeleft > 0) {
                            if (timeleft == 1) {
                                inmates[i].innerHTML = '0';
                            } else {
                                inmates[i].innerHTML = timeleft - 1;
                            }
                        }
                    }
                }
            }
            setTimeout("crimesCountdown(true)", 1000);
        }
        window.onload = crimesCountdown;

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

            $getuserinfoarray = $statustesttwo;
            $userlocation = $getuserinfoarray['location'];
            $userid = $getuserinfoarray['rankid'];

            $travelchecka = mysql_query("SELECT * FROM travel WHERE username = '$gangsterusername'");
            $travelcheck = mysql_num_rows($travelchecka);
            $travelif = mysql_fetch_array($travelchecka);
            $destination = $travelif['goto'];
            $timeleftraw = $travelif['time'];
            $travelid = $travelif['carid'];
            $timeleft = $timeleftraw - $time;

            if($timeleft>0){
                $showoutcome++;
                if($destination == 'Las Vegas'){$d="Las Vegas, Nevada";}
                elseif($destination == 'Los Angeles'){$d="Los Angeles, California";}
                elseif($destination == 'New York'){$d="New York City, New York";}
                elseif($destination == 'Chicago'){$d="Chicago, Illionis";}
                elseif($destination == 'Miami'){$d="Miami, Florida";}
                elseif($destination == 'Seatle'){$d="Seatle, Washington";}
                elseif($destination == 'Dallas'){$d="Dallas, Texas";}
                $outcome = "You will arrive in <span style=\"color: silver;\">$d</span> in <span id='countdown'>$timeleft</span> seconds!";
            }

            if(($travelcheck > '0')&&($timeleft <= 0)){
                if($destination == 'Las Vegas'){$d="Las Vegas, Nevada";}
                elseif($destination == 'Los Angeles'){$d="Los Angeles, California";}
                elseif($destination == 'New York'){$d="New York City, New York";}
                elseif($destination == 'Chicago'){$d="Chicago, Illionis";}
                elseif($destination == 'Miami'){$d="Miami, Florida";}
                elseif($destination == 'Seatle'){$d="Seatle, Washington";}
                elseif($destination == 'Dallas'){$d="Dallas, Texas";}
                $showoutcome++; $outcome = "You arrived in <span style=\"color: #FFC753;\">$d!</span>";
                mysql_query("UPDATE users SET location = '$destination' WHERE username = '$gangsterusername'");
                $crashrand = rand(1,10);
                if($crashrand > 6){
                    $drand = rand(1,10);
                    mysql_query("UPDATE cars SET damage = damage + $drand WHERE id = $travelid AND owner = '$usernameone'");
                }
                $broken = mysql_query("SELECT * FROM cars WHERE id = $travelid");
                $brokenarray = mysql_fetch_array($broken);
                $brake = $brokenarray['damage'];
                mysql_query("DELETE FROM travel WHERE username = '$gangsterusername'");
                if($brake >= 100){
                    $showoutcome++;
                    $outcome = "Your car broke down at the end of the journey, you lost the car!</font>";
                    mysql_query("DELETE FROM cars WHERE id = $travelid");
                }
            }

            if(isset($_POST['submit'])){

                $withraw = $_POST['car'];

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
                    $staffland = true;
                }
                if($_POST['travel']==7){
                    $seatle = true;
                }
                if($_POST['travel']==8){
                    $dallas = true;
                }

                $with = preg_replace($saturated,"",$withraw);

                if($lasvegas){$dest = 'Las Vegas';}
                elseif($losangeles){$dest = 'Los Angeles';}
                elseif($newyork){$dest = 'New York';}
                elseif($chicago){$dest = 'Chicago';}
                elseif($miami){$dest = 'Miami';}
                elseif($staffland){$dest = 'Staff Land';}
                elseif($seatle){$dest = 'Seatle';}
                elseif($dallas){$dest = 'Dallas';}

                $carcheck = mysql_query("SELECT * FROM cars WHERE id = '$with'");
                $carchecka = mysql_num_rows($carcheck);
                $carcheckarray = mysql_fetch_array($carcheck);
                $carowner = $carcheckarray['owner'];
                $carspeed = $carcheckarray['speed'];
                $customt = $carcheckarray['carid'];

                $blackjack = mysql_query("SELECT * FROM blackjack WHERE username = '$gangsterusername'");
                $blackjackrows = mysql_num_rows($blackjack);
                if($blackjackrows > 0){die('<font color=white face=verdana size=1><center>You cannot travel while in a blackjack game</center></font>');}

                $button = ceil($time / 45);
                $gettheid = mysql_query("SELECT carid FROM cars WHERE id = '$travelid'");
                $getitnow = mysql_fetch_array($gettheid);
                $thecarid = $getitnow['carid'];

                if(($travelcheck > '0')&&($timeleft > 0)){
                    $showoutcome++;
                    if($destination == 'Las Vegas'){$d="Las Vegas, Nevada";}
                    elseif($destination == 'Los Angeles'){$d="Los Angeles, California";}
                    elseif($destination == 'New York'){$d="New York City, New York";}
                    elseif($destination == 'Chicago'){$d="Chicago, Illionis";}
                    elseif($destination == 'Miami'){$d="Miami, Florida";}
                    elseif($destination == 'Seatle'){$d="Seatle, Washington";}
                    elseif($destination == 'Dallas'){$d="Dallas, Texas";}
                    $outcome = "You will arrive in <span style=\"color: silver;\">$d</span> in <span id='countdown'>$timeleft</span> seconds!";}
                elseif($_POST["travel"]!=6){
                    if($userid >= 25){ mysql_query("UPDATE users SET location = '$dest' WHERE username = '$gangsterusername'");
                    $showoutcome++;
                    $outcome = "Your now in <span style=\"color: #FFC753;\">$dest</span>"; }
                    elseif($carchecka < '1'){}
                    elseif($carowner != $gangsterusername){}
                    elseif($customt >= 14 && $customt != 17){ $showoutcome++; $outcome = "You arrived in <span style=\"color: #FFC753;\">$dest!</span>";
                        mysql_query("UPDATE users SET location = '$dest' WHERE username = '$gangsterusername'"); }
                    elseif($travelcheck != '0'){}
                    else{
                        $newtime = $time + $carspeed;
                        mysql_query("INSERT INTO travel(username,time,carid,goto)
VALUES ('$gangsterusername','$newtime','$with','$dest')");}
                    $showoutcome++;
                    if($dest == 'Las Vegas'){$d="Las Vegas, Nevada";}
                    elseif($dest == 'Los Angeles'){$d="Los Angeles, California";}
                    elseif($dest == 'New York'){$d="New York City, New York";}
                    elseif($dest == 'Chicago'){$d="Chicago, Illionis";}
                    elseif($dest == 'Miami'){$d="Miami, Florida";}
                    elseif($dest == 'Seatle'){$d="Seatle, Washington";}
                    elseif($dest == 'Dallas'){$d="Dallas, Texas";}
                    $outcome = "You will arrive in <span style=\"color: silver;\">$d</span> in <span id='countdown'>$carspeed</span> seconds!"; }

                elseif($_POST["travel"]==6 AND $rankid >= 25){
                    if($userid >= 25){ mysql_query("UPDATE users SET location = '$dest' WHERE username = '$gangsterusername'"); $showoutcome++; $outcome = "Your now in <span style=\"color: #FFC753;\">$dest</span>"; }
                    elseif($carchecka < '1'){}
                    elseif($carowner != $gangsterusername){}
                    elseif($customt >= 14 && $customt != 17){ $showoutcome++; $outcome = "You arrived in <span style=\"color: #FFC753;\">$dest!</span>";
                        mysql_query("UPDATE users SET location = '$dest' WHERE username = '$gangsterusername'"); }
                    elseif($travelcheck != '0'){}
                    else{
                        $newtime = $time + $carspeed;
                        mysql_query("INSERT INTO travel(username,time,carid,goto)
VALUES ('$gangsterusername','$newtime','$with','$dest')");}
                    $showoutcome++; $outcome = "You will arrive in <span style=\"color: #FFC753;\">$dest</span> in $carspeed seconds!"; }
            }

            $cars = mysql_query("SELECT * FROM cars WHERE owner = '$gangsterusername' ORDER BY carid DESC LIMIT 0,300");
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
                                Travel by Car
                            </div>
                            <div style="padding: 5px; margin: auto; text-align: center; color: #fefefe;">
                                <div style="margin: auto; padding-bottom: 6px; text-align: center;">
                                    <div class="break" style="padding-top: 32px;"></div>
                                    <style>
                                        .info {
                                            display: block;
                                            font-size: 12.5px;
                                            margin-bottom: 17px;
                                        }

                                    </style>
                                    <? if ($showoutcome >= 1) { ?>
                                        <span id="notification" class="info js-parent" data-finish-text="...">
                                            <? echo $outcome; ?>
                                        </span>
                                    <? } ?>
                                    <form method="post" style="font-size: 11px; ">
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
                                                        <input name="travel" id="option_7" value="7" type="radio">
                                                    </td>
                                                    <td class="col  is-label" style="width: 52%;">
                                                        <label for="option_7" style=""> Seatle, Washington</label>
                                                    </td>
                                                </tr>
                                            <?}else {?>
                                                <tr class="is-label">
                                                    <td class="col " style="border-left: 0; width: 1%;">
                                                        <input disabled="disabled" id="option_7" name="travel" value="7" type="radio">
                                                    </td>
                                                    <td class="col  is-label" style="width: 52%;">
                                                        <label for="option_7" style=""><span style="float: right; color: silver;">- CURRENT LOCATION -</span> Seatle, Washington</label>
                                                    </td>
                                                </tr>
                                            <?}?>
                                            <?if($userlocation != "Chicago"){?>
                                                <tr class="is-label">
                                                    <td class="col " style="border-left: 0; width: 1%;">
                                                        <input name="travel" id="option_4" value="4" type="radio">
                                                    </td>
                                                    <td class="col  is-label" style="width: 52%;">
                                                        <label for="option_4" style=""> Chicago, Illionis</label>
                                                    </td>
                                                </tr>
                                            <?}else {?>
                                                <tr class="is-label">
                                                    <td class="col " style="border-left: 0; width: 1%;">
                                                        <input disabled="disabled" id="option_4" name="travel" value="4" type="radio">
                                                    </td>
                                                    <td class="col  is-label" style="width: 52%;">
                                                        <label for="option_4" style=""><span style="float: right; color: silver;">- CURRENT LOCATION -</span> Chicago, Illionis</label>
                                                    </td>
                                                </tr>
                                            <?}?>
                                            <?if($userlocation != "Dallas"){?>
                                                <tr class="is-label">
                                                    <td class="col " style="border-left: 0; width: 1%;">
                                                        <input name="travel" id="option_8" value="8" type="radio">
                                                    </td>
                                                    <td class="col  is-label" style="width: 52%;">
                                                        <label for="option_8" style=""> Dallas, Texas</label>
                                                    </td>
                                                </tr>
                                            <?}else {?>
                                                <tr class="is-label">
                                                    <td class="col " style="border-left: 0; width: 1%;">
                                                        <input disabled="disabled" id="option_8" name="travel" value="8" type="radio">
                                                    </td>
                                                    <td class="col  is-label" style="width: 52%;">
                                                        <label for="option_8" style=""><span style="float: right; color: silver;">- CURRENT LOCATION -</span> Dallas, Texas</label>
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
                                            <?php if(($rankid >= '25')){?>

                                                <?if($userlocation != "Staff Land"){?>
                                                    <tr class="is-label">
                                                        <td class="col " style="border-left: 0; width: 1%;">
                                                            <input name="travel" id="option_6" value="6" type="radio">
                                                        </td>
                                                        <td class="col  is-label" style="width: 52%;">
                                                            <label for="option_6" style=""> Staff Land</label>
                                                        </td>
                                                    </tr>
                                                <?}else {?>
                                                    <tr class="is-label">
                                                        <td class="col " style="border-left: 0; width: 1%;">
                                                            <input disabled="disabled" id="option_6" name="travel" value="6" type="radio">
                                                        </td>
                                                        <td class="col  is-label" style="width: 52%;">
                                                            <label for="option_6" style=""><span style="float: right; color: silver;">- CURRENT LOCATION -</span> Staff Land</label>
                                                        </td>
                                                    </tr>
                                            <?}}?>
                                            </tbody>
                                        </table>
                                        Select car:
                                        <select class="textarea" name="car" style="position: relative; top: -1px; height: 23px; margin-bottom: 10px;">
                                            <?
                                            while($car = mysql_fetch_array($cars)){
                                                $id = $car['id'];
                                                $carid = $car['carid'];
                                                $damage = $car['damage'];
                                                $speed = $car['speed'];
                                                $carnamea = $car['carname'];
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
												elseif($getid == 19){$carname = 'Audi Prologue';}

                                                if($carid == 12){$before = 'Very Rare:&nbsp;';}
                                                elseif($carid == 9){$before = 'Rare:&nbsp;';}
                                                elseif($carid == 10){$before = 'Rare:&nbsp;';}
                                                elseif($carid == 11){$before = 'Rare:&nbsp;';}
                                                elseif($carid == 16){$before = 'Rare:&nbsp;';}
                                                elseif($carid == 17){$before = 'Rare:&nbsp;';}
                                                elseif($carid == 13){$before = 'Custom:&nbsp;';}
                                                elseif($carid >= 14 && $carid != 16 && $carid != 17){$before = 'Super Rare:&nbsp;';}
                                                else{$before = '';}
                                                echo"<option value=$id style='width: 125px;'>$before$carname [$damage% damage] ($speed seconds)</option>";}?>
                                        </select>
                                        <input class="textarea curve3px" name="submit" style="padding-left: 8px; padding-right: 8px; margin-top: 4px; margin-bottom: 46px;" value="Travel!" type="submit">
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