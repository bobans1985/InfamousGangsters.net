<? include 'included.php'; session_start();

$countusers = mysql_num_rows(mysql_query("SELECT * FROM users WHERE status != 'Modkilled'"));
$countdeadusers = mysql_num_rows(mysql_query("SELECT * FROM users WHERE status != 'Alive' AND  status != 'Modkilled'"));
$aliveusers = $countusers - $countdeadusers;
$start = number_format($countdeadusers / $countusers * 100, 1);

$countdeadmoneysql = mysql_query("SELECT SUM(amount) AS b FROM bank WHERE rankid < 25");
$countdeadmoneyarray = mysql_fetch_array($countdeadmoneysql);
$countdeadmoney = $countdeadmoneyarray['b'];

$countmoneysql = mysql_query("SELECT SUM(money + swiss) AS b FROM users WHERE status = 'Alive' AND rankid < '25'");
$countmoneyarray = mysql_fetch_array($countmoneysql);
$countmoneyraw = $countmoneyarray['b'];

$countswissmoneysql = mysql_query("SELECT SUM(swiss) AS b FROM users WHERE rankid < '25' AND status = 'Alive'");
$countswissmoneyarray = mysql_fetch_array($countswissmoneysql);
$countswissmoneyraw = $countswissmoneyarray['b'];

$countmoneysqaaal = mysql_query("SELECT SUM(cash) AS b FROM crews WHERE rankid < '25'");
$countmoneyassaxarray = mysql_fetch_array($countmoneysqaaal);
$gre  = $countmoneyassaxarray['b'];

$countmoney = $countmoneyraw + $countdeadmoney + $ttttts + $tttttss + $gre;
$average = floor($countmoney / $aliveusers);

$total_cars =number_format(mysql_num_rows(mysql_query("SELECT * FROM cars")));
$rares = number_format(mysql_num_rows(mysql_query("SELECT * FROM cars WHERE carid <= '12' AND carid >= '9' ")));
$superrares = number_format(mysql_num_rows(mysql_query("SELECT * FROM cars WHERE carid >= '14'")));

$result=mysql_query("SELECT SUM(crimes) as crimes, SUM(thefts) as gta, SUM(totalmelted) as bullets_melted FROM users");
$data=mysql_fetch_assoc($result);
$total_crimes= number_format($data['crimes']);
$total_gta= number_format($data['gta']);
$total_bullets_melted= number_format($data['bullets_melted']);

$result=mysql_query("SELECT SUM(bullets) AS bullets_fired FROM attempts");
$data=mysql_fetch_assoc($result);
$total_bullets_fired= number_format($data['bullets_fired']);


