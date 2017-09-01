<? include 'included.php'; session_start(); ?>
<?
$saturate = "/[^a-z0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$playerip = $_SERVER['REMOTE_ADDR'];
$username = $usernameone;

$userarray = $statustesttwo;
$userlocation = $userarray['location'];
$userrankid = $userarray['rankid'];
$usermoney = $userarray['money'];
$penpoints = $userarray['penpoints'];
$veri = $userarray['ver'];
$crewid = $userarray['crewid'];
$ID = $userarray['ID'];
$newlocation = $_GET['location'];
if($newlocation == 1){ $newlocation = "Las Vegas"; }
elseif($newlocation == 2){ $newlocation = "Los Angeles"; }
elseif($newlocation == 3){ $newlocation = "New York"; }
$makenewmaybe = mysql_num_rows(mysql_query("SELECT owner FROM casinos WHERE owner = '$usernameone' AND casino = 'Bullets' AND location = '$newlocation'"));
if($makenewmaybe > 0){ $userlocation = "$newlocation"; }

$jailtest = mysql_query("SELECT username FROM jail WHERE username  = '$username'");
$jailtester = mysql_num_rows($jailtest);
if($jailtester != '0'){die(include 'redirect.php'); }

/*$vericheck = mysql_num_rows(mysql_query("SELECT * FROM users WHERE username = '$usernameone' AND ver1 != '0'"));
if($vericheck > 999999){ die(include 'doverifbf.php'); }*/

