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
            <table class="menuTable curve10px" cellspacing="0" cellpadding="0">
                <tr>
                    <td class="topleft"></td>
                    <td class="top"></td>
                    <td class="topright"></td>
                </tr>
                <tr>
                    <td class="left"></td>
                    <td class="top">
                        <?php
                        $saturate = "/[^a-z0-9]/i";
                        $saturated = "/[^0-9]/i";
                        $getnameraw = $_GET['name'];
                        $sessionidraw = $_COOKIE['PHPSESSID'];
                        $sessionid = preg_replace($saturate,"",$sessionidraw);
                        $getname = preg_replace($saturate,"",$getnameraw);
                        $userip = $_SERVER[REMOTE_ADDR];
                        $gangsterusernamesql = mysql_query("SELECT * FROM usersonline WHERE session = '$sessionid' AND ip = '$userip'");
                        $gangsterusernamearray = mysql_fetch_array($gangsterusernamesql);
                        $gangsterusername = $gangsterusernamearray['username'];
                        $playersql = mysql_query("SELECT * FROM users WHERE username = '$gangsterusername'");
                        $playerarray = mysql_fetch_array($playersql);
                        $playerrank = $playerarray['rankid'];

                        $getuserinfosql = mysql_query("SELECT * FROM datesjoined WHERE username = '$gangsterusername'");
                        $getuserinfoarray = mysql_fetch_array($getuserinfosql);
                        $datejoined = $getuserinfoarray['time'];

                        $getuserinfosql = mysql_query("SELECT * FROM users WHERE username = '$gangsterusername'");
                        $getuserinfoarray = mysql_fetch_array($getuserinfosql);
                        $attemptedcrimes = $getuserinfoarray['crimes'];
                        $attemptedsteals = $getuserinfoarray['thefts'];
                        $crimesdone = $getuserinfoarray['donecrimes'];
                        $crimesfailed = $attemptedcrimes - $crimesdone;
                        $stealsdone = $getuserinfoarray['donethefts'];
                        $stealsfailed = $attemptedsteals - $stealsdone;
                        $busts = $getuserinfoarray['jailbusts'];
                        $joint = $getuserinfoarray['joint'];
                        $now = $getuserinfoarray['now'];
                        $attemptedbusts = $getuserinfoarray['donebusts'];
                        $bustsfailed = $busts - $attemptedbusts;
                        $topics = $getuserinfoarray['topics'];
                        $posts = $getuserinfoarray['posts'];
                        $melted = $getuserinfoarray['totalmelted'];
                        $moneycrimes = $getuserinfoarray['moneycrimes'];
                        $oilprofit = $getuserinfoarray['oilprofit'];
                        $email = $getuserinfoarray['email'];
                        $time=$getuserinfoarray['timer'];
                        $total_money=$getuserinfoarray['money'];
                        $casino_wins=$getuserinfoarray['casinowins'];

                        $getuserinfosql = mysql_query("SELECT * FROM casinoprofit WHERE username = '$gangsterusername'");
                        $getuserinfoarray = mysql_fetch_array($getuserinfosql);
                        $dice = $getuserinfoarray['dice'];
                        $roulette = $getuserinfoarray['roulette'];
                        $races = $getuserinfoarray['races'];
                        $blackjack = $getuserinfoarray['blackjack'];
                        $overall = $getuserinfoarray['overall'];



                        ?>
                        <? if ($showoutcome >= 1) { ?>
                            <span><? echo $outcome; ?></span>
                        <? } ?>
                        <div class="main curve2px">
                            <div class="menuHeader noTop">
                                My Statistics
                            </div>
                            <div style="padding: 5px; margin: auto; text-align: center; color: #fefefe;">
                                <div class="break" style="padding-top: 10px;">
                                    <div class="break" style="padding-top: 12px;">
                                        <div class="spacer"></div>
                                        <div class="break" style="padding-top: 17px;">
                                            <div class="miniMenu shadowTest curve3px" style="vertical-align: top; margin-left: 4px; margin-bottom: 8px;  display: inline-block; width: 47%; min-width: 186px; max-width: 270px;">
                                                <div class="miniMenuHeader noTop">
                                                    Casino Statistics:
                                                </div>
                                                <div class="miniMain">
                                                    <div class="miniMainDiv txtShadow " style="border-top: 0;">
                                                        <span class="myStatVal">$<?echo number_format($blackjack);?> </span>Blackjack Profit:
                                                    </div>
                                                    <div class="miniMainDiv txtShadow " style="border-top: 1px solid #3f3f3f;">
                                                        <span class="myStatVal">$<?echo number_format($races);?> </span>Races Profit:
                                                    </div>
                                                    <div class="miniMainDiv txtShadow " style="border-top: 1px solid #3f3f3f;">
                                                        <span class="myStatVal">$<?echo number_format($roulette);?> </span>Roulette Profit:
                                                    </div>
                                                    <div class="miniMainDiv txtShadow " style="border-top: 1px solid #3f3f3f;">
                                                        <span class="myStatVal">$<?echo number_format($dice);?> </span>Dice Game Profit:
                                                    </div>
                                                    <div class="miniMainDiv txtShadow " style="border-top: 1px solid #3f3f3f;">
                                                        <span class="myStatVal">$<?echo number_format($overall);?> </span>Overall Profit:
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="miniMenu shadowTest curve3px" style="vertical-align: top; margin-left: 4px; margin-bottom: 8px; display: inline-block; width: 47%; min-width: 186px; max-width: 270px;">
                                                <div class="miniMenuHeader noTop">
                                                    Crimes Statistics:
                                                </div>
                                                <div class="miniMain">
                                                    <div class="miniMainDiv txtShadow myStatSuccessful">
                                                                <span class="myStatVal">
                                                                    <span class="myStatPercentage">(<?$total=round(($crimesdone*100)/$attemptedcrimes,2);echo$total;?>%)</span><?echo number_format($crimesdone);?>
                                                                </span>Crimes Committed:
                                                    </div>
                                                    <div class="miniMainDiv txtShadow myStatUnsuccessful">
                                                                <span class="myStatVal">
                                                                    <span class="myStatPercentage">(<?$total=round(($crimesfailed*100)/$attemptedcrimes,2);echo$total;?>%)</span><?echo number_format($crimesfailed);?>
                                                                </span>Failed Attempts:
                                                    </div>
                                                    <div class="miniMainDiv txtShadow">
                                                        <span class="myStatVal"><?echo number_format($attemptedcrimes);?> </span>Total:
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="break" style="padding-top: 5px;">
                                                <div class="spacer"></div>
                                                <div class="break" style="padding-top: 11px;">
                                                    <div class="miniMenu shadowTest curve3px" style="vertical-align: top; margin-left: -4px; margin-bottom: 8px; display: inline-block; width: 47%; min-width: 186px; max-width: 270px;">
                                                        <div class="miniMenuHeader noTop">
                                                            Jail Bust Statistics:
                                                        </div>
                                                        <div class="miniMain">
                                                            <div class="miniMainDiv txtShadow myStatSuccessful">
                                                                        <span class="myStatVal">
                                                                            <span class="myStatPercentage">(<?$total=round(($attemptedbusts*100)/$busts,2);echo$total;?>%)</span><?echo number_format($attemptedbusts);?>
                                                                        </span>Players Busted:
                                                            </div>
                                                            <div class="miniMainDiv txtShadow myStatUnsuccessful">
                                                                        <span class="myStatVal">
                                                                            <span class="myStatPercentage">(<?$total=round(($bustsfailed*100)/$busts,2);echo$total;?>%)</span><?echo number_format($bustsfailed);?>
                                                                        </span>Failed Attempts:
                                                            </div>
                                                            <div class="miniMainDiv txtShadow">
                                                                <span class="myStatVal"><?echo number_format($busts);?> </span>Total:
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="miniMenu shadowTest curve3px" style="vertical-align: top; margin-left: 4px; margin-bottom: 8px; display: inline-block; width: 47%; min-width: 186px; max-width: 270px;">
                                                        <div class="miniMenuHeader noTop">
                                                            GTA Statistics:
                                                        </div>
                                                        <div class="miniMain">
                                                            <div class="miniMainDiv txtShadow myStatSuccessful">
                                                                                <span class="myStatVal">
                                                                                    <span class="myStatPercentage">(<?$total=round(($stealsdone*100)/$attemptedsteals,2);echo$total;?>%)</span><?echo number_format($stealsdone);?>
                                                                                </span>Vehicles Stolen:
                                                            </div>
                                                            <div class="miniMainDiv txtShadow myStatUnsuccessful">
                                                                                <span class="myStatVal">
                                                                                    <span class="myStatPercentage">(<?$total=round(($stealsfailed*100)/$attemptedsteals,2);echo$total;?>%)</span><?echo number_format($stealsfailed);?>
                                                                                </span>Failed Attempts:
                                                            </div>
                                                            <div class="miniMainDiv txtShadow">
                                                                <span class="myStatVal"><?echo number_format($attemptedsteals);?> </span>Total:
                                                            </div>
                                                        </div>
                                                    </div>
                                                   <br>
                                                    <div class="break" style="padding-top: 5px;">
                                                        <div class="spacer"></div>
                                                        <div class="break" style="padding-top: 11px;">
                                                            <div class="miniMenu shadowTest curve3px" style="vertical-align: top; margin-left: -4px; margin-bottom: 8px; display: inline-block; width: 47%; min-width: 186px; max-width: 270px;">
                                                                <div class="miniMenuHeader noTop">
                                                                    Miscellaneous:
                                                                </div>
                                                                <div class="miniMain">
                                                                    <div class="miniMainDiv txtShadow">
                                                                        <span class="myStatVal">$<? echo number_format($moneycrimes); ?> </span>Money earnt through crimes:
                                                                    </div>
                                                                    <div class="miniMainDiv txtShadow">
                                                                        <span class="myStatVal">$<? echo number_format($oilprofit); ?> </span>Property investement profit:
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="miniMenu shadowTest curve3px" style="vertical-align: top; margin-left: 4px; margin-bottom: 8px; display: inline-block; width: 47%; min-width: 186px; max-width: 270px;">
                                                                <div class="miniMenuHeader noTop">
                                                                    Forum:
                                                                </div>
                                                                <div class="miniMain">
                                                                    <div class="miniMainDiv txtShadow">
                                                                        <span class="myStatVal"><? echo number_format($topics); ?> </span>Topics made:
                                                                    </div>
                                                                    <div class="miniMainDiv txtShadow">
                                                                        <span class="myStatVal"><? echo number_format($posts); ?> </span>Posts made:
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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

