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
        .col {
            width:30%;
            text-align:center;
            padding-bottom:40px;
        }
        .right-col {
            float:left;
        }
        .left-col {
            float:left;
        }
        @media screen and (max-width: 1280px) {
            .col {
                float:none!important;
                width:100%!important;
            }
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
        <td valign="top">
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
                                Referral System
                            </div>
                            <div style="padding: 5px; margin: auto; text-align: center; color: #fefefe;">
                                <div style="margin: auto; padding-top: 16px; padding-bottom: 6px; text-align: center;">
                                    <?php
                                    $saturate = "/[^a-z0-9]/i";
                                    $saturates = "/[^0-9]/i";
                                    $sessionidraw = $_COOKIE['PHPSESSID'];
                                    $sessionid = preg_replace($saturate,"",$sessionidraw);
                                    $userip = $_SERVER[REMOTE_ADDR];
                                    $chosenraw = mysql_real_escape_string($_POST['spend']);
                                    $chosen = preg_replace($saturates,"",$chosenraw);
                                    $time = time();

                                    $gangsterusername = $usernameone;
                                    $getuserinfoarray = $statustesttwo;
                                    $rank = $getuserinfoarray['rankid'];
                                    $refpoints = $getuserinfoarray['refpoints'];

                                    $rewardalready0 = mysql_num_rows(mysql_query("SELECT * FROM referralrewards WHERE username = '$usernameone' AND crimes >= '1'"));
                                    $rewardalready02 = mysql_num_rows(mysql_query("SELECT * FROM referralrewards WHERE username = '$usernameone' AND rank >= '1'"));

                                    if($_POST['spend']){
                                        if($_POST['rp'] == 1){
                                            if($refpoints < '1'){ $showoutcome++; $outcome = "You dont have enough referral points!";}
                                            else{
                                                $crimetime = $time + 1800;
                                                $rewardalready = mysql_num_rows(mysql_query("SELECT * FROM referralrewards WHERE username = '$usernameone' AND crimes >= '0'"));
                                                if($rewardalready < 1){ mysql_query("INSERT INTO referralrewards (username,crimes) VALUES ('$usernameone','$crimetime')"); }
                                                else{
                                                    $getit = mysql_query("SELECT * FROM referralrewards WHERE username = '$usernameone' AND crimes > '0'");
                                                    $doit = mysql_fetch_array($getit);
                                                    $refcrimes = $doit['crimes'];
                                                    $crimetime = $refcrimes + 1800;
                                                    mysql_query("UPDATE referralrewards SET crimes = $crimetime WHERE username = '$usernameone' AND crimes > '0'");
                                                }
                                                mysql_query("UPDATE users SET refpoints = (refpoints - 1) WHERE username = '$usernameone' AND refpoints >= '1'");
                                                if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 1.</font>');}
                                                mysql_query("UPDATE users SET money = (money + 2500000) WHERE username = '$usernameone'");
                                                $showoutcome++; $outcome = "Referral reward 1 bought!"; }}

                                        if($_POST['rp'] == 2){
                                            if($refpoints < '2'){ $showoutcome++; $outcome = "You dont have enough referral points!";}
                                            else{
                                                $crimetime = $time + 3600;
                                                $ranktime = $time + 1800;
                                                $rewardalready = mysql_num_rows(mysql_query("SELECT * FROM referralrewards WHERE username = '$usernameone' AND crimes >= '1'"));
                                                $rewardalready2 = mysql_num_rows(mysql_query("SELECT * FROM referralrewards WHERE username = '$usernameone' AND rank >= '1'"));
                                                if($rewardalready < 1){ mysql_query("INSERT INTO referralrewards (username,crimes) VALUES ('$usernameone','$crimetime')"); }
                                                else{
                                                    $getit = mysql_query("SELECT * FROM referralrewards WHERE username = '$usernameone' AND crimes > '0'");
                                                    $doit = mysql_fetch_array($getit);
                                                    $refcrimes = $doit['crimes'];
                                                    $crimetime = $refcrimes + 3600;
                                                    mysql_query("UPDATE referralrewards SET crimes = $crimetime WHERE username = '$usernameone' AND crimes > '0'");
                                                }
                                                if($rewardalready2 < 1){ mysql_query("INSERT INTO referralrewards (username,rank) VALUES ('$usernameone','$ranktime')"); }
                                                else{
                                                    $getit = mysql_query("SELECT * FROM referralrewards WHERE username = '$usernameone' AND rank > '0'");
                                                    $doit = mysql_fetch_array($getit);
                                                    $refrank = $doit['rank'];
                                                    $ranktime = $refrank + 1800;
                                                    mysql_query("UPDATE referralrewards SET rank = $ranktime WHERE username = '$usernameone' AND rank > '0'");
                                                }
                                                mysql_query("UPDATE users SET refpoints = (refpoints - 2) WHERE username = '$usernameone' AND refpoints >= '2'");
                                                if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 2.</font>');}
                                                mysql_query("UPDATE users SET money = (money + 5000000) WHERE username = '$usernameone'");
                                                $showoutcome++; $outcome = "Referral reward 2 bought!"; }}

                                        if($_POST['rp'] == 3){
                                            if($refpoints < '3'){ $showoutcome++; $outcome = "You dont have enough referral points!";}
                                            else{
                                                $crimetime = $time + 7200;
                                                $ranktime = $time + 3600;
                                                $rewardalready = mysql_num_rows(mysql_query("SELECT * FROM referralrewards WHERE username = '$usernameone' AND crimes >= '1'"));
                                                $rewardalready2 = mysql_num_rows(mysql_query("SELECT * FROM referralrewards WHERE username = '$usernameone' AND rank >= '1'"));
                                                if($rewardalready < 1){ mysql_query("INSERT INTO referralrewards (username,crimes) VALUES ('$usernameone','$crimetime')"); }
                                                else{
                                                    $getit = mysql_query("SELECT * FROM referralrewards WHERE username = '$usernameone' AND crimes > 0");
                                                    $doit = mysql_fetch_array($getit);
                                                    $refcrimes = $doit['crimes'];
                                                    $crimetime = $refcrimes + 7200;
                                                    mysql_query("UPDATE referralrewards SET crimes = $crimetime WHERE username = '$usernameone' AND crimes > 0");
                                                }
                                                if($rewardalready2 < 1){ mysql_query("INSERT INTO referralrewards (username,rank) VALUES ('$usernameone','$ranktime')"); }
                                                else{
                                                    $getit = mysql_query("SELECT * FROM referralrewards WHERE username = '$usernameone' AND rank > 0");
                                                    $doit = mysql_fetch_array($getit);
                                                    $refrank = $doit['rank'];
                                                    $ranktime = $refrank + 3600;
                                                    mysql_query("UPDATE referralrewards SET rank = $ranktime WHERE username = '$usernameone' AND rank > 0");
                                                }
                                                mysql_query("UPDATE users SET refpoints = (refpoints - 3) WHERE username = '$usernameone' AND refpoints >= '3'");
                                                if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 3.</font>');}
                                                mysql_query("INSERT INTO cars(owner,damage,bullets,carid,speed,carname,image) VALUES ('$gangsterusername','0','276','13','60','$gangsterusername','q.png')");
                                                mysql_query("UPDATE users SET money = (money + 10000000) WHERE username = '$usernameone'");
                                                $showoutcome++; $outcome = "Referral reward 3 bought!"; }}
                                    }

                                    mysql_query("DELETE FROM referralrewards WHERE crimes != '0' AND crimes < '$time'");
                                    mysql_query("DELETE FROM referralrewards WHERE rank != '0' AND rank < '$time'");

                                     if($rewardalready0 > 0){
                                        $perkk1 = mysql_query("SELECT * FROM referralrewards WHERE crimes >= '1'");
                                        while($p1 = mysql_fetch_array($perkk1)){
                                            $perkk = $p1['crimes'];
                                            $time = time();
                                            $timer = ceil($p1['crimes']);
                                            $htime = $timer - $time;
                                            $totalh = $htime / 3600;
                                            $totalh = floor($totalh);
                                            if($totalh < '10'){$leading = 0;}
                                            echo"<font color=khaki size=1 face=verdana>Time left with double crime payout: <font color=silver>";echo"$leading";echo"$totalh";echo date( ":i:s", $timer - $time); echo "<br>";
                                        }}

                                     if($rewardalready02 > 0){
                                        $perkk12 = mysql_query("SELECT * FROM referralrewards WHERE rank >= '1'");
                                        while($p12 = mysql_fetch_array($perkk12)){
                                            $perkk2 = $p12['rank'];
                                            $time = time();
                                            $timer2 = ceil($p12['rank']);
                                            $htime2 = $timer2 - $time;
                                            $totalh2 = $htime2 / 3600;
                                            $totalh2 = floor($totalh2);
                                            if($totalh2 < '10'){$leading2 = 0;}
                                            echo"<font color=khaki size=1 face=verdana>Time left with extra rankup: <font color=silver>";echo"$leading2";echo"$totalh2";echo date( ":i:s", $timer2 - $time); echo "<br>";
                                        }}
                                     if($showoutcome>=1){ ?>
                                        <table width=70% align=center cellpadding=0 cellspacing=1 class=section>
                                            <tr><td><div class=button1 style="background-color:#171717;">&nbsp;<?echo$outcome;?></div></td></tr>
                                        </table><br>
                                    <? } ?>


                                    <div class="miniMenu shadowTest curve3px" style="min-width: 245px; max-width: 500px; width: 80%; margin-top: 30px;">
                                        <div class="miniMenuHeader noTop" style="padding: 7px; color: #ffffff;">
                                            Your referral link is <b><span style="color: gold;">www.infamousgangsters.net/register.php?ref=<?echo$usernameone;?></span><font color=khaki>&nbsp;</font></b>
                                        </div>
                                        <table class="miniMain txtShadow" padding="0" style="border-collapse: collapse; " width="100%;" cellspacing="2">
                                            <tbody>
                                            <?
                                            $getreferrals = mysql_query("SELECT * FROM referral WHERE username = '$usernameone' ORDER BY id DESC");
                                            $refcount = mysql_num_rows($getreferrals);
                                            if($refcount < 1){
                                                echo "<tr>
                                                <td class=\"statsDiv\" style=\"border-top:none;text-align: center;\" colspan='2'>                                            
                                                <span class=\"statsDivStatic\" style=\"border-top:none;\">You have not yet referred any players!</span>
                                                </td>
                                            </tr>"; }
                                            while($refresult = mysql_fetch_array($getreferrals)){
                                                $userreferred = $refresult['referred'];
                                                $getrefrank = mysql_query("SELECT rankid FROM users WHERE username = '$userreferred'");
                                                $therank = mysql_fetch_array($getrefrank);
                                                $refrankid = $therank['rankid'];
                                                if($refrankid == '1'){ $refrank = '$rank1'; }
                                                elseif($refrankid == '2'){ $refrank = '$rank2';}
                                                elseif($refrankid == '3'){ $refrank = '$rank3';}
                                                elseif($refrankid == '4'){ $refrank = '$rank4';}
                                                elseif($refrankid == '5'){ $refrank = '$rank5';}
                                                elseif($refrankid == '6'){ $refrank = '$rank6';}
                                                elseif($refrankid == '7'){ $refrank = '$rank7';}
                                                elseif($refrankid == '8'){ $refrank = '$rank8';}
                                                elseif($refrankid == '9'){ $refrank = '$rank9';}
                                                elseif($refrankid == '10'){ $refrank = '$rank10';}
                                                elseif($refrankid == '11'){ $refrank = '$rank11';}
                                                elseif($refrankid == '12'){ $refrank = '$rank12';}
                                                elseif($refrankid == '13'){ $refrank = '$rank13';}
                                                elseif($refrankid == '14'){ $refrank = '$rank14';}
                                                elseif($refrankid == '15'){ $refrank = '$rank15';}
                                                elseif($refrankid == '16'){ $refrank = '$rank16';}
                                                elseif($refrankid == '17'){ $refrank = '$rank17';}
                                                elseif($refrankid == '18'){ $refrank = '$rank18';}
                                                elseif($refrankid == '19'){ $refrank = '$rank19';}
                                                elseif($refrankid == '20'){ $refrank = '$rank20';}
                                                elseif($refrankid == '21'){ $refrank = '$rank21';}
                                                elseif($refrankid == '22'){ $refrank = '<b><font color=silver>$rank22</font></b>';}
                                                elseif($refrankid == '24'){ $refrank = 'Account being viewed';}
                                                elseif($refrankid == '25'){ $refrank = 'Moderator';}
                                                elseif($refrankid == '50'){ $refrank = 'Entertainer Manager';}
                                                elseif($refrankid == '75'){ $refrank = 'HDO Manager';}
                                                else{$refrank = '';}
                                                echo "<tr>
                                                <td class=\"statsDiv\" style=\"border-top:none;\">
                                                    <a style=\"border-top: none;\" href=viewprofile.php?username=$userreferred>$userreferred</a>
                                                </td>
                                                <td class=\"statsDiv\">
                                                <span class=\"statsDivStatic\" style=\"border-top:none;\">$refrank</span>
                                                </td>
                                            </tr>";
                                            }
                                            ?>
                                            <tr>
                                                <td class="statsDiv" colspan="2" style="text-align: right;">
                                                    <span class="statsDivStatic">You have <b><?echo$refpoints;?></b> referral points&nbsp;</b></span>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div style="padding: 5px; padding-top: 25px; padding-bottom: 0; margin: auto; text-align: center; color: #fefefe;">
                                        <div class="col left-col">
                                            <table class="regTable" style="min-width:200px; width: 80%; max-width: 200px;" cellspacing="0" cellpadding="0" align="center">
                                                <tbody><tr>
                                                    <td class="header" style="padding: 11px 0px;">
                                                        1 Referral Point
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="col noTop" style="padding-right: 10px;">Receive $2,500,000</td>
                                                </tr>
                                                <tr>
                                                    <td class="col " style="padding-right: 10px;">Receive x2 money from crimes for 30 mins</td>
                                                </tr>
                                                <tr>
                                                    <td class="col " style="padding-right: 10px;">
                                                        <form method="post">
                                                            <input type="hidden" name="rp" value="1">
                                                            <input type="submit" style="width: 100%;" class="textarea" name=spend value="Buy">
                                                        </form>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col left-col" style="margin-left:25px;">
                                            <table class="regTable" style="min-width:200px; width: 80%; max-width: 200px;" cellspacing="0" cellpadding="0" align="center">
                                                <tbody><tr>
                                                    <td class="header" style="padding: 11px 0px;">
                                                        2 Referral Points
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="col noTop" style="padding-right: 10px;">Receive $5,000,000</td>
                                                </tr>
                                                <tr>
                                                    <td class="col " style="padding-right: 10px;">Receive x2 money from crimes for 60 &nbsp;mins</td>
                                                </tr>
                                                <tr>
                                                    <td class="col " style="padding-right: 10px;;">Receive 25% extra rankup for 30 minutes</td>
                                                </tr>
                                                <tr>
                                                    <td class="col " style="padding-right: 10px;">
                                                        <form method="post">
                                                            <input type="hidden" name="rp" value="2">
                                                            <input type="submit" class="textarea" style="width: 100%;" name=spend value="Buy">
                                                        </form>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col right-col" style="margin-left:30px;">
                                            <table class="regTable" style="min-width:200px; width: 80%; max-width: 200px;" cellspacing="0" cellpadding="0" align="center">
                                                <tbody><tr>
                                                    <td class="header" style="padding: 11px 0px;">
                                                        3 Referral Points
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="col noTop" style="padding-right: 10px;">Receive $10,000,000</td>
                                                </tr>
                                                <tr>
                                                    <td class="col " style="padding-right: 10px;">Receive x2 money from crimes for 120 mins</td>
                                                </tr>
                                                <tr>
                                                    <td class="col " style="padding-right: 10px;">Receive 25% extra rankup for 60 minutes</td>
                                                </tr>
                                                <tr>
                                                    <td class="col " style="padding-right: 10px;">Receive a custom car</td>
                                                </tr>
                                                <tr>
                                                    <td class="col " style="padding-right: 10px;">
                                                        <form method="post">
                                                            <input type="hidden" name="rp" value="3">
                                                            <input type="submit" class="textarea" style="width: 100%;"class="textbox inline_form" name=spend value="Buy">
                                                        </form>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="clear"></div>
                                        <div class="break" style="padding-top: 10px;"></div>
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



