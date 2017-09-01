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
            $getuserinfoarray = $statustesttwo;
            $getname = $getuserinfoarray['username'];
            $userlocation = $getuserinfoarray['location'];
            $health = ceil($getuserinfoarray['health']);
            $rankid = $getuserinfoarray['rankid'];
            $userrankid = $getuserinfoarray['rankid'];
            $usermoney = $getuserinfoarray['money'];
            $newlocation = $_GET['location'];
            if($newlocation == 1){ $newlocation = "Las Vegas"; }
            elseif($newlocation == 2){ $newlocation = "Los Angeles"; }
            elseif($newlocation == 3){ $newlocation = "New York"; }
            $makenewmaybe = mysql_num_rows(mysql_query("SELECT owner FROM casinos WHERE owner = '$usernameone' AND casino = 'Landmark' AND location = '$newlocation'"));
            if($makenewmaybe > 0){ $userlocation = "$newlocation"; }

            $ownersql = mysql_query("SELECT * FROM casinos WHERE casino = 'Landmark' AND owner = '$usernameone' AND location = '$userlocation'");
            $owner = mysql_num_rows($ownersql);
            $ownerinfosql = mysql_query("SELECT * FROM casinos WHERE casino = 'Landmark' AND location = '$userlocation'");
            $ownerinfoarray = mysql_fetch_array($ownerinfosql);
            $ownername = $ownerinfoarray['owner'];
            $ownermaxbet = $ownerinfoarray['maxbet'];
            $ownerprofit = $ownerinfoarray['profit'];
            $ownerbullets = $ownerinfoarray['bullets'];
            $ownerbulletssell = $ownerinfoarray['bulletssell'];
            $ownerprofittwo = number_format($ownerinfoarray['profit']);
            $ownermaxbettwo = number_format($ownerinfoarray['maxbet']);
            $ownerbulletstwo = number_format($ownerinfoarray['bullets']);
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
                    if($usermoney < '100000000'){$showoutcome++; $outcome = "You don't have enough money! Taking over this landmark costs $<b>100,000,000</b>!";}
                    else{$showoutcome++; $outcome = "You now own this Landmark!";
                        mysql_query("UPDATE users SET money = money - '100000000' WHERE username = '$usernameone'");
                        mysql_query("UPDATE casinos SET owner = '$usernameone' WHERE location = '$userlocation' AND casino = 'Landmark'");
                        mysql_query("UPDATE casinos SET nickname = '$usernameone' WHERE location = '$userlocation' AND casino = 'Landmark'");
                        mysql_query("DELETE FROM buycasinos WHERE city = '$userlocation' AND type = 'Landmark'");}}}

            if(($owner != '0')||($userrankid == '100')){
                if(isset($_POST['resetbuyprofit'])) {
                    $showoutcome++; $outcome = "Profit reset!";
                    mysql_query("UPDATE casinos SET profit = '0' WHERE casino= 'Landmark' AND location = '$userlocation'");}}

            if(($owner != '0')||($userrankid == '100')){
                if(isset($_POST['setpricebuy'])) {
                    mysql_query("DELETE FROM buycasinos WHERE type = 'Landmark' AND city = '$userlocation'");
                    $buytime = time()+86400;
                    mysql_query("INSERT INTO buycasinos(username,time,city,price,type)
VALUES ('$ownername','$buytime','$userlocation','$price','Landmark')");
                    $showoutcome++; $outcome = "The casino has been added to quicktrade!";
                }}

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
                        die("<font size=2 face=verdana color=silver>$setownerraw doesnt allow Landmarks to be sent to him/her.</font>");}

                    if($setowner == $ownername){$showoutcome++; $outcome = "You already own this landmark!";}
                    elseif($setownerinforows == '0'){$showoutcome++; $outcome = "No such user!";}
                    elseif(($ssskkk > '25')&&($userrankid != '100')){$showoutcome++; $outcome = "You cannot send this landmark to a staff member!";}
                    elseif($setownerstatus == 'Dead'){$showoutcome++; $outcome = "You cannot send this landmark to dead player!";}
                    else{

                        $cunt = mysql_num_rows(mysql_query("SELECT * FROM casinos WHERE owner = '$setowner'"));
                        $cunts = mysql_num_rows(mysql_query("SELECT * FROM casinos WHERE owner = '$setowner' AND casino = 'Landmark'"));
                        if($cunt > '3' AND $setowner != 'None'){die('<font color=white face=verdana size=1>That user already has 2 properties!</font>');}
                        if($cunts > '0' AND $setowner != 'None'){die('<font color=white face=verdana size=1>That user already has a Landmark!</font>');}

                        $penpoint = mysql_num_rows(mysql_query("SELECT * FROM ipadresses WHERE ip = '$userip' AND username = '$setowner'"));
                        if(($penpoint > '0')&&($setowner != $username)){ mysql_query("UPDATE users SET penpoints = penpoints + 1 WHERE username = '$username'");
                            $reason = "$username sent $userlocation airport to $setowner";
                            mysql_query("INSERT INTO penpoints(username,reason) VALUES('$username','$reason')");}

                        mysql_query("UPDATE casinos SET owner = '$setowner' WHERE casino= 'Landmark' AND location = '$userlocation'");
                        mysql_query("UPDATE casinos SET nickname = '$setownerraw' WHERE casino= 'Landmark' AND location = '$userlocation'");
                        $showoutcome++; $outcome = "You gave this landmark to <a href=viewprofile.php?username=$setowner><b>$setownerraw</b>!</a>";
                        mysql_query("DELETE FROM buycasinos WHERE city = '$userlocation' AND type = 'Landmark'");
                        mysql_query("UPDATE users SET notify = '1', notification = 'a_open$usernameone a_closed$usernameone a_slashsent you $userlocation Landmark.' WHERE username = '$ssskkkid'");}}}

            $howmanyusers = mysql_num_rows(mysql_query("SELECT * FROM users WHERE status = 'Alive' AND location = '$userlocation'"));
            $currentearns = $howmanyusers / 100 * 1000000;

            if($_POST['getmoney']){
                $time = time();
                mysql_query("UPDATE casinos SET profit = (profit + '$ownerbulletssell'), bulletssell = '0' WHERE casino = 'Landmark' AND location = '$userlocation'");
                mysql_query("UPDATE users SET money = (money + '$ownerbulletssell') WHERE id = '$ida'");
                $currentearns2 = number_format($ownerbulletssell);
                $showoutcome++; $outcome = "You received $<b>$currentearns2</b>!";
            }

            if($_POST['getbullets']){
                mysql_query("UPDATE casinos SET bullets = '0' WHERE casino = 'Landmark' AND location = '$userlocation'");
                mysql_query("UPDATE users SET bullets = (bullets + '$ownerbullets') WHERE id = '$ida'");
                $currentearns3 = number_format($ownerbullets);
                $showoutcome++; $outcome = "You received <b>$currentearns3</b> bullets!";
            }

            $time = time();
            $timer = ceil($ownermaxbet);
            $htime = $timer - $time;
            $totalh = $htime / 3600;
            $totalh = floor($totalh);
            if($totalh < '10'){$leading = 0;}
            if($htime <= '0'){ $nowdoit = "Available"; }
            else{
                $doit = date( ":i:s", $timer - $time);
                $nowdoit = "$leading$totalh$doit";
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
                                Landmarks
                            </div>
                            <div style="padding: 5px; margin: auto; text-align: center; color: #fefefe;">
                                <div style="margin: auto; padding-top: 16px; padding-bottom: 6px; text-align: center;" align="center">
                                    <form action="" method="post" >
                                        <div align="center">
                                            <? if(($owner != '0')||($rankid == '100')){?>
                                            <table class="regTable" style="margin-left: 10px; margin-right: 0; min-width: 230px; margin-bottom: 11px; width: 85%; max-width: 550px;text-align: center;" cellspacing="0" cellpadding="0" align="center">
                                                <tbody>
                                                <tr>
                                                    <td class="header" colspan="2">
                                                        Landmark Info
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="col noTop">
                                                        Profit:
                                                    </td>
                                                    <td class="col noTop">
                                                        $<?echo$ownerprofittwo;?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="col">
                                                        Users in <?echo$userlocation;?>:
                                                    </td>
                                                    <td class="col">
                                                        <?echo$howmanyusers;?>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table><br>
                                            <table class="regTable" style="margin-left: 10px; margin-right: 0; min-width: 230px; margin-bottom: 11px; width: 85%; max-width: 550px;text-align: center;" cellspacing="0" cellpadding="0" align="center">
                                                <tbody>
                                                <tr>
                                                    <td class="header" colspan="3">
                                                        Landmark Income
                                                    </td>
                                                </tr>
                                                <form method=post>
                                                    <tr>
                                                        <td class="col noTop">
                                                            Your next income is in <b><font color=red><?echo$nowdoit;?></b></font>
                                                            <input type=submit name=doall class=textbox style="visibility:hidden; width:1%">
                                                        </td>
                                                        <td class="col noTop">
                                                            <input type=submit name=getmoney class="textarea curve3px" value="Get earnings ($<?echo number_format($ownerbulletssell);?>)">
                                                        </td>
                                                        <td class="col noTop">
                                                            <input type=submit name=getbullets class="textarea curve3px" value="Get earnings (<?echo number_format($ownerbullets);?> bullets)">
                                                        </td>
                                                    </tr>
                                                </form>
                                                </tbody>
                                            </table><br>
                                    <?php }?>
                                    <center><font color=gray size=1 face=verdana><br>This landmark is owned by </font><a href=viewprofile.php?username=<?echo$ownername;?>><font color=gray size=1 face=verdana><b><?echo$ownername;?></b></a><br>
                                        <br>
                                        <img src="/smiles/<?echo$userlocation;?>.png">

                                        <? if(($ownername == 'None')){
                                            echo'<br><div align=center><br/><form method=post><input type=submit value="Take Over Landmark" class="textarea curve3px" name=takeoverbuy></form><br>';} ?>
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