$kills = mysql_query("SELECT * FROM kills ORDER BY id DESC LIMIT 0,15");
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
                                Game Statistics
                            </div>
                            <div style="padding: 5px; margin: auto; text-align: center; color: #fefefe;">
                                <div style="margin: auto; padding-top: 16px; padding-bottom: 6px; text-align: center;">

                                    <div class="miniMenu shadowTest curve3px" style="vertical-align: top; margin-left: -4px; margin-bottom: 8px; display: inline-block; width: 47%; min-width: 186px; max-width: 270px;">
                                        <div class="miniMenuHeader noTop">
                                            Game Statistics:
                                        </div>
                                        <div class="miniMain">
                                            <div class="miniMainDiv txtShadow" style="border-top: 0;"><span style="float: right; color: #ffffff;"><? echo number_format($countusers); ?></span>Total Users:</div>
                                            <div class="miniMainDiv txtShadow"><span style="float: right; color: #ffffff;"><? echo number_format($countusers - $countdeadusers); ?></span>Alive:</div>
                                            <div class="miniMainDiv txtShadow"><span style="float: right; color: #ffffff;"><? echo number_format($countdeadusers); ?></span>Dead:</div>
                                        </div>
                                    </div>

                                    <div class="miniMenu shadowTest curve3px" style="vertical-align: top; margin-left: 4px; margin-bottom: 8px;  display: inline-block; width: 47%; min-width: 186px; max-width: 270px;">
                                        <div class="miniMenuHeader noTop">
                                            Game Capital:
                                        </div>
                                        <div class="miniMain">
                                            <div class="miniMainDiv txtShadow" style="border-top: 0;"><span style="padding-left: 5px; float: right; color: #ffffff;">$<? echo number_format($countmoney); ?></span>Total Game Cash:</div>
                                            <div class="miniMainDiv txtShadow"><span style="padding-left: 5px; float: right; color: #ffffff;">$<? echo number_format($countswissmoneyraw); ?></span>Swiss Money:</div>
                                            <div class="miniMainDiv txtShadow" style="border-bottom: 0;"><span style="padding-left: 5px; float: right; color: #ffffff;">$<? echo number_format($countdeadmoney); ?></span>Banked Money:</div>
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="miniMenu shadowTest curve3px" style="margin-left: -8px; vertical-align: top; margin-bottom: 5px; display: inline-block; width: 47%; min-width: 186px; max-width: 270px;">
                                        <div class="miniMenuHeader noTop">
                                            Vehicle Statistics:
                                        </div>
                                        <div class="miniMain">
                                            <div class="miniMainDiv txtShadow" style="border-top: 0;"><span style="float: right; color: #ffffff;"><?echo $total_cars;?></span>Total Vehicles:</div>
                                            <div class="miniMainDiv txtShadow"><span style="float: right; color: #ffffff;"><?echo$rares;?></span>Rare:</div>
                                            <div class="miniMainDiv txtShadow" style="border-bottom: 0;"><span style="float: right; color: #ffffff;"><?echo$superrares;?></span>Super Rare:</div>
                                        </div>
                                    </div>
                                    <div class="miniMenu shadowTest curve3px" style="vertical-align: top; margin-left: 4px; margin-bottom: 5px;  display: inline-block; width: 47%; min-width: 186px; max-width: 270px;">
                                        <div class="miniMenuHeader noTop">
                                            Miscellaneous Statistics:
                                        </div>
                                        <div class="miniMain">
                                            <div class="miniMainDiv txtShadow" style="border-top: 0;"><span style="float: right; color: #ffffff;"><?echo$total_crimes;?></span>Crimes Committed:</div>
                                            <div class="miniMainDiv txtShadow"><span style="float: right; color: #ffffff;"><?echo$total_gta;?></span>GTA's Committed</div>
                                            <div class="miniMainDiv txtShadow"><span style="float: right; color: #ffffff;"><?echo$total_bullets_fired;?></span>Bullets Fired:</div>
                                            <div class="miniMainDiv txtShadow" style="border-bottom: 0;"><span style="float: right; color: #ffffff;"><?echo$total_bullets_melted;?></span>Bullets Melted:</div>
                                        </div>
                                    </div>
                                    <div class="break" style="padding-top: 18px;">
                                        <div class="spacer"></div>
                                        <div class="break" style="padding-top: 21px;">
                                            <div class="miniMenu shadowTest curve3px" style="vertical-align: top; margin-left: 2px; margin-bottom: 5px;  display: inline-block; width: 93%;  max-width: 650px;">
                                                <div class="miniMenuHeader noTop" style="padding: 7px;">
                                                    Last 20 Kills:
                                                </div>
                                                <div class="miniMain" style="max-height: 9000px;">
                                                    <table cellspacing="0">
                                                        <tbody>
                                                        <tr style="text-align: center;">
                                                            <td class="statsDivHeader" style="border-left: 0;" width="24%">Victim</td>
                                                            <td class="statsDivHeader" style="padding-right: 15px;">Victims Rank</td>
                                                            <td class="statsDivHeader" width="24%">Killer</td>
                                                            <td class="statsDivHeader" width="1%">Time</td>
                                                        </tr>
                                                        <? while($lasttenkilled = mysql_fetch_array($kills)){
                                                            $name = $lasttenkilled['victim'];
                                                            $modranks = $lasttenkilled['rankid'];
                                                            $killer = $lasttenkilled['killer'];
                                                            $show = $lasttenkilled['show'];
                                                            $time = $lasttenkilled['time'];

                                                            $etests = $modranksent;
                                                            if($show != 0){ $showname = "<a style='display: inline-block;border: 0px;padding: 0px;' href=viewprofile.php?username=$killer>$killer</a>"; }else{ $showname = "-"; }
                                                            if($rankid >= 100){ $showname = "<a style='display: inline-block;border: 0px;padding: 0px;' href=viewprofile.php?username=$killer>$killer</a>"; }

                                                            if($modranks == '1'){ $modrank = $rank1; }
                                                            elseif($modranks == '2'){ $modrank = $rank2; }
                                                            elseif($modranks == '3'){ $modrank = $rank3; }
                                                            elseif($modranks == '4'){ $modrank = $rank4; }
                                                            elseif($modranks == '5'){ $modrank = $rank5; }
                                                            elseif($modranks == '6'){ $modrank = $rank6; }
                                                            elseif($modranks == '7'){ $modrank = $rank7; }
                                                            elseif($modranks == '8'){ $modrank = $rank8; }
                                                            elseif($modranks == '9'){ $modrank = $rank9; }
                                                            elseif($modranks == '10'){ $modrank = $rank10; }
                                                            elseif($modranks == '11'){ $modrank = $rank11; }
                                                            elseif($modranks == '12'){ $modrank = $rank12; }
                                                            elseif($modranks == '13'){ $modrank = "<b style='color:white'>" . $rank13 . "</b>"; }
                                                            elseif($modranks == '14'){ $modrank = "<b style='color:white'>" . $rank14 . "</b>"; }
                                                            elseif($modranks == '15'){ $modrank = "<b style='color:white'>" . $rank15 . "</b>"; }
                                                            elseif($modranks == '16'){ $modrank = "<b style='color:white'>" . $rank16 . "</b>"; }
                                                            elseif($modranks == '17'){ $modrank = "<b style='color:white'>" . $rank17 . "</b>"; }
                                                            elseif($modranks == '18'){ $modrank = "<b style='color:white'>" . $rank18 . "</b>"; }
                                                            elseif($modranks == '19'){ $modrank = "<b style='color:white'>" . $rank19 . "</b>"; }
                                                            elseif($modranks == '20'){ $modrank = "<b style='color:white'>" . $rank20 . "</b>"; }
                                                            elseif($modranks == '21'){ $modrank = "<b style='color:white'>" . $rank21 . "</b>"; }
                                                            elseif($modranks == '22'){ $modrank = "<b style='color:#FFC753'>" . $rank22 . "</b>"; }
                                                            elseif($modranks == '25'){ $modrank = '<b>Moderator</b>'; }
                                                            elseif($modranks == '50'){ $modrank = '<b>Moderator</b>'; }
                                                            elseif($modranks == '100'){ $modrank = '<b>Administrator</b>'; }
                                                            else{$modrank = '';}
                                                            $etests = 0;
                                                            echo"<tr>
                                                             <td class='statsDiv'>
                                                                <a style='border-left: 0; border-top: 0;' href='viewprofile.php?username=".$name."'>".$name."</a>
                                                             </td>
                                                             <td class='statsDiv' style='color: #999999; border-top: 0;'>
                                                                <span class='statsDivStatic' style='border-top: 0;'>".$modrank."</span>
                                                             </td>
                                                             <td class='statsDiv'>
                                                                <span class='statsDivStatic' style='color: #888888; border-top: 0;'>$showname</span>
                                                            </td>
                                                            <td class='statsDiv'>
                                                                <span class='statsDivStatic' style='color: #888888; border-top: 0;'>$time</span>
                                                            </td>
                                                            </tr>";
                                                        }?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="break" style="margin-top: 15px;">
                                                <div class="spacer"></div>
                                                <div class="break" style="margin-top: 4px;">
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