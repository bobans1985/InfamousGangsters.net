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
        <td valign="top">
            <?php
            $saturate = "/[^a-z0-9]/i";
            $sessionidraw = $_COOKIE['PHPSESSID'];
            $sessionid = preg_replace($saturate,"",$sessionidraw);
            $userip = $_SERVER[REMOTE_ADDR];

            $gangsterusername = $usernameone;


            $getuserinfoarray = $statustesttwo;
            $rank= $getuserinfoarray['rankid'];

            if($rank < '100'){die(' ');}

            $money = mysql_query("SELECT * FROM users WHERE status = 'Alive' AND rankid < '25' ORDER BY money DESC LIMIT 0,25");
            $swiss = mysql_query("SELECT * FROM users WHERE status = 'Alive' AND rankid < '25' ORDER BY swiss DESC LIMIT 0,25");
            $pats = mysql_query("SELECT * FROM users WHERE status = 'Alive' AND rankid < '25'  ORDER BY points DESC LIMIT 0,25");
            $bank = mysql_query("SELECT * FROM bank WHERE rankid < '25' ORDER BY amount DESC LIMIT 0,25");

            $total = mysql_fetch_object(mysql_query("SELECT SUM(points)AS worldtotal FROM users WHERE rankid < '25' AND status = 'Alive'"));
            $totalpoints = number_format($total->worldtotal);
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
                                Rich List
                            </div>
                            <div style="padding: 5px; margin: auto; text-align: center; color: #fefefe;">
                                <div class="break" style="padding-top: 6px;">
                                    <div class="miniMenu shadowTest curve3px" id="crimes" style="vertical-align: top; margin-left: -8px; margin-bottom: 5px;  display: inline-block; width: 43%; min-width: 175px; max-width: 325px;">
                                        <div class="miniMenuHeader noTop" style="padding: 7px; color: #ffffff;">
                                            Points: <?echo$totalpoints;?>
                                        </div>
                                        <table class="miniMain txtShadow" padding="0" style="border-collapse: collapse; " width="100%;" cellspacing="2">
                                            <tbody>
                                            <tr style="border-bottom: 1px solid #080808;text-align:center;">
                                                <td class="statsDivHeader" style="border-right: 0; border-left: 0; border-bottom: 0;" width="1%"></td>
                                                <td class="statsDivHeader" style="border-bottom: 0;">Username</td>
                                                <td class="statsDivHeader" style="padding-right: 15px; border-bottom: 0;">Points</td>
                                            </tr>
                                            <?
                                            $ranking = 0;
                                            while($patss = mysql_fetch_array($pats)){
                                                $ranking++;
                                                $nam = $patss['username'];
                                                $mona = number_format($patss['points']);
                                                if ($ranking <= 3) {
                                                    if ($ranking == 1) {
                                                        echo "<tr style='background-color: #303030;'>
                                                <td class='statsDiv' style='color: #999999; background-color: #303030; border-top: 0;'>
                                                    <span class='statsDivStatic' style='border-top: 0;'><span style='color: #FFC753;'>#" . $ranking . "</span></span>
                                                </td>
                                                <td class='statsDiv'>
                                                    <a style='color: #FFC753;border-top:0px;' href='viewprofile.php?username=$nam'>$nam</a>                                               
                                                </td>                                              
                                                <td class='statsDiv' style='color: #FFC753; border-top: 0;'>
                                                    <span class='statsDivStatic' style='border-top: 0;'>" . $mona . "</span>
                                                </td>
                                                </tr>";
                                                    } else {
                                                        echo "<tr style='background-color: #303030;'>
                                                <td class='statsDiv' style='color: #999999; background-color: #303030; '>
                                                    <span class='statsDivStatic'><span style='color: #efefef;'>#" . $ranking . "</span></span>
                                                </td>
                                                <td class='statsDiv'>
                                                    <a style='color:#efefef' href='viewprofile.php?username=$nam'>$nam</a>                                               
                                                </td>                                              
                                                <td class='statsDiv' style='color: #999999; color: #efefef;'>
                                                    <span class='statsDivStatic'>" . $mona . "</span>
                                                </td>
                                                </tr>";
                                                    }
                                                } else {
                                                    if($ranking==4){
                                                        echo "<tr style='border-top: 2px solid #212121;'>
                                                <td class='statsDiv' style='color: #999999;'>
                                                    <span class='statsDivStatic'><span style='color: #bbbbbb;'>#" . $ranking . "</span></span>
                                                </td>
                                                <td class='statsDiv'>
                                                    <a style='color:#bbbbbb' href='viewprofile.php?username=$nam'>$nam</a>                                               
                                                </td>                                              
                                                <td class='statsDiv' style='color: #999999; color: #bbbbbb;'>
                                                    <span class='statsDivStatic'>" . $mona . "</span>
                                                </td>
                                                </tr>";
                                                    }else{
                                                        echo "<tr>
                                                <td class='statsDiv' style='color: #999999;'>
                                                    <span class='statsDivStatic'><span style='color: #bbbbbb;'>#" . $ranking . "</span></span>
                                                </td>
                                                <td class='statsDiv'>
                                                    <a style='color:#bbbbbb' href='viewprofile.php?username=$nam'>$nam</a>                                               
                                                </td>                                              
                                                <td class='statsDiv' style='color: #999999; color: #bbbbbb;'>
                                                    <span class='statsDivStatic'>" . $mona . "</span>
                                                </td>
                                                </tr>";
                                                    }
                                                }
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="miniMenu shadowTest curve3px" id="gtas" style="vertical-align: top; margin-left: 12px; margin-bottom: 5px;  display: inline-block; width: 43%; min-width: 175px; max-width: 325px;">
                                        <div class="miniMenuHeader noTop" style="padding: 7px; color: #ffffff;">
                                            Money
                                        </div>
                                        <table class="miniMain txtShadow" padding="0" style="border-collapse: collapse; " width="100%;" cellspacing="2">
                                            <tbody>
                                            <tr style="border-bottom: 1px solid #080808;text-align:center;">
                                                <td class="statsDivHeader" style="border-right: 0; border-left: 0; border-bottom: 0;" width="1%"></td>
                                                <td class="statsDivHeader" style="border-bottom: 0;">Username</td>
                                                <td class="statsDivHeader" style="padding-right: 15px; border-bottom: 0;">Money Balance</td>
                                            </tr>
                                            <?
                                            $ranking=0;
                                            while($moneys = mysql_fetch_array($money)){
                                                $ranking++;
                                                $nam = $moneys['username'];
                                                $mona = number_format($moneys['money']);
                                                if ($ranking <= 3) {
                                                    if ($ranking == 1) {
                                                        echo "<tr style='background-color: #303030;'>
                                                <td class='statsDiv' style='color: #999999; background-color: #303030; border-top: 0;'>
                                                    <span class='statsDivStatic' style='border-top: 0;'><span style='color: #FFC753;'>#" . $ranking . "</span></span>
                                                </td>
                                                <td class='statsDiv'>
                                                    <a style='color: #FFC753;border-top:0px;' href='viewprofile.php?username=$nam'>$nam</a>                                               
                                                </td>                                              
                                                <td class='statsDiv' style='color: #FFC753; border-top: 0;'>
                                                    <span class='statsDivStatic' style='border-top: 0;'>" . $mona . "</span>
                                                </td>
                                                </tr>";
                                                    } else {
                                                        echo "<tr style='background-color: #303030;'>
                                                <td class='statsDiv' style='color: #999999; background-color: #303030; '>
                                                    <span class='statsDivStatic'><span style='color: #efefef;'>#" . $ranking . "</span></span>
                                                </td>
                                                <td class='statsDiv'>
                                                    <a style='color:#efefef' href='viewprofile.php?username=$nam'>$nam</a>                                               
                                                </td>                                              
                                                <td class='statsDiv' style='color: #999999; color: #efefef;'>
                                                    <span class='statsDivStatic'>" . $mona . "</span>
                                                </td>
                                                </tr>";
                                                    }
                                                } else {
                                                    if($ranking==4){
                                                        echo "<tr style='border-top: 2px solid #212121;'>
                                                <td class='statsDiv' style='color: #999999;'>
                                                    <span class='statsDivStatic'><span style='color: #bbbbbb;'>#" . $ranking . "</span></span>
                                                </td>
                                                <td class='statsDiv'>
                                                    <a style='color:#bbbbbb' href='viewprofile.php?username=$nam'>$nam</a>                                               
                                                </td>                                              
                                                <td class='statsDiv' style='color: #999999; color: #bbbbbb;'>
                                                    <span class='statsDivStatic'>" . $mona . "</span>
                                                </td>
                                                </tr>";
                                                    }else{
                                                        echo "<tr>
                                                <td class='statsDiv' style='color: #999999;'>
                                                    <span class='statsDivStatic'><span style='color: #bbbbbb;'>#" . $ranking . "</span></span>
                                                </td>
                                                <td class='statsDiv'>
                                                    <a style='color:#bbbbbb' href='viewprofile.php?username=$nam'>$nam</a>                                               
                                                </td>                                              
                                                <td class='statsDiv' style='color: #999999; color: #bbbbbb;'>
                                                    <span class='statsDivStatic'>" . $mona . "</span>
                                                </td>
                                                </tr>";
                                                    }
                                                }
                                            } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="break" id="sec2" style="padding-top: 18px;">
                                        <div class="spacer"></div>
                                        <div class="break" style="padding-top: 19px;">
                                            <div class="miniMenu shadowTest curve3px" style="vertical-align: top; margin-left: -8px; margin-bottom: 5px;  display: inline-block; width: 43%; min-width: 175px; max-width: 325px;">
                                                <div class="miniMenuHeader noTop" style="padding: 7px; color: #ffffff;">
                                                    Swiss
                                                </div>
                                                <table class="miniMain txtShadow" padding="0" style="border-collapse: collapse; " width="100%;" cellspacing="2">
                                                    <tbody>
                                                    <tr style="border-bottom: 1px solid #080808;text-align:center;">
                                                        <td class="statsDivHeader" style="border-right: 0; border-left: 0; border-bottom: 0;" width="1%"></td>
                                                        <td class="statsDivHeader" style="border-bottom: 0;">Username</td>
                                                        <td class="statsDivHeader" style="padding-right: 15px; border-bottom: 0;">Swiss Balance</td>
                                                    </tr>
                                                    <?
                                                    $ranking=0;
                                                    while($swis = mysql_fetch_array($swiss)){
                                                        $ranking++;
                                                        $nam = $swis['username'];
                                                        $mona = number_format($swis['swiss']);
                                                        if ($ranking <= 3) {
                                                            if ($ranking == 1) {
                                                                echo "<tr style='background-color: #303030;'>
                                                <td class='statsDiv' style='color: #999999; background-color: #303030; border-top: 0;'>
                                                    <span class='statsDivStatic' style='border-top: 0;'><span style='color: #FFC753;'>#" . $ranking . "</span></span>
                                                </td>
                                                <td class='statsDiv'>
                                                    <a style='color: #FFC753;border-top:0px;' href='viewprofile.php?username=$nam'>$nam</a>                                               
                                                </td>                                              
                                                <td class='statsDiv' style='color: #FFC753; border-top: 0;'>
                                                    <span class='statsDivStatic' style='border-top: 0;'>" . $mona . "</span>
                                                </td>
                                                </tr>";
                                                            } else {
                                                                echo "<tr style='background-color: #303030;'>
                                                <td class='statsDiv' style='color: #999999; background-color: #303030; '>
                                                    <span class='statsDivStatic'><span style='color: #efefef;'>#" . $ranking . "</span></span>
                                                </td>
                                                <td class='statsDiv'>
                                                    <a style='color:#efefef' href='viewprofile.php?username=$nam'>$nam</a>                                               
                                                </td>                                              
                                                <td class='statsDiv' style='color: #999999; color: #efefef;'>
                                                    <span class='statsDivStatic'>" . $mona . "</span>
                                                </td>
                                                </tr>";
                                                            }
                                                        } else {
                                                            if($ranking==4){
                                                                echo "<tr style='border-top: 2px solid #212121;'>
                                                <td class='statsDiv' style='color: #999999;'>
                                                    <span class='statsDivStatic'><span style='color: #bbbbbb;'>#" . $ranking . "</span></span>
                                                </td>
                                                <td class='statsDiv'>
                                                    <a style='color:#bbbbbb' href='viewprofile.php?username=$nam'>$nam</a>                                               
                                                </td>                                              
                                                <td class='statsDiv' style='color: #999999; color: #bbbbbb;'>
                                                    <span class='statsDivStatic'>" . $mona . "</span>
                                                </td>
                                                </tr>";
                                                            }else{
                                                                echo "<tr>
                                                <td class='statsDiv' style='color: #999999;'>
                                                    <span class='statsDivStatic'><span style='color: #bbbbbb;'>#" . $ranking . "</span></span>
                                                </td>
                                                <td class='statsDiv'>
                                                    <a style='color:#bbbbbb' href='viewprofile.php?username=$nam'>$nam</a>                                               
                                                </td>                                              
                                                <td class='statsDiv' style='color: #999999; color: #bbbbbb;'>
                                                    <span class='statsDivStatic'>" . $mona . "</span>
                                                </td>
                                                </tr>";
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="miniMenu shadowTest curve3px" style="vertical-align: top; margin-left: 12px; margin-bottom: 5px;  display: inline-block; width: 43%; min-width: 175px; max-width: 325px;">
                                                <div class="miniMenuHeader noTop" style="padding: 7px; color: #ffffff;">
                                                    Bank
                                                </div>
                                                <table class="miniMain txtShadow" padding="0" style="border-collapse: collapse; " width="100%;" cellspacing="2">
                                                    <tbody>
                                                    <tr style="border-bottom: 1px solid #080808;text-align:center;">
                                                        <td class="statsDivHeader" style="border-right: 0; border-left: 0; border-bottom: 0;" width="1%"></td>
                                                        <td class="statsDivHeader" style="border-bottom: 0;">Username</td>
                                                        <td class="statsDivHeader" style="padding-right: 15px; border-bottom: 0;">Bank Balance</td>
                                                    </tr>
                                                    <?
                                                    $ranking=0;
                                                    while($ban= mysql_fetch_array($bank)){
                                                        $ranking++;
                                                        $nam = $ban['username'];
                                                        $mona = number_format($ban['amount']);
                                                        if ($ranking <= 3) {
                                                            if ($ranking == 1) {
                                                                echo "<tr style='background-color: #303030;'>
                                                <td class='statsDiv' style='color: #999999; background-color: #303030; border-top: 0;'>
                                                    <span class='statsDivStatic' style='border-top: 0;'><span style='color: #FFC753;'>#" . $ranking . "</span></span>
                                                </td>
                                                <td class='statsDiv'>
                                                    <a style='color: #FFC753;border-top:0px;' href='viewprofile.php?username=$nam'>$nam</a>                                               
                                                </td>                                              
                                                <td class='statsDiv' style='color: #FFC753; border-top: 0;'>
                                                    <span class='statsDivStatic' style='border-top: 0;'>" . $mona . "</span>
                                                </td>
                                                </tr>";
                                                            } else {
                                                                echo "<tr style='background-color: #303030;'>
                                                <td class='statsDiv' style='color: #999999; background-color: #303030; '>
                                                    <span class='statsDivStatic'><span style='color: #efefef;'>#" . $ranking . "</span></span>
                                                </td>
                                                <td class='statsDiv'>
                                                    <a style='color:#efefef' href='viewprofile.php?username=$nam'>$nam</a>                                               
                                                </td>                                              
                                                <td class='statsDiv' style='color: #999999; color: #efefef;'>
                                                    <span class='statsDivStatic'>" . $mona . "</span>
                                                </td>
                                                </tr>";
                                                            }
                                                        } else {
                                                            if($ranking==4){
                                                                echo "<tr style='border-top: 2px solid #212121;'>
                                                <td class='statsDiv' style='color: #999999;'>
                                                    <span class='statsDivStatic'><span style='color: #bbbbbb;'>#" . $ranking . "</span></span>
                                                </td>
                                                <td class='statsDiv'>
                                                    <a style='color:#bbbbbb' href='viewprofile.php?username=$nam'>$nam</a>                                               
                                                </td>                                              
                                                <td class='statsDiv' style='color: #999999; color: #bbbbbb;'>
                                                    <span class='statsDivStatic'>" . $mona . "</span>
                                                </td>
                                                </tr>";
                                                            }else{
                                                                echo "<tr>
                                                <td class='statsDiv' style='color: #999999;'>
                                                    <span class='statsDivStatic'><span style='color: #bbbbbb;'>#" . $ranking . "</span></span>
                                                </td>
                                                <td class='statsDiv'>
                                                    <a style='color:#bbbbbb' href='viewprofile.php?username=$nam'>$nam</a>                                               
                                                </td>                                              
                                                <td class='statsDiv' style='color: #999999; color: #bbbbbb;'>
                                                    <span class='statsDivStatic'>" . $mona . "</span>
                                                </td>
                                                </tr>";
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="break" id="sec3" style="padding-top: 18px;">
                                                <div class="spacer"></div>
                                                <div class="break" style="padding-top: 19px;"></div>
                                            </div>
                                        </div>
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