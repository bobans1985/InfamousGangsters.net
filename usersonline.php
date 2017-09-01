<?
include 'included.php';
session_start();

$time = time();
$timetwo = $time-4000;

$usersonlineresult = mysql_query("SELECT * FROM users WHERE activity >= '$timetwo' AND ID != '13' ORDER BY rankid DESC");


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="css/layout.css">
    <link rel="stylesheet" href="layout/style.css" type="text/css" />
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
            margin-top: 14px;
        }

        .btm-statbreak {
            height: 7px;
            display: block;
        }
    </style>
</head>
<body id="body">
<div id="alertBox">Hii</div>
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
                                Users Online
                            </div>
                            <div style="padding: 5px; margin: auto; text-align: center; color: #fefefe;">
                                <div style="margin: auto; padding-top: 16px; padding-bottom: 6px; text-align: left;">
                                    <?php

                                    while($usersonline = mysql_fetch_array($usersonlineresult))
                                    {
                                        $onlineuser = $usersonline['username'];
                                        $usersonlinerankid = $usersonline['rankid'];
                                        $crewid = $usersonline['crewid'];
                                        $appear = $usersonline['appear'];
                                        $moneys = $usersonline['money'];
                                        $hdo = $usersonline['hdo'];
                                        $entertainercheckresult = $usersonline['ent'];
                                        $idh = $usersonline['ID'];
                                        $thdocheckresult  = $usersonline['thdo'];



                                        $money = $moneys;

                                        $usersonlinecount++;

                                        $check = mysql_query("SELECT username FROM usersonline WHERE id = '$idh' ");
                                        $checks = mysql_num_rows($check);




                                        $newscheck = mysql_query("SELECT username FROM news WHERE username = '$onlineuser' ");
                                        $news = mysql_num_rows($newscheck);





//                                        $seniorchecki = mysql_query("SELECT username FROM senior WHERE username = '$onlineuser'");
//                                        $seniorchecks = mysql_num_rows($seniorchecki);



                                        if(($checks != '0')&&($appear != '1')) {
                                            echo"<font size=1> </font><a id=$idh href =viewprofile.php?username=$onlineuser>";
                                        }


                                        if($checks == '0')
                                        {
                                            $usersonlinecount--;
                                        }
                                        elseif($appear == '1')
                                        {
                                            $usersonlinecount--;
                                        }

                                        elseif($onlineuser == 'Larssssssss')
                                        {
                                            echo "<font color=dodgerblue><b>$onlineuser</b></font>";
                                        }


                                        elseif($usersonlinerankid == '100')
                                        {
                                            echo "<font color=red><b>$onlineuser</b></font>";
                                        }
                                        elseif($news == '1')
                                        {
                                            echo "<font color=#78aaef><b>$onlineuser</b></font>";
                                        }
                                        elseif($usersonlinerankid == '75')
                                        {
                                            echo "<font color=aqua><b>$onlineuser</b></font>";
                                        }
                                        elseif($usersonlinerankid == '50')
                                        {
                                            echo "<b><font color=yellow>$onlineuser</b></font>";
                                        }
                                        elseif($usersonlinerankid == '25')
                                        {
                                            echo "<font color='royalblue'><b>$onlineuser</b></font>";
                                        }
//                                        elseif($seniorchecks != '0'){
//                                            echo "<b><font color='#43a403'>$onlineuser</b></font>";
//                                        }
                                        elseif($hdo > '0')
                                        {
                                            echo "<b><font color=lime>$onlineuser</b></font>";
                                        }
                                        elseif($entertainercheckresult > '0')
                                        {
                                            echo "<b><font color=pink>$onlineuser</b></font>";
                                        }

                                        elseif($usersonlinerankid == '22')
                                        {
                                            echo "<font color='#FFC753'><b><u>$onlineuser</u></b>";
                                        }
                                        elseif(mysql_num_rows(mysql_query("SELECT * FROM friends WHERE thereid = '$idh' AND myid = '$ida'")) >= '1')
                                        {
                                            echo "<font color=white><b>$onlineuser</b></font>";
                                        }
                                        elseif($crewid != '0')
                                        {
                                            echo "$onlineuser";
                                        }
                                        else
                                        {
                                            echo "<font color=gray>$onlineuser</font>";
                                        }


                                        if(($checks != '0')&&($appear != '1')) {
                                            echo"</a><font color=white size=1>&nbsp; -</font>";}
                                    }
                                    ?>
                                    <div class="break" style="padding-top: 17px;">
                                        <div class="spacer" style="margin-bottom: 1px;"></div>
                                        <table style="min-height: 31px;" width="100%" cellspacing="0" cellpadding="0">
                                            <tbody><tr><td style="text-align: left; padding: 3px; padding-right: 2px;">
                                                </td>
                                                <td style="padding: 5px;" align="right">
                                                    <div style="padding-right: 4px;font-size:10px;">
                                                        <span style="color: #fefefe;"><b style="color: #FFC753;"><? echo $usersonlinecount; ?></b>&nbsp;Users&nbsp;Online</span>
                                                        <span style="padding-left: 9px; padding-right: 9px; color: #dfdfdf;">-</span><a href="faq.php#key"><b>Key</b></a></div></td>
                                            </tr>
                                            </tbody></table>
                                        <div class="spacer"></div>
                                        <div class="break" style="padding-top: 4px;">
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
<script async src="javascript/jquery.min.js"></script>
<script async src="javascript/main3.js"></script>
</body>
</html>