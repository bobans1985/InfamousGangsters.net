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

						$select_mission_query = mysql_query("SELECT * from users WHERE username='$usernameone' LIMIT 1");
						$select_user_for_mission = mysql_fetch_array($select_mission_query);
						$missionid = $select_user_for_mission['mission'];
						
						if ($missionid == 1){
						$missionname = "Rescue The President";
						$description = "The president of your country has been kidnapped. Your job is to try and rescue Mr. President from where he has been kept. You will need to travel to all states and check all jails to find where the president could be held hostage. The government may decide to reward you with some cash or maybe even bullets.";
						}

						elseif ($missionid == 2){
						$missionname = "Kill The Presidents Captive";
						$description = "Now that you have captured the president you must kill <b>ChrisStrydes</b>. This is the person who captured the president. You must search for him travel to the country he is hiding in and shoot him. Hopefully this is enough information to help you, once you complete the mission report back for your next mission.";
						}

						elseif ($missionid == 3){
						$missionname = "Protect The Donald Trump secretary of state";
						$description = "Now You Must Kill All The Assassins to Save Donald Trump secretary of state!! <br>BE AWARE They Do Shoot Back! Good Luck ";
						}

						elseif ($missionid == 4){
						$missionname = "Bust Mr Brown";
						$description = "Mr Brown has been captured by the UN, you must help him escape from there jail!<br>Search all countries and you will find him";
						}

						elseif ($missionid == 5){
						$missionname = "Kill <b>Nicolas Sarkozy<b>";
						$description = "You must take out the president of france he has a knowlege of mafia gang hits about to take place you must silence him ASAP!";
						}

						elseif ($missionid == 6){
						$missionname = "Bust Sheikh Mohammed";
						$description = "You have to bust the ruler of dubia who has been caught selling drugs!!<br>He is being held captive in America";
						}
						elseif ($missionid == 7){
						$missionname = "Kill <b>Osama Bin Laden<b>";
						$description = "This horrible man is wanted by all governments for terrorist activities <br>You must kill him before he attacks anyone else";
						}
						elseif ($missionid == 8){
						//if ($rankpoints >12600){
						$missionname = "Do An Organised Crime With MrBrown";
						$description = "Create an Organised Crime invite <b>MrBrown</b> and 2 more players.<br>Commit the organised crime to unlock the next mission";
						//}else{
						//$missionname = "You Must Rank To Enforcer +";
						//$description = "To Enable This Mission";
						//}
						}
						elseif ($missionid == 9){
						$missionname = "Steal A <b>Bugatti Veyron</b> with 0% Damage!";
						$description = "You must steal <b>MrBrown</b> a <b>Bugatti Veyron</b> with 0% Damage as soon as possible!";
						}
						elseif ($missionid == 10){
						$missionname = "One Final Hit";
						$description = "You are needed to kill <b>Donald Trump</b> as he has eveidence of MrBrowns corrupt dealings<br>This kill will cost you a bit but the reward will be far greater";
						}
						?>
                        <div class="main curve2px">
                            <div class="menuHeader noTop">
                                Mission Task
                            </div>
                            <div style="padding: 5px; margin: auto; text-align: center; color: #fefefe;">
                                <div style="margin: auto; padding-top: 16px; padding-bottom: 6px; text-align: center;">
                                    <table class="regTable" style="margin: auto; margin-bottom: 18px; width: 90%; max-width: 1200px;"
                                           cellspacing="0" cellpadding="0">
                                        <tbody style="width:100%">
											<tr>
												<td colspan="2" class="header">
													Missions
												</td>
											</tr>
											<?php if ($missionid == 11): ?>
											<tr class='row'>
												<td class='col noTop' colspan="2"><font color=white><b>You have completed all the current missions!</b></font></td>
											</tr>
											<?php else: ?>
											<tr class='row'>
												<td class='col noTop'><font color=white><b>Mission</b></font></td>
												<td class='col noTop' style="width:90%;white-space:pre-wrap;"><? echo "$missionname"; ?></td>
											</tr>
											<tr class='row' style="width:100%">
												<td class='col noTop'><font color=white><b>Description</b></font></td>
												<td class='col noTop' style="width:90%;white-space:pre-wrap;"><? echo "$description"; ?></td>
											</tr>
											<?php endif; ?>
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