/*if(isset($_POST['buy'])){
    $verificationcode = rand(1,50);
    if($verificationcode == '50000'){
        $verifarray = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","bycar.php");
        shuffle($verifarray);
        $verif1 = $verifarray[0];
        $verif2 = $verifarray[1];
        $verif3 = $verifarray[2];
        mysql_query("UPDATE users SET ver1 = '$verif1', ver2 = '$verif2', ver3 = '$verif3' WHERE ID = '$ida'");
        die(include 'doverifbf.php');
    }}*/
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
            if($penpoints >= '2'){die("<font color=white face=verdana size=1>You currently have $penpoints penalty points, and as a result cannot view this page. Contact the helpdesk or a moderator.</font>");}


            $entertainertest = mysql_query("SELECT username FROM entertainers WHERE username  = '$username'");
            $entertainer = mysql_num_rows($entertainertest);
            if($entertainer != '0'){die('<font color=white face=verdana size=1>As entertainer you cannot view this page</font>');}

            $ownersql = mysql_query("SELECT * FROM casinos WHERE casino = 'Bullets' AND owner = '$username' AND location = '$userlocation'");
            $owner = mysql_num_rows($ownersql);
            $ownerinfosql = mysql_query("SELECT * FROM casinos WHERE casino = 'Bullets' AND location = '$userlocation'");
            $ownerinfoarray = mysql_fetch_array($ownerinfosql);
            $ownername = $ownerinfoarray['owner'];
            $ownermaxbet = $ownerinfoarray['maxbet'];
            $ownerprofit = $ownerinfoarray['profit'];
            $bulletssell = $ownerinfoarray['bulletssell'];
            $allbullets = $ownerinfoarray['bullets'];
            $ownermaxbettwo = number_format($ownerinfoarray['maxbet']);
            if($ownermaxbettwo == '0'){$ownermaxbettwo = 'Free';}else{$ownermaxbettwo = "$$ownermaxbettwo";}
            $ownerprofittwo = number_format($ownerinfoarray['profit']);
            $ownerstatssql = mysql_query("SELECT * FROM users WHERE username = '$ownername'");
            $ownerstatsarray = mysql_fetch_array($ownerstatssql);
            $ownermoney = $ownerstatsarray['money'];

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

            if(($ownername == 'None')){
                if(isset($_POST['takeoverbf'])){
                    if($usermoney < '50000000'){$showoutcome++; $outcome = "You don't have enough money! Taking over a bullet factory costs $<b>50,000,000</b>!</font>";}
                    else{$showoutcome++; $outcome = "You now own the Bullet Factory!";
                        mysql_query("UPDATE users SET money = money - '50000000' WHERE username = '$username'");
                        mysql_query("UPDATE casinos SET owner = '$username' WHERE location = '$userlocation' AND casino = 'Bullets'");
                        mysql_query("UPDATE casinos SET nickname = '$username' WHERE location = '$userlocation' AND casino = 'Bullets'");
                        mysql_query("DELETE FROM buycasinos WHERE city = '$userlocation' AND type = 'Bullets'");}}}

            $ownerinfosql = mysql_query("SELECT * FROM casinos WHERE casino = 'Bullets' AND location = '$userlocation'");
            $ownerinfoarray = mysql_fetch_array($ownerinfosql);
            $ownername = $ownerinfoarray['owner'];
            $ownermaxbet = $ownerinfoarray['maxbet'];
            $ownerprofit = $ownerinfoarray['profit'];
            $bulletssell = $ownerinfoarray['bulletssell'];
            $allbullets = $ownerinfoarray['bullets'];

            if(($owner != '0')&&($crewid != '0')){
                if(isset($_POST['givebullets'])) {
                    if($give > $bulletssell){$showoutcome++; $outcome = "There isnt enough bullets in the factory!</font>";}
                    else{
                        mysql_query("UPDATE casinos SET bulletssell = (bulletssell - $give) WHERE location = '$userlocation' AND casino = 'Bullets' AND bulletssell >= '$amount'");
                        if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 1.</font>');}
                        mysql_query("UPDATE crews SET bullets = (bullets + $give) WHERE id = '$crewid'");
                        $showoutcome++; $outcome = "You gave $give bullets to your crew!</font>";}}}

            $ownerinfosql = mysql_query("SELECT * FROM casinos WHERE casino = 'Bullets' AND location = '$userlocation'");
            $ownerinfoarray = mysql_fetch_array($ownerinfosql);
            $ownername = $ownerinfoarray['owner'];
            $ownermaxbet = $ownerinfoarray['maxbet'];
            $ownerprofit = $ownerinfoarray['profit'];
            $bulletssell = $ownerinfoarray['bulletssell'];
            $allbullets = $ownerinfoarray['bullets'];

            if(($owner != '0')||($userrankid == '100')){
                if(isset($_POST['setmaxbf'])) {
                    if($setmax > '5000'){$showoutcome++; $outcome = "Bullets cannot be more than $<b>5,000</b>!</font>";}
                    elseif($setmax < '1'){
                        mysql_query("UPDATE casinos SET maxbet = '0' WHERE casino= 'Bullets' AND location = '$userlocation'");
                        $showoutcome++; $outcome = "The bullet price is now <b>Free</b>!</font>";}
                    else{
                        mysql_query("UPDATE casinos SET maxbet = '$setmax' WHERE casino= 'Bullets' AND location = '$userlocation'");
                        $showoutcome++; $outcome = "The bullet price is now $<b>$setmaxtwo</b>!</font>";}}}

            $ownerinfosql = mysql_query("SELECT * FROM casinos WHERE casino = 'Bullets' AND location = '$userlocation'");
            $ownerinfoarray = mysql_fetch_array($ownerinfosql);
            $ownername = $ownerinfoarray['owner'];
            $ownermaxbet = $ownerinfoarray['maxbet'];
            $ownerprofit = $ownerinfoarray['profit'];
            $bulletssell = $ownerinfoarray['bulletssell'];
            $allbullets = $ownerinfoarray['bullets'];

            if(($owner != '0')||($userrankid == '100')){
                $setownerinfosql = mysql_query("SELECT * FROM users WHERE username = '$setownerraw'");
                $setownerinfoarray = mysql_fetch_array($setownerinfosql);
                $setownerinforows = mysql_num_rows($setownerinfosql);
                $setowner = $setownerinfoarray['username'];
                $setownerstatus = $setownerinfoarray['status'];
                $ssskkk = $setownerinfoarray['rankid'];
                $ssskkkid = $setownerinfoarray['ID'];

                if(isset($_POST['setownerbf'])) {
                    if(!$setowner){die (' ');}
                    $anum_true=mysql_num_rows(mysql_query("SELECT * FROM users WHERE username='$setownerraw' AND blockcasinos='1'"));
                    if ($anum_true == "1"){
                        die("<font size=2 face=verdana color=silver>$setownerraw doesnt allow Bullet Factories to be sent to him/her.</font>");}

                    if($setowner == $ownername){$showoutcome++; $outcome = "You already own the bullet factory!</font>";}
                    elseif($setownerinforows == '0'){$showoutcome++; $outcome = "No such user!</font>";}
                    elseif(($ssskkk > '25')&&($userrankid != '100')){$showoutcome++; $outcome = "You cannot send a casino to a staff member!</font>";}
                    elseif($setownerstatus == 'Dead'){$showoutcome++; $outcome = "You cannot send a casino to dead player!</font>";}
                    else{
                        $cunt = mysql_num_rows(mysql_query("SELECT * FROM casinos WHERE owner = '$setowner'"));
                        $cunts = mysql_num_rows(mysql_query("SELECT * FROM casinos WHERE owner = '$setowner' AND casino = 'Bullets'"));
                        if($cunt > '3' AND $setowner != 'None'){die('<font color=white face=verdana size=1>That user already has 2 properties!</font>');}
                        if($cunts > '0' AND $setowner != 'None'){die('<font color=white face=verdana size=1>That user already has a bullet factory!</font>');}

                        $penpoint = mysql_num_rows(mysql_query("SELECT * FROM ipadresses WHERE ip = '$userip' AND username = '$setowner'"));
                        if(($penpoint > '0')&&($setowner != $username)){ mysql_query("UPDATE users SET penpoints = penpoints + 1 WHERE username = '$username'");
                            $reason = "$username sent $userlocation bullet factory to $setowner";
                            mysql_query("INSERT INTO penpoints(username,reason) VALUES('$username','$reason')");}

                        mysql_query("UPDATE casinos SET owner = '$setowner' WHERE casino= 'Bullets' AND location = '$userlocation'");
                        mysql_query("UPDATE casinos SET nickname = '$setownerraw' WHERE casino= 'Bullets' AND location = '$userlocation'");
                        mysql_query("UPDATE casinos SET maxbet = '5000' WHERE casino= 'Bullets' AND location = '$userlocation'");
                        $showoutcome++; $outcome = "You gave the casino to <a href=viewprofile.php?username=$setowner><b>$setownerraw</b>!</font></a>";
                        mysql_query("DELETE FROM buycasinos WHERE city = '$userlocation' AND type = 'Bullets'");
                        mysql_query("UPDATE users SET notify = '1', notification = 'a_open$usernameone a_closed$usernameone a_slashsent you $userlocation Bullet Factory.' WHERE username = '$ssskkkid'");}}}

            if(($owner != '0')||($userrankid == '100')){
                if(isset($_POST['setpricebf'])) {
                    mysql_query("DELETE FROM buycasinos WHERE type = 'Bullets' AND city = '$userlocation'");
                    $buytime = time()+86400;
                    mysql_query("INSERT INTO buycasinos(username,time,city,price,type)
VALUES ('$ownername','$buytime','$userlocation','$price','Bullets')");
                    $showoutcome++; $outcome = "The casino has been added to quicktrade!</font>";
                }}

            $ownerinfosql = mysql_query("SELECT * FROM casinos WHERE casino = 'Bullets' AND location = '$userlocation'");
            $ownerinfoarray = mysql_fetch_array($ownerinfosql);
            $ownername = $ownerinfoarray['owner'];
            $ownermaxbet = $ownerinfoarray['maxbet'];
            $ownerprofit = $ownerinfoarray['profit'];
            $bulletssell = $ownerinfoarray['bulletssell'];
            $allbullets = $ownerinfoarray['bullets'];

            if(($owner != '0')||($userrankid == '100')){
                if(isset($_POST['resetbfprofit'])) {
                    $showoutcome++; $outcome = "Profit reset!</font>";
                    mysql_query("UPDATE casinos SET profit = '0' WHERE casino= 'Bullets' AND location = '$userlocation'");}}

            if($owner == '0'){
                if(isset($_POST['buy'])) {
				if (isset($_POST['captcha_need']) && $_POST['captcha'] != $_SESSION['rand_code']) {
					$showoutcome++; $outcome = "Verification code is not valid!";
				}
				elseif ((isset($_POST['captcha_need']) && $_POST['captcha'] == $_SESSION['rand_code']) || !isset($_POST['captcha_need'])) {
                    $cost = $amount * $ownermaxbet;

                    if(!$amount){}
                    elseif($amount > $bulletssell){$showoutcome++; $outcome = "There isnt enough bullets in the factory!</font>";}
                    elseif($cost > $usermoney){$showoutcome++; $outcome = "You dont have enough money!</font>";}
                    else{
						$verificationcode = rand(1, 25);
						if ($verificationcode == '25') {
							$showcaptcha = true;
						}else{
                        if($cost != '0'){
                            mysql_query("UPDATE users SET money = (money - $cost) WHERE username = '$username' AND money >= '$cost'");
                            if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 2.</font>');}}

                        mysql_query("UPDATE casinos SET bulletssell = (bulletssell - $amount) WHERE location = '$userlocation' AND casino = 'Bullets' AND bulletssell >= '$amount'");
                        if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 2.</font>');}

                        mysql_query("UPDATE casinos SET profit = (profit + $cost) WHERE location = '$userlocation' AND casino = 'Bullets'");
                        mysql_query("UPDATE users SET money = (money + $cost) WHERE username = '$ownername'");
                        mysql_query("UPDATE users SET bullets = (bullets + $amount) WHERE username = '$username'");
                        $showoutcome++; $outcome = "You bought <b>$amount</b> bullets</font>";
                        $alphanum = "ABCDEFGHIJKLMNPQRSTUVWXYZ123456789";
                        $randver = substr(str_shuffle($alphanum), 0, 5);
                        mysql_query("UPDATE users SET ver = '$randver' WHERE username = '$username'");
			}}}}} ?>
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
                                Bullet Factory
                            </div>
                            <div style="padding: 5px; padding-top: 8px; padding-bottom: 0; margin: auto; text-align: center; color: #fefefe;">
                                <form method="post" action="bulletfactory.php" style="font-size: 11px; margin-top: 29px;">
                                    <table class="regTable" style="min-width: 0; max-width: 500px; width: 301px; " cellspacing="0" cellpadding="0" align="center">
                                        <tbody><tr>
                                            <td class="header" colspan="2">
                                                Buy Bullets
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col noTop" style="border-left: 0;">
                                                <label style="display: block; padding: 0;" for="amount">Amount to Buy:</label>
                                            </td>
                                            <td class="col is-btn-wrapper noTop" style="width: 220px;">
                                                <input class="textarea noTop" id="amount" value="" style="width: 100%; height: 28px;" name="amount" placeholder="Enter Amount..." type="text">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="col is-btn-wrapper noTop" style="border-left: 0;">
                                                <input class="textarea" style="width: 100%; height: 28px; border-left: 0;" name="buy" value="Buy!" type="submit">
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
										<?php if ($showcaptcha == true): ?>
										<div style="margin-top: 10px; margin-bottom: 10px;">
											<label for="captcha_txt"><img src="captcha_generate.php" style="height: 24px;"></label>
											<input class="textarea" value="" id="captcha_txt" name="captcha" placeholder="Enter Code..." type="text">
											<input type="hidden" name="captcha_need" value="1">
											<!--<input type="submit" value="Submit" class="textarea" style="display: inline-block" name="captcha_btn">-->
										</div>
										<?php endif; ?>
                                </form>
                                <?if(($owner != '0')||($userrankid == '100')){?>
                                <div align="center">
                                    <table class="regTable" style="margin-left: 10px; margin-right: 0; min-width: 230px; margin-bottom: 11px; width: 85%; max-width: 550px;text-align: center;" cellspacing="0" cellpadding="0" align="center">
                                        <tbody>
                                        <tr>
                                            <td class="header" colspan="3">
                                                Edit Bullet Factory Stats
                                            </td>
                                        </tr>
                                        <form method=post>
                                            <tr>
                                                <td class="col noTop">
                                                    Set Bullet Price:<input type=submit name=doall class=textbox style="visibility:hidden; width:1%;">
                                                </td>
                                                <td class="col noTop">
                                                    <input type=text name=setmaxbf class="textarea" style="width:100%; height:100%;">
                                                </td>
                                                <td class="col noTop">
                                                    <input type=submit value="Do it" class="textarea curve3px" name=setmaxsubmit>
                                                </td>
                                            </tr>
                                        </form>
                                        <form method=post>
                                            <tr>
                                                <td class="col">
                                                    Send Bullet Factory:<input type=submit name=doall class=textbox style="visibility:hidden; width:1%;">
                                                </td>
                                                <td class="col">
                                                    <input type=text name=setownerbf class="textarea" style="width:100%; height:100%;">
                                                </td>
                                                <td class="col">
                                                    <input type=submit value="Do it" class="textarea curve3px" name=setownersubmit>
                                                </td>
                                            </tr>
                                        </form>
                                        <form method=post>
                                            <tr>
                                                <td class="col">
                                                    Sell Bullet Factory:<input type=submit name=doall class=textbox style="visibility:hidden; width:1%;">
                                                </td>
                                                <td class="col">
                                                    <input type=text name=setpricebf class="textarea" style="width:100%; height:100%;">
                                                </td>
                                                <td class="col">
                                                    <input type=submit value="Do it" class="textarea curve3px" name=setpricesubmit>
                                                </td>
                                            </tr>
                                        </form>
                                        <? if($crewid != '0'){?>
                                            <form method=post>
                                                <tr>
                                                    <td class="col">
                                                        Give Bullets To Crew:<input type=submit name=doall class=textbox style="visibility:hidden; width:1%;">
                                                    </td>
                                                    <td class="col">
                                                        <input type=text name=give class="textarea" style="width:100%; height:100%;">
                                                    </td>
                                                    <td class="col">
                                                        <input type=submit value="Do it" class="textarea curve3px" name=givebullets>
                                                    </td>
                                                </tr>
                                            </form>
                                        <?}?>
                                        <form method=post>
                                            <tr>
                                                <td class="col" colspan="3" style="text-align: center;">
                                                    <input type=submit value="Reset Profit" class="textarea curve3px" name=resetbfprofit>
                                                </td>
                                            </tr>
                                        </form>
                                        </tbody>
                                    </table>
                                </div>
                                <?php }?>

                            <? if(($ownername == 'None')){
                                echo'<div align=center> <form method=post><input type=submit value="Take Over Casino" class="textarea curve3px" name=takeoverbf></form></div>';} ?>

                            <? $statustest = mysql_query("SELECT * FROM users WHERE username = '$usernameone'")or die(mysql_error());
                            $statustesttwo = mysql_fetch_array($statustest);?>
                                <div class="break" style="padding-top: 31px;"></div>
                                <div class="spacer"></div>
                                <div style="padding-top: 20px; padding-bottom: 6px; color: #aaaaaa; font-size: 115%;">
                                    Owner: <a href="viewprofile.php?username=<?echo$ownername;?>" style="color: #ffffff;"><?echo$ownername;?></a><span style="color: #555555; padding-left: 7px; padding-right: 7px;"> - </span>
                                    Bullets in Stock: <span style="color: #ffffff;"><?echo number_format($bulletssell);?></span><span style="color: #555555; padding-left: 7px; padding-right: 7px;"> - </span>
                                    Bullet Price: <span style="color: #ffffff;"><?echo $ownermaxbettwo;?></span>
                                </div>
                                <div class="break" style="padding-top: 15px;">
                                    <div class="spacer"></div>
                                    <div class="break" style="padding-top: 4px;"></div>
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