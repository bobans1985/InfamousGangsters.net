<? include 'included.php'; session_start(); ?>
<?
$saturate = "/[^a-z0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate, "", $sessionidraw);
$playerip = $_SERVER['REMOTE_ADDR'];
$username = $usernameone;

$userarray = $statustesttwo;
$userlocation = $userarray['location'];
$userrankid = $userarray['rankid'];
$usermoney = $userarray['money'];
$userpoints = $userarray['points'];
$penpoints = $userarray['penpoints'];
$check = $statustesttwo['sentmsgs'];
$today = date("m.d.y");
$newlocation = $_GET['location'];
if ($newlocation == 1) {
    $newlocation = "Las Vegas";
} elseif ($newlocation == 2) {
    $newlocation = "Los Angeles";
} elseif ($newlocation == 3) {
    $newlocation = "New York";
} elseif ($newlocation == 6) {
    $newlocation = "Staff Land";
}
$makenewmaybe = mysql_num_rows(mysql_query("SELECT owner FROM casinos WHERE owner = '$usernameone' AND casino = 'Dice' AND location = '$newlocation'"));
if ($makenewmaybe > 0) {
    $userlocation = "$newlocation";
}

$jailtest = mysql_query("SELECT username FROM jail WHERE username  = '$username'");
$jailtester = mysql_num_rows($jailtest);
if ($jailtester != '0') {
    die(include 'redirect.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" type="text/css" href="css/layout.css">
    <link rel="stylesheet" href="layout/style.css" type="text/css"/>
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

            $entertainer = $ent;
            if ($entertainer != '0') {
                die('<font color=white face=verdana size=1>As entertainer you cannot view this page</font>');
            }

            $ownerinfosql = mysql_query("SELECT * FROM casinos WHERE casino = 'Dice' AND location = '$userlocation'");
            $ownerinfoarray = mysql_fetch_array($ownerinfosql);
            $ownername = $ownerinfoarray['owner'];
            $getbuyback = $ownerinfoarray['buyback'];

            $getsug = mysql_fetch_array(mysql_query("SELECT * FROM suggestions WHERE username = '$ownername'"));
            $getsugid = $getsug['id'];

            if ($ownername == $usernameone) {
                $owner = 1;
            } else {
                $owner = 0;
            }

            $ownermaxbet = $ownerinfoarray['maxbet'];
            $ownerprofit = $ownerinfoarray['profit'];
            $ownermaxbettwo = number_format($ownerinfoarray['maxbet']);
            if ($ownermaxbettwo == '999,999,999,999') {
                $ownermaxbettwo = 'Infinite';
            } else {
                $ownermaxbettwo = "$$ownermaxbettwo";
            }
            $ownerprofittwo = number_format($ownerinfoarray['profit']);


            $saturated = "/[^0-9]/i";
            $setmaxraw = mysql_real_escape_string($_POST['setmaxdice']);
            $priceraw = mysql_real_escape_string($_POST['setpricedice']);
            $buybackraw = mysql_real_escape_string($_POST['setbuybackdice']);
            $setownerrawraw = mysql_real_escape_string($_POST['setownerdice']);
            $dicebetraw = mysql_real_escape_string($_POST['dicebet']);
            $dicesidesraw = mysql_real_escape_string($_POST['dicesides']);
            $dicerolledraw = mysql_real_escape_string($_POST['dicerolled']);
            $setmax = preg_replace($saturated, "", $setmaxraw);
            $setownerraw = preg_replace($saturate, "", $setownerrawraw);
            $price = preg_replace($saturated, "", $priceraw);
            $buyback = preg_replace($saturated, "", $buybackraw);
            $setmaxtwo = number_format($setmax);
            $dicebet = preg_replace($saturated, "", $dicebetraw);
            $dicesides = preg_replace($saturated, "", $dicesidesraw);
            $dicerolled = preg_replace($saturated, "", $dicerolledraw);

            $checkindb = mysql_num_rows(mysql_query("SELECT * FROM casinoprofit WHERE username = '$usernameone'"));
            if ($checkindb < 1) {
                mysql_query("INSERT INTO `casinoprofit` (username,id) VALUES ('$usernameone','')");
            }

            if (($owner != '0') || ($userrankid == '100')) {
                if (isset($_POST['setmaxdice'])) {
                    if ($setmax < '250000') {
                        $showoutcome++;
                        $outcome = "The maxbet must be at least $<b>250,000</b>!</font>";
                    } elseif ($setmax >= '999999999999') {
                        mysql_query("UPDATE casinos SET maxbet = '999999999999' WHERE casino= 'Dice' AND location = '$userlocation'");
                        $showoutcome++;
                        $outcome = "The maxbet is now <b>Infinite</b>!</font>";
                    } else {
                        mysql_query("UPDATE casinos SET maxbet = '$setmax' WHERE casino= 'Dice' AND location = '$userlocation'");
                        $showoutcome++;
                        $outcome = "The maxbet is now $<b>$setmaxtwo</b>!</font>";
                    }
                }
            }


            if (($owner != '0') || ($userrankid >= '25')) {
                if (isset($_POST['setownerdice'])) {

                    $setownerinfosql = mysql_query("SELECT * FROM users WHERE username = '$setownerraw'");
                    $setownerinfoarray = mysql_fetch_array($setownerinfosql);
                    $setownerinforows = mysql_num_rows($setownerinfosql);
                    $setowner = $setownerinfoarray['username'];
                    if (!$setowner) {
                        die (' ');
                    }
                    $setownerstatus = $setownerinfoarray['status'];
                    $ssskkk = $setownerinfoarray['rankid'];
                    $ssskkkid = $setownerinfoarray['ID'];

                    $anum_true = mysql_num_rows(mysql_query("SELECT * FROM users WHERE username='$setownerraw' AND blockcasinos='1'"));
                    if ($anum_true == "1") {
                        die("<font size=2 face=verdana color=silver>$setownerraw doesnt allow Dice Games to be sent to him/her.</font>");
                    }

                    $anum_true = mysql_num_rows(mysql_query("SELECT * FROM protection WHERE username='$setownerraw'"));
                    if ($anum_true == "1") {
                        die("<font size=2 face=verdana color=silver>$setownerraw is under protection!</font>");
                    }

                    if ($setowner == $ownername) {
                        $showoutcome++;
                        $outcome = "You already own the dice!</font>";
                    } elseif ($setownerinforows == '0') {
                        $showoutcome++;
                        $outcome = "No such user!</font>";
                    } elseif (($ssskkk > '25') && ($userrankid < '25')) {
                        $showoutcome++;
                        $outcome = "You cannot send a casino to a staff member!</font>";
                    } elseif ($setownerstatus == 'Dead') {
                        $showoutcome++;
                        $outcome = "You cannot send a casino to dead player!</font>";
                    } else {

                        $cunt = mysql_num_rows(mysql_query("SELECT owner FROM casinos WHERE owner = '$setowner'"));
                        $cunts = mysql_num_rows(mysql_query("SELECT owner FROM casinos WHERE owner = '$setowner' AND casino = 'Dice'"));
                        if ($cunt > '3' AND $setowner != 'None') {
                            die('<font color=white face=verdana size=1>That user already has 2 casinos!</font>');
                        }
                        if ($cunts > '0' AND $setowner != 'None') {
                            die('<font color=white face=verdana size=1>That user already has a dice game!</font>');
                        }


                        $penpoint = mysql_num_rows(mysql_query("SELECT * FROM ipadresses WHERE ip = '$userip' AND username = '$setowner'"));
                        if (($penpoint > '0') && ($setowner != $username)) {
                            mysql_query("UPDATE users SET penpoints = penpoints + 1 WHERE username = '$username'");
                            $reason = "$username sent $userlocation dice to $setowner";
                            mysql_query("INSERT INTO penpoints(username,reason) VALUES('$username','$reason')");
                        }

                        mysql_query("UPDATE casinos SET buyback = '0' WHERE casino = 'Dice' AND location = '$userlocation'");
                        mysql_query("UPDATE casinos SET owner = '$setowner' WHERE casino= 'Dice' AND location = '$userlocation'");
                        mysql_query("UPDATE casinos SET nickname = '$setownerraw' WHERE casino= 'Dice' AND location = '$userlocation'");
                        mysql_query("UPDATE casinos SET maxbet = '250000' WHERE casino= 'Dice' AND location = '$userlocation'");
                        $showoutcome++;
                        $outcome = "You gave the casino to <a href=viewprofile.php?username=$setowner><b>$setownerraw</b>!</font></a>";
                        mysql_query("DELETE FROM buycasinos WHERE city = '$userlocation' AND type = 'Dice'");

                        mysql_query("UPDATE users SET notify = '1', notification = 'a_open$usernameone a_closed$usernameone a_slashsent you $userlocation Dice.' WHERE username = '$ssskkkid'");
                    }
                } elseif (isset($_POST['setpricedice'])) {
                    mysql_query("DELETE FROM buycasinos WHERE type = 'Dice' AND city = '$userlocation'");
                    $buytime = time() + 86400;
                    mysql_query("INSERT INTO buycasinos(username,time,city,price,type)
VALUES ('$ownername','$buytime','$userlocation','$price','Dice')");
                    $showoutcome++;
                    $outcome = "The casino has been added to quicktrade!</font>";
                }

                if (($owner != '0') || ($userrankid == '100')) {
                    if (isset($_POST['setbuybackdice'])) {
                        if ($buyback < 1) {
                            mysql_query("UPDATE casinos SET buyback = '0' WHERE casino= 'Dice' AND location = '$userlocation'");
                            $showoutcome++;
                            $outcome = "You buyback has been removed!</font>";
                        } elseif ($buyback < 250) {
                            $showoutcome++;
                            $outcome = "Minimum buy back is 250 points!</font>";
                        } elseif ($buyback > $userpoints) {
                            $showoutcome++;
                            $outcome = "You can not afford this buy back!</font>";
                        } else {
                            mysql_query("UPDATE casinos SET buyback = '$buyback' WHERE casino= 'Dice' AND location = '$userlocation'");
                            $showoutcome++;
                            $outcome = "Your casino buyback has been set!</font>";
                        }
                    }
                }


                if (isset($_POST['resetdiceprofit'])) {
                    $showoutcome++;
                    $outcome = "Profit reset!</font>";
                    mysql_query("UPDATE casinos SET profit = '0' WHERE casino= 'Dice' AND location = '$userlocation'");
                }
            }

            if ($owner == '0' AND $ownername != 'None') {
                if (isset($_POST['playdice'])) {
                    if ($_POST['1'] != $check) {
                        $dicebet = '0';
                    }


                    $ownerstatssql = mysql_query("SELECT money,points,ID FROM users WHERE ID = '$getsugid'");
                    $ownerstatsarray = mysql_fetch_array($ownerstatssql);
                    $ownermoney = $ownerstatsarray['money'];
                    $ownerpoints = $ownerstatsarray['points'];
                    $ownerid = $ownerstatsarray['ID'];


                    if (!$dicebet) {
                        $showoutcome++;
                        $outcome = "You did not enter an amount to bet!</font>";
                    } elseif (!$dicesides) {
                        $showoutcome++;
                        $outcome = "You did not enter an amount of sides!</font>";
                    } elseif ($dicesides == '1') {
                        $showoutcome++;
                        $outcome = "You cannot play with one side!</font>";
                    } elseif (!$dicerolled) {
                        $showoutcome++;
                        $outcome = "You did not enter a predicted outcome!</font>";
                    } elseif ($dicebet > $usermoney) {
                        $showoutcome++;
                        $outcome = "You dont have that much money!</font>";
                    } elseif ($dicebet > $ownermaxbet) {
                        $showoutcome++;
                        $outcome = "The maxbet is set at <b>$ownermaxbettwo</b>!</font>";
                    } elseif ($dicesides > '5000') {
                        $showoutcome++;
                        $outcome = "You can only play with a max of 5000 sides!</font>";
                    } else {
                        //$dicesidesa = floor($dicesides * 1.05);
                        $dicesidesa = $dicesides;

                        $rand = mt_rand(1, $dicesidesa);

                        $bet = number_format($dicebet);
                        $winraw = $dicebet * $dicesides;
                        $win = number_format($winraw);
                        $realwin = $winraw - $dicebet;

                        if ($dicerolled == $rand) {
                            $showoutcome++;
                            $outcome = "You placed your bet on <b>$dicerolled</b>, and the dice rolled <b>$rand</b>! <font color=lime>You won $<b>$win</font></b>!";
                            mysql_query("INSERT INTO `casinodicebets` (username,location,result,amount,time,bet) VALUES ('$usernameone','$userlocation','win','$winraw','$today','$dicebetraw')");
                            mysql_query("INSERT INTO moneylogs(`username`,`id`,`action`,`time`,`where`) VALUES ('$usernameone','','Won $$win on dice from $ownername','$datetime','dice')");
                            mysql_query("INSERT INTO moneylogs(`username`,`id`,`action`,`time`,`where`) VALUES ('$ownername','','$usernameone won $$win from this roulette','$datetime','dice')");
                            mysql_query("UPDATE casinos SET profit = profit - $realwin WHERE location = '$userlocation' AND casino = 'Dice'");
                            if ($realwin >= $ownermoney) {
                                $showoutcome++;
                                $outcome = "You placed your bet on <b>$dicerolled</b>, and the dice rolled <b>$rand</b>! <font color=lime>You won $<b>$win</b></font>! <b>You won all of the owners cash, you now own the casino!</b>";
                                if ($ownermoney == '0') {
                                    $new = '1';
                                } else {
                                    $new = '0';
                                }
                                mysql_query("UPDATE users SET money = '$new' WHERE ID = '$ownerid' AND money = '$ownermoney'");
                                if (mysql_affected_rows() == 0) {
                                    die('<font color=white face=verdana size=1>Error minus cash 1.</font>');
                                }
                                mysql_query("UPDATE users SET money = (money + $ownermoney + 1) WHERE ID = '$ida' AND money >= '$dicebet'");
                                if (mysql_affected_rows() == 0) {
                                    die('<font color=white face=verdana size=1>Error 1.</font>');
                                }
                                mysql_query("UPDATE casinoprofit SET dice = dice + '$ownermoney', overall = overall + '$ownermoney' WHERE username = '$usernameone'");

                                mysql_query("DELETE FROM buycasinos WHERE city = '$userlocation' AND type = 'Dice'");
                                mysql_query("UPDATE users SET casinos = casinos + 1 WHERE username = '$username'");
                                mysql_query("UPDATE casinos SET owner = '$username', nickname = '$username' WHERE casino = 'Dice' AND location = '$userlocation'");
                                mysql_query("UPDATE casinos SET buyback = '0' WHERE casino = 'Dice' AND location = '$userlocation'");
                                mysql_query("UPDATE casinos SET maxbet = '250000' WHERE casino = 'Dice' AND location = '$userlocation'");
                                if ($getbuyback > 0 AND $ownerpoints >= $getbuyback) {
                                    mysql_query("UPDATE users SET points = points + $getbuyback WHERE ID = '$ida'");
                                    mysql_query("UPDATE users SET points = points - $getbuyback WHERE ID = '$getsugid'");
                                    mysql_query("UPDATE casinos SET owner = '$ownername', maxbet = '0' WHERE casino = 'Dice' AND location = '$userlocation'");
                                    mysql_query("UPDATE users SET notification = 'a_open$usernameone a_closed$usernameone a_slashwon your dice.', notify = (notify + 1) WHERE ID = '$getsugid'");
                                }
                            } else {
                                mysql_query("UPDATE users SET money = (money - $realwin) WHERE ID = '$ownerid' AND money >= '$realwin'");
                                if (mysql_affected_rows() == 0) {
                                    die('<font color=white face=verdana size=1>Error contact admin and say you saw minus cash error.</font>');
                                }
                                mysql_query("UPDATE users SET money = money + '$realwin' WHERE ID = '$ida' AND money >= '$dicebet'");
                                if (mysql_affected_rows() == 0) {
                                    die('<font color=white face=verdana size=1>Error 2.</font>');
                                }
                                mysql_query("UPDATE casinoprofit SET dice = dice + '$realwin', overall = overall + '$realwin' WHERE username = '$usernameone'");
                            }
                        } else {
                            $showoutcome++;
                            $outcome = "You placed your bet on <b>$dicerolled</b>, and the dice rolled <b>$rand</b>!<font color=red> You lost $<b>$bet</b></font>!";
                            mysql_query("INSERT INTO `casinodicebets` (username,location,result,amount,time,bet) VALUES ('$usernameone','$userlocation','lost','$dicebet','$today','$dicebetraw')");
                            mysql_query("INSERT INTO moneylogs(`username`,`id`,`action`,`time`,`where`) VALUES ('$usernameone','','Lost $$bet on dice to $ownername','$datetime','dice')");
                            mysql_query("INSERT INTO moneylogs(`username`,`id`,`action`,`time`,`where`) VALUES ('$ownername','','$usernameone lost $$bet to this roulette','$datetime','dice')");
                            mysql_query("UPDATE users SET money = money - '$dicebet' WHERE ID = '$ida' AND money >= '$dicebet'");
                            if (mysql_affected_rows() == 0) {
                                die('<font color=white face=verdana size=1>Error 3.</font>');
                            }
                            mysql_query("UPDATE casinoprofit SET dice = dice - '$dicebet', overall = overall - '$dicebet' WHERE username = '$usernameone'");
                            mysql_query("UPDATE users SET money = money + '$dicebet' WHERE ID = '$ownerid'");
                            mysql_query("UPDATE casinos SET profit = profit + '$dicebet' WHERE location = '$userlocation' AND casino = 'Dice'");
                        }

                    }
                }
            }

            if (($ownername == 'None')) {
                if (isset($_POST['takeoverdice'])) {
                    if ($usermoney < '20000000') {
                        $showoutcome++;
                        $outcome = "You don't have enough money! Taking over a dice costs $<b>20,000,000</b>!";
                    } else {
                        $showoutcome++;
                        $outcome = "You now own the dice!";
                        mysql_query("UPDATE users SET money = money - '20000000' WHERE username = '$username'");
                        mysql_query("UPDATE casinos SET owner = '$username' WHERE location = '$userlocation' AND casino = 'Dice'");
                        mysql_query("UPDATE casinos SET nickname = '$username' WHERE location = '$userlocation' AND casino = 'Dice'");
                        mysql_query("DELETE FROM buycasinos WHERE city = '$userlocation' AND type = 'Dice'");
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
                                Dice Game
                            </div>
                            <div style="padding: 5px; margin: auto; text-align: center; color: #fefefe;">
                                <div style="margin: auto; padding-top: 16px; padding-bottom: 6px; text-align: center;">

                                    <?php

                                    if (($owner == '0') || ($userrankid == '100')) { ?>
                                        <form method="post" style="font-size: 11px; margin-top: 25px;">
                                            <input type=hidden value=<? echo $check; ?> name=1>
                                            <table class="regTable"
                                                   style="min-width: 230px; width: 85%; max-width: 350px;"
                                                   cellspacing="0" cellpadding="0" align="center">
                                                <tbody>
                                                <tr>
                                                    <td class="header" colspan="2">
                                                        Play Dice
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="col noTop" style="border-left: 0;">
                                                        <label style="display: block; padding: 0;"
                                                               for="stake">Bet:</label>
                                                    </td>
                                                    <td class="col is-btn-wrapper noTop">
                                                        <input tabindex="4" class="textarea noTop" id="bet"
                                                               onchange="calc_return()" value="<? echo $dicebet; ?>"
                                                               style="width: 100%; height: 28px;" name="dicebet"
                                                               placeholder="Enter Bet..." type="text">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="col" style="border-left: 0;">
                                                        <label style="display: block; padding: 0;" for="sides">Number of
                                                            Sides (+5%):></label>
                                                    </td>
                                                    <td class="col is-btn-wrapper noTop">
                                                        <input tabindex="4" class="textarea" id="sides"
                                                               onchange="calc_return()" value="<? echo $dicesides; ?>"
                                                               style="width: 100%; height: 28px;" name=dicesides
                                                               placeholder="Enter Sides (2 to 5,000)..." type="text">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="col" style="border-left: 0;">
                                                        <label style="display: block; padding: 0;" for="predication">Number:</label>
                                                    </td>
                                                    <td class="col is-btn-wrapper noTop">
                                                        <input tabindex="4" class="textarea"
                                                               value="<? echo $dicerolled; ?>"
                                                               style="width: 100%; height: 28px;" name="dicerolled"
                                                               placeholder="Enter Rolled Dice Number..." type="text">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" class="col is-btn-wrapper noTop"
                                                        style="border-left: 0;">
                                                        <input class="textarea"
                                                               style="width: 100%; height: 28px; border-left: 0;"
                                                               name="playdice" value="Place Bet" type="submit">
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <div style="padding: 33px; padding-top: 32px;">
                                                Returns: <span style="color: #FFC753;">$<b id="returns">0</b></span>
                                            </div>
                                        </form>
                                    <? } ?>
                                    <script>
                                        function calc_return() {
											var return_money = document.getElementById('bet').value * document.getElementById('sides').value;
                                            var returns = String(return_money).replace(/(.)(?=(\d{3})+$)/g,'$1,');
                                            document.getElementById('returns').innerHTML = '' + returns;
                                            +'';
                                        }
                                    </script>
                                    <? if (($owner != '0') || ($userrankid >= '25')){
                                    if ($getbuyback > 99) {
                                        $tellbb = "$getbuyback";
                                    } else {
                                        $tellbb = "None";
                                    } ?>
                                    <div align="center">
                                        <table class="regTable"
                                               style="margin-left: 10px; margin-right: 0; min-width: 230px; margin-bottom: 11px; width: 85%; max-width: 550px;text-align: center;"
                                               cellspacing="0" cellpadding="0" align="center">
                                            <tbody>
                                            <tr>
                                                <td class="header" colspan="3">
                                                    Edit Dice Stats
                                                </td>
                                            </tr>
                                            <form method=post>
                                                <tr>
                                                    <td class="col noTop">
                                                        Set Maxbet:<input type=submit name=doall class=textbox
                                                                          style="visibility:hidden; width:1%;">
                                                    </td>
                                                    <td class="col noTop">
                                                        <input type=text name=setmaxdice class="textarea"
                                                               style="width:100%; height:100%;">
                                                    </td>
                                                    <td class="col noTop">
                                                        <input type=submit value="Do it" class="textarea curve3px"
                                                               name=setmaxsubmit>
                                                    </td>
                                                </tr>
                                            </form>
                                            <form method=post>
                                                <tr>
                                                    <td class="col">
                                                        Send Dice:<input type=submit name=doall class=textbox
                                                                         style="visibility:hidden; width:1%;">
                                                    </td>
                                                    <td class="col">
                                                        <input type=text name=setownerdice class="textarea"
                                                               style="width:100%; height:100%;">
                                                    </td>
                                                    <td class="col">
                                                        <input type=submit value="Do it" class="textarea curve3px"
                                                               name=setownersubmit>
                                                    </td>
                                                </tr>
                                            </form>
                                            <form method=post>
                                                <tr>
                                                    <td class="col">
                                                        Sell Dice:<input type=submit name=doall class=textbox
                                                                         style="visibility:hidden; width:1%;">
                                                    </td>
                                                    <td class="col">
                                                        <input type=text name=setpricedice class="textarea"
                                                               style="width:100%; height:100%;">
                                                    </td>
                                                    <td class="col">
                                                        <input type=submit value="Do it" class="textarea curve3px"
                                                               name=setpricesubmit>
                                                    </td>
                                                </tr>
                                            </form>
                                            <form method=post>
                                                <tr>
                                                    <td class="col">
                                                        Set Buyback:<input type=submit name=doall class=textbox
                                                                           style="visibility:hidden; width:1%;">
                                                    </td>
                                                    <td class="col">
                                                        <input type=text name=setbuybackdice class="textarea"
                                                               style="width:100%; height:100%;">
                                                    </td>
                                                    <td class="col">
                                                        <input type=submit value="Do it" class="textarea curve3px"
                                                               name=setbuybacksubmit>
                                                    </td>
                                                </tr>
                                            </form>
                                            <form method=post>
                                                <tr>
                                                    <td class="col" colspan="3" style="text-align: center;">
                                                        <input type=submit value="Reset Profit"
                                                               class="textarea curve3px" name=resetdiceprofit>
                                                    </td>
                                                </tr>
                                            </form>
                                            </tbody>
                                        </table>
                                        <br/>
                                        <table class="regTable"
                                               style="margin-left: 10px; margin-right: 0; min-width: 230px; margin-bottom: 11px; width: 85%; max-width: 550px;text-align: center;"
                                               cellspacing="0" cellpadding="0" align="center">
                                            <tbody>
                                            <tr>
                                                <td class="header" colspan="3">
                                                    Todays Bets
                                                </td>
                                            </tr>
                                            <?
                                            $countmoneysqaaal = mysql_query("SELECT SUM(amount-bet) AS todaywin FROM casinodicebets WHERE location = '$userlocation' AND time = '$today' AND result = 'win'");
                                            $countmoneyassaxarray = mysql_fetch_array($countmoneysqaaal);
                                            $todayswin = $countmoneyassaxarray['todaywin'];
                                            $countmoneysqaaal = mysql_query("SELECT SUM(amount) AS todaylost FROM casinodicebets WHERE location = '$userlocation' AND time = '$today' AND result = 'lost'");
                                            $countmoneyassaxarray = mysql_fetch_array($countmoneysqaaal);
                                            $todayslost = $countmoneyassaxarray['todaylost'];
                                            $todaysprofit = $todayslost - $todayswin; ?>
                                            <tr>
                                                <td class="col noTop" colspan="3" style="text-align: center;">
                                                    Profit: <font
                                                            color=yellow>$<b><? echo number_format($todaysprofit); ?>
                                                </td>
                                            </tr>
                                            <?
                                            $getbetss = mysql_query("SELECT * FROM casinodicebets WHERE location = '$userlocation' AND time = '$today' ORDER BY id DESC LIMIT 150");
                                            while ($getbets = mysql_fetch_array($getbetss)) {
                                                $betuser = $getbets['username'];
                                                $betresult = $getbets['result'];
                                                $betamount = $getbets['amount'];
                                                if ($betresult == win) {
                                                    echo "<tr>
                                                <td class=\"col \" colspan=\"3\" style='text-align:center;'>
                                                    <a href=viewprofile.php?username=$betuser>$betuser</a> bet and <font color=green><b>won</b></font> $" . number_format($betamount) . "
                                                </td>
                                            </tr>";
                                                } elseif ($betresult == lost) {
                                                    echo "<tr>
                                                <td class=\"col \" colspan=\"3\" style='text-align:center;'>
                                                    <a href=viewprofile.php?username=$betuser>$betuser</a> bet and <font color=red><b>lost</b></font> $" . number_format($betamount) . "
                                                </td>
                                            </tr>";
                                                } elseif ($betresult == draw) {
                                                    echo "<tr>
                                                <td class=\"col \" colspan=\"3\" style='text-align:center;'>
                                                    <a href=viewprofile.php?username=$betuser>$betuser</a> bet $" . number_format($betamount) . " and drew
                                                </td>
                                            </tr>";
                                                }
                                            } ?>
                                            </tbody>
                                        </table>
                                        <br><?php }

                                        if (($ownername == 'None')) {
                                            echo '<br><div align=center>
<form method=post><input type=submit value="Take Over Casino" class="textarea curve3px" name=takeoverdice></form></div><br>';
                                        }
                                        ?>
                                        <div class="spacer"></div>
                                        <div style="padding-top: 8px; padding-bottom: 8px; color: #aaaaaa; font-size: 115%;">
                                            Owner: <a href="viewprofile.php?username=<? echo $ownername ?>"
                                                      style="color: #ffffff;"><? echo $ownername ?></a><span
                                                    style="color: #555555; padding-left: 7px; padding-right: 7px;"> - </span>
                                            Maximum Bet: <span
                                                    style="color: #ffffff;"><? if ($ownermaxbettwo == '999,999,999,999') {
                                                    echo "<span style=\"color: gold;\">Infinite</span>";
                                                } else {
                                                    echo "$ownermaxbettwo";
                                                } ?></span>
                                        </div>
                                        <div class="spacer"></div>
                                        <div class="break" style="padding-top: 23px;"></div>
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