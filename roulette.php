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
$check = $userarray['sentmsgs'];
$today = date("m.d.y");
mysql_query("DELETE FROM casinoroulettebets WHERE time != '$today'");
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
$makenewmaybe = mysql_num_rows(mysql_query("SELECT owner FROM casinos WHERE owner = '$usernameone' AND casino = 'Roulette' AND location = '$newlocation'"));
if ($makenewmaybe > 0) {
    $userlocation = "$newlocation";
}

$jailtest = mysql_query("SELECT username FROM jail WHERE username  = '$username'");
$jailtester = mysql_num_rows($jailtest);
if ($jailtester != '0') {
    die(include 'jail.php');
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

        var unixTime = 1498981670.58;
        var muteSound = false;

        $('input, select, textarea').focus(function () {
            $('meta[name=viewport]').attr('content', 'width=device-width,initial-scale=1,maximum-scale=1.0');
        });
        $('input, select, textarea').blur(function () {
            $('meta[name=viewport]').attr('content', 'width=device-width,initial-scale=1,maximum-scale=10');
        });

        $(document).ready(function(){
            $('a').click(function(){
                e.preventDefault();
            });
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

            $ownerinfosql = mysql_query("SELECT * FROM casinos WHERE casino = 'Roulette' AND location = '$userlocation'");
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
                $ownermaxbettwo = "$ownermaxbettwo";
            }
            $ownerprofittwo = number_format($ownerinfoarray['profit']);

            $ownerstatssql = mysql_query("SELECT * FROM users WHERE ID = '$getsugid'");
            $ownerstatsarray = mysql_fetch_array($ownerstatssql);
            $ownermoney = $ownerstatsarray['money'];
            $ownerpoints = $ownerstatsarray['points'];

            $saturated = "/[^0-9]/i";
            $setmaxraw = mysql_real_escape_string($_POST['setmaxrlt']);
            $priceraw = mysql_real_escape_string($_POST['setpricerlt']);
            $buybackraw = mysql_real_escape_string($_POST['setbuybackrlt']);
            $setownerrawraw = mysql_real_escape_string($_POST['setownerrlt']);
            $roubetraw = mysql_real_escape_string($_POST['bet']);
            $roubet = preg_replace($saturated, "", $roubetraw);

            $price = preg_replace($saturated, "", $priceraw);
            $buyback = preg_replace($saturated, "", $buybackraw);
            $betformat = number_format($bet);
            $setmax = preg_replace($saturated, "", $setmaxraw);
            $setownerraw = preg_replace($saturate, "", $setownerrawraw);
            $setmaxtwo = number_format($setmax);

            $checkindb = mysql_num_rows(mysql_query("SELECT * FROM casinoprofit WHERE username = '$usernameone'"));
            if ($checkindb < 1) {
                mysql_query("INSERT INTO `casinoprofit` (username,id) VALUES ('$usernameone','')");
            }

            if (($owner != '0') || ($userrankid == '100')) {
                if (isset($_POST['setmaxrlt'])) {
                    if ($setmax < '250000') {
                        $showoutcome++;
                        $outcome = "The maxbet must be at least $<b>250,000</b>!";
                    } elseif ($setmax > '999999999999') {
                        mysql_query("UPDATE casinos SET maxbet = '999999999999' WHERE casino= 'Roulette' AND location = '$userlocation'");
                        $showoutcome++;
                        $outcome = "The maxbet is now <b>Infinite</b>!</b>";
                    } else {
                        mysql_query("UPDATE casinos SET maxbet = '$setmax' WHERE casino= 'Roulette' AND location = '$userlocation'");
                        $showoutcome++;
                        $outcome = "The maxbet is now $<b>$setmaxtwo</b>!</font>";
                    }
                }
            }


            if (($owner != '0') || ($userrankid >= '25')) {
                if (isset($_POST['setownerrlt'])) {

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
                        die("<font size=2 face=verdana color=silver>$setownerraw doesnt allow Roulettes to be sent to him/her.</font>");
                    }

                    $anum_true = mysql_num_rows(mysql_query("SELECT * FROM protection WHERE username='$setownerraw'"));
                    if ($anum_true == "1") {
                        die("<font size=2 face=verdana color=silver>$setownerraw is under protection!</font>");
                    }

                    if ($setowner == $ownername) {
                        $showoutcome++;
                        $outcome = "You already own the roulette!</font>";
                    } elseif ($setownerinforows == '0') {
                        $showoutcome++;
                        $outcome = "No such user!</font>";
                    } elseif ($setownerstatus == 'Dead') {
                        $showoutcome++;
                        $outcome = "You cannot send a casino to a dead player!</font>";
                    } elseif (($ssskkk > '25') && ($userrankid < '50')) {
                        $showoutcome++;
                        $outcome = "You cannot send a casino to a staff member!</font>";
                    } else {
                        $cunt = mysql_num_rows(mysql_query("SELECT owner FROM casinos WHERE owner = '$setowner' AND type = 'casi'"));
                        $cunts = mysql_num_rows(mysql_query("SELECT owner FROM casinos WHERE owner = '$setowner' AND casino = 'Roulette'"));
                        if ($cunt > '3' AND $setowner != 'None') {
                            die('<font color=white face=verdana size=1>That user already has 2 casinos!</font>');
                        }
                        if ($cunts > '0' AND $setowner != 'None') {
                            die('<font color=white face=verdana size=1>That user already has a roulette!</font>');
                        }


                        $penpoint = mysql_num_rows(mysql_query("SELECT * FROM ipadresses WHERE ip = '$userip' AND username = '$setowner'"));
                        if (($penpoint > '0') && ($setowner != $username)) {
                            mysql_query("UPDATE users SET penpoints = penpoints + 1 WHERE username = '$username'");
                            $reason = "$username sent $userlocation roulette to $setowner";
                            mysql_query("INSERT INTO penpoints(username,reason) VALUES('$username','$reason')");
                        }

                        mysql_query("UPDATE casinos SET buyback = '0' WHERE casino = 'Roulette' AND location = '$userlocation'");
                        mysql_query("UPDATE casinos SET owner = '$setowner' WHERE casino= 'Roulette' AND location = '$userlocation'");
                        mysql_query("UPDATE casinos SET nickname = '$setownerraw' WHERE casino= 'Roulette' AND location = '$userlocation'");
                        mysql_query("UPDATE casinos SET maxbet = '250000' WHERE casino= 'Roulette' AND location = '$userlocation'");
                        $showoutcome++;
                        $outcome = "You gave the casino to <a href=viewprofile.php?username=$setowner><b>$setownerraw</b>!</font></a>";
                        mysql_query("DELETE FROM buycasinos WHERE city = '$userlocation' AND type = 'Roulette'");

                        mysql_query("UPDATE users SET notify = '1', notification = 'a_open$usernameone a_closed$usernameone a_slashsent you $userlocation Roulette.' WHERE username = '$ssskkkid'");
                    }
                }
            }

            if (($owner != '0') || ($userrankid == '100')) {
                if (isset($_POST['setpricerlt'])) {
                    mysql_query("DELETE FROM buycasinos WHERE type = 'Roulette' AND city = '$userlocation'");
                    $buytime = time() + 86400;
                    mysql_query("INSERT INTO buycasinos(username,time,city,price,type)
VALUES ('$ownername','$buytime','$userlocation','$price','Roulette')");
                    $showoutcome++;
                    $outcome = "The casino has been added to quicktrade!</font>";
                }
            }

            if (($owner != '0') || ($userrankid == '100')) {
                if (isset($_POST['resetrltprofit'])) {
                    $showoutcome++;
                    $outcome = "Profit reset!</font>";
                    mysql_query("UPDATE casinos SET profit = '0' WHERE casino= 'Roulette' AND location = '$userlocation'");
                }
            }

            if (($owner != '0') || ($userrankid == '100')) {
                if (isset($_POST['setbuybackrlt'])) {
                    if ($buyback < 1) {
                        mysql_query("UPDATE casinos SET buyback = '0' WHERE casino= 'Roulette' AND location = '$userlocation'");
                        $showoutcome++;
                        $outcome = "You buyback has been removed!</font>";
                    } elseif ($buyback < 500) {
                        $showoutcome++;
                        $outcome = "Minimum buy back is 500 points!</font>";
                    } elseif ($buyback > $userpoints) {
                        $showoutcome++;
                        $outcome = "You can not afford this buy back!</font>";
                    } else {
                        mysql_query("UPDATE casinos SET buyback = '$buyback' WHERE casino= 'Roulette' AND location = '$userlocation'");
                        $showoutcome++;
                        $outcome = "Your casino buyback has been set!</font>";
                    }
                }
            }

            if ($owner == '0' AND $ownername != 'None') {

                if (isset($_POST['bet'])) {
                    $no['0'] = preg_replace($saturated, "", $_POST['zero']);
                    $no['1'] = preg_replace($saturated, "", $_POST['1']);
                    $no['2'] = preg_replace($saturated, "", $_POST['2']);
                    $no['3'] = preg_replace($saturated, "", $_POST['3']);
                    $no['4'] = preg_replace($saturated, "", $_POST['4']);
                    $no['5'] = preg_replace($saturated, "", $_POST['5']);
                    $no['6'] = preg_replace($saturated, "", $_POST['6']);
                    $no['7'] = preg_replace($saturated, "", $_POST['7']);
                    $no['8'] = preg_replace($saturated, "", $_POST['8']);
                    $no['9'] = preg_replace($saturated, "", $_POST['9']);
                    $no['10'] = preg_replace($saturated, "", $_POST['10']);
                    $no['11'] = preg_replace($saturated, "", $_POST['11']);
                    $no['12'] = preg_replace($saturated, "", $_POST['12']);
                    $no['13'] = preg_replace($saturated, "", $_POST['13']);
                    $no['14'] = preg_replace($saturated, "", $_POST['14']);
                    $no['15'] = preg_replace($saturated, "", $_POST['15']);
                    $no['16'] = preg_replace($saturated, "", $_POST['16']);
                    $no['17'] = preg_replace($saturated, "", $_POST['17']);
                    $no['18'] = preg_replace($saturated, "", $_POST['18']);
                    $no['19'] = preg_replace($saturated, "", $_POST['19']);
                    $no['20'] = preg_replace($saturated, "", $_POST['20']);
                    $no['21'] = preg_replace($saturated, "", $_POST['21']);
                    $no['22'] = preg_replace($saturated, "", $_POST['22']);
                    $no['23'] = preg_replace($saturated, "", $_POST['23']);
                    $no['24'] = preg_replace($saturated, "", $_POST['24']);
                    $no['25'] = preg_replace($saturated, "", $_POST['25']);
                    $no['26'] = preg_replace($saturated, "", $_POST['26']);
                    $no['27'] = preg_replace($saturated, "", $_POST['27']);
                    $no['28'] = preg_replace($saturated, "", $_POST['28']);
                    $no['29'] = preg_replace($saturated, "", $_POST['29']);
                    $no['30'] = preg_replace($saturated, "", $_POST['30']);
                    $no['31'] = preg_replace($saturated, "", $_POST['31']);
                    $no['32'] = preg_replace($saturated, "", $_POST['32']);
                    $no['33'] = preg_replace($saturated, "", $_POST['33']);
                    $no['34'] = preg_replace($saturated, "", $_POST['34']);
                    $no['35'] = preg_replace($saturated, "", $_POST['35']);
                    $no['36'] = preg_replace($saturated, "", $_POST['36']);

                    $no['red'] = preg_replace($saturated, "", $_POST['red']);
                    $no['black'] = preg_replace($saturated, "", $_POST['black']);
                    $no['odd'] = preg_replace($saturated, "", $_POST['odd']);
                    $no['even'] = preg_replace($saturated, "", $_POST['even']);
                    $no['1to18'] = preg_replace($saturated, "", $_POST['1to18']);
                    $no['19to36'] = preg_replace($saturated, "", $_POST['19to36']);
                    $no['1st12'] = preg_replace($saturated, "", $_POST['1st12']);
                    $no['2nd12'] = preg_replace($saturated, "", $_POST['2nd12']);
                    $no['3rd12'] = preg_replace($saturated, "", $_POST['3rd12']);
                    $no['column1'] = preg_replace($saturated, "", $_POST['1stcol']);
                    $no['column2'] = preg_replace($saturated, "", $_POST['2ndcol']);
                    $no['column3'] = preg_replace($saturated, "", $_POST['3rdcol']);

                    $stake = $no['0'] + $no['1'] + $no['2'] + $no['3'] + $no['4'] + $no['5'] + $no['6'] + $no['7'] + $no['8'] + $no['9'] + $no['10'] + $no['11'] + $no['12'] + $no['13'] + $no['14'] + $no['15'] + $no['16'] + $no['17'] + $no['18'] + $no['19'] + $no['20'] + $no['21'] + $no['22'] + $no['23'] + $no['24'] + $no['25'] + $no['26'] + $no['27'] + $no['28'] + $no['29'] + $no['30'] + $no['31'] + $no['32'] + $no['33'] + $no['34'] + $no['35'] + $no['36'] + $no['red'] + $no['black'] + $no['odd'] + $no['even'] +
                        $no['1to18'] + $no['19to36'] + $no['1st12'] + $no['2nd12'] + $no['3rd12'] + $no['column1'] + $no['column2'] + $no['column3'];
                    $stakea = number_format($stake);
                    $rand = mt_rand(0, 36);
                    if ($ida == 011) {
                        $rand = 36;
                    }

                    if (!$stake) {
                    } elseif ($stake > $usermoney) {
                        $showoutcome++;
                        $outcome = "You dont have that much money!</font>";
                    } elseif ($stake > $ownermaxbet) {
                        $showoutcome++;
                        $outcome = "The maximum bet is set at <b>$$ownermaxbettwo</b>!</font>";
                    } else {
                        $allblack = array("2", "4", "6", "8", "10", "11", "13", "15", "17", "20", "22", "24", "26", "28", "29", "31", "33", "35");
                        $allred = array("1", "3", "5", "7", "9", "12", "14", "16", "18", "19", "21", "23", "25", "27", "30", "32", "34", "36");
                        $onetoeightteen = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18");
                        $nineteentothirtysix = array("19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31", "32", "33", "34", "35", "36");
                        $onetotwelve = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12");
                        $thirteentotwentyfour = array("13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24");
                        $twentyfivetothirtysix = array("25", "26", "27", "28", "29", "30", "31", "32", "33", "34", "35", "36");
                        $allodd = array("1", "3", "5", "7", "9", "11", "13", "15", "17", "19", "21", "23", "25", "27", "29", "31", "33", "35");
                        $alleven = array("2", "4", "6", "8", "10", "12", "14", "16", "18", "20", "22", "24", "26", "28", "30", "32", "34", "36");
                        $colone = array("1", "4", "7", "10", "13", "16", "19", "22", "25", "28", "31", "34");
                        $coltwo = array("2", "5", "8", "11", "14", "17", "20", "23", "26", "29", "32", "35");
                        $colthree = array("3", "6", "9", "12", "15", "18", "21", "24", "27", "30", "33", "36");

                        $won = 0;

//numbers
                        for ($i = 0; $i <= 37; $i++) {
                            if ($rand == $i) {
                                $won = $won + $no[$i] * 36;
                            }
                        }
//black
                        for ($i = 0; $i <= 36; $i++) {
                            if ($rand == $allblack[$i]) {
                                $won = $won + $no['black'] * 2;
                            }
                        }
//red
                        for ($i = 0; $i <= 36; $i++) {
                            if ($rand == $allred[$i]) {
                                $won = $won + $no['red'] * 2;
                            }
                        }
// 1 to 18
                        for ($i = 0; $i <= 36; $i++) {
                            if ($rand == $onetoeightteen[$i]) {
                                $won = $won + $no['1to18'] * 2;
                            }
                        }
// 19 to 36
                        for ($i = 0; $i <= 36; $i++) {
                            if ($rand == $nineteentothirtysix[$i]) {
                                $won = $won + $no['19to36'] * 2;
                            }
                        }
// 1 to 12
                        for ($i = 0; $i <= 36; $i++) {
                            if ($rand == $onetotwelve[$i]) {
                                $won = $won + $no['1to12'] * 3;
                            }
                        }
// 13 to 24
                        for ($i = 0; $i <= 36; $i++) {
                            if ($rand == $thirteentotwentyfour[$i]) {
                                $won = $won + $no['13to24'] * 3;
                            }
                        }
// 25 to 36
                        for ($i = 0; $i <= 36; $i++) {
                            if ($rand == $twentyfivetothirtysix[$i]) {
                                $won = $won + $no['25to36'] * 3;
                            }
                        }
//odd
                        for ($i = 0; $i <= 36; $i++) {
                            if ($rand == $allodd[$i]) {
                                $won = $won + $no['odd'] * 2;
                            }
                        }
//even
                        for ($i = 0; $i <= 36; $i++) {
                            if ($rand == $alleven[$i]) {
                                $won = $won + $no['even'] * 2;
                            }
                        }
//column one
                        for ($i = 0; $i <= 36; $i++) {
                            if ($rand == $colone[$i]) {
                                $won = $won + $no['column1'] * 3;
                            }
                        }
//column two
                        for ($i = 0; $i <= 36; $i++) {
                            if ($rand == $coltwo[$i]) {
                                $won = $won + $no['column2'] * 3;
                            }
                        }
//column three
                        for ($i = 0; $i <= 36; $i++) {
                            if ($rand == $colthree[$i]) {
                                $won = $won + $no['column3'] * 3;
                            }
                        }

                        $wona = number_format($won);
                        $realwin = $won - $stake;

                        if ($won == 0) {
                            mysql_query("INSERT INTO `casinoroulettebets` (username,location,result,amount,time,bet) VALUES ('$usernameone','$userlocation','lost','$stake','$today','$stake')");
                        } else {
                            mysql_query("INSERT INTO `casinoroulettebets` (username,location,result,amount,time,bet) VALUES ('$usernameone','$userlocation','win','$won','$today','$stake')");
                        }
                        if ($realwin >= $ownermoney) {
                            $showoutcome++;
                            $outcome = "You won all of the owners cash, you now own the casino!</b>";

                            if ($ownermoney == '0') {
                                $new = '1';
                            } else {
                                $new = '0';
                            }


                            mysql_query("UPDATE users SET money = '$new' WHERE ID = '$getsugid' AND money = '$ownermoney'");
                            if (mysql_affected_rows() == 0) {
                                die('<font color=white face=verdana size=1>Error minus cash 1.</font>');
                            }

                            mysql_query("UPDATE users SET money = (money + $ownermoney + 1) WHERE username = '$username' AND money >= '$stake'");
                            if (mysql_affected_rows() == 0) {
                                die('<font color=white face=verdana size=1>Error, too fast 1.</font>');
                            }

                            mysql_query("UPDATE casinoprofit SET roulette = roulette + '$ownermoney', overall = overall + '$ownermoney' WHERE username = '$usernameone'");

                            mysql_query("UPDATE users SET casinos = casinos + 1 WHERE username = '$username'");
                            mysql_query("DELETE FROM buycasinos WHERE city = '$userlocation' AND type = 'Roulette'");
                            mysql_query("UPDATE casinos SET owner = '$username' WHERE casino = 'Roulette' AND location = '$userlocation'");
                            mysql_query("UPDATE casinos SET nickname = '$username' WHERE casino = 'Roulette' AND location = '$userlocation'");
                            mysql_query("UPDATE casinos SET buyback = '0' WHERE casino = 'Roulette' AND location = '$userlocation'");
                            mysql_query("UPDATE casinos SET maxbet = '250000' WHERE casino = 'Roulette' AND location = '$userlocation'");

                            if ($getbuyback > 0 AND $ownerpoints >= $getbuyback) {
                                mysql_query("UPDATE users SET points = points + $getbuyback WHERE ID = '$ida'");
                                mysql_query("UPDATE users SET points = points - $getbuyback WHERE ID = '$getsugid'");
                                mysql_query("UPDATE casinos SET owner = '$ownername', maxbet = '0' WHERE casino = 'Roulette' AND location = '$userlocation'");
                                mysql_query("UPDATE users SET notification = 'a_open$usernameone a_closed$usernameone a_slashwon your roulette.', notify = (notify + 1) WHERE ID = '$getsugid'");
                            }
                        } else {
                            mysql_query("UPDATE users SET money = money + '$realwin' WHERE ID = '$ida' AND money >= '$stake'");
                            mysql_query("UPDATE casinoprofit SET roulette = roulette + '$realwin', overall = overall + '$realwin' WHERE username = '$usernameone'");
                            mysql_query("INSERT INTO moneylogs(`username`,`id`,`action`,`time`,`where`) VALUES ('$usernameone','','Won $$wona from $$stakea bet on roulette from $ownername','$datetime','roulette')");
                            mysql_query("INSERT INTO moneylogs(`username`,`id`,`action`,`time`,`where`) VALUES ('$ownername','','$usernameone won $$wona from $$stakea bet from this roulette','$datetime','roulette')");
                            if (mysql_affected_rows() == 0) {
                                die('<font color=white face=verdana size=1>Error, too fast.</font>');
                            }

                            mysql_query("UPDATE users SET money = money - '$realwin' WHERE ID = '$getsugid'");
                        }

                        mysql_query("UPDATE casinos SET profit = profit - '$realwin' WHERE casino = 'Roulette' AND location = '$userlocation'");

                        for ($i = 0; $i <= 37; $i++) {
                            if ($rand == '37') {
                                $square = "<table cellpadding=0 align=center cellspacing=0 width=70 height=70><tr><td bgcolor=green><center><font color=white size=8 face=verdana>0</font></center></td></tr></table>";
                            } elseif ($rand == $allblack[$i]) {
                                $square = "<table cellpadding=0 align=center cellspacing=0 width=70 height=70><tr><td bgcolor=black><center><font color=white size=8 face=verdana>$rand</font></center></td></tr></table>";
                            } elseif ($rand == $allred[$i]) {
                                $square = "<table cellpadding=0 cellspacing=0 width=70 height=70 align=center><tr><td bgcolor=red><center><font color=black size=8 face=verdana>$rand</font></center></td></tr></table>";
                            }
                        }


                    }
                }
            }

            if (($ownername == 'None')) {
                if (isset($_POST['takeoverrlt'])) {
                    if ($usermoney < '25000000') {
                        $showoutcome++;
                        $outcome = "You don't have enough money! Taking over a roulette costs $<b>25,000,000</b>!</font>";
                    } else {
                        $showoutcome++;
                        $outcome = "You now own the roulette!";
                        mysql_query("UPDATE users SET money = money - '25000000' WHERE username = '$username'");
                        mysql_query("UPDATE casinos SET owner = '$username' WHERE location = '$userlocation' AND casino ='Roulette'");
                        mysql_query("UPDATE casinos SET nickname = '$username' WHERE location = '$userlocation' AND casino = 'Roulette'");
                        mysql_query("DELETE FROM buycasinos WHERE city = '$userlocation' AND type = 'Roulette'");
                    }
                }
            }
            ?>
            <? if ($showoutcome >= 1) { ?>
                <span><? echo $outcome; ?></span>
            <? } ?>
            <script>
                var maxbet_value = "<?echo $ownermaxbet;?>";
                var maxBet = "The Maximum Bet is $<?echo $ownermaxbettwo;?>!";
            </script>
            <table class="menuTable curve10px" cellspacing="0" cellpadding="0">
                <tr>
                    <td class="topleft"></td>
                    <td class="top"></td>
                    <td class="topright"></td>
                </tr>
                <tr>
                    <td class="left"></td>
                    <td class="top">
                        <?if(isset($_POST['quickspin']) && $stakea!=0){?>
                            <script>
                                tooLate = 1;

                                $('document').ready(function(){

                                    $("#ball").css("display","");

                                    var ua = navigator.userAgent.toLowerCase();
                                    var isAndroid = ua.indexOf("mobile") > -1;

                                    /*$('#bet').append('<span style="color: #ffffff;">$<?echo $stakea;?></span>');
                                    $('#won').append('<span style="color: #ffffff;">$<?echo $wona;?></span>!');*/
                                    
                                    $('#bet').find('span').text('$' + <?echo $stakea;?>);
                                    $('#won').find('span').text('$' + <?echo $wona;?>);

                                    <?if($rand==1 ||$rand==3 ||$rand==5 ||$rand==7 ||$rand==9 ||$rand==12 ||$rand==14 ||$rand==16 ||$rand==18 ||$rand==19 ||$rand==21 ||$rand==23 ||$rand==25 ||$rand==27 ||$rand==30 ||$rand==32 ||$rand==34 ||$rand==36){?>
                                    $('#outcome').css('display','');
                                    $('#outcome').css('background-color','#660000');
                                    $('#outcome').text('<?echo $rand;?>');
                                    <?}else{?>
                                    $('#outcome').css('display','');
                                    $('#outcome').css('background-color','black');
                                    $('#outcome').text('<?echo $rand;?>');
                                    <?}?>

                                    $('#bet').css("opacity",1);
                                    $('#won').css("opacity",1);
                                    $('#outcome').css("opacity",0.9);


                                    $('#dot1').css("opacity",1);
                                    $('#dot2').css("opacity",1);
                                    $('#dot3').css("opacity",1);

                                });
                            </script>
                            <script src="https://wp-n7best.rhcloud.com/wp-content/uploads/2014/04/jquery.keyframes.min_.js"></script>
                            <script>
                                var numorder = [0, 32, 15, 19, 4, 21, 2, 25, 17, 34, 6, 27, 13, 36, 11, 30, 8, 23, 10, 5, 24, 16, 33, 1, 20, 14, 31, 9, 22, 18, 29, 7, 28, 12, 35, 3, 26];
                                var numberLoc = [];

                                $('document').ready(function() {
                                    var temparc = 360 / numorder.length;
                                    for (var i = 0; i < numorder.length; i++) {


                                        numberLoc[numorder[i]] = [];
                                        numberLoc[numorder[i]][0] = i * temparc;
                                        numberLoc[numorder[i]][1] = (i * temparc) + temparc;
                                    }

                                    var rndNum = <?echo $rand;?>;
                                    spinTo(rndNum);
                                });

                                function spinTo(num) {
                                    //get location
                                    var temp = numberLoc[num][0];

                                    //randomize
                                    var rndSpace = Math.floor((Math.random() * 360) + 1);
                                    bgrotateTo(rndSpace);
                                    ballrotateTo(rndSpace + temp);

                                }

                                function ballrotateTo(deg) {
                                    var dest = 0 - (360 - deg);

                                    $.keyframe.define({
                                        name: 'ballSpin',
                                        from: {
                                            transform: 'rotate(0deg)'
                                        },
                                        to: {
                                            transform: 'rotate(' + dest + 'deg)'
                                        }
                                    });

                                    $("#ball").playKeyframe({
                                        name: 'ballSpin', // name of the keyframe you want to bind to the selected element
                                        duration: 0, // [optional, default: 0, in ms] how long you want it to last in milliseconds
                                        timingFunction: 'ease-in-out', // [optional, default: ease] specifies the speed curve of the animation
                                    });

                                }

                                function bgrotateTo(deg) {
                                    var dest = 360 * 0 + deg;
                                    $.keyframe.define([{
                                        name: 'wheelSpin',
                                        from: {
                                            transform: 'rotate(0deg)'
                                        },
                                        to: {
                                            transform: 'rotate(' + dest + 'deg)'
                                        }
                                    }]);

                                    $("#wheel").playKeyframe({
                                        name: 'wheelSpin', // name of the keyframe you want to bind to the selected element
                                        duration: 0, // [optional, default: 0, in ms] how long you want it to last in milliseconds
                                        timingFunction: 'ease-in-out', // [optional, default: ease] specifies the speed curve of the animation
                                    });
                                }
                            </script>
                        <?}else if(isset($_POST['bet']) && $stakea!=0){?>
                            <script src="https://wp-n7best.rhcloud.com/wp-content/uploads/2014/04/jquery.keyframes.min_.js"></script>
                            <script>
                                var rotationsTime = 4;
                                var wheelSpinTime = 4;
                                var ballSpinTime = 3;
                                var numorder = [0, 32, 15, 19, 4, 21, 2, 25, 17, 34, 6, 27, 13, 36, 11, 30, 8, 23, 10, 5, 24, 16, 33, 1, 20, 14, 31, 9, 22, 18, 29, 7, 28, 12, 35, 3, 26];
                                var numberLoc = [];

                                $('document').ready(function() {
                                    var temparc = 360 / numorder.length;
                                    for (var i = 0; i < numorder.length; i++) {


                                        numberLoc[numorder[i]] = [];
                                        numberLoc[numorder[i]][0] = i * temparc;
                                        numberLoc[numorder[i]][1] = (i * temparc) + temparc;
                                    }

                                    var rndNum = <?echo $rand;?>;
                                    spinTo(rndNum);
                                });

                                function spinTo(num) {
                                    //get location
                                    var temp = numberLoc[num][0];

                                    //randomize
                                    var rndSpace = Math.floor((Math.random() * 360) + 1);
                                    bgrotateTo(rndSpace);
                                    ballrotateTo(rndSpace + temp);
                                }

                                function ballrotateTo(deg) {
                                    var temptime = (rotationsTime * 1000);
                                    var dest = (-360 * ballSpinTime) - (360 - deg);

                                    $.keyframe.define({
                                        name: 'ballSpin',
                                        from: {
                                            transform: 'rotate(0deg)'
                                        },
                                        to: {
                                            transform: 'rotate(' + dest + 'deg)'
                                        }
                                    });

                                    $("#ball").playKeyframe({
                                        name: 'ballSpin', // name of the keyframe you want to bind to the selected element
                                        duration: temptime, // [optional, default: 0, in ms] how long you want it to last in milliseconds
                                        timingFunction: 'ease-in-out', // [optional, default: ease] specifies the speed curve of the animation
                                    });

                                }

                                function bgrotateTo(deg) {
                                    var dest = 360 * wheelSpinTime + deg;
                                    var temptime = (rotationsTime * 1000) - 1000;



                                    $.keyframe.define([{
                                        name: 'wheelSpin',
                                        from: {
                                            transform: 'rotate(0deg)'
                                        },
                                        to: {
                                            transform: 'rotate(' + dest + 'deg)'
                                        }
                                    }]);

                                    $("#wheel").playKeyframe({
                                        name: 'wheelSpin', // name of the keyframe you want to bind to the selected element
                                        duration: temptime, // [optional, default: 0, in ms] how long you want it to last in milliseconds
                                        timingFunction: 'ease-in-out', // [optional, default: ease] specifies the speed curve of the animation
                                    });
                                }
                            </script>
                            <audio id="spin" src="sounds/rouletteWheel.ogg"></audio>
                            <script>
                                tooLate = 1;

                                $('document').ready(function(){

                                    document.getElementById("betButton").disabled = true;
                                    $("#ball").css("display","");

                                    var ua = navigator.userAgent.toLowerCase();
                                    var isAndroid = ua.indexOf("mobile") > -1;

                                    if(!!navigator.userAgent.match(/Version\/[\d\.]+.*Safari/) == false && isAndroid == false){
                                        $('#spin')[0].play();
                                        $('#spin').animate({volume: 0.35}, 0);
                                        $('#spin').animate({volume: 0}, 4178);
                                    }

                                    <?if($rand==1 ||$rand==3 ||$rand==5 ||$rand==7 ||$rand==9 ||$rand==12 ||$rand==14 ||$rand==16 ||$rand==18 ||$rand==19 ||$rand==21 ||$rand==23 ||$rand==25 ||$rand==27 ||$rand==30 ||$rand==32 ||$rand==34 ||$rand==36){?>
                                    $('#outcome').css('background-color','#660000');
                                    $('#outcome').text('<?echo $rand;?>');
                                    <?}else{?>
                                    $('#outcome').css('background-color','black');
                                    $('#outcome').text('<?echo $rand;?>');
                                    <?}?>

                                    $('#bet').delay(25).animate({opacity:1}, 350);
                                    $('#won').delay(4458).animate({opacity:1}, 500);
                                    $('#outcome').delay(4458).css('display','');
                                    $('#outcome').delay(4458).animate({opacity:0.9}, 500);

                                    $('#dot1').delay(1107).animate({opacity:1});
                                    $('#dot2').delay(1881.9).animate({opacity:1});
                                    $('#dot3').delay(2271).animate({opacity:1});
                                    $('#betButton').delay(4328).animate({opacity:1}, 400, function(){
                                        document.getElementById("betButton").disabled = false;
                                        tooLate = 0;


                                    });

                                });
                            </script>
                        <?} ?>
                        <div class="main curve2px">
                            <div class="menuHeader noTop">
                                Roulette
                            </div>
                            <div style="padding: 5px; margin: auto; text-align: center; color: #fefefe;">
                                <div style="margin: auto; padding-top: 16px; padding-bottom: 6px; text-align: center;">
                                    <form method="post">
                                        <table style="margin-bottom: -3px;" cellspacing="0" align="center">
                                            <tbody>
                                            <tr>
                                                <td rowspan="2" valign="top">
                                                    <div style="width: 199px; position: relative; height: 509px;">
                                                        <a href="#" style="color: gold; font-size: 12px; position: absolute; left: 6px; bottom: 17px;" onclick="clearTable(); return false;">clear all</a>
                                                        <img onclick="addChips('nineteentothirtysix');" class="curve2px noSelect tableChip" draggable="false" id="nineteentothirtysixChip" src="images/casino/roulette/0Chip.png?" style="left: 20px; top: 433px;">
                                                        <img onclick="addChips('odd');" class="curve2px noSelect tableChip" draggable="false" id="oddChip" src="images/casino/roulette/0Chip.png?" style="left: 20px; top: 361px;">
                                                        <img onclick="addChips('black');" class="curve2px noSelect tableChip" draggable="false" id="blackChip" src="images/casino/roulette/0Chip.png?" style="left: 20px; top: 290px;">
                                                        <img onclick="addChips('red');" class="curve2px noSelect tableChip" draggable="false" id="redChip" src="images/casino/roulette/0Chip.png?" style="left: 20px; top: 220px;">
                                                        <img onclick="addChips('even');" class="curve2px noSelect tableChip" draggable="false"
                                                             id="evenChip" src="images/casino/roulette/0Chip.png?"
                                                             style="left: 20px; top: 146px;">
                                                        <img onclick="addChips('onetoeighteen');"
                                                             class="curve2px noSelect tableChip" draggable="false"
                                                             id="onetoeighteenChip"
                                                             src="images/casino/roulette/0Chip.png?"
                                                             style="left: 20px; top: 77px;">
                                                        <img onclick="addChips('3rd12');"
                                                             class="curve2px noSelect tableChip" draggable="false"
                                                             id="3rd12Chip" src="images/casino/roulette/0Chip.png?"
                                                             style="left: 46px; top: 396px;">
                                                        <img onclick="addChips('2nd12');"
                                                             class="curve2px noSelect tableChip" draggable="false"
                                                             id="2nd12Chip" src="images/casino/roulette/0Chip.png?"
                                                             style="left: 46px; top: 253px;">
                                                        <img onclick="addChips('1st12');"
                                                             class="curve2px noSelect tableChip" draggable="false"
                                                             id="1st12Chip" src="images/casino/roulette/0Chip.png?"
                                                             style="left: 46px; top: 112px;">
                                                        <img onclick="addChips('3rdcol');"
                                                             class="curve2px noSelect tableChip" draggable="false"
                                                             id="3rdcolChip" src="images/casino/roulette/0Chip.png?"
                                                             style="left: 171px; top: 485px;">
                                                        <img onclick="addChips('2ndcol');"
                                                             class="curve2px noSelect tableChip" draggable="false"
                                                             id="2ndcolChip" src="images/casino/roulette/0Chip.png?"
                                                             style="left: 126px; top: 485px;">
                                                        <img onclick="addChips('1stcol');"
                                                             class="curve2px noSelect tableChip" draggable="false"
                                                             id="1stcolChip" src="images/casino/roulette/0Chip.png?"
                                                             style="left: 83px; top: 485px;">
                                                        <img onclick="addChips('thirtysix');"
                                                             class="curve2px noSelect tableChip" draggable="false"
                                                             id="thirtysixChip" src="images/casino/roulette/0Chip.png?"
                                                             style="left: 171px; top: 449px;">
                                                        <img onclick="addChips('thirtyfive');"
                                                             class="curve2px noSelect tableChip" draggable="false"
                                                             id="thirtyfiveChip" src="images/casino/roulette/0Chip.png?"
                                                             style="left: 126px; top: 449px;">
                                                        <img onclick="addChips('thirtyfour');"
                                                             class="curve2px noSelect tableChip" draggable="false"
                                                             id="thirtyfourChip" src="images/casino/roulette/0Chip.png?"
                                                             style="left: 83px; top: 449px;">
                                                        <img onclick="addChips('thirtythree');"
                                                             class="curve2px noSelect tableChip" draggable="false"
                                                             id="thirtythreeChip"
                                                             src="images/casino/roulette/0Chip.png?"
                                                             style="left: 171px; top: 414px;">
                                                        <img onclick="addChips('thirtytwo');"
                                                             class="curve2px noSelect tableChip" draggable="false"
                                                             id="thirtytwoChip" src="images/casino/roulette/0Chip.png?"
                                                             style="left: 126px; top: 414px;">
                                                        <img onclick="addChips('thirtyone');"
                                                             class="curve2px noSelect tableChip" draggable="false"
                                                             id="thirtyoneChip" src="images/casino/roulette/0Chip.png?"
                                                             style="left: 83px; top: 414px;">
                                                        <img onclick="addChips('thirty');"
                                                             class="curve2px noSelect tableChip" draggable="false"
                                                             id="thirtyChip" src="images/casino/roulette/0Chip.png?"
                                                             style="left: 171px; top: 379px;">
                                                        <img onclick="addChips('twentynine');"
                                                             class="curve2px noSelect tableChip" draggable="false"
                                                             id="twentynineChip" src="images/casino/roulette/0Chip.png?"
                                                             style="left: 126px; top: 379px;">
                                                        <img onclick="addChips('twentyeight');"
                                                             class="curve2px noSelect tableChip" draggable="false"
                                                             id="twentyeightChip"
                                                             src="images/casino/roulette/0Chip.png?"
                                                             style="left: 83px; top: 379px;">
                                                        <img onclick="addChips('twentyseven');"
                                                             class="curve2px noSelect tableChip" draggable="false"
                                                             id="twentysevenChip"
                                                             src="images/casino/roulette/0Chip.png?"
                                                             style="left: 171px; top: 343px;">
                                                        <img onclick="addChips('twentysix');"
                                                             class="curve2px noSelect tableChip" draggable="false"
                                                             id="twentysixChip" src="images/casino/roulette/0Chip.png?"
                                                             style="left: 126px; top: 343px;">
                                                        <img onclick="addChips('twentyfive');"
                                                             class="curve2px noSelect tableChip" draggable="false"
                                                             id="twentyfiveChip" src="images/casino/roulette/0Chip.png?"
                                                             style="left: 83px; top: 343px;">
                                                        <img onclick="addChips('twentyfour');"
                                                             class="curve2px noSelect tableChip" draggable="false"
                                                             id="twentyfourChip" src="images/casino/roulette/0Chip.png?"
                                                             style="left: 171px; top: 307px;">
                                                        <img onclick="addChips('twentythree');"
                                                             class="curve2px noSelect tableChip" draggable="false"
                                                             id="twentythreeChip"
                                                             src="images/casino/roulette/0Chip.png?"
                                                             style="left: 126px; top: 307px;">
                                                        <img onclick="addChips('twentytwo');"
                                                             class="curve2px noSelect tableChip" draggable="false"
                                                             id="twentytwoChip" src="images/casino/roulette/0Chip.png?"
                                                             style="left: 83px; top: 307px;">
                                                        <img onclick="addChips('twentyone');"
                                                             class="curve2px noSelect tableChip" draggable="false"
                                                             id="twentyoneChip" src="images/casino/roulette/0Chip.png?"
                                                             style="left: 171px; top: 271px;">
                                                        <img onclick="addChips('twenty');"
                                                             class="curve2px noSelect tableChip" draggable="false"
                                                             id="twentyChip" src="images/casino/roulette/0Chip.png?"
                                                             style="left: 126px; top: 271px;">
                                                        <img onclick="addChips('nineteen');"
                                                             class="curve2px noSelect tableChip" draggable="false"
                                                             id="nineteenChip" src="images/casino/roulette/0Chip.png?"
                                                             style="left: 83px; top: 271px;">
                                                        <img onclick="addChips('eighteen');"
                                                             class="curve2px noSelect tableChip" draggable="false"
                                                             id="eighteenChip" src="images/casino/roulette/0Chip.png?"
                                                             style="left: 171px; top: 235px;">
                                                        <img onclick="addChips('seventeen');"
                                                             class="curve2px noSelect tableChip" draggable="false"
                                                             id="seventeenChip" src="images/casino/roulette/0Chip.png?"
                                                             style="left: 126px; top: 235px;">
                                                        <img onclick="addChips('sixteen');"
                                                             class="curve2px noSelect tableChip" draggable="false"
                                                             id="sixteenChip" src="images/casino/roulette/0Chip.png?"
                                                             style="left: 83px; top: 235px;">
                                                        <img onclick="addChips('fifteen');"
                                                             class="curve2px noSelect tableChip" draggable="false"
                                                             id="fifteenChip" src="images/casino/roulette/0Chip.png?"
                                                             style="left: 171px; top: 200px;">
                                                        <img onclick="addChips('fourteen');"
                                                             class="curve2px noSelect tableChip" draggable="false"
                                                             id="fourteenChip" src="images/casino/roulette/0Chip.png?"
                                                             style="left: 126px; top: 200px;">
                                                        <img onclick="addChips('thirteen');"
                                                             class="curve2px noSelect tableChip" draggable="false"
                                                             id="thirteenChip" src="images/casino/roulette/0Chip.png?"
                                                             style="left: 83px; top: 200px;">
                                                        <img onclick="addChips('twelve');"
                                                             class="curve2px noSelect tableChip" draggable="false"
                                                             id="twelveChip" src="images/casino/roulette/0Chip.png?"
                                                             style="left: 171px; top: 163px;">
                                                        <img onclick="addChips('eleven');"
                                                             class="curve2px noSelect tableChip" draggable="false"
                                                             id="elevenChip" src="images/casino/roulette/0Chip.png?"
                                                             style="left: 126px; top: 163px;">
                                                        <img onclick="addChips('ten');"
                                                             class="curve2px noSelect tableChip" draggable="false"
                                                             id="tenChip" src="images/casino/roulette/0Chip.png?"
                                                             style="left: 83px; top: 163px;">
                                                        <img onclick="addChips('nine');"
                                                             class="curve2px noSelect tableChip" draggable="false"
                                                             id="nineChip" src="images/casino/roulette/0Chip.png?"
                                                             style="left: 171px; top: 128px;">
                                                        <img onclick="addChips('eight');"
                                                             class="curve2px noSelect tableChip" draggable="false"
                                                             id="eightChip" src="images/casino/roulette/0Chip.png?"
                                                             style="left: 126px; top: 128px;">
                                                        <img onclick="addChips('seven');"
                                                             class="curve2px noSelect tableChip" draggable="false"
                                                             id="sevenChip" src="images/casino/roulette/0Chip.png?"
                                                             style="left: 83px; top: 128px;">
                                                        <img onclick="addChips('six');"
                                                             class="curve2px noSelect tableChip" draggable="false"
                                                             id="sixChip" src="images/casino/roulette/0Chip.png?"
                                                             style="left: 171px; top: 93px;">
                                                        <img onclick="addChips('five');"
                                                             class="curve2px noSelect tableChip" draggable="false"
                                                             id="fiveChip" src="images/casino/roulette/0Chip.png?"
                                                             style="left: 126px; top: 93px;">
                                                        <img onclick="addChips('four');"
                                                             class="curve2px noSelect tableChip" draggable="false"
                                                             id="fourChip" src="images/casino/roulette/0Chip.png?"
                                                             style="left: 83px; top: 93px;">
                                                        <img onclick="addChips('three');"
                                                             class="curve2px noSelect tableChip" draggable="false"
                                                             id="threeChip" src="images/casino/roulette/0Chip.png?"
                                                             style="left: 171px; top: 57px;">
                                                        <img onclick="addChips('two');"
                                                             class="curve2px noSelect tableChip" draggable="false"
                                                             id="twoChip" src="images/casino/roulette/0Chip.png?"
                                                             style="left: 126px; top: 57px;">
                                                        <img onclick="addChips('one');"
                                                             class="curve2px noSelect tableChip" draggable="false"
                                                             id="oneChip" src="images/casino/roulette/0Chip.png?"
                                                             style="left: 83px; top: 57px;">
                                                        <img onclick="addChips('zero');"
                                                             class="curve2px noSelect tableChip" draggable="false"
                                                             id="zeroChip" src="images/casino/roulette/0Chip.png?"
                                                             style="left: 125px; top: 23px;">
                                                        <img id="tablePic" class="noSelect" draggable="false"
                                                             style="width: 199px;"
                                                             src="images/casino/roulette/table.png">
                                                    </div>
                                                </td>
                                                <td style="color: #bbbbbb; padding-left: 6px; padding-right: 5px; padding-top: 14px; font-size: 11px;"
                                                    class="txtShadow" valign="top">
                                                    <span id="bet" style="opacity: 0; filter: alpha(opacity=0); -ms-filter: 'progid:DXImageTransform.Microsoft.Alpha(Opacity=0)'; display: inline-block; width: 100px;">
                                                        You bet<br>
                                                        <span style="color: #ffffff;"><?if(isset($stakea)){echo "$$stakea";}else{echo '$0';}?></span>
                                                    </span>
                                                    <span style="opacity: 0; filter: alpha(opacity=0); -ms-filter: 'progid:DXImageTransform.Microsoft.Alpha(Opacity=0)';"
                                                          id="dot1">.</span>
                                                    <span style="opacity: 0; filter: alpha(opacity=0); -ms-filter: 'progid:DXImageTransform.Microsoft.Alpha(Opacity=0)'; " id="dot2">.</span>
                                                    <span style="opacity: 0; filter: alpha(opacity=0); -ms-filter: 'progid:DXImageTransform.Microsoft.Alpha(Opacity=0)';" id="dot3">.</span>
                                                    <span style="opacity: 0; filter: alpha(opacity=0); -ms-filter: 'progid:DXImageTransform.Microsoft.Alpha(Opacity=0)'; padding-left: 1px; display: inline-block; width: 100px;" id="won">
                                                        And won<br>
                                                        <span style="color: #ffffff;"><?if(isset($wona)){echo "$$wona";}else{echo '$0';}?></span>
                                                    </span>
                                                    <div class="rouletteWheelHolder"
                                                         style="margin-top: 15px; margin-bottom: 2px;">
                                                        <div id="wonCasino" class="curve4px rouletteCasinoWin"><span
                                                                    style="color: white;">Yon Won all of the owners money!</span>
                                                            <div class="break" style="padding-top: 3px;"></div>
                                                            <span style="font-size: 12px;">You now own the Casino!</span>
                                                        </div>
                                                        <div id="outcome"
                                                             style="background-color: darkgreen; display: none; "></div>
                                                        <img class="rouletteWheel noSelect" draggable="false" id="wheel"
                                                             src="images/casino/wheel3.png">
                                                        <img class="rouletteBall noSelect" draggable="false" id="ball"
                                                             src="images/casino/ball.png" style="display: none;">
                                                        <div style="position: absolute; bottom: 45px; right: 1px; font-size: 9px;">
                                                            <label for="quickspinLabel">Quick Spin: </label><input
                                                                    name="quickspin" id="quickspinLabel" value="1"
                                                                    style=" " type="checkbox"></div>
                                                        <input name="bet" id="betButton" value="Place Bet!"
                                                               class="curve3px textarea"
                                                               style="padding-left: 8px; padding-right: 8px; font-size: 11px; position: absolute; bottom: 15px; right: 1px; "
                                                               type="submit">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding-left: 13px; padding-top: 0px; font-size: 10px;"
                                                    valign="top" height="35%" align="center">
                                                    <table id="chipSet" class="noSelect" style="margin-top: -12px;"
                                                           align="center">
                                                        <tbody>
                                                        <tr>
                                                            <td align="center">
                                                                <span style="float: right; margin-left: -118px; color: #858585; margin-right: 10px;">(shift &amp; click to remove)</span>
                                                                <span class="noSelect" id="selectChipLabel"
                                                                      style="color: #eeeeee; font-size: 11px; padding-bottom: 9px; display: inline-block;">Select Chip: </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td nowrap="">
                                                                <div class="noSelect" style="text-align: left;">
                                                                    <div class="chipHolder" id="chip5"
                                                                         onclick="selectChip(5, 1);"
                                                                         onmouseover="$(this).css('opacity', '1');"
                                                                         onmouseout="if(selectedChip != 5){$(this).css('opacity', '0.6');}">
                                                                        <img src="images/casino/roulette/1Chip.png"
                                                                             class="curve2px noSelect chip"> $5
                                                                    </div>
                                                                    <div class="chipHolder" style="margin-left: 1px;"
                                                                         id="chip25" onclick="selectChip(25, 1);"
                                                                         onmouseover="$(this).css('opacity', '1');"
                                                                         onmouseout="if(selectedChip != 25){$(this).css('opacity', '0.6');}">
                                                                        <img src="images/casino/roulette/1Chip.png"
                                                                             class="curve2px noSelect chip"> $25
                                                                    </div>
                                                                    <div class="chipHolder" id="chip100"
                                                                         onclick="selectChip(100, 1);"
                                                                         onmouseover="$(this).css('opacity', '1');"
                                                                         onmouseout="if(selectedChip != 100){$(this).css('opacity', '0.6');}">
                                                                        <img src="images/casino/roulette/1Chip.png"
                                                                             class="curve2px noSelect chip"> $100
                                                                    </div>
                                                                    <div class="chipHolder" id="chip500"
                                                                         onclick="selectChip(500, 1);"
                                                                         onmouseover="$(this).css('opacity', '1');"
                                                                         onmouseout="if(selectedChip != 500){$(this).css('opacity', '0.6');}">
                                                                        <img src="images/casino/roulette/1Chip.png"
                                                                             class="curve2px noSelect chip"> $500
                                                                    </div>
                                                                    <div class="chipHolder" style="margin-left: 0px;"
                                                                         id="chip2500" onclick="selectChip(2500, 1);"
                                                                         onmouseover="$(this).css('opacity', '1');"
                                                                         onmouseout="if(selectedChip != 2500){$(this).css('opacity', '0.6');}">
                                                                        <img src="images/casino/roulette/2Chip.png?"
                                                                             class="curve2px noSelect chip"> $2.5K
                                                                    </div>
                                                                    <div class="chipHolder" id="chip10000"
                                                                         onclick="selectChip(10000, 1);"
                                                                         onmouseover="$(this).css('opacity', '1');"
                                                                         onmouseout="if(selectedChip != 10000){$(this).css('opacity', '0.6');}">
                                                                        <img src="images/casino/roulette/2Chip.png?"
                                                                             class="curve2px noSelect chip"> $10K
                                                                    </div>
                                                                    <div class="break" style="padding-top: 3px;">
                                                                        <div class="spacer"></div>
                                                                        <div class="break" style="padding-top: 3px;">
                                                                            <div class="chipHolder" id="chip50000"
                                                                                 onclick="selectChip(50000, 1);"
                                                                                 onmouseover="$(this).css('opacity', '1');"
                                                                                 onmouseout="if(selectedChip != 50000){$(this).css('opacity', '0.6');}">
                                                                                <img src="images/casino/roulette/2Chip.png?"
                                                                                     class="curve2px noSelect chip">
                                                                                $50K
                                                                            </div>
                                                                            <div class="chipHolder"
                                                                                 style="margin-left: 0px;"
                                                                                 id="chip250000"
                                                                                 onclick="selectChip(250000, 1);"
                                                                                 onmouseover="$(this).css('opacity', '1');"
                                                                                 onmouseout="if(selectedChip != 250000){$(this).css('opacity', '0.6');}">
                                                                                <img src="images/casino/roulette/2Chip.png?"
                                                                                     class="curve2px noSelect chip">
                                                                                $250K
                                                                            </div>
                                                                            <div class="chipHolder" id="chip500000"
                                                                                 onclick="selectChip(500000, 1);"
                                                                                 onmouseover="$(this).css('opacity', '1');"
                                                                                 onmouseout="if(selectedChip != 500000){$(this).css('opacity', '0.6');}">
                                                                                <img src="images/casino/roulette/2Chip.png?"
                                                                                     class="curve2px noSelect chip">
                                                                                $500K
                                                                            </div>
                                                                            <div class="chipHolder" id="chip1000000"
                                                                                 onclick="selectChip(1000000, 1);"
                                                                                 onmouseover="$(this).css('opacity', '1');"
                                                                                 onmouseout="if(selectedChip != 1000000){$(this).css('opacity', '0.6');}">
                                                                                <img src="images/casino/roulette/3Chip.png?"
                                                                                     class="curve2px noSelect chip"> $1M
                                                                            </div>
                                                                            <div class="chipHolder"
                                                                                 style="margin-left: 0px;"
                                                                                 id="chip2500000"
                                                                                 onclick="selectChip(2500000, 1);"
                                                                                 onmouseover="$(this).css('opacity', '1');"
                                                                                 onmouseout="if(selectedChip != 2500000){$(this).css('opacity', '0.6');}">
                                                                                <img src="images/casino/roulette/4Chip.png?"
                                                                                     class="curve2px noSelect chip">
                                                                                $2.5M
                                                                            </div>
                                                                            <div class="chipHolder" id="chip5000000"
                                                                                 onclick="selectChip(5000000, 1);"
                                                                                 onmouseover="$(this).css('opacity', '1');"
                                                                                 onmouseout="if(selectedChip != 5000000){$(this).css('opacity', '0.6');}">
                                                                                <img src="images/casino/roulette/5Chip.png"
                                                                                     class="curve2px noSelect chip"> $5M
                                                                            </div>
                                                                            <div class="break"
                                                                                 style="padding-top: 3px;">
                                                                                <div class="spacer"></div>
                                                                                <div class="break"
                                                                                     style="padding-top: 3px;">
                                                                                    <div class="chipHolder"
                                                                                         id="chip25000000"
                                                                                         onclick="selectChip(25000000, 1);"
                                                                                         onmouseover="$(this).css('opacity', '1');"
                                                                                         onmouseout="if(selectedChip != 25000000){$(this).css('opacity', '0.6');}">
                                                                                        <img src="images/casino/roulette/6Chip.png"
                                                                                             class="curve2px noSelect chip">
                                                                                        $25M
                                                                                    </div>
                                                                                    <div class="chipHolder"
                                                                                         style="margin-left: 0px;"
                                                                                         id="chip100000000"
                                                                                         onclick="selectChip(100000000, 1);"
                                                                                         onmouseover="$(this).css('opacity', '1');"
                                                                                         onmouseout="if(selectedChip != 100000000){$(this).css('opacity', '0.6');}">
                                                                                        <img src="images/casino/roulette/7Chip.png?"
                                                                                             class="curve2px noSelect chip">
                                                                                        $100M
                                                                                    </div>
                                                                                    <div class="chipHolder"
                                                                                         id="chip500000000"
                                                                                         onclick="selectChip(500000000, 1);"
                                                                                         onmouseover="$(this).css('opacity', '1');"
                                                                                         onmouseout="if(selectedChip != 500000000){$(this).css('opacity', '0.6');}">
                                                                                        <img src="images/casino/roulette/8Chip.png"
                                                                                             class="curve2px noSelect chip">
                                                                                        $500M
                                                                                    </div>
                                                                                    <div class="chipHolder"
                                                                                         id="chip1000000000"
                                                                                         onclick="selectChip(1000000000, 1);"
                                                                                         onmouseover="$(this).css('opacity', '1');"
                                                                                         onmouseout="if(selectedChip != 1000000000){$(this).css('opacity', '0.6');}">
                                                                                        <img src="images/casino/roulette/9Chip.png"
                                                                                             class="curve2px noSelect chip">
                                                                                        $1B
                                                                                    </div>
                                                                                    <div class="chipHolder"
                                                                                         style="margin-left: 0px;"
                                                                                         id="chip2500000000"
                                                                                         onclick="selectChip(2500000000, 1);"
                                                                                         onmouseover="$(this).css('opacity', '1');"
                                                                                         onmouseout="if(selectedChip != 2500000000){$(this).css('opacity', '0.6');}">
                                                                                        <img src="images/casino/roulette/10Chip.png"
                                                                                             class="curve2px noSelect chip">
                                                                                        $2.5B
                                                                                    </div>
                                                                                    <div class="chipHolder"
                                                                                         id="chip10000000000"
                                                                                         onclick="selectChip(10000000000, 1);"
                                                                                         onmouseover="$(this).css('opacity', '1');"
                                                                                         onmouseout="if(selectedChip != 10000000000){$(this).css('opacity', '0.6');}">
                                                                                        <img src="images/casino/roulette/11Chip.png"
                                                                                             class="curve2px noSelect chip">
                                                                                        $10B
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                    <input name="chip" id="chip" value="0" type="hidden">
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    <div class="break" style="padding-top: 6px;">
                                        <div class="spacer"></div>
                                        <div class="noSelect" style="margin: auto; width: 100%; text-align: left;">
                                            <table width="100%" cellspacing="0" cellpadding="0">
                                                <tbody>
                                                <tr>
                                                    <td style="padding-top: 8px; padding-bottom: 8px; color: #aaaaaa;font-size: 115%;"
                                                        valign="top" nowrap="" align="center">
                                                        Owner: <a href="viewprofile.php?username=<? echo $ownername; ?>"
                                                                  style="color: #ffffff;"><? echo $ownername; ?></a><span
                                                                style="color: #555555; padding-left: 7px; padding-right: 7px;"> - </span>
                                                        Maximum Bet: <span
                                                                style="color: #ffffff;"><? echo ($ownermaxbettwo == 'Infinite') ? $ownermaxbettwo : '$'.$ownermaxbettwo; ?></span>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <div class="spacer"></div>
                                            <table width="100%">
                                                <tbody><tr>
                                                    <td>
<span id="zeroStake" class="stakeSpan">
<span class="curve2px stakeSpanBox" style="background-color: darkgreen;">0</span>
<span class="dollarCount" id="zeroCount">$0</span>
<input value="0" class="realCount" name="zero" id="zeroCountVal" type="hidden">
<input value="0" class="chipColour" name="zeroColour" id="zeroColourVal" type="hidden">
</span>
                                                        <span id="oneStake" class="stakeSpan">
<span class="curve2px stakeSpanBox" style="background-color: #660000;">1</span>
<span class="dollarCount" id="oneCount">$0</span>
<input value="0" class="realCount" name="1" id="oneCountVal" type="hidden">
<input value="0" class="chipColour" name="oneColour" id="oneColourVal" type="hidden">
</span>
                                                        <span id="twoStake" class="stakeSpan">
<span class="curve2px stakeSpanBox" style="background-color: black;">2</span>
<span class="dollarCount" id="twoCount">$0</span>
<input value="0" class="realCount" name="2" id="twoCountVal" type="hidden">
<input value="0" class="chipColour" name="twoColour" id="twoColourVal" type="hidden">
</span>
                                                        <span id="threeStake" class="stakeSpan">
<span class="curve2px stakeSpanBox" style="background-color: #660000;">3</span>
<span class="dollarCount" id="threeCount">$0</span>
<input value="0" class="realCount" name="3" id="threeCountVal" type="hidden">
<input value="0" class="chipColour" name="threeColour" id="threeColourVal" type="hidden">
</span>
                                                        <span id="fourStake" class="stakeSpan">
<span class="curve2px stakeSpanBox" style="background-color: black;">4</span>
<span class="dollarCount" id="fourCount">$0</span>
<input value="0" class="realCount" name="4" id="fourCountVal" type="hidden">
<input value="0" class="chipColour" name="fourColour" id="fourColourVal" type="hidden">
</span>
                                                        <span id="fiveStake" class="stakeSpan">
<span class="curve2px stakeSpanBox" style="background-color: #660000;">5</span>
<span class="dollarCount" id="fiveCount">$0</span>
<input value="0" class="realCount" name="5" id="fiveCountVal" type="hidden">
<input value="0" class="chipColour" name="fiveColour" id="fiveColourVal" type="hidden">
</span>
                                                        <span id="sixStake" class="stakeSpan">
<span class="curve2px stakeSpanBox" style="background-color: black;">6</span>
<span class="dollarCount" id="sixCount">$0</span>
<input value="0" class="realCount" name="6" id="sixCountVal" type="hidden">
<input value="0" class="chipColour" name="sixColour" id="sixColourVal" type="hidden">
</span>
                                                        <span id="sevenStake" class="stakeSpan">
<span class="curve2px stakeSpanBox" style="background-color: #660000;">7</span>
<span class="dollarCount" id="sevenCount">$0</span>
<input value="0" class="realCount" name="7" id="sevenCountVal" type="hidden">
<input value="0" class="chipColour" name="sevenColour" id="sevenColourVal" type="hidden">
</span>
                                                        <span id="eightStake" class="stakeSpan">
<span class="curve2px stakeSpanBox" style="background-color: black;">8</span>
<span class="dollarCount" id="eightCount">$0</span>
<input value="0" class="realCount" name="8" id="eightCountVal" type="hidden">
<input value="0" class="chipColour" name="eightColour" id="eightColourVal" type="hidden">
</span>
                                                        <span id="nineStake" class="stakeSpan">
<span class="curve2px stakeSpanBox" style="background-color: #660000;">9</span>
<span class="dollarCount" id="nineCount">$0</span>
<input value="0" class="realCount" name="9" id="nineCountVal" type="hidden">
<input value="0" class="chipColour" name="nineColour" id="nineColourVal" type="hidden">
</span>
                                                        <span id="tenStake" class="stakeSpan">
<span class="curve2px stakeSpanBox" style="background-color: black;">10</span>
<span class="dollarCount" id="tenCount">$0</span>
<input value="0" class="realCount" name="10" id="tenCountVal" type="hidden">
<input value="0" class="chipColour" name="tenColour" id="tenColourVal" type="hidden">
</span>
                                                        <span id="elevenStake" class="stakeSpan">
<span class="curve2px stakeSpanBox" style="background-color: black;">11</span>
<span class="dollarCount" id="elevenCount">$0</span>
<input value="0" class="realCount" name="11" id="elevenCountVal" type="hidden">
<input value="0" class="chipColour" name="elevenColour" id="elevenColourVal" type="hidden">
</span>
                                                        <span id="twelveStake" class="stakeSpan">
<span class="curve2px stakeSpanBox" style="background-color: #660000;">12</span>
<span class="dollarCount" id="twelveCount">$0</span>
<input value="0" class="realCount" name="12" id="twelveCountVal" type="hidden">
<input value="0" class="chipColour" name="twelveColour" id="twelveColourVal" type="hidden">
</span>
                                                        <span id="thirteenStake" class="stakeSpan">
<span class="curve2px stakeSpanBox" style="background-color: black;">13</span>
<span class="dollarCount" id="thirteenCount">$0</span>
<input value="0" class="realCount" name="13" id="thirteenCountVal" type="hidden">
<input value="0" class="chipColour" name="thirteenColour" id="thirteenColourVal" type="hidden">
</span>
                                                        <span id="fourteenStake" class="stakeSpan">
<span class="curve2px stakeSpanBox" style="background-color: #660000;">14</span>
<span class="dollarCount" id="fourteenCount">$0</span>
<input value="0" class="realCount" name="14" id="fourteenCountVal" type="hidden">
<input value="0" class="chipColour" name="fourteenColour" id="fourteenColourVal" type="hidden">
</span>
                                                        <span id="fifteenStake" class="stakeSpan">
<span class="curve2px stakeSpanBox" style="background-color: black;">15</span>
<span class="dollarCount" id="fifteenCount">$0</span>
<input value="0" class="realCount" name="15" id="fifteenCountVal" type="hidden">
<input value="0" class="chipColour" name="fifteenColour" id="fifteenColourVal" type="hidden">
</span>
                                                        <span id="sixteenStake" class="stakeSpan">
<span class="curve2px stakeSpanBox" style="background-color: #660000;">16</span>
<span class="dollarCount" id="sixteenCount">$0</span>
<input value="0" class="realCount" name="16" id="sixteenCountVal" type="hidden">
<input value="0" class="chipColour" name="sixteenColour" id="sixteenColourVal" type="hidden">
</span>
                                                        <span id="seventeenStake" class="stakeSpan">
<span class="curve2px stakeSpanBox" style="background-color: black;">17</span>
<span class="dollarCount" id="seventeenCount">$0</span>
<input value="0" class="realCount" name="17" id="seventeenCountVal" type="hidden">
<input value="0" class="chipColour" name="seventeenColour" id="seventeenColourVal" type="hidden">
</span>
                                                        <span id="eighteenStake" class="stakeSpan">
<span class="curve2px stakeSpanBox" style="background-color: #660000;">18</span>
<span class="dollarCount" id="eighteenCount">$0</span>
<input value="0" class="realCount" name="18" id="eighteenCountVal" type="hidden">
<input value="0" class="chipColour" name="eighteenColour" id="eighteenColourVal" type="hidden">
</span>
                                                        <span id="nineteenStake" class="stakeSpan">
<span class="curve2px stakeSpanBox" style="background-color: #660000;">19</span>
<span class="dollarCount" id="nineteenCount">$0</span>
<input value="0" class="realCount" name="19" id="nineteenCountVal" type="hidden">
<input value="0" class="chipColour" name="nineteenColour" id="nineteenColourVal" type="hidden">
</span>
                                                        <span id="twentyStake" class="stakeSpan">
<span class="curve2px stakeSpanBox" style="background-color: black;">20</span>
<span class="dollarCount" id="twentyCount">$0</span>
<input value="0" class="realCount" name="20" id="twentyCountVal" type="hidden">
<input value="0" class="chipColour" name="twentyColour" id="twentyColourVal" type="hidden">
</span>
                                                        <span id="twentyoneStake" class="stakeSpan">
<span class="curve2px stakeSpanBox" style="background-color: #660000;">21</span>
<span class="dollarCount" id="twentyoneCount">$0</span>
<input value="0" class="realCount" name="21" id="twentyoneCountVal" type="hidden">
<input value="0" class="chipColour" name="twentyoneColour" id="twentyoneColourVal" type="hidden">
</span>
                                                        <span id="twentytwoStake" class="stakeSpan">
<span class="curve2px stakeSpanBox" style="background-color: black;">22</span>
<span class="dollarCount" id="twentytwoCount">$0</span>
<input value="0" class="realCount" name="22" id="twentytwoCountVal" type="hidden">
<input value="0" class="chipColour" name="twentytwoColour" id="twentytwoColourVal" type="hidden">
</span>
                                                        <span id="twentythreeStake" class="stakeSpan">
<span class="curve2px stakeSpanBox" style="background-color: #660000;">23</span>
<span class="dollarCount" id="twentythreeCount">$0</span>
<input value="0" class="realCount" name="23" id="twentythreeCountVal" type="hidden">
<input value="0" class="chipColour" name="twentythreeColour" id="twentythreeColourVal" type="hidden">
</span>
                                                        <span id="twentyfourStake" class="stakeSpan">
<span class="curve2px stakeSpanBox" style="background-color: black;">24</span>
<span class="dollarCount" id="twentyfourCount">$0</span>
<input value="0" class="realCount" name="24" id="twentyfourCountVal" type="hidden">
<input value="0" class="chipColour" name="twentyfourColour" id="twentyfourColourVal" type="hidden">
</span>
                                                        <span id="twentyfiveStake" class="stakeSpan">
<span class="curve2px stakeSpanBox" style="background-color: #660000;">25</span>
<span class="dollarCount" id="twentyfiveCount">$0</span>
<input value="0" class="realCount" name="25" id="twentyfiveCountVal" type="hidden">
<input value="0" class="chipColour" name="twentyfiveColour" id="twentyfiveColourVal" type="hidden">
</span>
                                                        <span id="twentysixStake" class="stakeSpan">
<span class="curve2px stakeSpanBox" style="background-color: black;">26</span>
<span class="dollarCount" id="twentysixCount">$0</span>
<input value="0" class="realCount" name="26" id="twentysixCountVal" type="hidden">
<input value="0" class="chipColour" name="twentysixColour" id="twentysixColourVal" type="hidden">
</span>
                                                        <span id="twentysevenStake" class="stakeSpan">
<span class="curve2px stakeSpanBox" style="background-color: #660000;">27</span>
<span class="dollarCount" id="twentysevenCount">$0</span>
<input value="0" class="realCount" name="27" id="twentysevenCountVal" type="hidden">
<input value="0" class="chipColour" name="twentysevenColour" id="twentysevenColourVal" type="hidden">
</span>
                                                        <span id="twentyeightStake" class="stakeSpan">
<span class="curve2px stakeSpanBox" style="background-color: black;">28</span>
<span class="dollarCount" id="twentyeightCount">$0</span>
<input value="0" class="realCount" name="28" id="twentyeightCountVal" type="hidden">
<input value="0" class="chipColour" name="twentyeightColour" id="twentyeightColourVal" type="hidden">
</span>
                                                        <span id="twentynineStake" class="stakeSpan">
<span class="curve2px stakeSpanBox" style="background-color: black;">29</span>
<span class="dollarCount" id="twentynineCount">$0</span>
<input value="0" class="realCount" name="29" id="twentynineCountVal" type="hidden">
<input value="0" class="chipColour" name="twentynineColour" id="twentynineColourVal" type="hidden">
</span>
                                                        <span id="thirtyStake" class="stakeSpan">
<span class="curve2px stakeSpanBox" style="background-color: #660000;">30</span>
<span class="dollarCount" id="thirtyCount">$0</span>
<input value="0" class="realCount" name="30" id="thirtyCountVal" type="hidden">
<input value="0" class="chipColour" name="thirtyColour" id="thirtyColourVal" type="hidden">
</span>
                                                        <span id="thirtyoneStake" class="stakeSpan">
<span class="curve2px stakeSpanBox" style="background-color: black;">31</span>
<span class="dollarCount" id="thirtyoneCount">$0</span>
<input value="0" class="realCount" name="31" id="thirtyoneCountVal" type="hidden">
<input value="0" class="chipColour" name="thirtyoneColour" id="thirtyoneColourVal" type="hidden">
</span>
                                                        <span id="thirtytwoStake" class="stakeSpan">
<span class="curve2px stakeSpanBox" style="background-color: #660000;">32</span>
<span class="dollarCount" id="thirtytwoCount">$0</span>
<input value="0" class="realCount" name="32" id="thirtytwoCountVal" type="hidden">
<input value="0" class="chipColour" name="thirtytwoColour" id="thirtytwoColourVal" type="hidden">
</span>
                                                        <span id="thirtythreeStake" class="stakeSpan">
<span class="curve2px stakeSpanBox" style="background-color: black;">33</span>
<span class="dollarCount" id="thirtythreeCount">$0</span>
<input value="0" class="realCount" name="33" id="thirtythreeCountVal" type="hidden">
<input value="0" class="chipColour" name="thirtythreeColour" id="thirtythreeColourVal" type="hidden">
</span>
                                                        <span id="thirtyfourStake" class="stakeSpan">
<span class="curve2px stakeSpanBox" style="background-color: #660000;">34</span>
<span class="dollarCount" id="thirtyfourCount">$0</span>
<input value="0" class="realCount" name="34" id="thirtyfourCountVal" type="hidden">
<input value="0" class="chipColour" name="thirtyfourColour" id="thirtyfourColourVal" type="hidden">
</span>
                                                        <span id="thirtyfiveStake" class="stakeSpan">
<span class="curve2px stakeSpanBox" style="background-color: black;">35</span>
<span class="dollarCount" id="thirtyfiveCount">$0</span>
<input value="0" class="realCount" name="35" id="thirtyfiveCountVal" type="hidden">
<input value="0" class="chipColour" name="thirtyfiveColour" id="thirtyfiveColourVal" type="hidden">
</span>
                                                        <span id="thirtysixStake" class="stakeSpan">
<span class="curve2px stakeSpanBox" style="background-color: #660000;">36</span>
<span class="dollarCount" id="thirtysixCount">$0</span>
<input value="0" class="realCount" name="36" id="thirtysixCountVal" type="hidden">
<input value="0" class="chipColour" name="thirtysixColour" id="thirtysixColourVal" type="hidden">
</span>
                                                        <div class="break" style="padding-top: 0px;">
<span id="1st12Stake" class="stakeSpan">
<span class="curve2px stakeSpanBox2" style="background-color: #181818;">1st 12</span>
<span class="dollarCount" id="1st12Count">$0</span>
<input value="0" class="realCount" name="1st12" id="1st12CountVal" type="hidden">
<input value="0" class="chipColour" name="1st12Colour" id="1st12ColourVal" type="hidden">
</span>
                                                            <span id="2nd12Stake" class="stakeSpan">
<span class="curve2px stakeSpanBox2" style="background-color: #181818;">2nd 12</span>
<span class="dollarCount" id="2nd12Count">$0</span>
<input value="0" class="realCount" name="2nd12" id="2nd12CountVal" type="hidden">
<input value="0" class="chipColour" name="2nd12Colour" id="2nd12ColourVal" type="hidden">
</span>
                                                            <span id="3rd12Stake" class="stakeSpan">
<span class="curve2px stakeSpanBox2" style="background-color: #181818;">3rd 12</span>
<span class="dollarCount" id="3rd12Count">$0</span>
<input value="0" class="realCount" name="3rd12" id="3rd12CountVal" type="hidden">
<input value="0" class="chipColour" name="3rd12Colour" id="3rd12ColourVal" type="hidden">
</span>
                                                            <span id="1stcolStake" class="stakeSpan">
<span class="curve2px stakeSpanBox2" style="background-color: #171717;">1st Col</span>
<span class="dollarCount" id="1stcolCount">$0</span>
<input value="0" class="realCount" name="1stcol" id="1stcolCountVal" type="hidden">
<input value="0" class="chipColour" name="1stcolColour" id="1stcolColourVal" type="hidden">
</span>
                                                            <span id="2ndcolStake" class="stakeSpan">
<span class="curve2px stakeSpanBox2" style="background-color: #171717;">2nd Col</span>
<span class="dollarCount" id="2ndcolCount">$0</span>
<input value="0" class="realCount" name="2ndcol" id="2ndcolCountVal" type="hidden">
<input value="0" class="chipColour" name="2ndcolColour" id="2ndcolColourVal" type="hidden">
</span>
                                                            <span id="3rdcolStake" class="stakeSpan">
<span class="curve2px stakeSpanBox2" style="background-color: #171717;">3rd Col</span>
<span class="dollarCount" id="3rdcolCount">$0</span>
<input value="0" class="realCount" name="3rdcol" id="3rdcolCountVal" type="hidden">
<input value="0" class="chipColour" name="3rdcolColour" id="3rdcolColourVal" type="hidden">
</span>
                                                            <span id="onetoeighteenStake" class="stakeSpan">
<span class="curve2px stakeSpanBox2" style="background-color: #171717;">1 - 18</span>
<span class="dollarCount" id="onetoeighteenCount">$0</span>
<input value="0" class="realCount" name="1to18" id="onetoeighteenCountVal" type="hidden">
<input value="0" class="chipColour" name="onetoeighteenColour" id="onetoeighteenColourVal" type="hidden">
</span>
                                                            <span id="nineteentothirtysixStake" class="stakeSpan">
<span class="curve2px stakeSpanBox2" style="background-color: #171717;">19 - 36</span>
<span class="dollarCount" id="nineteentothirtysixCount">$0</span>
<input value="0" class="realCount" name="19to36" id="nineteentothirtysixCountVal" type="hidden">
<input value="0" class="chipColour" name="nineteentothirtysixColour" id="nineteentothirtysixColourVal" type="hidden">
</span>
                                                            <span id="evenStake" class="stakeSpan">
<span class="curve2px stakeSpanBox2" style="background-color: #171717;">Even</span>
<span class="dollarCount" id="evenCount">$0</span>
<input value="0" class="realCount" name="even" id="evenCountVal" type="hidden">
<input value="0" class="chipColour" name="evenColour" id="evenColourVal" type="hidden">
</span>
                                                            <span id="oddStake" class="stakeSpan">
<span class="curve2px stakeSpanBox2" style="background-color: #171717;">Odd</span>
<span class="dollarCount" id="oddCount">$0</span>
<input value="0" class="realCount" name="odd" id="oddCountVal" type="hidden">
<input value="0" class="chipColour" name="oddColour" id="oddColourVal" type="hidden">
</span>
                                                            <span id="redStake" class="stakeSpan">
<span class="curve2px stakeSpanBox2" style="background-color: #660000;">Red</span>
<span class="dollarCount" id="redCount">$0</span>
<input value="0" class="realCount" name="red" id="redCountVal" type="hidden">
<input value="0" class="chipColour" name="redColour" id="redColourVal" type="hidden">
</span>
                                                            <span id="blackStake" class="stakeSpan">
<span class="curve2px stakeSpanBox2" style="background-color: #010101;">Black</span>
<span class="dollarCount" id="blackCount">$0</span>
<input value="0" class="realCount" name="black" id="blackCountVal" type="hidden">
<input value="0" class="chipColour" name="blackColour" id="blackColourVal" type="hidden">
</span>
                                                        </div></td>
                                                    <td style="text-align: right; padding-right: 12px; padding-top: 8px; padding-bottom: 8px; padding-left: 3px; color: #aaaaaa;" valign="top" nowrap="" align="right">
                                                        Stake: <span id="totalStake" style="color: #ffffff;">$<?if(isset($stakea)){echo $stakea;}else{echo "0";}?></span><span id="totalStakeVal" style="display: none;">0</span>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    </form>
                                    <div class="spacer"></div>
                                    <div class="break" style="padding-top: 7px;"></div>
                                        <? if (($owner != '0') || ($userrankid >= '25')) { ?>
                                    <div align="center" style="padding-top:30px;">
                                            <table class="regTable"
                                                   style="margin-left: 10px; margin-right: 0; min-width: 230px; margin-bottom: 11px; width: 85%; max-width: 550px;text-align: center;"
                                                   cellspacing="0" cellpadding="0" align="center">
                                                <tbody>
                                                <tr>
                                                    <td class="header" colspan="3">
                                                        Edit Roulette Stats
                                                    </td>
                                                </tr>
                                                <form method=post>
                                                    <tr>
                                                        <td class="col noTop">
                                                            Set Maxbet:<input type=submit name=doall class=textbox
                                                                              style="visibility:hidden; width:1%;">
                                                        </td>
                                                        <td class="col noTop">
                                                            <input type=text name=setmaxrlt class="textarea"
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
                                                            Send Roulette:<input type=submit name=doall class=textbox
                                                                                 style="visibility:hidden; width:1%;">
                                                        </td>
                                                        <td class="col">
                                                            <input type=text name=setownerlt class="textarea"
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
                                                            Sell Roulette:<input type=submit name=doall class=textbox
                                                                                 style="visibility:hidden; width:1%;">
                                                        </td>
                                                        <td class="col">
                                                            <input type=text name=setpricerlt class="textarea"
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
                                                            <input type=text name=setbuybackrlt class="textarea"
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
                                                                   class="textarea curve3px" name=resetrltprofit>
                                                        </td>
                                                    </tr>
                                                </form>
                                                </tbody>
                                            </table>
                                    </div>
                                        <? } ?>
                                        <? if (($ownername == 'None')) {
                                            echo '<div align="center" style="padding-top:30px;"><form method=post style="padding-top:10px;">
                                        <input type=submit value="Take Over Casino" class="textarea curve3px" name=takeoverrlt>
                                        </form></div>';
                                        } ?>
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
            $timetwo = $time - 3000;

            $acount = mysql_num_rows(mysql_query("SELECT * FROM users WHERE crewid='$getcrewid' and activity >= '$timetwo'"));

            if ($getcrewid == 0) {
                ?>
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
            <? } else {
                ?>
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
                                            style="z-index: 0; margin-top: 1px; float: right; color: white; opacity: 0.88; font-size: 9px;"><? echo $acount; ?>
                                        <span class="membersOnline twinkle"
                                              style="position: relative; top: -0.75px;">•</span></span>
                                    <?
                                    $getcrewsql = mysql_query("SELECT boss,id,name FROM crews WHERE id = '$getcrewid'");
                                    $getcrewarray = mysql_fetch_array($getcrewsql);

                                    $getcrewboss = $getcrewarray['boss'];
                                    if ($getcrewboss == $getname) {
                                        ?>
                                        <a style="margin-left: -35px; float: right; padding-left: 3px; margin-right: 8px; padding-top: 0px; font-size: 9px; opacity: 0.25;"
                                           href="#" onclick="clearFeed();">wipe</a>
                                    <? } ?>
                                </div>
                                <div class="preventscroll crewFeedScroll" id="crewFeedScrollID"
                                     style="max-height: 330px;">
                                    <div id="crewFeedChat" style="max-width: 218px;">
                                    <?
                                        if(isset($_SESSION['chat'])){
                                            echo $_SESSION['chat'];
                                        }
                                    ?>
                                </div>
                                    <form method="post" onsubmit="submitCrewFeed(); return false;">
                                        <input type="hidden" value="<? echo $statustesttwo['username']; ?>"
                                               id="feed_name">
                                        <input type="hidden" value="<? echo $statustesttwo['crewid']; ?>"
                                               id="feed_crew">
                                        <input class="textarea" id="feed_msg"
                                               style="box-sizing: border-box; -moz-box-sizing: border-box; width: 100%; position: absolute; bottom: 0; margin-bottom: -1px; border-top: 2px solid rgba(20, 20, 20, 0.8); border-bottom: 0; border-left: 0; border-right: 0;"
                                               placeholder="Enter Message..." type="text"></form>
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
                <div style="padding: 10px; font-size: 9.5px; opacity:0.7; text-align: center;">You can mute sounds in <a
                            href="profile.php">Edit Profile</a></div>
            <? } ?>
        </td>
    </tr>
</table>
<script>
    $('document').ready(function () {
        <?if($no['0'] != 0){?>
        returnedChip(<?echo$no['0'];?>, 'zero');
        <?}if($no['1'] != 0){?>
        returnedChip(<?echo$no['1'];?>, 'one');

        <?}if($no['2'] != 0){?>
        returnedChip(<?echo$no['2'];?>, 'two');

        <?}if($no['3'] != 0){?>
        returnedChip(<?echo$no['3'];?>, 'three');

        <?}if($no['4'] != 0){?>
        returnedChip(<?echo$no['4'];?>, 'four');

        <?}if($no['5'] != 0){?>
        returnedChip(<?echo$no['5'];?>, 'five');

        <?}if($no['6'] != 0){?>
        returnedChip(<?echo$no['6'];?>, 'six');

        <?}if($no['7'] != 0){?>
        returnedChip(<?echo$no['7'];?>, 'seven');

        <?}if($no['8'] != 0){?>
        returnedChip(<?echo$no['8'];?>, 'eight');

        <?}if($no['9'] != 0){?>
        returnedChip(<?echo$no['9'];?>, 'nine');

        <?}if($no['10'] != 0){?>
        returnedChip(<?echo$no['10'];?>, 'ten');

        <?}if($no['11'] != 0){?>
        returnedChip(<?echo$no['11'];?>, 'eleven');

        <?}if($no['12'] != 0){?>
        returnedChip(<?echo$no['12'];?>, 'twelve');

        <?}if($no['13'] != 0){?>
        returnedChip(<?echo$no['13'];?>, 'thirteen');

        <?}if($no['14'] != 0){?>
        returnedChip(<?echo$no['14'];?>, 'fourteen');

        <?}if($no['15'] != 0){?>
        returnedChip(<?echo$no['15'];?>, 'fifteen');

        <?}if($no['16'] != 0){?>
        returnedChip(<?echo$no['16'];?>, 'sixteen');

        <?}if($no['17'] != 0){?>
        returnedChip(<?echo$no['17'];?>, 'seventeen');

        <?}if($no['18'] != 0){?>
        returnedChip(<?echo$no['18'];?>, 'eighteen');

        <?}if($no['19'] != 0){?>
        returnedChip(<?echo$no['19'];?>, 'nineteen');

        <?}if($no['20'] != 0){?>
        returnedChip(<?echo$no['20'];?>, 'twenty');

        <?}if($no['21'] != 0){?>
        returnedChip(<?echo$no['21'];?>, 'twentyone');

        <?}if($no['22'] != 0){?>
        returnedChip(<?echo$no['22'];?>, 'twentytwo');

        <?}if($no['23'] != 0){?>
        returnedChip(<?echo$no['23'];?>, 'twentythree');

        <?}if($no['24'] != 0){?>
        returnedChip(<?echo$no['24'];?>, 'twentyfour');

        <?}if($no['25'] != 0){?>
        returnedChip(<?echo$no['25'];?>, 'twentyfive');

        <?}if($no['26'] != 0){?>
        returnedChip(<?echo$no['26'];?>, 'twentysix');

        <?}if($no['27'] != 0){?>
        returnedChip(<?echo$no['27'];?>, 'twentyseven');

        <?}if($no['28'] != 0){?>
        returnedChip(<?echo$no['28'];?>, 'twentyeight');

        <?}if($no['29'] != 0){?>
        returnedChip(<?echo$no['29'];?>, 'twentynine');

        <?}if($no['30'] != 0){?>
        returnedChip(<?echo$no['30'];?>, 'thirty');

        <?}if($no['31'] != 0){?>
        returnedChip(<?echo$no['31'];?>, 'thirtyone');

        <?}if($no['32'] != 0){?>
        returnedChip(<?echo$no['32'];?>, 'thirtytwo');

        <?}if($no['33'] != 0){?>
        returnedChip(<?echo$no['33'];?>, 'thirtythree');

        <?}if($no['34'] != 0){?>
        returnedChip(<?echo$no['34'];?>, 'thirtyfour');

        <?}if($no['35'] != 0){?>
        returnedChip(<?echo$no['35'];?>, 'thirtyfive');

        <?}if($no['36'] != 0){?>
        returnedChip(<?echo$no['36'];?>, 'thirtysix');

        <?}if($no['red'] != 0){?>
        returnedChip(<?echo$no['red'];?>, 'red');

        <?}if($no['black'] != 0){?>
        returnedChip(<?echo$no['black'];?>, 'black');

        <?}if($no['odd'] != 0){?>
        returnedChip(<?echo$no['odd'];?>, 'odd');

        <?}if($no['even'] != 0){?>
        returnedChip(<?echo$no['even'];?>, 'even');

        <?}if($no['1to18'] != 0){?>
        returnedChip(<?echo$no['1to18'];?>, 'onetoeighteen');

        <?}if($no['19to36'] != 0){?>
        returnedChip(<?echo$no['19to36'];?>, 'nineteentothirtysix');

        ;<?}if($no['1st12'] != 0){?>
        returnedChip(<?echo$no['1st12'];?>, '1st12');

        <?}if($no['2nd12'] != 0){?>
        returnedChip(<?echo$no['2nd12'];?>, '2nd12');

        <?}if($no['3rd12'] != 0){?>
        returnedChip(<?echo$no['3rd12'];?>, '3rd12');

        <?}if($no['column1'] != 0){?>
        returnedChip(<?echo$no['column1'];?>, '1stcol');

        <?}if($no['column2'] != 0){?>
        returnedChip(<?echo$no['column2'];?>, '2ndcol');

        <?}if($no['column3'] != 0){?>
        returnedChip(<?echo$no['column3'];?>, '3rdcol');

        <?}?>
    });
</script>
</body>
</html>