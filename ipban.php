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
            $nameraw = mysql_real_escape_string($_POST['name']);
            $sessionid = preg_replace($saturate,"",$sessionidraw);
            $nameiraw = mysql_real_escape_string($_POST['name2']);
            $namei = preg_replace($saturate,"",$nameiraw);
            $name = preg_replace($saturate,"",$nameraw);
            $userip = $_SERVER[REMOTE_ADDR];
            $gangsterusername = $usernameone;

            $playerarray = $statustesttwo;
            $playerrank = $playerarray['rankid'];

            $ahdoban = mysql_num_rows(mysql_query("SELECT * FROM hdos WHERE username = '$usernameone' AND ban = '1'"));

            if(($ahdoban < '1' && $playerrank < '25')){die(' ');}

            $reasonraw = mysql_real_escape_string($_POST['reason']);
            $reason = htmlentities($reasonraw, ENT_QUOTES);
            $ahdoban = mysql_num_rows(mysql_query("SELECT * FROM hdos WHERE username = '$usernameone' AND ban = '1'"));

            $bansql = mysql_query("SELECT * FROM users WHERE username = '$name'");
            $banrows = mysql_num_rows($bansql);
            $banarray = mysql_fetch_array($bansql);
            $banip = $banarray['latestip'];
            $ban = $banarray['username'];
            $banrank = $banarray['rankid'];

            $bansqltwo = mysql_query("SELECT * FROM banned WHERE username = '$name'");
            $banrowstwo = mysql_num_rows($bansqltwo);

            $bansqli = mysql_query("SELECT * FROM users WHERE username = '$namei'");
            $banrowsi = mysql_num_rows($bansqli);
            $banarrayi = mysql_fetch_array($bansqli);
            $bani = $banarrayi['username'];
            $banranki = $banarrayi['rankid'];

            $to = 'None';

            if(isset($_POST['do'])){
                if(!$name){}
                elseif($banrows < '1'){$showoutcome++; $outcome = '<font color=white face=verdana size=1>No such user!</font>';}
                elseif($banrowstwo > '0'){$showoutcome++; $outcome = '<font color=white face=verdana size=1>User is already banned!</font>';}
                elseif((($banrank >= 25)||($ahdoban > '1')&&($playerrank < 100))){$showoutcome++; $outcome = '<font color=white face=verdana size=1>Want to be demoted?</font>';}
                else{

                    if($banip == ''){}else{
                        mysql_query("DELETE FROM home WHERE username = '$ban'");
                        mysql_query("DELETE FROM usersonline WHERE username = '$ban'");
                        mysql_query("DELETE FROM forumposts WHERE username = '$name'");
                        mysql_query("DELETE FROM forumtopics WHERE creator = '$name'");
                        mysql_query("DELETE FROM messages WHERE sentto = '$name'");
                        mysql_query("DELETE FROM messages WHERE sentfrom = '$name'");

                        $casinotest = mysql_num_rows(mysql_query("SELECT * FROM casinos WHERE owner = '$ban'"));
                        if($casinotest == '1'){$showoutcome++; $outcome = "<br><br><font color=white face=verdana size=1>His casino has been dropped!</font>";mysql_query("UPDATE casinos SET owner = '$to' WHERE owner = '$ban'");mysql_query("UPDATE casinos SET nickname = '$to' WHERE nickname = '$ban'");}
                        elseif($casinotest > '1'){$showoutcome++; $outcome = "<br><br><font color=white face=verdana size=1>His casinos have been dropped!</font>";mysql_query("UPDATE casinos SET owner = '$gangsterusername' WHERE owner = '$ban'");mysql_query("UPDATE casinos SET nickname = '$gangsterusername' WHERE nickname = '$ban'");}else{}

                        mysql_query("UPDATE users SET status = 'Modkilled' WHERE username = '$ban'");
                        mysql_query("INSERT INTO banned(username,reason,banby,ip) VALUES ('$ban','$reason','$gangsterusername','$banip')");
                        $showoutcome++; $outcome = "<font color=white face=verdana size=1>Username: <b>$name</b> is now banned!</font>";}}}

            if(isset($_POST['undo'])){
                if(!$name){}
                elseif($banrows < '1'){$showoutcome++; $outcome = '<font color=white face=verdana size=1>No such user!</font>';}
                elseif($banrowstwo == '0'){$showoutcome++; $outcome = '<font color=white face=verdana size=1>User is not banned!</font>';}
                else{
                    mysql_query("DELETE FROM banned WHERE username = '$ban'");
                    mysql_query("UPDATE users SET status = 'Alive' WHERE username = '$ban'");
                    $showoutcome++; $outcome = "<font color=white face=verdana size=1>User: <b>$name</b> is now longer banned!</font>";}}
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
                                Ban
                            </div>
                            <div style="padding: 5px; margin: auto; text-align: center; color: #fefefe;">
                                <div style="margin: auto; width: 93%; padding-bottom: 6px; text-align: center;">
                                    <table align="center" width="85%" cellpadding="0" cellspacing="1" class="section">
                                        <center>
                                            <form action="" method="post">
                                                <font color="silver" face="verdana" size="2"><b><br>Only ever use this to ban advertisers</b></font><br><br>
                                                <input type="text" name="name" class="textarea" placeholder="Enter a Username...">
                                                <input type ="submit" value="Ban user" class="textarea" name="do">
                                            </form>
                                        <br><br>
                                        <form action="" method="post">
                                            <input type="text" name="name" class="textarea" placeholder="Enter a Username...">
                                            <input type ="submit" value="Remove ban" class="textarea" name="undo">
                                        </form>
                                        </center>
                                        </tbody>
                                    </table>
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