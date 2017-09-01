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
            $names = $_POST['who'];
            $reasons = $_POST['reason'];
            $sessionid = preg_replace($saturate,"",$sessionidraw);
            $name = preg_replace($saturate,"",$names);
            $reason = preg_replace($saturate,"",$reasons);
            $userip = $_SERVER[REMOTE_ADDR];
            $gangsterusername = $usernameone;
            $playerrank = $myrank;

            $ahdo = mysql_num_rows(mysql_query("SELECT * FROM hdos WHERE username = '$usernameone'"));
            if(($playerrank < '25')&&($ahdo < '1')){die(' ');}
            ?>

            <?php
            if ($_POST['mute'] && $_POST['who']){
                $getipsql = mysql_query("SELECT * FROM users WHERE username = '$name'");
                $getiparray = mysql_fetch_array($getipsql);
                $muteip = $getiparray['latestip'];
                $ifuser = mysql_num_rows(mysql_query("SELECT username FROM users WHERE username = '$name'"));
                if($reason == ""){ $showoutcome++; $outcome="<font size=1 face=verdana>Please enter a reason!";
                }elseif($ifuser == 0){ $showoutcome++; $outcome="<font size=1 face=verdana>No such user!";
                }else{

                    if($_POST['automute'] == 1){
                        $hours = $_POST['hours'];
                        $days = $_POST['days'];
                        $totalh = $hours * 3600;
                        $totald = $days * 86400;
                        $endtot = $totald + $totalh;
                        $endtot = time()+$endtot;
                    }else{ $endtot = 0; }

                    mysql_query("INSERT INTO muted(username,ip,reason,mutedby,autounmute)
VALUES ('$name','$muteip','$reason','$gangsterusername','$endtot')");
                    $postinfo = "[b]Muted:[/b] $name [b]Reason:[/b] $reason";
                    mysql_query("INSERT INTO forumposts(username,topicid,type,post,rankid,esc)
VALUES ('$gangsterusername','6','hdof','$postinfo','$playerrank','1')");
                    $showoutcome++; $outcome="<font size=1 face=verdana>You have muted <b>$name</b>";}}

            $unmute = strip_tags($_GET['id']);
            if($unmute) {
                mysql_query("DELETE FROM muted WHERE username = '$unmute'");
                $showoutcome++; $outcome="<font size=1 face=verdana>You have unmuted <b>$unmute</b>!";}
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
                                Mute
                            </div>
                            <div style="padding: 5px; margin: auto; text-align: center; color: #fefefe;">
                                <div style="margin: auto; width: 93%; padding-top: 16px; padding-bottom: 6px; text-align: left;">
                                    <form action="" method="post" name="mute" style="text-align: center;">
                                        <input type="text" class="textarea" name="who" placeholder="Enter a Username..." value="<?php echo$name?>">
                                        <input type="text" class="textarea" placeholder="Enter a Reason..." name="reason">
                                        <br/><br/>
                                        <input type="checkbox" class="textarea" name="automute" value="1"> Set mute timer?:

                                        <select name="days" class="textarea">
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select> Days and

                                        <select name="hours" class="textarea">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                        </select> Hours
                                        <br><br>

                                        <input type="submit" name="mute" class="textarea curve3px" value="Mute"></form><br>

                                    <?php  if($playerrank >= 25){ ?>
                                        <div class="col left-col">
                                            <table class="regTable" style="min-width:200px; width: 80%; max-width: 540px;" cellspacing="0" cellpadding="0" align="center">
                                                <tbody><tr>
                                                    <td class="header" colspan="5" style="padding: 11px 0px;">
                                                        Current Mutes
                                                    </td>
                                                </tr>
                                                <?php
                                                $autoo = mysql_query("SELECT * FROM muted ORDER BY time DESC");
                                                while($auto = mysql_fetch_array($autoo)) {
                                                    $autou = $auto['autounmute'];
                                                    $muser = $auto['username'];
                                                    $mmutedby = $auto['mutedby'];
                                                    ?>
                                                    <tr>
                                                        <td class="col " style="padding-right: 10px;">
                                                            <a href="?id=<?php echo$muser;?>">(x) <a href="viewprofile.php?username=<?php echo$muser;?>"><?php echo$muser;?></a>
                                                        </td>
                                                        <td class="col " style="padding-right: 10px;">
                                                            <a href="viewprofile.php?username=<?php echo$mmutedby;?>"><?php echo$mmutedby;?></a>
                                                        </td>
                                                        <td class="col " style="padding-right: 10px;">
                                                            <?php echo $auto['reason'];?>
                                                        </td>
                                                        <td class="col " style="padding-right: 10px;">
                                                            <?php echo $auto['time'];?>
                                                        </td>
                                                        <td class="col " style="padding-right: 10px;">
                                                            <?php if($autou > 1){ echo maketime($autou); } else { echo "Perm"; } ?>
                                                        </td>
                                                    </tr>
                                                <?php }?>
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php  } ?>
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

