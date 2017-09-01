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

            $saturate = "/[^a-z0-9]/i";
            $saturated = "/[^0-9]/i";
            $sessionidraw = $_COOKIE['PHPSESSID'];
            $nameraw = $_POST['name'];
            $sessionid = preg_replace($saturate,"",$sessionidraw);
            $name = preg_replace($saturate,"",$nameraw);
            $userip = $_SERVER[REMOTE_ADDR];
            $gangsterusername = $usernameone;

            $playerarray = $statustesttwo;
            $playerrank = $playerarray['rankid'];

            $reasonraw = $_POST['reason'];
            $reason = htmlentities($reasonraw, ENT_QUOTES);
            $dmsg = $reason;

            if($playerrank < '25'){die(' ');}
            $to = 'None';

            $bansql = mysql_query("SELECT * FROM users WHERE username = '$name'");
            $banrows = mysql_num_rows($bansql);
            $banarray = mysql_fetch_array($bansql);
            $banip = $banarray['latestip'];
            $ban = $banarray['username'];
            $banrank = $banarray['rankid'];
            $status = $banarray['status'];
            $crewid = $banarray['crewid'];

            if(!$reason){$reason = "No reason given.";}

            if(isset($_POST['dobg'])){
                include 'modkillbg.php'; }
            else{
                if(isset($_POST['do'])){
                    if(!$name){}
                    elseif($banrows < '1'){$showoutcome++; $outcome = '<font color=white face=verdana size=1>No such user!</font>';}
                    elseif(($status ==  'Dead' || $status == 'Modkilled')){$showoutcome++; $outcome = '<font color=white face=verdana size=1>User is already dead!</font>';}
                    elseif(($banrank >= '25')&&($playerrank < 100)){$showoutcome++; $outcome = '<font color=white face=verdana size=1>Want to be demoted?</font>';}
                    else{

                        $checkforbg = mysql_num_rows(mysql_query("SELECT * FROM bodyguards WHERE username = '$ban' AND status = '2'"));
                        if($checkforbg > '0'){
                            die('<font color=white face=verdana size=1>You cannot modkill bodyguards!</font>');}

                        $postinfo = "[b]Modkilled:[/b] $ban [b]Reason:[/b] $reason";
                        mysql_query("UPDATE statis SET alive = (alive+1)");
                        mysql_query("UPDATE users SET kills = kills + 1 WHERE username = '$gangsterusername'");
                        mysql_query("UPDATE users SET deathmessage = '$dmsg' WHERE username = '$ban'");
                        mysql_query("INSERT INTO modkill(victim,reason,killer,killerip,rankid)
VALUES ('$ban','$reason','$gangsterusername','$userip','$banrank')");
                        mysql_query("INSERT INTO attempts(username,victim,ip,type)
VALUES ('$gangsterusername','$ban','$userip','1')");
                        mysql_query("INSERT INTO forumposts(username,topicid,type,post,rankid,esc)
VALUES ('$gangsterusername','7','hdof','$postinfo','$playerrank','1')");

                        $showoutcome++; $outcome = "<font color=white face=verdana size=1>You modkilled</font> <a href=viewprofile.php?username=$ban><font color=white face=verdana size=1>$ban</a></font>";

                        $hitlist = mysql_query("SELECT * FROM hitlist WHERE username = '$ban'");
                        $hitlistrows = mysql_num_rows($hitlist);
                        if($hitlistrows > '0'){
                            while ($array = mysql_fetch_array($hitlist)){
                                $amount = $array['amount'];
                                $victimid = $array['id'];
                                mysql_query("DELETE FROM hitlist WHERE id = '$victimid'");
                                mysql_query("UPDATE users SET money = (money + $amount) WHERE username = '$gangsterusername'");}}

                        mysql_query("UPDATE users SET status = 'Modkilled' WHERE username = '$ban'");
                        mysql_query("DELETE FROM usersonline WHERE username = '$ban'");
                        mysql_query("DELETE FROM hospital WHERE username = '$ban'");
                        mysql_query("DELETE FROM robbery WHERE invite = '$ban'");
                        mysql_query("DELETE FROM blackjack WHERE username = '$ban'");
                        mysql_query("DELETE FROM jail WHERE username = '$ban'");
                        mysql_query("DELETE FROM travel WHERE username = '$ban'");
                        mysql_query("UPDATE cars SET price = '0' WHERE owner = '$ban'");

                        $bank = mysql_query("SELECT * FROM bank WHERE username = '$ban'");
                        $banks = mysql_num_rows($bank);
                        if($banks != '0'){
                            $banka = mysql_fetch_array($bank);
                            $amount = $banka['amount'];
                            mysql_query("UPDATE users SET money = (money + $amount) WHERE username = '$ban'");
                            mysql_query("DELETE FROM bank WHERE username = '$ban'");}

                        $casinotest = mysql_num_rows(mysql_query("SELECT * FROM casinos WHERE owner = '$ban'"));
                        if($casinotest == '1'){$showoutcome++; $outcome = "<br><br><font color=white face=verdana size=1>His casino has been dropped!</font>";mysql_query("UPDATE casinos SET owner = '$to' WHERE owner = '$ban'");mysql_query("UPDATE casinos SET nickname = '$to' WHERE nickname = '$ban'");}
                        elseif($casinotest > '1'){$showoutcome++; $outcome = "<br><br><font color=white face=verdana size=1>His casinos have been dropped!</font>";mysql_query("UPDATE casinos SET owner = '$gangsterusername' WHERE owner = '$ban'");mysql_query("UPDATE casinos SET nickname = '$gangsterusername' WHERE nickname = '$ban'");}else{}

                        mysql_query("UPDATE bodyguards SET username = ' ', status = '0' WHERE guarding = '$ban'");
                        mysql_query("UPDATE bodyguards SET username = ' ', status = '0' WHERE username = '$ban'");

                        if($crewid != '0'){
                            $boss = mysql_num_rows(mysql_query("SELECT * FROM crews WHERE boss = '$ban'"));

                            if($boss > '0'){
                                $getreelid = mysql_fetch_array(mysql_query("SELECT * FROM crews WHERE boss = '$ban'"));
                                $gytid = $getreelid['id'];
                                $crewunderboss = $getreelid['underboss'];
                                $members = mysql_num_rows(mysql_query("SELECT * FROM users WHERE crewid = '$crewid' AND status = 'Alive'"));

                                if($members < 1){ mysql_query("DELETE FROM crews WHERE boss = '$ban'");
                                    mysql_query("DELETE FROM forumtopics WHERE type = '$crewid'");
                                    mysql_query("DELETE FROM forumposts WHERE type = '$crewid'");
                                    mysql_query("DELETE FROM applicants WHERE crewid = '$crewid'");
                                    mysql_query("DELETE FROM recruiters WHERE crewid = '$crewid'");
                                    mysql_query("UPDATE users SET crewid = '0' WHERE crewid = '$crewid'");}

                                elseif($crewunderboss != ''){
                                    mysql_query("UPDATE crews SET boss = '$crewunderboss' WHERE id = '$gytid'"); }

                                else{

                                    $newbossa = mysql_query("SELECT * FROM users WHERE crewid = '$crewid' AND status = 'Alive' ORDER BY rankid DESC LIMIT 0,1");
                                    $newboss = mysql_fetch_array($newbossa);
                                    $newbossname = $newboss['username'];
                                    mysql_query("UPDATE crews SET boss = '$newbossname' WHERE id = '$crewid'");}}}}}}
            if(isset($_POST['dorevive'])){ include 'reviveauser.php'; }
            ?>

            <?php  if($showoutcome>=1){
                echo $outcome;
            } ?>
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
                                Modkill
                            </div>
                            <div style="padding: 5px; margin: auto; text-align: center; color: #fefefe;">
                                <div style="margin: auto; width: 93%; padding-top: 16px; padding-bottom: 6px; text-align: center;">

                                    <form action="" method="post" style="padding-top: 30px;">
                                        <span>Modkill:</span>
                                        <input type="text" name="name" class="textarea" placeholder="Enter a Username...">
                                        <input type="text" name="reason" class="textarea" placeholder="Enter a Reason/Death message:">
                                        <input type ="submit" value="Modkill" class="textarea curve3px" name="do">
                                    </form>

                                    <form action="" method="post" style="padding-top: 30px;">
                                        <span>Modkill Bodyguard:</span>
                                        <input type="text" name="name" class="textarea" placeholder="Enter a Username...">
                                        <input type="text" name="reason" class="textarea" placeholder="Enter a Reason/Death message:">
                                        <input type ="submit" value="Modkill" class="textarea curve3px" name="dobg">
                                    </form>

                                    <form action="" method="post" style="padding-top: 30px;">
                                        <span>Revive:</span>
                                        <input type="text" name="demote" class="textarea" placeholder="Enter a Username...">
                                        <input type ="submit" value="Revive" class="textarea curve3px" name="dorevive">
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