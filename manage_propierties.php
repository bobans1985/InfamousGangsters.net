<? include 'included.php';
session_start();
if(!isset($_GET['cpanel'])){
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <script src="javascript/jquery.min.js"></script>
    <script src="javascript/main3.js"></script>

    <script>
        crewfeed();
    </script>
    <link rel="stylesheet" type="text/css" href="css/layout.css">
    <link rel="stylesheet" href="layout/style.css" type="text/css"/>
    <title>Infamous Gangsters</title>
    <link rel="icon" type="image/png" href="images/icon.png">
    

    <style>
        .stat.title:first-of-type {
            margin-top: 9px;
        }

        .stat.title {
            margin-top: 9px;
        }

        {
            margin-top: 14px
        ;
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
            <?
            }

            $user = $statustesttwo['username'];
            $ida = $statustesttwo['ID'];
            $rankid = $statustesttwo['rankid'];
            $thelocation = $statustesttwo['location'];
            $crewid = $statustesttwo['crewid'];
            $hdo = $statustesttwo['hdo'];
            $rr = $statustesttwo['rr'];
            $silencer = $statustesttwo['silencer'];
            $mails = $statustesttwo['mail'];
            $mitopics = $statustesttwo['topics'];
            $thdotestnumrowssss = $statustesttwo['thdo'];
            $mission = $statustesttwo['mission'];
            $latestip = $statustesttwo['latestip'];
            $latestip = $statustesttwo['latestip'];
            $cash = number_format($statustesttwo['money']);
            $points = number_format($statustesttwo['points']);

            //Dice
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

            if(isset($_POST['location'])) {
                $location = $_POST['location'];

                if (isset($_POST['setownerdice'])) {

                    $setownerinfosql = mysql_query("SELECT * FROM users WHERE username = '$setownerraw'");
                    $setownerinfoarray = mysql_fetch_array($setownerinfosql);
                    $setownerinforows = mysql_num_rows($setownerinfosql);
                    $setowner = $setownerinfoarray['username'];

                    $setownerstatus = $setownerinfoarray['status'];
                    $ssskkk = $setownerinfoarray['rankid'];
                    $ssskkkid = $setownerinfoarray['ID'];

                    $anum_true = mysql_num_rows(mysql_query("SELECT * FROM users WHERE username='$setownerraw' AND blockcasinos='1'"));
                    if ($anum_true == "1") {
                        if(isset($_GET['cpanel'])){
                            echo "<font color=red> Error:</font> $setownerraw doesnt allow Dice Games to be sent to him/her";
                        }else {
                            die("<font size=2 face=verdana color=silver>$setownerraw doesnt allow Dice Games to be sent to him/her.</font>");
                        }
                    }

                    $anum_true = mysql_num_rows(mysql_query("SELECT * FROM protection WHERE username='$setownerraw'"));
                    if ($anum_true == "1") {
                        if(isset($_GET['cpanel'])){
                            echo "<font color=red> Error:</font> $setownerraw is under protection!";
                        }else {
                            die("<font size=2 face=verdana color=silver>$setownerraw is under protection!</font>");
                        }
                    }

                    if ($setowner == $user) {
                        if(isset($_GET['cpanel'])){
                            echo "<font color=red> Error:</font> You cannot send to yourself.";
                        }else {
                            $showoutcome++;
                            $outcome = "You already own the dice!</font>";
                        }
                    } elseif ($setownerinforows == '0') {
                        if(isset($_GET['cpanel'])){
                            echo "<font color=red> Error:</font> User does not exist .";
                        }else {
                            $showoutcome++;
                            $outcome = "No such user!</font>";
                        }
                    } elseif (($ssskkk > '25') && ($rankid < '25')) {
                        if(isset($_GET['cpanel'])){
                            echo "<font color=red> Error:</font> You cannot send a casino to a staff member!";
                        }else {
                            $showoutcome++;
                            $outcome = "You cannot send a casino to a staff member!</font>";
                        }
                    } elseif ($setownerstatus == 'Dead') {
                        if(isset($_GET['cpanel'])){
                            echo "<font color=red> Error:</font> You cannot send a casino to dead player!";
                        }else {
                            $showoutcome++;
                            $outcome = "You cannot send a casino to dead player!</font>";
                        }
                    } else {

                        $penpoint = mysql_num_rows(mysql_query("SELECT * FROM ipadresses WHERE ip = '$userip' AND username = '$setowner'"));
                        if (($penpoint > '0') && ($setowner != $user)) {
                            mysql_query("UPDATE users SET penpoints = penpoints + 1 WHERE username = '$user'");
                            $reason = "$user sent $location dice to $setowner";
                            mysql_query("INSERT INTO penpoints(username,reason) VALUES('$user','$reason')");
                        }

                        mysql_query("UPDATE casinos SET buyback = '0' WHERE casino = 'Dice' AND location = '$location'");
                        mysql_query("UPDATE casinos SET owner = '$setowner' WHERE casino= 'Dice' AND location = '$location'");
                        mysql_query("UPDATE casinos SET nickname = '$setownerraw' WHERE casino= 'Dice' AND location = '$location'");
                        mysql_query("UPDATE casinos SET maxbet = '250000' WHERE casino= 'Dice' AND location = '$location'");

                        if(isset($_GET['cpanel'])){
                            echo "You sent the Casino to: <a href=viewprofile.php?username=$setowner style=\"font-size: 11px;\">$setownerraw</a>.";
                        }else {
                            $showoutcome++;
                            $outcome = "You gave the casino to <a href=viewprofile.php?username=$setowner><b>$setownerraw</b>!</font></a>";
                        }

                        mysql_query("DELETE FROM buycasinos WHERE city = '$location' AND type = 'Dice'");

                        mysql_query("UPDATE users SET notify = '1', notification = 'a_open$user a_closed$user a_slashsent you $location Dice.' WHERE username = '$ssskkkid'");
                    }
                }

                if (isset($_POST['setpricedice'])) {
                    mysql_query("DELETE FROM buycasinos WHERE type = 'Dice' AND city = '$location'");
                    $buytime = time() + 86400;
                    if($price!=0){
                        mysql_query("INSERT INTO buycasinos(username,time,city,price,type)
VALUES ('$user','$buytime','$location','$price','Dice')");
                    }
                    $showoutcome++;
                    $outcome = "The casino has been added to quicktrade!</font>";
                }

                if (isset($_POST['resetdiceprofit'])) {
                    $showoutcome++;
                    $outcome = "Profit reset!</font>";
                    mysql_query("UPDATE casinos SET profit = '0' WHERE casino= 'Dice' AND location = '$location'");
                }

                if (isset($_POST['setmaxdice'])) {
                    if ($setmax < '250000') {
                        if(isset($_GET['cpanel'])){
                            echo "-1";
                        }else{
                            $showoutcome++;
                            $outcome = "The maxbet must be at least $<b>250,000</b>!</font>";
                        }
                    } elseif ($setmax >= '999999999999') {
                        if(isset($_GET['cpanel'])){
                            mysql_query("UPDATE casinos SET maxbet = '999999999999' WHERE casino= 'Dice' AND location = '$location'");
                            echo "$999999999999";
                        }else {
                            mysql_query("UPDATE casinos SET maxbet = '999999999999' WHERE casino= 'Dice' AND location = '$location'");
                            $showoutcome++;
                            $outcome = "The maxbet is now <b>Infinite</b>!</font>";
                        }
                    } else {
                        if(isset($_GET['cpanel'])){
                            mysql_query("UPDATE casinos SET maxbet = '$setmax' WHERE casino= 'Dice' AND location = '$location'");
                            echo "$$setmaxtwo";
                        }else {
                            mysql_query("UPDATE casinos SET maxbet = '$setmax' WHERE casino= 'Dice' AND location = '$location'");
                            $showoutcome++;
                            $outcome = "The maxbet is now $<b>$setmaxtwo</b>!</font>";
                        }
                    }
                }

            }

            //Races
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

            if(isset($_POST['location'])) {
                $location = $_POST['location'];

                if(isset($_POST['setownerrace'])) {

                    $setownerinfosql = mysql_query("SELECT * FROM users WHERE username = '$setownerraw'");
                    $setownerinfoarray = mysql_fetch_array($setownerinfosql);
                    $setownerinforows = mysql_num_rows($setownerinfosql);
                    $setowner = $setownerinfoarray['username'];

                    $setownerstatus = $setownerinfoarray['status'];
                    $ssskkk = $setownerinfoarray['rankid'];
                    $ssskkkid = $setownerinfoarray['ID'];

                    $anum_true=mysql_num_rows(mysql_query("SELECT * FROM users WHERE username='$setownerraw' AND blockcasinos='1'"));
                    if ($anum_true == "1"){
                        if(isset($_GET['cpanel'])){
                            echo "<font color=red> Error:</font> $setownerraw doesnt allow Greyhound Racing to be sent to him/her";
                        }else {
                            die("<font size=2 face=verdana color=silver>$setownerraw doesnt allow Greyhound Racing to be sent to him/her.</font>");
                        }
                    }

                    $anum_true=mysql_num_rows(mysql_query("SELECT * FROM protection WHERE username='$setownerraw'"));
                    if ($anum_true == "1"){
                        if(isset($_GET['cpanel'])){
                            echo "<font color=red> Error:</font> $setownerraw is under protection!";
                        }else {
                            die("<font size=2 face=verdana color=silver>$setownerraw is under protection!</font>");
                        }                    }

                    if ($setowner == $user) {
                        if(isset($_GET['cpanel'])){
                            echo "<font color=red> Error:</font> You cannot send to yourself.";
                        }else {
                            $showoutcome++;
                            $outcome = "You already own the racing!</font>";
                        }
                    } elseif ($setownerinforows == '0') {
                        if(isset($_GET['cpanel'])){
                            echo "<font color=red> Error:</font> User does not exist .";
                        }else {
                            $showoutcome++;
                            $outcome = "No such user!</font>";
                        }
                    } elseif (($ssskkk > '25') && ($rankid < '25')) {
                        if(isset($_GET['cpanel'])){
                            echo "<font color=red> Error:</font> You cannot send a casino to a staff member!";
                        }else {
                            $showoutcome++;
                            $outcome = "You cannot send a casino to a staff member!</font>";
                        }
                    } elseif ($setownerstatus == 'Dead') {
                        if(isset($_GET['cpanel'])){
                            echo "<font color=red> Error:</font> You cannot send a casino to dead player!";
                        }else {
                            $showoutcome++;
                            $outcome = "You cannot send a casino to dead player!</font>";
                        }
                    }
                    else{

                        $penpoint = mysql_num_rows(mysql_query("SELECT * FROM ipadresses WHERE ip = '$userip' AND username = '$user'"));
                        if(($penpoint > '0')&&($setowner != $user)){
                            mysql_query("UPDATE users SET penpoints = penpoints + 1 WHERE username = '$user'");
                            $reason = "$user sent $location races to $setowner";
                            mysql_query("INSERT INTO penpoints(username,reason) VALUES('$user','$reason')");
                        }

                        mysql_query("UPDATE casinos SET buyback = '0' WHERE casino = 'Races' AND location = '$location'");
                        mysql_query("UPDATE casinos SET owner = '$setowner' WHERE casino= 'Races' AND location = '$location'");
                        mysql_query("UPDATE casinos SET nickname = '$setownerraw' WHERE casino= 'Races' AND location = '$location'");
                        mysql_query("UPDATE casinos SET maxbet = '250000' WHERE casino= 'Races' AND location = '$location'");

                        if(isset($_GET['cpanel'])){
                            echo "You sent the Casino to: <a href=viewprofile.php?username=$setowner style=\"font-size: 11px;\">$setownerraw</a>.";
                        }else {
                            $showoutcome++;
                            $outcome = "You gave the casino to <a href=viewprofile.php?username=$setowner><b>$setownerraw</b>!</font></a>";
                        }

                        mysql_query("DELETE FROM buycasinos WHERE city = '$location' AND type = 'Races'");

                        mysql_query("UPDATE users SET notify = '1', notification = 'a_open$user a_closed$user a_slashsent you $location Race.' WHERE username = '$ssskkkid'");
                    }
                }

                if(isset($_POST['setpricerace'])) {
                    mysql_query("DELETE FROM buycasinos WHERE type = 'Races' AND city = '$location'");
                    $buytime = time()+86400;
                    if($price!=0){
                        mysql_query("INSERT INTO buycasinos(username,time,city,price,type)
VALUES ('$user','$buytime','$location','$price','Races')");
                    }
                    $showoutcome++; $outcome = "The casino has been added to quicktrade!";
                }

                if(isset($_POST['resetraceprofit'])) {
                    $showoutcome++; $outcome = "Profit reset!";
                    mysql_query("UPDATE casinos SET profit = '0' WHERE casino= 'Races' AND location = '$location'");
                }

                if(isset($_POST['setmaxrace'])) {
                    if($setmax < '250000') {
                        if (isset($_GET['cpanel'])) {
                            echo "-1";
                        } else {
                            $showoutcome++;
                            $outcome = "The maxbet must be at least $<b>250,000</b>!";
                        }
                    }
                    elseif($setmax >= '999999999999') {
                        if (isset($_GET['cpanel'])) {
                            mysql_query("UPDATE casinos SET maxbet = '999999999999' WHERE casino= 'Races' AND location = '$location'");
                            echo "$999999999999";
                        } else {
                            mysql_query("UPDATE casinos SET maxbet = '999999999999' WHERE casino= 'Races' AND location = '$location'");
                            $showoutcome++;
                            $outcome = "The maxbet is now <b>Infinite</b>!";
                        }
                    }
                    else{
                        if (isset($_GET['cpanel'])) {
                            mysql_query("UPDATE casinos SET maxbet = '$setmax' WHERE casino= 'Races' AND location = '$location'");
                            echo "$setmaxtwo";
                        } else {
                            mysql_query("UPDATE casinos SET maxbet = '$setmax' WHERE casino= 'Races' AND location = '$location'");
                            $showoutcome++;
                            $outcome = "The maxbet is now $<b>$setmaxtwo</b>!";
                        }
                    }
                }

            }

            //Roulette
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

            if(isset($_POST['location'])) {
                $location = $_POST['location'];

                if (isset($_POST['setownerrlt'])) {

                    $setownerinfosql = mysql_query("SELECT * FROM users WHERE username = '$setownerraw'");
                    $setownerinfoarray = mysql_fetch_array($setownerinfosql);
                    $setownerinforows = mysql_num_rows($setownerinfosql);
                    $setowner = $setownerinfoarray['username'];

                    $setownerstatus = $setownerinfoarray['status'];
                    $ssskkk = $setownerinfoarray['rankid'];
                    $ssskkkid = $setownerinfoarray['ID'];

                    $anum_true = mysql_num_rows(mysql_query("SELECT * FROM users WHERE username='$setownerraw' AND blockcasinos='1'"));
                    if ($anum_true == "1") {
                        if(isset($_GET['cpanel'])){
                            echo "<font color=red> Error:</font> $setownerraw doesnt allow Roulettes to be sent to him/her";
                        }else {
                            die("<font size=2 face=verdana color=silver>$setownerraw doesnt allow Roulettes to be sent to him/her.</font>");
                        }
                    }

                    $anum_true = mysql_num_rows(mysql_query("SELECT * FROM protection WHERE username='$setownerraw'"));
                    if ($anum_true == "1") {
                        if(isset($_GET['cpanel'])){
                            echo "<font color=red> Error:</font> $setownerraw is under protection!";
                        }else {
                            die("<font size=2 face=verdana color=silver>$setownerraw is under protection!</font>");
                        }                    }

                    if ($setowner == $user) {
                        if(isset($_GET['cpanel'])){
                            echo "<font color=red> Error:</font> You cannot send to yourself.";
                        }else {
                            $showoutcome++;
                            $outcome = "You already own the roulette!</font>";
                        }
                    } elseif ($setownerinforows == '0') {
                        if(isset($_GET['cpanel'])){
                            echo "<font color=red> Error:</font> User does not exist .";
                        }else {
                            $showoutcome++;
                            $outcome = "No such user!</font>";
                        }
                    } elseif (($ssskkk > '25') && ($rankid < '25')) {
                        if(isset($_GET['cpanel'])){
                            echo "<font color=red> Error:</font> You cannot send a casino to a staff member!";
                        }else {
                            $showoutcome++;
                            $outcome = "You cannot send a casino to a staff member!</font>";
                        }
                    } elseif ($setownerstatus == 'Dead') {
                        if(isset($_GET['cpanel'])){
                            echo "<font color=red> Error:</font> You cannot send a casino to dead player!";
                        }else {
                            $showoutcome++;
                            $outcome = "You cannot send a casino to dead player!</font>";
                        }
                    } else {

                        $penpoint = mysql_num_rows(mysql_query("SELECT * FROM ipadresses WHERE ip = '$userip' AND username = '$user'"));
                        if (($penpoint > '0') && ($setowner != $user)) {
                            mysql_query("UPDATE users SET penpoints = penpoints + 1 WHERE username = '$user'");
                            $reason = "$user sent $location roulette to $setowner";
                            mysql_query("INSERT INTO penpoints(username,reason) VALUES('$user','$reason')");
                        }

                        mysql_query("UPDATE casinos SET buyback = '0' WHERE casino = 'Roulette' AND location = '$location'");
                        mysql_query("UPDATE casinos SET owner = '$setowner' WHERE casino= 'Roulette' AND location = '$location'");
                        mysql_query("UPDATE casinos SET nickname = '$setownerraw' WHERE casino= 'Roulette' AND location = '$location'");
                        mysql_query("UPDATE casinos SET maxbet = '250000' WHERE casino= 'Roulette' AND location = '$location'");
                        $showoutcome++;

                        if(isset($_GET['cpanel'])){
                            echo "You sent the Casino to: <a href=viewprofile.php?username=$setowner style=\"font-size: 11px;\">$setownerraw</a>.";
                        }else {
                            $showoutcome++;
                            $outcome = "You gave the casino to <a href=viewprofile.php?username=$setowner><b>$setownerraw</b>!</font></a>";
                        }

                        mysql_query("DELETE FROM buycasinos WHERE city = '$location' AND type = 'Roulette'");

                        mysql_query("UPDATE users SET notify = '1', notification = 'a_open$user a_closed$user a_slashsent you $location Roulette.' WHERE username = '$ssskkkid'");
                    }
                }

                if (isset($_POST['setpricerlt'])) {
                    mysql_query("DELETE FROM buycasinos WHERE type = 'Roulette' AND city = '$location'");
                    $buytime = time() + 86400;
                    if($price!=0){
                        mysql_query("INSERT INTO buycasinos(username,time,city,price,type)
VALUES ('$user','$buytime','$location','$price','Roulette')");
                    }
                    $showoutcome++;
                    $outcome = "The casino has been added to quicktrade!</font>";
                }

                if (isset($_POST['resetrltprofit'])) {
                    $showoutcome++;
                    $outcome = "Profit reset!</font>";
                    mysql_query("UPDATE casinos SET profit = '0' WHERE casino= 'Roulette' AND location = '$location'");
                }

                if (isset($_POST['setmaxrlt'])) {
                    if ($setmax < '250000') {
                        if (isset($_GET['cpanel'])) {
                            echo "-1";
                        } else {
                            $showoutcome++;
                            $outcome = "The maxbet must be at least $<b>250,000</b>!";
                        }
                    } elseif ($setmax > '999999999999') {
                        if (isset($_GET['cpanel'])) {
                            mysql_query("UPDATE casinos SET maxbet = '999999999999' WHERE casino= 'Roulette' AND location = '$location'");
                            echo "$999999999999";
                        } else {
                            mysql_query("UPDATE casinos SET maxbet = '999999999999' WHERE casino= 'Roulette' AND location = '$location'");
                            $showoutcome++;
                        }
                        $outcome = "The maxbet is now <b>Infinite</b>!</b>";
                    } else {
                        if (isset($_GET['cpanel'])) {
                            mysql_query("UPDATE casinos SET maxbet = '$setmax' WHERE casino= 'Roulette' AND location = '$location'");
                            echo "$$setmaxtwo";
                        } else {
                            mysql_query("UPDATE casinos SET maxbet = '$setmax' WHERE casino= 'Roulette' AND location = '$location'");
                            $showoutcome++;
                            $outcome = "The maxbet is now $<b>$setmaxtwo</b>!</font>";
                        }
                    }
                }

            }

            //Blackjack
            $saturated = "/[^0-9]/i";
            $setmaxraw = mysql_real_escape_string($_POST['setmaxbj']);
            $priceraw = mysql_real_escape_string($_POST['setpricebj']);
            $buybackraw = mysql_real_escape_string($_POST['setbuybackbj']);
            $setownerrawraw = mysql_real_escape_string($_POST['setownerbj']);
            $betraw = mysql_real_escape_string($_POST['bet']);
            $setmax = preg_replace($saturated,"",$setmaxraw);
            $price_post = preg_replace($saturated,"",$priceraw);
            $buyback = preg_replace($saturated,"",$buybackraw);
            $setownerraw = preg_replace($saturate,"",$setownerrawraw);
            $setmaxtwo = number_format($setmax);
            $bet = preg_replace($saturated,"",$betraw);
            if(isset($_POST['location'])){
                $location=$_POST['location'];

                if(isset($_POST['setownerbj'])) {

                    $setownerinfosql = mysql_query("SELECT * FROM users WHERE username = '$setownerraw'");
                    $setownerinfoarray = mysql_fetch_array($setownerinfosql);
                    $setownerinforows = mysql_num_rows($setownerinfosql);
                    $setowner = $setownerinfoarray['username'];

                    $setownerstatus = $setownerinfoarray['status'];
                    $ssskkk = $setownerinfoarray['rankid'];
                    $ssskkkid = $setownerinfoarray['ID'];

                    $anum_true=mysql_num_rows(mysql_query("SELECT * FROM users WHERE username='$setownerraw' AND blockcasinos='1'"));
                    if ($anum_true == "1"){
                        if(isset($_GET['cpanel'])){
                            echo "<font color=red> Error:</font> $setownerraw doesnt allow Blackjacks to be sent to him/her";
                        }else {
                            die("<font size=2 face=verdana color=silver>$setownerraw doesnt allow Blackjacks to be sent to him/her.</font>");
                        }
                    }

                    $anum_true=mysql_num_rows(mysql_query("SELECT * FROM protection WHERE username='$setownerraw'"));
                    if ($anum_true == "1"){
                        if(isset($_GET['cpanel'])){
                            echo "<font color=red> Error:</font> $setownerraw is under protection!";
                        }else {
                            die("<font size=2 face=verdana color=silver>$setownerraw is under protection!</font>");
                        }                    }

                    $ownerinfosql = mysql_query("SELECT * FROM casinos WHERE casino = 'Blackjack' AND location = '$location'");
                    $ownerinfoarray = mysql_fetch_array($ownerinfosql);
                    $ownername = $ownerinfoarray['owner'];
                    $getbuyback = $ownerinfoarray['buyback'];

                    $setownerinfosql = mysql_query("SELECT * FROM users WHERE username = '$setownerraw'");
                    $setownerinfoarray = mysql_fetch_array($setownerinfosql);
                    $setownerinforows = mysql_num_rows($setownerinfosql);
                    $setowner = $setownerinfoarray['username'];
                    if(!$setowner){die ('Error 1');}
                    $setownerstatus = $setownerinfoarray['status'];
                    $ssskkk = $setownerinfoarray['rankid'];
                    $ssskkkid = $setownerinfoarray['ID'];

                    if ($setowner == $user) {
                        if(isset($_GET['cpanel'])){
                            echo "<font color=red> Error:</font> You cannot send to yourself.";
                        }else {
                            $showoutcome++;
                            $outcome = "You already own the blackjack!</font>";
                        }
                    } elseif ($setownerinforows == '0') {
                        if(isset($_GET['cpanel'])){
                            echo "<font color=red> Error:</font> User does not exist .";
                        }else {
                            $showoutcome++;
                            $outcome = "No such user!</font>";
                        }
                    } elseif (($ssskkk > '25') && ($rankid < '25')) {
                        if(isset($_GET['cpanel'])){
                            echo "<font color=red> Error:</font> You cannot send a casino to a staff member!";
                        }else {
                            $showoutcome++;
                            $outcome = "You cannot send a casino to a staff member!</font>";
                        }
                    } elseif ($setownerstatus == 'Dead') {
                        if(isset($_GET['cpanel'])){
                            echo "<font color=red> Error:</font> You cannot send a casino to dead player!";
                        }else {
                            $showoutcome++;
                            $outcome = "You cannot send a casino to dead player!</font>";
                        }
                    } else{
                        $penpoint = mysql_num_rows(mysql_query("SELECT * FROM ipadresses WHERE ip = '$userip' AND username = '$setowner'"));
                        if(($penpoint > '0')&&($setowner != $user)){
                            mysql_query("UPDATE users SET penpoints = penpoints + 1 WHERE username = '$name'");
                            $reason = "$user sent $location blackjack to $setowner";
                            mysql_query("INSERT INTO penpoints(username,reason) VALUES('$name','$reason')");
                        }

                        mysql_query("UPDATE casinos SET buyback = '0' WHERE casino = 'Blackjack' AND location = '$location'");
                        mysql_query("UPDATE casinos SET owner = '$setowner' WHERE casino= 'Blackjack' AND location = '$location'");
                        mysql_query("UPDATE casinos SET nickname = '$setownerraw' WHERE casino= 'Blackjack' AND location = '$location'");
                        mysql_query("UPDATE casinos SET maxbet = '5000000' WHERE casino= 'Blackjack' AND location = '$location'");

                        if(isset($_GET['cpanel'])){
                            echo "You sent the Casino to: <a href=viewprofile.php?username=$setowner style=\"font-size: 11px;\">$setownerraw</a>.";
                        }else {
                            $showoutcome++;
                            $outcome = "You gave the casino to <a href=viewprofile.php?username=$setowner><b>$setownerraw</b>!</font></a>";
                        }

                        mysql_query("DELETE FROM buycasinos WHERE city = '$location' AND type = 'Blackjack'");
                        mysql_query("UPDATE users SET notify = '1', notification = 'a_open$user a_closed$user a_slashsent you $location Blackjack.' WHERE username = '$ssskkkid'");
                    }
                }

                if(isset($_POST['setpricebj'])) {
                    mysql_query("DELETE FROM buycasinos WHERE type = 'Blackjack' AND city = '$location'");
                    $buytime = time()+86400;
                    if($price_post!=0){
                        mysql_query("INSERT INTO buycasinos(username,time,city,price,type)
VALUES ('$user','$buytime','$location','$price_post','Blackjack')");
                    }
                    $showoutcome++; $outcome = "The casino has been added to quicktrade!";
                }

                if(isset($_POST['resetbjprofit'])) {
                    $showoutcome++; $outcome = "Profit reset!";
                    mysql_query("UPDATE casinos SET profit = '0' WHERE casino= 'Blackjack' AND location = '$location'");
                }

                if(isset($_POST['setmaxbj'])) {
                    if($setmax < '5000000'){
                        if (isset($_GET['cpanel'])) {
                            echo "-1";
                        } else {
                            $showoutcome++;
                            $outcome = "The maxbet must be at least $<b>5,000,000</b>!";
                        }
                    }
                    elseif($setmax >= '999999999999') {
                        if (isset($_GET['cpanel'])) {
                            mysql_query("UPDATE casinos SET maxbet = '999999999999' WHERE casino = 'Blackjack' AND location = '$location'");
                            echo "$999999999999";
                        } else {
                            mysql_query("UPDATE casinos SET maxbet = '999999999999' WHERE casino = 'Blackjack' AND location = '$location'");
                            $showoutcome++;
                            $outcome = "The maxbet is now <b>Infinite</b>!";
                        }
                    }
                    else{
                        if (isset($_GET['cpanel'])) {
                            mysql_query("UPDATE casinos SET maxbet = '$setmax' WHERE casino= 'Blackjack' AND location = '$location'");
                            echo "$$setmaxtwo";
                        } else {
                            mysql_query("UPDATE casinos SET maxbet = '$setmax' WHERE casino= 'Blackjack' AND location = '$location'");
                            $showoutcome++; $outcome = "The maxbet is now $<b>$setmaxtwo</b>!";
                        }
                    }
                }

            }

            //Bullet
            $saturated = "/[^0-9]/i";
            $setmaxraw = mysql_real_escape_string($_POST['setmaxbf']);
            $priceraw = mysql_real_escape_string($_POST['setpricebf']);
            $setownerrawraw = mysql_real_escape_string($_POST['setownerbf']);
            $givea = mysql_real_escape_string($_POST['give']);
            $amounta = mysql_real_escape_string($_POST['amount']);
            $vera = mysql_real_escape_string($_POST['ver']);

            $ver = preg_replace($saturate,"",$vera);
            $amount = preg_replace($saturated,"",$amounta);

            $setmax = preg_replace($saturated,"",$setmaxraw);
            $setownerraw = preg_replace($saturate,"",$setownerrawraw);
            $price = preg_replace($saturated,"",$priceraw);
            $give = preg_replace($saturated,"",$givea);
            $setmaxtwo = number_format($setmax);

            if(isset($_POST['location'])) {
                $location = $_POST['location'];

                $setownerinfosql = mysql_query("SELECT * FROM users WHERE username = '$setownerraw'");
                $setownerinfoarray = mysql_fetch_array($setownerinfosql);
                $setownerinforows = mysql_num_rows($setownerinfosql);
                $setowner = $setownerinfoarray['username'];
                $setownerstatus = $setownerinfoarray['status'];
                $ssskkk = $setownerinfoarray['rankid'];
                $ssskkkid = $setownerinfoarray['ID'];

                if(isset($_POST['setownerbf'])) {
                    $anum_true=mysql_num_rows(mysql_query("SELECT * FROM users WHERE username='$setownerraw' AND blockcasinos='1'"));
                    if ($anum_true == "1"){
                        die("<font size=2 face=verdana color=silver>$setownerraw doesnt allow Bullet Factories to be sent to him/her.</font>");}

                    if($setowner == $user){
                        $showoutcome++;
                        $outcome = "You already own the bullet factory!</font>";
                    }
                    elseif($setownerinforows == '0'){
                        $showoutcome++;
                        $outcome = "No such user!</font>";
                    }
                    elseif($setownerstatus == 'Dead'){
                        $showoutcome++;
                        $outcome = "You cannot send a casino to dead player!</font>";
                    }
                    else{
                        $penpoint = mysql_num_rows(mysql_query("SELECT * FROM ipadresses WHERE ip = '$userip' AND username = '$name'"));
                        if(($penpoint > '0')&&($setowner != $user)){ mysql_query("UPDATE users SET penpoints = penpoints + 1 WHERE username = '$name'");
                            $reason = "$user sent $location bullet factory to $setowner";
                            mysql_query("INSERT INTO penpoints(username,reason) VALUES('$user','$reason')");}

                        mysql_query("UPDATE casinos SET owner = '$setowner' WHERE casino= 'Bullets' AND location = '$location'");
                        mysql_query("UPDATE casinos SET nickname = '$setownerraw' WHERE casino= 'Bullets' AND location = '$location'");
                        mysql_query("UPDATE casinos SET maxbet = '5000' WHERE casino= 'Bullets' AND location = '$location'");
                        $showoutcome++; $outcome = "You gave the casino to <a href=viewprofile.php?username=$setowner><b>$setownerraw</b>!</font></a>";
                        mysql_query("DELETE FROM buycasinos WHERE city = '$location' AND type = 'Bullets'");
                        mysql_query("UPDATE users SET notify = '1', notification = 'a_open$user a_closed$user a_slashsent you $location Bullet Factory.' WHERE username = '$ssskkkid'");
                    }
                }

                if(isset($_POST['setmaxbf'])) {
                    if($setmax > '5000'){$showoutcome++; $outcome = "Bullets cannot be more than $<b>5,000</b>!</font>";}
                    elseif($setmax < '1'){
                        mysql_query("UPDATE casinos SET maxbet = '0' WHERE casino= 'Bullets' AND location = '$location'");
                        $showoutcome++; $outcome = "The bullet price is now <b>Free</b>!</font>";}
                    else{
                        mysql_query("UPDATE casinos SET maxbet = '$setmax' WHERE casino= 'Bullets' AND location = '$location'");
                        $showoutcome++; $outcome = "The bullet price is now $<b>$setmaxtwo</b>!</font>";
                    }
                }

                if(isset($_POST['setpricebf'])) {
                    mysql_query("DELETE FROM buycasinos WHERE type = 'Bullets' AND city = '$location'");
                    $buytime = time()+86400;
                    if($price!=0){
                        mysql_query("INSERT INTO buycasinos(username,time,city,price,type)
VALUES ('$user','$buytime','$location','$price','Bullets')");
                    }
                    $showoutcome++; $outcome = "The casino has been added to quicktrade!</font>";
                }

                if(isset($_POST['resetbfprofit'])) {
                    $showoutcome++; $outcome = "Profit reset!</font>";
                    mysql_query("UPDATE casinos SET profit = '0' WHERE casino= 'Bullets' AND location = '$location'");
                }
            }

            //Armoury
            $saturated = "/[^0-9]/i";
            $setownerrawraw = mysql_real_escape_string($_POST['setownerbuy']);
            $priceraw = mysql_real_escape_string($_POST['setpricebuy']);
            $givea = mysql_real_escape_string($_POST['give']);
            $vera = mysql_real_escape_string($_POST['ver']);

            $ver = preg_replace($saturate,"",$vera);
            $amount = preg_replace($saturated,"",$amounta);
            $setownerraw = preg_replace($saturate,"",$setownerrawraw);
            $price = preg_replace($saturated,"",$priceraw);
            $give = preg_replace($saturated,"",$givea);
            $setmaxtwo = number_format($setmax);

            if(isset($_POST['location'])) {
                $location = $_POST['location'];

                $setownerinfosql = mysql_query("SELECT * FROM users WHERE username = '$setownerraw'");
                $setownerinfoarray = mysql_fetch_array($setownerinfosql);
                $setownerinforows = mysql_num_rows($setownerinfosql);
                $setowner = $setownerinfoarray['username'];
                $setownerstatus = $setownerinfoarray['status'];
                $ssskkk = $setownerinfoarray['rankid'];
                $ssskkkid = $setownerinfoarray['ID'];

                if(isset($_POST['setownerbuy'])) {

                    $anum_true=mysql_num_rows(mysql_query("SELECT * FROM users WHERE username='$setownerraw' AND blockcasinos='1'"));
                    if ($anum_true == "1"){
                        die("<font size=2 face=verdana color=silver>$setownerraw doesnt allow Armourys to be sent to him/her.</font>");}

                    if($setowner == $user){$showoutcome++; $outcome = "You already own the store!</font>";}
                    elseif($setownerinforows == '0'){$showoutcome++; $outcome = "No such user!</font>";}
                    elseif($setownerstatus == 'Dead'){$showoutcome++; $outcome = "You cannot send this store to dead player!</font>";}
                    else{

                        $penpoint = mysql_num_rows(mysql_query("SELECT * FROM ipadresses WHERE ip = '$userip' AND username = '$user'"));
                        if(($penpoint > '0')&&($setowner != $user)){ mysql_query("UPDATE users SET penpoints = penpoints + 1 WHERE username = '$user'");
                            $reason = "$user sent $location armoury store to $setowner";
                            mysql_query("INSERT INTO penpoints(username,reason) VALUES('$user','$reason')");}

                        mysql_query("UPDATE casinos SET owner = '$setowner' WHERE casino= 'Armoury' AND location = '$location'");
                        mysql_query("UPDATE casinos SET nickname = '$setownerraw' WHERE casino= 'Armoury' AND location = '$location'");
                        mysql_query("UPDATE casinos SET maxbet = '5000' WHERE casino= 'Armoury' AND location = '$location'");
                        $showoutcome++; $outcome = "You gave the store to <a href=viewprofile.php?username=$setowner><b>$setownerraw</b>!</a>";
                        mysql_query("DELETE FROM buycasinos WHERE city = '$location' AND type = 'Armoury'");

                        mysql_query("UPDATE users SET notify = '1', notification = 'a_open$user a_closed$user a_slashsent you $location Armoury store.' WHERE username = '$ssskkkid'");
                    }
                }

                if(isset($_POST['setpricebuy'])) {
                    mysql_query("DELETE FROM buycasinos WHERE type = 'Armoury' AND city = '$location'");
                    $buytime = time()+86400;
                    if($price!=0){
                        mysql_query("INSERT INTO buycasinos(username,time,city,price,type)
VALUES ('$user','$buytime','$location','$price','Armoury')");
                    }
                    $showoutcome++; $outcome = "The casino has been added to quicktrade!</font>";
                }

                if(isset($_POST['resetbuyprofit'])) {
                    $showoutcome++; $outcome = "Profit reset!</font>";
                    mysql_query("UPDATE casinos SET profit = '0' WHERE casino= 'Armoury' AND location = '$location'");
                }
            }

            //Airport
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

            if(isset($_POST['location'])) {
                $location = $_POST['location'];

                $setownerinfosql = mysql_query("SELECT * FROM users WHERE username = '$setownerraw'");
                $setownerinfoarray = mysql_fetch_array($setownerinfosql);
                $setownerinforows = mysql_num_rows($setownerinfosql);
                $setowner = $setownerinfoarray['username'];
                $setownerstatus = $setownerinfoarray['status'];
                $ssskkk = $setownerinfoarray['rankid'];
                $ssskkkid = $setownerinfoarray['ID'];

                if(isset($_POST['setownerbuy'])) {

                    $anum_true=mysql_num_rows(mysql_query("SELECT * FROM users WHERE username='$setownerraw' AND blockcasinos='1'"));
                    if ($anum_true == "1"){
                        die("<font size=2 face=verdana color=silver>$setownerraw doesnt allow Airports to be sent to him/her.</font>");}

                    if($setowner == $user){$showoutcome++; $outcome = "You already own this airport!</font>";}
                    elseif($setownerinforows == '0'){$showoutcome++; $outcome = "No such user!</font>";}
                    elseif($setownerstatus == 'Dead'){$showoutcome++; $outcome = "You cannot send this airport to dead player!</font>";}
                    else{

                        $penpoint = mysql_num_rows(mysql_query("SELECT * FROM ipadresses WHERE ip = '$userip' AND username = '$user'"));
                        if(($penpoint > '0')&&($setowner != $user)){ mysql_query("UPDATE users SET penpoints = penpoints + 1 WHERE username = '$user'");
                            $reason = "$username sent $location airport to $setowner";
                            mysql_query("INSERT INTO penpoints(username,reason) VALUES('$user','$reason')");}

                        mysql_query("UPDATE casinos SET owner = '$setowner' WHERE casino = 'Airport' AND location = '$location'");
                        mysql_query("UPDATE casinos SET nickname = '$setownerraw' WHERE casino = 'Airport' AND location = '$location'");
                        $showoutcome++; $outcome = "You gave the airport to <a href=viewprofile.php?username=$setowner><b>$setownerraw</b>!</font></a>";
                        mysql_query("DELETE FROM buycasinos WHERE city = '$location' AND type = 'Airport'");

                        mysql_query("UPDATE users SET notify = '1', notification = 'a_open$user a_closed$user a_slashsent you $location Airport.' WHERE username = '$ssskkkid'");
                    }
                }

                if($_POST['cost_travel']){
                    if($_POST['cost_travel']=='5 points'){
                        mysql_query("UPDATE casinos SET profit = 5 WHERE location = '$location' AND casino = 'Airport'");
                        $showoutcome++;
                        $outcome = "You set the price to <b>5 points</b>!</font>";
                    }elseif($_POST['cost_travel']=='10 points'){
                        mysql_query("UPDATE casinos SET profit = 10 WHERE location = '$location' AND casino = 'Airport'");
                        $showoutcome++;
                        $outcome = "You set the price to <b>10 points</b>!</font>";
                    }elseif($_POST['cost_travel']=='15 points'){
                        mysql_query("UPDATE casinos SET profit = 15 WHERE location = '$location' AND casino = 'Airport'");
                        $showoutcome++;
                        $outcome = "You set the price to <b>15 points</b>!</font>";
                    }
                }

                if(isset($_POST['setpricebuy'])) {
                    mysql_query("DELETE FROM buycasinos WHERE type = 'Airport' AND city = '$userlocation'");
                    $buytime = time()+86400;
                    if($price!=0){
                        mysql_query("INSERT INTO buycasinos(username,time,city,price,type)
VALUES ('$user','$buytime','$location','$price','Airport')");
                    }
                    $showoutcome++; $outcome = "The casino has been added to quicktrade!</font>";
                }

                if(isset($_POST['resetbuyprofit'])) {
                    $showoutcome++; $outcome = "Profit reset!</font>";
                    mysql_query("UPDATE casinos SET profit = '0' WHERE casino= 'Airport' AND location = '$location'");
                }
            }
                if(!isset($_GET['cpanel'])){
            ?>
            <? if ($showoutcome >= 1) { ?>
                <span><? echo $outcome; ?></span>
            <? } ?>
            <table class="menuTable curve10px" id="content" cellspacing="0" cellpadding="0">
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
                                Manage My Properties
                            </div>
                            <?
                            $userownsproperty = mysql_num_rows(mysql_query("SELECT * FROM casinos WHERE owner = '$usernameone' AND type = 'prop' AND casino <>'Landmark'"));
                            $userownscasino = mysql_num_rows(mysql_query("SELECT * FROM casinos WHERE owner = '$usernameone' AND type = 'casi'"));
                            if($userownscasino==0 && $userownsproperty==0){?>
                                <div style="padding: 12px; padding-top: 35px; padding-bottom: 0; margin: auto; text-align: center; color: #fefefe;">
<span style="font-size: 12px;">
You do not own any properties! &nbsp;Check <a href="quicktrade.php">Quicktrade</a> to see if there are any for sale.
</span>
                                    <div class="break" style="padding-top: 25px;"></div>
                                    <div class="spacer"></div>
                                    <div class="break" style="padding-top: 25px;"></div>
                                </div>
                            <?}else{?>
                            <div style="padding: 5px; margin: auto; text-align: center; color: #fefefe;">
                                <div style="margin: auto; padding-top: 16px; padding-bottom: 6px; text-align: left;">
                                        <?php
                                        $getpropinfoo = mysql_query("SELECT * FROM casinos WHERE owner = '$usernameone' AND type = 'casi' ORDER BY casino");
                                        while($getpropinfo = mysql_fetch_array($getpropinfoo)){
                                            $proplocation = $getpropinfo['location'];
                                            $propprop = $getpropinfo['casino'];
                                            $propprofit = number_format($getpropinfo['profit']);
                                            $propmaxbet = number_format($getpropinfo['maxbet']);
                                            if($propprofit < 0){ $profcolor = "red"; }else{ $profcolor = "lime"; }
                                            if($proplocation == "Las Vegas"){ $doloc = "1"; }
                                            elseif($proplocation == "Los Angeles"){ $doloc = "2"; }
                                            elseif($proplocation == "New York"){ $doloc = "3"; }
                                            elseif($proplocation == "Staff Land"){ $doloc = "6"; }
                                            if($propprop == "Dice"){?>
                                                <div align="center">
                                                    <table class="regTable" style="margin-left: 10px; margin-right: 0; min-width: 230px; margin-bottom: 11px; width: 85%; max-width: 550px;text-align: center;" cellspacing="0" cellpadding="0" align="center">
                                                        <tbody>
                                                        <tr>
                                                            <td class="header" colspan="3">
                                                                Dice (<?
                                                                if($proplocation == 'Las Vegas'){echo"Las Vegas, Nevada";}
                                                                elseif($proplocation == 'Los Angeles'){echo"Los Angeles, California";}
                                                                elseif($proplocation == 'New York'){echo"New York City, New York";}
                                                                elseif($proplocation == 'Chicago'){echo"Chicago, Illionis";}
                                                                elseif($proplocation == 'Miami'){echo"Miami, Florida";}
                                                                elseif($proplocation == 'Seatle'){echo"Seatle, Washington";}
                                                                elseif($proplocation == 'Dallas'){echo"Dallas, Texas";}
                                                                ?>)
                                                            </td>
                                                        </tr>
                                                        <form method=post>
                                                            <input type="hidden" name="location" value="<?echo $proplocation;?>">
                                                            <tr>
                                                                <td class="col noTop" style="max-width: 80px;padding-top: 0;">
                                                                    Set Maxbet:<input type=submit name=doall style="visibility:hidden; width:1%;">
                                                                </td>
                                                                <td class="col noTop" style="padding: 0;">
                                                                    <input type=text name=setmaxdice class="textarea" placeholder="Enter Max Bet..." style="width:100%; height:100%;">
                                                                </td>
                                                                <td class="col noTop" style="padding: 0;">
                                                                    <input type=submit value="Update" class="textarea" style="width:100%; height:100%;" name=setmaxsubmit>
                                                                </td>
                                                            </tr>
                                                        </form>
                                                        <form method="post">
                                                            <input type="hidden" name="location" value="<?echo $proplocation;?>">
                                                            <tr>
                                                                <td class="col" style="max-width: 80px;padding-top: 0;">
                                                                    Sell on Quicktrade:<input type=submit name=doall style="visibility:hidden; width:1%;">
                                                                </td>
                                                                <td class="col" style="padding: 0;">
                                                                    <input type=text name=setpricedice class="textarea" placeholder="Enter Points (0 will remove offer)" style="width:100%; height:100%;">
                                                                </td>
                                                                <td class="col" style="padding: 0;">
                                                                    <input type=submit value="Set price" class="textarea" style="width:100%; height:100%;" name=setpricesubmit>
                                                                </td>
                                                            </tr>
                                                        </form>
                                                        <form method="post">
                                                            <input type="hidden" name="location" value="<?echo $proplocation;?>">
                                                            <tr>
                                                                <td class="col" style="max-width: 80px;padding-top: 0;">
                                                                    Send To User:<input type=submit name=doall style="visibility:hidden; width:1%;">
                                                                </td>
                                                                <td class="col" style="padding: 0;">
                                                                    <input type=text name=setownerdice class="textarea" placeholder="Enter Username..." style="width:100%; height:100%;">
                                                                </td>
                                                                <td class="col" style="padding: 0;">
                                                                    <input type=submit value="Send" class="textarea" style="width:100%; height:100%;" name=setownersubmit>
                                                                </td>
                                                            </tr>
                                                        </form>
                                                        </tbody>
                                                    </table>

                                                    <span>Profit: <?php echo"<font color=lime>$<b>$propprofit</b></font>";?></span> - Max Bet: <?php echo "$<b>$propmaxbet</b>";?><br/><br/>

                                                    <form method=post>
                                                        <input type="hidden" name="location" value="<?echo $proplocation;?>">
                                                        <input type=submit value="Reset Profit" class="textarea" name=resetdiceprofit>
                                                    </form>
                                                </div>
                                                <br/>
                                                <?$pagename = "dicegame"; }
                                            elseif($propprop == "Races"){?>
                                                <div align="center">
                                                    <table class="regTable" style="margin-left: 10px; margin-right: 0; min-width: 230px; margin-bottom: 11px; width: 85%; max-width: 550px;text-align: center;" cellspacing="0" cellpadding="0" align="center">
                                                        <tbody>
                                                        <tr>
                                                            <td class="header" colspan="3">
                                                                Races (<?
                                                                if($proplocation == 'Las Vegas'){echo"Las Vegas, Nevada";}
                                                                elseif($proplocation == 'Los Angeles'){echo"Los Angeles, California";}
                                                                elseif($proplocation == 'New York'){echo"New York City, New York";}
                                                                elseif($proplocation == 'Chicago'){echo"Chicago, Illionis";}
                                                                elseif($proplocation == 'Miami'){echo"Miami, Florida";}
                                                                elseif($proplocation == 'Seatle'){echo"Seatle, Washington";}
                                                                elseif($proplocation == 'Dallas'){echo"Dallas, Texas";}
                                                                ?>)
                                                            </td>
                                                        </tr>
                                                        <form method=post>
                                                            <input type="hidden" name="location" value="<?echo $proplocation;?>">
                                                            <tr>
                                                                <td class="col noTop" style="max-width: 80px;padding-top: 0;">
                                                                    Set Maxbet:<input type=submit name=doall style="visibility:hidden; width:1%;">
                                                                </td>
                                                                <td class="col noTop" style="padding: 0;">
                                                                    <input type=text name=setmaxrace class="textarea" placeholder="Enter Max Bet..." style="width:100%; height:100%;">
                                                                </td>
                                                                <td class="col noTop" style="padding: 0;">
                                                                    <input type=submit value="Update" class="textarea" style="width:100%; height:100%;" name=setmaxsubmit>
                                                                </td>
                                                            </tr>
                                                        </form>
                                                        <form method="post">
                                                            <input type="hidden" name="location" value="<?echo $proplocation;?>">
                                                            <tr>
                                                                <td class="col" style="max-width: 80px;padding-top: 0;">
                                                                    Sell on Quicktrade:<input type=submit name=doall style="visibility:hidden; width:1%;">
                                                                </td>
                                                                <td class="col" style="padding: 0;">
                                                                    <input type=text name=setpricerace class="textarea" placeholder="Enter Points (0 will remove offer)" style="width:100%; height:100%;">
                                                                </td>
                                                                <td class="col" style="padding: 0;">
                                                                    <input type=submit value="Set price" class="textarea" style="width:100%; height:100%;" name=setpricesubmit>
                                                                </td>
                                                            </tr>
                                                        </form>
                                                        <form method="post">
                                                            <input type="hidden" name="location" value="<?echo $proplocation;?>">
                                                            <tr>
                                                                <td class="col" style="max-width: 80px;padding-top: 0;">
                                                                    Send To User:<input type=submit name=doall style="visibility:hidden; width:1%;">
                                                                </td>
                                                                <td class="col" style="padding: 0;">
                                                                    <input type=text name=setownerrace class="textarea" placeholder="Enter Username..." style="width:100%; height:100%;">
                                                                </td>
                                                                <td class="col" style="padding: 0;">
                                                                    <input type=submit value="Send" class="textarea" style="width:100%; height:100%;" name=setownersubmit>
                                                                </td>
                                                            </tr>
                                                        </form>
                                                        </tbody>
                                                    </table>

                                                    <span>Profit: <?php echo"<font color=lime>$<b>$propprofit</b></font>";?></span> - Max Bet: <?php echo "$<b>$propmaxbet</b>";?><br/><br/>

                                                    <form method=post>
                                                        <input type="hidden" name="location" value="<?echo $proplocation;?>">
                                                        <input type=submit value="Reset Profit" class="textarea" name=resetraceprofit>
                                                    </form>
                                                </div>
                                                <br/>
                                                <?$pagename = "racing"; }
                                            elseif($propprop == "Roulette"){?>
                                                <div align="center">
                                                    <table class="regTable" style="margin-left: 10px; margin-right: 0; min-width: 230px; margin-bottom: 11px; width: 85%; max-width: 550px;text-align: center;" cellspacing="0" cellpadding="0" align="center">
                                                        <tbody>
                                                        <tr>
                                                            <td class="header" colspan="3">
                                                                Roulette (<?
                                                                if($proplocation == 'Las Vegas'){echo"Las Vegas, Nevada";}
                                                                elseif($proplocation == 'Los Angeles'){echo"Los Angeles, California";}
                                                                elseif($proplocation == 'New York'){echo"New York City, New York";}
                                                                elseif($proplocation == 'Chicago'){echo"Chicago, Illionis";}
                                                                elseif($proplocation == 'Miami'){echo"Miami, Florida";}
                                                                elseif($proplocation == 'Seatle'){echo"Seatle, Washington";}
                                                                elseif($proplocation == 'Dallas'){echo"Dallas, Texas";}
                                                                ?>)
                                                            </td>
                                                        </tr>
                                                        <form method=post>
                                                            <input type="hidden" name="location" value="<?echo $proplocation;?>">
                                                            <tr>
                                                                <td class="col noTop" style="max-width: 80px;padding-top: 0;">
                                                                    Set Maxbet:<input type=submit name=doall style="visibility:hidden; width:1%;">
                                                                </td>
                                                                <td class="col noTop" style="padding: 0;">
                                                                    <input type=text name=setmaxrlt class="textarea" placeholder="Enter Max Bet..." style="width:100%; height:100%;">
                                                                </td>
                                                                <td class="col noTop" style="padding: 0;">
                                                                    <input type=submit value="Update" class="textarea" style="width:100%; height:100%;" name=setmaxsubmit>
                                                                </td>
                                                            </tr>
                                                        </form>
                                                        <form method="post">
                                                            <input type="hidden" name="location" value="<?echo $proplocation;?>">
                                                            <tr>
                                                                <td class="col" style="max-width: 80px;padding-top: 0;">
                                                                    Sell on Quicktrade:<input type=submit name=doall style="visibility:hidden; width:1%;">
                                                                </td>
                                                                <td class="col" style="padding: 0;">
                                                                    <input type=text name=setpricerlt class="textarea" placeholder="Enter Points (0 will remove offer)" style="width:100%; height:100%;">
                                                                </td>
                                                                <td class="col" style="padding: 0;">
                                                                    <input type=submit value="Set price" class="textarea" style="width:100%; height:100%;" name=setpricesubmit>
                                                                </td>
                                                            </tr>
                                                        </form>
                                                        <form method="post">
                                                            <input type="hidden" name="location" value="<?echo $proplocation;?>">
                                                            <tr>
                                                                <td class="col" style="max-width: 80px;padding-top: 0;">
                                                                    Send To User:<input type=submit name=doall style="visibility:hidden; width:1%;">
                                                                </td>
                                                                <td class="col" style="padding: 0;">
                                                                    <input type=text name=setownerrlt class="textarea" placeholder="Enter Username..." style="width:100%; height:100%;">
                                                                </td>
                                                                <td class="col" style="padding: 0;">
                                                                    <input type=submit value="Send" class="textarea" style="width:100%; height:100%;" name=setownersubmit>
                                                                </td>
                                                            </tr>
                                                        </form>
                                                        </tbody>
                                                    </table>

                                                    <span>Profit: <?php echo"<font color=lime>$<b>$propprofit</b></font>";?></span> - Max Bet: <?php echo "$<b>$propmaxbet</b>";?><br/><br/>

                                                    <form method=post>
                                                        <input type="hidden" name="location" value="<?echo $proplocation;?>">
                                                        <input type=submit value="Reset Profit" class="textarea" name=resetrltprofit>
                                                    </form>
                                                </div>
                                                <br/>
                                                <?
                                                $pagename = "roulette"; }
                                            elseif($propprop == "Blackjack"){?>
                                                <div align="center">
                                                    <table class="regTable" style="margin-left: 10px; margin-right: 0; min-width: 230px; margin-bottom: 11px; width: 85%; max-width: 550px;text-align: center;" cellspacing="0" cellpadding="0" align="center">
                                                        <tbody>
                                                        <tr>
                                                            <td class="header" colspan="3">
                                                                Blackjack (<?
                                                                if($proplocation == 'Las Vegas'){echo"Las Vegas, Nevada";}
                                                                elseif($proplocation == 'Los Angeles'){echo"Los Angeles, California";}
                                                                elseif($proplocation == 'New York'){echo"New York City, New York";}
                                                                elseif($proplocation == 'Chicago'){echo"Chicago, Illionis";}
                                                                elseif($proplocation == 'Miami'){echo"Miami, Florida";}
                                                                elseif($proplocation == 'Seatle'){echo"Seatle, Washington";}
                                                                elseif($proplocation == 'Dallas'){echo"Dallas, Texas";}
                                                                ?>)
                                                            </td>
                                                        </tr>
                                                        <form method=post>
                                                            <input type="hidden" name="location" value="<?echo $proplocation;?>">
                                                            <tr>
                                                                <td class="col noTop" style="max-width: 80px;padding-top: 0;">
                                                                    Set Maxbet:<input type=submit name=doall style="visibility:hidden; width:1%;">
                                                                </td>
                                                                <td class="col noTop" style="padding: 0;">
                                                                    <input type=text name=setmaxbj class="textarea" placeholder="Enter Max Bet..." style="width:100%; height:100%;">
                                                                </td>
                                                                <td class="col noTop" style="padding: 0;">
                                                                    <input type=submit value="Update" class="textarea" style="width:100%; height:100%;" name=setmaxsubmit>
                                                                </td>
                                                            </tr>
                                                        </form>
                                                        <form method="post">
                                                            <input type="hidden" name="location" value="<?echo $proplocation;?>">
                                                            <tr>
                                                                <td class="col" style="max-width: 80px;padding-top: 0;">
                                                                    Sell on Quicktrade:<input type=submit name=doall style="visibility:hidden; width:1%;">
                                                                </td>
                                                                <td class="col" style="padding: 0;">
                                                                    <input type=text name=setpricebj class="textarea" placeholder="Enter Points (0 will remove offer)" style="width:100%; height:100%;">
                                                                </td>
                                                                <td class="col" style="padding: 0;">
                                                                    <input type=submit value="Set price" class="textarea" style="width:100%; height:100%;" name=setpricesubmit>
                                                                </td>
                                                            </tr>
                                                        </form>
                                                        <form method="post">
                                                            <input type="hidden" name="location" value="<?echo $proplocation;?>">
                                                            <tr>
                                                                <td class="col" style="max-width: 80px;padding-top: 0;">
                                                                    Send To User:<input type=submit name=doall style="visibility:hidden; width:1%;">
                                                                </td>
                                                                <td class="col" style="padding: 0;">
                                                                    <input type=text name=setownerbj class="textarea" placeholder="Enter Username..." style="width:100%; height:100%;">
                                                                </td>
                                                                <td class="col" style="padding: 0;">
                                                                    <input type=submit value="Send" class="textarea" style="width:100%; height:100%;" name=setownersubmit>
                                                                </td>
                                                            </tr>
                                                        </form>
                                                        </tbody>
                                                    </table>

                                                    <span>Profit: <?php echo"<font color=lime>$<b>$propprofit</b></font>";?></span> - Max Bet: <?php echo "$<b>$propmaxbet</b>";?><br/><br/>

                                                    <form method=post>
                                                        <input type="hidden" name="location" value="<?echo $proplocation;?>">
                                                        <input type=submit value="Reset Profit" class="textarea" name=resetbjprofit>
                                                    </form>
                                                </div>
                                                <br/>
                                                <?$pagename = "blackjack"; }
                                        }
                                        $getpropinfoo = mysql_query("SELECT * FROM casinos WHERE owner = '$usernameone' AND type = 'prop' AND casino <>'Landmark' ORDER BY casino");
                                        while($getpropinfo = mysql_fetch_array($getpropinfoo)){
                                            $proplocation = $getpropinfo['location'];
                                            $propprop = $getpropinfo['casino'];
                                            $propprofit = number_format($getpropinfo['profit']);
                                            if($propprofit < 0){ $profcolor = "red"; }else{ $profcolor = "lime"; }
                                            if($proplocation == "Las Vegas"){ $doloc = "1"; }
                                            elseif($proplocation == "Los Angeles"){ $doloc = "2"; }
                                            elseif($proplocation == "New York"){ $doloc = "3"; }
                                            if($propprop == "Airport"){?>
                                                <div align="center">
                                                    <table class="regTable" style="margin-left: 10px; margin-right: 0; min-width: 230px; margin-bottom: 11px; width: 85%; max-width: 550px;text-align: center;" cellspacing="0" cellpadding="0" align="center">
                                                        <tbody>
                                                        <tr>
                                                            <td class="header" colspan="3">
                                                                Airport (<?
                                                                if($proplocation == 'Las Vegas'){echo"Las Vegas, Nevada";}
                                                                elseif($proplocation == 'Los Angeles'){echo"Los Angeles, California";}
                                                                elseif($proplocation == 'New York'){echo"New York City, New York";}
                                                                elseif($proplocation == 'Chicago'){echo"Chicago, Illionis";}
                                                                elseif($proplocation == 'Miami'){echo"Miami, Florida";}
                                                                elseif($proplocation == 'Seatle'){echo"Seatle, Washington";}
                                                                elseif($proplocation == 'Dallas'){echo"Dallas, Texas";}
                                                                ?>)
                                                            </td>
                                                        </tr>
                                                        <form method="post">
                                                            <input type="hidden" name="location" value="<?echo $proplocation;?>">
                                                            <tr>
                                                                <td class="col" style="max-width: 80px;padding-top: 0;">
                                                                    Cost to Travel:<input type=submit name=doall style="visibility:hidden; width:1%;">
                                                                </td>
                                                                <td class="col" style="padding: 0;">
                                                                    <select name="cost_travel" class="textarea" style="width: 100%;padding: 0;">
                                                                        <option>5 points</option>
                                                                        <option>10 points</option>
                                                                        <option>15 points</option>
                                                                    </select>
                                                                </td>
                                                                <td class="col" style="padding: 0;">
                                                                    <button type="submit" class="textarea" style="width: 100%;">Update</button>
                                                                </td>
                                                            </tr>
                                                        </form>
                                                        <form method="post">
                                                            <input type="hidden" name="location" value="<?echo $proplocation;?>">
                                                            <tr>
                                                                <td class="col" style="max-width: 80px;padding-top: 0;">
                                                                    Sell on Quicktrade:<input type=submit name=doall style="visibility:hidden; width:1%;">
                                                                </td>
                                                                <td class="col" style="padding: 0;">
                                                                    <input type=text name=setpricebuy class="textarea" placeholder="Enter Points (0 will remove offer)" style="width:100%; height:100%;">
                                                                </td>
                                                                <td class="col" style="padding: 0;">
                                                                    <input type=submit value="Set price" class="textarea" style="width:100%; height:100%;" name=setpricesubmit>
                                                                </td>
                                                            </tr>
                                                        </form>
                                                        <form method="post">
                                                            <input type="hidden" name="location" value="<?echo $proplocation;?>">
                                                            <tr>
                                                                <td class="col" style="max-width: 80px;padding-top: 0;">
                                                                    Send To User:<input type=submit name=doall style="visibility:hidden; width:1%;">
                                                                </td>
                                                                <td class="col" style="padding: 0;">
                                                                    <input type=text name=setownerbuy class="textarea" placeholder="Enter Username..." style="width:100%; height:100%;">
                                                                </td>
                                                                <td class="col" style="padding: 0;">
                                                                    <input type=submit value="Send" class="textarea" style="width:100%; height:100%;" name=setownersubmit>
                                                                </td>
                                                            </tr>
                                                        </form>
                                                        </tbody>
                                                    </table>

                                                    <span>Profit: <?php echo"<font color=lime><b>$propprofit</b> points</font>";?></span><br/><br/>

                                                    <form method=post>
                                                        <input type="hidden" name="location" value="<?echo $proplocation;?>">
                                                        <input type=submit value="Reset Profit" class="textarea" name=resetbuyprofit>
                                                    </form>
                                                </div>
                                                <br/>
                                                <? $pagename = "byplane"; }
                                            elseif($propprop == "Armoury"){?>
                                                <div align="center">
                                                    <table class="regTable" style="margin-left: 10px; margin-right: 0; min-width: 230px; margin-bottom: 11px; width: 85%; max-width: 550px;text-align: center;" cellspacing="0" cellpadding="0" align="center">
                                                        <tbody>
                                                        <tr>
                                                            <td class="header" colspan="3">
                                                                Armoury (<?
                                                                if($proplocation == 'Las Vegas'){echo"Las Vegas, Nevada";}
                                                                elseif($proplocation == 'Los Angeles'){echo"Los Angeles, California";}
                                                                elseif($proplocation == 'New York'){echo"New York City, New York";}
                                                                elseif($proplocation == 'Chicago'){echo"Chicago, Illionis";}
                                                                elseif($proplocation == 'Miami'){echo"Miami, Florida";}
                                                                elseif($proplocation == 'Seatle'){echo"Seatle, Washington";}
                                                                elseif($proplocation == 'Dallas'){echo"Dallas, Texas";}
                                                                ?>)
                                                            </td>
                                                        </tr>
                                                        <form method="post">
                                                            <input type="hidden" name="location" value="<?echo $proplocation;?>">
                                                            <tr>
                                                                <td class="col" style="max-width: 80px;padding-top: 0;">
                                                                    Sell on Quicktrade:<input type=submit name=doall style="visibility:hidden; width:1%;">
                                                                </td>
                                                                <td class="col" style="padding: 0;">
                                                                    <input type=text name=setpricebuy class="textarea" placeholder="Enter Points (0 will remove offer)" style="width:100%; height:100%;">
                                                                </td>
                                                                <td class="col" style="padding: 0;">
                                                                    <input type=submit value="Set price" class="textarea" style="width:100%; height:100%;" name=setpricesubmit>
                                                                </td>
                                                            </tr>
                                                        </form>
                                                        <form method="post">
                                                            <input type="hidden" name="location" value="<?echo $proplocation;?>">
                                                            <tr>
                                                                <td class="col" style="max-width: 80px;padding-top: 0;">
                                                                    Send To User:<input type=submit name=doall style="visibility:hidden; width:1%;">
                                                                </td>
                                                                <td class="col" style="padding: 0;">
                                                                    <input type=text name=setownerbuy class="textarea" placeholder="Enter Username..." style="width:100%; height:100%;">
                                                                </td>
                                                                <td class="col" style="padding: 0;">
                                                                    <input type=submit value="Send" class="textarea" style="width:100%; height:100%;" name=setownersubmit>
                                                                </td>
                                                            </tr>
                                                        </form>
                                                        </tbody>
                                                    </table>

                                                    <span>Profit: <?php echo"<font color=lime>$<b>$propprofit</b></font>";?></span><br/><br/>

                                                    <form method=post>
                                                        <input type="hidden" name="location" value="<?echo $proplocation;?>">
                                                        <input type=submit value="Reset Profit" class="textarea" name=resetbuyprofit>
                                                    </form>
                                                </div>
                                                <br/>
                                                <?$pagename = "buy"; }
                                            elseif($propprop == "Bullets"){?>
                                                <div align="center">
                                                    <table class="regTable" style="margin-left: 10px; margin-right: 0; min-width: 230px; margin-bottom: 11px; width: 85%; max-width: 550px;text-align: center;" cellspacing="0" cellpadding="0" align="center">
                                                        <tbody>
                                                        <tr>
                                                            <td class="header" colspan="3">
                                                                Bullet Factory (<?
                                                                if($proplocation == 'Las Vegas'){echo"Las Vegas, Nevada";}
                                                                elseif($proplocation == 'Los Angeles'){echo"Los Angeles, California";}
                                                                elseif($proplocation == 'New York'){echo"New York City, New York";}
                                                                elseif($proplocation == 'Chicago'){echo"Chicago, Illionis";}
                                                                elseif($proplocation == 'Miami'){echo"Miami, Florida";}
                                                                elseif($proplocation == 'Seatle'){echo"Seatle, Washington";}
                                                                elseif($proplocation == 'Dallas'){echo"Dallas, Texas";}
                                                                ?>)
                                                            </td>
                                                        </tr>
                                                        <form method=post>
                                                            <input type="hidden" name="location" value="<?echo $proplocation;?>">
                                                            <tr>
                                                                <td class="col noTop" style="max-width: 80px;padding-top: 0;">
                                                                    Set Bullet Price:<input type=submit name=doall style="visibility:hidden; width:1%;">
                                                                </td>
                                                                <td class="col noTop" style="padding: 0;">
                                                                    <input type=text name=setmaxbf class="textarea" placeholder="Enter Bullet Price..." style="width:100%;">
                                                                </td>
                                                                <td class="col noTop" style="padding: 0;">
                                                                    <input type=submit value="Update" class="textarea" style="width:100%; height:100%;" name=setmaxsubmit>
                                                                </td>
                                                            </tr>
                                                        </form>
                                                        <form method="post">
                                                            <input type="hidden" name="location" value="<?echo $proplocation;?>">
                                                            <tr>
                                                                <td class="col" style="max-width: 80px;padding-top: 0;">
                                                                    Sell on Quicktrade:<input type=submit name=doall style="visibility:hidden; width:1%;">
                                                                </td>
                                                                <td class="col" style="padding: 0;">
                                                                    <input type=text name=setpricebf class="textarea" placeholder="Enter Points (0 will remove offer)" style="width:100%; height:100%;">
                                                                </td>
                                                                <td class="col" style="padding: 0;">
                                                                    <input type=submit value="Set price" class="textarea" style="width:100%; height:100%;" name=setpricesubmit>
                                                                </td>
                                                            </tr>
                                                        </form>
                                                        <form method="post">
                                                            <input type="hidden" name="location" value="<?echo $proplocation;?>">
                                                            <tr>
                                                                <td class="col" style="max-width: 80px;padding-top: 0;">
                                                                    Send To User:<input type=submit name=doall style="visibility:hidden; width:1%;">
                                                                </td>
                                                                <td class="col" style="padding: 0;">
                                                                    <input type=text name=setownerbf class="textarea" placeholder="Enter Username..." style="width:100%; height:100%;">
                                                                </td>
                                                                <td class="col" style="padding: 0;">
                                                                    <input type=submit value="Send" class="textarea" style="width:100%; height:100%;" name=setownersubmit>
                                                                </td>
                                                            </tr>
                                                        </form>
                                                        </tbody>
                                                    </table>

                                                    <span>Profit: <?php echo"<font color=lime>$<b>$propprofit</b></font>";?></span><br/><br/>

                                                    <form method=post>
                                                        <input type="hidden" name="location" value="<?echo $proplocation;?>">
                                                        <input type=submit value="Reset Profit" class="textarea" name=resetbfprofit>
                                                    </form>
                                                </div>
                                                <br/>
                                                <? $pagename = "bulletfactory"; }
                                        } ?>
                                </div>
                            </div>
                            <?}?>
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

<?}?>